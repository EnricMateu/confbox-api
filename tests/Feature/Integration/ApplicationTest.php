<?php

namespace Tests\Feature\Integration;

use App\Application;
use App\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @group application
     */
    public function test_application_gets_userId_and_eventId_when_submitted()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();
        $this->assertCount(0, Event::all());
        $this->assertCount(0, Application::all());
        $event = factory(Event::class)->create();
        $newApplication = $this->newApplication();
        $expectedApplication = [
            'status'=> 0,
            'event_id'=> $event->id,
            'user_id'=> auth()->id(),
        ];
        $response = $this->post('/api/event/' . $event->id . '/apply',
                                 $newApplication);

        $storedApplication = Application::first();
        //dd($response);
        $response->assertStatus(201);
        $this->assertCount(1, Event::all());
        $this->assertCount(1, Application::all());
        $this->assertEquals($expectedApplication['status'], $storedApplication->status);
        $this->assertEquals($expectedApplication['event_id'], $storedApplication->event_id);
        $this->assertEquals($expectedApplication['user_id'], $storedApplication->user_id);
    }


    /**
     * @group application
     */
    public function test_application_status_changes_to_approved()
    {
        $expectedStatus = 1;
        $event = factory(Event::class)->create();
        $newApplication = $this->newApplication();
        $this->post('/api/event/' . $event->id . '/apply', $newApplication);

        $application = Application::first();
        $response = $this->put('/api/application/' . $application->id  . '/update-status', ['approved'=> 1]);

        $updatedApplication = Application::find($application->id);

        $response->assertStatus(200);
        $this->assertEquals($expectedStatus, $updatedApplication->status);
    }


    /**
     * @group application
     */
    public function test_application_status_changes_to_rejected()
    {
        $expectedStatus = 2;
        $event = factory(Event::class)->create();
        $newApplication = $this->newApplication();
        $this->post('/api/event/' . $event->id . '/apply', $newApplication);

        $application = Application::first();
        $response = $this->put('/api/application/' . $application->id  . '/update-status', ['rejected'=> 2]);

        $updatedApplication = Application::find($application->id);

        $response->assertStatus(200);
        $this->assertEquals($expectedStatus, $updatedApplication->status);

    }

    private function newApplication()
    {
        return [
            'status'=> null,
            'event_id'=> null,
            'user_id'=> null,
        ];
    }
}

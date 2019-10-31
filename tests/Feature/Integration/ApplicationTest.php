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

    public function test_application_gets_userId_and_eventId_when_submitted()
    {
        $event = factory(Event::class)->create();
        $expectedApplication = [
            'status'=> 0,
            'event_id'=> $event->id,
            'user_id'=> auth()->id(),
        ];
        $response = $this->get('/api/event/' . $event->id . '/apply');

        $application = Application::first();

        $response->assertStatus(200);
        $this->assertCount(1, Application::all());
        $this->assertEquals($expectedApplication['status'], $application->status);
        $this->assertEquals($expectedApplication['event_id'], $application->event_id);
        $this->assertEquals($expectedApplication['user_id'], $application->user_id);

    }
}

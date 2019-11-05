<?php

namespace tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Event;
use App\Events;
use Faker\Generator as Faker;

class EventTest extends TestCase
{
    use RefreshDatabase;

    public function testStatusChangedToApproved()
    {
        $this->assertCount(0, Event::all());
        $event = factory(Event::class)->create();
        $expectedStatus = 1;

        $this->assertNotEquals($expectedStatus, $event->approval_status);

        $response = $this->patch('/api/validateEvent/' . $event->id);
        
        $validatedEvent = Event::first();
        
        $response->assertStatus(200);
        $this->assertCount(1, Event::all());
        $this->assertEquals($expectedStatus, $validatedEvent->approval_status);
    }

    public function testListValidatedEvents()
    {
        $this->assertCount(0, Event::all());

        $event1 = factory(Event::class)->create();
        $event2 = factory(Event::class)->create();
        $approvalStatusExpected = 1;
        
        $this->patch('/api/validateEvent/' . $event2->id);
        $validatedEvent = $this->get('/api/validatedEvents/')->decodeResponseJson()[1];

        $this->assertCount(2, Event::all());
        $this->assertEquals($approvalStatusExpected, $validatedEvent['approval_status']);
    }

}

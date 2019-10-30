<?php

//namespace Tests\Unit;
namespace Tests\Feature;
//use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;

class Event extends TestCase
{
    public function testStatusChangedToApproved()
    {
        $event= new Event(); // not approved by default
        $event->approval_status = "approved";
        $this->assertEquals($event->approval_status, "approved");
    }

    public function testShowValidatedEvents()
    {
        $event = Faker::define(Event::class, $faker);
        
        dd($event);

        $event->approval_status = "approved";
        $this->assertEquals($event->approval_status, "approved");
    }

}

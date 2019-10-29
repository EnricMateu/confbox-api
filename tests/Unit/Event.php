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
        
        // $event= new Event ([
        // 'date_from' => $faker->date(),
        // 'date_to' => $faker->date(),
        // 'country'=>$faker->country(),
        // 'city'=>$faker->city(),
        // 'event_url'=>$faker->url(),
        // 'approval_status'=>$faker->string("not approved"),
        // 'title'=>$faker->text(),
        // 'topic'=>$faker->text(),
        // 'description'=>$faker->text(),
        // ]);
        dd($event);

        $event->approval_status = "approved";
        $this->assertEquals($event->approval_status, "approved");
    }

}

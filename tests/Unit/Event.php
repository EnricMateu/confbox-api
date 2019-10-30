<?php

//namespace Tests\Unit;
namespace Tests\Feature;
//use PHPUnit\Framework\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Event as EventModel;
use Faker\Generator as Faker;

class Event extends TestCase
{
    public function testStatusChangedToApproved()
    {
        $event= new Event(); // not approved by default
        $event->approval_status = "approved";
        $this->assertEquals($event->approval_status, "approved");
    }

    public function testListValidatedEvents()
    {
        $events=array();
        $results=array();
        for($i=0; $i<=10; $i++){
            $events [$i]= factory(EventModel::class)->make();
        };
        for($j=1; $j<=7; $j++){
            $events[$j]->approval_status = "approved";
        };
        for($i=0; $i<=10; $i++){
            if ($events[$i]->approval_status === "approved")
            {
                $results [$i]= $i;
                $this->assertEquals($results[$i],$i);
            }
        };
    }

}

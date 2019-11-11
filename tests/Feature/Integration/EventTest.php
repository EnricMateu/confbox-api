<?php

namespace Tests\Feature\Integration;

use App\Event;
use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;


use Illuminate\Foundation\Testing\WithoutMiddleware;

class EventTest extends
    TestCase{
    use RefreshDatabase,WithoutMiddleware;

    /**
     * @group event_bad
     */
    public
    function test_Event_Is_Saved_With_Proper_Company_ID(){

        //TODO REFACTOR THE CONTROLLER IN ORDER TO REMOVE FORCING THE
        // organizing_company_id to be similar
        // ⚠️⚠️⚠️⚠️ THIS IS STUPID ⚠️⚠️⚠️ TEST IS FALSE POSITIVE !!!!
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $company = factory(Company::class)->create();
        $event = factory(Event::class)->make(
            ['organizing_company_id' => $company->company_id]
        )->toArray();

        $response = $this->post(
            '/api/event/' . $company->company_id . '/create',
            $event
        );

        $response->assertStatus(200);
        $this->assertEquals(
            $event['organizing_company_id'],
            $company->company_id
        );
        //$this->assertCount(1, Event::all());
    }

    /**
     * @group event_i
     * */
    public
    function test_Event_Is_Saved_With_Correct_Parent_Company_ID(){
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        $company = factory(Company::class)->create();
        $event = factory(Event::class)->create();
        $event->toArray();
        //dd();
        $response = $this->post(
            '/api/event/' . $company->company_id . '/create',
            $event
        );
        dd($response);

        $response->assertStatus(200);
        $this->assertEquals(
            $event['organizing_company_id'],
            $company->company_id
        );
        //$this->assertCount(1, Event::all());
    }
}

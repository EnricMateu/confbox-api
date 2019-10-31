<?php

namespace Tests\Unit;

use App\Company;
use App\Http\Controllers\CompanyController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Mockery;
use Tests\TestCase;
use Illuminate\Http\Request;


class CompanyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


/*
    public function test_Company_Can_Be_Created(){


        $data = [
            'company_name'     =>     'Testing LTD',
            'contact_name'     =>     'Mr Company Member',
            'contact_email'     =>     'test@company.com',
            'contact_phone'     =>     '666-777-888',
        ];
        $data = [
            'company_name'     =>     $faker->company,
            'contact_name'     =>     'Mr Company Member',
            'contact_email'     =>     'test@company.com',
            'contact_phone'     =>     '666-777-888',
        ];
        $response = $this->json('post','/api/companies',
            $data);
        $savedCompany = Company::first();
        $this->assertSame($data,$savedCompany);
        $this->assertEquals(200, $response->getStatusCode());
    }
*/
    public function test_Company_Can_Be_Created_B(){

        $expectedNewCompany = factory(Company::class)->create();
        $array = json_encode($expectedNewCompany);
        $response = $this->json('post','/api/companies',
            $array);
        $company = Company::first();
        $this->assertDatabaseHas($array);
        $this->assertEquals(200, $response->getStatusCode());

    }

    public function test_application_gets_userId_and_eventId_when_submitted()
    {
        Event::fake();
        $CompanyData = [
            'company_name' => 'Company 1',
            'contact_email' => 'test1@company.com',
            'contact_phone' => '111-1',
            'company_url' => 'test1.com',
        ];

        $response = $this->json('post','/api/companies',
            [$CompanyData] );
        $company = Company::first();
        $response->assertStatus(200);
        $response->assertJson([
            'created' => true,
        ]);
        $this->assertCount(1, Company::all());
        $this->assertEquals($CompanyData['company_name'], $company->company_name);
        $this->assertEquals($CompanyData['contact_email'], $company->contact_email);
        $this->assertEquals($CompanyData['contact_phone'], $company->contact_phone);
    }
}

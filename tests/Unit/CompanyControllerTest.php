<?php

namespace Tests\Unit;

use App\Company;
use App\Http\Controllers\CompanyController;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
//use Faker\Generator as Faker;
use Mockery;
use Illuminate\Http\Request;

class CompanyControllerTest extends TestCase
{

    use WithoutMiddleware,WithFaker,InteractsWithExceptionHandling;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public
    function testExample()
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

            $response = $this->json('post','/api/companies',
                $data);
            $savedCompany = Company::first();
            $this->assertSame($data,$savedCompany);
            $this->assertEquals(200, $response->getStatusCode());
        }
    */
    public
    function test_Company_Can_Be_Created_B(
    )
    {
 /*       $data = [
            'company_name'  =>   $faker->company,
            'contact_name'  =>   $faker->name,
            'contact_email' =>  $faker->email,
            'contact_phone' =>  $faker->phoneNumber,
            'company_url'   =>  $faker->internet,
        ];*/

        $data = [
            'company_name'  =>   'Company 3',
            'contact_name'  =>   'Person 2',
            'contact_email' =>  'Email 3',
            'contact_phone' =>  '333-333',
            'company_url'   =>  'Url 3'
        ];

        $company = new CompanyController();
        $request = Company::store('/api/companies', 'POST',$data);
        $response = $company->store();
        $savedCompany = Company::first();
        $this->assertCount(1, Company::all());
        //$this->assertDatabaseHas($company);
        $this->assertNotNull($savedCompany);
        $this->assertEquals(200,
            $response->getStatusCode());
    }


}

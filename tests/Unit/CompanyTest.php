<?php

namespace Tests\Unit;

use App\Company;
use App\Http\Controllers\CompanyController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Illuminate\Http\Request;

class CompanyTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;


    /**
     * @group company
     */
    public
    function test_Company_Can_Be_Created()
    {

        $company = factory(Company::class)->make()->toArray();

        $response = $this->postJson('/api/company/create', $company);

        $savedCompany = Company::first();

        $savedCompany->toArray();
        $this->assertEquals($company['company_name'], $savedCompany->company_name);
    }

    /**
     * @group company
     */
    public
    function test_Created_Company_Name_Equals_Name_of_Saved_Company()
    {

        $company = factory(Company::class)->make()->toArray();
        $response = $this->postJson('/api/company/create', $company);
        $savedCompany = Company::first();
        $savedCompany->toArray();
        $response->assertJsonFragment(['company_name' => $savedCompany->company_name]);
    }


    /**
     * @group company
     * @testdox Company can be found via endpoint with ID
     */
    public function test_Company_Can_Be_Found_By_ID()
    {

        $this->withExceptionHandling();

        $company = factory(Company::class)->create();
        $response = $this->get('/api/company/' . $company->company_id);
        $savedCompany = Company::first();

        $this->assertEquals($company->company_id, $savedCompany['company_id']);
    }
}

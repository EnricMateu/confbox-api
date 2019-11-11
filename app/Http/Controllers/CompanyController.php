<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

/*
* Saving this method because it might be relevant when refactoring api to scale it up
*  Relevant doc https://laravel.com/docs/5.8/validation#creating-form-requests

    public function rules()
    {
        return [
        'company_name' => 'bail|required|unique|string|max:55',
        'contact_name' => 'required|string|max:55',
        'contact_email' => 'required|unique|string|max:55',
        'contact_phone' => 'required|unique|integer|max:55',
        'company_url' => 'required|unique|string'];
    }
*
*/
    public function index()
    {
        $companies = Company::paginate(50)->all();
        return json_encode($companies);
    }

    public function show(Company $company, $company_id)
    {
        $response =  Company::findOrFail($company_id);
        return $response;
    }
    public function create()
    {
        $company = new Company();
    }

    public function store(Request $request,Company $company)
    {
       $newCompany = Company::create($request->all());
        return response()->json($newCompany, 200);
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
        return json_encode($company);
    }

    public function delete(Request $request, Company $company)
    {
        $company->delete();

        return response()->json(null);
    }
}

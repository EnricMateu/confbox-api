<?php


namespace Tests\Support;
use App\Company;
use Tests\TestCase;


trait CompanyDataTrait
{

/** @var Company $company **/
    protected $company;
    public function makeFakeCompany(Company $company)
    {
        $this->company = factory(Company::class)->create();
    }

    /**
     * @param Company $company
     */
    public
    function setCompany(
        Company $company
    ): void
    {
        $this->company = $company;
    }
}

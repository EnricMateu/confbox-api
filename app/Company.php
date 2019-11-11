<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Company extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'company_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'company_url'
    ];

    public function event()
    {
        return $this->hasMany(Event::class, 'organizing_company_id', 'id');
    }
    public function getCompanyID(Company $company)
    {
        return $company->company_id;
    }
}

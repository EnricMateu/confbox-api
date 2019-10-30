<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'company_url'];

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}

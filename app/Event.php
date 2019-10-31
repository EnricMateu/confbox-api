<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['description',
        'date_from',
        'date_to',
        'city',
        'country',
        'event_url',
        'topic',
        'title'];

    public function application()
    {
        return $this->hasMany(Application::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

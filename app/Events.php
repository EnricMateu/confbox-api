<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Events extends Model
{
    static $approvedEventsCollection;

    static function getAllEvents()
    {
        return Event::all();
    }

    public function getValidatedEvents()
    {
        return $this->approvedEventsCollection = self::getAllEvents()->where('approval_status', Event::$approved);
    }
}

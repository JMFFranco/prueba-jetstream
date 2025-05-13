<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "event_name",
        "event_date",
        "event_max_capacity",
        "event_speaker_name",
        "event_location_name",
        "event_meetup_url",
        "event_is_virtual",
        "fk_venue_event"
    ];

    //Nombre en singular porque pertenece a un unico escenario un evento
    function venue(){
        return $this->belongsTo(Venue::class, "fk_venue_event");
    }
}

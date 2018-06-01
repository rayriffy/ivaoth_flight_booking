<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DATAPILOT extends Model
{
    //

    use SoftDeletes;

    protected $table = 'user_data_pilot';
    
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'vid',
        'event_ref',
        'ticket_ref',
        'departure',
        'arrival',
        'callsign',
        'departure_time',
        'arrival_time'
    ];
}

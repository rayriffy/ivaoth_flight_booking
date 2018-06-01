<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DATAATC extends Model
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
        'position',
        'start_time',
        'end_time'
    ];
}

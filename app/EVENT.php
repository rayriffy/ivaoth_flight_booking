<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EVENTLIST extends Model
{
    //

    use SoftDeletes;

    protected $table = 'event';
    
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'event_ref',
        'event_name',
        'event_image_url',
        'event_data',
        'created_by'
    ];
}

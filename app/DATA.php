<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DATA extends Model
{
    //

    use SoftDeletes;

    protected $table = 'user_data';
    
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'vid',
        'name',
        'division',
        'participated_event',
        'staff_comments'
    ];
}

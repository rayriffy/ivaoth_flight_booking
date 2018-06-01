<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class STAFF extends Model
{
    //

    use SoftDeletes;

    protected $table = 'staff';
    
    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'vid'
    ];
}

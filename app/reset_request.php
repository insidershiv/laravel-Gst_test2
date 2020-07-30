<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reset_request extends Model
{
    //

    protected $fillable = ['email'];

    protected $hidden = ['created_at', 'updated_at'];
}

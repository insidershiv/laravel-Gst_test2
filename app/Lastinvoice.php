<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lastinvoice extends Model
{
    //




    protected $fillable = ['last_invoice', 'customer_id'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


}

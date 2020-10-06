<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billdetail extends Model
{
    //


   protected $fillable = ['invoice_id', 'customer_id', 'vendor_id', 'amount', 'customer_name', 'created_at'];

   protected $hidden = [
     'updated_at'
];

}

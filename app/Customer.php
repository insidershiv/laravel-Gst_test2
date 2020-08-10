<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

   protected $fillable = ['name', 'email', 'company_name', 'address', 'country', 'state', 'city', 'vendor_id', 'mobile', 'pincode', 'vendor_id'];

   protected $hidden = [
    'created_at', 'updated_at'
];


}

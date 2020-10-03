<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = ['subtotal', 'tax', 'total_amount', 'customer_id', 'vendor_id', 'invoice_id'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];


}

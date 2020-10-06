<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billitem extends Model
{
    //
    protected $fillable = ['item_name', 'item_type', 'item_qty', 'rate', 'sgst', 'cgst', 'igst', 'vendor_id', 'customer_id', 'invoice_id', 'item_total', 'hsn_sac', 'sgst_rate', 'cgst_rate', 'igst_rate'];

   protected $hidden = [
    'created_at', 'updated_at'
];
}

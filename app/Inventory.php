<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //


protected $fillable = ['item_name', 'item_type', 'item_price', 'item_stock', 'item_id', 'item_hsn_sac', 'item_tax_slab','item_exemption','item_exemption_reason'];

protected $hidden = [
    'created_at', 'updated_at'
];

}

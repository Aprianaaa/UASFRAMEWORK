<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id','product_id',
        'quantity','is_box','box_qty','price'
    ];

    public function product()
    {
         return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}

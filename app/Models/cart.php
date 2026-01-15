<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'session_id',
        'product_id',
        'quantity',
        'is_box',
        'box_qty',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'product_id',   // FK di carts
            'product_id'    // PK di products
        );
    }
}

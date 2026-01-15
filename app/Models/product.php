<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'products';
    protected $primaryKey = 'product_id'; // 🔥 WAJIB
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['category_id','name','price','price_box','is_boxable','image','is_best_seller'];
    public function category() {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillalbe = [
        'category_id',
        'name',
        'unit',
        'price',
        'specification',
        'inventory',
        'safety_stock',
        'image_path',
        'remark',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function scopeOrderByPrice($query){
        return $query->orderBy('products.price', 'DESC')->get();
    }
}

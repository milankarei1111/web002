<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes; // 使用軟刪除

    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];

    protected $date = ['deleted_at'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}

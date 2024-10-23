<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sub_category()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category', 'id');
    }


}

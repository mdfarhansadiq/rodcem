<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category','id');
    }

    public function porduct_category()
    {
        return $this->belongsTo(ProductCategory::class, 'category', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

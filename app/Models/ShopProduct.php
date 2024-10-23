<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(ShopCategory::class, 'category_id', 'id');
    }

    public function unit()
    {
        return $this->belongsTo(ShopUnit::class, 'unit_id', 'id');
    }
}

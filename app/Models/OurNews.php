<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurNews extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id', 'id');
    }
    public function writer()
    {
        return $this->belongsTo(SuperAdmin::class, 'author', 'id');
    }
}

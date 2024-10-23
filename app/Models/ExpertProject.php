<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertProject extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(ExpertProjectCategory::class, 'category_id', 'id');
    }
}

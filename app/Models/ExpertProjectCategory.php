<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertProjectCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function projects()
    {
        return $this->hasMany(ExpertProject::class, 'category_id', 'id');
    }
}

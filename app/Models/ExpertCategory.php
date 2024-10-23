<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function experts()
    {
        return $this->HasMany(Expert::class, 'designation', 'id');
    }
}

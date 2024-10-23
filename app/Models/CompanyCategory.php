<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CompanyCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function companies()
    {
        return $this->HasMany(Company::class, 'category', 'id');
    }
}

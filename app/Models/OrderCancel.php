<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCancel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo(Company::class, 'agent_id', 'id');
    }
    
    public function admin()
    {
        return $this->belongsTo(SuperAdmin::class, 'super_admin_id', 'id');
    }
}

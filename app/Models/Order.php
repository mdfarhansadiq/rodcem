<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function order_location()
    {
        return $this->hasOne(OrderLocation::class);
    }

    public function order_cancel()
    {
        return $this->hasOne(OrderCancel::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function payment_slip()
    {
        return $this->hasOne(PaymentSlip::class, 'order_id', 'id');
    }

    public function client()
    {
        return $this->hasOne(AgentClient::class, 'order_id', 'id');
    }
}

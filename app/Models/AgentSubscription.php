<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentSubscription extends Model
{
    use HasFactory;
    protected $guraded = ['id'];

    public function subscriptionType()
    {
        return $this->belongsTo(SubscriptionType::class, 'subscription_type', 'id');
    }
}

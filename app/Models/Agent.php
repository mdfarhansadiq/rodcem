<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Agent extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'email',
        'phone_number',
        'password',
        'city',
        'gender',
        'dob',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function location()
    {
        return $this->hasOne(AgentLocation::class, 'agent_id', 'id');
    }

    public function present_info()
    {
        return $this->hasOne(AgentPresentInfo::class, 'agent_id', 'id');
    }

    public function parmanent_info()
    {
        return $this->hasOne(AgentParmanentInfo::class, 'agent_id', 'id');
    }

    public function nominee_info()
    {
        return $this->hasOne(AgentNomineeInfo::class, 'agent_id', 'id');
    }

    public function shop_info()
    {
        return $this->hasOne(AgentShopInfo::class, 'agent_id', 'id');
    }

    public function agent_banner()
    {
        return $this->hasOne(AgentBanner::class, 'agent_id', 'id');
    }

    public function agent_about()
    {
        return $this->hasOne(AgentAbout::class, 'agent_id', 'id');
    }

    public function agent_image()
    {
        return $this->hasOne(AgentImage::class, 'agent_id', 'id');
    }

    public function agent_chooes()
    {
        return $this->hasMany(AgentChooseUs::class, 'agent_id', 'id');
    }

    public function agent_contacts()
    {
        return $this->hasMany(AgentContact::class, 'agent_id', 'id');
    }

    //visitor log
    public function agentVisit()
    {
        return $this->hasMany(VisitorLog::class, 'user_id')->where('guard', 'agent');
    }

}


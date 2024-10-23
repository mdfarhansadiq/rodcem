<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Expert extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    public function location()
    {
        return $this->hasOne(ExpertLocation::class, 'expert_id', 'id');
    }

    public function expert_designation()
    {
        return $this->belongsTo(ExpertCategory::class, 'designation', 'id');
    }

    public function banner()
    {
        return $this->hasOne(ExpertBanner::class, 'expert_id', 'id');
    }

    public function about()
    {
        return $this->hasOne(ExpertAbout::class, 'expert_id', 'id');
    }

    public function educational_qualifiction()
    {
        return $this->hasMany(ExpertEducation::class, 'expert_id', 'id');
    }

    public function  experience()
    {
        return $this->hasMany(ExpertExperience::class, 'expert_id', 'id');
    }

    public function  services()
    {
        return $this->hasMany(ExpertService::class, 'expert_id', 'id');
    }

    public function  project_category()
    {
        return $this->hasMany(ExpertProjectCategory::class, 'expert_id', 'id');
    }

    public function  project()
    {
        return $this->hasMany(ExpertProject::class, 'expert_id', 'id');
    }

    public function  expert_portfolio()
    {
        return $this->hasMany(ExpertPortfolio::class, 'expert_id', 'id');
    }

    public function serviceZone()
    {
        return $this->belongsTo(District::class, 'service_zone', 'id');
    }
}

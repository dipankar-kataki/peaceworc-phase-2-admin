<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
        'password',
        'role',
        'otp',
        'otp_validity',
        'is_otp_verified',
        'is_agreed_to_terms',
        'fcm_token',
        'lat',
        'long',
        'email_verified_at'
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

    public function agencyProfile(){
        return $this->hasOne(AgencyProfileRegistration::class, 'user_id', 'id');
    }

    
    public function agencyProfileStatus(){
        return $this->hasOne(AgencyInformationStatus::class, 'user_id', 'id')->select(['user_id', 'is_business_info_complete', 'is_other_info_added', 'is_authorize_info_added', 'is_profile_approved']);
    }

    public function authOfficer(){
        return $this->hasMany(AuthorizeOfficer::class, 'agency_id', 'id');
    }
}




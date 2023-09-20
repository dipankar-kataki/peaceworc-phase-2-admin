<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyPostJob extends Model
{
    use HasFactory;

    protected $table = 'agency_post_jobs';

    protected $guarded = [];

    public function agencyProfile(){
        return $this->hasOne(AgencyProfileRegistration::class, 'user_id', 'user_id');
    }

    public function clientProfile(){
        return $this->hasOne(ClientProfile::class, 'agency_id', 'user_id');
    }

}

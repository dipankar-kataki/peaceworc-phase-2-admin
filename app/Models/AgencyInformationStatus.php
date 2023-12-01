<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyInformationStatus extends Model
{
    use HasFactory;

    protected $table = 'agency_information_statuses';

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function agencyProfile(){
        return $this->belongsTo(AgencyProfileRegistration::class, 'user_id', 'user_id');
    }
}

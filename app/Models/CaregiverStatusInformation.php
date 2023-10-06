<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaregiverStatusInformation extends Model
{
    use HasFactory;

    protected $table = 'caregiver_status_information';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function caregiverProfile(){
        return $this->belongsTo(CaregiverProfileRegistration::class, 'user_id', 'user_id');
    }
}

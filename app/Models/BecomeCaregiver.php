<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomeCaregiver extends Model
{
    use HasFactory;

    protected $table = 'become_caregivers';

    protected $guarded = [];

    public function getDutiesAndResponsibilitiesAttribute($value){
        return json_decode($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BecomeAgency extends Model
{
    use HasFactory;

    protected $table = 'become_agencies';

    protected $guarded = [];

    public function getDutiesAndResponsibilitiesAttribute($value){
        return json_decode($value);
    }
}

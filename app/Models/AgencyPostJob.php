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

    public function getStatusAttribute($value){
        if($value == 0){
            return 'Not Posted';
        }else if($value == 1){
            return 'Open Job';
        }else if($value == 2){
            return 'Ongoing Job';
        }else if($value == 3){
            return 'Completed Job';
        }else if($value == 4){
            return 'Closed';
        }else if($value == 5){
            return 'Pending';
        }else if($value == 6){
            return 'Bidding Started';
        }else if($value == 7){
            return 'Bidding Ended';
        }else if($value == 8){
            return 'Quick Call';
        }else if($value == 9){
            return 'On Hold';
        }else if($value == 10){
            return 'Upcoming';
        }else if($value == 11){
            return 'Cancelled';
        }else if($value == 12){
            return 'Expired';
        }else if($value == 13){
            return 'Deleted';
        }else if($value == 14){
            return 'Not Started';
        }else if($value == 15){
            return 'Not Accepted';
        }
    }

    public function jobAcceptedBy(){
        return $this->hasOne(AcceptJob::class, 'job_id', 'id');
    }
}

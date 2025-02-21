<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifcation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user_details(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function referralName()
    {
        return $this->belongsTo(Referral::class, 'referral_id', 'id')
            ->selectRaw("referrals.id, CONCAT(first_name, ' ', last_name) as referral_name");
    }
}

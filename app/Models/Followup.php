<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{

    use HasFactory;
   protected $guarded = [];
    public function lead()
    {
        return $this->belongsTo(Referral::class,'to','id')->withDefault();
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'from','id')->withDefault();
    }
    public function employee()
    {
        return $this->belongsTo(User::class,'to','id')->withDefault();
    }

    public function referral()
    {
        return $this->belongsTo(Referral::class,'referral_id','id')->withDefault();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'from', 'id')->withDefault();
    }

}

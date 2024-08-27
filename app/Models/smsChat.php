<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class smsChat extends Model
{
    use HasFactory;
    public function messageToName(){
        return $this->belongsTo(Referral::class, 'to', 'id');
    }
}

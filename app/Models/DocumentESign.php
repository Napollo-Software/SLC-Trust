<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentESign extends Model
{
    use HasFactory;
    public function user_details(){
        return $this->belongsTo(User::class,'name','id');
    }
    public function approver(){
        return $this->belongsTo(User::class,'approved','id');
    }
}

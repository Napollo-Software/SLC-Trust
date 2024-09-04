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
}

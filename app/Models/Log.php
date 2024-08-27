<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';

    public function action_performed_by(){
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function action_performed_against(){
        return $this->belongsTo(User::class, 'to', 'id');
    }
}

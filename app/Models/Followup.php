<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{

    use HasFactory;
   protected $fillable = [
        'id',
        'leadId',
        'from',
        'to',
        'date',
        'time',
        'note',
        'type',
        'completed',
        'created_at',
        'updated_at',
        'completed_by'
    ];
    public function lead()
    {
        return $this->belongsTo(Referral::class,'to','id')->withDefault();
    }
    public function employee()
    {
        return $this->belongsTo(User::class,'to','id')->withDefault();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'from', 'id')->withDefault();
    }

}

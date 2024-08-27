<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'referral_id',
        'approved_by',
        'actual_url',
        'uploaded_url',
        'actual_document',
        'created_by',
        'updated_by',
    ];
    public function approvedBy()
    {
        return $this->belongsTo(User::class,'approved_by','id')->withDefault();
    }

    public function name(){
        return str_replace('.pdf','',$this->name);
    }
}

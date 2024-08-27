<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use VPominchuk\ModelUseIndex;
use Carbon;

class Archive extends Model
{
    use ModelUseIndex;
    use HasFactory;
    protected $fillable = ['matter','payee','description','account','split_account','deposit','payment','balance','created_at'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::parse($date)->format('m-d-Y');
    }
}

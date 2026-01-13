<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class contacts extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $appends = ['designation'];

    public function getCreatedAtAttribute($date)
    {
        return date('m/d/Y', strtotime($date));
    }

    public function getUpdatedAtAttribute($date)
    {
        return date('m/d/Y', strtotime($date));
    }

    public function getDesignationAttribute()
    {
        // Check if 'designation' key exists in $this->attributes
        if (array_key_exists('designation', $this->attributes)) {
            $type = Type::find($this->attributes['designation']);
            return $type ? $type : 'N/A';
        }

        return 'N/A'; // Default value if 'designation' key is not found
    }


    public function getCreatedByAttribute()
    {
        $User = User::find($this->attributes['created_by']);
        return $User ? $User->name : 'N/A';
    }
    public function getAccountAttribute($date)
    {
        $account = User::find($this->attributes['account']);
        return $account ? $account : 'N/A';
    }
    public function account_details()
    {
        return $this->belongsTo(User::class, 'account', 'id');
    }
    public function designation_details()
    {
        return $this->belongsTo(Type::class, 'designation', 'id');
    }
    public function user_report()
    {
        return $this->belongsTo(User::class, 'account', 'id');
    }
    public function vendor_types()
    {
        return $this->belongsTo(Type::class, 'designation');
    }
    public function created_by_name()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function leads()
    {
        return $this->hasMany(Lead::class, 'source', 'id');
    }
    public function referrals()
    {
        return $this->hasMany(Referral::class, 'source', 'id');
    }

    public function full_name()
    {
        return $this->fname . ' ' . $this->lname;
    }
}

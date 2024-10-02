<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Claim;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasFactory, HasRoles;
    protected $guarded = [];

    const Pending = 'Pending';

    const Approved = 'Approved';

    public function calims()
    {
        return $this->hasMany(Claim::class, 'claim_user');
    }
    public function full_name(){
        return "{$this->name} {$this->last_name}";
    }
    public function getAvatarAttribute($value)
    {
        if ($value) {
            return asset('user/images' . $value);
        } else {
            return url('default-profile.png');
        }
    }
    public function followUps()
    {
        return $this->belongsTo(FollowUp::class, 'to', 'id');
    }

    public function vendor_types()
    {
        return $this->belongsTo(Type::class, 'vendor_type', 'id');
    }
    public function contacts()
    {
        return $this->hasMany(contacts::class, 'account', 'id');
    }
    public function leads()
    {
        return $this->hasMany(Lead::class, 'source', 'id');
    }
    public function referrals()
    {
        return $this->hasMany(Referral::class, 'source', 'id');
    }
    public function getCreatedAtAttribute($date)
    {
        return date('m-d-Y', strtotime($date));
    }
    public function getUpdatedAtAttribute($date)
    {
        return date('m-d-Y', strtotime($date));
    }
    public function trasactions(){
        return Transaction::where('user_id', '1009')->where('chart_of_account', null)->get();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

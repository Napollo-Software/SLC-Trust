<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function full_name()
    {
        return "{$this->contact_first_name} {$this->contact_last_name}";
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }

    public function referrals()
    {
        return $this->belongsTo(Referral::class, 'source', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(contacts::class, 'source_id', 'id');
    }

    public function contact_source()
    {
        return $this->belongsTo(contacts::class, 'source', 'id');
    }

    public function accounts_source()
    {
        return $this->belongsTo(User::class, 'source', 'id');
    }

    public function lead_id()
    {
        return $this->belongsTo(Followup::class, 'id', 'leadId');
    }

    public function type_id()
    {
        return $this->belongsTo(Type::class, 'case_type_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'case_type_id', 'id');
    }

    public function source()
    {
        if ($this->source_type == 'contact') {
            return $this->belongsTo(contacts::class, 'source', 'id');
        } elseif ($this->source_type == 'account') {
            return $this->belongsTo(User::class, 'source', 'id');
        }
        return "N/A";
    }
    public function getCreatedAtAttribute($date)
    {
        return date('m-d-Y', strtotime($date));
    }
    public function getUpdatedAtAttribute($date)
    {
        return date('m-d-Y', strtotime($date));
    }
    public function getSourceAttribute()
    {
        $id = $this->attributes['source'];
        if ($this->source_type == 'contact') {
            $source = contacts::find($id);
        } else  {
            $source = User::find($id);
        }

        return $source ? $source : ($id !== null ? $id : 'N/A');
    }


    public function getVendorIdAttribute()
    {
        $vendor = User::find($this->attributes['vendor_id']);
        return $vendor ? $vendor->name : 'N/A';
    }
    public function followups()
    {
        return $this->hasMany(Followup::class, 'leadId', 'id');
    }
    public function get_followup()
    {
        return $this->hasMany(Followup::class, 'to', 'id');
    }
}

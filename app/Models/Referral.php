<?php

namespace App\Models;

use App\Models\CheckList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'gender',
        'age',
        'phone_number',
        'date_of_birth',
        'address',
        'city',
        'state',
        'zip_code',
        'fax',
        'ext_number',
        'country',
        'designation',
        'medicaid_plan',
        'patient_ssn',
        'apt_suite',
        'account',
        'name_of_practice',
        'emergency_apt_suite',
        'patient_language',
        'referral_id',
        'status',
        'source',
        'source_type',
        'admission_date',
        'medicaid_number',
        'medicare_number',
        'marketer',
        'intake',
        'case_type',
        'created_by',
        'created_at',
        'updated_at',
    ];
    protected $appends = ['case_type'];
    public function getCreatedAtAttribute($date)
    {
        return date('m-d-Y', strtotime($date));
    }
    public function getUpdatedAtAttribute($date)
    {
        return date('m-d-Y', strtotime($date));
    }
    public function getCaseTypeAttribute()
    {
        // Check if 'case_type' key exists in the attributes array
        if (array_key_exists('case_type', $this->attributes)) {
            $type = Type::find($this->attributes['case_type']);
            return $type ? $type->name : 'N/A';
        } else {
            return 'N/A';
        }
    }

    public function getIntakeAttribute()
    {
        $intake = User::find($this->attributes['intake']);
        return $intake ? $intake->name : 'N/A';
    }
    public function getmarketerAttribute()
    {
        $marketer = User::find($this->attributes['marketer']);
        return $marketer ? $marketer->name : 'N/A';
    }
    public function getCreatedByAttribute()
    {
        $type = User::find($this->attributes['created_by']);
        return $type ? $type->name : 'N/A';
    }
    public function refferals_check()
    {
        return $this->belongsTo(CheckList::class, 'id', 'referral_id');
    }
    public function referrralDocuments()
    {
        return $this->belongsTo(Documents::class, 'id', 'referral_id');
    }
    public function full_name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function contact_source()
    {
        return $this->belongsTo(contacts::class, 'source', 'id');
    }
    public function accounts_source()
    {
        return $this->belongsTo(User::class, 'source', 'id');
    }
    public function get_followup()
    {
        return $this->hasMany(Followup::class, 'to', 'id');
    }
    public function get_uploaded_documents()
    {
        return $this->hasMany(Documents::class, 'referral_id', 'id');
    }
    public function referral_phy()
    {
        return $this->belongsTo(Physician::class, 'id', 'referral_name')->withDefault();
    }
    public function referral_medcaid()
    {
        return $this->belongsTo(Medicaid::class, 'id', 'referral_name')->withDefault();
    }
    public function emergency_details()
    {
        return $this->belongsTo(EmergencyContacts::class, 'id', 'referral_id')->withDefault();
    }
    public function intakeName()
    {
        return $this->belongsTo(User::class, 'intake', 'id')->withDefault();
    }
    public function marketerName()
    {
        return $this->belongsTo(User::class, 'marketer', 'id')->withDefault();
    }
    public function caseType()
    {
        return $this->belongsTo(Type::class, 'case_type', 'id')->withDefault();
    }
    public function referralCreatedBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault();
    }
    public function referralFollowup()
    {
        return $this->belongsTo(Followup::class, 'id', 'to')->withDefault();
    }
    public function leads()
    {
        return $this->belongsTo(Lead::class, 'id', 'source');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'convert_to_customer','id');
    }

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class)->withDefault();
    }
}

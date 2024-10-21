<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const MaintenanceFee = "maintenance_fee";
    const Deposit = "deposit";
    const EnrollmentFee = "enrollment_fee";
    const RenewalFee = "renewal_fee";
    const Adjustment = "adjustment";

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

}

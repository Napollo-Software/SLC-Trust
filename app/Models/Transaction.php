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

    protected $fillable = [
        "type",
        "credit",
        "debit",
        "status",
        "user_id",
        "reference_id",
        "description",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}

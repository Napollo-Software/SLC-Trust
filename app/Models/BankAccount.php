<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bank_name',
        'routing_aba',
        'referral_id',
        'account_type',
        'billing_cycle',
        'surplus_amount',
        'account_number',
    ];
}

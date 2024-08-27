<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Claim extends Model
{
	protected $table = 'claims';
    use SoftDeletes;
    public function user_details(){
        return $this->belongsTo(User::class,'claim_user','id');
    }
	public function log_details(){
		return $this->belongsTo(Log::class,'archived','id');
	}
	public function transaction_details(){
		return $this->belongsTo(Transaction::class,'id','bill_id');
	}
	public function category_details(){
		return $this->belongsTo(Category::class, 'claim_category','id');
	}
	public function payee_details(){
		return $this->belongsTo(PayeeModel::class,'payee_name','id');
	}
	public function secondary_bills(){
		return Claim::where('recurred',$this->id)->get(['id','created_at']);
	}
    use HasFactory;
    protected $fillable = [
    	'claim_title',
    	'expense_date',
    	'claim_description',
    	'claim_category',
    	'claim_amount',
    	'claim_bill_attachment',
    	'payment_method',
    	'claim_status',
    	'claim_user',
        'recurring_bill',
		'recurring_day'
    ];
}

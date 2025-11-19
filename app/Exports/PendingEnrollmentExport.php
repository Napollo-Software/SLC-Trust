<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\DB;

class PendingEnrollmentExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        if (empty($this->filters['status'])) {
            return collect([]);
        }

        $transactionType = 'enrollment_fee';

        $query = User::leftJoin('transactions', function ($join) use ($transactionType) {
                $join->on('users.id', '=', 'transactions.user_id')
                     ->where('transactions.type', $transactionType);
            })
            ->select(
                'users.id',
                DB::raw('CONCAT(users.name, " ", users.last_name) as full_name'),
                'users.billing_cycle',
                'users.surplus_amount',
                DB::raw('COALESCE(SUM(transactions.credit),0) as total_credit'),
                DB::raw('COALESCE(SUM(transactions.debit),0) as total_debit'),
                DB::raw('CASE WHEN SUM(transactions.id) > 0 THEN "Received" ELSE "Pending" END as amount_status')
            )
            ->where('users.account_status', 'Approved')
            ->where('users.role', 'User')
            ->groupBy(
                'users.id',
                'users.name',
                'users.last_name',
                'users.billing_cycle',
                'users.surplus_amount'
            );

        // Status filter
        if (!empty($this->filters['status'])) {
            if ($this->filters['status'] === 'done') {
                $query->having('amount_status', 'Received');
            } elseif ($this->filters['status'] === 'pending') {
                $query->having('amount_status', 'Pending');
            }
            // 'all' → no filter
        } else {
            $query->having('amount_status', 'Pending'); // default
        }

        $users = $query->get();

        // Calculate balance
        foreach ($users as $user) {
            $user->balance = $user->total_credit - $user->total_debit;
        }

        return $users;
    }

    public function headings(): array
    {
        return [
            'Client ID',
            'Full Name',
            'Billing Cycle',
            'Balance',
            'Amount Status',
            'Surplus Amount'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->full_name,
            $user->billing_cycle,
            number_format((float) $user->balance, 2, '.', ','),
            $user->amount_status,
            number_format((float) $user->surplus_amount, 2, '.', ',')
        ];
    }
}

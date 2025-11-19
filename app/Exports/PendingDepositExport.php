<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PendingDepositExport implements FromCollection, WithHeadings, WithMapping
{
    protected $filters;

    public function __construct($filters)
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        if (empty($this->filters['billing_cycle']) && empty($this->filters['status'])) {
            return collect([]);
        }

        $query = User::with(['transactions' => function($query) {
            $query->selectRaw('user_id, sum(credit) as total_credit, sum(debit) as total_debit')
                  ->groupBy('user_id');
        }]);

        if (!empty($this->filters['billing_cycle']) && is_array($this->filters['billing_cycle'])) {
            $query->whereIn('billing_cycle', $this->filters['billing_cycle']);
        }

        if (!empty($this->filters['status'])) {
            if ($this->filters['status'] === 'done') {
                $query->whereHas('transactions', function ($q) {
                    $q->where('type', 'deposit');
                });
            } else {
                $query->whereDoesntHave('transactions', function ($q) {
                    $q->where('type', 'deposit');
                });
            }
        }

        $query->where('account_status', 'Approved')->where('role', 'User');

        $users = $query->get();

        foreach ($users as $user) {
            $credit = $user->transactions->sum('total_credit');
            $debit  = $user->transactions->sum('total_debit');
            $user->balance = $credit - $debit;
        }

        return $users;
    }

    public function headings(): array
    {
        return [ 'Client ID', 'Name', 'Billing Cycle', 'Balance', 'Surplus Amount'];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->billing_cycle_title,
            number_format((float) $user->balance, 2, '.', ','),
            number_format((float) $user->surplus_amount, 2, '.', ',')
        ];
    }
}

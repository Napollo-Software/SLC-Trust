<?php
namespace App\Exports;

use App\Models\Claim;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PendingBillExport implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    public function collection()
    {
        $result = [];

        $claims = Claim::where(['claim_status' => 'Pending', 'archived' => null])->get();

        $claims = Claim::with([
            'user',
            'payee',
            'category',
            'parentbill',
        ])
            ->whereHas('user')
            ->whereNull('archived')->where('claim_status', 'Pending')->get();

        foreach ($claims as $claim) {

            $payee    = $claim->payee?->name;
            $user     = $claim->user;
            $category = $claim->category;

            $userBalance  = userBalance($user->id);
            $user_balance = ($userBalance == "N/A") ? '0' : $userBalance;
            $user_name    = "{$user->name} {$user->last_name}";

            $type = 'One Time';

            if ($claim->recurring_bill == 1 || ($claim->recurred && $claim->parentbill && $claim->parentbill->recurring_bill == 1)) {
                $type = 'Recurring';
            }

            $result[] = [
                'Bill Id'  => $claim->id,
                'User'     => $user_name,
                'Date'     => $claim->created_at,
                'Category' => $category->category_name,
                'Payee'    => $payee,
                'Account'  => "A.C# {$claim->account_number}",
                'Status'           => $claim->claim_status,
                'Bill Amount ($)'  => $claim->claim_amount,
                'User Balance ($)' => $user_balance,
                'Bill Type'        => $type,
                'Paid Amount ($)'  => '',
                'Payment Method'   => '',
                'Payment Number'   => '',
            ];
        }
        return collect($result);
    }
    public function headings(): array
    {
        return [
            'Bill Id',
            'User',
            'Date',
            'Category',
            'Payee',
            'Account',
            'Status (You can either Approved ,Partially Approve or Reject bills )',
            'Bill Amount ($)',
            'User Balance ($)',
            'Bill Type',
            'Paid Amount ($)',
            'Payment method (ACH,Card,Cheque Payment)',
            'Payment Number',
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $headerRange = 'A1:' . $sheet->getHighestColumn() . '1';

                $sheet->getStyle($headerRange)->applyFromArray([
                    'font'      => [
                        'bold'  => true,
                        'color' => ['argb' => 'FFFFFFFF'],
                        'size'  => 11,
                    ],
                    'fill'      => [
                        'fillType'   => Fill::FILL_SOLID,
                        'startColor' => ['argb' => 'FF000000'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $sheet->freezePane('A2');
            },
        ];
    }
}

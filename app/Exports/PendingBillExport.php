<?php

namespace App\Exports;

use App\Models\Claim;
use App\Models\User;
use App\Models\PayeeModel;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Style\Fill;


class PendingBillExport implements FromCollection,WithHeadings, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $result = array();
        $claims = Claim::where([
            'claim_status'=>'Pending',
            'archived'=> null
        ])->get();
        foreach($claims as $claim){
            $payee = PayeeModel::find($claim->payee_name);
            if($payee){
                $payee = $payee->name;
            }
            $user = User::where([
                ['id','=',$claim->claim_user],
            ])->first();
            if($user){
                $user_name = $user->name.' '.$user->last_name;
                $user_balance = userBalance($user->id);

            $category = Category::find($claim->claim_category);
            $result[] = array(
                'Bill Id' => $claim->id,
                'User' => $user_name,
                'Date' => $claim->created_at,
                'Category'=> $category->category_name,
                'Payee' => $payee,
                'Account' => $claim->account_number,
                'Status' => $claim->claim_status,
                'Bill Amount ($)'=> $claim->claim_amount,
                'User Balance ($)' => $user_balance,
            );
        }
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
            'Paid Amount ($)',
            'Payment method (ACH,Card,Check Payment)',
            'Payment Number'

        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                $sheet->getStyle('A1:L1')
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('2ECFDE');

                $dropdownOptions = '"Approved,Partially Approve,Reject"';

                $highestRow = $sheet->getHighestRow();

                for ($row = 2; $row <= $highestRow; $row++) {
                    $validation = $sheet->getCell("G$row")->getDataValidation();
                    $validation->setType(DataValidation::TYPE_LIST);
                    $validation->setErrorStyle(DataValidation::STYLE_INFORMATION);
                    $validation->setAllowBlank(false);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setShowDropDown(true);
                    $validation->setFormula1($dropdownOptions);
                }
            },
        ];
    }
}

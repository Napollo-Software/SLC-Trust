<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use Carbon\Carbon;
class Users implements FromCollection, WithHeadings, WithEvents, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $result = array();
        $users = User::where('role','User')->where('account_status','Approved')->get();
        foreach($users as $k=>$user){
            $result[] = array(
                'Id' => $user->id,
                // 'Date (mm/dd/yyyy)' => Carbon::now()->format('m/d/Y'),
                'Date (mm/dd/yyyy)' =>'',
                'Client Name' => $user->name.' '.$user->last_name,
                'Amount' => '0',
                'Maintenance fee' => '0',
                'Client Balance' => $user->user_balance
            );
        }
        return collect($result);
    }

    public function headings(): array
    {
        return [
            'Id',
            'Date (mm/dd/yyyy)',
            'Client Name',
            'Amount',
            'Maintenance fee',
            'Client Balance',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:F1')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('2ecfde');
                
                // Protecting the 'Id' column to make it uneditable
                $event->sheet->getDelegate()->getStyle('A:A')
                    ->getProtection()
                    ->setLocked(Protection::PROTECTION_PROTECTED);
            },
        ];
    }
}

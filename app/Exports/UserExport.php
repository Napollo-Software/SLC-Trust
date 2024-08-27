<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'Referral ID',
            'Referral Patient First Name',
            'Referral Patient Last Name',
            'Referral Patient Email',
            'Referral Patient Email 2',
            'Referral Patient Email 3',
            'Referral Patient Phone',
            'Referral Patient Phone 2',
            'Referral Patient Cell',
            'Referral Patient DOB.Year',
            'Referral Patient DOB.Month',
            'Referral Patient DOB.Day',
            'Referral Patient DOB (Full)',
            'Referral Patient Age',
            'Referral Patient SSN',
            'Referral Patient Language',
            'Referral Other Language',
            'Referral Patient Gender',
            'Referral Patient Address 1',
            'Referral Patient Address 2',
            'Referral Patient Zipcode',
            'Referral Patient City',
            'Referral Patient State',
            'Referral Intake Status',
            'Referral Patient Status',
            'Referral Marketer',
            'Referral Intake Coordinator',
            'Referral Case Potential',
            'Referral Projected Date.Year',
            'Referral Projected Date.Month',
            'Referral Projected Date.Day',
            'Referral Projected Date (Full)',
            'Referral Admitted Date.Year',
            'Referral Admitted Date.Month',
            'Referral Admitted Date.Day',
            'Referral Admitted Date (Full)',
            'Referral Follow Up Date.Year',
            'Referral Follow Up Date.Month',
            'Referral Follow Up Date.Day',
            'Referral Follow Up Date (Full)',
            'Referral Follow Up Time',
            'Referral Follow Up Note',
            'Referral Lost Date.Year',
            'Referral Lost Date.Month',
            'Referral Lost Date.Day',
            'Referral Lost Date (Full)',
            'Referral Lost Reason',
            'Referral Created Date.Year',
            'Referral Created Date.Month',
            'Referral Created Date.Day',
            'Referral Created Date (Full)',
            'Referral Created By',
            'Referral Additional Address #2 Full Address',
            'Referral Additional Address #2 Address',
            'Referral Additional Address #2 Zipcode',
            'Referral Additional Address #2 City',
            'Referral Additional Address #2 State',
            'Referral Additional Address #2 APT / SUITE',
            'Referral Additional Address #2 Address Type',
            'Enrollment Date',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('id' ,null)->get();

    }
}

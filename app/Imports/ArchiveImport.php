<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Archive;
use \PhpOffice\PhpSpreadsheet\Shared\Date;

class ArchiveImport implements ToModel, WithStartRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Archive([
            'created_at' => Date::excelToDateTimeObject($row[0]),
            'matter' => $row[2],
            'payee' => $row[4],
            'description' => $row[5],
            'account' => $row[6],
            'split_account' => $row[7],
            'deposit' => $row[8],
            'payment' => $row[9],
            'balance' => $row[10]
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}

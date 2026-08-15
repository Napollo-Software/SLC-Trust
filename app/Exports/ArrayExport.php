<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArrayExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected array $headings;
    protected Collection $rows;

    public function __construct(array $headings, Collection $rows)
    {
        $this->headings = $headings;
        $this->rows     = $rows;
    }

    public function collection()
    {
        return $this->rows;
    }

    public function headings(): array
    {
        return $this->headings;
    }
}

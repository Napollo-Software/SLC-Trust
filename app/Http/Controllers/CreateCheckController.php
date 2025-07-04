<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CreateCheckController extends Controller
{
    public function submitForms(Request $request)
    {
        $formDataArray = [];

        foreach ($request->number as $k => $data) {
            $formDataArray[] = [
                'checkNumber'    => $request->number[$k] ?? null,
                'checkDate'      => $request->date[$k] ?? null,
                'user'           => $request->user[$k] ?? null,
                'amountInNumber' => $request->amount_in_number[$k] ?? null,
                'amountInWord'   => $request->amount_in_word[$k] ?? null,
                'memo'           => $request->memo[$k] ?? null,
            ];
        }

        $pdf = PDF::loadView('reports.printCheck', compact('formDataArray'));

        return $pdf->download('check_report.pdf');
    }
}

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
                'checkDate'      => date('M/D/Y', strtotime($request->date[$k])) ?? null,
                'user'           => $request->user[$k] ?? null,
                'amountInNumber' => $request->amount_in_number[$k] ?? null,
                'amountInWord'   => $request->amount_in_word[$k] ?? null,
                'memo'           => $request->memo[$k] ?? null,
                'accountNumber'  => $request->accountNumber[$k] ?? null,
                'bankName'       => $request->bankName[$k] ?? null,
            ];
        }

        $pdf = PDF::loadView('reports.printCheck', compact('formDataArray'));

        return $pdf->download('check_report.pdf');
    }
}

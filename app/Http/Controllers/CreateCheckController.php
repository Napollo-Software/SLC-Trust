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
                'checkNumber'    => $request->number[$k],
                'checkDate'      => $request->date[$k],
                'user'           => $request->user[$k],
                'amountInNumber' => $request->amount_in_number[$k],
                'amountInWord'   => $request->amount_in_word[$k],
                'memo'           => $request->memo[$k],
            ];
        }
        $pdf = PDF::loadView('reports.printCheck', compact('formDataArray'));
        return $pdf->download('check_report.pdf');
    }
}

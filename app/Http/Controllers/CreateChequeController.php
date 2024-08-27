<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class CreateChequeController extends Controller
{
    public function submitForms(Request $request)
    {

        $formDataArray=[];
        foreach($request->number as $k=>$data){
            $formDataArray[]=[
                'chequeNumber'=>$request->number[$k],
                'payee'=>$request->payee[$k],
                'chequeDate'=>$request->date[$k],
                'user'=>$request->user[$k],
                'amountInNumber'=>$request->amount_in_number[$k],
                'amountInWord'=>$request->amount_in_word[$k],
                'memo'=>$request->memo[$k],
            ];
        }
        $pdf = PDF::loadView('reports.printCheque', compact('formDataArray'));
        return $pdf->download('cheque_report.pdf');
    }
}

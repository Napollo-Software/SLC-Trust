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
            $rawAmount = $request->amount_in_number[$k] ?? null;

            $formDataArray[] = [
                'checkNumber'    => $request->number[$k] ?? null,
                'checkDate'      => $request->date[$k] ? date('m/d/Y', strtotime($request->date[$k])) : null,
                'user'           => $request->user[$k] ?? null,
                'amountInNumber' => $rawAmount,
                'amountInWord'   => $request->amount_in_word[$k] ?? null,
                'memo'           => $request->memo[$k] ?? null,
                'routingNumber'  => $request->routingNumber[$k] ?? null,
                'accountNumber'  => $request->accountNumber[$k] ?? null,
                'bankName'       => $request->bankName[$k] ?? null,
                'signature'      => $request->signature[$k] ?? null,
                'addressLine1'   => $request->addressLine1[$k] ?? null,
                'addressLine2'   => $request->addressLine2[$k] ?? null,
                'addressLine3'   => $request->addressLine3[$k] ?? null,
            ];
        }


        // Generate PDF
        $pdf = Pdf::loadView('reports.printCheck', compact('formDataArray'));

        return $pdf->download('checks_report' . date('m/d/Y') . '.pdf');
    }
}
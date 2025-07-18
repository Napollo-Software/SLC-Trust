<?php
namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CreateCheckController extends Controller
{
    public function submitForms(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'number'             => 'required|array',
            'number.*'           => 'required|integer|min:1|max:9999999|distinct',
            'date'               => 'required|array',
            'date.*'             => 'required|date|before_or_equal:today',
            'user'               => 'required|array',
            'user.*'             => 'required|string|max:255',
            'amount_in_number'   => 'required|array',
            'amount_in_number.*' => 'required|numeric|min:0.01|max:10000000',
            'amount_in_word'     => 'required|array',
            'amount_in_word.*'   => 'required|string|max:65|regex:/^[A-Za-z\s]+$/',
            'memo'               => 'nullable|array',
            'memo.*'             => 'nullable|string|max:65',
            'routingNumber'      => 'required|array',
            'routingNumber.*'    => 'required|string|regex:/^\d{9}$/',
            'accountNumber'      => 'required|array',
            'accountNumber.*'    => 'required|string|regex:/^\d{1,17}$/',
            'bankCheckNumber'    => 'required|array',
            'bankCheckNumber.*'  => 'required|string|regex:/^\d{6}$/',
            'bankName'           => 'nullable|array',
            'bankName.*'         => 'nullable|string|max:50',
            'signature'          => 'nullable|array',
            'signature.*'        => 'nullable|string|max:50',
        ]);

        // Prepare form data array for PDF
        $formDataArray = [];
        foreach ($request->number as $k => $data) {
            $formDataArray[] = [
                'checkNumber'     => $request->number[$k] ?? null,
                'checkDate'       => date('m/d/Y', strtotime($request->date[$k])) ?? null,
                'user'            => $request->user[$k] ?? null,
                'amountInNumber'  => number_format($request->amount_in_number[$k], 2) ?? null,
                'amountInWord'    => $request->amount_in_word[$k] ?? null,
                'memo'            => $request->memo[$k] ?? null,
                'routingNumber'   => $request->routingNumber[$k] ?? null,
                'accountNumber'   => $request->accountNumber[$k] ?? null,
                'bankCheckNumber' => $request->bankCheckNumber[$k] ?? null,
                'bankName'        => $request->bankName[$k] ?? null,
                'signature'       => $request->signature[$k] ?? null,
            ];
        }

        // Generate PDF
        $pdf = Pdf::loadView('reports.printCheck', compact('formDataArray'));

        return $pdf->download('check_report.pdf');
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transactions Notifications</title>
    <style>
        @font-face {
            font-family: 'Poppins-Regular';
            src: url('fonts/Poppins-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Poppins-Medium';
            src: url('fonts/Poppins-Medium.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Poppins-SemiBold';
            src: url('fonts/Poppins-SemiBold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Poppins-Bold';
            src: url('fonts/Poppins-Bold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Poppins-Italic';
            src: url('fonts/Poppins-Italic.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Poppins-ExtraBold';
            src: url('fonts/Poppins-ExtraBold.ttf') format('truetype');
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        * {
            font-size: 12px;

        }

        .row-container {

            align-items: center;
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        .footer-table {
            display: table;
            width: 100%;
            margin: 0 auto;
        }

        .footer-row {
            display: table-row;
        }

        .footer-cell {
            display: table-cell;
            padding: 10px 20px;
            vertical-align: middle;
            text-align: center;
        }

        .footer-cell-1 {
            display: table-cell;
            padding: 10px 20px;
            vertical-align: middle;
            text-align: left;
        }

        .footer-cell2 {
            display: table-cell;
            padding: 10px 20px;
            vertical-align: middle;
            text-align: right;
        }

        .footer-cell img {
            display: block;
            margin: 0 auto 10px;
            width: 24px;
            height: 24px;
        }

        .footer-cell p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        footer img {
            width: 25px;
            height: 25px;
        }

    </style>
</head>
<body>
    <div style="position: relative;height:100%;background-image: url('{{ public_path("images/jbg2.png") }}');background-size: cover;background-repeat: no-repeat;background-position: center;width:100%">
        <div class="row-container">
            <h4>
                <img src="{{ public_path('images/new_logo.png') }}" alt="int" width="180px">
            </h4>
        </div>
        <div>
            <div>
                <p style="text-align: center;font-size: 30px;margin-top:0;margin-bottom: 0;font-family: Poppins-Bold;line-height:1">
                    Senior Life Care
                </p>
                <p style="text-align: center;font-family: 'Poppins-Regular';font-size:14px;margin:0;line-height:1">VERIFICATION OF DEPOSITS</p>

            </div>
            <div>
                <div>
                    <div style="text-align:right;margin-right:15px">
                        <p style="line-height: 0.8;margin:0;font-family: 'Poppins-SemiBold'">Date: {{ date('m/d/Y') }}</p>
                        <p style="line-height: 0.8;margin:0;font-family: 'Poppins-SemiBold'">Account: {{ $user->id }}</p>
                        <p style="line-height: 0.8;margin:0;font-family: 'Poppins-SemiBold'">Status: {{ $user->account_status }}</p>
                    </div>
                    <div style="margin-left:15px">
                        <p style="line-height: 0.8; margin: 0; font-family: 'Poppins-SemiBold'">{{ $user->full_name() }}</p>
                        @if (!empty($user->address))
                        <p style="line-height: 0.8; margin: 0; font-family: 'Poppins-SemiBold'">{{ $user->address }}</p>
                        @endif
                        @php
                        $locationParts = array_filter([
                        $user->city ?? null,
                        $user->state ?? null,
                        $user->zip_code ?? null,
                        ]);
                        @endphp
                        @if (!empty($locationParts))
                        <p style="line-height: 0.8; margin: 0; font-family: 'Poppins-SemiBold'">
                            {{ implode(', ', $locationParts) }}
                        </p>
                        @endif
                    </div>

                </div>
                <div style="text-align: center">
                    <p style="font-family: 'Poppins-SemiBold';font-size:14px;margin:0;margin-top:15px;margin-bottom:2px">&nbsp;</p>
                </div>
                <table style="width: 100%;">
                    <tr style="background-color:#999;vertical-align:middle">
                        <td colspan="1"><span style="color: white;font-size:16px;font-family: 'Poppins-SemiBold';position: relative;bottom: 2.8px;padding-left:5px">DATE</span></td>
                        <td colspan="1"><span style="color: white;font-size:16px;font-family: 'Poppins-SemiBold';position: relative;bottom: 2.8px;">TRANS. TYPE</span></td>
                        <td colspan="1"><span style="color: white;font-size:16px;font-family: 'Poppins-SemiBold';position: relative;bottom: 2.8px;">DESCRIPTION</span></td>
                        <td style="text-align: right !important;text-align: end !important;" colspan="1"><span style="color: white;font-size:16px;font-family: 'Poppins-SemiBold';position: relative;bottom: 2.8px;">AMOUNT</span></td>
                    </tr>
                    @if(!empty($registration_transaction))
                    <tr>
                        <td colspan="1" style="padding-left:5px;vertical-align:top">
                            <label style="font-family: 'Poppins-Regular';font-size:14px">{{ date('m/d/Y',strtotime($registration_transaction->created_at)) }}</label>
                        </td>
                        <td colspan="1" style="vertical-align:top">
                            <label style="font-family: 'Poppins-Regular';font-size:14px">Initial Fee</label>
                        </td>
                        <td style="width:40%;vertical-align:top" colspan="1">
                            <label style="font-family: 'Poppins-Regular';font-size:14px">Enrollment</label>
                        </td>
                        <td style="text-align: end;vertical-align:top;position:relative" colspan="1">
                            <label style="font-family: 'Poppins-Regular';font-size:14px;position:absolute;right:5px">${{ $registration_transaction->credit > 0 ? number_format($registration_transaction->credit, 2) : ($registration_transaction->debit > 0 ? number_format($registration_transaction->debit, 2) : '') }}</label>
                        </td>
                    </tr>
                    @endif
                    @if(!empty($deposit_transaction))
                    <tr>
                        <td colspan="1" style="padding-left:5px;vertical-align:top">
                            <label style="font-family: 'Poppins-Regular';font-size:14px">{{ date('m/d/Y',strtotime(($transaction->date_of_trans === null ) ? $transaction->created_at : $transaction->date_of_trans)) }}</label>
                        </td>
                       <td colspan="1" style="vertical-align:top;">
                        <label style="font-family: 'Poppins-Regular'; font-size:14px; white-space: nowrap;">
                            Required Monthly Surplus
                        </label>
                    </td>
                        <td style="width:40%;vertical-align:top" colspan="1">
                            <label style="font-family: 'Poppins-Regular';font-size:14px"> {{ \Carbon\Carbon::parse($deposit_transaction->date)->format('F Y') }}</label>
                        </td>
                        <td style="text-align: end;vertical-align:top;position:relative" colspan="1">
                            <label style="font-family: 'Poppins-Regular';font-size:14px;position:absolute;right:5px">${{ $deposit_transaction->credit > 0 ? number_format($deposit_transaction->credit, 2) : ($deposit_transaction->debit > 0 ? number_format($deposit_transaction->debit, 2) : '') }}</label>
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div style="position: fixed;width: 100%;bottom: 0px;font-family:Poppins-Regular; background: white;padding-top:15px">
        <div style="width: 100%;">
            <div style="width: 25%; float: left;text-align:center">
                <img style="position: relative;right: 1%;top: 5px;" src="{{ public_path('images/tel.png') }}" alt="int" width="20px" height="20px">
                <span style="font-family:Poppins-Regular;">{{ config('app.contact') }}</span>
            </div>
            <div style="width: 45%; float: left;text-align: center">
                <img style="position: relative;right: 1%;top: 5px;" src="{{ public_path('images/website.png') }}" alt="int" width="20px" height="20px">
                <span style="font-family:Poppins-Regular">www.seniorlifecaretrusts.org</span>
            </div>
            <div style="width: 25%; float: right; text-align: left;">
                <img style="position: relative;right: 1%;top: 5px;" src="{{ public_path('images/mail.png') }}" alt="int" width="20px" height="20px">
                <span style="font-family:Poppins-Regular">info@slctrusts.org</span>
            </div>

        </div>
    </div>
</body>
</html>

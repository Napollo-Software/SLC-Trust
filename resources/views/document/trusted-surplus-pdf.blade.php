<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map</title>
    <style>
         /* @font-face {
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
        } */
        table {
            border-collapse: collapse;
            width: 100%;
            /* border: 1px solid black; */
        }

        * {
            font-size: 12px;
        }

        th,
        td {
            /* border: 1px solid black; */
            padding: 8px;
            font-size: 10px;
            /* text-align: center; */
        }

        tr:first-child th {
            font-size: 12px;
        }

        /* .content {

            flex-direction: column;
        } */

        .row-container {

            align-items: center;
        }

        /* body {
            margin-left: 50px;
            margin-right: 50px;
        } */

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
            <h2 style="text-align: center;font-size: 20px;margin-top:0;margin-bottom: 0;">
                Trusted Surplus Solution
            </h2>
            <p style="text-align: center;">VERIFICATION OF DEPOSITS</p>

        </div>
        <div style="">
            <div style="">
                <div style="font-weight: bold;text-align:right;">
                    {{-- <p>Date: {{ date('m/d/Y') }}</p>
                    <p>Account: {{ $user->id }}</p>
                    <p>Status: Active</p> --}}

                    <p style="line-height: 1.8;margin:0">Date: 05/09/2024</p>
                    <p style="line-height: 1.8;margin:0">Account: 99554</p>
                    <p style="line-height: 1.8;margin:0">Status: Active</p>


                </div>
                <div style="font-weight: bold;">
                    <p style="line-height: 1.8;margin:0">Erica McLeod</p>
                    <p style="line-height: 1.8;margin:0">126-02 Locust Manor Lane</p>
                    <p style="line-height: 1.8;margin:0">Apartment #2A</p>
                    <p style="line-height: 1.8;margin:0">Queens, NY, 11434</p>
                </div>
            </div>
            <div style="text-align: center">
                {{-- <p>{{ date('m/d/Y', strtotime($transaction->created_at)) }}</p> --}}
                <p>04/29/2024 - 04/28/2025</p>
            </div>
            <table style="width: 100%;">
                <tr style="background-color:#aaa">
                    {{-- <td colspan="1">DATE</td>
                    <td colspan="1">TRANS. TYPE</td>
                    <td colspan="1">DESCRIPTION</td>
                    <td colspan="1">TYPE</td>
                    <td colspan="1">AMOUNT</td> --}}


                    <td colspan="1" style="color: white;font-size:16px">DATE</td>
                    <td colspan="1" style="color: white;font-size:16px">TRANS. TYPE</td>
                    <td colspan="1" style="color: white;font-size:16px">DESCRIPTION</td>
                    <td colspan="1" style="color: white;font-size:16px">DEBIT</td>
                    



                </tr>
                {{-- <tr>
                    <td colspan="1">
                        <label>{{ date('m/d/Y', strtotime($transaction->created_at)) }}</label>
                    </td>
                    <td colspan="1">
                        <label>{{ str_replace('_', ' ', $transaction->type) }}</label>
                    </td>
                    <td colspan="1">
                        <label>{{ $transaction->description }}</label>
                    </td>
                    <td colspan="1">
                        <label>{{ $transaction->credit > 0 ? 'Credit' : ($transaction->debit > 0 ? 'Debit' : '') }}</label>
                    </td>
                    <td colspan="1">
                        <label>
                            {{ $transaction->credit > 0 ? number_format($transaction->credit, 2) : ($transaction->debit > 0 ? number_format($transaction->debit, 2) : '') }}
                        </label>
                    </td>
                </tr> --}}


                <tr>
                    <td colspan="1">
                        <label>04/29/2024</label>
                    </td>
                    <td colspan="1">
                        <label>Required Monthly Surplus</label>
                    </td>
                    <td colspan="1">
                        <label>April 2024</label>
                    </td>
                    <td colspan="1">
                        <label>$204.00</label>
                    </td>
                    {{-- <td colspan="1">
                        <label>
                            $204.00
                        </label>
                    </td> --}}
                </tr>
                <tr>
                    <td colspan="1">
                        <label>05/02/2024</label>
                    </td>
                    <td colspan="1">
                        <label>Initial Fee</label>
                    </td>
                    <td colspan="1">
                        <label>Enrollment</label>
                    </td>
                    <td colspan="1">
                        <label>$250.00</label>
                    </td>
                </tr>



                </table>
            </div>
        </div>
    </div>
    <div style="position: fixed;width: 100%;bottom: 0px;font-family:Poppins-Regular; background: white;padding-top:30px">
        <div style="width: 100%;">
            <div style="width: 25%; float: left">
                <span style="color: rgb(52 159 153);font-family:Poppins-Regular">Tel:</span>
                <span style="font-family:Poppins-Regular">718.500.3235</span>
            </div>
            <div style="width: 45%; float: left;text-align: center">
                <span style="color: rgb(52 159 153);font-family:Poppins-Regular">Address:</span>
                <span style="font-family:Poppins-Regular">5014-16th Ave, Suite 489 Brooklyn, NY 11204</span>
            </div>
            <div style="width: 25%; float: right; text-align: right;">
                <span style="color: rgb(52 159 153);font-family:Poppins-Regular">Email:</span>
                <span style="font-family:Poppins-Regular">info@slctrusts.org</span>
            </div>
    
        </div>
        <div>
            <p style="width: 95%;text-align: center;font-family:Poppins-Regular;">www.seniorlifecaretrusts.org</p>
       </div>
    </div>
   
</body>
</html>

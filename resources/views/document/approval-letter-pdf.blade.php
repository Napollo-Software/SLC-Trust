<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approval Letter</title>
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

        @font-face {
            font-family: 'BrittanySignature-MaZx';
            src: url("fonts/BrittanySignature-MaZx.ttf");
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        * {
            font-size: 12px;
        }

        .signature {
            font-family: 'BrittanySignature-MaZx' !important;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            font-size: 10px;
            text-align: center;
        }

        tr:first-child th {
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        .content {

            flex-direction: column;
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

        footer {
            /* background-color: #f3f3f3;
    padding: 20px 0;
    text-align: center; */
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

        .content {
            padding: 40px;
            font-family: 'Poppins-Regular';
            padding-top: 0;
        }

        @media (max-width: 768px) {
            .footer-table {
                display: block;
            }

            .footer-cell {
                display: block;
                width: 100%;
                margin-bottom: 15px;
            }
        }

    </style>
</head>
<body>
<div style="position: relative;height:100%;background-image: url('{{ public_path("images/jbg2.png") }}');background-size: cover;background-repeat: no-repeat;background-position: center;width:95%;margin:auto">
    <div class="row-container" >
        <h4>
            <img src="{{ public_path('images/new_logo.png') }}" alt="int" width="180px">
        </h4>

    </div>

    <div >

            <div>
                <p style="text-align: center;font-size: 30px;margin-top:0;margin-bottom: 0;font-family: Poppins-Bold;padding-bottom: 15px;border-bottom: 0.5px solid black">
                    Approval Letter
                </p>
            </div>
            <div class="content">
                <div>
                    <p style="font-size: 14px">Date: {{ date('m/d/Y') }}</p>
                </div>
                <div style="position: relative;left: 40%;margin-top:35px">
                    <p style="margin:0;font-size:14px;font-family:Poppins-Regular;line-height: 0.8"><span style="font-size:14px;font-family: Poppins-SemiBold;text-decoration: underline;">Beneficiary Name : {{ $user->full_name() }}</span></p>
                    <p style="margin:0;margin-top:2px;font-size:14px;font-family:Poppins-Regular;line-height: 0.8"><span style="font-size:14px;font-family: Poppins-SemiBold;text-decoration: underline;">Account Number : </span> {{ $user->id }}</p>
                    <p style="margin:0;margin-top:2px;font-size:14px;font-family:Poppins-Regular;line-height: 0.8"><span style="font-size:14px;font-family: Poppins-SemiBold;text-decoration: underline;">Date Established : </span> {{ date('m/d/Y',strtotime($user->created_at)) }}</p>
                </div>
                <div style="margin-top: 35px">
                    <p style="font-size: 18px;font-family:Poppins-Regular;margin:0;line-height: 1">This letter is to confirm that Joinder Agreement application for the above named Beneficiary to join the Senior Life Care Pooled trust has been approved and a sub-account has been established. The account is effective upon receipt
                        of surplus deposit.
                    </p>
                    <p style="font-size: 18px;font-family:Poppins-Regular;margin:0;line-height: 1;margin-top:15px">
                        Should you have any further inquiries please do not hesitate to contact our office at {{ config('app.contact') }}
                    </p>
                </div>
                <div style="font-size: 18px;font-family:Poppins-Regular;margin-top:15px">
                    <p style="margin: 0;font-size: 16px;font-family:Poppins-Regular">Sincerely,</p>
                    <p style="margin: 0;font-size: 18px;" class="signature">Senior Life Care</p>
                    <p style="margin: 0;font-size: 16px;font-family:Poppins-Regular">Enrollment Department</p>
                </div>
            </div>
        </div>
    </div>
    <div style="position: fixed;width: 100%;bottom: 0px;font-family:Poppins-Regular; background: white;padding-top:30px">
        <div style="width: 100%;">
            <div style="width: 25%; float: left;text-align:center">
                {{-- <span style="color: rgb(52 159 153);font-family:Poppins-Regular">Tel:</span> --}}
                 <img style="position: relative;right: 1%;top: 5px;"  src="{{ public_path('images/tel.png') }}" alt="int" width="20px" height="20px">
                <span style="font-family:Poppins-Regular;">718.500.3235</span>
            </div>
            <div style="width: 45%; float: left;text-align: center">
                {{-- <span style="color: rgb(52 159 153);font-family:Poppins-Regular">Address:</span> --}}
                <img style="position: relative;right: 1%;top: 5px;"  src="{{ public_path('images/address.png') }}" alt="int" width="20px" height="20px">
                <span style="font-family:Poppins-Regular">5014-16th Ave, Suite 489 Brooklyn, NY 11204</span>
            </div>
            <div style="width: 25%; float: right; text-align:left;">
                {{-- <span style="color: rgb(52 159 153);font-family:Poppins-Regular">Email:</span> --}}
                <img style="position: relative;right: 1%;top: 5px;"  src="{{ public_path('images/mail.png') }}" alt="int" width="20px" height="20px">
                <span style="font-family:Poppins-Regular">info@slctrusts.org</span>
            </div>
    
        </div>
        <div>
            <img style="position: relative;top: 40px;right: 36%;"  src="{{ public_path('images/website.png') }}" alt="int" width="20px" height="20px">
            <p style="width: 100%;text-align: center;font-family:Poppins-Regular;">
                www.seniorlifecaretrusts.org
            </p>
       </div>
    </div>
</body>
</html>

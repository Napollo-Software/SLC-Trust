<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> </title>
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
        .beneficiary-information { 
            font-size: 26px;
            padding: 10px 20px;
        }
         
        .acknowledge-list ul {
            margin: 0;
        }

        .acknowledge-list ul li {
            padding: 3px 0px;
            font-family: 'Poppins-Regular';
        }
       
        .name-form-container {
            display: flex; 
            align-items: center;
            margin-top: 15px; 
            /* width: 25%; */
        } 
        .main-page {
            font-size: 28px;
            font-family: 'Poppins-Regular';
        }
        .name-form {
            width: 30%;
            margin-top: 10px;
        }
        .inp-first {
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
            background: transparent !important;
            margin: 0 !important;
        }
        .beneficiary-information-name-form {
        
        }
    </style>
</head>
<body>
    <div style="position: relative;height:100%;background-image: url('{{ public_path("images/jbg2.png") }}');background-size: cover;background-repeat: no-repeat;background-position: center;width:100%">
        <div >
            <h4 class="margin-bottom: 0;">
                <img src="{{ public_path('images/new_logo.png') }}" alt="int" width="180px">
            </h4>
        </div>
        <div>
            <div> 
                <p style="text-align: center;font-family: 'Poppins-Regular';font-size:14px;margin:0;line-height:1"> CLIENT ACKNOWLEDGEMENT ON USE OF PRE-PAID CREDIT CARD OPTION</p>
                <p style="text-align: center;font-family: 'Poppins-Regular';font-size:14px;margin:0;line-height:1">
                        TO
                </p>
                <p  style="text-align: center;font-family: 'Poppins-Regular';font-size:14px;margin:0;line-height:1">
                    SENIOR LIFE CARE
                </p>
            </div> 
        </div>
        <section class="main-page" > 
            <!-- BENEFICIARY INFORMATION -->

            <div class="beneficiary-information">
                <p class="margin-bottom: 0px !important;">This is to acknowledge that I have been informed, by Senior Life Care, that the use of the prepaid credit card option provided with my Pooled Income Trust account (the “PIT”) is to limited to
                    authorized living expenses, including by not limited to, rent, food, clothes or utilities. Unauthorized
                    expenses include, but are not limited to: </p>
                <div class="acknowledge-list">
                    <ul>
                        <li>Alcohol</li>
                        <li>Bills not in my name</li>
                        <li>Cash advances taken on credit cards</li>
                        <li>Charitable contributions</li>
                        <li>Gambling</li>
                        <li>Firearms</li>
                        <li>Gifts</li>
                        <li>Secondary Healthcare Insurance Premiums</li>
                        <li>Tobacco</li>
                        <li><b>Any expenses not for the specific use and benefit of the account holder</b></li>
                        <li><b>ATM TRANSACTIONS ARE PROHIBITED</b></li>
                    </ul>
                </div>
                <p>I understand that purchases using the pre-paid credit card attached to my Pooled Income
                    Trust account for any unauthorized expenses will not be paid by the Pooled Income Trust and hold
                    Senior Life Care harmless for any such non-payment. </p>

                <p  >
                    <b>
                        I ACKNOWLEDGE THAT IF THE CARD IS MISPLACED OR STOLEN, IT IS MY RESPONSIBILITY TO
                        NOTIFY MELODY BENIFITS IMMEDIATELY. SENIOR LIFE CARE AND MELODY BENIFITS ARE NOT
                        RESPONSIBLE AND WILL NOT REIMBURSE ANY LOST OR STOLEN FUNDS.
                    </b>
                </p>

                <div class="beneficiary-information-form">
                    <div>
                        <div class="beneficiary-information-name-form"> 
                            <div class="name-form"> 
                                <input type="text" value="{{ $sponsor_first_name }}" class="no-border inp-first" name="sponsor_first_name">
                                <div style="line-height: 10px !important">Name</div>
                            </div> 

                            <div class="name-form">
                                <input type="text" value="{{ $date }}" class="no-border inp-first" name="date">
                                <div style="line-height: 10px !important">Date</div>
                            </div> 

                            <div class="name-form">
                                <!-- Signature Image or Placeholder -->
                                <div >
                                    @if ($client_acknowledgement_signature)
                                    <img src="{{ $client_acknowledgement_signature }}" alt="Signature 4"
                                    style="width: 300px; height: 48px;">
                                    @else
                                    <div style="width: 200px;height:50px; text-align: center;">
                                        No Signature Provided
                                    </div>
                                        @endif
                                </div>
                                <div class='xs' style='border-top:1px solid;width:100%;'>
                                    <label class='italic'>Signature</label>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
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

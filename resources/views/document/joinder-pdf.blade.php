<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joinder Form</title>
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
            /* border: 1px solid rgb(184 221 219); */
        }
        body {
            font-family: "Poppins-Regular";
            line-height:0.8 !important;
        }

        p, h1, h2, h3, h4, h5, h6, li,div{
        line-height: 0.8 !important; /* Apply globally to these elements */
    }
        .semiBold{
            font-family: "Poppins-SemiBold" !important;
        }

        .bold{
            font-family: "Poppins-Bold" !important;
        }

        .bold{
            font-family: "Poppins-Bold" !important;
        }

        th,
        td {
            border: 1px solid rgb(184 221 219);
            padding: 0;
            font-size: 10px;
            text-align: center;
        }

        tr:first-child th {
            font-size: 12px;
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;


        }
        input{
            vertical-align:middle;
            /* height: 10px; */
        }

        .container-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        h6 {
            margin: 5px 0;
        }

        .checkbox-row label {
            margin-right: 20px;
        }


        .container-page-end {
            padding: 5px;

        }

        .custom_space_1 {
            padding: 130px;

        }

        .info {
            page-break-inside: avoid !important;
        }

        .info>*:first-child {
            page-break-before: avoid !important;
        }

        /* .info > *:last-child {
            page-break-after: avoid !important;
        } */
        .page-break {
            page-break-after: always
        }

        input[type="text"] {
            border: none;
            border-bottom: 1px solid black;
            height: 10px;
        }
        thead tr td {
            border: 2px solid rgb(184 221 219);
            text-align: left;
            padding: 14px;
        }
        tbody tr td{
            padding: 14px;
            border-right: 2px solid rgb(184 221 219);

        }
        .page-0{
            background-image: url('{{ public_path("images/bannerCover2.png") }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: bottom;
            height: 100%;
            width: 100%;
        }
        tbody td:nth-child(1){
            border-left:none;
        }
        tbody td:nth-child(3){
            border-right:none;
        }
        /* tbody tr{
            border-bottom: 2px solid rgb(184 221 219);
        }
        tbody tr td:last-child {
            border-right: none;
        }
        tbody tr td:nth-child(2),
        tbody tr td:nth-child(3) {
            text-align: center;
        }
        tbody tr.individual-tr td:nth-child(2),
        tbody tr.individual-tr td:nth-child(3) {
            text-align: left;
        }
        tr.ind-th td{
            color: rgb(52 159 153);
        } */

        .italic{
            font-family: "Poppins-Italic";
            font-size: 10px;
            /* display: block; */
        }

        .text-center{
            text-align: center;
        }
        .text-normal{
        }


        .xs{
            font-size: 12px;
        }

        .xxs{
            font-size: 9px;
        }

        .sm{
            font-size: 13px;
        }

        .md{
            font-size: 14px;
        }

        .lg{
            font-size: 16px;
        }
        .xl{
            font-size: 17px;
        }

        .strong{
            font-family: "Poppins-Medium" !important;
        }

        .semi-bold{
            font-family: "Poppins-SemiBold" !important;
        }
        .black{
            font-family: "Poppins-Bold" !important;
        }
        .footer{
            position: absolute;
            left: 0px;
            right: 0px;
            bottom: 10px;
        }
        .footer-center{
            border: 1px solid #37A09B;
            padding-top: 3px;
            padding-bottom: 3px;
            padding-left: 6px;
            padding-right: 6px;
            color: #37A09B
        }
        .section-title{
            font-size: 14px;
            max-width: fit-content;
        }
        .border-container{
            border:1px solid #B8DDDB;
            padding:15px
        }
        .pa-container{
            border: 2px solid rgb(184 221 219);
            padding: 15px 20px;
        }
        input[type="checkbox"] {
            width: 15px;
            height: 15px !important;
        }
        input[type="checkbox"] + label{
            margin-bottom: -10px;
        }
        .section-heading{
            padding-left:5px;
            padding-right:5px;
            padding-top:4px;
            padding-bottom:4px;
            font-family: 'Poppins-Medium' !important;
            text-align: center;
            margin-left:-20px
        }
        .checkboxissue{
            margin-top:-7px;
            padding-top: -7px;
        }y
    </style>
</head>

<body style="padding: 0;margin: 0;">
    <form id="joinderForm" method="POST" action="{{ route('save.joinder') }}">
        @csrf
        <footer>
        <!-- <p>Copyright &copy; <?php echo date("Y");?></p> -->
        </footer>
        <div class="page-0">
            <div class="container-row" style="text-align:center; position: absolute; top: 70px;">
                <img style="width:54%" src="{{ public_path('images/new_logo.png') }}" alt="Example Image">
            </div>

            <div style="height:800px">
                <div style="position: absolute; bottom: 300px; text-align: center; left: 0; right: 0;">
                    <div style="text-align: center;margin-top:50px">
                        <div style="width: fit-content;">
                            <div class="black" style="color: rgb(52 159 153); padding: 5px 10px; font-size: 2.8rem;margin-left:17px;">
                                JOINDER</div>
                        </div>
                    </div>
                    <div style="text-align: center;margin-top:-5px" >
                        <div style="width: fit-content;">
                            <div class="black" style="color: rgb(52 159 153); font-size: 2.8rem;margin-left:17px;">
                                AGREEMENT</div>
                        </div>
                    </div>
                </div>

                <div style="position: absolute; bottom: 40px; text-align: center; left: 0; right: 0;">
                    <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
                        <div style="display: table-row;">
                            <div style="display: table-cell; width:45%;text-align: right;">
                                <div style="padding-right: 5px" class="xl">Tel:</div>
                            </div>
                            <div
                                style="display: table-cell; text-align: left;" class="xl">
                                718.500.3235</div>
                        </div>
                    </div>
                    <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;margin-bottom:7px">
                        <div style="display: table-row;">
                            <div style="display: table-cell;width:45%;text-align: right;">
                                <div style="padding-right: 5px" class="xl">Fax:</div>
                            </div>
                            <div
                                class="xl"
                                style="display: table-cell; text-align: left;">
                                718.500.3225</div>
                        </div>
                    </div>

                    <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
                        <div style="display: table-row;">
                            <div style="display: table-cell;">
                                <div style="" class="xl">info@slctrusts.org </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;margin-top:7px">
                        <div style="display: table-row;">
                            <div style="color: rgb(52 159 153); display: table-cell;" class="strong">
                                seniorlifecaretrusts.org
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="page-break"></div>

        <div class="page-1">
            <div class="center-text" style="background-color: rgb(184 221 219);padding-top: 7px;padding-bottom: 7px;padding-left:10px;padding-right:10px;width:120%;margin-left:-10%">
                <p style="text-align:center;" class="strong lg">SLC SUPPLEMENTAL NEEDS TRUST</p>
                <p style="text-align:center;color:rgb(52 159 153);margin-top:-11px" class="lg">Joinder Agreement / Beneficiary
                    Profile Sheet</p>
            </div>
            <div  class="xs">
                <p>This is a legal document. It is an agreement pertaining to a supplemental needs trust created pursuant to 42 United States
                    Code §1396p(d)(4). You are encouraged to seek independent, professional advice before signing this agreement. The
                    undersigned hereby adopts, enrolls in and establishes a sub-trust account under the SLC Supplemental Needs Trust, dated
                    December 24, 2017.</p>
                <p class="" style="margin">NOTE: All questions must be answered or your application will be delayed.</p>
            </div class="md">
                <p
                class="md section-heading"
                    style="background-color:rgb(184 221 219);color:rgb(52 159 153);width:29%">
                    BENEFICIARY INFORMATION</p>
            </div>
            <p class="xs">
                The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may
                be contributed to the Trust.
            </p>

            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <label class="sm strong">Name:</label>
                    </div>
                </div>
                <br/>
                <div style="display: table-row; width: 100%;" class="xs">
                    <div style="display: table-cell; width: 33.33%; padding-right: 20px;">
                        <input type="text" value="{{ $sponsor_first_name }}" name="sponsor_first_name" style="width: 100%;" />
                        <label class="italic">First</label>
                    </div>

                    <div style="display: table-cell; width: 33.33%; padding-right: 20px;">
                        <input type="text" value="{{ $sponsor_middle_name }}" name="sponsor_middle_name" style="width: 100%;" />
                        <label class="italic">Middle</label>
                    </div>

                    <div style="display: table-cell; width: 33.33%;">
                        <input type="text" value="{{ $sponsor_last_name }}" name="sponsor_last_name" style="width: 100%;" />
                        <label class="italic">Last</label>
                    </div>
                </div>
            </div>


                <br/>
            <div style="display: table; width: 118%;">
                <div style="display: table-row;padding-righ:5px">
                    <p style="display:table-cell;margin-top:10px;padding-top:10px" class="sm strong"> Marital Status
                        <label style="font-family:Poppins-Regular"  class="xs">
                            <input type="checkbox" name="sponsor_marital_status1" style="margin-top:-7px;padding-top:-7px" value="Married"
                                {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Married' ? 'checked' : '' }}>
                            <label>Married</label>
                        </label>
                        <label style="font-family:Poppins-Regular" class="xs">
                            <input type="checkbox" name="sponsor_marital_status1" style="margin-top:-7px;padding-top:-7px" value="Widowed"
                            {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Widowed' ? 'checked' : '' }}>
                        <label>Widowed</label>
                        </label>
                        <label style="font-family:Poppins-Regular" class="xs">
                            <input type="checkbox" name="sponsor_marital_status" style="margin-top:-7px;padding-top:-7px" value="Single"
                            {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Single' ? 'checked' : '' }}>
                        <label>Single</label>
                        </label>
                    </p>
                    <label style="display:table-cell;width:60% margin-top:10px;padding-top:10px; margin-right:8px;padding-right:8px">
                            <label class="sm" >Gender</label>
                            <input class="xs" value="{{ $sponsor_gender }}" style="width:247px" type="text" name="sponsor_gender" >
                        </label>
                    </div>

           </div>

                {{-- <br /> --}}

                {{-- <div style="display: table-row;">
                    <div style="display: table-cell">
                        <label style=" strong;">Marital Status:</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="checkbox" name="sponsor_marital_status" value="Married"
                            {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Married' ? 'checked' : '' }}>
                        <label>Married</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="checkbox" name="sponsor_marital_status" value="Widowed"
                            {{ isset($sponsor_marital_status2) && $sponsor_marital_status2 === 'Widowed' ? 'checked' : '' }}>
                        <label>Widowed</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="checkbox" name="sponsor_marital_status" value="Single"
                            {{ isset($sponsor_marital_status3) && $sponsor_marital_status3 === 'Single' ? 'checked' : '' }}>
                        <label>Single</label>
                    </div>
                </div> --}}

                 <br />
                 <div style="display: table; width: 100%; margin-bottom: 8px;margin-top:10px">
                    <div style="display: table-row;">

                        <!-- Social Security Number -->
                        <div style="display: table-cell; width: 33.33%; padding-right: 20px;" class="xs">
                            <input type="text" value="{{ $sponsor_ssn }}" name="sponsor_ssn" style="width: 100%;">
                            <label class="italic">Social Security Number</label>
                        </div>

                        <!-- Date of Birth -->
                        <div style="display: table-cell; width: 33.33%; padding-right: 20px;" class="xs">
                            <input type="text" name="sponsor_dob" value="{{ $sponsor_dob }}" style="width: 100%;">
                            <label class="italic">Date of Birth</label>
                        </div>

                        <!-- Citizenship -->
                        <div style="display: table-cell;width: 33.33%;" class="xs">
                            <input type="text" name="sponsor_citizenship" value="{{ $sponsor_citizen }}" style="width: 100%;">
                            <label class="italic">Citizenship</label>
                        </div>
                    </div>
                </div>

<br/>
            <div style="display: table; width:100%">
                <div style="display: table-row;">
                    <div style="display: table-cell">
                        <label style="" class="sm strong">Contact Information:</label>
                    </div>
                </div> <br>
                <div style="display: table-row;" class="xs">

                    <div style="display: table-cell;width:50%;padding-right:20px">
                        <input type="text" value="{{ $sponsor_tel_home }}" name="sponsor_tel_home" style="width: 100%">
                        <label class="italic">Home Phone</label>
                    </div>
                   &nbsp;

                    <div style="display: table-cell;width:50%">

                        <input type="text" value="{{ $sponsor_tel_cell }}" class="no-border" style="width: 100%"
                            name="sponsor_tel_cell">
                        <label class="italic">Cell Phone</label>
                    </div>
                </div>
            </div>
            <br/>

                <p class="strong sm" style="margin-top:10px">Preferred Phone
                    <label style="font-family:Poppins-Regular" class="sm">
                        <input type="checkbox" name="prefered_cell" style="margin-top:-7px;padding-top:-7px" value="Cell"
                            {{ isset($prefered_cell) && $prefered_cell === 'Cell' ? 'checked' : '' }}>
                        <label style="" class="strong" >Cell</label>
                    </label>
                    <label style="font-family:Poppins-Regular">
                        <input type="checkbox" name="prefered_cell" style="margin-top:-7px;padding-top:-7px" value="Phone"
                            {{ isset($prefered_cell) && $prefered_cell === 'Phone' ? 'checked' : '' }}>
                        <label style="" class="strong">Home</label>
                    </label>
                </p>


            <br />

            <div style="display: table; width:45%" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <input type="text" value="{{ $beneficiary_email }}" name="beneficiary_email" style="width:100%">
                        <label class="italic">Email</label>
                    </div>
                </div>
               &nbsp;
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                    </div>
                </div>
            </div>
            <br>

            <div style="display: table;margin-top:-15px;padding-top:-15px">

                <div style="display: table-row;">
                    <div style="display: table-cell">
                        <label class="strong sm">Address:</label>
                    </div>
                </div>
            </div>

                <br />

                <div style="display: table; width:100%" class="xs">

                <div style="display: table-row;" class="xs">
                    <div style="display: table-cell;">
                        <input type="text" value="{{ $sponsor_address }}" name="sponsor_address" style="width:95%">
                        <label class="italic">Address</label>
                    </div>
                   &nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_apt }}" name="sponsor_apt" style="width:95%">
                        <label class="italic">Apt #</label>
                    </div>
                   &nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_city }}" name="sponsor_city" style="width:95%" />
                        <label class="italic">City</label>
                    </div>
                   &nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_state }}" name="sponsor_state" style="width:95%" />
                        <label class="italic">State</label>
                    </div>&nbsp;&nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_zip }}" name="sponsor_zip" style="width:95%" />
                        <label class="italic">Zip</label>
                    </div>

                </div>
                </div>

                <br />
                <div style="display: table;">
                <div style="display: table-row;margin-top:-30px">
                    <div style="display: table-cell">
                        <label style="" class="sm strong">Qualifying Disabilities:</label>
                    </div>
                </div>
            </div>
            <br />
            <div class="xs" style="display:table;width:100%;">
               <div style="display: table-row;width:100%">
                <div style="display: table-cell">
                    <label style="margin: 0;">
                        <label>1.</label>
                        <input type="text" value="{{ $d1 }}"  name="d1" style="width: 85%">
                    </label>
                </div>
                <div style="display: table-cell">
                    <label style="margin: 0;">
                        <label>2.</label>
                        <input type="text" value="{{ $d2 }}" name="d2" style="width: 85%">
                    </label>
                </div>
                <div style="display: table-cell">
                    <label style="margin: 0;">
                        <label>3.</label>
                        <input type="text" value="{{ $d3 }}" name="d3" style="width: 85%">
                    </label>
                </div>
               </div>
            </div>

                {{-- <div style="display: table-row">
                    <div style="display: table-cell;vertical-align:middle">
                        <label>1.</label>
                        <input type="text" value="{{ $d1 }}" name="d1">
                    </div>

                    <div style="display: table-cell; vertical-align:middle">
                        <label>2.</label>
                        <input type="text" value="{{ $d2 }}" name="d2">
                    </div>
                    <div style="display: table-cell;vertical-align:middle">
                        <label>3.</label>
                        <input type="text" value="{{ $d3 }}" name="d3">
                    </div>
                </div> --}}
            {{-- <div style="display: table">
                <div style="margin: 20px 0"></div>
                <div style="display: table-row">
                    <div style="display: table-cell;visibility:hidden">
                        <span style="font-size:12px">SLC SUPPLEMENTAL NEEDS TRUST</span>
                    </div>
                    <div style="display: table-cell;text-align: center;">
                        <span >1</span>
                    </div>
                    <div style="display: table-cell;text-align: right;visibility:hidden">
                        <span style="font-size:12px">JOINDER AGREEMENT</span>
                    </div>
                </div>
            </div> --}}

            {{-- <p style="width: 100%;text-align:center">1</p> --}}


            <!-- <div style="text-align: center;margin: 0;padding: 0;">
                {{-- <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100"> --}}
                <p style="margin: 0;padding: 0;">1</p>
            </div> -->

            <div style="width: 100%;display: table;">
                <p style="margin-top:20px" class="text-center xs">Please mail all trust documents to:</p>
                <p style="margin-top:-5px" class="text-center xs strong"> SLC Supplemental Needs Trust</p>
                <p style="margin-top:-10px" class="text-center xs strong"> 5014-16th Ave, Suite 489</p>
                <p style="margin-top:-10px" class="text-center xs strong"> Brooklyn, NY 11204</p>
        </div>

        <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                <div style="display: table-cell; text-align: left; width: 33%;">
                    <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                </div>
                <div style="display: table-cell; text-align: center; width: 33%;">
                    <div style=" padding: 7px; display: inline-block; position: relative;">
                        <p class="footer-center xs" style="margin: 0;">1</p>
                        <div style="
                                    transform: translateX(-50%);">
                        </div>
                    </div>
                </div>
                <div style="display: table-cell; text-align: right; width: 33%;">
                    <p class="xxs">JOINDER AGREEMENT</p>
                </div>
                </div>
            </div>

        </div>


        <br/>



        {{-- <div class="page-1">
            <div class="center-text" style="background-color: rgb(184 221 219);padding: 10px;">
                <p style="strong;text-align:center;font-size: 1.4rem;">TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST</p>
                <p style="text-align:center;color:rgb(52 159 153);font-size: 1.2rem;">Joinder Agreement / Beneficiary Profile Sheet</p>
            </div>
            <div style="padding: 30px 10px;;font-size: 12px">
                <p>This is a legal document. It is an agreement pertaining to a supplemental needs trust created pursuant to 42 United States Code §1396. You are encouraged to seek independent, professional advice before signing this agreement. The undersigned hereby adopts, enrolls in, and establishes a sub-trust account under the TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST, dated February 13, 2023. The Trust is Irrevocable.</p>
                <p class="">NOTE: All questions must be answered or your application will be delayed.</p>
            </div>
                <p style="font-size: 16px; padding:10px;width:45%;background-color:rgb(184 221 219);color:rgb(52 159 153);">SPONSOR/BENEFICIARY INFORMATION</p>
            </div>
            <p>The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may be contributed to the Trust.</p>

            <div style="display: table; width: 100%;" class="container-table">
                <div style="display: table-row; width: 100%;">
                    <label style="strong; display: table-cell; width: 15%;">Legal Name:</label>
                    <label style="display: table-cell; width: 5%; padding-right: 10px;">First:</label>
                    <input type="text" value="{{ $sponsor_first_name }}" class="no-border" style="width: 20%;" name="sponsor_first_name">
                    <label style="display: table-cell; width: 5%; padding-right: 10px;">Middle:</label>
                    <input type="text" value="{{ $sponsor_middle_name }}" class="no-border" style="width: 10%;" name="sponsor_middle_name">
                    <label style="display: table-cell; width: 5%; padding-right: 10px;">Last:</label>
                    <input type="text" value="{{ $sponsor_last_name }}" class="no-border" style="width: 40%;" name="sponsor_last_name">
                </div>
            </div>

            <br>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell;">
                    <label style="strong;">Marital Status:</label>
                    <label>Married <input type="checkbox" name="sponsor_marital_status" value="Married" {{ isset($sponsor_marital_status) && $sponsor_marital_status === 'Married' ? 'checked' : '' }}></label>
                    <label>Widowed <input type="checkbox" name="sponsor_marital_status" value="Widowed" {{ isset($sponsor_marital_status) && $sponsor_marital_status === 'Widowed' ? 'checked' : '' }}></label>
                    <label>Single <input type="checkbox" name="sponsor_marital_status" value="Single" {{ isset($sponsor_marital_status) && $sponsor_marital_status === 'Single' ? 'checked' : '' }}></label>
                </div>
                <div style="display: table-cell;">
                    <label>Gender</label>
                    <input type="text" value="{{ $sponsor_gender }}" class="no-border" name="sponsor_gender">
                </div>
            </div>

            <br>
            <div style="display: table; width: 100%;">
                <label>SSN:</label>
                <input type="text" value="{{ $sponsor_ssn }}" class="no-border" name="sponsor_ssn">
                <label>Date of birth:</label>
                <input type="text" value="{{ $sponsor_dob }}" class="no-border" name="sponsor_dob">
            </div>

            <br>
            <div style="display: table; width: 100%;">
                <label>Citizen:</label>
                <input type="checkbox" name="sponsor_citizen" value="Yes" {{ isset($sponsor_citizen) && $sponsor_citizen === 'Yes' ? 'checked' : '' }}> Yes
                <input type="checkbox" name="sponsor_citizen" value="No" {{ isset($sponsor_citizen) && $sponsor_citizen === 'No' ? 'checked' : '' }}> No
                <label>Home Phone</label>
                <input type="text" value="{{ $sponsor_tel_home }}" class="no-border" name="sponsor_tel_home">
                <label>Cell Phone</label>
                <input type="text" value="{{ $sponsor_tel_cell }}" class="no-border" name="sponsor_tel_cell">
            </div>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell; padding: 0">
                    <label>Preferred Phone:</label>
                    <input type="checkbox" name="preferedphone" value="Cell"
                        {{ isset($prefered_cell) && $prefered_cell === 'Cell' ? 'checked' : '' }}>Cell
                    <input type="checkbox" name="preferedphone" value="Phone"
                        {{ isset($prefered_phone) && $prefered_phone === 'Phone' ? 'checked' : '' }}>Home
                </div>
            </div>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell; margin-right: 10px; margin-bottom: 5px;">
                    <label>Email:</label>
                    <input type="text" value="{{ $beneficiary_email }}" class="no-border"
                        style="width: 200px;" name="beneficiary_email">
                </div>
            </div>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;">

                    <div style="display: table-cell; margin-right: 10px; margin-bottom: 5px;">
                        <label>Address</label>
                        <input type="text" value="{{ $sponsor_address }}" class="no-border"
                        style="width: 200px;" name="sponsor_address">
                    </div>
                    <div style="display: table-cell; width: 100%; margin-bottom: 5px;">
                        <input type="text" value="{{ $sponsor_apt }}" class="no-border" name="sponsor_apt"
                        style="width: 100px;">
                        <label>Apt#</label>
                    </div>
                    <div style="display: table-cell; width: 100%; margin-bottom: 5px;">
                        <input type="text" value="{{ $sponsor_city }}" class="no-border" name="sponsor_city"
                        style="width: 100px;">
                        <label>City</label>
                    </div>
                    <div style="display: table-cell; width: 100%; margin-bottom: 5px;">
                        <input type="text" value="{{ $sponsor_city }}" class="no-border" name="sponsor_city"
                        style="width: 100px;">
                        <label>City</label>
                    </div>
                    <div style="display: table-cell; width: 100%; margin-bottom: 5px;">
                        <input type="text" value="{{ $sponsor_state }}" class="no-border" name="sponsor_state"
                        style="width: 100px;">
                        <label>State</label>
                    </div>
                    <div style="display: table-cell; width: 100%; margin-bottom: 5px;">
                        <input type="text" value="{{ $sponsor_zip }}" class="no-border" name="sponsor_zip"
                        style="width: 100px;">
                        <label>Zip</label>
                    </div>


                </div>
            </div>

            <div class="center-text">
                <p style="margin: 0;padding: 0;">1</p>
            </div>
        </div> --}}

        <div class="page-break"></div>


        <div class="page-2" style="margin-top:-5px">
            <div class="">
                <p
                class="md section-heading"
                    style="background-color:rgb(184 221 219);color:rgb(52 159 153);width:32%">
                    AUTHORIZED REPRESENTATIVES:
                </p>
            </div>
            <p class="xs" style=" ">Who will be your primary contact?
                <label style="margin: 0;">
                    <input type="checkbox" style="margin-top:-7px;padding-top:-7px" name="auth_beneficiary" value="Beneficiary"
                        {{ isset($auth_beneficiary) && $auth_beneficiary === 'Beneficiary' ? 'checked' : '' }}>
                        <label>Beneficiary</label>

                </label>
                <label style="margin: 0;">
                    <input type="checkbox" name="auth_beneficiary" style="margin-top:-7px;padding-top:-7px" value="Auth. Rep.1"
                        {{ isset($auth_beneficiary) && $auth_beneficiary === 'Auth. Rep.1' ? 'checked' : '' }}>
                        <label>Auth. Rep. 1</label>
                </label>
                <label style="margin: 0;">
                    <input type="checkbox" name="auth_beneficiary" style="margin-top:-7px;padding-top:-7px" value="Auth. Rep. 2"
                        {{ isset($auth_beneficiary) && $auth_beneficiary === 'Auth. Rep. 2' ? 'checked' : '' }}>
                        <label>Auth. Rep. 2</label>
                </label>
            </p>

            <div class="border-container">
            <p style="padding:0;margin: 0;" class="xs">
            The following individual will be authorized to communicate with SLC Supplemental Needs Trust. I authorize
            this individual to: Make Deposits, Request Statements and Request Disbursements.
            </p>
            <p class="strong sm" style="margin-top:5px;margin-bottom:10px">Authorized Representative #1</p>
            <div class="xs" style="display: table;width:100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input type="text" value="{{ $auth_rep_one_fname }}" name="auth_rep_one_fname" style="width: 95%" /> <br>
                        <label class="italic">First</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_one_lname }}"name="auth_rep_one_lname" style="width: 95%" /> <br>
                        <label class="italic">Last</label>
                    </div>
                </div>
            </div>
            <div style="display: table;width:100%;margin-top:10px" >
                <div style="display: table-row;">
                    <div style="display: table-cell;margin-bottom:10px;padding-bottom:10px">
                        <label  class="sm strong">Contact Information</label>
                    </div>
                </div>
                <div style="display: table-row;" class="xs">
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_one_tel }}" name="auth_rep_one_tel" style="width: 90%"> <br>
                        <label class="italic">Home Phone</label>
                    </div>
                    <div style="display: table-cell">
                        <div><input type="text" value="{{ $auth_rep_one_cell }} " name="auth_rep_one_cell" style="width: 170%"></div>
                        <label class="italic">Cell Phone</label>
                    </div>
                    <div style="display: table-cell">
                        <p style="margin-left:80px;margin-top:0px">Preferred Phone
                        <label style="margin: 0;">
                            <input type="checkbox" name="authorized_preferred_cell_form_inp" class="checkboxissue" value="Authorized_1_cell"
                                {{ isset($authorized_preferred_cell_form_inp) && $authorized_preferred_cell_form_inp === 'Authorized_1_cell' ? 'checked' : '' }}>
                            <label>Cell</label>
                        </label>
                        <label style="margin: 0;">
                            <input type="checkbox" name="authorized_preferred_cell_form_inp" class="checkboxissue" value="Authorized_1_home"
                                {{ isset($authorized_preferred_cell_form_inp) && $authorized_preferred_cell_form_inp === 'Authorized_1_home' ? 'checked' : '' }}>
                            <label>Home</label>
                        </label>
                    </div>
                </p>

                </div>
            </div>

            <div style="display: table; width: 100%; margin-top: 10px;" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;width:270px">
                        <input type="text" value="{{ $auth_rep_one_email }}" name="auth_rep_one_email" style="width: 95%;" />
                        <br>
                        <label class="italic">Email</label>
                    </div>
                    <div style="display: table-cell;">
                        <div style="display: inline-block; width: 100%;">
                            <label class="sm" style="display: inline-block; margin-left: 10px; vertical-align: bottom;">
                                Relationship to Beneficiary
                            </label>
                            <input type="text" value="{{ $auth_rep_one_relation_beneficiary }}" name="auth_rep_one_relation_beneficiary"
                                style="width: 200px; display: inline-block; vertical-align: bottom; float: right;" />
                        </div>
                    </div>
                </div>
            </div>

                <div style="display: table;width:100%;margin-top:10px">

                    <div style="display: table-row;">
                        <div style="display: table-cell;margin-bottom:10px;padding-bottom:10px">
                            <label style="" class="sm strong">Address</label>
                        </div>
                    </div>
                    <div style="display: table-row;" class="xs">
                        <div style="display: table-cell;">
                            <input type="text" value="{{ $auth_rep_one_address }}" name="auth_rep_one_address" style="width: 95%">
                            <label class="italic">Address</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_one_apt }}" name="auth_rep_one_apt" style="width: 90%">
                            <label class="italic">Apt #</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_one_city }}" name="auth_rep_one_city" style="width: 95%" />
                            <label class="italic">City</label>
                        </div>
                        <div style="display: table-cell;">

                            <input type="text" value="{{ $auth_rep_one_state }}" name="auth_rep_one_state" style="width: 95%" />
                            <label class="italic">State</label>
                        </div>

                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_one_zip }}"name="auth_rep_one_zip" style="width: 95%" />
                            <label class="italic">Zip</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-container" style="margin-top: 5px;">
            <p style="padding:0;margin: 0;" class="xs">
            The following individual will be authorized to communicate with SLC Supplemental Needs Trust. I authorize
            this individual to: Make Deposits, Request Statements and Request Disbursements.
            </p>
            <p class="strong sm" style="margin-top:5px">Authorized Representative #2</p>

            <div style="display: table;width:100%;margin-top:10px" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input type="text" value="{{ $auth_rep_two_fname }}" name="auth_rep_two_fname" style="width: 95%" /> <br>
                        <label class="italic">First</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_lname }}"name="auth_rep_two_lname" style="width: 95%" /> <br>
                        <label class="italic">Last</label>
                    </div>
                </div>
            </div>

            <div style="display: table;width:100%;margin-top:10px" >
                <div style="display: table-row;margin-bottom:10px;">
                    <div style="display: table-cell;padding-bottom:10px;margin-bottom:10px">
                        <label style="" class="sm strong">Contact Information</label>
                    </div>
                </div>
                <div style="display: table-row;" class="xs">
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_tel }}" name="auth_rep_two_tel" style="width: 95%"> <br>
                        <label class="italic">Home Phone</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_cell }} " name="auth_rep_two_cell" style="width: 95%">
                        <label class="italic">Cell Phone</label>
                    </div>
                    <p style="margin-left:10px;margin-top:0px">Preferred Phone
                    <label style="margin: 0;">
                        <input type="checkbox" name="authorized_preferred_cell2" class="checkboxissue" value="Cell"
                            {{ isset($authorized_preferred_cell2) && $authorized_preferred_cell2 === 'Cell' ? 'checked' : '' }}>
                        <label>Cell</label>
                    </label>
                    <label style="margin: 0;">
                        <input type="checkbox" name="authorized_preferred_cell2" class="checkboxissue" value="Home"
                            {{ isset($authorized_preferred_cell2) && $authorized_preferred_cell2 === 'Home' ? 'checked' : '' }}>
                        <label>Home</label>
                    </label>
                </p>

                </div>
            </div>

            <div style="display: table; width: 100%; margin-top: 10px;" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;width:270px">
                        <input type="text" value="{{ $auth_rep_two_email }}" name="auth_rep_two_email" style="width: 95%;" />
                        <br>
                        <label class="italic">Email</label>
                    </div>
                    <div style="display: table-cell;">
                        <div style="display: inline-block; width: 100%;">
                            <label class="sm" style="display: inline-block; margin-left: 10px; vertical-align: bottom;">
                                Relationship to Beneficiary
                            </label>
                            <input type="text" value="{{ $auth_rep_two_relation_beneficiary }}" name="auth_rep_two_relation_beneficiary"
                                style="width: 200px; display: inline-block; vertical-align: bottom; float: right;" />
                        </div>
                    </div>
                </div>
            </div>


                <div style="display: table;width:100%">

                    <div style="display: table-row;padding-bottom:10px">
                        <div style="display: table-cell;margin-top:10px;padding-bottom:10px">
                            <label style="" class="sm strong">Address</label>
                        </div>
                    </div>

                    <div class="xs" style="display: table-row;">
                        <div style="display: table-cell;">
                            <input type="text" value="{{ $auth_rep_two_address }}" name="auth_rep_two_address" style="width: 95%">
                            <label class="italic">Address</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_two_apt }}" name="auth_rep_two_apt" style="width: 90%">
                            <label class="italic">Apt #</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_two_city }}" name="auth_rep_two_city" style="width: 95%" />
                            <label class="italic">City</label>
                        </div>
                        <div style="display: table-cell;">

                            <input type="text" value="{{ $auth_rep_two_state }}" name="auth_rep_two_state" style="width: 95%" />
                            <label class="italic">State</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_two_zip }}"name="auth_rep_two_zip" style="width: 95%" />
                            <label class="italic">Zip</label>
                        </div>
                    </div>
                </div>
            </div>



    </div>



            {{-- <p style="padding:0;margin: 0;">
                <div>Name:</div>
                First <input type="text" value="{{ $auth_rep_two_fname }}" class="no-border"
                    name="auth_rep_two_fname" style="width: 100px; height: 20px;  ">
                Last <input type="text" value="{{ $auth_rep_two_lname }}" class="no-border"
                    name="auth_rep_two_lname" style="width: 100px; height: 20px;  ">
            </p>

            <p style="padding:0;margin: 0; ">
                Address <input type="text" value="{{ $auth_rep_two_address }}" class="no-border"
                    name="auth_rep_two_address" style="width: 300px; height: 20px;  "> Apt#:
                <input type="text" value="{{ $auth_rep_two_apt }}" class="no-border" name="auth_rep_two_apt"
                    style="width: 100px; height: 20px;  ">
            </p>
            <p style="padding:0;margin: 0; ">
                City <input type="text" value="{{ $auth_rep_two_city }}" class="no-border"
                    name="auth_rep_two_city" style="width: 100px; height: 20px;  "> State
                <input type="text" value="{{ $auth_rep_two_state }}" class="no-border" name="auth_rep_two_state"
                    style="width: 100px; height: 20px;  "> Zip
                <input type="text" value="{{ $auth_rep_two_zip }}" class="no-border" name="auth_rep_two_zip"
                    style="width: 100px; height: 20px;  ">
            </p>

            <p style="padding:0;margin: 0; ">
                Home Phone<input type="text" value="{{ $auth_rep_two_tel }}" class="no-border"
                    name="auth_rep_two_tel" style="width: 100px; height: 20px;  "> Cell Phone
                <input type="text" value="{{ $auth_rep_two_cell }}" class="no-border" name="auth_rep_two_cell"
                    style="width: 100px; height: 20px;  ">
            </p>
            <p style=" "> Relationship to Beneficiary
                <input type="text" value="{{ $auth_rep_two_relation_beneficiary }}" class="no-border"
                    name="auth_rep_two_relation_beneficiary" style="width: 100px; height: 20px;  ">
            </p>
            <p>Preferred Phone? <input type="checkbox" name="authorized_preferred_cell2" value="Cell"
                    {{ isset($authorized_preferred_cell2) && $authorized_preferred_cell2 === 'Cell' ? 'checked' : '' }}>
                Cell
                <input type="checkbox" name="authorized_preferred_phone2" value="Home"
                    {{ isset($authorized_preferred_phone2) && $authorized_preferred_phone2 === 'Home' ? 'checked' : '' }}>
                Home

            </p> --}}
            <p
            class="md section-heading"
                style="background-color:rgb(184 221 219);color:rgb(52 159 153);; width:21%">
                REFERRING SOURCE
            </p>
            <div style="display: table; width:100%" class="xs">
                <div style="display: table-row;width:100%">
                    <div style="display: table-cell; width: 50%;">
                        <input type="text" value="{{ $referring_agency }}" name="referring_agency" style="width:95%" /> <br>
                        <label class="italic">Name of Agency</label>
                    </div>
                    <div style="display: table-cell; width: 50%;">
                        <input type="text" value="{{ $referring_contract }}" name="referring_contract" style="width:95%" /> <br>
                        <label class="italic">Name of Contract</label>
                    </div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell;margin-top:6px;padding-top:7px">

                        <input type="text" value="{{ $referring_tel }}" name="referring_tel" style="width:95%" /> <br>
                        <label class="italic">Home</label>
                    </div>

                    <div style="display: table-cell;margin-top:6px;padding-top:7px">
                        <input type="text" value="{{ $referring_email }}"name="referring_email" style="width:95%" /> <br>
                        <label class="italic">Email</label>
                    </div>
                </div>

                {{-- <div style="display: table-row">
                    <div style="display: table-cell;">
                        <span style="font-size:12px">SLC SUPPLEMENTAL NEEDS TRUST</span>
                    </div>
                    <div style="display: table-cell;text-align: center;">
                        <span style="border: 1px solid rgb(52 159 153);width: 2%;padding: 5px;font-size:12px">1</span>
                    </div>
                    <div style="display: table-cell;text-align: right;">
                        <span style="font-size:12px">JOINDER AGREEMENT</span>
                    </div>
                </div> --}}
            </div>
            <div style="display:table;width:100%" class="xs">
            <div style="display: table-row;">
                    <div style="display: table-cell;margin-top:6px;padding-top:7px">
                        <input type="text" value="{{ $referring_address }}" name="referring_address" style="width:95%">
                        <label class="italic">Address</label>
                    </div>
                    <div style="display: table-cell;margin-top:6px;padding-top:7px">
                        <input type="text" value="{{ $referring_apt }}" name="referring_apt" style="width:90%">
                        <label class="italic">Apt #</label>
                    </div>
                    <div style="display: table-cell;margin-top:6px;padding-top:7px">
                        <input type="text" value="{{ $referring_city }}" name="referring_city" style="width:95%" />
                        <label class="italic">City</label>
                    </div>
                    <div style="display: table-cell;margin-top:6px;padding-top:7px">
                        <input type="text" value="{{ $referring_state }}" name="referring_state" style="width:95%" />
                        <label class="italic">State</label>
                    </div>
                    <div style="display: table-cell;margin-top:6px;padding-top:7px">
                        <input type="text" value="{{ $referring_zip }}" name="referring_zip" style="width:95%" />
                        <label class="italic">Zip</label>
                    </div>

                </div>
            </div>



            {{-- <p style=" ">
                Name of Agency <input type="text" value="{{ $referring_agency }}" class="no-border"
                    name="referring_agency" style="width: 100px; height: 20px;  ">
                Name of Contract <input type="text" value="{{ $referring_contract }}" class="no-border"
                    name="referring_contract" style="width: 100px; height: 20px;  ">
            </p>
            <p style=" ">
                Home <input type="text" value="{{ $referring_tel }}" class="no-border" name="referring_tel"
                    style="width: 100px; height: 20px;  ">
                Address <input type="text" value="{{ $referring_address }}" class="no-border"
                    name="referring_address" style="width: 300px; height: 20px;  ">
            </p>

            <p style="padding:0;margin: 0; ">
                Apt#:
                <input type="text" value="{{ $referring_apt }}" class="no-border" name="referring_apt"
                    style="width: 100px; height: 20px;  ">
                City <input type="text" value="{{ $referring_city }}" class="no-border" name="referring_city"
                    style="width: 100px; height: 20px;  ">
            </p>
            <p style="padding:0;margin: 0; ">
                State
                <input type="text" value="{{ $referring_state }}" class="no-border" name="referring_state"
                    style="width: 100px; height: 20px;  ">
            </p>

            <p style="padding:0;margin: 0; ">
                Zip
                <input type="text" value="{{ $referring_zip }}" class="no-border" name="referring_zip"
                    style="width: 100px; height: 20px;  ">
                Email <input type="text" value="{{ $referring_email }}" class="no-border" name="referring_email"
                    style="width: 150px; height: 20px;  ">
            </p> --}}

            <p style="width:100%; margin-top:15px;padding-top:15px" class="sm" >
                I Authorize any applicable documents necessary for reporting to Government Agencies to be sent referring
                source
                above.
                <input type="checkbox" name="referring_auth1" value="Yes" class="checkboxissue"
                    {{ isset($referring_auth1) && $referring_auth1 === 'Yes' ? 'checked' : '' }}> Yes
                <input type="checkbox" name="referring_auth2" value="No" class="checkboxissue"
                    {{ isset($referring_auth1) && $referring_auth1 === 'No' ? 'checked' : '' }}> No
            </p>

            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                <div style="display: table-cell; text-align: left; width: 33%;">
                    <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                </div>
                <div style="display: table-cell; text-align: center; width: 33%;">
                    <div style=" padding: 7px; display: inline-block; position: relative;">
                        <p class="footer-center xs" style="margin: 0;">2</p>
                        <div style="
                                    transform: translateX(-50%);">
                        </div>
                    </div>
                </div>
                <div style="display: table-cell; text-align: right; width: 33%;">
                    <p class="xxs">JOINDER AGREEMENT</p>
                </div>
                </div>
            </div>

                {{-- <div style="display: table-row">
                    <div style="display: table-cell;">
                        <span style="font-size:12px">SLC SUPPLEMENTAL NEEDS TRUST</span>
                    </div>
                    <div style="display: table-cell;text-align: center;">
                        <span style="border: 1px solid rgb(52 159 153);width: 2%;padding: 5px;font-size:12px">1</span>
                    </div>
                    <div style="display: table-cell;text-align: right;">
                        <span style="font-size:12px">JOINDER AGREEMENT</span>
                    </div>
                </div> --}}
        </div>

<div class="page-break"></div>

        <p class='md section-heading'
        style="width:27%;background-color:rgb(184 221 219);color:rgb(52 159 153);;margin:0;margin-bottom:7px; margin-left:-20px">
            PURPOSE OF ENROLLMENT
        </p>
        <div class="page-3">
            <p style="font-size: 12px; margin: 0;padding-top:5px" class='xs'>
                Indicate reason for establishing an account.
            </p>
            <div style="margin: 0; padding-bottom:6px;padding-top:6px;" class='xs'>
                <input type="checkbox" name="account_establishing_reason1" class="checkboxissue" value="Shelter Monthly Excess Income"
                    {{ isset($account_establishing_reason1) && $account_establishing_reason1 === 'Shelter Monthly Excess Income' ? 'checked' : '' }}>
                <label > Shelter Monthly Excess Income</label>
                <input style="margin-left:40px" type="checkbox" name="account_establishing_reason1" class="checkboxissue" value="Shelter Excess Resources"
                    {{ isset($account_establishing_reason1) && $account_establishing_reason1 === 'Shelter Excess Resources' ? 'checked' : '' }}>
                <label> Shelter Excess Resources</label>
            </div>
            <br/>
            <p class='md section-heading'
                style="width:26%;background-color:rgb(184 221 219);color:rgb(52 159 153);;margin:0;margin-bottom:7px;margin-left:-20px">
                MEDICAID INFORMATION
            </p>
            <div style='padding-top:4px;'>

            <table style="padding-top: 0px; margin-top:10px;">
            <thead>
                    <tr style="padding: 0; margin: 0;">
                        <td  style='width:190px;padding:6px;text-align:left;padding-left:12px;padding-top:13px;margin-top:8px;font-size:11px '>Please Attach MAP / LDSS Notice of Decision</td>
                        <td class='xs' style="vertical-align: bottom;padding:6px;text-align:left;padding-left:12px;padding-top:13px;margin-top:8px">Applicant</td>
                        <td class='xs' style="vertical-align: bottom;padding:6px;text-align:left;padding-left:12px;padding-top:3px;margin-top:8px">Spouse</td>
                    </tr>
                </thead>
                <tr style="padding: 0; margin: 0;" class='sm'>
                    <td style="width:180px;margin:0;padding:0px;">
                        <p style="margin:0;padding:3px;text-align:left;padding-left:12px;padding-top:4px;line-height :12px !important;">
                            <span class="xs">
                                Application Status
                            </span>
                            <br/>
                            <span class="xs" style="margin-top:-8px;padding-top:-8px">
                                Does the beneficiary receive Medicaid?
                            </span>
                        </p>
                    </td>
                    <td class='xs' style="width:80px;padding:0;">
                        <div  style="margin:0;padding:3px;text-align:center;padding-left:12px:padding-top:12px">
                            <input type="checkbox" name="beneficiary_receive_medicaid_applicant1" class="checkboxissue" value="Yes"
                                {{ isset($beneficiary_receive_medicaid_applicant1) && $beneficiary_receive_medicaid_applicant1 === 'Yes' ? 'checked' : '' }}>
                                <label>Yes</label>
                            <input type="checkbox" name="beneficiary_receive_medicaid_applicant1" class="checkboxissue" value="No"
                                {{ isset($beneficiary_receive_medicaid_applicant1) && $beneficiary_receive_medicaid_applicant1 === 'No' ? 'checked' : '' }}>
                                <label>No</label>
                            <input type="checkbox" name="beneficiary_receive_medicaid_applicant1" class="checkboxissue" value="Pending"
                                {{ isset($beneficiary_receive_medicaid_applicant1) && $beneficiary_receive_medicaid_applicant1 === 'Pending' ? 'checked' : '' }}>
                                <label>Pending</label>
                        </div>
                    </td>
                    <td class='xs' style="width:80px;margin:0;">
                        <div style="margin:0;padding:4px;text-align:left;padding-left:12px;padding-top:8px">
                            <input type="checkbox" name="beneficiary_receive_medicaid_spouse1" class="checkboxissue" value="Yes"
                                {{ isset($beneficiary_receive_medicaid_spouse1) && $beneficiary_receive_medicaid_spouse1 === 'Yes' ? 'checked' : '' }}>
                                <label>Yes</label>

                            <input type="checkbox" name="beneficiary_receive_medicaid_spouse1" class="checkboxissue" value="No"

                                {{ isset($beneficiary_receive_medicaid_spouse1) && $beneficiary_receive_medicaid_spouse1 === 'No' ? 'checked' : '' }}>
                                <label>No</label>

                            <input type="checkbox" name="beneficiary_receive_medicaid_spouse3" class="checkboxissue" value="Pending"

                                {{ isset($beneficiary_receive_medicaid_spouse1) && $beneficiary_receive_medicaid_spouse1 === 'Pending' ? 'checked' : '' }}>
                                <label>Pending</label>
                        </div>
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0;" class='sm'>
                    <td class="xs" style="width:80px;padding:4px;text-align:left;padding-left:12px">
                        CIN Number/medicaid Number
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:4px;text-align:left;padding-left:12px">
                        <input type="text" value="{{ $applicant_medicaid_cin_number }}" style='border:none' class="no-border xs"
                            name="applicant_medicaid_cin_number">
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:4px;text-align:left;padding-left:12px">
                        <input type="text" value="{{ $spouse_medicaid_cin_number }}" style='border:none' class="no-border xs"
                            name="spouse_medicaid_cin_number">
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0;" class='sm'>
                    <td class="xs" style="width:80px; padding:4px;text-align:left;padding-left:12px">
                        Monthly Spend Down $
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:4px;text-align:left;padding-left:12px">
                        <input type="text" value="{{ $medicaid_applicant_monthly_spend_down }}" style='border:none' class="no-border xs"
                            name="medicaid_applicant_monthly_spend_down">
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:4px;text-align:left;padding-left:12px">
                        <input type="text" value="{{ $medicaid_spouse_monthly_spend_down }}" style='border:none'  class="no-border xs"
                            name="medicaid_spouse_monthly_spend_down">
                    </td>
                </tr>
            </table>
            <br>
            <div style="margin: 0;padding: 0;" class='xs'>
                <span>If the Beneficiary receives other benefits, such as Food Stamps, HUD Section 8, etc. list these
                benefits.
                and monthly amounts
                </span>
                <input
                 type="text" class="no-border"
                 name="beneficiary_benefits"
                 value="{{ $beneficiary_benefits }}" style="width: 80%"
                 >
            </div>
        </div>
            <br>
            <p class='md section-heading'
                style="width:22%;background-color:rgb(184 221 219);color:rgb(52 159 153);">
                HOUSEHOLD INCOME
            </p>
            <div class='xs' style='padding-top:2px'>
                <span style='' class='sm strong'>
                     Spouse Information
                </span>
                 <span class='italic xs'>
                    (please include proof of income)
                </span>
            </div>

            <p style="margin: 0;padding-top:8px;" class='xs'>
                Is Spouse Deceased?
                <input type="checkbox" class="checkboxissue"  name="spouse_decreased1" value="Yes"
                    {{ isset($spouse_decreased1) && $spouse_decreased1 === 'Yes' ? 'checked' : '' }}>
                    <label>Yes</label>
                <input type="checkbox" class="checkboxissue"  name="spouse_decreased1" value="No"
                    {{ isset($spouse_decreased1) && $spouse_decreased1 === 'No' ? 'checked' : '' }}>
                    <label>No</label>
            </p>
            <p style="margin: 0;padding-top:6px;padding-bottom:6px" class='xs'>
                Is Applicant & Spouse Applying Together?
                <input type="checkbox" class="checkboxissue" name="applying_together1" value="Yes"
                    {{ isset($applying_together1) && $applying_together1 === 'Yes' ? 'checked' : '' }}>
                    <label>Yes</label>

                <input type="checkbox" class="checkboxissue" name="applying_together1" value="No"
                    {{ isset($applying_together1) && $applying_together1 === 'No' ? 'checked' : '' }}>
                    <label>No</label>
                    <span style='padding-left:10px'>
                        If Yes, Fill in Spouse’s Income.
                    </span>
            </p>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;margin-top:6px;width:40%">
                    <div style="display: table-cell;padding-bottom:7px;padding-top:3px" class='xs'>
                        <label style='padding-bottom:10px;'>Name:</label>
                        <span>First</span>
                        <input style='width:70%' type="text" value="{{ $spouse_fname }}" name="spouse_fname" />
                    </div>
                   &nbsp;

                    <div style="display: table-cell;padding-bottom:7px;padding-top:3px" class='xs'>
                        <!-- <label  style='padding-bottom:10px;'>Name: </label> -->
                        <span>Last</span>
                        <input style='width:72%' type="text" value="{{ $spouse_lname }}" name="spouse_lname" />
                    </div>
                </div>
                {{-- <div style="display: table-row;">
                    <label style="display: table-cell; width: 20%; text-align: start;">First Name</label>
                    <input type="text" value="{{ $spouse_fname }}" class="no-border" name="spouse_fname"
                        style="display: table-cell; text-align: start; width: 30%;">

                    <label style="display: table-cell; width: 20%; text-align: start;">Last Name</label>
                    <input type="text" value="{{ $spouse_lname }}" class="no-border" name="spouse_lname"
                        style="display: table-cell; text-align: start; width: 30%;">
                </div> --}}

            </div>


            <div class='xs padding-top:3px'>
                <div>
                    <label>
                        Spouse Applied for Medicaid with beneficiary?
                    </label>

                    <input type="checkbox" class="checkboxissue" name="spouse_applied_for_medicaid_with_beneficiary1" value="Yes"
                        {{ isset($spouse_applied_for_medicaid_with_beneficiary1) && $spouse_applied_for_medicaid_with_beneficiary1 === 'Yes' ? 'checked' : '' }} >
                    <label>Yes</label>
                    <input type="checkbox" class="checkboxissue" name="spouse_applied_for_medicaid_with_beneficiary1" value="No"
                        {{ isset($spouse_applied_for_medicaid_with_beneficiary1) && $spouse_applied_for_medicaid_with_beneficiary1 === 'No' ? 'checked' : '' }} >
                    <label>No</label>

                </div>
            </div>
            <br>
            <table style=" padding: 0;margin: 0;" class='sm'>
                <thead>
                    <tr style="padding: 0;margin: 0;">
                        <td style="padding:3px ;margin: 0;">
                        <p style="padding: 5px;margin: 0;color:#349f99;text-align:left;padding-left:12px;width:230px;font-family:Poppins-SemiBold" class='xs'>  TYPE OF BENEFIT MONTHLY AMOUNT</p>
                    </td>
                    <td style="padding: 5px;margin: 0;">
                        <p style="padding: 3px;margin: 0;text-align:left;padding-left:12px" class='xs'> Applicant <br></p>
                    </td>
                    <td style="padding:5px ;margin: 0;">
                        <p style="padding: 3px;margin: 0;text-align:left;padding-left:12px" class='xs'> Spouse <br></p>
                    </td>
                </tr>
            </thead>
                <tr style="padding: 0;margin: 0;" class='xs'>
                    <td style="width:180px;padding: 0px;margin: 0;">
                        <p style='margin:3px;text-align:left;padding-left:12px' class='xs'>
                            Supplement Security Income(SSI)
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="margin: 3px;"><span>$</span> <input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_ssi }}"  class="no-border"
                                name="applicant_ssi">
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="margin: 3px;"><span>$</span> <input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_ssi }}"  class="no-border"
                                name="spouse_ssi"></p>
                    </td>
                </tr>
                <tr style=" padding: 0;margin: 0 " >
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px">
                        Supplement Security Disability Income(SSDI)
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="margin: 3px;"><span>$</span> <input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_ssdi }}"  class="no-border"
                                name="applicant_ssdi">
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="margin: 3px;"><span>$</span> <input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_ssdi }}"  class="no-border"
                                name="spouse_ssdi"></p>
                    </td>
                </tr>
                <tr style=" padding: 0;margin: 0 ">
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ;">
                        <p style='margin:3px;text-align:left;padding-left:9px'>
                            Supplement Security Retirement Income(SSA)
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px" class='xs'>
                        <p style="margin: 3px;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_ssa }}"  class="no-border"
                                name="applicant_ssa"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="margin: 3px;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_ssa }}"  class="no-border" name="spouse_ssa">
                        </p>
                    </td>
                </tr>
                <tr style=" padding: 0;margin: 0 ">
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                    VA Benefits
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_va_ben }}"  class="no-border"
                                name="applicant_va_ben"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_va_ben }}"  class="no-border"
                                name="spouse_va_ben"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        Employment Benefits
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_employee_ben }}"  class="no-border"
                                name="applicant_employee_ben"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_employee_ben }}"  class="no-border"
                                name="spouse_employee_ben"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        Survivor Benefits

                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_survivor_ben }}"  class="no-border"
                                name="applicant_survivor_ben"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_survivor_ben }}"  class="no-border"
                                name="spouse_survivor_ben"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        IRA Distribution
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_ira_dist }}"  class="no-border"
                                name="applicant_ira_dist"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_ira_dist }}"  class="no-border"
                                name="spouse_ira_dist">
                        </p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        Pension / Annuities
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_pension_annuities }}"  class="no-border"
                                name="applicant_pension_annuities"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_pension_annuities }}"  class="no-border"
                                name="spouse_pension_annuities"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        Interest / Dividends
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_interest_dividends }}"  class="no-border" name="applicant_interest_dividends"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_interest_dividends }}"  class="no-border" name="spouse_interest_dividends"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        Reparations
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_reparations }}"  class="no-border"
                                name="applicant_reparations"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_reparations }}"  class="no-border"
                                name="spouse_reparations"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px padding: 0px;text-align:left;padding-left:12px">
                        Other
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $applicant_other }}"  class="no-border"
                                name="applicant_other">
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;text-align:left;padding-left:12px; " class='xs'>
                        <p style="padding: 4px;margin: 0;"><span>$</span><input style='border:none;vertical-align:sub' type="text" value="{{ $spouse_other }}"  class="no-border"
                                name="spouse_other"></p>
                    </td>
                </tr>
            </table>
            <br>
            <p class='italic' style="padding: 0;margin: 0;" class='xs'>
               Please Note: All disbursements must be for sole benefit of the account beneficiary.
                <br>
                A spouse is not a beneficiary for the account.
            </p>
            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                <div style="display: table-cell; text-align: left; width: 33%;">
                    <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                </div>
                <div style="display: table-cell; text-align: center; width: 33%;">
                    <div style=" padding: 7px; display: inline-block; position: relative;">
                        <p class="footer-center xs" style="margin: 0;">3</p>
                        <div style="
                                    transform: translateX(-50%);">
                        </div>
                    </div>
                </div>
                <div style="display: table-cell; text-align: right; width: 33%;">
                    <p class="xxs">JOINDER AGREEMENT</p>
                </div>
                </div>
            </div>

        </div>

        <div class="page-break"></div>

        <div class="page-4">
            <div>
                <p class='sm' style="padding: 2%;text-align: center">FOR ANY APPLICABLE ITEMS BELOW, PLEASE ATTACH THE NECESSARY
                    PROOF.</p>
            </div>
            <p class='md section-heading'
                style="width:26%;background-color:rgb(184 221 219);color:rgb(52 159 153);">
                HEALTHCARE PREMIUMS
            </p>
            <div style='display:table'>
            <div style=" display: table-row;">
                <div style='display:table-cell;padding-bottom:15px'>
                    <span style="margin: 0;padding:0" class='xs'>
                        Medicare Part:
                        <span>
                            <input type="checkbox" class="checkboxissue" name="healthcare_b" value="B"
                            {{ isset($healthcare_b) && $healthcare_b === 'B' ? 'checked' : '' }}>
                            <label>B</label>
                            <input type="checkbox"  class="checkboxissue" name="healthcare_b" value="D"
                            {{ isset($healthcare_b) && $healthcare_b === 'D' ? 'checked' : '' }}>
                            <label>D</label>
                        </span>
                        <span style='margin-left:46px' class='xs'>
                            Does the applicant have a supplemental policy?
                            <input type="checkbox" class="checkboxissue" name="supplemental_yes" value="Yes"
                            {{ isset($supplemental_yes) && $supplemental_yes === 'Yes' ? 'checked' : '' }}>
                            <label>Yes</label>

                            <input type="checkbox" class="checkboxissue" name="supplemental_yes" value="No"
                            {{ isset($supplemental_yes) && $supplemental_yes === 'No' ? 'checked' : '' }}>
                            <label>No</label>
                        </p>
                    </div>
               </div>
                </span>
            <div style="display: table-row;margin-top:10px;padding-top:10px" class='xs' >
                <span style='margin-top:4px'>
                    If yes, what is the monthly premium? $
                </span>
                <input type="text" value="{{ $healthcare_partb_premium }}" class="no-border"
                    name="healthcare_partb_premium">
                Plan Name?
                <input type="text" value="{{ $healthcare_partb_plan }}" class="no-border"
                    name="healthcare_partb_plan">
            </div>
            </div>
            <div style="display: table;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <p class='md section-heading' style="width:40%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-size: 14px;">FUNERAL INFORMATION</p>
                    </div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; margin-bottom: 2px;">
                        <p style="padding:0;margin: 0;" class='xs'>
                            Does the Beneficiary have any funeral provisions in place?
                            <input type="checkbox" class="checkboxissue" name="funeral_information_body_yes" value="Yes"
                                {{ isset($funeral_information_body_yes) && $funeral_information_body_yes === 'Yes' ? 'checked' : '' }}>
                                <label>Yes</label>

                            <input type="checkbox" class="checkboxissue"  name="funeral_information_body_yes" value="No"
                                {{ isset($funeral_information_body_yes) && $funeral_information_body_yes === 'No' ? 'checked' : '' }}>
                                <label>No</label>

                        </p>
                        <p class='italic' style="font-size:12px">Please attach a copy</p>
                    </div>
                </div>
            </div>
            <div style="display: table;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                       <p class='md section-heading' style="width:31%;background-color:rgb(184 221 219);color:rgb(52 159 153);;font-size: 14px;">LIFE INSURANCE INFORMATION</p>
                    </div>
                </div>
                <p style="padding:0;margin: 0;" class='xs'>
                    Is there a life insurance policy in place for the Beneficiary?
                    <input type="checkbox" class="checkboxissue" name="life_insurance_information_body_yes" value="Yes"
                        {{ isset($life_insurance_information_body_yes) && $life_insurance_information_body_yes === 'Yes' ? 'checked' : '' }}>
                        <label>Yes</label>

                    <input type="checkbox" class="checkboxissue" name="life_insurance_information_body_yes" value="No"
                        {{ isset($life_insurance_information_body_yes) && $life_insurance_information_body_yes === 'No' ? 'checked' : '' }}>
                        <label>No</label>

                </p>
                    <p class='italic xs' style="">If you answered yes, please attach funeral provision documents.</p>
                <div style="display: table-row;">
                        <div style="display: table-cell;padding-bottom:14px" class='xs'>
                            <label>Name of Insured</label>
                            <input type="text" value="{{ $insured_name }}" name="insured_name" />
                            <label>Name of Owner</label>
                            <input type="text" value="{{ $insured_owner }}" name="insured_owner" />
                        </div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell;padding-bottom:14px" class='xs'>
                        <label>Name of Insurance Company</label>
                        <input type="text" value="{{ $insurance_company }}" name="insurance_company" />
                        <label>Policy #</label>
                        <input type="text" value="{{ $insurance_policy_number }}" name="insurance_policy_number" />
                    </div>
                </div>
                <div style="display: table-row;" class='xs'>
                    <div style="display: table-cell; padding-bottom: 14px;">
                        <label>
                            <span>Term of Policy:</span> &nbsp;
                            <input style="height: 15px; vertical-align: middle;" class="checkboxissue" type="checkbox" name="type_of_policy1" value="Term"
                                {{ isset($type_of_policy1) && $type_of_policy1 === 'Term' ? 'checked' : '' }}>
                            Term
                        </label>
                        <input type="text" value="{{ $healthcare_plan }}"  class="no-border" name="healthcare_plan" style="margin-left: 5px;width:78px">

                        <label>
                            <input style="height: 15px; vertical-align: middle" class="checkboxissue" type="checkbox"   name="type_of_policy1" value="Life"
                                {{ isset($type_of_policy1) && $type_of_policy1 === 'Life' ? 'checked' : '' }}>
                            Life
                        </label>
                        <input type="text" value="{{ $healthcare_plan2 }}" class="no-border" name="healthcare_plan2" style="margin-left: 5px;width:83px">
                        <span style='padding-top:5px;margin-top:5px'>
                            <label>Cash Surrender Value $</label>
                            <input type="text" value="{{ $cash_surrender_value }}" name="cash_surrender_value" style="margin-left: 5px;vertical-align: middle">
                        </div>
                        </span>
                </div>

                <div style="display: table-row;">
                    <div style="display: table-cell;" class='xs'>
                    Upon the death of the Beneficiary, amounts remaining in the Beneficiary’s sub-account shall be
                        retained in the Trust solely for the benefit of individuals who are disabled as defined in Soc. Sec. Law
                        Section 1614(a) (3) [42 USC 1382c(a) (3)] and any subsequent definitions that are enacted into law.
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table;justify-content: space-between">
            <div style="display: inline-block; width: 100%;">
                <p class="strong md section-heading" style="display: inline-block; width: 168px; background-color: rgb(184, 221, 219); color: rgb(52, 159, 153); margin-right: 10px;">
                    LIVING ARRANGEMENTS
                </p>
                <span class="italic xs" style="display: inline-block; vertical-align: top;margin-top:3px">
                    (indicate the living arrangement of the Beneficiary)
                </span>
            </div>
            </div>
            <p style="padding-bottom: 0;margin-bottom:0;padding-top:-14px;margin-top:-15px" class='xs'>
                <input type="checkbox" id="independently" name="living_arrangement1" value="Independently"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Independently' ? 'checked' : '' }}>
                <label for="independently" style="vertical-align: middle;">Independently</label>&nbsp;

                <input type="checkbox" id="with_spouse" name="living_arrangement1" value="With Spouse"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'With Spouse' ? 'checked' : '' }}>
                <label for="with_spouse" style="vertical-align: middle;">With Spouse</label>&nbsp;

                <input type="checkbox" id="with_parents" name="living_arrangement1" value="With Parents"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'With Parents' ? 'checked' : '' }}>
                <label for="with_parents" style="vertical-align: middle;">With Parents/other family</label>&nbsp;

                <input type="checkbox" id="assisted_living" name="living_arrangement1"
                    value="Assisted Living facility"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Assisted Living facility' ? 'checked' : '' }}>
                <label for="assisted_living" style="vertical-align: middle;">Assisted Living Facility</label>
            </p>
            <p style="padding: 0;margin:0;margin-top:15px" class='xs'>
                <input type="checkbox" id="family_care" name="living_arrangement1" value="Family Care Program"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Family Care Program' ? 'checked' : '' }}>
                <label for="family_care" style="vertical-align: middle;">Family Care Program</label>&nbsp;

                <input type="checkbox" id="nursing_home" name="living_arrangement1" value="Nursing Home"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Nursing Home' ? 'checked' : '' }}>
                <label for="nursing_home" style="vertical-align: middle;">Nursing Home</label>&nbsp;

                <input type="checkbox" id="supervised" name="living_arrangement1" value="CR/IRA/ICF(supervised)"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'CR/IRA/ICF(supervised)' ? 'checked' : '' }}>
                <label for="supervised" style="vertical-align: middle;">CR/IRA/ICF (supervised)</label>&nbsp;

                <input type="checkbox" id="supportive" name="living_arrangement1" value="CR/IRA(Supportive)"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'CR/IRA(Supportive)' ? 'checked' : '' }}>
                <label for="supportive" style="vertical-align: middle;">CR/IRA (supportive)</label>
            </p>
            <p style="padding: 0; margin: 0;margin-top:15px" class='xs'>
                <input type="checkbox" id="other_living_arrangement" name="living_arrangement1" value="Other"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Other' ? 'checked' : '' }}>
                <label for="other_living_arrangement" style="vertical-align: middle;">Other - </label>&nbsp;
                <input type="text" value="{{ $living_arrangement_other }}" style="width:70%" class="no-border"
                    name="living_arrangement_other">
            </p>
            <br>
            <p class="strong md section-heading"  style="width:24%;background-color:rgb(184 221 219);color:rgb(52 159 153);">
                LIVING ARRANGEMENTS
            </p>
            <p class='italic xs' style='padding:0'> Please attach a copy of the guardianship order with this Joinder Agreement.</p>
            <p style="padding:0;margin: 0;" class='xs'>
                Does the Beneficiary have a court appointed Guardian?
                <label style="margin: 0;">
                    <input type="checkbox" name="living_arrangements_yes" class="checkboxissue" value="Yes"
                        {{ isset($living_arrangements_yes) && $living_arrangements_yes === 'Yes' ? 'checked' : '' }}>
                        <label>Yes</label>
                </label>
                <label style="margin: 0;">
                    <input type="checkbox" name="living_arrangements_yes" class="checkboxissue" value="No"
                        {{ isset($living_arrangements_yes) && $living_arrangements_yes === 'No' ? 'checked' : '' }}>
                        <label>No</label>

                </label>
            </p>
            <p style="padding:0;margin-top: 9px;" class='xs italic'>
                If you answered yes, continue to fill out below:
            </p>
            <p style="padding:0;margin-top: 7px;" class='xs'>
                Guardian of the:
                <label style="margin: 0;margin-left:5px">
                    <input type="checkbox" name="living_arrangements_person" class="checkboxissue" value="Person"
                        {{ isset($living_arrangements_person) && $living_arrangements_person === 'Person' ? 'checked' : '' }}>
                        <label>Person</label>

                </label>
                <label style="margin: 0;">
                    <input type="checkbox" name="living_arrangements_person"  class="checkboxissue" value="Person"
                        {{ isset($living_arrangements_person) && $living_arrangements_person === 'Property' ? 'checked' : '' }}>
                        <label>Property</label>

                </label>
                <label style="margin: 0;">
                    <input type="checkbox" name="living_arrangements_person" class="checkboxissue" value="Both"
                        {{ isset($living_arrangements_person) && $living_arrangements_person === 'Both' ? 'checked' : '' }}>
                        <label>Both</label>

                </label>
            </p>
            <p style="padding:0;margin-top: 8px;" class='xs'>
                Court Appointed Guardian Information
            </p>
            <br/>
            <div style="display: table;width:100%;margin-top:4px">
                <div style="display: table-row;">
                    <div style="display: table-cell;width:50%" class='xs'>
                        <input type="text" value="{{ $living_arrangement_first }}" name="living_arrangement_first" style="width: 95%" /> <br>
                        <label class="italic">First</label>
                    </div>

                    <div style="display: table-cell;width:50%" class='xs'>
                        <input type="text" value="{{ $living_arrangement_last }}" name="living_arrangement_last" style="width: 95%" /> <br>
                        <label class="italic">Last</label>
                    </div>
                </div>
                <br/>
                <div style="display: table-row;">
                    <div style="display: table-cell;width:50%;" class='xs'>
                        <input type="text" value="{{ $living_arrangement_primary }}" name="living_arrangement_primary" style="width: 95%" /> <br>
                        <label class="italic">Primary Phone</label>
                    </div>
                    <div style="display: table-cell;width:50%" class='xs'>
                        <input type="text" value="{{ $living_arrangement_email }}" name="living_arrangement_email" style="width: 95%" /> <br>
                        <label class="italic">Email</label>
                    </div>
                </div>
            </div>
            {{-- <p style="padding:0;margin: 0; ">
                First <input type="text" value="{{ $living_arrangement_first }}" class="no-border"
                    name="living_arrangement_first" style="width: 300px; height: 20px;  "> Last
                <input type="text" value="{{ $living_arrangement_last }}" class="no-border"
                    name="living_arrangement_last" style="width: 100px; height: 20px;  ">
            </p> --}}
            {{-- <p style="padding:0;margin: 0; ">
                Primary Phone <input type="text" value="{{ $living_arrangement_primary }}" class="no-border"
                    name="living_arrangement_primary" style="width: 100px; height: 20px;  "> Email
                <input type="text" value="{{ $living_arrangement_email }}" class="no-border"
                    name="living_arrangement_email" style="width: 100px; height: 20px;  ">
            </p> --}}
            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                <div style="display: table-cell; text-align: left; width: 33%;">
                    <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                </div>
                <div style="display: table-cell; text-align: center; width: 33%;">
                    <div style=" padding: 7px; display: inline-block; position: relative;">
                        <p class="footer-center xs" style="margin: 0;">4</p>
                        <div style="
                                    transform: translateX(-50%);">
                        </div>
                    </div>
                </div>
                <div style="display: table-cell; text-align: right; width: 33%;">
                    <p class="xxs">JOINDER AGREEMENT</p>
                </div>
                </div>
            </div>


        </div>

        <div class="page-break"></div>

        <div class="page-5">

<div class="section-title">
    <p class="strong md section-heading"  style="width:23%;background-color:rgb(184 221 219);color:rgb(52 159 153);">
        POWER OF ATTORNEY
    </p>

    <div class="pa-container xs">
        <p class="strong sm" style="margin:0;margin-bottom:15px">Power of Attornery <span class="italic" style="font-size:12px"> Please attach a copy of Power of Attorney</span></p>

        <div style="display: table; width: 100%;" class="xs">
            <div style="display: table-row;margin-bottom:0">
                <div style="display: table-cell;margin-bottom:0; width:50%">

                    <input type="text" value="{{ $power_fname }}"  name="power_fname" style="width: 95%;margin-bottom:0" />
                    <label class="italic">First</label>
                </div>
                <div style="display: table-cell;width:50%">
                    <input type="text" value="{{ $power_lname }}" name="power_lname" style="width: 95%" />
                    <label class="italic">Last</label>
                </div>
            </div>

        </div>
        {{-- <br> --}}
        <div style="display: table; width: 100%; margin-top:6px" class="xs">
            <div style="display: table-row;">
                <div style="display: table-cell;margin-top:6px;width:50%">

                    <input type="text" value="{{ $power_tel_home }}" name="power_tel_home" style="width: 95%" /> <br>
                    <label class="italic">Primary Phone</label>
                </div>
                <div style="display: table-cell;margin-top:6px;width:50%">
                    <input type="text" value="{{ $power_email }}" name="power_email" style="width: 95%" /> <br>
                    <label class="italic">Email</label>
                </div>
            </div>

        </div>
        {{-- <br> --}}

        <div style="display: table;width:100%;margin-top:6px">
            <div style="display: table-row;" class="xs">
                <div style="display: table-cell;margin-top:6px">
                    <input type="text" value="{{ $power_address }}" name="power_address" style="width: 95%">
                    <label class="italic">Address</label>
                </div>
                <div style="display: table-cell;margin-top:6px;">
                    <input type="text" value="{{ $power_apt }}" name="power_apt" style="width: 84%">
                    <label class="italic">Apt #</label>
                </div>
                <div style="display: table-cell;margin-top:6px">
                    <input type="text" value="{{ $power_city }}" name="power_city" style="width: 95%" />
                    <label class="italic">City</label>
                </div>
                <div style="display: table-cell;margin-top:6px">

                    <input type="text" value="{{ $power_state }}" name="power_state" style="width: 95%" />
                    <label class="italic">State</label>
                </div>
                <div style="display: table-cell;margin-top:6px">
                    <input type="text" value="{{ $power_zip }}"name="power_zip" style="width: 95%" />
                    <label class="italic">Zip</label>
                </div>
            </div>
        </div>

        <p style="margin: 0;margin-top:15px">Is this person the sole POA? <input type="checkbox" class="checkboxissue"  name="sole_poa1"
                value="Yes" {{ isset($sole_poa1) && $sole_poa1 === 'Yes' ? 'checked' : '' }}>
                <label>Yes</label>
            <input type="checkbox" name="sole_poa1" class="checkboxissue" value="No"
                {{ isset($sole_poa1) && $sole_poa1 === 'No' ? 'checked' : '' }}>
                <label>No</label>
        </p>

        <p style="margin: 0;margin-top:6px">
                If No, are the agents authorized to act separately? <input type="checkbox" class="checkboxissue" name="act_seprately1"
                value="Yes" {{ isset($act_seprately1) && $act_seprately1 === 'Yes' ? 'checked' : '' }}>
                <label>Yes</label>
            <input  type="checkbox" name="act_seprately1" class="checkboxissue" value="No"
                {{ isset($act_seprately1) && $act_seprately1 === 'No' ? 'checked' : '' }}>
                <label>No</label>
        </p>

</div>


<div style="margin-top: 5px" class="pa-container xs">

    <p style="margin:0;margin-bottom:15px" class="strong sm">Power of Attornery - Second Agent <span class="italic" style="font-size:12px" > Please attach a copy of Power of Attorney</span></p>
    <div style="display: table; width: 100%;">

        <div style="display: table-row;">
            <div style="display: table-cell;width:50%">

                <input type="text" value="{{ $power_fname2 }}" name="power_fname2" style="width: 95%" /> <br>
                <label class="italic">First</label>
            </div>
            <div style="display: table-cell;width:50%">
                <input type="text" value="{{ $power_lname2 }}" name="power_lname2" style="width: 95%" /> <br>
                <label class="italic">Last</label>
            </div>
        </div>

    </div>




    <div style="display: table; width: 100%;margin-top:6px">

        <div style="display: table-row;">
            <div style="display: table-cell;margin-top:6px;width:50%">

                <input type="text" value="{{ $power_tel_home2 }}" name="power_tel_home2" style="width: 95%" /> <br>
                <label class="italic">Primary Phone</label>
            </div>

            <div style="display: table-cell;margin-top:6px;width:50%">
                <input type="text" value="{{ $power_email2 }}" name="power_email2" style="width: 95%" /> <br>
                <label class="italic">Email</label>
            </div>
        </div>
    </div>

    <div style="display: table;width:100%;margin-top:6px">
        <div style="display: table-row;" class="xs">
            <div style="display: table-cell;margin-top:6px">
                <input type="text" value="{{ $power_address2 }}" name="power_address2" style="width: 95%">
                <label class="italic">Address</label>
            </div>
            <div style="display: table-cell;margin-top:6px">
                <input type="text" value="{{ $power_apt2 }}" name="power_apt2" style="width: 83%">
                <label class="italic">Apt #</label>
            </div>
            <div style="display: table-cell;margin-top:6px">
                <input type="text" value="{{ $power_city2 }}" name="power_city2" style="width: 95%" />
                <label class="italic">City</label>
            </div>
            <div style="display: table-cell;margin-top:6px">

                <input type="text" value="{{ $power_state2 }}" name="power_state2" style="width: 95%" />
                <label class="italic">State</label>
            </div>
            <div style="display: table-cell;margin-top:6px">
                <input type="text" value="{{ $power_zip2 }}"name="power_zip2" style="width: 95%" />
                <label class="italic">Zip</label>
            </div>
        </div>
    </div>






    <p style="margin: 0;margin-top:15px">Is this person the sole POA? <input type="checkbox" class="checkboxissue"
            name="power_of_attorney2_yes" value="Yes"
            {{ isset($power_of_attorney2_yes) && $power_of_attorney2_yes === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="power_of_attorney2_yes" value="No" class="checkboxissue"
            {{ isset($power_of_attorney2_yes) && $power_of_attorney2_yes === 'No' ? 'checked' : '' }}> No
    </p>
    <p style="margin: 0;margin-top:6px">
            If No, are the agents authorized to act separately? <input type="checkbox" class="checkboxissue"
            name="power_of_attorney2_authorized_yes" value="Yes"
            {{ isset($power_of_attorney2_authorized_yes) && $power_of_attorney2_authorized_yes === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="power_of_attorney2_authorized_yes" value="No" class="checkboxissue"
            {{ isset($power_of_attorney2_authorized_yes) && $power_of_attorney2_authorized_yes === 'No' ? 'checked' : '' }}>
        No
    </p>
    {{-- <p >If No, are the agents authorized to act separately? <input type="checkbox"
            name="power_of_attorney2_authorized_yes" value="Yes"
            {{ isset($power_of_attorney2_authorized_yes) && $power_of_attorney2_authorized_yes === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="power_of_attorney2_authorized_yes" value="No"
            {{ isset($power_of_attorney2_authorized_yes) && $power_of_attorney2_authorized_yes === 'No' ? 'checked' : '' }}>
        No
    </p> --}}
</div>



<p class="md strong section-heading" style=";width:27%;background-color:rgb(184 221 219);color:rgb(52 159 153);">
        GUARDIAN INFORMATION
    </p>
    <p class="sm italic" style="margin: 0;padding: 0;">
        Please attach a copy of Decree or Letter of guardianship
    </p>
    {{-- <p style="padding:0;margin: 0;">
        Does the Beneficiary have a court appointed Guardian?
        <input type="checkbox" name="guardian_information_yes" value="Yes"
            {{ isset($guardian_information_yes) && $guardian_information_yes === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="guardian_information_yes" value="No"
            {{ isset($guardian_information_yes) && $guardian_information_yes === 'No' ? 'checked' : '' }}> No
    </p> --}}
    <p class="sm">
        Does the Beneficiary have a court appointed Guardian?
        <input type="checkbox" style="margin-left:6px" name="guardian_information_yes" value="Yes" class="checkboxissue"
            {{ isset($guardian_information_yes) && $guardian_information_yes === 'Yes' ? 'checked' : '' }}>
            <label>Yes</label>

        <input type="checkbox" name="guardian_information_yes" value="No" class="checkboxissue"
            {{ isset($guardian_information_yes) && $guardian_information_yes === 'No' ? 'checked' : '' }}>
            <label>No</label>

        <div style="font-family: Poppins-Italic;margin-top:-10px;padding-top:-10px" class="sm"> If you answered yes, continue to fill out below:</div>
        <br/>

    </p>
    <p class="sm" style="margin: 0;padding: 0;margin-top:-2px;padding-top:-2px">
        Guardian of the:<input style="margin-left:5px" type="checkbox" name="guardian_appointed_for1" value="Person" class="checkboxissue"
            {{ isset($guardian_appointed_for1) && $guardian_appointed_for1 === 'Person' ? 'checked' : '' }}>
        <label>Person </label>

        <input type="checkbox" name="guardian_appointed_for1" value="Property" class="checkboxissue"
            {{ isset($guardian_appointed_for1) && $guardian_appointed_for1 === 'Property' ? 'checked' : '' }}>
            <label>Property</label>

        <input type="checkbox" name="guardian_appointed_for3" value="Both" class="checkboxissue"
            {{ isset($guardian_appointed_for1) && $guardian_appointed_for1 === 'Both' ? 'checked' : '' }}>
            <label>Both</label>


    </p>
    <p class="sm">Court Appointed Guardian Information</p>

    <div style="display: table; width:100%" class="xs">
    <div style="display: table-row;">
        <div style="display: table-cell;">

            <input type="text" value="{{ $guardianship_fname }}" name="guardianship_fname" style="width: 95%" /> <br>
            <label class="italic">First</label>
        </div>
       &nbsp;
        <div style="display: table-cell">
            <input type="text" value="{{ $guardianship_lname }}" name="guardianship_lname" style="width: 95%" /> <br>
            <label class="italic">Last</label>
        </div>
    </div>
    <div style="display: table-row;">
        <div style="display: table-cell;">

            <input type="text" value="{{ $guardianship_telephone }}" name="guardianship_telephone" style="width: 95%" /> <br>
            <label class="italic">Primary Phone</label>
        </div>
       &nbsp;
        <div style="display: table-cell">
            <input type="text" value="{{ $guardianship_email }}" name="guardianship_email" style="width: 95%" /> <br>
            <label class="italic">Email</label>
        </div>
    </div>
</div>

<p class="md strong section-heading" style="width:23%;background-color:rgb(184 221 219);color:rgb(52 159 153);">
        BENEFICIARY SERVICE
    </p>
    <p class="sm" style="padding:0;margin-top:5px;">
        List other services that the Beneficiary receives (include day services, service coordination,
        employment
        programs, etc.):
    </p>
    {{-- <br> --}}
    <div style="display: table; padding: 0; margin: 0;width: 100%">
        <div style="display: table-row;">
            <p class="sm" style="display: table-cell; vertical-align: top; padding-right: 20px;float:left;">
                Service
                <input type="text" value="{{ $beneficiary_service_one }}" class="no-border xs"
                    name="beneficiary_service_one" style="width: 75%"><br>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="{{ $beneficiary_service_two }}" class="no-border xs"
                    name="beneficiary_service_two" style="margin-top: 8px;width: 75%"><br>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="{{ $beneficiary_service_three }}" class="no-border"
                    name="beneficiary_service_three" style="margin-top: 8px;width: 75%" class="xs">
            </p>
            <p class="md" style="display: table-cell; vertical-align: top; text-align: left;float:right;">
                Name of Provider
                <input type="text" value="{{ $beneficiary_provider_one }}" class="no-border xs"
                    name="beneficiary_provider_one" style="width: 55%"><br>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <input type="text" value="{{ $beneficiary_provider_two }}" class="no-border xs"
                    name="beneficiary_provider_two" style="margin-top: 8px;width: 55%"><br>
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="{{ $beneficiary_provider_three }}" class="no-border"
                    name="beneficiary_provider_three" style="margin-top: 8px;width: 55%" class="xs">
            </p>
        </div>
    </div>

    <div style="display: table; width: 100%;" class="footer">
        <div style="display:table-row;width:100%">
        <div style="display: table-cell; text-align: left; width: 33%;">
            <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
        </div>
        <div style="display: table-cell; text-align: center; width: 33%;">
            <div style=" padding: 7px; display: inline-block; position: relative;">
                <p class="footer-center xs" style="margin: 0;">5</p>
                <div style="
                            transform: translateX(-50%);">
                </div>
            </div>
        </div>
        <div style="display: table-cell; text-align: right; width: 33%;">
            <p class="xxs">JOINDER AGREEMENT</p>
        </div>
        </div>
    </div>

    </div>
</div>

        <div class="page-break"></div>

        <div class="page-6 sm" style="position: relative;">
            <p style="background-color:rgb(184 221 219); color:rgb(52 159 153); width:35%" class="strong md section-heading" >
                INFORMATION AND DISCLOSURES:
            </p>
            <div class="column-left" style="float: left; width: 49%; padding-right: 1%; box-sizing: border-box;text-align:justify;line-height:0.9 !important;">
                <div class="semi-bold" style="margin-bottom: 0;">Death of Beneficiary:</div>
                <p style="margin-top: 0px; padding-top: 0;text-align:justify;line-height:0.9 !important;">The Beneficiary’s sub-trust account terminates
                    upon his or her death. If, upon the death of the
                    Beneficiary, funds remain in his or her sub-trust
                    account, such funds shall be deemed to be property
                    of the Trust and all funds that are remaining in the
                    Beneficiary’s separate sub-trust account shall
                    be retained by SLC Supplemental Needs Trust to
                    further the purposes of that Trust. However, to the
                    extent that amounts remaining in the individual’s
                    subtrust account upon the death of the individual
                    are not in fact retained by the Trust, the Trust shall
                    pay to the State(s) from such remaining amounts in
                    the sub-trust account an amount equal to the total
                    amount of medical assistance paid on behalf of the
                    individual under the State Medicaid plan (s). To the
                    extent that the trust does not retain the funds in the
                    account, the State(s) shall be the first payee(s) of
                    any such funds and the State(s) shall have priority
                    over payment of other debts and administrative
                    expenses except as listed in POMS SI 01120.203E.<br/>
                    Funeral expenses will only be paid pursuant to a
                    Medicaid eligible pre-need funeral arrangement
                    established and funded prior to the Beneficiary’s
                    death. Funeral expenses will not be paid after the
                    Beneficiary’s death. <br/>
                    <div class="semi-bold">Contributions/Deposits:</div>
                    All contributions made to the sub-trust account will be held and administered pursuant to the provisions of the SLC Supplemental Needs Trust which are incorporated by reference herein.<br/> The Trustees shall have the sole and absolute right to accept or refuse additional deposits to the subtrust account.<br/>
                    In the event that a Beneficiary has a zero ($0)
                    sub-trust account balance for sixty (60) or more
                    consecutive days, the Trustee shall retain the right
                    to close the Beneficiary’s sub-trust account. Please
                    be advised that the Trustee may continue to charge
                    administrative fees for the management of the
                    sub-trust account prior to its closure. In the event
                    that a Beneficiary wishes to re-open a sub-trust
                    account, the Beneficiary may be required to pay any
                    outstanding administrative fees stemming from the
                    prior sub-trust account.   Additionally, the Beneficiary
                    shall be required to pay a new enrollment fee when re-opening a sub-trust</p>
            </div>

            <div class="column-right" style="float: left; width: 49%; padding-left: 1%; box-sizing: border-box;text-align:justify;line-height:1 !important;margin-top:0px">
            account.
            <br/>
            <br/>
                <div class="semi-bold"  style="margin-top:-3px">Disbursements: </div>
                <p style="margin-top: 0px; padding-top: 0;text-align:justify;line-height:0.9 !important;">All disbursement requests shall be reviewed and
                    approved on an individual basis.
                    Disbursements for expenses incurred more than 90
                    days prior to submission of a disbursement request
                    form shall not be paid. <br/> The Trustees, in their discretion, have determined
                    that disbursements for the following items shall not
                    be paid: purchases of firearms, alcohol, tobacco,
                    items relating to illegal activity, bail, or restitution. <br/> All disbursements shall be made at the sole and
                    absolute discretion of the Trustee. No disbursements
                    will be made after the death of the beneficiary, even
                    for expenses incurred or due prior to death.
                    <br/>
                    <div class="semi-bold" >Disability Determination:</div>
                    In the event that a determination of disability is
                    required for Medicaid purposes, please be advised
                    that administrative fees shall be incurred while the
                    determination of disability is being made. <br/>The Donor acknowledges that contributions to
                    the SLC Supplemental Needs Trust are not tax
                    deductible as charitable gifts, or otherwise.
                    Sub-trust account income may be taxable to the
                    Beneficiary. <br/><br/>
                    <div class="semi-bold" >Disclosure of Potential Conflict of Interest:</div>
                    There may be a potential conflict of interest in the
                    administration of the Trust since the Trust retains
                    those funds remaining in the sub-trust account at
                    the time of death of the Beneficiary. Funds remaining
                    in the Trust may be used to pay for ancillary and/
                    or supplemental services for Beneficiaries and
                    potential Beneficiaries for which services may be
                    rendered by SLC Supplemental Needs Trust.<br/>
                    The Donor executing this Joinder Agreement is
                    aware of the potential conflicts of interest that exist
                    in the Trustee’s<br/>administration of the Trust. The Trustee shall not
                    be liable to Donor or to any party for any act of
                    self-dealing or conflict of interest resulting from
                    their a liations with Senior Lifecare Corp or with
                    any Beneficiary or constituent agencies and/or
                    Chapters.
                </p>
            </div>

            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                    <div style="display: table-cell; text-align: left; width: 33%;">
                        <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                    </div>
                    <div style="display: table-cell; text-align: center; width: 33%;">
                        <div style=" padding: 7px; display: inline-block; position: relative;">
                            <p class="footer-center xs" style="margin: 0;">6</p>
                        </div>
                    </div>
                    <div style="display: table-cell; text-align: right; width: 33%;">
                        <p class="xxs">JOINDER AGREEMENT</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="page-7 sm" style="position: relative;">
            <div class="semi-bold">Situs:</div>
            <div class="column-left" style="float: left; width: 49%; padding-right: 1%; box-sizing: border-box;text-align:justify;">
                <p style="margin-top: 0px; padding-top: 0;text-align:justify;line-height:0.9 !important;">The sub-trust account created by this Agreement
                    has been accepted by the Trustee in the State of
                    New York and will be administered by Senior Lifecare
                    Corp and a financial institution in the State of New
                    York. The validity, construction, and all rights under
                    this Agreement shall be governed by the laws
                    of the State of New York. The situs of this Trust for
                    administrative, account and legal purposes shall
                    be in the County of Kings, the County where the
                    majority of meetings concerning establishment of
                    the Trust occurred.
                    <br/>
                    <div class="semi-bold">Invalidity of any Provision:</div>
                    Should any provision of this Agreement be or
                    become invalid or unenforceable, the remaining
                    provisions of this Agreement shall be and continue
                    to be fully efective. <br/>By signing below, you a rm that you understand
                    and agree to the following: <br/>I have received and read a copy of the applicable
                    Master Trust prior to the signing of this Joinder
                    Agreement and acknowledge that I understand
                    the contents thereof. I also understand that said
                    document may be amended from time to time.
                    I have been provided with the applicable fee
                    schedule and acknowledge that I understand the
                    contents thereof. I also understand there may be
                    changes from time to time.<br/>I am entering into this Joinder Agreement voluntarily
                    and acting on my own free accord.<br/>The Donor acknowledges that the Beneficiary is
                    disabled as defined in Social Security Law Section
                    1614(a)(3) [42 USC 1382c(a) (3)].<br/>Under penalty of perjury, all statements made in this
                    document are true and accurate to the best of my
                    knowledge.<br/>The SLC Supplemental Needs Trust is authorized to
                    be used by individuals with disabilities pursuant to
                    federal and state law. By agreeing to accept a donor’s
                    property pursuant to this Joinder Agreement, SLC
                    Supplemental Needs Trust agrees only to manage
                    the trust funds in accordance with the terms of the
                    Master Trust Agreement and in compliance with
                    applicable federal and state law and regulation.
                    It is the sole responsibility of the donor and/or the
                    donor’s representative to determine whether the donor is “disabled” as that term
                </p>
            </div>

            <div class="column-right" style="float: left; width: 49%; padding-left: 1%; box-sizing: border-box;text-align:justify;margin-top:0px;line-height:1 !important;">
                <p style="margin-top: 0px; padding-top: 0;text-align:justify;line-height:0.9 !important;">is defined under
                    federal law, to determine whether they have the
                    legal authority to transfer property to fund the
                    trust, and the impact that a transfer of property to
                    the SLC Supplemental Needs Trust will have on the
                    donor’s continuing eligibility for government benefit
                    programs.<br/>
                    Senior Lifecare Corp is not assuming any
                    responsibility as counsel for the donor or Beneficiary,
                    or providing any legal advice as it relates to the
                    consequences of a transfer of property to the SLC
                    Supplemental Needs Trust. <br/>The Trustees in their discretion may require an
                    intermediary to assist in the administration of the
                    Beneficiary’s sub-trust account. The cost of which
                    may be charged to the sub-trust account. <br/> The party authorized to speak with us on your behalf
                    or the intermediary must notify SLC Supplemental
                    Needs Trust. immediately upon your death and
                    will be required to provide us with a certified death
                    certificate. An individual requesting and/or receiving
                    disbursements in contravention of the Master Trust
                    Agreement and the Joinder Agreement will be
                    required to repay the amount disbursed. <br/>This Joinder Agreement and the participation of the
                    Beneficiary in the SLC Supplemental Needs Trust is an
                    important legal decision that may have significant
                    and lasting consequences for the Beneficiary and as
                    a result you may want to consider obtaining advice
                    from an attorney or another professional adviser
                    before entering into this Agreement. By signing this
                    Agreement you are acknowledging that you have
                    had a full and complete opportunity to confer with
                    an attorney or other adviser and that no employee
                    of Senior Lifecare Corp has provided you (or the
                    Beneficiary, if different from the person signing this
                    Agreement) with any legal advice in connection
                    with this Joinder Agreement, the participation by
                    the Beneficiary in the SLC Supplemental Needs
                    Trust or the suitability of such participation by the
                    Beneficiary in the SLC Supplemental Needs Trust
                    based upon the particular circumstances of the Beneficiary.
                </p>
            </div>

            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                    <div style="display: table-cell; text-align: left; width: 33%;">
                        <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                    </div>
                    <div style="display: table-cell; text-align: center; width: 33%;">
                        <div style=" padding: 7px; display: inline-block; position: relative;">
                            <p class="footer-center xs" style="margin: 0;">7</p>
                        </div>
                    </div>
                    <div style="display: table-cell; text-align: right; width: 33%;">
                        <p class="xxs">JOINDER AGREEMENT</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-break"></div>
        <div class="page-8">
            <p class='section-heading md' style="width:26%;background-color:rgb(184 221 219);color:rgb(52 159 153);">AGREEMENT SIGNATURE</p>
            <p class='xs' style="padding:0;margin: 0;padding-bottom:2px">
                Who is signing this Joinder Agreement?

                <input type="checkbox" name="agreement_signature_beneficiary" class="checkboxissue" value="Beneficiary"
                    {{ isset($agreement_signature_beneficiary) && $agreement_signature_beneficiary === 'Beneficiary' ? 'checked' : '' }}> Beneficiary
                <input type="checkbox" name="agreement_signature_beneficiary" class="checkboxissue" value="Power of Attorney"
                    {{ isset($agreement_signature_beneficiary) && $agreement_signature_beneficiary === 'Power of Attorney' ? 'checked' : '' }}>
                Power of Attorney
                <input type="checkbox" name="agreement_signature_guardian" class="checkboxissue" value="Guardian"
                    {{ isset($agreement_signature_beneficiary) && $agreement_signature_beneficiary === 'Guardian' ? 'checked' : '' }}>
                Guardian
            </p>

            <p class='xs' style='margin:0;padding-bottom:12px;padding-top:10px;margin-top:10px;padding-bottom:14px;margin-bottom:14px'>I certify that the above information is accurate and the completed to the best of my knowledge.</p>
            <div style="display: table; width: 100%; margin: 0; text-align: center;">
            <div style="display: table-row;">
                <div style="display: table-cell; width: 30%;">
                    <div class='xs'>
                        @if ($joinder_signature_1)
                            <img src="{{ $joinder_signature_1 }}" alt="Signature 1" width="300px" height="70px" style="display: block; border-bottom: 1px solid;width:80%">
                        @else
                            <div style="width: 200px; height: 50px; text-align: center;">
                        No Signature Provided
                    </div>
                            @endif
                            <div class='xs' style='text-align: left;'>
                                <label class='italic' style='margin-left:25px'>Sign Here</label>
                            </div>
                        </div>
                    </div>
                    <div style="display: table-cell; width: 30%;">
                        <p style="margin: 0; position: relative;top:5.6%" class='xs'>
                            <input type="text" value="{{ $joinder_print }}" class="no-border" style="width: 80%; margin: 0 auto;">
                            <br>
                            <div style='text-align: left;margin-left:80px;position: relative;top:5.1%'>
                                <label class='italic'>Print</label>
                            </div>
                        </p>
                    </div>
                    <div style="display: table-cell; width: 30%;" class='xs'>
                        <p style="margin: 0;">
                            <input type="text" class="no-border" value="{{ $joinder_date }}" style="width: 80%; margin: 0 auto;position: relative;top:5.6%">
                            <br> <label class='italic' style='position: relative;top:5.4%'>Date</label>
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <p class='section-heading md' style="width:25%;background-color:rgb(184 221 219);color:rgb(52 159 153);margin:0:padding-bottom:5px;">SIGNATURE OF NOTARY</p>
            <div style='display:table;width:100%'>
            <div style='display:table-row' class='xs'>
            <p class='xs' style="margin:0;padding-bottom:5px;display:table-cell">STATE OF
                <input type="text" value="{{ $notary_state_of_ny }}" class="no-border"
                name="notary_state_of_ny">
            </p>
          </div>
          <div style='display:table-row' class='xs'>
              <p style="margin:0;padding-bottom:5px;display:table-cell">COUNTY OF
                  <input type="text" value="{{ $notary_county_of }}" class="no-border"
                  name="notary_county_of">
                </p>
            </div>
            <div  style='display:table-row;width:100%' class='xs'>
                <p style="margin:0;padding-bottom:5px;display:table-cell; margin-left:25px; padding-left:25px">
                    On <input type="text"  style="width:30%" class="no-border" name="notary_on_date"
                    value="{{ $notary_on_date }}"> ,20
                    <input style="width:15%" type="text" value="{{ $notary_year }}" class="no-border" name="notary_year"> before me, the
                </p>
            </div>
            <div style='display:table-row' class='xs'>
                <div style='display:table-cell;width:50%'>
                        <p style="margin:0;padding-bottom:5px:">
                            undersigned, a Notary Public in and for said State, personally appeared,<br>
                            <input type="text" value="{{ $notary_appeared }}" style="width:70%; margin-top:9px;padding-top:5px; margin-bottom:2px" class="no-border" name="notary_appeared">,
                           <br> personally  known to me or proved to me on the basis of satisfactory evidence to be the individual whose
                            name
                            is subscribed to the within instrument and acknowledged to me that he/she/they executed the same in
                            his/her capacity,
                            and that by his/her signature on the instrument, the individual or the person upon behalf of which the
                            individual acted
                            executed this instrument.
                        </p>
                    </div>
                        <div style='display:table-cell;vertical-align:bottom;width:50%;'>
                            <input  type="text" value="{{ $notary_public }}" style='width:90%;margin-left:30px; margin-top:45px;padding-top:45px;' class="no-border" name="notary_public"><br>
                            <div style='width:90%;text-align-left'>
                                <label style='text-align:left;margin-left:30px'>NOTARY PUBLIC</label>
                            </div>
                        </div>
                </div>
            </div>
            <p class='md section-heading' style=" width:37%;background-color:rgb(184 221 219);color:rgb(52 159 153);">OR SIGNATURE OF TWO WITNESSES</p>
            <p class='xs'>
                (New York Residents Only) <br><br>
                <span style=''>
                    Or in lieu of Notarization, the following two witness signatures are provided:
                </span>
            </p>
            <div style="display: table; width: 100%; margin-top: 10px;" class='xs'>
                <!-- Row for Witness Names -->
                <div style="display: table-row;" class='xs'>
                    <div style="display: table-cell;padding-bottom:2px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_one_name" value="{{ $notary_witness_one_name }}"
                            maxlength="70">
                            <br>
                        <label class='italic'> Witness 1 </label>
                    </div>
                    <div style="display: table-cell; margin-left:20px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_two_name" value="{{ $notary_witness_two_name }}"
                            maxlength="70">
                            <br>
                        <label class='italic'> Witness 2 </label>
                    </div>
                </div>
                <div style="display: table-row;" class='xs'>
                    <div style="display: table-cell;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="sig_date1" value="{{ $sig_date1 }}" maxlength="70">
                        <br><label class='italic'>Date</label>
                    </div>
                    <div style="display: table-cell;margin-left:20px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="sig_date2" value="{{ $sig_date2 }}" maxlength="70">
                        <br><label class='italic'> Date </label>
                    </div>
                </div>
                <!-- Row for Signatures -->
                <div style="display: table-row;">
                    <div style="display: table-cell;padding-bottom:2px;width:50%">
                        <div style='text-align:center;width:90%'>
                            @if ($joinder_signature_2)
                            <img src="{{ $joinder_signature_2 }}" alt="Signature 2"
                                style="max-width:300px; max-height: 50px;">
                            <br>
                            @else
                            <div style="width: 200px;height:50px; text-align: center;">
                                No Signature Provided
                            </div>
                            @endif
                        </div>
                        <div style='border-top:1px solid;width:90%;;'>
                            <label class='italic'>Sign Here</label>
                        </div>
                    </div>
                    <div style="display: table-cell;margin-left:20px;width:50%">
                        <div style='text-align:center;width:90%'>
                            @if ($joinder_signature_3)
                            <img src="{{ $joinder_signature_3 }}" alt="Signature 3"
                            style="max-width: 300px; max-height: 50px;">
                            <br>
                            @else
                            <div style="width: 200px;height:50px; text-align: center;">
                                No Signature Provided
                            </div>
                            @endif
                        </div>
                        <div style='border-top:1px solid;width:90%;'>
                            <label class='italic'>Sign Here</label>
                        </div>
                    </div>
                </div>
                <!-- Row for Full Names -->
                <div style="display: table-row;">
                    <div style="display: table-cell;padding-bottom:2px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_one_full_name" value="{{ $notary_witness_one_full_name }}"
                            maxlength="70">
                        <br><label class='italic'>Print Full Name</label>
                    </div>
                    <div style="display: table-cell;margin-left:20px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_two_full_name" value="{{ $notary_witness_two_full_name }}"
                            maxlength="70">
                        <br><label class='italic'> Print Full Name</label>
                    </div>
                </div>

                <!-- Row for Full Addresses -->
                <div style="display: table-row;">
                    <div style="display: table-cell;padding-bottom:5px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_one_full_address" value="{{ $notary_witness_one_full_address }}">
                        <br><label class='italic'> Full Address </label>
                    </div>
                    <div style="display: table-cell;margin-left:20px;width:50%">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_two_full_address" value="{{ $notary_witness_two_full_address }}">
                        <br><label class='italic'> Full Address </label>
                    </div>
                </div>

            </div>
            <div class='section-heading md'
                style="background-color:rgb(184 221 219);color:rgb(52 159 153); text-align: center; vertical-align: center;margin-top:14px;padding:7px;width:120%;margin-left:-10%">
                FOR OFFICE USE ONLY
            </div>
            <p style='text-align:center' class='xs'>
                Accepted by Trustee or Designated Representative of the Trustees, Trusted Supplemental Needs Trust.
            </p>
            <div style="display: table; width: 100%;margin:0;">
                <!-- Row for Signature and Date Approved -->
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%;">
                        <!-- Signature Image or Placeholder -->
                         <div style='text-align:center'>
                             @if ($joinder_signature_4)
                             <img src="{{ $joinder_signature_4 }}" alt="Signature 4"
                             style="width: 300px; height: 48px;text-align:center;width:50%;margin-right:40px">
                             @else
                             <div style="width: 200px;height:50px; text-align: center;">
                                 No Signature Provided
                                </div>
                                @endif
                            </div>
                        <div class='xs' style='border-top:1px solid;width:90%;'>
                            <label class='italic'>Sign Here</label>
                        </div>
                    </div>
                    <div class='xs'  style="display: table-cell; width: 50%;">
                        <br/><br/>
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            value="{{ $office_use_date_approved }}">
                        <br><label class='italic'>DATE</label>
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                <div style="display: table-cell; text-align: left; width: 33%;">
                    <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                </div>
                <div style="display: table-cell; text-align: center; width: 33%;">
                    <div style=" padding: 7px; display: inline-block; position: relative;">
                        <p class="footer-center xs" style="margin: 0;">8</p>
                        <div style="
                                    transform: translateX(-50%);">
                        </div>
                    </div>
                </div>
                <div style="display: table-cell; text-align: right; width: 33%;">
                    <p class="xxs">JOINDER AGREEMENT</p>
                </div>
                </div>
            </div>
        </div>
        <div class="page-break"></div>
        <div class="page-9">
            <div style="display: table; width: 40%;margin-left: auto; border: none;">
                <div style="display: table-row;border: none;">
                    <table class="mem-table" style="border: none;">
                        <tr  style="border:none; background-color:rgb(184 221 219)">
                            <td class="sm strong" colspan="2" style="color: rgb(52 159 153);border: none;padding:6px !important;">FOR OFFICE USE ONLY</td>
                        </tr>
                    </table>
                    <div style="display: table; width:100%;background-color: #ecf6f7;text-align:center;padding:15px 0px">
                        {{-- <br> --}}
                        <div style="display: table-row;margin-top:10px" class="md">
                            <div style="display: table-cell;">

                                <label class="xs">Member ID#:</label>
                                <input style="background-color: #ecf6f7"  style="padding-left:7px;background-color: transparent" class="xs" type="text" value="{{ $office_use_member_id_above }}" name="office_use_member_id_above" />
                            </div>
                        </div>
                        <br>
                        <div style="display: table-row;" class="md">
                            <div style="display: table-cell;">

                                <label  class="xs">Effective Date:</label>
                                <input style="background-color: #ecf6f7"  class="xs" type="text" value="{{ $office_use_effective_date }}" name="office_use_effective_date"  />
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <p class="strong md section-heading" style="background-color:rgb(184 221 219); color:rgb(52 159 153);width:31%">DIRECT DEBIT REQUEST FORM</p>

                    <div style="display: table; width: 100%;" class="xs">
                        <div style="display: table-row;" class="md">
                            <div style="display: table-cell;">

                                <label class="sm">Donor/Beneficiary</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_donor_beneficiary }}" name="direct_debit_donor_beneficiary" style="width: 80%" />
                            </div>


                        </div>
                        {{-- <br> --}}
                        {{-- <div style="display: table-row;margin-top:8px" class="md">
                            <div style="display: table-cell;margin-top:8px">

                                <label class="md">Representative</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_representative }}" name="direct_debit_representative" style="width: 82%" />
                            </div>
                        </div> --}}


                    </div>

                    <div style="display: table; width: 100%;margin-top:10px" class="xs">
                        <div style="display: table-row;" class="md">
                            <div style="display: table-cell;margin-top:10px">

                                <label class="sm">Representative</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_representative }}" name="direct_debit_representative" style="width: 82%" />
                            </div>
                        </div>

                    </div>
                    {{-- <br> --}}
                    <div style="display: table; width: 100%; margin-top:10px" class="xs">
                        <div style="display: table-row;" class="md">
                            <div style="display: table-cell;margin-top:10px">

                                <label class="sm">Bank Name</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_bank_name }}" name="direct_debit_bank_name" style="width: 62%" />
                            </div>
                            <div style="display: table-cell;margin-top:10px">

                                <label class="sm">City</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_city }}" name="direct_debit_city" style="width: 70%" />
                            </div>
                            <div style="display: table-cell;margin-top:10px">

                                <label class="sm">State</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_state }}" name="direct_debit_state" style="width: 72%" />
                            </div>

                        </div>
                    </div>
                    {{-- <br> --}}
                    <div style="display: table; width: 100%; margin-top:10px" class="xs">
                        <div style="display: table-row;" class="md">
                            <div style="display: table-cell;margin-top:10px">

                                <label class="sm">Bank Routing Number</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_bank_routing }}" name="direct_debit_bank_routing" style="width: 50%" />
                            </div>
                            <div style="display: table-cell;margin-top:10px">

                                <label class="sm">Account Number</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_account_number }}" name="direct_debit_account_number" style="width: 56%" />
                            </div>

                        </div>

                    </div>
                    {{-- <br> --}}

                    <div style="display: table; width: 100%; margin-top:10px" class="xs">
                        <div style="display: table-row;" class="md">
                            <div style="display: table-cell;width:60%;margin-top:10px">

                                <label class="sm">Account Name</label> &nbsp;
                                <input class="xs" type="text" value="{{ $direct_debit_account_name }}" name="direct_debit_account_name" style="width:70%" />
                            </div>
                            {{-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --}}
                            <div class="sm" style="display: table-cell;vertical-align:middle;text-align:right;margin-top:10px">
                                <label class="sm">Account Type: </label>
                                <input type="checkbox" name="direct_debit_bank_type1" style="margin-right:5px" class="checkboxissue"  value="Checking" {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Checking' ? 'checked' : '' }}>Checking
                                <input type="checkbox" style="margin-left:5px;margin-right:5px" name="direct_debit_bank_type1" class="checkboxissue" value="Savings" {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Savings' ? 'checked' : '' }} >Savings
                            </div>

                        </div>

                    </div>



                {{-- <br> --}}

                <p>
                    <div class='sm semiBold'>PLEASE SUBMIT A VOID CHECK ALONG WITH YOUR FORM.</div>
                </p>
                <p class="xs">
                I authorize and request SLC Supplemental Needs Trust, dated December 24, 2017 to initiate debit entries
                    to my account at the depository financial institution indicated above. This authorization is to remain in full
                    force and affect until SLC Supplemental Needs Trust has written notification from me of its termination in
                    such time and manner as to afford SLC Supplemental Needs Trust and depository financial institution a
                    reasonable opportunity to act on it.
                </p>
                <div style="display: table; width: 100%; margin-top: 20px;">
                    <!-- Label for signature -->
                    {{-- <label style="sm">Beneficiary/ Representative Sign Here</label> --}}

                    <!-- Signature Input and Canvas Preview Container -->

                    <div style="display: table-row;" class="md">
                        <div style="display: table-cell; width:40%; padding-top:90px;">
                            <label>Beneficiary/ Representative Sign Here</label>
                        </div>
                        <div style="display: table-cell; border-bottom:1px solid; text-align:center">
                            @if ($joinder_signature_5)
                            <img src="{{ $joinder_signature_5 }}" alt="Signature 5"
                                style="max-width: 300px; height: 90px;">
                            @else
                                <div style="width: 200px; height: 50px; text-align: center;">
                                    No Signature Provided
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
                <br>
                <br>

            <div>
                <div
                class="strong md"
                style="background-color:rgb(184 221 219);color:rgb(52 159 153); text-align: center; vertical-align: center; padding:1%;height: 20px;width:120%;margin-left:-10%">
                FOR OFFICE USE:
                </div>
                <br>
           <div style="margin-left:40px" class='xs'>
                <div style="display: table;width:100%">
                    <div style="display: table-row;width:100%" >
                        <div style="display: table-cell;width:50%">

                            <label class="xs">Account #:</label>
                            <input class="xs"  type="text" value="{{ $office_use_account_number }}" name="office_use_account_number" style="width:65%" />
                        </div>

                        <div style="display: table-cell;">
                            <label class="xs">Member #:</label>
                            <input class="xs" type="text" value="{{ $office_use_member_id_below }}" name="office_use_member_id_below" style="width:37%" />
                        </div>
                    </div>
                </div>
                {{-- <br> --}}
                <div style="display: table;margin-top:10px;width:100%">
                    <div style="display: table-row;">
                        <div style="display: table-cell;width:50%">

                            <label class="xs">Processed By:</label>
                            <input class="xs" type="text" value="{{ $office_use_processed_by }}" name="office_use_processed_by" style="width:70%" />
                        </div>
                        {{-- &nbsp;&nbsp; --}}

                        <div style="display: table-cell;width:40%">
                            <label class="xs">Monthly Debit Amount: $ </label>
                            <input class="xs" type="text" value="{{ $office_use_monthly_debit_amount }}" name="office_use_monthly_debit_amount" style="width:35%" />
                        </div>
                    </div>
                </div>
                {{-- <br> --}}
                <div style="display: table;">
                    <div style="display: table-row;">
                        <div style="display: table-cell;text-align: start; !important">
                            <p class="xs">
                                Monthly dates for direct debit are as follows: 1, 3, 7, 14, 21, 28 (debit will occur on or around the date selected)
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <br> --}}
                <div style="display: table;width:100%;">
                    <div style="display: table-row;width:100%">
                        <div style="display: table-cell;width:40%">

                            <label class="xs">Date of Monthly Debit:</label>
                            <input class="xs" type="text" value="{{ $office_use_monthly_debit_date }}" name="office_use_monthly_debit_date" style="width:45%" />
                        </div>

                        <div style="display: table-cell;width:40%">
                            <label class="xs">First Debit Month:</label>
                            <input class="xs" type="text" value="{{ $office_use_monthly_debit_first_month }}" name="office_use_monthly_debit_first_month" style="width:45%" />
                        </div>
                    </div>
                </div>
            </div>


                {{-- <br> --}}
                <p style="margin-top:25px" class="xs italic">
                    If any direct debits are returned for insufficient funds, a $53 charge will apply<br>
                    A $150 annual - renewal fee will be charged on the anniversary of the account
                </p>
                <div style="text-align: center;">
                    <img src="{{ public_path('images/new_logo.png') }}" alt="logo" width="250">
                       <br>
                </div>
            </div>
            <div style="display: table; width: 100%;" class="footer">
                <div style="display:table-row;width:100%">
                    <div style="display: table-cell; text-align: left; width: 33%;">
                        <p class="xxs">SLC SUPPLEMENTAL NEEDS TRUST</p>
                    </div>
                    <div style="display: table-cell; text-align: center; width: 33%;">
                        <div style=" padding: 7px; display: inline-block; position: relative;">
                            <p class="footer-center xs" style="margin: 0;">9</p>
                            <div style="
                                        transform: translateX(-50%);">
                            </div>
                        </div>
                    </div>
                    <div style="display: table-cell; text-align: right; width: 33%;">
                        <p class="xxs">JOINDER AGREEMENT</p>
                    </div>
                </div>
            </div>
        </div>






    </form>
</body>

</html>

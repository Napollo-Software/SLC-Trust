<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joinder Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid rgb(184 221 219);
        }
        body {
            font-family: "Nominee-Black", sans-serif;
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
        }

        .container-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        h6 {
            margin: 5px 0;
        }

        .radio-row label {
            margin-right: 20px;
        }


        .container-page-end {
            padding: 40px;

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
            background-image: url('{{ public_path("images/new-joinder-bg.png") }}');
            background-size: cover;
            background-repeat: no-repeat;
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
            font-style: italic;
            font-size: 12px;
        }

        .text-center{
            text-align: center;
        }


        .xs{
            font-size: 12px;
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

        .strong{
            font-weight: bold;
        }
        footer{
            position: fixed;
            left: 0px;
            right: 0px;
            height: 50px;
            margin-bottom: -50px;
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


    </style>
</head>

<body style="padding: 0;margin: 0;">
    <form id="joinderForm" method="POST" action="{{ route('save.joinder') }}">
        @csrf
        <footer>
        <p>Copyright &copy; <?php echo date("Y");?></p>
        </footer>
        <div class="page-0">
            <br> <br>
            <div class="container-row" style="text-align:center;">
                <img style="width:30%" src="{{ public_path('images/slc_logo.png') }}" alt="Example Image">
            </div>
            {{-- {{ public_path('images/slc_logo.png') }} --}}

            <div style="height:900px">


                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                <div style="text-align: center;">
                    <div style="width: fit-content; display: inline-block;">
                        <h1 style="color: rgb(52 159 153); padding: 5px 10px; font-size: 2.5rem">
                            JOINDER AGREEMENT</h1>
                    </div>
                </div>
                <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                {{-- <div class="container-page-end"></div> --}}

                <div
                    style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
                    <div style="display: table-row;">
                        <div style="color:rgb(52 159 153); display: table-cell; width:45%;text-align: right;">
                            <b style="font-size: 1.4rem;">Tel:</b>
                        </div>
                        <div
                            style="display: table-cell; text-align: left;color:rgb(52 159 153);padding-left: 5px;font-size: 1.4rem;">
                            718.500.3235</div>
                    </div>
                </div>

                <div
                    style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
                    <div style="display: table-row;">
                        <div style="color: rgb(52 159 153); display: table-cell;width:45%;text-align: right;">
                            <b style="font-size: 1.4rem;">Email:</b>
                        </div>
                        <div
                            style="display: table-cell; text-align: left;color:rgb(52 159 153);padding-left: 5px;font-size: 1.4rem;">
                            info@slctrusts.org</div>
                    </div>
                </div>

                <div
                    style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
                    <div style="display: table-row;">
                        <div style="color: rgb(52 159 153); font-weight: bold; display: table-cell;">
                            <b style="font-size: 1.4rem;">www.seniorlifecaretrusts.org</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="page-1">
            <div class="center-text" style="background-color: rgb(184 221 219);padding-top: 7px;padding-bottom: 7px;padding-left:10px;padding-right:10px;">
                <p style="font-weight: bold;text-align:center; margin-bottom: 10px;" class="lg">SLC SUPPLEMENTAL NEEDS TRUST</p>
                <p style="text-align:center;color:rgb(52 159 153);" class="lg">Joinder Agreement / Beneficiary
                    Profile Sheet</p>
            </div>
            <div style="" class="xs">
                <p>This is a legal document. It is an agreement pertaining to a supplemental needs trust created
                    pursuant to 42 United States Code §1396. You are encouraged to seek independent, professional advice
                    before signing this agreement. The undersigned hereby adopts, enrolls in, and establishes a
                    sub-trust account under the TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST, dated February 13,
                    2023. The Trust is Irrevocable.</p>
                <p class="" style="margin">NOTE: All questions must be answered or your application will be delayed.</p>
            </div class="md">
                <p
                class="md"
                    style="padding:10px;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;width:30%">
                    BENEFICIARY INFORMATION</p>
            </div>
            <p class="xs">
                The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may
                be contributed to the Trust.
            </p>

            <div style="display: table; width: 100%;" >
                <div style="display: table-row;">
                    <div style="display: table-cell">
                        <label style="font-weight: bold;" class="sm">Name:</label>
                    </div>
                </div>
                <br/>
                <div style="display: table-row;table-layout: fixed;" class="xs">
                    <div style="display: table-cell;width: 33.33%; ">

                        <input type="text" value="{{ $sponsor_first_name }}" name="sponsor_first_name" /> <br>
                        <label class="italic">First</label>
                    </div>
                    &nbsp;
                    <div style="display: table-cell;width: 33.33%;">
                        <input type="text" value="{{ $sponsor_middle_name }}" name="sponsor_middle_name" /> <br>
                        <label class="italic">Middle:</label>
                    </div>
                    &nbsp;
                    <div style="display: table-cell;width: 33.33%;">
                        <input type="text" value="{{ $sponsor_last_name }}" name="sponsor_last_name" /> <br>
                        <label class="italic">Last:</label>
                    </div>
                </div>
            </div>
                <br/>
            <div style="display: table; width: 100%;margin-top:8px;margin-bottom:8px">
                <div style="display: table-row;">
                    <p style="display:table-cell;" class="sm"> Marital Status:
                        <label class="xs">
                            <input style="height:22px" type="radio" name="sponsor_marital_status1" value="Married"
                                {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Married' ? 'checked' : '' }}>
                            <label>Married</label>
                        </label>
                        <label class="xs">
                            <input style="height:22px" type="radio" name="sponsor_marital_status1" value="Widowed"
                            {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Widowed' ? 'checked' : '' }}>
                        <label>Widowed</label>
                        </label>
                        <label class="xs">
                            <input style="height:22px" type="radio" name="sponsor_marital_status" value="Single"
                            {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Single' ? 'checked' : '' }}>
                        <label>Single</label>
                        </label>
                    </p>
                    <label style="display:table-cell; margin: 0;">
                            <label class="sm" >Gender</label>
                            <input type="text" name="sponsor_gender">
                        </label>
                        <!-- value="{{ $sponsor_gender }}" -->
                    </div>

           </div>

                {{-- <br /> --}}

                {{-- <div style="display: table-row;">
                    <div style="display: table-cell">
                        <label style=" font-weight: bold;">Marital Status:</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="radio" name="sponsor_marital_status" value="Married"
                            {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Married' ? 'checked' : '' }}>
                        <label>Married</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="radio" name="sponsor_marital_status" value="Widowed"
                            {{ isset($sponsor_marital_status2) && $sponsor_marital_status2 === 'Widowed' ? 'checked' : '' }}>
                        <label>Widowed</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="radio" name="sponsor_marital_status" value="Single"
                            {{ isset($sponsor_marital_status3) && $sponsor_marital_status3 === 'Single' ? 'checked' : '' }}>
                        <label>Single</label>
                    </div>
                </div> --}}

                 <br />
            <div style="display: table; width: 100%;margin-bottom:8px">

                <div style="display: table-row;">
                    <div style="display: table-cell" class="xs">
                        <input type="text" value="{{ $sponsor_ssn }}" name="sponsor_ssn"> <br>
                        <label class="italic">Social Security Number:</label>
                    </div>
                    &nbsp;&nbsp;
                    <div class="xs" style="display: table-cell">
                        <input type="text" name="sponsor_dob" value="{{ $sponsor_dob }}"> <br>
                        <label class="italic">Date of Birth:</label>
                    </div>
                    &nbsp;&nbsp;
                    <div class="xs" style="display: table-cell">
                    <input type="text" name="sponsor_citizenship" value="{{ $sponsor_dob }}"> <br>
                    <label class="italic">Citizenship:</label>
                    </div>
                </div>

                <br />

                {{-- <div style="display: table-row;">
                    <div style="display: table-cell">
                        <label style="font-weight: bold">Contact Information:</label>
                    </div>
                </div>
                <div style="display: table-row;">

                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_tel_home }}" name="sponsor_tel_home"> <br>
                        <label>Home Phone:</label>
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell">

                        <input type="text" value="{{ $sponsor_tel_cell }}" class="no-border"
                            name="sponsor_tel_cell"> <br>
                        <label>Cell Phone:</label>
                    </div>
                </div> --}}
            </div>


            <div style="display: table; width:100%">
                <div style="display: table-row;margin-top:-25px">
                    <div style="display: table-cell">
                        <label style="font-weight: bold" class="sm">Contact Information:</label>
                    </div>
                </div> <br>
                <div style="display: table-row;" class="xs">

                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_tel_home }}" name="sponsor_tel_home" style="width: 95%"> <br>
                        <label class="italic">Home Phone:</label>
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell">

                        <input type="text" value="{{ $sponsor_tel_cell }}" class="no-border" style="width: 95%"
                            name="sponsor_tel_cell"> <br>
                        <label class="italic">Cell Phone:</label>
                    </div>
                </div>
            </div>

                <p class="strong sm">Preferred Phone:
                    <label class="sm">
                        <input style="height:22px" type="radio" name="prefered_cell" value="Cell"
                            {{ isset($prefered_cell) && $prefered_cell === 'Cell' ? 'checked' : '' }}>
                        <label style="font-weight: 400;">Cell</label>
                    </label>
                    <label >
                        <input style="height:22px" type="radio" name="prefered_cell" value="Phone"
                            {{ isset($prefered_cell) && $prefered_cell === 'Phone' ? 'checked' : '' }}>
                        <label style="font-weight: 400">Home</label>
                    </label>
                </p>


            {{-- <br /> --}}

            <div style="display: table; width:100%" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <input type="text" value="{{ $beneficiary_email }}" name="beneficiary_email" style="width:100%">
                        <label class="italic">Email:</label>
                    </div>
                </div>
                &nbsp;&nbsp;
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                    </div>
                </div>
            </div>
            <br>

            <div style="display: table;">

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
                    &nbsp;&nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_apt }}" name="sponsor_apt" style="width:95%">
                        <label class="italic">Apt #:</label>
                    </div>
                    &nbsp;&nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_city }}" name="sponsor_city" style="width:95%" />
                        <label class="italic">City:</label>
                    </div>
                    &nbsp;&nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_state }}" name="sponsor_state" style="width:95%" />
                        <label class="italic">State:</label>
                    </div>&nbsp;&nbsp;
                    <div style="display: table-cell">
                        <input type="text" value="{{ $sponsor_zip }}" name="sponsor_zip" style="width:95%" />
                        <label class="italic">Zip:</label>
                    </div>

                </div>
                </div>

                <br />
                <div style="display: table;">
                <div style="display: table-row;margin-top:-30px">
                    <div style="display: table-cell">
                        <label style="font-weight: bold" class="sm">Qualifying Disabilities:</label>
                    </div>
                </div>
            </div>
            <p style=" " class="xs">
                <label style="margin: 0;">
                    <label>1.</label>
                    <input type="text" value="{{ $d1 }}" name="d1">
                </label>
                <label style="margin: 0;">
                    <label>2.</label>
                    <input type="text" value="{{ $d2 }}" name="d2">
                </label>
                <label style="margin: 0;">
                    <label>3.</label>
                    <input type="text" value="{{ $d3 }}" name="d3">
                </label>
            </p>

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
        </div>

        <div style="width: 100%;display: table;">
                <p style="margin-top:20px" class="text-center xs">Please mail all trust documents to:</p>
                <p style="margin-top:-10px" class="text-center xs strong"> SLC Supplemental Needs Trust</p>
                <p style="margin-top:-10px" class="text-center xs strong"> 5014-16th Ave, Suite 489</p>
                <p style="margin-top:-10px" class="text-center xs strong"> Brooklyn, NY 11204</p>
        </div>



        {{-- <div class="page-1">
            <div class="center-text" style="background-color: rgb(184 221 219);padding: 10px;">
                <p style="font-weight: bold;text-align:center;font-size: 1.4rem;">TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST</p>
                <p style="text-align:center;color:rgb(52 159 153);font-size: 1.2rem;">Joinder Agreement / Beneficiary Profile Sheet</p>
            </div>
            <div style="padding: 30px 10px;;font-size: 12px">
                <p>This is a legal document. It is an agreement pertaining to a supplemental needs trust created pursuant to 42 United States Code §1396. You are encouraged to seek independent, professional advice before signing this agreement. The undersigned hereby adopts, enrolls in, and establishes a sub-trust account under the TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST, dated February 13, 2023. The Trust is Irrevocable.</p>
                <p class="">NOTE: All questions must be answered or your application will be delayed.</p>
            </div>
                <p style="font-size: 16px; padding:10px;width:45%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">SPONSOR/BENEFICIARY INFORMATION</p>
            </div>
            <p>The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may be contributed to the Trust.</p>

            <div style="display: table; width: 100%;" class="container-table">
                <div style="display: table-row; width: 100%;">
                    <label style="font-weight: bold; display: table-cell; width: 15%;">Legal Name:</label>
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
                    <label style="font-weight: bold;">Marital Status:</label>
                    <label>Married <input type="radio" name="sponsor_marital_status" value="Married" {{ isset($sponsor_marital_status) && $sponsor_marital_status === 'Married' ? 'checked' : '' }}></label>
                    <label>Widowed <input type="radio" name="sponsor_marital_status" value="Widowed" {{ isset($sponsor_marital_status) && $sponsor_marital_status === 'Widowed' ? 'checked' : '' }}></label>
                    <label>Single <input type="radio" name="sponsor_marital_status" value="Single" {{ isset($sponsor_marital_status) && $sponsor_marital_status === 'Single' ? 'checked' : '' }}></label>
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
                <input type="radio" name="sponsor_citizen" value="Yes" {{ isset($sponsor_citizen) && $sponsor_citizen === 'Yes' ? 'checked' : '' }}> Yes
                <input type="radio" name="sponsor_citizen" value="No" {{ isset($sponsor_citizen) && $sponsor_citizen === 'No' ? 'checked' : '' }}> No
                <label>Home Phone</label>
                <input type="text" value="{{ $sponsor_tel_home }}" class="no-border" name="sponsor_tel_home">
                <label>Cell Phone</label>
                <input type="text" value="{{ $sponsor_tel_cell }}" class="no-border" name="sponsor_tel_cell">
            </div>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell; padding: 0">
                    <label>Preferred Phone:</label>
                    <input type="radio" name="preferedphone" value="Cell"
                        {{ isset($prefered_cell) && $prefered_cell === 'Cell' ? 'checked' : '' }}>Cell
                    <input type="radio" name="preferedphone" value="Phone"
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

        {{-- <div class="page-break"></div> --}}


        <div class="page-2" style="margin-top:-5px">
            <div class="">
                <p
                class="md"
                    style="padding:10px;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;width:35%">
                    AUTHORIZED REPRESENTATIVES
                </p>
            </div>
            <p class="xs" style=" ">Who will be your primary contact?
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="auth_beneficiary" value="Beneficiary"
                        {{ isset($auth_beneficiary) && $auth_beneficiary === 'Beneficiary' ? 'checked' : '' }}>
                    Beneficiary
                </label>
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="auth_beneficiary" value="Auth. Rep.1"
                        {{ isset($auth_beneficiary) && $auth_beneficiary === 'Auth. Rep.1' ? 'checked' : '' }}>
                    Auth. Rep. 1
                </label>
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="auth_beneficiary" value="Auth. Rep. 2"
                        {{ isset($auth_beneficiary) && $auth_beneficiary === 'Auth. Rep. 2' ? 'checked' : '' }}>
                    Auth. Rep. 2
                </label>
            </p>

            <div class="border-container">
            <p style="padding:0;margin: 0;" class="xs">
                The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
                individual
                to: Make Deposits, Request Statements and Disbursements.
            </p>
            <p class="strong sm" style="margin-top:5px">Authorized Representative # 1</p>
            {{-- <p style="padding:0;margin: 0;"><b>Name:</b> First <input type="text"
                    value="{{ $auth_rep_one_fname }}" class="no-border" name="auth_rep_one_fname"
                    style="width: 100px">
                Last
                <input type="text" value="{{ $auth_rep_one_lname }}" class="no-border" name="auth_rep_one_lname"
                    style="width: 100px">
            </p> --}}

            <div class="xs" style="display: table;width:100%;margin-top:-12px">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input type="text" value="{{ $auth_rep_one_fname }}" name="auth_rep_one_fname" style="width: 95%" /> <br>
                        <label class="italic">First</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_one_lname }}"name="auth_rep_one_lname" style="width: 95%" /> <br>
                        <label class="italic">Last:</label>
                    </div>
                </div>
            </div>

            <div style="display: table;width:100%;margin-top:3px;margin-bottom:3px" >
                <div style="display: table-row;margin-top:2x">
                    <div style="display: table-cell">
                        <label style="font-weight: bold" class="sm">Contact Information</label>
                    </div>
                </div>
                <div style="display: table-row;" class="xs">
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_one_tel }}" name="auth_rep_one_tel" style="width: 95%"> <br>
                        <label class="italic">Home Phone</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_one_cell }} " name="auth_rep_one_cell" style="width: 95%"> <br>
                        <label class="italic">Cell Phone</label>
                    </div>
                    <p style=" ">Preferred Phone:
                    <label style="margin: 0;">
                        <input style="height:22px" type="radio" name="authorized_preferred_cell_form_inp" value="Authorized_1_cell"
                            {{ isset($authorized_preferred_cell_form_inp) && $authorized_preferred_cell_form_inp === 'Authorized_1_cell' ? 'checked' : '' }}>
                        <label>Cell</label>
                    </label>
                    <label style="margin: 0;">
                        <input style="height:22px" type="radio" name="authorized_preferred_cell_form_inp" value="Authorized_1_home"
                            {{ isset($authorized_preferred_cell_form_inp) && $authorized_preferred_cell_form_inp === 'Authorized_1_home' ? 'checked' : '' }}>
                        <label>Home</label>
                    </label>
                </p>

                </div>
            </div>

            <div style="display: table;width:100%" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <input type="text" value="{{ $auth_rep_one_email }}" name="auth_rep_one_email" style="width: 95%" /> <br>
                        <label class="italic">Email</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_one_relation_beneficiary }}" name="auth_rep_one_relation_beneficiary" style="width: 95%" /> <br>
                        <label class="italic">Relationship to Beneficiary
                        </label>
                    </div>
                </div>
            </div>
                <div style="display: table;width:100%">

                    <div style="display: table-row;">
                        <div style="display: table-cell">
                            <label style="font-weight: bold" class="sm">Address:</label>
                        </div>
                    </div>


                    <div style="display: table-row;margin-top:7px" class="xs">
                        <div style="display: table-cell;">
                            <input type="text" value="{{ $auth_rep_one_address }}" name="auth_rep_one_address" style="width: 95%">
                            <label>Address</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_one_city }}" name="auth_rep_one_city" style="width: 95%" />
                            <label>City:</label>
                        </div>
                        <div style="display: table-cell;">

                            <input type="text" value="{{ $auth_rep_one_state }}" name="auth_rep_one_state" style="width: 95%" />
                            <label>State:</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_one_apt }}" name="auth_rep_one_apt" style="width: 95%">
                            <label>Apt #:</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_one_zip }}"name="auth_rep_one_zip" style="width: 95%" />
                            <label>Zip:</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-container" style="margin-top: 5px;">
            <p style="padding:0;margin: 0;" class="xs">
                The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
                individual
                to: Make Deposits, Request Statements and Disbursements.
            </p>
            <p class="strong sm" style="margin-top:5px">Authorized Representative # 2</p>
            {{-- <p style="padding:0;margin: 0;"><b>Name:</b> First <input type="text"
                    value="{{ $auth_rep_one_fname }}" class="no-border" name="auth_rep_one_fname"
                    style="width: 100px">
                Last
                <input type="text" value="{{ $auth_rep_one_lname }}" class="no-border" name="auth_rep_one_lname"
                    style="width: 100px">
            </p> --}}

            <div style="display: table;width:100%;margin-top:-12px" class="xs">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input type="text" value="{{ $auth_rep_two_fname }}" name="auth_rep_two_fname" style="width: 95%" /> <br>
                        <label class="italic">First</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_lname }}"name="auth_rep_two_lname" style="width: 95%" /> <br>
                        <label class="italic">Last:</label>
                    </div>
                </div>
            </div>

            <div style="display: table;width:100%;margin-top:3px;margin-bottom:3px" >
                <div style="display: table-row;margin-top:2x">
                    <div style="display: table-cell">
                        <label style="font-weight: bold" class="sm">Contact Information</label>
                    </div>
                </div>
                <div style="display: table-row;" class="xs">
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_tel }}" name="auth_rep_two_tel" style="width: 95%"> <br>
                        <label class="italic">Home Phone</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_cell }} " name="auth_rep_two_cell" style="width: 95%"> <br>
                        <label class="italic">Cell Phone</label>
                    </div>
                    <p style=" ">Preferred Phone:
                    <label style="margin: 0;">
                        <input style="height:22px" type="radio" name="authorized_preferred_cell2" value="Cell"
                            {{ isset($authorized_preferred_cell2) && $authorized_preferred_cell2 === 'Cell' ? 'checked' : '' }}>
                        <label>Cell</label>
                    </label>
                    <label style="margin: 0;">
                        <input style="height:22px" type="radio" name="authorized_preferred_cell2" value="Home"
                            {{ isset($authorized_preferred_cell2) && $authorized_preferred_cell2 === 'Home' ? 'checked' : '' }}>
                        <label>Home</label>
                    </label>
                </p>

                </div>
            </div>

            <div style="display: table;width:100%" class="xs" >
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <input type="text" value="{{ $auth_rep_two_email }}" name="auth_rep_two_email" style="width: 95%" /> <br>
                        <label class="italic">Email</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $auth_rep_two_relation_beneficiary }}" name="auth_rep_two_relation_beneficiary" style="width: 95%" /> <br>
                        <label class="italic">Relationship to Beneficiary
                        </label>
                    </div>
                </div>
            </div>
                <div style="display: table;width:100%">

                    <div style="display: table-row;">
                        <div style="display: table-cell">
                            <label style="font-weight: bold" class="sm">Address:</label>
                        </div>
                    </div>


                    <div class="xs" style="display: table-row;margin-top:7px">
                        <div style="display: table-cell;">
                            <input type="text" value="{{ $auth_rep_two_address }}" name="auth_rep_two_address" style="width: 95%">
                            <label>Address</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_two_city }}" name="auth_rep_two_city" style="width: 95%" />
                            <label>City:</label>
                        </div>
                        <div style="display: table-cell;">

                            <input type="text" value="{{ $auth_rep_two_state }}" name="auth_rep_two_state" style="width: 95%" />
                            <label>State:</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_two_apt }}" name="auth_rep_two_apt" style="width: 95%">
                            <label>Apt #:</label>
                        </div>
                        <div style="display: table-cell">
                            <input type="text" value="{{ $auth_rep_two_zip }}"name="auth_rep_two_zip" style="width: 95%" />
                            <label>Zip:</label>
                        </div>
                    </div>
                </div>
            </div>



    </div>



            {{-- <p style="padding:0;margin: 0;">
                <b>Name:</b>
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
            <p>Preferred Phone? <input type="radio" name="authorized_preferred_cell2" value="Cell"
                    {{ isset($authorized_preferred_cell2) && $authorized_preferred_cell2 === 'Cell' ? 'checked' : '' }}>
                Cell
                <input type="radio" name="authorized_preferred_phone2" value="Home"
                    {{ isset($authorized_preferred_phone2) && $authorized_preferred_phone2 === 'Home' ? 'checked' : '' }}>
                Home

            </p> --}}
            <p
            class="sm"
                style=" padding:10px;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700; width:23%">
                REFERRING SOURCE
            </p>
            <p class="xs"> The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
                individual
                to: Make Deposits, Request Statements and Disbursements.</p>

            <div style="display: table; width:100%" class="xs">
                <div style="display: table-row;width:100%">
                    <div style="display: table-cell; width: 50%;">
                        <input type="text" value="{{ $referring_agency }}" name="referring_agency" style="width:95%" /> <br>
                        <label class="italic">Name of Agency</label>
                    </div>
                    <div style="display: table-cell; width: 50%;">
                        <input type="text" value="{{ $referring_contract }}" name="referring_contract" style="width:95%" /> <br>
                        <label>Name of Contract</label>
                    </div>
                </div>
                <br>
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input type="text" value="{{ $referring_tel }}" name="referring_tel" style="width:95%" /> <br>
                        <label>Home</label>
                    </div>

                    <div style="display: table-cell">
                        <input type="text" value="{{ $referring_email }}"name="referring_email" style="width:95%" /> <br>
                        <label>Email</label>
                    </div>
                </div>
                <br>

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
                    <div style="display: table-cell;">
                        <input type="text" value="{{ $referring_address }}" name="referring_address" style="width:95%">
                        <label>Address</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $referring_apt }}" name="referring_apt" style="width:95%">
                        <label>Apt #:</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $referring_city }}" name="referring_city" style="width:95%" />
                        <label>City:</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $referring_state }}" name="referring_state" style="width:95%" />
                        <label>State:</label>
                    </div>
                    <div style="display: table-cell">
                        <input type="text" value="{{ $referring_zip }}" name="referring_zip" style="width:95%" />
                        <label>Zip:</label>
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

            <p style="padding:0;margin: 0;width:100%" class="sm" style="margin-top:5px">
                I authorize any applicable documents necessary for reporting to Government Agencies to be sent referring
                source
                above.
                <input style="height:22px" type="radio" name="referring_auth1" value="Yes"
                    {{ isset($referring_auth1) && $referring_auth1 === 'Yes' ? 'checked' : '' }}> Yes
                <input style="height:22px" type="radio" name="referring_auth2" value="No"
                    {{ isset($referring_auth1) && $referring_auth1 === 'No' ? 'checked' : '' }}> No
            </p>

            <div style="text-align: center;margin: 0;padding: 0;">
                {{-- <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100"> --}}
                <p style="margin: 0;padding: 0;">2</p>
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

        {{-- <div class="page-break"></div> --}}

        <div class="page-3">
            <p
                style="font-size: 12px; padding:10px;width:25%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">
                PURPOSE OF ENROLLMENT
            </p>
            <p style="font-size: 12px; margin: 0;padding-bottom:'3px'" class='xs'>
                Indicate reason for establishing an account.
            </p>
            <div style="margin: 0; padding-bottom:3px;" class='xs'>
                <input style="height:22px" type="radio" name="account_establishing_reason1" value="Shelter Monthly Excess Income"
                    {{ isset($account_establishing_reason1) && $account_establishing_reason1 === 'Shelter Monthly Excess Income' ? 'checked' : '' }}>
                <label> Shelter Monthly Excess Income</label> &nbsp;
                <input style="height:22px" type="radio" name="account_establishing_reason1" value="Shelter Excess Resources"
                    {{ isset($account_establishing_reason1) && $account_establishing_reason1 === 'Shelter Excess Resources' ? 'checked' : '' }}>
                <label> Shelter Excess Resources</label>
            </div>
            <div style='padding-top:4px;'>
                <p
                    style=" padding:10px;width:30%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;margin:0">
                    MEDICAID INFORMATION
                </p>

            <table style="padding-top: 0px; margin-top:10px;">
                <tr style="padding: 0; margin: 0;">
                    <td class='sm' style='width:180px;padding:6px'>Please Attach MAP / LDSS Notice of Decision</td>
                    <td class='sm' style="vertical-align: bottom;padding:6px;">Applicant</td>
                    <td class='sm' style="vertical-align: bottom;padding:6px;">Spouse</td>
                </tr>
                <tr style="padding: 0; margin: 0;" class='xs'>
                    <td style="width:180px;margin:0;padding:0px;">
                        <p style="vertical-align: bottom;margin:0;padding:3px">
                            Application Status
                            <br>
                            Does the beneficiary receive Medicaid?
                        </p>
                    </td>
                    <td class='xs' style="width:80px;vertical-align: center;padding:0;">
                        <div  style="margin:auto;padding:3px">
                            <input type="radio" name="beneficiary_receive_medicaid_applicant1" value="Yes"
                                style=";vertical-align: bottom;padding:0;margin:0"
                                {{ isset($beneficiary_receive_medicaid_applicant1) && $beneficiary_receive_medicaid_applicant1 === 'Yes' ? 'checked' : '' }}>
                            Yes &nbsp;
                            <input type="radio" name="beneficiary_receive_medicaid_applicant1" value="No"
                                style=";vertical-align: bottom;padding:0;margin:0"
                                {{ isset($beneficiary_receive_medicaid_applicant1) && $beneficiary_receive_medicaid_applicant1 === 'No' ? 'checked' : '' }}>
                            No &nbsp;
                            <input type="radio" name="beneficiary_receive_medicaid_applicant1" value="Pending"
                                style=";vertical-align: bottom;padding:0;margin:0"
                                {{ isset($beneficiary_receive_medicaid_applicant1) && $beneficiary_receive_medicaid_applicant1 === 'Pending' ? 'checked' : '' }}>
                            Pending
                        </div>
                    </td>
                    <td class='xs' style="width:80px;vertical-align: center;margin:0;padding:0px;">
                        <div style="margin:auto;padding:3px">
                            <input type="radio" name="beneficiary_receive_medicaid_spouse1" value="Yes"
                                style=";vertical-align: bottom;"
                                {{ isset($beneficiary_receive_medicaid_spouse1) && $beneficiary_receive_medicaid_spouse1 === 'Yes' ? 'checked' : '' }}>
                            Yes &nbsp;
                            <input type="radio" name="beneficiary_receive_medicaid_spouse1" value="No"
                                style=";vertical-align: bottom;"
                                {{ isset($beneficiary_receive_medicaid_spouse1) && $beneficiary_receive_medicaid_spouse1 === 'No' ? 'checked' : '' }}>
                            No &nbsp;
                            <input type="radio" name="beneficiary_receive_medicaid_spouse3" value="Pending"
                                style=";vertical-align: bottom;"
                                {{ isset($beneficiary_receive_medicaid_spouse1) && $beneficiary_receive_medicaid_spouse1 === 'Pending' ? 'checked' : '' }}>
                            Pending
                        </div>
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0;" class='xs'>
                    <td style="width:80px; vertical-align: center;padding:3px">
                        CIN Number/medicaid Number
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:3px">
                        <input type="text" value="{{ $applicant_medicaid_cin_number }}" style='border:none' class="no-border"
                            name="applicant_medicaid_cin_number">
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:3px">
                        <input type="text" value="{{ $spouse_medicaid_cin_number }}" style='border:none' class="no-border"
                            name="spouse_medicaid_cin_number">
                    </td>
                </tr>
                <tr style="padding: 0; margin: 0;" class='xs'>
                    <td style="width:80px; vertical-align: bottom; padding:3px">
                        Monthly Spend Down $
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:3px">
                        <input type="text" value="{{ $medicaid_applicant_monthly_spend_down }}" style='border:none' class="no-border"
                            name="medicaid_applicant_monthly_spend_down">
                    </td>
                    <td style="width:80px;vertical-align: bottom;padding:3px">
                        <input type="text" value="{{ $medicaid_spouse_monthly_spend_down }}" style='border:none' class="no-border"
                            name="medicaid_spouse_monthly_spend_down">
                    </td>
                </tr>
            </table>
            <br>

            <div style="margin: 0;padding: 0;" class='xs'>
                <span>if the Beneficiary receives other benefits, such as Food Stamps, HUD Section 8, etc. list these
                benefits.
                and monthly amounts.</span>
             <input type="text" class="no-border" name="beneficiary_benefits"
                    value="{{ $beneficiary_benefits }}" style="width: 50%">
            </div>
        </div>
            <br>
            <span class='section-title'
            style="font-size: 16px; padding:10px;width:45%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;margin-top:-60px;">
            HOUSEHOLD INCOME INFORMATION </span>
            &nbsp;&nbsp;
            <br><br>
            <span style="margin:0;" class='sm'><b>SPOUSE INFORMATION:</b></span>
            <span class='italic xs'>(please include proof of income)</span>
            <br>
            <p style="margin: 0;padding-top:4px" class='xs'>
                Is Spouse Deceased? &nbsp;
                <input style="height:22px" type="radio" name="spouse_decreased1" value="Yes"
                    {{ isset($spouse_decreased1) && $spouse_decreased1 === 'Yes' ? 'checked' : '' }}> Yes
                <input style="height:22px" type="radio" name="spouse_decreased1" value="No"
                    {{ isset($spouse_decreased1) && $spouse_decreased1 === 'No' ? 'checked' : '' }}> No
            </p>
            <p style="margin: 0;" class='xs'>
                Is Applicant & Spouse Applying Together? &nbsp;
                <input style="height:22px" type="checkbox" name="applying_together1" value="Yes"
                    {{ isset($applying_together1) && $applying_together1 === 'Yes' ? 'checked' : '' }}> Yes
                <input style="height:22px" type="checkbox" name="applying_together1" value="No"
                    {{ isset($applying_together1) && $applying_together1 === 'No' ? 'checked' : '' }}> No &nbsp;
                If Yes, Fill in Spouse’s Income.
            </p>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;padding-bottom:10px" class='xs'>
                        <label style='padding-bottom:10px'>First Name: </label>
                        <input type="text" value="{{ $spouse_fname }}" name="spouse_fname" />
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell" class='xs'>
                        <label >Last Name: </label>
                        <input type="text" value="{{ $spouse_lname }}" name="spouse_lname" />
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


            <div class='xs'>
                <div>
                    <label>
                        Spouse Applied for Medicaid with beneficiary?
                    </label>
                    &nbsp;
                    <input style="height:22px" type="radio" name="spouse_applied_for_medicaid_with_beneficiary1" value="Yes"
                        {{ isset($spouse_applied_for_medicaid_with_beneficiary1) && $spouse_applied_for_medicaid_with_beneficiary1 === 'Yes' ? 'checked' : '' }} >
                    <label for="">Yes</label>
                    <input style="height:22px" type="radio" name="spouse_applied_for_medicaid_with_beneficiary1" value="No"
                        {{ isset($spouse_applied_for_medicaid_with_beneficiary1) && $spouse_applied_for_medicaid_with_beneficiary1 === 'No' ? 'checked' : '' }} >
                    <label for="">No</label>

                </div>
            </div>
            <br>
            <table style=" padding: 0;margin: 0;" class='sm'>
                <tr style="padding: 0;margin: 0;">
                    <td style="padding:3px ;margin: 0;">
                        <p style="padding: 5px;margin: 0;">  TYPE OF BENEFIT MONTHLY AMOUNT</p>
                    </td>
                    <td style="padding: 5px;margin: 0;">
                        <p style="padding: 3px;margin: 0;"> Applicant <br></p>
                    </td>
                    <td style="padding:5px ;margin: 0;">
                        <p style="padding: 3px;margin: 0;"> Spouse <br></p>
                    </td>
                </tr>
                <tr style="padding: 0;margin: 0;" class='xs'>
                    <td style="width:180px;padding: 0px;margin: 0;max-height: 5px;">
                        <p style='margin:3px'>
                            Supplement Security Income(SSI)
                        </p>
                    </td>
                    <td style="width:80px;padding: 0px;margin: 3px;" class='xs'>
                        <p style='margin:3px'>$ <input type="text" value="{{ $applicant_ssi }}" style='border:none'
                                name="applicant_ssi"></p>
                    </td>
                    <td style="width:80px;padding: 0px;margin: 3px;" class='xs'>
                        <p style='margin:3px'>$ <input type="text" value="{{ $spouse_ssi }}" class="no-border" style='border:none' name="spouse_ssi">
                        </p>
                    </td>
                </tr>
                <tr style=" padding: 0;margin: 0 " >
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ;">
                        Supplement Security Disability Income(SSDI)
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="margin: 3px;">$ <input type="text" value="{{ $applicant_ssdi }}" style='border:none' class="no-border"
                                name="applicant_ssdi">
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="margin: 3px;">$ <input type="text" value="{{ $spouse_ssdi }}" style='border:none' class="no-border"
                                name="spouse_ssdi"></p>
                    </td>
                </tr>
                <tr style=" padding: 0;margin: 0 ">
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ;">
                        <p style='margin:3px'>
                            Supplement Security Retirement Income(SSA)
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ;" class='xs'>
                        <p style="margin: 3px;">$ <input type="text" value="{{ $applicant_ssa }}" style='border:none' class="no-border"
                                name="applicant_ssa"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="margin: 3px;">$ <input type="text" value="{{ $spouse_ssa }}" style='border:none' class="no-border" name="spouse_ssa">
                        </p>
                    </td>
                </tr>
                <tr style=" padding: 0;margin: 0 ">
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        VA Benefits
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_va_ben }}" style='border:none' class="no-border"
                                name="applicant_va_ben"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_va_ben }}" style='border:none' class="no-border"
                                name="spouse_va_ben"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        Employment Benefits
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_employee_ben }}" style='border:none' class="no-border"
                                name="applicant_employee_ben"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_employee_ben }}" style='border:none' class="no-border"
                                name="spouse_employee_ben"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        Survivor Benefits

                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_survivor_ben }}" style='border:none' class="no-border"
                                name="applicant_survivor_ben"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_survivor_ben }}" style='border:none' class="no-border"
                                name="spouse_survivor_ben"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        IRA Distribution
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_ira_dist }}" style='border:none' class="no-border"
                                name="applicant_ira_dist"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_ira_dist }}" style='border:none' class="no-border"
                                name="spouse_ira_dist">
                        </p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        Pension / Annuities
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_pension_annuities }}" style='border:none' class="no-border"
                                name="applicant_pension_annuities"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_pension_annuities }}" style='border:none' class="no-border"
                                name="spouse_pension_annuities"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        Interest / Dividends
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_interest_dividends }}" style='border:none' class="no-border" name="applicant_interest_dividends"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_interest_dividends }}" style='border:none' class="no-border" name="spouse_interest_dividends"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        Reparations
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_reparations }}" style='border:none' class="no-border"
                                name="applicant_reparations"></p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_reparations }}" style='border:none' class="no-border"
                                name="spouse_reparations"></p>
                    </td>
                </tr>
                <tr style=" padding: 4px;margin: 0 " class='xs'>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0px;margin: 3px ;">
                        Other
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $applicant_other }}" style='border:none' class="no-border"
                                name="applicant_other">
                        </p>
                    </td>
                    <td class='xs' style="width:80px; padding: 0px;margin: 3px ; padding: 0;margin: 0; " class='xs'>
                        <p style="padding: 4px;margin: 0;">$ <input type="text" value="{{ $spouse_other }}" style='border:none' class="no-border"
                                name="spouse_other"></p>
                    </td>
                </tr>
            </table>
            <br>
            <p class='italic' style="padding: 0;margin: 0;" class='xs'>
                Please note: All disbursements must be for sole benefit of the country beneficiary.
                <br>
                A spouse is not a beneficiary for the account.
            </p>
            <div style="text-align: center;margin: 0;padding: 0;">
                {{-- <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100"> --}}
                <p style="margin: 0;padding: 0;">3</p>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="page-4">
            <div>
                <p class='italic' style="padding: 2%;text-align: center">FOR ANY APPLICABLE ITEMS BELOW, PLEASE ATTACH THE NECESSARY
                    PROOF.</p>
            </div>
            <p class='section-title'
                style=" padding:10px;width:30%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">
                HEALTH CARE PREMIUMS
            </p>
            <div style='display:table'>
            <div style=" display: table-row;">
                <div style='display:table-cell'>
                    <p style="margin: 0;padding:0" class='xs'>
                        Medicare Part: &nbsp;
                    <input style="height:22px" type="radio" name="healthcare_b" value="B"
                        {{ isset($healthcare_b) && $healthcare_b === 'B' ? 'checked' : '' }}> B &nbsp;
                        <input style="height:22px" type="radio" name="healthcare_b" value="D"
                        {{ isset($healthcare_b) && $healthcare_b === 'D' ? 'checked' : '' }}> D
                        Does the applicant have a supplemental policy? &nbsp;
                        <input style="height:22px" type="radio" name="supplemental_yes" value="Yes"
                        {{ isset($supplemental_yes) && $supplemental_yes === 'Yes' ? 'checked' : '' }}> Yes &nbsp;
                        <input style="height:22px" type="radio" name="supplemental_yes" value="No"
                        {{ isset($supplemental_yes) && $supplemental_yes === 'No' ? 'checked' : '' }}> No
                    </div>
               </div>
            </p>
            <div style="display: table-row;" class='xs'>
                If yes, what is the monthly premium? $
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
                        <p style="width:45%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;font-size: 14px; padding:10px;">FUNERAL INFORMATION</p>
                    </div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell; margin-bottom: 2px;">
                        <p style="padding:0;margin: 0;" class='xs'>
                            Does the Beneficiary have any funeral provisions in place? &nbsp;
                            <input style="height:22px" type="radio" name="funeral_information_body_yes" value="Yes"
                                {{ isset($funeral_information_body_yes) && $funeral_information_body_yes === 'Yes' ? 'checked' : '' }}>
                            Yes &nbsp;
                            <input style="height:22px" type="radio" name="funeral_information_body_yes" value="No"
                                {{ isset($funeral_information_body_yes) && $funeral_information_body_yes === 'No' ? 'checked' : '' }}>
                            No
                        </p>
                        <p class='italic'>If you answered yes, please attach funeral provision documents.</p>
                    </div>
                </div>
            </div>
            <div style="display: table;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                       <p style="width:35%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;font-size: 14px; padding:10px;">LIFE INSURANCE INFORMATION</p>
                    </div>
                </div>
                <p style="padding:0;margin: 0;" class='xs'>
                    Is there a life insurance policy in place for the Beneficiary? &nbsp;
                    <input style="height:22px" type="radio" name="life_insurance_information_body_yes" value="Yes"
                        {{ isset($life_insurance_information_body_yes) && $life_insurance_information_body_yes === 'Yes' ? 'checked' : '' }}>
                    Yes &nbsp;
                    <input style="height:22px" type="radio" name="life_insurance_information_body_yes" value="No"
                        {{ isset($life_insurance_information_body_yes) && $life_insurance_information_body_yes === 'No' ? 'checked' : '' }}>
                    No
                </p>
                    <p class='italic'>If you answered yes, please attach funeral provision documents</p>
                <div style="display: table-row;">
                        <div style="display: table-cell;padding-bottom:14px" class='xs'>
                            <label>Name of Insured:</label> &nbsp;
                            <input type="text" value="{{ $insured_name }}" name="insured_name" />
                            <label>Name of Owner:</label> &nbsp;
                            <input type="text" value="{{ $insured_name }}" name="insured_name" />
                        </div>
                </div> 
                <div style="display: table-row;">
                    <div style="display: table-cell;padding-bottom:14px" class='xs'>
                        <label>Name of insurance company</label> &nbsp;
                        <input type="text" value="{{ $insurance_company }}" name="insurance_company" />
                        <label>Policy #</label> &nbsp;
                        <input type="text" value="{{ $insurance_policy_number }}" name="insurance_policy_number" />
                    </div>
                </div>
                <div style="display: table-row;" class='xs'>
                    <div style="display: table-cell;padding-bottom:14px">
                        Term of policy <input style="height:15px" type="radio" name="type_of_policy1" value="Term"
                            {{ isset($type_of_policy1) && $type_of_policy1 === 'Term' ? 'checked' : '' }}>
                        Term
                        <input style="height:22px" type="text" value="{{ $healthcare_plan }}" class="no-border"
                            name="healthcare_plan">

                        <input style="height:15px" type="radio" name="type_of_policy1" value="Life"
                            {{ isset($type_of_policy1) && $type_of_policy1 === 'Life' ? 'checked' : '' }}> Life
                        <input type="text" value="{{ $healthcare_plan2 }}" class="no-border"
                            name="healthcare_plan2">
                            <label>Cash Surrender Value</label> &nbsp;
                        <input type="text" value="{{ $cash_surrender_value }}" name="cash_surrender_value" />
                    </div>
                    <br>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell;" class='xs'>
                        Upon the death of the Beneficiary, amounts remaining in the Beneficiary's sub-account shall be
                        reined in
                        the
                        Trust solely for the benefit of individuals who are disabled as defined in Soc. Sec. Law Section
                        1614(a)(3) [42
                        USC 1382c(a)(3)] and any subsequent definitions that are enacted into law.
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table;justify-content: space-between">
                    <span
            style="font-size: 16px; padding:10px;width:35%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">
            LIVING ARRANGEMENTS </span>
            &nbsp;&nbsp;
            <span class='xs'>(Indicate the living arrangement of the Beneficiary)</span>
            </div>
            <p style="padding-bottom: 0;margin-bottom:0" class='xs'>
                <input style="height:22px" type="radio" id="independently" name="living_arrangement1" value="Independently"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Independently' ? 'checked' : '' }}>
                <label for="independently" style="vertical-align: middle;">Independently</label> &nbsp;&nbsp;

                <input style="height:22px" type="radio" id="with_spouse" name="living_arrangement1" value="With Spouse"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'With Spouse' ? 'checked' : '' }}>
                <label for="with_spouse" style="vertical-align: middle;">With Spouse</label> &nbsp;&nbsp;

                <input style="height:22px" type="radio" id="with_parents" name="living_arrangement1" value="With Parents"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'With Parents' ? 'checked' : '' }}>
                <label for="with_parents" style="vertical-align: middle;">With parents/other family</label> &nbsp;&nbsp;

                <input style="height:22px" type="radio" id="assisted_living" name="living_arrangement1"
                    value="Assisted Living facility"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Assisted Living facility' ? 'checked' : '' }}>
                <label for="assisted_living" style="vertical-align: middle;">Assisted living facility</label>
            </p>
            <p style="padding: 0;margin:0" class='xs'>
                <input style="height:22px" type="radio" id="family_care" name="living_arrangement1" value="Family Care Program"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Family Care Program' ? 'checked' : '' }}>
                <label for="family_care" style="vertical-align: middle;">Family care program</label> &nbsp;&nbsp;

                <input style="height:22px" type="radio" id="nursing_home" name="living_arrangement1" value="Nursing Home"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Nursing Home' ? 'checked' : '' }}>
                <label for="nursing_home" style="vertical-align: middle;">Nursing home</label> &nbsp;&nbsp;

                <input style="height:22px" type="radio" id="supervised" name="living_arrangement1" value="CR/IRA/ICF(supervised)"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'CR/IRA/ICF(supervised)' ? 'checked' : '' }}>
                <label for="supervised" style="vertical-align: middle;">CR/IRA/ICF(supervised)</label> &nbsp;&nbsp;

                <input style="height:22px" type="radio" id="supportive" name="living_arrangement1" value="CR/IRA(Supportive)"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'CR/IRA(Supportive)' ? 'checked' : '' }}>
                <label for="supportive" style="vertical-align: middle;">CR/IRA(Supportive)</label>
            </p>
            <p style="padding: 0; margin: 0;" class='xs'>
                <input style="height:22px" type="radio" id="other_living_arrangement" name="living_arrangement1" value="Other"
                    {{ isset($living_arrangement1) && $living_arrangement1 === 'Other' ? 'checked' : '' }}>
                <label for="other_living_arrangement" style="vertical-align: middle;">Other Explain</label> &nbsp;&nbsp;
                <input type="text" value="{{ $living_arrangement_other }}" class="no-border"
                    name="living_arrangement_other">
            </p>
            <br>
            {{-- New Living Arrangement --}}
            <p class='section-title' style="font-size: 0px; padding:10px;width:45%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">LIVING ARRANGEMENTS</p>
            <p class='italic' style='padding:0' class='xs'> Please attach a copy of the guardianship order with this Joinder Agreement.</p>
            <p style="padding:0;margin: 0;" class='xs'>
                Does the Beneficiary have a court appointed Guardian?
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="living_arrangements_yes" value="Yes"
                        {{ isset($living_arrangements_yes) && $living_arrangements_yes === 'Yes' ? 'checked' : '' }}>
                    Yes
                </label>
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="living_arrangements_yes" value="No"
                        {{ isset($living_arrangements_yes) && $living_arrangements_yes === 'No' ? 'checked' : '' }}>
                    No
                </label>
            </p>
            <p style="padding:0;margin: 0;" class='xs'>
                If you answered yes, continue to fill out below:
            </p>
            <p style="padding:0;margin: 0;" class='xs'>
                Guardian of the:
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="living_arrangements_person" value="Person"
                        {{ isset($living_arrangements_person) && $living_arrangements_person === 'Person' ? 'checked' : '' }}>
                    Person
                </label>
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="living_arrangements_person" value="Person"
                        {{ isset($living_arrangements_person) && $living_arrangements_person === 'Property' ? 'checked' : '' }}>
                    Property
                </label>
                <label style="margin: 0;">
                    <input style="height:22px" type="radio" name="living_arrangements_person" value="Both"
                        {{ isset($living_arrangements_person) && $living_arrangements_person === 'Both' ? 'checked' : '' }}>
                    Both
                </label>
            </p>
            <p style="padding:0;margin: 0;" class='xs'>
                Court Appointed Guardian Information
            </p>
            <div style="display: table;width:100%;margin-top:4px">
                <div style="display: table-row;">
                    <div style="display: table-cell;" class='xs'>
                        <input type="text" value="{{ $living_arrangement_first }}" name="living_arrangement_first" style="width: 95%" /> <br>
                        <label>First</label>
                    </div>
                    &nbsp;
                    <div style="display: table-cell" class='xs'>
                        <input type="text" value="{{ $living_arrangement_last }}" name="living_arrangement_last" style="width: 95%" /> <br>
                        <label>Last</label>
                    </div>
                </div>
                <div style="display: table-row;">
                    <div style="display: table-cell;" class='xs'>
                        <input type="text" value="{{ $living_arrangement_primary }}" name="living_arrangement_primary" style="width: 95%" /> <br>
                        <label>Primary Phone</label>
                    </div>
                    &nbsp;&nbsp;
                    <div style="display: table-cell" class='xs'>
                        <input type="text" value="{{ $living_arrangement_email }}" name="living_arrangement_email" style="width: 95%" /> <br>
                        <label>Email</label>
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
            <br>
            <div style="text-align: center;margin: 0;padding: 0;">
                <p style="margin: 0;padding: 0;">4</p>
            </div>

        </div>

        <div class="page-break"></div>

        <div class="page-5 ">
            <p style="font-size: 16px; padding:10px;width:30%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700" class="section-title">
                POWER OF ATTORNEY
            </p>

            <div class="pa-container">
                <p>Power of Attornery &nbsp; <span class="italic" style="font-size: 16px"> Please attach a copy of Power of Attorney</span></p>

            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input style="font-size: 16px" type="text" value="{{ $power_fname }}" name="power_fname" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">First</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_lname }}" name="power_lname" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Last</label>
                    </div>
                </div>
                {{-- <div style="display: table-row;background-color: green;margin: 0;padding:0;">
                    <div style="display: table-cell;margin: 0;padding:0;">
                        <b>Name:</b> First <input type="text" value="{{ $power_fname }}" class="no-border"
                            style="width: 100px;vertical-align: bottom" name="power_fname">
                    </div>
                    <div style="display: table-cell;margin: 0;padding:0;">
                        Last <input type="text" value="{{ $power_lname }}" class="no-border"
                            style="width: 100px;vertical-align: bottom" name="power_lname">
                    </div>
                </div> --}}
            </div>
            <br>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input style="font-size: 16px" type="text" value="{{ $power_tel_home }}" name="power_tel_home" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Primary Phone</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_email }}" name="power_email" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Email</label>
                    </div>
                </div>
                {{-- <div style="display: table-row;width: 100%;padding:0;margin:0;">
                    <div style="display: table-cell; width: 70%;padding:0;margin:0;">
                        Address <input type="text" value="{{ $power_address }}" class="no-border"
                            style="vertical-align: bottom" name="power_address">
                    </div>
                    <div style="display: table-cell; width: 30%;padding:0;margin:0;">
                        Apt#: <input type="text" value="{{ $power_apt }}" class="no-border"
                            style="width: 60%;vertical-align: bottom" name="power_apt">
                    </div>
                </div> --}}
            </div>
            <br>


            <div style="display: table;width: 100%">

                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <input style="font-size: 16px" type="text" value="{{ $power_address }}" name="power_address"> <br>
                        <label style="font-size: 14px" class="italic">Address</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_apt }}" name="power_apt"> <br>
                        <label style="font-size: 14px" class="italic">Apt #:</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_city }}" name="power_city" /> <br>
                        <label style="font-size: 14px" class="italic">City:</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_state }}" name="power_state" /> <br>
                        <label style="font-size: 14px" class="italic">State:</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_zip }}" name="power_zip" /> <br>
                        <label style="font-size: 14px" class="italic">Zip:</label>
                    </div>

                </div>
            </div>

            <br>

            {{-- <div style="display: table; width: 100%;margin: 0;padding: 0;">
                <div style="display: table-row;margin:0;">
                    <div style="display: table-cell;margin:0;">
                        <p>Tel. Home: <input type="text" class="no-border" style=";width: 100px"
                                name="power_tel_home" value="{{ $power_tel_home }}"> Email <input type="text"
                                value="{{ $power_email }}" class="no-border" style="width: 100px"
                                name="power_email">
                        </p>
                    </div>
                </div>
            </div> --}}

            <p style="margin: 0;padding: 0;font-size: 16px">Is this person the sole POA? &nbsp; <input style="height:22px" type="radio" name="sole_poa1"
                    value="Yes" {{ isset($sole_poa1) && $sole_poa1 === 'Yes' ? 'checked' : '' }}>
                Yes &nbsp;
                <input style="height:22px" type="radio" name="sole_poa1" value="No"
                    {{ isset($sole_poa1) && $sole_poa1 === 'No' ? 'checked' : '' }}> No
            </p>
            <p style="font-size: 16px">If No, are the agents authorized to act separately? &nbsp; <input type="radio" name="act_seprately1"
                    value="Yes" {{ isset($act_seprately1) && $act_seprately1 === 'Yes' ? 'checked' : '' }}>
                Yes &nbsp;
                <input style="height:22px" type="radio" name="act_seprately1" value="No"
                    {{ isset($act_seprately1) && $act_seprately1 === 'No' ? 'checked' : '' }}> No
            </p>

        </div>


        <div style="margin-top: 5px" class="pa-container">

            <p>Power of Attornery - Second Agent &nbsp; <span class="italic" style="font-size: 16px"> Please attach a copy of Power of Attorney</span></p>
            <div style="display: table; width: 100%;">

                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input style="font-size: 16px" type="text" value="{{ $power_fname2 }}" name="power_fname2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">First</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_lname2 }}" name="power_lname2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Last</label>
                    </div>
                </div>

            </div>
            <br>


            <div style="display: table; width: 100%;">

                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input style="font-size: 16px" type="text" value="{{ $power_tel_home2 }}" name="power_tel_home2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Primary Phone</label>
                    </div>

                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_email2 }}" name="power_email2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Email</label>
                    </div>
                </div>
            </div>



            <br>

            <div style="display: table;width:100%">

                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        <input style="font-size: 16px" type="text" value="{{ $power_address2 }}" name="power_address2" style="width: 95%"> <br>
                        <label style="font-size: 14px" class="italic">Address</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_apt2 }}" name="power_apt2" style="width: 95%"> <br>
                        <label style="font-size: 14px" class="italic">Apt #:</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_city2 }}" name="power_city2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">City:</label>
                    </div>

                </div>
            </div>
                <br>
                <div style="display: table;width:100%">

                <div style="display: table-row;">
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_state2 }}" name="power_state2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">State:</label>
                    </div>
                    <div style="display: table-cell">
                        <input style="font-size: 16px" type="text" value="{{ $power_zip2 }}" name="power_zip2" style="width: 95%" /> <br>
                        <label style="font-size: 14px" class="italic">Zip:</label>
                    </div>
                </div>

            </div>
            <br>



            <p style="margin: 0;padding: 0;font-size: 16px">Is this person the sole POA? &nbsp; <input style="height:22px" type="radio"
                    name="power_of_attorney2_yes" value="Yes"
                    {{ isset($power_of_attorney2_yes) && $power_of_attorney2_yes === 'Yes' ? 'checked' : '' }}>
                Yes &nbsp;
                <input style="height:22px" type="radio" name="power_of_attorney2_yes" value="No"
                    {{ isset($power_of_attorney2_yes) && $power_of_attorney2_yes === 'No' ? 'checked' : '' }}> No
            </p>
            <p style="font-size: 16px">If No, are the agents authorized to act separately? &nbsp; <input style="height:22px" type="radio"
                    name="power_of_attorney2_authorized_yes" value="Yes"
                    {{ isset($power_of_attorney2_authorized_yes) && $power_of_attorney2_authorized_yes === 'Yes' ? 'checked' : '' }}>
                Yes &nbsp;
                <input style="height:22px" type="radio" name="power_of_attorney2_authorized_yes" value="No"
                    {{ isset($power_of_attorney2_authorized_yes) && $power_of_attorney2_authorized_yes === 'No' ? 'checked' : '' }}>
                No
            </p>
        </div>
            {{-- <hr> --}}
            <p style="font-size: 16px; padding:10px;width:30%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">
                GUARDIANSHIP
            </p>
            <p class='italic' style="margin: 0;padding: 0;">
                Please attach a copy of Decree or Letter of guardianship
            </p>
            <p style="padding:0;margin: 0;">
                Does the Beneficiary have a court appointed Guardian? &nbsp;
                <input style="height:22px" type="radio" name="guardian_information_yes" value="Yes"
                    {{ isset($guardian_information_yes) && $guardian_information_yes === 'Yes' ? 'checked' : '' }}>
                Yes &nbsp;
                <input style="height:22px" type="radio" name="guardian_information_yes" value="No"
                    {{ isset($guardian_information_yes) && $guardian_information_yes === 'No' ? 'checked' : '' }}> No
            </p>
            <p>If you answered yes, continue to fill out below:</p>
            <br>
            <p style="margin: 0;padding: 0;">
                Guardian appointed for the: &nbsp;<input style="height:22px" type="radio" name="guardian_appointed_for1" value="Person"
                    {{ isset($guardian_appointed_for1) && $guardian_appointed_for1 === 'Person' ? 'checked' : '' }}>
                Person &nbsp;
                <input style="height:22px" type="radio" name="guardian_appointed_for1" value="Property"
                    {{ isset($guardian_appointed_for1) && $guardian_appointed_for1 === 'Property' ? 'checked' : '' }}>
                Property &nbsp;
                <input style="height:22px" type="radio" name="guardian_appointed_for3" value="Both"
                    {{ isset($guardian_appointed_for1) && $guardian_appointed_for1 === 'Both' ? 'checked' : '' }}>
                Both

            </p>
            <br>

            <div style="display: table; width:100%">
            <div style="display: table-row;">
                <div style="display: table-cell;">

                    <input type="text" value="{{ $guardianship_fname }}" name="guardianship_fname" style="width: 95%" /> <br>
                    <label>First</label>
                </div>
                &nbsp;&nbsp;

                <div style="display: table-cell">
                    <input type="text" value="{{ $guardianship_lname }}" name="guardianship_lname" style="width: 95%" /> <br>
                    <label>Last</label>
                </div>
            </div>
        </div>
        <br>

        <div style="display: table; width:100%">
            <div style="display: table-row;">
                <div style="display: table-cell;">

                    <input type="text" value="{{ $guardianship_telephone }}" name="guardianship_telephone" style="width: 95%" /> <br>
                    <label>Telephone</label>
                </div>
                &nbsp;&nbsp;

                <div style="display: table-cell">
                    <input type="text" value="{{ $guardianship_email }}" name="guardianship_email" style="width: 95%" /> <br>
                    <label>Email</label>
                </div>
            </div>
        </div>
        <br>


            {{-- <p style="margin: 0;padding: 0;"><b>Name:</b> First <input type="text"
                    value="{{ $guardianship_fname }}" class="no-border" name="guardianship_fname"
                    style="width:100px">
                Last <input type="text" value="{{ $guardianship_lname }}" class="no-border"
                    name="guardianship_lname" style="width:100px"></p><br>
            <p style="margin: 0;padding: 0;">
                Telephone <input type="text" value="{{ $guardianship_telephone }}" style="width:100px"
                    class="no-border" name="guardianship_telephone">
                Email
                <input type="text" value="{{ $guardianship_email }}" style="width:100px" class="no-border"
                    name="guardianship_email">
            </p> --}}

            <br>
            <p style="font-size: 16px; padding:10px;width:35%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">
                BENEFICIARY SERVICES
            </p>
            <br>
            <p style="padding:0;margin:0;">
                List other services that the Beneficiary receives (include day services, service coordination,
                employment
                program, etc.)
            </p>
            <br>
            <div style="display: table; padding: 0; margin: 0;width: 100%">
                <div style="display: table-row;">
                    <p style="display: table-cell; vertical-align: top; padding-right: 20px;float:left;">
                        Service <br>
                        <input type="text" value="{{ $beneficiary_service_one }}" class="no-border"
                            name="beneficiary_service_one"><br>
                        <input type="text" value="{{ $beneficiary_service_two }}" class="no-border"
                            name="beneficiary_service_two"><br>
                        <input type="text" value="{{ $beneficiary_service_three }}" class="no-border"
                            name="beneficiary_service_three">
                    </p>
                    <p style="display: table-cell; vertical-align: top; text-align: left;float:right;">
                        Name of Provider <br>
                        <input type="text" value="{{ $beneficiary_provider_one }}" class="no-border"
                            name="beneficiary_provider_one"><br>
                        <input type="text" value="{{ $beneficiary_provider_two }}" class="no-border"
                            name="beneficiary_provider_two"><br>
                        <input type="text" value="{{ $beneficiary_provider_three }}" class="no-border"
                            name="beneficiary_provider_three">
                    </p>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div style="text-align: center;margin: 0;padding: 0;">
                {{-- <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100"> --}}
                <p style="margin: 0;padding: 0;">5</p>
            </div>

        </div>

        {{-- <div class="page-break"></div> --}}

        <div class="page-6">
            <p style="font-size: 16px; padding:10px;width:40%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">INFORMATION AND DISCLOSURES:
            </p>
            <p>
                <b>Death of Beneficiary:</b>
            </p>
            <p>
                The Beneficiary's sub-trust account terminates upon his or her death. If, upon the death of the
                Beneficiary,
                funds remain in his or her sub-trust account, such funds shall be deemed to be property of the Trust and
                all
                funds that are remaining in the Beneficiary's separate sub-trust account shall be retained by TRUSTED
                SURPLUS
                SOLUTIONS DISABILITY POOLED TRUST to further the purposes of that Trust. However, to the extent that
                amounts
                remaining in the individual's sub-trust account upon the death of the individual are not in fact
                retained by the
                Trust, the Trust shall pay to the State(s) from such remaining amounts in the sub-trust account an
                amount equal
                to the total amount of medical assistance paid on behalf of the individual under the State Medicaid plan
                (s). To
                the extent that the trust does not retain the funds in the account, the State(s) shall be the first
                payee(s) of
                any such funds and the State(s) shall have priority over payment of other debts and administrative
                expenses
                except as listed in POMS SI 01120.203E. <br>
                Funeral expenses will only be paid pursuant to a Medicaid eligible pre-need funeral arrangement
                established and
                funded prior to the Beneficiary's death. Funeral expenses will not be paid after the Beneficiary's
                death.
                <br><b>Contributions/Deposits:</b><br>
                All contributions made to the sub-trust account will be held and administered pursuant to the provisions
                of the
                TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST which are incorporated by reference herein.
                The Trustees shall have the sole and absolute right to accept or refuse additional deposits to the
                sub-trust
                account.
                In the event that a Beneficiary has a zero ($0) sub-trust account balance for sixty (60) or more
                consecutive
                days, the Trustee shall retain the right to close the Beneficiary's sub-trust account. Please be advised
                that
                the Trustee may continue to charge administrative fees for the management of the sub-trust account prior
                to its
                closure. In the event that a Beneficiary wishes to re-open a sub-trust account, the Beneficiary may be
                required
                to pay any outstanding administrative fees stemming from the prior sub-trust account. Additionally, the
                Beneficiary shall be required to pay a new enrollment fee when re-opening a sub-trust account.
                <br><b>Disbursements: </b><br>
                All disbursement requests shall be reviewed and approved on an individual basis.
                Disbursements for expenses incurred more than 90 days prior to submission of a disbursement request form
                shall
                not be paid.
                The Trustees, in their discretion, have determined that disbursements for the following items shall not
                be paid:
                purchases of firearms, alcohol, tobacco, items relating to illegal activity, bail, or restitution.
                All disbursements shall be made at the sole and absolute discretion of the Trustee. No disbursements
                will be
                made after the death of the beneficiary, even for expenses incurred or due prior to death.
                <br>
                <b>Disability Determination:</b>
                In the event that a determination of disability is required for Medicaid purposes, please be advised
                that
                administrative fees shall be incurred while the determination of disability is being made.<br>
                The Donor acknowledges that contributions to the TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST are
                not
                tax-deductible as charitable gifts, or otherwise.<br>
                Sub-trust account income may be taxable to the Beneficiary.
                    Disclosure of Potential Conflict of Interest:
                There may be a potential conflict of interest in the administration of the Trust since the Trust retains
                those
                funds remaining in the sub-trust account at the time of death of the Beneficiary. Funds remaining in the
                Trust
                may be used to pay for ancillary and/or supplemental services for Beneficiaries and potential
                Beneficiaries for
                which services may be rendered by TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST. <br>
                The Donor executing this Joinder Agreement is aware of the potential conflicts of interest that exist in
                the
                Trustee's administration of the Trust. The Trustee shall not be liable to Donor or to any party for any
                act of
                self-dealing or conflict of interest resulting from their affiliations with SCF Charitable Organization
                or with
                any Beneficiary or constituent agencies and/or Chapters.
                <br>

            <div style="text-align: center;margin: 0;padding: 0;">
                <p style="margin: 0;padding: 0;">6</p>
            </div>
        </div>
        <br>

        {{-- <div class="page-break"></div> --}}

        <div class="page-7">
            <b>
                Situs:

            </b>
            <br>

            The sub-trust account created by this Agreement has been accepted by the Trustee in the State of New York
            and
            will be administered by SCF Charitable Organization Inc. and a financial institution in the State of New
            York.
            The validity, construction, and all rights under this Agreement shall be governed by the laws of the State
            of
            New York. The situs of this Trust for administrative, account and legal purposes shall be in the County of
            Kings, the County where the majority of meetings concerning establishment of the Trust occurred.
            Invalidity of any Provision: <br>
            Should any provision of this Agreement be or become invalid or unenforceable, the remaining provisions of
            this
            Agreement shall be and continue to be fully effective. <br>br
            By signing below, you affirm that you understand and agree to the following: <br>
            I have received and read a copy of the applicable Master Trust prior to the signing of this Joinder
            Agreement
            and acknowledge that I understand the contents thereof. I also understand that said document may be amended
            from
            time to time. I have been provided with the applicable fee schedule and acknowledge that I understand the
            contents thereof. I also understand there may be changes from time to time.
            <br>
            <p>
                I am entering into this Joinder Agreement voluntarily and acting on my own free accord. <br>
                <br>
                The Donor acknowledges that the Beneficiary is disabled as defined in Social Security Law Section
                1614(a)(3) [42 USC 1382c(a) (3)].<br>
                <br>
                Under penalty of perjury, all statements made in this document are true and accurate to the best of my
                knowledge. <br>
                <br>
                The TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST is authorized to be used by individuals with
                disabilities
                pursuant to federal and state law. By agreeing to accept a donor's property pursuant to this Joinder
                Agreement,
                TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST, Inc. agrees only to manage the trust funds in
                accordance with
                the terms of the Master Trust Agreement and in compliance with applicable federal and state law and
                regulation.
                It is the sole responsibility of the donor and/or the donor's representative to determine whether the
                donor is
                "disabled" as that term is defined under federal law, to determine whether they have the legal authority
                to
                transfer property to fund the trust, and the impact that a transfer of property to the TRUSTED SURPLUS
                SOLUTIONS
                DISABILITY POOLED TRUST will have on the donor's continuing eligibility for government benefit programs.
                <br>
                SCF Charitable Organization is not assuming any responsibility as counsel for the donor or Beneficiary,
                or
                providing any legal advice as it relates to the consequences of a transfer of property to the TRUSTED
                SURPLUS
                SOLUTIONS DISABILITY POOLED TRUST. <br>
                The Trustees in their discretion may require an intermediary to assist in the administration of the
                Beneficiary's sub-trust account. The cost of which may be charged to the sub-trust account. <br>
                The party authorized to speak with us on your behalf or the intermediary must notify TRUSTED SURPLUS
                SOLUTIONS
                DISABILITY POOLED TRUST, Inc. immediately upon your death and will be required to provide us with a
                certified
                death certificate. An individual requesting and/or receiving disbursements in contravention of the
                Master Trust
                Agreement and the Joinder Agreement will be required to repay the amount disbursed. <br>
                This Joinder Agreement and the participation of the Beneficiary in the TRUSTED SURPLUS SOLUTIONS
                DISABILITY
                POOLED TRUST is an important legal decision that may have significant and lasting consequences for the
                Beneficiary and as a result you may want to consider obtaining advice from an attorney or another
                professional
                adviser before entering into this Agreement. By signing this Agreement you are acknowledging that you
                have had a
                full and complete opportunity to confer with an attorney or other adviser and that no employee of SCF
                Charitable
                Organization has provided you (or the Beneficiary, if different from the person signing this Agreement)
                with any
                legal advice in connection with this Joinder Agreement, the participation by the Beneficiary in the
                TRUSTED
                SURPLUS SOLUTIONS DISABILITY POOLED TRUST or the suitability of such participation by the Beneficiary in
                the
                TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST based upon the particular circumstances of the
                Beneficiary.
                <br>
            <div style="text-align: center;margin: 0;padding: 0;">
                <p style="margin: 0;padding: 0;">7</p>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="page-8">
            <p style="font-size: 16px; padding:10px;width:20%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">SIGNATURE</p>
            <p style="padding:0;margin: 0;">
                Who is signing this Joinder Agreement?
                &nbsp;
                <input style="height:22px" type="radio" name="agreement_signature_beneficiary" value="Beneficiary"
                    {{ isset($agreement_signature_beneficiary) && $agreement_signature_beneficiary === 'Beneficiary' ? 'checked' : '' }}> Beneficiary &nbsp;
                <input style="height:22px" type="radio" name="agreement_signature_beneficiary" value="Power of Attorney"
                    {{ isset($agreement_signature_beneficiary) && $agreement_signature_beneficiary === 'Power of Attorney' ? 'checked' : '' }}>
                Power of Attorney &nbsp;
                <input style="height:22px" type="radio" name="agreement_signature_guardian" value="Guardian"
                    {{ isset($agreement_signature_beneficiary) && $agreement_signature_beneficiary === 'Guardian' ? 'checked' : '' }}>
                Guardian
            </p> <br>
            <p>I certify that the above information is accurate and the completed to the best of my knowledge.</p>

            <div style="display: table; width: 100%;margin:0;">
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        @if ($joinder_signature_1)
                            <img src="{{ $joinder_signature_1 }}" alt="Signature 1" width="300px"
                                height="150px" style="display: block; margin: 0 auto;">
                        @else
                            <div style="width: 200px;height:50px; text-align: center;">
                                No Signature Provided
                            </div>
                        @endif
                    </div>

                    <div style="display: table-cell; text-align: center;">
                        <p style="margin: 0;">
                            <input type="text" class="no-border" value="{{ $joinder_date }}"
                                style="width: 80%; margin: 0 auto;">
                            <br> DATE
                        </p>
                    </div>
                </div>

                <br>
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <p style="margin: 0;">
                            <input type="text" value="{{ $joinder_print }}" class="no-border"
                                style="width: 80%; margin: 0 auto;">
                            <br> PRINT
                        </p>
                    </div>
                </div>

            </div>
            <br>
            <p style="font-size: 16px; padding:10px;width:30%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700;text-align:center">SIGNATURE OF NOTARY</p> <br>
            <p style="margin:0;">STATE OF New York
                <input type="text" value="{{ $notary_state_of_ny }}" class="no-border"
                    name="notary_state_of_ny"> SS:
            </p>
            <p style="margin:0;">COUNTY OF
                <input type="text" value="{{ $notary_county_of }}" class="no-border"
                    name="notary_county_of">
            </p>
            <p style="margin:0;">
                ON <input type="text" class="no-border" name="notary_on_date"
                    value="{{ $notary_on_date }}"> ,20
                <input type="text" value="{{ $notary_year }}" class="no-border" name="notary_year">
            </p>

            <p style="margin:0;">
                Before me the undersigned, a Notary Public in and for said State, personally appeared
                <input type="text" value="{{ $notary_appeared }}" class="no-border" name="notary_appeared">
                personally known to me or proved to me on the basis of satisfactory evidence to be the individual whose
                name
                is subscribed to the within instrument and acknowledged to me that he/she/they executed the same in
                his/her capacity,
                and that by his/her signature on the instrument, the individual or the person upon behalf of which the
                individual acted
                executed this instrument.
            </p>
            <br>
            <input type="text" value="{{ $notary_public }}" class="no-border" name="notary_public">
            <br>
            NOTARY PUBLIC

            <br>
            <div style="display: table; width: 100%; margin-top: 20px;">

                <!-- Row for Witness Names -->
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_one_name" value="{{ $notary_witness_one_name }}"
                            maxlength="70">
                        <br><label> WITNESS 1 </label>
                    </div>
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_two_name" value="{{ $notary_witness_two_name }}"
                            maxlength="70">
                        <br><label> WITNESS 2 </label>
                    </div>
                </div>
                <br>

                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="sig_date1" value="{{ $sig_date1 }}" maxlength="70">
                        <br><label>Date</label>
                    </div>
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="sig_date2" value="{{ $sig_date2 }}" maxlength="70">
                        <br><label> Date </label>
                    </div>
                </div>
                <br>

                <!-- Row for Signatures -->
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <!-- Display signature image if present, else show placeholder text -->
                        <!-- This part will need to be generated server-side to check for signature presence -->
                        @if ($joinder_signature_2)
                            <img src="{{ $joinder_signature_2 }}" alt="Signature 2"
                                style="max-width:300px; max-height: 150px;">
                            <br>
                        @else
                            <div style="width: 200px;height:50px; text-align: center;">
                                No Signature Provided
                            </div>
                        @endif
                        <label> Witness 1 Signature</label>
                    </div>
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        @if ($joinder_signature_3)
                            <img src="{{ $joinder_signature_3 }}" alt="Signature 3"
                                style="max-width: 300px; max-height: 150px;">
                            <br>
                        @else
                            <div style="width: 200px;height:50px; text-align: center;">
                                No Signature Provided
                            </div>
                        @endif
                        <label> Witness 2 Signature</label>
                    </div>
                </div>

                <br>

                <!-- Row for Full Names -->
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_one_full_name" value="{{ $notary_witness_one_full_name }}"
                            maxlength="70">
                        <br><label> FULL NAME</label>
                    </div>
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_two_full_name" value="{{ $notary_witness_two_full_name }}"
                            maxlength="70">
                        <br><label> FULL NAME</label>
                    </div>
                </div>

                <br>

                <!-- Row for Full Addresses -->
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_one_full_address" value="{{ $notary_witness_one_full_address }}">
                        <br><label> FULL ADDRESS </label>
                    </div>
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            name="notary_witness_two_full_address" value="{{ $notary_witness_two_full_address }}">
                        <br><label> FULL ADDRESS </label>
                    </div>
                </div>

            </div>
            <br><br>
            <div
                style="background-color:rgb(184 221 219);color:rgb(52 159 153); text-align: center; vertical-align: center; padding:1%;height: 20px;">
                FOR OFFICE USE ONLY
            </div>

            <p>
                Accepted by Trustee or Designated Representative of the Trustees, Trusted Supplemental Needs Trust.
            </p>

            <div style="display: table; width: 100%;margin:0;">

                <!-- Row for Signature and Date Approved -->
                <div style="display: table-row;">
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <!-- Signature Image or Placeholder -->
                        @if ($joinder_signature_4)
                            <img src="{{ $joinder_signature_4 }}" alt="Signature 4"
                                style="width: 300px; height: 150px;">
                        @else
                            <div style="width: 200px;height:50px; text-align: center;">
                                No Signature Provided
                            </div>
                        @endif
                        <br><label>SIGNATURE</label>
                    </div>
                    <div style="display: table-cell; width: 50%; text-align: center;">
                        <input type="text" style="width: 90%; text-align: center;" class="no-border"
                            value="{{ $office_use_date_approved }}">
                        <br><label>DATE APPROVED</label>
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <table>
                        <tr>
                            <td colspan="2" style="color: rgb(52 159 153);font-size: 15px">FOR OFFICE USE ONLY</td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px">Member ID#:</td>
                            <td style="font-size: 14px"><input type="text" value="{{ $office_use_member_id_above }}"
                                    class="no-border"></td>
                        </tr>
                        <tr>
                            <td style="font-size: 14px">Effective Date:</td>
                            <td style="font-size: 14px"><input type="text" value="{{ $office_use_effective_date }}"
                                    class="no-border"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div style="text-align: center;margin: 0;padding: 0;">
                <p style="margin: 0;padding: 0;">8</p>
            </div>
        </div>

        <div class="page-break"></div>

        <div class="page-9">
            <p style="font-size: 16px; padding:10px;width:45%;background-color:rgb(184 221 219);color:rgb(52 159 153);font-weight:700">DIRECT DEBIT REQUEST FORM</p>
            <p style="">
                Donor/Beneficiary: <input type="text" value="{{ $office_use_effective_date }}"
                    class="no-border" style="width: 100%"> <br>
                Representative: <input type="text" value="{{ $direct_debit_representative }}"
                    class="no-border" style="width: 100%;"> <br>
                    Bank Name: <input type="text" value="{{ $direct_debit_bank_name }}"
                    class="no-border" style="width: 100%;" name="direct_debit_bank_name"> <br>
                    Bank Routing Number: <input type="text" value="{{ $direct_debit_bank_routing }}"
                    class="no-border" style="width: 100%;" name="direct_debit_bank_routing"> <br>
                    Account Number: <input type="text" value="{{ $direct_debit_account_number }}"
                    class="no-border" style="width: 100%;" name="direct_debit_account_number"> <br>
                    Account Name: <input type="text" value="{{ $direct_debit_account_name }}"
                    class="no-border" style="width: 100%;" name="direct_debit_account_name"> <br>
                    City:  <input type="text" value="{{ $direct_debit_city }}"
                    class="no-border" style="width: 100%;" name="direct_debit_city"> <br>
                    State: <input type="text" value="{{ $direct_debit_state }}"
                    class="no-border" style="width: 100%;" name="direct_debit_state">




                {{-- Bank Name: <input type="text" value="{{ $direct_debit_bank_name }}" class="no-border"
                    style="width:30%;">

                City: <input type="text" value="{{ $direct_debit_city }}" class="no-border"
                    style="width:25%;">


                State: <input type="text" value="{{ $direct_debit_state }}" class="no-border"
                    style="width:15%;;">
                Bank Routing Number: <input type="text" value="{{ $direct_debit_bank_routing }}"
                    class="no-border">
                Account Number: <input type="text" value="{{ $direct_debit_account_number }}"
                    class="no-border"> --}}

            </p>

            <p style=" ">Account type:
                <label>
                    <input style="height:22px" type="radio" name="direct_debit_bank_type1" value="Checking"
                        {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Checking' ? 'checked' : '' }}>
                    <label>Checking</label>
                </label>
                <label>
                    <input style="height:22px" type="radio" name="direct_debit_bank_type1" value="Savings"
                    {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Savings' ? 'checked' : '' }}>
                <label>Savings</label>
                </label>

            </p>

            <br>

            {{-- <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        City: <input type="text" value="{{ $direct_debit_city }}"
                            class="no-border" name="direct_debit_city">
                    </div>
                    <div style="display: table-cell;">
                        State: <input type="text" value="{{ $direct_debit_state }}"
                            class="no-border" name="direct_debit_state">
                    </div>
                </div>
            </div> --}}
            <br>

            {{-- <div style="display: table">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <input type="text" value="{{ $direct_debit_bank_name }}" name="direct_debit_bank_name" /> <br>
                        <label>Bank Name</label>
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell">
                        <label>City</label>
                        <input type="text" value="{{ $direct_debit_city }}" name="direct_debit_city" />
                    </div>
                    &nbsp;
                    &nbsp;
                    <div style="display: table-cell">
                        <label>State</label>
                        <input type="text" value="{{ $direct_debit_state }}" name="direct_debit_state" />
                    </div>
                </div>
            </div>
            <br> --}}
            {{-- <div style="display: table">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <label>Bank Routing Number</label>
                        <input type="text" value="{{ $direct_debit_bank_routing }}" name="direct_debit_bank_routing" />
                    </div>

                    <div style="display: table-cell">
                        <label>Account Number</label>
                        <input type="text" value="{{ $direct_debit_account_number }}" name="direct_debit_account_number" />
                    </div>
                </div>
            </div>

            <br> --}}











            {{-- <div style="display: table; width: 100%;">
                <div style="display: table-row;">
                    <div style="display: table-cell;">
                        Account Name: <input type="text" value="{{ $direct_debit_account_name }}"
                            class="no-border">
                    </div>
                    <div style="display: table-cell;">
                        Account type: <input style="height:22px" type="radio" name="direct_debit_bank_type1" value="Checking"
                            {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Checking' ? 'checked' : '' }}>
                        Checking
                    </div>
                    <div style="display: table-cell;">
                        <input style="height:22px" type="radio" name="direct_debit_bank_type1" value="Savings"
                            {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Savings' ? 'checked' : '' }}>
                        Savings
                    </div>
                </div>
            </div>
            <br> --}}

            <p>
                <b class='italic'>PLEASE SUBMIT A VOID CHECK ALONG WITH YOUR FORM.</b>
            </p>
            <p>
                I authorize and request Trusted Pooled Trust to initiate debit entries to my account at the depository
                financial
                institution indicated above. This authorization is to remain in full force and affect until Trusted has
                written
                notification from me of its termination in such time and manner as to afford Trusted and depository
                financial
                institution a reasonable opportunity to act on it.
            </p>
            <div style="display: flex; flex-direction: column; align-items: start; margin-top: 20px;">
                <!-- Label for signature -->
                <label style="font-weight: bold;">Beneficiary/Representative Signature:</label>

                <!-- Signature Input and Canvas Preview Container -->
                <div style="display: flex; flex-direction: column; align-items: start; margin-top: 10px;">
                    <div style="padding: 10px;">
                        @if ($joinder_signature_5)
                            <img src="{{ $joinder_signature_5 }}" alt="Signature 5"
                                style="max-width: 300px; height: auto;">
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>


        <div>
            <div
            style="background-color:rgb(184 221 219);color:rgb(52 159 153); text-align: center; vertical-align: center; padding:1%;height: 20px;">
            FOR OFFICE USE
            </div>
            <br>

            <div style="display: table">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <label>Account #:</label>
                        <input type="text" value="{{ $office_use_account_number }}" name="office_use_account_number" />
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell">
                        <label>MemberID #:</label>
                        <input type="text" value="{{ $office_use_member_id_below }}" name="office_use_member_id_below" />
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <label>Processed By:</label>
                        <input type="text" value="{{ $office_use_processed_by }}" name="office_use_processed_by" />
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell">
                        <label>Monthly Debit Amount: $ </label>
                        <input type="text" value="{{ $office_use_monthly_debit_amount }}" name="office_use_monthly_debit_amount" />
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table">
                <div style="display: table-row;">
                    <div style="display: table-cell font-size: 13px !important;text-align: start; !important">
                        <p>
                            Monthly dates for direct debit are as follows: 1, 3, 7, 14, 21, 28 (debit will occur on or around the date selected)
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <div style="display: table">
                <div style="display: table-row;">
                    <div style="display: table-cell;">

                        <label>Date of Monthly Debit:</label>
                        <input type="text" value="{{ $office_use_monthly_debit_date }}" name="office_use_monthly_debit_date" />
                    </div>
                    &nbsp;&nbsp;

                    <div style="display: table-cell">
                        <label>First Debit Month:</label>
                        <input type="text" value="{{ $office_use_monthly_debit_first_month }}" name="office_use_monthly_debit_first_month" />
                    </div>
                </div>
            </div>


            <br>
            <p style="padding:0;margin:0;font-size: 14px">
                If any direct debits are returned for insufficient funds, a $53 charge will apply<br>
                A $100 annual-renewal fee will be charged on the anniversary of the account
            </p>
            <br>
            <br>

            <div style="text-align: center;margin: 30px 0;padding: 0;">
                <img src="{{ public_path('images/slc_logo.png') }}" alt="logo" width="200"
                    height="100">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                <p style="margin: 0;padding: 0;">9</p>
            </div>
        </div>


    </form>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>Document</title>
    <style>
        @font-face {
        font-family: BrittanySignature;
        src: url("/fonts/BrittanySignature-MaZx.ttf");
            }
        @font-face {
                font-family: 'Info-Bold';
                src: url('fonts/Info-Bold.otf') format('truetype');
            }
        @font-face {
                font-family: 'info-normal';
                src: url('fonts/info-normal.ttf') format('truetype');
            }
        @font-face {
                font-family: 'info-semibold';
                src: url('fonts/info-semibold.ttf') format('truetype');
            }
        body{
                font-family:'info-normal';
                font-size: 11px;
                background:rgba(0, 0, 0, 0.06);
            }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 10px;
        }

        .submit-button {
            background-color: #559E99; /* Dark blue background */
            color: white; /* White text */
            padding: 8px 16px; /* Reduced padding */
            font-size: 14px; /* Smaller font size */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .submit-button:hover {
            /* background-color: #438580;  */
        }

        .submit-button:focus {
            outline: none; 
            box-shadow: 0 0 0 2px rgba(19, 75, 126, 0.25); 
        }


        table, th, td {
            border: none;

            margin: 0;
        }

        th, td {
            text-align: left;
            vertical-align: top;
        }

        input[type="checkbox"] {
            margin-right: 5px;
            vertical-align: top;
        }

        tr:first-child th {
            font-size: 12px;
        }

        .no-border {
            background-color: #b8b6b6 !important;
            border: none;

        }

        .container-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .container-row2 {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .custom-hr {
            height: 6px;
            border: none;
            background-color: black;
        }

        h6 {
            margin: 5px 0;
        }

        .checkbox-row label {
            margin-right: 20px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
        }

        .card {
            max-width: 1000px;
            background: white;
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            border-radius: 5px;
            margin: auto;
            /* overflow: hidden; */
            /* padding: 10px; */
            /* position: absolute; */
            /* top: 50%; */
            /* left: 50%; */
            /* transform: translate(-50%, -20%); */
            padding: 70px 110px;
        }


        /* .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
        } */


        .card-body {
            padding: 2px 16px;
        }

        @media print {
            .no-border {
                background-color: #b8b6b6 !important;

                border: none !important;
            }

        }
        @font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-weight: normal;
    font-style: italic;
}
#signature-doh{
    pointer-events: none;
}
input{
    /* background: #e9e9e9; */
    /* border-radius: 2px; */
    /* border: 1px solid #b2b2b2; */
    font-size: 12px;
    /* padding: 4px 6px; */
    /* margin-top: 5px; */
    border: none;
    border-bottom: 1px solid;
    padding: 0;
    outline: none
}
textarea{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 4px 6px;
    margin-top: 5px
}
.loader {
    border: 2px solid rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    border-top: 2px solid #fff;
    width: 16px;
    height: 16px;
    animation: spin 1s linear infinite;
    position: absolute;
    right: 10%;
    top: 22%;
    transform: translateY(-50%);
}
.btn-size{
    width: 12%;
}
.table-responsive{
    overflow: auto
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.submit-button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

.sec-1{
    display: flex;
    justify-content: space-between;
    /* gap: 45px;
    width: 99%;
    margin: auto; */
}
/* .patient-container{
    display: flex;
    gap: 45px;
    font-size: 11px;
} */
.label-block{
    display: block
}
.w100{
   width: 97%
}
.text-sm{
    font-size: 12px
}
.text-xsm{
    font-size: 11px
}
.text-md{
    font-size: 14px
}
p{
    margin: 0
}
h3,h4{
    margin: 0
}
.patient-style{
    display: flex;
    flex-direction: column;
    gap: 5px;
}
.w138{
    width: 138%;
}
.w130{
    width: 130%;
}
.heading-style{
    padding: 4px 5px;
    font-family: 'Info-Bold';
}
.mt-15{
    margin-top: 15px
}
.mt-0{
  margin-top: 0
}
.mt-18{
  margin-top: 18px
}
.g-5{
    gap: 0.5px
}

.diagonoseContainer{
    margin-top: 10px;
    display: flex;
    justify-content: flex-start;
}
.sig1{
    display: flex;
    justify-content: space-between;
}
.w30{
    width: 30%;
}
.w90{
    width: 90%;
}
.w87{
    width: 87%;
}
.w96{
    width: 96%;
}
.w70{
        width: 70%;
    }
.w57{
    width: 57%
}
.w28{
    width: 28%
}
.l-height{
    line-height: 1.8
}
.w0{
    width: fit-content;
}
input[type="radio"]{
    appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 10px;
  height: 10px;
  background-color: white;
  border: 1px solid #000;
  border-radius: 0; 
  position: relative;
  cursor: pointer;
  
}
input[type="radio"]:checked{
    background-color: #0075ff;
    box-shadow: 1px 1px 2px lightgray;
}
input[type="radio"]:checked:before {
  content: "\2713";
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  font-size: 9px;
  font-weight: bold;
  color: white;
  background-color: #0075ff; 
}
.mb-6{
    margin-bottom: 6px
}
input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}



@media only screen and (max-width: 1200px){
    .table-1{
        overflow-x: auto;
        min-width: 700px;
    }
}



@media only screen and (max-width: 1000px){
    .sec-1{
        flex-direction: column;
        gap: 5px
    }
    .w138{
        width: 100%;
    }
    .w130{
        width: 100%;
    }
    .w100{
        width: 100%;
    }
    .mt-15{
        margin-top: 8px
    }
    .patient-style{
        gap: 12px;
    }
    .mt-0{
        margin-top: 8px
    }
    .mt-18{
        margin-top: 8px
    }
    .g-5{
    gap: 4.5px
    }
    .diagonoseContainer{
        flex-direction: column;
        gap: 6px;
    }
    .sig1{
        flex-direction: column;
        gap: 10px;
        margin-bottom: 8px;
    }
    .w30{
        width: 100%;
    }
    .w90{
        width: 100%;
    }
    .w87{
        width: 117%;
    }
    .w96{
        width: 117%;
    }
    .w70{
        width: 100%;
    }
    .w57{
        width: 70%;
    }
    .w28{
        width: 92%;
    }
    .l-height{
        line-height: 1
    }
    .card{
        padding: 70px 40px;
    }
    .table-1{
        overflow-x: auto;
        min-width: 700px;
    }
   

    
}

@media only screen and (max-width: 770px){
    .container-row{
        flex-direction: column;
        gap: 6px;
        align-items: center;
    }
    .w0{
        width: 100%
    }
}
@media only screen and (max-width: 515px){
    .text-md{
        font-size: 10px;
    }
}


    </style>
</head>

<body>
<div class="card">
    <form id="doh-form">
        @csrf
        
        <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="container-row">
            <p class="text-md w0" style="line-height: 1.2;">
                NEW YORK STATE DEPARTMENT OF HEALTH <br>
                Disability Review Unit
            </p>
            <h4 style="font-size:19px;margin-bottom: 4px;font-family: 'Info-Bold';">
                Medical Report for Determination of Disability
            </h4>
        </div>
        <hr class="custom-hr">
        <div style="width: 100%; background-color: #ccc;">
            <h2 class="text-md heading-style">
                Section I – Identification
            </h2>
        </div>
        


        <div class="sec-1">
            <div>
                <h3 class="text-sm" style="margin-bottom: 2px;font-family: 'Info-Bold';">Agency</h3>
                <div class="text-xsm" style="display: flex;flex-direction: column; gap: 2px;">
                    <p>State Disability Review Unit OCP-826</p>
                    <p>State of New York</p>
                    <p>Department of Health</p>
                    <p>Albany, NY 12237</p>
                    <p>Telephone Number: 1(866) 330-0591</p>
                </div>
            </div>
            <div>
                    <h3 class="text-sm" style="margin-bottom: 4px;font-family: 'Info-Bold';">Patient</h3>
                        <div class="patient-style">
                            <div>
                                <label class="label-block" for="">Name (Last, First, Middle)</label>
                                <input class="w138" type="text"  name="first_name" value="{{$referral->last_name}} {{$referral->first_name}}">
                            </div>
                            <div class="g-5" style="display: flex;flex-direction: column;">
                                <label class="label-block" for="">Address (Street, City, State & Zip Code):</label>
                                <input class="label-block w138" type="text"  name="address_text" value="{{$referral->address}}" maxlength="40">
                                <input class="label-block w138" type="text"  name="address_text2" value="{{$referral->city}} {{$referral->state}}" maxlength="40">
                                <input style="margin-top: 2px;" class="label-block w138" type="text"  name="address_text3" value="{{$referral->zip_code}}" maxlength="40">
                            </div>
                        </div>
            </div>
                    <div class="patient-style mt-15">
                        <div>
                            <label class="label-block" for="">Date of Birth</label>
                            <input class="w130" type="date"  name="dob" max="9999-12-31" value="{{$referral->date_of_birth}}">
                        </div>
                        <div style="">
                            <div class="mb-6">
                                <label class="label-block" for="">Sex</label>
                                <div style="display: flex;justify-content: flex-start;align-items: center;">
                                    <input type="radio" name="sex" id="male" {{$referral->gender == "Male"?'checked':''}} value="male">
                                    <label for="male">Male</label>
                                    <input type="radio" name="sex" id="female" {{$referral->gender == "Female" ? 'checked' : ''}} value="female">

                                    <label for="female">Female</label>
                                </div>
                            </div>
                            <div class="mt-0">
                                <label for="">Case Number</label>
                                <input style="margin-top: 2px;" class="w130" type="text" name="case_number">
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="patient-style mt-18" style="gap:6px">
                        <div>
                            <label for="">Client ID Number</label>
                            <input class="w100" type="text" name="client_id">
                        </div>
                            <div>
                                <label for="">Disability ID Number</label>
                                <input class="w100" type="text" name="disability_id">
                            </div>
                            <div>
                                <label for="">SSN (last four digits)</label>
                                <input class="w100" type="text" name="ssn_last_four">
                            </div>
                    </div>
                {{-- </div> --}}
                
               
            {{-- </div> --}}
        </div>





        




        <div style="width: 100%; background-color: #ccc">
            <h4 class="text-md heading-style" style="margin: 5px 0;">
                Section I – Medical Report – Note to Provider
            </h4>
        </div>
        <p class="text-sm">
            This individual has made an application (reapplication) for Disability Medicaid. Your cooperation in
            completing
            this form to show the individual’s current condition, focusing on both remaining
            capabilities and limitations, is requested. Your promptness will ensure an early decision on the
            individual’s
            application.
        </p>
        <h4 class="text-sm" style="margin-top: 3px;font-family: 'Info-Bold';">Please return the completed form to the agency in Section I above, along with a copy of all medical records
            for the past 12 months.</h4>
        <div class="diagonoseContainer">
            <div class="text-sm l-height" style="width: 85%;">
                <label class="text-sm" for="">Diagnosis(es)</label>
                {{-- <br> --}}
                {{-- <textarea  rows="3" name="diagnosis" cols="50"></textarea> --}}
                <input type="text" name="diagnosis" class="w87" maxlength="105">
                <div>
                    <input  class="w96" type="text" name="diagnosis2" maxlength="120">
                </div>
                <div>
                    <input  class="w96" type="text" name="diagnosis3" maxlength="120">
                </div>
                {{-- <input type="text" name="diagnosis"> --}}
            </div>
            <div style="line-height: 1.8;">
                <label class="text-sm" for="">Date of last Exam </label><input class="w70"  type="date" name="last_exam_date" max="9999-12-31"><br>
                <label class="text-sm" for="">Height</label>
                <input style="width: 20%" class="text-sm" type="number"  name="height_ft">
                <label class="text-sm" for="">ft.</label>

                <input class="w57" type="number"  name="height_in">
                <label for="">in.</label>
                <br>
                <label for="">Weight</label>
                <input class="w28" type="number" name="weight" >lbs.
            </div>
        </div>
        <div style="width: 100%; background-color: #ccc;">
            <h4 class="text-md heading-style" style="margin: 5px 0;">
                Exertional Functions. Please indicate what the individual is CAPABLE of doing:
            </h4>
        </div>
    <div class="table-responsive">
        <table class="table-1">
            <tr style="font-family: 'Info-Bold';">
                <th><h3 class="text-sm" style="margin-left:5px">Lifting</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Carrying</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Standing</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Walking</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Sitting</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Pushing</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Pulling</h3></th>
            </tr>
            <tr>
                <td style="width: 17%;">
                    <input type="radio" name="lifting" value="10lbs."> < 10 lbs. <br>
                    <input type="radio" name="lifting" value="Max. 10lbs.">Max. 10 lbs. <br>
                    <input type="radio" name="lifting" value="Max. 20lbs/freq. 10lbs.">Max. 20 lbs/freq. 10 lbs. <br>
                    <input type="radio" name="lifting" value="Max. 50lbs/freq. 25lbs.">Max. 50 lbs/freq. 25 lbs. <br>
                    <input type="radio" name="lifting" value=">50lbs."> > 50 lbs. <br>
                </td>
                <td style="width: 17%;">
                    <input type="radio" name="carrying" value="10lbs."> < 10 lbs. <br>
                    <input type="radio" name="carrying" value="Max. 10lbs.">Max. 10lbs. <br>
                    <input type="radio" name="carrying" value="Max. 20lbs/freq. 10lbs.">Max. 20 lbs/freq. 10 lbs. <br>
                    <input type="radio" name="carrying" value="Max. 50lbs/freq. 25lbs.">Max. 50 lbs/freq. 25 lbs. <br>
                    <input type="radio" name="carrying" value=">50lbs."> > 50 lbs. <br>
                </td>
                <td style="width: 14%;">
                    <input type="radio" name="standing" value="less_than_two"> < 2hrs./day <br>
                    <input type="radio" name="standing" value="2hrs./day"> 2hrs./day <br>
                    <input type="radio" name="standing" value="6hrs./day"> 6hrs./day <br>
                </td >
                <td style="width: 14%;">
                    <input type="radio" name="walking" value="less_than_two"> < 2hrs./day <br>
                    <input type="radio" name="walking" value="2hrs./day"> 2hrs./day <br>
                    <input type="radio" name="walking" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td style="width: 14%;">
                    <input type="radio" name="sitting" value="less_than_six"> < 6hrs./day <br>
                    <input type="radio" name="sitting" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td style="width: 14%;">
                    <input type="radio" name="pushing" value="Using R arm"> Using R arm <br>
                    <input type="radio" name="pushing" value="Using L arm"> Using L arm <br>
                    <input type="radio" name="pushing" value="Using R leg"> Using R leg <br>
                    <input type="radio" name="pushing" value="Using L leg"> Using L leg <br>
                </td>
                <td style="width: 8%;">
                    <input type="radio" name="pulling" value="Using R arm"> Using R arm <br>
                    <input type="radio" name="pulling" value="Using L arm"> Using L arm <br>
                </td>
            </tr>
        </table>
    </div>


        <div style="width: 100%; background-color: #ccc">
            <h4 class="text-md heading-style" style="margin: 5px 0;">
                Non-Exertional Functions. Please check if LIMITATIONS exist in any of the areas below:
            </h4>
        </div>
        <div class="table-responsive">
        <table class="table-1">
            <tr style="font-family: 'Info-Bold';">
                <th><h3 class="text-sm" style="margin-left:5px">Sensory</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Postural</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Manipulative</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Environmental</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Mental</h3></th>
            </tr>
            <tr>
                <td style="width: 13%;">
                    <input type="radio" name="sensory" value="No Limitations"> No Limitations. <br>
                    <input type="radio" name="sensory" value="Seeing"> Seeing <br>
                    <input type="radio" name="sensory" value="Hearing"> Hearing <br>
                    <input type="radio" name="sensory" value="Speaking"> Speaking <br>
                </td>
                <td style="width: 14%;">
                    <input type="radio" name="postural" value="No Limitations"> No Limitations. <br>
                    <input type="radio" name="postural" value="Stooping/Bending"> Stooping/Bending <br>
                    <input type="radio" name="postural" value="Crouching/Squatting"> Crouching/Squatting <br>
                    <input type="radio" name="postural" value="Climbing"> Climbing <br>
                </td>
                <td style="width: 14%;">
                    <input type="radio" name="manipulative" value="No Limitations"> No Limitations. <br>
                    <input type="radio" name="manipulative" value="R Upper Extremity"> R Upper Extremity <br>
                    <input type="radio" name="manipulative" value="L Upper Extremity"> L Upper Extremity <br>
                </td>
                <td style="width: 23%;">
                    <input type="radio" name="environmental" value="No Limitations">No Limitations <br>
                    <input type="radio" name="environmental"
                           value="Tolerating dust, fumes, extremes of temperature">
                    Tolerating dust, fumes, extremes of temperature <br>
                    <input type="radio" name="environmental" value="Tolerating exposure to heights or machinery">
                    Tolerating exposure to heights or machinery <br>
                    <input type="radio" name="environmental" value="Operating a motor vehicle"> Operating a motor
                    vehicle <br>
                </td>
                <td style="width: 31%;">
                    <input type="radio" name="mental" value="No Limitations"> No Limitations <br>
                    <input type="radio" name="mental" value="Understanding, carrying out, remembering instructions">
                    Understanding, carrying out, remembering instructions <br>
                    <input type="radio" name="mental" value="Making simple work-related decisions"> Making simple
                    work-related decisions <br>
                    <input type="radio" name="mental"
                           value="Responding appropriately to supervision, co-workers, work situations"> Responding
                    appropriately to supervision, co-workers,work situations <br>
                    <input type="radio" name="mental" value="Dealing with changes in a routine work setting">
                    Dealing with changes in a routine work setting <br>
                </td>
            </tr>
        </table>
    </div>

        <hr style="border: none;background: #ccc;height: 4px;">
        <div class="sig1">
            <div class="w30">
                <label>Provider Signature</label>
                <div id="signature-pad">
                    <input type="text" class="w90"  style="margin-bottom: 10px" name="doh_signature" id="doh_signature" oninput="generateSignature()" maxlength="18">
                    <canvas id="signature-doh" style="height: 60px;" class="w90"></canvas>
                    <div style="margin:5px 0">

                        <div class="container-row2" style="justify-content: start">

                            <button id="clear-doh" onclick="clearDohCanvas()">Clear</button>
                        </div>

                        <input type="hidden" id="doh_sign" name="doh_sign">
                    </div>
                </div>
            </div>
            <div class="w30">
            
                <label>Print Name</label><br>
                <input type="text" name="print_name" class="w90" >
            </div>
            
                <div class="w30">
                    <label>Date Signed</label><br>
                    <input type="date" name="date_signed" class="w90">
                </div>
        </div>
        <div class="sig1">
            <div class="w30">
                <label for="">Specialty</label>
                <br>
                <input type="text" name="speciallity" class="w90">

            </div>
            <div class="w30">
                <label for="">Office Address</label>
                <br>
                <input type="text" name="office_address" class="w90" maxlength="40">
            </div>
            <div class="w30">
                <label for="">Office Phone Number</label>
                <br>
                <input type="text" name="office_phone" class="w90" >
            </div>
        </div>
        <div style="margin-top:2px">
            <span>DOH-5143 (8/18)</span>
            <span class="text-sm" style="display: inline-block;text-align: center;width: 92%;text-decoration: underline;margin-top:1px">
                PLEASE RETURN THIS FORM <span style="font-family: 'info-semibold';">ALONG WITH A COPY OF ALL MEDICAL RECORDS FOR THE PAST 12 MONTHS.</span>
            </span>
        </div>

        <button type="submit" id="submit-button" class="submit-button" style="margin-top: 10px;">
            Submit
            <span class="loader" style="display: none;"></span>
        </button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
   generateSignature(1)
   generateSignature(2)
   generateSignature(3)
   generateSignature(4)
    $(document).ready(function () {
        const canvas = document.getElementById('signature-doh');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2',
            penColor: '#000000',
        });

        $('#clear-doh').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $('#doh_sign').val('');
        });

        // on canvas value change save
        signaturePad.onEnd = function () {
            $('#doh_sign').val(signaturePad.toDataURL());
        };
        $('#doh-form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage()
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.doh') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type


                success: function (response) {
                    swal.fire({
                        title: 'Success!',
                        text: '6-DOH-5143 has been saved successfully.',
                        icon: 'success',
                        confirmButtonText: 'Great!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @if (auth()->check())
                                window.location.href = "{{ route('dashboard') }}";
                            @else
                                window.location.href = "{{ route('bill_reports') }}";
                            @endif
                            // window.location.href = "{{ route('login') }}"; // Replace 'login' with your actual login route
                        }
                    })
                    ;
                    $('#submit-button').removeClass('btn-size');
                    $('.loader').hide();
                    $('#submit-button').prop('disabled', false);

                },
                error: function (response) {
                    alert('Error in saving file');
                    $('#submit-button').removeClass('btn-size');
                    $('.loader').hide();
                    $('#submit-button').prop('disabled', false);
                }
            });
        });


    });

    function generateSignature() {
    const name = document.getElementById('doh_signature').value;
    const canvas = document.getElementById('signature-doh');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#f2f2f2';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = '42px "BrittanySignature", BrittanySignature';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 19, 80);

}
function clearDohCanvas() {
    document.getElementById('doh_signature').value = '';
}
    function saveCanvasAsImage() {
        for (let i = 1; i <= 5; i++) {
            const canvas = document.getElementById("signature-doh");
            const signatureDataURL = canvas.toDataURL('image/png'); // Convert to Base64
            document.getElementById("doh_sign").value = signatureDataURL;
        }
    }

</script>
</body>

</html>

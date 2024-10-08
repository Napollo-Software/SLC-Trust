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
            background-color: #134b7e; /* Dark blue background */
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
            background-color: #16b6d3; /* Light blue on hover */
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
            width: 1000px;
            background: white;
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.1);
            transition: 0.3s;
            border-radius: 5px;
            margin: 10px;
            overflow: hidden;
            padding: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -20%);
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
    padding: 4px 5px
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
            <p class="text-md" style="line-height: 1.2;">
                NEW YORK STATE DEPARTMENT OF HEALTH <br>
                Disability Review Unit
            </p>
            <h4 style="font-size:19px;margin-bottom: 4px;">
                Medical Report for Determination of Disability
            </h4>
        </div>
        <hr class="custom-hr">
        <div style="width: 100%; background-color: #ccc;">
            <h2 class="text-md heading-style">
                Section I – Identification
            </h2>
        </div>
        {{-- <div class="container-row">
            <p>
                <b>Agency</b><br>
                State Disability Review Unit OCP-826 <br>
                State of New York <br>
                Department of Health <br>
                Albany, NY 12237 <br>
                Telephone Number: 1(866) 330-0591
            </p>
            <p style="padding: 12px">
                <b>Patient</b>
                <br>
                <label>Name (Last, First, Middle)</label>
                <br>
                <input type="text"  name="first_name"><br>
                <br>
                <label> Address (Street, City, State & Zip Code):</label>
                <br>
                <textarea rows="10"  name="address_text"></textarea>
            </p>
            <p style="padding: 12px">
                <label>Date of Birth</label> <br>
                <input type="date"  name="dob"><br>

                Sex <input type="checkbox" name="sex1" value="male">Male<input type="checkbox" name="sex2"
                                                                               value="female"> Female


                <br>
                Case Number
                <br>
                <input type="text" name="case_number">
            </p>
            <p>
                Client ID Number <br>
                <input type="text" name="client_id">
                <br>
                Disability ID Number <br>
                <input type="text" name="disability_id">
                <br>
                SSN(Lsat four digits) <br>
                <input type="text" name="ssn_last_four">
                <br>
            </p>
        </div> --}}



        {{-- New Section 1 Identification --}}


        <div class="sec-1">
            <div>
                <h3 class="text-sm" style="margin-bottom: 2px;">Agency</h3>
                <div class="text-xsm" style="display: flex;flex-direction: column; gap: 2px;">
                    <p>State Disability Review Unit OCP-826</p>
                    <p>State of New York</p>
                    <p>Department of Health</p>
                    <p>Albany, NY 12237</p>
                    <p>Telephone Number: 1(866) 330-0591</p>
                </div>
            </div>
            <div>
                    <h3 class="text-sm" style="margin-bottom: 4px;">Patient</h3>
                        <div class="patient-style">
                            <div>
                                <label class="label-block" for="">Name (Last, First, Middle)</label>
                                <input class="w138" type="text"  name="first_name">
                            </div>
                            <div style="display: flex;flex-direction: column;gap: 0.5px;">
                                <label class="label-block" for="">Address (Street, City, State & Zip Code):</label>
                                <input class="label-block w138" type="text"  name="address_text">
                                <input class="label-block w138" type="text"  name="address_text2">
                                <input style="margin-top: 2px;" class="label-block w138" type="text"  name="address_text3">
                            </div>
                        </div>
            </div>
                    <div class="patient-style" style="margin-top: 15px;">
                        <div>
                            <label class="label-block" for="">Date of Birth</label>
                            <input class="w130" type="date"  name="dob">
                        </div>
                        <div style="">
                            <div>
                                <label class="label-block" for="">Sex</label>
                                <div style="display: flex;justify-content: flex-start;align-items: center;">
                                    <input type="checkbox" name="sex1" value="male">
                                    <label for="">Male</label>
                                    <input type="checkbox" name="sex2" value="female">
                                    <label for="">Female</label> 
                                </div>
                            </div>
                            <div>
                                <label for="">Case Number</label>
                                <input style="margin-top: 2px;" class="w130" type="text" name="case_number">
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="patient-style" style="margin-top: 18px;gap:6px">
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
        <h4 class="text-sm" style="margin-top: 3px;">Please return the completed form to the agency in Section I above, along with a copy of all medical records
            for the past 12 months.</h4>
        <div style="margin-top: 10px;display: flex;justify-content: flex-start;">
            <div class="text-sm" style="width: 85%;line-height:1.8">
                <label class="text-sm" for="">Diagnosis(es)</label>
                {{-- <br> --}}
                {{-- <textarea  rows="3" name="diagnosis" cols="50"></textarea> --}}
                <input type="text" name="diagnosis" style="width: 87%;">
                <div>
                    <input style="width: 96%;" type="text" name="diagnosis2">
                </div>
                <div>
                    <input style="width: 96%;" type="text" name="diagnosis3">
                </div>
                {{-- <input type="text" name="diagnosis"> --}}
            </div>
            <div style="line-height: 1.8;">
                <label class="text-sm" for="">Date of last Exam </label><input style="width: 70%;"  type="date" name="last_exam_date"><br>
                <label class="text-sm" for="">Height</label>
                <input style="width: 20%" class="text-sm" type="number"  name="height_ft">
                <label class="text-sm" for="">ft.</label>

                <input style="width: 57%" type="number"  name="height_in">
                <label for="">in.</label>
                <br>
                <label for="">Weight</label>
                <input style="width: 28%;" type="number" name="weight" >lbs.
            </div>
        </div>
        <div style="width: 100%; background-color: #ccc;">
            <h4 class="text-md heading-style" style="margin: 5px 0;">
                Exertional Functions. Please indicate what the individual is CAPABLE of doing:
            </h4>
        </div>
        <table>
            <tr>
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
                    <input type="checkbox" name="lifting1" value="10lbs.">> 10 lbs. <br>
                    <input type="checkbox" name="lifting2" value="Max. 10lbs.">Max. 10 lbs. <br>
                    <input type="checkbox" name="lifting3" value="Max. 20lbs/freq. 10lbs.">Max. 20 lbs/freq. 10 lbs. <br>
                    <input type="checkbox" name="lifting4" value="Max. 50lbs/freq. 25lbs.">Max. 50 lbs/freq. 25 lbs. <br>
                    <input type="checkbox" name="lifting5" value=">50lbs."> > 50 lbs. <br>
                </td>
                <td style="width: 17%;">
                    <input type="checkbox" name="carrying1" value="10lbs.">> 10 lbs. <br>
                    <input type="checkbox" name="carrying2" value="Max. 10lbs.">Max. 10lbs. <br>
                    <input type="checkbox" name="carrying3" value="Max. 20lbs/freq. 10lbs.">Max. 20 lbs/freq. 10 lbs. <br>
                    <input type="checkbox" name="carrying4" value="Max. 50lbs/freq. 25lbs.">Max. 50 lbs/freq. 25 lbs. <br>
                    <input type="checkbox" name="carrying5" value=">50lbs."> > 50 lbs. <br>
                </td>
                <td style="width: 14%;">
                    <input type="checkbox" name="standing1" value="less_than_two"> < 2hrs./day <br>
                    <input type="checkbox" name="standing2" value="2hrs./day"> 2hrs./day <br>
                    <input type="checkbox" name="standing3" value="6hrs./day"> 6hrs./day <br>
                </td >
                <td style="width: 14%;">
                    <input type="checkbox" name="walking1" value="less_than_two"> < 2hrs./day <br>
                    <input type="checkbox" name="walking2" value="2hrs./day"> 2hrs./day <br>
                    <input type="checkbox" name="walking3" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td style="width: 14%;">
                    <input type="checkbox" name="sitting1" value="less_than_six"> < 6hrs./day <br>
                    <input type="checkbox" name="sitting2" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td style="width: 14%;">
                    <input type="checkbox" name="pushing1" value="Using R arm"> Using R arm <br>
                    <input type="checkbox" name="pushing2" value="Using L arm"> Using L arm <br>
                    <input type="checkbox" name="pushing3" value="Using R leg"> Using R leg <br>
                    <input type="checkbox" name="pushing4" value="Using L leg"> Using L leg <br>
                </td>
                <td style="width: 8%;">
                    <input type="checkbox" name="pulling1" value="Using R arm"> Using R arm <br>
                    <input type="checkbox" name="pulling2" value="Using L arm"> Using L arm <br>
                </td>
            </tr>
        </table>


        <div style="width: 100%; background-color: #ccc">
            <h4 class="text-md heading-style" style="margin: 5px 0;">
                Non-Exertional Functions. Please check if LIMITATIONS exist in any of the areas below:
            </h4>
        </div>
        <table>
            <tr>
                <th><h3 class="text-sm" style="margin-left:5px">Sensory</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Postural</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Manipulative</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Environmental</h3></th>
                <th><h3 class="text-sm" style="margin-left:5px">Mental</h3></th>
            </tr>
            <tr>
                <td style="width: 13%;">
                    <input type="checkbox" name="sensory1" value="No Limitations"> No Limitations. <br>
                    <input type="checkbox" name="sensory2" value="Seeing"> Seeing <br>
                    <input type="checkbox" name="sensory3" value="Hearing"> Hearing <br>
                    <input type="checkbox" name="sensory4" value="Speaking"> Speaking <br>
                </td>
                <td style="width: 14%;">
                    <input type="checkbox" name="postural1" value="No Limitations"> No Limitations. <br>
                    <input type="checkbox" name="postural2" value="Stooping/Bending"> Stooping/Bending <br>
                    <input type="checkbox" name="postural3" value="Crouching/Squatting"> Crouching/Squatting <br>
                    <input type="checkbox" name="postural4" value="Climbing"> Climbing <br>
                </td>
                <td style="width: 14%;">
                    <input type="checkbox" name="manipulative1" value="No Limitations"> No Limitations. <br>
                    <input type="checkbox" name="manipulative2" value="R Upper Extremity"> R Upper Extremity <br>
                    <input type="checkbox" name="manipulative3" value="L Upper Extremity"> L Upper Extremity <br>
                </td>
                <td style="width: 23%;">
                    <input type="checkbox" name="environmental1" value="No Limitations">No Limitations <br>
                    <input type="checkbox" name="environmental2"
                           value="Tolerating dust, fumes, extremes of temperature">
                    Tolerating dust, fumes, extremes of temperature <br>
                    <input type="checkbox" name="environmental3" value="Tolerating exposure to heights or machinery">
                    Tolerating exposure to heights or machinery <br>
                    <input type="checkbox" name="environmental4" value="Operating a motor vehicle"> Operating a motor
                    vehicle <br>
                </td>
                <td style="width: 31%;">
                    <input type="checkbox" name="mental1" value="No Limitations"> No Limitations <br>
                    <input type="checkbox" name="mental2" value="Understanding, carrying out, remembering instructions">
                    Understanding, carrying out, remembering instructions <br>
                    <input type="checkbox" name="mental3" value="Making simple work-related decisions"> Making simple
                    work-related decisions <br>
                    <input type="checkbox" name="mental4"
                           value="Responding appropriately to supervision, co-workers, work situations"> Responding
                    appropriately to supervision, co-workers,work situations <br>
                    <input type="checkbox" name="mental5" value="Dealing with changes in a routine work setting">
                    Dealing
                    with changes in a routine work setting <br>
                </td>
            </tr>
        </table>

        <hr style="border: none;background: #ccc;height: 4px;">
        <div style="display: flex;justify-content: space-between;">
            <div style="width:30%">
                <label>Provider Signature</label>
                <div id="signature-pad">
                    <input type="text"  style="width: 90%;margin-bottom: 10px" name="doh_signature" id="doh_signature" oninput="generateSignature()" maxlength="18">
                    <canvas id="signature-doh" style="height: 60px;width: 90%;"></canvas>
                    <div style="margin:5px 0">

                        <div class="container-row" style="justify-content: start">

                            <button id="clear-doh" onclick="clearDohCanvas()">Clear</button>
                        </div>

                        <input type="hidden" id="doh_sign" name="doh_sign">
                    </div>
                </div>
            </div>
            <div style="width:30%">
            
                <label>Print Name</label><br>
                <input type="text" name="print_name" style="width: 90%;" >
            </div>
            
                <div style="width:30%">
                    <label>Date Signed</label><br>
                    <input type="date" name="date_signed" style="width: 90%;">
                </div>
        </div>
        <div style="display: flex;justify-content: space-between;">
            <div style="width:30%">
                <label for="">Speciality</label>
                <br>
                <input type="text" name="speciallity" style="width:90%">

            </div>
            <div style="width:30%">
                <label for="">Office Address</label>
                <br>
                <input type="text" name="office_address" style="width:90%">
            </div>
            <div style="width:30%">
                <label for="">Office Phone</label>
                <br>
                <input type="text" name="office_phone" style="width:90%" >
            </div>
        </div>
        <div style="margin-top:2px">
            <span>DOH-5143 (8/18)</span>
            <span class="text-sm" style="display: inline-block;text-align: center;width: 92%;">
                PLEASE RETURN THIS FORM <span style="font-family: 'info-semibold';text-decoration: underline">ALONG WITH A COPY OF ALL MEDICAL RECORDS FOR THE PAST 12 MONTHS.</span>
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

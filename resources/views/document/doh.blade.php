<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>Document</title>
    <style>
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
        }

        .submit-button:hover {
            background-color: #16b6d3; /* Light blue on hover */
        }

        .submit-button:focus {
            outline: none; /* Removing the outline on focus for cleaner look */
            box-shadow: 0 0 0 2px rgba(19, 75, 126, 0.25); /* Adding a subtle focus shadow with the dark blue color */
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
            font-size: 16px;
        }

        .no-border {
            background-color: #b8b6b6 !important;
            border: none;

        }

        .container-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-hr {
            height: 10px;
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
            width: 794px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            margin: 10px;
            overflow: hidden;
            padding: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -20%);
        }


        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
        }


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
    </style>
</head>

<body>
<div class="card">
    <form id="doh-form">
        @csrf
        <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="container-row">
            <p>
                NEW YORK STATE DEPARTMENT OF HEALTH <br>
                Disability Review Unit
            </p>
            <h4>
                Medical Report for Determination of Disability
            </h4>
        </div>
        <hr class="custom-hr">
        <div style="width: 100%; background-color: rgb(184, 182, 182);">
            <h4>
                Section I – Identification
            </h4>
        </div>
        <div class="container-row">
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
                <input type="text" class="no-border" name="first_name"><br>
                <br>
                <label> Address (Street, City, State & Zip Code):</label>
                <br>
                <textarea rows="10" class="no-border" name="address_text"></textarea>
            </p>
            <p style="padding: 12px">
                <label>Date of Birth</label> <br>
                <input type="date" class="no-border" name="dob"><br>

                Sex <input type="checkbox" name="sex1" value="male">Male<input type="checkbox" name="sex2"
                                                                               value="female"> Female


                <br>
                Case Number
                <br>
                <input type="text" name="case_number" class="no-border">
            </p>
            <p>
                Client ID Number <br>
                <input type="text" name="client_id" class="no-border">
                <br>
                Disability ID Number <br>
                <input type="text" name="disability_id" class="no-border">
                <br>
                SSN(Lsat four digits) <br>
                <input type="text" name="ssn_last_four" class="no-border">
                <br>
            </p>
        </div>
        <div style="width: 100%; background-color: rgb(184, 182, 182);">
            <h4>
                Section I – Medical Report – Note to Provider
            </h4>
        </div>
        <p>
            This individual has made an application (reapplication) for Disability Medicaid. Your cooperation in
            completing
            this form to show the individual’s current condition, focusing on both remaining
            capabilities and limitations, is requested. Your promptness will ensure an early decision on the
            individual’s
            application.
        </p>
        <b>Please return the completed form to the agency in Section I above, along with a copy of all medical records
            for
            the past 12 months.
        </b>
        <div class="container-row">
            <p>
                Diagnosis(es)
                <br>
                <textarea class="no-border" rows="3" name="diagnosis" cols="50"></textarea>
            </p>
            <p style="padding: 10px">
                Date of last Exam <input type="date" class="no-border" name="last_exam_date"><br>
                Height
                <input type="number" class="no-border" name="height_ft"> ft.

                <input type="number" class="no-border" name="height_in" style="margin-left: 50px"> In.
                <br>
                Weight <input type="number" name="weight" class="no-border">lbs.
            </p>
        </div>
        <div style="width: 100%; background-color: rgb(184, 182, 182);">
            <h4>
                Exertional Functions. Please indicate what the individual is CAPABLE of doing:
            </h4>
        </div>
        <table>
            <tr>
                <th><b>Lifting</b></th>
                <th><b>Carrying</b></th>
                <th><b>Standing</b></th>
                <th><b>Walking</b></th>
                <th><b>Sitting</b></th>
                <th><b>Pushing</b></th>
                <th><b>Pulling</b></th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="lifting1" value="10lbs.">10lbs. <br>
                    <input type="checkbox" name="lifting2" value="Max. 10lbs.">Max. 10lbs. <br>
                    <input type="checkbox" name="lifting3" value="Max. 20lbs/freq. 10lbs.">Max. 20lbs/freq. 10lbs. <br>
                    <input type="checkbox" name="lifting4" value="Max. 50lbs/freq. 25lbs.">Max. 50lbs/freq. 25lbs. <br>
                    <input type="checkbox" name="lifting5" value=">50lbs."> >50lbs. <br>
                </td>
                <td>
                    <input type="checkbox" name="carrying1" value="10lbs.">10lbs. <br>
                    <input type="checkbox" name="carrying2" value="Max. 10lbs.">Max. 10lbs. <br>
                    <input type="checkbox" name="carrying3" value="Max. 20lbs/freq. 10lbs.">Max. 20lbs/freq. 10lbs. <br>
                    <input type="checkbox" name="carrying4" value="Max. 50lbs/freq. 25lbs.">Max. 50lbs/freq. 25lbs. <br>
                    <input type="checkbox" name="carrying5" value=">50lbs."> >50lbs. <br>
                </td>
                <td>
                    <input type="checkbox" name="standing1" value="less_than_two"> <2hrs./day <br>
                    <input type="checkbox" name="standing2" value="2hrs./day"> 2hrs./day <br>
                    <input type="checkbox" name="standing3" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td>
                    <input type="checkbox" name="walking1" value="less_than_two"> <2hrs./day <br>
                    <input type="checkbox" name="walking2" value="2hrs./day"> 2hrs./day <br>
                    <input type="checkbox" name="walking3" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td>
                    <input type="checkbox" name="sitting1" value="less_than_six"> <6hrs./day <br>
                    <input type="checkbox" name="sitting2" value="6hrs./day"> 6hrs./day <br>
                </td>
                <td>
                    <input type="checkbox" name="pushing1" value="Using R arm"> Using R arm <br>
                    <input type="checkbox" name="pushing2" value="Using L arm"> Using L arm <br>
                    <input type="checkbox" name="pushing3" value="Using R leg"> Using R leg <br>
                    <input type="checkbox" name="pushing4" value="Using L leg"> Using L leg <br>
                </td>
                <td>
                    <input type="checkbox" name="pulling1" value="Using R arm"> Using R arm <br>
                    <input type="checkbox" name="pulling2" value="Using L arm"> Using L arm <br>
                </td>
            </tr>
        </table>


        <div style="width: 100%; background-color: rgb(184, 182, 182);">
            <h4>
                Non-Exertional Functions. Please check if LIMITATIONS exist in any of the areas below:
            </h4>
        </div>
        <table>
            <tr>
                <th><b>Sensory</b></th>
                <th><b>Postural</b></th>
                <th><b>Manipulative</b></th>
                <th><b>Environmental</b></th>
                <th><b>Mental</b></th>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" name="sensory1" value="No Limitations"> No Limitations. <br>
                    <input type="checkbox" name="sensory2" value="Seeing"> Seeing <br>
                    <input type="checkbox" name="sensory3" value="Hearing"> Hearing <br>
                    <input type="checkbox" name="sensory4" value="Speaking"> Speaking <br>
                </td>
                <td>
                    <input type="checkbox" name="postural1" value="No Limitations"> No Limitations. <br>
                    <input type="checkbox" name="postural2" value="Stooping/Bending"> Stooping/Bending <br>
                    <input type="checkbox" name="postural3" value="Crouching/Squatting"> Crouching/Squatting <br>
                    <input type="checkbox" name="postural4" value="Climbing"> Climbing <br>
                </td>
                <td>
                    <input type="checkbox" name="manipulative1" value="No Limitations"> No Limitations. <br>
                    <input type="checkbox" name="manipulative2" value="R Upper Extremity"> R Upper Extremity <br>
                    <input type="checkbox" name="manipulative3" value="L Upper Extremity"> L Upper Extremity <br>
                </td>
                <td>
                    <input type="checkbox" name="environmental1" value="No Limitations">No Limitations <br>
                    <input type="checkbox" name="environmental2"
                           value="Tolerating dust, fumes, extremes of temperature">
                    Tolerating dust, fumes, extremes of temperature <br>
                    <input type="checkbox" name="environmental3" value="Tolerating exposure to heights or machinery">
                    Tolerating exposure to heights or machinery <br>
                    <input type="checkbox" name="environmental4" value="Operating a motor vehicle"> Operating a motor
                    vehicle <br>
                </td>
                <td>
                    <input type="checkbox" name="mental1" value="No Limitations"> No Limitations <br>
                    <input type="checkbox" name="mental2" value="Understanding, carrying out, remembering instructions">
                    Understanding, carrying out, remembering instructions <br>
                    <input type="checkbox" name="mental3" value="Making simple work-related decisions"> Making simple
                    work-related decisions <br>
                    <input type="checkbox" name="mental4"
                           value="Responding appropriately to supervision, co-workers, work situations"> Responding
                    appropriately to supervision, co-workers, work situations <br>
                    <input type="checkbox" name="mental5" value="Dealing with changes in a routine work setting">
                    Dealing
                    with changes in a routine work setting <br>
                </td>
            </tr>
        </table>

        <hr>
        <div class="container-row">
            <p style="font-weight: bold">
                Provider Signature
            </p>
            <div id="signature-pad">
                <input type="text" class="no-border" style="width: 72%;margin-bottom: 10px" name="doh_signature" id="doh_signature" oninput="generateSignature()" maxlength="18">
                <canvas id="signature-doh"></canvas>
                <div>

                    <div class="container-row" style="justify-content: start">

                        <button id="clear-doh" style="margin-left: 10px;" onclick="clearDohCanvas()">Clear</button>
                    </div>

                    <input type="hidden" id="doh_sign" name="doh_sign">
                </div>
            </div>

            <p>
                Print Name
                <br>
                <input type="text" name="print_name" class="no-border">
            </p>
            <p>
                Date Signed
                <br>
                <input type="date" name="date_signed" class="no-border">
            </p>
        </div>
        <div class="container-row">
            <p>
                Speciality
                <br>
                <input type="text" name="speciallity" class="no-border">

            </p>
            <p>
                Office Address
                <br>
                <input type="text" name="office_address" class="no-border">
            </p>
            <p>
                Office Phone
                <br>
                <input type="text" name="office_phone" class="no-border">
            </p>
        </div>
        <div class="container-row" style="justify-content: space-between">
            <p STYLE="padding-right: 30px">DOH-5143 (8/18)</p>
            <p style="font-size: 14px;font-weight: bold">
                PLEASE RETURN THIS FORM ALONG WITH A COPY OF ALL MEDICAL RECORDS FOR THE PAST 12 MONTHS.
            </p>
        </div>

        <button type="submit" class="submit-button"> Submit</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
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
                    });

                },
                error: function (response) {
                    alert('Error in saving file');
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
    ctx.font = '40px "Rage Italic", cursive';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 19, 80);
   
}
function clearDohCanvas() {
    document.getElementById('doh_signature').value = '';
}

</script>
</body>

</html>

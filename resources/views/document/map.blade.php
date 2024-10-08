<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>Map</title>
    <style>
        @font-face {
        font-family: BrittanySignature;
        src: url("/fonts/BrittanySignature-MaZx.ttf");
    }
    @font-face {
            font-family: 'APEFNO-Arial-BoldMT';
            src: url('fonts/APEFNO-Arial-BoldMT.ttf') format('truetype');
        }
        @font-face {
            font-family: 'HEEJYJ-Arial_2';
            src: url('fonts/HEEJYJ-Arial_2.ttf') format('truetype');
        }
        @font-face {
            font-family: 'HEEJYJ-Arial';
            src: url('fonts/HEEJYJ-Arial.ttf') format('truetype');
        }
        @font-face {
            font-family: 'KEESCU-ArialMT';
            src: url('fonts/KEESCU-ArialMT.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ARIALBI';
            src: url('fonts/ARIALBI.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ArialCEMTBlack';
            src: url('fonts/ArialCEMTBlack.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ArialMdm';
            src: url('fonts/ArialMdm.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ARIAL';
            src: url('fonts/ARIAL.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ARIALBD';
            src: url('fonts/ARIALBD.ttf') format('truetype');
        }

        
        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid black;
            font-size: 15px;
            font-family:'ArialMdm';
            font-weight: normal !important;
        }

        th{
            background-color: #DDDDDD;
            font-weight: normal;
            font-size: 17px !important;
            padding-top:18px !important;
            height: 25px !important;
        }

        td{
            text-align: left !important;
            font-weight: normal !important;
            font-family:'ArialMdm';
            vertical-align: top;
            padding: 10px !important;
        }

        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }

        .submit-button {
            background-color: #559E99; /* Dark blue background */
            color: white; /* White text */
            padding: 9px 20px; /* Reduced padding */
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
            background-color: #559E99; /* Light blue on hover */
        }

        .submit-button:focus {
            outline: none; /* Removing the outline on focus for cleaner look */
            box-shadow: 0 0 0 2px rgba(19, 75, 126, 0.25); /* Adding a subtle focus shadow with the dark blue color */
        }

        tr:first-child th {
            font-size: 12px; /* Adjust the font size as needed */
        }

        .content {
            display: flex;
            flex-direction: column;
        }

        .row-container {
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: space-between;
            margin-bottom: 60px;
            margin-top: -15px;
        }

        body {
            margin-left: 50px;
            margin-right: 50px;
        }

        .styled-hr {
            border: none;
            border-top: 05px solid #000;
            /* Adjust the color as needed */
        }

        .no-border {
            background-color: rgb(204, 204, 204);
            border: none;
        }

        .card {
            background:white;
            width: 1000px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 70px 110px;

        }



        .card-body {
            padding: 5px 0px;
        }
        @font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-style: italic;
}
#signature-canvas-map {
    pointer-events: none;
}
input{
    /* background: #e9e9e9; */
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    height: 30px;
    outline: none;
    width: calc(100% - 10px);
    margin: 0;
    padding: 0;
    padding-left: 10px !important;
}

textarea{
    width: calc(100% - 10px);
    outline: none;
    padding: 7px;
    border: 1px solid #b2b2b2; 
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




    /* ................ */
    body{
        background:rgba(0, 0, 0, 0.06);
        font-family:'ARIAL';
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        font-size: 18px !important;
    }

    .bold{
        font-family:'ARIALBD';
    }

    .medium{
        font-family:'ArialMdm';
    }

    .xs{
        font-size: 13px;
    }

    .xxs{
        font-size: 9px;
    }

    .sm{
        font-size: 16px;
    }

    .md{
        font-size: 18px;
    }

    .lg{
        font-size: 16px;
    }
    .xl{
        font-size: 17px;
    }

    input[type='date']{
        cursor: pointer;
    }

    .main-heading{
        margin-left:60px
    }

    .para-main{
        padding-left: 140px
    }
    .para-container{
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap:20px;
        justify-content: flex-start;
        margin-top:-10px
    }

    .header-img{
        max-width: 50%;
        height: 95px;
        margin-right: -5px;
        margin-top: 10px;
    }

    @media only screen and (max-width: 520px){
        body{
        background:white ;
        font-family:'ARIAL';
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        font-size: 18px !important;
        padding: 0px 0px;
        margin-left: 0px;
        width: 100vw;
        margin-right: 0px;
        
        font-size: 13px !important;
    }  

    .card {
            background:white;
            width: 1000px;
            padding: 10px !important; 
            overflow-x: scroll;
        }

    .para-main{
        padding-left: 10px;
        width: 100%;
    }

    table {
            border-collapse: collapse;
            border: 2px solid black;
            font-size: 12px;
            font-family:'ArialMdm';
            font-weight: normal !important;
        }

        th{
            background-color: #DDDDDD;
            font-weight: normal;
            font-size: 12px !important;
            padding-top:18px !important;
            height: 25px !important;
        }

        .main-heading{
            font-size: 11px;
            margin-left:0px
        }

        .header-img{
            max-width: 40%; 
            height: 45px; 
            margin-right: -2px;  
        }

        .row-container{
            margin-bottom: 25px;
        }
  
        
    }
    </style>
</head>
<body>
<div class="card">
    <form id="map-form">
        @csrf
        <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="row-container">
            <p class="bold main-heading">
                AUTHORIZATION TO RELEASE MEDICAL INFORMATION
            </p>
            <img src="/images/nyc2.png" alt="NYC" class="header-img" style="">


        </div>
        <table >
            <tr>
                <th colspan="2">INFORMATION ABOUT MEDICAL OR OTHER SOURCE - PLEASE PRINT, TYPE, OR WRITE CLEARLY
                </th>
            </tr>
            <tr>
                <td>
                    <label>NAME AND ADDRESS OF SOURCE (include Zip Code)</label><br>
                    <input type="text" name="name_address" style="margin-top: 5px" value="{{$referral->first_name}} {{$referral->last_name}}">
                </td>
                <td>
                    <label>RELATIONSHIP TO DISABLED PERSON </label><br>
                    <input type="text" name="relationship_disabled" style="margin-top: 5px">
                </td>
            </tr>
        </table>
        <table style="margin-top:-2px">
            <tr>
                <th colspan="3">
                    INFORMATION ABOUT DISABLED PERSON - PLEASE PRINT, TYPE, OR WRITE CLEARLY
                </th>
            </tr>
            <tr>
                <td style="width:50%">
                    <label for="Patient Name">NAME AND ADDRESS (if known) AT THE TIME DISABLED PERSON HAD CONTACT WITH SOURCE (Include Zip Code) </label><br>
                    <textarea name="source_contact_name_address" style="margin-top: 5px" rows="4" id=""></textarea>
                </td>
                <td style="width:23%"> 
                    <label for="Patient Name">DATE OF BIRTH</label><br><br>
                    <input type="date" name="dob" style="margin-top: 5px" value="{{$referral->date_of_birth}}">
                </td>
                <td style="width:28%">
                    <label for="Patient Name">DISABLED PERSON'S I.D.
                        NUMBER (If known and if
                        different than SSN.) </label><br>
                    <input type="text" name="disabled_id" style="margin-top: 5px">
                </td>

            </tr>
            <tr>
                <td colspan="3">
                    <label for="Patient Name">
                        APPROXIMATE DATES OF DISABLED PERSON'S CONTACT WITH SOURCE (e.g., dates of hospital admission,
                        treatment, discharges,
                        etc.)
                    </label><br>
                    <input type="text" name="disabled_contact_time" style="margin-top:5px">
                </td>
            </tr>

        </table>
        <p>I hereby authorize the above named source to release or disclose to the Medical Assistance Program for
            re-disclosure in connection with my application for public health insurance.</p>
        <div style="" class="para-main">
            <div class="para-container">
                <p class="para-left">1)</p>
                <p class="para-right"> All medical records or other information regarding my treatment, hospitalization, and/or outpatient
                    care
                    of my impairment(s), including psychological or psychiatric impairment(s) drug abuse, alcoholism, sickle
                    cell anemia, acquired immunodeficiency syndrome (AIDS), or test for infection with human
                    immunodeficiency
                    virus (HIV).</p>
            </div>
            <div class="para-container">
                <p>2)</p>
                <p>Information about how my impairment(s) affects my ability to complete tasks and activities of daily
                    living.</p>
            </div>
            <div class="para-container">
                <p>3)</p>
                <p>Information about how my impairment(s) affected my ability to do work.</p>
            </div>
        </div>
        <p style="margin-bottom: 60px;">I understand that this authorization, except for action already taken, may be voided by me at any time. If I
            do
            not void this authorization, it will automatically end at the conclusion of any proceedings, administrative
            or
            judicial, in connection with my Medicaid application, including any appeals. If I am already receiving
            benefits,
            the authorization will end when a final decision is made as to whether I can continue to receive
            benefits.</p>
        <table >
            <tr>
                <td style="width: 40%;">
                    <label>
                        SIGNATURE OF DISABLED PERSON OR PERSON AUTHORIZED TO
                        ACT IN HIS/HER BEHALF
                    </label><br>
                    <div class="card-body" style="justify-content: space-around">

                        <div id="signature-pad">
                            <input type="text"  style="margin-bottom: 10px" name="map_signature" id="map_signature" oninput="generateSignature()" maxlength="18">
                            <canvas style="width:100%" id="signature-canvas-map"></canvas>
                            <div>
                                <div class="container-row" style="justify-content: start;margin-top:3px" >
                                    <button id="clear-map" onclick="clearMapCanvas()">Clear</button>
                                </div>

                                <input type="hidden" id="map_sign" name="map_sign">
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 40%;">
                    <label>
                        RELATION TO DISABLED PERSON<br/>
                        (If other than self)
                    </label><br>
                    <input type="text" name="disabled_relation_other" style="margin-top: 5px">
                </td>
                <!-- <td style="width: 20%;">
                    <label>DISABLED PERSON'S I.D.
                        NUMBER (If known and if
                        different than SSN.) </label><br>
                    <input type="text" name="disabled_id_other" style="margin-top: 5px">
                </td> -->
                <td style="width: 20%;">

                    <label>Date</label><br><br>
                    <input type="date" name="date_map" style="margin-top: 5px">

                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <label>
                        STREET ADDRESS
                    </label><br>
                    <input type="text" name="disabled_relation_street" style="margin-top: 5px;" value="{{$referral->address}}">
                </td>
                <td colspan="2">
                    <label>
                        TELEPHONE NUMBER (include area code))
                    </label><br>
                    <input type="text" name="disabled_relation_street" style="margin-top: 5px" style="">
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <label>
                        City
                    </label><br>
                    <input type="text" name="disabled_relation_city" value="{{$referral->city}}"  style="margin-top:5px">
                </td>
                <td>
                    <label>
                        STATE
                    </label><br>
                    <input type="text" name="disabled_relation_state" value="{{$referral->state}}"  style="margin-top:5px">
                </td>
                <td>
                    <label>
                        ZIP CODE
                    </label><br>
                    <input type="text" name="disabled_relation_zip" value="{{$referral->zip_code}}" style="margin-top:5px">
                </td>
            </tr>

        </table>
        <br>

        <button type="submit" id="submit-button" class="submit-button">
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
        const canvas = document.getElementById('signature-canvas-map');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2',
            penColor: '#000000',
        });

        $('#clear-map').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $('#map_sign').val('');
        });

        // on canvas value change save
        signaturePad.onEnd = function () {
            $('#map_sign').val(signaturePad.toDataURL());
        };
        $('#map-form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage()
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.map') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type

                success: function (response) {
                    swal.fire({
                        title: 'Success!',
                        text: '3-MAP-751e - Authorization to Release Medical Information has been saved successfully.',
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
    const name = document.getElementById('map_signature').value;
    const canvas = document.getElementById('signature-canvas-map');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#f2f2f2';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = '42px "BrittanySignature", BrittanySignature';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 15, 80);

}
function clearMapCanvas() {
    document.getElementById('map_signature').value = '';
}
    function saveCanvasAsImage() {
        for (let i = 1; i <= 5; i++) {
            const canvas = document.getElementById("signature-canvas-map");
            const signatureDataURL = canvas.toDataURL('image/png'); // Convert to Base64
            document.getElementById("map_sign").value = signatureDataURL;
        }
    }
</script>
</body>
</html>

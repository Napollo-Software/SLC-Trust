<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>Map</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            font-size: 10px;
            text-align: center;
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

        tr:first-child th {
            font-size: 12px; /* Adjust the font size as needed */
        }

        .content {
            display: flex;
            flex-direction: column;
        }

        .row-container {
            display: flex;
            gap: 20%;
            align-items: center;
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
            width: 875px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            border-radius: 5px;
            margin: 10px;
            overflow: hidden;
            padding: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -35%);
        }


        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
        }


        .card-body {
            padding: 2px 16px;
        }
        @font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-weight: normal;
    font-style: italic;
}
#signature-canvas-map {
    pointer-events: none;
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
            <h4>
                AUTHORIZATION TO RELEASE MEDICAL INFORMATION
            </h4>
            <img src="/images/nyc.png" alt="NYC" style="max-width: 50%; height: 50px;">


        </div>
        <table>
            <tr>
                <th colspan="2">INFORMATION ABOUT MEDICAL OR OTHER SOURCE - PLEASE PRINT, TYPE, OR WRITE CLEARLY
                </th>
            </tr>
            <tr>
                <td>
                    <label>Name and address of source(with zip code) </label><br>
                    <input type="text" name="name_address" class="no-border">
                </td>
                <td>
                    <label>RELATIONSHIP TO DISABLED PERSON </label><br>
                    <input type="text" name="relationship_disabled" class="no-border">
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <th colspan="3">
                    INFORMATION ABOUT DISABLED PERSON - PLEASE PRINT, TYPE, OR WRITE CLEARLY
                </th>
            </tr>
            <tr>
                <td>
                    <label for="Patient Name">NAME AND ADDRESS (if known) AT THE TIME DISABLED PERSON
                        HAD CONTACT WITH SOURCE (Include Zip Code) </label><br>
                    <input type="text" name="source_contact_name_address" class="no-border">
                </td>
                <td>
                    <label for="Patient Name">Date Of Birth </label><br>
                    <input type="date" name="dob" class="no-border">
                </td>
                <td>
                    <label for="Patient Name">DISABLED PERSON'S I.D.
                        NUMBER (If known and if
                        different than SSN.) </label><br>
                    <input type="text" name="disabled_id" class="no-border">
                </td>

            </tr>
            <tr>
                <td colspan="3">
                    <label for="Patient Name">
                        APPROXIMATE DATES OF DISABLED PERSON'S CONTACT WITH SOURCE (e.g., dates of hospital admission,
                        treatment, discharges,
                        etc.)
                    </label><br>
                    <input type="text" name="disabled_contact_time" class="no-border" style="width:100%">
                </td>
            </tr>

        </table>
        <p>I hereby authorize the above named source to release or disclose to the Medical Assistance Program for
            re-disclosure in connection with my application for public health insurance.</p>
        <div style="padding-left: 20px">
            <p>1) All medical records or other information regarding my treatment, hospitalization, and/or outpatient
                care
                of my impairment(s), including psychological or psychiatric impairment(s) drug abuse, alcoholism, sickle
                cell anemia, acquired immunodeficiency syndrome (AIDS), or test for infection with human
                immunodeficiency
                virus (HIV).</p>
            <p>2) Information about how my impairment(s) affects my ability to complete tasks and activities of daily
                living.</p>
            <p>3) Information about how my impairment(s) affected my ability to do work.</p>
        </div>
        <p>I understand that this authorization, except for action already taken, may be voided by me at any time. If I
            do
            not void this authorization, it will automatically end at the conclusion of any proceedings, administrative
            or
            judicial, in connection with my Medicaid application, including any appeals. If I am already receiving
            benefits,
            the authorization will end when a final decision is made as to whether I can continue to receive
            benefits.</p>
        <table style="width: 100%">
            <tr>
                <td style="width: 40%;">
                    <label>
                        SIGNATURE OF DISABLED PERSON OR PERSON AUTHORIZED TO
                        ACT IN HIS/HER BEHALF
                    </label><br>
                    <div class="card-body" style="justify-content: space-around">

                        <div id="signature-pad">
                            <input type="text" class="no-border" style="width: 100%;margin-bottom: 10px" name="map_signature" id="map_signature" oninput="generateSignature()" maxlength="18">
                            <canvas id="signature-canvas-map"></canvas>
                            <div>
                                <div class="container-row" style="justify-content: start">

                                    <button id="clear-map" onclick="clearMapCanvas()">Clear</button>
                                </div>

                                <input type="hidden" id="map_sign" name="map_sign">
                            </div>
                        </div>
                    </div>
                </td>
                <td style="width: 20%;">
                    <label>
                        RELATION TO DISABLED PERSON
                        (If other than self)
                    </label><br>
                    <input type="text" name="disabled_relation_other" class="no-border">
                </td>
                <td style="width: 20%;">
                    <label>DISABLED PERSON'S I.D.
                        NUMBER (If known and if
                        different than SSN.) </label><br>
                    <input type="text" name="disabled_id_other" class="no-border">
                </td>
                <td style="width: 20%;">

                    <label>Date</label><br>
                    <input type="date" name="date_map" class="no-border">

                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        STREET ADDRESS
                    </label><br>
                    <input type="text" name="disabled_relation_street" class="no-border" style="width:100%">
                </td>
                <td colspan="2">
                    <label>
                        TELEPHONE NUMBER
                    </label><br>
                    <input type="text" name="disabled_relation_street" class="no-border" style="width:100%">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>
                        City
                    </label><br>
                    <input type="text" name="disabled_relation_city" class="no-border" style="width:100%">
                </td>
                <td>
                    <label>
                        STATE
                    </label><br>
                    <input type="text" name="disabled_relation_state" class="no-border" style="width:100%">
                </td>
                <td>
                    <label>
                        ZIP CODE
                    </label><br>
                    <input type="text" name="disabled_relation_zip" class="no-border" style="width:100%">
                </td>
            </tr>

        </table>
        <br>
        <button type="submit" class="submit-button"> Submit</button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
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
                    });

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
    ctx.font = '40px "Rage Italic", cursive';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 15, 80);
   
}
function clearMapCanvas() {
    document.getElementById('map_signature').value = '';
}

</script>
</body>
</html>

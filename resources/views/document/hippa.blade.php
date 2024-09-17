<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>HIPPA</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            /* margin-left: 20% */
        }
        ul {
            list-style-type: none;
        }

        .no-border {
            background-color: rgb(204, 204, 204);
            border: none;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            /* text-align: center; */
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
            outline: none; /* Removing the outline on focus for cleaner look */
            box-shadow: 0 0 0 2px rgba(19, 75, 126, 0.25); /* Adding a subtle focus shadow with the dark blue color */
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

        .authorization-text {
            margin: 20px;
            font-size: 14px;
            line-height: 1.2;
        }

        .authorization:after {
            content: "";
            display: block;
            page-break-after: always;
        }

        .oca {
            float: right;
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
            transform: translate(-50%, -15%);
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
#signature-canvas-hippa {
    pointer-events: none;
}
.new_input{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 4px 6px;
}
input{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 4px 6px;
}
textarea{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 4px 6px;
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

    </style>
</head>

<body>
<div class="card">
    <form id="hippa-form">
        @csrf
        <input type="hidden" id="referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="oca">
            <h5>
                OCA Official Form No.: 960
            </h5>
        </div>
        <div>
            <br>
            <h5>
                AUTHORIZATION FOR RELEASE OF HEALTH INFORMATION PURSUANT TO HIPAA
            </h5>
            <h5>
                [This form has been approved by the New York State Department of Health]
            </h5>
        </div>
        <table>
            <tr>
                <td>
                    <label>Name</label>
                    <input type="text" name="hippa_name" class="new_input"
                           value="{{$referral->first_name}} {{$referral->last_name}}">
                </td>
                <td>
                    <label for="Date of Birth">Date of Birth</label>
                    <input type="date" name="hippa_dob" class="new_input" value="{{$referral->date_of_birth}}">
                </td>
                <td>
                    <label for="SSN Number">Social Security Number</label>
                    <input type="number" class="new_input" name="hippa_ssn" value="{{$referral->patient_ssn}}">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label for="Address">Address</label><br>
                    <input type="text" name="hippa_address" class="new_input" style="width: 98%;margin-top: 3px;"
                           value="{{$referral->address}},{{$referral->city}},{{$referral->state}},{{$referral->country}},{{$referral->zip_code}}">
                </td>
            </tr>
        </table>
        <p>I, or my authorized representative, request that health information regarding my care and treatment be released
            as set forth on this form:</p>
        <p>In accordance with New York State Law and the Privacy Rule of the Health Insurance Portability and Accountability
            Act of 1996 (HIPAA), I understand that:</p>
        <ol>
            <li>This authorization may include disclosure of information relating to ALCOHOL and DRUG ABUSE, MENTAL HEALTH
                TREATMENT, except psychotherapy notes, and CONFIDENTIAL HIV* RELATED INFORMATION only if I place my initials
                on the appropriate line in Item 9(a). In the event the health information described below includes any of
                these types of information, and I initial the line on the box in Item 9(a), I specifically authorize release
                of such information to the person(s) indicated in Item 8.
            </li>
            <li>If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health treatment
                information, the recipient is prohibited from redisclosing such information without my authorization unless
                permitted to do so under federal or state law. I understand that I have the right to request a list of
                people who may receive or use my HIV-related information without authorization. If I experience
                discrimination because of the release or disclosure of HIV-related information, I may contact the New York
                State Division of Human Rights at (212) 480-2493 or the New York City Commission of Human Rights at (212)
                306-7450. These agencies are responsible for protecting my rights.
            </li>
            <li>I have the right to revoke this authorization at any time by writing to the health care provider listed
                below. I understand that I may revoke this authorization except to the extent that action has already been
                taken based on this authorization.
            </li>
            <li>I understand that signing this authorization is voluntary. My treatment, payment, enrollment in a health
                plan, or eligibility for benefits will not be conditioned upon my authorization of this disclosure.
            </li>
            <li>Information disclosed under this authorization might be redisclosed by the recipient (except as noted above
                in Item 2), and this redisclosure may no longer be protected by federal or state law.
            </li>
        </ol>
        <b>
            <p>6. THIS AUTHORIZATION DOES NOT AUTHORIZE YOU TO DISCUSS MY HEALTH INFORMATION OR MEDICAL
                CARE WITH ANYONE OTHER THAN THE ATTORNEY OR GOVERNMENTAL AGENCY SPECIFIED IN ITEM 9 (b),</p>
        </b>

        <table>
            <tr>
                <th colspan="3">
                    <div>
                        <label>7. Name and address of health provider or entity to release this information:</label>
                    </div>
                    <textarea type="text" name="health_provider" style="margin-top: 3px;" rows="5" cols="100" ></textarea>
                </th>

            </tr>
            <tr>
                <td colspan="2">
                    <p>
                        8. Name and address of person(s) or category of person to whom this information will be sent:
                        Trusted Surplus Solutions 2361 NOstrand Ave STE 504 Brooklyn NY 11210
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" >
                    <p>
                        9(a) Specific information to be released:
                    </p>

                    <input type="checkbox" name="info_released1" value="dated">
                    Medical Record from (insert date) <input type="date"  name="info_released_from"> to
                    (insert date) <input
                        type="date"  name="info_released_to">

                    <div style="padding: 0;margin: 0;">
                        <input type="checkbox" name="info_released2" value="Entire_med">

                        Entire Medical Record, including patient histories, office notes (except psychotherapy notes), test
                        results, radiology studies, films,
                        referrals, consults, billing records, insurance records, and records sent to you by other health
                        care
                        providers.

                    </div>


                    <div class="row-container " style="padding: 0;margin: 0;vertical-align: top;">
                        <div style="padding: 0;margin: 0;">
                            <input type="checkbox" name="info_released3" value="other"> other: <input type="text"
                                                                                                      name="info_other"
                                                                                                      >
                        </div>
                        <div style="padding: 0;margin: 0;">
                            <p>Include: (Indicate by Initialing) </p>

                            <ul>
                                <li><input type="checkbox" name="alcoholDrug" value="alcoholDrug"><label
                                        for="alcoholDrug">Alcohol/Drug Treatment</label></li>
                                <li><input type="checkbox" name="mentalHealth" value="mentalHealth"><label
                                        for="mentalHealth">Mental Health Information</label></li>
                                <li><input type="checkbox" name="hivRelated" value="hivRelated"><label
                                        for="hivRelated">HIV-Related Information</label></li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        <b>Authorization to Discuss Health Information</b>
                    </p>
                    <p>(b)</p> <input type="checkbox" name="discuss" value="discuss"> By initialing here <input type="text"
                                                                                                                name="authorised_person"
                                                                                                                placeholder="initials"
                                                                                                                >
                    I authorize <input type="text" name="authorize"
                                       placeholder="Name of individual health cure provider" style="width:50%;margin-top: 6px;">
                    <div style="max-width: 100%; text-align: center;">
                        <div style="text-align: start;">
                            to discuss my health information with my attorney, or a governmental agency, listed here:
                        </div>
                        <div>
                            <b>NYC HRA Medical Assistance program 785 Atlantic Ave</b>
                        </div>
                    </div>

                    <hr>
                    <p style="text-align: center;">
                        (Attorney/Finn Name or Governmental Agency Name)
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>10. Reason for release of information:</p>
                    <s>At request of indvidual</s>
                    <br>
                    <input type="checkbox" name="reason" value="reason"> Other:
                    <input type="text" name="reason_other"  >
                </td>
                <td>
                    <p>
                        11. Date or event on which this authorization will expire:
                    </p><br>
                    NO Experation
                </td>
            </tr>
            <tr>
                <td>
                    12. If not the patient, name of person signing form:
                    <input type="text" name="person_signing">
                </td>
                <td>
                    13. Authority to sign on behalf of patient:
                    <input type="text" name="authority_sign">
                </td>
            </tr>
        </table>
        <p>
            All items on this form have been completed and my questions about this form have been answered. In add111on, I
            have been provided a
            copy of the form.
        </p>
        <div class="row-container">
            <div class="card-body" style="justify-content: space-around">

                <div id="signature-pad">
                    <input type="text"  style="width: 63%;margin-bottom: 10px" name="hippa_signature" id="hippa_signature" oninput="generateSignature()" maxlength="18">
                    <canvas id="signature-canvas-hippa"></canvas>
                    <div>
                        <div class="container-row" style="justify-content: start">

                            <button id="clear-hippa" onclick="clearHippaCanvas()">Clear</button>
                        </div>
                        <label> Signature of patient or representative authorized by law. </label>
                        <input type="hidden" id="hippa_sign" name="hippa_sign">
                    </div>
                </div>
            </div>

            <label for="">Date<input type="date" name="sign_date"></label>

        </div>
        <br>
        <div style="max-width: 100%;font-weight: bold">
            * Human Immunodeficiency Virus that causes AIDS. The New York State Public Health Law protects information which
            reasonably could
            identify someone as having HIV symptoms or infection and information regarding a person's contacts.
        </div>
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
    $(document).ready(function () {
        const canvas = document.getElementById('signature-canvas-hippa');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2',
            penColor: '#000000',
        });

        $('#clear-hippa').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $('#hippa_sign').val('');
        });

        // on canvas value change save
        signaturePad.onEnd = function () {
            $('#hippa_sign').val(signaturePad.toDataURL());
        };
        $('#hippa-form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage()
            let formdata = new FormData(this);

            $.ajax({
                url: '{{ route('save.hippa') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type
                success: function (response) {

                    swal.fire({
                        title: 'Success!',
                        text: '2-DOH-960 Hipaa has been saved successfully.',
                        icon: 'success',
                        confirmButtonText: 'Great!'
                    });
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
    const name = document.getElementById('hippa_signature').value;
    const canvas = document.getElementById('signature-canvas-hippa');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#f2f2f2';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = '40px "Rage Italic", cursive';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 15, 80);

}
function clearHippaCanvas() {
    document.getElementById('hippa_signature').value = '';
}
    function saveCanvasAsImage() {

            const canvas = document.getElementById("signature-canvas-hippa");
            const signatureDataURL = canvas.toDataURL('image/png'); // Convert to Base64
            document.getElementById("hippa_sign").value = signatureDataURL;
    }
</script>

</body>

</html>

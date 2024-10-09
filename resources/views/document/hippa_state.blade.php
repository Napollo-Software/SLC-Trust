<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOH 5173-HIPPA State</title>
</head>
<style>
     @font-face {
        font-family: BrittanySignature;
        src: url("/fonts/BrittanySignature-MaZx.ttf");
    }
    @font-face {
                font-family: 'TKLCCE-Info-Normal';
                src: url('fonts/TKLCCE-Info-Normal.ttf') format('truetype');
    }
    @font-face {
                font-family: 'TKLCCE-Info-SemiBold';
                src: url('fonts/TKLCCE-Info-SemiBold.ttf') format('truetype');
    }
    @font-face {
                font-family: 'info-bold';
                src: url('fonts/info-bold.otf') format('truetype');
    }
    table {
        border-collapse: collapse;
        width: 50%;
        /* margin-left: 20% */
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

    th {
        background-color: #f2f2f2;
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
        /* margin-left: 50px; */
        /* margin-right: 50px; */
        font-family:'TKLCCE-Info-Normal';
        font-size:14px;
        background:rgba(0, 0, 0, 0.06);
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
    .card {
        width: 794px;
        background: white;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        /* transition: 0.3s; */
        border-radius: 5px;
        margin: auto;
        overflow: hidden;
        padding: 40px 60px;
        /* padding: 10px; */
        /* position: absolute; */
        /* top: 50%; */
        /* left: 50%; */
        /* transform: translate(-50%, -12%); */
    }


    .card:hover {
        /* box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4); */
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
#signature-canvas-hippa-state {
    pointer-events: none;
}
input{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 2px 5px;
    outline: none;
    background-color: transparent !important;
    height: 22px;
    outline: none;
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

.bold{
    font-family: 'info-bold';
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

    .header_Container{
        display: flex;
        flex-direction: row;
        align-items: center;
    }

   .mt-3{
        margin-top: 3px;
    } 
   .mt-5{
        margin-top: 5px;
    } 
    .mt-10{
        margin-top: 10px;
    }
    .mt-15{
        margin-top: 15px;
    }
    .mt-20{
        margin-top: 20px;
    }
    .flex-col{
    display: flex;
    flex-direction: column;
    gap:5px
  }
 
  .flex-row{
    display: flex;
    flex-direction: row;
  }
  .header_right{
    flex: 1;
  }
  .header_rightTop{
    text-align: right;
  }

  .header_rightCenter{
    text-align: left;
  }

  /* ---------------------------------------------------------- */








/* ------------------------------------------------------------ */

/* ----------------------------------------------------------- */











/* --------------------------------------------------------- */





</style>

<body>
<div class="card">
    <form id="hippa-state-form">
        @csrf
        <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="content">
            <div class="row-container">
                <div>
                    <h3>NEW YORK STATE DEPARTMENT OF HEALTH</h3>
                    <h3>State Disability Review Unit</h3>
                </div>
                <div>
                    <h3>Authorization for Release of Health Information Pursuant to HIPAA</h3>
                </div>
            </div>
        </div>
        <hr class="styled-hr">
        <table style="width: 100%">
            <tr >
                <td >
                    <label for="Patient Name">Patient Name</label>
                    <input type="text"  name="patient_name" style="margin-top: 3px" value="{{$referral->first_name}} {{$referral->last_name}}">
                </td>
                <td>
                    <label for="Date of Birth">Date of Birth</label> <br>
                    <input type="date"  name="dob" style="margin-top: 3px" value="{{$referral->date_of_birth}}">
                </td>
                <td>
                    <label for="SSN Number">SSN Number</label>
                    <input type="number" name="ssn" style="margin-top: 3px">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="Address">Address</label> <br>
                    <input type="text"  name="address" style="margin-top: 3px" value="{{$referral->address}}">
                </td>
                <td>
                    <label for="Client ID Number">Client ID Number</label>
                    <input type="text"  name="client_id" style="margin-top: 3px">
                </td>
                <td>
                    <label for="Disability Number">Disability Number</label>
                    <input type="number" name="disablity_number" style="margin-top: 3px">
                </td>
            </tr>
        </table>

        <div class="authorization-text">
            <p>I, or my authorized representative, request that health information regarding my care and treatment be
                released as set forth on this form. In accordance with New York
                State Law and the Privacy Rule of the Health Insurance Portability and Accountability Act of 1996 (HIPAA), I
                understand that:</p>
            <ol>
                <li>This authorization may include disclosure of information relating to Alcohol and Drug Abuse, Mental
                    Health Treatment, except psychotherapy notes, and
                    Confidential HIV Related Information, unless I check the appropriate box(es) in section 9(c). Otherwise,
                    in the event the health information described
                    below, in section 9(a), includes any of these types of information, and I initial the line on the box in
                    section 9(b), I specifically authorize the release of such
                    information to the person(s) or entity indicated in Section 8.</li>
                <li>If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health treatment
                    information, the recipient is prohibited from
                    re-disclosing such information without my authorization unless permitted to do so under federal or state
                    law. I understand that I have the right to request
                    a list of people who may receive or use my HIV-related information without authorization. If I
                    experience discrimination because of the release or
                    disclosure of HIV-related information, I may contact the New York State Division of Human Rights at
                    (888) 392-3644 or TDD/TTY (718) 741–8300.</li>
                <li>I have the right to revoke this authorization at any time by writing to the health care provider listed
                    below in Section 7. I understand that I may revoke this
                    authorization except to the extent that action has already been taken based on this authorization. If
                    not previously revoked, this authorization will expire
                    upon completion of this determination/review or one year from the date this form is signed, whichever
                    comes first.</li>
                <li>I understand that signing this authorization is voluntary. I understand that the State Disability Review
                    Unit requires the completion of this form in order to gather
                    health information necessary for a disability determination. I understand that without this
                    authorization, my eligibility for Medicaid benefits may be affected.</li>
                <li>Information disclosed under this authorization might be re-disclosed by the Department of Health (except
                    as noted under item 2), and this re-disclosure
                    may no longer be protected by federal or state law.</li>
                <li>This authorization does not authorize you to discuss my health information or medical care with anyone
                    other than the government agency specified in
                    Section 9(b).</li>
            </ol>
        </div>

        <hr>
        <p>7. Name and address of the health provider or entity authorized to release this information:</p>
        <input type="text" name="name_address"  style="width: 98%">
        <hr>

        <p>8. Name and address of person(s) or agency to whom this information is to be sent:
        </p>
        <b>
            <p>State Disability Review Unit OCP-826, State of New York, Department of Health, Albany, NY 12237</p>
        </b>
        <hr>
        <div class="authorization">
            9(a). Specific information to be released:
            <p><input type="checkbox" name="released_info"  value="medical_dated"> Medical records from
                <input type="date" name="medical_record_from"> to <input type="date" name="medical_record_to">
            </p>
            <p><input type="checkbox" name="released_info" value="medical_entire"> Entire Medical Record, including patient histories, office notes (except
                psychotherapy notes), test results, radiology studies, films, referrals, consults, billing records,
                insurance records, and records sent to you by other health care providers.</p>
            <p> <input type="checkbox" name="released_info"  value="medical_other"> Other: <input type="text"  name="other"></p>

            <p>9(b). Authorization to discuss Health Information:</p>
            <label>By initialing here: <input type="text"  name="init" ></label>
            <label>I authorize <input type="text"  name="auth_name" style="width:45%"
                                      placeholder="Name of indvidual/Health care provider"></label>
            <p>to discuss my health information with the <b>State Disability Review Unit</b>
            </p>
            <p>9(c). I do not consent to the disclosure of (Check all boxes that apply):
            </p>
            <div class="checkbox-container">
                <label for="alcoholDrugTreatment">
                    <input type="checkbox" id="alcoholDrugTreatment" name="alcoholDrugTreatment" value="alcoholDrugTreatment">
                    Alcohol/Drug Treatment
                </label>
                <label for="mentalHealthInformation">
                    <input type="checkbox" id="mentalHealthInformation" name="mentalHealthInformation" value="mentalHealthInformation">
                    Mental Health Information
                </label>
                <label for="hivRelatedInformation">
                    <input type="checkbox" id="hivRelatedInformation" name="hivRelatedInformation" value="hivRelatedInformation">
                    HIV-Related Information
                </label>
            </div>
            <hr>
            <p>10. Reason for release of information: <label>
                    <input type="checkbox" name="other_individual" value="other_individual">
                    At request of individual</label>
                <label> Other:
                    <input type="text"   id="other_indiviual_name" name="other_indiviual_name">
                </label>
            </p>
            <hr>
            <p>11. Purpose of the Use/Disclosure:<b>Disability Determination and Review</b></p>
            <hr>
            <p>12. If not the patient, name of the person signing this form (print): <input type="text" name="person_signing"
                                                                                            ></p>
            <hr>
            <p>13. Type of authority to sign on behalf of the patient:: <input type="text"  name="auth_info"></p>
            <hr>
            <p>All sections on this form have been completed and my questions about this form have been answered.
                I authorize the facility/person noted on this page to release health information of the person named on this
                page to the New York State Department of Health State
                Disability Review Unit.</p>
            <div class="row-container">
                <div id="signature-pad">
                    <input type="text"  style="width: 57%;margin-bottom: 10px" name="hippa_state_signature" id="hippa_state_signature" oninput="generateSignature()" maxlength="18">
                    <canvas id="signature-canvas-hippa-state"></canvas>
                    <div>
                        <div class="container-row" style="justify-content: start">

                            <button id="clear-hippa-state" onclick="clearHippaStateCanvas()">Clear</button>
                        </div>
                        <label> SIGNATURE OF THE PATIENT OR REPRESENTATIVE AUTHORIZED BY LAW. </label>
                        <input type="hidden" id="hippa_state_sign" name="hippa_state_sign">
                    </div>
                </div>
                <div style="margin-right: 10px;">
                    <input type="date" name="date_hippa_state"  style="width: 100%">
                    <labal>Date</labal>
                </div>
            </div>


        </div>
        <div class="content">
            <div class="row-container">
                <div>
                    <h4>NEW YORK STATE DEPARTMENT OF HEALTH</h4>
                    <h4>State Disability Review Unit</h4>
                </div>
                <div>
                    <h3>Authorization for Release of Health Information Pursuant to HIPAA</h3>
                </div>
            </div>
        </div>
        <hr class="styled-hr">
        <p>
            The “Authorization for Release of Health Information and Confidential HIV-Related Information” form gives permission to your healthcare providers (hospitals, doctors,
            therapists, etc.) to send in copies of your health records to the State Disability Review Team. These health records will help the Disability Review Team determine if you
            are disabled. You will need to fill out and send one of these forms to every one of your healthcare providers that needs to send in your medical records.
            The box at the top of the form will be filled in. If the information is incorrect, please put a line through what is incorrect and write in the correct information.
            Read the information in items 1-6 found under the top box, before filling in the rest of the form. These paragraphs give you information on the type of health information
            that you can choose to be sent by your healthcare providers, your rights to authorize the release of your health records and how to stop the authorization, and who
            is allowed to see your health information.
        </p>
        <p>
            7) Put the name and address of the healthcare provider who is to send your health records to the State
            Disability Review Team.
            Fill out one form for each of your healthcare providers
        </p>
        <hr>
        <p>8) Informs the healthcare provider to whom to send the health records. This box will be already filled in with
            the State Disability Review Team’s information.
        </p>
        <hr>
        <p>
            9a) • If you want the healthcare provider to send your medical records for a certain period of time, put a check
            in the first box and enter the dates for the time
            period. To make a disability determination, at least 12 months of health records are needed for the time period
            in which the disability is being
            determined
        </p>
        <p>
            • If you want the healthcare provider to send your entire medical record, put a check in the second box.

        </p>
        <p>
            • If you want the healthcare provider to send in any other information, put a check in the third box (Other) and
            write the information that the healthcare
            provider is to send
        </p>
        <hr>
        <p>9b) If you want to allow your healthcare provider to speak with someone on the State Disability Review Team, put
            your initials and the name of your healthcare
            provider on the lines provided</p>
        <hr>
        <p>
            9c) Under 9(c), check the boxes for the type of medical information that your healthcare provider is not
            permitted to send.
        </p>
        <hr>
        <p>
            10) Check the box if the individual requested the release of information, or check Other and state the reason for the request.
        </p>
        <hr>
        <p>
            10) Check the box if the individual requested the release of information, or check Other and state the reason for the request.
        </p>
        <hr>
        <p>
            10) Check the box if the individual requested the release of information, or check Other and state the reason for the request.
        </p>
        <hr>
        <p>
            13) If you are the legal representative of the patient, put the relationship you have to the patient. For example, if the patient is a child and you are the parent, put
            parent. If you are the legal guardian of the patient, put legal guardian
        </p>
        <hr>
        <p>
            If you want your healthcare provider to send your medical records, this form must be signed and dated by the patient or the patient’s legal representative.
        </p>
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
        const canvas = document.getElementById('signature-canvas-hippa-state');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2',
            penColor: '#000000',
        });

        $('#clear-hippa-state').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $('#hippa_state_sign').val('');
        });

        // on canvas value change save
        signaturePad.onEnd = function () {
            $('#hippa_state_sign').val(signaturePad.toDataURL());
        };
        $('#hippa-state-form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage()
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.hippaState') }}',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,

                success: function (response) {
                    swal.fire({
                        title: 'Success!',
                        text: '4-DOH 5173-Hipaa State has been saved successfully.',
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
    const name = document.getElementById('hippa_state_signature').value;
    const canvas = document.getElementById('signature-canvas-hippa-state');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#f2f2f2';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = '42px "BrittanySignature", BrittanySignature';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 19, 80);

}
function clearHippaStateCanvas() {
    document.getElementById('hippa_state_signature').value = '';
}
    function saveCanvasAsImage() {
        for (let i = 1; i <= 5; i++) {
            const canvas = document.getElementById("signature-canvas-hippa-state");
            const signatureDataURL = canvas.toDataURL('image/png'); // Convert to Base64
            document.getElementById("hippa_state_sign").value = signatureDataURL;
        }
    }

</script>
</body>

</html>

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

    th{
        border: 1px solid black;
        padding: 8px;
        /* text-align: center; */
    }

    td {
        border: 1px solid black;
        padding-top: 2px;
        padding-bottom: 8px;
        padding-left: 8px;
        padding-right: 8px;
        font-size: 13px;

    }

    input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}

    th {
        background-color: #f2f2f2;
    }

    .input-full{
        border-radius: 2px;
        border: 1px solid #b2b2b2;
        font-size: 12px;
        height: 28px;
        outline: none;
        width: calc(100% - 10px);
        margin: 0;
        padding: 0;
        padding-left: 10px !important;
        background-color: transparent !important;
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

    /* .submit-button:hover {
        background-color: #16b6d3; 
    } */

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

    .headerContainer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: -3px;
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
        background-color: black;
        height: 6px;
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
        width: 894px;
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
    /* background: #e9e9e9; */
    /* border-radius: 2px; */
    border: none;
    border-bottom: 1px solid black;
    font-size: 12px;
    /* padding: 2px 5px; */
    outline: none;
    background-color: transparent !important;
    /* height: 22px; */
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
   .mt-2{
        margin-top: 2px;
    } 
   .mt-1{
        margin-top: 1px;
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
    .mt-25{
        margin-top: 25px;
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


  .no-space{
    margin:0;
    padding:0
  }

  .light-hr{
    height: 1px !important;
  }




/* ------------------------------------------------------------ */

/* ----------------------------------------------------------- */

hr{
    height: 1px;
    border: none;
    background: gray;
}

.justify-between{
    justify-content: space-between
}
.justify-center{
    justify-content: center
}
.align-center{
    align-items: center
}
.gap-10{
    gap: 10px;
}
.gap-5{
    gap: 5px;
}
.w-46-5{
    width: 46.5%;
}
.f-1{
    flex: 1
}
.border-none{
    border: none;
    outline: none;
    cursor: pointer;
}
.m-0{
    margin: 0
}
.w-70{
    width: 70%;
}
.w-25{
    width: 25%;
}
.w-100{
    width: 100%;
}
.l-height{
    line-height: 1.1;
}
/* p{
    margin: 5px;
} */









/* --------------------------------------------------------- */





</style>

<body>
<div class="card">
    <form id="hippa-state-form">
        @csrf
        <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="content">
            <div class="headerContainer">
                <div>
                    <p class="xs no-space" >NEW YORK STATE DEPARTMENT OF HEALTH</p>
                    <p class="xs no-space" >State Disability Review Unit</p>
                </div>
                <div style="margin-bottom: -2px;">
                    <p class="bold xl no-space" style="">Authorization for Release of Health Information Pursuant to HIPAA</p>
                </div>
            </div>
        </div>
        <hr class="styled-hr">
        <table style="width: 100%">
            <tr >
                <td style="border-left:none;padding-left:0px;width:44%">
                    <div class="flex-col">
                        <label for="Patient Name">Patient Name</label>
                        <input type="text" class="input-full"  name="patient_name" style="" value="{{$referral->first_name}} {{$referral->last_name}}">
                    </div>
                </td>
                <td  style="width:28%">
                    <div class="flex-col">
                        <label for="Date of Birth">Date of Birth</label>
                        <input type="date"  name="dob" class="input-full" value="{{$referral->date_of_birth}}">
                    </div>
                </td>
                <td style="width:28%;border-right:none">
                    <div class="flex-col">
                        <label for="SSN Number">SSN Number</label>
                        <input type="number" name="ssn" class="input-full">
                    </div>
                </td>
            </tr>
            <tr>
                <td style="border-left:none;padding-left:0px">
                    <div class="flex-col">
                        <label for="Address">Address</label>
                        <input type="text"  name="address" class="input-full" value="{{$referral->address}}">
                    </div>
                </td>
                <td>
                    <div class="flex-col">
                        <label for="Client ID Number">Client ID Number</label>
                        <input type="text"  name="client_id" class="input-full" style="">
                    </div>
                </td>
                <td style="border-right:none">
                    <div class="flex-col">
                        <label for="Disability Number">Disability Number</label>
                        <input type="number" name="disablity_number" class="input-full" style="">
                    </div>
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

        <hr style="height:0.5px">
        <div class="flex-col">
            <p class="no-space" style="margin-bottom:2px !important">7. Name and address of the health provider or entity authorized to release this information:</p>
            <input type="text" name="name_address"   class="input-full">
        </div>
        <hr/>
        <div class="flex-col">
            <p class="no-space" style="margin-top:2px;">8. Name and address of person(s) or agency to whom this information is to be sent:</p>
            <p class="no-space bold" style="margin-left:70px" >State Disability Review Unit OCP-826, State of New York, Department of Health, Albany, NY 12237</p>
        </div>
        <hr style="height:0.5px">
        <div class="authorization">
            9(a). Specific information to be released:
            <div style="margin-left: 25px;" class="mt-5" ><input type="checkbox" name="released_info"   value="medical_dated"> Medical records from
                <input type="date" style="width:120px" name="medical_record_from">(date) to <input type="date" style="width:120px" name="medical_record_to">(date).
            </div>
            <div style="margin-left: 25px;" class="mt-5"><input type="checkbox" name="released_info" value="medical_entire"> 
            Entire Medical Record, including patient histories, office notes (except
                psychotherapy notes), test results, radiology studies, films, referrals, 
                <br/>
                <span style="margin-left: 25px;"> consults, billing records, insurance records, and records sent to you by other health care providers.</span>
               </div>
            <div class="flex-row" style="margin-left: 25px;gap:3px;margin-top:-5px">
                 <input type="checkbox" name="released_info" style="height: 32px;" value="medical_other"> 
                <div class="flex-row" style="flex:1;gap:5px ">
                    <p>Other:</p>
                    <input type="text"  style="flex:1;height: 22px;" name="other">
                </div>
            </div>
               
            

            <p style="margin-top:0px">9(b). Authorization to discuss Health Information:</p>
            <div class="flex-row" style="gap:5px;margin-top:-16px;margin-left:47px">
                <p>By initialing here:</p>
                <input type="text"  name="init" style="width: 100px;height: 24px;padding:0px !important" >
                <p>I authorize</p>
                <input type="text"  name="auth_name" style="height:24px;flex:1;padding:0px !important" placeholder="Name of indvidual/Health care provider">
            </div>

            <p style="margin-left:47px;margin-top:-5px">to discuss my health information with the <b>State Disability Review Unit</b>
            </p>

            <div class="flex-row" style="gap:10px; align-items:center;margin-bottom:-7px">
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
            </div>
           
            <hr style="height:0.5px">
            <div class="flex-row justify-between align-center" style="padding: 3px 0;">
                <div>
                    <p class="m-0">10. Reason for release of information:</p>
                </div>
                <div class="flex-row justify-center align-center gap-10">
                    <div style="display: flex;justify-content: center;align-items: center;">
                        <input type="checkbox" name="request_individual" value="request_individual">
                        <label style="position: relative;top: 1px;" for="">At request of individual</label>
                    </div>
                    <div style="display: flex;justify-content: center;align-items: center;"> 
                        <input type="checkbox" name="other_individual" value="other_individual">
                        <div style="position: relative;top: 1px;">
                        <label for="">Other:</label>
                        <input type="text"   id="other_indiviual_name" name="other_indiviual_name">
                    </div>
                    </div>
                </div>
            </div>
            <hr style="height:0.5px">
            <div class="flex-row justify-between align-center" style="padding: 3px 0;">
                <p class="m-0">11. Purpose of the Use/Disclosure:</p>
                <p class="bold w-46-5 m-0"> Disability Determination and Review</p>
            </div>
            <hr style="height: 0.5px">
            <div class="flex-row align-center gap-5" style="padding: 3px 0;">
                <p class="m-0">12. If not the patient, name of the person signing this form (print): </p>
                <input type="text" name="person_signing" class="f-1 border-none">
            </div>
            
            <hr style="height: 0.5px">
            <div class="flex-row align-center gap-5" style="padding: 3px 0;">
                <p class="m-0">13. Type of authority to sign on behalf of the patient: </p>
                <input type="text"  name="auth_info" class="f-1 border-none">
            </div>
            
            <hr style="height:1.5px">
        <div>
            <div style="margin-top: 14px;">
                <p class="m-0">All sections on this form have been completed and my questions about this form have been answered.</p>
                <p class="m-0" style="margin-top: 2px">I authorize the facility/person noted on this page to release health information of the person named on this page to the New York State Department of Health State</p>
                <p class="m-0" style="margin-top: 2px">Disability Review Unit.</p>
            </div>
            <div class="flex-row justify-between align-center;" style="margin-top:15px">
                <div class="w-70">
                    <input type="text" name="hippa_state_signature" id="hippa_state_signature" oninput="generateSignature()" maxlength="18" style="margin-bottom:5px" class="w-100"> <br>
                    <label for="">SIGNATURE OF THE PATIENT OR REPRESENTATIVE AUTHORIZED BY LAW</label>
                </div>
                <div class="w-25">
                    <input type="date" name="date_hippa_state" style="margin-bottom:5px" class="w-100"> <br>
                    <labal>Date</labal>
                </div>
            </div>
            <div class="mt-5">
                <canvas id="signature-canvas-hippa-state" style="height: 122px;width:270px"></canvas>
                <div>
                    <div class="container-row mt-5">

                        <button id="clear-hippa-state" onclick="clearHippaStateCanvas()">Clear</button>
                    </div>
                   
                </div>
            </div>


        </div>
        {{-- <hr style="margin-top: 15px;background: black;height: 4px;">
        <span>DOH-5173 (4/16) Page 1 of 2</span> --}}
        <div class="mt-25 flex-col" style="gap: 0">
                <div class="flex-row justify-between align-center">
                    <p style="margin:0" class="sm">NEW YORK STATE DEPARTMENT OF HEALTH</p>
                    <p style="margin:0" class="bold md">Instructions for Completing the</p>
                </div>
                <div class="flex-row justify-between align-center md">
                    <p style="margin:0" class="sm">State Disability Review Unit</p>
                    <p style="margin:0" class="bold md">Authorization for Release of Health Information Pursuant to HIPAA</p>
                </div>
        </div>
        <hr style="background: black;height: 5px;">
     <div class="mt-20" style="display: flex;flex-direction: column;gap: 25px;">
        <div class="sm l-height" style="display: flex;flex-direction: column;gap: 15px;">
            <p style="margin: 0">The “Authorization for Release of Health Information and Confidential HIV-Related Information” form gives permission to your healthcare providers (hospitals, doctors, therapists, etc.) to send in copies of your health records to the State Disability Review Team. These health records will help the Disability Review Team determine if you are disabled. You will need to fill out and send one of these forms to every one of your healthcare providers that needs to send in your medical records.</p>

            <p style="margin: 0">
                The box at the top of the form will be filled in. If the information is incorrect, please put a line through what is incorrect and write in the correct information.
            </p>

            <p style="margin: 0">
                Read the information in items 1-6 found under the top box, before filling in the rest of the form. These paragraphs give you information on the type of health information that you can choose to be sent by your healthcare providers, your rights to authorize the release of your health records and how to stop the authorization, and who is allowed to see your health information.
            </p>
        </div>
        <div class="sm l-height" style="display: flex;flex-direction: column;margin-inline: 25px;gap:16px">
            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>7)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>Put the name and address of the healthcare provider who is to send your health records to the State Disability Review Team. <span class="bold">Fill out one form for each of your healthcare providers</span></span>
                </div>
            </div>
            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>8)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>Informs the healthcare provider to whom to send the health records. This box will be already filled in with
                        the State Disability Review Team’s information.</span>
                </div>
            </div>
            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>9a)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;display:flex;flex-direction: column;gap: 16px;" class="w-100">
                <div>
                    <span> • If you want the healthcare provider to send your medical records for a certain period of time, put a check
                        in the first box and enter the dates for the time
                        period. To make a disability determination, at least 12 months of health records are needed for the time period
                        in which the disability is being determined</span>
                </div>
                <div>
                    <span> • If you want the healthcare provider to send your entire medical record, put a check in the second box.</span>
                </div>
                <div>
                    <span> • If you want the healthcare provider to send in any other information, put a check in the third box (Other) and write the information that the healthcare provider is to send</span>
                </div>
            </div>
            </div>

            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>9b)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>If you want to allow your healthcare provider to speak with someone on the State Disability Review Team, put
                        your initials and the name of your healthcare
                        provider on the lines provided</span>
                </div>
            </div>

            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>9c)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>Under 9(c), check the boxes for the type of medical information that your healthcare provider is not
                        permitted to send.</span>
                </div>
            </div>

            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>10)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>Check the box if the individual requested the release of information, or check Other and state the reason for the request.</span>
                </div>
            </div>

            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>11)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>Check the box if the individual requested the release of information, or check Other and state the reason for the request.</span>
                </div>
            </div>

            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>12)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span>Check the box if the individual requested the release of information, or check Other and state the reason for the request.</span>
                </div>
            </div>

            <div style="margin: 0;display: flex;gap: 10px;">
                <div>
                    <span>13)</span>
                </div>
                <div style="border-bottom:1px solid black;padding-bottom:12px;" class="w-100">
                    <span> If you are the legal representative of the patient, put the relationship you have to the patient. For example, if the patient is a child and you are the parent, put
                        parent. If you are the legal guardian of the patient, put legal guardian</span>
                </div>
            </div>
            
        </div>
    </div>
    <div class="sm l-height" style="margin-top: 15px;">
        <p style="margin: 0">
            If you want your healthcare provider to send your medical records, this form must be signed and dated by the patient or the patient’s legal representative.
        </p>
    </div>
    {{-- <hr style="margin-top: 200px;background: black;height: 3px;">
    <span>DOH-5173 (4/16) Page 2 of 2</span> --}}
    <div class="mt-15">
    <button type="submit" id="submit-button" class="submit-button">
            Submit
            <span class="loader" style="display: none;"></span>
    </button>
</div>
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

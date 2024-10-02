<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOH 5173-HIPPA State</title>
</head>
<style>
     @font-face {
        font-family: 'TKLCCE-Info-Normal';
        src: url('fonts/TKLCCE-Info-Normal.ttf') format('truetype');
            }
            @font-face {
                font-family: 'TKLCCE-Info-SemiBold';
                src: url('fonts/TKLCCE-Info-SemiBold.ttf') format('truetype');
            }
            body{
                font-family:'TKLCCE-Info-Normal';
                font-size:12px
            }
            .font-bold{
                font-family:'TKLCCE-Info-SemiBold';
                font-weight:bold !important
            }
            table {
                border-collapse: collapse;
            }

            input[type="text"] {

                position: relative;
                top: 2px;
            }
            .no-border {
                border: none;
            }

            th,
            td {
                border: 1px solid black;
                padding: 3px;
            }
            th {
                background-color: #f2f2f2;
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


            .styled-hr {
                border: none;
                border-top: 02px solid #000;
                width: 95%;
                /* Adjust the color as needed */
            }


            .authorization-text {
                padding: 0;
                margin: 0;
                font-size: 12px;
                line-height: 1.2;
            }

            /* styles */
            .border-bottom{
                border-bottom:1px solid !important;
                border-right: none;
                border-left: none;
                border-top: none;
            }
            .border-bottom-2{
                border-bottom:2px solid !important;
                border-right: none;
                border-left: none;
                border-top: none;
            }
            tr td > label{
                padding-left:3px
            }
            tr td > input{
                font-size:10px
            }
            td:nth-child(odd){
                border-left:none;
            }
            td:nth-child(3){
                border-right:none;
            }
            .font-bold{
                font-weight:700
            }
            .text-sm{
                font-size:10px
            }
            .my-0{
                margin-top:0px;
                margin-bottom:0px
            }
            .mp-0{
                margin:0px;
                padding:0px
            }
            .m-0{
                margin-top:0px;
                margin-bottom:0px
            }
            .p-0{
                padding:0px
            }
            .p-2{
                padding:2px
            }
            .p-5{
                padding-top:3px;
                padding-bottom:3px
            }
            .py-7{
                padding-top:7px;
                padding-bottom:7px
            }
            .align-check{
                vertical-align:bottom;
                margin-bottom:3px
            }
            .pb-3{
                padding-bottom:3px  
            }
            .pb-7{
                padding-bottom:7px;  
            }
            .pl-20{
                padding-left:20px
            }
            .w-full{
                width:100%
            }
            .w-50{
                width:50%
            }


</style>

<body>
<form id="hippa-state-form">
    @csrf
    <div style="display: table; width: 100%; padding: 0; margin: 0;">
        <p style="display: table-cell; width: 40%; font-size: 12px; padding: 0; margin: 0; position: relative; bottom: 0;">
            NEW YORK STATE DEPARTMENT OF HEALTH
            <br>
            Disability Review Unit
        </p>
        <div style="display: table-cell; width: 60%; text-align: right; vertical-align: bottom;">
            <h5 class='font-bold' style="margin: 0;padding: 0;font-size: 18px;white-space:nowrap">Authorization for Release of Health Information Pursuant to
                HIPAA</h5>
        </div>
    </div>
    <hr style="width: 100%;height:5px;background-color: #231F20;">
    <table style="border-width: 0.5px;margin:0;padding: 0;width: 100%;">
        <tr style="border-width: 0.5px;margin:0;padding: 0;vertical-align: top">
            <td style="border-width: 0.5px;margin:0;width:240px">
                <label style="font-size: 12px;" for="Patient Name">Patient Name:</label>
                <input type="text" name="patient_name" class="no-border text-sm" value="{{$patient_name}}" style="width: 95%">
            </td>
            <td style="border-width: 0.5px;margin:0;width:170px">
                <label style="font-size: 12px;" for="Date of Birth">Date of Birth:</label>
                <input type="text" name="dob" class="no-border text-sm" value="{{$dob}}" style="width: 95%">
            </td>
            <td style="border-width: 0.5px;margin:0;width:170px">
                <label style="font-size: 12px;" for="SSN Number">Social Security Number (Last four digits):</label>
                <input type="text" name="ssn" class="no-border text-sm" value="{{$ssn}}" style="width: 97%">
            </td>
        </tr>
        <tr style="border-width: 0.5px;margin:0;padding: 0;">
            <td style="border-width: 0.5px;margin:0;width:240px">
                <label style="font-size: 12px;" for="Address">Address:</label>
                <input type="text" name="address" class="no-border text-sm" value="{{$address}}" style="width: 95%">
            </td>
            <td style="border-width: 0.5px;margin:0;width:170px">
                <label style="font-size: 12px;" for="Client ID Number">Client ID Number(CIN):</label>
                <input type="text" name="client_id" class="no-border text-sm" value="{{$client_id}}" style="width: 95%">
            </td>
            <td style="border-width: 0.5px;margin:0;width:170px">
                <label style="font-size: 12px;" for="Disability Number">Disability ID Number(DIN):</label>
                <input type="text" name="disablity_number" class="no-border text-sm" value="{{$disablity_number}}"
                       style="width: 97%">
            </td>
        </tr>
    </table>
    <div class="authorization-text">
        <p class='m-0'>I, or my authorized representative, request that health information regarding my care and treatment be
            released as set forth on this form. In accordance with New York
            State Law and the Privacy Rule of the Health Insurance Portability and Accountability Act of 1996 (HIPAA), I
            understand that:</p>
        <ol class='m-0'>
            <li>This authorization may include disclosure of information relating to Alcohol and Drug Abuse, Mental
                Health Treatment, except psychotherapy notes, and
                Confidential HIV Related Information, unless I check the appropriate box(es) in section 9(c). Otherwise,
                in the event the health information described
                below, in section 9(a), includes any of these types of information, and I initial the line on the box in
                section 9(b), I specifically authorize release of such
                information to the person(s) or entity indicated in Section 8.
            </li>
            <li>If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health treatment
                information, the recipient is prohibited from
                re-disclosing such information without my authorization unless permitted to do so under federal or state
                law. I understand that I have the right to request
                a list of people who may receive or use my HIV-related information without authorization. If I
                experience discrimination because of the release or
                disclosure of HIV-related information, I may contact the New York State Division of Human Rights at
                (888) 392-3644 or TDD/TTY (718) 741-8300.
            </li>
            <li>I have the right to revoke this authorization at any time by writing to the health care provider listed
                below in Section 7. I understand that I may revoke this
                authorization except to the extent that action has already been taken based on this authorization. If
                not previously revoked, this authorization will expire
                upon completion of this determination/review or one year from the date this form is signed, whichever
                comes first.
            </li>
            <li>I understand that signing this authorization is voluntary. I understand that the State Disability Review
                Unit requires the completion of this form in order to gather
                health information necessary for a disability determination. I understand that without this
                authorization, my eligibility for Medicaid benefits may be affected.
            </li>
            <li>Information disclosed under this authorization might be re-disclosed by the Department of Health (except
                as noted under item 2), and this re-disclosure
                may no longer be protected by federal or state law.
            </li>
            <li>This authorization does not authorize you to discuss my health information or medical care with anyone
                other than the government agency specified in
                Section 9(b).
            </li>
        </ol>
            </div>
            <div>
                <input type="text" name="name_address" class="border-bottom text-sm" style="width: 100%;" value="{{$name_address}}">
                <p style='padding:0;' class='m-0'>7. Name and address of the health provider or entity authorized to release this information:</p>
            </div>
            <div>
                <input type="text" name="name_address" class="border-bottom text-sm" style="width: 100%" value="{{$name_address}}">
                <p style='padding:0;margin:3px' class=''>8. Name and address of person(s) or agency to whom this information is to be sent:</p>
            </div>
            </div>
                <p class='font-bold border-bottom m-0' style='padding-left:40px;font-weight:600'>State Disability Review Unit OCP-826, State of New York, Department of Health, Albany, NY 12237</p>
    <div class="authorization">
        <p class='m-0 '>
         9(a). Specific information to be released:
        </p>
        <div class='pl-20'>
            <input type="checkbox"
            name="released_info"
            style='vertical-align:bottom;margin-bottom:3px'
            value="medical_dated"
            {{isset($released_info) == 'medical_dated' ? 'checked' : '' }}
            >
            <span>
                Medical records from
            </span>
            <input
            type="text"
            name="medical_record_from"
            class="border-bottom text-sm"
            value="{{$medical_record_from}}"
            >
                (date) to
            <input
                type="text" name="medical_record_to" class="border-bottom text-sm" value="{{$medical_record_to}}">(date).
         </div>
        <p class='m-0 pl-20'>
            <input type="checkbox" name="released_info" style='vertical-align:bottom;margin-bottom:3px'
                  value="medical_entire" {{isset($released_info) == 'medical_entire' ? 'checked' : '' }}> Entire Medical
            Record, including patient histories, office notes (except
            psychotherapy notes), test results, radiology studies, films, referrals, consults, billing records,
            insurance records, and records sent to you by other health care providers.</p>
        <p class='m-0 pl-20'>
            <input type="checkbox" name="released_info" style='vertical-align:bottom;margin-bottom:3px'
            value="medical_other" {{isset($released_info) == 'medical_other' ? 'checked' : '' }}>
                <span>
                      Other:
                </span>
            <input
            type="text"
            name="other"
            class="border-bottom text-sm"
            value="{{$other}}"
            style="width:90%"
                >
        </p>

        <p class='m-0'>
            9(b). Authorization to discuss Health Information:
        </p>
        <div style="display: inline-block; width: 95%;" class='pl-20'>
            <span>
                By initialing here: 
            </span>
        <input type="text" name="init" class="border-bottom text-sm" value="{{$init}}" style="width: 20%;">
            I authorize 
            <input type="text" name="auth_name" class="border-bottom text-sm" value="{{$auth_name}}" style="width: 45%;"
            placeholder="Name of individual/Health care provider"></div>
        <p class='m-0' style="padding-left: 20px;">to discuss my health information with the <b>State Disability Review Unit</b></p>
        <div class="checkbox-container" style="width: 100%;display:table">
            <div style='display:table-cell;width:50%;vertical-align:middle;padding-top:4px'>
                <p class='m-0' style="display: inline;">9(c). I do not consent to the disclosure of (Check all boxes that apply):</p>
            </div>
            <div style='width:50%;display:table-cell;'>
                <label for="alcoholDrugTreatment" style="white-space: nowrap; display: inline;font-size: 10px;margin-top:-10px">
                    <input type="checkbox" name="alcoholDrugTreatment" class='my-0' style='vertical-align:bottom;'
                    value="alcoholDrugTreatment" {{ isset($alcoholDrugTreatment) && $alcoholDrugTreatment == 'alcoholDrugTreatment' ? 'checked' : '' }}>
                    Alcohol/Drug Treatment
                </label>
            <label for="mentalHealthInformation" style="white-space: nowrap; display: inline;font-size: 10px;margin-top:-10px">
                <input type="checkbox" id="mentalHealthInformation" name="mentalHealthInformation" class='my-0' style='vertical-align:bottom;'
                       value="mentalHealthInformation" {{ isset($mentalHealthInformation) && $mentalHealthInformation == 'mentalHealthInformation' ? 'checked' : '' }}>
                       Mental Health Information
                    </label>
            <label for="hivRelatedInformation" style="white-space: nowrap; display: inline;font-size: 10px;margin-top:-10px">
                <input type="checkbox" id="hivRelatedInformation" name="hivRelatedInformation" class='my-0' style='vertical-align:bottom;'
                value="hivRelatedInformation" {{ isset($hivRelatedInformation) && $hivRelatedInformation == 'hivRelatedInformation' ? 'checked' : '' }}>
                HIV-Related Information
            </label>
        </div>
        </div>
        <hr>
        <div class='m-0 w-full' style='display:table'>
            <span class='w-50' style='display:table-cell;vertical-align:middle;padding-top:4px'>
                10. Reason for release of information:
            </span>
            <span style='vertical-align:middle'>
                <label>
                    <input type="checkbox" class='align-check'
                    name="other_individual" {{isset($other_individual) =='other_individual'? 'checked' : ''}}>
                    <span>
                        At request of individual
                    </span>
                </label>
                <label>
                    <input type="checkbox" class='align-check'
                    name="other_individual" {{isset($other_individual) =='other_individual'? 'checked' : ''}}>
                    <span>
                Other:
                </span>
                <input type="text" id="other_indiviual_name" class="border-bottom" value="{{$other_indiviual_name}}"
                name="other_indiviual_name" style="vertical-align: baseline">
            </label>
        </span>
                </div>
        <hr>
        <div style='display:table;width:100%'>
            <div style='display:table-row'>
                <div style='display:table-cell;width:50.3%;'>
                11. Purpose of the Use/Disclosure:
                </div>
                <div style='display:table-cell;width:50%'>
                <p class='font-bold m-0'>Disability Determination and Review</p>
                </div>
            </div>
        </div>
        <hr/>
        <p class='m-0'></p>
        <p class='m-0'>
            <span   >
                12. If not the patient, name of the person signing this form (print):
            </span>
            <input type="text"
            name="person_signing"
            class="no-border text-sm"
            value="{{$person_signing}}">
        </p>
        <hr>
        <p class='m-0'>
            <span>
                13. Type of authority to sign on behalf of the patient:
            <span>
                <input type="text"
                 name="auth_info"
                class="no-border text-sm"
                 value="{{$auth_info}}"
                 >
                </p>
        <p class='m-0'>All sections on this form have been completed and my questions about this form have
            been answered.
            I authorize the facility/person noted on this page to release health information of the person named on this
            page to the New York State Department of Health State
            State Disability Review Unit.</p>

        <div style="display: table; width: 100%;">
            <div style="display: table-cell; vertical-align: bottom;">
                @if($hippa_state_sign)
                    <img src="{{ $hippa_state_sign }}" alt="map_sign" width="300" height="70">
                @else
                    <div style=" width:150px; height:70px;vertical-align: center;text-align: center"><p>
                            <b style="vertical-align: bottom">No Signature Provided</b>
                    </p></div>
                <p style="display: block; text-align: start; border-bottom">
                    SIGNATURE OF THE PATIENT OR REPRESENTATIVE AUTHORIZED BY LAW
                </p>p
                @endif
            </div>
            <div style="display: table-cell; vertical-align: bottom;">
                <input type="text" class="border-bottom text-sm" name="date_hippa_state" value="{{$date_hippa_state}}">
                <p style="display: block; text-align: start;vertical-align: bottom" class='m-0'>
                    DATE
                </p>
            </div>
        </div>
        <div style='margin-bottom:30px;margin-top:5px;padding-top:2px' class='styled-hr'>
            DOH-5173 (4/16) Page 1 of 2
        </div>
        <div style="display: table; width: 100%; padding: 0; margin: 0;">
            <p style="display: table-cell; width: 40%; font-size: 12px; padding: 0; margin: 0; position: relative; bottom: 0;">
                NEW YORK STATE DEPARTMENT OF HEALTH
                <br>
                Disability Review Unit
            </p>

            <div style="display: table-cell; width: 60%; text-align: right; vertical-align: bottom;">
                <h5 style="margin: 0;padding: 0;font-size: 14px">
                  Instructions for Completing the <br/>    
                  Authorization for Release of Health Information Pursuant to HIPAA
                </h5>
            </div>
        </div>
        <hr class="styled-hr">
        <p class='m-0'>
            <span class='pb-7'>
                The “Authorization for Release of Health Information and Confidential HIV-Related Information” form gives
                permission to your healthcare providers (hospitals, doctors,
                therapists, etc.) to send in copies of your health records.
                to the State Disability Review Team. These health
                records will help the Disability Review Team determine if you
                are disabled. You will need to fill out and send one of these forms to every one of your healthcare
                providers that needs to send in your medical records. 
            </span>
            <br/>
            <br/>
            <span>
                The box at the top of the form will be filled in. If the information is incorrect, please put a line through
                what is incorrect and write in the correct information.
            </span>
            <br/>
            <br/>
            Read the information in items 1-6 found under the top box, before filling in the rest of the form. These
            paragraphs give you information on the type of health information
            that you can choose to be sent by your healthcare providers, your rights to authorize the release of your
            health records and how to stop the authorization, and who
            is allowed to see your health information.
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
                7)
            </span>
            <span style='margin-left:10px;'>
                <span>
                    Put the name and address of the healthcare provider who is to send your health records to the State
                    Disability Review Team. <br/>
                </span>
                <span style='margin-left:20px;padding-top:20px'>
                    Fill out one form for each of your healthcare providers
                </span>
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            8)
            </span>
            <span style='margin-left:10px;'>
            Informs the healthcare provider to whom to send the health records. This box will
            be already filled in
            with
            the State Disability Review Team’s information.
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            9a) • If you want the healthcare provider to send your medical records for a certain period of time, put a
            check
            in the first box and enter the dates for the time
            period. To make a disability determination, at least 12 months of health records are needed for the time
            period
            in which the disability is being
            determined
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            • If you want the healthcare provider to send your entire medical record, put a check in the second box.

        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            • If you want the healthcare provider to send in any other information, put a check in the third box (Other)
            and
            write the information that the healthcare
            provider is to send
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            9b)
            </span>
            <span style='margin-left:10px;'>
            If you want to allow your healthcare provider to speak with someone on the State
            Disability Review Team,
            put
            your initials and the name of your healthcare
            provider on the lines provided
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            9c)
            </span>
            <span style='margin-left:10px;'>
            Under 9(c), check the boxes for the type of medical information that your healthcare provider is not
            permitted to send.
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            10)
            </span>
            <span style='margin-left:10px;'>
            Check the box if the individual requested the release of information, or check Other and state the
            reason for the request.
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            11)
            </span>
            <span style='margin-left:10px;'>
            The purpose of this request is for a disability determination and review.
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            12)
            </span>
            <span style='margin-left:10px;'>
            If you are not the patient filling out the form to request medical records, print your name.
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <p class='m-0 py-7' style='margin-left:15px'>
            <span>
            13)
            </span>
            <span style='margin-left:10px;'>
            If you are the legal representative of the patient, put the relationship you have to the patient.  For example, if the patient is a child and you are the parent, put  
            parent.  If you are the legal guardian of the patient, put legal guardian
            </span>
            <hr class='styled-hr' style='margin-left:35px'/>
        </p>
        <br>

</form>

</body>

</html>

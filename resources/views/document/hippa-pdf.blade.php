<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIPPA</title>
    <style>
          @font-face {
                font-family: 'times new roman';
                src: url('fonts/times new roman.ttf') format('truetype');
            }
            @font-face {
                font-family: 'times new roman bold';
                src: url('fonts/times new roman bold.ttf') format('truetype');
            }
            @font-face {
                font-family: 'times new roman italic';
                src: url('fonts/times new roman italic.ttf') format('truetype');
            }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        body{
            font-size:10px;
            font-family:'times new roman';
            margin:20px;
            color:black;
            opacity:0.8
        }
        .text-sm{
            font-size:10px
        }
        input{
            padding:0;
            font-size:10px
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }
        .border-none{
            border:none;
        }
        .border-bottom{
            border-bottom:1px solid black;
        }
        th,
        td {
            border: 1px solid black;
            padding: 3px;
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
            border-top: 05px solid #000;
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

        /* padding */
        .pb-20{
            padding-bottom:20px
        }
        .pt-20{
            padding-top:20px
        }
        .pt-16{
            padding-top:20px
        }
        .pl-5{
            padding-left:10px;
        }
        /* margin */
        .m-0{
            margin-bottom:2px;
        }
        .mt-20{
            margin-top:20px !important;
        }
        /* align */
        .text-center{
            text-align:center
        }
        .text-left{
            float:left
        }
        .text-right{
            float:right
        }
        .align-bottom{
            vertical-align:bottom;
        }
        /* font */
        .font-bold{
            font-family:'times new roman bold' !important;
        }
        .font-lg{
            font-size:15px;
            white-space:nowrap
        }
        .font-italic{
            font-family:'times new roman italic'
        }
        ol li{
            text-align:justify;
        }
        textarea{
            font-family:'times new roman';
            font-size:10px;
            padding-left:10px
        }
    </style>
</head>
<body>
<div class="card" style="max-width: 2480px;">
    <form id="hippa-form">
        @csrf
        <div style="display: table; width: 100%;padding: 0;margin: 0;">
            <div style='display:table-cell;width:10%;'>
                <img src="{{ public_path('images/logo.png') }}" alt="Logo"
                style="display: table-cell; width: fit-content; vertical-align: top; margin: 0; padding: 0;padding-left:-6px;margin-left:-6px"
                height="60" width="60">
            </div>
            <div style='display:table-cell;width:90%'>
                <span class='text-left pt-16 font-bold text-center ' style='vertical-align:bottom; margin-left:-12px;padding-left:-12px'>
                    <span class='' style="font-size:14px;" >
                        AUTHORIZATION FOR RELEASE OF HEALTH INFORMATION PURSUANT TO HIPAA
                    </span>
                    <p class='text-center' style='font-size:14px;margin-top:-5px;padding-top:-5px'>
                        [This form has been approved by the New York State Department of Health]
                    </p>
                </span>
                <span class='text-right font-bold ' style='padding-top:6px;font-size:12px'>OCA Official Form No.: 960</span>
                </div>
        </div>
        <table style="padding: 0;margin: 0;" class='mt-20'>
            <tr>
                <td style='padding-top:0 !important'>
                    <label>Patient Name</label>
                    <input type="text" name="hippa_name" class="border-none" value="{{$hippa_name}}" style="width: 90%;">
                </td>
                <td style='padding-top:0 !important'>
                    <label for="Date of Birth">Date of Birth</label>
                    <input type="text" name="hippa_dob" class="border-none" value="{{$hippa_dob}}" style="width: 90%;">
                </td>
                <td style='padding-top:0 !important'>
                    <label for="SSN Number">Social Security Number</label>
                    <input type="text" class="border-none" name="hippa_ssn" value="{{$hippa_ssn}}" style="width: 90%;">
                </td>
            </tr>
            <tr>
                <td colspan="3" style='padding-top:0 !important'>
                    <label for="Address">Patient Address</label><br>
                    <input type="text" name="hippa_address" class="border-none" style="width: 100%;"
                           value="{{$hippa_address}}">
                </td>
            </tr>
        </table>
        <p style="font-size: 11px;margin-top: 4px;padding-bottom: 0;margin-bottom: 0px">I, or my authorized representative, request that health information regarding my
            care and treatment be
            released
            as set forth on this form:</p>
        <p style="margin: 0;font-size: 11px;">In accordance with New York State Law and the Privacy Rule of the Health
            Insurance Portability and
            Accountability
            Act of 1996 
            <br/>
            (HIPAA), &nbsp; I understand that:</p>
        <ol style="font-size: 11px;margin:0;list-style:none;text-decoration:none;padding:0">
            <li style="font-size: 11px">1. This authorization may include disclosure of information relating to <span class='font-bold'>ALCOHOL</span> and <span class='font-bold'>DRUG ABUSE,
                    MENTAL
                    HEALTH
                    TREATMENT,</span> except psychotherapy notes, and <span class='font-bold'>CONFIDENTIAL HIV* RELATED INFORMATION</span> only if
                I place my
                initials
                on the appropriate line in Item 9(a). In the event the health information described below includes any
                of
                these types of information, and I initial the line on the box in Item 9(a), I specifically authorize
                release
                of such information to the person(s) indicated in Item 8.
            </li>
            <li style="font-size: 11px">2. If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health treatment
                information, the recipient is prohibited from redisclosing such information without my authorization
                unless
                permitted to do so under federal or state law. I understand that I have the right to request a list of
                people who may receive or use my HIV-related information without authorization. If I experience
                discrimination because of the release or disclosure of HIV-related information, I may contact the New
                York
                State Division of Human Rights at (212) 480-2493 or the New York City Commission of Human Rights at
                (212)
                306-7450. These agencies are responsible for protecting my rights.
            </li>
            <li style="font-size: 11px">3. I have the right to revoke this authorization at any time by writing to the health care provider listed
                below. I understand that I may revoke this authorization except to the extent that action has already
                been
                taken based on this authorization.
            </li>
            <li style="font-size: 11px">4. I understand that signing this authorization is voluntary. My treatment, payment, enrollment in a health
                plan, or eligibility for benefits will not be conditioned upon my authorization of this disclosure.
            </li>
            <li style="font-size: 11px;">5. Information disclosed under this authorization might be redisclosed by the recipient (except as noted
                above
                in Item 2), and this redisclosure may no longer be protected by federal or state law.
            </li>
        </ol>
        6.
            <span style="font-size: 11px;margin:0;" class='font-bold'>
                 THIS AUTHORIZATION DOES NOT AUTHORIZE YOU TO DISCUSS MY HEALTH INFORMATION OR MEDICAL
                CARE WITH ANYONE OTHER THAN THE ATTORNEY OR GOVERNMENTAL AGENCY SPECIFIED IN ITEM 9 (b).
            </span>
        <table style="width: 100%; table-layout: fixed; border-collapse: collapse;font-size: 10px;padding: 0;margin: 0;">
            <tr style="padding:0 5px;">
                <td colspan="2" style="text-align: left;padding:0 3px;">
                    <label style="margin: 0;">
                        7. Name and address of health provider or entity to release this
                        information:
                    </label>
                    <textarea type="text" name="health_provider" rows="2" class="border-none" style='font-family:times new roman'
                              style="width: 90%;height:10px">{{$health_provider}}</textarea>
                </td>
            </tr>
            <tr style="padding:0 5px;">
                <td colspan="2" style="padding:0 5px;">
                    <p style="margin: 0;">
                        8. Name and address of person(s) or category of person to whom this information will be sent:
                        <br>
                        <textarea type="text" name="" rows="2" class="border-none"
                              style="width: 90%;height:10px"></textarea>
                        
                    </p>
                </td>
            </tr>
            <tr style="padding:0 5px;">
                <td colspan="2" style="padding:0 5px;">
                    <p style="margin: 0;">
                        9(a). Specific information to be released:
                    </p>
                    <!-- input -->
                    <input
                    type="checkbox"
                    name="info_released"
                    class='m-0 align-bottom'
                    style="margin-top:-5px;padding-top:-5px;padding-left:18px"
                    value="dated" {{isset($info_released1) && $info_released1 == 'dated' ? 'checked' : '' }}
                    >
                    <span>
                        Medical Record from (insert date)
                    </span>
                    <input
                    type="text"
                    class="no-border"
                    style="margin-bottom:0px !important;width:15%"
                    name="info_released_from"
                    value="{{$info_released_from}}"
                    >
                    <span>
                        to (insert date)
                    </span>
                    <!-- input -->
                    <input
                    type="text"
                    class="no-border"
                    name="info_released_to"
                    style="margin-bottom:0px !important;width:14%"
                    value="{{$info_released_to}}"
                    >
                    <p style="display: table; width: 100%; margin: 0; margin-bottom: 3px;padding-left:18px">
                        <input
                        type="checkbox"
                        class='m-0 align-bottom'
                        name="info_released"
                        value="Entire_med" {{isset($info_released2) && $info_released2 == 'Entire_med' ? 'checked' : '' }}
                        >
                        <span>
                                Entire Medical Record, including patient histories, office notes (except psychotherapy notes),
                                test
                                results, radiology studies, films,
                                <br/>
                                <span style='padding-left:15px'>
                                    referrals, consults, billing records, insurance records, and
                                    records sent to you by other health care providers.
                                </span>
                        </span>
                    </p>
                    <div style="display: table; width: 100%;">
                        <div style="display: table-cell; padding: 0; vertical-align: top;">
                            <input
                             type="checkbox"
                             class='m-0 align-bottom'
                             style='padding-left:19px;' 
                             name="info_released3" 
                             value="other"{{isset($info_released3) && $info_released3 == 'other' ? 'checked' : '' }}
                             >
                            <span>
                                 Other: 
                            </span>
                             <input type="text"
                             name="info_other"
                             class="no-border"
                             style='width:40%;'
                             value="{{$info_other}}"
                             >
                             <p style='margin-left:65px;margin-top:0px' class='m-0'>
                                 <input type="text"
                                 name="info_other"
                                 class="no-border"
                                 style='width:47%'
                                 value="{{$info_other}}"
                                 >
                            </p>
                            <p style="margin-top: 1px;padding: 0">
                               <span class='font-bold ' style='font-size:13px'>Authorization to Discuss Health Information</span>
                            </p>
                        </div>
                        <div style="display: table-cell; padding: 0; margin: 0;">
                            <p style="margin: 0;padding: 0;">
                                 Include:
                                  <span class='font-italic'>(Indicate by Initialing)</span> </p>
                            <ul style="list-style-type: none;margin: 0;padding: 0;">
                                <li>
                                    <input
                                    type="text" 
                                    name="alcoholDrug" 
                                    class='border-none border-bottom'
                                    style='width:20%'
                                    {{isset($alcoholDrug) && $alcoholDrug == 'alcoholDrug' ? 'checked' : '' }}
                                    >
                                    <label
                                    for="alcoholDrug" class='font-bold '>
                                        Alcohol/Drug Treatment
                                  </label>
                                </li>
                                <li>
                                    <input 
                                    type="text" 
                                    name="mentalHealth"
                                    style='width:20%'
                                    class='border-none border-bottom' 
                                    {{isset($mentalHealth) && $mentalHealth == 'mentalHealth' ? 'checked' : '' }}
                                    >
                                    <label
                                        for="mentalHealth" class='font-bold '>
                                        Mental Health Information
                                    </label>
                                </li>
                                <li>
                                    <input 
                                    type="text" 
                                    name="hivRelated"
                                    style='width:20%'
                                    class='border-none border-bottom' 
                                    {{isset($hivRelated) && $hivRelated == 'hivRelated' ? 'checked' : '' }}
                                    >
                                    <label
                                        for="hivRelated"
                                        class='font-bold '
                                        >
                                        HIV-Related Information
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div style="display: table; white-space: nowrap;width: 100%">
                        <div style='display:table-cell;padding-left:7px;width:40%'>
                            <span>
                                (b)
                            </span>
                            <input
                            type="checkbox"
                            class='align-bottom m-0' 
                            style='margin-left:0px;margin-right:0px'
                            name="discuss"
                            value="discuss"
                            {{isset($discuss) && $discuss == 'discuss' ? 'checked' : '' }}
                            >
                            <span>
                                By initialing here
                            </span>
                            <input
                            type="text" 
                            name="authorised_person" 
                            placeholder="initials" 
                            class="no-border" 
                            value="{{$authorised_person}}"
                            style='vertical-align:bottom'
                            >
                            <span class='pl-5 align-bottom pt-20'>
                                I authorize 
                            </span>
                            <input
                            type="text"
                            name="authorize"
                            class="no-border" 
                            value="{{$authorize}}" 
                            placeholder="Name of individual health care provider"
                            style='width:49%;vertical-align:bottom'
                            >
                        </div>
                        </div>
                            <span class="text-sm" style="margin-left:150px;margin-top:0px">Initials</span>
                            <span class="text-sm" style="margin-left:210px;margin-top:0px">Name of individual health care provider</span>
                    <div style="max-width: 100%; text-align: start;">
                        <div style='padding-left:27px'>
                            to discuss my health information with my attorney, or a governmental agency, listed here:
                        </div>
                        <div style="text-align: center;">
                            <input type='text' class='border-bottom border-none' style='width:92%;padding-top:7px'/>
                        </div>
                    </div>
                    <p style="margin: 0;text-align: center;">
                        (Attorney/Firm Name or Governmental Agency Name)
                    </p>
                </td>
            </tr>
            <tr style="padding:20px 5px;">
                <td style="padding: 0; margin: 0;">
                    <p style="margin: 0;padding-left:5px">10. Reason for release of information:</p>
                    <div style='padding-left:16px'>
                        <input
                        type="checkbox" 
                        name="reason"
                        class='m-0 align-bottom'  
                        {{isset($reason) && $reason =='reason'? 'checked' :''}}
                        > 
                        <span style="margin:0;padding: 0">At request of individual</span>
                    </div>
                    <div style='padding-left:16px'>
                        <input
                        type="checkbox" 
                        name="reason_other"  
                        class='m-0 align-bottom' 
                        value="{{$reason_other}}" 
                        style="padding: 0;margin: 0;">
                        <span>
                            Other:
                        </span>
                    </div>
                </td>
                <td style="padding-left: 7px; margin: 0;">
                    <p style="margin: 0;vertical-align:top">
                        11. Date or event on which this authorization will expire:
                    </p>
                    <input type='text' class='border-none' style='width:100%;padding-top:7px'/>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 6px; margin: 0;padding-bottom:0">
                    <p style='margin:0'>
                        12. If not the patient, name of the person signing the form:
                    </p>
                    <input type="text" name="person_signing" class="border-none" value="{{$person_signing}}" style="width: 100%;padding-left:14px">
                </td>
                <td style="padding-left: 7px; margin: 0;padding-bottom:0">
                    <p style='margin:0;'>
                        13. Authority to sign on behalf of the patient:
                    </p>
                    <input type="text" name="authority_sign" class="border-none" value="{{$authority_sign}}" style="width: 95%;padding-left:14px">
                </td>
            </tr>
        </table>
        <p  style="padding: 0; margin: 0;padding-left:8px">
            All items on this form have been completed and my questions about this form have been answered.
            In addition,
            I have been provided a copy of the form.
        </p>
        <div style='display:table;width:100%;margin-left:8px'>
                <div style="display:table-cell;width:45%;">
                    @if($hippa_sign)
                        <img src="{{ $hippa_sign }}" alt="Signature 1" width="230" height="60">
                    @else
                        No Signature Provided
                    @endif
                    <div  style="padding: 0; margin: 0;border-top:1px solid;">
                      Signature of patient or representative authorized by law.
                   </div>
                </div>
                <div style="width: 40%;;display:table-cell;padding-top:50px;padding-left:20px">
                    <span style='vertical-align:top'>
                        Date:
                    </span>
                    <input
                    type="text" 
                    class="no-border"
                    name="sign_date"
                    value="{{$sign_date}}"
                    value="{{date('m/d/Y',strtotime($sign_date))}}"
                    style="width: 60%;">
                </div>
            </div>
        <div style="max-width: 100%;padding-top: 6px;margin: 0;font-size: 11px;padding-left:7px" class='font-bold'>
            * Human Immunodeficiency Virus that causes AIDS. The New York State Public Health Law protects information
            which
            reasonably could
            <br/>
            <span style='padding-left:10px'>
                identify
                someone as having HIV symptoms or infection and information regarding a person's contacts.
            </span>
        </div>
    </form>
</div>


</body>

</html>

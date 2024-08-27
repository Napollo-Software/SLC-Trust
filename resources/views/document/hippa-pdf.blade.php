<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIPPA</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            /* margin-left: 20% */
        }

        * {
            font-size: 12px;
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            /* text-align: center; */
        }

        th {

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


    </style>
</head>

<body>
<div class="card" style="max-width: 2480px;">
    <form id="hippa-form">
        @csrf

        <p style="float: right;"><b>OCA Official Form No.: 960</b></p>
        <div style="display: table; width: 100%;padding: 0;margin: 0;">

            <img src="{{ public_path('images/logo.png') }}" alt="Logo"
                 style="display: table-cell; width: fit-content; vertical-align: top; margin: 0; padding: 0;"
                 height="50" width="50">
            <p style="display: table-cell; font-size: 12px; font-weight: bold; margin: 0; width: 90%; justify-content: start;vertical-align: bottom">
                AUTHORIZATION FOR RELEASE OF HEALTH INFORMATION PURSUANT TO HIPAA
                <br>
                [This form has been approved by the New York State Department of Health]</p>
        </div>


        <table style="padding: 0;margin: 0;">
            <tr>
                <td>
                    <label>Name</label>
                    <input type="text" name="hippa_name" class="no-border" value="{{$hippa_name}}" style="width: 90%;">
                </td>
                <td>
                    <label for="Date of Birth">Date of Birth</label>
                    <input type="text" name="hippa_dob" class="no-border" value="{{$hippa_dob}}" style="width: 90%;">
                </td>
                <td>
                    <label for="SSN Number">Social Security Number</label>
                    <input type="text" class="no-border" name="hippa_ssn" value="{{$hippa_ssn}}" style="width: 90%;">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <label for="Address">Patient Address</label><br>
                    <input type="text" name="hippa_address" class="no-border" style="width: 100%;"
                           value="{{$hippa_address}}">
                </td>
            </tr>
        </table>

        <p style="font-size: 11px;margin-bottom: 0;padding-bottom: 0;">I, or my authorized representative, request that health information regarding my
            care and treatment be
            released
            as set forth on this form:</p>
        <p style="margin: 0;font-size: 11px;">In accordance with New York State Law and the Privacy Rule of the Health
            Insurance Portability and
            Accountability
            Act of 1996 (HIPAA), I understand that:</p>
        <ol style="padding:0 12px;font-size: 11px;margin:0;">
            <li style="font-size: 11px">This authorization may include disclosure of information relating to <b>ALCOHOL</b> and <b>DRUG ABUSE,
                    MENTAL
                    HEALTH
                    TREATMENT,</b> except psychotherapy notes, and <b>CONFIDENTIAL HIV* RELATED INFORMATION</b> only if
                I place my
                initials
                on the appropriate line in Item 9(a). In the event the health information described below includes any
                of
                these types of information, and I initial the line on the box in Item 9(a), I specifically authorize
                release
                of such information to the person(s) indicated in Item 8.
            </li>
            <li style="font-size: 11px">If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health treatment
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
            <li style="font-size: 11px">I have the right to revoke this authorization at any time by writing to the health care provider listed
                below. I understand that I may revoke this authorization except to the extent that action has already
                been
                taken based on this authorization.
            </li>
            <li style="font-size: 11px">I understand that signing this authorization is voluntary. My treatment, payment, enrollment in a health
                plan, or eligibility for benefits will not be conditioned upon my authorization of this disclosure.
            </li>
            <li style="font-size: 11px;">Information disclosed under this authorization might be redisclosed by the recipient (except as noted
                above
                in Item 2), and this redisclosure may no longer be protected by federal or state law.
            </li>
        </ol>
        <b>
            <p style="font-size: 11px;margin:0;">6. THIS AUTHORIZATION DOES NOT AUTHORIZE YOU TO DISCUSS MY HEALTH INFORMATION OR
                MEDICAL
                CARE WITH ANYONE OTHER THAN THE ATTORNEY OR GOVERNMENTAL AGENCY SPECIFIED IN ITEM 9 (b),</p>
        </b>
        <table style="width: 100%; table-layout: fixed; border-collapse: collapse;font-size: 10px;padding: 0;margin: 0;">
            <tr style="padding:0 5px;">
                <td colspan="2" style="text-align: left;padding:0 5px;">
                    <label style="margin: 0;">7. Name and address of health provider or entity to release this
                        information:</label>
                    <textarea type="text" name="health_provider" rows="2" class="no-border"
                              style="width: 100%;height:20px">{{$health_provider}}</textarea>
                </td>
            </tr>
            <tr style="padding:0 5px;">
                <td colspan="2" style="padding:0 5px;">
                    <p style="margin: 0;">
                        8. Name and address of person(s) or category of person to whom this information will be sent:
                        <br>
                        <b>Trusted Surplus Solutions 2361 Nostrand Ave STE 504 Brooklyn NY 11210</b>
                    </p>
                </td>
            </tr>
            <tr style="padding:0 5px;">
                <td colspan="2" style="padding:0 5px;">
                    <p style="margin: 0;">
                        9(a) Specific information to be released:
                    </p>
                    <input type="checkbox" name="info_released"
                           value="dated" {{isset($info_released1) && $info_released1 == 'dated' ? 'checked' : '' }}>
                    Medical Record from (insert date) <input type="text" class="no-border" name="info_released_from" value="{{$info_released_from}}"> to
                    (insert date) <input
                        type="text" class="no-border" name="info_released_to" value="{{$info_released_to}}">

                    <p style="display: table; width: 100%; margin: 0; margin-bottom: 3px;">
                        <input type="checkbox" name="info_released" value="Entire_med" {{isset($info_released2) && $info_released2 == 'Entire_med' ? 'checked' : '' }}>
                        Entire Medical Record, including patient histories, office notes (except psychotherapy notes),
                        test
                        results, radiology studies, films, referrals, consults, billing records, insurance records, and
                        records sent to you by other health care providers.
                    </p>

                    <div style="display: table; width: 100%;">
                        <div style="display: table-cell; padding: 0; margin: 0; vertical-align: top;">
                            <input type="checkbox" name="info_released3" value="other"{{isset($info_released3) && $info_released3 == 'other' ? 'checked' : '' }}> other: <input type="text"
                                                                                                                                                                                name="info_other"
                                                                                                                                                                                class="no-border"
                            value="{{$info_other}}">
                        </div>
                        <div style="display: table-cell; padding: 0; margin: 0;">
                            <p style="margin: 0;padding: 0;">Include: (Indicate by Initialing) </p>
                            <ul style="list-style-type: none;margin: 0;padding: 0;">
                                <li><input type="checkbox" name="alcoholDrug" {{isset($alcoholDrug) && $alcoholDrug == 'alcoholDrug' ? 'checked' : '' }}><label
                                        for="alcoholDrug">Alcohol/Drug Treatment</label></li>
                                <li><input type="checkbox" name="mentalHealth" {{isset($mentalHealth) && $mentalHealth == 'mentalHealth' ? 'checked' : '' }}><label
                                        for="mentalHealth">Mental Health Information</label></li>
                                <li><input type="checkbox" name="hivRelated" {{isset($hivRelated) && $hivRelated == 'hivRelated' ? 'checked' : '' }}><label
                                        for="hivRelated">HIV-Related Information</label></li>
                            </ul>
                        </div>
                    </div>
                    <p style="margin: 0;padding: 0">
                        <b>Authorization to Discuss Health Information</b>
                    </p>
                    <p style="display: table; white-space: nowrap;width: 100%">
                        (b) <input type="checkbox" name="discuss" value="discuss" style="display: table-cell;" {{isset($discuss) && $discuss == 'discuss' ? 'checked' : '' }}> By initialing here
                        <input type="text" name="authorised_person" placeholder="initials" class="no-border" value="{{$authorised_person}}" style="display: table-cell;width: 20%">
                        I authorize <input type="text" name="authorize" class="no-border" value="{{$authorize}}" placeholder="Name of individual health care provider" style="display: table-cell; width: 70%;">
                    </p>



                    <div style="max-width: 100%; text-align: start;">
                        <div>
                            to discuss my health information with my attorney, or a governmental agency, listed here:
                        </div>
                        <div style=" text-align: center;">
                            <b>NYC HRA Medical Assistance program 785 Atlantic Ave</b>
                        </div>
                    </div>

                    <hr style="margin: 0;">
                    <p style="margin: 0;text-align: center;">
                        (Attorney/Finn Name or Governmental Agency Name)
                    </p>
                </td>
            </tr>
            <tr style="padding:0 5px;">
                <td style="padding: 0; margin: 0;">
                    <p style="margin: 0;">10. Reason for release of information:</p>
                    <p style="margin:0;padding: 0"><s>At request of individual</s></p>

                    <input type="checkbox" name="reason" style="margin: 0; padding: 0;" {{isset($reason) && $reason =='reason'? 'checked' :''}}> Other:
                    <input type="text" name="reason_other"  class="no-border" value="{{$reason_other}}" style="padding: 0;margin: 0;">
                </td>
                <td style="padding: 0; margin: 0;">
                    <p style="margin: 0;">
                        11. Date or event on which this authorization will expire:
                    </p>
                    NO Expiration
                </td>
            </tr>
            <tr>
                <td style="padding: 0; margin: 0;">
                    12. If not the patient, name of the person signing the form:
                    <input type="text" name="person_signing" class="no-border" value="{{$person_signing}}" style="width: 100%;">
                </td>
                <td style="padding: 0; margin: 0;">
                    13. Authority to sign on behalf of the patient:
                    <input type="text" name="authority_sign" class="no-border" value="{{$authority_sign}}" style="width: 95%;">
                </td>
            </tr>
        </table>
        <p  style="padding: 0; margin: 0;">
            All items on this form have been completed, and my questions about this form have been answered.
            In addition,
            I have been provided a copy of the form.
        </p>
        <br>
        <div class="row-container"  style="padding: 0; margin: 0;">
            <div class="card-body" style="display: flex; justify-content: space-around; align-items: center;">
                <div style="max-width: 50%; max-width: fit-content">
                    @if($hippa_sign)
                        <img src="{{ $hippa_sign }}" alt="Signature 1" width="70 " height="70">
                    @else
                        No Signature Provided
                    @endif
                </div>
                <div style="max-width: 50%; text-align: right; float: right;align-content: center;">
                    Date: <input type="text" class="no-border" name="sign_date" value="{{$sign_date}} "
                               style="width: fit-content;padding-left: 5px">
                </div>
            </div>

            <div  style="padding: 0; margin: 0;">
               Signature of patient or representative authorized by law.
            </div>
        </div>
        <br>

        <div style="max-width: 100%;font-weight: bold;padding: 0;margin: 0;font-size: 11px">
            * Human Immunodeficiency Virus that causes AIDS. The New York State Public Health Law protects information
            which
            reasonably could
            identify someone as having HIV symptoms or infection and information regarding a person's contacts.
        </div>
        <br>

    </form>
</div>


</body>

</html>

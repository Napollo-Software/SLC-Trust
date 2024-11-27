<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disability</title>
    <style>

        @font-face {
            font-family: 'info-normal';
            src: url('fonts/info-normal.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Info-Bold';
            src: url('fonts/Info-Bold.otf') format('truetype');
        }


        @font-face {
            font-family: 'info-semibold';
            src: url('fonts/info-semibold.ttf') format('truetype');
        }


        @font-face {
            font-family: 'info_web-italic';
            src: url('fonts/info_web-italic.ttf') format('truetype');
        }



        body{
            font-family:  'info-normal' ;
            font-size: 13px;
        }

        .italic{
            font-family:  'info_web-italic' ;
        }

        .xs{
            font-size: 12px;
        }

        .xxs{
            font-size: 9px;
        }

        .sm{
            font-size: 13px;
        }

        .md{
            font-size: 14px;
        }

        .lg{
            font-size: 16px;
        }
        .xl{
            font-size: 17px;
        }

        .mt-0{
            margin-top:0px
        }

        .semiBold{
            font-family: "info-semibold" !important;
        }

        .bold{
            font-family: "Info-Bold" !important;
        }



        .gap1{
            margin-top:10px;
            padding-top:10px
        }


        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px;
            font-size: 10px;
            text-align: start;
        }

        tr:first-child th {
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        .noborder {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        .mt-10{
            margin-top:10px !important;
        }

        .border-btm{
            border-bottom: 1px solid black !important;
            border-left: none !important;
            border-right: none !important;
            border-top: none !important;
        }

        .noSpace{
            padding:0px !important;
            margin:0px !important;
        }

        hr{
            margin-top:0px !important;
            background-color: black !important;
        }



        .custom-hr {
            height: 6px !important;
            /* Adjust the height as needed */
            border: none;
            background-color: black;
            margin:0px !important;
            /* Adjust the color as needed */
        }

        /* Adjusted margin for h6 */
        h6 {
            margin: 5px 0;
            /* You can adjust this margin value as needed */
        }

        .checkbox-row label {
            margin-right: 20px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
        }

        input{
            font-size: 12px !important;
            /* border: none !important; */
            background-color: transparent  !important;
        }
        input[type="checkbox"] {
            margin-bottom: 2px;
        }

        textarea{
            font-family:  'info-normal' !important ;
            font-size: 13px !important;
            border: none !important;
            margin-top:-10px !important;
            width:95% !important;
        }

        .noborder{
            border: none !important;
        }

        .th{
            font-weight:none !important;
            text-align: left;
            padding: 3px;
            font-family: 'info-semibold';
        }

        .inputLabel{
            margin-top:-3px !important;
        }
        input[type="text"]{
            height: 12px;
        }
    </style>
</head>

<body>
<form id="disability-form">
    @csrf
    <input type="hidden" id=referral_id" name="referral_id">
    <div style="display: table; width: 100%;">
        <div style="display: table-row;">
            <p style="display: table-cell; width: 50%;" class="xs">
                NEW YORK STATE DEPARTMENT OF HEALTH<br>
                State Disability Review Unit
            </p>
            <p style="display: table-cell; width: 50%; text-align: right;margin-top:17px;font-size:1.5rem;" class="bold" >
                Disability Questionnaire
            </p>
        </div>
    </div>


    <hr class="custom-hr">
    <div style="display: table;width: 100%;padding:0;margin: 0;">
        <div style="display: table-row; width: 100%;vertical-align: center;margin-top:10px">
            <p style="display: table-cell; width: 50%;" class="sm semiBold" ></p>
            <p style="display: table-cell; width: 50%;text-align: left;padding-bottom:5px;margin-bottom: 5px;margin-top:12px;padding-top:12px" class="sm" >COMPLETED BY THE STATE
                DISABILITY REVIEW
                UNIT:</p>
        </div>
    </div>


    <div style="display: table; width: 100%;padding:0;margin: 0;background-color: rebeccapurple">
        <!-- Single Row for Both Sections -->
        <div style="display: table-row; width: 100%;background-color: peru;padding:0;margin: 0">
            <div style="display: table-cell; width: 50%;padding-top:5px;margin-top:5px !important;padding-right:12px !important">
                <p style=" width: 50%;margin-bottom:0px !important;" class="md semiBold" >Name:</p>

                <div style="display: table; width: 100%;padding-top:7px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                         First:
                    </p>
                    <input type="text" value="{{$first_name}}" class="border-btm" name="first_name"
                        style="display: table-cell; vertical-align: bottom; width: 93%; ">
                </div>

                <div style="display: table; width: 100%;padding-top:7px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                         Middle:
                    </p>
                    <input type="text" value="{{$middle_name}}" class="border-btm" name="middle_name"
                        style="display: table-cell; vertical-align: bottom; width: 90%;">
                </div>

                <div style="display: table; width: 100%;padding-top:7px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Last:
                    </p>
                    <input type="text" value="{{$last_name}}" class="border-btm" name="last_name"
                        style="display: table-cell; vertical-align: bottom; width: 94%;">
                </div>

                <div style="display: table; width: 100%;padding-top:7px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Social Security Number (last 4 digits):
                    </p>
                    <input type="text" value="{{$ssn_last_4}}" class="border-btm" name="ssn_last_4"
                        style="display: table-cell; vertical-align: bottom; width: 77%;">
                </div>

                <div style="display: table; width: 100%;padding-top:7px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                     Date Of Birth:
                    </p>
                    <input type="text" value="{{$date_of_birth}}"   class="border-btm" name="date_of_birth"
                        style="display: table-cell; vertical-align: bottom; width: 88%;">
                </div>

                <div style="display: table; width: 100%;padding-top:7px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Telephone Number:
                    </p>
                    <input type="text" value="{{$telephone_number}}" class="border-btm" name="telephone_number"
                        style="display: table-cell; vertical-align: bottom; width: 92%;">
                </div>
            </div>


            <!-- Second Section: 50% Width -->
            <div style="display: table-cell; width: 50%; background-color: #d1d2d4;padding-right: 10px;margin: 0;padding-left: 10px;padding-top: 9px">

                <div style="display: table; width: 100%;padding-top:9px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Case Number:
                    </p>
                    <input type="text" value="{{$case_number}}" class="border-btm" name="case_number"
                        style="display: table-cell; vertical-align: bottom; width: 93%; ">
                </div>
                <div style="display: table; width: 100%;padding-top:9px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                     Client ID Number (CIN):
                    </p>
                    <input type="text" value="{{$client_id_number}}" class="border-btm" name="client_id_number"
                        style="display: table-cell; vertical-align: bottom; width: 86%; ">
                </div>
                <div style="display: table; width: 100%;padding-top:9px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Disability ID Number (DIN):
                    </p>
                    <input type="text" value="{{$disability_id_number}}" class="border-btm" name="disability_id_number"
                        style="display: table-cell; vertical-align: bottom; width: 85%; ">
                </div>
                <div style="display: table; width: 100%;padding-top:9px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Medicaid Application date:
                    </p>
                    <input type="text" value="{{$medicaid_application}}"  class="border-btm" name="medicaid_application"
                        style="display: table-cell; vertical-align: bottom; width: 87%; ">
                </div>
                <div style="display: table; width: 100%;padding-top:9px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Medicaid waiver?
                    </p>
                    <div style="display: table-cell; vertical-align: bottom; width: 87%;">
                            <input type="checkbox"
                                   name="medicaid_waiver_yes" {{isset($medicaid_waiver_yes) && $medicaid_waiver_yes == 'yes' ? 'checked' : ''}} style="vertical-align: bottom;">
                                   &nbsp;Yes
                            <input type="checkbox"
                                   name="medicaid_waiver_no" {{isset($medicaid_waiver_no) && $medicaid_waiver_no == 'no' ? 'checked' : ''}} style="vertical-align: bottom;margin-left:6px"> &nbsp;
                            No
                        </div>
                </div>
                <div style="display: table; width: 100%;padding-top:9px">
                    <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
                    Waiver type:
                    </p>
                    <input type="text" value="{{$waiver_type}}" class="border-btm" name="waiver_type"
                        style="display: table-cell; vertical-align: bottom; width: 82%; ">
                </div>
            </div>
        </div>


    </div>


    <div style="display: table;">
        <p style="display: table-cell; vertical-align: bottom; padding-right: 10px;padding-top:7px">Have you ever applied to the
            Social Security Administration (SSA) for disability benefits?</p>
        <div style="display: table-cell; vertical-align: bottom;padding-top:7px">
            <label>
                <input type="checkbox" name="applied_for_ssa1"
                       value="yes" {{ isset($applied_for_ssa1) && $applied_for_ssa1 == 'yes' ? 'checked' : '' }} style="vertical-align: bottom;">
                Yes
            </label>
            <label>
                <input type="checkbox" name="applied_for_ssa2"
                       value="no" {{ isset($applied_for_ssa2) && $applied_for_ssa2 == 'no' ? 'checked' : '' }} style="vertical-align: bottom;">
                No
            </label>
        </div>
    </div>

    <div style="display: table; width: 100%;padding-top:7px ">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px;">
            If “Yes”, when? (month/year)</p>
        <input type="text"  value="{{date('m/Y',strtotime($ssa_application_date))}}"  class="border-btm" name="ssa_application_date"
               style="display: table-cell; vertical-align: bottom;width:85%">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-left: 10px; padding-right: 10px;">
            SSA decision date: (month/year)</p>
        <input type="text" class="border-btm" id="ssa_decision_date" name="ssa_decision_date"  value="{{date('m/Y',strtotime($ssa_decision_date))}}" style="display: table-cell; vertical-align: bottom;">
    </div>

    <div style="display: table; width: 100%;padding-top:7px">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
            What was the decision?
        </p>
        <input type="text" value="{{$ssa_decision}}" class="border-btm" name="ssa_decision"
               style="display: table-cell; vertical-align: bottom; width: 85%;">
    </div>
    <div style="display: table; width: 100%;padding-top:7px">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
        If denied for benefits, what was the reason (medical or non-medical)?
        </p>
        <input type="text" value="{{$ssa_denial_reason}}" class="border-btm" name="ssa_denial_reason"
               style="display: table-cell; vertical-align: bottom; width: 70%;">
    </div>



    <div style="display: table; width: 100%;padding-top:7px">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
            Did you appeal the decision?
        </p>
        <div style="display: table-cell; vertical-align: bottom;width:40%">
            <label>
                <input type="checkbox" name="appealed_decision1" value="yes"
                       class="show-when-yes" {{ isset($appealed_decision1) && $appealed_decision1 == 'yes' ? 'checked' : '' }} style="vertical-align: bottom;">
                Yes
            </label>
            <label>
                <input type="checkbox" name="appealed_decision2"
                       value="no" {{ isset($appealed_decision2) && $appealed_decision2 == 'no' ? 'checked' : '' }} style="vertical-align: bottom;">
                No
            </label>
        </div>
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-left: 10px; padding-right: 10px; margin: 0;">
            If “Yes”, when? (month/year)
        </p>
        <input type="text" name="appeal_date" class="border-btm" value="{{date('m/Y',strtotime($appeal_date))}}"  style="display: table-cell; vertical-align: bottom;width:135%">
    </div>
    <br>


    <table>
        <tr>
            <td style="padding-left:9px">
                <p style="text-align: center !important;margin-top:0px" class="lg bold">
                    PART I – INFORMATION ABOUT YOUR MEDICAL CONDITIONS
                </p>
                <p class="sm">
                    A. Please list all of your medical conditions (diagnoses):
                </p>
                <textarea class="noborder" style="width: 100%;  height: 140px;"
                          name="medical_conditions">{{$medical_conditions}}</textarea>
            </td>
        </tr>
        <tr>
            <td style="padding-left:9px">
                <p class="sm mt-0" >
                    B. How do your medical conditions affect your ability to function? (Please include any limitations
                    in your ability to perform activities of daily
                    <br/>
                    <span style="margin-left:6px;padding-left:6px"> living and work-related activities.)</span>

                </p>
                <textarea class="noborder" style="width: 100%; height: 140px;"
                          name="medical_condition_impact">{{$medical_condition_impact}}</textarea>
            </td>
        </tr>
        <tr>
            <td style="padding-left:9px">
                <p class="sm mt-0">
                    C. Please list your medications (or attach a list).
                </p>
                <textarea class="noborder" style="width: 100%; height: 140px;"
                          name="medications">{{$medications}}</textarea>
            </td>
        </tr>
    </table>
    <hr>
    <p style="font-size: 10px;margin:0">DOH-5139 06/24 Page 1 of 5 </p>

    <br>
    <table style="text-align: start !important;">
        <tr style="height: 15px !important;padding:0px !important;margin:0;text-align: start !important;">
            <td style="height: 15px !important;margin:0;text-align: start !important;" colspan="3">
                <p style=" margin: 0;text-align: center !important;" class="lg semiBold"  >
                    PART II — INFORMATION ABOUT YOUR MEDICAL RECORDS
                </h5>
                <p style="padding: 0 0px;margin: 0;" class="sm semiBold">In order to make a disability determination, current medical
                        evidence
                        is
                        needed to evaluate your
                        physical and/or mental
                        impairments. If you have not seen a medical provider for your impairment(s)
                        within the past 12
                        months, a consultative exam
                        may be arranged for you by the local agency.
                </p>
            </td>
        </tr>

        <tr style="padding:2px" class="sm">
            <td  colspan="3">
                <p style="padding: 0 0px;margin: 0;" class="sm">
                    A. Do you have a primary care provider? &nbsp;&nbsp; <input type="checkbox"
                                                                   name="primary_care_provider_yes"
                                                                   {{isset($primary_care_provider_yes) && $primary_care_provider_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom;">
                                                                   &nbsp;Yes
                    <input type="checkbox"
                           name="primary_care_provider_no"
                           {{isset($primary_care_provider_no) && $primary_care_provider_no == 'no' ? 'checked':''}} style="vertical-align: bottom; margin-left:6px"> &nbsp;
                    No
                </p>
                <p class="sm italic" style="margin-left:6px;padding-left:6px; margin-top:-3px">(If “Yes”, please provide name, address, phone number.)</p>
                <textarea
                    style="  border-bottom: 1px solid black;border-top: none;border-left: none;border-right: none; height: 125px;width:100%">{{$care_provider_text}}</textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">

                <div class="form-group">
                    <label for="schooling" class="sm"  style="vertical-align: middle;"><span class="sm" style="vertical-align: middle"> Date of last visit (month/year):</span></label>
                    <input type="text" value="{{date('m/Y',strtotime($primary_care_provider_details))}}"  name="primary_care_provider_details" class="border-btm"
                           style="width: 450px;">
                </div>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:2px !important;" class="sm">
            <td style="height: 15px !important;padding:0 5px!important;padding-top:6px !important" class="sm" colspan="3">
                B. Have you seen any other medical provider(s) within the past 12 months? &nbsp;&nbsp; <input
                    type="checkbox"
                    {{isset($medical_provider_yes) && $medical_provider_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                    &nbsp;Yes
                <input
                    type="checkbox"
                    {{isset($medical_provider_no) && $medical_provider_no == 'no' ? 'checked':''}} style="vertical-align: bottom;margin-left:6px"> &nbsp;No
                <br>

                <p style="padding: 0 ;margin: 0;margin-left:10px; margin-top:-3px !important" class="sm italic" >(If “Yes”, please complete the section below.)</p><br>

                <p style="padding: 0 ;margin: 0;padding-bottom:2px !important;margin-top:-10px"class="sm semiBold"  >
                    Please list the name, address, and phone number of all medical providers you
                    have seen for the past
                    12 months (for example
                    physicians, nurse practitioners/physician assistants, mental health
                    counselors,
                    physical/occupational/speech therapists,
                    audiologists, etc.). (Continuation sheets are available.)
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important;margin:0;" class="sm">
            <td style="height: 15px !important;padding:0 3px !important;margin:0;">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$medical_provider_1_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medical_provider_1_name">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Phone Number:</p>
                <input type="text" class="noborder" name="medical_provider_1_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$medical_provider_1_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important; vertical-align: top; " rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$medical_provider_1_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medical_provider_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important">
            <td style="height: 15px !important;padding:0 3px !important" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medical_provider_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$medical_provider_2_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_2_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding:0px;">Phone Number:</p>
                <input type="text" class="noborder" name="medical_provider_2_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$medical_provider_2_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$medical_provider_2_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="medical_provider_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px!important;">
            <td style="height: 15px !important;padding:0 3px !important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                {{-- <input type="text" value="{{$medical_provider_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_2_reason"> --}}
                <input type="text" value="{{$medical_provider_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medical_provider_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$medical_provider_3_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medical_provider_3_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding: 0 0px;">Phone Number:</p>
                <input type="text" class="noborder" name="medical_provider_3_phone" style="margin: 0;padding: 0 0px; font-size:10px !important"
                       value="{{$medical_provider_3_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$medical_provider_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="medical_provider_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                {{-- <input type="text" value="{{$medical_provider_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_3_reason"> --}}
                <input type="text" value="{{$medical_provider_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medical_provider_3_reason">
            </td>
        </tr>

        <!-- Second................. -->
        <tr style="height: 15px !important;padding:2px !important;" class="sm">
            <td style="height: 15px !important;padding:0 5px!important;padding-top:6px !important" class="sm" colspan="3">
                C. Have you received medical care in a hospital or other health care facility within the past 12 months?&nbsp;  &nbsp;  <input
                    type="checkbox"
                    {{isset($got_medicare_yes) && $got_medicare_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                    &nbsp;  Yes
                <input
                    type="checkbox"
                    {{isset($got_medicare_no) && $got_medicare_no == 'no' ? 'checked':''}} style="vertical-align: bottom; margin-left:6px"> &nbsp;  No
                <br>

                <p style="padding: 0 ;margin: 0;margin-left:10px;margin-top:-3px !important" class="sm italic">(If “Yes”, please complete the section below.)</p><br>

                <p style="padding: 0 ;margin: 0;padding-bottom:2px !important;margin-top:-10px"class="sm"  >
                Please list the name and address of all hospitals and other medical
                        facilities at which you have
                        sought treatment in the past 12 months.<br/>
                        (Continuation sheets are available.)
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important;margin:0;" class="sm">
            <td style="height: 15px !important;padding:0 3px !important;margin:0;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$medicare_rec_1_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medicare_rec_1_name">
            </td>

            <td style="height: 15px !important;padding:0 3px !important; vertical-align: top; " rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$medicare_rec_1_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medicare_rec_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0px !important">
            <td style="height: 15px !important;padding:0px 3px !important" colspan="2">
                <p style="margin: 0;padding: 0;">Reason:</p>
                {{-- <input type="text" value="{{$medicare_rec_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_1_reason"> --}}
                <input type="text" value="{{$medicare_rec_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medicare_rec_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$medicare_rec_2_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_2_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$medicare_rec_2_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="medicare_rec_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px!important;">
            <td style="height: 15px !important;padding:0 3px !important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason:</p>
                {{-- <input type="text" value="{{$medicare_rec_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_2_reason"> --}}
                <input type="text" value="{{$medicare_rec_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medicare_rec_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$medicare_rec_3_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medicare_rec_3_name">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$medicare_rec_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="medicare_rec_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason:</p>
                {{-- <input type="text" value="{{$medicare_rec_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_3_reason"> --}}
                <input type="text" value="{{$medicare_rec_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medicare_rec_3_reason">
            </td>
        </tr>
       <!-- Third -->

       <tr style="height: 15px !important;padding:2px !important;" class="sm">
            <td style="height: 15px !important;padding:0 5px!important;" class="sm" colspan="3">
                D. Have you received services from any agencies to assist you with your
                    impairment(s) within the
                    past 12 months &nbsp;&nbsp; <input
                    type="checkbox"
                     name="agency_assist_yes"
                    {{isset($agency_assist_yes) && $agency_assist_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                    &nbsp; Yes
                <input
                    type="checkbox"
                     name="agency_assist_no"
                    {{isset($agency_assist_no) && $agency_assist_no == 'no' ? 'checked':''}} style="vertical-align: bottom;margin-left:6px">&nbsp; No
                <br>

                <p style="padding: 0 ;margin: 0;margin-left:10px;margin-top:-3px" class="sm italic">(If “Yes”, please complete the section below.)</p><br>

                <p style="padding: 0 ;margin: 0;padding-bottom:2px !important;margin-top:-10px"class="sm semiBold"  >
                Please list the name and address of any other agencies that you have seen for assistance with your medical conditions
in the past 12 months (for example, vocational rehabilitation agencies, supported employment or housing agencies,
case management agencies, etc.).
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important;margin:0;" class="sm">
            <td style="height: 15px !important;padding:0 3px !important;margin:0;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$agency_1_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="agency_1_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important; vertical-align: top; " rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$agency_1_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="agency_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0px !important">
            <td style="height: 15px !important;padding:0px 3px !important" colspan="2">
                <p style="margin: 0;padding: 0;">Reason:</p>
                {{-- <input type="text" value="{{$agency_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_1_reason"> --}}
                <input type="text" value="{{$agency_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="agency_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$agency_2_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_2_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                <input type="text" value="{{$agency_2_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="agency_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px!important;">
            <td style="height: 15px !important;padding:0 3px !important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason:</p>
                {{-- <input type="text" value="{{$agency_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_2_reason"> --}}
                <input type="text" value="{{$agency_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="agency_2_reason">


            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Name:</p>
                <input type="text" value="{{$agency_3_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="agency_3_name">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address:</p>
                {{-- <input type="text" value="{{$agency_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="agency_3_address"> --}}
                <input type="text" value="{{$agency_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="agency_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason:</p>
                {{-- <input type="text" value="{{$agency_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_3_reason"> --}}
                <input type="text" value="{{$agency_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="agency_3_reason">

            </td>
        </tr>

    </table>
    <hr>
    <p style="font-size: 10px;">DOH-5139 06/24 Page 2 of 5</p>

    <table>
        <tr style="padding:3px !important">
            <td colspan="3" style="padding:3px !important;">
                <p class="lg semiBold" style="text-align: center;padding:0 !important; margin:0 !important">PART III – INFORMATION ABOUT YOUR EDUCATION AND LITERACY
                </b>
                <p class="sm italic" style="margin:7px 3px !important; margin-bottom:21px !important; margin-top:-1px !important">If a disability determination cannot be made based on your medical conditions
                    alone, the factors
                    of education, literacy, and work
                    <br/>
                    <span >history will be used to determine disability.</span>
                    </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">

                <div class="form-group">
                    <label for="schooling" class="sm"  style="vertical-align: middle;">A. <span class="sm semiBold" style="vertical-align: middle"> What is the highest grade level of schooling that you
                        have completed?</span></label>
                    <input type="text" id="schooling" value="{{$schooling}}" name="schooling" class="border-btm"
                           style="width: 43.5%;">
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3" >
                <p class="sm"  style="margin-top:6px !important" >
                    B. If you have a child up to the age of 21 attending school or a vocational
                    program, please
                    provide the school or program’s name and address.
                </p>
                <p class="sm" style="margin-left:5%;margin-top:-2px" ><span class="sm" style="vertical-align: middle;">School/Program Name:</span>  <input type="text" value="{{$school_name}}"
                                               name="school_name"
                                               style="width:77.1%"
                                               class="border-btm"></p>
                <p class="sm "style="margin-left:5%" ><span class="sm" style="vertical-align: middle;">Address:</span>  <input type="text" value="{{$school_address}}" name="school_address"
                                   class="border-btm" style="width:88%"></p>
                <p class="sm "style="margin-left:5%" > <input type="text"
                                   class="border-btm" style="width:88%; margin-left:45px" value="{{$school_address2}}" name="school_address2"></p>
                <p class="sm  italic" style="margin-bottom:6px !important">Please complete the DOH-5173, Authorization for Release of Medical
                    Information Pursuant to HIPAA
                    form for this school/program.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm" >
                C. Were (are) you involved in Special Education classes in school? &nbsp;&nbsp;
                <input  class="sm"  type="checkbox"
                       name="special_education_yes"
                       {{isset($special_education_yes) && $special_education_yes == 'yes' ? 'checked':''}}   style="vertical-align: bottom">
                       &nbsp;Yes
                <input class="sm" type="checkbox"
                       name="special_education_no"
                       {{isset($special_education_no) && $special_education_no == 'no' ? 'checked':''}}   style="vertical-align: bottom;margin-left:6px"> &nbsp;
                No
            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm">
                <p style="margin-top:3px !important;">D. Did (do) you receive any special help or accommodations in school? &nbsp;&nbsp; <input
                        type="checkbox"
                        name="special_help_yes"
                        {{isset($special_help_yes) && $special_help_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                        &nbsp;Yes  <input type="checkbox"
                               name="special_help_no"
                               {{isset($special_help_no) && $special_help_no == 'no' ? 'checked':''}}  style="vertical-align: bottom; margin-left:6px"> &nbsp;
                    No   &nbsp; &nbsp; <span class="italic">(If “Yes”, please describe.)</span>
                    <p style="margin-top:-15px !important;padding-top:-15px !important" ></p>
                <textarea class=""
                          name="special_help_text" style="height: 145px;">{{$special_help_text}} </textarea>
                <p style="margin-left:10px;margin-bottom:3px;" class="italic">(If you have a copy of your IEP, please include it with the returned forms.)
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm">
                <p style="margin-top:3px !important;margin-bottom:3px !important">
                    E. Have you received any vocational training or additional education within
                    the past 12 months? &nbsp; &nbsp;
                    <input type="checkbox"
                           name="vocational_training_yes"
                           {{isset($vocational_training_yes) && $vocational_training_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                    &nbsp; Yes <input type="checkbox"
                               name="vocational_training_no"
                               {{isset($vocational_training_no) && $vocational_training_no == 'no' ? 'checked':''}}  style="vertical-align: bottom; margin-left:6px">
                    &nbsp; No
                    <br>
                    <p style="margin-left:10px; margin-top:-4px !important" class="italic">
                        (If “Yes”, please describe.)
                    </p>
                </p>

                <textarea class="noborder"
                          name="vocational_training_text" style="height: 145px;">{{$vocational_training_text}}</textarea>

            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm">
                <p style="margin-top:3px !important; margin-bottom:3px !important">
                    F. Can you read a simple message in any language (such as simple
                    instructions, or a list of
                    items)? &nbsp; &nbsp;
                    <input type="checkbox"
                           name="simple_message_yes"
                           {{isset($simple_message_yes) && $simple_message_yes== 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                           &nbsp; Yes <input type="checkbox"
                               name="simple_message_no"
                               {{isset($simple_message_no) && $simple_message_no == 'no' ? 'checked':''}}  style="vertical-align: bottom; margin-left:6px">
                               &nbsp; No
                    <br>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm">
                G. Can you write a simple message in any language?  &nbsp; &nbsp;
                <input type="checkbox"
                       name="write_simple_message_yes"
                       {{isset($write_simple_message_yes) && $write_simple_message_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                       &nbsp; Yes <input type="checkbox"
                           name="write_simple_message_no"
                           {{isset($write_simple_message_no) && $write_simple_message_no == 'no' ? 'checked':''}}  style="vertical-align: bottom; margin-left:6px">
                           &nbsp; No
            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm">
                <p style="margin-top:3px !important;margin-bottom:3px !important">
                    H. Was assistance or an interpreter necessary to complete this application?  &nbsp; &nbsp;
                    <input type="checkbox"
                           name="interpreter_yes"
                           {{isset($interpreter_yes) && $interpreter_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                           &nbsp; &nbsp; Yes <input type="checkbox"
                               name="interpreter_no"
                               {{isset($interpreter_no) && $interpreter_no == 'no' ? 'checked':''}}  style="vertical-align: bottom;margin-left:6px">
                               &nbsp; &nbsp; No
                    <br>
                    <p style="margin-left:10px ;margin-top:-3px !important;" class="italic" >(If “Yes”, please indicate your primary language.)</p>


                </p>

                <textarea class="noborder"
                          name="interpreter_text" style="height: 145px;">{{$interpreter_text}}</textarea>
            </td>
        </tr>
    </table>
    <hr>
    <p style="font-size: 10px;">DOH-5139 06/24 Page 3 of 5</p>

    <br>
    <br>
    <br>
    <table style="">
        <tr style="">
            <td style="border:none !important;">
                <p style="text-align: center; margin-top:3px !important;margin-bottom:0px !important" class="lg semiBold ">
                    PART IV – INFORMATION ABOUT WORK YOU DID IN THE PAST 5 YEARS
                </p>
            </td>
        </tr>
        <tr style="">
            <td style="border:none !important" class="sm">
                <p style="margin-top:5px;margin-bottom:12px" class="sm">
                    <span class="semiBold"> Have you worked in the past 5 years? </span> &nbsp;&nbsp;
                <input type="checkbox" name="worked_fifteen_yes" style=""
                       {{isset($worked_fifteen_yes) && $worked_fifteen_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom;">
                       &nbsp; Yes
                <input type="checkbox" name="worked_fifteen_no" style=""
                       {{isset($worked_fifteen_no) && $worked_fifteen_no == 'no' ? 'checked':''}} style="vertical-align: bottom;margin-left:6px">
                       &nbsp;No
                </p>

                <p style="padding: 0; margin: 0;" class="sm italic">
                    If YES, in as much detail as possible, please list jobs (up to 5) that you
                    performed IN THE PAST 5
                    YEARS, starting with your most
                    <br/>
                    <span style="margin-top:-5px;padding-top:-5px">recent job.</span>
                </p>
            </td>
        </tr>
    </table>

    <!-- 4th page section 1 -->
    <table style=" margin: 0;padding:0; margin-top:10px">
        <tr style=" margin: 0;padding:0;background-color: #c7c8ca">
            <th style="" class="th">Dates of Employment:</th>
            <th style="" class="th">Job Title:</th>
            <th style="" class="th">Type of Business:</th>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:3">
                <p>
                    <span class="sm semiBold" style="vertical-align: middle;" >From: </span> <input type="text"  class="border-btm "  style="width:150px" name="start_employment_date_one"
                    value="{{date('m/d/Y',strtotime($start_employment_date_one))}}"  >
                </p>

                <p style=" margin: 0;padding:0">
                <span class="sm semiBold" style="vertical-align:middle" >To: </span> <input type="text" class="border-btm xs" style="width:164px" name="end_employment_date_one"
                value="{{date('m/d/Y',strtotime($end_employment_date_one))}}" >
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_one}}" name="job_title_one"
                style=" height:34px;width:100%;" class="border-btm xs">
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Number of hours/week:  <input type="text" value="{{$hours_one}}" style="width:35px;" name="hours_one"
                class="border-btm xs"> </p>
            </td>
            <td style="margin: 0;padding:0">
                <input type="text" value="{{$type_business_one}}" name="type_business_one"
                       style=" height:34px;width:98%;" class="border-btm" >
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Rate of Pay:  <input type="text" value="{{$rate_pay_one}}" name="rate_pay_one"
                class="border-btm xs"> </p>
            </td>
        </tr>
        <tr style="padding: 3px;">
            <td colspan="3" class="sm" style="border:none !important">
                <table style="width: 100%;border:none !important" >
                    <tr>
                        <td style="width: 23%; vertical-align: top;border:none !important">
                            <label for="duties_one" class="sm" style="display: block;">Describe your basic duties:</label>
                        </td>
                        <td style="width: 77%;border:none !important;padding-top:13px">
                            <textarea name="duties_one" id="duties_one" style="width: 100%; min-height: 59px;">{{$duties_one}}</textarea>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style=" margin: 0;padding:0" class="sm">
            <td style=" margin: 0; padding: 0" colspan="3" class="sm">
                <div style="display: table; width: 77%;margin-left:5px;margin-bottom:5px;margin-top:-2px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom;width:50%  ">
                        During a typical day, how many hours did you:
                    </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom;">
                            <input type="text" value="{{$day_stand}}" style="width:70px;text-align:center" name="day_stand" class="border-btm">
                        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom;padding-left:6px">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_walk}}" name="day_walk" style="width:70px;text-align:center" class="border-btm">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom;padding-left:6px">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit}}" name="day_sit" style="width:70px;text-align:center" class="border-btm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 75%;margin-left:5px;margin-bottom:3px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_one}}" name="lift_one" style="width:140px" class="border-btm">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_pounds_one}}" name="lift_pounds_one" style="width:170px" class="noborder sm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;margin-left:5px;margin-bottom:1px">
                    <span style="display: table-cell; vertical-align: middle; padding-right: 10px;width:16%" class="sm">
                        Reason for leaving:
                    </span>
                    <span style="display: table-cell; vertical-align: middle;width:82%;">
                        <input type="text" value="{{$leaving_reason_one}}" style="width:100%" name="leaving_reason_one" class="noborder sm"  >
                    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>
    <!-- 4th page section 2 -->
    <table style=" margin: 0;padding:0">
        <tr style=" margin: 0;padding:0;background-color: #c7c8ca">
            <th style="" class="th">Dates of Employment:</th>
            <th style="" class="th">Job Title:</th>
            <th style="" class="th">Type of Business:</th>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:3">
                <p>
                    <span class="sm semiBold" style="vertical-align: middle;" >From: </span> <input type="text"  class="border-btm " style="width:150px" name="start_employment_date_two"
                    value="{{date('m/d/Y',strtotime($start_employment_date_two))}}"  >
                </p>

                <p style=" margin: 0;padding:0">
                <span class="sm semiBold" style="vertical-align:middle" >To: </span> <input type="text" style="width:168px" class="border-btm xs" style="width:164px" name="end_employment_date_two"
                value="{{date('m/d/Y',strtotime($end_employment_date_two))}}">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_two}}" name="job_title_two"
                style=" height:34px;width:101%;" class="border-btm xs">
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Number of hours/week:  <input type="text" value="{{$hours_two}}" name="hours_two" style="width:35px;"
                class="border-btm xs"> </p>
            </td>
            <td style="margin: 0;padding:0">
                <input type="text" value="{{$type_business_two}}" name="type_business_two"
                       style=" height:34px;width:98%;" class="border-btm" >
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Rate of Pay:  <input type="text" value="{{$rate_pay_two}}" name="rate_pay_two"
                class="border-btm xs"> </p>
            </td>
        </tr>
        <tr style="padding: 3px;">
            <td colspan="3" class="sm" style="border:none !important">
                <table style="width: 100%;border:none !important" >
                    <tr>
                        <td style="width: 23%; vertical-align: top;border:none !important">
                            <label for="duties_one" class="sm" style="display: block;">Describe your basic duties:</label>
                        </td>
                        <td style="width: 77%;border:none !important;padding-top:13px">
                            <textarea name="duties_one" id="duties_two" style="width: 100%; min-height: 59px;">{{$duties_two}}</textarea>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style=" margin: 0;padding:0" class="sm">
            <td style=" margin: 0; padding: 0" colspan="3" class="sm">
                <div style="display: table; width: 77%;margin-left:5px;margin-bottom:5px;margin-top:-2px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom;width:50%  ">
                        During a typical day, how many hours did you:
                    </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom;">
                            <input type="text" value="{{$day_stand_two}}" style="width:70px;text-align:center" name="day_stand_two" class="border-btm">
                        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-left:6px">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_walk_two}}" name="day_walk_two" style="width:70px;text-align:center" class="border-btm">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom;padding-left:6px">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_two}}" name="day_sit_two" style="width:70px;text-align:center" class="border-btm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 75%;margin-left:5px;margin-bottom:3px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_two}}" name="lift_two" style="width:140px" class="border-btm">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_pounds_two}}" name="lift_pounds_two" style="width:170px"  class="noborder sm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;margin-left:5px;margin-bottom:1px">
                    <span style="display: table-cell; vertical-align: middle; padding-right: 10px;width:16%" class="sm">
                        Reason for leaving:
                    </span>
                    <span style="display: table-cell; vertical-align: middle;width:82%;">
                        <input type="text" value="{{$leaving_reason_three}}" style="width:100%" name="leaving_reason_three" class="noborder sm"  >
                    </span>
                </p>

            </td>
        </tr>
    </table>

    <br>
    <!-- 4th page section 3 -->
    <table style=" margin: 0;padding:0">
        <tr style=" margin: 0;padding:0;background-color: #c7c8ca">
            <th style="" class="th">Dates of Employment:</th>
            <th style="" class="th">Job Title:</th>
            <th style="" class="th">Type of Business:</th>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:3">
                <p>
                    <span class="sm semiBold" style="vertical-align: middle;" >From: </span> <input type="text"  class="border-btm " style="width:150px" name="start_employment_date_three"
                    value="{{date('m/d/Y',strtotime($start_employment_date_three))}}">
                </p>

                <p style=" margin: 0;padding:0">
                <span class="sm semiBold" style="vertical-align:middle" >To: </span> <input type="text" style="width:168px" class="border-btm xs" style="width:164px" name="end_employment_date_three"
                value="{{date('m/d/Y',strtotime($end_employment_date_three))}}">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_three}}" name="job_title_three"
                style=" height:34px;width:101%;" class="border-btm xs">
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Number of hours/week:  <input type="text" value="{{$hours_one}}" name="hours_one" style="width:35px;"
                class="border-btm xs"> </p>
            </td>
            <td style="margin: 0;padding:0">
                <input type="text" value="{{$type_business_three}}" name="type_business_three"
                       style=" height:34px;width:98%;" class="border-btm" >
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Rate of Pay:  <input type="text" value="{{$rate_pay_three}}" name="rate_pay_three"
                class="border-btm xs"> </p>
            </td>
        </tr>
        <tr style="padding: 3px;">
            <td colspan="3" class="sm" style="border:none !important">
                <table style="width: 100%;border:none !important" >
                    <tr>
                        <td style="width: 23%; vertical-align: top;border:none !important">
                            <label for="duties_one" class="sm" style="display: block;">Describe your basic duties:</label>
                        </td>
                        <td style="width: 77%;border:none !important;padding-top:13px">
                            <textarea name="duties_one" id="duties_three" style="width: 100%; min-height: 59px;">{{$duties_three}}</textarea>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style=" margin: 0;padding:0" class="sm">
            <td style=" margin: 0; padding: 0" colspan="3" class="sm">
                <div style="display: table; width: 77%;margin-left:5px;margin-bottom:5px;margin-top:-2px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom;width:50%  ">
                        During a typical day, how many hours did you:
                    </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom;">
                            <input type="text" value="{{$day_stand_three}}" style="width:70px;text-align:center" name="day_stand_three" class="border-btm">
                        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-left:6px">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_walk_three}}" name="day_walk_three" style="width:70px;text-align:center" class="border-btm">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom;padding-left:6px">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_three}}" name="day_sit_three" style="width:70px;text-align:center" class="border-btm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 75%;margin-left:5px;margin-bottom:3px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_three}}" name="lift_three" style="width:140px" class="border-btm">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_pounds_three}}" name="lift_pounds_three" style="width:170px"  class="noborder sm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;margin-left:5px;margin-bottom:1px">
                    <span style="display: table-cell; vertical-align: middle; padding-right: 10px;width:16%" class="sm">
                        Reason for leaving:
                    </span>
                    <span style="display: table-cell; vertical-align: middle;width:82%;">
                        <input type="text" value="{{$leaving_reason_three}}" style="width:100%" name="leaving_reason_three" class="noborder sm"  >
                    </span>
                </p>

            </td>
        </tr>
    </table>
    <p  style="text-align: center; margin-bottom:0 !important;;padding:0;margin-top:5px" class="xl semiBold">PART IV</p>
    <p style="text-align: center;margin-top:0 !important; padding:0 !important;margin-bottom:5px" class="xl italic"> CONTINUED ON NEXT PAGE</p>
    <hr>
    <p style="font-size: 10px;">DOH-5139 06/24 Page 4 of 5 </p>
    <div style="border:1px solid black; margin-bottom:10px">
        <p class="lg semiBold" style="text-align: center;">PART IV – INFORMATION ABOUT WORK YOU DID IN THE PAST 5 YEARS </p>
        <p class="lg italic" style="text-align: center;margin:0;padding:0; margin-bottom:10px; margin-top:-17px">CONTINUED </p>
    </div>
     <!-- Page 5 section 1 -->
     <table style=" margin: 0;padding:0">
        <tr style=" margin: 0;padding:0;background-color: #c7c8ca">
            <th style="" class="th">Dates of Employment:</th>
            <th style="" class="th">Job Title:</th>
            <th style="" class="th">Type of Business:</th>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:3">
                <p>
                    <span class="sm semiBold" style="vertical-align: middle;" >From: </span> <input type="text"  class="border-btm " style="width:150px" name="start_employment_date_four"
                    value="{{date('m/d/Y',strtotime($start_employment_date_four))}}">
                </p>

                <p style=" margin: 0;padding:0">
                <span class="sm semiBold" style="vertical-align:middle" >To: </span> <input type="text" style="width:168px" class="border-btm xs" style="width:164px" name="end_employment_date_four"
                value="{{date('m/d/Y',strtotime($end_employment_date_four))}}">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_four}}" name="job_title_four"
                style=" height:34px;width:101%;" class="border-btm xs">
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Number of hours/week:  <input type="text" value="{{$hours_four}}" name="hours_four" style="width:35px;"
                class="border-btm xs"> </p>
            </td>
            <td style="margin: 0;padding:0">
                <input type="text" value="{{$type_business_four}}" name="type_business_four"
                       style=" height:34px;width:98%;" class="border-btm" >
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Rate of Pay:  <input type="text" value="{{$rate_pay_four}}" name="rate_pay_four"
                class="border-btm xs"> </p>
            </td>
        </tr>
        <tr style="padding: 3px;">
            <td colspan="3" class="sm" style="border:none !important">
                <table style="width: 100%;border:none !important" >
                    <tr>
                        <td style="width: 23%; vertical-align: top;border:none !important">
                            <label for="duties_one" class="sm" style="display: block;">Describe your basic duties:</label>
                        </td>
                        <td style="width: 77%;border:none !important;padding-top:13px">
                            <textarea name="duties_four"  style="width: 100%; min-height: 65px;">{{$duties_four}}</textarea>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style=" margin: 0;padding:0" class="sm">
            <td style=" margin: 0; padding: 0" colspan="3" class="sm">
                <div style="display: table; width: 77%;margin-left:5px;margin-bottom:5px;margin-top:-2px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom;width:50%  ">
                        During a typical day, how many hours did you:
                    </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom;">
                            <input type="text" value="{{$day_stand_four}}" style="width:70px;text-align:center" name="day_stand_four" class="border-btm">
                        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-left:6px">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom;">
                         <input type="text" value="{{$day_walk_four}}" name="day_walk_four" style="width:70px;text-align:center" class="border-btm">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom;padding-left:6px">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_four}}" name="day_sit_four" style="width:70px;text-align:center" class="border-btm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 75%;margin-left:5px;margin-bottom:3px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_four}}" name="lift_four" style="width:140px" class="border-btm">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_pounds_four}}" name="lift_pounds_four" style="width:170px"  class="noborder sm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;margin-left:5px;margin-bottom:1px">
                    <span style="display: table-cell; vertical-align: middle; padding-right: 10px;width:16%" class="sm">
                        Reason for leaving:
                    </span>
                    <span style="display: table-cell; vertical-align: middle;width:82%;">
                        <input type="text" value="{{$leaving_reason_four}}" style="width:100%" name="leaving_reason_four" class="noborder sm"  >
                    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>
    <!-- Page 5 section 2 -->
    <table style=" margin: 0;padding:0">
        <tr style=" margin: 0;padding:0;background-color: #c7c8ca">
            <th style="" class="th">Dates of Employment:</th>
            <th style="" class="th">Job Title:</th>
            <th style="" class="th">Type of Business:</th>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:3">
                <p>
                    <span class="sm semiBold" style="vertical-align: middle;" >From: </span> <input type="text"  class="border-btm " style="width:150px" name="start_employment_date_five"
                    value="{{date('m/d/Y',strtotime($start_employment_date_five))}}"  >
                </p>

                <p style=" margin: 0;padding:0">
                <span class="sm semiBold" style="vertical-align:middle" >To: </span> <input type="text" style="width:168px" class="border-btm xs" style="width:164px" name="end_employment_date_five"
                value="{{date('m/d/Y',strtotime($end_employment_date_five))}}">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_five}}" name="job_title_five"
                style=" height:34px;width:101%;" class="border-btm xs">
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Number of hours/week:  <input type="text" value="{{$hours_five}}" name="hours_five" style="width:35px;"
                class="border-btm xs"> </p>
            </td>
            <td style="margin: 0;padding:0">
                <input type="text" value="{{$type_business_five}}" name="type_business_five"
                       style=" height:34px;width:98%;" class="border-btm" >
                <p style=" margin-top: 4px;margin-bottom:2px;margin-left:3px;padding:0;height:25px;vertical-align:middle;" class="sm semiBold" >Rate of Pay:  <input type="text" value="{{$rate_pay_five}}" name="rate_pay_five"
                class="border-btm xs"> </p>
            </td>
        </tr>
        <tr style="padding: 3px;">
            <td colspan="3" class="sm" style="border:none !important">
                <table style="width: 100%;border:none !important" >
                    <tr>
                        <td style="width: 23%; vertical-align: top;border:none !important">
                            <label for="duties_one" class="sm" style="display: block;">Describe your basic duties:</label>
                        </td>
                        <td style="width: 77%;border:none !important;padding-top:13px">
                            <textarea name="duties_five" id="duties_five" style="width: 100%; min-height: 65px;">{{$duties_five}}</textarea>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr style=" margin: 0;padding:0" class="sm">
            <td style=" margin: 0; padding: 0" colspan="3" class="sm">
                <div style="display: table; width: 77%;margin-left:5px;margin-bottom:5px;margin-top:-2px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom;width:50%  ">
                        During a typical day, how many hours did you:
                    </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom;">
                            <input type="text" value="{{$day_stand_five}}" style="width:70px;text-align:center" name="day_stand_five" class="border-btm">
                        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-left:6px">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_walk_five}}" name="day_walk_five" style="width:70px;text-align:center" class="border-btm">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom;padding-left:6px">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_five}}" name="day_sit_five" style="width:70px;text-align:center" class="border-btm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 75%;margin-left:5px;margin-bottom:3px">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_five}}" name="lift_five" style="width:140px" class="border-btm">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: middle;" class="sm">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: middle;">
            <input type="text" value="{{$lift_pounds_five}}" name="lift_pounds_five" style="width:170px"  class="noborder sm">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;margin-left:5px;margin-bottom:1px">
                    <span style="display: table-cell; vertical-align: middle; padding-right: 10px;width:16%" class="sm">
                        Reason for leaving:
                    </span>
                    <span style="display: table-cell; vertical-align: middle;width:82%;">
                        <input type="text" value="{{$leaving_reason_five}}" style="width:100%" name="leaving_reason_five" class="noborder sm"  >
                    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>

    <div style="border:1px solid black; height:200px;padding-top:13px">
        <textarea style="width: 100%;padding-top:10px;padding-top:10px;padding-left:5px;height:170px" name="undef" class="noborder">{{$undef}}</textarea>
    </div>
    <br>
    <table>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0; margin-left:10px !important;margin-bottom:10px !important;padding-left:5px;vertical-align:middle; padding-bottom:5px">
                <span class="sm semiBold"> Name of person completeing form (Please Print):</span>
                <input type="text" value="{{$person_name}}" name="person_name"  style=" vertical-align: bottom;"
                       class="noborder">
            </td>
            <td style=" margin: 0; padding: 0; padding-left:5px;padding-bottom:5px">
                <span class="sm semiBold">Date:</span>
                <input type="text" class="noborder" name="form_date"  value="{{date('m/d/Y',strtotime($form_date))}}"   style=" vertical-align: bottom;">
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0;padding-left:5px;padding-bottom:5px" colspan="2">
                <span class="sm semiBold"> Telephone Number: </span> <input type="text" value="{{$person_tell}}" name="person_tell" style=" vertical-align: bottom;"
                                         class="noborder" >
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <hr>
    <p style="font-size: 8px;">DOH-5139 06/24 Page 5 of 5</p>

</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        //save this form using ajax
        $('#disability-form').submit(function (e) {
            e.preventDefault();
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.joinder') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type


                success: function (response) {
                    if (response.pdf_url) {
                        // Open the PDF file in a new tab or window
                        window.open(response.pdf_url, '_blank');
                    } else {
                        alert('Error in saving file');
                    }
                },
                error: function (response) {
                    alert('Error in saving file');
                }
            });
        });

    });
</script>
</body>

</html>

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

   

        body{
            font-family:  'info-normal' ;
            font-size: 13px;
        }

        .xs{
            font-size: 12px;
        }

        .xxs{
            font-size: 9px;
        }

        .sm{
            font-size: 14px;
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



        .custom-hr {
            height: 6px;
            /* Adjust the height as needed */
            border: none;
            background-color: black;
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
            <p style="display: table-cell; width: 50%;text-align: left;padding-bottom:5px;margin-bottom: 5px;" class="sm" >COMPLETED BY THE STATE
                DISABILITY REVIEW
                UNIT:</p>
        </div>
    </div>


    <div style="display: table; width: 100%;padding:0;margin: 0;background-color: rebeccapurple">
        <!-- Single Row for Both Sections -->
        <div style="display: table-row; width: 100%;background-color: peru;padding:0;margin: 0">
            <div style="display: table-cell; width: 50%;padding-top:5px;margin-top:5px !important;padding-right:5px !important">
                <p style=" width: 50%;margin-bottom:0px !important;" class="sm semiBold" >Name:</p>
                <div
                    style="display: table; width: 100%; vertical-align: bottom; text-align: start; margin: 0;">
                    <div  style="display: table-row; margin: 0; padding: 10px;">
                        <p   style="display: table-cell; vertical-align: bottom;">First:</p>
                        <input type="text" class="border-btm" name="first_name"   value="{{$first_name}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;">Middle:</p>
                        <input type="text" class="border-btm" name="middle_name" value="{{$middle_name}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;">Last:</p>
                        <input type="text" class="border-btm" name="last_name" value="{{$last_name}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;">SSN Number (last 4
                            digits):</p>
                        <input type="text" class="border-btm" name="ssn_last_4" value="{{$ssn_last_4}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;">Date Of Birth:</p>
                        <input type="text" class="border-btm" name="date_of_birth" value="{{$date_of_birth}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;">Telephone Number:</p>
                        <input type="text" class="border-btm" name="telephone_number" value="{{$telephone_number}}"
                               style="padding: 2px;">
                    </div>
                </div>
            </div>


            <!-- Second Section: 50% Width -->
            <div style="display: table-cell; width: 50%; background-color: #d1d2d4;padding-right: 10px;margin: 0">
                <div
                    style="display: table; width: 100%; vertical-align: bottom; text-align: start; margin: 0; padding: 10px;">

                    <div style="display: table-row;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;padding-top:7px ">Case Number:</p>
                        <input style="display: table-cell; padding: 4px;padding-top:7px" type="text" value="{{$case_number}}"
                               class="border-btm" name="case_number">
                    </div>
                    <div style="display: table-row;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;padding-top:7px">Client ID Number:</p>
                        <input style="display: table-cell; padding: 4px;padding-top:7px" type="text" value="{{$client_id_number}}"
                               class="border-btm" name="client_id_number">
                    </div>
                    <div style="display: table-row;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;padding-top:7px">Disability ID Number:</p>
                        <input style="display: table-cell;padding-top:7px" type="text" value="{{$disability_id_number}}"
                               class="border-btm" name="disability_id_number">
                    </div>
                    <div style="display: table-row;">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;padding-top:7px">Medicaid Application
                            date:</p>
                        <input style="display: table-cell; padding-top:7px" type="text" class="border-btm"
                               name="medicaid_application" value="{{$medicaid_application}}">
                    </div>
                    <div style="display: table-row; margin: 0; padding-left: 10px;padding-top:14px">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;padding-top:7px">Medicaid waiver?</p>
                        <div style="display: table-cell;padding-top:7px">
                            <input type="checkbox"
                                   name="medicaid_waiver_yes" {{isset($medicaid_waiver_yes) && $medicaid_waiver_yes == 'yes' ? 'checked' : ''}} style="vertical-align: bottom;">
                            Yes
                            <input type="checkbox"
                                   name="medicaid_waiver_no" {{isset($medicaid_waiver_no) && $medicaid_waiver_no == 'no' ? 'checked' : ''}} style="vertical-align: bottom;">
                            No
                        </div>
                    </div>
                    <div style="display: table-row; margin: 0; padding-left: 10px;padding-top:14px">
                        <p style="display: table-cell; width: 100%; vertical-align: bottom;padding-top:7px">Waiver type:</p>
                        <input style="display: table-cell; padding-top:7px" type="text" value="{{$waiver_type}}"
                               class="border-btm" name="waiver_type">
                    </div>
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
        <input type="text" value="{{$ssa_application_date}}" class="border-btm" name="ssa_application_date"
               style="display: table-cell; vertical-align: bottom;">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-left: 10px; padding-right: 10px;">
            SSA decision date: (month/year)</p>
        <input type="text" class="border-btm" name="ssa_decision_date" value="{{$ssa_decision_date}}"
               style="display: table-cell; vertical-align: bottom;">
    </div>

    <div style="display: table; width: 100%;padding-top:7px">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
            What was the decision?
        </p>
        <input type="text" value="{{$ssa_decision}}" class="border-btm" name="ssa_decision"
               style="display: table-cell; vertical-align: bottom; width: 85%;">
    </div>

    <div style="display: table; width: 100%;padding-top:7px">
        <div
            style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 5px; width: auto; min-width: 0;">
            <p style="margin: 0;">
                If denied for benefits, what was the reason (medical or non-medical)?
            </p>
        </div>
        <div style="display: table-cell; vertical-align: bottom; width: 100%;">
            <input type="text" value="{{$ssa_denial_reason}}" class="border-btm" name="ssa_denial_reason"
                   style="width: 90%;">
        </div>
    </div>


    <div style="display: table; width: 100%;padding-top:7px">
        <p style="display: table-cell; vertical-align: bottom; white-space: nowrap; padding-right: 10px; margin: 0;">
            Did you appeal the decision?
        </p>
        <div style="display: table-cell; vertical-align: bottom;">
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
        <input type="text" name="appeal_date" class="border-btm" value="{{$appeal_date}}"
               style="display: table-cell; vertical-align: bottom;">
    </div>
    <br>


    <table>
        <tr>
            <td>
                <p style="text-align: center !important;margin-top:0px" class="lg bold">
                    PART I – INFORMATION ABOUT YOUR MEDICAL CONDITIONS
                </p>
                <p class="sm">
                    A. Please list all of your medical conditions (diagnoses):
                </p>
                <textarea class="noborder" style="width: 100%;  height: 132px;"
                          name="medical_conditions">{{$medical_conditions}}</textarea>
            </td>
        </tr>
        <tr>
            <td>
                <p class="sm mt-0" >
                    B. How do your medical conditions affect your ability to function? (Please include any limitations
                    in your ability to perform activities of daily living and work-related activities.)
                </p>
                <textarea class="noborder" style="width: 100%; height: 132px;"
                          name="medical_condition_impact">{{$medical_condition_impact}}</textarea>
            </td>
        </tr>
        <tr>
            <td>
                <p class="sm mt-0">
                    C. Please list your medications (or attach a list).
                </p>
                <textarea class="noborder" style="width: 100%; height: 132px;"
                          name="medications">{{$medications}}</textarea>
            </td>
        </tr>
    </table>
    <hr>
    <p style="font-size: 10px;">DOH-5139 01/21  Page 1 of 5</p>

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
                    A. Do you have a primary care provider? <input type="checkbox"
                                                                   name="primary_care_provider_yes"
                                                                   {{isset($primary_care_provider_yes) && $primary_care_provider_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom;">
                    Yes
                    <input type="checkbox"
                           name="primary_care_provider_no"
                           {{isset($primary_care_provider_no) && $primary_care_provider_no == 'no' ? 'checked':''}} style="vertical-align: bottom">
                    No
                </p>
                <p class="sm" style="margin-left:10px;padding-left:10px; margin-top:4px">(If “Yes”, please provide name, address, phone number.)</p>
                <textarea
                    style="  border-bottom: 1px solid black;border-top: none;border-left: none;border-right: none; height: 65px;width:100%">{{$care_provider_text}}</textarea>
            </td>
        </tr>
        <tr style="height: 35px !important;padding:0 !important;" class="sm">
            <td style="height: 35px !important;padding:0 !important;" colspan="3">
                <p style="padding-left:5px;margin: 0;" class="sm">Date of last visit (month/year):
                    <input  style="width:350px; border-bottom: 1px solid black;" value="{{$primary_care_provider_details}}"   name="primary_care_provider_details" />
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:2px !important;" class="sm">
            <td style="height: 15px !important;padding:0 5px!important;" class="sm" colspan="3">
                B. Have you seen any other medical provider(s) within the past 12 months? <input
                    type="checkbox"
                    {{isset($medical_provider_yes) && $medical_provider_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                Yes
                <input
                    type="checkbox"
                    {{isset($medical_provider_no) && $medical_provider_no == 'no' ? 'checked':''}} style="vertical-align: bottom">No
                <br>

                <p style="padding: 0 ;margin: 0;" class="sm">(If “Yes”, please complete the section below.)</p><br>

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
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$medical_provider_1_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medical_provider_1_name">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Phone Number</p>
                <input type="text" class="noborder" name="medical_provider_1_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$medical_provider_1_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important; vertical-align: top; " rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$medical_provider_1_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medical_provider_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important">
            <td style="height: 15px !important;padding:0 3px !important" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$medical_provider_2_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_2_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding:0px;">Phone</p>
                <input type="text" class="noborder" name="medical_provider_2_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$medical_provider_2_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$medical_provider_2_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px!important;">
            <td style="height: 15px !important;padding:0 3px !important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$medical_provider_3_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medical_provider_3_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding: 0 0px;">Phone</p>
                <input type="text" class="noborder" name="medical_provider_3_phone" style="margin: 0;padding: 0 0px; font-size:10px !important"
                       value="{{$medical_provider_3_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$medical_provider_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="medical_provider_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medical_provider_3_reason">
            </td>
        </tr>
       
        <!-- Second................. -->
        <tr style="height: 15px !important;padding:2px !important;" class="sm">
            <td style="height: 15px !important;padding:0 5px!important;" class="sm" colspan="3">
                C. Have you received medical care in a hospital or other health care facility within the past 12 months? <input
                    type="checkbox"
                    {{isset($got_medicare_yes) && $got_medicare_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                Yes
                <input
                    type="checkbox"
                    {{isset($got_medicare_no) && $got_medicare_no == 'no' ? 'checked':''}} style="vertical-align: bottom">No
                <br>

                <p style="padding: 0 ;margin: 0;" class="sm">(If “Yes”, please complete the section below.)</p><br>

                <p style="padding: 0 ;margin: 0;padding-bottom:2px !important;margin-top:-10px"class="sm semiBold"  >
                Please list the name and address of all hospitals and other medical
                        facilities at which you have
                        sought treatment in the past 12 months.
                        (Continuation sheets are available.)
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important;margin:0;" class="sm">
            <td style="height: 15px !important;padding:0 3px !important;margin:0;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$medicare_rec_1_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medicare_rec_1_name">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Phone Number</p>
                <input type="text" class="noborder" name="medicare_rec_1_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$medicare_rec_1_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important; vertical-align: top; " rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$medicare_rec_1_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="medicare_rec_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0px !important">
            <td style="height: 15px !important;padding:0px 3px !important" colspan="2">
                <p style="margin: 0;padding: 0;">Reason for seeing:</p>
                <input type="text" value="{{$medicare_rec_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$medicare_rec_2_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_2_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding:0px;">Phone</p>
                <input type="text" class="noborder" name="medicare_rec_2_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$medicare_rec_2_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$medicare_rec_2_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px!important;">
            <td style="height: 15px !important;padding:0 3px !important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$medicare_rec_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$medicare_rec_3_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="medicare_rec_3_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding: 0 0px;">Phone</p>
                <input type="text" class="noborder" name="medicare_rec_3_phone" style="margin: 0;padding: 0 0px; font-size:10px !important"
                       value="{{$medicare_rec_3_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$medicare_rec_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="medicare_rec_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$medicare_rec_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="medicare_rec_3_reason">
            </td>
        </tr>
       <!-- Third -->

       <tr style="height: 15px !important;padding:2px !important;" class="sm">
            <td style="height: 15px !important;padding:0 5px!important;" class="sm" colspan="3">
                D. Have you received services from any agencies to assist you with your
                    impairment(s) within the
                    past 12 months <input
                    type="checkbox"
                     name="agency_assist_yes"
                    {{isset($agency_assist_yes) && $agency_assist_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                Yes
                <input
                    type="checkbox"
                     name="agency_assist_no"
                    {{isset($agency_assist_no) && $agency_assist_no == 'no' ? 'checked':''}} style="vertical-align: bottom">No
                <br>

                <p style="padding: 0 ;margin: 0;" class="sm">(If “Yes”, please complete the section below.)</p><br>

                <p style="padding: 0 ;margin: 0;padding-bottom:2px !important;margin-top:-10px"class="sm semiBold"  >
                Please list the name and address of all hospitals and other medical
                        facilities at which you have
                        sought treatment in the past 12 months.
                        (Continuation sheets are available.)
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px !important;margin:0;" class="sm">
            <td style="height: 15px !important;padding:0 3px !important;margin:0;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$agency_1_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="agency_1_name">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Phone Number</p>
                <input type="text" class="noborder" name="agency_1_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$agency_1_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important; vertical-align: top; " rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$agency_1_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%;"
                       name="agency_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0px !important">
            <td style="height: 15px !important;padding:0px 3px !important" colspan="2">
                <p style="margin: 0;padding: 0;">Reason for seeing:</p>
                <input type="text" value="{{$agency_1_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$agency_2_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_2_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding:0px;">Phone Number</p>
                <input type="text" class="noborder" name="agency_2_phone" style="margin: 0;padding: 0 0px;font-size:10px !important"
                       value="{{$agency_2_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$agency_2_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 3px!important;">
            <td style="height: 15px !important;padding:0 3px !important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$agency_2_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;">
                <p style="margin: 0;padding: 0 0px;">Name</p>
                <input type="text" value="{{$agency_3_name}}" class="noborder"
                       style="margin: 0;padding: 0 0px; font-size:10px !important"
                       name="agency_3_name">
            </td>
            <td style="height: 15px !important;padding:0 3px !important;">
                <p style="margin: 0;padding: 0 0px;">Phone</p>
                <input type="text" class="noborder" name="agency_3_phone" style="margin: 0;padding: 0 0px; font-size:10px !important"
                       value="{{$agency_3_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 3px!important;vertical-align: top;" rowspan="2">
                <p style="margin: 0;padding: 0 0px;">Address</p>
                <input type="text" value="{{$agency_3_address}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important;width:95%"
                       name="agency_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;">
            <td style="height: 15px !important;padding:0 3px!important;" colspan="2">
                <p style="margin: 0;padding: 0 0px;">Reason for seeing:</p>
                <input type="text" value="{{$agency_3_reason}}" class="noborder"
                       style="margin: 0;padding: 0 0px;font-size:10px !important"
                       name="agency_3_reason">
            </td>
        </tr>

    </table>
    <hr>
    <p style="font-size: 10px;">DOH-5139 01/21  Page 2 of 5</p>

    <table>
        <tr style="padding:3px !important">
            <td colspan="3" style="padding:3px !important;">
                <p class="lg semiBold" style="text-align: center;padding:0 !important; margin:0 !important">PART III – INFORMATION ABOUT YOUR EDUCATION AND LITERACY
                </b>
                <p class="sm" style="margin:7px 3px !important"  >If a disability determination cannot be made based on your medical conditions
                    alone, the factors
                    of education, literacy,
                    and work history will be used to determine disability</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">

                <div class="form-group">
                    <label for="schooling" class="sm semiBold" style="margin: 0;">A. <span class="sm semiBold"> What is the highest grade level of schooling that you
                        have completed?</span></label>
                    <input type="text" id="schooling" value="{{$schooling}}" name="schooling" class="border-btm"
                           style="width: 40%;">
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
                <p class="sm" style="margin-left:5%" >School/Program Name: <input type="text" value="{{$school_name}}"
                                               name="school_name"
                                               style="width:74%"
                                               class="border-btm"></p>
                <p class="sm "style="margin-left:5%" >Address: <input type="text" value="{{$school_address}}" name="school_address"
                                   class="border-btm" style="width:84%"></p>
                <p class="sm " style="margin-bottom:6px !important">Please complete the DOH-5173, Authorization for Release of Medical
                    Information Pursuant to HIPAA
                    form for this school/program.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="sm">
                C. Were (are) you involved in Special Education classes in school?
                <input  class="sm"  type="checkbox"
                       name="special_education_yes"
                       {{isset($special_education_yes) && $special_education_yes == 'yes' ? 'checked':''}}   style="vertical-align: bottom">
                Yes
                <input class="sm" type="checkbox"
                       name="special_education_no"
                       {{isset($special_education_no) && $special_education_no == 'no' ? 'checked':''}}   style="vertical-align: bottom">
                No
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>D. Did (do) you receive any special help or accommodations in school? <input
                        type="checkbox"
                        name="special_help_yes"
                        {{isset($special_help_yes) && $special_help_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                    Yes <input type="checkbox"
                               name="special_help_no"
                               {{isset($special_help_no) && $special_help_no == 'no' ? 'checked':''}}  style="vertical-align: bottom">
                    No
                <p>
                    (If “Yes”, please describe.)
                </p>

                <textarea class="border-btm"
                          name="special_help_text" style="height: 80px;">{{$special_help_text}} </textarea>
                <p>(If you have a copy of your IEP, please include it with the returned forms.)
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    E. Have you received any vocational training or additional education within
                    the past 12 months?
                    <br>
                    <input type="checkbox"
                           name="vocational_training_yes"
                           {{isset($vocational_training_yes) && $vocational_training_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                    Yes <input type="checkbox"
                               name="vocational_training_no"
                               {{isset($vocational_training_no) && $vocational_training_no == 'no' ? 'checked':''}}  style="vertical-align: bottom">
                    No
                    <br>
                    (If “Yes”, please describe.)
                    <br>

                </p>

                <textarea class="noborder"
                          name="vocational_training_text" style="height: 80px;">{{$vocational_training_text}}</textarea>

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    F. Can you read a simple message in any language (such as simple
                    instructions, or a list of
                    items)?
                    <br>
                    <input type="checkbox"
                           name="simple_message_yes"
                           {{isset($simple_message_yes) && $simple_message_yes== 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                    Yes <input type="checkbox"
                               name="simple_message_no"
                               {{isset($simple_message_no) && $simple_message_no == 'no' ? 'checked':''}}  style="vertical-align: bottom">
                    No
                    <br>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                G. Can you write a simple message in any language?
                <br>
                <input type="checkbox"
                       name="write_simple_message_yes"
                       {{isset($write_simple_message_yes) && $write_simple_message_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                Yes <input type="checkbox"
                           name="write_simple_message_no"
                           {{isset($write_simple_message_no) && $write_simple_message_no == 'no' ? 'checked':''}}  style="vertical-align: bottom">
                No
                <br>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    H. Was assistance or an interpreter necessary to complete this application?
                    <br>
                    <input type="checkbox"
                           name="interpreter_yes"
                           {{isset($interpreter_yes) && $interpreter_yes == 'yes' ? 'checked':''}}  style="vertical-align: bottom">
                    Yes <input type="checkbox"
                               name="interpreter_no"
                               {{isset($interpreter_no) && $interpreter_no == 'no' ? 'checked':''}}  style="vertical-align: bottom">
                    No
                    <br>
                    <br>
                    (If “Yes”, please indicate your primary language.)

                </p>

                <textarea class="noborder"
                          name="interpreter_text" style="height: 80px;">{{$interpreter_text}}</textarea>
            </td>
        </tr>
    </table>
    <hr>
    <p style="font-size: 8px;">DOH-5139 01/21  Page 3 of 5</p>

    <br>
    <br>
    <br>
    <table style="padding: 0; margin: 0;">
        <tr style="padding: 0; margin: 0;">
            <td style="padding: 0; margin: 0;">
                <h4 style="padding: 0; margin: 0;text-align: center">
                    PART IV – INFORMATION ABOUT WORK YOU DID IN THE PAST 15 YEARS
                </h4>
            </td>
        </tr>
        <tr style="padding: 0; margin: 0;">
            <td style="padding: 0; margin: 0;">
                <p style="padding: 0; margin: 0;">
                    Have you worked in the past 15 years?
                </p>
                <input type="checkbox" name="worked_fifteen_yes" style="padding: 0; margin: 0;"
                       {{isset($worked_fifteen_yes) && $worked_fifteen_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom;">
                Yes
                <input type="checkbox" name="worked_fifteen_no" style="padding: 0; margin: 0;"
                       {{isset($worked_fifteen_no) && $worked_fifteen_no == 'no' ? 'checked':''}} style="vertical-align: bottom;">
                No
                <br>
                <p style="padding: 0; margin: 0;">
                    If YES, in as much detail as possible, please list jobs (up to 5) that you
                    performed IN THE PAST 15
                    YEARS, starting with your
                    most recent job.
                </p>

                <br>
                <br>
            </td>
        </tr>
    </table>

    <br><br>
    <table style=" margin: 0;padding:0">
        <tr style=" margin: 0;padding:0;background-color: #c7c8ca">
            <th style=" margin: 0;padding:0">Dates of Employment</th>
            <th style=" margin: 0;padding:0">Job Title</th>
            <th style=" margin: 0;padding:0">Type of business</th>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:0">
                <p>
                    From: <input type="text" class="noborder" name="start_employment_date_one"
                                 value="{{$start_employment_date_one}}">
                </p>

                <p style=" margin: 0;padding:0">
                    to: <input type="text" class="noborder" name="end_employment_date_one"
                               value="{{$end_employment_date_one}}">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_one}}" name="job_title_one"
                       class="noborder">
                <br>
                <p style=" margin: 0;padding:0">Number of hours/week: <input type="text" value="{{$hours_one}}"
                                                                               name="hours_one" class="noborder"  style=" vertical-align: bottom;">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$type_business_one}}" name="type_business_one"
                       class="noborder">
                <br>
                <p style=" margin: 0;padding:0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_one}}" name="rate_pay_one"
                       class="noborder">

            </td>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:0" colspan="3">
                <p style=" margin: 0;padding:0">
                    Descirbe your basic duties:
                </p>
                <textarea class="noborder" name="duties_one">{{$duties_one}}</textarea>
            </td>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; ">
            During a typical day, how many hours did you:
        </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_stand}}" name="day_stand" class="noborder">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk}}" name="day_walk" class="noborder">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit}}" name="day_sit" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$lift_one}}" name="lift_one" class="noborder">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_one}}" name="lift_pounds_one" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;">
    <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
        Reason for leaving:
    </span>
                    <span style="display: table-cell; vertical-align: bottom;">
        <input type="text" value="{{$leaving_reason_one}}" name="leaving_reason_one" class="noborder">
    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr style=" margin: 0; padding: 0;background-color: #c7c8ca">
            <th style=" margin: 0; padding: 0">Dates of Employment</th>
            <th style=" margin: 0; padding: 0">Job Title</th>
            <th style=" margin: 0; padding: 0">Type of business</th>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0">
                <p style=" margin: 0; padding: 0">
                    From: <input type="text" class="noborder" name="start_employment_date_two"
                                 value="{{$start_employment_date_two}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="noborder" name="end_employment_date_two"
                               value="{{$end_employment_date_two}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_two}}" name="job_title_two"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_two}}"
                                                                               name="hours_two" class="noborder"  style=" vertical-align: bottom;">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_two}}" name="type_business_two"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_two}}" name="rate_pay_two"
                       class="noborder">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="noborder" name="duties_two">{{$duties_two}}</textarea>
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; ">
            During a typical day, how many hours did you:
        </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_stand_two}}" name="day_stand_two" class="noborder">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_two}}" name="day_walk_two" class="noborder">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_two}}" name="day_sit_two" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style="margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
                How much did you frequently lift?
            </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
                <input type="text" value="{{$lift_two}}" name="lift_two" class="noborder">
            </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
                <input type="text" value="{{$lift_pounds_two}}" name="lift_pounds_two" class="noborder">
            </span>
                    </div>
                </div>
            </td>

        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;">
    <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
        Reason for leaving:
    </span>
                    <span style="display: table-cell; vertical-align: bottom;">
        <input type="text" value="{{$leaving_reason_three}}" name="leaving_reason_three" class="noborder">
    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr style=" margin: 0; padding: 0;background-color: #c7c8ca">
            <th style=" margin: 0; padding: 0">Dates of Employment</th>
            <th style=" margin: 0; padding: 0">Job Title</th>
            <th style=" margin: 0; padding: 0">Type of business</th>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0">
                <p style=" margin: 0; padding: 0">
                    From: <input type="text" class="noborder"
                                 name="start_employment_date_three"
                                 value="{{$start_employment_date_three}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="noborder" name="end_employment_date_three"
                               value="{{$end_employment_date_three}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_three}}" name="job_title_three"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_three}}"
                                                                               name="hours_three"
                                                                               class="noborder"  style=" vertical-align: bottom;"></p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_three}}" name="type_business_three"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_three}}" name="rate_pay_three"
                       class="noborder">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="noborder" name="duties_three">{{$duties_three}}</textarea>
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom;">
            During a typical day, how many hours did you:
        </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_stand_three}}" name="day_stand_three" class="noborder">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_three}}" name="day_walk_three" class="noborder">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_three}}" name="day_sit_three" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
            How much did you frequently lift?
        </span>

                        <!-- Lift -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$lift_three}}" name="lift_three" class="noborder">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_three}}" name="lift_pounds_three" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style="margin: 0; padding: 0">
            <td style="margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;">
            <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
                Reason for leaving:
            </span>
                    <span style="display: table-cell; vertical-align: bottom;">
                <input type="text" value="{{$leaving_reason_three}}" name="leaving_reason_three" class="noborder">
            </span>
                </p>
            </td>
        </tr>

    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h3 style="text-align: center">PART IV</h3><br>
    <h5 style="text-align: center"> CONTINUED ON NEXT PAGE</h5>
    <hr>

    <p style="font-size: 8px;">DOH-5139 01/21  Page 4 of 5</p>

    <table>
        <tr style=" margin: 0; padding: 0;background-color: #c7c8ca">
            <th style=" margin: 0; padding: 0">Dates of Employment</th>
            <th style=" margin: 0; padding: 0">Job Title</th>
            <th style=" margin: 0; padding: 0">Type of business</th>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0">
                <p style=" margin: 0; padding: 0">
                    From: <input type="text" class="noborder" name="start_employment_date_four"
                                 value="{{$start_employment_date_four}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="noborder" name="end_employment_date_four"
                               value="{{$end_employment_date_four}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_four}}" name="job_title_four"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_four}}"
                                                                               name="hours_four" class="noborder"  style=" vertical-align: bottom;"></p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_four}}" name="type_business_four"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_four}}" name="rate_pay_four"
                       class="noborder">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="noborder" name="duties_four">{{$duties_four}}</textarea>
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; ">
            During a typical day, how many hours did you:
        </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_stand_four}}" name="day_stand_four" class="noborder">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_four}}" name="day_walk_four" class="noborder">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_four}}" name="day_sit_four" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
            How much did you frequently lift?
        </span>

                        <!-- Lift Input -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$lift_four}}" name="lift_four" class="noborder">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_four}}" name="lift_pounds_four" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Reason for leaving: <input type="text" value="{{$leaving_reason_four}}"
                                               name="leaving_reason_four" class="noborder">
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr style=" margin: 0; padding: 0;background-color: #c7c8ca">
            <th style=" margin: 0; padding: 0">Dates of Employment</th>
            <th style=" margin: 0; padding: 0">Job Title</th>
            <th style=" margin: 0; padding: 0">Type of business</th>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0">
                <p style=" margin: 0; padding: 0">
                    From: <input type="text" class="noborder" name="start_employment_date_five"
                                 value="{{$start_employment_date_five}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="noborder" name="end_employment_date_five"
                               value="{{$end_employment_date_five}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_five}}" name="job_title_five"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_five}}"
                                                                               name="hours_five" class="noborder"  style=" vertical-align: bottom;"></p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_five}}" name="type_business_five"
                       class="noborder">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_five}}" name="rate_pay_five"
                       class="noborder">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="noborder" name="duties_five">{{$duties_five}}</textarea>
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; ">
            During a typical day, how many hours did you:
        </span>

                        <!-- Stand -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Stand</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_stand_five}}" name="day_stand_five" class="noborder">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_five}}" name="day_walk_five" class="noborder">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_five}}" name="day_sit_five" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <div style="display: table; width: 100%;">
                    <div style="display: table-row;">
                        <!-- Introductory Text -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
            How much did you frequently lift
        </span>

                        <!-- Lift Input -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$lift_five}}" name="lift_five" class="noborder">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_five}}" name="lift_pounds_five" class="noborder">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style="display: table; margin: 0; padding: 0; width: 100%;">
    <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">
        Reason for leaving:
    </span>
                    <span style="display: table-cell; vertical-align: bottom;">
        <input type="text" value="{{$leaving_reason_five}}" name="leaving_reason_five" class="noborder">
    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>

    <table>
        <Textarea style="width: 100%" name="undef" class="noborder">{{$undef}}</Textarea>
    </table>
    <br>
    <table>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0">
                Name of person completeing form (Please Print):
                <input type="text" value="{{$person_name}}" name="person_name"  style=" vertical-align: bottom;"
                       class="noborder">
            </td>
            <td style=" margin: 0; padding: 0">
                Date:
                <input type="text" class="noborder" name="form_date" value="{{$form_date}}"  style=" vertical-align: bottom;">
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="2">
                Telephone Number: <input type="text" value="{{$person_tell}}" name="person_tell" style=" vertical-align: bottom;"
                                         class="noborder" >
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br><br>
    <br>
    <br><br>
    <br>
    <br><br>
    <br>

    <br>
    <br><br>
    <br>
    <br><br>
    <br>
    <br><br>
    <br>
    <br>
    <hr>

    <p style="font-size: 8px;">DOH-5139 01/21  Page 5 of 5</p>

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disability</title>
    <style>

        @font-face {
            font-family: 'OKMVMP-Info-Normal';
            src: url('fonts/OKMVMP-Info-Normal.ttf') format('truetype');
        }

        @font-face {
            font-family: 'OKMVMP-Info-Bold';
            src: url('fonts/OKMVMP-Info-Bold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Nimbus Sans';
            src: url('fonts/Nimbus Sans.ttf') format('truetype');
        }

      

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            font-size: 10px;
            text-align: start;
        }

        tr:first-child th {
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;


        }


        .custom-hr {
            height: 10px;
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
    </style>
</head>

<body>
<form id="disability-form">
    @csrf
    <input type="hidden" id=referral_id" name="referral_id">
    <div style="display: table; width: 100%;">
        <div style="display: table-row;">
            <p style="display: table-cell; width: 50%;">
                NEW YORK STATE DEPARTMENT OF HEALTH<br>
                State Disability Review Unit
            </p>
            <h2 style="display: table-cell; width: 50%; text-align: right;">
                Disability Questionnaire
            </h2>
        </div>
    </div>


    <hr class="custom-hr">
    <div style="display: table;width: 100%;padding:0;margin: 0;">
        <div style="display: table-row; width: 100%;vertical-align: center;">
            <h6 style="display: table-cell; width: 50%;padding:10px 0 0 20px;">Name:</h6>
            <h6 style="display: table-cell; width: 50%;text-align: left;padding:0;margin: 0; ">COMPLETED BY THE STATE
                DISABILITY REVIEW
                UNIT:</h6>
        </div>
    </div>


    <div style="display: table; width: 100%;padding:0;margin: 0;background-color: rebeccapurple">
        <!-- Single Row for Both Sections -->
        <div style="display: table-row; width: 100%;background-color: peru;padding:0;margin: 0">

            <div style="display: table-cell; width: 50%;padding:0;margin: 0">
                <div
                    style="display: table; width: 100%; vertical-align: middle; text-align: start; margin: 0; padding: 10px;">

                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">First:</h6>
                        <input type="text" class="no-border" name="first_name" value="{{$first_name}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Middle:</h6>
                        <input type="text" class="no-border" name="middle_name" value="{{$middle_name}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Last:</h6>
                        <input type="text" class="no-border" name="last_name" value="{{$last_name}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">SSN Number (last 4
                            digits):</h6>
                        <input type="text" class="no-border" name="ssn_last_4" value="{{$ssn_last_4}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Date Of Birth:</h6>
                        <input type="text" class="no-border" name="date_of_birth" value="{{$date_of_birth}}"
                               style="padding: 2px;">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Telephone Number:</h6>
                        <input type="text" class="no-border" name="telephone_number" value="{{$telephone_number}}"
                               style="padding: 2px;">
                    </div>
                </div>
            </div>


            <!-- Second Section: 50% Width -->
            <div style="display: table-cell; width: 50%; background-color: #d1d2d4;padding-right: 10px;margin: 0">
                <div
                    style="display: table; width: 100%; vertical-align: middle; text-align: start; margin: 0; padding: 10px;">

                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Case Number:</h6>
                        <input style="display: table-cell; padding: 4px;" type="text" value="{{$case_number}}"
                               class="no-border" name="case_number">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Client ID Number:</h6>
                        <input style="display: table-cell; padding: 4px;" type="text" value="{{$client_id_number}}"
                               class="no-border" name="client_id_number">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Disability ID Number:</h6>
                        <input style="display: table-cell; padding: 4px;" type="text" value="{{$disability_id_number}}"
                               class="no-border" name="disability_id_number">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Medicaid Application
                            date:</h6>
                        <input style="display: table-cell; padding: 4px;" type="text" class="no-border"
                               name="medicaid_application" value="{{$medicaid_application}}">
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Medicaid waiver?</h6>
                        <div style="display: table-cell;">
                            <input type="checkbox"
                                   name="medicaid_waiver_yes" {{isset($medicaid_waiver_yes) && $medicaid_waiver_yes == 'yes' ? 'checked' : ''}} style="vertical-align: bottom;">
                            Yes
                            <input type="checkbox"
                                   name="medicaid_waiver_no" {{isset($medicaid_waiver_no) && $medicaid_waiver_no == 'no' ? 'checked' : ''}} style="vertical-align: bottom;">
                            No
                        </div>
                    </div>
                    <div style="display: table-row; margin: 0; padding: 10px;">
                        <h6 style="display: table-cell; width: 100%; vertical-align: middle;">Waiver type:</h6>
                        <input style="display: table-cell; padding: 4px;" type="text" value="{{$waiver_type}}"
                               class="no-border" name="waiver_type">
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div style="display: table;">
        <h6 style="display: table-cell; vertical-align: middle; padding-right: 10px;">Have you ever applied to the
            Social Security Administration (SSA) for disability benefits?</h6>
        <div style="display: table-cell; vertical-align: bottom;">
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

    <div style="display: table; width: 100%;">
        <h6 style="display: table-cell; vertical-align: middle; white-space: nowrap; padding-right: 10px;font-size: 10px;">
            If “Yes”, when? (month/year)</h6>
        <input type="text" value="{{$ssa_application_date}}" class="no-border" name="ssa_application_date"
               style="display: table-cell; vertical-align: middle;">
        <h6 style="display: table-cell; vertical-align: middle; white-space: nowrap; padding-left: 10px; padding-right: 10px;font-size: 10px;">
            SSA decision date: (month/year)</h6>
        <input type="text" class="no-border" name="ssa_decision_date" value="{{$ssa_decision_date}}"
               style="display: table-cell; vertical-align: middle;">
    </div>

    <div style="display: table; width: 100%;">
        <h6 style="display: table-cell; vertical-align: middle; white-space: nowrap; padding-right: 10px; margin: 0;">
            What was the decision?
        </h6>
        <input type="text" value="{{$ssa_decision}}" class="no-border" name="ssa_decision"
               style="display: table-cell; vertical-align: middle; width: 80%;">
    </div>

    <div style="display: table; width: 100%;">
        <div
            style="display: table-cell; vertical-align: middle; white-space: nowrap; padding-right: 5px; width: auto; min-width: 0;">
            <h6 style="margin: 0;">
                If denied for benefits, what was the reason (medical or non-medical)?
            </h6>
        </div>
        <div style="display: table-cell; vertical-align: middle; width: 100%;">
            <input type="text" value="{{$ssa_denial_reason}}" class="no-border" name="ssa_denial_reason"
                   style="width: 100%;">
        </div>
    </div>


    <div style="display: table; width: 100%;">
        <h6 style="display: table-cell; vertical-align: middle; white-space: nowrap; padding-right: 10px; margin: 0;">
            Did you appeal the decision?
        </h6>
        <div style="display: table-cell; vertical-align: middle;">
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
        <h6 style="display: table-cell; vertical-align: middle; white-space: nowrap; padding-left: 10px; padding-right: 10px; margin: 0;">
            If “Yes”, when? (month/year)
        </h6>
        <input type="text" name="appeal_date" class="no-border" value="{{$appeal_date}}"
               style="display: table-cell; vertical-align: middle;">
    </div>
    <br>


    <table>
        <tr>
            <td>
                <h5 style="font-size: larger;text-align: center !important;">
                    PART I – INFORMATION ABOUT YOUR MEDICAL CONDITIONS
                </h5>
                <p style="font-size: larger;">
                    A. Please list all of your medical conditions (diagnoses):
                </p>
                <textarea class="no-border" style="width: 100%; font-size: larger; height: 105px;"
                          name="medical_conditions">{{$medical_conditions}}</textarea>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size: larger;">
                    B. How do your medical conditions affect your ability to function? (Please include any limitations
                    in your ability to perform activities of daily living and work-related activities.)
                </p>
                <textarea class="no-border" style="width: 100%; font-size: larger; height: 105px;"
                          name="medical_condition_impact">{{$medical_condition_impact}}</textarea>
            </td>
        </tr>
        <tr>
            <td>
                <p style="font-size: larger;">
                    C. Please list your medications (or attach a list).
                </p>
                <textarea class="no-border" style="width: 100%; font-size: larger; height:105px;"
                          name="medications">{{$medications}}</textarea>
            </td>
        </tr>
    </table>
    <hr>
    <p style="font-size: 8px;">DOH-5139 01/21  Page 1 of 5</p>

    <br>
    <table style="text-align: start !important;">
        <tr style="height: 15px !important;padding:0 !important;margin:0;text-align: start !important;">
            <td style="height: 15px !important;padding:0 !important;margin:0;text-align: start !important;" colspan="3">
                <h5 style="padding: 0 5px;margin: 0;text-align: center !important; font-size: larger;">
                    PART II — INFORMATION ABOUT YOUR MEDICAL RECORDS
                </h5>
                <p style="padding: 0 5px;margin: 0;"><b>In order to make a disability determination, current medical
                        evidence
                        is
                        needed to evaluate your
                        physical and/or mental
                        impairments. If you have not seen a medical provider for your impairment(s)
                        within the past 12
                        months, a consultative exam
                        may be arranged for you by the local agency.</b>
                </p>
            </td>
        </tr>

        <tr style="height: 15px !important;padding:0 !important;">
            <td style="height: 15px !important;padding:0 !important;" colspan="3">
                <p style="padding: 0 5px;margin: 0;">
                    A. Do you have a primary care provider? <input type="checkbox"
                                                                   name="primary_care_provider_yes"
                                                                   {{isset($primary_care_provider_yes) && $primary_care_provider_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                    Yes
                    <input type="checkbox"
                           name="primary_care_provider_no"
                           {{isset($primary_care_provider_no) && $primary_care_provider_no == 'no' ? 'checked':''}} style="vertical-align: bottom">
                    No
                </p>
                <p style="padding: 0 5px;margin: 0;">(If “Yes”, please provide name, address, phone number.)</p>
                <textarea
                    style="  border-bottom: 1px solid black;border-top: none;border-left: none;border-right: none;font-size: larger; height: 50px;">{{$care_provider_text}}</textarea>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 !important;">
            <td style="height: 15px !important;padding:0 !important;" colspan="3">
                <p style="padding: 0 5px;margin: 0;">Date of last visit (month/year):
                    <textarea class="no-border"
                              name="primary_care_provider_details">{{$primary_care_provider_details}}</textarea>
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 !important;">
            <td style="height: 15px !important;padding:0 5px!important;" colspan="3">
                B. Have you seen any other medical provider(s) within the past 12 months? <input
                    type="checkbox"
                    {{isset($medical_provider_yes) && $medical_provider_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                Yes
                <input
                    type="checkbox"
                    {{isset($medical_provider_no) && $medical_provider_no == 'no' ? 'checked':''}} style="vertical-align: bottom">No
                <br>

                <p style="padding: 0 ;margin: 0;">(If “Yes”, please complete the section below.)</p><br>

                <b style="padding: 0 ;margin: 0;">
                    Please list the name, address, and phone number of all medical providers you
                    have seen for the past
                    12 months (for example
                    physicians, nurse practitioners/physician assistants, mental health
                    counselors,
                    physical/occupational/speech therapists,
                    audiologists, etc.). (Continuation sheets are available.)
                </b>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px !important;margin:0;">
            <td style="height: 15px !important;padding:0 5px !important;margin:0;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$medical_provider_1_name}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_1_name">
            </td>
            <td style="height: 15px !important;padding:0 5px!important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="medical_provider_1_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$medical_provider_1_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$medical_provider_1_address}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0  5px!important;">
            <td style="height: 15px !important;padding:0  5px!important;" colspan="2">
                <p>Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_1_reason}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0  5px!important;">
                <p>Name</p>
                <input type="text" value="{{$medical_provider_2_name}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_2_name">
            </td>
            <td style="height: 15px !important;padding:0 !important;">
                <p>Phone</p>
                <input type="text" class="no-border" name="medical_provider_2_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$medical_provider_2_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 !important;" rowspan="2">
                <p>Address</p>
                <input type="text" value="{{$medical_provider_2_address}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 5px!important;" colspan="2">
                <p>Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_2_reason}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 5px!important;">
                <p>Name</p>
                <input type="text" value="{{$medical_provider_3_name}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_3_name">
            </td>
            <td style="height: 15px !important;padding:0 !important;">
                <p>Phone</p>
                <input type="text" class="no-border" name="medical_provider_3_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$medical_provider_3_phone}}">
            </td>
            <td style="height: 15px !important;padding:0 5px!important;" rowspan="2">
                <p>Address</p>
                <input type="text" value="{{$medical_provider_3_address}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_3_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 5px!important;" colspan="2">
                <p>Reason for seeing:</p>
                <input type="text" value="{{$medical_provider_3_reason}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medical_provider_3_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 5px!important;" colspan="3">
                <p style="margin: 0;padding: 0 5px;">
                    C. Have you received medical care in a hospital or other health care
                    facility within the past 12
                    months?
                    <input type="checkbox"
                           name="got_medicare_yes"
                           {{isset($got_medicare_yes) && $got_medicare_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">Yes
                    <input type="checkbox"
                           name="got_medicare_no"
                           {{isset($got_medicare_no) && $got_medicare_no == 'no' ? 'checked':''}} style="vertical-align: bottom">No
                </p>
                </p>

                <p style="margin: 0;padding: 0 5px;">
                    (If “Yes”, please complete the section below.)<br>
                </p>
                <br>
                <p style="margin: 0;padding: 0 5px;">
                    <b>Please list the name and address of all hospitals and other medical
                        facilities at which you have
                        sought treatment in the past 12 months. <br>
                        (Continuation sheets are available.)</b>
                </p>
            </td>
        </tr>
        <tr style="height: 15px !important;padding:0 5px!important;">
            <td style="height: 15px !important;padding:0 5px!important;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$medicare_rec_1_name}}" class="no-border" style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_1_name">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="medicare_rec_1_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$medicare_rec_1_phone}}">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$medicare_rec_1_address}}" class="no-border"
                       style="margin: 0;padding: 0 5px; "
                       name="medicare_rec_1_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding: 0 5px; !important;">
            <td style="height: 15px !important;padding: 0 5px; !important;" colspan="2">
                <p style="margin: 0;padding: 0 5px;">Reason for seeing:</p>
                <input type="text" value="{{$medicare_rec_1_reason}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_1_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding: 0 5px; !important;">
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$medicare_rec_2_name}}" class="no-border" style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_2_name">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="medicare_rec_2_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$medicare_rec_2_phone}}">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$medicare_rec_2_address}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_2_address">
            </td>
        </tr>
        <tr style="height: 15px !important;padding: 0 5px; !important;">
            <td style="height: 15px !important;padding: 0 5px; !important;" colspan="2">
                <p style="margin: 0;padding: 0 5px;">Reason for seeing:</p>
                <input type="text" value="{{$medicare_rec_2_reason}}" class="no-border"
                       style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_2_reason">
            </td>
        </tr>
        <tr style="height: 15px !important;padding: 0 5px; !important;">
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$medicare_rec_3_name}}" class="no-border" style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_3_name">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="medicare_rec_3_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$medicare_rec_3_phone}}">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$medicare_rec_3_address}}" style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_3_address" class="no-border">
            </td>
        </tr>
        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;" colspan="2">
                <p style="margin: 0;padding: 0 5px;">Reason for seeing:</p>
                <input type="text" value="{{$medicare_rec_3_reason}}" style="margin: 0;padding: 0 5px;"
                       name="medicare_rec_3_reason" class="no-border">
            </td>
        </tr>

        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;" colspan="3">
                <p style="margin: 0;padding: 0 5px;">
                    D. Have you received services from any agencies to assist you with your
                    impairment(s) within the
                    past 12 months
                    <input type="checkbox"
                           name="agency_assist_yes"
                           {{isset($agency_assist_yes) && $agency_assist_yes == 'yes' ? 'checked':''}} style="vertical-align: bottom">
                    Yes
                    <input type="checkbox"
                           name="agency_assist_no"
                           {{isset($agency_assist_no) && $agency_assist_no == 'no' ? 'checked':''}} style="vertical-align: bottom">No
                </p>

                <p style="margin: 0;padding: 0 5px;">
                    (If “Yes”, please complete the section below.)
                </p>
                <br>
                <p style="margin: 0;padding: 0 5px;">
                    <b>Please list the name and address of all hospitals and other medical
                        facilities at which you have
                        sought treatment in the past 12 months.
                        (Continuation sheets are available.)</b>
                </p>
            </td>
        </tr>
        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$agency_1_name}}" name="agency_1_name" style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="agency_1_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$agency_1_phone}}">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$agency_1_address}}" name="agency_1_address"
                       style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
        </tr>
        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;" colspan="2">
                <p style="margin: 0;padding: 0 5px;">Reason for seeing:</p>
                <input type="text" value="{{$agency_1_reason}}" name="agency_1_reason" style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
        </tr>
        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$agency_2_name}}" name="agency_2_name" style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="agency_2_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$agency_2_phone}}">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$agency_2_address}}" name="agency_2_address"
                       style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
        </tr>
        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;" colspan="2">
                <p style="margin: 0;padding: 0 5px;">Reason for seeing:</p>
                <input type="text" value="{{$agency_2_reason}}" name="agency_2_reason" style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
        </tr>
        <tr>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Name</p>
                <input type="text" value="{{$agency_3_name}}" name="agency_3_name" style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;">
                <p style="margin: 0;padding: 0 5px;">Phone</p>
                <input type="text" class="no-border" name="agency_3_phone" style="margin: 0;padding: 0 5px;"
                       value="{{$agency_3_phone}}">
            </td>
            <td style="height: 15px !important;padding: 0 5px; !important;" rowspan="2">
                <p style="margin: 0;padding: 0 5px;">Address</p>
                <input type="text" value="{{$agency_3_address}}" name="agency_3_address"
                       style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p style="margin: 0;padding: 0 5px;">Reason for seeing:</p>
                <input type="text" value="{{$agency_3_reason}}" name="agency_3_reason" style="margin: 0;padding: 0 5px;"
                       class="no-border">
            </td>
        </tr>
    </table>
    <hr>
    <p style="font-size: 8px;">DOH-5139 01/21  Page 2 of 5</p>

    <table>
        <tr>
            <td colspan="3">
                <b>PART III – INFORMATION ABOUT YOUR EDUCATION AND LITERACY
                </b>
                <p>If a disability determination cannot be made based on your medical conditions
                    alone, the factors
                    of education, literacy,
                    and work history will be used to determine disability</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">

                <div class="form-group">
                    <label for="schooling" style="margin: 0;">A. What is the highest grade level of schooling that you
                        have completed?</label>
                    <input type="text" id="schooling" value="{{$schooling}}" name="schooling" class="no-border"
                           style="width: 60%;">
                </div>


            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    B. If you have a child up to the age of 21 attending school or a vocational
                    program, please
                    provide the school or program’s name and address.
                </p>
                <p>School/Program Name: <input type="text" value="{{$school_name}}"
                                               name="school_name"
                                               class="no-border"></p>
                <p>Address: <input type="text" value="{{$school_address}}" name="school_address"
                                   class="no-border"></p>
                <p>Please complete the DOH-5173, Authorization for Release of Medical
                    Information Pursuant to HIPAA
                    form for this school/program.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                C. Were (are) you involved in Special Education classes in school?
                <input type="checkbox"
                       name="special_education_yes"
                       {{isset($special_education_yes) && $special_education_yes == 'yes' ? 'checked':''}}   style="vertical-align: bottom">
                Yes
                <input type="checkbox"
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

                <textarea class="no-border"
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

                <textarea class="no-border"
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

                <textarea class="no-border"
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
                    From: <input type="text" class="no-border" name="start_employment_date_one"
                                 value="{{$start_employment_date_one}}">
                </p>

                <p style=" margin: 0;padding:0">
                    to: <input type="text" class="no-border" name="end_employment_date_one"
                               value="{{$end_employment_date_one}}">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$job_title_one}}" name="job_title_one"
                       class="no-border">
                <br>
                <p style=" margin: 0;padding:0">Number of hours/week: <input type="text" value="{{$hours_one}}"
                                                                               name="hours_one" class="no-border"  style=" vertical-align: bottom;">
                </p>
            </td>
            <td style=" margin: 0;padding:0">
                <input type="text" value="{{$type_business_one}}" name="type_business_one"
                       class="no-border">
                <br>
                <p style=" margin: 0;padding:0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_one}}" name="rate_pay_one"
                       class="no-border">

            </td>
        </tr>
        <tr style=" margin: 0;padding:0">
            <td style=" margin: 0;padding:0" colspan="3">
                <p style=" margin: 0;padding:0">
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_one">{{$duties_one}}</textarea>
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
            <input type="text" value="{{$day_stand}}" name="day_stand" class="no-border">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk}}" name="day_walk" class="no-border">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit}}" name="day_sit" class="no-border">
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
            <input type="text" value="{{$lift_one}}" name="lift_one" class="no-border">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_one}}" name="lift_pounds_one" class="no-border">
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
        <input type="text" value="{{$leaving_reason_one}}" name="leaving_reason_one" class="no-border">
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
                    From: <input type="text" class="no-border" name="start_employment_date_two"
                                 value="{{$start_employment_date_two}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="no-border" name="end_employment_date_two"
                               value="{{$end_employment_date_two}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_two}}" name="job_title_two"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_two}}"
                                                                               name="hours_two" class="no-border"  style=" vertical-align: bottom;">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_two}}" name="type_business_two"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_two}}" name="rate_pay_two"
                       class="no-border">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_two">{{$duties_two}}</textarea>
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
            <input type="text" value="{{$day_stand_two}}" name="day_stand_two" class="no-border">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_two}}" name="day_walk_two" class="no-border">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_two}}" name="day_sit_two" class="no-border">
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
                <input type="text" value="{{$lift_two}}" name="lift_two" class="no-border">
            </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
                <input type="text" value="{{$lift_pounds_two}}" name="lift_pounds_two" class="no-border">
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
        <input type="text" value="{{$leaving_reason_three}}" name="leaving_reason_three" class="no-border">
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
                    From: <input type="text" class="no-border"
                                 name="start_employment_date_three"
                                 value="{{$start_employment_date_three}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="no-border" name="end_employment_date_three"
                               value="{{$end_employment_date_three}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_three}}" name="job_title_three"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_three}}"
                                                                               name="hours_three"
                                                                               class="no-border"  style=" vertical-align: bottom;"></p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_three}}" name="type_business_three"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_three}}" name="rate_pay_three"
                       class="no-border">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_three">{{$duties_three}}</textarea>
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
            <input type="text" value="{{$day_stand_three}}" name="day_stand_three" class="no-border">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_three}}" name="day_walk_three" class="no-border">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_three}}" name="day_sit_three" class="no-border">
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
            <input type="text" value="{{$lift_three}}" name="lift_three" class="no-border">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_three}}" name="lift_pounds_three" class="no-border">
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
                <input type="text" value="{{$leaving_reason_three}}" name="leaving_reason_three" class="no-border">
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
                    From: <input type="text" class="no-border" name="start_employment_date_four"
                                 value="{{$start_employment_date_four}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="no-border" name="end_employment_date_four"
                               value="{{$end_employment_date_four}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_four}}" name="job_title_four"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_four}}"
                                                                               name="hours_four" class="no-border"  style=" vertical-align: bottom;"></p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_four}}" name="type_business_four"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_four}}" name="rate_pay_four"
                       class="no-border">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_four">{{$duties_four}}</textarea>
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
            <input type="text" value="{{$day_stand_four}}" name="day_stand_four" class="no-border">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_four}}" name="day_walk_four" class="no-border">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_four}}" name="day_sit_four" class="no-border">
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
            <input type="text" value="{{$lift_four}}" name="lift_four" class="no-border">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_four}}" name="lift_pounds_four" class="no-border">
        </span>
                    </div>
                </div>

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Reason for leaving: <input type="text" value="{{$leaving_reason_four}}"
                                               name="leaving_reason_four" class="no-border">
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
                    From: <input type="text" class="no-border" name="start_employment_date_five"
                                 value="{{$start_employment_date_five}}">
                </p>

                <p style=" margin: 0; padding: 0">
                    to: <input type="text" class="no-border" name="end_employment_date_five"
                               value="{{$end_employment_date_five}}">
                </p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$job_title_five}}" name="job_title_five"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Number of hours/week: <input type="text" value="{{$hours_five}}"
                                                                               name="hours_five" class="no-border"  style=" vertical-align: bottom;"></p>
            </td>
            <td style=" margin: 0; padding: 0">
                <input type="text" value="{{$type_business_five}}" name="type_business_five"
                       class="no-border">
                <br>
                <p style=" margin: 0; padding: 0">Rate of Pay: </p>
                <input type="text" value="{{$rate_pay_five}}" name="rate_pay_five"
                       class="no-border">

            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="3">
                <p style=" margin: 0; padding: 0">
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_five">{{$duties_five}}</textarea>
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
            <input type="text" value="{{$day_stand_five}}" name="day_stand_five" class="no-border">
        </span>

                        <!-- Walk -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Walk</span>
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 20px;">
            <input type="text" value="{{$day_walk_five}}" name="day_walk_five" class="no-border">
        </span>

                        <!-- Sit -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">Sit</span>
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$day_sit_five}}" name="day_sit_five" class="no-border">
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
            <input type="text" value="{{$lift_five}}" name="lift_five" class="no-border">
        </span>

                        <!-- Pounds Label -->
                        <span style="display: table-cell; vertical-align: bottom; padding-right: 10px;">pounds</span>

                        <!-- Pounds Input -->
                        <span style="display: table-cell; vertical-align: bottom;">
            <input type="text" value="{{$lift_pounds_five}}" name="lift_pounds_five" class="no-border">
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
        <input type="text" value="{{$leaving_reason_five}}" name="leaving_reason_five" class="no-border">
    </span>
                </p>

            </td>
        </tr>
    </table>
    <br>

    <table>
        <Textarea style="width: 100%" name="undef" class="no-border">{{$undef}}</Textarea>
    </table>
    <br>
    <table>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0">
                Name of person completeing form (Please Print):
                <input type="text" value="{{$person_name}}" name="person_name"  style=" vertical-align: bottom;"
                       class="no-border">
            </td>
            <td style=" margin: 0; padding: 0">
                Date:
                <input type="text" class="no-border" name="form_date" value="{{$form_date}}"  style=" vertical-align: bottom;">
            </td>
        </tr>
        <tr style=" margin: 0; padding: 0">
            <td style=" margin: 0; padding: 0" colspan="2">
                Telephone Number: <input type="text" value="{{$person_tell}}" name="person_tell" style=" vertical-align: bottom;"
                                         class="no-border" >
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

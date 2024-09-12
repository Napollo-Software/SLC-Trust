<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disability</title>
    <style>
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
            font-size: 12px;
            /* Adjust the font size as needed */
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
            

        }

        .container-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            /* margin: 5px 0; */
            margin: 20px 0 10px 0;
            /* You can adjust this margin value as needed */
        }

        .checkbox-row label {
            margin-right: 20px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
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
            transform: translate(-50%, -5%);
        }


        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
        }



        .card-body {
            padding: 2px 16px;
        }
        td{
            font-size: 14px;
        }
        .no-border:focus{
            border-radius: 5px;
            padding: 4px 8px
        }
        

    </style>
</head>

<body>
<div class="card">
<form id="disability-form" method="POST" action="{{ route('save.disability') }}">
    @csrf
    <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
    <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
    <div class="container-row">
        <p>
            NEW YORK STATE DEPARTMENT OF HEALTH <br>
            State Disability Review Unit
        </p>
        <h4>Disability Questionnaire</h4>
    </div>
    <hr class="custom-hr">
    <div class="container-row">
        <div>
            <h4>Disability Form</h4>
            <h6 style="font-size: 14px">First Name</h6>
            <input type="text" class="no-border" name="first_name">
            <h6 style="font-size: 14px">Middle Name</h6>
            <input type="text" class="no-border" name="middle_name">
            <h6 style="font-size: 14px">Last Name</h6>
            <input type="text" class="no-border" name="last_name">
            <h6 style="font-size: 14px">SSN Number (last 4 digits)</h6>
            <input type="text" class="no-border" name="ssn_last_4">
            <h6 style="font-size: 14px">Date Of Birth</h6>
            <input type="date" class="no-border" name="date_of_birth">
            <h6 style="font-size: 14px">Telephone Number</h6>
            <input type="text" class="no-border" name="telephone_number">
        </div>
        <div>
            <h4>COMPLETED BY THE STATE DISABILITY REVIEW UNIT:</h4>
            <h6 style="font-size: 14px">Case Number</h6>
            <input type="text" class="no-border" name="case_number">
            <h6 style="font-size: 14px">Client ID Number</h6>
            <input type="text" class="no-border" name="client_id_number">
            <h6 style="font-size: 14px">Disability ID Number</h6>
            <input type="text" class="no-border" name="disability_id_number">
            <h6 style="font-size: 14px">Medicaid Application date</h6>
            <input type="date" class="no-border" name="medicaid_application" >
            <h6 style="font-size: 14px">Medicaid Waiver</h6>
            <input type="checkbox" class="no-border" name="medicaid_waiver_yes" value="yes" >Yes
            <input type="checkbox" class="no-border" name="medicaid_waiver_no" value="no" >No
            <h6 style="font-size: 14px">Waiver type</h6>
            <input type="text" class="no-border" name="waiver_type">
        </div>
    </div>

    <p>Have you ever applied to the Social Security Administration (SSA) for disability benefits?</p>
    <div class="checkbox-row">
        <label>
            <input type="checkbox" name="applied_for_ssa1"  value="yes">
            Yes
        </label>
        <label>
            <input type="checkbox" name="applied_for_ssa2" value="no">
            No
        </label>
    </div>
    <p>If “Yes”, when? (month/year) <input type="text" class="no-border" name="ssa_application_date"> SSA decision date:
        (month/year) <input
            type="text" class="no-border" name="ssa_decision_date"></p>
    <p>What was the decision <input type="text" class="no-border" name="ssa_decision"></p>
    <p>If denied for benefits, what was the reason (medical or non-medical)? <input type="text" class="no-border"
                                                                                    name="ssa_denial_reason"></p>
    <p>Did you appeal the decision?</p>
    <div class="checkbox-row">
        <label>
            <input type="checkbox" name="appealed_decision1" value="yes" class="show-when-yes">
            Yes
        </label>
        <label>
            <input type="checkbox" name="appealed_decision2" value="no" >
            No
        </label>
    </div>
    <div class="hidden-field">
        <p>If “Yes”, when? (month/year)</p>
        <input type="text" name="appeal_date" class="no-border">
    </div>

    <table>
        <tr>
            <td style="font-size: 14px">
                <b>
                    PART I – INFORMATION ABOUT YOUR MEDICAL CONDITIONS
                </b>
                <p>A. Please list all of your medical conditions (diagnoses):
                </p>
                <textarea class="no-border" style="width: 100%" name="medical_conditions"></textarea>
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>
                    B. How do your medical conditions affect your ability to function? (Please include any limitations
                    in your ability to perform activities
                    of daily living and work-related activities.)
                </p>
                <textarea class="no-border" style="width: 100%" name="medical_condition_impact"></textarea>
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">

                <p>
                    C. Please list your medications (or attach a list).

                </p>
                <textarea class="no-border" style="width: 100%" name="medications"></textarea>
            </td>
        </tr>
    </table>

    <br>
    <table>
        <tr >
            <td colspan="3" style="font-size: 14px">
                <b>
                    PART I INFORMATION ABOUT YOUR MEDICAL RECORDS
                </b>
                <p>In order to make a disability determination, current medical evidence is needed to evaluate your
                    physical and/or mental
                    impairments. If you have not seen a medical provider for your impairment(s) within the past 12
                    months, a consultative exam
                    may be arranged for you by the local agency.
                </p>
            </td>
        </tr>

        <tr>
            <td colspan="3" style="font-size: 14px">
                <p>
                    A. Do you have a primary care provider? <input type="checkbox" name="primary_care_provider_yes" value="yes"> yes
                    <input type="checkbox" name="primary_care_provider_no" value="no"> no
                </p>
                <p>(If “Yes”, please provide name, address, phone number.)</p>
                <textarea class="no-border" style="width: 100%" name="care_provider_text"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 14px">
                <p>Date of last visit (mont/year):
                    <textarea class="no-border" name="primary_care_provider_details"></textarea>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 14px">
                B. Have you seen any other medical provider(s) within the past 12 months? <input type="checkbox" name="medical_provider_yes" value="yes"> Yes
                <input type="checkbox" name="medical_provider_no" value="no">No
                <br>
                <p>(If “Yes”, please complete the section below.)</p>
                {{-- <br> --}}
                <b>
                    Please list the name, address, and phone number of all medical providers you have seen for the past
                    12 months (for example
                    physicians, nurse practitioners/physician assistants, mental health counselors,
                    physical/occupational/speech therapists,
                    audiologists, etc.). (Continuation sheets are available.)
                </b>
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>Name</p>
                <input type="text" class="no-border" name="medical_provider_1_name">
            </td>
            <td style="font-size: 14px">
                <p>Phone</p>
                <input type="number" class="no-border" name="medical_provider_1_phone">
            </td>
            <td rowspan="2" style="font-size: 14px">
                <p>Address</p>
                <input type="text" class="no-border" name="medical_provider_1_address">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 14px">
                <p>Reason for seeing:</p>
                <input type="text" class="no-border" name="medical_provider_1_reason">
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>Name</p>
                <input type="text" class="no-border" name="medical_provider_2_name">
            </td>
            <td style="font-size: 14px">
                <p>Phone</p>
                <input type="number" class="no-border" name="medical_provider_2_phone">
            </td>
            <td rowspan="2" style="font-size: 14px">
                <p>Address</p>
                <input type="text" class="no-border" name="medical_provider_2_address">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 14px">
                <p>Reason for seeing:</p>
                <input type="text" class="no-border" name="medical_provider_2_reason">
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>Name</p>
                <input type="text" class="no-border" name="medical_provider_3_name">
            </td>
            <td style="font-size: 14px">
                <p>Phone</p>
                <input type="number" class="no-border" name="medical_provider_3_phone">
            </td>
            <td rowspan="2" style="font-size: 14px">
                <p>Address</p>
                <input type="text" class="no-border" name="medical_provider_3_address">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 14px">
                <p>Reason for seeing:</p>
                <input type="text" class="no-border" name="medical_provider_3_reason">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 14px">
                <p>
                    C. Have you received medical care in a hospital or other health care facility within the past 12
                    months?
                    <input type="checkbox" name="got_medicare_yes" value="yes">Yes
                    <input type="checkbox" name="got_medicare_no" value="no">No
                </p>
                <br>
                <p>
                    (If “Yes”, please complete the section below.)
                </p>
                <br>
                <p>
                    Please list the name and address of all hospitals and other medical facilities at which you have
                    sought treatment in the past 12 months.
                    (Continuation sheets are available.)
                </p>
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>Name</p>
                <input type="text" class="no-border" name="medicare_rec_1_name">
            </td>
            <td style="font-size: 14px">
                <p>Phone</p>
                <input type="number" class="no-border" name="medicare_rec_1_phone">
            </td>
            <td rowspan="2" style="font-size: 14px">
                <p>Address</p>
                <input type="text" class="no-border" name="medicare_rec_1_address">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 14px">
                <p>Reason for seeing:</p>
                <input type="text" class="no-border" name="medicare_rec_1_reason">
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>Name</p>
                <input type="text" class="no-border" name="medicare_rec_2_name">
            </td>
            <td style="font-size: 14px">
                <p>Phone</p>
                <input type="number" class="no-border" name="medicare_rec_2_phone">
            </td>
            <td rowspan="2" style="font-size: 14px">
                <p>Address</p>
                <input type="text" class="no-border" name="medicare_rec_2_address">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 14px">
                <p>Reason for seeing:</p>
                <input type="text" class="no-border" name="medicare_rec_2_reason">
            </td>
        </tr>
        <tr>
            <td style="font-size: 14px">
                <p>Name</p>
                <input type="text" class="no-border" name="medicare_rec_3_name">
            </td>
            <td style="font-size: 14px">
                <p>Phone</p>
                <input type="number" class="no-border" name="medicare_rec_3_phone">
            </td>
            <td rowspan="2" style="font-size: 14px">
                <p>Address</p>
                <input type="text" name="medicare_rec_3_address" class="no-border">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 14px">
                <p>Reason for seeing:</p>
                <input type="text" name="medicare_rec_3_reason" class="no-border">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="3">
                <p>
                    D. Have you received services from any agencies to assist you with your impairment(s) within the
                    past 12 months
                    <input type="checkbox" name="agency_assist_yes" value="yes"> Yes
                    <input type="checkbox" name="agency_assist_no" value="no">No
                </p>
                <br>
                <p>
                    (If “Yes”, please complete the section below.)
                </p>
                <br>
                <p>
                    Please list the name and address of all hospitals and other medical facilities at which you have
                    sought treatment in the past 12 months.
                    (Continuation sheets are available.)
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Name</p>
                <input type="text" name="agency_1_name" class="no-border">
            </td>
            <td>
                <p>Phone</p>
                <input type="number" class="no-border" name="agency_1_phone">
            </td>
            <td rowspan="2">
                <p>Address</p>
                <input type="text" name="agency_1_address" class="no-border">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Reason for seeing:</p>
                <input type="text" name="agency_1_reason" class="no-border">
            </td>
        </tr>
        <tr>
            <td>
                <p>Name</p>
                <input type="text" name="agency_2_name" class="no-border">
            </td>
            <td>
                <p>Phone</p>
                <input type="number" class="no-border" name="agency_2_phone">
            </td>
            <td rowspan="2">
                <p>Address</p>
                <input type="text" name="agency_2_address" class="no-border">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Reason for seeing:</p>
                <input type="text" name="agency_2_reason" class="no-border">
            </td>
        </tr>
        <tr>
            <td>
                <p>Name</p>
                <input type="text" name="agency_3_name" class="no-border">
            </td>
            <td>
                <p>Phone</p>
                <input type="number" class="no-border" name="agency_3_phone">
            </td>
            <td rowspan="2">
                <p>Address</p>
                <input type="text" name="agency_3_address" class="no-border">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Reason for seeing:</p>
                <input type="text" name="agency_3_reason" class="no-border">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td colspan="3">
                <b>PART III – INFORMATION ABOUT YOUR EDUCATION AND LITERACY
                </b>
                <p>If a disability determination cannot be made based on your medical conditions alone, the factors
                    of education, literacy,
                    and work history will be used to determine disability</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    A. What is the highest grade level of schooling that you have completed?
                    <input type="text" name="schooling" class="no-border">
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    B. If you have a child up to the age of 21 attending school or a vocational program, please
                    provide the school or program’s name and address.
                </p>
                <p>School/Program Name: <input type="text" name="school_name" class="no-border"></p>
                <p>Address: <input type="text" name="school_address" class="no-border"></p>
                <p>Please complete the DOH-5173, Authorization for Release of Medical Information Pursuant to HIPAA
                    form for this school/program.
                </p>
            </td>
        </tr>
        <tr>
            <td>
                C. Were (are) you involved in Special Education classes in school?
                <input type="checkbox" class="no-border" name="special_education_yes" value="yes"> Yes
                <input type="checkbox" class="no-border" name="special_education_no" value="no"> No
            </td>
        </tr>
        <tr>
            <td>
                <p>D. Did (do) you receive any special help or accommodations in school? <input type="checkbox"
                                                                                                name="special_help_yes" value="yes">
                    Yes <input type="checkbox" name="special_help_no" value="no"> No
                <p>
                    (If “Yes”, please describe.)
                </p>

                <textarea class="no-border" name="special_help_text"></textarea>
                <p>(If you have a copy of your IEP, please include it with the returned forms.)
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    E. Have you received any vocational training or additional education within the past 12 months?
                    <br>
                    <input type="checkbox" name="vocational_training_yes" value="yes">
                    Yes <input type="checkbox" name="vocational_training_no"  value="no"> No
                    <br>
                    (If “Yes”, please describe.)

                </p>

                <textarea class="no-border" name="vocational_training_text"></textarea>

            </td>
        </tr>
        <tr>
            <td>
                <p>
                    F. Can you read a simple message in any language (such as simple instructions, or a list of
                    items)?
                    <br>
                    <input type="checkbox" name="simple_message_yes" value="yes">
                    Yes <input type="checkbox" name="simple_message_no"  value="no"> No
                    <br>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                G. Can you write a simple message in any language?
                <br>
                <input type="checkbox" name="write_simple_message_yes" value="yes">
                Yes <input type="checkbox" name="write_simple_message_no"  value="no"> No
                <br>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    H. Was assistance or an interpreter necessary to complete this application? <br>
                    <input type="checkbox" name="interpreter_yes" value="yes">
                    Yes <input type="checkbox" name="interpreter_no"  value="no"> No
                    <br>
                    (If “Yes”, please indicate your primary language.)

                </p>

                <textarea class="no-border" name="interpreter_text"></textarea>
            </td>
        </tr>
    </table>

    <br>
    <table>
        <tr>
            <td>
                <h4>
                    PART IV – INFORMATION ABOUT WORK YOU DID IN THE PAST 15 YEARS

                </h4>

            </td>
        </tr>
        <tr>
            <td>
                <p>
                    Have you worked in the past 15 years?
                </p>
                <input type="checkbox" name="worked_fifteen_yes" value="yes"> Yes
                <input type="checkbox" name="worked_fifteen_no"  value="no"> No
                <br>
                <p>If YES, in as much detail as possible, please list jobs (up to 5) that you performed IN THE PAST 15
                    YEARS, starting with your
                    most recent job. </p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>Dates of Employment</th>
            <th>Job Title</th>
            <th>Type of business</th>
        </tr>
        <tr>
            <td>
                <p>
                    From: <input type="date" class="no-border" name="start_employment_date_one">
                </p>
                <br>
                <p>
                    to: <input type="date" class="no-border" name="end_employment_date_one">
                </p>
            </td>
            <td>
                <input type="text" name="job_title_one" class="no-border">
                <br>
                <p>Number of hours/week: <input type="text" name="hours_one" class="no-border"></p>
            </td>
            <td>
                <input type="text" name="type_business_one" class="no-border">
                <br>
                <p>Rate of Pay: </p>
                <input type="text" name="rate_pay_one" class="no-border">

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_one"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p>During a typical day, how many hours did you:</p>
                    <p>Stand <input type="text" name="day_stand" class="no-border"></p>
                    <p>Walk <input type="text" name="day_walk" class="no-border"></p>
                    <p>Sit <input type="text" name="day_sit" class="no-border"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p> how much did you frequently lift</p>
                    <input type="text" name="lift_one" class="no-border">
                    <p>
                        pounds
                        <input type="text" name="lift_pounds_one" class="no-border">
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Reason for leaving: <input type="text" name="leaving_reason_one" class="no-border">
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>Dates of Employment</th>
            <th>Job Title</th>
            <th>Type of business</th>
        </tr>
        <tr>
            <td>
                <p>
                    From: <input type="date" class="no-border" name="start_employment_date_two">
                </p>
                <br>
                <p>
                    to: <input type="date" class="no-border" name="end_employment_date_two">
                </p>
            </td>
            <td>
                <input type="text" name="job_title_two" class="no-border">
                <br>
                <p>Number of hours/week: <input type="text" name="hours_two" class="no-border"></p>
            </td>
            <td>
                <input type="text" name="type_business_two" class="no-border">
                <br>
                <p>Rate of Pay: </p>
                <input type="text" name="rate_pay_two" class="no-border">

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_two"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p>During a typical day, how many hours did you:</p>
                    <p>Stand <input type="text" name="day_stand_two" class="no-border"></p>
                    <p>Walk <input type="text" name="day_walk_two" class="no-border"></p>
                    <p>Sit <input type="text" name="day_sit_two" class="no-border"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p> how much did you frequently lift</p>
                    <input type="text" name="lift_two" class="no-border">
                    <p>
                        pounds
                        <input type="text" name="lift_pounds_two" class="no-border">
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Reason for leaving: <input type="text" name="leaving_reason_two" class="no-border">
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>Dates of Employment</th>
            <th>Job Title</th>
            <th>Type of business</th>
        </tr>
        <tr>
            <td>
                <p>
                    From: <input type="date" class="no-border" name="start_employment_date_three">
                </p>
                <br>
                <p>
                    to: <input type="date" class="no-border" name="end_employment_date_three">
                </p>
            </td>
            <td>
                <input type="text" name="job_title_three" class="no-border">
                <br>
                <p>Number of hours/week: <input type="text" name="hours_three" class="no-border"></p>
            </td>
            <td>
                <input type="text" name="type_business_three" class="no-border">
                <br>
                <p>Rate of Pay: </p>
                <input type="text" name="rate_pay_three" class="no-border">

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_three"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p>During a typical day, how many hours did you:</p>
                    <p>Stand <input type="text" name="day_stand_three" class="no-border"></p>
                    <p>Walk <input type="text" name="day_walk_three" class="no-border"></p>
                    <p>Sit <input type="text" name="day_sit_three" class="no-border"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p> how much did you frequently lift</p>
                    <input type="text" name="lift_three" class="no-border">
                    <p>
                        pounds
                        <input type="text" name="lift_pounds_three" class="no-border">
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Reason for leaving: <input type="text" name="leaving_reason_three" class="no-border">
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>Dates of Employment</th>
            <th>Job Title</th>
            <th>Type of business</th>
        </tr>
        <tr>
            <td>
                <p>
                    From: <input type="date" class="no-border" name="start_employment_date_four">
                </p>
                <br>
                <p>
                    to: <input type="date" class="no-border" name="end_employment_date_four">
                </p>
            </td>
            <td>
                <input type="text" name="job_title_four" class="no-border">
                <br>
                <p>Number of hours/week: <input type="text" name="hours_four" class="no-border"></p>
            </td>
            <td>
                <input type="text" name="type_business_four" class="no-border">
                <br>
                <p>Rate of Pay: </p>
                <input type="text" name="rate_pay_four" class="no-border">

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_four"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p>During a typical day, how many hours did you:</p>
                    <p>Stand <input type="text" name="day_stand_four" class="no-border"></p>
                    <p>Walk <input type="text" name="day_walk_four" class="no-border"></p>
                    <p>Sit <input type="text" name="day_sit_four" class="no-border"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p> how much did you frequently lift</p>
                    <input type="text" name="lift_four" class="no-border">
                    <p>
                        pounds
                        <input type="text" name="lift_pounds_four" class="no-border">
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Reason for leaving: <input type="text" name="leaving_reason_four" class="no-border">
                </p>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <th>Dates of Employment</th>
            <th>Job Title</th>
            <th>Type of business</th>
        </tr>
        <tr>
            <td>
                <p>
                    From: <input type="date" class="no-border" name="start_employment_date_five">
                </p>
                <br>
                <p>
                    to: <input type="date" class="no-border" name="end_employment_date_five">
                </p>
            </td>
            <td>
                <input type="text" name="job_title_five" class="no-border">
                <br>
                <p>Number of hours/week: <input type="text" name="hours_five" class="no-border"></p>
            </td>
            <td>
                <input type="text" name="type_business_five" class="no-border">
                <br>
                <p>Rate of Pay: </p>
                <input type="text" name="rate_pay_five" class="no-border">

            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Descirbe your basic duties:
                </p>
                <textarea class="no-border" name="duties_five"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p>During a typical day, how many hours did you:</p>
                    <p>Stand <input type="text" name="day_stand_five" class="no-border"></p>
                    <p>Walk <input type="text" name="day_walk_five" class="no-border"></p>
                    <p>Sit <input type="text" name="day_sit_five" class="no-border"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="container-row">
                    <p> how much did you frequently lift</p>
                    <input type="text" name="lift_five" class="no-border">
                    <p>
                        pounds
                        <input type="text" name="lift_pounds_five" class="no-border">
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p>
                    Reason for leaving: <input type="text" name="leaving_reason_five" class="no-border">
                </p>
            </td>
        </tr>
    </table>
    <br>

    <table>
        <Textarea style="width: 100%" name="undef"></Textarea>
    </table>
    <br>
    <table>
        <tr>
            <td>
                Name of person completeing form (Please Print):
                <input type="text" name="person_name" class="no-border">
            </td>
            <td>
                Date:
                <input type="date" class="no-border" name="form_date">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                Telephone Number: <input type="text" name="person_tell" class="no-border">
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

        //save this form using ajax
        $('#disability-form').submit(function (e) {
            e.preventDefault();
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.disability') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type


                success: function (response) {
                    swal.fire({
                        title: 'Success!',
                        text: '5- DOH -5139 Disability FILLABLE Questionnaire has been saved successfully.',
                        icon: 'success',
                        confirmButtonText: 'Great!'
                    });

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

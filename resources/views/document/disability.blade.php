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
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
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

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }

        .no-border:focus{
            border-radius: 5px;
            padding: 4px 8px
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

        /* classes */
        *
        {
            margin:0;
            padding:0;
        }
        body
        {
            background:rgba(0, 0, 0, 0.06);
            font-family:'info-normal';
            font-size:14px;
        }
        .container{
            margin:50px
        }
        #disability-form{
            max-width: 900px;
            margin:auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding:30px;
            background:white
        }
        .form-row{
            display:flex;
            padding:8px 0px;
        }
        .row{
            display:flex;
            padding:5px 0px;
        }
        .form-row > .form-cell{
            width:100%
        }
        .text-right{
            text-align:right;
        }
        .text-left{
            text-align:left;
        }
        .text-center{
            text-align:center;
        }
        .vertical-top{
            vertical-align:top;
        }
        .flex-col{
            display:flex;
            flex-direction:column;
            padding:8px 0px;
        }
        .align-items-center{
            align-items:center;
        }
        .align-items-end{
            align-items:end;
        }
        .gap-5{
            gap:5px;
        }
        .gap-15{
            gap:15px
        }
        /* borders */
        .border-bold{
            border-bottom:7px solid;
        }
           .border-none{
            border:none !important;
        }
        /* padding */
        .p-0{
            padding:0px;
        }
        .pb-7{
            padding-bottom:6px;
        }
        .p-10{
            padding:10px;
        }
        .pt-10{
            padding-top:3rem;
        }
        .pb-10{
            padding-bottom:0.7rem;
        }
        .pl-5{
            padding-left:0.6rem;
        }
        .px-10{
            padding:0px 10px;
        }
        .px-5{
            padding:0px 5px;
        }
        .margin{
            margin:0px 60px 0px 0px;
        }
        /* margin */
        .mt-5{
            margin-top:1.5rem
        }
        /* inputs */
        input{
            border-bottom:2px solid !important;
            background:transparent;
            border:none;
            width:100%
        }
        input:focus{
            outline:none
        }
        input[type='checkbox'] {
            accent-color: black; 
        }
        input[type='checkbox'] {
            background-color: white;
            border: 1px solid black;
        }

        /* text */
        .text-lg{
            font-size:14px;
        }
        .text-base{
            font-size:13px;
        }
        /* font */
        .font-semibold{
            font-weight:700;
        }
        .font-bold{
            font-family:'Info-Bold';
            font-weight:700;
        }
        .w-full{
            width:100%;
        }
        .w-15{
            width:15%
        }
        .nowrap{
            white-space:nowrap;
        }

        /* table */
        table , tr , td , th{
            border:2px solid;
            padding: 8px;
        }
        th{
            text-align: left;
            background:rgba(0,0,0,0.2);
        }

        @media only screen and (max-width: 768px) {
            .form-row{
                flex-wrap:wrap;
            }
            .nowrap{
                white-space:wrap;
            }
            #disability-form{
                max-width:1200px;
                padding:20px;
            }
            .container{
                margin:10px
            }
            .margin{
                margin:0px 10px 0px 0px;
            }
            .w-15{
                padding:0px 10px;
                width:40%
            }
        }

        textarea{
            padding:10px;
        }
        .italic{
            font-family:'info_web-italic'
        }
    </style>
</head>

<body>
    <div class='container'>
        <form id="disability-form" method="POST" action="{{ route('save.disability') }}">
            @csrf
            <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
            <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
            <!-- header -->
            <div class='form-row align-items-end border-bold pb-7'>
                <div class='form-cell'>
                    <p>NEW YORK STATE DEPARTMENT OF HEALTH</p>
                    <p>State Disability Review Unit</p>
                </div>
                <div class='form-cell text-right'>
                    <p style='font-size:28px;line-height:1' class='font-bold'>Disability Questionnaire</p>
                </div>
            </div>
            <!-- name section -->
             <div class='form-row gap-15'>
                <div class='form-cell text-base pt-10'>
                    <label class='font-semibold text-lg'>Name</label>
                    <div class='row gap-5 align-items-end'>
                        <span>First:</span>
                        <input type='text' name='first_name'>    
                    </div>
                    <div class='row gap-5 align-items-end'>
                        <span>Middle:</span>
                        <input type='text' name='middle_name'>    
                    </div>
                    <div class='row gap-5 align-items-end'>
                        <span>Last:</span>
                        <input type='text' name='last_name'>    
                    </div>
                    <div class='row gap-5 align-items-end'>
                        <span class='nowrap'>SSN Number (last 4 digits):</span>
                        <input type='text' name="ssn_last_4">    
                    </div>
                    <div class='row gap-5 align-items-end'>
                        <span class='nowrap'>Date Of Birth:</span>
                        <input type='text' name="date_of_birth">    
                    </div>
                    <div class='row gap-5 align-items-end'>
                        <span class='nowrap'>Telephone Number:</span>
                        <input type='text'name="telephone_number">    
                    </div>
                </div>
                <div class='form-cell'>
                    <p style='padding-bottom:5px;padding-top:5px'>COMPLETED BY THE STATE DISABILITY REVIEW UNIT:</p>
                    <div class='form-cell p-10 mt-14' style='background-color:rgba(0,0,0,0.2)'>
                        <div class='row gap-5 text-base align-items-end' style='margin-top:10px'>
                            <span class='nowrap'>Case Number:</span>
                            <input type='text' name="case_number">    
                        </div>
                        <div class='row gap-5 text-base align-items-end'>
                            <span class='nowrap'> Client ID Number:</span>
                            <input type='text' name="client_id_number">    
                        </div>
                        <div class='row gap-5 text-base align-items-end'>
                            <span class='nowrap'> Disability ID Number:</span>
                            <input type='text' name="disability_id_number">    
                        </div>
                        <div class='row gap-5 text-base align-items-end'>
                            <span class='nowrap'> Medicaid Application date:</span>
                            <input type='text' name="medicaid_application">    
                        </div>
                        <div class='row gap-5 text-base align-items-center checkbox-group'>
                            <span class='nowrap'> Medicaid waiver?</span>
                            <div class='row p-0 align-items-center gap-5'>
                                <input type='checkbox' name="medicaid_waiver_yes" value="yes" class='chb'>
                                <label>Yes</label>
                            </div> 
                            <div class='row p-0 align-items-center gap-5'>
                                <input type='checkbox' name="medicaid_waiver_no" value="No" class='chb'>
                                <label>No</label>
                            </div> 
                        </div>
                        <div class='row gap-5 text-base align-items-end pb-10'>
                            <span class='nowrap'>Waiver type:</span>
                            <input type='text' name="waiver_type">    
                        </div>
                    </div>
                </div>
             </div>
            <div class='form-row gap-5 text-base align-items-center checkbox-group'>
                 <span class='nowrap'>Have you ever applied to the Social Security Administration (SSA) for disability benefits?</span>
                    <div class='row p-0 align-items-center gap-5'>
                        <input type='checkbox' name="applied_for_ssa1"  value="yes" class='chb'>
                        <label>Yes</label>
                    </div> 
                    <div class='row p-0 align-items-center gap-5'>
                        <input type='checkbox' name="applied_for_ssa2" value="no" class='chb'>
                        <label>No</label>
                    </div> 
            </div>
                <div class='form-row gap-15 text-base'>
                    <div class='form-cell'>
                        <div class='row p-0 gap-5'>
                            <span class='nowrap'>If “Yes”, when? (month/year)</span>
                            <input type='text' name="ssa_application_date">
                        </div>
                    </div>
                    <div class='form-cell gap-5'>
                        <div class='row p-0'>
                            <span class='nowrap'>SSA decision date: (month/year)</span>
                            <input type='text' name="ssa_decision_date" >
                        </div>
                    </div>
                </div>
                <div class='row gap-5 text-base align-items-end'>
                    <span class='nowrap'>What was the decision?</span>
                    <input type='text' name="ssa_decision">    
                </div>
                <div class='row gap-5 text-base align-items-end'>
                    <span class='nowrap'> If denied for benefits, what was the reason (medical or non-medical)?</span>
                    <input type='text' name="ssa_denial_reason">    
                </div>
                <div class='form-row gap-5 text-base align-items-center'>
                    <div class='form-cell'>
                        <div class='row p-0 gap-5 text-base align-items-center checkbox-group'>
                            <span class='nowrap'>Did you appeal the decision?</span>
                            <div class='row p-0 align-items-center gap-5'>
                                <input type='checkbox' name="appealed_decision1" value="yes" class='chb'>
                                <label>Yes</label>
                            </div> 
                            <div class='row p-0 align-items-center gap-5'>
                                <input type='checkbox' name="appealed_decision2" value="No" class='chb'>
                                <label>No</label>
                            </div> 
                        </div>
                    </div>
                    <div class='form-cell'>
                        <div class='row p-0 align-items-end'>
                            <span class='nowrap'>If “Yes”, when? (month/year) </span>
                            <input type='text' name="appeal_date">    
                        </div>
                    </div>
                </div>
                <table class='mt-5'>
                    <tr>
                        <td>
                            <div class='flex-col gap-15'>
                                <div class='p-0 text-center font-bold' style='font-size:20px'>PART I – INFORMATION ABOUT YOUR MEDICAL CONDITIONS</div>
                                <div class='flex-col gap-15'>
                                    <p class='text-left'>A. Please list all of your medical conditions (diagnoses):</p>
                                    <textarea name="medical_conditions" rows="10" cols=""></textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col gap-15'>
                                <p class='text-left'>B. How do your medical conditions affect your ability to function? (Please include any limitations in your ability to perform activities of daily living and work-related activities.)</p>
                                <textarea rows="10" cols="" name="medical_condition_impact"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col gap-15'>
                                <p class='text-left'>C. Please list your medications (or attach a list)</p>
                                <textarea rows="10" cols="" name="medications"></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
                <table class='mt-5'>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-5'>
                                <p class='p-0 text-center font-bold' style='font-size:20px'>PART II — INFORMATION ABOUT YOUR MEDICAL RECORDS</p>
                                <p class='text-left font-semibold'>In order to make a disability determination, current medical evidence is needed to evaluate your physical and/or mental impairments. If you
                                    have not seen a medical provider for your impairment(s) within the past 12 months, a consultative exam may be arranged for you by the local
                                    agency.
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                        <div class='flex-col gap-5'>
                            <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                <span class='nowrap'>A. Do you have a primary care provider? </span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="primary_care_provider_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="primary_care_provider_no" value="no" class='chb'>
                                    <label>No</label>
                                </div> 
                            </div>
                            <p class='text-left italic' style='padding-left:1.2rem'>(If “Yes”, please provide name, address, phone number.)</p>
                            <textarea rows="10" cols="" name="care_provider_text"></textarea>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row align-items-end gap-5'>
                                <span class='nowrap'>Date of last visit (month/year):</span>
                                <input type='text' name="primary_care_provider_details"> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-5'>
                                <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                    <span class='nowrap'>B. Have you seen any other medical provider(s) within the past 12 months? </span>
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="medical_provider_yes" value="yes" class='chb'>
                                        <label>Yes</label>
                                    </div> 
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="medical_provider_no" value="no" class='chb'>
                                        <label>No</label>
                                    </div> 
                                </div>
                                <div class='flex-col gap-15 p-0'>
                                    <p class='text-left p-0 italic' style='padding-left:1.2rem'>(If “Yes”, please complete the section below.)</p>
                                    <p class='text-left font-semibold'>
                                        Please list the name, address, and phone number of all medical providers you have seen for the past 12 months (for example physicians, nurse
                                        practitioners/physician assistants, mental health counselors, physical/occupational/speech therapists, audiologists, etc.). (Continuation sheets
                                        are available.)
                                    </p>
                                </div>
                                <textarea rows="10" cols=""></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="medical_provider_1_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="medical_provider_1_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="medical_provider_1_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="medical_provider_1_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="medical_provider_2_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="medical_provider_2_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="medical_provider_2_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="medical_provider_2_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="medical_provider_3_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="medical_provider_3_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="medical_provider_3_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="medical_provider_3_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-5'>
                                <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                    <span class='nowrap'>C. Have you received medical care in a hospital or other health care facility within the past 12 months? </span>
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="got_medicare_yes" value="yes" class='chb'>
                                        <label>Yes</label>
                                    </div> 
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="got_medicare_no" value="no" class='chb'>
                                        <label>No</label>
                                    </div> 
                                </div>
                                <div class='flex-col gap-15 p-0'>
                                    <p class='text-left p-0 italic' style='padding-left:1.2rem'> (If “Yes”, please complete the section below.)</p>
                                    <p class='text-left font-semibold'>
                                    Please list the name and address of all hospitals and other medical facilities at which you have sought treatment in the past 12 months.<br>
                                    (Continuation sheets are available.)
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="medicare_rec_1_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="medicare_rec_1_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="medicare_rec_1_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="medicare_rec_1_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="medicare_rec_2_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="medicare_rec_2_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="medicare_rec_2_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="medicare_rec_2_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="medicare_rec_3_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="medicare_rec_3_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="medicare_rec_3_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="medicare_rec_3_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-5'>
                                <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                    <span class='nowrap'>D. Have you received services from any agencies to assist you with your impairment(s) within the past 12 months? </span>
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="agency_assist_yes" value="yes" class='chb'>
                                        <label>Yes</label>
                                    </div> 
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="agency_assist_no" value="no" class='chb'>
                                        <label>No</label>
                                    </div> 
                                </div>
                                <div class='flex-col gap-15 p-0'>
                                    <p class='text-left p-0 italic' style='padding-left:1.2rem'> (If “Yes”, please complete the section below.)</p>
                                    <p class='text-left font-semibold'>
                                    Please list the name and address of any other agencies that you have seen for assistance with your medical conditions in the past 12 months
                                    (for example, vocational rehabilitation agencies, supported employment or housing agencies, case management agencies, etc.).
                                    </p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="agency_1_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="agency_1_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="agency_1_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="agency_1_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="agency_2_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="agency_2_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="agency_2_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="agency_2_reason">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Name:</p>
                                <input type='text'class='border-none' name="agency_3_name">
                            </div>
                        </td>
                        <td>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Phone Number:</p>
                                <input type='text'class='border-none' name="agency_3_phone">
                            </div>
                        </td>
                        <td rowspan='2' style='vertical-align:top'>
                            <div class='flex-col p-0'>
                                <p class='text-left'>Address:</p>
                                <input type='text'class='border-none' name="agency_3_address">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                            <div class='flex-col p-0'>
                                <p class='text-left'> Reason for seeing:</p>
                                <input type='text'class='border-none' name="agency_3_reason">
                            </div>
                        </td>
                    </tr>
                </table>
                <table class='mt-5'>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-5'>
                                <p class='p-0 text-center font-bold' style='font-size:20px'>PART III — INFORMATION ABOUT YOUR MEDICAL RECORDS</p>
                                <p class='text-left font-semibold If a disability determination cannot be made based o'> If a disability determination cannot be made based on your medical conditions alone, the factors of education, literacy, and work history will be
                                used to determine disability.
                                </p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row align-items-end gap-5'>
                                <span class='nowrap font-semibold'>A.  What is the highest grade level of schooling that you have completed?</span>
                                <input type='text' name='schooling'> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='flex-col'>
                                <p class='text-left'>B. If you have a child up to the age of 21 attending school or a vocational program, please provide the school or program’s name and address.</p>
                                <div class='form-row gap-5 align-items-end' style='margin:0px 40px'>
                                    <span class='nowrap'>School/Program Name:</span>
                                    <input type='text' name="school_name">
                                </div>
                                <div class='form-row gap-5 align-items-end' style='margin:0px 40px'>
                                    <span class='nowrap'> Address:</span>
                                    <input type='text' name="school_address"> <br>
                                </div>
                                <div class='form-row gap-5 align-items-end' style='margin:0px 40px 0px 90px'>
                                    <input type='text' name="school_address">  <br>
                                </div>
                                <p class='text-left italic' style='padding-top:1rem'>Please complete the DOH-5173, Authorization for Release of Medical Information Pursuant to HIPAA form for this school/program.</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class='form-row gap-5 text-base align-items-center checkbox-group'>
                            <span class='nowrap'>C. Were (are) you involved in Special Education classes in school? </span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="special_education_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="special_education_no" value="no" class='chb'>
                                    <label>No</label>
                                </div> 
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                        <div class='flex-col gap-5'>
                            <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                <span class='nowrap'>D. Did (do) you receive any special help or accommodations in school?</span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="special_help_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="special_help_no" value="no" class='chb'>
                                    <label>No</label>
                                </div> 
                                <span style='padding-left:1rem' class='italic'> (If “Yes”, please describe.)</span>
                            </div>
                            <textarea rows="10" cols="" name="special_help_text"></textarea>
                            <p class='text-left italic'>(If you have a copy of your IEP, please include it with the returned forms.)</p>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                        <div class='flex-col gap-5'>
                            <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                <span class='nowrap'>E. Have you received any vocational training or additional education within the past 12 months?</span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="vocational_training_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="vocational_training_no"  value="no" class='chb'>
                                    <label>No</label>
                                </div> 
                            </div>
                            <p class='text-left italic' style='padding-left:1.2rem'> (If “Yes”, please describe.)</p>
                            <textarea rows="10" cols="" name="vocational_training_text"></textarea>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <div class='form-row gap-5 text-base align-items-center checkbox-group'>
                            <span class='nowrap'>F. Can you read a simple message in any language (such as simple instructions, or a list of items)?  </span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="simple_message_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="simple_message_no"  value="no" class='chb'>
                                    <label>No</label>
                                </div> 
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='form-row gap-5 text-base align-items-center checkbox-group'>
                                <span class='nowrap'>G. Can you write a simple message in any language?</span>
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="write_simple_message_yes" value="yes" class='chb'>
                                        <label>Yes</label>
                                    </div> 
                                    <div class='row p-0 align-items-center gap-5'>
                                        <input type='checkbox' name="write_simple_message_no"  value="no" class='chb'>
                                        <label>No</label>
                                    </div> 
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                        <div class='flex-col gap-5'>
                            <div class='form-row p-0 gap-5 text-base align-items-center checkbox-group'>
                                <span class='nowrap'>H. Was assistance or an interpreter necessary to complete this application? </span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="interpreter_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="interpreter_no">
                                    <label>No</label>
                                </div> 
                            </div>
                            <p class='text-left italic' style='padding-left:1.2rem'>  (If “Yes”, please indicate your primary language.)</p>
                            <textarea rows="10" cols="" name="interpreter_text"></textarea>
                        </div>
                        </td>
                    </tr>
                </table>
                <div class='form-row mt-5' style='border:2px solid'>
                    <div class='flex-col w-full'>
                        <p class='font-bold text-center p-0 px-10' style='font-size:20px;'>
                            PART IV – INFORMATION ABOUT WORK YOU DID IN THE PAST 15 YEARS
                        </p>
                        <div class='form-row gap-5 text-base px-10' style='padding:0.3rem 0.6rem checkbox-group'>
                            <span class='nowrap text-left font-semibold'>G. Have you worked in the past 15 years?</span>
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="worked_fifteen_yes" value="yes" class='chb'>
                                    <label>Yes</label>
                                </div> 
                                <div class='row p-0 align-items-center gap-5'>
                                    <input type='checkbox' name="worked_fifteen_no"  value="no" class='chb'>
                                    <label>No</label>
                                </div> 
                        </div>
                        <p class='p-0 pl-5'>If YES, in as much detail as possible, please list jobs (up to 5) that you performed IN THE PAST 15 YEARS, starting with your most recent job.</p>
                    </div>
                </div>
                <table class='mt-5'>
                    <thead>
                        <tr>
                            <th>Dates of Employment:</th>
                            <th>Job Title:</th>
                            <th>Type of business:</th>
                        </tr>
                    </thead>
                    <tr class='border-bottom-none'>
                        <td rowspan='2' data-label='Dates of Employment'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>From:</span>
                                <input type='text' name="start_employment_date_one" class='margin'>
                            </div>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>To:</span>
                                <input type='text' name="end_employment_date_one" class='margin'>
                            </div>
                        </td>
                        <td class='vertical-top' data-label='Job Title'>
                            <input type="text" name="job_title_one" class="border-none">
                        </td>
                        <td class='vertical-top' data-label='Type of business'>
                            <input type="text" name="type_business_one" class="border-none">
                        </td>
                    </tr>
                    <tr>
                        <td data-label='Job Title'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Number of hours/week:</span>
                                <input type='text' name="hours_one" style='width:45%'>
                            </div>
                        </td>
                        <td data-label='Type of business'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Rate of Pay:</span>
                                <input type='text' name="rate_pay_one" class='margin'>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-15'>
                                <span class='nowrap'>
                                    Describe your basic duties:
                                </span>
                                <textarea name="duties_one" rows='5'></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <span class='form-row p-0'> During a typical day, how many hours did you:</span>
                                <div class='form-row p-0'>
                                    <div class='row p-0 gap-15 align-items-end w-15'>
                                        <span>Stand</span>
                                        <input type='text' name="day_stand">
                                    </div>
                                    <div class='row p-0 gap-15 align-items-end w-15'>
                                        <span>Walk</span>
                                        <input type='text' name="day_walk">
                                    </div>
                                    <div class='row p-0 gap-15 align-items-end w-15'>
                                        <span>Sit</span>
                                        <input type='text' name="day_sit">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <div class='row gap-15 align-items-end p-0'>
                                    <span class='nowrap'>How much did you frequently lift?</span>
                                    <input type='text' name="lift_one">
                                </div>
                                <div class='row gap-15 align-items-end p-0' style='width:15%'>
                                    <span>pounds</span>
                                    <input type="text" name="lift_pounds_one" class="border-bottom">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                                <div class='row gap-15 align-items-end p-0' style='width:50%'>
                                    <span class='nowrap' style='text-wrap:nowrap'>Reason for leaving:</span>
                                    <input style='padding-left:1.3rem' type="text" name="leaving_reason_one" class="border-bottom">
                                </div>
                        </td>
                    </tr>
                </table>
                <table class='mt-5'>
                    <tr>
                        <th>Dates of Employment:</th>
                        <th>Job Title:</th>
                        <th>Type of business:</th>
                    </tr>
                    <tr class='border-bottom-none'>
                        <td rowspan='2'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>From:</span>
                                <input type='text' class='margin' name="start_employment_date_two">
                            </div>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>To:</span>
                                <input type='text' class='margin' name="end_employment_date_two">
                            </div>
                        </td>
                        <td class='vertical-top'>
                        <input type="text" name="job_title_two" class="border-none">
                        </td>
                        <td class='vertical-top'>
                        <input type="text" name="type_business_two" class="border-none">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Number of hours/week:</span>
                                <input type='text' style='width:45%' name="hours_two">
                            </div>
                        </td>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Rate of Pay:</span>
                                <input type='text' class='margin' name="rate_pay_two">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-15'>
                                <span class='nowrap'>
                                    Describe your basic duties:
                                </span>
                                <textarea rows='5' name="duties_two"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <span class='form-row p-0'> During a typical day, how many hours did you:</span>
                                <div class='form-row p-0 gap-5 align-items-end w-15'>
                                    <span>Stand</span>
                                    <input type='text' name="day_stand_two">
                                </div>
                                <div class='form-row p-0 gap-5 align-items-end w-15'>
                                    <span>Walk</span>
                                    <input type='text' name="day_walk_two">
                                </div>
                                <div class='form-row p-0 gap-5 align-items-end w-15'>
                                    <span>Sit</span>
                                    <input type='text' name="day_sit_two">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <div class='row gap-15 align-items-end p-0'>
                                    <span class='nowrap'>How much did you frequently lift?</span>
                                    <input type='text' name="lift_two">
                                </div>
                                <div class='row gap-15 align-items-end p-0' style='width:15%'>
                                    <span>pounds</span>
                                    <input type="text" name="lift_pounds_two" class="border-bottom">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                                <div class='row gap-15 align-items-end p-0' style='width:50%'>
                                    <span class='nowrap' style='text-wrap:nowrap'>Reason for leaving:</span>
                                    <input style='padding-left:1.3rem' type="text" name="leaving_reason_two" class="no-border">
                                </div>
                        </td>
                    </tr>
                </table>
                <table class='mt-5'>
                    <tr>
                        <th>Dates of Employment:</th>
                        <th>Job Title:</th>
                        <th>Type of business:</th>
                    </tr>
                    <tr class='border-bottom-none'>
                        <td rowspan='2'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>From:</span>
                                <input type='text' class='margin' name="start_employment_date_three">
                            </div>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>To:</span>
                                <input type='text' class='margin' name="end_employment_date_three">
                            </div>
                        </td>
                        <td class='vertical-top'>
                            <input type="text" name="job_title_three" class="no-border">
                        </td>
                        <td class='vertical-top'>
                            <input type="text" name="type_business_three" class="no-border">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Number of hours/week:</span>
                                <input type='text' style='width:45%' name="hours_three">
                            </div>
                        </td>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Rate of Pay:</span>
                                <input type='text' class='margin' name="rate_pay_three">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-15'>
                                <span class='nowrap'>
                                    Describe your basic duties:
                                </span>
                                <textarea class="pl-5" rows='5' name="duties_three"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <span class='form-row p-0'> During a typical day, how many hours did you:</span>
                                <div class='form-row p-0 gap-5 align-items-end w-15' >
                                    <span>Stand</span>
                                    <input type='text' name="day_stand_three" >
                                </div>
                                <div class='form-row p-0 gap-5 align-items-end w-15' >
                                    <span>Walk</span>
                                    <input type='text' name="day_walk_three">
                                </div>
                                <div class='form-row p-0 gap-5 align-items-end w-15' >
                                    <span>Sit</span>
                                    <input type='text' name="day_sit_three">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <div class='row gap-15 align-items-end p-0'>
                                    <span class='nowrap'>How much did you frequently lift?</span>
                                    <input type='text' name="lift_three">
                                </div>
                                <div class='form-row gap-15 align-items-end p-0' style='width:15%'>
                                    <span>pounds</span>
                                    <input type="text" name="lift_pounds_three" class="border-bottom">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                                <div class='row gap-15 align-items-end p-0' style='width:50%'>
                                    <span class='nowrap' style='text-wrap:nowrap'>Reason for leaving:</span>
                                    <input style='padding-left:1.3rem' type="text" name="leaving_reason_three" class="no-border">
                                </div>
                        </td>
                    </tr>
                </table>
                <!-- <div class='flex-col text-center' style='font-size:25px;border-bottom:4px solid'>
                    <p class='font-bold'>Part IV</p>
                    <p>CONTINUED ON NEXT PAGE</p>
                </div> -->

                <!-- part four continues -->
                <!-- <div class='form-row mt-5' style='border:2px solid'>
                    <div class='flex-col w-full text-center ' style='font-size:20px'>
                        <p class='font-bold'>
                            PART IV – INFORMATION ABOUT WORK YOU DID IN THE PAST 5 YEARS
                        </p>
                        <p>CONTINUED</p>
                    </div>
                </div> -->
                <table class='mt-5'>
                    <tr>
                        <th>Dates of Employment:</th>
                        <th>Job Title:</th>
                        <th>Type of business:</th>
                    </tr>
                    <tr class='border-bottom-none'>
                        <td rowspan='2'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>From:</span>
                                <input type='text' class='margin' name="start_employment_date_four">
                            </div>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>To:</span>
                                <input type='text' class='margin' name="end_employment_date_four">
                            </div>
                        </td>
                        <td class='vertical-top'>
                        <input type="text" name="job_title_four" class="border-none">
                        </td>
                        <td class='vertical-top'>
                        <input type="number" name="type_business_four" class="no-border">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Number of hours/week:</span>
                                <input type='text' style='width:45%' name="hours_four">
                            </div>
                        </td>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Rate of Pay:</span>
                                <input type='text' class='margin' name="rate_pay_four">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-15'>
                                <span class='nowrap'>
                                    Describe your basic duties:
                                </span>
                                <textarea class="pl-5" rows='5' name="duties_four"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <span class='form-row p-0'> During a typical day, how many hours did you:</span>
                                <div class='form-row p-0 gap-15 align-items-end w-15'>
                                    <span>Stand</span>
                                    <input type='text' name="day_stand_four" >
                                </div>
                                <div class='form-row p-0 gap-15 align-items-end w-15'>
                                    <span>Walk</span>
                                    <input type='text' name="day_walk_four">
                                </div>
                                <div class='form-row p-0 gap-15 align-items-end w-15'>
                                    <span>Sit</span>
                                    <input type='text' name="day_sit_four">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <div class='row gap-15 align-items-end p-0'>
                                    <span class='nowrap'>How much did you frequently lift?</span>
                                    <input type='text' name="lift_four">
                                </div>
                                <div class='row gap-15 align-items-end p-0' style='width:15%'>
                                    <span>pounds</span>
                                    <input type="text" name="lift_pounds_four" class="border-bottom">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                                <div class='row gap-15 align-items-end p-0' style='width:50%'>
                                    <span class='nowrap' style='text-wrap:nowrap'>Reason for leaving:</span>
                                    <input style='padding-left:1.3rem' type="text" name="leaving_reason_four">
                                </div>
                        </td>
                    </tr>
                </table>
                <table class='mt-5'>
                    <tr>
                        <th>Dates of Employment:</th>
                        <th>Job Title:</th>
                        <th>Type of business:</th>
                    </tr>
                    <tr class='border-bottom-none'>
                        <td rowspan='2'>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>From:</span>
                                <input type='text' class='margin' name="start_employment_date_five">
                            </div>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='font-semibold'>To:</span>
                                <input type='text' class='margin' name="end_employment_date_five">
                            </div>
                        </td>
                        <td class='vertical-top'>
                        <input type="text" name="job_title_five" class="border-none">
                        </td>
                        <td class='vertical-top'>
                        <input type="text" name="type_business_five" class="no-border">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Number of hours/week:</span>
                                <input type='number' style='width:45%' name="hours_five">
                            </div>
                        </td>
                        <td>
                            <div class='form-row gap-5 align-items-end'>
                                <span class='nowrap font-semibold'>Rate of Pay:</span>
                                <input type='text' class='margin' name="rate_pay_five">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='flex-col gap-15'>
                                <span class='nowrap'>
                                    Describe your basic duties:
                                </span>
                                <textarea class="pl-5" rows='5' name="duties_five"></textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <span class='form-row p-0'> During a typical day, how many hours did you:</span>
                                <div class='form-row p-0 gap-5 align-items-end w-15'>
                                    <span>Stand</span>
                                    <input type='text' name="day_stand_five">
                                </div>
                                <div class='form-row p-0 gap-5 align-items-end w-15'>
                                    <span>Walk</span>
                                    <input type='text' name="day_walk_five">
                                </div>
                                <div class='form-row p-0 gap-5 align-items-end w-15'>
                                    <span>Sit</span>
                                    <input type='text' name="day_sit_five">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                            <div class='form-row gap-15 p-0'>
                                <div class='row gap-15 align-items-end p-0'>
                                    <span class='nowrap'>How much did you frequently lift?</span>
                                    <input type='text' name="lift_five">
                                </div>
                                <div class='row gap-15 align-items-end p-0' style='width:15%'>
                                    <span>pounds</span>
                                    <input type="text" name="lift_pounds_five" class="border-bottom">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                                <div class='row gap-15 align-items-end p-0' style='width:50%'>
                                    <span class='nowrap' style='text-wrap:nowrap'>Reason for leaving:</span>
                                    <input style='padding-left:1.3rem' type="text" name="leaving_reason_five" class="no-border">
                                </div>
                        </td>
                    </tr>
                </table>
                <div class='form-row'>
                    <textarea rows="15" name="undef" cols="" class='w-full' style='border:2px solid'></textarea>
                </div>
                <table>
                <tr>
                    <td colspan='2'>
                            <div class='form-row p-0'>
                                <span class='nowrap text-left font-semibold'>
                                    Name of person completeing form (Please Print):
                                </span>
                                <input style='padding-left:1.3rem' type="text" name="person_name" class="no-border">
                            </div>
                    </td>
                    <td>
                        <div class='form-row p-0'>
                            <span class='nowrap font-semibold'>
                                    Date:
                            </span>
                            <input style='padding-left:1.3rem' type="date" class="border-bottom" name="form_date">
                        </div> 
                    </td>
                </tr>
                <tr>
                    <td colspan='3'>
                        <span class='nowrap font-semibold '>Telephone Number:</span>
                        <input type="text" name="person_tell" class='nowrap' class="no-border">
                    </td>
                </tr>
                </table>
                <button type="submit" id="submit-button" class="submit-button mt-5">
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

        $(".chb").change(function() {
            const group = $(this).closest('.checkbox-group');    
            group.find(".chb").prop('checked', false);    
            $(this).prop('checked', true);
        });


        //save this form using ajax
        $('#disability-form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
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
</script>
</body>

</html>

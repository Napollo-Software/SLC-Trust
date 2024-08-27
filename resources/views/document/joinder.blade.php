<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1-Joinder Agreement</title>
    <style>
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
        }

        .submit-button:hover {
            background-color: #16b6d3; /* Light blue on hover */
        }

        .submit-button:focus {
            outline: none; /* Removing the outline on focus for cleaner look */
            box-shadow: 0 0 0 2px rgba(19, 75, 126, 0.25); /* Adding a subtle focus shadow with the dark blue color */
        }


        th,
        td {
            border: 1px solid black;
            padding: 8px;
            font-size: 10px;
            text-align: center;
        }

        tr:first-child th {
            font-size: 12px;
        }

        .no-border {
            background-color: rgb(204, 204, 204);
            border: none;

        }

        .container-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        h6 {
            margin: 5px 0;
        }

        .radio-row label {
            margin-right: 20px;
        }


        .form-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;

        }

        .form-row {
            flex: 0 0 calc(25% - 10px);
            margin-right: 10px;
            margin-bottom: 3px;
            margin-top: 3px;
        }

        .custom-input {
            width: 50%;
            background-color: #CCCCCC;
            border: none;
        }

        .custom-radio {
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
            transform: translate(-50%, -3%);
        }


        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4);
        }


        .card-body {
            padding: 2px 16px;
        }


    </style>
</head>

<body>

<div class="card">
    <form id="joinderForm" method="POST" action="{{ route('save.joinder') }}">
        @csrf
        <input type="hidden" id=referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">

        <div style="text-align: center;justify-content: center">
            <img src="{{ asset('images/intrustpit.png') }}" alt="Example Image">
        </div>
        <div style="text-align: center;">
            <div style="background-color: #16b6d3; width: fit-content; display: inline-block;">
                <h1 style="color: white; padding-left: 10px; padding-right: 10px;padding-top: 5px;padding-bottom: 5px">
                    JOINDER AGREEMENT</h1>
            </div>
        </div>
        <br>
        <br> <br>
        <br> <br>
        <br> <br>
        <br> <br>
        <br>
        <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
            <div style="display: table-row;">
                <div style="color: #16B7D4; display: table-cell; width:45%;text-align: right;"><b>TF :</b></div>
                <div style="display: table-cell; text-align: left;color:#134C7F;padding-left: 5px;">877-298-7878</div>
            </div>
        </div>

        <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
            <div style="display: table-row;">
                <div style="color: #16B7D4; display: table-cell; padding-left: 60px; font-size: 11px;">2 9 T R U S T
                </div>
            </div>
        </div>

        <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
            <div style="display: table-row;">
                <div style="color: #16B7D4; display: table-cell;width:45%;text-align: right;"><b>Tel :</b></div>
                <div style="display: table-cell; text-align: left;color:#134C7F;padding-left: 5px;">718-970-7878</div>
            </div>
        </div>

        <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
            <div style="display: table-row;">
                <div style="color: #16B7D4; display: table-cell;width:45%;text-align: right;"><b>Fax :</b></div>
                <div style="display: table-cell; text-align: left;color:#134C7F;padding-left: 5px;">646-904-8963</div>
            </div>
        </div>

        <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
            <div style="display: table-row;">
                <div style="display: table-cell;color:#134C7F;font-size: 11px">info@trustedsurplus.org</div>
            </div>
        </div>

        <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
            <div style="display: table-row;">
                <div style="color: #16B7D4; font-weight: bold; display: table-cell;"><b>trustedsurplus.org</b></div>
            </div>
        </div>
        <br>
        <hr>
        <div style="text-align: center">
            <p>
                TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST
            </p>
            <p>
                Joinder Agreement / Beneficiary Profile Sheet
            </p>
        </div>
        <div style="background-color:#daeff5">
            <p style="padding: 10px;text-align: justify;">
                This is a legal document. It is an agreement pertaining to a supplemental needs trust created pursuant
                to 42
                United States
                Code §1396. You are encouraged to seek independent, professional advice before signing this agreement.
                The
                undersigned
                hereby adopts, enrolls in and establishes a sub-trust account under the TRUSTED SURPLUS SOLUTIONS
                DISABILITY
                POOLED TRUST, dated February 13, 2023. The Trust is Irrevocable.
            </p>

            <p style="padding-bottom: 10px;padding-left: 10px">
                NOTE: All questions must be answered or your application will be delayed.

            </p>
        </div>
        <div style="color: #16b6d5">
            <p>
                <b>SPONSOR/BENEFICIARY INFORMATION</b>

            </p>
        </div>
        <p>
            The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may
            be contributed to the Trust.
        </p>
        <br>

        <div class="form-container">
            <label class="form-row" style="font-weight: bold">Legal Name:</label>
            <div class="form-row">
                <label>First Name</label>
                <input type="text" class="custom-input" name="sponsor_first_name" value="{{$referral->first_name}}">
            </div>
            <div class="form-row">
                <label>Middle</label>
                <input type="text" class="custom-input" name="sponsor_middle_name">
            </div>
            <div class="form-row">
                <label>Last</label>
                <input type="text" class="custom-input" name="sponsor_last_name" value="{{$referral->last_name}}">
            </div>
        </div>

        <div class="form-container"
             style="display: flex; justify-content: space-between;  max-width: fit-content; margin-top: 3px; align-items: center;">
            <!-- Marital Status Section -->
            <div>
                <label style="font-weight: bold">Marital Status:</label>
                <input type="checkbox" name="sponsor_marital_status1" value="Married"> Married
                <input type="checkbox" name="sponsor_marital_status2" value="Widowed"> Widowed
                <input type="checkbox" name="sponsor_marital_status3" value="Single"> Single
            </div>

            <!-- Gender Section -->
            <div>
                <input type="checkbox" name="gender" value="gender">
                <label>Gender</label>
                <input type="text" class="custom-input" name="sponsor_gender" value="{{$referral->gender}}"
                       style="width: 100px;">
            </div>
        </div>


        <div class="form-container">
            <div class="form-row">
                <label>SSN:</label>
                <input type="text" class="custom-input" name="sponsor_ssn" value="{{$referral->patient_ssn}}">
            </div>
            <div class="form-row">
                <label>Date of Birth:</label>
                <input type="date" class="custom-input" name="sponsor_dob" value="{{$referral->date_of_birth}}">
            </div>
        </div>

        <div class="form-row" style="display: flex; align-items: center;">
            <label>Citizen:</label>
            <div class="custom-radio">
                <input type="checkbox" name="sponsor_citizen1" value="Yes"> Yes
                <input type="checkbox" name="sponsor_citizen2" value="No"> No
            </div>
        </div>

        <div class="form-row" style="width: 100%">
            <label>Tel: Home
                <input type="text" class="custom-input" name="sponsor_tel_home" style="width: 30%"></label>

            <label>Cell:
                <input type="text" class="custom-input" name="sponsor_tel_cell"
                       value="{{$referral->phone_number}}"></label>

        </div>

        <div class="form-row">
            <label>Place of Birth</label>
            <input type="text" class="custom-input" name="sponsor_place_of_birth" style="width: 85%">
        </div>

        <div class="form-row">
            <div class="form-row">
                <label>Address:</label>
                <input type="text" class="custom-input" style="width: 90% !important;" name="sponsor_address"
                       value="{{$referral->address}}">
            </div>
        </div>

        <div class="form-row">
            <label>Apt#</label>
            <input type="text" class="custom-input" name="sponsor_apt" value="{{$referral->apt_suite}}"
                   style="width: 90%">
        </div>

        <div class="form-container">
            <div class="form-row">
                <label>State</label>
                <input type="text" class="custom-input" name="sponsor_state" value="{{$referral->state}}"
                       style="width:auto">
            </div>
            <div class="form-row">
                <label>City</label>
                <input type="text" class="custom-input" name="sponsor_city" value="{{$referral->city}}"
                       style="width:auto">
            </div>
            <div class="form-row">
                <label>Country</label>
                <input type="text" class="custom-input" name="sponsor_country" value="{{$referral->country}}"
                       style="width:auto">
            </div>
            <div class="form-row">
                <label>Zip Code</label>
                <input type="text" class="custom-input" name="sponsor_zip" value="{{$referral->zip_code}}"
                       style="width:auto">
            </div>
        </div>

        <div class="form-row">
            <p>Spouse's Name if Married: <input type="text" class="custom-input" name="sponsor_if_married"
                                                style="width: 50%;">
        </div>
        <div style="text-align: center; ">
            <p>
                Please mail all trust documents to :
                <br>
                Trusted Surplus Solution <br>
                PO Box 297-050
                <br>
                Brooklyn, NY 11229
            </p>
        </div>
        <br>
        <p style="color: #16b6d5;font-size: 12px;">
            <b>PURPOSE OF ENROLLMENT</b>
        </p>
        <p style="font-weight: bold">
            Indicate reason for establishing an account.
        </p>
        <div class="container-row" style="justify-content: start;background-color: #CCCCCC; max-width: fit-content">
            <input type="checkbox" name="account_establishing_reason1" value="Shelter Monthly Excess Income"> Shelter
            Monthly
            Excess Income
            <input type="checkbox" name="account_establishing_reason2" value="Shelter Excess Resources"> Shelter Excess
            Resources
        </div>
        <p style="color: #16b6d5;font-size: 12px;">
            <b>HOUSEHOLD INCOME INFORMATION ( please include proof of income)</b>
        </p>

        <div style="display: flex; justify-content: flex-start">
            <p style="background-color: #CCCCCC">
                Is Spouse Deceased?
                <input type="checkbox" name="spouse_decreased1" value="Yes"> Yes
                <input type="checkbox" name="spouse_decreased2" value="No"> No</p>
        </div>

        <div style="display: flex; justify-content: flex-start; max-width: fit-content">
            <p style="margin-right: 60px;background-color: #CCCCCC;">
                is Applicant & Spouse applying together?
                <input type="checkbox" name="applying_together1" value="Yes"> Yes
                <input type="checkbox" name="applying_together2" value="No"> No</p>
            <br>
            <p>if yes fill in spouse's income</p>
        </div>
        <b>
            SPOUSE INFORMATION:
        </b>
        <br>
        <div style="display: flex; justify-self: auto">
            <div>
                <label> First Name</label>
                <input type="text" class="no-border" name="spouse_fname">
            </div>
            <div>
                <label> Last Name</label>
                <input type="text" class="no-border" name="spouse_lname">
            </div>
        </div>
        <br>
        <div style="display: flex; justify-self: auto">
            <div>
                <label>
                    Spouse Applied for Medicaid with beneficiary?
                </label>
                <input type="checkbox" name="spouse_applied_for_medicaid_with_beneficiary1" value="Yes">Yes
                <input type="checkbox" name="spouse_applied_for_medicaid_with_beneficiary2" value="No">No
            </div>
        </div>
        <table>
            <tr>
                <th>
                    <p> Type of Benefit</p>
                </th>
                <th>
                    <p> Application <br>
                        Monthly Amount</p>
                </th>
                <th>
                    <p> Spouse <br>
                        Monthly Amount</p>
                </th>
            </tr>
            <tr>
                <td>
                    Supplement Security Income(SSI)
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_ssi"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_ssi"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Supplement Security Disability Income(SSDI)
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_ssdi"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_ssdi"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Supplement Security Retirement Income(SSA)
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_ssa"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_ssa"></p>
                </td>
            </tr>
            <tr>
                <td>
                    VA Benefits
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_va_ben"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_va_ben"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Employment Benefits

                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_employee_ben"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_employee_ben"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Survivor Benefits

                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_survivor_ben"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_survivor_ben"></p>
                </td>
            </tr>
            <tr>
                <td>
                    IRA Distribution
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_ira_dist"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_ira_dist"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Pension / Annuities
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_pension_annuities"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_pension_annuities"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Interest / Dividends
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_interest_dividends"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_interest_dividends"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Reparations
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_reparations"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_reparations"></p>
                </td>
            </tr>
            <tr>
                <td>
                    Other
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="applicant_other"></p>
                </td>
                <td>
                    <p>$ <input type="text" class="no-border" name="spouse_other"></p>
                </td>
            </tr>
        </table>
        <br>
        <p>
            Please note: All disbursements must be for sole benefit of the country beneficiary.
            <br>
            A spouse is not a beneficiary for the account.
        </p>
        <p style="color: #16b6d5; display: inline-block; margin-right: 10px;">
            <b>MEDICAID INFORMATION</b>
        </p>
        <p style="display: inline-block;">
            - Please Attach MAP / LDSS Notice of Decision
        </p>

        <table>
            <tr>
                <th></th>
                <th>Applicant</th>
                <th>Spouse</th>
            </tr>
            <tr>
                <td>
                    <p>
                        Application Status
                        <br>
                        Does the beneficiary receive Medicaid?
                    </p>
                </td>
                <td>
                    <div class="container-row" style="background-color: #cccccc">
                        <input type="checkbox" name="beneficiary_receive_medicaid_applicant1" value="Yes"> Yes
                        <input type="checkbox" name="beneficiary_receive_medicaid_applicant2" value="No"> No
                        <input type="checkbox" name="beneficiary_receive_medicaid_applicant3" value="Pending"> Pending
                    </div>
                </td>
                <td>
                    <div class="container-row" style="background-color: #cccccc">
                        <input type="checkbox" name="beneficiary_receive_medicaid_spouse1" value="Yes"> Yes
                        <input type="checkbox" name="beneficiary_receive_medicaid_spouse2" value="No"> No
                        <input type="checkbox" name="beneficiary_receive_medicaid_spouse3" value="Pending"> Pending
                    </div>
                </td>

            </tr>
            <tr>
                <td>
                    CIN Number/medicaid Number
                </td>
                <td>
                    <input type="text" class="no-border" name="applicant_medicaid_cin_number">
                </td>
                <td>
                    <input type="text" class="no-border" name="spouse_medicaid_cin_number">
                </td>
            </tr>
            <tr>
                <td>
                    Monthly Spend Down $
                </td>
                <td>
                    <input type="text" class="no-border" name="medicaid_applicant_monthly_spend_down">
                </td>
                <td>
                    <input type="text" class="no-border" name="medicaid_spouse_monthly_spend_down">
                </td>
            </tr>

        </table>
        <p>
            if the Beneficiary receives other benefits, such as Food Stamps, HUD Section 8, etc. list these benefits.
        </p>
        <input type="text" class="no-border" name="beneficiary_benefits" style="width: 100%"> </input>
        <div style="background-color:#daeff5">
            <p style="padding: 2%">FOR ANY APPLICABLE ITEMS BELOW, PLEASE ATTACH THE NECESSARY PROOF.</p>
        </div>
        <br>
        <p style="color: #16b6d5">
            <b>HEALTH CARE PREMIUM</b>
        </p>
        <p style="font-weight: bold">
            Please attach current statement and proof of payment.
        </p>


        <br>
        <div class="container-row" style="max-width: fit-content">

            <p> Medicare part B Supplement <label> Plan Name:</label></p>
            <input type="text" class="no-border" name="healthcare_partb_plan" style="width: 400px">
        </div>
        <div class="container-row">
            <div>
                <label>Premium $</label>
                <input type="text" class="no-border" name="healthcare_partb_premium">
            </div>
            <div>
                <label>Frequency</label>
                <input type="text" class="no-border" name="healthcare_partb_frequency">
            </div>
        </div>
        <div class="container-row">
            <div>
                <p>
                    Medicare Part D Plan Name <input type="text" class="no-border" name="healthcare_partd_plan">
                </p>
            </div>
            <div>
                <p>
                    Premium $: <input type="text" class="no-border" name="healthcare_partd_premium">
                </p>
            </div>
        </div>
        <hr>
        <p style="color: #16b6d5">
            <b>FUNERAL ARRANGEMENT</b>
        </p>
        <p style="font-weight: bold">
            Please attach pre-need funeral agreement.
        </p>
        <p>Name of Funeral Home: <input type="text" class="no-border" name="funeral_home"></p>
        <p>Address <input type="text" class="no-border" name="funeral_address">City <input type="text" class="no-border"
                                                                                           name="funeral_city"></p>
        <p>State <input type="text" class="no-border" name="funeral_state"> Zip: <input type="text" class="no-border"
                                                                                        name="funeral_zip"> Telephone
            <input
                type="text" class="no-border" name="funeral_telephone"></p>
        <hr>
        <p style="color: #16b6d5">
            <b>BURIAL PLOT</b>
        </p>
        <p style="font-weight: bold">
            Please attach a copy of plot deed
        </p>
        <p>Name of Cemetery: <input type="text" class="no-border" name="burial_cemetery"></p>
        <p>Address <input type="text" class="no-border" name="burial_address">City <input type="text" class="no-border"
                                                                                          name="burial_city"></p>
        <p>State <input type="text" class="no-border" name="burial_state"> Zip: <input type="text" class="no-border"
                                                                                       name="burial_zip"> Telephone
            <input
                type="text" class="no-border" name="burial_telephone"></p>

        <p style="color: #16b6d5">
            <b>LIFE INSURANCE</b>
        </p>
        <p> Please attach a copy of policy </p>
        <p>Name of Insured: <input type="text" class="no-border" name="insured_name"> Name of Owner <input type="text"
                                                                                                           class="no-border"
                                                                                                           name="insured_owner">
        </p>
        <p>Name of insurance company <input type="text" class="no-border" name="insurance_company">Policy #: <input
                type="text"
                class="no-border" name="insurance_policy_number"></p>
        <p>Term of policy <input type="checkbox" class="no-border" name="type_of_policy1" value="Term"> Term <input
                type="text" class="no-border" name="term_name"><input
                type="checkbox" class="no-border" name="type_of_policy2" value="Life"> Life <input type="text"
                                                                                                   class="no-border"
                                                                                                   name="life_name">
            Cash
            Surrender Value $
            <input type="text" class="no-border" name="cash_surrender_value">
        </p>
        <p>Upon the death of the Beneficiary, amounts remaining in the Beneficiary's sub-account shall be reined in the
            Trust solely for the benefit of individuals who are disabled as defined in Soc. Sec. Law Section 1614(a)(3)
            [42
            USC 1382c(a)(3)] and any subsequent definitions that are enacted into law.</p> <br>
        <p style="color: #16b6d5">
            <b>QUALIFYING DISABILITIES</b>
        </p>
        <div class="container-row">
            <p>1 <input type="text" class="no-border" name="qualifying_disability_one"> 2. <input type="text"
                                                                                                  class="no-border"
                                                                                                  name="qualifying_disability_two">
                3. <input
                    type="text" class="no-border" name="qualifying_disability_three"></p>

        </div>
        <hr>
        <p style="color: #16b6d5">
            <b>LIVING ARRANGEMENTS</b>
        </p>
        <p style="font-weight: bold">Indicate the living arrangement of the Beneficiary

        </p>
        <p><input type="checkbox" name="living_arrangement1" value="Independently">independently <input type="checkbox"
                                                                                                        name="living_arrangement2"
                                                                                                        value="With Spouse">With
            Spouse <input type="checkbox" name="living_arrangement3" value="With Parents">With
            parents/other family <input type="checkbox" name="living_arrangement" value="Assisted Living facility">Assisted
            living facility</p><br>
        <p><input type="checkbox" name="living_arrangement4" value="Family Care Program">Family care program <input
                type="checkbox" name="living_arrangement5" value="Nursing Home">Nursing home <input
                type="checkbox" name="living_arrangement6" value="CR/IRA/ICF(supervised)">CR/IRA/ICF(supervised) <input
                type="checkbox" name="living_arrangement7" value="CR/IRA(Supportive)">CR/IRA(Supportive)</p><br>
        <p><input type="checkbox" name="living_arrangement8" value="living arrangement Other ">Other Explain <input
                type="text" class="no-border" name="living_arrangement_other"></p>
        <hr>
        <p style="color: #16b6d5">
            <b>POWER OF ATTORNEY</b></p>
        <p><b>Name:</b> First <input type="text" class="no-border" name="power_fname"> Middle <input type="text"
                                                                                                     class="no-border"
                                                                                                     name="power_midname">
            Last <input type="text" class="no-border" name="power_lname"></p><br>
        <p> Address <input type="text" class="no-border" name="power_address"> Apt#:<input type="text" class="no-border"
                                                                                           name="power_apt"></p>
        <p>City <input type="text" class="no-border" name="power_city"> State <input type="text" class="no-border"
                                                                                     name="power_state"> Country <input
                type="text" class="no-border" name="power_country"> Zip <input type="text" class="no-border"
                                                                               name="power_zip"></p><br>
        <p>Tel. Home: <input type="text" class="no-border" name="power_tel_home"> Cell <input type="text"
                                                                                              class="no-border"
                                                                                              name="power_tel_cell">
            Email
            <input type="text" class="no-border" name="power_email">
        </p><br>
        <p>is this person the sole POA? <input type="checkbox" name="sole_poa1" value="Yes"> Yes <input type="checkbox"
                                                                                                        name="sole_poa2"
                                                                                                        value="No">No
        </p>
        <p>if No, are the agents authorized to act separately? <input type="checkbox" name="act_seprately1" value="Yes">
            Yes <input type="checkbox" name="act_seprately2" value="No">No</p>
        <hr>
        <p style="color: #16b6d5">
            <b>GUARDIANSHIP</b>
        </p>
        <p style="font-weight: bold">
            Please attach a copy of Decree or Letter of guardianship
        </p>
        <p>
            Guardian appointed for the : <input type="checkbox" name="guardian_appointed_for1" value="Person"> Person
            <input type="checkbox" name="guardian_appointed_for2" value="Property"> Property<input
                type="checkbox" name="guardian_appointed_for3" value="Both"> Both
        </p>
        <p><b>Name:</b> First <input type="text" class="no-border" name="guardianship_fname"> Middle <input type="text"
                                                                                                            class="no-border"
                                                                                                            name="guardianship_midname">
            Last <input type="text" class="no-border" name="guardianship_lname"></p><br>
        <p> Address <input type="text" class="no-border" name="guardianship_address"> Apt#:<input type="text"
                                                                                                  class="no-border"
                                                                                                  name="guardianship_apt">
        </p>
        <p>City <input type="text" class="no-border" name="guardianship_city"> State <input type="text"
                                                                                            class="no-border"
                                                                                            name="guardianship_state">
            Country <input
                type="text" class="no-border" name="guardianship_country"> Zip <input type="text" class="no-border"
                                                                                      name="guardianship_zip"></p><br>
        Telephone <input type="text" class="no-border" name="guardianship_telephone"> Email
        <input type="text" class="no-border" name="guardianship_email">

        <br>
        <hr>
        <p style="color: #16b6d5">
            <b>BENEFICIARY SERVICES</b>
        </p>
        <p style="font-weight: bold">
            List other services that the Beneficiary receives (include day services, service coordination, employment
            program, etc.)
        </p>
        <div class="container-row" style="max-width:fit-content">
            <p style="margin-right: 50px">Service <br> <input type="text" class="no-border"
                                                              name="beneficiary_service_one"><br>
                <input type="text" class="no-border" name="beneficiary_service_two"><br>
                <input type="text" class="no-border" name="beneficiary_service_three">
            </p>
            <p>Name of Provider <br> <input type="text" class="no-border" name="beneficiary_provider_one"><br>
                <input type="text" class="no-border" name="beneficiary_provider_two"><br>
                <input type="text" class="no-border" name="beneficiary_provider_three">
            </p>
        </div>
        <p style="color: #16b6d5">
            <b>AUTHORIZED PREVENTATIVE: #1</b>
        </p>
        <p style="font-weight: bold">
            The following individual will be authorized to communicate with Trusted Pooled Trust.
            I authorize this
            individual
            to: Make Deposits, Request Statements and Disbursements.
        </p>
        <p><b>Name:</b> First <input type="text" class="no-border" name="auth_rep_one_fname"> Middle <input type="text"
                                                                                                            class="no-border"
                                                                                                            name="auth_rep_one_midname">
            Last <input type="text" class="no-border" name="auth_rep_one_lname"></p>
        <p> Address <input type="text" class="no-border" name="auth_rep_one_address"> Apt#:<input type="text"
                                                                                                  class="no-border"
                                                                                                  name="auth_rep_one_apt">
        </p>
        <p>City <input type="text" class="no-border" name="auth_rep_one_city"> State <input type="text"
                                                                                            class="no-border"
                                                                                            name="auth_rep_one_state">
            Country <input
                type="text" class="no-border" name="auth_rep_one_country"> Zip <input type="text" class="no-border"
                                                                                      name="auth_rep_one_zip"></p>
        <p> Telephone <input type="text" class="no-border" name="auth_rep_one_tel"> Cell
            <input type="text" class="no-border" name="auth_rep_one_cell">
        </p>
        <p> Email <input type="text" class="no-border" name="auth_rep_one_email"> Relationship to Beneficiary
            <input type="text" class="no-border" name="auth_rep_one_relation_beneficiary">
        </p>
        <br>
        <p style="background-color: #cccccc;max-width: fit-content">Would you like this representative to be the primary
            contact? <input type="checkbox" class="no-border"
                            name="auth_rep_one_primary1" value="Yes">Yes
            <input type="checkbox" class="no-border" name="auth_rep_one_primary2" value="No">No
        </p>
        <hr>
        <p style="color: #16b6d5">
            <b>AUTHORIZED PREVENTATIVE: #2</b>
        </p>
        <p>
            The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
            individual
            to: Make Deposits, Request Statements and Disbursements.
        </p>
        <p><b>Name:</b> First <input type="text" class="no-border" name="auth_rep_two_fname"> Middle <input type="text"
                                                                                                            class="no-border"
                                                                                                            name="auth_rep_two_midname">
            Last <input type="text" class="no-border" name="auth_rep_two_lname"></p><br>
        <p> Address <input type="text" class="no-border" name="auth_rep_two_address"> Apt#:<input type="text"
                                                                                                  class="no-border"
                                                                                                  name="auth_rep_two_apt">
        </p>
        <p>City <input type="text" class="no-border" name="auth_rep_two_city"> State <input type="text"
                                                                                            class="no-border"
                                                                                            name="auth_rep_two_state">
            Country <input
                type="text" class="no-border" name="auth_rep_two_country"> Zip <input type="text" class="no-border"
                                                                                      name="auth_rep_two_zip"></p>
        <p> Telephone <input type="text" class="no-border" name="auth_rep_two_tel"> Cell
            <input type="text" class="no-border" name="auth_rep_two_cell">
        </p>
        <p> Email <input type="text" class="no-border" name="auth_rep_two_email"> Relationship to Beneficiary
            <input type="text" class="no-border" name="auth_rep_two_relation_beneficiary">
        </p>
        <br>
        <p style="background-color: #cccccc;max-width: fit-content">Would you like this representative to be the primary
            contact? <input type="checkbox" class="no-border"
                            name="auth_rep_two_primary1" value="Yes">Yes
            <input type="checkbox" class="no-border" name="auth_rep_two_primary2" value="No">No
        </p>
        <hr>
        <p style="color: #16b6d5"><b>REFERRING SOURCE</b></p>
        <p> The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
            individual
            to: Make Deposits, Request Statements and Disbursements.</p>
        <p> Name of Agency <input type="text" class="no-border" name="referring_agency"> Name of Contact <input
                type="text"
                class="no-border"
                name="referring_contact">
        </p><br>
        <p> Address <input type="text" class="no-border" name="referring_address"> Apt#:<input type="text"
                                                                                               class="no-border"
                                                                                               name="referring_apt"></p>
        <p>City <input type="text" class="no-border" name="referring_city"> State <input type="text" class="no-border"
                                                                                         name="referring_state"> Country
            <input
                type="text" class="no-border" name="referring_country"> Zip <input type="text" class="no-border"
                                                                                   name="referring_zip"></p>
        <p> Telephone <input type="text" class="no-border" name="referring_tel"></p>
        <p> Email <input type="text" class="no-border" name="referring_email"> Relationship to Beneficiary<input
                type="text"
                class="no-border"
                name="referring_relation_beneficiary">
        </p>
        <br>
        <p style="background-color: #cccccc;max-width: fit-content">I authorize any applicable documents necessary for
            reporting to Government Agencies to be send referring source
            above. <input type="checkbox" class="no-border" name="referring_auth1" value="Yes">Yes
            <input type="checkbox" class="no-border" name="referring_auth2" value="No">No
        </p>

        <p style="color: #16b6d5"><b>INFORMATION AND DISCLOSURES</b>:
        </p>
        <p style="font-weight: bold">
            Death of Beneficiary:
        </p>
        <p style="  text-align: justify;
  text-justify: inter-word;">
            The Beneficiary's sub-trust account terminates upon his or her death. If, upon the death of the Beneficiary,
            funds remain in his or her sub-trust account, such funds shall be deemed to be property of the Trust and all
            funds that are remaining in the Beneficiary's separate sub-trust account shall be retained by TRUSTED
            SURPLUS
            SOLUTIONS DISABILITY POOLED TRUST to further the purposes of that Trust. However, to the extent that amounts
            remaining in the individual's sub-trust account upon the death of the individual are not in fact retained by
            the
            Trust, the Trust shall pay to the State(s) from such remaining amounts in the sub-trust account an amount
            equal
            to the total amount of medical assistance paid on behalf of the individual under the State Medicaid plan
            (s). To
            the extent that the trust does not retain the funds in the account, the State(s) shall be the first payee(s)
            of
            any such funds and the State(s) shall have priority over payment of other debts and administrative expenses
            except as listed in POMS SI 01120.203E.
            Funeral expenses will only be paid pursuant to a Medicaid eligible pre-need funeral arrangement established
            and
            funded prior to the Beneficiary's death. Funeral expenses will not be paid after the Beneficiary's death.
            <br><b>Contributions/Deposits:</b><br>
            All contributions made to the sub-trust account will be held and administered pursuant to the provisions of
            the
            TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST which are incorporated by reference herein.
            The Trustees shall have the sole and absolute right to accept or refuse additional deposits to the sub-trust
            account.
            In the event that a Beneficiary has a zero ($0) sub-trust account balance for sixty (60) or more consecutive
            days, the Trustee shall retain the right to close the Beneficiary's sub-trust account. Please be advised
            that
            the Trustee may continue to charge administrative fees for the management of the sub-trust account prior to
            its
            closure. In the event that a Beneficiary wishes to re-open a sub-trust account, the Beneficiary may be
            required
            to pay any outstanding administrative fees stemming from the prior sub-trust account. Additionally, the
            Beneficiary shall be required to pay a new enrollment fee when re-opening a sub-trust account.
            <br><b>Disbursements: </b><br>
            All disbursement requests shall be reviewed and approved on an individual basis.
            Disbursements for expenses incurred more than 90 days prior to submission of a disbursement request form
            shall
            not be paid.
            The Trustees, in their discretion, have determined that disbursements for the following items shall not be
            paid:
            purchases of firearms, alcohol, tobacco, items relating to illegal activity, bail, or restitution.
            All disbursements shall be made at the sole and absolute discretion of the Trustee. No disbursements will be
            made after the death of the beneficiary, even for expenses incurred or due prior to death.
            <br>
            <b>Disability Determination:</b> <br>
            In the event that a determination of disability is required for Medicaid purposes, please be advised that
            administrative fees shall be incurred while the determination of disability is being made.
            The Donor acknowledges that contributions to the TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST are not
            tax-deductible as charitable gifts, or otherwise.
            Sub-trust account income may be taxable to the Beneficiary.
            <br><b>
                Disclosure of Potential Conflict of Interest:
            </b><br>
            There may be a potential conflict of interest in the administration of the Trust since the Trust retains
            those
            funds remaining in the sub-trust account at the time of death of the Beneficiary. Funds remaining in the
            Trust
            may be used to pay for ancillary and/or supplemental services for Beneficiaries and potential Beneficiaries
            for
            which services may be rendered by TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST.
            The Donor executing this Joinder Agreement is aware of the potential conflicts of interest that exist in the
            Trustee's administration of the Trust. The Trustee shall not be liable to Donor or to any party for any act
            of
            self-dealing or conflict of interest resulting from their affiliations with SCF Charitable Organization or
            with
            any Beneficiary or constituent agencies and/or Chapters.
            <br>
            <b>
                Situs:

            </b>
            <br>

            The sub-trust account created by this Agreement has been accepted by the Trustee in the State of New York
            and
            will be administered by SCF Charitable Organization Inc. and a financial institution in the State of New
            York.
            The validity, construction, and all rights under this Agreement shall be governed by the laws of the State
            of
            New York. The situs of this Trust for administrative, account and legal purposes shall be in the County of
            Kings, the County where the majority of meetings concerning establishment of the Trust occurred.
            <br>
            Invalidity of any Provision: <br>
            Should any provision of this Agreement be or become invalid or unenforceable, the remaining provisions of
            this
            Agreement shall be and continue to be fully effective. <br>
            By signing below, you affirm that you understand and agree to the following:
            I have received and read a copy of the applicable Master Trust prior to the signing of this Joinder
            Agreement
            and acknowledge that I understand the contents thereof. I also understand that said document may be amended
            from
            time to time. I have been provided with the applicable fee schedule and acknowledge that I understand the
            contents thereof. I also understand there may be changes from time to time.
            <br>
            I am entering into this Joinder Agreement voluntarily and acting on my own free accord.
            The Donor acknowledges that the Beneficiary is disabled as defined in Social Security Law Section 1614(a)(3)
            [42
            USC 1382c(a) (3)].
            Under penalty of perjury, all statements made in this document are true and accurate to the best of my
            knowledge.
            The TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST is authorized to be used by individuals with
            disabilities
            pursuant to federal and state law. By agreeing to accept a donor's property pursuant to this Joinder
            Agreement,
            TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST, Inc. agrees only to manage the trust funds in accordance
            with
            the terms of the Master Trust Agreement and in compliance with applicable federal and state law and
            regulation.
            It is the sole responsibility of the donor and/or the donor's representative to determine whether the donor
            is
            "disabled" as that term is defined under federal law, to determine whether they have the legal authority to
            transfer property to fund the trust, and the impact that a transfer of property to the TRUSTED SURPLUS
            SOLUTIONS
            DISABILITY POOLED TRUST will have on the donor's continuing eligibility for government benefit programs.
            SCF Charitable Organization is not assuming any responsibility as counsel for the donor or Beneficiary, or
            providing any legal advice as it relates to the consequences of a transfer of property to the TRUSTED
            SURPLUS
            SOLUTIONS DISABILITY POOLED TRUST.
            The Trustees in their discretion may require an intermediary to assist in the administration of the
            Beneficiary's sub-trust account. The cost of which may be charged to the sub-trust account.
            The party authorized to speak with us on your behalf or the intermediary must notify TRUSTED SURPLUS
            SOLUTIONS
            DISABILITY POOLED TRUST, Inc. immediately upon your death and will be required to provide us with a
            certified
            death certificate. An individual requesting and/or receiving disbursements in contravention of the Master
            Trust
            Agreement and the Joinder Agreement will be required to repay the amount disbursed.
            This Joinder Agreement and the participation of the Beneficiary in the TRUSTED SURPLUS SOLUTIONS DISABILITY
            POOLED TRUST is an important legal decision that may have significant and lasting consequences for the
            Beneficiary and as a result you may want to consider obtaining advice from an attorney or another
            professional
            adviser before entering into this Agreement. By signing this Agreement you are acknowledging that you have
            had a
            full and complete opportunity to confer with an attorney or other adviser and that no employee of SCF
            Charitable
            Organization has provided you (or the Beneficiary, if different from the person signing this Agreement) with
            any
            legal advice in connection with this Joinder Agreement, the participation by the Beneficiary in the TRUSTED
            SURPLUS SOLUTIONS DISABILITY POOLED TRUST or the suitability of such participation by the Beneficiary in the
            TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST based upon the particular circumstances of the
            Beneficiary.
        </p>


        <p style="color: #16b6d5">SIGNATURE</p>
        <p style="font-weight: bold">I certify that the above information is accurate and the completed to the best of
            my knowledge.</p>

        <div class="container-row" style="justify-content: space-around">

            <div class="card-body">

                <div id="signature-pad">
                    <canvas id="signature-canvas-1"></canvas>
                    <div>
                        <div class="container-row">

                            <button id="clear-1" style="margin-left: 10px;">Clear</button>
                        </div>
                        <br> SIGNATURE

                    </div>

                    <input type="hidden" id="joinder_signature_1" name="joinder_signature_1">
                </div>
            </div>


            <p>
                <input type="date" class="no-border" style="width: 50%" name="joinder_date">
                <br> DATE
            </p>
        </div>
        <div class="container-row">
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="joinder_print">
                <br> PRINT
            </p>
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="joinder_relationship">
                <br> RELATIONSHIP
            </p>
        </div>
        <hr>
        <p style="color: #16b6d5">SIGNATURE OF NOTARY</p>
        <p>STATE OF New York <input type="text" class="no-border" name="notary_state_of_ny"> SS:</p>
        <p>COUNTY OF <input type="text" class="no-border" name="notary_county_of"> )</p>
        <p>ON<input type="date" class="no-border" name="notary_on_date"> ,20 <input type="text" class="no-border"
                                                                                    name="notary_year"> Before me the
            undersigned,
            aNotary Public in and for said State, personally appeared <input type="text"
                                                                             class="no-border" name="notary_appeared">
            personally known to me or proved to me on the basis of satisfactory evidence
            to me the individual whose name is subscribed to the within instrument
            and acknowledge to me that he/she/they executed the same in his/her capacity, and that by his/her signature
            on the instrument, the individual or the person upon behalf of which the individual acted executed this
            instrument.
            <br>
            <input type="text" class="no-border" name="notary_public">
            <br>
            NOTARY PUBLIC
        </p>

        <p>(New York Residents only)</p>
        Or in lieu of Notarization, the following two witness signatures are provided:
        <div class="container-row">
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="notary_witness_one_name">
                <br> WITNESS 1
            </p>
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="notary_witness_two_name">
                <br> WITNESS 2
            </p>
        </div>


        <div class="container-row" style="display: flex; justify-content: space-between;">
            <div style="width: 48%;">
                <div class="card-body">
                    <div id="signature-pad">
                        <canvas id="signature-canvas-2"></canvas>
                        <div>
                            <div class="container-row " style="justify-content: start">

                                <button id="clear-2" style="margin-left: 10px;">Clear</button>
                            </div>
                            <br> SIGNATURE WITNESS ONE
                        </div>
                        <input type="hidden" id="joinder_signature_2" name="joinder_signature_2">
                    </div>
                </div>
            </div>
            <div style="width: 48%; margin-left: auto;">
                <div class="card-body">
                    <div id="signature-pad">
                        <canvas id="signature-canvas-3"></canvas>
                        <div>
                            <div class="container-row" style="justify-content: start">

                                <button id="clear-3">Clear</button>
                            </div>
                            <br> SIGNATURE WITNESS TWO
                        </div>
                        <input type="hidden" id="joinder_signature_3" name="joinder_signature_3">
                    </div>
                </div>
            </div>
        </div>


        <div class="container-row">
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="notary_witness_one_full_name">
                <br> FULL NAME
            </p>
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="notary_witness_two_full_name">
                <br> FULL NAME
            </p>
        </div>
        <div class="container-row">
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="notary_witness_one_full_address">
                <br> FULL ADDRESS
            </p>
            <p style="width: 50%">
                <input type="text" class="no-border" style="width: 50%" name="notary_witness_two_full_address">
                <br> FULL ADDRESS
            </p>
        </div>
        <div
            style=" color:#16b6d3; text-align: center; background-color:#daeff5; padding:1%; flex:auto">
            <p>FOR OFFICE USE ONLY</p>
        </div>
        <p style="font-weight: bold">
            Accepted by Trustee or Designated Representative of the Trustees, Trusted Supplemental Needs Trust.
            <br>
        <div class="container-row">


            <div class="card-body" style="justify-content: space-around">

                <div id="signature-pad">
                    <canvas id="signature-canvas-4"></canvas>
                    <div>
                        <div class="container-row" style="justify-content: start">

                            <button id="clear-4" style="margin-left: 10px;">Clear</button>
                        </div>
                        <br> SIGNATURE

                    </div>

                    <input type="hidden" id="joinder_signature_4" name="joinder_signature_4">
                </div>
            </div>


            <p style="width: 50%">
                <input type="date" class="no-border" style="width: 50%" name="office_use_date_approved">
                <br> DATE APPROVED
            </p>
        </div>
        <p style="width: 50%">
            <input type="text" class="no-border" style="width: 50%" name="office_use_title">
            <br> TITLE
        </p>

        <br>
        <div class="container-row">
            <img src="{{ asset('images/intrustpit.png') }}" alt="Logo Image">
            <table>
                <tr>
                    <td colspan="2">
                        FOR OFFICE USE ONLY
                    </td>
                </tr>
                <tr>
                    <td>
                        Member ID#:
                    </td>
                    <td>
                        <input type="text" class="no-border" name="office_use_member_id_above">
                    </td>
                </tr>
                <tr>
                    <td>
                        Effective Date
                    </td>
                    <td>
                        <input type="date" class="no-border" name="office_use_effective_date">
                    </td>
                </tr>
            </table>
        </div>
        <p style="color: #16b6d5">DIRECT DEBIT REQUEST FORM</p>
        <p>
            Donor/Beneficiary: <input type="text" class="no-border" name="direct_debit_donor_beneficiary"> <br>
            Representative:<input type="text" class="no-border" name="direct_debit_representative"> <br>
        </p>
        <div>
            <p>
                Bank Name: <input type="text" class="no-border" name="direct_debit_bank_name">
                City: <input type="text" class="no-border" name="direct_debit_city">
                State: <input type="text" class="no-border" name="direct_debit_state">
            </p>
        </div>
        <br>
        <div>
            <p>
                Bank Routing Number: <input type="text" class="no-border" name="direct_debit_bank_routing">
                Account Number: <input type="text" class="no-border" name="direct_debit_account_number">
            </p>
        </div>
        <div>
            <p>
                Account Name: <input type="text" class="no-border" name="direct_debit_account_name">
            </p>
            <p style="max-width: fit-content;background-color:#cccccc">
                Account type<input type="checkbox" class="no-border" name="direct_debit_bank_type1" value="Checking">
                Checking
                <input type="checkbox" class="no-border" name="direct_debit_bank_type2" value="Savings"> Savings
            </p>
        </div>
        <p>
            PLEASE SUBMIT A VOID CHECK ALONG WITH YOUR FORM.
        </p>
        <p>
            I authorize and request Trusted Pooled Trust to initiate debit entries to my account at the depository
            financial
            institution indicated above. This authorization is to remain in full force and affect until Trusted has
            written
            notification from me of its termination in such time and manner as to afford Trusted and depository
            financial
            institution a reasonable opportunity to act on it.
        </p>
        <p style="font-weight: bold">
            Beneficiary/Representative Signature:
        <div class="card-body" style="justify-content: space-around">

            <div id="signature-pad">
                <canvas id="signature-canvas-5"></canvas>
                <div>
                    <div class="container-row" style="justify-content: start">

                        <button id="clear-5" style="margin-left: 10px;">Clear</button>
                    </div>
                    <br> SIGNATURE

                </div>

                <input type="hidden" id="joinder_signature_5" name="joinder_signature_5">
            </div>
        </div>

        <table>
            <tr>
                <td colspan="6">
                    <p style="font-weight: bold">For Office Use:</p>
                </td>
            </tr>
            <tr>
                <td>
                    Account#:
                </td>
                <td>
                    <input type="text" class="no-border" name="office_use_account_number">
                </td>
                <td>
                    MemberID#:
                </td>
                <td>
                    <input type="text" class="no-border" name="office_use_member_id_below">
                </td>
                <td>
                    Processed By:
                </td>
                <td>
                    <input type="text" class="no-border" name="office_use_processed_by">
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p>
                        Monthly Debit Amount: $ <input type="text" class="no-border"
                                                       name="office_use_monthly_debit_amount">
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p>
                        Monthly dates for direct debit are as follows: 1, 3, 7, 14, 21, 28 (debit will occur on or
                        around
                        the date selected)
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <p>
                        Date of Monthly Debit: <input type="date" class="no-border"
                                                      name="office_use_monthly_debit_date">
                        First Debit Month:: <input type="text" class="no-border"
                                                   name="office_use_monthly_debit_first_month">

                    </p>
                </td>
            </tr>
        </table>
        <p>
            If any direct debits are returned for insufficient funds, a $53 charge will apply
            A $100 annual-renewal fee will be charged on the anniversary of the account
        </p>

        <button type="submit" class="submit-button"> Submit</button>
    </form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function () {
        for (let i = 1; i <= 5; i++) {
            const canvas = document.getElementById(`signature-canvas-${i}`);
            const signaturePad = new SignaturePad(canvas, {
                backgroundColor: '#f2f2f2',
                penColor: '#000000',
            });

            $(`#clear-${i}`).click(function (e) {
                e.preventDefault();
                signaturePad.clear();
                $(`#joinder_signature_${i}`).val('');
            });

            //on canvas value change save
            signaturePad.onEnd = function () {
                $(`#joinder_signature_${i}`).val(signaturePad.toDataURL());
            };


        }

        //save this form using ajax
        $('#joinderForm').submit(function (e) {
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
                    swal.fire({
                        title: 'Success!',
                        text: '1-JoinderAgreement has been saved successfully.',
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

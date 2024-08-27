<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joinder Form</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }


        th,
        td {
            border: 1px solid black;
            padding: 0;
            font-size: 10px;
            text-align: center;
        }

        tr:first-child th {
            font-size: 12px;
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


        h6 {
            margin: 5px 0;
        }

        .radio-row label {
            margin-right: 20px;
        }


        .container-page-end {
            padding: 220px;

        }

        .custom_space_1 {
            padding: 130px;

        }

        .info {
            page-break-inside: avoid !important;
        }

        .info > *:first-child {
            page-break-before: avoid !important;
        }

        .info > *:last-child {
            page-break-after: avoid !important;
        }


    </style>
</head>

<body style="padding: 0;margin: 0;">
<form id="joinderForm" method="POST" action="{{ route('save.joinder') }}">
    @csrf

    <div class="container-row" style="padding-left: 23%">
        <img src="{{ public_path('images/intrustpit.png') }}" alt="Example Image">
        <br>
    </div>
    <div style="text-align: center;">
        <div style="background-color: rgb(95, 211, 211); width: fit-content; display: inline-block;">
            <h1 style="color: white; padding: 5px 10px;">
                JOINDER AGREEMENT</h1>
        </div>
    </div>
    <div class="container-page-end"></div>
    <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
        <div style="display: table-row;">
            <div style="color: #16B7D4; display: table-cell; width:45%;text-align: right;"><b>TF :</b></div>
            <div style="display: table-cell; text-align: left;color:#134C7F;padding-left: 5px;">877-298-7878</div>
        </div>
    </div>

    <div style="width: 100%; text-align: center; white-space: nowrap; display: table; border-collapse: collapse;">
        <div style="display: table-row;">
            <div style="color: #16B7D4; display: table-cell; padding-left: 60px; font-size: 11px;">2 9 T R U S T</div>
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
    <br>


    <div style="text-align: center;">
        <p style="font-weight: bold;">
            TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST
        </p>
        <p>
            Joinder Agreement / Beneficiary Profile Sheet
        </p>
    </div>
    <div style="background-color:#DBF0F6;padding: 10px;font-size: 11px">
        <p>
            This is a legal document. It is an agreement pertaining to a supplemental needs trust created pursuant to 42
            United States
            Code §1396. You are encouraged to seek independent, professional advice before signing this agreement. The
            undersigned
            hereby adopts, enrolls in and establishes a sub-trust account under the TRUSTED SURPLUS SOLUTIONS DISABILITY
            POOLED TRUST, dated February 13, 2023. The Trust is Irrevocable.
        </p>

        <p>
            NOTE: All questions must be answered or your application will be delayed.

        </p>
    </div>
    <div style="color:  #16B7D4;font-weight: bold;">
        <p>
            SPONSOR/BENEFICIARY INFORMATION

        </p>
    </div>
    <p>
        The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may
        be contributed to the Trust.
    </p>

    <div style="display: table; width: 100%;" class="container-table">
        <div style="display: table-row; width: 100%;">
            <label style="font-weight: bold; display: table-cell; width: 15%; vertical-align: bottom;">Legal
                Name:</label>
            <label style="display: table-cell; width: 5%; vertical-align: bottom; padding-right: 10px;">First:</label>
            <input type="text" value="{{$sponsor_first_name}}"
                   style=" display: table-cell; width: 20%;  vertical-align: bottom;" class="no-border"
                   name="sponsor_first_name">
            <label style="display: table-cell; width: 5%; vertical-align: bottom; padding-right: 10px;">Middle:</label>
            <input type="text" value="{{$sponsor_middle_name}}"
                   style=" display: table-cell; width: 10%; vertical-align: bottom;" class="no-border"
                   name="sponsor_middle_name">
            <label style="display: table-cell; width: 5%; vertical-align: bottom; padding-right: 10px;">Last:</label>
            <input type="text" value="{{$sponsor_last_name}}"
                   style=" display: table-cell; width: 40%; vertical-align: bottom;" class="no-border"
                   name="sponsor_last_name">
        </div>
    </div>


    <br>
    <div class="container-row info" style="width: 100%; display: table; table-layout: fixed;margin:0;padding:0;">
        <div style="display: table-cell;width:60%">
            <label style="font-weight: bold; margin: 0; padding: 0;">Marital Status:</label>
            <label style="margin: 0;">
                Married
                <input type="checkbox" name="sponsor_marital_status"
                       value="Married" {{ isset($sponsor_marital_status1) && $sponsor_marital_status1 === 'Married' ? 'checked' : '' }}>
            </label>
            <label style="margin: 0;">
                Widowed
                <input type="checkbox" name="sponsor_marital_status"
                       value="Widowed" {{ isset($sponsor_marital_status2) && $sponsor_marital_status2 === 'Widowed' ? 'checked' : '' }}>
            </label>
            <label style="margin: 0;">
                Single
                <input type="checkbox" name="sponsor_marital_status"
                       value="Single" {{ isset($sponsor_marital_status3) && $sponsor_marital_status3 === 'Single' ? 'checked' : '' }}>
            </label>
        </div>


        <div style="display: table-cell;float:right;width:40%">
            <input type="checkbox" name="gender" value="gender"
                {{isset($gender) && $gender == 'gender' ?'checked':''}}>
            <label style="margin: 0;">Gender</label>
            <input type="text" value={{$sponsor_gender}} class="no-border" name="sponsor_gender">
        </div>
    </div>


    <br>
    <div style="display: table; width: 100%; border-collapse: collapse;">


        <div style="display: table-row; white-space: nowrap; margin: 0; padding: 0;">

            <div style="display: table-cell; margin-bottom: 5px; width: 50%;">
                <label style="float: left;">SSN:</label>
                <input type="text" value="{{$sponsor_ssn}}" class="no-border" name="sponsor_ssn" style="float: left;">

                <label style="float: left; margin-left: 10px;">Date of birth:</label>
                <input type="text" class="no-border" name="sponsor_dob" value="{{$sponsor_dob}}"
                       style="float: left; margin-left: 5px;">
            </div>

        </div>

        <div style="display: table-row; width: 100%; white-space: nowrap;margin: 0;padding: 0">

            <div style="display: table-cell; padding: 0">
                <label>Citizen:</label>
                <input type="checkbox" name="sponsor_citizen"
                       value="Yes" {{ isset($sponsor_citizen1 ) && $sponsor_citizen1 === 'Yes' ? 'checked' : '' }}> Yes
                <input type="checkbox" name="sponsor_citizen"
                       value="No" {{ isset($sponsor_citizen2 ) && $sponsor_citizen2 === 'No' ? 'checked' : '' }}> No
                <label>Tel: Home</label>
                <input type="text" value="{{$sponsor_tel_home}}" class="no-border" name="sponsor_tel_home">
                <label>Cell:</label>
                <input type="text" value="{{$sponsor_tel_cell}}" class="no-border" name="sponsor_tel_cell">
            </div>

        </div>


        <div style="display: table-row;">

            <div style="display: table-cell; margin-right: 10px; margin-bottom: 5px;">
                <label>Place of birth</label>
                <input type="text" value="{{$sponsor_place_of_birth}}" class="no-border" name="sponsor_place_of_birth">
            </div>

        </div>

        <div style="display: table-row;">

            <div style="display: table-cell; margin-right: 10px; margin-bottom: 5px;">
                <label>Address:</label>
                <input type="text" value="{{$sponsor_address}}" class="no-border" style="width: 200px;"
                       name="sponsor_address">
                <label>Apt#</label>
                <input type="text" value="{{$sponsor_apt}}" class="no-border" name="sponsor_apt">
            </div>

        </div>

        <div style="display: table-row;margin-top: 5px">

            <div style="display: table-cell; width: 100%; margin-bottom: 5px;">
                <label>State</label>
                <input type="text" value="{{$sponsor_state}}" class="no-border" name="sponsor_state"
                       style="width: 100px;">
                <label>City</label>
                <input type="text" value="{{$sponsor_city}}" class="no-border" name="sponsor_city"
                       style="width: 100px;">
                <label>Country</label>
                <input type="text" value="{{$sponsor_country}}" class="no-border" name="sponsor_country"
                       style="width: 150px;">
                <label>Zip Code</label>
                <input type="text" value="{{$sponsor_zip}}" class="no-border" name="sponsor_zip" style="width: 100px;">
            </div>

        </div>

        <div style="display: table-row;">

            <div style="display: table-cell; margin-right: 10px;">
                <p>Spouses Name if Married: <input type="text" value="{{$sponsor_if_married}}" class="no-border"
                                                   name="sponsor_if_married"></p>
            </div>

        </div>

    </div>


    <br>
    <div class="custom_space_1"></div>
    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">1</p>
    </div>

    <p style="color: #16B7D4; font-size: 14px; margin:3px  0 0 0">
        <b style="margin: 0;padding: 0">PURPOSE OF ENROLLMENT</b>
    </p>
    <p style="font-size: 12px; margin: 0;">
        Indicate reason for establishing an account.
    </p>
    <div style="font-size: 12px; margin: 0; padding: 0;">
        <label><input type="checkbox" name="account_establishing_reason"
                      value="Shelter Monthly Excess Income" {{ isset($account_establishing_reason) && $account_establishing_reason === 'Shelter Monthly Excess Income' ? 'checked' : '' }}>
            Shelter Monthly Excess Income</label>
        <label><input type="checkbox" name="account_establishing_reason"
                      value="Shelter Excess Resources" {{ isset($account_establishing_reason) && $account_establishing_reason === 'Shelter Excess Resources' ? 'checked' : '' }}>
            Shelter Excess Resources</label>
    </div>

    <p style="color:  #16B7D4;padding: 0;margin:0;font-size: 14px">
        <b>HOUSEHOLD INCOME INFORMATION (please include proof of income)</b>
    </p>


    <p style="padding: 0;margin: 0;font-size: 12px">
        Is Spouse Deceased?
    </p>
    <input type="checkbox" name="spouse_decreased"
           value="Yes"
           {{ isset($spouse_decreased) && $spouse_decreased === 'Yes' ? 'checked' : '' }} style="vertical-align: bottom;">
    <label for="" style="vertical-align: bottom;font-size: 12px">Yes</label>
    <input type="checkbox" name="spouse_decreased"
           value="No"
           {{ isset($spouse_decreased) && $spouse_decreased === 'No' ? 'checked' : '' }} style="vertical-align: bottom;">
    <label for="" style="vertical-align: bottom;font-size: 12px">No</label>


    <p style="padding: 0;margin: 0;font-size: 12px">
        is Applicant & Spouse applying together?
    </p>
    <div style="display: table; width: 100%;vertical-align: center;font-size: 12px">
        <div style="display: table-row;">
            <div style="display: table-cell;width: 60%;white-space: nowrap;">
                <input type="checkbox" name="applying_together"
                       value="Yes" {{ isset($applying_together) && $applying_together === 'Yes' ? 'checked' : '' }}>
                <label for="">Yes</label>
                <input type="checkbox" name="applying_together"
                       value="No" {{ isset($applying_together) && $applying_together === 'No' ? 'checked' : '' }}>
                <label for="">No</label>

            </div>
            <p style="display: table-cell;width: 60%;">If yes, fill in spouse's income</p>

        </div>
    </div>
    <p style="margin:  0;font-size: 14px"><b>SPOUSE INFORMATION:</b></p>

    <div style="display: table; width: 100%;font-size: 12px">
        <div style="display: table-row;">
            <label style="display: table-cell; width: 20%; text-align: start;">First Name</label>
            <input type="text" value="{{$spouse_fname}}" class="no-border" name="spouse_fname"
                   style="display: table-cell; text-align: start; width: 30%;">

            <label style="display: table-cell; width: 20%; text-align: start;">Last Name</label>
            <input type="text" value="{{$spouse_lname}}" class="no-border" name="spouse_lname"
                   style="display: table-cell; text-align: start; width: 30%;">
        </div>
    </div>


    <div style="">
        <div>
            <label style="font-size: 12px">
                Spouse Applied for Medicaid with beneficiary?
            </label>
            <input type="checkbox" name="spouse_applied_for_medicaid_with_beneficiary"
                   value="Yes"
                   {{ isset($spouse_applied_for_medicaid_with_beneficiary    ) && $spouse_applied_for_medicaid_with_beneficiary    === 'Yes' ? 'checked' : '' }}  style="vertical-align: bottom">
            <label for="" style="vertical-align: bottom">Yes</label>
            <input type="checkbox" name="spouse_applied_for_medicaid_with_beneficiary"
                   value="No"
                   {{ isset($spouse_applied_for_medicaid_with_beneficiary    ) && $spouse_applied_for_medicaid_with_beneficiary    === 'No' ? 'checked' : '' }} style="vertical-align: bottom">
            <label for="" style="vertical-align: bottom">No</label>

        </div>
    </div>
    <table style=" padding: 0;margin: 0 ">
        <tr style="padding: 0;margin: 0;">
            <th style="padding: 0;margin: 0;">
                <p> Type of Benefit</p>
            </th>
            <th style="padding: 0;margin: 0;">
                <p> Application <br>
                    Monthly Amount</p>
            </th>
            <th style="padding: 0;margin: 0;">
                <p> Spouse <br>
                    Monthly Amount</p>
            </th>
        </tr>
        <tr style="padding: 0;margin: 0;">
            <td style="width:80px;padding: 0;margin: 0;max-height: 5px;">
                Supplement Security Income(SSI)
            </td>
            <td style="width:80px;padding: 0;margin: 0;">
                <p>$ <input type="text" value="{{$applicant_ssi}}" class="no-border" name="applicant_ssi"></p>
            </td>
            <td style="width:80px;padding: 0;margin: 0;">
                <p>$ <input type="text" value="{{$spouse_ssi}}" class="no-border" name="spouse_ssi"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Supplement Security Disability Income(SSDI)
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_ssdi}}" class="no-border" name="applicant_ssdi">
                </p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_ssdi}}" class="no-border" name="spouse_ssdi"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Supplement Security Retirement Income(SSA)
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_ssa}}" class="no-border" name="applicant_ssa"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_ssa}}" class="no-border" name="spouse_ssa"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                VA Benefits
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_va_ben}}" class="no-border"
                            name="applicant_va_ben"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_va_ben}}" class="no-border" name="spouse_va_ben"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Employment Benefits

            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_employee_ben}}" class="no-border"
                            name="applicant_employee_ben"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_employee_ben}}" class="no-border"
                            name="spouse_employee_ben"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Survivor Benefits

            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_survivor_ben}}" class="no-border"
                            name="applicant_survivor_ben"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_survivor_ben}}" class="no-border"
                            name="spouse_survivor_ben"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                IRA Distribution
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_ira_dist}}" class="no-border"
                            name="applicant_ira_dist"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_ira_dist}}" class="no-border" name="spouse_ira_dist">
                </p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Pension / Annuities
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_pension_annuities}}" class="no-border"
                            name="applicant_pension_annuities"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_pension_annuities}}" class="no-border"
                            name="spouse_pension_annuities"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Interest / Dividends
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_interest_dividends}}" class="no-border"
                            name="applicant_interest_dividends"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_interest_dividends}}" class="no-border"
                            name="spouse_interest_dividends"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Reparations
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_reparations}}" class="no-border"
                            name="applicant_reparations"></p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_reparations}}" class="no-border"
                            name="spouse_reparations"></p>
            </td>
        </tr>
        <tr style=" padding: 0;margin: 0 ">
            <td style="width:80px; padding: 0;margin: 0 ">
                Other
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$applicant_other}}" class="no-border" name="applicant_other">
                </p>
            </td>
            <td style="width:80px; padding: 0;margin: 0 ">
                <p>$ <input type="text" value="{{$spouse_other}}" class="no-border" name="spouse_other"></p>
            </td>
        </tr>
    </table>

    <p style="padding: 0;margin: 0;font-size: 12px;">
        Please note: All disbursements must be for sole benefit of the country beneficiary.
        <br>
        A spouse is not a beneficiary for the account.
    </p>
    <div style="display: table;">
        <p style="display: table-cell; color: #16B7D4; padding: 0; margin: 0;font-size: 12px">
            MEDICAID INFORMATION
        </p>
        <p style="display: table-cell;font-size: 12px">-Please Attach MAP / LDSS Notice of Decision</p>
    </div>


    <table style="padding: 0; margin: 0;">
        <tr style="padding: 0; margin: 0;">
            <th></th>
            <th style="vertical-align: bottom;">Applicant</th>
            <th style="vertical-align: bottom;">Spouse</th>
        </tr>
        <tr style="padding: 0; margin: 0;">
            <td style="width:80px;margin:0;padding:0;">
                <p style="font-size: 12px; vertical-align: bottom;margin:0;">
                    Application Status
                    <br>
                    Does the beneficiary receive Medicaid?
                </p>
            </td>
            <td style="width:80px;vertical-align: bottom;padding:0;margin:0;">
                <div style="display: flex; align-items: flex-end;">
                    <input type="checkbox" name="beneficiary_receive_medicaid_applicant"
                           value="Yes" style="margin-bottom: 4px;vertical-align: bottom;"
                        {{ isset($beneficiary_receive_medicaid_applicant) && $beneficiary_receive_medicaid_applicant === 'Yes' ? 'checked' : '' }} >
                    Yes
                    <input type="checkbox" name="beneficiary_receive_medicaid_applicant"
                           value="No" style="margin-bottom: 4px;vertical-align: bottom;"
                        {{ isset($beneficiary_receive_medicaid_applicant) && $beneficiary_receive_medicaid_applicant === 'No' ? 'checked' : '' }} >
                    No
                    <input type="checkbox" name="beneficiary_receive_medicaid_applicant"
                           value="Pending" style="margin-bottom: 4px;vertical-align: bottom;"
                        {{ isset($beneficiary_receive_medicaid_applicant) && $beneficiary_receive_medicaid_applicant === 'Pending' ? 'checked' : '' }} >
                    Pending
                </div>
            </td>
            <td style="width:80px;vertical-align: bottom; padding:0;margin:0;">
                <div style="display: flex; align-items: flex-end;">
                    <input type="checkbox" name="beneficiary_receive_medicaid_spouse"
                           value="Yes" style="margin-bottom: 4px;vertical-align: bottom;"
                        {{ isset($beneficiary_receive_medicaid_spouse) && $beneficiary_receive_medicaid_spouse === 'Yes' ? 'checked' : '' }}>
                    Yes
                    <input type="checkbox" name="beneficiary_receive_medicaid_spouse"
                           value="No" style="margin-bottom: 4px;vertical-align: bottom;"
                        {{ isset($beneficiary_receive_medicaid_spouse) && $beneficiary_receive_medicaid_spouse === 'No' ? 'checked' : '' }} >
                    No
                    <input type="checkbox" name="beneficiary_receive_medicaid_spouse"
                           value="Pending" style="margin-bottom: 4px;vertical-align: bottom;"
                        {{ isset($beneficiary_receive_medicaid_spouse) && $beneficiary_receive_medicaid_spouse === 'Pending' ? 'checked' : '' }} >
                    Pending
                </div>
            </td>
        </tr>
        <tr style="padding: 0; margin: 0;">
            <td style="width:80px;font-size: 12px; vertical-align: bottom;">
                CIN Number/medicaid Number
            </td>
            <td style="width:80px;vertical-align: bottom;">
                <input type="text" value="{{$applicant_medicaid_cin_number}}" class="no-border"
                       name="applicant_medicaid_cin_number">
            </td>
            <td style="width:80px;vertical-align: bottom;">
                <input type="text" value="{{$spouse_medicaid_cin_number}}" class="no-border"
                       name="spouse_medicaid_cin_number">
            </td>
        </tr>
        <tr style="padding: 0; margin: 0;">
            <td style="width:80px;font-size: 12px; vertical-align: bottom;">
                Monthly Spend Down $
            </td>
            <td style="width:80px;vertical-align: bottom;">
                <input type="text" value="{{$medicaid_applicant_monthly_spend_down}}" class="no-border"
                       name="medicaid_applicant_monthly_spend_down">
            </td>
            <td style="width:80px;vertical-align: bottom;">
                <input type="text" value="{{$medicaid_spouse_monthly_spend_down}}" class="no-border"
                       name="medicaid_spouse_monthly_spend_down">
            </td>
        </tr>
    </table>

    <p style="margin: 0;padding: 0;font-size: 12px;">
        if the Beneficiary receives other benefits, such as Food Stamps, HUD Section 8, etc.  list these benefits.
        and monthly amounts.
        <input type="text" class="no-border" name="beneficiary_benefits" value="{{$beneficiary_benefits}}"
               style="width: 50%">
    </p>

    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">2</p>
    </div>
    <div style="background-color: #DBF0F6;">
        <p style="padding: 2%;text-align: center">FOR ANY APPLICABLE ITEMS BELOW, PLEASE ATTACH THE NECESSARY PROOF.</p>
    </div>
    <br>
    <br>

    <p style="color:  #16B7D4;margin: 0;padding: 1px 0; font-weight: bold; ">
        HEALTH CARE PREMIUM
    </p>
    <br>
    <p style="padding: 0; margin-bottom: 2px;">
        Please attach current statement and proof of payment.
    </p>


    <div style=" display: table;">

        <p style="font-weight: bold;  display: table-row;">
            Medicare part B Supplement
            <label style="font-weight: normal; display: table-cell;"> Plan Name:</label>
            <input type="text" value="{{$medicaid_applicant_monthly_spend_down}}" class="no-border"
                   name="healthcare_partb_plan" style="width: 400px; display: table-cell;font-weight: normal;">
        </p>
    </div>
    <div style="display: table;margin:0;padding: 1px 0;">
        <div style="display: table-row;width: 100%">
            <label style="display: table-cell;">Premium $:</label>
            <input type="text" value="{{$healthcare_partb_premium}}" class="no-border" name="healthcare_partb_premium"
                   style="display: table-cell;padding:1px;">
            <label style="display: table-cell;">Frequency:</label>
            <input type="text" value="{{$healthcare_partb_frequency}}" class="no-border"
                   name="healthcare_partb_frequency" style="display: table-cell;width: max-content;padding:1px;">
        </div>

    </div>
    <div style="display: table; margin: 0; padding: 1px 0;">
        <div style="display: table-row;">
            <div style="display: table-cell; padding-right: 20px;">
                <p style="margin: 0; padding: 0; font-weight: bold;">Medicare Part D Plan <label
                        style="font-weight: normal;">Plan Name:</label> <input type="text"
                                                                               value="{{$healthcare_partd_plan}}"
                                                                               class="no-border"
                                                                               name="healthcare_partd_plan"
                                                                               style="width: 130px; font-weight: normal;">
                </p>
            </div>
            <div style="display: table-cell;">
                <p style="margin: 0; padding: 0; font-weight: normal;">Premium $: <input type="text"
                                                                                         value="{{$healthcare_partd_premium}}"
                                                                                         class="no-border"
                                                                                         name="healthcare_partd_premium"
                                                                                         style="font-weight: normal;width: max-content">
                </p>
            </div>
        </div>
        <br>
    </div>

    <hr>
    <div style="display: table;">
        <div style="display: table-row;">
            <div style="display: table-cell; color: #16B7D4; font-weight: bold;">
                FUNERAL ARRANGEMENT
            </div>
        </div>
        <br>
        <div style="display: table-row;">
            <div style="display: table-cell; margin-bottom: 2px;">
                Please attach pre-need funeral agreement.
            </div>
        </div>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Name of Funeral Home: <input type="text" value="{{$funeral_home}}" class="no-border" name="funeral_home"
                                             style="width: max-content;">
            </div>
        </div>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Address <input type="text" value="{{$funeral_address}}" class="no-border" name="funeral_address"> City
                <input type="text" value="{{$funeral_city}}" class="no-border" name="funeral_city">
            </div>
        </div>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                State <input type="text" class="no-border" name="funeral_state" value="{{$funeral_state}}"> Zip:
                <input type="text" value="{{$funeral_zip}}" class="no-border" name="funeral_zip"> Telephone
                <input type="text" value="{{$funeral_telephone}}" class="no-border" name="funeral_telephone"
                       style="width: 100px">
            </div>
        </div>
        <br>
    </div>

    <hr>
    <div style="display: table; vertical-align: middle;">
        <div style="display: table-cell;">
            <div style="color: #16B7D4; font-weight: bold;">
                BURIAL PLOT
            </div>
            <br>
            <div style=" margin-bottom: 2px;">
                Please attach a copy of plot deed.
            </div>
            <div>
                Name of Cemetery: <input type="text" value="{{$burial_cemetery}}" class="no-border"
                                         name="burial_cemetery">
            </div>
            <div>
                Address <input type="text" value="{{$burial_address}}" class="no-border" name="burial_address"> City
                <input type="text" value="{{$burial_city}}" class="no-border" name="burial_city">
            </div>
            <div>
                State <input type="text" value="{{$burial_state}}" class="no-border" name="burial_state"> Zip:
                <input type="text" value="{{$burial_zip}}" class="no-border" name="burial_zip"> Telephone
                <input type="text" value="{{$burial_telephone}}" class="no-border" name="burial_telephone"
                       style="width: 100px">
            </div>
            <br>
        </div>
    </div>
    <hr>
    <div style="display: table;">
        <div style="display: table-row;">
            <div style="display: table-cell; color: #16B7D4; font-weight: bold;">
                LIFE INSURANCE
            </div>
        </div>
        <br>
        <div style="display: table-row;">
            <div style="display: table-cell;  margin-bottom: 2px;">
                Please attach a copy of policy
            </div>
        </div>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Name of Insured: <input type="text" value="{{$insured_name}}" class="no-border" name="insured_name">
                Name of Owner
                <input type="text" value="{{$insured_owner}}" class="no-border" name="insured_owner">
            </div>
        </div>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Name of insurance company <input type="text" value="{{$insurance_company}}" class="no-border"
                                                 name="insurance_company"> Policy #:
                <input type="text" value="{{$insurance_policy_number}}" class="no-border"
                       name="insurance_policy_number">
            </div>
        </div>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Term of policy <input type="checkbox" name="type_of_policy"
                                      value="Term" {{ isset($type_of_policy) && $type_of_policy === 'Term' ? 'checked' : '' }}>
                Term
                <input type="text" value="{{$term_name}}" class="no-border" name="term_name" style="width:60px">
                <input type="checkbox" name="type_of_policy"
                       value="Life" {{ isset($type_of_policy) && $type_of_policy === 'Life' ? 'checked' : '' }}> Life
                <input type="text" value="{{$life_name}}" class="no-border" name="life_name" style="width:60px">
                <span style="display: inline-block; width: 200px; text-align: right;">Cash Surrender Value $</span>
                <input type="text" value="{{$cash_surrender_value}}" class="no-border" name="cash_surrender_value"
                       style="width:80px;">
            </div>
            <br>
        </div>
        <br>
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Upon the death of the Beneficiary, amounts remaining in the Beneficiary's sub-account shall be reined in
                the
                Trust solely for the benefit of individuals who are disabled as defined in Soc. Sec. Law Section
                1614(a)(3) [42
                USC 1382c(a)(3)] and any subsequent definitions that are enacted into law.
            </div>
        </div>
    </div>
    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">3</p>
    </div>
    <br>
    <p style="color:  #16B7D4;padding: 0;margin:0;">
        <b>QUALIFYING DISABILITIES</b>
    </p>
    <div style="padding: 0;margin:0;">
        <p>1 <input type="text" value={{$qualifying_disability_one}}  class="no-border"
                    name="qualifying_disability_one"> 2.
            <input type="text"
                   value={{$qualifying_disability_two}} class="no-border"
                   name="qualifying_disability_two">
            3. <input type="text" value={{$qualifying_disability_three}}  class="no-border"
                      name="qualifying_disability_three"></p>
    </div>
    <hr>
    <div style="display: table;justify-content: space-between">
        <p style="display: table-cell; color: #16B7D4;width:40%">
            <b>
                LIVING ARRANGEMENTS
            </b>
        </p>
        <p style="display: table-cell;width:60%;text-align: center"> (Indicate the living arrangement of the
            Beneficiary)</p>
    </div>

    <p style="padding: 0; margin: 0;">
        <input type="checkbox" id="independently" name="living_arrangement"
               value="Independently" {{ isset($living_arrangement) && $living_arrangement === 'Independently' ? 'checked' : '' }}>
        <label for="independently" style="vertical-align: middle;">Independently</label>

        <input type="checkbox" id="with_spouse" name="living_arrangement"
               value="With Spouse" {{ isset($living_arrangement) && $living_arrangement === 'With Spouse' ? 'checked' : '' }}>
        <label for="with_spouse" style="vertical-align: middle;">With Spouse</label>

        <input type="checkbox" id="with_parents" name="living_arrangement"
               value="With Parents" {{ isset($living_arrangement) && $living_arrangement === 'With Parents' ? 'checked' : '' }}>
        <label for="with_parents" style="vertical-align: middle;">With parents/other family</label>

        <input type="checkbox" id="assisted_living" name="living_arrangement"
               value="Assisted Living facility" {{ isset($living_arrangement) && $living_arrangement === 'Assisted Living facility' ? 'checked' : '' }}>
        <label for="assisted_living" style="vertical-align: middle;">Assisted living facility</label>
    </p>


    <p style="padding: 0; margin: 0;">
        <input type="checkbox" id="family_care" name="living_arrangement"
               value="Family Care Program" {{ isset($living_arrangement) && $living_arrangement === 'Family Care Program' ? 'checked' : '' }}>
        <label for="family_care" style="vertical-align: middle;">Family care program</label>

        <input type="checkbox" id="nursing_home" name="living_arrangement"
               value="Nursing Home" {{ isset($living_arrangement) && $living_arrangement === 'Nursing Home' ? 'checked' : '' }}>
        <label for="nursing_home" style="vertical-align: middle;">Nursing home</label>

        <input type="checkbox" id="supervised" name="living_arrangement"
               value="CR/IRA/ICF(supervised)" {{ isset($living_arrangement) && $living_arrangement === 'CR/IRA/ICF(supervised)' ? 'checked' : '' }}>
        <label for="supervised" style="vertical-align: middle;">CR/IRA/ICF(supervised)</label>

        <input type="checkbox" id="supportive" name="living_arrangement"
               value="CR/IRA(Supportive)" {{ isset($living_arrangement) && $living_arrangement === 'CR/IRA(Supportive)' ? 'checked' : '' }}>
        <label for="supportive" style="vertical-align: middle;">CR/IRA(Supportive)</label>
    </p>

    <p style="padding: 0; margin: 0;">
        <input type="checkbox" id="other_living_arrangement" name="living_arrangement"
               value="living arrangement Other" {{ isset($living_arrangement) && $living_arrangement === 'living arrangement Other' ? 'checked' : '' }}>
        <label for="other_living_arrangement" style="vertical-align: middle;">Other Explain</label>
        <input type="text" value="{{ $living_arrangement_other }}" class="no-border" name="living_arrangement_other">
    </p>


    <hr>
    <p style="color:  #16B7D4;padding:0;margin:0;">
        <b>POWER OF ATTORNEY</b></p>
    <div style="display: table; width: 100%;">
        <div style="display: table-row;background-color: green;margin: 0;padding:0;">
            <div style="display: table-cell;margin: 0;padding:0;">
                <b>Name:</b> First <input type="text" value="{{$power_fname}}" class="no-border"
                                          style="width: 100px;vertical-align: bottom" name="power_fname">
            </div>
            <div style="display: table-cell;margin: 0;padding:0;">
                Middle <input
                    type="text" value="{{$power_midname}}" class="no-border"
                    style="vertical-align: bottom" name="power_midname">
            </div>
            <div style="display: table-cell;margin: 0;padding:0;">
                Last <input
                    type="text" value="{{$power_lname}}" class="no-border"
                    style="width: 100px;vertical-align: bottom" name="power_lname">
            </div>
        </div>
    </div>


    <div style="display: table; width: 100%;padding:0;margin:0;">
        <div style="display: table-row;width: 100%;padding:0;margin:0;">
            <div style="display: table-cell; width: 70%;padding:0;margin:0;">
                Address <input type="text" value="{{$power_address}}" class="no-border"
                               style="vertical-align: bottom" name="power_address">
            </div>
            <div style="display: table-cell; width: 30%;padding:0;margin:0;">
                Apt#: <input type="text" value="{{$power_apt}}" class="no-border"
                             style="width: 60%;vertical-align: bottom" name="power_apt">
            </div>
        </div>
    </div>

    <div style="display: table;margin: 0;padding: 0;">
        <div style="display: table-row;margin: 0;padding: 0;">
            <div style="display: table-cell; width: 20%; white-space: nowrap; ">
                <p style="display: inline-block; margin: 0;">City</p>
                <input type="text" value="{{$power_city}}" class="no-border" style="width:150px;">
            </div>
            <div style="display: table-cell; width: 20%; white-space: nowrap;">
                <p style="display: inline-block; margin: 0;">State</p>
                <input type="text" value="{{$power_state}}" class="no-border" style="width:100px;">
            </div>
            <div style="display: table-cell; width: 20%; white-space: nowrap;">
                <p style="display: inline-block; margin: 0;">Country</p>
                <input type="text" value="{{$power_country}}" class="no-border" style="width:100px;">
            </div>
            <div style="display: table-cell; width: 20%; white-space: nowrap;">
                <p style="display: inline-block; margin: 0;">Zip</p>
                <input type="text" value="{{$power_zip}}" class="no-border" style="width:100px;">
            </div>
        </div>
    </div>

    <div style="display: table; width: 100%;margin: 0;padding: 0;">
        <div style="display: table-row;margin:0;">
            <div style="display: table-cell;margin:0;">
                <p>Tel. Home: <input type="text" class="no-border" style=";width: 100px"
                                     name="power_tel_home"
                                     value="{{$power_tel_home}}"> Cell <input
                        type="text" class="no-border" style="width: 100px" name="power_tel_cell"
                        value="{{$power_tel_cell}}"> Email <input
                        type="text" value="{{$power_email}}" class="no-border" style="width: 100px"
                        name="power_email">
                </p>
            </div>
        </div>
    </div>

    <p style="margin: 0;padding: 0;">Is this person the sole POA? <input type="checkbox" name="sole_poa"
                                                                         value="Yes" {{ isset($sole_poa) && $sole_poa        === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="sole_poa"
               value="No" {{ isset($sole_poa) && $sole_poa        === 'No' ? 'checked' : '' }}> No
    </p>
    <p>If No, are the agents authorized to act separately? <input type="checkbox" name="act_separately"
                                                                  value="Yes" {{ isset($act_seprately ) && $act_seprately        === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="act_separately"
               value="No" {{ isset($act_seprately ) && $act_seprately        === 'No' ? 'checked' : '' }}> No
    </p>
    <hr>
    <p style="color:  #16B7D4;margin: 0;padding: 0;">
        <b>GUARDIANSHIP</b>
    </p>
    <p style="margin: 0;padding: 0;">
        Please attach a copy of Decree or Letter of guardianship
    </p>
    <p style="margin: 0;padding: 0;">
        Guardian appointed for the :<input type="checkbox" name="guardian_appointed_for"
                                           value="Person" {{ isset($guardian_appointed_for  ) && $guardian_appointed_for  === 'Person' ? 'checked' : '' }}>
        Person
        <input type="checkbox" name="guardian_appointed_for"
               value="Property" {{ isset($guardian_appointed_for  ) && $guardian_appointed_for  === 'Property' ? 'checked' : '' }}>
        Property
        <input type="checkbox" name="guardian_appointed_for"
               value="Both" {{ isset($guardian_appointed_for  ) && $guardian_appointed_for  === 'Both' ? 'checked' : '' }}>
        Both

    </p>
    <p style="margin: 0;padding: 0;"><b>Name:</b> First <input type="text" value="{{$guardianship_fname}}"
                                                               class="no-border" name="guardianship_fname"
                                                               style="width:100px">
        Middle <input
            type="text" value={{$guardianship_midname}}
                                                                                                                class="no-border"
            name="guardianship_midname" style="width:100px">
        Last <input type="text" value="{{$guardianship_lname}}" class="no-border" name="guardianship_lname"
                    style="width:100px"></p><br>
    <p style="margin: 0;padding: 0;"> Address <input type="text" value="{{$guardianship_address}}" class="no-border"
                                                     name="guardianship_address"> Apt#:<input
            type="text"
            value={{$guardianship_apt}}

                                                                                                      class="no-border"
            name="guardianship_apt">
    </p>
    <p style="margin: 0;padding: 0;">City <input type="text" value="{{$guardianship_city}}" style="width:100px"
                                                 class="no-border" name="guardianship_city"> State <input
            type="text" value={{$guardianship_state}}
                                                                                                            class="no-border"
            name="guardianship_state">
        Country <input
            type="text" value="{{$guardianship_country}}" class="no-border" style="width:100px"
            name="guardianship_country"> Zip <input
            type="text" value="{{$guardianship_zip}}" style="width:100px"
            class="no-border"
            name="guardianship_zip">
    </p>
    <p style="margin: 0;padding: 0;">
        Telephone <input type="text" value="{{$guardianship_telephone}}" style="width:100px" class="no-border"
                         name="guardianship_telephone">
        Email
        <input type="text" value="{{$guardianship_email}}" style="width:100px" class="no-border"
               name="guardianship_email">
    </p>

    <hr>
    <p style="color:  #16B7D4;padding:0;margin:0;">
        <b>BENEFICIARY SERVICES</b>
    </p>
    <p style="padding:0;margin:0;">
        List other services that the Beneficiary receives (include day services, service coordination, employment
        program, etc.)
    </p>
    <div style="display: table; padding: 0; margin: 0;width: 100%">
        <div style="display: table-row;">
            <p style="display: table-cell; vertical-align: top; padding-right: 20px;float:left;">
                Service <br>
                <input type="text" value="{{$beneficiary_service_one}}" class="no-border"
                       name="beneficiary_service_one"><br>
                <input type="text" value="{{$beneficiary_service_two}}" class="no-border"
                       name="beneficiary_service_two"><br>
                <input type="text" value="{{$beneficiary_service_three}}" class="no-border"
                       name="beneficiary_service_three">
            </p>
            <p style="display: table-cell; vertical-align: top; text-align: left;float:right;">
                Name of Provider <br>
                <input type="text" value="{{$beneficiary_provider_one}}" class="no-border"
                       name="beneficiary_provider_one"><br>
                <input type="text" value="{{$beneficiary_provider_two}}" class="no-border"
                       name="beneficiary_provider_two"><br>
                <input type="text" value="{{$beneficiary_provider_three}}" class="no-border"
                       name="beneficiary_provider_three">
            </p>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">4</p>
    </div>

    <br>

    <p style="color:  #16B7D4;padding:0;margin: 0;">
        <b>AUTHORIZED PREVENTATIVE: #1</b>
    </p>
    <p style="padding:0;margin: 0;">
        The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
        individual
        to: Make Deposits, Request Statements and Disbursements.
    </p>
    <p style="padding:0;margin: 0;"><b>Name:</b> First <input type="text" value="{{$auth_rep_one_fname}}"
                                                              class="no-border" name="auth_rep_one_fname"
                                                              style="width: 100px">
        Middle <input
            type="text" value="{{$auth_rep_one_midname}}"
            class="no-border"
            name="auth_rep_one_midname" style="width: 100px">
        Last <input type="text" value={{$auth_rep_one_lname}}  class="no-border" name="auth_rep_one_lname"
                    style="width: 100px"></p>
    <p style=""> Address <input type="text" value="{{$auth_rep_one_address}}" class="no-border"
                                name="auth_rep_one_address" style="width: 300px"> Apt#:<input
            type="text" value="{{$auth_rep_one_apt}}" class="no-border" name="auth_rep_one_apt">
    </p>
    <p style="padding:0;margin: 0;">City <input type="text" value="{{$auth_rep_one_city}}" class="no-border"
                                                name="auth_rep_one_city"
                                                style="width: 100px"> State <input
            type="text" value="{{$auth_rep_one_state}}" style="width: 100px"
            class="no-border"
            name="auth_rep_one_state">
        Country <input
            type="text" value="{{$auth_rep_one_country}}" style="width: 100px" class="no-border"
            name="auth_rep_one_country"> Zip <input
            type="text" value="{{$auth_rep_one_zip}}" style="width: 100px"
            class="no-border"
            name="auth_rep_one_zip">
    </p>
    <p style="padding:0;margin: 0;"> Telephone <input type="text" value="{{$auth_rep_one_tel}}" class="no-border"
                                                      name="auth_rep_one_tel"
                                                      style="width: 100px"> Cell
        <input type="text" value="{{$auth_rep_one_cell}} " class="no-border" name="auth_rep_one_cell"
               style="width: 100px">
    </p>
    <p style="padding:0;margin: 0;"> Email <input type="text" value="{{$auth_rep_one_email}}" class="no-border"
                                                  name="auth_rep_one_email"
                                                  style="width: 100px">
        Relationship to Beneficiary
        <input type="text" value="{{$auth_rep_one_relation_beneficiary}}" style="width: 100px" class="no-border"
               name="auth_rep_one_relation_beneficiary">
    </p>

    <p>Would you like this representative to be the primary contact? <input type="checkbox"
                                                                            name="auth_rep_one_primary"
                                                                            value="Yes" {{ isset($auth_rep_one_primary   ) && $auth_rep_one_primary === 'Yes' ? 'checked' : '' }}>
        Yes
        <input type="checkbox" name="auth_rep_one_primary"
               value="No" {{ isset($auth_rep_one_primary   ) && $auth_rep_one_primary === 'No' ? 'checked' : '' }}> No

    </p>
    <hr>
    <p style="color:  #16B7D4;padding:0;margin: 0;">
        <b>AUTHORIZED PREVENTATIVE: #2</b>
    </p>
    <p>
        The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
        individual
        to: Make Deposits, Request Statements and Disbursements.
    </p>
    <p style="padding:0;margin: 0;">
        <b>Name:</b>
        First <input type="text" value="{{$auth_rep_two_fname}}" class="no-border" name="auth_rep_two_fname"
                     style="width: 100px; height: 20px;  ">
        Middle <input type="text" value="{{$auth_rep_two_midname}}" class="no-border" name="auth_rep_two_midname"
                      style="width: 100px; height: 20px;  ">
        Last <input type="text" value="{{$auth_rep_two_lname}}" class="no-border" name="auth_rep_two_lname"
                    style="width: 100px; height: 20px;  ">
    </p>

    <p style="padding:0;margin: 0; ">
        Address <input type="text" value="{{$auth_rep_two_address}}" class="no-border" name="auth_rep_two_address"
                       style="width: 300px; height: 20px;  "> Apt#:
        <input type="text" value="{{$auth_rep_two_apt}}" class="no-border" name="auth_rep_two_apt"
               style="width: 100px; height: 20px;  ">
    </p>
    <p style="padding:0;margin: 0; ">
        City <input type="text" value="{{$auth_rep_two_city}}" class="no-border" name="auth_rep_two_city"
                    style="width: 100px; height: 20px;  "> State
        <input type="text" value="{{$auth_rep_two_state}}" class="no-border" name="auth_rep_two_state"
               style="width: 100px; height: 20px;  ">
        Country <input type="text" value="{{$auth_rep_two_country}}" class="no-border" name="auth_rep_two_country"
                       style="width: 100px; height: 20px;  "> Zip
        <input type="text" value="{{$auth_rep_two_zip}}" class="no-border" name="auth_rep_two_zip"
               style="width: 100px; height: 20px;  ">
    </p>

    <p style="padding:0;margin: 0; ">
        Telephone <input type="text" value="{{$auth_rep_two_tel}}" class="no-border" name="auth_rep_two_tel"
                         style="width: 100px; height: 20px;  "> Cell
        <input type="text" value="{{$auth_rep_two_cell}}" class="no-border" name="auth_rep_two_cell"
               style="width: 100px; height: 20px;  ">
    </p>
    <p style=" ">
        Email <input type="text" value="{{$auth_rep_two_email}}" class="no-border" name="auth_rep_two_email"
                     style="width: 100px; height: 20px;  "> Relationship to Beneficiary
        <input type="text" value="{{$auth_rep_two_relation_beneficiary}}" class="no-border"
               name="auth_rep_two_relation_beneficiary" style="width: 100px; height: 20px;  ">
    </p>

    <p style=" ">Would you like this representative to be the primary contact?
        <input type="checkbox" name="auth_rep_two_primary"
               value="Yes" {{ isset($auth_rep_two_primary) && $auth_rep_two_primary === 'Yes' ? 'checked' : '' }}> Yes
        <input type="checkbox" name="auth_rep_two_primary"
               value="No" {{ isset($auth_rep_two_primary) && $auth_rep_two_primary === 'No' ? 'checked' : '' }}> No
    </p>

    <hr>
    <p style="color:  #16B7D4;padding:0;margin: 0;"><b>REFERRING SOURCE</b></p>
    <p> The following individual will be authorized to communicate with Trusted Pooled Trust. I authorize this
        individual
        to: Make Deposits, Request Statements and Disbursements.</p>
    <p style=" ">
        Name of Agency <input type="text" value="{{$referring_agency}}" class="no-border" name="referring_agency"
                              style="width: 100px; height: 20px;  ">
        Name of Contact <input type="text" value="{{$referring_contact}}" class="no-border" name="referring_contact"
                               style="width: 100px; height: 20px;  ">
    </p>

    <p style="padding:0;margin: 0; ">
        Address <input type="text" value="{{$referring_address}}" class="no-border" name="referring_address"
                       style="width: 300px; height: 20px;  "> Apt#:
        <input type="text" value="{{$referring_apt}}" class="no-border" name="referring_apt"
               style="width: 100px; height: 20px;  ">
    </p>
    <p style="padding:0;margin: 0; ">
        City <input type="text" value="{{$referring_city}}" class="no-border" name="referring_city"
                    style="width: 100px; height: 20px;  "> State
        <input type="text" value="{{$referring_state}}" class="no-border" name="referring_state"
               style="width: 100px; height: 20px;  "> Country
        <input type="text" value="{{$referring_country}}" class="no-border" name="referring_country"
               style="width: 100px; height: 20px;  "> Zip
        <input type="text" value="{{$referring_zip}}" class="no-border" name="referring_zip"
               style="width: 100px; height: 20px;  ">
    </p>

    <p style="padding:0;margin: 0; ">
        Telephone <input type="text" value="{{$referring_tel}}" class="no-border" name="referring_tel"
                         style="width: 150px; height: 20px;  ">
        Email <input type="text" value="{{$referring_email}}" class="no-border" name="referring_email"
                     style="width: 150px; height: 20px;  ">

    </p>

    <p style="padding:0;margin: 0;">
        I authorize any applicable documents necessary for reporting to Government Agencies to be sent referring source
        above.
        <input type="checkbox" name="referring_auth"
               value="Yes" {{ isset($referring_auth) && $referring_auth === 'Yes' ? 'checked' : '' }}> Yes
        <input type="checkbox" name="referring_auth"
               value="No" {{ isset($referring_auth) && $referring_auth === 'No' ? 'checked' : '' }}> No
    </p>
    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">5</p>
    </div>


    <p style="color:  #16B7D4"><b>INFORMATION AND DISCLOSURES:</b>
    </p>
    <p>
        <b>Death of Beneficiary:</b>
    </p>
    <p>
        The Beneficiary's sub-trust account terminates upon his or her death. If, upon the death of the Beneficiary,
        funds remain in his or her sub-trust account, such funds shall be deemed to be property of the Trust and all
        funds that are remaining in the Beneficiary's separate sub-trust account shall be retained by TRUSTED SURPLUS
        SOLUTIONS DISABILITY POOLED TRUST to further the purposes of that Trust. However, to the extent that amounts
        remaining in the individual's sub-trust account upon the death of the individual are not in fact retained by the
        Trust, the Trust shall pay to the State(s) from such remaining amounts in the sub-trust account an amount equal
        to the total amount of medical assistance paid on behalf of the individual under the State Medicaid plan (s). To
        the extent that the trust does not retain the funds in the account, the State(s) shall be the first payee(s) of
        any such funds and the State(s) shall have priority over payment of other debts and administrative expenses
        except as listed in POMS SI 01120.203E. <br><br>
        Funeral expenses will only be paid pursuant to a Medicaid eligible pre-need funeral arrangement established and
        funded prior to the Beneficiary's death. Funeral expenses will not be paid after the Beneficiary's death.
        <br><b>Contributions/Deposits:</b><br>
        All contributions made to the sub-trust account will be held and administered pursuant to the provisions of the
        TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST which are incorporated by reference herein.
        The Trustees shall have the sole and absolute right to accept or refuse additional deposits to the sub-trust
        account.
        In the event that a Beneficiary has a zero ($0) sub-trust account balance for sixty (60) or more consecutive
        days, the Trustee shall retain the right to close the Beneficiary's sub-trust account. Please be advised that
        the Trustee may continue to charge administrative fees for the management of the sub-trust account prior to its
        closure. In the event that a Beneficiary wishes to re-open a sub-trust account, the Beneficiary may be required
        to pay any outstanding administrative fees stemming from the prior sub-trust account. Additionally, the
        Beneficiary shall be required to pay a new enrollment fee when re-opening a sub-trust account.
        <br><b>Disbursements: </b><br>
        All disbursement requests shall be reviewed and approved on an individual basis.
        Disbursements for expenses incurred more than 90 days prior to submission of a disbursement request form shall
        not be paid.
        The Trustees, in their discretion, have determined that disbursements for the following items shall not be paid:
        purchases of firearms, alcohol, tobacco, items relating to illegal activity, bail, or restitution.
        All disbursements shall be made at the sole and absolute discretion of the Trustee. No disbursements will be
        made after the death of the beneficiary, even for expenses incurred or due prior to death.
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">6</p>
    </div>
    <b>Disability Determination:</b> <br>
    In the event that a determination of disability is required for Medicaid purposes, please be advised that
    administrative fees shall be incurred while the determination of disability is being made.<br><br>
    The Donor acknowledges that contributions to the TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST are not
    tax-deductible as charitable gifts, or otherwise.<br><br>
    Sub-trust account income may be taxable to the Beneficiary.
    <br><br>
    <br><b>
        Disclosure of Potential Conflict of Interest:
    </b><br>
    There may be a potential conflict of interest in the administration of the Trust since the Trust retains those
    funds remaining in the sub-trust account at the time of death of the Beneficiary. Funds remaining in the Trust
    may be used to pay for ancillary and/or supplemental services for Beneficiaries and potential Beneficiaries for
    which services may be rendered by TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST. <br><br>
    The Donor executing this Joinder Agreement is aware of the potential conflicts of interest that exist in the
    Trustee's administration of the Trust. The Trustee shall not be liable to Donor or to any party for any act of
    self-dealing or conflict of interest resulting from their affiliations with SCF Charitable Organization or with
    any Beneficiary or constituent agencies and/or Chapters.
    <br>
    <b>
        Situs:

    </b>
    <br>

    The sub-trust account created by this Agreement has been accepted by the Trustee in the State of New York and
    will be administered by SCF Charitable Organization Inc. and a financial institution in the State of New York.
    The validity, construction, and all rights under this Agreement shall be governed by the laws of the State of
    New York. The situs of this Trust for administrative, account and legal purposes shall be in the County of
    Kings, the County where the majority of meetings concerning establishment of the Trust occurred.
    Invalidity of any Provision: <br>
    Should any provision of this Agreement be or become invalid or unenforceable, the remaining provisions of this
    Agreement shall be and continue to be fully effective. <br>br
    By signing below, you affirm that you understand and agree to the following: <br>
    I have received and read a copy of the applicable Master Trust prior to the signing of this Joinder Agreement
    and acknowledge that I understand the contents thereof. I also understand that said document may be amended from
    time to time. I have been provided with the applicable fee schedule and acknowledge that I understand the
    contents thereof. I also understand there may be changes from time to time.
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">7</p>
    </div>
    <br>
    <br>
    <p>
        I am entering into this Joinder Agreement voluntarily and acting on my own free accord. <br>
        <br>
        The Donor acknowledges that the Beneficiary is disabled as defined in Social Security Law Section 1614(a)(3) [42
        USC 1382c(a) (3)].<br>
        <br>
        Under penalty of perjury, all statements made in this document are true and accurate to the best of my
        knowledge. <br>
        <br>
        The TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST is authorized to be used by individuals with disabilities
        pursuant to federal and state law. By agreeing to accept a donor's property pursuant to this Joinder Agreement,
        TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST, Inc. agrees only to manage the trust funds in accordance with
        the terms of the Master Trust Agreement and in compliance with applicable federal and state law and regulation.
        It is the sole responsibility of the donor and/or the donor's representative to determine whether the donor is
        "disabled" as that term is defined under federal law, to determine whether they have the legal authority to
        transfer property to fund the trust, and the impact that a transfer of property to the TRUSTED SURPLUS SOLUTIONS
        DISABILITY POOLED TRUST will have on the donor's continuing eligibility for government benefit programs. <br>
        <br>
        SCF Charitable Organization is not assuming any responsibility as counsel for the donor or Beneficiary, or
        providing any legal advice as it relates to the consequences of a transfer of property to the TRUSTED SURPLUS
        SOLUTIONS DISABILITY POOLED TRUST. <br><br>
        The Trustees in their discretion may require an intermediary to assist in the administration of the
        Beneficiary's sub-trust account. The cost of which may be charged to the sub-trust account. <br><br>
        The party authorized to speak with us on your behalf or the intermediary must notify TRUSTED SURPLUS SOLUTIONS
        DISABILITY POOLED TRUST, Inc. immediately upon your death and will be required to provide us with a certified
        death certificate. An individual requesting and/or receiving disbursements in contravention of the Master Trust
        Agreement and the Joinder Agreement will be required to repay the amount disbursed. <br><br>
        This Joinder Agreement and the participation of the Beneficiary in the TRUSTED SURPLUS SOLUTIONS DISABILITY
        POOLED TRUST is an important legal decision that may have significant and lasting consequences for the
        Beneficiary and as a result you may want to consider obtaining advice from an attorney or another professional
        adviser before entering into this Agreement. By signing this Agreement you are acknowledging that you have had a
        full and complete opportunity to confer with an attorney or other adviser and that no employee of SCF Charitable
        Organization has provided you (or the Beneficiary, if different from the person signing this Agreement) with any
        legal advice in connection with this Joinder Agreement, the participation by the Beneficiary in the TRUSTED
        SURPLUS SOLUTIONS DISABILITY POOLED TRUST or the suitability of such participation by the Beneficiary in the
        TRUSTED SURPLUS SOLUTIONS DISABILITY POOLED TRUST based upon the particular circumstances of the Beneficiary.
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>


    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">8</p>
    </div>

    <p style="color:  #16B7D4;margin:0;"><b>SIGNATURE</b></p>
    <p>I certify that the above information is accurate and the completed to the best of my knowledge.</p>

    <div style="display: table; width: 100%;margin:0;">

        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                @if($joinder_signature_1)
                    <img src="{{ $joinder_signature_1 }}" alt="Signature 1" width="50px" height="50px"
                         style="display: block; margin: 0 auto;">
                @else
                    <div style="width: 200px;height:50px; text-align: center;">
                        No Signature Provided
                    </div>
                @endif
            </div>

            <div style="display: table-cell; text-align: center;">
                <p style="margin: 0;">
                    <input type="text" class="no-border" value="{{$joinder_date}}" style="width: 80%; margin: 0 auto;">
                    <br> DATE
                </p>
            </div>
        </div>

        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                <p style="margin: 0;">
                    <input type="text" value="{{$joinder_print}}" class="no-border" style="width: 80%; margin: 0 auto;">
                    <br> PRINT
                </p>
            </div>

            <div style="display: table-cell; text-align: center;">
                <p style="margin: 0;">
                    <input type="text" value="{{$joinder_relationship}}" class="no-border"
                           style="width: 80%; margin: 0 auto;">
                    <br> RELATIONSHIP
                </p>
            </div>
        </div>

    </div>

    <hr>
    <p style="color:  #16B7D4;margin:0;"><b>SIGNATURE OF NOTARY</b></p>
    <p style="margin:0;">STATE OF New York <input type="text" value={{$notary_state_of_ny}}  class="no-border"
                                                  name="notary_state_of_ny">
        SS:</p>
    <p style="margin:0;">COUNTY OF <input type="text" value={{$notary_county_of}}  class="no-border"
                                          name="notary_county_of"> )</p>
    <p style="margin:0;">ON<input type="text" class="no-border" name="notary_on_date" value={{$notary_on_date}} > ,20
        <input type="text"
               value={{$notary_year}}
                                                                                                class="no-border"
               name="notary_year">
    <p style="margin: 0;">
        Before
        me the
        undersigned,
        aNotary Public in and for said State, personally appeared <input type="text" value={{$notary_appeared}}
                                                                             class="no-border" name="notary_appeared">
        personally known to me or proved to me on the basis of satisfactory evidence
        to me the individual whose name is subscribed to the within instrument
        and acknowledge to me that he/she/they executed the same in his/her capacity, and that by his/her signature
        on the instrument, the individual or the person upon behalf of which the individual acted executed this
        instrument.
    </p>
    <br>
    <input type="text" value={{$notary_public}}  class="no-border" name="notary_public">
    <br>
    NOTARY PUBLIC

    <br>
    <div style="display: table; width: 100%; margin-top: 20px;">

        <!-- Row for Witness Names -->
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       name="notary_witness_one_name" value="{{$notary_witness_one_name}}" maxlength="70">
                <br><label> WITNESS 1 </label>
            </div>
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       name="notary_witness_two_name" value="{{$notary_witness_two_name}}" maxlength="70">
                <br><label> WITNESS 2 </label>
            </div>
        </div>

        <!-- Row for Signatures -->
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                <!-- Display signature image if present, else show placeholder text -->
                <!-- This part will need to be generated server-side to check for signature presence -->
                @if($joinder_signature_2)
                    <img src="{{$joinder_signature_2}}" alt="Signature 2" style="max-width:50px; max-height: 50px;">
                    <br>
                @else
                    <div style="width: 200px;height:50px; text-align: center;">
                        No Signature Provided
                    </div>
                @endif
                <label> Witness 1 Signature</label>
            </div>
            <div style="display: table-cell; width: 50%; text-align: center;">
                @if($joinder_signature_3)
                    <img src="{{$joinder_signature_3}}" alt="Signature 3" style="max-width: 50px; max-height: 50px;">
                    <br>
                @else
                    <div style="width: 200px;height:50px; text-align: center;">
                        No Signature Provided
                    </div>
                @endif
                <label> Witness 2 Signature</label>
            </div>
        </div>

        <!-- Row for Full Names -->
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       name="notary_witness_one_full_name" value="{{$notary_witness_one_full_name}}" maxlength="70">
                <br><label> FULL NAME</label>
            </div>
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       name="notary_witness_two_full_name" value="{{$notary_witness_two_full_name}}" maxlength="70">
                <br><label> FULL NAME</label>
            </div>
        </div>

        <!-- Row for Full Addresses -->
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       name="notary_witness_one_full_address" value="{{$notary_witness_one_full_address}}">
                <br><label> FULL ADDRESS </label>
            </div>
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       name="notary_witness_two_full_address" value="{{$notary_witness_two_full_address}}">
                <br><label> FULL ADDRESS </label>
            </div>
        </div>

    </div>
    <div style="color:rgb(1, 194, 194); text-align: center; vertical-align: center; background-color:rgb(174, 253, 253); padding:1%;height: 20px;">
        FOR OFFICE USE ONLY
    </div>

    <p>
        Accepted by Trustee or Designated Representative of the Trustees, Trusted Supplemental Needs Trust.
    </p>

    <div style="display: table; width: 100%;margin:0;">

        <!-- Row for Signature and Date Approved -->
        <div style="display: table-row;">
            <div style="display: table-cell; width: 50%; text-align: center;">
                <!-- Signature Image or Placeholder -->
                @if($joinder_signature_4)
                    <img src="{{ $joinder_signature_4 }}" alt="Signature 4" style="width: 100px; height: 50px;">
                @else
                    <div style="width: 200px;height:50px; text-align: center;">
                        No Signature Provided
                    </div>
                @endif
                <br><label>SIGNATURE</label>
            </div>
            <div style="display: table-cell; width: 50%; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       value="{{$office_use_date_approved}}">
                <br><label>DATE APPROVED</label>
            </div>
        </div>

        <!-- Row for Title -->
        <div style="display: table-row;">
            <div style="display: table-cell; text-align: center;">
                <input type="text" style="width: 90%; text-align: center;" class="no-border"
                       value="{{$office_use_title}}" name="office_use_title">
                <br><label>TITLE</label>
            </div>
        </div>
    </div>

    <!-- Footer with Logo and Page Number -->
    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">9</p>
    </div>

    <br>
    <div style="display: table; width: 100%;">
        <div style="display: table-row;">
            <div style="display: table-cell;">
                <img src="{{ public_path('images/intrustpit.png') }}" alt="Example Image" width="200" height="200">
            </div>
            <table>
                <tr>
                    <td colspan="2" style="color: #16B7D4;">FOR OFFICE USE ONLY</td>
                </tr>
                <tr>
                    <td>Member ID#:</td>
                    <td><input type="text" value="{{$office_use_member_id_above}}" class="no-border"></td>
                </tr>
                <tr>
                    <td>Effective Date:</td>
                    <td><input type="text" value="{{$office_use_effective_date}}" class="no-border"></td>
                </tr>
            </table>

        </div>
    </div>
    <p style="color: #16B7D4;"><b>DIRECT DEBIT REQUEST FORM</b></p>
    <p style="">
        Donor/Beneficiary: <input type="text" value="{{$office_use_effective_date}}" class="no-border"
                                  style="width: 100%">
        Representative: <input type="text" value="{{$direct_debit_representative}}" class="no-border"
                               style="width: 100%;">
        <br style="height: 2px">
        Bank Name: <input type="text" value="{{$direct_debit_bank_name}}" class="no-border" style="width:30%;">

        City: <input type="text" value="{{$direct_debit_city}}" class="no-border" style="width:25%;">


        State: <input type="text" value="{{$direct_debit_state}}" class="no-border" style="width:15%;;">
        Bank Routing Number: <input type="text" value="{{$direct_debit_bank_routing}}" class="no-border">
        Account Number: <input type="text" value="{{$direct_debit_account_number}}" class="no-border">

    </p>


    <div style="display: table; width: 100%;">
        <div style="display: table-row;">
            <div style="display: table-cell;">
                Account Name: <input type="text" value="{{$direct_debit_account_name}}" class="no-border">
            </div>
            <div style="display: table-cell;">
                Account type: <input type="checkbox" name="direct_debit_bank_type" value="Checking"
                    {{ isset($direct_debit_bank_type1) && $direct_debit_bank_type1 === 'Checking' ? 'checked' : '' }}>
                Checking
            </div>
            <div style="display: table-cell;">
                <input type="checkbox" name="direct_debit_bank_type" value="Savings"
                    {{ isset($direct_debit_bank_type2) && $direct_debit_bank_type2 === 'Savings' ? 'checked' : '' }}>
                Savings
            </div>
        </div>
    </div>

    <p>
        <b>PLEASE SUBMIT A VOID CHECK ALONG WITH YOUR FORM.</b>
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
    <div style="display: table;">
        <div style="display: table-cell; vertical-align: bottom;">
            Beneficiary/Representative Signature:
        </div>
        <div style="display: table-cell; vertical-align: bottom;">
            <div class="card-body" style="justify-content: space-around;">
                @if($joinder_signature_5)
                    <img src="{{ $joinder_signature_5 }}" alt="Signature 5" width="50px" height="50px">
                @else
                    <div style="width: 200px;height:50px; text-align: center;">
                        No Signature Provided
                    </div>

                @endif
            </div>
        </div>
    </div>


    <table style="font-size: 13px !important;text-align: start; !important;">
        <tr style="font-size: 13px !important;background-color:#16b6d3;padding:3px !important; ">
            <td colspan="6" style="justify-content: start;text-align: start; !important;font-size: 13px !important;">
                For Office Use:
            </td>
        </tr>
        <tr style="font-size: 13px !important;">
            <td style="font-size: 13px !important;">
                Account#:
            </td>
            <td style="font-size: 13px !important;">
                <input type="text" value={{$office_use_account_number}}  class="no-border"
                       name="office_use_account_number">
            </td>
            <td style="font-size: 13px !important;">
                MemberID#:
            </td>
            <td style="font-size: 13px !important;">
                <input type="text" value={{$office_use_member_id_below}}  class="no-border"
                       name="office_use_member_id_below">
            </td>
            <td style="font-size: 13px !important;">
                Processed By:
            </td>
            <td style="font-size: 13px !important;">
                <input type="text" value={{$office_use_processed_by}}  class="no-border"
                       name="office_use_processed_by">
            </td>
        </tr>
        <tr style="font-size: 13px !important;text-align: start; !important;">
            <td style="font-size: 13px !important;text-align: start; !important" colspan="6">
                <p>
                    Monthly Debit Amount: $ <input type="text" class="no-border"
                                                   name="office_use_monthly_debit_amount"
                                                   value="{{$office_use_monthly_debit_amount}}">
                </p>
            </td>
        </tr>
        <tr style="font-size: 13px !important;text-align: start; !important;">
            <td style="font-size: 13px !important;text-align: start; !important" colspan="6">
                <p>
                    Monthly dates for direct debit are as follows: 1, 3, 7, 14, 21, 28 (debit will occur on or
                    around
                    the date selected)
                </p>
            </td>
        </tr>
        <tr style="font-size: 13px !important;text-align: start; !important;">
            <td style="font-size: 13px !important;" colspan="6">
                <p>
                    Date of Monthly Debit: <input type="text" class="no-border"
                                                  name="office_use_monthly_debit_amount"
                                                  value="{{$office_use_monthly_debit_amount}}">
                    First Debit Month:: <input type="text" class="no-border"
                                               name="office_use_monthly_debit_first_month"
                                               value="{{$office_use_monthly_debit_first_month}}">

                </p>
            </td>
        </tr>
    </table>
    <p style="padding:0;margin:0;font-size: 11px;color: grey">
        If any direct debits are returned for insufficient funds, a $53 charge will apply<br>
        A $100 annual-renewal fee will be charged on the anniversary of the account
    </p>
    <div style="text-align: center;margin: 0;padding: 0;">
        <img src="{{public_path('images/logo bottom.png')}}" alt="logo" width="200" height="100">
        <p style="margin: 0;padding: 0;">10</p>
    </div>


</form>
</body>

</html>

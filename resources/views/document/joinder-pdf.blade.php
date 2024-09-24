<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joinder Form</title>
    <style>
        /* @import url('https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,700i'); */
        
        @page {
            size: A4;
            counter-increment: page;
        }

        @page:first {
            counter-reset: page 9;
        }

        body {
            font-family: Montserrat, Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed; 
        }

        th, td {
            padding: 10px;
            text-align: left;
            overflow: hidden; 
            word-wrap: break-word;
        }

        th {
            background-color: #fff;
        }

        h1 {
            page-break-before: always;
        }

        input {
            border: none;
            border-bottom: 1px solid #000;
            width: 100%;
            padding: 5px 0;
            box-sizing: border-box;
        }
        input:focus{
            outline:none;
        }
        label {
            display: block;
            margin-top: 5px;
        }

        .table-body {
            width: 80%;
            margin: 0 auto; 
        }

        .strong {
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-sm {
            font-size: 12px;
        }

        tbody {
            display: block;
            width: 100%;
            box-sizing: border-box; 
        }

        tr {
            display: table; 
            table-layout: fixed;
            width: 100%;
        }

        .page-number {
            border: 1px solid;
            font-size: 12px;
            padding: 5px;
            content: counter(page);
        }

        .page-number::before {
            content: counter(page);
        }
        
    </style>
</head>

<body>
    <form id="joinderForm" method="POST" action="{{ route('save.joinder') }}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th colspan="6" class='text-center'>
                        <h1>SLC SUPPLEMENTAL NEEDS TRUST</h1>
                        <p>Joinder Agreement / Beneficiary Profile Sheet</p>
                    </th>
                </tr>
            </thead>
            <tbody class='table-body'>
                <tr>
                    <td colspan="6">
                        This is a legal document. It is an agreement pertaining to a supplemental needs trust created pursuant to 42 United States Code §1396p(d)(4). You are encouraged to seek independent, professional advice before signing this agreement. The undersigned hereby adopts, enrolls in and establishes a sub-trust account under the SLC Supplemental Needs Trust, dated December 24, 2017.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        NOTE: All questions must be answered or your application will be delayed.
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="strong">
                        BENEFICIARY INFORMATION
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        The Beneficiary and Donor must always be the same person. Only funds belonging to the Beneficiary may be contributed to the Trust.
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <strong>Name:</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input  type="text" id="" name="">
                        <label for="">First</label>
                    </td>
                    <td colspan="2">
                        <input  type="text" id="" name="">
                        <label for="">Middle</label>
                    </td>
                    <td colspan="2">
                        <input  type="text" id="" name="">
                        <label for="">Last</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style=''>
                            <span>Marital Status</span>
                            <div style=''>
                                <input type="radio">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <strong>Contact Information:</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input  type="text" id="" name="">
                        <label for="">Home Phone</label>
                    </td>
                    <td colspan="2">
                        <input  type="text" id="" name="">
                        <label for="">Cell Phone</label>
                    </td>
                    <td colspan='2'></td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input  type="text" id="" name="">
                        <label for="">Email</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <strong>Address:</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input  type="text" id="" name="">
                        <label for="">Address</label>
                    </td>
                    <td>
                        <input  type="text" id="" name="">
                        <label for="">Apt #</label>
                    </td>
                    <td>
                        <input  type="text" id="" name="">
                        <label for="">City</label>
                    </td>
                    <td>
                        <input  type="text" id="" name="">
                        <label for="">State</label>
                    </td>
                    <td>
                        <input  type="text" id="" name="">
                        <label for="">Zip</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <strong>Qualifying Disabilities:</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class='inline'>
                            <div>1.</div>
                            <input  type="text" id="" name="">
                        </div>
                    </td>
                    <td colspan="2">
                        <span>2.</span>
                        <input  type="text" id="" name="">
                    </td>
                    <td colspan="2">
                        <span>3.</span>
                        <input  type="text" id="" name="">
                    </td>
                </tr>
                <tr>
                    <td colspan='6' class='text-center'>
                    Please mail all trust documents to: <br>
                    <b>
                        SLC Supplemental Needs Trust <br>
                        5014-16th Ave, Suite 489 <br>
                        Brooklyn, NY 11204 <br>
                    </b>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <div>
                            <span class='text-sm'>
                            SLC SUPPLEMENTAL NEEDS TRUST
                            </span>
                        </div>
                    </td>
                    <td colspan='2' style='text-align: center;'>
                        <div>
                            <span class="page-number"></span>
                        </div> 
                    </td>
                    <td colspan='2' style='text-align: right; margin-top: 15px;'>
                        <div>
                            <span class='text-sm'>
                                JOINDER AGREEMENT
                            </span>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>

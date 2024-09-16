<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        * {
            font-size: 12px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            font-size: 10px;
            text-align: center;
        }

        tr:first-child th {
            font-size: 12px; /* Adjust the font size as needed */
        }

        .content {

            flex-direction: column;
        }

        .row-container {

            align-items: center;
        }

        body {
            margin-left: 50px;
            margin-right: 50px;
        }


        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }
    </style>
</head>
<body>
<div class="row-container" style="text-align: center">
    <h4>
        <img src="{{public_path('/images/intrustpit.png')}}" alt="int" style="max-width: 100%; height: 100px;">
    </h4>

</div>
<div>
    <h2 style="text-align: center;font-size: 20px;margin-top:0;margin-bottom: 0;">
        Approval Letter
    </h2>
</div>
<hr>
<div style="width: 90%;margin:0 auto">
    <div style="font-weight: bold;text-align:left;">
        <p>Date: 05/09/2024</p>
    </div>
    <div style="font-weight: bold;text-align:right;">
        <p style="font-weight: bold;text-align:right;text-decoration: underline;">Beneficiary Name: <span style="font-weight: lighter;">Name</span></p>
        <p style="font-weight: bold;text-align:right;text-decoration: underline;">Account Number: <span style="font-weight: lighter">9955</span></p>
        <p style="font-weight: bold;text-align:right;text-decoration: underline;">Data Established: <span style="font-weight: lighter">04/29/2024</span></p>
    </div>
</div>
<div style="width: 90%;margin:40px auto">
    <div>
        <p style="font-size: 18px">This letter is to confirm that Joinder Agreement application for the above named Beneficiary to join Trusted Surplus
            Solution Pooled trus has been approved and a sub-account has been established. The account is effective upon receipt
            of surplus deposit.
        </p>
        <p style="font-size: 18px">
            Should you have any further inquiries please do not hesitate to contact our office at 718-970-7878
        </p>
    </div>
    <div style="font-size: 18px">
        <p>Sincerely</p>
        <p style="font-family: Rage Italic;font-weight: bold;">signatue</p>
        <p>Enrollment Department</p>
    </div>
</div>
<div>
    <p style="text-align: center">PO Box 297-050, NY 11229 <span style="color: #16b6d3">TF:</span> 8772987878 <span style="color: #16b6d3">Tel:</span>718.970.7878 <span style="color: #16b6d3">Fax:</span> 646.904.8963</p>
    <p style="text-align: center;color:#16b6d3">www.trustedsurplus.org</p>

</div>

</body>
</html>

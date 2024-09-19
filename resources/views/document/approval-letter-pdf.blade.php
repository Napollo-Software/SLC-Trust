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
        footer {
    /* background-color: #f3f3f3;
    padding: 20px 0;
    text-align: center; */
}

.footer-table {
    display: table;
    width: 100%;
    margin: 0 auto;
}

.footer-row {
    display: table-row;
}

.footer-cell {
    display: table-cell;
    padding: 10px 20px;
    vertical-align: middle;
    text-align: center;
}
.footer-cell-1 {
    display: table-cell;
    padding: 10px 20px;
    vertical-align: middle;
    text-align: left;
}
.footer-cell2 {
    display: table-cell;
    padding: 10px 20px;
    vertical-align: middle;
    text-align: right;
}

.footer-cell img {
    display: block;
    margin: 0 auto 10px;
    width: 24px;
    height: 24px;
}

.footer-cell p {
    margin: 0;
    font-size: 14px;
    color: #555;
}

footer img {
    width: 25px;
    height: 25px;
}


@media (max-width: 768px) {
    .footer-table {
        display: block;
    }
    .footer-cell {
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }
}
    </style>
</head>
<body>
<div class="row-container" >
    <h4>
        <img src="https://billing.slctrusts.org/assets/img/slc_trust.png" alt="int" style="height: 50px;">
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
        <p>Date: {{\Carbon\Carbon::today()->format('m/d/Y')}}</p>
    </div>
    <div style="text-align: center; margin: auto;">
        <div style="font-weight: bold;text-align:left; width: 50%; margin: auto;">
            <p style="font-weight: bold;text-decoration: underline;">Beneficiary Name: <span style="font-weight: lighter;">{{$user->name.' '.$user->last_name}}</span></p>
            <p style="font-weight: bold;text-decoration: underline;">Account Number: <span style="font-weight: lighter">{{'000'.$user->id}}</span></p>
            <p style="font-weight: bold;text-decoration: underline;">Data Established: <span style="font-weight: lighter">{{\Carbon\Carbon::today()->format('m/d/Y')}}</span></p>
        </div>
    </div>
</div>
<div style="width: 90%;margin:40px auto">
    <div>
        <p style="font-size: 18px">This letter is to confirm that Joinder Agreement application for the above named Beneficiary to join Senior Care Life Pooled trust has been approved and a sub-account has been established. The account is effective upon receipt
            of surplus deposit.
        </p>
        <p style="font-size: 18px">
            Should you have any further inquiries please do not hesitate to contact our office at 718-500-3235
        </p>
    </div>
    <div style="font-size: 18px">
        <p style="margin: 0">Sincerely</p>
        <p style="font-family: serif; font-style: italic; font-weight: bold;margin: 0">Senior Care Life</p>

        <p style="margin: 0">Enrollment Department</p>
    </div>
</div>
<div>
    <div>
        <div style="width: 100%;">
            <div style="width: 25%; float: left">

                <span>718.500.3235</span>
            </div>
            <div style="width: 50%; float: left;text-align: center">

                <span>5014-16th Ave, Suite 489 Brooklyn, NY 11204</span>
            </div>
            <div style="width: 25%; float: left; text-align: right">

                <span style="float: right">info@slctrusts.org</span>
            </div>

        </div>
        <div>
            <div style="width: 100%;text-align: center">

                <span>www.seniorlifecaretrusts.org</span>
            </div>
        </div>
    </div>
</div>

</body>
</html>

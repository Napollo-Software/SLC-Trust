<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <img src="{{asset('assets/images/logo.png')}}" alt="int" style="max-width: 100%; height: 100px;">
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
    <div style="font-weight: bold;text-align:right;">
        <p style="font-weight: bold;text-align:right;text-decoration: underline;">Beneficiary Name: <span style="font-weight: lighter;">{{$user->name.' '.$user->last_name}}</span></p>
        <p style="font-weight: bold;text-align:right;text-decoration: underline;">Account Number: <span style="font-weight: lighter">{{'000'.$user->id}}</span></p>
        <p style="font-weight: bold;text-align:right;text-decoration: underline;">Data Established: <span style="font-weight: lighter">{{\Carbon\Carbon::today()->format('m/d/Y')}}</span></p>

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
        <p style="font-family: Rage Italic;font-weight: bold;">SLC</p>
        <p>Enrollment Department</p>
    </div>
</div>
<footer>
    <div class="footer-table">
        <div class="footer-row">
            <div class="footer-cell-1">
                <i style="color: #559e99;
    border: 1px solid;
    border-radius: 50%;
    padding: 3px;" class="fa fa-phone" aria-hidden="true"></i> &nbsp;
                <span>718.500.3235</span>
            </div>
            <div class="footer-cell">
                <i style="color: #559e99;
    border: 1px solid;
    border-radius: 50%;
    padding: 5px;" class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;
                <span>5014-16th Ave, Suite 489 Brooklyn, NY 11204</span>
            </div>
            <div class="footer-cell2">
                <i style="color: #559e99;
    border: 1px solid;
    border-radius: 50%;
    padding: 5px;" class="fa fa-envelope" aria-hidden="true"></i> &nbsp;
                <span>info@slctrusts.org</span>
            </div>
        
        </div>
        <div class="footer-row">
            <div class="footer-cell" style="visibility: hidden">
                <i  class="fa fa-globe" aria-hidden="true"></i> &nbsp;
                <span>www.seniorlifecaretrusts.org</span>
            </div>
            <div class="footer-cell">
                <i style="color: #559e99;
    border: 1px solid;
    border-radius: 50%;
    padding: 5px;" class="fa fa-globe" aria-hidden="true"></i> &nbsp;
                <span>www.seniorlifecaretrusts.org</span>
            </div>
        </div>
    </div>
</footer>

</body>
</html>

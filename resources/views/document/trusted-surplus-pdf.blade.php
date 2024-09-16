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
        Trusted Surplus Solution
    </h2>
    <p style="text-align: center;">VERIFICATION OF DEPOSITS</p>

</div>
<div style="width: 90%;margin:0 auto">
    <div style="font-weight: bold;text-align:right;">
        <p>Date: 05/09/2024</p>
        <p>Account: 99554</p>
        <p>Status: Active</p>
    </div>
    <div style="font-weight: bold;">
        <p>Erica McLeod</p>
        <p>126-02 Locust Manor Lane</p>
        <p>Apartment #2A</p>
        <p>Queens, NY, 11434</p>
    </div>
</div>
<div style="text-align: center">
    <p>04/29/2024 - 04/28/2025</p>
</div>
<table style="width: 100%;">

    <tr style="background-color:#CCCCCC">
        <td colspan="1">DATE</td>
        <td colspan="1">TRANS. TYPE</td>
        <td colspan="1">DESCRIPTION</td>
        <td colspan="1">DEBIT</td>
    </tr>
    <tr>
        <td colspan="1">
            <label>04/04/2012</label>
        </td>
        <td colspan="1">
            <label>SOme tect here</label>
        </td>
        <td colspan="1">
            <label>April 2012</label>
        </td>
        <td colspan="1">
            <label>$202.33</label>
        </td>
    </tr>
    <tr>
        <td colspan="1">
            <label>04/04/2012</label>
        </td>
        <td colspan="1">
            <label>SOme tect here</label>
        </td>
        <td colspan="1">
            <label>April 2012</label>
        </td>
        <td colspan="1">
            <label>$202.33</label>
        </td>
    </tr>

</table>
<div style="margin-top: 100px">
    <p style="text-align: center">PO Box 297-050, NY 11229 <span style="color: #16b6d3">TF:</span> 8772987878 <span style="color: #16b6d3">Tel:</span>718.970.7878 <span style="color: #16b6d3">Fax:</span> 646.904.8963</p>
    <p style="text-align: center;color:#16b6d3">www.trustedsurplus.org</p>

</div>


</body>
</html>

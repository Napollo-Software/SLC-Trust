<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>Disability</title>
    <style>
        /* table {
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
        }

        .no-border {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;


        }


        .custom-hr {
            height: 10px;
            border: none;
            background-color: black;
        }

        h6 {
            margin: 5px 0;
        }

        .checkbox-row label {
            margin-right: 20px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
        } */
        @font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-weight: normal;
    font-style: italic;}

    table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            /* border: 1px solid black; */
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: #666;
            color: white
        }
        .header-row {
            font-weight: bold;
        }


    </style>
</head>

<body>
<form id="trusted-form">
    @csrf
    <div>
        <div style="text-align: center;">
        <img src="{{ asset('images/intrustpit.png') }}" alt="Example Image">
    </div>
        <h2 style="text-align: center;font-size: 30px;margin-top:0;margin-bottom: 0;">
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
    <table>
        <thead>
            <tr class="header-row">
                <td colspan="4">04/29/2024 - 04/28/2025</td>
            </tr>
            <tr>
                <th>DATE</th>
                <th>TRANS. TYPE</th>
                <th>DESCRIPTION</th>
                <th>DEBIT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>04/29/2024</td>
                <td>Required Monthly Surplus</td>
                <td>April 2024</td>
                <td>$204.00</td>
            </tr>
            <tr>
                <td>05/02/2024</td>
                <td>Initial Fee</td>
                <td>Enrollment</td>
                <td>$250.00</td>
            </tr>
        </tbody>
    </table>
    
    <div style="margin-top: 100px">
        <p style="text-align: center">PO Box 297-050, NY 11229 <span style="color: #16b6d3">TF:</span> 8772987878 <span style="color: #16b6d3">Tel:</span>718.970.7878 <span style="color: #16b6d3">Fax:</span> 646.904.8963</p>
        <p style="text-align: center;color:#16b6d3">www.trustedsurplus.org</p>

    </div>

    

</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //save this form using ajax
        $('#trusted-form').submit(function (e) {
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

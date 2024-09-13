<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
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
            text-align: start;
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


        .custom-hr {
            height: 10px;
            /* Adjust the height as needed */
            border: none;
            background-color: black;
            /* Adjust the color as needed */
        }

        /* Adjusted margin for h6 */
        h6 {
            margin: 5px 0;
            /* You can adjust this margin value as needed */
        }

        .checkbox-row label {
            margin-right: 20px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
        }
        @font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-weight: normal;
    font-style: italic;}
    </style>
</head>

<body>
<form id="approval-form">
    @csrf
    <div>
        <div style="text-align: center;">
        <img src="{{ asset('images/intrustpit.png') }}" alt="Example Image">
    </div>

        <div style="display: table; width: 100%; margin-top: 20px;">
            <!-- Table row to hold both the heading and the right-aligned image -->
            <div style="display: table-row;">
                
                <div style="display: table-cell; text-align: center;visibility:hidden">
                    <h2 style="font-size: 30px; margin-top: 0;">
                        Approval Letter
                    </h2>
                </div>
                <!-- Left cell (empty space for centering) -->
                <div style="display: table-cell; text-align: center;">
                    <h2 style="font-size: 30px; margin-top: 0;">
                        Approval Letter
                    </h2>
                </div>
        
                <!-- Right cell (heart image) -->
                <div style="display: table-cell; text-align: right; vertical-align: middle;">
                    <img src="{{ asset('images/heart.png') }}" alt="Heart Image" style="margin-right: 20px;width:200px">
                </div>
            </div>
        </div>

        
    </div>
    <div style="width: 90%;margin:0 auto">
        <hr>
        <div>
            <p>Date: 04/29/2024</p>
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

    

</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //save this form using ajax
        $('#approval-form').submit(function (e) {
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

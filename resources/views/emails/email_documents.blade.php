<!DOCTYPE html>
<html>

<head>
    <title>Your Email Title</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        /* Reset some styles */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* Responsive styles for mobile devices */
        @media screen and (max-width: 600px) {
            h1 {
                font-size: 28px !important;
                line-height: 28px !important;
            }

            /* Add more responsive styles as needed */
        }

        /* Button styles */
        .cta-button {
            background-color: #559e99;
            color: #ffffff;
            text-decoration: none;
            font-weight: 700;
            font-family: 'Lato', Helvetica, Arial, sans-serif;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 4px;
            text-align: center;
            word-wrap: break-word; /* Allows text to wrap if it's too large */
            width: 150px; /* Fixed width for all buttons */
        }

        .cta-button:hover {
            background-color: #1faaa7;
        }
    </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<input type="hidden" name="userId" value="">
<table border="0" cellpadding="0" cellspacing="0" width="100%">

    <tr>
        <td bgcolor="#559e99" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 20px 0;">
                        <img src="https://billing.intrustpit.org/assets/img/intrustpit-Logo.png" alt="Logo" style="height: 80px; display: block; border: 0;" />
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#ffffff" align="center" style="padding: 20px 10px;">
            <h1 style="font-size: 30px; font-weight: 400; color: #333; margin: 0;">Hi {{$name}}!</h1>
        </td>
    </tr>

    <tr>
        <td bgcolor="#ffffff" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="left" style="padding: 20px 30px; color: #666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                        <p style="margin: 0; text-align: center;">{{ $email_message }}</p>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        @foreach($filtered_links as $link)
                            <a href="{{ $link }}" target="_blank" class="cta-button" style="color: #ffffff;">{{ $filtered_names[$loop->index] }}</a>
                            <br>
                            <br>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td height="20"></td>
                </tr>
            </table>
        </td>
    </tr>

</table>
</body>

</html>

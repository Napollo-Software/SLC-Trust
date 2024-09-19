<!DOCTYPE html>
<html>
<head>
    <title>Your Email Title</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style type="text/css">
        /* [existing styles] */
        /* Add new styles for buttons and other elements as needed */
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
            word-wrap: break-word;
            width: 150px;
        }
        .cta-button:hover {
            background-color: #1faaa7;
        }
    </style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
<!-- HIDDEN PREHEADER TEXT -->

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#559e99" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td bgcolor="#559e99" align="center">
            <!-- Logo Section -->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center"  style="padding: 20px 0;vertical-align: center">
                        <img src="https://billing.slctrusts.org/assets/img/slc_trust.png" alt="Logo" style="height: 130px; display: block; border: 0;" />
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
            <!-- Message Section -->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="left" style="padding: 20px 30px; color: #666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                        <p style="margin: 0; text-align: center;">{{ $email_message }}</p>
                    </td>
                </tr>
                <!-- Button Links -->
                @if(!empty($urls) && is_array($urls))
                <tr>
                    <td align="center">
                        @foreach($urls as $url)
                            <a href="{{ $url }}" target="_blank" class="cta-button">{{ ucwords(str_replace(['-', '_'], ' ', basename($url))) }}</a><br><br>
                        @endforeach
                    </td>
                </tr>
                @elseif(!empty($urls))
                <tr>
                    <td align="center">
                        <a href="{{ url($urls) }}" target="_blank" class="cta-button" style="color:white !important;">Click here</a><br><br>
                    </td>
                </tr>
                @endif
            </table>
        </td>
    </tr>
</table>
</body>
</html>

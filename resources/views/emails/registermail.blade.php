<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.professional_name') }} | Account Created</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

    </style>
</head>

<body style="background-color: #559e99; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="#559e99" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#559e99" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 0px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 1px; line-height: 48px;">
                            <img src="https://billing.slctrusts.org/assets/img/slc_trust.png" style="height:110px" style="display: block; border: 0px;" />
                            <hr style="border: 1px solid #06778a;">
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top" style="padding: 0px 20px 20px 20px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; letter-spacing: 0.5px; line-height: 24px;">
                            <p style="font-size: 20px; font-weight: 400; margin: 0;">Dear {{ $details->full_name() }},</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; letter-spacing: 0.5px; line-height: 24px;">
                            <p style="font-size: 16px; font-weight: 400; margin: 0;">Your registration request for SLC Trusts account has been received. Our team will be reviewing your profile. Once approved, you will receive a confirmation email within the next <strong>24 to 48 hours.</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; letter-spacing: 0.5px; line-height: 24px;">
                            <p style="font-size: 16px; font-weight: 400; margin: 0;">In the meantime, if you need any assistance, please don’t hesitate to contact us at <strong>{{ config('app.contact') }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; letter-spacing: 0.5px; line-height: 24px;">
                            <p style="font-size: 16px; font-weight: 400; margin: 0;">Thank you for choosing Senior Life Care. We look forward to serving you!</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left" valign="top" style="padding: 20px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; letter-spacing: 0.5px; line-height: 24px;">
                            <p style="font-size: 16px; font-weight: 400; margin: 0;">Warm regards,</p>
                            <p style="font-size: 16px; font-weight: 400; margin: 0;">The Senior Life Care Team.</p>
                        </td>
                    </tr>
                    <tr></tr>
            </td>
        </tr>
    </table>
</body>
</html>

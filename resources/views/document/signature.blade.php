<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signature PDF</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature-pad.min.css">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        @media print {
            .page-break {
                page-break-after: always;
            }
        }

        body {
            font-family: Arial, sans-serif;
            /* Set font to Arial for the entire page */
            line-height: 1.5;
        }

        .container {
            margin-top: 30px;
        }

        .card-header {
            background-color: #363636;
            color: #fff;
            padding: 10px;
        }

        .card-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
        }

        .signature-container {
            display: flex;
            justify-content: space-between;
        }

        /* Styling for text fields with bottom lines */
        input[type="text"],
        input[type="date"] {
            border: none;
            border-bottom: 2px solid #272727;
            /* Blue color for the bottom line */
            padding: 5px 0;
            background-color: transparent;
            /* Transparent background */
            width: 100%;
            margin-bottom: 15px;
        }

        /* Optional: Add focus styles */
        input[type="text"]:focus,
        input[type="date"]:focus {
            outline: none;
            border-color: #333;
            /* Color when the field is in focus */
        }

        body,
        input,
        label,
        button {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script type="text/javascript"></script>
</body>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h6>Sign the document after filling all the details</h6>
            </div>
            <table style="border: 1px solid black; border-collapse: collapse; width:100%">
                <tr>
                    <th style="border: 1px solid black; border-collapse: collapse; width:70%">Patient name
                        <br>
                        <div class="col-md-12">
                            <input type="text" id="edit_date" class="form-control" name="name">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                    </th>
                    <th style="border: 1px solid black; border-collapse: collapse;">Date of birth
                        <br>
                        <div class="col-md-12">
                            <input type="date" id="edit_date" class="form-control" name="DOB"
                                />
                            <span id="nameError" class="text-danger"></span>
                        </div>

                    </th>
                    <th style="border: 1px solid black; border-collapse: collapse;">Social security number
                        <br>
                        <div class="col-md-12">
                            <input type="text" id="edit_date" class="form-control" name="ssn">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                    </th>
                </tr>
                <td>Address <br>
                    <div class="col-md-12">
                        <input type="text" id="edit_date" class="form-control" name="address"
                            >
                        <span id="nameError" class="text-danger"></span>
                    </div>
                </td>
            </table>
            <div class="card-body">
                <p>I, or my authorized representative, request that health information regarding my care and treatment
                    be released as set forth on this form:
                    In accordance with New York State Law and the Privacy Ruic of the Health Insurance Portability and
                    Accountability Act of 1996
                    (HIPAA), I understand that:</p>
                <br>
                <p>(HIPAA), I understand that:
                    I. This authorization may include disclosure of information relating to <b>ALCOHOL and DRUG ABUSE,
                        MENTAL HEALTH TREATMENT</b> except psychotherapy notes, and <b>CONFIDENTIAL HIV* RELATED
                        INFORMATION </b>only
                    if I place my initials on
                    the appropriate line in Item 9(a). In the event the health information described below includes any
                    of these types of information, and I
                    initial the line on the box in Item 9(a), I specifically authorize release of such information to
                    the pcrson(s) indicated in Item 8. </p>
                <br>
                <p>
                    2. If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health
                    treatment information, the recipient is
                    prohibited from redisclosing such information without my authorization unless permitted to do so
                    under federal or state law. I
                    understand that I have the right to request a list of people who may receive or use my HIV-related
                    information without authorization. If
                    I experience discrimination because of the release or disclosure of HIV-related information, I may
                    contact the New York State Division
                    of Human Rights at (212) 480-2493 or the New York City Commission of Human Rights at (212) 306-7450.
                    These agencies arc.
                    responsible for protecting my rights.
                    <br>
                    3. I have the right to revoke this authorization at any time by writing to the health care provider
                    listed below. I understand that I may
                    revoke this authorization except to the extent that action has already been taken based on this
                    authorization.
                    <br>
                <div class="page-break"></div>

                4. I understand that signing this authorization is voluntary. My treatment, payment, enrollment in a
                health plan, or eligibility for
                benefits will not be conditioned upon my authorization of this disclosure.
                <br>
                5. Information disclosed under this authorization might be redisclosed by the recipient (except as
                noted above in Item 2), and this.
                rcdisclosure may no longer be protected by federal or state law.
                <br>
                <b>6. THIS AUTHORIZATION DOES NOT AUTHORIZE YOU TO DISCUSS MY HEALTH INFORMATION OR MEDICAL
                    CARE WITH ANYONE OTHER THAN THE ATTORNEY OR GOVERNMENTAL AGENCY SPECIFIED IN ITEM 9 (b),</b>
                </p>
                <table style="border: 1px solid black; border-collapse: collapse; width:100%">
                    <tr>
                        <td style="border: 1px solid black; border-collapse: collapse; width:100%">7. Name and address
                            of
                            health provider or entity to release this information
                            <br>
                            <input type="text">
                        </td>
                    </tr>
                    <td>8. Name and address ofperson(s) or category of person to whom this information will be sent:
                        <br>
                        <div class="col-md-12">
                            <input type="text" id="edit_date" class="form-control" name="8" />
                            <span id="nameError" class="text-danger"></span>
                        </div>
                    </td>
                    <tr>
                        <td>
                            9(a). Specific information to be released:
                            <div class="col-md-6">
                                <input type="text" id="edit_date" class="form-control" name="9" />
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; border-collapse: collapse; width:50%">
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="radio"> Medical Record from
                                </div>
                                <div class="col-md-2">
                                    <input type="date" id="edit_date" class="form-control" name="medical-record" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                                <div class="col-md-1">
                                    <p>to</p>
                                </div>
                                <div class="col-md-2">
                                    <input type="date" id="edit_date" class="form-control"
                                        name="medical-record-to" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <div class="page-break"></div>

                    <tr>
                        <td>
                            <input type="radio"> Entire Medical Record, including patient histories, office notes
                            (except psychotherapy notes), test results, radiology studies, films,
                            referrals, consults, billing records, insurance records, and records sent to you by other
                            health care providers.

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio"> others:
                            <div class="col-md-12">
                                <input type="text" id="edit_date" class="form-control" name="initial" />
                                <span id="nameError" class="text-danger"></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Include: (Indicate by Initialing) </b> <br>
                            <div style="display: flex; flex-direction: row;">
                                <label style="display: flex; align-items: center; margin-right: 20px;">
                                    <input type="checkbox"> Alcohol/Drug Treatment
                                </label>
                                <label style="display: flex; align-items: center; margin-right: 20px;">
                                    <input type="checkbox"> Mental Health Information
                                </label>
                                <label style="display: flex; align-items: center;">
                                    <input type="checkbox"> HIV-Related Information
                                </label>
                            </div>

                            <b>Authorization to Discuss Health Information</b>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="radio">
                                    <label>By initialing here</label>
                                    <input type="text" id="edit_date" class="form-control" name="initial" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                                <div class="col-md-8">
                                    <label>I authorize</label>
                                    <input type="text" id="edit_date" class="form-control" name="authorize" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </div>

                            <br>
                            to discuss my health information with my attorney, or a governmental agency, listed here:
                            NYC HRA Medical Assistance program 785 Atlantic Ave
                            <br><br>
                            <b>
                                <center>program 785 Atlantic Ave
                                    (Attorney/Finn Name or Governmental Algencv Name) </center>
                            </b>
                        </td>
                        <div class="page-break"></div>

                        <table style="border: 1px solid black; border-collapse: collapse; width:100%">
                            <th style="border: 1px solid black; border-collapse: collapse; width:50%">10. Reason for
                                release of information:
                                <br>
                                <input type="radio"> At request of individual
                                <input type="radio"> Others:
                                <div class="col-md-6">
                                    <input type="text" id="edit_date" class="form-control" name="at-request" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </th>
                            <th style="border: 1px solid black; border-collapse: collapse; width:50%">

                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        11. Date or event on which this authorization will expire
                                    </label>
                                    <input type="text" id="edit_date" class="form-control" name="11" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </th>
                        </table>
                        <table style="border: 1px solid black; border-collapse: collapse; width:100%">
                            <th style="border: 1px solid black; border-collapse: collapse; width:50%">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        12. If not the patient, name of person signing form:
                                    </label>
                                    <input type="text" id="edit_date" class="form-control" name="12" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                            </th>
                            <th style="border: 1px solid black; border-collapse: collapse; width:50%">
                                <div class="col-md-6">
                                    <label for="exampleFormControlInput1" class="form-label">13. Authority to sign on
                                        behalf of patient:</label>
                                    <input type="text" id="edit_date" class="form-control" name="13" />
                                    <span id="nameError" class="text-danger"></span>
                                </div>
                                <br>
                            </th>
                        </table>
                    </tr>
                </table>

                <div class="row">

                    <form class="col-md-8" id="signature-form" method="POST"
                        action="{{ route('signaturepad.upload') }}">
                        @csrf
                        <div id="signature-pad">
                            <canvas id="signature-canvas"></canvas>
                            <input type="hidden" id="signature64" name="signature64">
                            <p>Signature here</p>
                        </div>
                    </form>
                    <div class="col-md-4"> <input type="date" class="col-md-3" style="align-content: right">
                    </div>
                </div>
                <center><b>
                        <p>All items on this form have been completed and my questions about this form have been
                            answered.
                            In add111on, I have been provided a
                            copy of the form. </p>

                    </b></center>
                <button class="btn btn-primary" type="button" id="submit-button">Submit</button>
                <button class="btn btn-secondary" id="clear">Clear</button>
                </form>
            </div>
            <img src="{{ $signatureData }}" alt="Sign here" />

        </div>
    </div>


    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var canvas = document.getElementById('signature-canvas');
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: '#f2f2f2',
                penColor: '#000000'
            });
            $('#clear').click(function(e) {
                e.preventDefault();
                signaturePad.clear();
                $("#signature64").val('');
            });
            $('#submit-button').click(function(e) {
                e.preventDefault();
                $("#signature64").val(signaturePad.toDataURL());
                document.getElementById('signature-form').submit();
            });
        });
    </script>
</body>

</html>

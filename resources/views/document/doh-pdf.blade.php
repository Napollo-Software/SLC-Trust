<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         @font-face {
                font-family: 'Info-Bold';
                src: url('fonts/Info-Bold.otf') format('truetype');
            }
            @font-face {
                font-family: 'info-normal';
                src: url('fonts/info-normal.ttf') format('truetype');
            }
            @font-face {
                font-family: 'info-semibold';
                src: url('fonts/info-semibold.ttf') format('truetype');
            }
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 10px;
        }

        *{
            font-size: 12px;
            font-family:'info-normal'
         }

        table, th, td {
            border: none;
            margin: 0;
        }

        th, td {
            text-align: left;
            vertical-align: top;
        }

        input[type="checkbox"] {
            margin-right: 5px;
            vertical-align: top;
        }

        tr:first-child th {
            font-size: 16px;
        }
        .container-row::after {
            content: "";
            clear: both;
            display: table;
        }

        .container-row p {
            float: left;
        }

        .container-row h4 {
            float: right;
        }

        .custom-hr {
            height: 5px;
            border: none;
            background-color: black;
        }
        h6 {
            margin: 5px 0;
        }

        .checkbox-row label {
            margin-right: 20px;
        }
        /* styles */

        /* border */
        .border-bottom {
            border-bottom: 1px solid black;
            border-top: none;
            border-left: none;
            border-right: none;
        }
         .border-none{
            border:none;
         }
         /* font */
         .font-lg{
            font-size:22px;
            white-space:nowrap;
         }
         .text-base{
             font-size:13px;
         }
         .font-base{
            font-size:13px;
            white-space:nowrap;
            font-family:'info-semibold'
         }
         .font-bold{
          font-family:'Info-Bold'
         }
         .text-right{
            float:right;
         }
         .text-center{
            text-align:center;
         }
         .text-left{
            float:left;
         }
         .align-middle{
            vertical-align:middle;
         }
         .align-bottom{
            vertical-align:bottom;
         }
         /* padding */
         .p-0{
            padding:0;
         }
         .pt-20{
            padding-top:16px
         }
         .pt-12{
            padding-top:12px
         }
         /* margin */
         .m-0{
             margin:0;
            }
            .my-3{
                margin-top:3px;
                margin-bottom:3px
            }
            .mt-3{
               margin-top:3px
            }
        .py-3{
            padding-top:3px;
            padding-bottom:3px
        }

        </style>
</head>

<body>
<form id="doh-form">
    @csrf

    <div class="container-row">
        <div>
            <p class='font-base my-3 pt-20'>
                NEW YORK STATE DEPARTMENT OF HEALTH <br>
                Disability Review Unit
            </p>
            <span class='font-lg font-bold text-right pt-12'>
                Medical Report for Determination of Disability
            </span>
        </div>
    </div>
    <hr class="custom-hr m-0">
    <div style="width: 100%; background-color: rgb(184, 182, 182);margin: 0;">
        <h4 style="padding: 3px" class='font-base mt-3'>
            Section I – Identification
        </h4>
    </div>

    <div class="container-row" style="display: table; width: 100%;">
        <p style="display: table-cell; width: 25%;font-size: 10px">
            <span class='font-base'>Agency</span><br>
            <span class='text-base'>
                State Disability Review Unit OCP-826
            </span>
             <br>
             <span class='text-base'>
                 State of New York 
            </span>
            <br>
            <span class='text-base'>
                Department of Health
            </span>
             <br>
             <span class='text-base'>
                 Albany, NY 12237
                </span>
             <br>
             <span class='text-base'>
                 Telephone Number: 1(866) 330–0591
            </span>
        </p>
        <p style="display: table-cell; width: 35%;padding-inline-end: 55px">
            <span class='font-base'>Patient</span><br>
            <label style="display: block; margin: 5px 0;" class='text-base'>Name (Last, First, Middle)</label>
            <input type="text" class="border-bottom" value="{{$first_name}}" name="first_name"
                   style="box-sizing: border-box;width: 90%">

            <label style="display: block; margin: 5px 0;" clas='text-base'>Address (Street, City, State & Zip Code):</label>
            <textarea rows="10" class="border-bottom"
                      style="box-sizing: border-box;width: 90%">{{$address_text}}</textarea>
        </p>
        <p style="display: table-cell; width: 20%;">
            <label style="display: block; margin: 5px 0;">Date of Birth</label>
            <input type="text" class="border-bottom" value="{{$dob}}"
                   style=" box-sizing: border-box;width: 80%"><br>

            <label>Sex</label><br>
            <label>

                <input type="checkbox"
                       style="margin-right: 5px; vertical-align:center;" {{isset($sex1) && $sex1 == 'male' ?'checked': ''}}>
                Male
            </label>
            <label style="vertical-align: center">
                <input type="checkbox"
                       style="margin-right: 5px; vertical-align: center;" {{isset($sex2) && $sex2 == 'female' ?'checked': ''}}>
                Female
            </label>

            <br>

            Case Number

            <input type="text" name="case_number" class="no-border" value="{{$case_number}}"
                   style="border: none;  box-sizing: border-box;width: 80%;margin: 5px 0;">
        </p>

        <p style="display: table-cell; width: 20%;">

            <label for="" style="margin: 10px 0;">Client ID Number</label>
            <input type="text" name="client_id" class="no-border" value="{{$client_id}}"
                   style="border: none;  max-width: 100px; margin: 5px 0;">
            <br>
            <label for="" style="margin: 10px 0;">Disability ID Number</label>
            <input type="text" name="disability_id" class="no-border" value="{{$disability_id}}"
                   style="border: none;  max-width: 100px; margin: 5px 0;">

            SSN(Last four digits)
            <input type="text" name="ssn_last_four" class="no-border" value="{{$ssn_last_four}}"
                   style="border: none;  max-width: 100px; margin: 5px 0;">
            <br>
        </p>


    </div>
    <div style="width: 100%; background-color: rgb(184, 182, 182);margin: 0;">
        <h4 style="margin: 0;padding: 3px">
            Section I – Medical Report – Note to Provider
        </h4>
    </div>
    <p style="width: 100%;margin: 0;">
        This individual has made an application (reapplication) for Disability Medicaid. Your cooperation in
        completing this form to show the individual’s current condition, focusing on both remaining
        capabilities and limitations, is requested. Your promptness will ensure an early decision on the individual’s
        application.
    </p>
    <b style="margin: 0;">Please return the completed form to the agency in Section I above, along with a copy of all
        medical records
        for
        the past 12 months.
    </b>
    <div style="display: table; width: 100%;margin: 0;padding: 0;">
        <div style="display: table-cell; vertical-align: top; width: 75%;  padding: 5px 0; margin-right: 5px;">
            <p style="margin: 0;padding: 0;">Diagnosis(es)</p>

            <textarea class="no-border" rows="3" name="diagnosis" cols="50"
                      style="border: none;  width: 100%; height: 150px;">{{$diagnosis}}</textarea>
        </div>
        <div style="display: table-cell; vertical-align: bottom; width: 25%; padding-left:10px;">
            <p>
                <span style="display: inline-block; font-size: 12px;">Date of last Exam</span>
                <input type="text" class="no-border" value="{{$last_exam_date}}" name="last_exam_date"
                       style="border: none; display: inline-block;width: 65px">
            </p>

            <p>Height <input type="text" class="no-border" value="{{$height_ft}}" name="height_ft"
                             style="border: none; width: 25px"> ft. <input type="text"
                                                                                                     class="no-border"
                                                                                                     value="{{$height_in}}"
                                                                                                     name="height_in"
                                                                                                     style="border: none;  width: 30px">
                In.</p>
            <p>Weight <input type="text" name="weight" class="no-border" value="{{$weight}}"
                             style="border: none;  width: 40px"> lbs.</p>
        </div>
    </div>


    <div style="width: 100%; background-color: rgb(184, 182, 182);margin: 0;">
        <h4 style="margin: 0;padding: 3px">
            Exertional Functions. Please indicate what the individual is CAPABLE of doing:
        </h4>
    </div>

    <table style=" border:none; width:100%">
        <tr>
            <th style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <b class="custom-heading">Lifting</b>
            </th>
            <th style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <b class="custom-heading">Carrying</b>
            </th>
            <th style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <b class="custom-heading">Standing</b>
            </th>
            <th style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <b class="custom-heading">Walking</b>
            </th>
            <th style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <b class="custom-heading">Sitting</b>
            </th>
            <th style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <b class="custom-heading">Pushing</b>
            </th>
            <th style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <b class="custom-heading">Pulling</b>
            </th>
        </tr>
        <tr>
            <td style="padding: 0;margin: 0;text-align: start;">
                <label><input type="checkbox" {{isset($lifting1) && $lifting1 == '10lbs.' ? 'checked':''}}> 10lbs.
                </label> <br>
                <label><input type="checkbox" {{isset($lifting2) && $lifting2 == 'Max. 10lbs.' ? 'checked':''}}> Max.
                    10lbs.</label> <br>
                <label><input
                        type="checkbox" {{isset($lifting3) && $lifting3 == 'Max. 20lbs/freq. 10lbs.' ? 'checked':''}}>
                    Max. 20lbs/freq. 10lbs.</label> <br>
                <label><input
                        type="checkbox"{{isset($lifting4) && $lifting4 == 'Max. 50lbs/freq. 25lbs.' ? 'checked':''}}>
                    Max. 50lbs/freq. 25lbs.</label> <br>
                <label><input type="checkbox" {{isset($lifting5) && $lifting5 == '>50lbs.' ? 'checked':''}}>
                    &gt;50lbs.</label> <br>
            </td>

            <td style="padding: 0;margin: 0;text-align: start;">
                <label><input type="checkbox" {{isset($carrying1) && $carrying1 == '10lbs.' ? 'checked':''}}>
                    10lbs.</label> <br>
                <label><input type="checkbox" {{isset($carrying2) && $carrying2 == 'Max. 10lbs.' ? 'checked':''}}> Max.
                    10lbs.</label> <br>
                <label><input
                        type="checkbox" {{isset($carrying3) && $carrying3 == 'Max. 20lbs/freq. 10lbs.' ? 'checked':''}}>
                    Max. 20lbs/freq. 10lbs.</label> <br>
                <label><input
                        type="checkbox" {{isset($carrying4) && $carrying4 == 'Max. 50lbs/freq. 25lbs.' ? 'checked':''}}>
                    Max. 50lbs/freq. 25lbs.</label> <br>
                <label><input
                        type="checkbox" {{isset($carrying5) && $carrying5 == '>50lbs.' ? 'checked':''}}>>50lbs.</label>
                <br>
            </td>
            <td style="padding: 0;margin: 0;text-align: start;">
                <input type="checkbox" {{isset($standing1) && $standing1 == 'less_than_two' ? 'checked':''}}> &lt;2hrs./day<br>
                <input type="checkbox" {{isset($standing2) && $standing2 == '2hrs./day' ? 'checked':''}}> 2hrs./day<br>
                <input type="checkbox" {{isset($standing3) && $standing3 == '6hrs./day'? 'checked':''}}> 6hrs./day<br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;">
                <input type="checkbox" {{isset($walking1) && $walking1 == 'less_than_two' ? 'checked':''}}>
                &lt;2hrs./day<br>
                <input type="checkbox" {{isset($walking2) && $walking2 == '2hrs./day' ? 'checked':''}}> 2hrs./day<br>
                <input type="checkbox" {{isset($walking3) && $walking3 =='6hrs./day' ? 'checked':''}}> 6hrs./day<br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;">
                <input type="checkbox" {{isset($sitting1) && $sitting1 == 'less_than_six' ? 'checked':''}}>
                &lt;2hrs./day<br>
                <input type="checkbox" {{isset($sitting2) && $sitting2 == '6hrs./day' ? 'checked':''}}> 6hrs./day<br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;">
                <input type="checkbox" {{isset($pushing1) && $pushing1 == 'Using R arm' ? 'checked':''}}> Using R arm
                <br>
                <input type="checkbox" {{isset($pushing2) && $pushing2 == 'Using L arm' ? 'checked':''}}> Using L arm
                <br>
                <input type="checkbox" {{isset($pushing3) && $pushing3 == 'Using R leg' ? 'checked':''}}> Using R leg
                <br>
                <input type="checkbox" {{isset($pushing4) && $pushing4 == 'Using L leg' ? 'checked':''}}> Using L leg
                <br>
            </td>

            <td style="padding: 0;margin: 0;text-align: start;">
                <input type="checkbox" {{isset($pulling1) && $pulling1 == 'Using R arm' ? 'checked':''}}> Using R arm
                <br> <input type="checkbox" {{isset($pulling2) && $pulling2 == 'Using L arm' ? 'checked':''}}> Using L
                arm
                <br>

            </td>
        </tr>
    </table>
    <div style="width: 100%; background-color: rgb(184, 182, 182);margin: 0;">
        <h4 style="margin: 0;padding: 3px">
            Non-Exertional Functions. Please check if LIMITATIONS exist in any of the areas below:
        </h4>
    </div>

    <table style=" border:none; width:100%">
        <tr>
            <th style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <b class="custom-heading">Sensory</b>
            </th>
            <th style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <b class="custom-heading">Postural</b>
            </th>
            <th style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <b class="custom-heading">Manipulative</b>
            </th>
            <th style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <b class="custom-heading">Environmental</b>
            </th>
            <th style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <b class="custom-heading">Mental</b>
            </th>

        </tr>
        <tr>
            <td style="padding: 0;margin: 0;text-align: start;width: 18%">
                <input type="checkbox" name="sensory1"
                       value="No Limitations" {{isset($sensory1) && $sensory1 == 'No Limitations' ? 'checked':''}}> No
                Limitations
                <br>
                <input type="checkbox" name="sensory2"
                       value="Seeing" {{isset($sensory2) && $sensory2 == 'Seeing' ? 'checked':''}}> Seeing <br>
                <input type="checkbox" name="sensory3"
                       value="Hearing" {{isset($sensory3) && $sensory3 == 'Hearing' ? 'checked':''}}> Hearing <br>
                <input type="checkbox" name="sensory4"
                       value="Speaking" {{isset($sensory4) && $sensory4 == 'Speaking' ? 'checked':''}}> Speaking <br>


            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 18%">
                <input type="checkbox" name="postural1"
                       value="No Limitations" {{isset($postural1) && $postural1 == 'No Limitations' ? 'checked':''}}> No
                Limitations. <br>
                <input type="checkbox" name="postural2"
                       value="Stooping/Bending" {{isset($postural2) && $postural2 == 'Stooping/Bending' ? 'checked':''}}>
                Stooping/Bending <br>
                <input type="checkbox" name="postural3"
                       value="Crouching/Squatting" {{isset($postural3) && $postural3 == 'Crouching/Squatting' ? 'checked':''}}>Crouching/Squatting
                <br>
                <input type="checkbox" name="postural4"
                       value="Climbing" {{isset($postural4) && $postural4 == 'Climbing' ? 'checked':''}}> Climbing <br>


            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 18%">
                <input type="checkbox" name="manipulative1"
                       value="No Limitations" {{isset($manipulative1) && $manipulative1 == 'No Limitations' ? 'checked':''}}>
                No Limitations.
                <br>
                <input type="checkbox" name="manipulative2"
                       value="R Upper Extremity" {{isset($manipulative2) && $manipulative2== 'R Upper Extremity' ? 'checked':''}}>
                R Upper
                Extremity <br>
                <input type="checkbox" name="manipulative3"
                       value="L Upper Extremity" {{isset($manipulative3) && $manipulative3== 'L Upper Extremity' ? 'checked':''}}>
                L Upper
                Extremity <br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 23%">
                <input type="checkbox" name="environmental1"
                       value="No Limitations" {{isset($environmental1) && $environmental1 == 'No Limitations' ? 'checked':''}}>
                &lt;No Limitations <br>
                <input type="checkbox" name="environmental2"
                       value="Tolerating dust, fumes, extremes of temperature"{{isset($environmental2) && $environmental2 == 'Tolerating dust, fumes, extremes of temperature' ? 'checked':''}}>
                Tolerating dust, fumes, extremes of temperature <br>
                <input type="checkbox" name="environmental3" value="Tolerating exposure to heights or machinery"
                    {{isset($environmental3) && $environmental3== 'Tolerating exposure to heights or machinery' ? 'checked':''}}>
                Tolerating exposure to heights or machinery <br>
                <input type="checkbox" name="environmental4"
                       value="Operating a motor vehicle" {{isset($environmental4) && $environmental4 == 'Operating a motor vehicle' ? 'checked':''}}>
                Operating a motor vehicle <br>

                <br>
            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 23%">

                <input type="checkbox" name="mental1"
                       value="No Limitations" {{isset($mental1) && $mental1 == 'No Limitations' ? 'checked':''}}> No
                Limitations <br>
                <input type="checkbox" name="mental2" value="Understanding, carrying out, remembering instructions"
                    {{isset($mental2) && $mental2 == 'Understanding, carrying out, remembering instructions' ? 'checked':''}}>
                Understanding, carrying out, remembering
                instructions <br>
                <input type="checkbox" name="mental3"
                       value="Making simple work-related decisions" {{isset($mental3) && $mental3 == 'Making simple work-related decisions' ? 'checked':''}}>
                Making simple work-related
                decisions <br>
                <input type="checkbox" name="mental4"
                       value="Responding appropriately to supervision, co-workers, work situations"{{isset($mental4) && $mental4 == 'Responding appropriately to supervision, co-workers, work situations' ? 'checked':''}}>
                Responding appropriately
                to supervision,
                co-workers, work situations <br>
                <input type="checkbox" name="mental5"
                       value="Dealing with changes in a routine work setting" {{isset($mental5) && $mental5 == 'Dealing with changes in a routine work setting' ? 'checked':''}}>
                Dealing with changes in a routine work setting <br>


            </td>
        </tr>
    </table>

    <hr style="background-color: #B8B6B6">
    <div style="display: table;width: 100%">
        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p>Provider Signature</p>
            <div class="card-body" style="max-width: fit-content;">
                @if($doh_sign)
                    <img src="{{ $doh_sign }}" alt="Signature 1" width="300" height="150">
                @else
                    No Signature Provided
                @endif
            </div>
        </div>

        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p>
                Print Name
            </p>
            <div>
                <input type="text" name="print_name" class="no-border" value="{{ $print_name }}"
                       style="border: none;  width: 80%">
            </div>
        </div>


        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p>
                Date Signed
            </p>
            <div>
                <input type="text" name="date_signed" class="no-border" value="{{ $date_signed }}"
                       style="border: none;  width: 80%;">
            </div>
        </div>


    </div>


    <div style="display: table;width: 100%">
        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p>
                <label for="speciality">Speciality</label>
            </p>
            <div>
                <input type="text" name="speciallity" class="no-border" value="{{$speciallity}}"
                       style="border: none; width: 80%;">
            </div>
        </div>

        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p>
                <label for="office_address">Office Address</label>
            </p>
            <div>
                <input type="text" name="office_address" class="no-border" value="{{$office_address}}"
                       style="border: none; width: 80%;">
            </div>
        </div>

        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p>
                <label for="office_phone">Office Phone Number</label>
            </p>
            <div>
                <input type="text" name="office_phone" class="no-border" value="{{$office_phone}}"
                       style="border: none;  width: 80%;">
            </div>
        </div>
    </div>

    <p style="text-align: center">
        <strong><u>PLEASE RETURN THIS FORM ALONG WITH A COPY OF ALL MEDICAL RECORDS FOR THE PAST 12 MONTHS.</u></strong>
    </p>


</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        const canvas = document.getElementById('signature-doh');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2',
            penColor: '#000000',
        });

        $('#clear-doh').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $('#doh_sign').val('');
        });

        // on canvas value change save
        signaturePad.onEnd = function () {
            $('#doh_sign').val(signaturePad.toDataURL());
        };
        $('#doh-form').submit(function (e) {
            e.preventDefault();
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.doh') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type

                success: function (response) {
                    alert(response.url);
                }
            });
        });


    });

</script>
</body>

</html>

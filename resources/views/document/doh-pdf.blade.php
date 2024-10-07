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

        body{
            font-size: 11px;
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

        
        .xs{
            font-size: 12px;
        }

        .xxs{
            font-size: 9px;
        }

        .sm{
            font-size: 13px;
        }

        .md{
            font-size: 14px;
        }

        .lg{
            font-size: 16px;
        }
        .xl{
            font-size: 17px;
        }
        
        .mt-0{
            margin-top:0px
        }

        .semiBold{
            font-family: "info-semibold" !important;
        }

        .bold{
            font-family: "Info-Bold" !important;
        }


        input[type="checkbox"] {
            /* margin-right: 2px; */
            /* vertical-align: top; */
            vertical-align: middle;
            /* transform: scale(2); */
            
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
         .font-base2{
            font-size:11px;
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
            .mt-4{
               margin-top:4px
            }
        .py-3{
            padding-top:3px;
            padding-bottom:3px
        }
        input{
            font-size: 10px;
        }
        /* table tr:nth-child(2){
            position: relative;
            top: -100px
        } */

        </style>
</head>

<body>
<form id="doh-form">
    @csrf

    <div class="container-row">
        <div>
            <p style="font-size:14px" class='my-3 pt-20'>
                NEW YORK STATE DEPARTMENT OF HEALTH <br>
                Disability Review Unit
            </p>
            <span class='font-bold text-right pt-12' style="position:relative;top:8px;font-size:19px">
                Medical Report for Determination of Disability
            </span>
        </div>
    </div>
    <hr class="custom-hr m-0">
    <div style="width: 100%; background-color: #ccc;margin: 0;">
        <p style="padding: 2px 5px;margin-top:8px;font-size:12px" class='font-base'>
            Section I – Identification
        </p>
    </div>

    <div class="container-row" style="display: table; width: 100%;margin-top:25px">
        <p style="display: table-cell; width: 25%;font-size: 10px;position:relative;padding-right: 11px;margin:0">
            <span style="display:block;position: absolute;top: -1.2%;font-size:12px;" class='font-base'>Agency</span>
            <span style="font-size: 11px;display:inline-block;margin-top:2.5px">
                State Disability Review Unit OCP-826
            </span>
             <br>
             <span style="font-size: 11px">
                 State of New York 
            </span>
            <br>
            <span style="font-size: 11px">
                Department of Health
            </span>
             <br>
             <span style="font-size: 11px">
                 Albany, NY 12237
                </span>
             <br>
             <span style="font-size: 11px">
                 Telephone Number: 1(866) 330–0591
            </span>
        </p>
        <p style="display: table-cell; width: 35%;padding-inline-end: 55px;position:relative">
            <span style="display:block;position: absolute;top: -1.2%;font-size:12px" class='font-base'>Patient</span>
            <label style="display: block;margin-bottom:0;font-size:11px;margin-top: 5px;" class='text-base'>Name (Last, First, Middle)</label>
            <input type="text" value="{{$first_name}}" name="first_name"
            style="border:none;border-bottom:1px solid black;width: 90%;margin-top:0px">

            <label style="display: block; margin: 2.5px 0;margin-bottom:0;font-size:11px" clas='text-base'>Address (Street, City, State & Zip Code):</label>
            {{-- <textarea rows="10" class="border-bottom"
                      style="box-sizing: border-box;width: 90%">{{$address_text}}</textarea> --}}
            <input type="text" value="{{$address_text}}" name="address_text"style="border:none;border-bottom:1px solid black;width: 90%;">
            <input type="text" value="{{$address_text}}" name="address_text"style="border:none;border-bottom:1px solid black;width: 90%;">
            <input type="text" value="{{$address_text}}" name="address_text"style="border:none;border-bottom:1px solid black;width: 90%;position: relative;bottom: 2px;">
        </p>
        <p style="display: table-cell; width: 20%;margin-top: 5px;">
            <label style="font-size:11px">Date of Birth</label> <br>
            <input type="text" value="{{date('m/d/Y',strtotime($dob))}}"
            style="border:none;border-bottom:1px solid black;width: 85%; margin: 5px 0;"> <br>
            <label style="margin: 5px 0;display:block;margin-bottom: 7px;margin-top: 0;font-size:10px">Sex</label>
            <label  style="vertical-align:middle;position: relative;bottom: 4px;">

                <input type="checkbox"
                       style="margin-right: 1px; vertical-align:middle;transform: scale(1.5);" {{isset($sex1) && $sex1 == 'male' ?'checked': ''}}>
                <span style="font-size: 11.5px">Male</span>
            </label>
            <label style="vertical-align:middle;position: relative;bottom: 5px;left:2px">
                <input type="checkbox"
                       style="margin-right: 1px;vertical-align:middle;transform: scale(1.5);" {{isset($sex2) && $sex2 == 'female' ?'checked': ''}}>
                <span style="font-size: 11.5px">Female</span>
            </label>

            {{-- <br> --}}

            <label style="display:block;font-size:10px;margin-top: 10px;" for="">Case Number</label>
            <input type="text" name="case_number" class="no-border" value="{{$case_number}}"
                   style="border:none;border-bottom:1px solid black;width: 85%; margin: 1px 0;">
        </p>

        <p style="display: table-cell; width: 20%;margin-top: 5px;">

            <label for="" style="margin: 10px 0;font-size:11px">Client ID Number</label> <br>
            <input type="text" name="client_id"  value="{{$client_id}}"
                   style="border:none;border-bottom:1px solid black;width: 95%; margin: 5px 0;">
            <label for="" style="margin: 5px 0;font-size:11px">Disability ID Number</label> <br>
            <input type="text" name="disability_id" value="{{$disability_id}}"
            style="border:none;border-bottom:1px solid black;width: 95%; margin: 5px 0;">
            <label for="" style="margin: 5px 0;font-size:11px">SSN(Last four digits)</label> <br>
            <input type="text" name="ssn_last_four" value="{{$ssn_last_four}}"
            style="border:none;border-bottom:1px solid black;width: 95%; margin: 2.5px 0;">
            <br>
        </p>


    </div>
    <div style="width: 100%; background-color: #ccc;margin: 0;">
        <p style="padding: 2px 5px;margin:0;margin:5px 0;font-size:12px" class='font-base'>
            Section I – Medical Report – Note to Provider
        </p>
    </div>
    <p style="width: 100%;margin: 0;">
        This individual has made an application (reapplication) for Disability Medicaid. Your cooperation in
        completing this form to show the individual’s current condition, focusing on both remaining
        capabilities and limitations, is requested. Your promptness will ensure an early decision on the individual’s
        application.
    </p>
    <p class="font-bold mt-1" style="margin: 0;">Please return the completed form to the agency in Section I above, along with a copy of all medical records for the past 12 months.</p>
    <div style="display: table; width: 100%;margin: 0;padding: 0;">
        <div style="display: table-cell; vertical-align: top; width: 75%;  padding: 5px 0; margin-right: 5px;">
            {{-- <p style="margin: 0;padding: 0;">Diagnosis(es)</p> --}}

            {{-- <textarea class="no-border" rows="3" name="diagnosis" cols="50"
                      style="border: none;  width: 100%; height: 150px;">{{$diagnosis}}</textarea> --}}
            <label>Diagnosis(es)</label>
            <input type="text" value="{{$diagnosis}}" name="diagnosis"style="border:none;border-bottom:1px solid black;vertical-align:middle;width:87%;position: relative;top: 2px;">
            <input type="text" value="{{$diagnosis}}" name="diagnosis"style="border:none;border-bottom:1px solid black;vertical-align:middle;width:98%;">
            <input type="text" value="{{$diagnosis}}" name="diagnosis"style="border:none;border-bottom:1px solid black;vertical-align:middle;width:98%;">
        </div>
        <div style="display: table-cell; vertical-align: bottom; width: 25%; padding-left:10px;">
            <p style="margin: 0">
                <span style="display: inline-block; font-size: 12px;">Date of last Exam</span>
                <input type="text" value="{{date('m/d/Y',strtotime($last_exam_date))}}" name="last_exam_date"
                       style="border: none;border-bottom:1px solid black ;display: inline-block;width: 77px">
            </p>

            <p style="margin: 0">Height <input type="text" value="{{$height_ft}}" name="height_ft"
            style="border: none;border-bottom:1px solid black ;width: 55px;vertical-align:middle"> ft. 
            <input type="text" value="{{$height_in}}" name="height_in" style="border: none;border-bottom:1px solid black;width: 35px;vertical-align:middle"> in.</p>
            <p style="margin: 0">Weight <input type="text" name="weight" value="{{$weight}}" style="border: none;border-bottom:1px solid black;width: 50px;vertical-align:middle"> lbs.</p>
        </div>
    </div>


    <div style="width: 100%; background-color: #ccc;margin: 0;">
        <p style="padding:2px 5px;margin:0;margin-top:8px;font-size:12px" class='font-base'>
            Exertional Functions. Please indicate what the individual is CAPABLE of doing:
        </p>
    </div>

    <table style="width:100%">
        <tr>
            <td style="border:none; padding:5px 0; text-align:start">
                <span style="font-size:11px;" class='font-base'>Lifting</span>
            </td>
            <td style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Carrying</span>
            </td>
            <td style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Standing</span>
            </td>
            <td style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Walking</span>
            </td>
            <td style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Sitting</span>
            </td>
            <td style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Pushing</span>
            </td>
            <td style="border:none; font-size:10px;  padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Pulling</span>
            </td>
        </tr>
        <tr style="width:100%">
            <td style="padding: 0;margin: 0;text-align: start;width:19%">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($lifting1) && $lifting1 == '10lbs.' ? 'checked':''}}>  &gt; 10 lbs.
                </label> <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($lifting2) && $lifting2 == 'Max. 10lbs.' ? 'checked':''}}> Max. 10 lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input
                        type="checkbox" {{isset($lifting3) && $lifting3 == 'Max. 20lbs/freq. 10lbs.' ? 'checked':''}}>
                    Max. 20 lbs./freq. 10 lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input
                        type="checkbox"{{isset($lifting4) && $lifting4 == 'Max. 50lbs/freq. 25lbs.' ? 'checked':''}}>
                    Max. 50 lbs./freq. 25lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($lifting5) && $lifting5 == '>50lbs.' ? 'checked':''}}>
                    &gt; 50 lbs.</label> <br>
            </td>

            <td style="padding: 0;margin: 0;text-align: start;width:19% ">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($carrying1) && $carrying1 == '10lbs.' ? 'checked':''}}>
                    &gt; 10 lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($carrying2) && $carrying2 == 'Max. 10lbs.' ? 'checked':''}}> Max. 10 lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input
                        type="checkbox" {{isset($carrying3) && $carrying3 == 'Max. 20lbs/freq. 10lbs.' ? 'checked':''}}>
                    Max. 20 lbs./freq. 10 lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input
                        type="checkbox" {{isset($carrying4) && $carrying4 == 'Max. 50lbs/freq. 25lbs.' ? 'checked':''}}>
                    Max. 50 lbs./freq. 25 lbs.</label> <br>
                <label style="position: relative;bottom:4px"><input
                        type="checkbox" {{isset($carrying5) && $carrying5 == '>50lbs.' ? 'checked':''}}> > 50 lbs.</label>
                <br>
            </td>
            <td style="padding: 0;margin: 0;text-align: start;position: relative;bottom:4px;width:12%">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($standing1) && $standing1 == 'less_than_two' ? 'checked':''}}> &lt; 2 hrs./day</label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($standing2) && $standing2 == '2hrs./day' ? 'checked':''}}> 2 hrs./day</label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($standing3) && $standing3 == '6hrs./day'? 'checked':''}}> 6 hrs./day<label><br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;width:12%">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($walking1) && $walking1 == 'less_than_two' ? 'checked':''}}>
                &lt; 2 hrs./day</label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($walking2) && $walking2 == '2hrs./day' ? 'checked':''}}> 2 hrs./day</label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($walking3) && $walking3 =='6hrs./day' ? 'checked':''}}> 6 hrs./day</label><br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;width:12%">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($sitting1) && $sitting1 == 'less_than_six' ? 'checked':''}}>
                &lt; 6 hrs./day</label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($sitting2) && $sitting2 == '6hrs./day' ? 'checked':''}}> 6 hrs./day</label><br>

            </td>
            <td style="padding: 0;margin: 0;text-align: start;width:12%">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($pushing1) && $pushing1 == 'Using R arm' ? 'checked':''}}> Using R arm</label>
                <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($pushing2) && $pushing2 == 'Using L arm' ? 'checked':''}}> Using L arm</label>
                <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($pushing3) && $pushing3 == 'Using R leg' ? 'checked':''}}> Using R leg</label>
                <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($pushing4) && $pushing4 == 'Using L leg' ? 'checked':''}}> Using L leg</label>
                <br>
            </td>

            <td style="padding: 0;margin: 0;text-align: start;width:12%">
                <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($pulling1) && $pulling1 == 'Using R arm' ? 'checked':''}}> Using R arm</label>
                <br> <label style="position: relative;bottom:4px"><input type="checkbox" {{isset($pulling2) && $pulling2 == 'Using L arm' ? 'checked':''}}> Using L arm</label>
                <br>

            </td>
        </tr>
    </table>
    <div style="width: 100%; background-color:#ccc;margin: 0;margin-top:-4px !important">
        <p style="padding:2px 5px;margin:0;margin-top:8px;font-size:12px" class='font-base'>
            Non-Exertional Functions. Please check if LIMITATIONS exist in any of the areas below:
        </p>
    </div>

    <table style=" border:none; width:100%;">
        <tr>
            <td style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Sensory</apsn>
            </td>
            <td style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Postural</span>
            </td>
            <td style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Manipulative</span>
            </td>
            <td style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Environmental</span>
            </td>
            <td style="border:none; font-size:10px; padding:5px 0; text-align:start">
                <span style="font-size:11px;" class="font-base">Mental</span>
            </td>

        </tr>
        <tr>
            <td style="padding: 0;margin: 0;text-align: start;width: 12.3%">
                <label style="position: relative;bottom:4px"><input type="checkbox" name="sensory1"
                       value="No Limitations" {{isset($sensory1) && $sensory1 == 'No Limitations' ? 'checked':''}}> No Limitations </label>
                <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="sensory2"
                       value="Seeing" {{isset($sensory2) && $sensory2 == 'Seeing' ? 'checked':''}}> Seeing</label> <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="sensory3"
                       value="Hearing" {{isset($sensory3) && $sensory3 == 'Hearing' ? 'checked':''}}> Hearing</label> <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="sensory4"
                       value="Speaking" {{isset($sensory4) && $sensory4 == 'Speaking' ? 'checked':''}}> Speaking</label> <br>


            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 16%">
                <label style="position: relative;bottom:4px"><input type="checkbox" name="postural1"
                       value="No Limitations" {{isset($postural1) && $postural1 == 'No Limitations' ? 'checked':''}}> No
                Limitations. </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="postural2"
                       value="Stooping/Bending" {{isset($postural2) && $postural2 == 'Stooping/Bending' ? 'checked':''}}>
                Stooping/Bending </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="postural3"
                       value="Crouching/Squatting" {{isset($postural3) && $postural3 == 'Crouching/Squatting' ? 'checked':''}}>Crouching/Squatting</label>
                <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="postural4"
                       value="Climbing" {{isset($postural4) && $postural4 == 'Climbing' ? 'checked':''}}> Climbing </label><br>


            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 15%">
                <label style="position: relative;bottom:4px"><input type="checkbox" name="manipulative1"
                       value="No Limitations" {{isset($manipulative1) && $manipulative1 == 'No Limitations' ? 'checked':''}}>
                No Limitations.</label>
                <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="manipulative2"
                       value="R Upper Extremity" {{isset($manipulative2) && $manipulative2== 'R Upper Extremity' ? 'checked':''}}>
                R Upper Extremity </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="manipulative3"
                       value="L Upper Extremity" {{isset($manipulative3) && $manipulative3== 'L Upper Extremity' ? 'checked':''}}>
                L Upper Extremity </label><br>
            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 29%">
                <label style="position: relative;bottom:4px"><input type="checkbox" name="environmental1"
                       value="No Limitations" {{isset($environmental1) && $environmental1 == 'No Limitations' ? 'checked':''}}>
                No Limitations </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="environmental2"
                       value="Tolerating dust, fumes, extremes of temperature"{{isset($environmental2) && $environmental2 == 'Tolerating dust, fumes, extremes of temperature' ? 'checked':''}}>
                Tolerating dust, fumes, extremes of temperature </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="environmental3" value="Tolerating exposure to heights or machinery"
                    {{isset($environmental3) && $environmental3== 'Tolerating exposure to heights or machinery' ? 'checked':''}}>
                Tolerating exposure to heights or machinery</label> <br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="environmental4"
                       value="Operating a motor vehicle" {{isset($environmental4) && $environmental4 == 'Operating a motor vehicle' ? 'checked':''}}>
                Operating a motor vehicle </label><br>

                <br>
            </td>
            <td style="padding: 0;margin: 0;text-align: start;width: 30%">

                <label style="position: relative;bottom:4px"><input type="checkbox" name="mental1"
                       value="No Limitations" {{isset($mental1) && $mental1 == 'No Limitations' ? 'checked':''}}> No Limitations</label> <br>
                <label style="position: relative;bottom:4px;white-space:nowrap"><input type="checkbox" name="mental2" value="Understanding, carrying out, remembering instructions"
                    {{isset($mental2) && $mental2 == 'Understanding, carrying out, remembering instructions' ? 'checked':''}}>
                Understanding, carrying out, remembering instructions
                 </label><br>
                <label style="position: relative;bottom:4px;white-space:nowrap">
                    <input type="checkbox" name="mental3"
                       value="Making simple work-related decisions" {{isset($mental3) && $mental3 == 'Making simple work-related decisions' ? 'checked':''}}>
                Making simple work-related decisions 
            </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="mental4"
                       value="Responding appropriately to supervision, co-workers, work situations"{{isset($mental4) && $mental4 == 'Responding appropriately to supervision, co-workers, work situations' ? 'checked':''}}>
                Responding appropriately to supervision, <br>
                <span style="margin-left: 11px">co-workers, work situations</span>
                 </label><br>
                <label style="position: relative;bottom:4px"><input type="checkbox" name="mental5"
                       value="Dealing with changes in a routine work setting" {{isset($mental5) && $mental5 == 'Dealing with changes in a routine work setting' ? 'checked':''}}>
                Dealing with changes in a routine work setting </label><br>

            </td>
        </tr>
    </table>
     <div style="border-top: 4px solid #ccc;margin-bottom:5px"></div>
    {{-- <hr  style="background-color: #e9e9e9;margin-top:10px"> --}}
    <div style="display: table;width: 100%;">
        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p style="margin:0;margin-bottom:5px">Provider Signature</p>
            <div class="card-body" style="max-width: fit-content;">
                @if($doh_sign)
                    <img src="{{ $doh_sign }}" alt="Signature 1" width="200" height="80">
                @else
                    No Signature Provided
                @endif
            </div>
        </div>

        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p style="margin:0;margin-bottom:5px">
                Print Name
            </p>
            <div>
                <input type="text" name="print_name" class="no-border" value="{{ $print_name }}"
                       style="border: none;border-bottom:1px solid black;width: 92%">
            </div>
        </div>


        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p style="margin:0;margin-bottom:5px">
                Date Signed
            </p>
            <div>
                <input type="text" name="date_signed" class="no-border" value="{{date('m/d/Y',strtotime($date_signed))}}"
                       style="border: none;border-bottom:1px solid black;width: 98%;">
            </div>
        </div>


    </div>


    <div style="display: table;width: 100%">
        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p style="margin:0;margin-bottom:5px">
                <label for="speciality">Speciality</label>
            </p>
            <div>
                <input type="text" name="speciallity" class="no-border" value="{{$speciallity}}"
                       style="border: none;border-bottom:1px solid black;width: 92%;">
            </div>
        </div>

        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p style="margin:0;margin-bottom:5px">
                <label for="office_address">Office Address</label>
            </p>
            <div>
                <input type="text" name="office_address" class="no-border" value="{{$office_address}}"
                       style="border: none;border-bottom:1px solid black;width: 92%;">
            </div>
        </div>

        <div style="display: table-cell; vertical-align: middle; width: 25%;">
            <p style="margin:0;margin-bottom:5px">
                <label for="office_phone">Office Phone Number</label>
            </p>
            <div>
                <input type="text" name="office_phone" class="no-border" value="{{$office_phone}}"
                       style="border: none;border-bottom:1px solid black; width: 98%;">
            </div>
        </div>
    </div>
    
    <p style="margin:0;font-size:11px;vertical-align: middle;">
        <span style="text-align: left;vertical-align: middle;">DOH-5143 (8/18)</span>
        <span style="text-decoration:underline;text-align:center;display: inline-block;
    width: 85%;vertical-align: middle;">PLEASE RETURN THIS FORM <span class="font-base2" style="text-decoration:underline;"> ALONG WITH A COPY OF ALL MEDICAL RECORDS FOR THE PAST 12 MONTHS.</span></span>
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

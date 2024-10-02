<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Map</title>
    <style>

        @font-face {
            font-family: 'APEFNO-Arial-BoldMT';
            src: url('fonts/APEFNO-Arial-BoldMT.ttf') format('truetype');
        }
        @font-face {
            font-family: 'HEEJYJ-Arial_2';
            src: url('fonts/HEEJYJ-Arial_2.ttf') format('truetype');
        }
        @font-face {
            font-family: 'HEEJYJ-Arial';
            src: url('fonts/HEEJYJ-Arial.ttf') format('truetype');
        }
        @font-face {
            font-family: 'KEESCU-ArialMT';
            src: url('fonts/KEESCU-ArialMT.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ARIALBI';
            src: url('fonts/ARIALBI.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ArialCEMTBlack';
            src: url('fonts/ArialCEMTBlack.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ArialMdm';
            src: url('fonts/ArialMdm.ttf') format('truetype');
        }
        @font-face {
            font-family: 'ARIAL';
            src: url('fonts/ARIAL.ttf') format('truetype');
        }


        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }
        *{
            font-size: 12px;
            font-family: "ARIAL"
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
<form id="map-form">
    @csrf

    <div class="row-container">
        <h4>
            AUTHORIZATION TO RELEASE MEDICAL INFORMATION

            <img src="{{public_path('/images/nyc.png')}}" alt="NYC" style="max-width: 120%; height: 120px;">
        </h4>

    </div>
    <table style="width: 100%;">
        <tr style="background-color:#CCCCCC">
            <td colspan="4">INFORMATION ABOUT MEDICAL OR OTHER SOURCE - PLEASE PRINT, TYPE, OR WRITE CLEARLY</td>
        </tr>
        <tr>
            <td colspan="3">
                <label>Name and address of source (with zip code)</label><br>
                <input type="text" name="name_address" class="no-border" value="{{$name_address}}">
            </td>
            <td colspan="1">
                <label>RELATIONSHIP TO DISABLED PERSON</label><br>
                <input type="text" name="relationship_disabled" class="no-border" value="{{$relationship_disabled}}">
            </td>
        </tr>
        <tr style="background-color:#CCCCCC">
            <td colspan="4">INFORMATION ABOUT DISABLED PERSON—PLEASE PRINT, TYPE, OR WRITE CLEARLY</td>
        </tr>
        <tr>
            <td colspan="2" >
                <label for="Patient Name">NAME AND ADDRESS (if known) AT THE TIME DISABLED PERSON HAD CONTACT WITH SOURCE (Include Zip Code)</label><br>
                <input type="text" name="source_contact_name_address" class="no-border" value="{{$source_contact_name_address}}">
            </td>
            <td colspan="1">
                <label for="Patient Name">Date Of Birth</label><br>
                <input type="text" name="dob" class="no-border" value="{{$dob}}">
            </td>
            <td colspan="1">
                <label for="Patient Name">DISABLED PERSON'S I.D. NUMBER (If known and if different than SSN.)</label><br>
                <input type="text" name="disabled_id" class="no-border" value="{{$disabled_id}}">
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <label for="Patient Name">APPROXIMATE DATES OF DISABLED PERSON'S CONTACT WITH SOURCE (e.g., dates of hospital admission, treatment, discharges, etc.)</label><br>
                <input type="text" name="disabled_contact_time" class="no-border" value="{{$disabled_contact_time}}" style="width:100%">
            </td>
        </tr>
    </table>

    <p>I hereby authorize the above named source to release or disclose to the Medical Assistance Program for
        re-disclosure in connection with my application for public health insurance.</p>
    <div style="padding-left: 20px">
        <p>1) All medical records or other information regarding my treatment, hospitalization, and/or outpatient care
            of my impairment(s), including psychological or psychiatric impairment(s) drug abuse, alcoholism, sickle
            cell anemia, acquired immunodeficiency syndrome (AIDS), or test for infection with human immunodeficiency
            virus (HIV).</p>
        <p>2) Information about how my impairment(s) affects my ability to complete tasks and activities of daily
            living.</p>
        <p>3) Information about how my impairment(s) affected my ability to do work.</p>
    </div>
    <p>I understand that this authorization, except for action already taken, may be voided by me at any time. If I do
        not void this authorization, it will automatically end at the conclusion of any proceedings, administrative or
        judicial, in connection with my Medicaid application, including any appeals. If I am already receiving benefits,
        the authorization will end when a final decision is made as to whether I can continue to receive benefits.</p>
    <table>

        <tr>
            <td>
                <label>
                    SIGNATURE OF DISABLED PERSON OR PERSON AUTHORIZED TO
                    ACT IN HIS/HER BEHALF
                </label><br>
                <div class="card-body" style="justify-content: space-around">

                    @if($map_sign)
                        <img src="{{ $map_sign }}" alt="map_sign" width="150" height="100">
                    @else
                        No Signature Provided
                @endif
            </td>
            <td>
                <label>
                    RELATION TO DISABLED PERSON
                    (If other than self)
                </label><br>
                <input type="text" name="disabled_relation_other" class="no-border" value={{$disabled_relation_other}}>
            </td>
            <td>
                <label>DISABLED PERSON'S I.D.
                    NUMBER (If known and if
                    different than SSN.) </label><br>
                <input type="text" name="disabled_id_other" class="no-border" value={{$disabled_id_other}}>
            </td>
            <td>

                <label >Date</label><br>
                <input type="text" name="date_map" class="no-border" value="{{$date_map}}">

            </td>
        <tr>
            <td colspan="2">
                <label>
                    STREET ADDRESS
                </label><br>
                <input type="text" name="disabled_relation_street" class="no-border"
                       value="{{$disabled_relation_street}}" style="width:100%">
            </td>
            <td  colspan="2">
                <label>
                    TELEPHONE NUMBER
                </label><br>
                <input type="text" name="disabled_relation_street" class="no-border"
                       value="{{$disabled_relation_street}}" style="width:100%">
            </td>

        </tr>
        <tr>
            <td  colspan="2">
                <label>
                    City
                </label><br>
                <input type="text" name="disabled_relation_city" class="no-border" value="{{$disabled_relation_city}}"
                       style="width:100%">
            </td>
            <td>
                <label>
                    STATE
                </label><br>
                <input type="text" name="disabled_relation_state" class="no-border" value="{{$disabled_relation_state}}"
                       style="width:100%">
            </td>
            <td>
                <label>
                    ZIP CODE
                </label><br>
                <input type="text" name="disabled_relation_zip" class="no-border" value="{{$disabled_relation_zip}}"
                       style="width:100%">
            </td>
        </tr>
        </tr>
    </table>

</form>

</body>
</html>

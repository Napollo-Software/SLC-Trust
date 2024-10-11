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
        @font-face {
            font-family: 'ARIALBD';
            src: url('fonts/ARIALBD.ttf') format('truetype');
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
        input{
            border: none;
            height: 10px;
        }
        td.c-tr{
            
            font-family: 'ARIAL';
            vertical-align: top;
            text-align: left;
        
        }
        td.c-tr-center{
            
            font-family: 'ARIAL';
            vertical-align: top;
            font-size: 10px;
            /* text-align: left; */
        
        }
        .label-style{
            font-size: 10px;
            line-height: 1;
        }
        .inp-style{
            /* position:relative; */
            /* bottom:12px; */
            /* display:block; */
            width:100%;
            font-size: 10px;
            line-height: 1;
        }
    </style>
</head>
<body>

<form id="map-form">
    @csrf

    <div class="row-container" style="width:100%;">
        {{-- <div > --}}
             <div style="width: 55%;display:inline-block;">
                <p style="width: 100%; font-family: 'ARIALBD';text-align:center;position:relative;bottom:15px">
                    AUTHORIZATION TO RELEASE MEDICAL INFORMATION
                </p>
             </div>
             <div style="width: 40%; padding: 5px; text-align: right;display:inline-block;position:relative;left:25px;top:15px">
                <img src="{{public_path('/images/nyc2.png')}}" alt="NYC" style="height: 85px;width:100%;">
             </div>
        {{-- </div> --}}
      

    </div>
    <table style="width: 100%;margin-top:20px">
        <tr style="background-color:#ddd">
            <td style="font-family: 'ARIAL';font-size:11px;" colspan="4" ><span style="position:relative;top:2px;font-size:11px">INFORMATION ABOUT MEDICAL OR OTHER SOURCE - PLEASE PRINT, TYPE, OR WRITE CLEARLY</span></td>
        </tr>
        <tr>
            <td class="c-tr"  colspan="3">
                <label class="label-style" style="font-size: 10px" ><p style="margin:0;font-size:10px;line-height:1;margin-top:5px">NAME AND ADDRESS OF SOURCE (include Zip Code)</p></label>
                <input class="inp-style" style="font-size: 10px;position:relative;right:5px" type="text" name="name_address"  value="{{$name_address}}">
            </td>
            <td class="c-tr" colspan="1">
                <label class="label-style" style="font-size: 10px"><p style="margin:0;font-size:10px;line-height:1;margin-top:5px">RELATIONSHIP TO DISABLED PERSON</p></label>
                <input class="inp-style" style="font-size: 10px;position:relative;right:5px" type="text" name="relationship_disabled" value="{{$relationship_disabled}}">
            </td>
        </tr>
        <tr style="background-color:#ddd">
            <td style="font-family: 'ARIAL';font-size:11px;" colspan="4"><span style="position:relative;top:2px;font-size:11px">INFORMATION ABOUT DISABLED PERSON - PLEASE PRINT, TYPE, OR WRITE CLEARLY</span></td>
        </tr>
        <tr>
            <td class="c-tr" colspan="2" >
                <label class="label-style" style="font-size: 10px;bottom:7px" for="Patient Name"><p style="margin:0;font-size:8.6px;line-height:1;margin-top:5px">NAME AND ADDRESS (if known) AT THE TIME DISABLED PERSON HAD CONTACT WITH SOURCE (Include Zip Code)</p></label>
                <input style="position: relative;right:5px" class="inp-style" type="text" name="source_contact_name_address" value="{{$source_contact_name_address}}">
            </td>
            <td class="c-tr-center" colspan="1">
                <label class="label-style" style="text-align: center" for="Patient Name"><p style="margin:0;font-size:10px;line-height:1;margin-top:5px;position:relative;right:8px">DATE OF BIRTH</p></label>
                <input class="inp-style" style="text-align: left;position: relative;left:5px" type="text" name="dob" value="{{date('m/d/Y',strtotime($dob))}}">
            </td>
            <td class="c-tr" colspan="1">
                <label class="label-style" style="bottom:10px" for="Patient Name"><p style="margin:0;font-size:10px;line-height:1;margin-top:5px">DISABLED PERSON'S I.D. NUMBER (If known and if different than SSN.)</p></label>
                <input style="text-align:left;position: relative;right:5px"  class="inp-style" type="text" name="disabled_id" value="{{$disabled_id}}">
            </td>
        </tr>
        <tr>
            <td class="c-tr" colspan="4">
                <label class="label-style" style="bottom:7px" for="Patient Name"><p style="margin:0;font-size:10px;line-height:1;margin-top:5px">APPROXIMATE DATES OF DISABLED PERSON'S CONTACT WITH SOURCE <span style="font-size: 12px">(e.g., dates of hospital admission, treatment, discharges, etc.)</span></p></label><br>
                <input class="inp-style" type="text" name="disabled_contact_time" value="{{$disabled_contact_time}}" style="position: relative;right:5px;bottom:18px" >
            </td>
        </tr>
    </table>

    <p style=" font-family: 'ARIAL';font-size:14px;text-align:justify;margin:0;line-height:0.9;margin-top:20px">I hereby authorize the above named source to release or disclose to the Medical Assistance Program for re-disclosure in connection with my application for public health insurance.</p>
    <div style="padding-left: 100px">
        <p style=" font-family: 'ARIAL';font-size:14px;text-align:justify;margin:0;line-height:0.9;margin-top:15px">1)  All medical records or other information regarding my treatment, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hospitalization, and/or outpatient care of my impairment(s), including &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;psychological or psychiatric impairment(s) drug abuse, alcoholism, sickle cell &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;anemia, acquired immunodeficiency syndrome (AIDS), or test for infection &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;with human immunodeficiency virus (HIV).</p>
        <p style=" font-family: 'ARIAL';font-size:14px;text-align:justify;margin:0;line-height:0.9;margin-top:15px">2)  &nbsp;&nbsp;&nbsp;Information about how my impairment(s) affects my ability to complete tasks  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and activities of daily living.</p>
        <p style=" font-family: 'ARIAL';font-size:14px;text-align:justify;margin:0;line-height:0.9;margin-top:15px">3)  &nbsp;&nbsp;&nbsp;Information about how my impairment(s) affected my ability to do work.</p>
    </div>
    <p style=" font-family: 'ARIAL';font-size:14px;text-align:justify;margin:0;line-height:0.9;margin-top:15px">I understand that this authorization, except for action already taken, may be voided by me at any time. If I do
        not void this authorization, it will automatically end at the conclusion of any proceedings, administrative or
        judicial, in connection with my Medicaid application, including any appeals. If I am already receiving benefits,
        the authorization will end when a final decision is made as to whether I can continue to receive benefits.</p>
    <table style="margin-top: 50px;">
        <tr>
            <td class="c-tr" colspan="2">
                <label class="label-style">
                    <p style="margin:0;font-size:7.8px;font-family: 'ARIALBD'"><span style="font-size: 7.8px;background:yellow;font-family: 'ARIALBD'">SIGNATURE OF DISABLED PERSON OR PERSON AUTHORIZED TO</span> <br> ACT IN HIS/HER BEHALF</p> 
                </label>
                <div style="position:relative;width:140px;height:60px;">
                    @if($map_sign)
                        <img src="{{ $map_sign }}" alt="map_sign" width="100%"  height="100%" style="position:absolute;left:90%;bottom:10%" >
                    @else
                        No Signature Provided
                    @endif
                </div>
            </td>
            <td class="c-tr">
                <label class="label-style">
                    <p style="margin:0;font-size:10px;font-family: 'ARIALBD'">RELATION TO DISABLED PERSON <br>
                    (If other than self)
                    </p>
                </label>
                <input style="position:relative;right:5px" class="inp-style" type="text" name="disabled_relation_other" value={{$disabled_relation_other}}>
            </td>
            <td class="c-tr" style="width: 15%;">
                <label class="label-style" ><p style="margin:0;font-size:10px;font-family: 'ARIALBD'">DATE</p></label>
                <input style="position:relative;right:5px" class="inp-style" type="text" name="date_map" value="{{date('m/d/Y',strtotime($date_map))}}">
            </td>
        </tr>
        <tr>
            <td class="c-tr" colspan="2" style="">
                <label class="label-style">
                    <p style="margin:0;font-size:10px;font-family: 'ARIALBD'">STREET ADDRESS</p>
                </label>
                <input class="inp-style" type="text" name="disabled_relation_street"
                       value="{{$disabled_relation_street}}" style="position:relative;right:5px">
            </td>
            <td class="c-tr" colspan="2" style="">
                <label class="label-style">
                    <p style="margin:0;font-size:10px;font-family: 'ARIALBD'">TELEPHONE NUMBER (include area code)</p>
                </label>
                <input class="inp-style" type="text" name="disabled_relation_street"
                       value="{{$disabled_relation_street}}" style="position:relative;right:5px">
            </td>
        </tr>
        <tr>
            <td class="c-tr"  colspan="2" style="">
                <label class="label-style">
                    <p style="margin:0;font-size:10px;font-family: 'ARIALBD'">CITY</p>
                </label>
                <input class="inp-style" type="text" name="disabled_relation_city" value="{{$disabled_relation_city}}"
                style="position:relative;right:5px">
            </td>
            <td class="c-tr">
                <label class="label-style" style="">
                    <p style="margin:0;font-size:10px;font-family: 'ARIALBD'">STATE</p>
                </label>
                <input class="inp-style" type="text" name="disabled_relation_state" value="{{$disabled_relation_state}}"
                style="position:relative;right:5px">
            </td>
            <td class="c-tr">
                <label class="label-style">
                    <p style="margin:0;font-size:10px;font-family: 'ARIALBD'">ZIP CODE</p>
                </label>
                <input class="inp-style" type="text" name="disabled_relation_zip" value="{{$disabled_relation_zip}}"
                style="position:relative;right:5px">
            </td>
        </tr>
    </table>

</form> 

</body>
</html>

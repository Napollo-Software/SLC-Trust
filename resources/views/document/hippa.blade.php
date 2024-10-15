<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <title>HIPPA</title>
    <style>
         @font-face {
        font-family: BrittanySignature;
        src: url("/fonts/BrittanySignature-MaZx.ttf");
        }
        @font-face {
                font-family: 'times new roman';
                src: url('fonts/times new roman.ttf') format('truetype');
            }
            @font-face {
                font-family: 'times new roman bold';
                src: url('fonts/times new roman bold.ttf') format('truetype');
            }
            @font-face {
                font-family: 'times new roman italic';
                src: url('fonts/times new roman italic.ttf') format('truetype');
            }

        table {
            border-collapse: collapse;
            width: 100%;
            /* margin-left: 20% */
        }
        ul {
            list-style-type: none;
        }

        .no-border {
            background-color: rgb(204, 204, 204);
            border: none;
        }

        th {
            border: 2px solid black;
            padding: 8px;
            /* text-align: center; */
        }

        td{
            border: 2px solid black;
            padding-left: 8px;
            padding-bottom: 8px;
            padding-right: 8px;
            padding-top: 2px;
        }


        .content {
            display: flex;
            flex-direction: column;
        }

        .row-container {
            display: flex;
            align-items: flex-end;
            padding-left:10px;
            gap: 65px;
        }
        .submit-button {
            background-color: #559E99; /* Dark blue background */
            color: white; /* White text */
            padding: 8px 16px; /* Reduced padding */
            font-size: 14px; /* Smaller font size */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            transition: background-color 0.3s; /* Smooth transition for hover effect */
            position: relative;
            display: inline-flex;
            align-items: center;
            margin-left: 10px;
        }

        .submit-button:hover {
            background-color: #559E99; /* Light blue on hover */
        }

        .submit-button:focus {
            outline: none; /* Removing the outline on focus for cleaner look */
            box-shadow: 0 0 0 2px rgba(19, 75, 126, 0.25); /* Adding a subtle focus shadow with the dark blue color */
        }


        table {
            border-collapse: collapse;
            width: 100%;
        }

        body {
            margin-left: 50px;
            margin-right: 50px;
        }

        .styled-hr {
            border: none;
            border-top: 05px solid #000;
            /* Adjust the color as needed */
        }

        .authorization-text {
            margin: 20px;
            font-size: 14px;
            line-height: 1.2;
        }

        .authorization:after {
            content: "";
            display: block;
            page-break-after: always;
        }

        .oca {
            float: right;
        }
      
        .card {
            background:white;
            width: 1000px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 70px 110px;

        }

        .initiating-container{
            margin-left: 11px;
        }



        .card:hover {
            /* box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.4); */
        }



        .card-body {
            padding: 2px 16px;
        }
        @font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-weight: normal;
    font-style: italic;
}
#signature-canvas-hippa {
    pointer-events: none;
}
.new_input{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 4px 6px;
}
input{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 2px 6px;
    outline: none;
    background-color: transparent !important;
    height: 28px;
    outline: none;
}
.inputDate{
    height: 14px;
    border: none;
    border-bottom:1px solid black;

}
.input-full{
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    height: 28px;
    outline: none;
    width: calc(100% - 10px);
    margin: 0;
    padding: 0;
    padding-left: 10px !important;
    background-color: transparent !important;
}
textarea{
    background: #e9e9e9;
    border-radius: 2px;
    border: 1px solid #b2b2b2;
    font-size: 12px;
    padding: 4px 6px;
}
.loader {
    border: 2px solid rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    border-top: 2px solid #fff;
    width: 16px;
    height: 16px;
    animation: spin 1s linear infinite;
    position: absolute;
    right: 10%;
    top: 22%;
    transform: translateY(-50%);
}

 .row{
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 5px;
 } 

 .nine-container{
    margin-left: 31px;
    margin-right: 75px;
    justify-content: space-between;
 }

.btn-size{
    width: 12%;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.submit-button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}

/* ...............................................  */
body{
        background:rgba(0, 0, 0, 0.06);
        font-family:'times new roman';
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        font-size: 16px !important;
    }

    .clear-hippa{
        padding: 4px 8px !important;
        background-color: #559E99;
        border:none;
        outline:none;
        cursor: pointer;
        color: white;
        border-radius: 2px;
    }

    li{
        margin-top: 3px;
    }
    .bold{
        font-family:'times new roman bold';
    }

    .medium{
        font-family:'ArialMdm';
    }

    .xs{
        font-size: 13px;
    }

    .xxs{
        font-size: 9px;
    }

    .sm{
        font-size: 14px;
    }

    .md{
        font-size: 18px;
    }

    .lg{
        font-size: 16px;
    }
    .xl{
        font-size: 17px;
    }

    .header_Container{
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}

   .mt-3{
        margin-top: 3px;
    } 
   .ml-5{
        margin-top: 5px;
    } 
   .mt-5{
        margin-top: 5px;
    } 
    .mt-10{
        margin-top: 10px;
    }
    .mt-15{
        margin-top: 15px;
    }
    .mt-13{
        margin-top: 15px;
    }
    .mt-20{
        margin-top: 20px;
    }

 *{
    margin: 0 ;
    padding: 0 ;
  }

  .header_rightTop{
    text-align: right;
  }

  .header_rightCenter{
    text-align: left;
  }

  .header_right{
    flex: 1;
  }


  .header_rightCenter{
    text-align: center;
    font-size: 17px;
    margin-left: -15px;
  }

  .header_bottom{
    margin-top: -17px;
    text-align: center;

  }


  .border-btm{
    margin-top:-20px;
    padding:2px;
  }
  .flex-col{
    display: flex;
    flex-direction: column;
    gap:5px
  }
 
  .flex-row{
    display: flex;
    flex-direction: row;
  }

  .border-btm{
    border-bottom: 1px solid black;
    border-left: none;
    border-right: none;
    border-top: none;
  }
  input[type="radio"]{
    appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 12px;
  height: 12px;
  background-color: white;
  border: 1px solid #777;
  border-radius: 2px; 
  position: relative;
  cursor: pointer;
  
}
input[type="radio"]:checked{
    background-color: #0075ff;
    box-shadow: 1px 1px 2px lightgray;
}
input[type="radio"]:checked:before {
  content: "\2713";
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  font-size: 9px;
  font-weight: bold;
  color: white;
  background-color: #0075ff; 
}

  @media only screen and (max-width: 520px){
    .card {
            background:white;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 5px 5px;

        }

    body{
        background:white;
        font-family:'times new roman';
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        font-size: 20px !important;
        width: 100%;
        margin: 0;
        padding: 20px;
    }
    .main-table{
        overflow-x: auto;
    }

    .row-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap:15px
        }

    td{
        font-size: 16px;
    }

    input{
        font-size: 16px;

    }

    .header_rightTop{
    text-align: right;
  }

  .header_rightCenter{
    text-align: left;
    font-size: 14px !important;
    padding-left:15px;
    padding-right:15px 
  }

  .header_right{
    flex: 1;
  }


  .header_rightCenter{
    text-align: center;
    font-size: 17px;
    margin-left: -15px;
  }

  .header_bottom{
    margin-top: 5px;
    text-align: center;
  }


  .border-btm{
    margin-top:-20px;
    padding:2px;
  }
  .flex-col{
    display: flex;
    flex-direction: column;
    gap:5px
  }
 
  .flex-row{
    display: flex;
    flex-direction: row;
  }

  .border-btm{
    border-bottom: 1px solid black;
    border-left: none;
    border-right: none;
    border-top: none;
  }

  }

    </style>
</head>

<body>
<div class="card">
    <form id="hippa-form">
        @csrf
        <input type="hidden" id="referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">
        <div class="header_Container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo"
                    style="display: table-cell; width: fit-content; vertical-align: top; margin: 0; padding: 0;padding-left:-6px;margin-left:-6px"
                    height="73" width="73">
            <div class="header_right">
                <h5 class="header_rightTop">
                    OCA Official Form No.: 960
                </h5>
                <h5 class="header_rightCenter">
                    AUTHORIZATION FOR RELEASE OF HEALTH INFORMATION PURSUANT TO HIPAA
                </h5>

            </div>
        </div>
   
        <div class="header_bottom">
            <h5>
                [This form has been approved by the New York State Department of Health]
            </h5>
        </div>
        <table class="mt-13" style="border-collapse: collapse;" >
            <tr >
                <td  style="width: 50%;">
                    <label>Patient Name</label><br>
                    <input type="text" name="hippa_name" class="new_input input-full mt-5"
                           value="{{$referral->first_name}} {{$referral->last_name}}">
                </td>
                <td  style="width: 25%;">
                    <label for="Date of Birth">Date of Birth</label><br>
                    <input type="date" max="9999-12-31" name="hippa_dob" class="new_input input-full mt-5" value="{{$referral->date_of_birth}}">
                </td>
                <td  style="width: 25%;">
                    <label for="SSN Number">Social Security Number</label><br>
                    <input type="number" class="new_input input-full mt-5" name="hippa_ssn" value="{{$referral->patient_ssn}}">
                </td>
            </tr>
            <tr >
                <td colspan="3" >
                    <label for="Address">Patient Address</label><br>
                    <input type="text" name="hippa_address" class="new_input input-full mt-5" style="margin-top: 3px;"
                           value="{{$referral->address}},{{$referral->city}},{{$referral->state}},{{$referral->country}},{{$referral->zip_code}}" maxlength="130">
                </td>
            </tr>
        </table>
        <p class="mt-10">I, or my authorized representative, request that health information regarding my care and treatment be released
            as set forth on this form:</p>
        <p>In accordance with New York State Law and the Privacy Rule of the Health Insurance Portability and Accountability
            Act of 1996 (HIPAA), I understand that:</p>
        <ul style="text-align: justify;">
            <li>1.&nbsp;&nbsp;This authorization may include disclosure of information relating to <span class="bold">ALCOHOL</span> and <span class="bold">DRUG ABUSE, MENTAL HEALTH
                TREATMENT,</span> except psychotherapy notes, and <span class="bold">CONFIDENTIAL HIV* RELATED INFORMATION</span> only if I place my initials
                on the appropriate line in Item 9(a). In the event the health information described below includes any of
                these types of information, and I initial the line on the box in Item 9(a), I specifically authorize release
                of such information to the person(s) indicated in Item 8.
            </li>
            <li>2.&nbsp;&nbsp;If I am authorizing the release of HIV-related, alcohol or drug treatment, or mental health treatment
                information, the recipient is prohibited from redisclosing such information without my authorization unless
                permitted to do so under federal or state law. I understand that I have the right to request a list of
                people who may receive or use my HIV-related information without authorization. If I experience
                discrimination because of the release or disclosure of HIV-related information, I may contact the New York
                State Division of Human Rights at (212) 480-2493 or the New York City Commission of Human Rights at (212)
                306-7450. These agencies are responsible for protecting my rights.
            </li>
            <li>3.&nbsp;&nbsp;I have the right to revoke this authorization at any time by writing to the health care provider listed
                below. I understand that I may revoke this authorization except to the extent that action has already been
                taken based on this authorization.
            </li>
            <li>4.&nbsp;&nbsp;I understand that signing this authorization is voluntary. My treatment, payment, enrollment in a health
                plan, or eligibility for benefits will not be conditioned upon my authorization of this disclosure.
            </li>
            <li>5.&nbsp;&nbsp;Information disclosed under this authorization might be redisclosed by the recipient (except as noted above
                in Item 2), and this redisclosure may no longer be protected by federal or state law.
            </li>
        </ul>
            <p class="mt-3">6.&nbsp;&nbsp;<span class=" bold">THIS AUTHORIZATION DOES NOT AUTHORIZE YOU TO DISCUSS MY HEALTH INFORMATION OR MEDICAL
                CARE WITH ANYONE OTHER THAN THE ATTORNEY OR GOVERNMENTAL AGENCY SPECIFIED IN ITEM 9 (b).</span></p>

        <div class="main-table">
        <table >
            <tr >
                <td colspan="2">
                    <label>7. Name and address of health provider or entity to release this information:</label>
                    <input type="text" class="input-full mt-5" name="health_provider" maxlength="135">
                </td>
            </tr>
            <tr >
                <td colspan="2">
                    <label>8. Name and address of person(s) or category of person to whom this information will be sent:</label>
                    <input type="text" class="input-full mt-5" name="name_and_address" maxlength="135">
                </td>
            </tr>
            <tr>
                <td colspan="2" >
                    <p>
                        9(a). Specific information to be released:
                        </p>
                        
                        <div style="margin-left:31px" class="row">
                        <input type="checkbox" name="info_released1" value="dated">
                        Medical Record from (insert date) <input type="date" max="9999-12-31" class="inputDate"  name="info_released_from"> to
                        (insert date) <input
                            type="date" max="9999-12-31" class="inputDate"  name="info_released_to">

                    </div>
                    <div style="padding: 0;margin: 0;align-items: flex-start !important;margin-left:31px" class="row">
                        <input type="checkbox" name="info_released2" value="Entire_med">
                        <p style="margin-top:4px"> Entire Medical Record, including patient histories, office notes (except psychotherapy notes), test
                        results, radiology studies, films,
                           lass   referrals, consults, billing records, insurance records, and records sent to you by other health
                        care
                        providers.</p>

                    </div>
                    <div class="row nine-container" style="padding: 0;align-items: flex-start !important;margin-top:4px">
                        <div style="padding: 0;margin: 0" class="row">
                            <div class="row" >
                                <input type="checkbox" name="info_released3" value="other">
                                <p>Other:</p>
                            </div>
                            <input type="text"class="border-btm" style="" name="info_other">
                        </div>
                        <div style="padding: 0;margin: 0;">
                            <p>Include: (Indicate by Initialing) </p>

                            <ul>
                                <li class="row"><input type="text" maxlength="7" max class="border-btm" style="font-size:15px !important;padding:0px !important;margin:0;width:70px;height: 15px;" name="alcoholDrug" ><label
                                        for="alcoholDrug">Alcohol/Drug Treatment</label></li>
                                <li class="row"><input type="text" maxlength="7" class="border-btm" style="font-size:15px !important;padding:0px !important;margin:0;width:70px;height: 15px;" name="mentalHealth" ><label
                                        for="mentalHealth">Mental Health Information</label></li>
                                <li class="row"><input type="text" maxlength="7" class="border-btm" style="font-size:15px !important;padding:0px !important;margin:0;width:70px;height: 15px;" name="hivRelated" ><label
                                        for="hivRelated">HIV-Related Information</label></li>
                            </ul>
                        </div>
                    </div>
                    <p>
                        <b>Authorization to Discuss Health Information</b>
                    </p>
                    <div  class="row initiating-container">
                         <p>(b)</p>
                         <input type="checkbox"  name="discuss" value="discuss">
                         <p>By initialing here</p>
                         <div>
                             <input type="text" class="border-btm" name="authorised_person" style="height:30px;margin:0;height:14px" >
                             <p class="sm" style="text-align:center">Initials</p>
                         </div>
                         <p>I authorize</p>
                         <div style="width:55%">
                             <input type="text" class="border-btm" name="authorize"  style="width:100%;height:30px;margin:0;height:14px">
                             <p class="sm" style="text-align:center">Name of individual healath care provider</p>
                         </div>

                    </div>
                    <div style="max-width: 100%; text-align: center;">
                        <div style="text-align: start;margin-left: 2.75%; margin-right:3.78%" class="mt-5" >
                            to discuss my health information with my attorney, or a governmental agency, listed here:
                                <input type="text" class="border-btm" name="health_information"  style="width:100%;height:30px;margin:0;height:14px">
                        </div>
                       
                    </div>
                    <p style="text-align: center;margin-bottom:-6px;margin-top:2px" class="sm">
                        (Attorney/Finn Name or Governmental Agency Name)
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:50%">
                    <p>10. Reason for release of information:</p>
                    <div class="row" style="margin-left:34px">
                        <input type="radio" name="request" value="request">
                        <p>At request of indvidual</p>
                    </div>
                    <div class="row" style="justify-content: space-between;margin-left:34px">
                        <div class="row" style="">
                            <input type="radio" name="request" value="reason">
                            <p>Other:</p>
                        </div>
                        <input type="text" class="" style="width:56%;height:24px" name="reason_other"  >
                    </div>
                </td>
                <td style="width:50%;vertical-align: top;">
                    <div class="flex-col">
                        <p>
                            11. Date or event on which this authorization will expire:
                        </p>
                        <input type="text" class="input-full mt-5" name="date_or_event">

                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="flex-col">
                        <p>12. If not the patient, name of person signing form:</p>
                        <input type="text" class="input-full" name="person_signing">

                    </div>
                </td>
                <td>
                    <div>
                        <p>13. Authority to sign on behalf of patient:</p>
                        <input class="input-full mt-5" type="text" name="authority_sign">
                    </div>
                </td>
            </tr>
        </table>

        </div>
      
        <p class="mt-3" style="margin-bottom:3px;padding-left:10px">
            All items on this form have been completed and my questions about this form have been answered. In add111on, I
            have been provided a
            copy of the form.
        </p>
        <div class="row-container">
            <div class="card-body mt-3" style="padding:0;">

                <div id="signature-pad">
                    <input type="text"  style="width: 61%;margin-bottom: 10px" name="hippa_signature" id="hippa_signature" oninput="generateSignature()" maxlength="18">
                    <canvas  id="signature-canvas-hippa"></canvas>
                    <div>
                        <div class="container-row" style="justify-content: start">

                            <button stype="" class="clear-hippa" id="clear-hippa" onclick="clearHippaCanvas()">Clear</button>
                        </div>
                        <br/>
                        <label style=""> Signature of patient or representative authorized by law. </label>
                        <input type="hidden" id="hippa_sign" name="hippa_sign">
                    </div>
                </div>
            </div>

            <div class="flex-row" style="align-items: flex-end;flex:1">
                <label for="">Date: </label>
                &nbsp;  <input type="date" max="9999-12-31" class="inputDate" style="width:50%" name="sign_date">
            </div>
        </div>
        <div class="mt-15 flex-row" style="max-width: 100%;font-weight: bold;padding-left:10px;gap:5px">
            <p>*</p>
            <p>             Human Immunodeficiency Virus that causes AIDS. The New York State Public Health Law protects information which
            reasonably could
            identify someone as having HIV symptoms or infection and information regarding a person's contacts.</p>
        </div>
        <br>
        <button type="submit" id="submit-button" class="submit-button">
            Submit
            <span class="loader" style="display: none;"></span>
        </button>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    generateSignature(1)
   generateSignature(2)
   generateSignature(3)
   generateSignature(4)
    $(document).ready(function () {
        const canvas = document.getElementById('signature-canvas-hippa');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2',
            penColor: '#000000',
        });

        $('#clear-hippa').click(function (e) {
            e.preventDefault();
            signaturePad.clear();
            $('#hippa_sign').val('');
        });

        // on canvas value change save
        signaturePad.onEnd = function () {
            $('#hippa_sign').val(signaturePad.toDataURL());
        };
        $('#hippa-form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage()
            let formdata = new FormData(this);

            $.ajax({
                url: '{{ route('save.hippa') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type
                success: function (response) {

                    swal.fire({
                        title: 'Success!',
                        text: '2-DOH-960 Hipaa has been saved successfully.',
                        icon: 'success',
                        confirmButtonText: 'Great!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            @if (auth()->check())
                                window.location.href = "{{ route('dashboard') }}";
                            @else
                                window.location.href = "{{ route('bill_reports') }}";
                            @endif
                            // window.location.href = "{{ route('login') }}"; // Replace 'login' with your actual login route
                        }
                    })
                    ;
                    $('#submit-button').removeClass('btn-size');
                    $('.loader').hide();
                    $('#submit-button').prop('disabled', false);

                },
                error: function (response) {
                    alert('Error in saving file');
                    $('#submit-button').removeClass('btn-size');
                    $('.loader').hide();
                    $('#submit-button').prop('disabled', false);
                }
            });
        });


    });

    function generateSignature() {
    const name = document.getElementById('hippa_signature').value;
    const canvas = document.getElementById('signature-canvas-hippa');
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#f2f2f2';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = '42px "BrittanySignature", BrittanySignature';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 15, 80);

}
function clearHippaCanvas() {
    document.getElementById('hippa_signature').value = '';
}
    function saveCanvasAsImage() {

            const canvas = document.getElementById("signature-canvas-hippa");
            const signatureDataURL = canvas.toDataURL('image/png'); // Convert to Base64
            document.getElementById("hippa_sign").value = signatureDataURL;
    }
</script>

</body>

</html>

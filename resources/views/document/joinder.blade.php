<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>1-Joinder Agreement</title>
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/5e782bf38cce30531775d9922caba85c?family=Nominee-Regular" rel="stylesheet">
    <style>
:root{
    --primary: rgb(52 159 153);
    --bgColor: rgb(184 221 219)
}

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;

}
@font-face {
    font-family: BrittanySignature;
    src: url("/fonts/BrittanySignature-MaZx.ttf");
}

@font-face {
            font-family: 'Poppins-Regular';
            src: url('fonts/Poppins-Regular.ttf') format('truetype');
        }
        @font-face {
            font-family: 'Poppins-Medium';
            src: url('fonts/Poppins-Medium.ttf') format('truetype');
        }
        @font-face {
            font-family: 'Poppins-SemiBold';
            src: url('fonts/Poppins-SemiBold.ttf') format('truetype');
        }
        @font-face {
            font-family: 'Poppins-Bold';
            src: url('fonts/Poppins-Bold.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Poppins-Italic';
            src: url('fonts/Poppins-Italic.ttf') format('truetype');
        }
        @font-face {
            font-family: 'Poppins-ExtraBold';
            src: url('fonts/Poppins-ExtraBold.ttf') format('truetype');
        }


body{
    /* font-family: Arial, sans-serif; */
    font-family: "Nominee-Regular";
}
:root{
    --primary: rgb(52 159 153);
    --bgColor: rgb(184 221 219)
}

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;

}
body{
    /* font-family: Arial, sans-serif; */
}
/* html{
    font-size: 62.5%;
} */
header{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 80%;
    margin: auto;
    position: relative;
    background-image: url('{{ asset('assets/images/jbg2.png') }}');
    background-size: contain;
    background-repeat: no-repeat;
    height: 1500px;
    background-position: bottom;
    /* height: 670px; */
    /* height: 75vh; */
}
.logo-style{
     width: 45%;
     position: absolute;
     top: 6rem;
}
.logo-img{
    width: 100%;
    /* height: 180px; */
    object-fit: contain;
}
input[type="radio"]:checked:before {
  content: "\2713"; /* Unicode for tick (✓) */
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  font-size: 10px;
  font-weight: bold;
  color: white;
  background-color: #0075ff;
}
label{
    cursor: pointer;
    font-size: 14px;
    font-style: italic

}
p{
    font-size: 16px
}
.footer-left-dis{
    font-size: 12px;
}
.footer-right-dis{
    font-size: 12px;
}
.footer-mid-dis{
    font-size: 12px;
}
.header-contact p{
    font-size: 20px
}
input[type="radio"]{
    appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  width: 12px;
  height: 12px;
  background-color: white;
  border: 1px solid #000;
  border-radius: 0; /* Make it square */
  position: relative;
  cursor: pointer;
  box-shadow: 0.5px -0.5px 0px black;
}
input[type="radio"]:checked{
    background-color: #0075ff;
    box-shadow: 1px 1px 2px lightgray;
}
span{
    font-size: 13px;
    font-style: italic
}
input[type="text"]{
    font-size: 16px;
    font-family: "Nominee-Regular";

}
input[type="date"]{
    font-size: 16px;
    font-family: "Nominee-Regular";

}
.header-heading{
    text-align: center;
    font-size: 1.82rem;
    color: var(--primary);


}
.service-container{
    display: flex;
     justify-content: space-between;
     align-items: center;
     flex-wrap:wrap
}

.header-content{
    text-align: center;
    position: absolute;
    bottom: 20px;
    padding: 1.5rem;
    width: 90%;
}
.header-contact{
    display: flex;
    flex-direction: column;
    gap: 15px;
    justify-content: center;
    align-items: center;
    font-size: 1.6rem;
    margin-top: 25rem;
}
.life-policy-style{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3px;
}
.header-email{
    color: var(--primary);
    font-size: 20px;
    font-weight: 600;
}


main{
    margin: 50px 0;
}

.supplemental-header{
    background-color: var(--bgColor);
    display: flex;
    flex-direction: column;
    height: 120px;
    justify-content: center;
    align-items: center;
    gap: 5px;
    padding: 10px;
}
.supplemental-header-heading{
    font-size: 1.4rem;
    font-weight: bold;
}
.supplemental-header-title{
    color: var(--primary);
    font-size: 1.4rem;
}
.supplemental-des{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    /* font-size: 17px; */
    gap: 10px;
    width: 73%;
    margin: 0 auto;
    padding: 30px 10px;
}
.cs-value{
    display: flex;
    flex: 1;
    gap:5px;
    /* flex-wrap:wrap */
}
.beneficiary-heading{
    color: var(--primary);
    width:fit-content;
    padding: 2px 20px;
    /* margin-left: 30px; */
    font-size: 18px;
    background-color: var(--bgColor);
    font-family: 'Poppins-Regular';
    letter-spacing: 0.8px;
}
.beneficiary-des{
    width: 90%;
    margin: 0 auto;
}
.beneficiary-information{
    width: 80%;
    margin: auto;
}
input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}

.dob-form input[type="date"] {
    position: relative;
    width: 100%;
}
.w-30 input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}

.w-30 input[type="date"] {
    position: relative;
    width: 100%;
}
.w-40 input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
}

.w-40 input[type="date"] {
    position: relative;
    width: 100%;
}


.beneficiary-indormation-header{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 15px;
    /* width: 90%; */
    /* margin: auto; */
}
.beneficiary-information-form{
    width: 90%;
    margin: 20px auto;
}
.can-style{
    width: 25%;
    margin-top: 15px;
}
.acc-name-style{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.label-name{
    font-weight: bold;
}
.inp-first{
    border: none;
    border-bottom: 1px solid black;
    width: 100%;
}
.db-month{
    display: flex;
    justify-content: center;
    margin-top: 15px;
    gap:5px;
    flex-wrap:wrap
}
.inp-middle{
    border: none;
    border-bottom: 1px solid black;
    width: 100%;
}
.inp-last{
    border: none;
    border-bottom: 1px solid black;
    width: 100%;
}
input:focus{
    /* border: none; */
    outline: none;
    border-bottom: 1px solid black;
}
.name-form-container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 35px;
    flex-wrap: wrap;
    /* width: 25%; */
}
.name-form{
    width: 30%;
}

.referring-source-para-style{
    /* font-size: 18px; */
    word-spacing: 3px;

}
.footer-left{
    /* min-width: fit-content; */
}
.footer-right{
    min-width: fit-content;
}
.power-of-attorney{
    width: 88%;
    margin: auto
}
.guardian-information{
    width: 88%;
    margin: auto
}
.beneficiary-service{
    width: 88%;
    margin: auto
}
.information-disclosures{
    width: 88%;
    margin: auto
}




  canvas {
    border: 1px solid #000;
    /* margin-top: 10px; */
}
.martial-status{
    margin-top: 25px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 160px;
    /* flex-wrap: wrap; */
}
.life-insurance-information-body-style{
    width: 49%;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    gap: 5px;
}

/* Old Css Version */

.d-table {
    display: table;
}
.table-cell {
    display: table-cell;
}
.items-center {
    vertical-align: center;
}
.items-bottom {
    vertical-align: bottom;
}
.items-top {
    vertical-align: top;
}



.status{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 15px;
    width: 30%;
}
.label-status{
    font-weight: bold;
}
.gender{
    width: 36%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex: 1;
}
.beneficiary-information-name-form{
    margin-top: 25px
}
.inp-gender{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.citizenship{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.dob{
    width: 25%;
    border: none;
    border-bottom: 1px solid black;
}
.social-security-number{
    width: 25%;
    border: none;
    border-bottom: 1px solid black;
}
.security-form{
    min-width: 30%;
}
.dob-form{
    min-width: 30%;
}
.citizenship-form{
    width: 30%;
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap
}
.contact{
    margin-top: 25px;
}
.contact-form-container{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 30px;
    margin-top: 35px;
    flex-wrap: wrap
}
.home-phone{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.cell-phone{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.contact-form{
    width: 35%;
}
.preferred-phone{
    margin-top: 20px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 15px;
}
.bene-sig{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    flex-wrap: wrap;
}
.email-form{
    width: 60%;
    margin-top: 20px;
}
.email{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.beneficiary-information-address-form{
    margin-top: 35px;
}
.address-form-container{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 30px;
    margin-top: 25px;
    flex-wrap: wrap;
}
.healthcare-plane{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap:wrap;
    gap: 5px;
}
.address{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.apt{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.city{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.state{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.zip{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.address-form{
    width: 30%;
}
.apt-form{
    width: 10%;
}
.city-form{
    width: 30%;
}
.state-form{
    width: 10%;
}
.zip-form{
    /* width: 20%; */
    flex: 1
}
.qualifying-disabilities{
    margin-top: 35px;
}
.disabilities{
    margin-top: 35px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap
}
.for-office-use-only-2-container{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}
.applicable-item-para{
    width: 80%;
    margin: auto;
}
.d1{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.d2{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.d3{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.d1-form{
    width: 30%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}
.d2-form{
    width: 30%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}
.d3-form{
    width: 30%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}
.mail-trust{
    margin-top: 35px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 8px;
}
.mail-trust-des{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    font-weight: 600;
}
.footer-beneficiary-information{
    margin-top: 35px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
}
.footer-mid{
    /* border: 1px solid var(--primary); */
    display: flex;
    justify-content: center;
    align-items: center;
    color: var(--primary);
    flex: 1;
}
.medicaid-information-header{
    /* width: 90%;
    margin: auto; */
}
.household-income-header{
    /* width: 90%;
    margin: auto; */
}
.life-insurance-information-header{
    /* width: 90%;
    margin: auto; */
}
.healthcare-premium-header{
    /* width: 90%;
    margin: auto; */
}
.funeral-information-header{
    /* width: 90%;
    margin: auto; */
}
.footer-left{
    flex: 1;
}
.footer-right{
    flex: 1;
}
.footer-right-dis{
    text-align: right;
}
.footer-mid-dis{
    text-align: center;
    border: 1px solid var(--primary);
    min-width: 5%;
    padding: 5px;
}
.authorized-representative{
    width: 80%;
    margin: 50px auto;
    margin-bottom: 0;
}
.authorized-representative-header{
    /* width: 90%;
    margin: auto; */

}
.authorized-heading{
    color: var(--primary);
    width:fit-content;
    padding: 2px 20px;
    font-size: 18px;
    /* margin-left: 30px; */
    background-color: var(--bgColor);
    font-family: 'Poppins-Regular';
    letter-spacing: 0.8px;
}
.authorized-des{
    width: 80%;
    margin: 20px auto;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    /* font-size: 20px; */
}
.authorized-des-checkbox{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    flex-wrap: wrap
}
.for-office-use-only-2-body-style{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}

.authorized-representative-body{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 8px;
}
.referring-source-header{
    /* width: 90%;
    margin: auto; */
}
.purpose-of-enr-header{
    /* width: 90%;
    margin: auto; */
}

.authorized-representative-body-content-1{
    width: 90%;
    margin: auto;
    border: 1px solid var(--bgColor);
    padding: 20px 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.authorized-representative-body-content-2{
    width: 90%;
    margin: auto;
    border: 1px solid var(--bgColor);
    padding: 20px 10px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.authorized-representative-body-content-1-des{
    width: 96%;
    margin: auto;
}
.authorized-representative-body-content-1-form{
    width: 96%;
    flex-direction: column;
    margin: 10px auto;
    display: flex;
    justify-content: center;
    gap: 15px;
}
.authorized-inp-first{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.authorized-inp-last{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.authorized-name-form{
    width: 45%;
}
.authorized-representative-container{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.authorized-contact-form-content{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
    flex-wrap: wrap;
}
.authorized-home-form-inp{
    width: 95%;
    border: none;
    border-bottom: 1px solid black;
}
.authorized-cell-form-inp{
    width: 95%;
    border: none;
    border-bottom: 1px solid black;
}
.box-label{
    font-size: 16.2px
}
.normal-text{
    font-size: 16px
}
.authorized-home-form{
    width: 35%;
}
.authorized-cell-form{
    width: 35%;
}
.authorized-preferred-form{
    min-width: fit-content;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}
.life-policy{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    flex-wrap:wrap
}
.authorized-preferred-form-checkbox{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
}
.authorized-contact-form-container-2{
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 25px;
    flex-wrap: wrap;
}
.mda{
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 15px;
}
.authorized-contact-form-2-email{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.authorized-contact-form-2-relationship{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.authorized-contact-form-2{
    width: 47%;
}
.authorized-contact-form-2-relationship-container{
    min-width: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}
.authorized-address-form{
    margin-top: 25px;
}
.referring-source{
    width: 80%;
    margin: 25px auto;
}
.referring-source-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
}
.referring-source-agency{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.witness-1{
    width: 50%;
    border-right: 1px solid black;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.witness-2{
    width: 40%;
    display: flex;
    flex-direction: column;
     gap: 10px;"
}
.referring-source-contract{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.referring-source-home{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.healthcare-applicant{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    flex-wrap: wrap;
}
.referring-source-email{
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
}
.referring-source-form{
    width: 47%;
}
.referring-source-para{
    width: 90%;
    margin: auto;
}
.direct-debit-bank{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.footer-referring-source{
    margin: 35px auto;
    width: 90%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
}
.purpose-of-enr-container{
    width: 80%;
    margin: 50px auto;
    margin-bottom: 0;
}
.healthcare-premium-body-style{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}
.purpose-of-enr-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    gap: 8px;
}
.purpose-of-enr-checkbox{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 25px;
    flex-wrap: wrap
}
.medicaid-information{
    width: 80%;
    margin: auto;
}
.medicaid-information-body{
    width: 90%;
    margin: 20px auto;
    overflow-x: auto
}
table {
    border-collapse: collapse;
    width: 100%;
    border-right: none;
  }
  thead tr td {
    border: 2px solid var(--bgColor);
    text-align: left;
    padding: 14px;
  }
tbody tr td{
    padding: 12px;
    border-right: 2px solid var(--bgColor);

}
tbody tr{
    border-bottom: 2px solid var(--bgColor);
}
tbody tr td:last-child {
    border-right: none;
}
tbody tr td:nth-child(2),
tbody tr td:nth-child(3) {
    text-align: center;
}
tbody tr.individual-tr td:nth-child(2),
tbody tr.individual-tr td:nth-child(3) {
    text-align: left;
}
tr.ind-th td:nth-child(1){
    color: var(--primary);
    font-weight: 600;
}


.medicaid-information-footer-inp{
    border: none;
    border-bottom: 1px solid black;
    /* width: 80%; */
}
.medicaid-information-footer{
    width: 88%;
    margin: auto;
    /* font-size: 18px; */
    /* word-spacing: 2px; */

}
.medicaid-information-footer-inp{
    width: 60%;
}
.applicant{
    display: flex;
    /* justify-content: center; */
    align-items: center;
    gap: 10px;
}
.household-income{
    width: 80%;
    margin: 20px auto;
}
.sig-para{
    display: flex;
    padding: 0px 20px;
    flex-wrap:wrap
}
.household-income-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: center;
}
.spouse-info{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 5px;
}
.spouse-deceased{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 10px;
}
.spouse-applying{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}
.spouse-applying-check{
    display: flex;
    min-width: fit-content;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.house-hold-first{
    border: none;
    border-bottom: 1px solid black;
    width: 100%;
}
.house-hold-last{
    border: none;
    border-bottom: 1px solid black;
    width: 100%;
}
.house-hold-name{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 8px;
    flex-wrap: wrap;
}
.house-hold-last-form{
    width: 45%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}
.house-hold-first-form{
    width: 45%;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
}
.house-hold-note{
    width: 98%;
    margin: auto;
    font-size: 18px;
    word-spacing: 2px;
}
.footer-house-hold{
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
}


.applicable-item{
    margin-top: 50px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.healthcare-premium-header-heading{
    color: var(--primary);
    width:fit-content;
    padding: 2px 20px;
    font-size: 18px;
    /* margin-left: 30px; */
    background-color: var(--bgColor);
    min-width: fit-content;
    font-family: 'Poppins-Regular';
    letter-spacing: 0.8px;
}
.healthcare-premium{
    width: 80%;
    margin: 15px auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 15px;

}
.healthcare-premium-body{
    width: 90%;
    margin: auto;
    /* font-size: 18px; */
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 18px;
}
.funeral-information{
    width: 80%;
    margin: auto;
}
.funeral-information-body{
    width: 90%;
    margin: 20px auto;
    margin-bottom: 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.for-office-use-only-2-header{
    text-align: center;
    background-color: rgb(184 221 219);
    color: rgb(52 159 153);
    padding: 10px;
    width: 28%;
}
.for-office-use-only-2-body{
    background-color: hsl(185.45deg 40.74% 94.71%);
    width: 28%;
    padding: 12px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.w-50{
    width: 50%
}
.w-70{
    width: 70%
}
.w-40{
    width: 40%
}
.w-80{
    width: 80%
}
.w-48{
    width: 48%
}
.w-10{
    width: 10%
}
.w-25{
    width: 25%
}
.w-30{
    width: 30%
}
.w-35{
    width: 35%
}
.f-75{
    flex: 0.75
}
.f-full{
    flex: 1
}
.life-insurance-information{
    width: 80%;
    margin: auto;
}
.life-insurance-information-body{
    width: 90%;
    margin: 20px auto;
    margin-bottom: 0;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.life-insurance-information-body-info{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.life-insurance-information-body-form{
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    justify-content: center;
    width: 100%;
    flex-wrap: wrap;
}
.life-insurance-type{
    display: flex;
    width: 100%;
    gap: 5px;
    /* justify-content: center; */
    align-items: center;
    flex-wrap: wrap;
}
.living-arrangements{
    width: 80%;
    margin: auto;
}
.power-of-attorney-header{
    /* width: 90%;
    margin: auto; */
}
.living-arrangement-header{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 25px;
    flex-wrap: wrap
    /* width: 90%;
    margin: auto; */
}
.living-arrangement-body{
    width: 90%;
    margin: 20px auto;
    margin-bottom: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: center;
    gap: 15px;
}
.living-arrangements-body{
    width: 90%;
    margin: 20px auto;
    flex-direction: column;
    display: flex;
    flex-wrap: wrap;
    /* justify-content: flex-start; */
    /* align-items: center; */
    gap: 20px;
}
.footer-living-arrangements{
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    margin-top: 60px;
}
.page-6{
    width: 90%;
    margin: 50px auto;
}
.information-disclosures-body{
    width: 95%;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 20px

}
.information-disclosures-body-left{
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px;
}
.information-disclosures-body-right{
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 20px;
    /* padding: 0 15px; */
}
.agr-signature{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap
}
.page-5{
    width: 90%;
    margin: 50px auto;
}
.guardian-information-header{
    /* width: 90%;
    margin: auto; */
}
.information-disclosures-header{
    /* width: 95%;
    margin: auto; */
}
.signature-of-two-witnesses-header{
    /* width: 90%;
    margin: auto; */
}
.signature-of-notary-header{
    /* width: 90%;
    margin: auto; */
}
.agreement-signature-header{
    /* width: 90%;
    margin: auto; */
}
.beneficiary-service-header{
    /* width: 90%;
    margin: auto; */
}
.power-of-attorney-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 10px;
}
.power-of-attorney-body-1{
    border: 2px solid var(--bgColor);
    padding: 20px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.power-of-attorney-body-1-header{
    display: flex;
    flex-direction: column;
    gap: 15px;
    font-size: 16px;
}
.power-of-attorney-body-1-form{
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px
}
.guardian-information-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.beneficiary-service-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 15px;
}



.page-7{
    width: 80%;
    margin: 50px auto;
}

.page-8{
    /* width: 80%;
    margin: 50px auto; */
}
.agreement-signature{
    width: 80%;
    margin: 50px auto;
}
.signature-of-notary{
    width: 80%;
    margin: 50px auto;
    margin-bottom: 0;
}
.signature-of-two-witnesses{
    width: 80%;
    margin: 25px auto;
}
.agreement-signature-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.signature-of-notary{
    width: 80%;
    margin: 50px auto;
    margin-bottom: 0;
}
.signature-of-notary-body{
    width: 90%;
    margin: 20px auto;
    margin-bottom: 0;
    display: flex;
    flex-direction: column;
    gap: 6px;
    font-size: 14px;
    flex-wrap: wrap;
}
.signature-of-two-witnesses-body{
    width: 90%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.list-para{
        font-size: 16px
    }
.list-para2{
        font-size: 14px
    }
.for-office-use-only-header{
    background-color: var(--bgColor);
    color: var(--primary);
    padding: 10px;
}
.for-office-use-only-body{
    width: 70%;
    margin: 30px auto;
    margin-bottom: 0;
    display: flex;
    flex-direction: column;
    gap: 25px;
}
.for-office-use-only-footer{
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    /* margin-top: 60px; */
    width: 80%;
    margin: 60px auto;
    margin-bottom: 0;
}
.page-9{
    margin-top: 60px;
    /* page-break-before: always; */
}
.for-office-use-only-2{
    width: 80%;
    margin: auto;
}
.direct-debit-req-form{
    width: 80%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    gap: 30px;
}
.direct-debit-req-form-body{
    display: flex;
    flex-direction: column;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    font-size: 17px;
}
.for-office-use-3{
    margin-top: 50px;
    display: flex;
    flex-direction: column;
    gap: 40px;
}
.for-office-use-3-body{
    width: 70%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
}
.footer-for-office-use-3{
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    width: 80%;
    margin: 40px auto;
    /* margin-top: 60px; */
}
@font-face {
    font-family: 'Rage Italic';
    src: url('/fonts/rage-italic.woff') format('woff');
    font-weight: normal;
    font-style: italic;
}
#signature-canvas-1 {
    pointer-events: none;
}
#signature-canvas-2 {
    pointer-events: none;
}
#signature-canvas-3 {
    pointer-events: none;
}
#signature-canvas-4 {
    pointer-events: none;
}
#signature-canvas-5 {
    pointer-events: none;
}
.submit-button{
    margin-left: 10%;
    padding: 10px;
    min-width: fit-content;
    width: 10%;
    border-radius: 4px;
    cursor:pointer;
    background-color: rgb(184 221 219);
    color:rgb(52 159 153);
    border:none;
    font-weight: bold;
    font-size:1.3rem;
    position: relative;
    align-items: center;
}
.submit-button:hover{
    background-color: rgb(168 236 217)
}
.loader {
    border: 2px solid rgba(0, 0, 0, 0.1);
    border-radius: 50%;
    border-top: 2px solid rgb(52 159 153);
    width: 18px;
    height: 18px;
    animation: spin 1s linear infinite;
    position: absolute;
    right: 10%;
    top: 28%;
    /* transform: translateY(-50%); */
}
.btn-size{
    width: 11%;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.submit-button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}


div:where(.swal2-icon).swal2-success [class^=swal2-success-line][class$=tip] {
    top: 3.4em !important;
    left: 1.7em !important;
    width: 1.5625em !important;
    transform: rotate(45deg) !important;
}

div:where(.swal2-icon).swal2-success [class^=swal2-success-line][class$=long] {
    top: 2.3rem !important;
    right: 0.6em !important;
    width: 2.9375em !important;
    transform: rotate(-45deg) !important;
}

/* html{
    font-size: 62.5%;
} */


/* ------------------------------------------------------------------------------------------------- */


/* Media Queries */

@media only screen and (max-width: 800px) {

/* Beneficiary Information */

  .name-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .name-form2{
    margin-top: 12px;
  }
  .cs-value{
    flex-wrap: wrap
  }
  .status{
    width: 100%;
    font-size: 0.8rem;
    flex-wrap: wrap
  }
  .gender{
    width: 100%;
    margin-top: 1rem;
    font-size: 0.8rem;
  }
  .security-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .dob-form{
    width: 100%;
    margin-top: 1rem;
    font-size: 0.8rem;
  }
  .citizenship-form{
    width: 100%;
    margin-top: 1rem;
    font-size: 0.8rem;
  }
  .contact-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .address-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .apt-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .city-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .state-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .zip-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .d1-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .d2-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .d3-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .disabilities{
    gap: 10px;
  }

  /* Authorized Representatives */

  .authorized-name-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .authorized-home-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .authorized-cell-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .authorized-preferred-form{
    width: 100%;
    font-size: 0.8rem;
    justify-content: flex-start;
    margin-top: 1rem;
  }
  .authorized-contact-form-2{
    width: 100%;
    font-size: 0.8rem;
  }
  .authorized-contact-form-2-relationship-container{
    width: 100%;
    font-size: 0.8rem;
    margin-top: 1rem;
  }

  /* Referring Source */

  .referring-source-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .referring-source-para-style{
    font-size: 1rem;
  }

  /* Household Income */
  .house-hold-first-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .house-hold-last-form{
    width: 100%;
    font-size: 0.8rem;
  }
  .spouse-applying{
    margin-top: 1rem;
    font-size: 0.8rem;
  }

  /* Life Insurance Information */

  .life-insurance-information-body-style{
    width: 100%;
    font-size: 0.8rem;
  }
  .life-insurance-type{
    font-size: 0.8rem;
  }


  /* Healthcare Premiums */

  .healthcare-applicant{
    justify-content: flex-start
  }
  .healthcare-plane{
    gap: 2px;
  }
  .healthcare-premium-body{
    font-size: 0.8rem
  }

  body{
    font-size: 0.8rem;
  }

  /* Living Arrangements */
  .w-50{
    width: 100%
}
   .w-10{
    width: 100%;
   }
   .w-25{
    width: 100%;
   }
   .w-35{
    width: 100%;
   }
   .w-48{
    width: 100%;
   }
   .w-40{
    width: 100%
}

    .service-container{
        gap: 20px
    }
    .information-disclosures-body{
        margin-top: 15px;
    }
    .information-disclosures-body-left{
        width: 100%
    }
    .information-disclosures-body-right{
        width: 100%
    }
    .w-30{
    width: 100%
}
    .witness-1{
        width: 100%;
        border-right: none
    }
    .witness-2{
        width: 100%;
    }
    .w-80{
    width: 100%
}
    .for-office-use-only-2-container{
        align-items: flex-start
    }
    .for-office-use-only-2-header{
        width: 100%;
    }
    .for-office-use-only-2-body{
        width: 100%;
    }
    .for-office-use-only-2-body-style{
        width: 100%;
    }

    .direct-debit-bank{
        gap: 20px
    }
    .acc-name-style{
        gap: 20px
    }
    .mda{
        justify-content: flex-start
    }
    .for-office-use-3-body{
        gap: 20px
    }
    .f-75{
        flex: 1
    }
    .w-70{
    width: 100%
}
    .authorized-home-form-inp{
        width: 100%;
    }
    .authorized-cell-form-inp{
        width: 100%
    }
    thead tr td{
        padding: 10px;
    }
    tbody tr td{
        padding: 10px;
    }
    .sig-para{
        padding: 0;
    }
    .life-policy{
        justify-content: flex-start
    }
    .life-policy-style{
        width: 100%;
        justify-content: flex-start;
    }
    .j-heading{
        font-size: 2.5rem;
    }
    .supplemental-header-heading{
        font-size: 1rem
    }
    .supplemental-header-title{
        font-size: 1rem
    }
    .authorized-des-checkbox{
        justify-content: flex-start
    }
    .authorized-heading{
        font-size: 0.8rem
    }
    .beneficiary-heading{
        font-size: 0.8rem
    }
    .healthcare-premium-header-heading{
        font-size: 0.8rem
    }
    .list-para{
        font-size: 0.8rem
    }
    .list-para2{
        font-size: 0.8rem
    }
    .email-form{
        width: 100%;
    }


}



@media only screen and (max-width: 600px){
     .authorized-contact-form-2-relationship-container{
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
    }
    .purpose-of-enr-checkbox{
        gap: 10px
    }
    .cs-value{
    flex-wrap: wrap
  }
    .spouse-applying-check{
        flex-wrap: wrap;
    justify-content: flex-start;
    align-items: center;
    }
    .agr-signature{
        justify-content: flex-start
    }
    .db-month{
        justify-content: flex-start
    }
    .bene-sig{
        justify-content: flex-start
    }
    .can-style{
        width: 100%
    }
}

/* .life-insurance-information-body-style{
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: center;
    gap: 0px;
} */

@media only screen and (max-width: 540px){
    .life-insurance-information-body-style{
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: center;
    gap: 0px;
}
.cs-value{
    flex-wrap: wrap
  }
.supplemental-header-title{
    font-size: 0.9rem;
}
.header-contact p{
    font-size: 12px
}
}


@media only screen and (max-width: 1360px){
    .pro-bt{
        width: 100%
    }
    .cs-value{
    flex-wrap: wrap
  }
    .mda{
        width: 100%;
        justify-content: flex-start
    }
    .mda input{
        flex: 1;
    }
    .for-office-use-3-body div:nth-child(1){
        width: 100%
    }
    .for-office-use-3-body div:nth-child(2){
        width: 100%
    }
    .for-office-use-3-body div:nth-child(6){
        width: 100%
    }
    .for-office-use-3-body div:nth-child(7){
        width: 100%;
        justify-content: flex-start
    }
    .for-office-use-3-body{
        gap: 10px
    }
    .mad1{
        flex: 1;
    }
    .acc-name-style{
        gap: 20px
    }
    tbody tr td{
        font-size: 0.9rem;
    }
}


@media only screen and (min-width: 370px) and (max-width: 700px){
    header{
        height: 650px;
    }
    .header-content{
        height: 260px;
    }
    .cs-value{
    flex-wrap: wrap
  }
    .header-contact{
        margin-top: 4rem;
    }
    .j-heading{
        font-size: 1.5rem;
        font-family: 'Poppins-Bold' !important;
    }
    .header-contact{
        font-size: 1rem
    }
}



@media only screen and (max-width: 1100px){
    header{
        width: 100%;
    }
    .cs-value{
    flex-wrap: wrap
  }
    .martial-status{
        gap: 15px;
    align-items: flex-start;
    flex-direction: column;
    }
}

@media only screen and (max-width: 370px){
    .header-content{
        height: 200px;
        gap: 2rem;
    }
    .cs-value{
    flex-wrap: wrap
  }
    .j-heading{
        font-size: 1.5rem
    }
    .header-contact{
        font-size: 1rem
    }
}

/* @media only screen and (min-width: 1114px) and (max-width:1290) */
@media only screen and (min-width: 1114px) and (max-width: 1290px){
    header{
        height: 1255px;
    }
    .cs-value{
    flex-wrap: wrap
  }
}


    </style>
</head>

<body>
<!-- method="POST" action="{{ route('save.joinder') }}" -->
<div class="card">
    <form id="joinderForm" >
        @csrf
        <input type="hidden" id="referral_id" name="referral_id" value="{{$referral->id}}">
        <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">

        <!-- <div style="text-align: center;justify-content: center">
            <img src="{{ asset('images/intrustpit.png') }}" alt="Example Image">
        </div>
        <div style="text-align: center;">
            <div style="background-color: #16b6d3; width: fit-content; display: inline-block;">
                <h1 style="color: white; padding-left: 10px; padding-right: 10px;padding-top: 5px;padding-bottom: 5px">
                    JOINDER AGREEMENT</h1>
            </div>
        </div>
        <br>
        <br> <br>
        <br> <br>
        <br> <br>
        <br> <br>
        <br> -->
        <div style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 50px;">
        <header>
        <div class="logo-style">
            <img src="{{asset('assets/images/new_logo.png')}}" alt="logo" class="logo-img" />
        </div>
        <div class="header-content" >
            <div class="header-heading">
                <h1 style="font-family: 'Poppins-Bold'" class="j-heading">JOINDER</h1>
                <h1 style="font-family: 'Poppins-Bold';margin-top:-5px" class="j-heading">AGREEMENT</h1>
            </div>
            <div class="header-contact">
                <div style="display: flex; flex-direction: column; justify-content:center;align-items: center; gap: 5px;">
                    <p>Tel: 718.500.3235</p>
                    <p>Fax: 718.500.3235</p>
                    {{-- <p>Address: 5014-16th Ave, Suite 489 Brooklyn, NY 11204</p> --}}
                </div>
                <div>
                    <p>info@slctrusts.org</p>
                </div>
                <div>
                    <p class="header-email">seniorlifecaretrusts.org</p>
                </div>
            </div>
        </div>
    </header>
</div>
    <main>
        <!-- Page 1 -->
         <section style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 50px;">
             <div class="supplemental-header">
                 <p class="supplemental-header-heading">
                     SLC SUPPLEMENTAL NEEDS TRUST
                 </p>
                 <p class="supplemental-header-title">
                     Joinder Agreement / Beneficiary Profile Sheet
                 </p>
             </div>
             <div class="supplemental-des">
                 <p>
                     This is a legal document. It is an agreement pertaining
                     to a
                     supplemental needs trust created pursuant to 42 United
                     States Code
                     §1396p(d)(4). You are encouraged to seek independent,
                     professional
                     advice before signing this agreement. The undersigned
                     hereby adopts,
                     enrolls in and establishes a sub-trust account under the
                     SLC
                     Supplemental Needs Trust, dated December 24, 2017.
                 </p>
                 <p>
                     NOTE: All questions must be answered or your application
                     will be
                     delayed.
                 </p>
             </div>

             <!-- BENEFICIARY INFORMATION -->

             <div class="beneficiary-information">
                 <div class="beneficiary-indormation-header">
                     <h3 class="beneficiary-heading">BENEFICIARY
                         INFORMATION</h3>
                         <p class="beneficiary-des">The Beneficiary and Donor
                             must always be the same person. Only funds
                             belonging to the Beneficiary may be contributed to
                             the Trust</p>
                 </div>
                 <div class="beneficiary-information-form">
                     <div>
                         <div class="beneficiary-information-name-form">
                             <label style="font-style: normal;font-size:16px" class="label-name">Name:</label>
                             <div class="name-form-container">
                                 <div class="name-form">
                                     <input type="text" name="sponsor_first_name" value="{{$referral->first_name}}" id="first" class="inp-first"  > <br>
                                     <span>First</span>
                                 </div>
                                 <div class="name-form">
                                     <input type="text" name="sponsor_middle_name" id="middle" class="inp-middle"> <br>
                                     <span>Middle</span>
                                 </div>
                                 <div class="name-form name-form2">
                                     <input type="text" name="sponsor_last_name" value="{{$referral->last_name}}" id="last" class="inp-last"> <br>
                                     <span>Last</span>
                                 </div>
                             </div>
                             <div class="martial-status">
                                 <div class="status">
                                     <div style="min-width: fit-content;">
                                         <label style="font-style: normal;font-size:16px" class="label-status">Marital Status</label>
                                     </div>
                                     <div style="display: flex; justify-content: center; align-items: baseline; gap: 5px;">
                                         <input  type="radio" value="Married" name="sponsor_marital_status1" id="married" class="married" id="married"><label style="font-style: normal;font-size: 16.2px;" for="married"> Married</label>
                                     </div>
                                     <div style="display: flex; justify-content: center; align-items: baseline; gap: 5px;">
                                         <input type="radio" value="Widowed" name="sponsor_marital_status1" id="widowed" class="widowed" id="widowed"><label style="font-style: normal;font-size: 16.2px;" for="widowed"> Widowed</label>
                                     </div>
                                     <div style="display: flex; justify-content: center; align-items: baseline; gap: 5px;">
                                         <input type="radio" value="Single" name="sponsor_marital_status1" id="single" class="single" id="label"><label style="font-style: normal;font-size: 16.2px;" for="single"> Single</label>
                                     </div>

                                 </div>
                                 <div class="gender">
                                     <label style="font-style: normal;font-size:16px" for="gender">Gender</label>
                                     <input type="text"  name="sponsor_gender" value="{{$referral->gender}}" id="gender" class="inp-gender">
                                 </div>
                             </div>
                             <div class="name-form-container">
                                 <div class="security-form">
                                 <input type="text" id="ssn" class="inp-last" name="sponsor_ssn" value="{{$referral->patient_ssn}}">

                                    <br>
                                     <span>Social Security Number</span>
                                 </div>
                                 <div class="dob-form">
                                 <input type="date" class="inp-last" name="sponsor_dob" value="{{ $referral->date_of_birth }}" max="12-31-9999">
                                      <br>
                                     <span>Date of Birth</span>
                                 </div>
                                 <div class="security-form">
                                    <input type="text" class="inp-last" name="sponsor_citizen" value="{{$referral->sponsor_citizen}}">
                                      <br>
                                     <span>Citizenship</span>
                                    {{-- <span>Citizenship</span>
                                    <div class="custom-radio">
                                        <input type="radio" name="sponsor_citizen1" id="sponsor_citizen1_yes" value="Yes"><label for="sponsor_citizen1_yes"> Yes</label> &nbsp;
                                        <input type="radio" name="sponsor_citizen1" id="sponsor_citizen1_no" value="No"><label for="sponsor_citizen1_no"> No</label>
                                    </div> --}}

                                 </div>
                             </div>

                             <div class="contact">
                                 <label style="font-style: normal;font-size:16px" class="label-name">Contact
                                     Information:</label>
                                 <div class="contact-form-container">
                                     <div class="contact-form">
                                         <input type="text" name="sponsor_tel_home" id="home-phone" class="home-phone"> <br>
                                         <span>Home Phone</span>
                                     </div>
                                     <div class="contact-form">
                                         <input type="text" name="sponsor_tel_cell" value="{{$referral->phone_number}}" id="cell-phone" class="cell-phone"> <br>
                                         <span>Cell Phone</span>
                                     </div>
                                 </div>
                             </div>

                             <div class="preferred-phone">
                                 <div>
                                     <label style="font-style: normal;font-size:16px" class="label-status">Preferred Phone</label>
                                 </div>
                                 <div style="display: flex;justify-content: center;align-items: center;gap: 5px;">
                                     <input type="radio" value="Cell" name="prefered_cell" class="cell" id="cell">
                                     <label style="font-style: normal;font-weight: 600;" for="cell">Cell</label>
                                 </div>
                                 <div style="display: flex;justify-content: center;align-items: center;gap: 5px;">
                                     <input type="radio" value="Phone" name="prefered_cell" id="home" class="phone">
                                     <label style="font-style: normal;font-weight: 600;" for="home">Home</label>
                                 </div>
                             </div>

                             <div class="email-form">
                                 <input type="email" name="beneficiary_email" id="email" class="inp-first"> <br>
                                 <span>Email</span>
                             </div>
                         </div>
                         <div class="beneficiary-information-address-form">
                             <label style="font-style: normal;font-size:16px" class="label-name">Address:</label>
                             <div class="address-form-container">
                                 <div class="address-form">
                                     <input type="text" name="sponsor_address"  value="{{$referral->address}}" id="address" class="address" maxlength="35"> <br>
                                     <span>Address</span>
                                 </div>
                                 <div class="apt-form">
                                     <input type="text" name="sponsor_apt" value="{{$referral->apt_suite}}" id="apt" class="apt" maxlength="10"> <br>
                                     <span>Apt #</span>
                                 </div>
                                 <div class="city-form">
                                     <input type="text" name="sponsor_city" value="{{$referral->city}}" id="city" class="city" maxlength="20"> <br>
                                     <span>City</span>
                                 </div>
                                 <div class="state-form">
                                     <input type="text"  name="sponsor_state" value="{{$referral->state}}" id="state" class="state" maxlength="15"> <br>
                                     <span>State</span>
                                 </div>
                                 <div class="zip-form">
                                     <input type="text" name="sponsor_zip" value="{{$referral->zip_code}}" id="zip" class="zip" maxlength="6"> <br>
                                     <span>Zip</span>
                                 </div>
                             </div>
                         </div>
                         <div class="qualifying-disabilities">
                             <label style="font-style: normal;font-size:16px" class="label-name">Qualifying
                                 Disabilities:</label>
                             <div class="disabilities">
                                 <div class="d1-form">
                                     <span style="font-size: 16px;font-style: normal;font-weight: 600;">1.</span>
                                     <input type="text" name="d1" id="d1" class="d1" maxlength="35">
                                 </div>
                                 <div class="d2-form">
                                     <span style="font-size: 16px;font-style: normal;font-weight: 600;">2.</span>
                                     <input type="text" name="d2" id="d2" class="d2" maxlength="35">
                                 </div>
                                 <div class="d3-form">
                                     <span style="font-size: 16px;font-style: normal;font-weight: 600;">3.</span>
                                     <input type="text" name="d3" id="d3" class="d3" maxlength="35">
                                 </div>
                             </div>
                         </div>
                         <div class="mail-trust">
                             <p>Please mail all trust documents to:</p>
                             <div class="mail-trust-des">
                                 <p>SLC Supplemental Needs Trust</p>
                                 <p>5014-16th Ave, Suite 489</p>
                                 <p>Brooklyn, NY 11204</p>
                             </div>
                         </div>
                     </div>

                 </div>
                 <div class="footer-living-arrangements">
                    <div class="footer-left">
                        <p class="footer-left-dis">SLC SUPPLEMENTAL
                            NEEDS TRUST</p>
                    </div>
                    <div class="footer-mid">
                        <p class="footer-mid-dis">1</p>
                    </div>
                    <div class="footer-right">
                        <p class="footer-right-dis">JOINDER
                            AGREEMENT</p>
                    </div>
                </div>
             </div>

         </section>


         <!-- Page 2 -->

          <section style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 20px;">
              <!-- AUTHORIZED REPRESENTATIVES: -->
              <div class="authorized-representative">
                  <div>
                      <div class="authorized-representative-header">
                          <h3 class="authorized-heading">AUTHORIZED
                              REPRESENTATIVES:</h1>
                              <div class="authorized-des">
                                  <p style="min-width: fit-content;">Who will be your primary contact?</p>
                                  <div class="authorized-des-checkbox">
                                      <div style="display: flex; justify-content: center; align-items: center; gap: 5px; min-width: 110px;">
                                          <input type="radio" name="auth_beneficiary"
                                          value="Beneficiary" id="beneficiary" class="beneficiary">
                                          <label style="font-style: normal" for="beneficiary">Beneficiary</label>
                                      </div>
                                      <div style="display: flex; justify-content: center; align-items: center; gap: 5px; min-width: 110px;">
                                          <input type="radio" name="auth_beneficiary" id="auth-1"
                                          value="Auth. Rep.1"
                                          class="auth-1">
                                          <label style="font-style: normal" for="auth-1">Auth. Rep. 1</label>
                                      </div>
                                      <div style="display: flex; justify-content: center; align-items: center; gap: 5px; min-width: 120px;">
                                          <input type="radio" name="auth_beneficiary"
                                          value="Auth. Rep. 2"
                                          id="auth-2" class="auth-2">
                                          <label style="font-style: normal" for="auth-2">Auth. Rep. 2</label>
                                      </div>
                                  </div>
                              </div>
                      </div>
                      <div class="authorized-representative-body">
                          <div class="authorized-representative-body-content-1">
                              <div class="authorized-representative-body-content-1-des">
                                  <p>The following individual will be
                                      authorized to communicate with SLC
                                      Supplemental Needs Trust. I authorize
                                      this individual to: Make Deposits,
                                      Request Statements and Request
                                      Disbursements.</p>
                              </div>
                              <div class="authorized-representative-body-content-1-form">
                                  <h4>Authorized Representative #1</h4>
                                  <div class="authorized-representative-container">
                                      <div class="authorized-name-form">
                                          <input type="text" name="auth_rep_one_fname" id="authorized-first"
                                              class="authorized-inp-first">
                                          <br>
                                          <span>First</span>
                                      </div>
                                      <div class="authorized-name-form">
                                          <input type="text" name="auth_rep_one_lname" id="authorized-last"
                                              class="authorized-inp-last">
                                          <br>
                                          <span>Last</span>
                                      </div>
                                  </div>
                                  <div class="authorized-contact-form-container">
                                      <h4>Contact Information</h4>
                                      <div class="authorized-contact-form-content">
                                          <div class="authorized-home-form">
                                              <input type="text" name="auth_rep_one_tel"
                                                  id="authorized-home-form-inp" class="authorized-home-form-inp">
                                              <br>
                                              <span>Home Phone</span>
                                          </div>
                                          <div class="authorized-cell-form">
                                              <input type="text" name="auth_rep_one_cell"
                                                  id="authorized-cell-form-inp" class="authorized-cell-form-inp">
                                              <br>
                                              <span>Cell Phone</span>
                                          </div>
                                          <div class="authorized-preferred-form">
                                              <label style="font-style: normal" class="normal-text" for>Preferred
                                                  Phone</label>
                                              <div class="authorized-preferred-form-checkbox">
                                                  <div>
                                                      <input type="radio" name="authorized_preferred_cell_form_inp"
                                                          id="authorized-preferred-cell-form-inp"
                                                          class="authorized-preferred-cell-form-inp"
                                                           value="Authorized_1_cell"
                                                          >
                                                      <label style="font-style: normal" class="box-label" for="authorized-preferred-cell-form-inp">Cell</label>
                                                  </div>
                                                  <div>
                                                      <input type="radio" name="authorized_preferred_cell_form_inp"
                                                          id="authorized-preferred-home-form-inp"
                                                          class="authorized-preferred-home-form-inp"
                                                          value="Authorized_1_home"
                                                          >
                                                      <label style="font-style: normal" class="box-label" for="authorized-preferred-home-form-inp">Home</label>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>

                                      <div class="authorized-contact-form-container-2">
                                          <div class="authorized-contact-form-2">
                                              <input type="text" name="auth_rep_one_email"
                                                  id="authorized-contact-form-2-email"
                                                  class="authorized-contact-form-2-email">
                                              <br>
                                              <span>Email</span>
                                          </div>
                                          <div class="authorized-contact-form-2-relationship-container">
                                              <label class="normal-text"  style="min-width: fit-content; font-style: normal">Relationship
                                                  to Beneficiary</label>
                                              <input type="text"
                                                 class="inp-last"
                                                  id="authorized-contact-form-2-relationship"
                                                  name="auth_rep_one_relation_beneficiary" maxlength="35">
                                          </div>
                                      </div>
                                      <div class="authorized-address-form">
                                          <label style="font-style: normal" class="label-name">Address</label>
                                          <div class="address-form-container">
                                              <div class="address-form">
                                                  <input type="text" name="auth_rep_one_address" id="address" class="address" maxlength="35"> <br>
                                                  <span >Address</span>
                                              </div>
                                              <div class="apt-form">
                                                  <input type="text" name="auth_rep_one_apt" id="apt" class="apt" maxlength="10"> <br>
                                                  <span>Apt #</span>
                                              </div>
                                              <div class="city-form">
                                                  <input type="text" name="auth_rep_one_city" id="city" class="city" maxlength="20"> <br>
                                                  <span>City</span>
                                              </div>
                                              <div class="state-form">
                                                  <input type="text" name="auth_rep_one_state" id="state" class="state" maxlength="15"> <br>
                                                  <span>State</span>
                                              </div>
                                              <div class="zip-form">
                                                  <input type="text"
                                                  name="auth_rep_one_zip" id="zip" class="zip" maxlength="6"> <br>
                                                  <span>Zip</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="authorized-representative-body-content-2">
                              <div class="authorized-representative-body-content-1-des">
                                  <p>The following individual will be
                                      authorized to communicate with SLC
                                      Supplemental Needs Trust. I authorize
                                      this individual to: Make Deposits,
                                      Request Statements and Request
                                      Disbursements.</p>
                              </div>
                              <div class="authorized-representative-body-content-1-form">
                                  <h4>Authorized Representative #2</h4>
                                  <div class="authorized-representative-container">
                                      <div class="authorized-name-form">
                                          <input type="text" name="auth_rep_two_fname" id="authorized-first"
                                              class="authorized-inp-first">
                                          <br>
                                          <span>First</span>
                                      </div>
                                      <div class="authorized-name-form">
                                          <input type="text" name="auth_rep_two_lname" id="authorized-last"
                                              name="auth_rep_one_lname" class="authorized-inp-last">
                                          <br>
                                          <span>Last</span>
                                      </div>
                                  </div>
                                  <div class="authorized-contact-form-container">
                                      <h4>Contact Information</h4>
                                      <div class="authorized-contact-form-content">
                                          <div class="authorized-home-form">
                                              <input type="text" name="auth_rep_two_tel"
                                                  id="authorized-home-form-inp" class="authorized-home-form-inp">
                                              <br>
                                              <span>Home Phone</span>
                                          </div>
                                          <div class="authorized-cell-form">
                                              <input type="text" name="auth_rep_two_cell"
                                                  id="authorized-cell-form-inp" class="authorized-cell-form-inp">
                                              <br>
                                              <span>Cell Phone</span>
                                          </div>
                                          <div class="authorized-preferred-form">
                                              <label style="font-style: normal" class="normal-text" for>Preferred
                                                  Phone</label>
                                              <div class="authorized-preferred-form-checkbox">
                                                  <div>
                                                      <input type="radio" name="authorized_preferred_cell2"
                                                      value="Cell"
                                                          id="authorized-preferred-cell-form-inp2"
                                                          class="authorized-preferred-cell-form-inp">
                                                      <label style="font-style: normal" class="box-label" for="authorized-preferred-cell-form-inp2">Cell</label>
                                                  </div>
                                                  <div>
                                                      <input type="radio"
                                                      value="Home"
                                                       name="authorized_preferred_cell2"
                                                          id="authorized-preferred-home-form-inp2"
                                                          class="authorized-preferred-home-form-inp">
                                                      <label style="font-style: normal" class="box-label" for="authorized-preferred-home-form-inp2">Home</label>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>

                                      <div class="authorized-contact-form-container-2">
                                          <div class="authorized-contact-form-2">
                                              <input type="text"
                                                  name="auth_rep_two_email"
                                                  class="authorized-contact-form-2-email">
                                              <br>
                                              <span>Email</span>
                                          </div>
                                          <div class="authorized-contact-form-2-relationship-container">
                                              <label class="normal-text" style="min-width: fit-content;text-align: right;font-style: normal">Relationship
                                                  to Beneficiary</label>
                                              <input type="text" name="auth_rep_two_relation_beneficiary"
                                                  id="authorized-contact-form-2-relationship"
                                                  class="authorized-contact-form-2-relationship" maxlength="35">
                                          </div>
                                      </div>
                                      <div class="authorized-address-form">
                                          <label style="font-style: normal" class="label-name">Address</label>
                                          <div class="address-form-container">
                                              <div class="address-form">
                                                  <input type="text" name="auth_rep_two_address" id="address" class="address" maxlength="35"> <br>
                                                  <span>Address</span>
                                              </div>
                                              <div class="apt-form">
                                                  <input type="text" name="auth_rep_two_apt" id="apt" class="apt" maxlength="10"> <br>
                                                  <span>Apt #</span>
                                              </div>
                                              <div class="city-form">
                                                  <input type="text" name="auth_rep_two_city" id="city" class="city" maxlength="20"> <br>
                                                  <span>City</span>
                                              </div>
                                              <div class="state-form">
                                                  <input type="text" name="auth_rep_two_state" id="state" class="state" maxlength="15"> <br>
                                                  <span>State</span>
                                              </div>
                                              <div class="zip-form">
                                                  <input type="text" name="auth_rep_two_zip" id="zip" class="zip" maxlength="6"> <br>
                                                  <span>Zip</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

              <!-- REFERRING SOURCE -->

              <div class="referring-source">
                  <div>
                      <div class="referring-source-header">
                          <h3 class="authorized-heading">REFERRING SOURCE</h3>
                      </div>
                      <div class="referring-source-body">
                          <div class="referring-source-form">
                              <input type="text" name="referring_agency" class="referring-source-agency">
                              <br>
                              <span>Name of Agency</span>
                          </div>
                          <div class="referring-source-form">
                              <input type="text" class="referring-source-contract" name="referring_contract">
                              <br>
                              <span>Name of Contract</span>
                          </div>
                          <div class="referring-source-form">
                              <input type="text" name="referring_tel" class="referring-source-home">
                              <br>
                              <span>Home</span>
                          </div>
                          <div class="referring-source-form">
                              <input name="referring_email" type="text" class="referring-source-email">
                              <br>
                              <span>Email</span>
                          </div>
                          <div class="address-form">
                              <input type="text" name="referring_address" class="address" maxlength="35"> <br>
                              <span>Address</span>
                          </div>
                          <div class="apt-form">
                              <input type="text" name="referring_apt" class="apt" maxlength="10"> <br>
                              <span>Apt #</span>
                          </div>
                          <div class="city-form">
                              <input type="text" name="referring_city" id="city" class="city" maxlength="20"> <br>
                              <span>City</span>
                          </div>
                          <div class="state-form">
                              <input type="text" name="referring_state" id="state" class="state" maxlength="15"> <br>
                              <span>State</span>
                          </div>
                          <div class="zip-form">
                              <input type="text" name="referring_zip" id="zip" class="zip" maxlength="6"> <br>
                              <span>Zip</span>
                          </div>

                      </div>
                      <div class="referring-source-para">
                          <p class="referring-source-para-style">I
                              Authorize any applicable documents necessary for
                              reporting to Government Agencies to be<br>sent
                              to the referring source above.
                              <input type="radio" name="referring_auth1" value="Yes" id="referring-source-para-yes">
                              <label class="box-label" style="font-style: normal;" for="referring-source-para-yes">Yes</label>
                              <input type="radio" name="referring_auth1" value="No" id="referring-source-para-no">
                              <label class="box-label" style="font-style: normal;" for="referring-source-para-no">No</label>
                          </p>
                      </div>
                  </div>
                  <div class="footer-living-arrangements">
                    <div class="footer-left">
                        <p class="footer-left-dis">SLC SUPPLEMENTAL
                            NEEDS TRUST</p>
                    </div>
                    <div class="footer-mid">
                        <p class="footer-mid-dis">2</p>
                    </div>
                    <div class="footer-right">
                        <p class="footer-right-dis">JOINDER
                            AGREEMENT</p>
                    </div>
                </div>
                </div>
          </section>

          <!-- Page 3 -->

          <section style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 20px;">

              <!-- PURPOSE OF ENROLLMENT -->
              <div class="purpose-of-enr-container">
                  <div>
                      <div class="purpose-of-enr-header">
                          <h3 class="authorized-heading">PURPOSE OF
                              ENROLLMENT</h3>
                      </div>
                      <div class="purpose-of-enr-body">
                          <p>Indicate reason for
                              establishing an account.</p>
                          <div class="purpose-of-enr-checkbox">
                              <div style="min-width: fit-content">
                                  <input type="radio" name="account_establishing_reason1" value="Shelter Monthly Excess Income" id="purpose-of-enr-income">
                                  <label class="box-label" style="font-style: normal;" for="purpose-of-enr-income">Shelter
                                      Monthly Excess
                                      Income</label>
                              </div>
                              <div style="min-width: fit-content;">
                                  <input type="radio" name="account_establishing_reason1" value="Shelter Excess Resources" id="purpose-of-enr-shelter">
                                  <label class="box-label" style="font-style: normal;" for="purpose-of-enr-shelter">Shelter
                                      Excess Resources</label>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

              <!-- MEDICAID INFORMATION -->

              <div class="medicaid-information">
                  <div class="medicaid-information-header">
                      <h3 class="authorized-heading">MEDICAID INFORMATION</h3>
                  </div>
                  <div class="medicaid-information-body">
                      <table>
                          <thead>
                              <tr class="medicaidl-thead">
                                  <td>Please Attach MAP / LDSS Notice of
                                      Decision</td>
                                  <td>Applicant</td>
                                  <td>Spouse</td>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="medicaidl-tbody">
                                  <td>Application Status <br> Does the beneficiary
                                      receive Medicaid?</td>
                                  <td style="width: 0%">
                                      <div class="applicant">
                                          <div>
                                              <input type="radio" name="beneficiary_receive_medicaid_applicant1" value="Yes" id="applicant-yes">
                                              <label class="box-label" style="font-style: normal;" for="applicant-yes"> Yes</label>
                                          </div>
                                          <div>
                                              <input type="radio" name="beneficiary_receive_medicaid_applicant1" value="No" id="applicant-no"> <label class="box-label" style="font-style: normal;"
                                                  for="applicant-no"> No</label>
                                          </div>
                                          <div>
                                              <input type="radio" name="beneficiary_receive_medicaid_applicant1" value="Pending" id="applicant-pending"><label class="box-label" style="font-style: normal;" for="applicant-pending"> Pending</label>
                                          </div>

                                      </div>
                                  </td>
                                  <td style="width: 0%">
                                      <div class="applicant">
                                          <div>
                                              <input type="radio" name="beneficiary_receive_medicaid_spouse1" value="Yes" id="spouse-yes">
                                              <label class="box-label" style="font-style: normal;" for="spouse-yes"> Yes</label>
                                          </div>
                                          <div>
                                              <input type="radio" name="beneficiary_receive_medicaid_spouse1" value="No" id="spouse-no">
                                              <label class="box-label" style="font-style: normal;" for="spouse-no"> No</label>
                                          </div>
                                          <div>
                                              <input type="radio" name="beneficiary_receive_medicaid_spouse1" value="Pending" id="spouse-pending">
                                              <label class="box-label" style="font-style: normal;" for="spouse-pending"> Pending</label>
                                          </div>

                                      </div>

                                  </td>
                              </tr>
                              <tr class="medicaidl-tbody">
                                  <td>CIN Number/medicaid Number</td>
                                  <td style="width: 0%">
                                    <div style="display: flex;align-items: center;gap: 5px;cursor:p">
                                        {{-- <div>
                                            <span>$</span>
                                        </div> --}}
                                        <div>
                                            <input name="applicant_medicaid_cin_number" style="border: none;cursor:pointer" type="text" >
                                        </div>
                                    </div>
                                  </td>
                                  <td style="width: 0%">
                                    <div style="display: flex;align-items: center;gap: 5px;">
                                        {{-- <div>
                                            <span>$</span>
                                        </div> --}}
                                        <div>
                                            <input name="spouse_medicaid_cin_number" style="border: none;cursor:pointer" type="text"  >
                                        </div>
                                    </div>
                                  </td>
                              </tr>
                              <tr class="medicaidl-tbody">
                                  <td>Monthly Spend Down $</td>
                                  <td style="width: 0%">
                                    <div style="display: flex;align-items: center;gap: 5px;">
                                        {{-- <div>
                                            <span>$</span>
                                        </div> --}}
                                        <div>
                                            <input style="border: none;cursor:pointer" type="text"  name="medicaid_applicant_monthly_spend_down">
                                        </div>
                                    </div>
                                  </td>
                                  <td style="width: 0%">
                                    <div style="display: flex;align-items: center;gap: 5px;">
                                        {{-- <div>
                                            <span>$</span>
                                        </div> --}}
                                        <div>
                                            <input style="border: none;cursor:pointer" type="text"  name="medicaid_spouse_monthly_spend_down">
                                        </div>
                                    </div>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="medicaid-information-footer">
                      <p>If the Beneficiary receives other benefits, such as
                          Food Stamps, HUD Section 8, etc. list these benefits <br>and monthly amounts
                          <input type="text" name="beneficiary_benefits"
                              class="medicaid-information-footer-inp" id="medicaid-information-footer-inp" maxlength="95">
                      </p>
                  </div>
                </div>


              <!-- HOUSEHOLD INCOME -->

              <div class="household-income">
                  <div>
                      <div class="household-income-header">
                          <h3 class="authorized-heading">HOUSEHOLD INCOME</h3>
                      </div>
                      <div class="household-income-body">

                          <div class="spouse-info">
                              <h4>Spouse Information</h4>
                              <span style="font-size: 16px;margin-left: 5px;"> (please include proof of income)</span>
                          </div>
                          <div style="gap: 5px;
                          display: flex;
                          flex-direction: column;
                          justify-content: center;">
                              <div class="spouse-deceased">
                                  <p>Is Spouse Deceased?</p>
                                  <div>
                                      <input type="radio" name="spouse_decreased1" value="Yes" id="dec-yes" class="dec-yes">
                                      <label class="box-label" style="font-style: normal" for="dec-yes">Yes</label>
                                  </div>
                                  <div>
                                      <input type="radio" name="spouse_decreased1" value="No" id="dec-no" class="dec-no">
                                      <label class="box-label" style="font-style: normal" for="dec-no">No</label>
                                  </div>
                              </div>
                              <div class="spouse-applying">
                                  <p style="min-width: fit-content;">Is Applicant & Spouse Applying Together?</p>
                                  <div class="spouse-applying-check">
                                      <div>
                                          <input type="radio" name="applying_together1" value="Yes" id="app-yes" class="app-yes">
                                          <label class="box-label" style="font-style: normal" for="app-yes"> Yes</label>
                                      </div>
                                      <div>
                                          <input type="radio" name="applying_together1" value="No" id="app-no" class="app-no">
                                          <label class="box-label" style="font-style: normal" for="app-no"> No</label>
                                      </div>
                                      <div>
                                          <p>If Yes, Fill in Spouse’s Income.</p>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div style="gap: 5px;
                      display: flex;
                      flex-direction: column;
                      justify-content: center;">

                              <div class="house-hold-name">
                                  <span style="font-style: normal;font-size:16px">Name:</span>
                                  <div class="house-hold-first-form">
                                      <label style="font-style: normal;font-size:16px" for="house-hold-first">First</label>
                                      <input type="text" name="spouse_fname" id="house-hold-first"  class="house-hold-first">
                                  </div>
                                  <div class="house-hold-last-form">
                                      <label style="font-style: normal;font-size:16px" for="house-hold-last">Last</label>
                                      <input type="text" name="spouse_lname" id="house-hold-last" class="house-hold-last">
                                  </div>
                              </div>
                              <div class="spouse-applying">
                                  <p>Spouse applied for Medicaid with beneficiary?</p>
                                  <div class="spouse-applying-check">
                                      <div>
                                          <input type="radio" name="spouse_applied_for_medicaid_with_beneficiary1" value="Yes" id="med-yes" class="med-yes">
                                          <label class="box-label" style="font-style: normal" for="med-yes"> Yes</label>
                                      </div>
                                      <div>
                                          <input type="radio" name="spouse_applied_for_medicaid_with_beneficiary1" value="No" id="med-no" class="med-no">
                                          <label class="box-label" style="font-style: normal" for="med-no"> No</label>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div style="overflow-x: auto">
                              <table>
                                  <thead>
                                      <tr class="ind-th">
                                          <td>TYPE OF BENEFIT MONTHLY AMOUNT</td>
                                          <td>Applicant</td>
                                          <td>Spouse</td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr class="individual-tr">
                                          <td>Supplement Security Income (SSI)</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_ssi" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_ssi" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Social Security Disability Income (SSDI)</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_ssdi" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_ssdi" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Social Security Retirement Income (SSA)</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_ssa" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_ssa" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>VA Benefits</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_va_ben" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_va_ben" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Employment Benefits</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_employee_ben" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_employee_ben" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Survivor Benefits</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_survivor_ben" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_survivor_ben" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>IRA Distribution</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_ira_dist" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_ira_dist" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Pensions / Annuities</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_pension_annuities" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_pension_annuities" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Interest / Dividends</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_interest_dividends" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_interest_dividends" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Reparations</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_reparations" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_reparations" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                      <tr class="individual-tr">
                                          <td>Other</td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="applicant_other" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                          <td style="width: 0%">
                                            <div style="display: flex;align-items: center;gap: 5px;">
                                                <div>
                                                    <span style="font-style: normal;font-family: math;font-size:16px">$</span>
                                                </div>
                                                <div>
                                                    <input style="border: none;" type="text"  name="spouse_other" maxlength="20">
                                                </div>
                                            </div>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                          <div class="house-hold-note">
                              <p>Please Note: All disbursements must be for sole benefit of the account beneficiary. <br>A
                                  spouse is not a beneficiary for the account.</p>
                          </div>

                      </div>
</div>
                  <div class="footer-living-arrangements">
                    <div class="footer-left">
                        <p class="footer-left-dis">SLC SUPPLEMENTAL
                            NEEDS TRUST</p>
                    </div>
                    <div class="footer-mid">
                        <p class="footer-mid-dis">3</p>
                    </div>
                    <div class="footer-right">
                        <p class="footer-right-dis">JOINDER
                            AGREEMENT</p>
                    </div>
                </div>
                </div>
          </section>





            <!-- Page 4 -->

            <section style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 50px;" class="applicable-item">
                <div class="applicable-item-para">
                    <p style="text-align: center;">FOR ANY APPLICABLE ITEMS BELOW, PLEASE ATTACH THE NECCESARY PROOF.
                    </p>
                </div>
                <!-- HEALTHCARE PREMIUMS -->
                <div class="healthcare-premium">
                    <div class="healthcare-premium-header">
                        <h3 class="healthcare-premium-header-heading">HEALTHCARE PREMIUMS</h3>
                    </div>
                    <div class="healthcare-premium-body">
                        <div class="healthcare-premium-body-style">
                            <div style="display: flex;
                            justify-content: center;
                            align-items: center;
                            gap: 5px;">
                                <p>Medicare Part:</p>
                                <div style="display: flex;
                                justify-content: center;
                                align-items: center;
                                gap: 10px;">
                                    <div>
                                        <input type="radio"
                                        value="B"
                                        name="healthcare_b" id="healthcare-b"
                                            class="healthcare-b">
                                        <label style="font-style: normal;font-size:16px" for="healthcare-b">B</label>
                                    </div>
                                    <div>
                                        <input
                                        value="D"
                                        type="radio" name="healthcare_b" id="healthcare-d"
                                            class="healthcare-d">
                                        <label style="font-style: normal;font-size:16px" for="healthcare-d">D</label>
                                    </div>
                                </div>
                            </div>
                            <div class="healthcare-applicant">
                                <p>Does the applicant have a supplemental policy?</p>
                                <div style="display: flex;
                                justify-content: center;
                                align-items: center;
                                gap: 10px;">
                                    <div>
                                        <input
                                        value="Yes"
                                        type="radio" name="supplemental_yes" id="supplemental_yes">
                                        <label style="font-style: normal;font-size:16px" for="supplemental_yes">Yes</label>
                                    </div>
                                    <div>
                                        <input
                                        value="No"
                                         type="radio" name="supplemental_yes" id="supplemental_no">
                                        <label style="font-style: normal;font-size:16px" for="supplemental_no">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="healthcare-plane">
                            <!-- <div> -->
                                <span style="min-width: fit-content;font-style:normal;font-size:16px">If yes, what is the monthly premium? $</span>
                                <input type="text" name="healthcare_partb_premium" id="healthcare-pre"
                                    style="border: none; border-bottom: 1px solid black;" maxlength="25">
                            <!-- </div> -->
                            <!-- <div style="width: 50%;"> -->
                                <span style="min-width: fit-content;font-style:normal;font-size:16px"> Plan Name?</span>
                                <input type="text" name="healthcare_partb_plan" id="healthcare-plan"
                                    style="border: none; border-bottom: 1px solid black; flex: 1;" maxlength="25">
                            <!-- </div> -->
                        </div>
                    </div>
                </div>

                <!-- FUNERAL INFORMATION -->

                <div class="funeral-information">
                    <div class="funeral-information-header">
                        <h3 class="healthcare-premium-header-heading">FUNERAL INFORMATION</h3>
                    </div>
                    <div class="funeral-information-body">
                        <div style="display: flex;
                    justify-content: flex-start;
                    align-items: center;
                    gap: 10px; flex-wrap:wrap">
                            <p>Does the Beneficiary have any funeral provisions in place?</p>
                            <div style="display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;">
                                <div>
                                    <input type="radio" name="funeral_information_body_yes"
                                    value="Yes"
                                        id="funeral-information-body-yes" class="funeral-information-body-yes">
                                    <label style="font-style: normal;font-size:16px" for="funeral-information-body-yes">Yes</label>
                                </div>
                                <div>
                                    <input type="radio" name="funeral_information_body_yes"
                                    value="No"
                                        id="funeral-information-body-no">
                                    <label style="font-style: normal;font-size:16px" for="funeral-information-body-no">No</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p style="font-style: italic">If you answered yes, please attach funeral provision documents.</p>
                        </div>
                    </div>
                </div>

                <!-- LIFE INSURANCE INFORMATION -->

                <div class="life-insurance-information">
                    <div class="life-insurance-information-header">
                        <h3 class="healthcare-premium-header-heading">LIFE INSURANCE INFORMATION</h3>
                    </div>
                    <div class="life-insurance-information-body">
                        <div class="life-insurance-information-body-info">
                            <div style="display: flex;
                            justify-content: flex-start;
                            align-items: center;
                            gap: 10px; flex-wrap:wrap">
                                <p>Is there a life insurance policy in place for the Beneficiary?</p>
                                <div style="display: flex;
                            justify-content: center;
                                align-items: center;
                                gap: 10px;">
                                    <div>
                                        <input type="radio"
                                        value="Yes"
                                         name="life_insurance_information_body_yes"
                                            id="life-insurance-information-body-yes"
                                            class="life-insurance-information-body-yes">
                                        <label style="font-style: normal;font-size:16px" for="life-insurance-information-body-yes">Yes</label>
                                    </div>
                                    <div>
                                        <input type="radio"
                                        value="No"
                                         name="life_insurance_information_body_yes"
                                            id="life-insurance-information-body-no">
                                        <label style="font-style: normal;font-size:16px" for="life-insurance-information-body-no">No</label>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p style="font-style: italic">Please attach a copy</p>
                            </div>
                        </div>
                        <div class="life-insurance-information-body-form">
                            <div
                             style="display: flex;
                            width: 100%;
                            justify-content: space-between;
                            align-items: center; gap: 5px;
                            flex-wrap:wrap ">
                                <div
                                class="life-insurance-information-body-style"
                                >
                                    <p style="min-width: fit-content">Name of Insured</p>
                                    <input type="text" name="insured_name" id="healthcare-pre"
                                        style="border: none; border-bottom: 1px solid black; flex: 1;" maxlength="25">
                                </div>
                                <div  class="life-insurance-information-body-style">
                                    <p style="min-width: fit-content">Name of Owner</p>
                                    <input type="text" name="insured_owner" id="healthcare-plan"
                                        style="border: none; border-bottom: 1px solid black; flex: 1;" maxlength="25">
                                </div>
                            </div>
                            <div style="display: flex;
                        width: 100%;
                        justify-content: space-between;
                        align-items: center; gap: 5px; flex-wrap:wrap">
                                <div class="life-insurance-information-body-style">
                                    <p style="min-width: fit-content">Name of Insurance Company</p>
                                    <input type="text" name="insurance_company" id="healthcare-plan"
                                        style="border: none; border-bottom: 1px solid black; width:100%" maxlength="20">
                                </div>
                                <div class="life-insurance-information-body-style">
                                    <p style="min-width: fit-content">Policy #</p>
                                    <input type="text" name="insurance_policy_number" id="healthcare-plan"
                                        style="border: none; border-bottom: 1px solid black; flex: 1;" maxlength="20">
                                </div>
                            </div>
                            <div class="life-insurance-type">
                                <div>
                                    <p style="min-width: fit-content">Type of Policy:</p>
                                </div>
                                <div class="life-policy">
                                    <div class="life-policy-style">
                                        <input type="radio" name="type_of_policy1" value="Term" id="life-insurance-term">
                                        <label style="font-style: normal;font-size:16px" for="life-insurance-term">Term</label>
                                        <input type="text" name="healthcare_plan" id="healthcare-plan"
                                            style="border: none; border-bottom: 1px solid black; flex:1" maxlength="10">
                                    </div>
                                    <div class="life-policy-style">
                                        <input type="radio" name="type_of_policy1" value="Life" id="life-insurance-life">
                                        <label style="font-style: normal;font-size:16px" for="life-insurance-life">Life</label>
                                        <input type="text" name="healthcare_plan2" id="healthcare-plan"
                                            style="border: none; border-bottom: 1px solid black; flex:1" maxlength="10">
                                    </div>
                                </div>
                                <div class="cs-value">
                                    <p style="min-width: fit-content">Cash Surrender Value $ </p>
                                    <input type="text" name="cash_surrender_value" id="healthcare-plan"
                                        style="border: none; border-bottom: 1px solid black; flex: 1;" maxlength="20">
                                </div>
                            </div>


                        </div>
                        <div>
                            <p class="list-para2">Upon the death of the Beneficiary, amounts remaining in the Beneficiary’s sub-account
                                shall be <br>
                                retained in the Trust solely for the benefit of individuals who are disabled as defined
                                in Soc. Sec. Law <br>
                                Section 1614(a) (3) [42 USC 1382c(a) (3)] and any subsequent definitions that are
                                enacted into law.</p>
                        </div>
                    </div>
                </div>

                <!-- LIVING ARRANGEMENTS (indicate the living arrangement of the Beneficiary) -->

                <div class="living-arrangements">
                    <div class="living-arrangement-header">
                        <h3 class="healthcare-premium-header-heading">LIVING ARRANGEMENTS</h3>
                        <p style="font-style: italic">(indicate the living arrangement of the Beneficiary)</p>
                    </div>
                    <div class="living-arrangement-body">
                     <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap:wrap;gap:15px">
                        <div>
                            <input type="radio"  name="living_arrangement1" value="Independently" id="independently">
                            <label style="font-style: normal;font-size:16px" for="independently">Independently</label>
                        </div>
                        <div>
                            <input type="radio"   name="living_arrangement1" value="With Spouse" id="with-spouse">
                            <label style="font-style: normal;font-size:16px" for="with-spouse">With Spouse</label>
                        </div>
                        <div>
                            <input type="radio" name="living_arrangement1" value="With Parents" id="with-parents">
                            <label style="font-style: normal;font-size:16px" for="with-parents">With Parents/other family </label>
                        </div>
                        <div>
                            <input type="radio" name="living_arrangement1" value="Assisted Living facility" id="assisted">
                            <label style="font-style: normal;font-size:16px" for="assisted">Assisted Living Facility</label>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;flex-wrap:wrap;gap:15px">
                        <div>
                            <input type="radio" name="living_arrangement1" value="Family Care Program" id="family-care">
                            <label style="font-style: normal;font-size:16px" for="family-care">Family Care Program</label>
                        </div>
                        <div>
                            <input type="radio" name="living_arrangement1" value="Nursing Home" id="nursing-home">
                            <label style="font-style: normal;font-size:16px" for="nursing-home">Nursing Home</label>
                        </div>
                        <div>
                            <input type="radio" name="living_arrangement1" value="CR/IRA/ICF(supervised)" id="cr">
                            <label style="font-style: normal;font-size:16px" for="cr"> CR/IRA/ICF (supervised) </label>
                        </div>
                        <div>
                            <input type="radio" name="living_arrangement1" value="CR/IRA(Supportive)" id="ira">
                            <label style="font-style: normal;font-size:16px" for="ira">CR/IRA (supportive)</label>
                        </div>
                    </div>
                      <div style="width:100%;display: flex; justify-content: space-between; align-items: center; gap: 15px;flex-wrap:wrap">
                            <div>
                                <input type="radio" name="living_arrangement1" value="Other" id="other">
                                <label style="font-style: normal;font-size:16px" for="other"> Other -</label>
                            </div>

                        <div style="flex: 1;">
                            <input type="text" name="living_arrangement_other" id="healthcare-plan"
                                style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="75">
                        </div>
                    </div>

                    </div>
                </div>

                <!-- LIVING ARRANGEMENTS -->

                <div class="living-arrangements">
                    <div class="living-arrangement-header">
                        <h3 class="healthcare-premium-header-heading">LIVING ARRANGEMENTS</h3>
                    </div>
                    <div class="living-arrangements-body">
                        <div>
                            <p style="font-style: italic">Please attach a copy of the guardianship order with this Joinder Agreement.</p>
                        </div>
                        <div style="display: flex;
                    align-items: center;
                    gap: 8px; flex-wrap:wrap">
                            <div>
                                <p>Does the Beneficiary have a court appointed Guardian? </p>
                            </div>
                            <div style="display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;">
                                <div>
                                    <input type="radio" name="living_arrangements_yes" id="living-arrangements-yes"
                                    value="Yes"
                                        class="living-arrangements-yes">
                                    <label style="font-style: normal;font-size:16px" for="living-arrangements-yes">Yes</label>
                                </div>
                                <div>
                                    <input type="radio" name="living_arrangements_yes"
                                    value="No"
                                    id="living-arrangements-no">
                                    <label style="font-style: normal;font-size:16px" for="living-arrangements-no">No</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p style="font-style: italic">If you answered yes, continue to fill out below:</p>
                        </div>
                        <div style="display: flex;
                    align-items: center;
                    gap: 8px;flex-wrap:wrap">
                            <div>
                                <p>Guardian of the: </p>
                            </div>
                            <div style="display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;">
                                <div>
                                    <input type="radio"
                                    value="Person"
                                     name="living_arrangements_person"
                                        id="living-arrangements-person" class="living-arrangements-person">

                                    <label style="font-style: normal;font-size:16px" for="living-arrangements-person">Person</label>
                                </div>
                                <div>
                                    <input type="radio"
                                    value="Property"
                                     name="living_arrangements_person"
                                        id="living-arrangements-property">
                                    <label style="font-style: normal;font-size:16px" for="living-arrangements-property">Property</label>
                                </div>
                                <div>
                                    <input type="radio"
                                    value="Both"
                                    name="living_arrangements_person"
                                        id="living-arrangements-both">
                                    <label style="font-style: normal;font-size:16px" for="living-arrangements-both">Both</label>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex;
                    flex-direction: column;
                    gap: 20px;">
                            <div>
                                <p>Court Appointed Guardian Information</p>
                            </div>
                            <div style="display: flex;
                        justify-content: space-between;
                        align-items: center;
                        flex-wrap: wrap;">
                                <div class="w-50">
                                    <input type="text" name="living_arrangement_first" id=""
                                        style="width: 90%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">First</label>
                                </div>
                                <div class="w-50">
                                    <input type="text" name="living_arrangement_last" id=""
                                        style="width: 90%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label  for="">Last</label>
                                </div>
                                <div class="w-50">
                                    <input type="text" name="living_arrangement_primary" id=""
                                        style="width: 90%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Primary Phone</label>
                                </div>
                                <div class="w-50">
                                    <input type="text" name="living_arrangement_email" id=""
                                        style="width: 90%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Email</label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="footer-living-arrangements">
                        <div class="footer-left">
                            <p class="footer-left-dis">SLC SUPPLEMENTAL
                                NEEDS TRUST</p>
                        </div>
                        <div class="footer-mid">
                            <p class="footer-mid-dis">4</p>
                        </div>
                        <div class="footer-right">
                            <p class="footer-right-dis">JOINDER
                                AGREEMENT</p>
                        </div>
                    </div>
                </div>

            </section>



            <!-- Page 5 -->
            <div style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 10px;">
            <section  class="page-5">

                <!-- POWER OF ATTORNEY -->
                 <div class="power-of-attorney">
                    <div class="power-of-attorney-header">
                        <h3 class="healthcare-premium-header-heading">POWER OF ATTORNEY</h3>
                    </div>
                    <div class="power-of-attorney-body">
                        <div class="power-of-attorney-body-1">
                            <div class="power-of-attorney-body-1-header">
                                <div style="display: flex;gap: 30px;flex-wrap:wrap">
                                <h4 style="min-width: fit-content;">Power of Attornery</h4>
                                <p style="font-style:italic">Please attach a copy of Power of Attorney</p>
                            </div>

                            <div class="power-of-attorney-body-1-form">
                                <div class="w-48">
                                    <input type="text" name="power_fname" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">First</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="power_lname" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Last</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="power_tel_home" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Primary Phone</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="power_email" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Email</label>
                                </div>
                                <div class="w-35">
                                    <input type="text" name="power_address" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="35"> <br>
                                    <label for="">Address</label>
                                </div>
                                <div class="w-10">
                                    <input type="text" name="power_apt" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="10"> <br>
                                    <label for="">Apt #</label>
                                </div>
                                <div class="w-25">
                                    <input type="text" name="power_city" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="20"> <br>
                                    <label for="">City</label>
                                </div>
                                <div class="w-10">
                                    <input type="text" name="power_state" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="15"> <br>
                                    <label for="">State</label>
                                </div>
                                <div class="w-10">
                                    <input type="text" name="power_zip" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="6"> <br>
                                    <label for="">Zip</label>
                                </div>
                            </div>
                        </div>
                            <div style="display: flex;
                            flex-direction: column;
                            gap: 6px;">
                                <div style="display: flex;
                                align-items: center;
                                gap: 8px;flex-wrap:wrap">
                                        <div>
                                            <p>Is this person the sole POA?</p>
                                        </div>
                                        <div style="display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    gap: 10px;">
                                            <div>
                                                <input type="radio"
                                                value="Yes"
                                                name="sole_poa1" value="Yes" id="power-of-attorney-yes"
                                                    class="power-of-attorney-yes">
                                                <label style="font-style: normal;font-size:16px" for="power-of-attorney-yes">Yes</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="sole_poa1" value="No" id="power-of-attorney-no">
                                                <label style="font-style: normal;font-size:16px" for="power-of-attorney-no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: flex;
                                    align-items: center;
                                    gap: 8px; flex-wrap:wrap">
                                            <div>
                                                <p>If No, are the agents authorized to act separately?</p>
                                            </div>
                                            <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        gap: 10px;">
                                                <div>
                                                    <input type="radio"
                                                     name="act_seprately1" value="Yes" id="power-of-attorney-authorized-yes"
                                                        class="power-of-attorney-authorized-yes">
                                                    <label style="font-style: normal;font-size:16px" for="power-of-attorney-authorized-yes">Yes</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="act_seprately1" value="No" id="power-of-attorney-authorized-no">
                                                    <label style="font-style: normal;font-size:16px" for="power-of-attorney-authorized-no">No</label>
                                                </div>
                                            </div>
                                        </div>

                            </div>
                        </div>
                        <div class="power-of-attorney-body-1">
                            <div class="power-of-attorney-body-1-header">
                                <div style="display: flex;gap: 30px;flex-wrap:wrap">
                                <h4>Power of Attornery - Second Agent</h4>
                                <p style="font-style:italic">Please attach a copy of Power of Attorney</p>
                            </div>

                            <div class="power-of-attorney-body-1-form">
                                <div class="w-48">
                                    <input type="text" name="power_fname2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">First</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="power_lname2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Last</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="power_tel_home2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Primary Phone</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="power_email2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Email</label>
                                </div>
                                <div class="w-35">
                                    <input type="text" name="power_address2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="35"> <br>
                                    <label for="">Address</label>
                                </div>
                                <div class="w-10">
                                    <input type="text" name="power_apt2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="10"> <br>
                                    <label for="">Apt #</label>
                                </div>
                                <div class="w-25">
                                    <input type="text" name="power_city2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="20"> <br>
                                    <label for="">City</label>
                                </div>
                                <div class="w-10">
                                    <input type="text" name="power_state2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="15"> <br>
                                    <label for="">State</label>
                                </div>
                                <div class="w-10">
                                    <input type="text" name="power_zip2" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;" maxlength="6"> <br>
                                    <label for="">Zip</label>
                                </div>
                            </div>
                        </div>
                            <div style="display: flex;
                            flex-direction: column;
                            gap: 6px;">
                                <div style="display: flex;
                                align-items: center;
                                gap: 8px; flex-wrap:wrap">
                                        <div>
                                            <p>Is this person the sole POA?</p>
                                        </div>
                                        <div style="display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    gap: 10px;">
                                            <div>
                                                <input
                                                value="Yes"
                                                type="radio" name="power_of_attorney2_yes" id="power-of-attorney2-yes"
                                                    class="power-of-attorney2-yes">
                                                <label style="font-style: normal;font-size:16px" for="power-of-attorney2-yes">Yes</label>
                                            </div>
                                            <div>
                                                <input
                                                value="No"
                                                 type="radio" name="power_of_attorney2_yes" id="power-of-attorney2-no">
                                                <label style="font-style: normal;font-size:16px" for="power-of-attorney2-no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: flex;
                                    align-items: center;
                                    gap: 8px; flex-wrap:wrap">
                                            <div>
                                                <p>If No, are the agents authorized to act separately?</p>
                                            </div>
                                            <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        gap: 10px;">
                                                <div>
                                                    <input
                                                    value="Yes"
                                                     type="radio" name="power_of_attorney2_authorized_yes" id="power-of-attorney2-authorized-yes"
                                                        class="power-of-attorney2-authorized-yes">
                                                    <label style="font-style: normal;font-size:16px" for="power-of-attorney2-authorized-yes">Yes</label>
                                                </div>
                                                <div>
                                                    <input
                                                    value="No"
                                                     type="radio" name="power_of_attorney2_authorized_yes" id="power-of-attorney-authorized2-no">
                                                    <label style="font-style: normal;font-size:16px" for="power-of-attorney-authorized2-no">No</label>
                                                </div>
                                            </div>
                                        </div>

                            </div>
                        </div>
                    </div>
                 </div>

                 <!-- GUARDIAN INFORMATION -->

                 <div class="guardian-information">
                    <div class="guardian-information-header">
                        <h3 class="healthcare-premium-header-heading">GUARDIAN INFORMATION</h3>
                    </div>
                    <div class="guardian-information-body">
                        <div>
                            <p style="font-style: italic">Please attach a copy of Decree or Letter of guardianship.</p>
                        </div>
                        <div>
                            <div style="display: flex;
                                    align-items: center;
                                    gap: 8px; flex-wrap:wrap">
                                            <div>
                                                <p>Does the Beneficiary have a court appointed Guardian?</p>
                                            </div>
                                            <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        gap: 10px;">
                                                <div>
                                                    <input
                                                    value="Yes"
                                                     type="radio" name="guardian_information_yes" id="guardian-information-yes"
                                                        class="guardian-information-yes">
                                                    <label style="font-style: normal;font-size:16px" for="guardian-information-yes">Yes</label>
                                                </div>
                                                <div>
                                                    <input
                                                    value="No"
                                                     type="radio" name="guardian_information_yes" id="guardian-information-no">
                                                    <label style="font-style: normal;font-size:16px" for="guardian-information-no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                <div>
                                    <p>If you answered yes, continue to fill out below:</p>
                                </div>
                        </div>
                        <div>
                            <div style="display: flex;
                                    align-items: center;
                                    gap: 8px; flex-wrap:wrap">
                                            <div>
                                                <p>Guardian of the:</p>
                                            </div>
                                            <div style="display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        gap: 10px;">
                                                <div style="display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                gap: 3px;">
                                                    <input
                                                    value="Person"
                                                     type="radio" name="guardian_appointed_for1" value="Person" id="guardian-information-person"
                                                        class="guardian-information-person">
                                                    <label style="font-style: normal;font-size:16px" for="guardian-information-person">Person</label>
                                                </div>
                                                <div style="display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                gap: 3px;">
                                                    <input
                                                    value="Property"
                                                     type="radio" name="guardian_appointed_for1" value="Property" id="guardian-information-property">
                                                    <label style="font-style: normal;font-size:16px" for="guardian-information-property">Property</label>
                                                </div>
                                                <div style="display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                gap: 3px;">
                                                    <input
                                                    value="Both"
                                                     type="radio" name="guardian_appointed_for1" value="Both" id="guardian-information-both">
                                                    <label style="font-style: normal;font-size:16px" for="guardian-information-both">Both</label>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                        <div style="display: flex;
                        flex-direction: column;
                        gap: 15px;">
                            <div>
                                <p>Court Appointed Guardian Information</p>
                            </div>
                            <div style="display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                            align-items: center;">
                                <div class="w-48">
                                    <input type="text" name="guardianship_fname" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">First</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="guardianship_lname" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Last</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="guardianship_telephone" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Primary Phone</label>
                                </div>
                                <div class="w-48">
                                    <input type="text" name="guardianship_email" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>

                 <!-- BENEFICIARY SERVICE -->

                 <div class="beneficiary-service">
                    <div class="beneficiary-service-header">
                        <h3 class="healthcare-premium-header-heading">BENEFICIARY SERVICE</h3>
                    </div>
                    <div class="beneficiary-service-body">
                        <div>
                            <p class="list-para">List other services that the Beneficiary receives (include day services, service coordination,
                                employment programs, etc.):</p>
                        </div>
                        <div class="service-container">
                            <div class="w-50">
                                <div style=" display: flex; gap: 5px;">
                                    <p>Service</p>
                                    <div style="display: flex;
                                    flex-direction: column;
                                    gap: 10px;
                                    width: 100%;">
                                    <input type="text" name="beneficiary_service_one" id=""
                                    style="width: 90%; border: none; border-bottom: 1px solid black;" maxlength="35">
                                    <input type="text" name="beneficiary_service_two" id=""
                                    style="width: 90%; border: none; border-bottom: 1px solid black;" maxlength="35">
                                    <input type="text" name="beneficiary_service_three" id=""
                                    style="width: 90%; border: none; border-bottom: 1px solid black;" maxlength="35">
                                </div>


                                </div>
                            </div>
                            <div class="w-50">
                                <div style="width: 100%; display: flex; gap: 5px;">
                                    <p style="min-width: fit-content;">Name of Provider</p>
                                    <div style="display: flex;
                                    flex-direction: column;
                                    gap: 10px;
                                    width: 90%;">
                                    <input type="text" name="beneficiary_provider_one" id=""
                                    style="width: 90%; border: none; border-bottom: 1px solid black;" maxlength="35">
                                    <input type="text" name="beneficiary_provider_two" id=""
                                    style="width: 90%; border: none; border-bottom: 1px solid black;" maxlength="35">
                                    <input type="text" name="beneficiary_provider_three" id=""
                                    style="width: 90%; border: none; border-bottom: 1px solid black;" maxlength="35">
                                </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="footer-living-arrangements">
                            <div class="footer-left">
                                <p class="footer-left-dis">SLC SUPPLEMENTAL
                                    NEEDS TRUST</p>
                            </div>
                            <div class="footer-mid">
                                <p class="footer-mid-dis">5</p>
                            </div>
                            <div class="footer-right">
                                <p class="footer-right-dis">JOINDER
                                    AGREEMENT</p>
                            </div>
                        </div>
                    </div>
                 </div>

            </section>
        </div>




            <!-- Page 6 -->
            <div style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 25px;">
            <section  class="page-6">
                <!-- INFORMATION AND DISCLOSURES: -->
                <div class="information-disclosures">
                    <div class="information-disclosures-header">
                        <h3 class="healthcare-premium-header-heading">INFORMATION AND DISCLOSURES:</h3>
                    </div>
                    <div class="information-disclosures-body">
                        <div class="information-disclosures-body-left">
                            <div>
                                <h3 style="font-size: 16px;">Death of Beneficiary:</h3>
                                <div style="display: flex;
                                flex-direction: column;
                                gap: 10px;">
                                <p style="line-height: 1.4;text-align:justify">The Beneficiary’s sub-trust account terminates
                                    upon his or her death. If, upon the death of the
                                    Beneficiary, funds remain in his or her sub-trust
                                    account, such funds shall be deemed to be property
                                    of the Trust and all funds that are remaining in the
                                    Beneficiary’s separate sub-trust account shall
                                    be retained by SLC Supplemental Needs Trust to
                                    further the purposes of that Trust. However, to the
                                    extent that amounts remaining in the individual’s
                                    subtrust account upon the death of the individual
                                    are not in fact retained by the Trust, the Trust shall
                                    pay to the State(s) from such remaining amounts in
                                    the sub-trust account an amount equal to the total
                                    amount of medical assistance paid on behalf of the
                                    individual under the State Medicaid plan (s). To the
                                    extent that the trust does not retain the funds in the
                                    account, the State(s) shall be the first payee(s) of
                                    any such funds and the State(s) shall have priority
                                    over payment of other debts and administrative
                                    expenses except as listed in POMS SI 01120.203E.</p>
                                <p style="line-height:1.4;text-align:justify">Funeral expenses will only be paid pursuant to a
                                    Medicaid eligible pre-need funeral arrangement
                                    established and funded prior to the Beneficiary’s
                                    death. Funeral expenses will not be paid after the
                                    Beneficiary’s death.</p>
                                </div>
                            </div>
                            <div>
                                <h3 style="font-size: 16px;">Contributions/Deposits:</h3>
                                <div style="display: flex;
                                flex-direction: column;
                                gap: 10px;line-height:1.4">
                                <p style="text-align:justify">All contributions made to the sub-trust account
                                    will be held and administered pursuant to the
                                    provisions of the SLC Supplemental Needs Trust
                                    which are incorporated by reference herein.
                                    The Trustees shall have the sole and absolute right
                                    to accept or refuse additional deposits to the subtrust account.</p>
                                <p style="text-align:justify">In the event that a Beneficiary has a zero ($0)
                                    sub-trust account balance for sixty (60) or more
                                    consecutive days, the Trustee shall retain the right
                                    to close the Beneficiary’s sub-trust account. Please
                                    be advised that the Trustee may continue to charge
                                    administrative fees for the management of the
                                    sub-trust account prior to its closure. In the event
                                    that a Beneficiary wishes to re-open a sub-trust
                                    account, the Beneficiary may be required to pay any
                                    outstanding administrative fees stemming from the
                                    prior sub-trust account. Additionally, the Beneficiary
                                    shall be required to pay a new enrollment fee when re-opening a sub-trust account.
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="information-disclosures-body-right">
                            <div>
                                <h3 style="font-size: 16px;">Disbursements:</h3>
                                <div style="display: flex;
                                flex-direction: column;
                                gap: 10px;line-height:1.4">
                                <p style="text-align:justify">All disbursement requests shall be reviewed and
                                    approved on an individual basis.
                                    Disbursements for expenses incurred more than 90
                                    days prior to submission of a disbursement request
                                    form shall not be paid.
                                </p>
                                <p style="text-align:justify">The Trustees, in their discretion, have determined
                                    that disbursements for the following items shall not
                                    be paid: purchases of firearms, alcohol, tobacco,
                                    items relating to illegal activity, bail, or restitution.
                                </p>
                                <p style="text-align:justify">
                                    All disbursements shall be made at the sole and
                                    absolute discretion of the Trustee. No disbursements
                                    will be made after the death of the beneficiary, even
                                    for expenses incurred or due prior to death.
                                </p>
                            </div>

                            </div>
                            <div>
                                <h3 style="font-size: 16px;">Disability Determination:</h3>
                                <div  style="display: flex;
                                flex-direction: column;
                                gap: 10px;line-height:1.4">
                                <p style="text-align:justify">In the event that a determination of disability is
                                    required for Medicaid purposes, please be advised
                                    that administrative fees shall be incurred while the
                                    determination of disability is being made.</p>
                                <p style="text-align:justify">The Donor acknowledges that contributions to
                                    the SLC Supplemental Needs Trust are not tax
                                    deductible as charitable gifts, or otherwise.</p>
                                <p style="text-align:justify">Sub-trust account income may be taxable to the
                                    Beneficiary.
                                </p>
                            </div>
                            </div>
                            <div>
                                <h3 style="font-size: 16px;">Disclosure of Potential Conflict of Interest:</h3>
                                <div style="display: flex;
                                flex-direction: column;
                                gap: 10px;line-height:1.4">
                                <p style="text-align:justify">There may be a potential conflict of interest in the
                                    administration of the Trust since the Trust retains
                                    those funds remaining in the sub-trust account at
                                    the time of death of the Beneficiary. Funds remaining
                                    in the Trust may be used to pay for ancillary and/
                                    or supplemental services for Beneficiaries and
                                    potential Beneficiaries for which services may be
                                    rendered by SLC Supplemental Needs Trust.</p>
                                <p style="text-align:justify">The Donor executing this Joinder Agreement is
                                    aware of the potential conflicts of interest that exist
                                    in the Trustee’s</p>
                                <p style="text-align:justify">administration of the Trust. The Trustee shall not
                                    be liable to Donor or to any party for any act of
                                    self-dealing or conflict of interest resulting from
                                    their a liations with Senior Lifecare Corp or with
                                    any Beneficiary or constituent agencies and/or
                                    Chapters.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-living-arrangements">
                        <div class="footer-left">
                            <p class="footer-left-dis">SLC SUPPLEMENTAL
                                NEEDS TRUST</p>
                        </div>
                        <div class="footer-mid">
                            <p class="footer-mid-dis">6</p>
                        </div>
                        <div class="footer-right">
                            <p class="footer-right-dis">JOINDER
                                AGREEMENT</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

            <!-- Page 7 -->
            <div style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 10px;">
            <section class="page-7">
                <div class="information-disclosures-body">
                    <div class="information-disclosures-body-left">
                        <div>
                            <h3 style="font-size: 16px;">Situs:</h3>
                            <p style="line-height:1.4;text-align:justify">The sub-trust account created by this Agreement
                                has been accepted by the Trustee in the State of
                                New York and will be administered by Senior Lifecare
                                Corp and a financial institution in the State of New
                                York. The validity, construction, and all rights under
                                this Agreement shall be governed by the laws
                                of the State of New York. The situs of this Trust for
                                administrative, account and legal purposes shall
                                be in the County of Kings, the County where the
                                majority of meetings concerning establishment of
                                the Trust occurred.</p>
                        </div>
                        <div>
                            <h3 style="font-size: 16px;">Invalidity of any Provision:</h3>
                            <div style="display: flex;
                    flex-direction: column;
                    gap: 10px;line-height:1.4">
                                <p style="text-align:justify">Should any provision of this Agreement be or
                                    become invalid or unenforceable, the remaining
                                    provisions of this Agreement shall be and continue
                                    to be fully e ective.
                                </p>
                                <p style="text-align:justify">By signing below, you a rm that you understand
                                    and agree to the following:
                                    I have received and read a copy of the applicable
                                    Master Trust prior to the signing of this Joinder
                                    Agreement and acknowledge that I understand
                                    the contents thereof. I also understand that said
                                    document may be amended from time to time.
                                    I have been provided with the applicable fee
                                    schedule and acknowledge that I understand the
                                    contents thereof. I also understand there may be
                                    changes from time to time.</p>
                                <p style="text-align:justify">
                                    I am entering into this Joinder Agreement voluntarily
                                    and acting on my own free accord.
                                </p>
                                <p style="text-align:justify">
                                    The Donor acknowledges that the Beneficiary is
                                    disabled as defined in Social Security Law Section
                                    1614(a)(3) [42 USC 1382c(a) (3)].
                                </p>
                                <p style="text-align:justify">
                                    Under penalty of perjury, all statements made in this
                                    document are true and accurate to the best of my
                                    knowledge.
                                </p>
                                <p style="text-align:justify">The SLC Supplemental Needs Trust is authorized to
                                    be used by individuals with disabilities pursuant to
                                    federal and state law. By agreeing to accept a donor’s
                                    property pursuant to this Joinder Agreement, SLC
                                    Supplemental Needs Trust agrees only to manage
                                    the trust funds in accordance with the terms of the
                                    Master Trust Agreement and in compliance with
                                    applicable federal and state law and regulation.
                                    It is the sole responsibility of the donor and/or the
                                    donor’s representative to determine whether the </p>
                            </div>

                        </div>
                    </div>
                    <div class="information-disclosures-body-right">
                        <div style="display: flex;
                flex-direction: column;
                gap: 10px;line-height:1.4">
                            <p style="text-align:justify">donor is “disabled” as that term is defined under
                                federal law, to determine whether they have the
                                legal authority to transfer property to fund the
                                trust, and the impact that a transfer of property to
                                the SLC Supplemental Needs Trust will have on the
                                donor’s continuing eligibility for government benefit
                                programs
                            </p>
                            <p style="text-align:justify">Senior Lifecare Corp is not assuming any
                                responsibility as counsel for the donor or Beneficiary,
                                or providing any legal advice as it relates to the
                                consequences of a transfer of property to the SLC
                                Supplemental Needs Trust.
                            </p>
                            <p style="text-align:justify">The Trustees in their discretion may require an
                                intermediary to assist in the administration of the
                                Beneficiary’s sub-trust account. The cost of which
                                may be charged to the sub-trust account.
                            </p>
                            <p style="text-align:justify">The party authorized to speak with us on your behalf
                                or the intermediary must notify SLC Supplemental
                                Needs Trust. immediately upon your death and
                                will be required to provide us with a certified death
                                certificate. An individual requesting and/or receiving
                                disbursements in contravention of the Master Trust
                                Agreement and the Joinder Agreement will be
                                required to repay the amount disbursed.
                            </p>
                            <p style="text-align:justify">This Joinder Agreement and the participation of the
                                Beneficiary in the SLC Supplemental Needs Trust is an
                                important legal decision that may have significant
                                and lasting consequences for the Beneficiary and as
                                a result you may want to consider obtaining advice
                                from an attorney or another professional adviser
                                before entering into this Agreement. By signing this
                                Agreement you are acknowledging that you have
                                had a full and complete opportunity to confer with
                                an attorney or other adviser and that no employee
                                of Senior Lifecare Corp has provided you (or the
                                Beneficiary, if di erent from the person signing this
                                Agreement) with any legal advice in connection
                                with this Joinder Agreement, the participation by
                                the Beneficiary in the SLC supplemental Needs
                                Trust or the suitability of such participation by the
                                Beneficiary in the SLC Supplemental Needs Trust
                                based upon the particular circumstances of the
                                Beneficiary.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="footer-living-arrangements">
                    <div class="footer-left">
                        <p class="footer-left-dis">SLC SUPPLEMENTAL
                            NEEDS TRUST</p>
                    </div>
                    <div class="footer-mid">
                        <p class="footer-mid-dis">7</p>
                    </div>
                    <div class="footer-right">
                        <p class="footer-right-dis">JOINDER
                            AGREEMENT</p>
                    </div>
                </div>
            </section>
            </div>


            <!-- Page 8 -->

            <section style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 50px;" class="page-8">

                <!-- AGREEMENT SIGNATURE -->
                 <div class="agreement-signature">
                    <div class="agreement-signature-header">
                        <h3 class="healthcare-premium-header-heading">AGREEMENT SIGNATURE</h3>
                    </div>
                    <div class="agreement-signature-body">
                        <div style="display: flex;
                    align-items: center;
                    gap: 8px; flex-wrap:wrap">
                            <div>
                                <p>Who is signing this Joinder Agreement? </p>
                            </div>
                            <div class="agr-signature">
                                <div>
                                    <input type="radio"
                                    value="Beneficiary"
                                     name="agreement_signature_beneficiary"
                                        id="agreement-signature-beneficiary" class="agreement-signature-beneficiary">
                                    <label style="font-style: normal;font-size:16px" for="agreement-signature-beneficiary">Beneficiary</label>
                                </div>
                                <div>
                                    <input type="radio"
                                    value="Power of Attorney"
                                     name="agreement_signature_beneficiary"
                                        id="agreement-signature-attorney">
                                    <label style="font-style: normal;font-size:16px"  for="agreement-signature-attorney">Power of Attorney</label>
                                </div>
                                <div>
                                    <input type="radio"
                                    value="Guardian"
                                     name="agreement_signature_beneficiary"
                                        id="agreement-signature-guardian">
                                    <label style="font-style: normal;font-size:16px"  for="agreement-signature-guardian">Guardian</label>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex;
                    flex-direction: column;
                    gap: 25px;">
                            <div>
                                <p>I certify that the above Information is accurate and completed to the best of my knowledge.</p>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                                <div class="w-30">
                                    <input type="text" name="joinder_signature_1" id="signature_input_1" style="width: 100%; border: none; border-bottom: 1px solid black;" oninput="generateSignature(1)" maxlength="18"> <br>
                                    <label for="">Sign Here</label>

                                </div>
                                <div class="w-30">
                                    <input type="text" name="joinder_print" id=""
                                        style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                    <label for="">Print</label>
                                </div>
                                <div class="w-30">
                                        <input type="date" class="inp-last" style="" name="joinder_date" max="9999-12-31">
                                        <br>
                                    <label for="">Date</label>
                                </div>
                                <div class="w-25">
                                    <canvas id="signature-canvas-1" style="width: 100%; height: 100px; background-color:#f2f2f2"></canvas>
                                <button style="width:50px;margin-top:6px" type="button" id="clear-1" onclick="clearCanvas(1)">Clear</button>
                                </div>


                            </div>
                            {{-- <button style="width:50px" type="button" id="clear-1" onclick="clearCanvas(1)">Clear</button> --}}
                            <input type="hidden" id="joinder_signature_1" name="joinder_signature_1">
                        </div>
                    </div>
                 </div>


                 <!-- SIGNATURE OF NOTARY  -->
                  <div class="signature-of-notary">
                    <div class="signature-of-notary-header">
                        <h3 class="healthcare-premium-header-heading">SIGNATURE OF NOTARY</h3>
                    </div>
                    <div class="signature-of-notary-body">
                        <div style="display: flex; gap: 3px;">
                            <p>STATE OF</p>
                            <input type="text" name="notary_state_of_ny" id="" style="border: none; border-bottom: 1px solid black;" maxlength="22">
                        </div>
                        <div style="display: flex; gap: 3px;">
                            <p>COUNTY OF</p>
                            <input type="text" name="notary_county_of" id="" style="border: none; border-bottom: 1px solid black;" maxlength="25">
                        </div>
                        <div class="sig-para">
                            <div style="display: flex;gap:5px">
                            <p>On</p>
                            <input type="date" max="9999-12-31" name="notary_on_date" id="" style="border: none; border-bottom: 1px solid black;">
                        </div>
                            <div style="display: flex;gap:5px">
                                <p> , 20</p>
                            <input type="text" name="notary_year" id="" style="border: none; border-bottom: 1px solid black;" maxlength="6">
                            <p> before me, the</p>
                            </div>
                        </div>
                        <div>
                            <p style="font-size: 16px;">undersigned, a Notary Public in and for said State,</p>
                        </div>
                        <div>
                            <p style="font-size: 16px;">personally appeared,</p>
                        </div>
                        <div style="width: 30%;">
                            <input type="text" name="notary_appeared" id="" style="border: none; border-bottom: 1px solid black; width: 97%;" maxlength="35">
                            <span>,</span>
                        </div>
                        <div>
                            <p class="w-40">personally known to me or proved to me on the basis of
                                satisfactory evidence to be the individual whose name is
                                subscribed to the within instrument and acknowledge to
                                me that he/she/they executed the same in his/her
                                capacity, and that by his/her signature on the instrument,
                                the individual or the person upon behalf of which the
                                <div style="display: flex; justify-content: space-between; flex-wrap:wrap">
                                    <div class="w-50">
                                        <p>individual acted, executed this instrument.</p>
                                    </div>
                                        <div style="width: 40%;">
                                            <input type="text" name="notary_public" id=""
                                                style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="45"> <br>
                                            <p style="font-size: 13px; margin-top: 5px;">NOTARY PUBLIC</p>
                                        </div>
                                </div>
                            </p>
                        </div>
                    </div>
                  </div>

                  <!-- OR SIGNATURE OF TWO WITNESSES -->

                  <div class="signature-of-two-witnesses">
                    <div class="signature-of-two-witnesses-header">
                        <h3 class="healthcare-premium-header-heading">OR SIGNATURE OF TWO WITNESSES</h3>
                    </div>
                    <div class="signature-of-two-witnesses-body">
                        <div>
                            <p>(New York Residents Only)</p>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 15px;">
                            <p>Or in lieu of Notarization, the following two witness signatures are provided:</p>
                            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap:wrap">
                                <div class="witness-1">
                                <div class="w-80">
                                    <input type="text" name="notary_witness_one_name" id=""
                                        style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                    <label for="">Witness 1</label>
                                </div>
                                <div class="w-80">
                                    <input type="date"  max="9999-12-31" name="sig_date1" id=""
                                        style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                    <label for="">Date</label>
                                </div>
                                <div class="w-80">
                                    <input type="text" name="joinder_signature_2" id="signature_input_2" oninput="generateSignature(2)" maxlength="18"
                                        style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                    <label for="">Sign Here</label>
                                </div>
                                <div class="w-50">
                                    <canvas id="signature-canvas-2" style="width: 100%; height: 100px;background-color:#f2f2f2"></canvas>
                                     <button style="width:50px;margin-top:5px" type="button" id="clear-2" onclick="clearCanvas(2)">Clear</button>
                                     <input type="hidden" id="joinder_signature_2" name="joinder_signature_2">
                                </div>
                                <div class="w-80">
                                    <input type="text" name="notary_witness_one_full_name" id=""
                                        style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                    <label for="">Print Full Name</label>
                                </div>
                                <div class="w-80">
                                    <input type="text" name="notary_witness_one_full_address" id=""
                                        style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="50"> <br>
                                    <label for="">Full Address</label>
                                </div>

                                </div>
                                <div class="witness-2">
                                    <div style="width: 100%;">
                                        <input type="text" name="notary_witness_two_name" id=""
                                            style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                        <label for="">Witness 2</label>
                                    </div>
                                    <div style="width: 100%;">
                                        <input type="date" max="9999-12-31" name="sig_date2" id=""
                                            style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                        <label for="">Date</label>
                                    </div>
                                    <div style="width: 100%;">
                                        <input type="text" name="joinder_signature_3" id="signature_input_3" oninput="generateSignature(3)" maxlength="18"
                                            style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                        <label for="">Sign Here</label>
                                    </div>
                                    <div class="w-50">
                                    <canvas id="signature-canvas-3" style="width: 100%; height: 100px;background-color:#f2f2f2"></canvas>
                                    <button style="width:50px;margin-top:5px" type="button" id="clear-2" onclick="clearCanvas(3)">Clear</button>
                                    <input type="hidden" id="joinder_signature_3" name="joinder_signature_3">
                                </div>
                                    <div style="width: 100%;">
                                        <input type="text" name="notary_witness_two_full_name" id=""
                                            style="border: none; border-bottom: 1px solid black; width: 100%;"> <br>
                                        <label for="">Print Full Name</label>
                                    </div>
                                    <div style="width: 100%;">
                                        <input type="text" name="notary_witness_two_full_address" id=""
                                            style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="50"> <br>
                                        <label for="">Full Address</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

                  <!-- FOR OFFICE USE ONLY -->

                  <div style="margin-top: 70px">
                    <div class="for-office-use-only-header">
                        <h3 style="text-align: center;">FOR OFFICE USE ONLY</h3>
                    </div>
                    <div class="for-office-use-only-body">
                        <div style="font-size: 20px; text-align: center;">
                            <p>Accepted by Trustee or Designated Representative of the Trustees, SLC Supplemental Needs Trust.</p>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
                            <div class="w-40">
                                <input type="text" name="joinder_signature_4" id="signature_input_4" oninput="generateSignature(4)" maxlength="18"
                                    style="width: 100%; border: none; border-bottom: 1px solid black;"> <br>
                                <label for="">Sign Here</label>
                            </div>
                            <div class="w-40">
                                <input type="date" max="9999-12-31" class="inp-last"  name="office_use_date_approved" max="9999-12-31">
                                    <br>
                                <label for="">Date</label>
                            </div>
                            <div class="w-25">
                                <canvas id="signature-canvas-4" style="width: 100%; height: 100px;background-color:#f2f2f2"></canvas>
                                <button type="button" style="width:50px;margin-top:6px" id="clear-4" onclick="clearCanvas(4)">Clear</button>
                            </div>

                        </div>

                        <input type="hidden" id="joinder_signature_4" name="joinder_signature_4">
                    </div>
                  </div>
                  <div class="for-office-use-only-footer">
                    <div class="footer-left">
                        <p class="footer-left-dis">SLC SUPPLEMENTAL
                            NEEDS TRUST</p>
                    </div>
                    <div class="footer-mid">
                        <p class="footer-mid-dis">8</p>
                    </div>
                    <div class="footer-right">
                        <p class="footer-right-dis">JOINDER
                            AGREEMENT</p>
                    </div>
                </div>

            </section>

            <!-- Page 9 -->

            <section class="page-9">
                <!-- FOR OFFICE USE ONLY 2 -->
                 <div class="for-office-use-only-2">
                    <div class="for-office-use-only-2-container">
                        <div class="for-office-use-only-2-header">
                            <h5>FOR OFFICE USE ONLY</h5>
                        </div>
                        <div class="for-office-use-only-2-body">
                            <div class="for-office-use-only-2-body-style">
                                <label  style="font-size: 0.9rem;  min-width: fit-content; font-style:normal " for="">Member ID#:</label>
                                <input type="text" name="office_use_member_id_above" id="" style="border: none; border-bottom: 1px solid black; background-color: hsl(185.45deg 40.74% 94.71%); width: 70%;" maxlength="15">
                            </div>
                            <div class="for-office-use-only-2-body-style">
                                <label style="font-size: 0.9rem;  min-width: fit-content; font-style:normal" for="">Effective Date:</label>
                                <input type="date" max="9999-12-31" name="office_use_effective_date" id="" style="border: none; border-bottom: 1px solid black; background-color: hsl(185.45deg 40.74% 94.71%); width: 70%;">
                            </div>
                        </div>
                </div>
                 </div>

                 <!-- DIRECT DEBIT REQUEST FORM -->
                  <div class="direct-debit-req-form">
                     <div class="direct-debit-req-form-header">
                        <h3 class="healthcare-premium-header-heading">DIRECT DEBIT REQUEST FORM</h3>
                     </div>
                     <div class="direct-debit-req-form-body">
                        <div style="display: flex; justify-content: center; align-items: center;gap:5px">
                            <label style="font-style: normal" for="">Donor/Beneficiary</label>
                            <div style="flex: 1;">
                                <input type="text" name="direct_debit_donor_beneficiary" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="80">
                            </div>
                        </div>

                    <div style="display: flex; justify-content: center; align-items: center;gap:5px">
                        <label style="font-style: normal" for="">Representative</label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_representative" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="80">
                        </div>
                    </div>
                    <div class="direct-debit-bank">
                    <div style="display: flex; justify-content: center; align-items: center; gap:5px" class="w-50">
                        <label style="font-style: normal" for="">Bank Name</label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_bank_name" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="25">
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;gap:5px" class="w-25">
                        <label style="font-style: normal" for="">City</label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_city" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="20">
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;gap:5px" class="w-25">
                        <label style="font-style: normal" for="">State</label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_state" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="25">
                        </div>
                    </div>
                </div>
                <div class="direct-debit-bank">
                    <div style="display: flex; justify-content: center; align-items: center;gap:5px" class="w-48">
                        <label style="font-style: normal" for="">Bank Routing Number </label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_bank_routing" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="20">
                        </div>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center;gap:5px" class="w-48">
                        <label style="font-style: normal" for="">Account Number</label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_account_number" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="20">
                        </div>
                    </div>
                </div>
                <div class="acc-name-style">
                    <div style="display: flex; justify-content: center; align-items: center;gap:5px" class="w-70">
                        <label style="font-style: normal" for="">Account Name</label>
                        <div style="flex: 1;">
                            <input type="text" name="direct_debit_account_name" id="" style="border: none; border-bottom: 1px solid black; width: 100%;" maxlength="40">
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;flex-wrap:wrap">
                        <div>
                            <p>Account Type: </p>
                        </div>
                        <div style="display: flex;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;">
                            <div>
                                <input type="radio" name="direct_debit_bank_type1" value="Checking"
                                    id="direct-debit-req-form-checking" class="direct-debit-req-form-checking">
                                <label style="font-style: normal;font-size:16px" for="direct-debit-req-form-checking">Checking</label>
                            </div>
                            <div>
                                <input type="radio"name="direct_debit_bank_type1" value="Savings"
                                    id="direct-debit-req-form-savings">
                                <label style="font-style: normal;font-size:16px" for="direct-debit-req-form-savings">Savings</label>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
                <div style="display: flex; flex-direction: column; justify-content: center; gap: 20px;">
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <h4>PLEASE SUBMIT A VOID CHECK ALONG WITH YOUR FORM.</h4>
                        <p>I authorize and request SLC Supplemental Needs Trust, dated December 24, 2017 to initiate debit entries
                            to my account at the depository financial institution indicated above. This authorization is to remain in full
                            force and affect until SLC Supplemental Needs Trust has written notification from me of its termination in
                            such time and manner as to afford SLC Supplemental Needs Trust and depository financial institution a
                            reasonable opportunity to act on it. </p>
                    </div>
                    <div>
                        <div class="bene-sig">
                            <label style="font-style: normal;min-width:fit-content" for="">Beneficiary/ Representative Sign Here</label>
                            {{-- <div style="flex: 1;"> --}}
                                <input type="text" id='signature_input_5' oninput="generateSignature(5)" maxlength="18" name="joinder_signature_5" id="" style="border: none; border-bottom: 1px solid black; width: 100%;flex:1">
                            {{-- </div> --}}

                        </div>
                        <div class="can-style">
                                 <canvas id="signature-canvas-5" style="width: 100%; height: 100px;background-color:#f2f2f2"></canvas>
                        </div>
                        <button type="button" style="width:50px;margin-top:8px" id="clear-4" onclick="clearCanvas(5)">Clear</buttonty>
                        <input type="hidden" id="joinder_signature_5" name="joinder_signature_5">
                    </div>

                </div>
                  </div>

                  <!-- FOR OFFICE USE 3 -->

                  <div class="for-office-use-3">
                    <div class="for-office-use-only-header">
                        <h3 style="text-align: center;">FOR OFFICE USE:</h3>
                    </div>
                    <div class="for-office-use-3-body">
                                <div style="display: flex; align-items: center;gap:5px;flex-wrap:wrap" class="w-50">
                                    <p>Account #:</p>
                                    <input class="mad1" type="text" name="office_use_account_number" id="healthcare-pre" style="border: none; border-bottom: 1px solid black;" class="f-75" maxlength="25">
                                </div>
                                <div style="display: flex; align-items: center;gap:5px;flex-wrap:wrap" class="w-50">
                                    <p>Member #:</p>
                                    <input class="mad1" type="text" name="office_use_member_id_below" id="healthcare-pre" style="border: none; border-bottom: 1px solid black;" class="f-75" maxlength="15">
                                </div>
                                <div style="display: flex;align-items: center; margin-top: 20px;gap:5px;flex-wrap:wrap " class="w-50 pro-bt">
                                    <p>Processed By:</p>
                                    <input class="mad1"  type="text" name="office_use_processed_by" id="healthcare-pre" style="border: none; border-bottom: 1px solid black; flex: 1;" maxlength="30">
                                </div>
                                <div  class="w-50 mda" style="gap:5px;margin-top: 20px">
                                    <p>Monthly Debit Amount: $</p>
                                    <input type="text" name="office_use_monthly_debit_amount" id="healthcare-pre" style="border: none; border-bottom: 1px solid black;" class="f-75" maxlength="15">
                                </div>
                                <div style="margin-top: 20px;">
                                    <p>Monthly dates for direct debit are as follows: 1, 3, 7, 14, 21, 28 (debit will occur on or around the date selected)</p>
                                </div>
                                <div style="display: flex; margin-top: 20px;gap:5px;flex-wrap:wrap" class="w-50">
                                    <p>Date of Monthly Debit:</p>
                                    <select name="office_use_monthly_debit_date" id="healthcare-pre" style="border: none; border-bottom: 1px solid black;" class="mad1 f-75">
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                        <option value="7">7</option>
                                        <option value="14">14</option>
                                        <option value="21">21</option>
                                        <option value="28">28</option>
                                    </select>

                                </div>
                                <div class="w-50 db-month" style="margin-top: 20px">
                                    <p>First Debit Month:</p>
                                    <input class="mad1" type="text" name="office_use_monthly_debit_first_month" id="healthcare-pre" style="border: none; border-bottom: 1px solid black;" class="f-75" maxlength="15">
                                </div>
                    </div>
                    <div style="width: 80%; margin: auto;">
                        <p style="font-style: italic">If any direct debits are returned for insufficient funds, a $53 charge will apply <br>
                            A $150 annual - renewal fee will be charged on the anniversary of the account
                        </p>
                    </div>
                    <button type="submit" id="submit-button" class="submit-button">
                        Submit
                        <span class="loader" style="display: none;"></span>
                    </button>
                    <div style="display: flex; justify-content: center; align-items: center;">
                        <img src="{{asset('assets/images/new_logo.png')}}" alt="logo" style="width: 40%; object-fit: cover;">
                    </div>
                    <div class="footer-for-office-use-3">
                        <div class="footer-left">
                            <p class="footer-left-dis">SLC SUPPLEMENTAL
                                NEEDS TRUST</p>
                        </div>
                        <div class="footer-mid">
                            <p class="footer-mid-dis">9</p>
                        </div>
                        <div class="footer-right">
                            <p class="footer-right-dis">JOINDER
                                AGREEMENT</p>
                        </div>
                    </div>

                  </div>
            </section>



    </main>

</form>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/inputmask.min.js"></script>


<script type="text/javascript">

generateSignature(1)
generateSignature(2)
generateSignature(3)
generateSignature(4)




    $(document).ready(function () {

        //save this form using ajax
        $('#joinderForm').submit(function (e) {
            e.preventDefault();

            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage();
            let formdata = new FormData(this);
            //add dd in laravel format
            $.ajax({
                url: '{{ route('save.joinder') }}',
                type: 'POST',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting content type
                success: function (response) {
                    swal.fire({
                        title: 'Success!',
                        text: '1-JoinderAgreement has been saved successfully.',
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
                    });
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

var phoneInput = document.getElementById('ssn');
  var mask = new Inputmask("999-99-9999");
  mask.mask(phoneInput);

var dateInput1 = document.getElementById('maskDate');
  var mask2 = new Inputmask("00/00/0000");
  mask2.mask(dateInput1);



    function generateSignature(id) {
    const name = document.getElementById(`signature_input_${id}`).value;
    const canvas = document.getElementById(`signature-canvas-${id}`);
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = '#f2f2f2';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = '42px "BrittanySignature", BrittanySignature';
    ctx.fillStyle = 'black';
    ctx.fillText(name, 5, 80);
}

function clearCanvas(id) {
    document.getElementById(`signature_input_${id}`).value = '';
    const canvas = document.getElementById(`signature-canvas-${id}`);
    const ctx = canvas.getContext('2d');
    ctx.fillStyle = 'white';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}



function saveCanvasAsImage() {

    for (let i = 1; i <= 5; i++) {
        const canvas = document.getElementById(`signature-canvas-${i}`);
        console.log(canvas);
        const signatureDataURL = canvas.toDataURL('image/png'); // Convert to Base64
        console.log(signatureDataURL);
        document.getElementById(`joinder_signature_${i}`).value = signatureDataURL;
    }
}




document.addEventListener('DOMContentLoaded', () => {
    for (const el of document.querySelectorAll("[placeholder][data-slots]")) {
        const pattern = el.getAttribute("placeholder"),
            slots = new Set(el.dataset.slots || "_"),
            prev = (j => Array.from(pattern, (c,i) => slots.has(c)? j=i+1: j))(0),
            first = [...pattern].findIndex(c => slots.has(c)),
            accept = new RegExp(el.dataset.accept || "\\d", "g"),
            clean = input => {
                input = input.match(accept) || [];
                return Array.from(pattern, c =>
                    input[0] === c || slots.has(c) ? input.shift() || c : c
                );
            },
            format = () => {
                const [i, j] = [el.selectionStart, el.selectionEnd].map(i => {
                    i = clean(el.value.slice(0, i)).findIndex(c => slots.has(c));
                    return i<0? prev.at(-1) : back ? prev[i-1] || first : i;
                });
                el.value = clean(el.value).join("");
                el.setSelectionRange(i, j);
                back = false;
            };
        let back = false;
        el.addEventListener("keydown", (e) => back = e.key === "Backspace");
        el.addEventListener("input", format);
        el.addEventListener("focus", format);
        el.addEventListener("blur", () => el.value === pattern && (el.value=""));
    }
});






</script>





</body>

</html>

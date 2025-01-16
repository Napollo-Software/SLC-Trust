<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/img/favicon/favicon.png')}}" type="image/x-icon" />
    <title>Client Acknowledgement</title>
    <link href="https://fonts.cdnfonts.com/css/rage-italic" rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/5e782bf38cce30531775d9922caba85c?family=Nominee-Regular" rel="stylesheet">
    <style>
        :root {
            --primary: rgb(52 159 153);
            --bgColor: rgb(184 221 219)
        }

        * {
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


        body {
            /* font-family: Arial, sans-serif; */
            font-family: "Nominee-Regular";
        }

        :root {
            --primary: rgb(52 159 153);
            --bgColor: rgb(184 221 219)
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }

        body {
            /* font-family: Arial, sans-serif; */
        }

        /* html{
    font-size: 62.5%;
} */
        header {
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

        .logo-style {
            width: 45%;
            position: absolute;
            top: 6rem;
        }

        .logo-img {
            width: 100%;
            /* height: 180px; */
            object-fit: contain;
        }

        input[type="radio"]:checked:before {
            content: "\2713";
            /* Unicode for tick (✓) */
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

        label {
            cursor: pointer;
            font-size: 14px;
            font-style: italic
        }

        p {
            font-size: 16px
        }

        .footer-left-dis {
            font-size: 12px;
        }

        .footer-right-dis {
            font-size: 12px;
        }

        .footer-mid-dis {
            font-size: 12px;
        }

        .header-contact p {
            font-size: 20px
        }

        input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 12px;
            height: 12px;
            background-color: white;
            border: 1px solid #000;
            border-radius: 0;
            /* Make it square */
            position: relative;
            cursor: pointer;
            box-shadow: 0.5px -0.5px 0px black;
        }

        input[type="radio"]:checked {
            background-color: #0075ff;
            box-shadow: 1px 1px 2px lightgray;
        }

        span {
            font-size: 13px;
            font-style: italic
        }

        input[type="text"] {
            font-size: 16px;
            font-family: "Nominee-Regular";

        }

        input[type="date"] {
            font-size: 16px;
            font-family: "Nominee-Regular";

        }

        .header-heading {
            text-align: center;
            font-size: 1.82rem;
            color: var(--primary);


        }

        .service-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap
        }

        .header-content {
            text-align: center;
            position: absolute;
            bottom: 20px;
            padding: 1.5rem;
            width: 90%;
        }

        .header-contact {
            display: flex;
            flex-direction: column;
            gap: 15px;
            justify-content: center;
            align-items: center;
            font-size: 1.6rem;
            margin-top: 25rem;
        }

        .life-policy-style {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3px;
        }

        .header-email {
            color: var(--primary);
            font-size: 20px;
            font-weight: 600;
        }


        main {
            line-height: 35px !important;
        }

        .supplemental-header {
            background-color: var(--bgColor);
            display: flex;
            flex-direction: column;
            height: 120px;
            justify-content: center;
            align-items: center;
            gap: 5px;
            padding: 10px;
        }

        .supplemental-header-heading {
            font-size: 1.4rem;
            font-weight: bold;
        }

        .supplemental-header-title {
            color: var(--primary);
            font-size: 1.4rem;
        }

        .supplemental-des {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* font-size: 17px; */
            gap: 10px;
            width: 73%;
            margin: 0 auto;
            padding: 30px 10px;
            text-align: center;
        }

        .cs-value {
            display: flex;
            flex: 1;
            gap: 5px;
            /* flex-wrap:wrap */
        }

        .beneficiary-heading {
            color: var(--primary);
            width: fit-content;
            padding: 2px 20px;
            /* margin-left: 30px; */
            font-size: 18px;
            background-color: var(--bgColor);
            font-family: 'Poppins-Regular';
            letter-spacing: 0.8px;
        }

        .beneficiary-des {
            width: 90%;
            margin: 0 auto;
        }

        .beneficiary-information {
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


        .beneficiary-indormation-header {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 15px;
            /* width: 90%; */
            /* margin: auto; */
        }

        .beneficiary-information-form {}

        .can-style {
            width: 25%;
            margin-top: 15px;
        }

        .acc-name-style {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .label-name {
            font-weight: bold;
        }

        .inp-first {
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
        }

        .db-month {
            display: flex;
            justify-content: center;
            margin-top: 15px;
            gap: 5px;
            flex-wrap: wrap
        }

        .inp-middle {
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
        }

        .inp-last {
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
        }

        input:focus {
            /* border: none; */
            outline: none;
            border-bottom: 1px solid black;
        }

        .name-form-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 35px;
            flex-wrap: wrap;
            /* width: 25%; */
        }

        .name-form {
            width: 30%;
        }

        .referring-source-para-style {
            /* font-size: 18px; */
            word-spacing: 3px;

        }

        .footer-left {
            /* min-width: fit-content; */
        }

        .footer-right {
            min-width: fit-content;
        }

        .power-of-attorney {
            width: 88%;
            margin: auto
        }

        .guardian-information {
            width: 88%;
            margin: auto
        }

        .beneficiary-service {
            width: 88%;
            margin: auto
        }

        .information-disclosures {
            width: 88%;
            margin: auto
        }




        canvas {
            border: 1px solid #000;
            /* margin-top: 10px; */
        }

        .martial-status {
            margin-top: 25px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 160px;
            /* flex-wrap: wrap; */
        }

        .life-insurance-information-body-style {
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



        .status {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 15px;
            width: 30%;
        }

        .label-status {
            font-weight: bold;
        }

        .gender {
            width: 36%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex: 1;
        }

        .beneficiary-information-name-form {
            margin-top: 25px
        }

        .inp-gender {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .citizenship {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .dob {
            width: 25%;
            border: none;
            border-bottom: 1px solid black;
        }

        .social-security-number {
            width: 25%;
            border: none;
            border-bottom: 1px solid black;
        }

        .security-form {
            min-width: 30%;
        }

        .dob-form {
            min-width: 30%;
        }

        .citizenship-form {
            width: 30%;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap
        }

        .contact {
            margin-top: 25px;
        }

        .contact-form-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 30px;
            margin-top: 35px;
            flex-wrap: wrap
        }

        .home-phone {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .cell-phone {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .contact-form {
            width: 35%;
        }

        .preferred-phone {
            margin-top: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 15px;
        }

        .bene-sig {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .email-form {
            width: 60%;
            margin-top: 20px;
        }

        .email {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .beneficiary-information-address-form {
            margin-top: 35px;
        }

        .address-form-container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 30px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .healthcare-plane {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
        }

        .address {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .apt {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .city {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .state {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .zip {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .address-form {
            width: 30%;
        }

        .apt-form {
            width: 10%;
        }

        .city-form {
            width: 30%;
        }

        .state-form {
            width: 10%;
        }

        .zip-form {
            /* width: 20%; */
            flex: 1
        }

        .qualifying-disabilities {
            margin-top: 35px;
        }

        .disabilities {
            margin-top: 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap
        }

        .for-office-use-only-2-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .applicable-item-para {
            width: 80%;
            margin: auto;
        }

        .d1 {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .d2 {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .d3 {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .d1-form {
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .d2-form {
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .d3-form {
            width: 30%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .mail-trust {
            margin-top: 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .mail-trust-des {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            font-weight: 600;
        }

        .footer-beneficiary-information {
            margin-top: 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }

        .footer-mid {
            /* border: 1px solid var(--primary); */
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--primary);
            flex: 1;
        }

        .medicaid-information-header {
            /* width: 90%;
    margin: auto; */
        }

        .household-income-header {
            /* width: 90%;
    margin: auto; */
        }

        .life-insurance-information-header {
            /* width: 90%;
    margin: auto; */
        }

        .healthcare-premium-header {
            /* width: 90%;
    margin: auto; */
        }

        .funeral-information-header {
            /* width: 90%;
    margin: auto; */
        }

        .footer-left {
            flex: 1;
        }

        .footer-right {
            flex: 1;
        }

        .footer-right-dis {
            text-align: right;
        }

        .footer-mid-dis {
            text-align: center;
            border: 1px solid var(--primary);
            min-width: 5%;
            padding: 5px;
        }

        .authorized-representative {
            width: 80%;
            margin: 50px auto;
            margin-bottom: 0;
        }

        .authorized-representative-header {
            /* width: 90%;
    margin: auto; */

        }

        .authorized-heading {
            color: var(--primary);
            width: fit-content;
            padding: 2px 20px;
            font-size: 18px;
            /* margin-left: 30px; */
            background-color: var(--bgColor);
            font-family: 'Poppins-Regular';
            letter-spacing: 0.8px;
        }

        .authorized-des {
            width: 80%;
            margin: 20px auto;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            /* font-size: 20px; */
        }

        .authorized-des-checkbox {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap
        }

        .for-office-use-only-2-body-style {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .authorized-representative-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        .referring-source-header {
            /* width: 90%;
    margin: auto; */
        }

        .purpose-of-enr-header {
            /* width: 90%;
    margin: auto; */
        }

        .authorized-representative-body-content-1 {
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

        .authorized-representative-body-content-2 {
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

        .authorized-representative-body-content-1-des {
            width: 96%;
            margin: auto;
        }

        .authorized-representative-body-content-1-form {
            width: 96%;
            flex-direction: column;
            margin: 10px auto;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .authorized-inp-first {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .authorized-inp-last {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .authorized-name-form {
            width: 45%;
        }

        .authorized-representative-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .authorized-contact-form-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .authorized-home-form-inp {
            width: 95%;
            border: none;
            border-bottom: 1px solid black;
        }

        .authorized-cell-form-inp {
            width: 95%;
            border: none;
            border-bottom: 1px solid black;
        }

        .box-label {
            font-size: 16.2px
        }

        .normal-text {
            font-size: 16px
        }

        .authorized-home-form {
            width: 35%;
        }

        .authorized-cell-form {
            width: 35%;
        }

        .authorized-preferred-form {
            min-width: fit-content;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .life-policy {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap
        }

        .authorized-preferred-form-checkbox {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .authorized-contact-form-container-2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .mda {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .authorized-contact-form-2-email {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .authorized-contact-form-2-relationship {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .authorized-contact-form-2 {
            width: 47%;
        }

        .authorized-contact-form-2-relationship-container {
            min-width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .authorized-address-form {
            margin-top: 25px;
        }

        .referring-source {
            width: 80%;
            margin: 25px auto;
        }

        .referring-source-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .referring-source-agency {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .witness-1 {
            width: 50%;
            border-right: 1px solid black;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .witness-2 {
            width: 40%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            "

        }

        .referring-source-contract {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .referring-source-home {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .healthcare-applicant {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            flex-wrap: wrap;
        }

        .referring-source-email {
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
        }

        .referring-source-form {
            width: 47%;
        }

        .referring-source-para {
            width: 90%;
            margin: auto;
        }

        .direct-debit-bank {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .footer-referring-source {
            margin: 35px auto;
            width: 90%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }

        .purpose-of-enr-container {
            width: 80%;
            margin: 50px auto;
            margin-bottom: 0;
        }

        .healthcare-premium-body-style {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .purpose-of-enr-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            gap: 8px;
        }

        .purpose-of-enr-checkbox {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap
        }

        .medicaid-information {
            width: 80%;
            margin: auto;
        }

        .medicaid-information-body {
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

        tbody tr td {
            padding: 12px;
            border-right: 2px solid var(--bgColor);

        }

        tbody tr {
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

        tr.ind-th td:nth-child(1) {
            color: var(--primary);
            font-weight: 600;
        }


        .medicaid-information-footer-inp {
            border: none;
            border-bottom: 1px solid black;
            /* width: 80%; */
        }

        .medicaid-information-footer {
            width: 88%;
            margin: auto;
            /* font-size: 18px; */
            /* word-spacing: 2px; */

        }

        .medicaid-information-footer-inp {
            width: 60%;
        }

        .applicant {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            gap: 10px;
        }

        .household-income {
            width: 80%;
            margin: 20px auto;
        }

        .sig-para {
            display: flex;
            padding: 0px 20px;
            flex-wrap: wrap
        }

        .household-income-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
        }

        .spouse-info {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 5px;
        }

        .spouse-deceased {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
        }

        .spouse-applying {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .spouse-applying-check {
            display: flex;
            min-width: fit-content;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .house-hold-first {
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
        }

        .house-hold-last {
            border: none;
            border-bottom: 1px solid black;
            width: 100%;
        }

        .house-hold-name {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .house-hold-last-form {
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .house-hold-first-form {
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .house-hold-note {
            width: 98%;
            margin: auto;
            font-size: 18px;
            word-spacing: 2px;
        }

        .footer-house-hold {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
        }


        .applicable-item {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .healthcare-premium-header-heading {
            color: var(--primary);
            width: fit-content;
            padding: 2px 20px;
            font-size: 18px;
            /* margin-left: 30px; */
            background-color: var(--bgColor);
            min-width: fit-content;
            font-family: 'Poppins-Regular';
            letter-spacing: 0.8px;
        }

        .healthcare-premium {
            width: 80%;
            margin: 15px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;

        }

        .healthcare-premium-body {
            width: 90%;
            margin: auto;
            /* font-size: 18px; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 18px;
        }

        .funeral-information {
            width: 80%;
            margin: auto;
        }

        .funeral-information-body {
            width: 90%;
            margin: 20px auto;
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .for-office-use-only-2-header {
            text-align: center;
            background-color: rgb(184 221 219);
            color: rgb(52 159 153);
            padding: 10px;
            width: 28%;
        }

        .for-office-use-only-2-body {
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

        .w-50 {
            width: 50%
        }

        .w-70 {
            width: 70%
        }

        .w-40 {
            width: 40%
        }

        .w-80 {
            width: 80%
        }

        .w-48 {
            width: 48%
        }

        .w-10 {
            width: 10%
        }

        .w-25 {
            width: 25%
        }

        .w-30 {
            width: 30%
        }

        .w-35 {
            width: 35%
        }

        .f-75 {
            flex: 0.75
        }

        .f-full {
            flex: 1
        }

        .life-insurance-information {
            width: 80%;
            margin: auto;
        }

        .life-insurance-information-body {
            width: 90%;
            margin: 20px auto;
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .life-insurance-information-body-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .life-insurance-information-body-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
            justify-content: center;
            width: 100%;
            flex-wrap: wrap;
        }

        .life-insurance-type {
            display: flex;
            width: 100%;
            gap: 5px;
            /* justify-content: center; */
            align-items: center;
            flex-wrap: wrap;
        }

        .living-arrangements {
            width: 80%;
            margin: auto;
        }

        .power-of-attorney-header {
            /* width: 90%;
    margin: auto; */
        }

        .living-arrangement-header {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 25px;
            flex-wrap: wrap
                /* width: 90%;
    margin: auto; */
        }

        .living-arrangement-body {
            width: 90%;
            margin: 20px auto;
            margin-bottom: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: center;
            gap: 15px;
        }

        .living-arrangements-body {
            width: 90%;
            margin: 20px auto;
            flex-direction: column;
            display: flex;
            flex-wrap: wrap;
            /* justify-content: flex-start; */
            /* align-items: center; */
            gap: 20px;
        }

        .footer-living-arrangements {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            margin-top: 60px;
        }

        .page-6 {
            width: 90%;
            margin: 50px auto;
        }

        .information-disclosures-body {
            width: 95%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 20px
        }

        .information-disclosures-body-left {
            width: 45%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .information-disclosures-body-right {
            width: 45%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
            /* padding: 0 15px; */
        }

        .agr-signature {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap
        }

        .page-5 {
            width: 90%;
            margin: 50px auto;
        }

        .guardian-information-header {
            /* width: 90%;
    margin: auto; */
        }

        .information-disclosures-header {
            /* width: 95%;
    margin: auto; */
        }

        .signature-of-two-witnesses-header {
            /* width: 90%;
    margin: auto; */
        }

        .signature-of-notary-header {
            /* width: 90%;
    margin: auto; */
        }

        .agreement-signature-header {
            /* width: 90%;
    margin: auto; */
        }

        .beneficiary-service-header {
            /* width: 90%;
    margin: auto; */
        }

        .power-of-attorney-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .power-of-attorney-body-1 {
            border: 2px solid var(--bgColor);
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .power-of-attorney-body-1-header {
            display: flex;
            flex-direction: column;
            gap: 15px;
            font-size: 16px;
        }

        .power-of-attorney-body-1-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px
        }

        .guardian-information-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .beneficiary-service-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 15px;
        }



        .page-7 {
            width: 80%;
            margin: 50px auto;
        }

        .page-8 {
            /* width: 80%;
    margin: 50px auto; */
        }

        .agreement-signature {
            width: 80%;
            margin: 50px auto;
        }

        .signature-of-notary {
            width: 80%;
            margin: 50px auto;
            margin-bottom: 0;
        }

        .signature-of-two-witnesses {
            width: 80%;
            margin: 25px auto;
        }

        .agreement-signature-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .signature-of-notary {
            width: 80%;
            margin: 50px auto;
            margin-bottom: 0;
        }

        .signature-of-notary-body {
            width: 90%;
            margin: 20px auto;
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
            font-size: 14px;
            flex-wrap: wrap;
        }

        .signature-of-two-witnesses-body {
            width: 90%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .list-para {
            font-size: 16px
        }

        .list-para2 {
            font-size: 14px
        }

        .for-office-use-only-header {
            background-color: var(--bgColor);
            color: var(--primary);
            padding: 10px;
        }

        .for-office-use-only-body {
            width: 70%;
            margin: 30px auto;
            margin-bottom: 0;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .for-office-use-only-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            /* margin-top: 60px; */
            width: 80%;
            margin: 60px auto;
            margin-bottom: 0;
        }

        .page-9 {
            margin-top: 60px;
            /* page-break-before: always; */
        }

        .for-office-use-only-2 {
            width: 80%;
            margin: auto;
        }

        .direct-debit-req-form {
            width: 80%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .direct-debit-req-form-body {
            display: flex;
            flex-direction: column;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            font-size: 17px;
        }

        .for-office-use-3 {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        .for-office-use-3-body {
            width: 70%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
        }

        .footer-for-office-use-3 {
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

        #signature-canvas {
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

        .submit-button {
            margin-left: 10%;
            padding: 10px;
            min-width: fit-content;
            width: 10%;
            border-radius: 4px;
            cursor: pointer;
            background-color: rgb(184 221 219);
            color: rgb(52 159 153);
            border: none;
            font-weight: bold;
            font-size: 1.3rem;
            position: relative;
            align-items: center;
        }

        .submit-button:hover {
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

        .btn-size {
            width: 11%;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
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

        .acknowledge-list {
            padding: 10px 90px;
        }

        .acknowledge-list ul li {
            padding: 5px 0px;
        }

        /* ------------------------------------------------------------------------------------------------- */


        /* Media Queries */

        @media only screen and (max-width: 800px) {

            /* Beneficiary Information */

            .name-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .name-form2 {
                margin-top: 12px;
            }

            .cs-value {
                flex-wrap: wrap
            }

            .status {
                width: 100%;
                font-size: 0.8rem;
                flex-wrap: wrap
            }

            .gender {
                width: 100%;
                margin-top: 1rem;
                font-size: 0.8rem;
            }

            .security-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .dob-form {
                width: 100%;
                margin-top: 1rem;
                font-size: 0.8rem;
            }

            .citizenship-form {
                width: 100%;
                margin-top: 1rem;
                font-size: 0.8rem;
            }

            .contact-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .address-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .apt-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .city-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .state-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .zip-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .d1-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .d2-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .d3-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .disabilities {
                gap: 10px;
            }

            /* Authorized Representatives */

            .authorized-name-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .authorized-home-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .authorized-cell-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .authorized-preferred-form {
                width: 100%;
                font-size: 0.8rem;
                justify-content: flex-start;
                margin-top: 1rem;
            }

            .authorized-contact-form-2 {
                width: 100%;
                font-size: 0.8rem;
            }

            .authorized-contact-form-2-relationship-container {
                width: 100%;
                font-size: 0.8rem;
                margin-top: 1rem;
            }

            /* Referring Source */

            .referring-source-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .referring-source-para-style {
                font-size: 1rem;
            }

            /* Household Income */
            .house-hold-first-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .house-hold-last-form {
                width: 100%;
                font-size: 0.8rem;
            }

            .spouse-applying {
                margin-top: 1rem;
                font-size: 0.8rem;
            }

            /* Life Insurance Information */

            .life-insurance-information-body-style {
                width: 100%;
                font-size: 0.8rem;
            }

            .life-insurance-type {
                font-size: 0.8rem;
            }


            /* Healthcare Premiums */

            .healthcare-applicant {
                justify-content: flex-start
            }

            .healthcare-plane {
                gap: 2px;
            }

            .healthcare-premium-body {
                font-size: 0.8rem
            }

            body {
                font-size: 0.8rem;
            }

            /* Living Arrangements */
            .w-50 {
                width: 100%
            }

            .w-10 {
                width: 100%;
            }

            .w-25 {
                width: 100%;
            }

            .w-35 {
                width: 100%;
            }

            .w-48 {
                width: 100%;
            }

            .w-40 {
                width: 100%
            }

            .service-container {
                gap: 20px
            }

            .information-disclosures-body {
                margin-top: 15px;
            }

            .information-disclosures-body-left {
                width: 100%
            }

            .information-disclosures-body-right {
                width: 100%
            }

            .w-30 {
                width: 100%
            }

            .witness-1 {
                width: 100%;
                border-right: none
            }

            .witness-2 {
                width: 100%;
            }

            .w-80 {
                width: 100%
            }

            .for-office-use-only-2-container {
                align-items: flex-start
            }

            .for-office-use-only-2-header {
                width: 100%;
            }

            .for-office-use-only-2-body {
                width: 100%;
            }

            .for-office-use-only-2-body-style {
                width: 100%;
            }

            .direct-debit-bank {
                gap: 20px
            }

            .acc-name-style {
                gap: 20px
            }

            .mda {
                justify-content: flex-start
            }

            .for-office-use-3-body {
                gap: 20px
            }

            .f-75 {
                flex: 1
            }

            .w-70 {
                width: 100%
            }

            .authorized-home-form-inp {
                width: 100%;
            }

            .authorized-cell-form-inp {
                width: 100%
            }

            thead tr td {
                padding: 10px;
            }

            tbody tr td {
                padding: 10px;
            }

            .sig-para {
                padding: 0;
            }

            .life-policy {
                justify-content: flex-start
            }

            .life-policy-style {
                width: 100%;
                justify-content: flex-start;
            }

            .j-heading {
                font-size: 2.5rem;
            }

            .supplemental-header-heading {
                font-size: 1rem
            }

            .supplemental-header-title {
                font-size: 1rem
            }

            .authorized-des-checkbox {
                justify-content: flex-start
            }

            .authorized-heading {
                font-size: 0.8rem
            }

            .beneficiary-heading {
                font-size: 0.8rem
            }

            .healthcare-premium-header-heading {
                font-size: 0.8rem
            }

            .list-para {
                font-size: 0.8rem
            }

            .list-para2 {
                font-size: 0.8rem
            }

            .email-form {
                width: 100%;
            }


        }



        @media only screen and (max-width: 600px) {
            .authorized-contact-form-2-relationship-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: center;
            }

            .purpose-of-enr-checkbox {
                gap: 10px
            }

            .cs-value {
                flex-wrap: wrap
            }

            .spouse-applying-check {
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: center;
            }

            .agr-signature {
                justify-content: flex-start
            }

            .db-month {
                justify-content: flex-start
            }

            .bene-sig {
                justify-content: flex-start
            }

            .can-style {
                width: 100%
            }
        }

        /* .life-insurance-information-body-style{
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: center;
    gap: 0px;
} */

        @media only screen and (max-width: 540px) {
            .life-insurance-information-body-style {
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: center;
                gap: 0px;
            }

            .cs-value {
                flex-wrap: wrap
            }

            .supplemental-header-title {
                font-size: 0.9rem;
            }

            .header-contact p {
                font-size: 12px
            }
        }


        @media only screen and (max-width: 1360px) {
            .pro-bt {
                width: 100%
            }

            .cs-value {
                flex-wrap: wrap
            }

            .mda {
                width: 100%;
                justify-content: flex-start
            }

            .mda input {
                flex: 1;
            }

            .for-office-use-3-body div:nth-child(1) {
                width: 100%
            }

            .for-office-use-3-body div:nth-child(2) {
                width: 100%
            }

            .for-office-use-3-body div:nth-child(6) {
                width: 100%
            }

            .for-office-use-3-body div:nth-child(7) {
                width: 100%;
                justify-content: flex-start
            }

            .for-office-use-3-body {
                gap: 10px
            }

            .mad1 {
                flex: 1;
            }

            .acc-name-style {
                gap: 20px
            }

            tbody tr td {
                font-size: 0.9rem;
            }
        }


        @media only screen and (min-width: 370px) and (max-width: 700px) {
            header {
                height: 650px;
            }

            .header-content {
                height: 260px;
            }

            .cs-value {
                flex-wrap: wrap
            }

            .header-contact {
                margin-top: 4rem;
            }

            .j-heading {
                font-size: 1.5rem;
                font-family: 'Poppins-Bold' !important;
            }

            .header-contact {
                font-size: 1rem
            }
        }



        @media only screen and (max-width: 1100px) {
            header {
                width: 100%;
            }

            .cs-value {
                flex-wrap: wrap
            }

            .martial-status {
                gap: 15px;
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media only screen and (max-width: 370px) {
            .header-content {
                height: 200px;
                gap: 2rem;
            }

            .cs-value {
                flex-wrap: wrap
            }

            .j-heading {
                font-size: 1.5rem
            }

            .header-contact {
                font-size: 1rem
            }
        }

        /* @media only screen and (min-width: 1114px) and (max-width:1290) */
        @media only screen and (min-width: 1114px) and (max-width: 1290px) {
            header {
                height: 1255px;
            }

            .cs-value {
                flex-wrap: wrap
            }
        }

    </style>
</head>

<body>
    <!-- method="POST" action="{{ route('save.client_acknowledgement') }}" -->
    <div class="card">


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

        <!-- ------------------First header page ----------- -->

        <!-- <div style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 50px;">
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
        </div> -->
        </header>
    </div>

    <!-- Page 1 -->
    <main>
        <form id="client_acknowledgement_form">
            @csrf
            <input type="hidden" id="referral_id" name="referral_id" value="{{$referral->id}}">
            <input type="hidden" id="document_id" name="document_id" value="{{$documentId}}">

            <section style="border-bottom: 1px solid rgb(52 159 153);padding-bottom: 50px;">
                <div class="supplemental-header">
                    <p class="supplemental-header-heading">
                        SLC SUPPLEMENTAL NEEDS TRUST
                    </p>
                    <p class="supplemental-header-title">
                        Client Acknowledgement
                    </p>
                </div>
                <div>
                    <div class="supplemental-des">

                        <p>
                            CLIENT ACKNOWLEDGEMENT ON USE OF PRE-PAID CREDIT CARD OPTION
                        </p>
                        <p>
                            TO
                        </p>
                        <p>
                            SENIOR LIFE CARE
                        </p>
                    </div>

                </div>

                <!-- BENEFICIARY INFORMATION -->

                <div class="beneficiary-information">
                    <p>This is to acknowledge that I have been informed, by Senior Life Care, that the use of the pre-paid credit card option provided with my Pooled Income Trust account (the “PIT”) is to limited to
                        authorized living expenses, including by not limited to, rent, food, clothes or utilities. Unauthorized
                        expenses include, but are not limited to: </p>
                    <div class="acknowledge-list">
                        <ul>
                            <li>Alcohol</li>
                            <li>Bills not in my name</li>
                            <li>Cash advances taken on credit cards</li>
                            <li>Charitable contributions</li>
                            <li>Gambling</li>
                            <li>Firearms</li>
                            <li>Gifts</li>
                            <li>Secondary Healthcare Insurance Premiums</li>
                            <li>Tobacco</li>
                            <li><b>Any expenses not for the specific use and benefit of the account holder</b></li>
                            <li><b>ATM TRANSACTIONS ARE PROHIBITED</b></li>
                        </ul>
                    </div>
                    <p>I understand that purchases using the pre-paid credit card attached to my Pooled Income
                        Trust account for any unauthorized expenses will not be paid by the Pooled Income Trust and hold
                        Senior Life Care harmless for any such non-payment. </p>

                    <div style="padding: 30px 0">
                        <b>
                            I ACKNOWLEDGE THAT IF THE CARD IS MISPLACED OR STOLEN, IT IS MY RESPONSIBILITY TO
                            NOTIFY MELODY BENEFITS IMMEDIATELY. SENIOR LIFE CARE AND MELODY BENEFITS ARE NOT
                            RESPONSIBLE AND WILL NOT REIMBURSE ANY LOST OR STOLEN FUNDS.
                        </b>
                    </div>

                    <div class="beneficiary-information-form">
                        <div>
                            <div class="beneficiary-information-name-form">
                                <div class="name-form-container">
                                    <div class="name-form">
                                        <input type="text" maxlength="40" name="sponsor_first_name" id="first" class="inp-first" required> <br>
                                        <span>Name</span>
                                    </div>
                                </div>
                                <div class="name-form-container">
                                    <div class="name-form">
                                        <input type="date" name="date" id="date" class="inp-first" required> <br>
                                        <span>Date</span>
                                    </div>
                                </div>
                                <div class="name-form-container">
                                    <div class="name-form">
                                        <input type="text" maxlength="25" name="signature_input" id="signature_input" class="inp-first" oninput="generateSignature()" required> <br>
                                        <span>Signature</span>
                                    </div>
                                </div>
                                <div class="name-form-container">
                                    <div class="w-80">
                                    </div>
                                    <div class="w-30">
                                        <canvas id="signature-canvas" style="width: 100%; height: 100px;background-color:#f2f2f2"></canvas>
                                        <button style="width:50px;margin-top:5px" type="button" id="clear-2" onclick="clearCanvas()">Clear</button>
                                        <input type="hidden" id="client_acknowledgement_signature" name="client_acknowledgement_signature">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="submit-button" class="submit-button">
                    Submit
                    <span class="loader" style="display: none;"></span>
                </button>
            </section>
        </form>
    </main>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/inputmask.min.js"></script>


<script type="text/javascript">

    generateSignature()

    $(document).ready(function () {

        $('#client_acknowledgement_form').submit(function (e) {
            e.preventDefault();
            $('#submit-button').addClass('btn-size');
            $('#submit-button').prop('disabled', true);
            $('.loader').show();
            saveCanvasAsImage();
            let formdata = new FormData(this);
            $.ajax({
                url: '{{ route('save.client_acknowledgement') }}',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
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
                        }
                    });
                    $('#submit-button').removeClass('btn-size');
                    $('.loader').hide();
                    $('#submit-button').prop('disabled', false);

                },
                error: function (errors) {
                    alert('Error in saving file');
                    $('#submit-button').removeClass('btn-size');
                    $('.loader').hide();
                    $('#submit-button').prop('disabled', false);
                }
            });
        });
    });

        function generateSignature() {
        const name = document.getElementById(`signature_input`).value;
        const canvas = document.getElementById(`signature-canvas`);
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#f2f2f2';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        ctx.font = '42px "BrittanySignature", BrittanySignature';
        ctx.fillStyle = 'black';
        ctx.fillText(name, 5, 80);
    }

    function clearCanvas() {
        document.getElementById(`signature_input`).value = '';
        const canvas = document.getElementById(`signature-canvas`);
        const ctx = canvas.getContext('2d');
        ctx.fillStyle = 'white';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    function saveCanvasAsImage() {

        const canvas = document.getElementById(`signature-canvas`);
            const signatureDataURL = canvas.toDataURL('image/png');
            document.getElementById(`client_acknowledgement_signature`).value = signatureDataURL;
    }
    </script>
</html>

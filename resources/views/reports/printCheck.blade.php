<!DOCTYPE html>
<html>
<head>
    <title>Print Check</title>
    <style>
    @import url(https://fonts.googleapis.com/css?family=Damion);
    @import url(https://fonts.googleapis.com/css?family=Mrs+Saint+Delafield);
    @media print {
        .cloned-card {
            border: 2px solid red;
            background-color: lightyellow;
        }
        .no-print {
            display: none !important;
        }
    }
    .date {
        margin-right: 15%;
    }
    .check {
        background-image: linear-gradient(to right, rgba(243, 246, 249, 0.15) 0%, rgba(125, 185, 232, 0.15) 100%), url(https://subtlepatterns.com/patterns/connect.png);
        width: 40em;
        height: 15em;
        position: relative;
        box-shadow: 0 0 10px 0px black;
        margin: 1em;
        padding: 1em;
        margin-top: 100px;
    }
    .check:before {
        position: absolute;
        content: '';
        width: 39em;
        height: 14em;
        margin: 0.5em 0 0 0.43em;
        top: 0;
        left: 0;
        border: 2px dotted rgb(178, 182, 188);
    }
    .number {
        font-family: "Courier New";

        text-align: right;
    }
    .date {
        font-family: 'Damion', cursive;
        font-size: 1.5em;
        float: right;
        border-bottom: 1px solid #666;
        width: 6em;
        margin: 0.2em 2em 0.5em;
        padding-left: 0.5em;
        position: relative;
    }
    .date:before {
        font-family: Helvetica;
        font-size: 0.5em;
        content: 'DATE';
        position: absolute;
        left: -3em;
        top: 1.8em;
    }
    .orderof {
        font-family: 'Damion', cursive;
        font-size: 1.5em;
        border-bottom: 1px solid #666;
        float: left;
        width: 60%;
        margin: 0 0 0 3em;
        position: relative;
        line-height: 1;
        padding-top: 0;
        padding: 0 0 0 1em;
    }
    .orderof:before {
        font-family: Helvetica;
        font-size: 0.5em;
        content: 'PAY TO THE ORDER OF';
        position: absolute;
        left: -6em;
        top: 0.3em;
        width: 6em;
    }
    .num {
        font-family: 'Damion', cursive;
        font-size: 1.5em;
        float: left;
        border: 2px solid #aaa;
        position: relative;
        margin: 0 0 0 2em;
        padding: 0 0.5em;
        line-height: 0.9em;
    }
    .num:before {
        font-family: Helvetica;
        content: '$';

        position: absolute;
        left: -0.8em;
    }
    .dollars {
        font-family: 'Damion', cursive;
        font-size: 1.5em;
        border-bottom: 1px solid #666;
        width: 84%;
        float: left;
        padding: 0 0 0 4em;
        position: relative;
    }
    .dollars:after {
        font-family: Helvetica;
        font-size: 0.5em;
        content: 'DOLLARS';
        position: absolute;
        right: -5em;
        top: 1.7em;
    }
    .memo {
        font-family: 'Damion', cursive;
        font-size: 1.1em;
        border-bottom: 1px solid #666;
        clear: left;
        float: left;
        width: 60%;
        position: relative;
        padding: 0 0 0 1em;
        margin: 0.6em 0 0 1.5em;
    }
    .memo:before {
        font-family: Helvetica;
        font-size: 0.5em;
        content: 'MEMO';
        position: absolute;
        left: -3em;
        top: 1.7em;
    }
    .sig {
        font-family: 'Mrs Saint Delafield', cursive;
        font-size: 2.3em;
        float: right;
        border-bottom: 1px solid #666;
        line-height: 0.9em;
        margin: 0.58em;
        width: 25%;
        padding: 0 0 0 0.7em
    }
</style>
</head>
<body>
    @foreach ($formDataArray as $formData)
    <div class="check-container" style="margin-top:100px">
        <div class="check print-check">
            <div class="row">
                <div class="col-md-6"><b>Trusted Surplus Solutions</b><br>59 Merrall Dr<br>Lawrence, NY 11559-1518</div>
                <div class="col-md-6 number check-number-text">{{ $formData['checkNumber'] ?? 'N/A' }}</div>
            </div>
            <div class="date check-date-text">{{ $formData['checkDate'] ?? 'N/A' }}</div>
            <div class="info">
                <div class="orderof payee-text">{{ $formData['user'] ?? 'N/A' }}</div>
                <div class="num amount-in-number-text">{{ $formData['checkNumber'] ?? 'N/A' }}</div>
                <div class="dollars amount-in-word-text">{{ $formData['amountInWord'] ?? 'N/A' }}</div>
            </div>
            <div class="memo memo-text"><small>{{ $formData['memo'] ?? 'N/A' }}</small></div>
            <div class="sig signature">{{ config('app.name') }}</div>
        </div>
    </div>
    @endforeach
</body>
</html>

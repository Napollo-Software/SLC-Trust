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
        @page {
            margin: 0;
            size: 8.5in 11in; /* Standard US letter size for consistent printing */
        }

    }
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
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
.my-check {
  position: relative;
  background: #e3eef8;
  background-image: linear-gradient(to right, rgba(243, 246, 249, 0.15), rgba(125, 185, 232, 0.15)),url('https://subtlepatterns.com/patterns/connect.png');
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  font-family: Helvetica, Arial, sans-serif;
  font-size: 14.4px;
  padding: 10px;
  margin: 20px 10px 10px 10px;
  border: 1px solid black;
  border-style: dashed;
}

/* Company & Address */
.my-company {
  font-weight: bold;
  line-height: 1.3;
}

.my-address {
  font-weight: normal;
  line-height: 1.3;
}

/* Check Number */
.my-check-number {
  font-family: "Courier New", monospace;
  font-size: 14.4px;
}

/* Date */
.my-date {
  font-family: Damion, cursive;
  font-size: 21.6px;
}

/* Pay to the order of */
.my-orderof {
  font-family: Damion, cursive;
  font-size: 25.92px;
  border-bottom: 1px solid #666;
  width : 98%;
  border-bottom: 1px solid black;
  padding-bottom: 2px;
}

.font-helvetica {
   font-family: Helvetica, Arial, sans-serif;
}
.font-damion {
   font-family: Damion, cursive;
}

/* Numeric Amount */
.my-num {
  font-family: Damion, cursive;
  font-size: 21.6px;
  border: 2px solid #666;
  padding: 1px 4px;
}

/* Amount in Words */
.my-dollars {
  font-family: Damion, cursive;
  font-size: 25.92px;
  width: 70%;
  padding-left: 60px;
  border-bottom: 1px solid #666;
}

/* Memo */
.my-memo {
  font-family: Damion, cursive;
  font-size: 20px;
  padding-left: 12px;
  border-bottom: 1px solid #666;
}

/* Signature */
.my-signature {
  font-family: 'Mrs Saint Delafield', cursive;
  font-size: 33.12px;
  padding-left: 7.2px;
}

 body {
    background-image: url('assets/images/check-pdf-background-min.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    min-height: 100vh;
    margin: 0;
    padding: 0;
  }

 .w-50 {
  width: 50%;
 }
 .w-full {
  width: 100%;
 }
.table-layout {
  display: table;
  width: 100%;
}
.table-row {
  display: table-row;
  width: 100%;
}
.table-cell {
  display: table-cell;
}
.text-end {
  text-align: right;
}

 .page-break {
      page-break-after: always
  }
</style>
</head>
<body>
    @foreach ($formDataArray as $formData)
    <div>
        <div class="my-check">
            <div class="table-layout">
                <div class="table-row">
                    <div class="table-cell w-50">
                        <div class="my-company">
                            <b>Senior Life Care</b>
                        </div>
                    </div>
                    <div class="table-cell w-50 text-end">
                        {{ $formData['checkNumber'] ?? 'N/A' }}
                    </div>
                </div>
            </div>

            <div class="my-address">
                5014-16th Ave, Suite 489
            </div>

            <div class="table-layout">
                <div class="table-row">
                    <div class="table-cell w-50">
                        Brooklyn, NY 11204
                    </div>
                    <div class="table-cell w-50 text-end" style=" ">
                        <span class="font-helvetica">Date:</span> <span class="my-date" style="border-bottom: 1px solid black; padding-bottom: 2px;">{{ $formData['checkDate'] ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <div class="table-layout" style="padding-top: 15px;">
                <div class="table-row">
                    <div class="table-cell" style="width: 90%">
                        <div class="table-layout">
                            <div class="table-row">
                                <div class="table-cell" style="width: 7%; font-size: 10px;">
                                    <div class="font-helvetica">PAY TO THE ORDER OF</div>
                                </div>
                                <div class="table-cell" style="width: 90%;">
                                    <div class="font-damion my-orderof" style="padding-right: 5px;">{{ $formData['user'] ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-cell" style="width: 10%; vertical-align: bottom;">
                        <div class="table-layout">
                            <div class="table-row">
                                <div class="table-cell" style="width: 10%; font-size: 18px; padding-right: 2px; vertical-align: bottom;">
                                    $
                                </div>
                                <div class="table-cell" style="width: 90%;">
                                    <div class="my-num">
                                        {{ $formData['amountInNumber'] ?? 'N/A' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-layout">
                <div class="table-row">
                    <div class="table-cell my-dollars" style="width: 95%">
                        {{ $formData['amountInWord'] ?? 'N/A' }}
                    </div>
                    <div class="table-cell font-helvetica" style="width: 5%; vertical-align: bottom;">
                        DOLLARS
                    </div>
                </div>
            </div>

            <div class="table-layout">
                <div class="table-row">
                    <div class="table-cell" style="width: 70%; vertical-align: bottom;">
                        <div class="table-layout">
                            <div class="table-row">
                                <div class="table-cell" style="width: 5%; font-size: 10px; vertical-align: middle;">
                                    <div class="font-helvetica">Memo</div>
                                </div>
                                <div class="table-cell" style="width: 92%;">
                                    <div class="my-memo" style="padding-right: 5px;">{{ $formData['memo'] ?? 'N/A' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-cell" style="width: 30%; vertical-align: middle;">
                        <div class="my-signature">
                            {{ config('app.name') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(!$loop->last)
        <div class="page-break"></div>
        @endif
    </div>

    @endforeach
</body>
</html>

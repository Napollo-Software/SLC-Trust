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
.my-check {
  position: relative;
  width: 720px;              
  height: 288px;             
  background: #e3eef8;
  background-image: linear-gradient(to right, rgba(243, 246, 249, 0.15), rgba(125, 185, 232, 0.15)),url('https://subtlepatterns.com/patterns/connect.png');
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
  font-family: Helvetica, Arial, sans-serif;
  font-size: 14.4px;        
  padding: 8px  4px;         
}

.my-check::before {
  content: '';
  position: absolute;
  top: 7.2px;                
  left: 7.2px;
  width: calc(100% - 14.4px);
  height: calc(100% - 14.4px);
  border: 2px dotted #b2b6bc;
}

/* Company & Address */
.my-company {
  position: absolute;
  top: 14.4px;
  left: 14.4px;
  font-weight: bold;
  line-height: 1.3;
}

.my-address {
  position: absolute;
  top: 37.44px;           
  left: 14.4px;
  font-weight: normal;
  line-height: 1.3;
}

/* Check Number */
.my-check-number {
  position: absolute;
  top: 14.4px;
  right: 14.4px;
  font-family: "Courier New", monospace;
  font-size: 14.4px;
}

/* Date */
.my-date {
  position: absolute;
  top: 70px;
  right: 120px;           
  font-family: Damion, cursive;
  font-size: 21.6px;         
  width: 86.4px;            
  text-align: right;
  padding-right: 4.32px;   
  border-bottom: 1px solid #666;
}

.my-date::before {
  content: 'DATE';
  position: absolute;
  top: 25.92px;          
  left: -40px;            
  font-size: 10px;         
  font-family: Helvetica, Arial, sans-serif;
}

/* Pay to the order of */
.my-orderof {
  position: absolute;
  top: 120px;                
  left: 70px;            
  font-family: Damion, cursive;
  font-size: 25.92px;       
  width: 60%;
  padding-left: 11.52px;     
  line-height: 1;
  border-bottom: 1px solid #666;
}

.my-orderof::before {
  content: 'PAY TO THE ORDER OF';
  position: absolute;
  top: 25px;             
  left: -50px;             
  font-size: 10px;        
  width: 55px;
  font-family: Helvetica, Arial, sans-serif;
}

/* Numeric Amount */
.my-num {
  position: absolute;
  top: 120px;
  right: 20px;
  font-family: Damion, cursive;
  font-size: 21.6px;
  border: 2px solid #666;
  padding: 1px 8px;   
  line-height: 1;
}

.my-num::before {
  content: '$';
  position: absolute;
  top: 12px;               
  left: -18px;            
  font-family: Helvetica, Arial, sans-serif;
}

/* Amount in Words */
.my-dollars {
  position: absolute;
  top: 170px;              
  left: 14.4px;
  font-family: Damion, cursive;
  font-size: 23.04px;        
  width: 70%;
  padding-left: 60px;    
  border-bottom: 1px solid #666;
}

.my-dollars::after {
  content: 'DOLLARS';
  position: absolute;
  top: 25px;             
  right: -75px;            
  font-size: 14px;
  font-family: Helvetica, Arial, sans-serif;
}

/* Memo */
.my-memo {
  position: absolute;
  bottom: 20px;            
  left: 45px;              
  font-family: Damion, cursive;
  font-size: 20px;        
  width: 55%;
  padding-left: 12px;    
  border-bottom: 1px solid #666;
}

.my-memo::before {
  content: 'MEMO';
  position: absolute;
  padding-left: 12px;     
  top: 15px;             
  left: -50px;             
  font-size: 10px;        
  width: 55px;
  font-family: Helvetica, Arial, sans-serif;
}

/* Signature */
.my-signature {
  position: absolute;
  bottom: 36px;              
  right: 14.4px;
  font-family: 'Mrs Saint Delafield', cursive;
  font-size: 33.12px;     
  padding-left: 7.2px;
  line-height: 1;
  border-bottom: 1px solid #666;
}


</style>
</head>
<body>
    @foreach ($formDataArray as $formData)
    <!-- <div class="check-container" style="margin-top:100px">
        <div class="check print-check">
            <div class="!row">
                <div class="!col-md-6"><b>Trusted Surplus Solutions</b><br>59 Merrall Dr<br>Lawrence, NY 11559-1518</div>
                <div class="!col-md-6 number check-number-text">{{ $formData['checkNumber'] ?? 'N/A' }}</div>
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

    </div> -->
    <div class="my-check">
  <div class="my-company">
    <b>Trusted surplus Solutions</b>
  </div>
  <div class="my-address">
    59 Merrall Dr<br>
    Lawrence, NY 11559-1518
  </div>
  <div class="my-check-number">
    <!-- 1025 -->
    {{ $formData['checkNumber'] ?? 'N/A' }}
</div>

<div class="my-date">
    <!-- 6/20/2023 -->
    {{ $formData['checkDate'] ?? 'N/A' }}
  </div>

  <div class="my-orderof">
    <!-- Customer -->
    {{ $formData['user'] ?? 'N/A' }}
  </div>
  <div class="my-num">
    <!-- 75.00  -->
    {{ $formData['amountInWord'] ?? 'N/A' }}
  </div>
  <div class="my-dollars">
    <!-- Seventy-five and 00/100 -->
    {{ $formData['amountInNumber'] ?? 'N/A' }}

  </div>

  <div class="my-memo">
    <small>
      <!-- Aleksandra Gelman-Apt 9F, 2775 West 5ht streat (3B) Brooklyn, NY 11224 -->
      {{ $formData['memo'] ?? 'N/A' }}
    </small>
  </div>

  <div class="my-signature">
    {{ config('app.name') }}
  </div>
</div>
    @endforeach

</body>
</html>

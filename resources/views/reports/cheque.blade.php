@extends('nav')
@section('title', 'Dashboard | SLC Trust')
@section('wrapper')
    @php
        use App\Models\User;
        use App\Models\Claim;
        $all_users = User::where('role', '!=', 'Admin')
            ->where('role', '!=', 'Moderator')
            ->get();
        $role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
        $name = App\Models\User::where('id', '=', Session::get('loginId'))->value('name');
        $last_name = App\Models\User::where('id', '=', Session::get('loginId'))->value('last_name');
        $sum_processed_amount = DB::table('claims')
            ->where('claim_status', 'processed')
            ->sum('claim_amount');
        $search = $searchrequest['search'] ?? '';
    @endphp
    <style>
        @import url(https://fonts.googleapis.com/css?family=Damion);
        @import url(https://fonts.googleapis.com/css?family=Mrs+Saint+Delafield);

        @media print {

            .cloned-card {
                /* Add your print-specific CSS styles here */
                border: 2px solid red;
                background-color: lightyellow;
                /* Add any other print-specific styles */
            }

            /* .print-cheque {
                                                                                                                                                                                                                                                                                              display: block !important;
                                                                                                                                                                                                                                                                                            } */
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
    <div class="">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Create Cheque</b> </span></h5>
        <div class="d-flex justify-content-between no-print">
            <div id="content">
                <form method="get" action="{{ route('submit.forms') }}">
                    <div class="card">
                        <div class="card-header pb-0 pl-0">
                            <h5 class="card-title pl-2">Cheque Details</h5>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <label for="cheque-number">Cheque Number</label>
                                    <input type="number" id="cheque-number" class="form-control cheque-number-details"
                                        name="number[]" placeholder="Cheque number" min="0">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="cheque-date">Cheque Date</label>
                                    <input type="date" id="cheque-date" class="form-control cheque-date-details"
                                        name="date[]" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="user-account">User Account</label>
                                    <div class="form-group">
                                        <select id="user-account" name="user[]" class="form-control select-" style="width: 100%">
                                            <option value="">Select User Account</option>
                                            @foreach ($users->sortBy('name') as $user)
                                                <option value="{{ $user->name . ' ' . $user->last_name }}">
                                                    {{ $user->name . ' ' . $user->last_name }}
                                                    <b>{{ "($" . $user->user_balance . ')' }}</b>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="payee-account">Payee Account</label>
                                    <div class="form-group">
                                        <select id="payee-account" name="payee[]" class="form-control select-" style="width: 100%">
                                            <option value="">Select Payee Account</option>
                                            @foreach ($payees->sortBy('name') as $item) {{-- Sorting payees by name --}}
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 p-2 mt-2">
                                    <label for="amount-in-number">Amount in Number</label>
                                    <input type="number" id="amount-in-number"
                                        class="form-control amount-in-number-details" name="amount_in_number[]"
                                        onKeyPress="if(this.value.length==9) return false;" placeholder="Amount in number"
                                        min="0">

                                </div>
                                <div class="col-md-6 p-2 mt-2">
                                    <label for="amount-in-word">Amount in Word</label>
                                    <input type="text" id="amount-in-word" class="form-control amount-in-word-details"
                                        name="amount_in_word[]" placeholder="Amount in word">
                                </div>
                                <div class="col-md-6 p-2" style="width: 100%">
                                    <label>Memo</label>
                                    <textarea type="text" id="memo" class="form-control memo-details" name="memo[]" maxlength="60"
                                        placeholder="Memo"> </textarea>
                                </div>
                            </div>
                            <br>
                            <hr>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id="but_add" type="button" onclick="add_more()"><i class="bx bx-plus pb-1"></i>Add
                                more</button>
                            <button class="btn btn-secondary" onclick="" type="submit"><i class="bx bx-printer"></i>Print</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        {{-- <div class="row d-flex justify-content-center">
                <div class="check print-cheque">
                    <div class="row">
                        <div class="col-md-6"><b>Trusted surplus Solutions</b><br> 59 Merrall Dr <br>Lawrence, NY 11559-1518
                        </div>
                        <div class="col-md-6 number cheque-number-text">1025</div>
                    </div>
                    <div class="date cheque-date-text" style="margin-top: -40px">6/20/2023</div>
                    <div class="info">
                        <div class="orderof payee-text">Customer</div>
                        <div class="num amount-in-number-text">75.00</div>
                        <div class="dollars amount-in-word-text">Seventy-five and 00/100</div>
                    </div>
                    <div class="memo memo-text"><small>Aleksandra Gelman-Apt 9F, 2775 West 5ht streat(3B) Brooklyn, NY
                            11224</small></div>
                    <div class="sig signature">{{ config('app.name') }}</div>
                </div>
        </div> --}}
    </div>
    <div id="accounts" style="visibility:hidden">
        <option value="">Select Account</option>
        @foreach ($users as $user)
            <option value="{{ $user->name . ' ' . $user->last_name }}">
                {{ $user->name . ' ' . $user->last_name . "($" . $user->user_balance . ')' }}</option>
        @endforeach
    </div>
    <div id="payees" style="visibility:hidden">
        <option value="">Select Account</option>
        @foreach ($payees as $item)
            <option value="{{ $item->name }}">{{ $item->name }}</option>
        @endforeach
    </div>
    <div id="checkContent" class="printable d-none">
        <p style="padding-left: 80%;"><span class="cheque-date-text">5/23/2013</span></p>
        <p style="padding-left: 12%"><span class="payee-text">Usama Fiaz</span><span style="padding-left: 70%"><span
                    class="amount-in-number-text">$566</span></span></p>
        <p style="padding-left: 11%"><span class="amount-in-word-text">Seventy-five and 00/100</span></p>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jquery.min.js" type="text/javascript"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js" type="text/javascript"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js" type="text/ja#ascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
    function collectFormData() {
        var formDataArray = [];
        $('.card-body').each(function() {
            var formData = {
                chequeNumber: $(this).find('.cheque-number-details').val(),
                chequeDate: $(this).find('.cheque-date-details').val(),
                user: $(this).find('.select-2[name="user"]').val(),
                payee: $(this).find('.select-2[name="payee"]').val(),
                amountInNumber: $(this).find('.amount-in-number-details').val(),
                amountInWord: $(this).find('.amount-in-word-details').val(),
                memo: $(this).find('.memo-details').val()
            };
            formDataArray.push(formData);
        });
        return formDataArray;
    }

    function sendFormData() {
        var formDataArray = collectFormData();
        $.ajax({
            url: '{{ route('submit.forms') }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                formDataArray: formDataArray
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function sendFormData() {
        var formDataArray = collectFormData();
        $.ajax({
            url: '{{ route('submit.forms') }}',
            type: 'get',
            data: {
                _token: '{{ csrf_token() }}',
                formDataArray: formDataArray
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function add_more() {
        var newModalBody = $('.card-body:first').clone(true);
        var chequeNumberFields = $('.card-body').find('.cheque-number-details');
        var maxChequeNumber = 0;
        chequeNumberFields.each(function() {
            var chequeNumber = parseInt($(this).val());
            if (!isNaN(chequeNumber) && chequeNumber > maxChequeNumber) {
                maxChequeNumber = chequeNumber;
            }
        });
        var modalBodyCount = $('.card-body').length + 1;
        var newChequeNumber = maxChequeNumber + 1;
        newModalBody.find('.cheque-number-details').val(newChequeNumber);
        newModalBody.find('input, select').not('.cheque-number-details, .cheque-date-details').val('');
        newModalBody.find('textarea.memo-details').val('');
        newModalBody.find('input, select').each(function() {
            if ($(this).attr('name') == 'user' || $(this).attr('name') == 'payee') {
                if ($(this).attr('name') == 'user') {
                    $(this).next().remove();
                    var selectDropdown = $('<select style="width: 100%">' + $('#accounts').html() +
                        '</select>', {
                            'id': newId,
                            'name': newName,
                            'class': 'select-2'
                        });
                    $(this).parent().append(selectDropdown);
                    $(this).remove();
                    selectDropdown.select2();

                } else {
                    $(this).next().remove();
                    var selectDropdown = $('<select style="width: 100%">' + $('#payees').html() +
                        '</select>', {
                            'id': newId,
                            'name': newName,
                            'class': 'select-2'
                        });
                    $(this).parent().append(selectDropdown);
                    $(this).remove();
                    selectDropdown.select2();
                }
            } else {
                var oldId = $(this).attr('id');
                var oldName = $(this).attr('name');
                var newId = oldId + '_' + modalBodyCount;
                var newName = oldName + '_' + modalBodyCount;
                $(this).attr('id', newId);
                $(this).attr('name', newName);
            }
        });
        var removeButton = $('<button/>', {
            text: 'X',
            type: 'submit',
            class: 'btn',
            style: 'float: right',
            click: function() {
                $(this).parent().remove();
            }
        });
        newModalBody.prepend(removeButton);
        newModalBody.insertAfter(".card-body:last");
    }
</script>

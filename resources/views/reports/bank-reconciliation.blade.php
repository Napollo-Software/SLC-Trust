@extends('nav')
@section('title', 'Bank Reconciliation | Senior Life Care Trusts')
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

        $allPayment = 0.0;
        $allDeposit = 0.0;
        $PaymentMinusDeposit = 0.0;

    @endphp
    <style>
        .two-value {
            border: 2px solid;
            border-color: #559e99 #559e99;
        }


        .custom-row {

            justify-content: space-between;
        }

        .black-line {
            border: none;
            border-top: 2px solid grey;
            margin: 10px 30%;
        }


        .custom-row > .mb-2 {

            .custom-row > .mb-2 {

                width: 20% !important;
            }



            .custom-row2 > .mb-2 {
                width: 25% !important;
            }

            .dataTables_paginate a:hover:not(.current) {
                background-color: #ddd;
            }

            a,
            a > span {
                position: relative;
                color: inherit;
                text-decoration: none;
                line-height: 24px;
            }

            .dataTables_info {
                display: none !important;
            }

            a:before,
            a:after,
            a > span:before,
            a > span:after {
                content: '';
                position: absolute;
                transition: transform .5s ease;
            }

            .select2-container .select2-selection--single .select2-selection__rendered {
                display: block;
                padding-left: 8px;
                padding-right: 20px;
                overflow: hidden;
                text-overflow: n;
                white-space: nowrap;

                display: block;
                width: 100%;
                padding: 0.4375rem 0.875rem;
                font-size: 0.9375rem;
                font-weight: 400;
                line-height: 1.53;
                color: #697a8d;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #d9dee3;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.375rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .select-2 {
                display: block;
                width: 100%;
                padding: 0.4375rem 0.875rem;
                font-size: 0.9375rem;
                font-weight: 400;
                line-height: 1.53;
                color: #697a8d;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #d9dee3;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 0.375rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 0px solid #aaa;
                border-radius: 4px;
            }

            .form-control1 {
                width: 24%;
            }

            .shadow-none {
                width: 100%
            }

            .my-swal-container {
                z-index: 99999;
            }

            .my-swal-popup {
                z-index: 99999;
            }
    </style>
    <div class="modal fade no-print" id="filter-record" tabindex="-1" role="dialog"
         aria-labelledby="customerdpositLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerdpositLabel">Add Details <br> <small style="font-size: 12px">(You
                            can filter with customer name and Start/End date)</small></h5>
                    <button type="button" class="close btn-secondary close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('bank.reconciliation.filter') }}" method="post" id="bank-rec-form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <label class="form-label">Customers</label>
                                <select name="user" class="form-control " required>
                                    <option value="">Select Customer</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name . ' ' . $user->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label class="form-label">Start Date</label>
                                <input class="form-control start @error('from') is-invalid @enderror" type="date"
                                       id="start-date" name="from" value="{{ $start_date }}" required>


                                <span class="text-danger month-date">
                                    @error('from')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 p-1">
                                <label class="form-label">End Date</label>
                                <input class="form-control end @error('to') is-invalid @enderror" type="date"
                                       id="end-date" name="to" value="{{ $end_date }}" required>

                                <span class="text-danger month-date">
                                    @error('to')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary preview">Filter</button>
                </form>
                <a href="/bank-reconciliation" class="btn btn-primary text-white">Clear Filter</a>
            </div>
            </form>
        </div>
    </div>
    </div>
    @if ($role != 'User')

        <div class="">
            <div class="d-flex justify-content-between">
                <div class="col-md-3">
                    <h4 class=" mb-2"><span class="text-muted fw-bold fw-light"><b>Bank Reconciliation</b></span></h5>
                </div>
                {{--  <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#filter-record">
                  Filter  <i class='menu-icon tf-icons bx bx-filter '></i>
                </button>  --}}
            </div>
            <div class="row">
                <div class="col-lg-3 mb-2">
                    <div class="card">
                        <div class="card-body text-black" style="padding-bottom: 5%;padding-top: 6%">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div style="width:80%">
                                    <span class="d-block "><small> BANK ACCOUNT </small></span>
                                    <div class="form-group">
                                        <select name="user" id="account-name"
                                                class="form-control form-select" required>
                                            <option value="trusted-surplus">Trusted Surplus</option>
                                            <option value="operational">Operational</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="avatar mt-0 ">
                                    <i class='bx bxs-bank ' style="font-size: 50px;" ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card ">
                        <div class="card-body ">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div style="width: 80%;padding:3%">
                                    <span class=" d-block mb-1"><small>END DATE OF BANK</small></span>
                                    <h5 class="card-title mb-1">
                                        <form action="{{ route('bank.reconciliation.filter') }}" type="POST"
                                              class="mb-0" id="filter_reconsiliation">
                                            <input
                                                class="@error('from') is-invalid @enderror form-control start reconcilication-date"
                                                type="month" name="from" value="{{ $start_date }}"
                                                max="{{ date('Y-m') }}"/>
                                        </form>
                                    </h5>
                                    {{-- <small class="fw-semibold">Transaction </small><span class="badge bg-label-success me-1">6</span> --}}
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <i class='bx bxs-calendar'  style="font-size: 50px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card ">
                        <div class="card-body" style="padding: 5%">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div>
                                    <span class=" d-block mb-1"> <small>OPENING BALLANCE</small></span>
                                    <h5 class="card-title pt-2 mb-1">
                                        $ <?= number_format((float)$opening_balance, 2, '.', ',') ?>
                                    </h5>
                                    {{-- <small class="fw-semibold">Transaction </small><span class="badge bg-label-primary me-1">1373</span> --}}
                                </div>
                                <div class="avatar flex-shrink-0 ">
                                    <i class='bx bx-dollar-circle'  style="font-size: 50px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-2">
                    <div class="card ">
                        <div class="card-body " style="padding: 5%">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div style="width: 80%">
                                    <span class=" d-block mb-1"><small>ENDING BALANCE</small></span>
                                    <h5 class="card-title mb-0">
                                        <input class="@error('from') is-invalid @enderror form-control start"
                                               type="number" id="ending_balance" value="0" min="0">
                                    </h5>
                                    {{-- <small class="fw-semibold">Transaction </small><span class="badge bg-label-info me-1">0</span> --}}
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <i class='bx bx-dollar-circle'  style="font-size: 50px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{--  <div class="row">
              <div class="col-md-3">
                <h5 class=" mb-2"><span class="text-muted fw-light"><b>Transactions</b></span></h5>
              </div>
              <form action="{{ route('bank.reconciliation.filter')}}" method="post">
                @csrf
              <div class="col-md-9 d-flex align-items-baseline">
                <select name="user" class="form-control select-2 m-1" required >
                  <option value="null" >Select Customer</option>
                  @foreach ($users as $user)
                     <option value="{{$user->id}}" {{ $user_id == $user->id ? 'selected' : '' }}>{{$user->name.' '.$user->last_name}}</option>
                  @endforeach
                </select>
                <span class="text-danger">@error('user'){{$message}} @enderror</span>
                <input class="@error('from') is-invalid @enderror form-control m-1" type="date" name="from" value="{{$start_date}}" required>
                <span class="text-danger month-date">@error('from'){{$message}} @enderror</span>
                <input class="@error('to') is-invalid @enderror form-control m-1" type="date" name="to" value="{{$end_date}}" required>
                <span class="text-danger month-date">@error('to'){{$message}} @enderror</span>
                <input class="form-control m-1 btn btn-success " name="submit" type="submit" value="Filter" >
              </div>
            </form>
            </div>  --}}
            <div class="">
                <div class="col-lg-12 mb-12 mt-0">
                    <div class="card d-none mb-2">
                        <form action="{{ route('monthly.filter') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 p-2">
                                        <label class="form-label">Bank Account</label>
                                        <select name="user" class="form-control select-2" required>
                                            <option value="">Trusted Surplus</option>
                                            <option value="">Operational</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <label class="form-label">End Date Per Bank Statement</label>
                                        <input class="@error('from') is-invalid @enderror form-control start"
                                               type="date" name="from" value="{{ $start_date }}" required>
                                        <span class="text-danger month-date">
                                            @error('from')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-4 p-3">
                                        <label class="form-label">Ending Balance Per Bank Statement</label>
                                        <input class="@error('from') is-invalid @enderror form-control start"
                                               type="number" name="from" value="0" required>
                                        <span class="text-danger month-date">
                                            @error('from')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-secondary preview">Filter</button>
                        </form>
                        <a href="/monthly-statement" class="btn btn-primary text-white">Clear Filter</a>
                    </div>
                </div>


            </div>
            <div class="no-data-found text-center">
                <h5>No Data Found</h5>
            </div>
            <div class="card data-div pt-4">
                {{-- <div class="pr-3">
                    <button type="button" class="btn btn-success p-2 d-none filter-file-bank" data-toggle="modal"
                        data-target="#filter-record">
                        Filter <i class='menu-icon tf-icons bx bx-filter '></i>
                    </button>
                </div>
                <form action="{{ route('bank.reconciliation.export') }}" method="post">
                    @csrf
                    <input type="hidden" name="from" value="{{ $start_date }}">
                    <input type="hidden" name="to" value="{{ $end_date }}">
                    <input type="hidden" name="user" value="{{ $user_id }}">
                    <button type="submit" class="btn btn-primary d-none  import-file-excel export-transaction">
                        Export Excel <i class='bx bx-download'></i>
                    </button>
                </form>
                <form action="{{ route('bank.reconciliation.pdf') }}" method="post" target="_blank">
                    @csrf
                    <input type="hidden" name="from" value="{{ $start_date }}">
                    <input type="hidden" name="to" value="{{ $end_date }}">
                    <input type="hidden" name="user" value="{{ $user_id }}">
                    <button class="btn btn-primary print-btn export-transaction d-none " type="submit">Export PDF<i
                            class='bx bx-printer'></i></button>
                </form>
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                </div> --}}
                <div class="card-body overflow-auto pt-0">
                    {{--  <h4 style="text-align: center">Total Balance:$</h5>
                <div style="display: flex;justify-content:center">
                <h6 style="margin-right:5%">Pool Amount :$</h6>
                <h6 style="margin-right:10px">Revenue :$</h6>
              </div>  --}}
                    <div class="row pt-0">
                        <div class="col-md-6 text-center">
                            <h5 class="rounded border  border-3 border-primary   p-2">All Deposits :
                                $<?= number_format($deposits->sum('deduction'), 2, '.', ',') ?></h5>
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th style="width:10px">
                                        <input type="checkbox" class="select-all-deposits">
                                    </th>
                                    <th style="width:100px">Date</th>
                                    <th style="width:102px">Trans#</th>
                                    <th style="width:100px">Client</th>
                                    <th style="width:100px">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($deposits as $transaction)
                                    <tr>
                                        <td><input type="checkbox" class="amount-checkbox"
                                                   data-amount="{{ $transaction->deduction }}"></td>
                                        <td>{{ $transaction->created_at->format('m/d/Y') }}</td>
                                        <td>{{ $transaction->payment_method }}</td>
                                        @php
                                            $user = App\Models\User::find($transaction->user_id);
                                        @endphp
                                        <td>
                                            @if ($user != null)
                                                {{ $user->name . ' ' . $user->last_name }}
                                            @endif
                                        </td>
                                        <td> ${{ number_format((float) $transaction->deduction, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 text-center">
                            <h5 class="rounded border  border-3 border-primary   p-2">All Payments :
                                $<?= number_format($payments->sum('deduction'), 2, '.', ',') ?></h5>
                            <table class="table table-bordered dataTable">
                                <thead>
                                <tr>
                                    <th style="width:10px"><input type="checkbox" class="select-all-payments"></th>
                                    <th style="width:100px">Date</th>
                                    <th style="width:102px">Trans#</th>
                                    <th style="width:100px">Client</th>
                                    <th style="width:100px">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($payments as $transaction)
                                    <tr>
                                        <td><input type="checkbox" class="payment-checkbox"
                                                   data-amount="{{ $transaction->deduction }}"></td>
                                        <td>{{ $transaction->created_at->format('m/d/Y') }}</td>
                                        <td>{{ $transaction->payment_method }}</td>
                                        @php
                                            $user = App\Models\User::find($transaction->user_id);
                                        @endphp
                                        <td>
                                            @if ($user != null)
                                                {{ $user->name . ' ' . $user->last_name }}
                                            @endif
                                        </td>
                                        <td> ${{ number_format((float) $transaction->deduction, 2, '.', ',') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="container my-5" style="width: 50%">
                        <div class="text-center  display-6 mb-2">
                            Reconciliation Summary
                        </div>

                        <table class="table table-borderless  ">
                            <tbody>
                            <tr>
                                <td class="text-right" style="width: 50%; text-align: right">
                                    Beginning balance as per bank statement:
                                </td>
                                <td class="text-right" style="width: 50%; text-align: left">
                                    $<?= number_format((float)$opening_balance, 2, '.', ',') ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 50%; text-align: right">
                                    Cleared total payments:
                                </td>
                                <td class="text-right" style="width: 50%; text-align: left">
                                    <span id="total-checked-amount">$0.00</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 50%; text-align: right">
                                    Cleared total deposits:
                                </td>
                                <td class="text-right" style="width: 50%; text-align: left">
                                    <span id="totalAmount">$0.00</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        {{-- <hr class="black-line"> --}}
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <td class="text-right" style="width: 50%; text-align: right">
                                    Cleared balance:
                                </td>
                                <td class="text-right" style="width: 50%; text-align: left">
                                        <span id="total-cleared-amount"> $
                                            <?= number_format((float)$opening_balance, 2, '.', ',') ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-right" style="width: 50%; text-align: right">
                                    Ending balance as per bank statement:
                                </td>
                                <td class="text-right" style="width: 50%; text-align: left">
                                    <div id="stored_value">$0.00</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        {{-- <hr class="black-line"> --}}
                        <table class="table table-borderless  display-6">

                            <tbody>
                            <tr>
                                <td class="text-right" style="width: 50%; text-align: right;tex">
                                    Difference:
                                </td>
                                <td class="text-right" style="width: 50%; text-align: left">
                                    <div id="difference_final">
                                        $ <?= number_format((float)$opening_balance, 2, '.', ',') ?></div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>


                    {{--                        <button class="primary btn-primary" onclick="storeClosingBalance()">Save Cleared Balence</button> --}}


                </div>
            </div>
        </div>
    @endif

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

<script>
    let allDeposit = 0;
    let allPayment = 0;
    let PaymentMinusDeposit = 0;
    let closingBalance = 0;
    $(document).ready(function () {
        $('.no-data-found').addClass('d-none');

        // on account-name change event get value
        $('#account-name').on('change', function () {
            var account_name = this.value;

            if (account_name == 'operational') {
                $('.data-div').addClass('d-none');
                $('.filter-file-bank').addClass('d-none');
                $('.export-transaction').addClass('d-none');
                $('.print-btn').addClass('d-none');
                $('.no-data-found').removeClass('d-none');
            } else {
                $('.data-div').removeClass('d-none');
                $('.filter-file-bank').removeClass('d-none');
                $('.export-transaction').removeClass('d-none');
                $('.print-btn').removeClass('d-none');
                $('.no-data-found').addClass('d-none');
            }
        });
    });


    $(document).ready(function () {
        $('.select-all-deposits').click(function () {

            $('input.amount-checkbox').prop('checked', this.checked);
            if (this.checked) {
                allDeposit = <?= $deposits->sum('deduction') ?>;
            } else {
                allDeposit = 0;
            }


            $('#totalAmount').text('$' + allDeposit.toFixed(2));
            calculatePaymentMinusDeposit(allDeposit, allPayment);
        });
    });


    function storeClosingBalance() {
        var ifAnyCheckboxChecked = ($('input.amount-checkbox:checked').length > 0 || $('input.payment-checkbox:checked')
            .length > 0);
        if (!ifAnyCheckboxChecked) {
            closingBalance = <?= $opening_balance ?>;
        }

        $.ajax({
            type: 'POST',
            url: '{{ route('save.balance') }}',

            data: {
                _token: '{{ csrf_token() }}',
                closingBalance: closingBalance
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    swal.fire('Success!', 'Closing balance saved successfully.', 'success');

                } else {
                    console.error('Error sending closing balance to the database:', response.error);
                }
            },
            error: function (xhr, status, error) {
                swal.fire('Error!', 'Error sending closing balance to the database.', 'error');
                console.error('Error details: ' + error);
            }
        });
    }


    $(document).ready(function () {
        $('.select-all-payments').click(function () {
            $('input.payment-checkbox').not(this).prop('checked', this.checked);
            if (this.checked) {
                allPayment = <?= $payments->sum('deduction') ?>;
            } else {
                allPayment = 0;
            }
            $('#total-checked-amount').text('$' + allPayment.toFixed(2));

            calculatePaymentMinusDeposit(allDeposit, allPayment);
        });
    });
    $(document).ready(function () {
        $('input.amount-checkbox').change(calculateTotalAmount);

    });

    function calculateTotalAmount() {
        let totalAmount = 0;
        $('input.amount-checkbox:checked').each(function () {
            totalAmount += parseFloat($(this).data('amount'));
            allDeposit = totalAmount;
        });
        $('#totalAmount').text('$' + totalAmount.toFixed(2));
        calculatePaymentMinusDeposit(allDeposit, allPayment);


    }

    function calculatePaymentMinusDeposit(allDeposit, allPayment) {
        PaymentMinusDeposit = <?= $opening_balance ?> + allDeposit - allPayment;
        calculatedifference();
        $('#total-cleared-amount').text('$' + PaymentMinusDeposit.toFixed(2));
    }


    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll(".payment-checkbox");
        const totalCheckedAmountDisplay = document.getElementById("total-checked-amount");
        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener("change", function () {
                let totalAmount = 0;

                checkboxes.forEach(function (checkbox) {
                    if (checkbox.checked) {
                        totalAmount += parseFloat(checkbox.getAttribute("data-amount"));
                    }
                });

                totalCheckedAmountDisplay.textContent = "$" + totalAmount.toFixed(2);
                allPayment = totalAmount;
                calculatePaymentMinusDeposit(allDeposit, allPayment);

            });
        });
    });

    $(document).on('change', '.reconcilication-date', function (e) {


        $('#filter_reconsiliation').submit();
        // var date = $('.reconcilication-date').val();
        // $.ajax({
        //     type:'POST',
        //     url : '{{ route('bank.reconciliation.filter') }}',
        //     data: {
        //         _token : "{{ csrf_token() }}",
        //         'date':date
        //     },
        //     success: function(data){
        //         console.log(data);
        //     },
        //     error:function(date){
        //         console.log(date);
        //     }
        // })
    })
    $(document).ready(function () {
        const inputField = document.getElementById("ending_balance");
        inputField.addEventListener("input", function (event) {
            event.preventDefault();
            calculatePaymentMinusDeposit(allDeposit, allPayment);
            var ending_balance = document.getElementById("ending_balance").value;
            $('#stored_value').text('$' + ending_balance);
            calculatedifference();
        });

    });

    function calculatedifference() {
        var ending_balance = document.getElementById("ending_balance").value;
        var difference = PaymentMinusDeposit - ending_balance;


        if (Math.abs(difference) < 0.01) {
            difference = 0.0;
        }


        closingBalance = difference;
        $('#difference_final').text('$' + difference.toFixed(2));
    }


    $(document).on('click', '.export-transaction', function (e) {
        var start = "{{ $start_date }}";
        var end = "{{ $start_date }}";
        var user_id = "{{ $user_id }}";
        if (user_id === "") {
            if (start === "" || end === "") {
                e.preventDefault();
                swal.fire('warning!', 'Please filter transactions first in order to export.', 'warning');
            }
        }
    })
    $(document).on('submit', '#bank-rec-form', function (e) {
        var start = $('#start-date').val();
        var end = $('#end-date').val();
        var type = $('#transaction-type').val();
        var user_id = $('#user-data').val();
        if (start > end && start != "" && end != "") {
            e.preventDefault();
            displayWarning('Start date must be less then or equal to End date.');
            //swal.fire('Warning!','Start date must be less then or equal to End date.','warning');
        }
    });
    $(document).ready(function () {
        $('#ending_balance').on('input', function () {

            if ($(this).val() < 0) {
                $(this).val(0);
            }
        });
    });

    function displayWarning(text) {
        Swal.fire({
            title: 'Warning!',
            text: text,
            icon: 'warning',
            customClass: {
                container: 'my-swal-container',
                popup: 'my-swal-popup',
                header: 'my-swal-header',
                title: 'my-swal-title',
                closeButton: 'my-swal-close-button',
                icon: 'warning',
                image: 'warning',
                content: 'my-swal-content',
                input: 'my-swal-input',
                actions: 'my-swal-actions',
                confirmButton: 'my-swal-confirm-button',
                cancelButton: 'my-swal-cancel-button',
                footer: 'my-swal-footer'
            }
        });
    }

    $(document).ready(function () {
        $('.dataTable').DataTable({
            "paging": false, // Hide pagination
            "order": false, // "0" means First column and "desc" is order type;
        });
    });
</script>

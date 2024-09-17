@extends('nav')
@section('title', 'Reports | Transaction')
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
        .two-value {
            border: 2px solid;
            border-color: #559e99 #559e99;
        }

        /* button {
      all: unset;
      cursor: pointer;
    } */

        button:focus {
            outline: orange 5px auto;
        }


        a,
        a>span {
            position: relative;
            color: inherit;
            text-decoration: none;
            line-height: 24px;
        }

        a:before,
        a:after,
        a>span:before,
        a>span:after {
            content: '';
            position: absolute;
            transition: transform .5s ease;
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
    <div class="modal fade no-print" id="filter-record" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerdpositLabel">ADD DETAILS <br> <small style="font-size: 12px">(You
                            can filter either with customer name , Start/End date or both)</small></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('customer.filter') }}" method="post" id="filter-form">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label class="form-label">Customers</label>
                                <select name="user" class="form-control " id="user-data">
                                    <option value="">Select Customer</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected' : '' }}>
                                            {{ $user->name . ' ' . $user->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label class="form-label">Transaction Type</label>
                                <select name="type" class="form-control" id="transaction-type">
                                    <option value="">All</option>
                                    <option value="operational" {{ $type == 'operational' ? 'selected' : '' }}>Operational
                                    </option>
                                    <option value="trusted_surplus" {{ $type == 'trusted_surplus' ? 'selected' : '' }}>
                                        Trusted Surplus </option>
                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label class="form-label">Start Date</label>
                                <input class="form-control start " id="start-date" type="date" name="from"
                                    value="{{ $start_date }}">
                                {{--  <span class="text-danger month-date">@error('from'){{$message}} @enderror</span>  --}}
                            </div>
                            <div class="col-md-6 p-2">
                                <label class="form-label">End Date</label>
                                <input class="form-control end  " type="date" id="end-date" name="to"
                                    value="{{ $end_date }}">
                                {{--  <span class="text-danger month-date">@error('to'){{$message}} @enderror</span>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary preview filter-record ">Filter</button>
                </form>
                <a href="/transaction-report" class="btn btn-primary text-white">Clear Filter</a>
            </div>
            </form>
        </div>
    </div>
    </div>
    @if ($role != 'User')
        <div class="">
            <div class="row">
                <div class="col-lg-12 mb-12">
                    <div class="card">
                        <div class="d-flex align-items-center p-2">
                            <div>
                              <h5 class="mb-1">All Transactions</h5>
                              <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>Overall Transaction</p>
                            </div>
                            <div class="dropdown ms-auto">
                              <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                              </a>
                              <ul class="dropdown-menu">
                                <li>
                                    <button type="button" class="btn btn-success  dropdown-item  p-2 filter-file" data-toggle="modal"
                                    data-target="#filter-record">
                                    Filter <i class='menu-icon tf-icons bx bx-filter '></i>
                                </button>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                <li> <form action="{{ route('transection.export') }}" method="post" target="_blank">
                                    @csrf
                                    <input type="hidden" name="from" value="{{ $start_date }}">
                                    <input type="hidden" name="to" value="{{ $end_date }}">
                                    <input type="hidden" name="user" value="{{ $user_id }}">
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <button class="btn  btn-primary  print-btn p-2 dropdown-item  export-transaction" type="submit" @if ($user_id=="" && count($transactions)==0) disabled @endif><i class='bx bx-printer'></i>Export
                                        PDF</button>
                                </form>
                                </li>
                                <li>
                                  <hr class="dropdown-divider">
                                </li>
                                <li>  <form action="{{ route('transection.excel.export') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="from" value="{{ $start_date }}">
                                    <input type="hidden" name="to" value="{{ $end_date }}">
                                    <input type="hidden" name="user" value="{{ $user_id }}">
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <button type="submit" class="btn btn-primary import-file p-2 dropdown-item export-transaction" @if ($user_id=="" && count($transactions)==0) disabled @endif>
                                        <i class='bx bx-download'></i>   Export Excel
                                    </button>
                                </form>
                                </li>
                              </ul>
                            </div>
                          </div>
                        <div class="card-body overflow-auto pt-1">
                            <h4 style="text-align: center">
                                <button
                                    class="btn {{ $type == 'operational' ? 'btn-secondary' : 'btn-outline-secondary' }}  preview m-1"
                                    onclick="window.location='{{ route('transaction.report', ['operational']) }}'"><i
                                        class="menu-icon tf-icons bx bx-copy"></i> Operational Transactions</button><button
                                    type="submit"
                                    class="btn  {{ $type == 'trusted_surplus' ? 'btn-secondary' : 'btn-outline-secondary' }} preview m-1"
                                    onclick="window.location='{{ route('transaction.report', ['trusted_surplus']) }}'"><i
                                        class="menu-icon tf-icons bx bx-copy-alt"></i> Trusted Surplus
                                    Transactions</button></h5>
                                <table class="table align-middle mb-0 table-hover dataTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width:140px">Date & Time</th>
                                            <th style="width:100px">Account</th>
                                            <th>Transaction Details</th>
                                            <th style="width:100px"> Amount</th>
                                            <th style="width:100px">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->created_at->format('M d-Y H:i') }}</td>
                                                @php
                                                    $user = App\Models\User::find($transaction->user_id);
                                                @endphp
                                                <td>
                                                    @if ($user)
                                                        {{ $user->name . ' ' . $user->last_name }}
                                                    @endif
                                                </td>
                                                <td>{{ $transaction->description }}</td>
                                                <td>
                                                    @if ($transaction->statusamount == 'credit')
                                                        +
                                                    @endif
                                                    @if ($transaction->statusamount == 'debit')
                                                        -
                                                    @endif
                                                    ${{ number_format((float) $transaction->deduction, 2, '.', ',') }}
                                                </td>
                                                <td>
                                                    @if ($transaction->status == 1)
                                                        Processed
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-success bg-primary "
                                                                role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                                aria-valuemax="100" style="width:97%">
                                                            </div>
                                                        </div>
                                                    @else
                                                        In-process
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-warning bg-danger "
                                                                role="progressbar" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width:@if ($transaction->iteration == '0') 20% @endif @if ($transaction->iteration == '1') 40% @endif @if ($transaction->iteration == '2') 60% @endif @if ($transaction->iteration >= '3') 80% @endif">
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    @endif

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).on('click', '.export-transaction', function(e) {
        var start = "{{ $start_date }}";
        var end = "{{ $start_date }}";
        var user_id = "{{ $user_id }}";
        var type = "{{ $type }}";
        if (user_id == "") {
            if (start == "" || end == "" || user_id == "" || type == "") {
                e.preventDefault();
                swal.fire('warning!', 'Please filter transactions w.r.t customer in order to export.', 'warning');
            }
        }
    });
    $(document).on('submit', '#filter-form', function(e) {
        var start = $('#start-date').val();
        var end = $('#end-date').val();
        var type = $('#transaction-type').val();
        var user_id = $('#user-data').val();
        if (start == "" && end == "" && user_id == "" && type == "") {
            e.preventDefault();
            displayWarning('Filter should have customer name , Start/End date or both.');
        }
        if (start != "" && end == "") {
            e.preventDefault();
            displayWarning('Please select End date first!.');
        }
        if (start == "" && end != "") {
            e.preventDefault();
            displayWarning('Please select Start date first!.');
        }
        if (start > end && start != "" && end != "") {
            e.preventDefault();
            displayWarning('Start date must be less then or equal to End date.');
            //swal.fire('Warning!','Start date must be less then or equal to End date.','warning');
        }
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

  $(document).ready(function() {
                        $('.dataTable').DataTable({
                            aLengthMenu: [
                                [25, 50, 100, -1],
                                [25, 50, 100, "All"]
                            ],
                            "order": false // "0" means First column and "desc" is order type;
                        });
                    });
</script>

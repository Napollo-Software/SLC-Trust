@extends('nav')
@section('title', 'Reports | Transaction')
@section('wrapper')
@php

use App\Models\User;
$loginUser = App\Models\User::where('id', '=', Session::get('loginId'))->first();
$role = $loginUser->role;
$name = $loginUser->name;
$last_name = $loginUser->last_name;
$sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');

@endphp

<div class="modal fade no-print" id="filter-record" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerdpositLabel">ADD DETAILS <br> <small style="font-size: 12px">(You
                        can filter either with customer name , Start/End date or both)</small>
                </h5>
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
                            <input class="form-control start " id="start-date" type="date" name="from" value="{{ $start_date }}">
                            {{-- <span class="text-danger month-date">@error('from'){{$message}} @enderror</span> --}}
                        </div>
                        <div class="col-md-6 p-2">
                            <label class="form-label">End Date</label>
                            <input class="form-control end  " type="date" id="end-date" name="to" value="{{ $end_date }}">
                            {{-- <span class="text-danger month-date">@error('to'){{$message}} @enderror</span> --}}
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
    <h5 class=" d-flex justify-content-between pt-3 pb-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Transactions</b> </div>
    </h5>
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card">
                <div class="d-flex align-items-center p-2">
                    <div>
                        <h5 class="mb-1">All Transactions</h5>
                        <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>Overall Transaction</p>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"> <i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <button type="button" class="btn btn-success  dropdown-item  p-2 filter-file" data-toggle="modal" data-target="#filter-record">
                                    Filter <i class='menu-icon tf-icons bx bx-filter '></i>
                                </button>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="{{ route('transection.export') }}" method="post" target="_blank">
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
                            <li>
                                <form action="{{ route('transection.excel.export') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="from" value="{{ $start_date }}">
                                    <input type="hidden" name="to" value="{{ $end_date }}">
                                    <input type="hidden" name="user" value="{{ $user_id }}">
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <button type="submit" class="btn btn-primary import-file p-2 dropdown-item export-transaction" @if ($user_id=="" && count($transactions)==0) disabled @endif>
                                        <i class='bx bx-download'></i> Export Excel
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body overflow-auto pt-1">
                    {{-- <h4 style="text-align: center">
                        <button class="btn {{ $type == 'operational' ? 'btn-secondary' : 'btn-outline-secondary' }} preview m-1" onclick="window.location='{{ route('transaction.report', ['operational']) }}'"><i class="menu-icon tf-icons bx bx-copy"></i> Operational Transactions</button>
                    <button type="submit" class="btn  {{ $type == 'trusted_surplus' ? 'btn-secondary' : 'btn-outline-secondary' }} preview m-1" onclick="window.location='{{ route('transaction.report', ['trusted_surplus']) }}'"><i class="menu-icon tf-icons bx bx-copy-alt"></i> Trusted Surplus Transactions</button>
                    </h4> --}}
                    <table class="table align-middle mb-0 table-hover dataTable">
                        <thead class="table-light">
                            <tr>
                                <th>TID#</>
                                <th>Date & Time</th>
                                <th>Account Name</th>
                                <th>Transaction Details</th>
                                <th>Type</th>
                                <th class="text-center">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $data)
                            <tr>
                                <td>{{ $data->reference_id }}</td>
                                <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                <td>
                                    @if ($data->user_id == \Company::Account_id && in_array($data->type, [\App\Models\Transaction::MaintenanceFee, \App\Models\Transaction::EnrollmentFee, \App\Models\Transaction::RenewalFee]))
                                    {{ \Company::Account_name_income }}
                                    @elseif ($data->user_id == \Company::Account_id)
                                    {{ \Company::Account_name }}
                                    @else
                                    {{ $data->user->name }}
                                    @endif
                                </td>

                                @if ($data->bill_id)
                                <td style="width:50%"><a href="{{ route('claims.show', $data->bill_id ?? '#') }}">
                                        {{ $data->description }} </a></td>
                                @else
                                <td style="width:50%"> <a href="{{ url('show_user/' . $data->user_id) }}" class="text-black" title="This link will redirect you to customer's profile.">{{ $data->description }}
                                    </a></td>
                                @endif
                                <td style="text-align:left !important;">
                                    <span class="badge {{ $data->credit > 0 ? 'badge-success' : 'badge-danger' }}">
                                        @if ($data->credit > 0 )
                                        Credit
                                        @elseif ($data->debit > 0 )
                                        Debit
                                        @endif
                                    </span>
                                </td>
                                <td class="text-center">
                                    @if ($data->credit > 0 )
                                    ${{ number_format((float) $data->credit, 2, '.', ',') }}
                                    @elseif ($data->debit > 0 )
                                    ${{ number_format((float) $data->debit, 2, '.', ',') }}
                                    @else
                                    $0.00
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
        "order": false
    });
});
</script>

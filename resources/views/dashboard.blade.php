@extends('nav')
@section('title', 'All Bills Senior Life Care Trusts')
@section('wrapper')
<style>
    .custom-float {
        float: right !important;
    }

    .custom-nav-margin {
        margin-top: -15px;
    }

    .dataTables_filter {
        display: none !important;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dataTable').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1]
                , [25, 50, 100, "All"]
            ]
            , "order": false // "0" means First column and "desc" is order type;
        });
    });

</script>
<?php
    use App\Models\Claim;
    use App\Models\User;
    use Carbon\Carbon;
    use App\Models\PayeeModel;
    $loggedInUser = User::where('id',Session::get('loginId'))->first();
    $role = $loggedInUser->role;
    $billing_method = $loggedInUser->billing_method;
    $current_user_name = $loggedInUser->name;
    $current_user_balance = userBalance(Session::get('loginId'));
    $users = User::where('role', 'User')->get();
    ?>
@if ($role != 'User')
<style>
    .text-nowrap {
        white-space: nowrap !important;
        margin-top: 26px;
    }

</style>
<div class="modal fade" id="update-bill-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                <button type="button" class="close btn-secondary close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update.bills.status') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="import_file" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Bills</b> </div>
    </h5>
    @if (( $role != 'User'))
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Received Bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->sum('claim_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-book-bookmark font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 46%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Pending Bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->where('claim_status', 'Pending')->sum('claim_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-book-content font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Approved bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->where('claim_status', 'Approved')->sum('claim_amount') + $claims->where('claim_status', 'Partially approved')->sum('partial_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-blanket font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 68%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Denied Bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->where('claim_status', 'Refused')->sum('claim_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-detail font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 66%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card d-flex">
                <div class="d-flex align-items-center p-3">
                    <div>
                        <h5 class="mb-1">Latest Bills</h5>
                        <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>Latest 250 Bills</p>
                    </div>
                    <div class="dropdown ms-auto">
                        <form id="search_bills" action="<?= url('search-bills') ?>" method="POST">
                            <div class="d-flex custom-float">
                                @csrf
                                <div class="">
                                    <select class="form-select user-id select-2 m-1 p-1" name="search" required>
                                        <option value="">Choose One</option>
                                        @foreach ($users as $user)
                                        @if ($user->role == 'User' && $user->account_status == 'Approved')
                                        <option value="{{ $user->id }}" @if ($user->id == $search) selected @endif>
                                            {{ $user->name . ' ' . $user->last_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text btn btn-primary ml-2 cursor-pointer search p-1 m-1" id="basic-addon2"><i class="bx bx-search fs-4 lh-0 pl-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body pt-1" style="margin-top: -35px">
                    <a class="btn btn-primary print-btn d-none" href="{{ route('printpage') }}" target="blank">Export<i class='bx bx-printer'></i></a>
                    <div class="dropdown download-btn">
                    </div>
                    <div style="margin-left:80%">

                    </div>
                    <div class="table-responsive text-nowrap overflow-auto pb-2 ">
                        <table class="table align-middle mb-0 table-hover dataTable ">
                            <thead class="table-light">
                                <tr>
                                    <th>Actions</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Payment Details</th>
                                    <th>Payee</th>
                                    <th>Account</th>
                                    <th>Balance</th>
                                    <th>Amount</th>
                                    <th>Attachment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($claim_details as $claim)
                                <tr class="row-{{ $claim['id'] }}">
                                    <td style="vertical-align: middle;">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="claims/{{ $claim['id'] }}"><i class="bx bx-menu me-1"></i>Status</a>
                                                @if ($role != 'User')
                                                <a class="dropdown-item" href="edit-bill/{{ $claim['id'] }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                @endif
                                                @if ($role != 'User')
                                                <form action="{{ action('App\Http\Controllers\claimsController@destroy', $claim['id']) }} " id="delete_bill" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="id" value="{{ $claim['id'] }}">
                                                    <button class="dropdown-item deleteBtn" id="{{ $claim['id'] }}">
                                                        <i class="bx bx-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;"><a href="claims/{{ $claim['id'] }}">Bill#{{ str_pad($claim['id'], 2, '0', STR_PAD_LEFT) }}</a>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{$claim->user_details->full_name()}}
                                    </td>
                                    <td style="vertical-align: middle;"> {{ date('m/d/Y h:i A', strtotime($claim['created_at'])) }}</td>
                                    <td style="vertical-align: middle;">{{ $claim->category_details->category_name }}</td>
                                    <td style="vertical-align: middle;">
                                        <span class="badge
                                                        @if ($claim->claim_status == 'Approved') bg-success @endif
                                                        @if ($claim->claim_status == 'Partially approved') bg-primary @endif
                                                        @if ($claim->claim_status == 'Pending') bg-info @endif
                                                        @if ($claim->claim_status == 'Refused') bg-danger @endif
                                                        me-1">
                                            @if ($claim->claim_status == 'Approved')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                            @if ($claim->claim_status == 'Partially approved')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                            @if ($claim->claim_status == 'Pending')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                            @if ($claim->claim_status == 'Refused')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                        </span>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div class="card mt-3" style="vertical-align: middle;">
                                            <div class="card-body" style="vertical-align: middle;">
                                                <small>Payment Method# </small> {{ $claim->payment_method }}
                                                <br>
                                                <small>
                                                    @if ($claim->payment_method == 'Check Payment')
                                                    Check No#
                                                    @endif @if ($claim->payment_method == 'ACH')
                                                    Confirmation#
                                                    @endif @if ($claim->payment_method == 'Card')
                                                    Card No#
                                                    @endif @if ($claim->payment_method == '')
                                                    Confirmation No#
                                                    @endif
                                                </small> {{ $claim->card_number }}
                                                <br>
                                                @if($claim->transaction_details)
                                                <small>Payment Date#
                                                    @if ($claim->claim_status == 'Partially approved' || $claim->claim_status == 'Approved')
                                                    {{ isset($claim->transaction_details->created_at) ? date('m/d/Y h:i A', strtotime($claim->transaction_details->created_at)) : '' }}
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{$claim->payee_details->name}}
                                    </td>
                                    <td style="vertical-align: middle;">{{ $claim->account_number }}</td>
                                    <td style="vertical-align: middle;">
                                        {{userBalance($claim->claim_user)}}
                                    </td>
                                    <td style="vertical-align: middle;">${{ number_format((float) $claim['claim_amount'], 2, '.', ',') }}</td>
                                    <td style="vertical-align: middle;">
                                        <?php $document_type = pathinfo($claim->claim_bill_attachment); ?>
                                        <a href="img/{{ $claim->claim_bill_attachment }}" target="_blank">
                                            Attachment <i class="bx bx-file"></i>
                                        </a>

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

 <script>
    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        Swal.fire({
            title: 'Warning!',
            text: "Are you sure ,You want to delete bill # " + id,
            icon: 'warning',

            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'info',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('delete.bill') }}',
                    type: 'post',
                    data: {
                        id: id
                    },
                    success: function() {
                        // $('.deleteBtn').addClass('disabled');
                        swal.fire('success', 'Bill # ' + id +
                            ' has been deleted successfully!', 'success');
                        $('.row-' + id).addClass('d-none');
                        // window.location.reload();
                    }
                })
            }
        })
    })
</script>

@endif
@if ($role == 'User')
<div class="">
    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b> / All Bills</span></h5>
    <div class="row ">
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">My Balance</p>
                            <h5 class="mb-0">${{ number_format((float) $current_user_balance, 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-book-bookmark font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 46%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Pending Bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->where('claim_status', 'Pending')->sum('claim_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-book-content font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Approved bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->where('claim_status', 'Approved')->sum('claim_amount') + $claims->where('claim_status', 'Partially approved')->sum('partial_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-blanket font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 68%"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 overflow-hidden">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0">Denied Bills</p>
                            <h5 class="mb-0">${{ number_format((float) $claims->where('claim_status', 'Refused')->sum('claim_amount'), 2, '.', ',') }}</h5>
                        </div>
                        <div class="ms-auto"> <i class='bx bx-detail font-30'></i>
                        </div>
                    </div>
                    <div class="progress radius-10 mt-4" style="height:4.5px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 66%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card ">
                <div class="d-flex align-items-center p-3">
                    <div>
                        <h5 class="mb-1">Latest Bills</h5>
                        <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>Latest 250 Bills</p>
                    </div>
                    <div class="dropdown ms-auto">

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive text-nowrap overflow-auto pb-2 " style="margin-top:-15px;">
                        <table class="table table-bordered dataTable ">
                            <thead>
                                <tr>
                                    <th>tittle</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Payment Details</th>
                                    <th>Payee</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                    <th>Attachment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($claims as $claim)
                                <tr>
                                    <td style="width: 120px"><a href="claims/{{ $claim['id'] }}">Bill#{{ str_pad($claim['id'], 2, '0', STR_PAD_LEFT) }}</a>
                                    </td>
                                    <td>{{ date('m/d/Y h:i A', strtotime($claim['created_at'])) }}</td>
                                    <td>{{ $claim->category_details->category_name }}</td>
                                    <td>
                                        <span class="badge
                                                        @if ($claim->claim_status == 'Approved') bg-success @endif
                                                        @if ($claim->claim_status == 'Partially approved') bg-primary @endif
                                                        @if ($claim->claim_status == 'Pending') bg-info @endif
                                                        @if ($claim->claim_status == 'Refused') bg-danger @endif
                                                        me-1">
                                            @if ($claim->claim_status == 'Approved')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                            @if ($claim->claim_status == 'Partially approved')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                            @if ($claim->claim_status == 'Pending')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                            @if ($claim->claim_status == 'Refused')
                                            {{ $claim['claim_status'] }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div class="card">
                                            <div class="card-body p-2">
                                                <small>Payment Method:</small> {{ $claim->payment_method }}
                                                <br>
                                                <small>
                                                    @if ($claim->payment_method == 'Check Payment')
                                                    Check No#
                                                    @endif @if ($claim->payment_method == 'ACH')
                                                    Confirmation#
                                                    @endif @if ($claim->payment_method == 'Card')
                                                    Card No#
                                                    @endif @if ($claim->payment_method == '')
                                                    Confirmation No#
                                                    @endif
                                                </small> {{ $claim->card_number }}
                                                <br>
                                                <small>Payment Date:
                                                    @if ($claim->claim_status == 'Partially approved' || $claim->claim_status == 'Approved')
                                                    {{ isset($claim->transaction_details->created_at) ? date('m/d/Y h:i A', strtotime($claim->transaction_details->created_at)) : '' }}
                                                    @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{$claim->payee_details->name}}
                                    </td>
                                    <td>{{ $claim->account_number }}</td>
                                    <td>${{ number_format((float) $claim['claim_amount'], 2, '.', ',') }}</td>
                                    <td>
                                       <a href="img/{{ $claim->claim_bill_attachment }}" target="_blank">
                                                    Attachment <i class="bx bx-file"></i>
                                                </a>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url('claims/' . $claim['id']) }}"><i class="menu-icon tf-icons bx bx-copy-alt"></i>view</a>
                                            </div>
                                        </div>
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

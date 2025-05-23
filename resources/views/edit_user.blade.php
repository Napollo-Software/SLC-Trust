@extends('nav')
@section('title', 'View User | Senior Life Care Trusts')
@section('wrapper')
@php

use App\Models\Transaction;
$role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
@endphp
<style>

    @media screen and (min-width: 992px) {
        .img-sidebar  {
        position: sticky;
        top: 125px;
        height: 100% !important;
    }
    }
</style>
<div>
                <h5 class=" d-flex justify-content-start pt-3 pb-2 ">
                <b></b>
                <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b> /<a href="{{url('/all_users')}}" class="text-muted fw-light pointer"><b>All Users</b></a> / <b>View User</b> </div>
                </h5>
        <form id="formAuxthentication" class="mb-3" action="{{ route('update_existing_user', $user['id']) }}" method="post" enctype="multipart/form-data">
            <div class="row position-relative">
                <div class="col-lg-4 img-sidebar " >
                    <div class="">
                        @method('post')
                        @csrf
                        <input type="hidden" value="{{$user->account_status}}" class="account-status">
                        <div class="card  " >
                            <div class="card-header px-3 d-flex py-3 gap-2 align-items-center bg-white">
                                <h6 class="mb-0">
                                    @if ($user->role == 'User')
                                    Government issued photo ID
                                    @else
                                    Photo ID
                                    @endif
                                </h6>
                                @if ($user->profile_pic != null)
                                <a class=" " href="{{ url('img/' . $user->profile_pic) }}" download>
                                    <i class="bx bx-download"></i>
                                </a>
                                @endif
                            </div>
                            <div class="card-body text-center" >
                                <div class="card mb-0"  >
                                    <div class="card-body   p-3 ">
                                        @if ($user->profile_pic == null)
                                        @php
                                        $app_name = config('app.name');
                                        $profile = $app_name.'-Logo.png';
                                        @endphp
                                        @else
                                        @php
                                        $document_type = pathinfo($user->profile_pic);
                                        if ($document_type['extension'] == 'pdf') {
                                        $profile = 'pdf_icon.png';
                                        } else {
                                        $profile = $user->profile_pic;
                                        }
                                        @endphp
                                        @endif
                                        <a href="@if ($user->profile_pic != null) {{ url('img/' . $user->profile_pic) }} @endif" target="_blank" class="">
                                            <img src="{{ url('img/' . $profile) }}" alt="User image" class="img-thumbnail"@if (isset($document_type['extension']) && $document_type['extension']=='pdf' ) style="width: 150px; " @endif>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8  ">
                    <div class="card h-100 mb-3">
                        <div class="card-body">
                            <h4>Profile Details</h4>
                            <div class="d-flex flex-wrap gap-2 gap-md-3">
                                @if($user->account_status == 'Approved')
                                <button type="button" class="btn d-flex align-items-center btn-primary" data-bs-toggle="modal" data-bs-target="#vodModal">
                                    <i style="font-size:18px" class='bx bx-file me-1 px-2'></i>VOD</button>
                                <a href="{{ route('approval-letter', $user->id) }}" class="btn btn-success" style="color: white;">
                                    <i class="bx bxs-download me-1"></i>Approval Letter</a>
                                @if($user->role == "User")
                                <a href="{{ route('view_user', $user->id) }}" class="btn btn-secondary" style="color: white;">
                                    <i class="bx bx-dollar-circle pb-1"></i>Manage Payment</a>
                                @endif
                                @endif
                                <a href="{{ route('edit_user', $user->id) }}" class="btn btn-primary" style="color: white;">
                                    <i class="bx bx-edit-alt pb-1"></i>Edit User </a>
                                @if ($user->id != \Company::Account_id)
                                <div>
                                <select id="defaultSelect" class="form-select @if ($user->account_status == 'Pending' || $user->account_status == '') bg-primary text-white @endif @if ($user->account_status == 'Approved') bg-success text-white @endif @if ($user->account_status == 'Not Approved') bg-danger text-white @endif @if ($user->account_status == 'Disable') bg-danger text-white @endif" name="account_status" data-id="{{ $user->id }}" required>
                                    @if($user->account_status == 'Pending')
                                    <option class="bg-white text-black" value="" disabled selected>Pending</option>
                                    @endif
                                    <option class="bg-white text-black" @if ($user->account_status == 'Approved') selected @endif
                                        value="Approved">Approved</option>
                                    <option class="bg-white text-black" @if ($user->account_status == 'Not Approved') selected @endif
                                        value="Not Approved">Not Approved</option>
                                    <option class="bg-white text-black" @if ($user->account_status == 'Disable') selected @endif
                                        value="Disable">Deactivate</option>
                                </select>
                                </div>
                                @endif
                                <button type="submit" name="approval_action" class="btn btn-primary update-profile">Update</button>
                            </div>
                            <hr>

                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Account No</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->id }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->name . ' ' . $user->last_name }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Full SSN</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->full_ssn }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Date of Birth</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            @if ($user->dob)
                                            {{ date('m-d-Y', strtotime($user->dob)) }}
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            @if ($user->phone != '+1')
                                            {{ $user->phone }}
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Billing Method</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->billing_method }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Balance</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            @if ($user->role == 'User')
                                            ${{ number_format(userBalance($user->id), 2, '.', ',') }}
                                            @else
                                            N/A
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Gender</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->gender }}
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <!-- Right Column -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Billing Cycle</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            @if ($user->billing_cycle != null)
                                            @if ($user->billing_cycle == 1) 1st @endif
                                            @if ($user->billing_cycle == 3) 3rd @endif
                                            @if ($user->billing_cycle == 7) 7th @endif
                                            @if ($user->billing_cycle == 14) 14th @endif
                                            @if ($user->billing_cycle == 21) 21st @endif
                                            @if ($user->billing_cycle == 28) 28th @endif
                                            of every month
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0 text-nowrap">Surplus Amount</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->surplus_amount }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Marital Status</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->marital_status }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Notify Before</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->notify_before }} day
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->address }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">APT/SUITE</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->apt_suite }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">State, City</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->state . " " . $user->city }}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h6 class="mb-0">Zipcode</h6>
                                        </div>
                                        <div class="col-sm-8 text-secondary">
                                            {{ $user->zipcode }}
                                        </div>
                                    </div>
                                    <hr>
                                    <input type="hidden" name="approval_action" class="approval_action" value="1">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class=" mt-3">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <div>
                                    <h5 class="mb-1">Transaction Details</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>All transactions
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive mt-2">
                                <table class="table align-middle mb-0 table-hover dataTable" id="user_transactions">
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
                                        @foreach ($transactions as $k => $data)
                                        <tr>
                                            <td>{{ $data->reference_id }}</td>
                                            <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                            <td>
                                                @if ($data->user_id == \Company::Account_id && in_array($data->type, [Transaction::MaintenanceFee, Transaction::EnrollmentFee, Transaction::RenewalFee]))
                                                {{ \Company::Account_name_income }}
                                                @elseif ($data->user_id == \Company::Account_id)
                                                {{ \Company::Account_name }}
                                                @else
                                                {{ $data->user->full_name() }}
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
        </form>
    </div>
<div class="modal fade" id="vodModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="addNoteModalLabel">VOD Letters</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 550px;overflow:auto">
                <form id="filter_vod_form" method="POST" data-user-name="{{ $user->full_name() }}">
                    @csrf
                    <input type="hidden" id="vod_form_user_id" name="user_id" value="{{ $user->id }}">
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="form-label">Start Date</label>
                            <input class="form-control text-center" type="date" id="startDate" name="startDate" onchange="validateDate()" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">End Date</label>
                            <input class="form-control text-center " type="date" id="endDate" name="endDate" onblur="validateDate()" required>
                        </div>
                        <div class="col-md-4 pt-4">
                            <button id="generate-report-btn" type="submit" class="btn w-100 btn-primary" style="margin-top:2px">Generate Report</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table id="vod_table" class="table align-middle mb-0 table-hover dataTable ">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($vod_documents as $index => $document)
                        <tr>
                            <td>{{ basename($document->vod_link) }}</td>
                            <td>{{ date('m-d-Y', strtotime($document->created_at)) }}</td>
                            <td class="text-center">
                                <a title="Click here to download the file" href="{{ url("storage/{$user->id}/vod_letters/{$document->vod_link}") }}" target="_blank">
                                    <i class="menu-icon tf-icons bx bx-download"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No vod letter found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).ready(function() {

        $("#formAuxthentication").on('submit', function(e) {
    e.preventDefault();

    var form = $(this);
    const previous_status = '{{$user->account_status}}';

    if (previous_status === $("#defaultSelect").val()) {
        swal.fire({
            title: 'Status',
            text: 'For updating please change the status',
            icon: 'warning',
            confirmButtonText: 'OK',
        });
        } else {
            form.off('submit');
            form.submit();
        }
    });



        $('#vod_table').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1]
                , [25, 50, 100, "All"]
            ]
            , "order": false
            , searching: false
        });

        $('#user_transactions').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1]
                , [25, 50, 100, "All"]
            ]
            , "order": false
        });
    });

    $('#filter_vod_form').on('submit', function(e) {
        e.preventDefault();

        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
        $('#generate-report-btn').attr('disabled', true).text('Generating Report...');
        const userName = $(this).data('user-name').replace(/\s+/g, '_');

        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();

        $.ajax({
            url: '/get-filter-vod-report'
            , type: 'POST'
            , data: new FormData(this)
            , xhrFields: {
                responseType: 'blob'
            }
            , processData: false
            , contentType: false
            , cache: false
            , success: function(blob) {
                $('#generate-report-btn').attr('disabled', false).text('Generate Report');
                const downloadUrl = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = downloadUrl;
                a.download = `VOD_Report_${userName}_${startDate}_to_${endDate}.pdf`;
                document.body.appendChild(a);
                a.click();
                URL.revokeObjectURL(downloadUrl);
                a.remove();
            }
            , error: function(xhr) {
                $('#generate-report-btn').attr('disabled', false).text('Generate Report');
                if (xhr.status == 404) {
                    swal.fire('No VOD Records Found', 'No transactions were found for the selected date range', 'error')
                } else {
                    erroralert(xhr);
                }
            }
        });
    });

    $(document).on('change', '#defaultSelect', function(e) {
        e.preventDefault();
        var status = $('#defaultSelect').val();
        var id = $(this).attr('data-id');
        if (status == 'Disable') {
            $.ajax({
                type: "post"
                , url: "{{ route('user_bills') }}"
                , data: {
                    _token: "{{ csrf_token() }}"
                    , "id": id
                }
                , success: function(data) {
                    if (data.length > 0) {
                        $('.update-profile').attr('disabled', true);
                        swal.fire({
                            title: 'Are you sure?'
                            , text: "Disabling this user will archive the following bills: " + data + "."
                            , icon: 'warning'
                            , showCancelButton: true
                            , confirmButtonColor: '#3085d6'
                            , cancelButtonColor: 'info'
                            , confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('.approval_action').val(data);
                                $('#formAuthentication').submit();
                                $('.update-profile').attr('disabled', false);
                            } else {
                                $('#defaultSelect').val($('.account-status').val());
                                $('.update-profile').attr('disabled', true);
                            }
                        })
                    }
                }
                , error: function(xhr) {
                    $('.update-profile').attr('disabled', true);
                    erroralert(xhr);
                }
            })
        } else {
            $('.update-profile').attr('disabled', false);
        }
    });
    document.getElementById('phone').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '+1(' + x[1] + ')' + x[2] + (x[3] ? '-' + x[3] : '');
    });

    function validateDate() {
        var startDate = new Date(document.getElementById("startDate").value);
        var endDate = new Date(document.getElementById("endDate").value);

        if (startDate > endDate) {
            swal.fire("Warning!", "Start date must not be greater than end date", "warning");
            document.getElementById("endDate").value = "";
        }
    }

</script>


@endsection

@extends('nav')
@section('title', 'Referral | SLC Trusts')
@section('wrapper')
@php
$user = App\Models\User::find(Session::get('loginId'));
@endphp

<head>
    <style>
        .export-file2 {
            right: 266px
        }

        th {
            font-size: 14px !important;
        }

        td {
            vertical-align: middle !important;
        }

    </style>

</head>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Referrals</b> </div>
    </h5>
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card">
                <div class="d-flex align-items-center p-3 mb-1">
                    <div>
                        <h5 class="mb-1">Manage Referrals</h5>
                        <p class="mb-0 font-13 text-secondary "><i class='bx bxs-calendar'></i>All Referrals</p>
                    </div>
                    <div class="ms-auto">
                        @if ($user->hasPermissionTo('Add Referral'))
                        <a href="{{ route('create.referral') }}" class="btn btn-primary print-btn pb-1 pt-1 " style="color: white;">
                            <i class="bx bx-save pb-1"></i>Add Referral </a>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="table-responsive text-nowrap overflow-auto p-3" style="margin-top: -15px">
                        <table class="table align-middle mb-0 table-hover dataTable">
                            <thead class="table-light">
                                <tr style="white-space: nowrap">
                                    <th>Actions</th>
                                    <th>Full name</th>
                                    <th>Email</th>
                                    <!--th>Convert to Customer</th-->
                                    <!-- TODO:/NEED TO BE DONE -->
                                    <!-- <th>Intake status</th> -->
                                    <!--th>Intake coordinator</th-->
                                    <!--th>Follow Up note</th-->
                                    <!--th>Follow up Date</th-->

                                    <!-- <th>Open services</th> -->
                                    <!--th>Modified Date</th-->
                                    <th>Source info</th>
                                    <th>Patient status</th>
                                    <th>Admission date</th>
                                    <th>Created by</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $k => $u)
                                <tr class="row-{{ $u['id'] }}" style="white-space: nowrap">
                                    <td class="text-center row-{{ $u['id'] }}">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if ($user->hasPermissionTo('Edit Referral'))
                                                <a class="dropdown-item" href="{{ route('edit.referral', $u['id']) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                @endif
                                                @if ($user->hasPermissionTo('View Referral'))
                                                <a class="dropdown-item" href="{{ route('view.referral', $u['id']) }}"><i class='bx bxs-show'></i> View</a>
                                                @endif
                                                @if ($user->hasPermissionTo('Delete Referral'))
                                                <button type="button" data-id="{{ $u['id'] }}" class="dropdown-item deleteBtn">
                                                    <i class="bx bx-trash-alt me-1"></i> Delete
                                                </button>
                                                @endif
                                                <!-- <a class="dropdown-item"
                                                           href="{{ route('emergency.referral', $u['id']) }}"><i
                                                                class="bx bx-no-entry me-1"></i>Emergency Details</a> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="row-{{ $u['id'] }}" onclick="window.location.href = '{{ route('view.referral', $u['id']) }}';" style="cursor: pointer;">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                {{ $u['first_name'] }} {{ $u['last_name'] }} <br>
                                            </div>
                                        </div>
                                    </td>
                                    <!--td>
                                            <button type="button" data-id="{{ $u['id'] }}"
                                                    class=" @if ($u->convert_to_customer == null) btn btn-primary p-1 convert-btn custom-design-{{ $u['id'] }} @else dropdown-item @endif ">
                                                @if ($u->convert_to_customer == null)
                                                    <i class="bx bx-analyse me-1"></i>Convert to customer
                                                @else
                                                    Converted to customer
                                                @endif
                                            </button>
                                        </td-->
                                    <!-- <td class="row-{{ $u['id'] }}" onclick="window.location.href = '{{ route('view.referral', $u['id']) }}';" style="cursor: pointer;">OPEN</td> -->
                                    <!--td>{{ $u->intake }}</td-->
                                    <!-- <td class="row-{{ $u['id'] }}" onclick="window.location.href = '{{ route('view.referral', $u['id']) }}';" style="cursor: pointer;">{{ $u['date_of_birth'] }}</td> -->
                                    <!-- <td class="row-{{ $u['id'] }}" onclick="window.location.href = '{{ route('view.referral', $u['id']) }}';" style="cursor: pointer;"><b>Country:</b>{{ $u['country'] }} <br> -->
                                    <!-- <b> City:</b>{{ $u['city'] }} -->
                                    <!--td>{{ $u->referralFollowup->date }}</td-->
                                    <!--td>{{ $u->referralFollowup->note }}</td-->

                                    <!-- <td class="row-{{ $u['id'] }}" onclick="window.location.href = '{{ route('view.referral', $u['id']) }}';" style="cursor: pointer;">{{ $u['medicaid_number'] }}</td> -->
                                    <td class="row-{{ $u['id'] }}">{{ $u['email'] }}</td>
                                    <td class="row-{{ $u['id'] }}" onclick="window.location.href = '{{ route('view.referral', $u['id']) }}';" style="cursor: pointer;">
                                        @switch($u['source_type'])
                                        @case('account')
                                        @php
                                        $account = \App\Models\User::find($u['source']); // Replace 'Account' with your actual model name for accounts
                                        @endphp
                                        @if ($account)
                                        {{ $account->name }}
                                        <b>(vendor)</b>
                                        @else
                                        Account not found
                                        @endif
                                        @break

                                        @case('contact')
                                        @php
                                        $contact = \App\Models\contacts::find($u['source']);
                                        @endphp
                                        @if ($contact)
                                        {{ $contact->fname }} {{ $contact->lname }} <b>(contact)</b>
                                        @else
                                        Account not found
                                        @endif
                                        @break

                                        @case('FnF')
                                        @if ($u['source'])
                                        {{ $u['source'] }} <b>(friend or family)</b>
                                        @else
                                        Friend or Family name not found
                                        @endif
                                        @break

                                        @case('walk_in')
                                        <b>Walk In</b>
                                        @break
                                        @case('manual')
                                        <b>Manual</b>
                                        @break

                                        @default
                                        N/A
                                        @endswitch
                                    </td>
                                    <th class="row-{{ $u['id'] }}">
                                        @if ($u->status == 'Pending')
                                        <div class="dropdown">
                                            <button class="btn pt-1 pb-1
                                                            @if ($u->status == 'Admitted') btn-primary
                                                            @elseif ($u->status == 'Pending') btn-primary
                                                            @elseif ($u->status == 'Rejected') btn-primary @endif
                                                            dropdown-toggle" type="button" id="statusDropdown{{ $u->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ $u->status }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="statusDropdown{{ $u->id }}">
                                                <a class="dropdown-item status-option" href="#" data-value="Admitted">Admitted</a>
                                                <a class="dropdown-item status-option" href="#" data-value="Rejected">Rejected</a>
                                            </div>
                                        </div>
                                        @else
                                        <button style="font-size:14px" class="btn
                                                        @if ($u->status == 'Admitted') btn-secondary
                                                        @elseif ($u->status == 'Rejected') btn-warning @endif pt-1 pb-1">
                                            {{ $u->status }}
                                        </button>
                                        @endif
                                    </th>
                                    <td>{{ us_date_format($u->admission_date) }}</td>
                                    <td>{{ $u->created_by }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endsection
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                <script type="text/javascript"
                        src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('.dataTable').DataTable({
                            aLengthMenu: [
                                [25, 50, 100, -1],
                                [25, 50, 100, "All"]
                            ],
                            "order": false
                        });
                        $('.convert-btn').on('click', function (e) {
                            e.preventDefault();
                            var id = $(this).attr('data-id');
                            Swal.fire({
                                title: 'Need Approval!',
                                text: "Are you sure ,You want to convert this account to customer account",
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: 'secondary',
                                confirmButtonText: 'Yes, convert it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $(this).text('Converting to customer...');
                                    $.ajax({
                                        type: "POST",
                                        url: "{{ route('convert.to.referral') }}",
                                        data: {
                                            _token: "{{ csrf_token() }}",
                                            id: id,
                                        },
                                        success: function (data) {
                                            $('.custom-design-' + id).text('Converted to customer').addClass('dropdown-item').removeClass('btn btn-primary convert-btn');
                                            $('.custom-design-' + id).prop('disabled', true);
                                            swal.fire('success', data.success, 'success')
                                        },
                                        error: function (xhr) {
                                            erroralert(xhr);
                                        }
                                    });
                                }
                            })
                        })
                        $('.deleteBtn').on('click', function (e) {
                            e.preventDefault()
                            var id = $(this).attr('data-id');
                            Swal.fire({
                                title: 'Warning!',
                                text: "Are you sure ,You want to delete it",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: 'secondary',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    $.ajax({
                                        url: '/referral/delete/' + id,
                                        type: 'get',
                                        success: function () {
                                            swal.fire('success', 'Referral deleted successfully!',
                                                'success');
                                            $('.row-' + id).addClass('d-none');
                                        },
                                        error: function () {

                                        }
                                    })
                                }
                            })
                        })
                    });
                    $(document).ready(function () {
                        $('.status-option').on('click', function () {
                            var selectedStatus = $(this).data('value');
                            var dropdown = $(this).closest('.dropdown');
                            var dropdownButton = dropdown.find('.dropdown-toggle');
                            var itemId = dropdownButton.attr('id').replace('statusDropdown', '');
                            Swal.fire({
                                title: 'Confirm Status Change',
                                text: 'Are you sure you want to change the status?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: 'secondary',
                                confirmButtonText: 'Yes'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '/referral/status/' + itemId,
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            status: selectedStatus
                                        },
                                        success: function (response) {
                                            dropdownButton.text(selectedStatus);
                                            dropdownButton.removeClass(
                                                'btn-success btn-warning btn-danger');
                                            dropdownButton.addClass('btn-' + (selectedStatus ===
                                            'Admitted' ? 'success' : (selectedStatus ===
                                            'Pending' ? 'warning' : 'danger')));
                                            Swal.fire({
                                                title: 'Status Updated',
                                                text: 'The status has been successfully updated.',
                                                icon: 'success',
                                            });
                                            location.reload();
                                        },
                                        error: function (xhr, status, error) {
                                            Swal.fire({
                                                title: 'Error',
                                                text: 'An error occurred while updating the status.',
                                                icon: 'error'
                                            });
                                        }
                                    });
                                }
                            });
                        });
                    });
                </script>

@extends('nav')
@section('title', 'Leads | Senior Life Care Trusts')
@section('wrapper')
@php
    $user = App\Models\User::find(Session::get('loginId'));
@endphp
    <head>

</head>
   <div>
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Lead</b></div>
        </h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <div class="d-flex align-items-center p-3 mb-1">
                        <div>
                            <h5 class="mb-1">Manage Leads</h5>
                            <p class="mb-0 font-13 text-secondary "><i class='bx bxs-calendar'></i>Overall Lead</p>
                        </div>
                        <div class="ms-auto">
                            @if ($user->hasPermissionTo('Add Lead'))
                            <a href="{{ route('add.lead') }}" class="btn btn-primary print-btn pb-1 pt-1 " style="color: white;">
                               <i class="bx bx-save pb-1"></i>Add Lead </a>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap overflow-auto p-3" style="margin-top: -15px">
                        <table class="table align-middle mb-0 table-hover dataTable">
                            <thead class="table-light">
                        <tr style="white-space:nowrap">
                            <th>Actions</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Status</th>
                            <th>Lead Type</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Patient First Name</th>
                            <th>Patient Last Name</th>
                            <th>Patient Email</th>
                            <th>Assign To</th>
                            <th>Lead Source</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($leads as $k => $u)
                        @if ($u->converted_to_referral != 1)
                        <tr style="white-space: nowrap">
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="menu-icon tf-icons bx bx-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item pb-2" href="{{ route('view.lead', $u['id']) }}"><i class='bx bxs-show'></i>
                                            View</a>
                                        <a class="dropdown-item" href="{{ route('edit.lead', $u['id']) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="{{ route('create.referral', ['lead_id' => $u['id']]) }}"><i class="bx bx-shekel me-1"></i> Convert To Referral</a>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $u['contact_first_name'] }}</td>
                            <td>{{ $u['contact_last_name'] }}</td>
                            <td>
                                <div class="bg bg-primary text-center text-white pb-1 pt-1 rounded">{{ $u['sub_status'] }}</div>
                            </td>
                            <td>

                            <div class="bg bg-primary text-center text-white pb-1 pt-1 rounded">{{ $u->source_type }}</div>

                            </td>
                            <td>{{ $u->contact_phone }}</td>
                            <td>{{ $u->contact_email }}</td>
                            <td>{{ $u->patient_first_name }}</td>
                            <td>{{ $u->patient_last_name }}</td>
                            <td>{{ $u->patient_email }}</td>
                            <td>{{ $u->vendor_id }}</td>
                            <td> {{ $u->type_id->name ?? $u->case_type }}</td>
                            <td>{{ $u->created_at }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.dataTable').DataTable({
                    aLengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, "All"]
                    ]
                });
            });
        </script>

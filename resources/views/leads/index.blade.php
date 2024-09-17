@extends('nav')
@section('title', 'Leads | SLC Trust')
@section('wrapper')
@php
    $user = App\Models\User::find(Session::get('loginId'));
@endphp
    <head>
        <style>
            .scrol-card {
                overflow: scroll;
                /* Alowing the card to scroll */
                padding: 5% 0;
                /*For shifting your card at the top of the page */
            }
            th{
            font-size:14px !important;
            }
            /* .paginate_button {
                display: inline-block;
            }

            .paginate_button {
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
                transition: background-color .3s;
                border: 1px solid #ddd;
            }

            .dataTables_paginate a.current {
                background-color: #559e99;
                color: white;
                border: 1px solid #559e99;
            }

            .dataTables_paginate a:hover:not(.current) {
                background-color: #ddd;
            } */

        .export-file2 {
            right: 266px
        }
        td{
                vertical-align: middle !important;
            }
    </style>

</head>
<div class="">
    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / All Leads</h5>
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card p-3">
                <div class="d-flex align-items-center mb-1 pb-2">
                    <div>
                        <h5 class="mb-1">Manage Leads</h5>
                        <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall leads</p>
                    </div>
                    {{-- <div class="ms-auto">
                            <a href="{{ route('add.lead') }}"
                    class="btn btn-primary import-file-user-data print-btn pb-1 pt-1">
                    Add Lead
                    </a>
                </div> --}}
            </div>
            <div class="table-responsive text-nowrap overflow-auto pt-1">
                <table class="table align-middle mb-0 table-hover dataTable">
                    <thead class="table-light">
                        <tr style="white-space:nowrap">
                            <th>ID</th>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($leads as $k => $u)
                        @if ($u->converted_to_referral != 1)
                        <tr style="white-space: nowrap">
                            <td>
                                <a href="{{ route('edit.lead', $u['id']) }}">
                                    <b>
                                        {{ $u->id }}
                                    </b>
                                </a>
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
                            <td>{{ $u->name }}</td>
                            <td> {{ $u->type_id->name ?? $u->case_type }}</td>
                            <td>{{ us_date_format($u->created_at) }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="menu-icon tf-icons bx bx-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item pb-2" href="{{ route('view.lead', $u['id']) }}"><i class='bx bxs-show'></i>
                                            View</a>
                                        <a class="dropdown-item" href="{{ route('edit.lead', $u['id']) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

            });
        </script>

        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.dataTable').DataTable({
                    aLengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, "All"]
                    ],


                    // "order": false // "0" means First column and "desc" is order type;
                });
            });
        </script>

@extends('nav')
@section('title', 'Reports Senior Life Care Trusts')
@section('wrapper')

    <head>
        <style>
            .scrol-card {
                overflow: scroll;
                /* Alowing the card to scroll */
                padding: 5% 0;
                /*For shifting your card at the top of the page */
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
        </style>

    </head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / All Reports</h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    {{-- <h5 class="card-header"><b>{{ $user->name }}</b></h5> --}}
                    <div class="d-flex justify-content-between align-items-">
                        <br>
                        <br>
                        <div>
                            <a href="{{ route('add.report') }}"
                                class="btn btn-primary import-file-user-data print-btn btn-lg pb-1 pt-1">
                                Add Report <i class=""></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive overflow-auto pb-2 ">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>UID#</th>
                                        <th>Profile</th>
                                        <th>Status</th>
                                        <th>Phone</th>
                                        <th>Relationship to Patient</th>
                                        <th>Patient Profile</th>
                                        <th>Assigned To</th>
                                        <th>Lead Source</th>
                                        <th>Follow-Up Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendors as $k => $u)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>
                                                <a href="{{ route('edit.lead', $u['id']) }}">{{ $u['name'] }}
                                                    {{ $u['contact_last_name'] }}
                                                    <br>
                                                    email: {{ $u['contact_email'] }}
                                                </a>
                                            </td>
                                            <td> Status: {{ $u['sub_status'] }} <br>
                                                Type: {{ $u['case_type'] }}
                                            </td>
                                            <td>{{ $u['contact_phone'] }}</td>
                                            <td>{{ $u['relation_to_patient'] }}</td>
                                            <td>{{ $u['patient_first_name'] }} {{ $u['patient_last_name'] }}
                                                <br>email: {{ $u['patient_email'] }} <br>
                                                Phone: {{ $u['patient_phone'] }}
                                            </td>
                                            <td>{{ isset($u['vendor']) ? $u['vendor']['name'] : 'N/A' }}</td>
                                            <td>{{ isset($u['contact']) ? $u['contact']['fname'] . ' ' . $u['contact']['lname'] : 'N/A' }}
                                            </td>
                                            <td>{{ $u['date'] }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="menu-icon tf-icons bx bx-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('view.vendors', $u['id']) }}">
                                                            <i class='bx bxs-show'></i>
                                                            View</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit.lead', $u['id']) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
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
            @endsection
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {});
            </script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable({
                        aLengthMenu: [
                            [25, 50, 100, -1],
                            [25, 50, 100, "All"]
                        ],
                        // "order": false // "0" means First column and "desc" is order type;
                    });
                });
            </script>

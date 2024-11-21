@extends('nav')
@section('title', 'Vendors | Senior Life Care Trusts')
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

            .export-file2 {
                right: 266px
            }
            .dataTables_filter{
                margin-top: 5px !important;
            }
        </style>
    </head>
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Vendors</b> </div>
        </h5>
        <div class="row ">
            <div class="col-lg-12 mb-12 ">
                <div class="card">
                    <div class="d-flex align-items-center p-3 mb-1">
                        <div>
                            <h5 class="mb-1">Manage Vendors</h5>
                            <p class="mb-0 font-13 text-secondary "><i class='bx bxs-calendar'></i>Overall Vendors</p>
                        </div>
                        <div class="ms-auto">
                            @if ($user->hasPermissionTo('Add Account'))
                            <a href="{{ route('add.vendors') }}" class="btn btn-primary print-btn pb-1 pt-1 " style="color: white;">
                               <i class="bx bx-save pb-1"></i>Add Vendor </a>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap  overflow-auto p-3"  style="margin-top: -15px">
                        <table class="table align-middle mb-0 table-hover dataTable ">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center">Actions</th>
                                <th>Name</th>
                                <th style="width: 15%">Phone</th>
                                <th style="width: 20%">Email</th>
                                {{-- <th>Address</th> --}}
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vendors as $k => $u)
                                <tr>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{ route('view.vendors', $u['id']) }}"><i
                                                        class='bx bxs-show'></i> View</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('edit.vendors', $u['id']) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                       <a href="{{ route('view.vendors', ['id'=>$u->id]) }}">{{ $u->name . ' ' . $u->last_name }}</a>
                                    </td>

                                    <td>{{ $u['phone'] }}</td>
                                    <td>{{ $u->email }} </td>
                                    <td>{{ $u['address'] }}</td>
                                </tr>
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
                        ],
                         "order": false // "0" means First column and "desc" is order type;
                    });
                });
            </script>

@extends('nav')
@section('title', 'Accounts | Intrustpit')
@section('wrapper')

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
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / All Accounts</h5>
        <div class="row ">
            <div class="col-lg-12 mb-12 ">
                <div class="card ">
                    <div class="d-flex align-items-center p-3 ">
                        <div>
                          <h5 class="mb-1">Manage Accounts</h5>
                          <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>All Accounts</p>
                        </div>
                      </div>
                    <div class="table-responsive text-nowrap  overflow-auto p-3"  style="margin-top: -15px">
                        <table class="table align-middle mb-0 table-hover dataTable ">
                            <thead class="table-light">
                            <tr>
                                <th>Account Name</th>
                                <th style="width: 15%">Phone</th>
                                <th style="width: 20%">Email</th>
                                {{-- <th>Address</th> --}}
                                <th>Address</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($vendors as $k => $u)
                                <tr>
                                    <td>
                                       <a href="{{ route('view.accounts', ['id'=>$u->id]) }}">{{ $u->name . ' ' . $u->last_name }}</a>
                                    </td>

                                    <td>{{ $u['phone'] }}</td>
                                    <td>{{ $u->email }} </td>
                                    <td>{{ $u['address'] }}</td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{ route('view.accounts', $u['id']) }}"><i
                                                        class='bx bxs-show'></i> View</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('edit.accounts', $u['id']) }}"><i
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

@extends('nav')
@section('title', 'Followups | SLC Trusts')
@section('wrapper')
    @include('follow-up-new.create')
    @include('follow-up-new.update')
    @include('types.update')
    <?php

    use App\Models\User;

    $role = User::where('id', Session::get('loginId'))->value('role');

    ?>
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
            <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Follow Ups</b> </div>
        </h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <div class="d-flex align-items-center p-3 mb-0">
                        <div>
                            <h5 class="mb-1">Manage Follow Ups</h5>
                            <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall Follow Ups</p>
                        </div>
                        <div class="font-22 ms-auto">
                            <button class="btn btn-primary import-file-user-data TypeAddBtn print-btn px-2 py-1 ">
                                <i class='bx bx-save pb-2 pt-1 px-0 mx-0'></i>
                                Add Follow Up
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-3" style="margin-top: -15px">
                        <div class="table-responsive text-nowrap overflow-auto pb-2 mt-2">
                            <table class="table align-middle mb-0 table-hover dataTable" id="">
                                <thead class="table-light">
                                <tr>
                                    <th>UID#</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Time</th>
                                    <th>Follow Up</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $followup)
                                    <tr class="row-{{ $followup['id'] }}">
                                        <td>{{ $followup->id }}</td>
                                        <td>{{ $from->name }} {{ $from->last_name }}</td>
                                        <td>{{ $followup->employee->full_name() }}</td>
                                        <td>{{ $followup->time }}</td>
                                        <td>
                                            <div class="text-break" style="max-width:800px; overflow:auto; white-spaces:normal;">
                                                {{ $followup->note }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="menu-icon tf-icons bx bx-cog"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item TypeEditBtn pb-2" id="" data-to="{{ $followup->to }}" data-referral="{{ $followup->referral_id }}" data-note="{{ $followup->note }}" data-id="{{ $followup->id }}" data-from="{{ $followup->from }}" data-date="{{ $followup->date }}" data-time="{{ $followup->time }}">
                                                        <i class='bx bx-edit-alt me-1'></i> Edit</button>
                                                    <button type="button" data-id="{{ $followup['id'] }}" class="dropdown-item deleteBtn">
                                                        <i class="bx bx-trash-alt me-1"></i> Delete
                                                    </button>
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
                <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
                <script>
                    $(document).ready(function($) {
                        $('#dataTable').DataTable({
                            aLengthMenu: [
                                [25, 50, 100, -1],
                                [25, 50, 100, "All"]
                            ],
                            "order": false
                        });

                        $('.deleteBtn').on('click', function(e) {
                            e.preventDefault()
                            var id = $(this).attr('data-id');
                            Swal.fire({
                                title: 'Warning!',
                                text: "Are you sure ,You want to delete it",
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
                                        url: '/follow-up/delete/' + id,
                                        type: 'post',
                                        success: function() {
                                            swal.fire('success', 'Type deleted successfully!',
                                                'success');
                                            $('.row-' + id).addClass('d-none');
                                        }
                                    })
                                }
                            })
                        })
                    });

                    $(document).ready(function() {
                        $('.dataTable').DataTable({
                            aLengthMenu: [
                                [25, 50, 100, -1],
                                [25, 50, 100, "All"]
                            ],
                            // "order": true,
                            "order": [[0, "desc"]],
                        });
                    });
                </script>

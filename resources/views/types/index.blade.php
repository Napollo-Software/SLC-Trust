@extends('nav')
@section('title', 'Types | SLC Trust')
@section('wrapper')
    @include('types.create')
    @include('types.update')

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
        </style>

    </head>
    <?php

    use App\Models\User;

    $role = User::where('id', '=', Session::get('loginId'))->value('role');

    ?>
    <div class="">
        <h5 class=" d-flex justify-content-between pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Manage Types</b> </div>
        </h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <div class="d-flex align-items-center p-3 mb-0">
                        <div>
                            <h5 class="mb-1">Manage Types</h5>
                            <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall entries</p>
                        </div>

                        <div class="font-22 ms-auto">
                            <button class="btn btn-primary import-file-user-data TypeAddBtn print-btn px-2 py-1">
                                <i class='bx bx-save pb-2 pt-1 px-0 mx-0'></i>
                                Add Type
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top: -20px">
                        <div class="table-responsive text-nowrap overflow-auto pb-2">
                            <table class="table align-middle mb-0 table-hover dataTable" id="types_details">
                                <thead class="table-light">
                                    <tr>
                                        <th>UID#</th>
                                        <th>Name</th>
                                        <th>Catrgory</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $k => $u)
                                    <tr class="row-{{ $u['id'] }}">
                                            <td>{{ $k + 1 }}</td>
                                            <td>
                                                <a href="{{ route('view.type', $u['id']) }}">{{ $u['name'] }}</a>
                                            </td>
                                            <td>{{ $u['category'] }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="menu-icon tf-icons bx bx-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item editBtn" id="{{ $u['id'] }}"><i
                                                                class='bx bx-edit-alt mb-2'></i> Edit</button>
                                                        <button type="button" id="{{ $u['id'] }}"
                                                            class="dropdown-item deleteBtn">
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
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            @endsection
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
            <script>
                $(document).ready(function() {
                    function hideAddTypeModal() {
                        $('#addType').modal('hide');
                    }

                    function showAddTypeModal() {
                        $('#addType').modal('show');
                    }

                    $('.closeAddType').on('click', function(e) {
                        e.preventDefault();
                        hideAddTypeModal();
                    });

                    $('.TypeAddBtn').on('click', function(e) {
                        e.preventDefault();
                        showAddTypeModal();
                    });


                    $('#dataTable').DataTable({
                        aLengthMenu: [
                            [25, 50, 100, -1],
                            [25, 50, 100, "All"]
                        ],
                        "order": false
                    });

                    $('.deleteBtn').on('click', function(e) {
                        e.preventDefault();
                        var id = $(this).attr('id');
                        Swal.fire({
                            title: 'Warning!',
                            text: "Are you sure you want to delete it?",
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
                                    url: '/types/delete/' + id,
                                    type: 'post',
                                    success: function() {
                                        swal.fire('success', 'Type deleted successfully!',
                                            'success');
                                            $('.row-'+id).addClass('d-none');

                                    },
                                    error: function() {
                                        // Handle error if needed
                                    }
                                });
                            }
                        });
                    });
                });
            </script>
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

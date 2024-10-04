@extends('nav')
@section('title', 'Documnts | SLC Trusts')
@section('wrapper')

    <head>
        <style>
            .thumbnail-container {
                display: flex;
                justify-content: center;
            }

            .custom-thumbnail {
                max-width: 100%;
                max-height: 70px;
                object-fit: cover;
            }

            .scrol-card {
                overflow: scroll;
                /* Alowing the card to scroll */
                padding: 5% 0;
                /*For shifting your card at the top of the page */
            }

            /* .paginate_button {                                                                                                                                      display: inline-block;                                                                                                      background-color: #ddd;                                                                                                   } */
            .export-file2 {
                right: 266px
            }
        </style>
    </head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / All Documents</h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <h5 class="card-header"><b>All Referrals</b></h5>
                    <div class="d-flex justify-content-between ">
                        <div>
                            <a href="{{ route('document.genratePdf') }}"
                                class="btn btn-primary import-file-user-data print-btn pb-1 pt-1">
                                Genrate & Send PDF <i class=""></i>
                            </a>
                        </div>
                        <div class="card-body col-md-8">
                            <form id="emailForm" action="{{ route('document.sendSelectedEmail') }}" method="POST">
                                @csrf
                                <div class="table-responsive overflow-auto pb-2">
                                    <table class="table table-bordered" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>Phone Number</th>
                                                <th>Gender</th>
                                                <th>Date Of Birth</th>
                                                <th>Country, City</th>
                                                <th>Medicaid Phone</th>
                                                <th>Medicare Phone</th>
                                                <th>Email Status</th>
                                                <th>Actions</th>
                                                <th>Select</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($referral as $k => $u)
                                                <tr>
                                                    <td>
                                                        Name: {{ $u['first_name'] }} <br>
                                                        Age: {{ $u['age'] }} <br>
                                                        email:{{ $u['email'] }}
                                                    </td>
                                                    <td>{{ $u['phone_number'] }}</td>
                                                    <td>{{ $u['gender'] }}</td>
                                                    <td>{{ $u['date_of_birth'] }}</td>
                                                    <td>
                                                        Country:{{ $u['country'] }} <br>
                                                        City:{{ $u['city'] }}
                                                    </td>
                                                    <td>{{ $u['medicaid_number'] }}</td>
                                                    <td>{{ $u['medicare_number'] }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn
                                                                @if ($u->email_status == 'Sent') btn-success @endif
                                                                @if ($u->email_status == 'Pending') btn-warning @endif
                                                                dropdown-toggle"
                                                                type="button" id="statusDropdown{{ $u->id }}"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                {{ $u->email_status }}
                                                            </button>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="statusDropdown{{ $u->id }}">
                                                                <a class="dropdown-item email-option" href="#"
                                                                    data-value="Pending">Pending</a>
                                                                <a class="dropdown-item email-option" href="#"
                                                                    data-value="Sent">Sent</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('view.referral', $u['id']) }}"><i
                                                                        class='bx bxs-show'></i>View</a>
                                                                <button type="button" data-id="{{ $u['id'] }}"
                                                                    data-no="{{ $u['phone_number'] }}"
                                                                    class="dropdown-item deleteBtn">
                                                                    <i class="bx bx-trash-alt me-1"></i> Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="selected_users[]" value="{{ $u['id'] }}">

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-3 text-end">
                                    <button type="submit" class="btn btn-primary">Send Email</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive overflow-auto pb-2 ">
                    </div>
                </div>
            </div>
            <div class="modal fade no-print" id="customerdposit" tabindex="-1" role="dialog"
                aria-labelledby="customerdpositLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-1" id="customerdpositLabel">Upload Your File</h5>
                            <button type="button" class="close btn-secondary rounded" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('upload.docs') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="    modal-body">
                                <input type="hidden" value="">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <label class="form-label ">Upload Doc <br><small>(You can either Upload 1 or
                                                multiple document )</small> </label>
                                        <input type="file" class="form-control" name="file[]" multiple required
                                            accept="application/pdf,image/jpeg,image/png">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary preview">Upload</button>
                                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="d-flex justify-content-between no-print">
                    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Uploaded documents</b></span></h5>
                    <small><button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#customerdposit">
                            Upload document <i class='menu-icon pb-1 tf-icons bx bx-file '></i>
                        </button></small>
                </div>
                <div class="row">
                    <div class="col-md-3 mt-4">
                        <div class="card d-none" >
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <button type="button" class="btn btn-primary mb-2">Service</button>
                                    <button type="button" class="btn btn-primary">SMS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 mt-4">
                        <div class=" card   ">
                            <div class="card-body  overflow-auto ">
                                <table class="table table-bordered dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width:20%">Doc ID</th>
                                            <th style="width:15%">Created By</th>
                                            <th>Document Details</th>
                                            <th>Status</th>
                                            <th style="width:20%">Approved By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($document as $item)
                                            <tr>
                                                <td>Doc # {{ substr("000{$item->id}", 1) }}</td>
                                                <td>
                                                    {{ $item->user_details->name }}
                                                </td>
                                                <td>
                                                    <?php $document_type = pathinfo($item->file); ?>
                                                    <div class="card col-md-12" style="padding: 0;">
                                                        <div class="card-body " style="padding: 0;">
                                                            <a href="docs/{{ $item->file }}" target="_blank">
                                                               @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                                                    <img src="img/pdf_icon.png" alt=""
                                                                        class="img-thumbnail">
                                                                @else
                                                                    <div class="thumbnail-container">
                                                                        <img src="docs/{{ $item->file }}"
                                                                            alt=""
                                                                            class="img-thumbnail custom-thumbnail">
                                                                    </div>
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="card-footer  p-2">
                                                            <a href="docs/{{ $item->file }}" download
                                                                class="text-primary d-flex align-items-center"
                                                                style="font-size: 12">
                                                                <i class="bx bx-download me-1"></i>
                                                                Download
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <th>
                                                    <div class="dropdown">
                                                        <button
                                                            class="btn
                                                        @if ($item->status == 'Approved') btn-success @endif
                                                        @if ($item->status == 'Pending') btn-warning @endif
                                                        @if ($item->status == 'Rejected') btn-danger @endif
                                                        dropdown-toggle"
                                                            type="button" id="statusDropdown{{ $item->id }}"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            {{ $item->status }}
                                                        </button>
                                                        <div class="dropdown-menu"
                                                            aria-labelledby="statusDropdown{{ $item->id }}">
                                                            <a class="dropdown-item status-option" href="#"
                                                                data-value="Pending">Pending</a>
                                                            <a class="dropdown-item status-option" href="#"
                                                                data-value="Approved">Approved</a>
                                                            <a class="dropdown-item status-option" href="#"
                                                                data-value="Rejected">Rejected</a>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td id="approved-by-{{ $item->id }}">
                                                    @if ($item->approved === null || $item->status !== 'Approved')
                                                        N/A
                                                    @else
                                                        {{ $item->approver->name }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="menu-icon tf-icons bx bx-cog"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <button type="button" data-id="{{ $item['id'] }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                aLengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                // "order": false
            });
            $(document).ready(function() {
                $('.status-option').on('click', function() {
                    var selectedStatus = $(this).data('value');
                    $('#statusDropdown').text(selectedStatus);
                });
            });
            $('.deleteBtn').on('click', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var number = $(this).attr('data-no');
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
                            url: (number === undefined) ? '/document/delete/' + id :
                                '/referral/delete/' + id,
                            type: 'get',
                            success: function() {
                                Swal.fire('Success', 'deleted successfully!',
                                    'success');
                                window.location.reload();
                            },
                            error: function() {
                                Swal.fire('Error', 'Error deleting document', 'error');
                            }
                        });
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.status-option').on('click', function() {
                var selectedStatus = $(this).data('value');
                var dropdownButton = $(this).closest('.dropdown').find('.dropdown-toggle');
                var itemId = dropdownButton.attr('id').replace('statusDropdown', '');
                Swal.fire({
                    title: 'Confirm Status Change',
                    text: 'Are you sure you want to change the status?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '/referral/email/' + itemId,
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: selectedStatus
                            },
                            success: function(response) {
                                dropdownButton.text(selectedStatus);
                                dropdownButton.removeClass(
                                    'btn-success btn-warning btn-danger'
                                );
                                if (selectedStatus === 'Approved') {
                                    dropdownButton.addClass('btn-success');
                                } else if (selectedStatus === 'Pending') {
                                    dropdownButton.addClass('btn-warning');
                                } else if (selectedStatus === 'Rejected') {
                                    dropdownButton.addClass('btn-danger');
                                }
                                Swal.fire({
                                    title: 'Status Updated',
                                    text: 'The status has been successfully updated.',
                                    icon: 'success',

                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
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

        $(document).ready(function() {
            $('.email-option').on('click', function() {
                var selectedStatus = $(this).data('value');
                var dropdownButton = $(this).closest('.dropdown').find('.dropdown-toggle');
                var itemId = dropdownButton.attr('id').replace('statusDropdown', '');

                Swal.fire({
                    title: 'Confirm Status Change',
                    text: 'Are you sure you want to change the status?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '/referral/email/' + itemId,
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: selectedStatus
                            },
                            success: function(response) {
                                dropdownButton.text(selectedStatus);
                                dropdownButton.removeClass(
                                    'btn-success btn-warning btn-danger'
                                );
                                if (selectedStatus === 'Approved') {
                                    dropdownButton.addClass('btn-success');
                                } else if (selectedStatus === 'Pending') {
                                    dropdownButton.addClass('btn-warning');
                                } else if (selectedStatus === 'Rejected') {
                                    dropdownButton.addClass('btn-danger');
                                }
                                Swal.fire({
                                    title: 'Status Updated',
                                    text: 'The status has been successfully updated.',
                                    icon: 'success',

                                }).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
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

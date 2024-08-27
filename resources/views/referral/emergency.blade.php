@extends('nav')
@section('title', 'Emergency | SLC Trust')
@section('wrapper')

    <head>
        <style>
            .scrol-card {
                overflow: scroll;
                /* Alowing the card to scroll */
                padding: 5% 0;
                /*For shifting your card at the top of the page */
            }

            .paginate_button {
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
                background-color: #2ecfde;
                color: white;
                border: 1px solid #2ecfde;
            }

            .dataTables_paginate a:hover:not(.current) {
                background-color: #ddd;
            }

            .export-file2 {
                right: 266px
            }
        </style>

    </head>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Emergency Details</h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <h5 class="card-header"><b>Emergency Details</b></h5>
                    <div class="d-flex justify-content-between align-items- ">

                        <div>
                            <a class="btn btn-primary import-file-user-data print-btn btn-lg pb-1 pt-1" data-toggle="collapse" data-target="#hiddenCard" style="color: white">Edit/Add</a>
                        </div>
                    </div>


                    <div class="card-body ">

                        <div class="table-responsive overflow-auto pb-2 ">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>UID#</th>
                                        <th>Full Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Relationship</th>
                                        <th>EXT Number</th>
                                        <th>Address</th>
                                        <th>City</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $k => $u)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $u['emergency_first_name'] }}{{ $u['last_first_name'] }}</td>
                                            <td>{{ $u['emergency_phone_number'] }}</td>
                                            <td>{{ $u['emergency_email'] }}</td>
                                            <td>{{ $u['emergency_relationship'] }}</td>
                                            <td>{{ $u['emergency_ext_number'] }}</td>
                                            <td>{{ $u['emergency_address'] }}</td>
                                            <td>{{ $u['emergency_city'] }}</td>
                                        </tr>

                                </tbody>
                            </table>

                        </div>
                        <div class="collapse" id="hiddenCard">
                            <div class="col-md-12">

                            <form id="emergencyEdit">
                                @csrf
                                <div class="card mb-3">
                                    <div class='card-header'>
                                        Emergency Contact
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <label for="form-label">First Name*</label>
                                                <input type="text" class="form-control" id="emergency__first_name"
                                                    name="emergency_first_name" value="{{ $u->emergency_first_name }}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">Last Name*</label>
                                                <input type="text" class="form-control"
                                                    id="emergency_last_name"name="emergency_last_name"
                                                    value="{{ $u->emergency_last_name }}">
                                            </div>

                                            <div class="col-md-6 ">
                                                <label for="form-label">Phone Number*</label>
                                                <input type="text" class="form-control" id="emergency_phone"
                                                    name="emergency_phone" value="{{ $u->emergency_phone_number }}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">Ext Number*</label>
                                                <input type="number" class="form-control"
                                                    id="emergency_ext"name="emergency_ext"
                                                    value="{{ $u->emergency_ext_number }}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">Email*</label>
                                                <input type="text" class="form-control" id="emergency_email"
                                                    name="emergency_email" value="{{ $u->emergency_email }}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">Relationship To Patient</label>
                                                <select name="emegency_relationship" class="form-select">
                                                    <option value="{{ $u->emergency_relationshipt }}">
                                                        {{ $u->emergency_relationship }}</option>
                                                    <option value="">Select One</option>
                                                    <option value="child">Child</option>
                                                    <option value="client">Parent</option>
                                                    <option value="consumer">Friend</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 text-secondary">
                                                <label for="form-label">State/Province</label>

                                                <select id="defaultSelect" class="form-select" name="emergency_state">
                                                    <option value="{{ $u->emergency_state }}">Choose One</option>
                                                    @foreach (App\Models\City::select('state')->distinct()->get() as $state)
                                                        <option
                                                            @if (old('state') == $state->state) {{ 'selected' }} @endif
                                                            value="{{ $state->state }}">{{ $state->state }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('state')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">City</label>
                                                <input type="text" class="form-control" id="emergency_city"
                                                    name="emergency_city" value="{{ $u->emergency_city }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="form-label">Address</label>
                                                <input type="text" class="form-control"
                                                    id="emergency_address"name="emergency_address"
                                                    value="{{ $u->emergency_address }}">
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">Zip Code/Postal Code</label>
                                                <input type="number" class="form-control" id="emergency_zip"
                                                    name="emergency_zip" {{ $u->emergency_zip_code }}>
                                            </div>
                                            <div class="col-md-6 ">
                                                <label for="form-label">APT/SUITE </label>
                                                <input type="text" class="form-control" id="emergency_apt"
                                                    name="emergency_apt" value="{{ $u->emergency_apt_suite }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="option1">Lives with parents</label>
                                                <input type="checkbox" id="live_with_parent" name="live_with_parent"
                                                    value="1">
                                            </div>
                                            <div class="form-group">
                                                <label for="option2">Have keys</label>
                                                <input type="checkbox" id="have_keys" name="have_keys" value="1">
                                            </div>
                                            <input type="hidden" name="id" value="{{ $u->id }}">

                                            <div>
                                            </div>
                                            <div>
                                                <button type="submit" class="btn btn-secondary">Submit </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                        @endforeach

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
                                    url: '/referral/delete/' + id,
                                    type: 'post',
                                    success: function() {
                                        swal.fire('success', 'Type deleted successfully!',
                                            'success');
                                        window.location.reload();
                                    },
                                    error: function() {

                                    }
                                })
                            }
                        })
                    })
                });


                $(document).on('submit', '#emergencyEdit', function(e) {
                    e.preventDefault();
                    $('.form-control').removeClass('is-invalid');
                    $('.invalid-feedback.is-invalid').remove();
                    $('.contact-button').attr('disabled', true);
                    var formData = new FormData(this);
                    $('input[type="checkbox"]').each(function(index, checkbox) {
                        formData.append($(checkbox).attr('name'), $(checkbox).is(':checked') ? 1 : 0);
                    });
                    $.ajax({
                        'url': "{{ route('edit.emergency') }}",
                        'method': "POST",
                        'data': formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(data) {
                            $("form").trigger("reset");
                            swal.fire('Success', 'Referral has been created successfully', 'success');
                            window.location.href = '{{ route('referral.list') }}';
                        },
                        error: function(xhr) {
                            erroralert(xhr);
                            $('.contact-button').attr('disabled', false);
                        }
                    });
                });
            </script>

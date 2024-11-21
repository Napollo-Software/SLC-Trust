@extends('nav')
@section('title', 'Contacts Senior Life Care Trusts')
@section('wrapper')
@php
    $user = App\Models\User::find(Session::get('loginId'));
@endphp
    @include('contacts.create')
    @include('contacts.update')
    <style type="text/css">
        #hidden_div {
            display: none;
        }

        #hidden_div2 {
            display: none;
        }

        .search-nav {
            padding-bottom: 5%;
        }

        th {
            width: auto !important;
        }
    </style>
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Contacts</b> </div>
        </h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <div class="d-flex align-items-center p-3 mb-1">
                        <div>
                            <h5 class="mb-1">Manage Contacts</h5>
                            <p class="mb-0 font-13 text-secondary "><i class='bx bxs-calendar'></i>Overall Contacts</p>
                        </div>
                        <div class="ms-auto">
                            @if ($user->hasPermissionTo('Add Contact'))
                            <a class="btn btn-primary ContactAddBtn print-btn pb-1 pt-1 " style="color: white;">
                               <i class="bx bx-save pb-1"></i>Add Contact </a>
                            @endif
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap overflow-auto p-3" style="margin-top: -15px">
                        <table class="table align-middle mb-0 table-hover dataTable">
                            <thead class="table-light">
                            <tr>
                                <th class="text-center">Actions</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Contact Type</th>
                                <th>Address</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $item)
                                <tr class="row-{{ $item['id'] }}">
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                @if ($user->hasPermissionTo('Edit Contact'))
                                                <button class="dropdown-item edit-contact ContactEditBtn"
                                                        data-id="{{ $item['id'] }}" data-toggle="modal"><i
                                                        class='bx bxs-edit'></i> Edit
                                                </button>
                                                @endif
                                                @if ($user->hasPermissionTo('Delete Contact'))
                                                <form action="{{ route('contact.delete') }}" id="delete_contact"
                                                      method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" id="contact_id"
                                                           value="{{ $item['id'] }}">
                                                    <button class="dropdown-item contact-action"
                                                            data-id="{{$item->id}}">
                                                        <i class="bx bx-trash "></i> Delete
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->fname . ' ' . $item->lname }}
                                    </td>
                                    <td>
                                        {{ $item->phone }}
                                    </td>
                                    <td>
                                        {{ $item->designation->name }}
                                    </td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->created_by }}</td>
                                    <td>{{ $item->created_at }} </td>

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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                <button type="button" class="close close-btn closeContactModal" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="contact_form">
                @csrf
                <div class="modal-body" style="margin-top:-15px">
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <label for="form-label">First Name*</label>
                            <input type="text" name="fname" maxlength="20" class="form-control"
                                placeholder="Type first name here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Last Name*</label>
                            <input type="text" name="lname" maxlength="20" class="form-control"
                                placeholder="Type last name here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Email*</label>
                            <input type="text" name="email" maxlength="40" class="form-control"
                                placeholder="Type email here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Name of Practice</label>
                            <input type="text" maxlength="40"name="name_of_practice" class="form-control"
                                placeholder="Type name of practice here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Vendor Name*</label>
                            <select name="account" class="form-control" required>
                                <option value="">Select Vendor</option>
                                @foreach ($accounts as $item)
                                    <option value="{{ $item->id }}">{{ $item->name . ' ' . $item->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                        <label for="form-label">Designation*</label>
                        <select name="designation" class="form-control " id="designation" required>
                            <option value="">Select Designation</option>
                            <option value="other">Other</option>
                            @foreach ($designation as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        </select>
                    </div>
                        <div class="col-sm-12 text-secondary other-input" style="display: none;">
                            <label for="otherType">Other Designation:</label>
                            <input type="text" id="otherType" name="other_type" value="{{ old('other_type') }}"
                                class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('other_type')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="col-md-4 p-2">
                            <label for="form-label">Fax*</label>
                            <input type="number" name="fax" maxlength="40"class="form-control"
                                placeholder="Type fax here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Ext No</label>
                            <input type="text" name="ext_no" maxlength="40"class="form-control"
                                placeholder="Type ext no here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Phone*</label>
                            <input type="text" class="form-control phone" placeholder="(___) ___-___" name="phone"
                                    id="phone"required />
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Country*</label>
                            <select name="country" class="form-control" onchange="getCountry(this)" required>
                                <option value="" disabled selected hidden>--Select an option</option>
                                <option @if (old('country') == 'United States of America') {{ 'selected' }} @endif
                                    value="United States of America">United States of America</option>
                                <option @if (old('country') == 'canada') {{ 'selected' }} @endif value="canada">Canada</option>
                            </select>
                            <span class="text-danger">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">State*</label>
                            <select id="SelectState" class="form-select" name="state">
                                <option disabled selected hidden>--Select State</option>

                            </select>
                            <span class="text-danger">
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">City*</label>
                            <input type="text" name="city"maxlength="20" class="form-control"
                                placeholder="Type city name here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Zipcode*</label>
                            <input type="text" name="zipcode"maxlength="15" class="form-control"
                                placeholder="Type zip code here" required>
                        </div>
                        <div class="col-md-8 p-2">
                            <label for="form-label">Address</label>
                            <textarea type="text" name="address" maxlength="40"placeholder="Type Address here" class="form-control address" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary contact-button mb-3">Submit</button>
                    <button type="button" class="btn btn-secondary mb-3 closeContactModal"
                        data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        function hideAddContactModal() {
            $('#exampleModal').modal('hide')
        }

        function showAddContactModal() {
            $('#exampleModal').modal('show')
        }

        $('.closeContactModal').on('click', function (e) {
            e.preventDefault()
            hideAddContactModal()
        })
        $('.ContactAddBtn').on('click', function (e) {
            e.preventDefault()
            showAddContactModal()
        })

        function hideEditContactModal() {
            $('#editContact').modal('hide')
        }

        function showEditContactModal() {
            $('#editContact').modal('show')
        }

        $('.closeContactModal').on('click', function (e) {
            e.preventDefault()
            hideEditContactModal()
        })
        $('.ContactEditBtn').on('click', function (e) {
            e.preventDefault()
            showEditContactModal()
        })
        $(document).on('click', '.contact-action', function (e) {
            e.preventDefault();
            var id = $(this).attr('data-id');

            Swal.fire({
                title: 'Warning!',
                text: "Are you sure ,You want to delete Contact",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'info',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('contact.delete') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function (data) {
                            $('.row-' + id).addClass('d-none');
                            swal.fire('success', 'Contact has been deleted successfully!', 'success');
                        },
                        error: function (xhr) {
                            erroralert(xhr)
                        }
                    })
                    //$('#delete_contact').submit();
                }
            })
        })
        $('.edit-contact').on('click', function () {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "post",
                url: "{{ route('contact.edit') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                success: function (data) {
                    $('.contact-id').val(data.id);
                    $('.fname').val(data.fname);
                    $('.lname').val(data.lname);
                    $('.account').val(data.account.id);
                    $('.designation').val(data.designation.id);
                    $('.name_of_practice').val(data.name_of_practice);
                    $('.phone').val(data.phone);
                    $('.email').val(data.email);
                    $('.fax').val(data.fax);
                    $('.ext_number').val(data.ext_number);
                    $('.country').val(data.country);
                    $('.state').val(data.state).change();
                    $('.city').val(data.city);
                    $('.zip_code').val(data.zip_code);
                    $('.address').val(data.address);

                },
                error: function (data) {
                    erroralert(data);
                }
            })
        });
        $(document).ready(function () {
            $('.dataTable').DataTable({
                aLengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "order": false
                // "0" means First column and "desc" is order type;
            });
        });
    </script>
@endsection

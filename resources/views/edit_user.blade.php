@extends('nav')
@section('title', 'View User | SLC Trusts')
@section('wrapper')
@php
$role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
@endphp
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }

</style>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div>  <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b>  /<a href="{{url('/all_users')}}" class="text-muted fw-light pointer"><b>All Users</b></a> / <b>View User</b> </div>
    </h5>
    <div class="row">
        <div class="col-xl-4">
            <form id="formAuthentication" class="mb-3" action="{{ route('update_existing_user', $user['id']) }}" method="post" enctype="multipart/form-data">
                @method('post')
                @csrf
                <input type="hidden" value="{{$user->account_status}}" class="account-status">
                <div class="card mb-4 mb-xl-0 " style="width:95%;">
                    <div class="card-header">
                        <div class="d-flex">
                            <h6 class="col-md-12 pt-2 text-center">
                                @if ($user->role == 'User')
                                Government issued photo ID
                                @else
                                Photo ID
                                @endif
                            </h6>
                            @if ($user->profile_pic != null)
                            <a href="{{ url('img/' . $user->profile_pic) }}" download>
                                <i class="bx bx-download"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="card mt-4">
                            <div class="card-body" style="padding: 0.5rem 0.5rem;margin-left:auto;margin-right:auto; ">
                                @if ($user->profile_pic == null)
                                @php
                                $app_name = config('app.name');
                                $profile = $app_name.'-Logo.png';
                                @endphp
                                @else
                                @php
                                $document_type = pathinfo($user->profile_pic);
                                if ($document_type['extension'] == 'pdf') {
                                $profile = 'pdf_icon.png';
                                } else {
                                $profile = $user->profile_pic;
                                }
                                @endphp
                                @endif
                                <a href="@if ($user->profile_pic != null) {{ url('img/' . $user->profile_pic) }} @endif" target="_blank">
                                    <img src="{{ url('img/' . $profile) }}" alt="" class="img-thumbnail" @if (isset($document_type['extension']) && $document_type['extension']=='pdf' ) style="width: 150px" @endif>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4>Profile Details</h4>
                        <span class="d-flex gap-1">
                            @if($user->account_status == 'Approved')
                            <button type="button" class="btn d-flex align-items-center btn-primary" data-bs-toggle="modal" data-bs-target="#vodModal">
                                <i class='bx bx-show-alt me-1'></i>VOD</button>
                            <a href="{{ route('approval-letter', $user->id) }}" class="btn btn-success" style="color: white;">
                                <i class="bx bxs-download me-1"></i>Approval Letter</a>
                            @if($user->role == "User")
                            <a href="{{ route('view_user', $user->id) }}" class="btn btn-secondary" style="color: white;">
                                <i class="bx bx-dollar-circle pb-1"></i>Add Balance</a>
                            @endif
                            @endif
                            <a href="{{ route('edit_user', $user->id) }}" class="btn btn-primary" style="color: white;">
                                <i class="bx bx-edit-alt pb-1"></i>Edit User </a>
                            @if ($user->id != \Company::Account_id)
                            <select id="defaultSelect" class="form-select @if ($user->account_status == 'Pending' || $user->account_status == '') bg-primary text-white @endif @if ($user->account_status == 'Approved') bg-success text-white @endif @if ($user->account_status == 'Not Approved') bg-danger text-white @endif @if ($user->account_status == 'Disable') bg-danger text-white @endif" name="account_status" data-id="{{ $user->id }}" required>
                                @if($user->account_status == 'Pending')
                                <option class="bg-white text-black" value="" disabled selected>Pending</option>
                                @endif
                                <option class="bg-white text-black" @if ($user->account_status == 'Approved') selected @endif
                                    value="Approved">Approved</option>
                                <option class="bg-white text-black" @if ($user->account_status == 'Not Approved') selected @endif
                                    value="Not Approved">Not Approved</option>
                                <option class="bg-white text-black" @if ($user->account_status == 'Disable') selected @endif
                                    value="Disable">Deactivate</option>
                            </select>
                            @endif
                        </span>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->name . ' ' . $user->last_name }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full SSN</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->full_ssn }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Date of Birth</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if (date('m-d-Y', strtotime($user->dob)) != '01-01-1970')
                            {{ date('m-d-Y', strtotime($user->dob)) }}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if ($user->phone != '+1')
                            {{ $user->phone }}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Billing Method</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->billing_method }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Billing Cycle</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if ($user->billing_cycle != null)
                            @if ($user->billing_cycle == 1)
                            1st
                            @endif
                            @if ($user->billing_cycle == 3)
                            3rd
                            @endif
                            @if ($user->billing_cycle == 7)
                            7th
                            @endif
                            @if ($user->billing_cycle == 14)
                            14th
                            @endif
                            @if ($user->billing_cycle == 21)
                            21st
                            @endif
                            @if ($user->billing_cycle == 28)
                            28th
                            @endif
                            of every month
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Balance</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if ($user->role == 'User')
                            ${{ number_format(userBalance($user->id), 2, '.', ',') }}
                            @else
                            N/A
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Surplus Amount</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->surplus_amount }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->gender }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Marital Status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->marital_status }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Notify Before</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->notify_before }} day
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->address }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">State, City</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->state. " " . $user->city }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Zipcode</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $user->zipcode }}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="approval_action" class="approval_action" value="1">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" name="approval_action" class="btn btn-primary update-profile">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="vodModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content card">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="addNoteModalLabel">VOD Letters</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 550px;overflow:auto">
                <form id="filter_vod_form" method="POST">
                    @csrf
                    <input type="hidden" id="vod_form_user_id" name="user_id" value="{{ $user->id }}">
                    <div class="row my-3">
                        <div class="col-md-4">
                            <label class="form-label">Start Date</label>
                            <input class="form-control text-center" type="date" id="startDate"
                                name="startDate" onchange="validateDate()"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">End Date</label>
                            <input class="form-control text-center " type="date" id="endDate"
                                name="endDate" onblur="validateDate()"
                                required>
                        </div>
                        <div class="col-md-4 pt-4">
                            <button type="submit" class="btn w-100 btn-primary" style="margin-top:2px">Generate Report</button>
                        </div>
                    </div>
                </form>
                <hr>
                <table id="vod_table" class="table align-middle mb-0 table-hover dataTable ">
                    <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($vod_documents as $index => $document)
                        <tr>
                            <td>{{ basename($document->vod_link) }}</td>
                            <td>{{ date('m-d-Y', strtotime($document->created_at)) }}</td>
                            <td class="text-center">
                                <a title="Click here to download the file" href="{{ url("storage/{$user->id}/vod_letters/{$document->vod_link}") }}" target="_blank">
                                    <i class="menu-icon tf-icons bx bx-download"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No vod letter found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#vod_table').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
             "order": false,
             searching: false
        });

        $('#filter_vod_form').on('submit', function(e) {
            e.preventDefault();

            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();

            const startDate = $('#startDate').val();
            const endDate = $('#endDate').val();

            $.ajax({
                url: '/get-filter-vod-report',
                type: 'POST',
                data: new FormData(this),
                xhrFields: {
                    responseType: 'blob'
                },
                processData: false,
                contentType: false,
                cache: false,
                success: function(blob) {
                    const downloadUrl = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = downloadUrl;
                    a.download = `transactions_${startDate}_to_${endDate}.pdf`;
                    document.body.appendChild(a);
                    a.click();
                    URL.revokeObjectURL(downloadUrl);
                    a.remove();
                },
                error: function(xhr) {
                    erroralert(xhr);
                }
            });
        });

    });

    $(document).on('change','#defaultSelect',function(e){
        e.preventDefault();
        var status = $('#defaultSelect').val();
        var id = $(this).attr('data-id');
        if( status == 'Disable'){
            $.ajax({
                type : "post",
                url : "{{ route('user_bills') }}",
                data : { _token:"{{ csrf_token() }}", "id" : id },
                success:function(data){
                    if(data.length > 0){
                        $('.update-profile').attr('disabled', true);
                        swal.fire({
                        title: 'Are you sure?',
                        text: "Disabling this user will archive the following bills: " + data + ".",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: 'info',
                        confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed){
                                $('.approval_action').val(data);
                                $('#formAuthentication').submit();
                                $('.update-profile').attr('disabled', false);
                            }else{
                                $('#defaultSelect').val($('.account-status').val());
                                $('.update-profile').attr('disabled', true);
                            }
                        })
                    }
                },
                error:function(xhr){
                    $('.update-profile').attr('disabled', true);
                    erroralert(xhr);
                }
            })
        }else{
            $('.update-profile').attr('disabled', false);
        }
    });
    document.getElementById('phone').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '+1(' + x[1] + ')' + x[2] + (x[3] ? '-' + x[3] : '');
    });

    function validateDate() {
        var startDate = new Date(document.getElementById("startDate").value);
        var endDate = new Date(document.getElementById("endDate").value);

        if (startDate > endDate) {
            swal.fire("Warning!", "Start date must not be greater than end date", "warning");
            document.getElementById("endDate").value = "";
        }
    }

</script>


@endsection

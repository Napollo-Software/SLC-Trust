@extends("nav")
@section('title', 'Edit User | SLC Trust')
@section("wrapper")
@php
$role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
@endphp
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .search-nav {
        padding-bottom: 6%;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
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

    select.form-control:not([size]):not([multiple]) {
        height: 45px;
    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
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
    <h5 class=" d-flex justify-content-between pt-3 pb-2">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/all_users')}}" class="text-muted fw-light pointer"><b>All Users</b></a> / <b>Edit User</b> </div>
    </h5>
    <!-- Account page navigation-->
    <form id="formAuthentication" class="mb-3" action="{{route('update_existing_user_profile', $user['id'] )}}" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
            @method('post')
            <div class="col-xl-4">
                @csrf
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0 " style="width:95%;">
                    <div class="card-header">
                        <div class="d-flex">
                            <h6 class="col-md-11 pt-2">
                                @if ($user->role == "User")
                                Government issued photo ID
                                @else
                                Photo ID
                                @endif
                            </h6>
                            @if($user->profile_pic != null)
                            <a href="{{url('img/'.$user->profile_pic)}}" download>
                                <i class="menu-icon tf-icons bx bx-download"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="card mt-4">
                            <div class="card-body" style="padding: 0.5rem 0.5rem;margin-left:auto;margin-right:auto; ">
                                @if ($user->profile_pic==null)
                                @php
                                $app_name = config('app.name');
                                $profile = $app_name.'-Logo.png'
                                @endphp
                                @else
                                @php
                                $document_type=pathinfo($user->profile_pic);
                                if ($document_type['extension'] == 'pdf') {
                                $profile = "pdf_icon.png";
                                } else {
                                $profile = $user->profile_pic;
                                }
                                @endphp
                                @endif
                                <a href="@if($user->profile_pic != null) {{url('img/'.$user->profile_pic)}} @endif" target="_blank">
                                    <img src="{{url('img/'.$profile)}}" alt="" class="img-thumbnail" @if (isset($document_type['extension']) && $document_type['extension']=='pdf' ) style="width: 150px" @endif>
                                </a>
                            </div>
                        </div>
                        <!-- Profile picture help block-->
                        <input type="file" class="form-control mt-2" id="profile_pic" name="profile_pic" />
                        <span class="text-danger">@error('profile_pic'){{$message}} @enderror</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="display: flex">
                            <h4>Profile Details</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" name="fname" class="form-control p-2" value="{{ $user->name }}">
                                <span class="text-danger">@error('fname'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" name="last_name" class="form-control p-2" value="{{ $user->last_name }}">
                                <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full SSN</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control p-2" name="full_ssn" value="{{ $user->full_ssn }}">
                                <span class="text-danger">@error('full_ssn'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Date of Birth</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                @if(date('m-d-Y',strtotime($user->dob)) != '01-01-1970')
                                <input type="date" name="dob" class="form-control p-2" value="{{date('Y-m-d',strtotime($user->dob))}}">
                                @else
                                <input type="date" class="form-control p-2" name="dob">
                                @endif
                                <span class="text-danger">@error('dob'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control p-2">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="password" name="password" class="form-control p-2" autocomplete="new-password">
                                <span class="text-danger">@error('password'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" name="phone" class="form-control p-2" value="{{ $user->phone }}">
                                <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Billing Method</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select class="form-control form-select p-2 mb-3" id="state" name="billing_method">
                                    <option selected="selected" disabled=""> Select a bill method</option>
                                    <option {{ $user->billing_method=="manual" ? 'selected' : ' '}} value="manual">Manual Billing</option>
                                    <option {{ $user->billing_method=="prepaid" ? 'selected' : ' '}} value="prepaid">Prepaid Credit Card</option>
                                </select>
                                <span class="text-danger">@error('billing_method'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Billing Cycle</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select class="form-control p-2 form-select" id="state" name="billing_cycle">
                                    <option value="1" {{ $user->billing_cycle=="1" ? 'selected' : ''}}>1st of every Month </option>
                                    <option value="3" {{$user->billing_cycle == "3" ? 'selected' : ''}}>3rd of every Month </option>
                                    <option value="7" {{$user->billing_cycle == "7" ? 'selected' : ''}}>7th of every Month </option>
                                    <option value="14" {{$user->billing_cycle == "14" ? 'selected' : ''}}>14th of every Month </option>
                                    <option value="21" {{$user->billing_cycle == "21" ? 'selected' : ''}}>21st of every Month </option>
                                    <option value="28" {{$user->billing_cycle == "28" ? 'selected' : ''}}>28th of every Month </option>
                                </select>
                                <span class="text-danger">@error('billing_cycle'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Surplus Amount</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="number" name="surplus_amount" class="form-control p-2" value="{{ $user->surplus_amount }}">
                                <span class="text-danger">@error('surplus_amount'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Balance</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                @if ($user->role=="User")
                                <input type="text" class="form-control p-2" value="{{number_format(userBalance($user->id),2,'.',',')  }}" disabled>
                                @else
                                N/A
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Gender</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select class="form-control p-2 form-select" id="gender" name="gender">
                                    <option value="Male" @if ($user['gender']=='Male' ) selected @endif>Male</option>
                                    <option value="Female" @if ($user['gender']=='Female' ) selected @endif>Female</option>
                                    <option value="Other" @if ($user['gender']=='Other' ) selected @endif>Other</option>
                                </select>
                                <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Marital Status</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select name="marital_status" class="form-control p-2" id="marital_status">
                                    <option value="married" @if ($user['marital_status']=='married' ) selected @endif>Married</option>
                                    <option value="single" @if ($user['marital_status']=='single' ) selected @endif> Single</option>
                                    <option value="Divorced" @if ($user['marital_status']=='Divorced' ) selected @endif>Divorced</option>
                                    <option value="undisclosed" @if ($user['marital_status']=='undisclosed' ) selected @endif>Undisclosed</option>
                                </select>
                                <span class="text-danger">@error('marital_status'){{$message}} @enderror</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Notify Before</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select name="notify_before" class="form-control p-2" id="">
                                    @for ($i = 1; $i <= 15; $i++) <option value="{{$i}}" @if ($i==$user->notify_before) selected @endif >{{$i}} day before </option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">State</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select class="form-control form-select" id="state" name="state">
                                    <option selected="selected" disabled="">-- Select a state</option>
                                    @foreach(App\Models\City::select('state')->distinct()->get() as $state)
                                    <option @if ($user->state == $state->state) {{ 'selected' }} @endif value="{{$state->state}}">{{$state->state}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control p-2" name="city" value="{{ $user->city }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Zipcode</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control p-2" name="zipcode" value="{{ $user->zipcode }}">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea name="address" class="form-control" cols="5">{{$user->address}}</textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="submit" name="approval_action" class="btn btn-primary up-date-profile">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    document.getElementById('phone').addEventListener('input', function(e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '+1(' + x[1] + ')' + x[2] + (x[3] ? '-' + x[3] : '');
    });

</script>
@endsection

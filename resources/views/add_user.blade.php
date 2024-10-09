@extends('nav')
@section('title', 'Add User | SLC Trusts')
@section('wrapper')
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-1">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Add User</b> </div>
    </h5>
    <div class="row">
        <div class="col-xl-4">
            <form id="formAuthentication" class="mb-3" action="{{ route('store_user') }}" method="post">
                @csrf
                @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <div class="card mt-2 mb-xl-0">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="col-md-11 m-1">Designation</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row-cols-lg-12">
                            <label for="exampleFormControlInput1" class="form-label">User Role*</label>
                            <select id="defaultSelect" class="form-select" name="role" required multiple>
                                <option value="" disabled>Select user role</option>
                                @foreach ($roles as $role)
                                {{-- @if ($role->name == 'admin' || $role->name == 'moderator' || $role->name == 'user') --}}
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                {{-- @endif --}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-md-8 mt-2">
            <div class="card mb-3">
                <div class="card-body">
                    <div style="display: flex">
                        <h4>User Details</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">First Name*</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="text" class="form-control" placeholder="First Name" name="name" maxLength="30" required value="{{ old('name', request()->input('name'))}}" />
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Last Name*</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" maxLength="40" required value="{{ old('last_name', request()->input('last_name'))}}" />
                            <span class="text-danger">
                                @error('last_name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email*</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="Email" class="form-control" maxLength="60" placeholder="User Email" name="email" required value="{{ old('email', request()->input('email'))}}" />
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Billing Method</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <select class="form-control form-select " id="" name="billing_method">
                                <option value="manual">Manual Billing</option>
                                <option value="prepaid">Prepaid Credit Card</option>
                            </select>
                            <input type="hidden" name="account_status" value="Approved">
                            <span class="text-danger">
                                @error('billing_method')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full SSN</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="text" class="form-control p-2" placeholder="Full SSN" name="full_ssn">
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Date of Birth</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="date" class="form-control p-2" name="dob">
                            <span class="text-danger">@error('dob'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control p-2">
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Billing Cycle</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <select class="form-control p-2 form-select" id="state" name="billing_cycle">
                                <option value="1">1st of every Month </option>
                                <option value="3">3rd of every Month </option>
                                <option value="7">7th of every Month </option>
                                <option value="14">14th of every Month </option>
                                <option value="21">21st of every Month </option>
                                <option value="28">28th of every Month </option>
                            </select>
                            <span class="text-danger">@error('billing_cycle'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Surplus Amount</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="number" class="form-control p-2" name="surplus_amount" placeholder="Enter surplus amount">
                            <span class="text-danger">@error('surplus_amount'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Gender</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <select class="form-control p-2 form-select" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Marital Status</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <select name="marital_status" class="form-control p-2" id="marital_status">
                                <option value="">Select Marital Status</option>
                                <option value="married">Married</option>
                                <option value="single"> Single</option>
                                <option value="Divorced">Divorced</option>
                                <option value="undisclosed">Undisclosed</option>
                            </select>
                            <span class="text-danger">@error('marital_status'){{$message}} @enderror</span>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Notify Before</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <select name="notify_before" class="form-control p-2" id="">
                                @for ($i = 1; $i <= 15; $i++) <option value="{{$i}}">{{$i}} day before </option>
                                    @endfor
                            </select>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">State</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <select class="form-control form-select" id="state" name="state">
                                <option selected="selected" disabled="">-- Select a state</option>
                                @foreach(App\Models\City::select('state')->distinct()->get() as $state)
                                <option value="{{$state->state}}">{{$state->state}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">City</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="text" class="form-control p-2" name="city" placeholder="Enter City">
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Zipcode</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                            <input type="text" class="form-control p-2" name="zipcode" placeholder="Enter Zipcode">
                        </div>
                    </div>
                    <hr class="billing_method d-none">
                    <div class="row billing_method d-none">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea name="address" class="form-control" cols="5">

                            </textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="row pt-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary update-bill-button">Add User <i class="bx bx-save"></i></button>
                            <a href="{{ url('/all_users') }}" class="btn btn-secondary">Close <i class="bx bx-window-close"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    $(document).on('submit', 'form', function() {
        $('.add-user').attr('disabled', true);
    })
    $(document).on('click', '#defaultSelect', function() {
        var check = $('#defaultSelect').val();
        if (check == 'user') {
            $('.billing_method').removeClass('d-none');
        } else {
            $('.billing_method').addClass('d-none');
        }
    });
</script>

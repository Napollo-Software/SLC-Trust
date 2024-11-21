@extends('myprint')

@section('title', 'Print User Details | Senior Life Care Trusts')
@section('content')
<style>
  @media print {
  #printPageButton {
    display: none;
  }
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card">
                <h5 class="card-header"><b>User Details</b></h5>
                <div class="card-body">
                    <a  class="btn btn-primary print-btn" id="printPageButton" style="color: #fff !important;" onclick="window.print()">Print<i class='bx bx-printer'></i></a>
                    <!--<div class="dropdown download-btn">-->
                    <!--  <a href="{{ route('export') }}" style="margin-right: 15px;" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    Excel-->
                    <!--  </a>-->
                    <!--  <a href="{{ route('pdfdownload') }}" style="margin-right: 15px;" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    Pdf-->
                    <!--  </a>-->
                    <!--  <a href="{{ route('csv') }}" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    Csv-->
                    <!--  </a>-->
                    <!--</div>-->
                  <div class="table-responsive text-nowrap">
                           <form id="formAuthentication" class="mb-3" action="{{route('update_existing_user', $user['id'] )}}" method="get">
                    @method('post')
                    @csrf
                    <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{Session::get('success')}}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-fail alert-dismissible" role="alert">
                        {{Session::get('fail')}}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">First Name</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="First Name"
                            name="name"
                            value="{{$user['name']}}"
                          />
                          <span class="text-danger">@error('name'){{$message}} @enderror</span>
                        </div>
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Last Name"
                            name="last_name"
                            value="{{$user['last_name']}}"
                          />
                          <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">DOB</label>
                          <input
                            type="date"
                            class="form-control"
                            placeholder="DOB"
                            name="dob"
                            value="{{$user['dob']}}"
                          />
                          <span class="text-danger">@error('dob'){{$message}} @enderror</span>
                        </div>
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Adreess</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Adreess"
                            name="address"
                            value="{{$user['address']}}"
                          />
                          <span class="text-danger">@error('address'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">State</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="State"
                            name="state"
                            value="{{$user['state']}}"
                            disabled
                          />
                          <span class="text-danger">@error('dob'){{$message}} @enderror</span>
                        </div>
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Zipcode</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Zipcode"
                            name="zipcode"
                            value="{{$user['zipcode']}}"
                          />
                          <span class="text-danger">@error('zipcode'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Email</label>
                          <input
                            type="Email"
                            class="form-control"
                            placeholder="User Email"
                            name="email"
                            value="{{$user['email']}}"
                            disabled
                          />
                          <span class="text-danger">@error('email'){{$message}} @enderror</span>
                        </div>
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Marital Status</label>
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Marital Status"
                            name="marital_status"
                            value="{{$user['marital_status']}}"
                          />
                          <span class="text-danger">@error('marital_status'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Gender</label>
                          <input
                            type="Email"
                            class="form-control"
                            placeholder="Gender"
                            name="gender"
                            value="{{$user['gender']}}"
                            disabled
                          />
                          <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                        </div>
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Date of withrawal</label>
                          <input
                            type="date"
                            class="form-control"
                            placeholder="Date of withrawal"
                            name="date_of_withdrawal"
                            value="{{$user['date_of_withdrawal']}}"
                            disabled
                          />
                          <span class="text-danger">@error('date_of_withdrawal'){{$message}} @enderror</span>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Balance</label>
                          <input
                            type="number"
                            class="form-control"
                            placeholder="$"
                            name="balance"
                            value="{{$user['user_balance']}}"
                            disabled
                          />
                        </div>
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">User Role</label>
                          <select id="defaultSelect" class="form-select">
                            <option>--</option>
                            <option @if ($user->role == 'Admin') selected @endif>Admin</option>
                            <option @if ($user->role == 'User') selected @endif>User</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Account Status</label>
                          <select id="defaultSelect" class="form-select" id="account_status" name="account_status">
                            <option>--</option>
                            <option @if ($user->account_status == 'Approved') selected @endif>Approved</option>
                            <option @if ($user->account_status == 'Not Approved') selected @endif>Not Approved</option>
                          </select>
                        </div>
                        <div class="col-lg-6">
                          <label for="full_ssn" class="form-label">Full SSN</label>
                          <input type="text" class="form-control" id="full_ssn" name="full_ssn" placeholder="Your SSN" autofocus value="{{$user['full_ssn']}}" />
                          <span class="text-danger">@error('full_ssn'){{$message}} @enderror</span>
                        </div>

                      </div>

                    </div>
                  </form>


                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

@endsection

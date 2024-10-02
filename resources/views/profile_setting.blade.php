@extends("nav")
@section('title', 'Profile Settings | SLC Trust')
@section("wrapper")
          <div class="">
            <h5 class=" d-flex justify-content-between pt-3 pb-2">
                <b></b>
               <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Profile Settings</b> </div>
            </h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <h5 class="card-header"><b>Profile Settings</b></h5>
                    <div class="row">
                      <div class="col-md-12">
                          <!-- Account -->
                          <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                              <img
                                src="/public/assets/img/avatars/1.png"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="uploadedAvatar"
                              />
                              <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                  <span class="d-none d-sm-block">Upload new photo</span>
                                  <i class="bx bx-upload d-block d-sm-none"></i>
                                  <input
                                    type="file"
                                    id="upload"
                                    class="account-file-input"
                                    hidden
                                    accept="image/png, image/jpeg"
                                  />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                  <i class="bx bx-reset d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Reset</span>
                                </button>

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                              </div>
                            </div>
                          </div>
                          <hr class="my-0" />
                          <div class="card-body">
                            <form id="formAccountSettings" method="POST" onsubmit="return false">
                              <div class="row">
                                <div class="mb-3 col-md-6">
                                  <label for="firstName" class="form-label">First Name</label>
                                  <input
                                    class="form-control"
                                    type="text"
                                    id="firstName"
                                    name="firstName"
                                    value="John"
                                    autofocus
                                  />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="lastName" class="form-label">Last Name</label>
                                  <input class="form-control" type="text" name="lastName" id="lastName" value="Doe" />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="email" class="form-label">E-mail</label>
                                  <input
                                    class="form-control"
                                    type="text"
                                    id="email"
                                    name="email"
                                    value="john.doe@example.com"
                                    placeholder="john.doe@example.com"
                                  />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="organization" class="form-label">Organization</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="organization"
                                    name="organization"
                                    value="ThemeSelection"
                                  />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label class="form-label" for="phoneNumber">Phone Number</label>
                                  <div class="input-group input-group-merge">
                                    <span class="input-group-text">US (+1)</span>
                                    <input
                                      type="text"
                                      id="phoneNumber"
                                      name="phoneNumber"
                                      class="form-control"
                                      placeholder="202 555 0111"
                                    />
                                  </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="address" class="form-label">Address</label>
                                  <input type="text" class="form-control" id="address" name="address" placeholder="Address" />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="state" class="form-label">State</label>
                                  <input class="form-control" type="text" id="state" name="state" placeholder="California" />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="zipCode" class="form-label">Zip Code</label>
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="zipCode"
                                    name="zipCode"
                                    placeholder="231465"
                                    maxlength="6"
                                  />
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label class="form-label" for="country">Country</label>
                                  <select id="country" class="select2 form-select">
                                    <option value="">Select</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="Canada">Canada</option>
                                    <option value="China">China</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="India">India</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Korea">Korea, Republic of</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Philippines">Philippines</option>
                                    <option value="Russia">Russian Federation</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="United States">United States</option>
                                  </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="language" class="form-label">Language</label>
                                  <select id="language" class="select2 form-select">
                                    <option value="">Select Language</option>
                                    <option value="en">English</option>
                                    <option value="fr">French</option>
                                    <option value="de">German</option>
                                    <option value="pt">Portuguese</option>
                                  </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="timeZones" class="form-label">Timezone</label>
                                  <select id="timeZones" class="select2 form-select">
                                    <option value="">Select Timezone</option>
                                    <option value="-12">(GMT-12:00) International Date Line West</option>
                                    <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                                    <option value="-10">(GMT-10:00) Hawaii</option>
                                    <option value="-9">(GMT-09:00) Alaska</option>
                                    <option value="-8">(GMT-08:00) Pacific Time (US & Canada)</option>
                                    <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                                    <option value="-7">(GMT-07:00) Arizona</option>
                                    <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                    <option value="-7">(GMT-07:00) Mountain Time (US & Canada)</option>
                                    <option value="-6">(GMT-06:00) Central America</option>
                                    <option value="-6">(GMT-06:00) Central Time (US & Canada)</option>
                                    <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                    <option value="-6">(GMT-06:00) Saskatchewan</option>
                                    <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                    <option value="-5">(GMT-05:00) Eastern Time (US & Canada)</option>
                                    <option value="-5">(GMT-05:00) Indiana (East)</option>
                                    <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                                  </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="currency" class="form-label">Currency</label>
                                  <select id="currency" class="select2 form-select">
                                    <option value="">Select Currency</option>
                                    <option value="usd">USD</option>
                                    <option value="euro">Euro</option>
                                    <option value="pound">Pound</option>
                                    <option value="bitcoin">Bitcoin</option>
                                  </select>
                                </div>
                              </div>
                              <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                              </div>
                            </form>
                          </div>
                          <!-- /Account -->
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
@endsection



////////////OLd profile_setting<div class="container-xxl flex-grow-1 container-p-y">
  <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Profile Setting</h5>
  <div class="row">
    <div class="col-lg-12 mb-12">
      <div class="card">

        {{-- <a  class="btn btn-primary print-btn" href="{{ route('print.edit',$user['id'])}}">Print<i class='bx bx-printer'></i></a> --}}
        <form id="formAuthentication" class="mb-3" action="{{route('update_existing_user', $user['id'] )}}" method="post" enctype="multipart/form-data">
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
                          max="2030-12-31"
                          value="{{$user['dob']}}"
                        />
                        <span class="text-danger">@error('dob'){{$message}} @enderror</span>
                      </div>
                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
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
                        <select class="form-control form-select mb-3" id="state" name="state">
                          <option selected="selected" disabled="">-- Select a state</option>
                          @foreach(App\Models\City::select('state')->distinct()->get() as $state)
                          <option @if ($user['state'] == $state->state) selected @endif  value="{{$state->state}}">{{$state->state}}</option>
                          @endforeach
                        </select>
                        <span class="text-danger">@error('state'){{$message}} @enderror</span>
                      </div>
                       <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">City</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="City"
                          name="city"
                          value="{{$user['city']}}"

                        />
                        <span class="text-danger">@error('city'){{$message}} @enderror</span>
                      </div>
                    </div>
                    <div class="row mb-3">
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

                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">Marital Status</label>
                        <select name="marital_status" class="form-control" id="marital_status">
                          <option value="married" @if ($user['marital_status']=='married') selected @endif>Married</option>
                          <option value="single" @if ($user['marital_status']=='single') selected @endif> Single</option>
                          <option value="Divorced" @if ($user['marital_status']=='Divorced') selected @endif>Divorced</option>
                          <option value="undisclosed" @if ($user['marital_status']=='undisclosed') selected @endif>Undisclosed</option>
                        </select>
                        <span class="text-danger">@error('marital_status'){{$message}} @enderror</span>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">Gender</label>
                        <select class="form-control form-select" id="gender" name="gender">
                          <option value="Male" @if ($user['gender']=='Male') selected @endif>Male</option>
                          <option value="Female" @if ($user['gender']=='Female') selected @endif>Female</option>
                          <option value="Other" @if ($user['gender']=='Other') selected @endif>Other</option>
                        </select>
                        <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                      </div>
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
                    </div>
                    <div class="row mb-3">
                      <div class="col-lg-6">
                        <label for="full_ssn" class="form-label">Full SSN</label>
                        <input type="text" class="form-control" id="full_ssn" name="full_ssn" placeholder="Your SSN" autofocus value="{{$user['full_ssn']}}" />
                        <span class="text-danger">@error('full_ssn'){{$message}} @enderror</span>
                      </div>
                      @if($role=="Admin")
                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">User Role</label>
                        <select id="defaultSelect" class="form-select" disabled>
                          <option>--</option>
                          <option @if ($user->role == 'Admin') selected @endif>Admin</option>
                          <option @if ($user->role == 'User') selected @endif>User</option>
                        </select>
                      </div>
                      @endif
                        @if($role=="User" || $role=="Moderator")
                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">User Role</label>
                        <select id="defaultSelect" class="form-select" disabled>
                          <option>--</option>
                          <option @if ($user->role == 'Admin') selected @endif>Admin</option>
                          <option @if ($user->role == 'User') selected @endif>User</option>
                          <option @if ($user->role == 'Moderator') selected @endif>Moderator</option>
                        </select>
                      </div>
                      @endif
                    </div>
                    <div class="row mb-3">
                          @if($role=="Admin")
                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">Account Status</label>
                        <select id="defaultSelect" class="form-select" id="account_status" name="account_status">
                          <option>--</option>
                          <option @if ($user->account_status == 'Approved') selected @endif>Approved</option>
                          <option @if ($user->account_status == 'Rejection') selected @endif> Rejection</option>
                        </select>
                      </div>
                       @endif
                         @if($role=="User" || $role=="Moderator")
                      <div class="col-lg-6">
                        <label for="exampleFormControlInput1" class="form-label">Account Status</label>
                        <select id="defaultSelect" class="form-select" id="account_status" name="" disabled>
                          <option>--</option>
                          <option @if ($user->account_status == 'Approved') selected @endif>Approved</option>
                          <option @if ($user->account_status == 'Rejection') selected @endif>Rejection</option>
                          <option @if ($user->account_status == 'Pending') selected @endif>Pending</option>
                        </select>
                      </div>
                      <input type="hidden" name="account_status" value="{{$user->account_status}}">
                       @endif
                      <div class="col-lg-6">
                  <label for="docs" class="form-label">Phone</label>
                  <input type="tel" class="form-control phone" id="phone" name="phone"  placeholder="+1(555) 555-5555" value="{{$user->phone}}"/>
                  <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                </div>

                    </div>
                          <div class="row mb-3">
              <div class="col-lg-6 ">
                  <label for="username" class="form-label">Billing Method</label>
                        <select class="form-control form-select mb-3" id="state" name="billing_method" disabled>
                          <option selected="selected" disabled=""> Select a bill method</option>
                          <option {{ $user->billing_method=="manual" ? 'selected' : ' '}} value="manual" >Manual Billing</option>
                          <option {{ $user->billing_method=="prepaid" ? 'selected' : ' '}} value="prepaid">Prepaid Credit Card</option>
                        </select>
                </div>

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

                  </div>
                  <div class="row mb-3">
                    {{-- <div class="col-lg-6">
                      <label for="">Notify by</label>
                      <select name="notify_by" class="form-control" id="">
                        <option value="email" @if ($user['notify_by'] == 'email') selected @endif>Email</option>
                        <option value="text" @if ($user['notify_by'] == 'text') selected @endif>Text</option>
                      </select>
                    </div> --}}

                    <div class="col-lg-6 ">
                      <label for="logo8">Government Issued Photo ID</label>
                        <input type="file" class="form-control" id="profile_pic" name="profile_pic" />
                       <span class="text-danger">@error('profile_pic'){{$message}} @enderror</span>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Notify before</label>
                      <select name="notify_before"  class="form-control" id="">
                        @for ($i = 1; $i <= 15; $i++)
                            <option value="{{$i}}" @if ($i == $user->notify_before) selected @endif >{{$i}} day</option>
                        @endfor
                      </select>
                    </div>
                  </div>

             <div class="row mb-3">


              @if ($user->profile_pic!=null)
                {{-- <div class="col-lg-6"></div> --}}
                <div class="col-lg-6 ">
                  <div class="card" style="width: 150px; ">
                    <div class="card-body" style="padding: 0.5rem 0.5rem;">
                      <a href="{{url('img/'.$user->profile_pic)}}" target="_blank">
                        <img src="{{url('img/'.$user->profile_pic)}}" alt=""   class="img-thumbnail"></a>
                      </div>
                    </div>
                </div>
                @endif

            </div>
                    <div class="row mb-3">
                      <div class="col-lg-3">
                        <button class="btn btn-primary" type="submit">Update User</button>
                      </div>
                    </div>
                  </div>
                </form>
      </div>
    </div>
  </div>
</div>

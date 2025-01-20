@extends("nav")
@section('title', 'Profile Setting | Senior Life Care Trusts')
@section("wrapper")
@php
 $role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
@endphp
<style>
  body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.search-nav{
  padding-bottom:6%;
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
.form-control, .dataTable-input {
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
  select.form-control:not([size]):not([multiple]) {
      height: 47px !important;
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
       <div> @if ($user->role != 'Vendor') <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a>@else <a href="{{url('/vendor-dashboard')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> @endif / <b>Profile Setting</b> </div>
    </h5>
  <!-- Account page navigation-->
  <div class="row">
      <div class="col-xl-4" >
        <form id="formAuthentication" class="mb-3" action="{{route('update_existing_user', $user['id'] )}}" method="post" enctype="multipart/form-data">
          @method('post')
          @csrf
          <!-- Profile picture card-->
          <div class="card mb-4 mb-xl-0 " style="width:95%;">
              <div class="card-header text-center">
                @if ($user->role == "User")
                   Government Issued Photo ID
                @else
                    Photo ID
                @endif
              </div>
              <div class="card-body text-center">
                  <!-- Profile picture image-->
                  <div class="card mt-4 mb-4" >
                    <div class="card-body" style="padding: 0.5rem 0.5rem;margin-left:auto;margin-right:auto; " >
                      @if ($user->profile_pic==null)
                      @php
                          $profile = 'slc_trust.png'
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
                  <a href="{{url('img/'.$user->profile_pic)}}" target="_blank">
                    <img src="{{url('img/'.$profile)}}" alt=""   class="img-thumbnail"  @if ( isset($document_type['extension']) && $document_type['extension'] == 'pdf') style="width: 150px" @endif ></a>
                  </div>
                      </div>
                  <!-- Profile picture help block-->
                  <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 3 MB</div>
                  <!-- Profile picture upload button-->
                  <input type="file" class="form-control" id="profile_pic" name="profile_pic" />
                  <span class="text-danger">@error('profile_pic'){{$message}} @enderror</span>
              </div>
          </div>
      </div>
      <div class="col-xl-8">
          <!-- Account details card-->
          <div class="card mb-4">
              <div class="card-header">Profile Details</div>
              <div class="card-body">
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3 pt-2">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">ACCOUNT STATUS</label>
                            <input class="form-control bg-success text-white"  id="inputFirstName" type="text" name="account_status" placeholder="Enter your first name" value="{{$user->account_status}}" readonly>
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">ACCOUNT RANK</label>
                            <input class="form-control bg-primary text-white" id="inputLastName" type="text" name="role" placeholder="Enter your last name" value="{{$user->role}}" readonly>
                        </div>
                    </div>
                    <!-- Form Row        -->
                      <!-- Form Row-->
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
                      <!-- Form Row        -->
                      <div class="row mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">Date of Birth</label>
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
                      <div class="row  mb-3">
                        <div class="col-lg-6">
                          <label for="exampleFormControlInput1" class="form-label">State</label>
                          <select class="form-control form-select " id="state" name="state">
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

                      <div class="row gx-3 mb-3">
                          <!-- Form Group (organization name)-->
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Gender</label>
                            <select class="form-control form-select" id="gender" name="gender">
                              <option value="Male" @if ($user['gender']=='Male') selected @endif>Male</option>
                              <option value="Female" @if ($user['gender']=='Female') selected @endif>Female</option>
                              <option value="Other" @if ($user['gender']=='Other') selected @endif>Other</option>
                            </select>
                            <span class="text-danger">@error('gender'){{$message}} @enderror</span>
                          </div>
                          <!-- Form Group (location)-->
                          @if($role == 'User')
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Balance</label>
                            <input
                              type="number"
                              class="form-control"
                              placeholder="$"
                              name="balance"
                             @if ($user['role'] == "User")  value="{{userBalance($user['id'])}}" @else  value="N/A" @endif
                              disabled
                            />
                          </div>
                          @endif
                      </div>
                      <div class="row gx-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
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
                          <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Account No</label>
                            <input
                              type="text"
                              class="form-control"
                              name="balance" value="{{$user['id']}}"
                              disabled
                            />
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6 pt-3">
                          <label for="username" class="form-label">Billing Method</label>
                          <select class="form-control form-select mb-3" id="state" name="billing_method" disabled>
                            <option selected="selected" disabled=""> Select a bill method</option>
                            <option {{ $user->billing_method=="manual" ? 'selected' : ' '}} value="manual" >Manual Billing</option>
                            <option {{ $user->billing_method=="prepaid" ? 'selected' : ' '}} value="prepaid">Prepaid Credit Card</option>
                          </select>
                          <span class="text-danger">@error('billing_method'){{$message}} @enderror</span>
                        </div>
                        <div class="col-md-6 pt-3">
                          <label for="username" class="form-label">Billing Cycle</label>
                          <select class="form-control form-select" id="state" name="billing_cycle" disabled>
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
                      <!-- Form Group (email address)-->

                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (phone number)-->
                          <div class="col-md-6">
                            <label for="username" class="form-label">Phone</label>
                          <input type="tel" class="form-control phone" id="phone" name="phone"  placeholder="+1(555) 555-5555" value="{{$user->phone}}"/>
                          <span class="text-danger">@error('phone'){{$message}} @enderror</span>

                          </div>
                          <!-- Form Group (birthday)-->
                          <div class="col-md-6">
                            <label for="" class="form-label">Recurring bill notification reminder</label>
                            <select name="notify_before"  class="form-control " id="">
                              @for ($i = 1; $i <= 15; $i++)
                                  <option value="{{$i}}" @if ($i == $user->notify_before) selected @endif >{{$i}} day before </option>
                              @endfor
                            </select>
                          </div>
                      </div>
                      <!-- Save changes button-->
                      <button class="btn btn-primary" type="submit">Save changes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>




  <script>
          document.getElementById('phone').addEventListener('input', function (e) {
      var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
      e.target.value = !x[2] ? x[1] : '+1(' + x[1] + ')' + x[2] + (x[3] ? '-' + x[3] : '');
      });

  </script>
@endsection


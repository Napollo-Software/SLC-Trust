<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Registration | SLC Trust</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ url('/assets/img/favicon/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ url('/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('/assets/js/config.js') }}"></script>
  </head>

  <style type="text/css">
  .no-radius-1 {
    border-top-right-radius: 0px;
    border-bottom-right-radius: 0px;
}
.authentication-wrapper.authentication-basic .authentication-inner {
    max-width: 60% !important;
    position: relative;
}

 #hidden_div {
    display: none;
}
 #hidden_div2 {
    display: none;
}
.profile-pic-wrapper {
  height: 25vh;
  width: 100%;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.pic-holder {
  text-align: center;
  position: relative;
  border-radius: 50%;
  width: 150px;
  height: 150px;
  overflow: hidden;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.pic-holder .pic {
  height: 100%;
  width: 100%;
  -o-object-fit: cover;
  object-fit: cover;
  -o-object-position: center;
  object-position: center;
}

.pic-holder .upload-file-block,
.pic-holder .upload-loader {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(90, 92, 105, 0.7);
  color: #f8f9fc;
  font-size: 12px;
  font-weight: 600;
  opacity: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s;
}

.pic-holder .upload-file-block {
  cursor: pointer;
}

.pic-holder:hover .upload-file-block,
.uploadProfileInput:focus ~ .upload-file-block {
  opacity: 1;
}

.pic-holder.uploadInProgress .upload-file-block {
  display: none;
}

.pic-holder.uploadInProgress .upload-loader {
  opacity: 1;
}

/* Snackbar css */
.snackbar {
  visibility: hidden;
  min-width: 250px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 14px;
  transform: translateX(-50%);
}

.snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {
    bottom: 0;
    opacity: 0;
  }
  to {
    bottom: 30px;
    opacity: 1;
  }
}

@keyframes fadein {
  from {
    bottom: 0;
    opacity: 0;
  }
  to {
    bottom: 30px;
    opacity: 1;
  }
}

@-webkit-keyframes fadeout {
  from {
    bottom: 30px;
    opacity: 1;
  }
  to {
    bottom: 0;
    opacity: 0;
  }
}

@keyframes fadeout {
  from {
    bottom: 30px;
    opacity: 1;
  }
  to {
    bottom: 0;
    opacity: 0;
  }
}


  </style>

  <body>
       @include('sweetalert::alert')
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body-auth">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-3">
                  <img src="{{ url('/assets/img/slc_trust.png') }}" style="width:120px">
              </div>
              <!-- /Logo -->

              <form id="formAuthentication" class="mb-3"  method="post" enctype="multipart/form-data">

                <!--@if ($errors->any())-->
                <!--    <div class="alert alert-danger">-->
                <!--        <ul>-->
                <!--            @foreach ($errors->all() as $error)-->
                <!--                <li>{{ $error }}</li>-->
                <!--            @endforeach-->
                <!--        </ul>-->
                <!--    </div>-->
                <!--@endif-->
      				@if(Session::has('success'))
      				<div class="alert alert-success">{{Session::get('success')}}</div>
      				@endif
      				@if(Session::has('error'))
      				<div class="alert alert-danger">{{Session::get('error')}}</div>
      				@endif
      				@csrf
              {{-- <div class="profile-pic-wrapper">
                <div class="pic-holder">
                  <!-- uploaded pic shown here -->
                  <img id="profilePic" class="pic" src="{{url('/blank-profile-picture-973460_1280.jpg')}}">

                  <input class="uploadProfileInput" type="file" name="profile_pic" id="newProfilePhoto"  style="opacity: 0;" />
                  <label for="newProfilePhoto" class="upload-file-block">
                    <div class="text-center">
                      <div class="mb-3">
                        <i class="fa fa-camera fa-2x"></i>
                      </div>
                      <div class="text-uppercase">
                        Upload <br /> Photo ID
                      </div>
                    </div>
                  </label>
                </div>
              </div> --}}
              <div class="row">
                <div class="col-sm-4 mb-3">
                  <label for="username" class="form-label">First Name</label>
                  <input type="text" class="form-control" id="username" name="name" placeholder="Your first name" autofocus value="{{old('name')}}" />
                  <input type="hidden" name="role" value="User">
                  <span class="text-danger">@error('name'){{$message}} @enderror</span>
                </div>
                <div class="col-sm-4 mb-3">
                  <label for="last_name" class="form-label">Last Name</label>
                  <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Your lastname" autofocus value="{{old('last_name')}}" />
                  <span class="text-danger">@error('last_name'){{$message}} @enderror</span>
                </div>
                <div class="col-sm-4 mb-3">
                  <label for="full_ssn" class="form-label">Government Issued Photo ID </label>
                  <input type="file" class="form-control" id="profile_pic" name="profile_pic" />
                  <span class="text-danger">@error('profile_pic'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                  <label for="full_ssn" class="form-label">Full SSN</label>
                  <input type="text" class="form-control" id="full_ssn" name="full_ssn" placeholder="111-11-1111" autofocus value="{{old('full_ssn')}}" />
                  <span class="text-danger">@error('full_ssn'){{$message}} @enderror</span>
                </div>
                <div class="col-sm-4 mb-3">
                  <label for="DOB" class="form-label">DOB</label>
                  <input type="date" class="form-control" id="DOB" name="DOB" placeholder="Date of Birth" max="2030-12-31" autofocus value="{{old('DOB')}}" />
                  <span class="text-danger">@error('DOB'){{$message}} @enderror</span>
                </div>
                <div class="col-sm-4 mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Street # 131" autofocus value="{{old('address')}}" />
                  <span class="text-danger">@error('address'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 ">
                  <label for="username" class="form-label">State</label>
                        <select class="form-control form-select mb-3" id="state" name="state">
                          <option selected="selected" disabled="">-- Select a state</option>
                          @foreach(App\Models\City::select('state')->distinct()->get() as $state)
                          <option @if (old('state') == $state->state) {{ 'selected' }} @endif  value="{{$state->state}}">{{$state->state}}</option>
                          @endforeach
                        </select>
                </div>
                <div class="col-sm-4 ">
                  <label for="lastname" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" autofocus value="{{old('city')}}" />
                </div>
                <div class="col-sm-4 ">
                  <label for="zipcode" class="form-label">Zip code</label>
                  <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Your zipcode" maxlength = "6" autofocus value="{{old('zipcode')}}" />
                  <span class="text-danger">@error('zipcode'){{$message}} @enderror</span>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}"/>
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <div class="col-sm-4 mb-3">
                  <label for="marital_status" class="form-label">Marital Status</label>
                  <select name="marital_status" class="form-control" id="marital_status">
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="undisclosed">Undisclosed</option>
                  </select>
                  <span class="text-danger">@error('marital_status'){{$message}} @enderror</span>
                </div>
                <div class="col-sm-4 mb-3">
                  <label for="gender" class="form-label">Gender</label><br>
                  <select class="form-control form-select" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4 ">
                    <label for="username" class="form-label">Billing Method</label>
                          <select class="form-control form-select mb-3" id="state" name="billing_method" >
                            <option value="manual"  @if (old('billing_method') == "manual") {{ 'selected' }} @endif>Manual Billing</option>
                            <option value="prepaid"  @if (old('billing_method') == "prepaid") {{ 'selected' }} @endif>Prepaid Card</option>
                          </select>
                  </div>
                  <div class=" col-sm-4" >
                    <label for="exampleFormControlInput1" class="form-label">Billing Cycle</label>
                    <select class="form-control form-select" id="state" name="billing_cycle" >
                        <option value="1"  @if (old('billing_cycle') == "1") {{ 'selected' }} @endif>1st of every Month </option>
                        <option value="3" @if (old('billing_cycle') == "3") {{ 'selected' }} @endif>3rd of every Month </option>
                        <option value="7" @if (old('billing_cycle') == "7") {{ 'selected' }} @endif>7th of every Month </option>
                        <option value="14" @if (old('billing_cycle') == "14") {{ 'selected' }} @endif>14th of every Month </option>
                        <option value="21" @if (old('billing_cycle') == "21") {{ 'selected' }} @endif>21st of every Month </option>
                        <option value="28" @if (old('billing_cycle') == "28") {{ 'selected' }} @endif>28th of every Month </option>
                      </select>
                  </div>
                <div class="col-sm-4 ">
                    <label for="docs" class="form-label">Phone</label>
                    <div class="input-group ">
                      <div class="input-group-prepend">
                        <span class="input-group-text no-radius-1" id="basic-addon1">+1</span>
                      </div>
                     <input type="tel" class="form-control phone" id="phone" name="phone"  placeholder="(555) 555-5555" value="{{old('phone')}}" aria-describedby="basic-addon1"/>
                    </div>
                    <span class="text-danger">@error('phone'){{$message}} @enderror</span>
                  </div>

              </div>

              <div class="row">
                <div class="mb-3 col-sm-6 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="Password"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                  <small><span class="text-danger password-error"></span></small>
                </div>
                <div class="mb-3 col-sm-6 form-password-toggle">
                    <label class="form-label" for="password"> confirm Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="confirm_password"
                        placeholder="Confirm Password"
                        aria-describedby="password"
                      />
                      <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    <span class="text-danger">@error('password'){{$message}} @enderror</span>
                  </div>

                <div class="mb-3 d-none">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" checked/>
                    <label class="form-check-label" for="terms-conditions">
                      I agree to <span><a href="#">privacy policy</a></span> & <span><a href="#">terms and Conditions</a></span>
                    </label>
                    <br>
                     <small><span class="text-danger terms-error"></span></small>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100 register-submit" type="submit">Sign up</button>
              </div>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{ url('/') }}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->


    <!-- Core JS -->
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<script>

  $(document).on('submit','#formAuthentication',function(e){
    e.preventDefault();
    $('.register-submit').attr('disabled',true);
    $('.form-control').removeClass('is-invalid');
    $('.password-error').text("");
    $('.terms-error').text("");
    $('.invalid-feedback.is-invalid').remove();
    $.ajax({
      type : "POST",
      url  : "{{route('register-user')}}",
      data : new FormData(this),
      dataType : "JSON",
      processData : false,
      contentType : false,
      cache :false,
      success:function(data)
      {
        console.log(data);
        Swal.fire({
            title: data.header,
            text: data.message,
            icon: data.type,
            confirmButtonColor: '#2ecfde',
            confirmButtonText: 'Ok, Thankyou!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href="/";
          }
        });
        $('#formAuthentication').trigger('reset');
        $('.register-submit').attr('disabled',false);
      },
      error:function(xhr)
      {
        erroralert(xhr);
        if(xhr.responseJSON.errors.password){
          $('#password').removeClass('is-invalid');
          $('.password-error').text(xhr.responseJSON.errors.password);
        };
        if(xhr.responseJSON.errors.terms){
          $('.terms-error').text(xhr.responseJSON.errors.terms);
        };
      }
    }),
    $('.register-submit').attr('disabled',false);
  });

  function erroralert(xhr) {
    if (typeof  xhr.responseJSON.errors === 'object') {
        var error = '';
        $.each(xhr.responseJSON.errors, function (key, item) {
            error += item+'\n';
            if ($(document).find('[name="'+key+'"]').length>0){
                var element=$(document).find('[name="'+key+'"]');
                if(element.hasClass('form-control')){
                    element.addClass('is-invalid').after('<span class="invalid-feedback is-invalid">'+item+'</span>');
                }else{
                }
            } else{
            }
        });
    } else {
    }
}

$(document).on("change", ".uploadProfileInput", function () {
  var triggerInput = $('.pic-holder');
  var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
  var holder = $(this).closest(".pic-holder");
  var wrapper = $(this).closest(".profile-pic-wrapper");
  $(wrapper).find('[role="alert"]').remove();
  triggerInput.blur();
  var files = !!this.files ? this.files : [];
  if (!files.length || !window.FileReader) {
    return;
  }
  if (/^image/.test(files[0].type)) {
    // only image file
    var reader = new FileReader(); // instance of the FileReader
    reader.readAsDataURL(files[0]); // read the local file

    reader.onloadend = function () {
      $(holder).addClass("uploadInProgress");
      $(holder).find(".pic").attr("src", this.result);
      $(holder).append(
        '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div></div>'
      );

      // Dummy timeout; call API or AJAX below
      setTimeout(() => {
        $(holder).removeClass("uploadInProgress");
        $(holder).find(".upload-loader").remove();
        // If upload successful
        if (Math.random() < 0.9) {
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
          );

          // Clear input after upload
          $(triggerInput).val("");

          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        } else {
          $(holder).find(".pic").attr("src", currentImg);
          $(wrapper).append(
            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
          );

          // Clear input after upload
          $(triggerInput).val("");
          setTimeout(() => {
            $(wrapper).find('[role="alert"]').remove();
          }, 3000);
        }
      }, 1500);
    };
  } else {
    $(wrapper).append(
      '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose the valid image.</div>'
    );
    setTimeout(() => {
      $(wrapper).find('role="alert"').remove();
    }, 3000);
  }
});

 function showDiv2(divId, element)
{
    //document.getElementById("hidden_div").style.display = element.value == 'manual' ? 'block' : 'none';
   // document.getElementById("hidden_div2").style.display = element.value == 'prepaid' ? 'block' : 'none';
}

        $(document).ready(function(){
            document.getElementById('phone').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        });
   document.getElementById('full_ssn').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,2})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '' + x[1] + ' -' + x[2] + (x[3] ? '-' + x[3] : '');
        });
    $(document).on('change','#state',function(){

      var state=$(this).val();

           $.ajax({
            type: "GET",
            url:'{{url('state-fetch-city')}}/'+state,

            dataType: 'JSON',
            success: function (data) {
                $('#city').empty();
                $(data).each(function(i,v){
                  $('#city').append('<option value="'+v['id']+'">'+v['city_name']+'</option>');
                });
            },

        });
    });
});
</script>
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ url('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ url('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ url('/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ url('/assets/js/main.js') }}"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

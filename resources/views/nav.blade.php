<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/new_theme/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	@yield("style")
    <link href="{{ asset('assets/new_theme/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{ asset('assets/new_theme/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/new_theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/new_theme/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/new_theme/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/new_theme/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- loader-->
	<link href="{{ asset('assets/new_theme/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('assets/new_theme/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/new_theme/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/new_theme/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/new_theme/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/new_theme/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/new_theme/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/new_theme/css/header-colors.css')}}" />
    <link rel="icon" type="image/x-icon" href="{{ url('/assets/img/favicon/favicon.png') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title')</title>

</head>
<body>
    @php
        $user = App\Models\User::find(Session::get('loginId'));
        $followup = App\Models\Followup::select('note', 'date')->orderBy('id','desc')->get();
        $notifications = App\Models\Notifcation::where('user_id', $user->id)->latest()->get();
        $messages = App\Models\smsChat::latest()->take(5)->get();
    @endphp
	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
		@include("layouts.header")
		<!--end header -->
		<!--navigation-->
		@include("layouts.nav")
		<!--end navigation-->
		<!--start page wrapper -->
        <div class="page-wrapper">
            <div class="container_basic">
		       @yield("wrapper")
            </div>
        </div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">SLC © {{ date('Y') }}</p>
		</footer>
	</div>
	<!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr/>
            <h6 class="mb-0">Theme Styles</h6>
            <hr/>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr/>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .container_basic {
            width: 92% !important; /* Ensures the width is applied even if other rules exist */
            margin: 0 auto; /* Centers the container */
            margin-bottom:50px !important;
        }

        .nav-alignment{
            justify-content: center !important;
        }
        .fw-bold{
            padding-top:2px !important;
            padding-bottom:2px !important;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        padding-left: 8px;
        padding-right: 20px;
        overflow: hidden;
        text-overflow: n;
        white-space: nowrap;
        display: block;
        width: 100%;
        padding: 0.4375rem 0.875rem;
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.53;
        color: #697a8d;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d9dee3;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .select-2 {
        display: block;
        width: 100%;
        padding: 0.4375rem 0.875rem;
        font-size: 0.9375rem;
        font-weight: 400;
        line-height: 1.53;
        color: #697a8d;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d9dee3;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.375rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 0px solid #aaa;
        border-radius: 4px;
    }
    .select2-selection__arrow {
        margin-top: 5px;
    }

    .btn-primary:hover {
        color: white;
        background-color: #467f7b;
        border-color: #3e726f;
    }
    .btn-primary:active {
        color: white;
        background-color: #467f7b;
        border-color: #3e726f;
    }
    .btn-check:checked + .btn-primary, .btn-check:active + .btn-primary, .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle{
    background-color: #467f7b !important;
    border-color: #3e726f !important;
    }
    .switcher-wrapper{
        display: none !important;
    }
    .dropdown-padding{
        padding-right: 8px !important;
    }
    .search-bar-padding{
        margin-bottom: 15px !important;
    }
    .apexcharts-legend-series{
        display: none !important;
    }
    .alert-success {
    background-color: #467f7b !important;
    border-color: #467f7b !important;
    color: white !important;
    }

    </style>
    <!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/new_theme/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/new_theme/js/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    @if (!in_array(Route::currentRouteName() ,['claim.preview','preview.deposit']))
	<script src="{{ asset('assets/new_theme/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    @endif
	<script src="{{ asset('assets/new_theme/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
	<script src="{{ asset('assets/new_theme/js/index.js')}}"></script>
    <script src="{{ asset('assets/new_theme/js/widgets.js')}}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/new_theme/js/app.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            var phoneInputs = document.getElementsByClassName('phone');
            for (var i = 0; i < phoneInputs.length; i++) {
                phoneInputs[i].addEventListener('input', function (e) {
                    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
                });
            }
            $('.select-2').select2();
        });
        let canada = [
            'Alberta',
            'British Columbia',
            'Manitoba',
            'New Brunswick',
            'Newfoundland and Labrador',
            'Northwest Territories',
            'Nova Scotia',
            'Nunavut',
            'Ontario',
            'Prince Edward Island',
            'Quebec',
            'Saskatchewan',
            'Yukon',
        ];
        let americanStates = [
            'Alabama',
            'Alaska',
            'Arizona',
            'Arkansas',
            'California',
            'Colorado',
            'Connecticut',
            'Delaware',
            'Florida',
            'Georgia',
            'Hawaii',
            'Idaho',
            'Illinois',
            'Indiana',
            'Iowa',
            'Kansas',
            'Kentucky',
            'Louisiana',
            'Maine',
            'Maryland',
            'Massachusetts',
            'Michigan',
            'Minnesota',
            'Mississippi',
            'Missouri',
            'Montana',
            'Nebraska',
            'Nevada',
            'New Hampshire',
            'New Jersey',
            'New Mexico',
            'New York',
            'North Carolina',
            'North Dakota',
            'Ohio',
            'Oklahoma',
            'Oregon',
            'Pennsylvania',
            'Rhode Island',
            'South Carolina',
            'South Dakota',
            'Tennessee',
            'Texas',
            'Utah',
            'Vermont',
            'Virginia',
            'Washington',
            'West Virginia',
            'Wisconsin',
            'Wyoming',
        ];

        function getCountry(event) {
            let country;
            if (event.value == 'canada') {
                country = '';
                canada.forEach(element => {
                    country += '<option value="' + element + '">' + element + '</option>';
                });
                $('#SelectState').html(country);
            } else {
                country = '';
                americanStates.forEach(element => {
                    const selectedState = element === 'New York' ? 'selected' : '';
                    country += `<option value="${element}" ${selectedState}>${element}</option>`;
                });
                $('#SelectState').html(country);
            }
        }
        // Add an event listener to the window that triggers the function
        window.addEventListener('load', removeDisplayNone);
        window.addEventListener("load", function () {
            var loader = document.getElementById("loader");
            loader.style.display = "block";

            // Hide the loader after a certain duration (e.g., 1 second)
            setTimeout(function () {
                loader.style.display = "none";
            }, 1000); // 1000 milliseconds = 1 second
        });
        //print function
        function printDivContent() {
            var divElementContents = document.getElementById("printContent").innerHTML;
            var windows = window.open('', '', 'height=600, width=1000');
            windows.document.write('<html>');
            windows.document.write('<body > <h1>Div\'s Content Are Printed Below<br>');
            windows.document.write(divElementContents);
            windows.document.write('</body></html>');
            windows.document.close();
            windows.print();
        }

        //select function
        $(document).ready(function () {
            $("select").change(function () {
                $(this).find("option:selected").each(function () {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();

        });

        function erroralert(xhr) {

            if (xhr.status == 419) {
                window.location.href = '/';

            }
            if (typeof xhr.responseJSON.errors === 'object') {
                var error = '';
                $.each(xhr.responseJSON.errors, function (key, item) {
                    error += item + '\n';
                    if ($(document).find('[name="' + key + '"]').length > 0) {
                        var element = $(document).find('[name="' + key + '"]');
                        if (element.hasClass('form-control')) {
                            element.addClass('is-invalid').after('<span class="invalid-feedback is-invalid">' +
                                item + '</span>');
                        } else {
                        }
                    } else {
                    }
                });
            } else {
                // swal("Oops...", xhr.responseText.message, "error");
                alert("Something went wrong.");
            }
        }
</script>
<script>
    new PerfectScrollbar('.chat-list');
    new PerfectScrollbar('.chat-content');
</script>
@include('sweetalert::alert')
@yield("script")
    {{-- @include("layouts.theme-control") --}}
</body>

</html>


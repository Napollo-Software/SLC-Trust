@extends('nav')
@section('title', 'Add Referral | Senior Life Care Trusts')
@section('wrapper')
<style>
    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .add-account-contact {
        background-color: #D0D6DB;
        border: 1px solid #ced4da;
        color: #212529;
        padding: 0.1rem 0.1rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-top: 0.5rem;
    }

    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }

</style>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Add Referral</b> </div>
    </h5>
    <form id="referralStoreForm">
        @csrf
        <div class="row mb-4 flex align-items-stretch">
            <div class="col-md-8">
                <div class="card h-100 shadow-lg mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Contact Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient First Name*</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="eg: John" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_first_name : "" }}">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Last Name*</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_last_name : "" }}" placeholder="eg: Smith">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Phone Number*</label>
                                <input type="text" class="form-control phone" placeholder="(___) ___-___" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_phone : "" }}" id="phone" name="phone">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Email*</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_email : "" }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg h-100 mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Source Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <div>
                                    <label for="form-label">Source Type</label>
                                    <select name="source_type" id="source_type" class="form-control">
                                        <option value="">Choose One</option>
                                        <option value="manual">Manual</option>
                                        <option value="account">Vendor</option>
                                        <option value="contact">Contact</option>
                                        <option value="FnF">Family / Friend</option>
                                        <option value="walk_in">Walk-in</option>
                                    </select>
                                </div>
                                <div id="contact_id">
                                    <label for="form-label" class="mt-2"> Contact*</label>
                                    <select name="contact" id="contactField" class="form-control ">
                                        <option value="">Choose One</option>
                                        @foreach ($contacts as $contact)
                                        <option value="{{ $contact->id }}">
                                            {{ $contact->fname . ' ' . $contact->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="account_id">
                                    <label for="form-label" class="mt-2"> Vendor*</label>
                                    <select name="account" id="AccountField" class="form-control ">
                                        <option value="">Choose One</option>
                                        @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div id="source">
                                    <label for="form-label">Family / Friend*</label>
                                    <input type="text" class="form-control" id="sourceField" name="source">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-lg mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Demographics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">Gender</label>
                                <select name="gender" class="form-select ">
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>

                                </select>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient DOB</label>
                                <input type="date" onchange="calculateAge()" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="12/07/2003">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Age</label>
                                <input type="number" class="form-control" readonly id="age" name="age" placeholder="Age">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient SSN</label>
                                <input type="text" class="form-control" id="ssn" placeholder="Patient SSN" name="ssn">
                            </div>
                            <div class="col-md-6 d-none p-2">
                                <label for="form-label">Patient Language</label>
                                <select class="form-control form-select" id="patient_language" name="patient_language">
                                    <option value="" selected>Select Patient Language</option>
                                    <option value="English">English</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Hebrew">Hebrew</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">Address</label>
                                <input type="text" class="form-control" id="Address" name="address" placeholder="house# 03 street 07/ new york city">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">APT/SUITE </label>
                                <input type="text" class="form-control" id="apt" name="apt" placeholder="Enter APT/SUITE">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Country</label>
                                <div class="col-md-12 text-secondary p-0">
                                    <select id="defaultSelectCountry" onchange="getCountry(this)" class="form-control default-country form-select" name="country">
                                        <option selected value="United States of America">United States of America</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('country')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label class=" form-label mb-1">State / Province</label>
                                <select id="SelectState" class="form-control select-2" name="state">
                                    <option disabled selected hidden>--Select State</option>
                                </select>
                                <span class="text-danger">
                                    @error('state')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-3 p-2">
                                <label for="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="eg: New York City">
                            </div>
                            <div class="col-md-3 p-2">
                                <label for="form-label">County</label>
                                <input type="text" class="form-control" id="county" name="county" placeholder="eg: Los Angeles">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Zip Code/Postal Code</label>
                                <input type="number" class="form-control" id="zip" name="zip" placeholder="51000">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card shadow-lg mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Medicaid</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">Medicaid Number</label>
                                <input placeholder="e.g., AB12345C" pattern="[A-Za-z]{2}\d{5}[A-Za-z]" title="Format: Two letters, five digits, one letter (e.g., AB12345C)" type="text" class="form-control" id="medicaid_phone" name="medicaid_phone">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Medicare Number</label>
                                <input type="text" class="form-control" placeholder="Enter Medicare Number" id="medicare_phone" name="medicare_phone">
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-bottom: 20px;" class="card shadow-lg mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Additional Information</h5>
                    </div>
                    <div class="card-body mb-4">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                            <label class="form-label mb-1">Intake Coordinator<span class="text-danger"></span></label>
                                            <select id="intake" class="form-control select-2" name="intake">
                                                <option disabled selected hidden>Intake Coordinator</option>
                                                @foreach ($intakeCordinator as $coordinator)
                                                <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                @error('intake')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card shadow-lg mb-3">
                    <div class="card-header d-flex justify-content-between pl-0 pb-1 pl-2">
                        <h5>Emergency Contact</h5>
                        <div class="print-btn p-0">
                            <label for="checkBox">Same as applicant</label>
                            <input type="checkbox" class="m-1 cursor-pointer" id="checkBox">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">First Name*</label>
                                <input type="text" class="form-control" id="emergency__first_name" placeholder="Enter First Name" name="emergency_first_name">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Last Name*</label>
                                <input type="text" class="form-control" id="emergency_last_name" placeholder="Enter Last Name" name="emergency_last_name">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Phone Number</label>
                                <input type="text" class="form-control phone" placeholder="(___) ___-___" id="emergency_phone" name="emergency_phone">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Ext Number</label>
                                <input type="number" class="form-control" id="emergency_ext" placeholder="Enter Ext Number" name="emergency_ext">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Email*</label>
                                <input type="text" class="form-control" id="emergency_email" placeholder="Enter Emergency Email" name="emergency_email">
                            </div>
                            <div class="col-md-12 p-2">
                               <label for="form-label">Relationship to Patient</label>
                            <select name="emegency_relationship" class="form-control select-2">
                                <option value="">Select One</option>
                                <option value="child">Child</option>
                                <option value="parent">Parent</option>
                                <option value="parent">spouse</option>
                                <option value="friend">Friend</option>
                                <option value="niece">Niece</option>
                                <option value="nephew">Nephew</option>
                                <option value="grandson">Grandson</option>
                                <option value="granddaughter">Granddaughter</option>
                                <option value="brother">Brother</option>
                                <option value="sister">Sister</option>
                            </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Address</label>
                                <input type="text" class="form-control" placeholder="Enter address" id="emergency_address" name="emergency_address">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">City</label>
                                <input type="text" class="form-control" id="emergency_city" placeholder="Enter City" name="emergency_city">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">State/Province</label>
                                <select id="defaultSelect" class="form-control select-2" name="emergency_state">
                                    <option value="">Choose One</option>
                                    @foreach (App\Models\City::select('state')->distinct()->get() as $state)
                                    <option @if (old('state')==$state->state || $state->state == 'New York')
                                        {{ 'selected' }}
                                        @endif
                                        value="{{ $state->state }}">{{ $state->state }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('state')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">County</label>
                                <input type="text" placeholder="" class="form-control" id="emergency_county" name="emergency_county">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Zip Code/Postal Code</label>
                                <input type="number" class="form-control" id="emergency_zip" name="emergency_zip">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">APT/SUITE</label>
                                <input type="text" class="form-control" id="emergency_apt" name="emergency_apt">
                            </div>
                            <div class="form-group mb-0">
                                <input type="checkbox" id="live_with_parent" name="live_with_parent" value="1">
                                <label for="option1 mb-1">Lives with parents</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="have_keys" name="have_keys" value="1">
                                <label for="option2 mb-1">Have keys</label>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn contact-button btn-primary"><i class="bx bx-save pb-1"></i>Submit</button>
            </div>
    </form>
</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/inputmask.min.js"></script>

    <script>

    const today_dob = new Date();
    const formattedDate = today_dob.toISOString().split('T')[0];
    document.getElementById('date_of_birth').setAttribute('max', formattedDate);

    function calculateAge() {
        const dobInput = document.getElementById('date_of_birth').value;
        const ageInput = document.getElementById('age');

        if (dobInput) {
            const dob = new Date(dobInput);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDiff = today.getMonth() - dob.getMonth();
            const dayDiff = today.getDate() - dob.getDate();

            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }
            ageInput.value = age;
        } else {
            ageInput.value = '';
        }
    }
        $(document).ready(function () {

            var snn_input = document.getElementById('ssn');
            var mask = new Inputmask("999-99-9999");
            mask.mask(snn_input);

            const countrySelect = $("#defaultSelectCountry");
            if (countrySelect.length) {
                getCountry(countrySelect[0]);
            }

            const accountField = $('#account_id');
            const contactField = $('#contact_id');
            const sourceField = $('#sourceField');
            const sourceSelect = $('#source_type');
            const sourceInput = $('#source');

            function toggleFields() {
                const val = sourceSelect.val();

                accountField.toggle(val === "account");
                contactField.toggle(val === "contact");
                sourceField.val("");
                sourceInput.toggle(val === "FnF");
            }

            sourceSelect.on('change', toggleFields);
            toggleFields();

            $('#contact').hide()
            $('#source').hide()

            $("#checkBox").on('change', function (e) {
                if ($(this).prop('checked')) {
                    let fname = $('#first_name').val();
                    let lname = $('#last_name').val();
                    let phone = $('#phone').val();
                    let email = $('#email').val();
                    let address = $('#Address').val();
                    let city = $('#city').val();
                    let county = $('#county').val();
                    let zip = $('#zip').val();
                    let apt = $('#apt').val();
                    $('#emergency__first_name').val(fname)
                    $('#emergency_last_name').val(lname)
                    $('#emergency_phone').val(phone)
                    $('#emergency_email').val(email)
                    $('#emergency_address').val(address)
                    $('#emergency_city').val(city)
                    $('#emergency_county').val(county)
                    $('#emergency_zip').val(zip)
                    $('#emergency_apt').val(apt)
                } else {
                    $('#emergency__first_name').val("")
                    $('#emergency_last_name').val("")
                    $('#emergency_phone').val("")
                    $('#emergency_email').val("")
                    $('#emergency_address').val("")
                    $('#emergency_city').val("")
                    $('#emergency_county').val("")
                    $('#emergency_zip').val("")
                    $('#emergency_apt').val("")
                }
            })
            $('#source_type').on('change', function (e) {
                e.preventDefault()
                let val = $(this).val();
                if (val == "walk_in" || val == "") {
                    $('#contact').hide()
                    $('#contactField').val("")
                    $('#source').hide()
                    $('#sourceField').val("")
                } else if (val == "source") {
                    $('#contact').hide()
                    $('#contactField').val("")
                    $('#source').show()
                } else if (val == "contact") {
                    $('#contact').show()
                    $('#source').hide()
                    $('#sourceField').val("")
                }
            })
        });
        $('#zip').on('input', function () {
            var zip = $(this).val();

            if (zip.length === 5) {
                $.ajax({
                    url: '/zip-details',
                    type: 'GET',
                    data: { postalcode: zip },
                    success: function (response) {
                        if (response.postalcodes && response.postalcodes.length > 0) {
                            var location = response.postalcodes[0];
                            $('#city').val(location.placeName);
                            $('#county').val(location.adminName2);
                        } else {
                            $('#city').val('');
                            $('#county').val('');
                        }
                    },
                    error: function (xhr) {
                        console.error("Failed to fetch location data.", xhr.responseJSON);
                    }
                });
            }
        });

        $(document).on('submit', '#referralStoreForm', function (e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.contact-button').attr('disabled', true).text('Submitting...');
            var formData = new FormData(this);
            $('input[type="checkbox"]').each(function (index, checkbox) {
                formData.append($(checkbox).attr('name'), $(checkbox).is(':checked') ? 1 : 0);
            });
            $.ajax({
                'url': "{{ route('store.referral') }}",
                'method': "POST",
                'data': formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    $("form").trigger("reset");
                    swal.fire('Success', 'Referral has been created successfully', 'success').then(()=>{
                    window.location.href = '{{ route('referral.list') }}';
                    });
                },
                error: function (xhr) {
                    erroralert(xhr);
                    $('.contact-button').attr('disabled', false).text('Submit');

                    var firstInvalid = $('.is-invalid:first');
                    if (firstInvalid.length) {
                        $(window).scrollTop(firstInvalid.offset().top - 300);
                        firstInvalid.focus();
                    }
                }
            });
        });
    </script>
@endsection

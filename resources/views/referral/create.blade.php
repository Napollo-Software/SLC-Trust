@extends('nav')
@section('title', 'Add Referral | SLC Trust')
@section('wrapper')
<style>
    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
    }

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
    <h5 class=" d-flex justify-content-between pt-2 pb-2">
        <b>Dashboard</b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Add Referral</b> </div>
    </h5>
    <form id="referralStoreForm">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Contact Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient First Name*</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="eg: John" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_first_name : "" }}" required>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Last Name*</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_last_name : "" }}" placeholder="eg: Smith" required>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Phone Number*</label>
                                <input type="text" class="form-control phone" placeholder="(___) ___-___" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_phone : "" }}" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Email*</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="example@email.com" value="{{ isset($lead) && $lead->converted_to_referral == 1 ? $lead->patient_email : "" }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
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
                                <input type="date" class="form-control" name="date_of_birth" placeholder="12/07/2003">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Age</label>
                                <input type="number" class="form-control" id="age" name="age" placeholder="18">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient SSN</label>
                                <input type="text" class="form-control" id="ssn" placeholder="Patient SSN" name="ssn">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Patient Language</label>
                                <input type="text" class="form-control" id="patient_language" name="patient_language" placeholder="Patient Language">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Address</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-secondary ">
                                <label for="form-label" class="form-label">Country</label>

                                <div class="col-md-12 text-secondary p-0">
                                    <select id="defaultSelect" onchange="getCountry(this)" class="form-control select-2 " name="country">
                                        <option value="" disabled selected hidden>--Select an option</option>
                                        <option @if (old('country')=='United States of America' ) {{ 'selected' }} @endif value="United States of America">United States of America
                                        </option>
                                        <option @if (old('country')=='canada' ) {{ 'selected' }} @endif value="canada">Canada
                                        </option>
                                    </select>
                                    <span class="text-danger">
                                        @error('country')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 text-secondary  p-0 ">
                                <div class="row  p-0 ">
                                    <div class="col-md-12 mr-md-3">
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
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="eg: New York City">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Address</label>
                                <input type="text" class="form-control" id="Address" name="address" placeholder="house# 03 street 07/ new york city">
                            </div>

                            <div class="col-md-6 p-2">
                                <label for="form-label">Zip Code/Postal Code</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="51000">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">APT/SUITE </label>
                                <input type="text" class="form-control" id="apt" name="apt" placeholder="Enter APT/SUITE">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Patient Medicaid</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="form-label">Medicaid Number</label>
                                <input type="text" class="form-control phone" placeholder="(___) ___-___" id="medicaid_phone" name="medicaid_phone">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Medicaid Plan</label>
                                <input type="text" class="form-control" id="medicaid_plan" name="medicaid_plan" placeholder="Enter Medicaid Plan">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Medicare Number</label>

                                <input type="text" class="form-control phone" placeholder="(___) ___-___" id="medicare_phone" name="medicare_phone">
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="form-label">Admission Date</label>
                                <input type="date" class="form-control" id="admission_date" name="admission_date">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header d-flex pl-0 pb-1 pl-2">
                        <h5>Additional Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-secondary">
                                            <label class="form-label mb-1">Intake Coordinator<span class="text-danger">*</span></label>
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
                                    <div class="col-md-6">
                                        <div class="text-secondary">
                                            <label class="form-label mb-1">Referral Marketer<span class="text-danger">*</span></label>
                                            <select id="marketer" class="form-control select-2" name="marketer">
                                                <option disabled selected hidden>Referral Marketer</option>
                                                @foreach ($intakeCordinator as $coordinator)
                                                <option value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                @error('marketer')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pt-2">
                                        <div class="text-secondary">
                                            <label class="form-label mb-1 mt-2">Case Type</label>
                                            <select name="type" class="form-control">
                                                <option value="">Select Case Type</option>

                                                @foreach ($typeData as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                @error('type')
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
                <div class="card mb-3">
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
                                        <option value="account">Account</option>
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
                                    <label for="form-label" class="mt-2"> Account*</label>
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
                <div>
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2">
                            <h5>Emergency Contact</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <label for="form-label">First Name*</label>
                                    <input type="text" class="form-control" id="emergency__first_name" placeholder="Enter First Name" name="emergency_first_name" required>
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Last Name*</label>
                                    <input type="text" class="form-control" id="emergency_last_name" placeholder="Enter Last Name" name="emergency_last_name" required>
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
                                    <input type="text" class="form-control" id="emergency_email" placeholder="Enter Emergency Email" name="emergency_email" required>
                                </div>
                                <div class="col-md-12 p-2">
                                    <label for="form-label">Relationship To Patient</label>
                                    <select name="emegency_relationship" class="form-control select-2">
                                        <option value="">Select One</option>
                                        <option value="child">Child</option>
                                        <option value="client">Parent</option>
                                        <option value="consumer">Friend</option>
                                    </select>
                                </div>
                                <div class="col-md-12 p-2">
                                    <label for="form-label">State/Province</label>
                                    <select id="defaultSelect" class="form-control select-2" name="emergency_state">
                                        <option value="">Choose One</option>
                                        @foreach (App\Models\City::select('state')->distinct()->get() as $state)
                                        <option @if (old('state')==$state->state)
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
                                <div class="col-md-12 p-2">
                                    <label for="form-label">City</label>
                                    <input type="text" class="form-control" id="emergency_city" placeholder="Enter City" name="emergency_city">
                                </div>
                                <div class="col-md-12 p-2">
                                    <label for="form-label">Address</label>
                                    <input type="text" class="form-control" id="emergency_address" name="emergency_address">
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
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary"><i class="bx bx-save pb-1"></i>Submit</button>
            </div>
    </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function () {
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
        });
        $(document).ready(function () {

            $('#contact').hide()
            $('#source').hide()
            $("#checkBox").on('change', function (e) {

                if ($(this).prop('checked')) {
                    let fname = $('#contact_first_name').val();
                    let lname = $('#contact_last_name').val();
                    let phone = $('#contact_phone').val();
                    let email = $('#contact_email').val();
                    $('#patient_first_name').val(fname)
                    $('#patient_last_name').val(lname)
                    $('#patient_phone').val(phone)
                    $('#patient_email').val(email)
                } else {
                    $('#patient_first_name').val("")
                    $('#patient_last_name').val("")
                    $('#patient_phone').val("")
                    $('#patient_email').val("")
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
        $(document).on('submit', '#referralStoreForm', function (e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.contact-button').attr('disabled', true);
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
                    swal.fire('Success', 'Referral has been created successfully', 'success');
                    window.location.href = '{{ route('referral.list') }}';
                },
                error: function (xhr) {
                    erroralert(xhr);
                    $('.contact-button').attr('disabled', false);
                }
            });
        });
    </script>
@endsection

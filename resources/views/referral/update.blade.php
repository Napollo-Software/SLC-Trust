@extends('nav')
@section('title', 'Update Referral | SLC Trust')
@section('wrapper')
    @php
        $canada = [ 'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador', 'Northwest
        Territories', 'Nova Scotia', 'Nunavut', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Yukon'];
        $americanStates = [ 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware',
        'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine',
        'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New
        Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon',
        'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia',
        'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
    @endphp
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

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .check-list {
            list-style: none;
            padding: 0;
        }

        .check-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .check-label {
            flex: 1;
        }

        .check-box {
            flex: 0;
        }
    </style>

    <div class=""><h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span>
            / Update Referral</h5> <!-- Account page navigation-->
        <form id="referralUpdateForm">
            @csrf
            <input type="hidden" name="id" value="{{ $Referral->id }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Source Information</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Source Type*</label>
                                    <select name="source_type" id="source_type" class="form-control">
                                        <option
                                            {{ $Referral->source_type == 'account' ? 'selected' : '' }} value="account">
                                            Account
                                        </option>
                                        <option
                                            {{ $Referral->source_type=='contact' ? 'selected' : '' }} value="contact">
                                            Contact
                                        </option>

                                        <option {{ $Referral->source_type == 'FnF' ? 'selected' : '' }} value="FnF">
                                            Family /
                                            Friend
                                        </option>
                                        <option
                                            {{ $Referral->source_type=='walk_in' ? 'selected' : '' }} value="walk_in">
                                            Walk-in
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 p-2" id="contact_id">
                                    <label for="form-label"> Contact*</label>
                                    <select name="contact" id="contactField" class="form-control">
                                        @if ($Referral->source_type == 'contact')
                                            <option value="{{$Referral->source}}" selected>
                                                {{ $Referral->contact_source->fname . ' ' . $Referral->contact_source->lname }}
                                            </option>
                                        @endif
                                        @foreach ($contacts as $index => $contact)
                                            <option
                                                value="{{ $contact->id }}">{{ $contact->fname . ' ' . $contact->lname }} </option>
                                        @endforeach
                                    </select></div>
                                <div class="col-md-6 p-2" id="account_id">
                                    <label for="form-label"> Account* </label>
                                    <select name="account" id="AccountField" class="form-control">
                                        @if ($Referral->source_type == 'account')
                                            <option value="{{$Referral->source}}" selected>
                                                {{ $Referral->accounts_source->name }}
                                            </option>
                                        @endif
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 p-2" id="source">
                                    <label for="form-label">Family / Friend*</label>
                                    <input type="text" class="form-control" id="sourceField" name="source">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Patient Contact Information</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Patient First Name*</label>
                                    <input type="text" class="form-control" value="{{ $Referral->first_name }}"
                                           id="first_name" name="first_name" placeholder="eg: John">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Patient Last Name*</label>
                                    <input type="text" class="form-control" value="{{ $Referral->last_name }}"
                                           id="last_name" name="last_name" placeholder="eg: Smith">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Patient Phone Number*</label>
                                    <input type="text" class="form-control phone" placeholder="(___) ___-___"
                                           value="{{ $Referral->phone_number }}"
                                           id="phone_number" name="phone_number">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Patient Email</label>
                                    <input type="email" class="form-control" id="email"
                                           value="{{ $Referral->email }}" name="email" placeholder="example@email.com">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Patient Demographics</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Gender</label>
                                    <select name="gender" class="form-select">
                                        <option value="Female" {{ $Referral->gender === 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                        <option value="Male" {{ $Referral->gender === 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Patient DOB</label>
                                    <input type="date" class="form-control"
                                           value="{{ $Referral->date_of_birth }}" name="date_of_birth"
                                           placeholder="12/07/2003">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Age*</label>
                                    <input type="number" class="form-control" value="{{ $Referral->age }}" id="age"
                                           name="age" placeholder="18">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Patient SSN</label>
                                    <input type="text" class="form-control" id="ssn"
                                           value="{{ $Referral->patient_ssn }}" name="ssn">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Patient Address</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <label class="mb-0 py-1">Country<span class="text-danger">*</span></label>
                                <div class="col-md-6  ">
                                    <select id="defaultSelect" class="form-select select-2" onchange="getCountry(this)" name="country">
                                        <option @if ($Referral->country == 'United States of America') {{ 'selected' }} @endif value="United States of America">United States of America</option>
                                        <option @if ($Referral->country == 'canada') {{ 'selected' }} @endif value="canada">Canada</option>
                                    </select>
                                    <span class="text-danger">
            @error('country')
                                        {{ $message }}
                                        @enderror
        </span>
                                </div>
                                <div class="col-md-6 ">
                                    <label class="mb-0 py-1">State / Province<span class="text-danger">*</span></label>
                                    <div class="col-md-12 text-secondary"> <!-- Note the use of col-md-12 here -->
                                        <select id="SelectState" class="form-select select-2 col-lg-12 " name="state">
                                            <option value="{{ $Referral->state }}">{{ $Referral->state }}</option>
                                            @if ($Referral->country == 'canada')
                                                @foreach ($canada as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            @else
                                                @foreach ($americanStates as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">
                @error('state')
                                            {{ $message }}
                                            @enderror
            </span>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Patient Medicaid</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Medicare Number</label>
                                    <input type="text" class="form-control phone" placeholder="(___) ___-___"
                                           value="{{ $Referral->medicare_number }}" id="medicare_number"
                                           name="medicare_phone">
                                </div>
                                <div class="col-md-6 p-2">
                                    <label for="form-label">Medicaid Number</label>
                                    <input type="text" class="form-control phone" placeholder="(___) ___-___"
                                           value="{{ $Referral->medicaid_number }}" id="medicaid_phone"
                                           name="medicaid_phone">

                                </div>
                                <div class="col-md-6 ">
                                    <label for="medicaid_plan">Medicaid Plan</label>
                                    <input class="form-control" id="medicaid_plan" name="medicaid_plan"
                                           value="{{ $Referral->medicaid_plan }}"></input>

                                </div>

                                <div class="col-md-6 p-2">
                                    <label for="form-label">Admission Date</label>
                                    <input type="date" class="form-control" value="{{ $Referral->admission_date }}"
                                           name="admission_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Additional Information</h5></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" style=" margin-bottom: 20px">
                                    <div class="row" style="display: flex; justify-content: space-evenly">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="text-secondary">
                                                            <label class="form-label mb-1">Intake Coordinator<span
                                                                    class="text-danger">*</span></label>
                                                            <select id="intake" class="form-control select-2"
                                                                    name="intake">
                                                                <option disabled selected hidden>Intake Coordinator
                                                                </option>
                                                                @foreach ($intakeCordinator as $coordinator)
                                                                    <option
                                                                        value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
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
                                                            <label class="form-label mb-1">Referral Marketer<span
                                                                    class="text-danger">*</span></label>
                                                            <select id="marketer" class="form-control select-2"
                                                                    name="marketer">
                                                                <option disabled selected hidden>Referral Marketer
                                                                </option>
                                                                @foreach ($intakeCordinator as $coordinator)
                                                                    <option
                                                                        value="{{ $coordinator->id }}">{{ $coordinator->name }}</option>
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
                                                            <label class="form-label mb-1 pt-1 ml-0">Case Type<span
                                                                    class="text-danger">*</span></label>
                                                            <select name="type" class="form-control">
                                                                <option
                                                                    value="{{$Referral->case_type}}">{{$Referral->case_type}}</option>
                                                                @foreach ($typeData as $key => $value)
                                                                    <option
                                                                        value="{{ $value->id }}">{{ $value->name }}</option>
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
                                <div>
                                    <button type="submit" class="btn btn-primary"><i class="bx bx-save pb-1"></i>Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

    </div>
    </div>
    </div>
    </div>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function () {
            // Function to handle the visibility of elements based on source_type
            function handleSourceVisibility(val) {
                $('#contact_id, #account_id, #FnF, #source').hide();
                $('#sourceField').val("");

                if (val == "FnF") {
                    $('#FnF, #source').show();
                    $('#sourceField').val("{{ $Referral->source }}");
                } else if (val == "contact") {
                    $('#contact_id').show();
                } else if (val == "account") {
                    $('#account_id').show();
                }
            }

            // Initial handling of source_type
            handleSourceVisibility($('#source_type').val());

            // Event handler for source_type change
            $('#source_type').on('change', function (e) {
                e.preventDefault();
                let val = $(this).val();
                handleSourceVisibility(val);
            });

            // Check if the sourceField has a value and show/hide accordingly
            if ($('#sourceField').val().trim() !== "") {
                $('#source').show();
            } else {
                $('#source').hide();
            }
        });

        $(document).on('submit', '#referralUpdateForm', function (e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.contact-button').attr('disabled', true);
            $.ajax({
                'url': "{{ route('update.referral') }}",
                'method': "POST",
                'data': new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    swal.fire('success', 'Referral has been Updated successfully', 'success');
                    window.location.href = "{{ route('referral.list') }}";
                },
                error: function (xhr) {
                    erroralert(xhr);
                }
            })
        })
    </script>
@endsection

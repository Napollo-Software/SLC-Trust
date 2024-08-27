@extends('nav')
@section('title', 'Add Lead | Intrustpit')
@section('wrapper')
<style> .card { box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%); } .card .card-header { font-weight: 500; }
    .card-header:first-child { border-radius: 0.35rem 0.35rem 0 0; } .card-header { padding: 1rem 1.35rem;
    margin-bottom: 0; background-color: rgba(33, 40, 50, 0.03); border-bottom: 1px solid rgba(33, 40, 50, 0.125); }
    </style> <div class="">
    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Add Lead</h5>
    <!-- Account page navigation-->
    <form method="post" id="leadStoreForm" action="{{ route('store.lead') }}">
        @csrf
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2">
                <h5>Lead Information</h5>
            </div>
        <div class="card-body">
        <div class="row">
        <div class="col-md-6 p-2">
            <label for="form-label">First Name*</label>
            <input type="text" class="form-control" id="contact_first_name" name="contact_first_name">
        </div>
        <div class="col-md-6 p-2">
        <label for="form-label">Last Name*</label>
        <input type="text" class="form-control" id="contact_last_name" name="contact_last_name">
        </div>

        <div class="col-md-6 p-2">
            <label for="form-label">Phone*</label>
            <input type="text" class="form-control phone" placeholder="(___) ___-___"
            name="contact_phone"
            value="{{ old('patient_phone') }}" id="contact_phone"/>
            </div>
            <div class="col-md-6 p-2">
                <label for="form-label">Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email">
            </div>
            <div class="col-md-6 p-2">
            <label for="form-label">Language</label>
            <input type="text" class="form-control" id="language" maxlength="30" name="language">
            </div>
            <div class="col-md-6 p-2">
            <label for="form-label">Relationship to Patient</label>
            <select name="relationship" class="form-control select-2">
            <option value="">Choose One</option>
            <option value="child">Child</option>
            <option value="client">Client</option>
            <option value="consumer">Consumer</option>
            <option value="friend">Friend</option>
            </select>
            </div>
        </div>
        </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between pl-0 pb-1 pl-2">
                <h5>Patient Information</h5>
                <div class="print-btn p-0">
                    <label for="checkBox">Same as lead</label>
                    <input type="checkbox" class="m-1 cursor-pointer" id="checkBox">
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient First Name</label>
                        <input type="text" class="form-control" id="patient_first_name" name="patient_first_name">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient Last Name</label>
                        <input type="text" class="form-control" id="patient_last_name" name="patient_last_name">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient Phone</label>
                        <input type="text" class="form-control phone" placeholder="(___) ___-___" name="patient_phone"
                            value="{{ old('patient_phone') }}" id="patient_phone" />
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient Email</label>
                        <input type="email" class="form-control" id="patient_email" name="patient_email">
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2">
                <h5>Other Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="form-label">Sub-Status</label>
                        <select name="sub_status" class="form-control ">
                            <option value="">Choose One</option>
                            <option value="open">Open</option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Interested In</label>
                        <input type="text" class="form-control" name="interested">
                    </div>


                    <div class="col-md-6 p-2">
                        <label for="form-label">Case Type</label>
                        <select name="case_type" id="case_type" class="form-select select-2 form-control"
                            onchange="showOtherInput()">
                            <option value="">Choose One</option>
                            <option value="other">Other</option>
                            @foreach (\App\Models\Type::where('category', 'Case Type')->get() as $type)
                            <option value="{{ $type->name }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="other_input" class="col-md-6 p-2" style="display: none;">
                        <label for="other_case">Other Case Type</label>
                        <input type="text" name="other_case" class="form-control">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Note</label>
                        <input type="text" name="note" class="form-control"></input>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2">
                <h5>Source Information</h5>
                </div>
            <div class="card-body">

                <div class="row">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <label for="form-label">Source Type*</label>
                            <select name="source_type" id="source_type" class="form-control ">
                                <option value="">Choose One</option>
                                <option value="account">Account</option>
                                <option value="contact">Contact</option>
                                <option value="FnF">Family / Friend</option>
                                <option value="walk_in">Walk-in</option>
                            </select>
                        </div>
                        <div class="col-md-6 p-2" id="contact_id">
                            <label for="form-label"> Contact*</label>

                            <select name="contact" id="contactField" class="form-control ">
                                <option value="">Choose One</option>
                                @foreach ($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->fname . ' ' . $contact->lname }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 p-2" id="account_id">
                            <label for="form-label"> Account*</label>

                            <select name="account" id="AccountField" class="form-control ">
                                <option value="">Choose One</option>
                                @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
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
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2">
                <h5>Lead Assignee</h5></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="form-label">Assign To</label>
                        <select name="assign_to" class="form-control ">
                            <option value="">Choose One</option>
                            @foreach ($assignees as $assignee)
                            <option value="{{ $assignee->id }}">{{ $assignee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div> 
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2"><h5>Follow-Up</h5></div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="form-label">Follow-Up Date</label>
                        <input type="date" class="form-control" name="follow_up_date">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Follow-Up Time</label>
                        <input type="time" class="form-control" name="follow_up_time">
                    </div>
                    <div class="col-md-12 p-2">
                        <label for="form-label">Follow-Up Note</label>
                        <textarea name="follow_up_note" class="form-control" rows="3"></textarea>
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" name="convert_to_referral" class="convert_to_referral" value="0">
        <div class="row">
            <div class="col-md-5">
                <button class="btn btn-primary submit-btn" data-value="0"><i
                        class="menu-icon tf-icons bx bx-save"></i>Save</button>
                <button class="btn btn-secondary" data-value="1"><i class="menu-icon tf-icons bx bx-shekel"></i>Convert
                    to referral</button>
                <a class="btn btn-warning" href="{{ route('lead.list') }}"><i
                        class="menu-icon tf-icons bx bx-trash"></i>Cancel</a>
            </div>
        </div>
    </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>

    </script>
    <script>
        function goBack() {
            window.history.back();
        }

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
            toggleFields(); // Initialize fields based on the initial value of source_type
        });

        function showOtherInput() {
            var caseTypeSelect = document.getElementById('case_type');
            var otherInput = document.getElementById('other_input');

            if (caseTypeSelect.value === 'other') {
                otherInput.style.display = 'block';
            } else {
                otherInput.style.display = 'none';
            }
        }

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
        $(document).on('submit', '#leadStoreForm', function (e) {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
            e.preventDefault();
            var check = $(this).find(':button:focus').data('value');
            if(check == '1'){
                $('.convert_to_referral').val(1);
            }
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.contact-button').attr('disabled', true);
            $.ajax({
                'url': "{{ route('store.lead') }}",
                'method': "POST",
                'data': new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    swal.fire('success', 'Lead has been created successfully', 'success');
                    if(check == 1){
                        window.location.href = "{{ route('create.referral') }}";
                    }else{
                        window.location.href = "{{ route('lead.list') }}";
                    }
                    // window.location.href = "{{ route('create.referral') }}";
                },
                error: function (xhr) {

                    erroralert(xhr);
                }
            })
        })
    </script>
    @endsection
@extends('nav')
@section('title', 'Edit Lead | Senior Life Care Trusts')
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
    .card-header {
        padding: 1rem 1.35rem;
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
</style>
<div>
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <a href="{{url('/leads')}}" class="text-muted fw-light pointer"><b>All Leads</b></a> / <b>Edit Lead</b> </div>
    </h5>
    <form method="post" id="leadUpdateForm" action="{{ route('update.lead', $lead->id) }}">
        @csrf
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2">
                <h5>Lead Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="form-label">First Name<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" value="{{ $lead->contact_first_name }}" id="contact_first_name" name="contact_first_name">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Last Name<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" value="{{ $lead->contact_last_name }}" id="contact_last_name" name="contact_last_name">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Phone<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control phone" placeholder="(___) ___-___" value="{{ $lead->contact_phone }}" id="contact_phone" name="contact_phone">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Email</label>
                        <input type="text" class="form-control" value="{{ $lead->contact_email }}" id="contact_email" name="contact_email">
                    </div>
                    <span class="text-danger">
                        @error('contact_email')
                        {{ $message }}
                        @enderror
                    </span>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Language</label>
                        <input type="text" maxlength="30" class="form-control" value="{{ $lead->language }}" id="language" name="language">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Relationship to Patient</label>
                        <select name="relationship" class="form-select">
                            <option {{ $lead->relation_to_patient == null ? 'selected' : '' }} value="">Choose One
                            </option>
                            <option {{ $lead->relation_to_patient == 'child' ? 'selected' : '' }} value="child">
                                Child
                            </option>
                            <option {{ $lead->relation_to_patient == 'client' ? 'selected' : '' }} value="client">
                                Client
                            </option>
                            <option {{ $lead->relation_to_patient == 'consumer' ? 'selected' : '' }} value="consumer">
                                Consumer
                            </option>
                            <option {{ $lead->relation_to_patient == 'friend' ? 'selected' : '' }} value="friend">
                                Friend
                            </option>
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
                        <input type="text" class="form-control" value="{{ $lead->patient_first_name }}" id="patient_first_name" name="patient_first_name">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient Last Name</label>
                        <input type="text" class="form-control" value="{{ $lead->patient_last_name }}" id="patient_last_name" name="patient_last_name">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient Phone</label>
                        <input type="text" class="form-control phone" placeholder="(___) ___-___" value="{{ $lead->patient_phone }}" id="patient_phone" name="patient_phone">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Patient Email</label>
                        <input type="text" class="form-control" value="{{ $lead->patient_email }}" id="patient_email" name="patient_email">
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
                        <select name="sub_status" id="lead_sub_status" class="form-control">
                            <option {{ $lead->sub_status == null ? 'selected' : '' }} value="">Choose One</option>
                            <option {{ $lead->sub_status == 'open' ? 'selected' : '' }} value="open">Open</option>
                            <option {{ $lead->sub_status == 'closed' ? 'selected' : '' }} value="closed">Closed</option>
                        </select>
                    </div>
                    <div id="closing_reason_div" class="col-md-6 p-2 {{ $lead->sub_status == 'open' ? 'd-none' : '' }}">
                        <label for="form-label">Add comments for closing</label>
                        <input type="text" value="{{ $lead->closing_reason }}" class="form-control" name="closing_reason">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Interested In</label>
                        <input type="text" value="{{ $lead->interested_in }}" class="form-control" name="interested">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Case Type</label>
                        <select name="case_type_id" id="case_type_id" class="form-select form-control" onchange="showOtherInput()">
                            <option value="">Choose One</option>
                            <option value="other">Other</option>
                            @foreach (\App\Models\Type::where('category', 'Case Type')->get() as $type)
                            <option {{ $lead->case_type_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="other_input" class="col-md-6 p-2" style="display: none;">
                        <label for="other_case">Other Case Type</label>
                        <input type="text" name="other_case" class="form-control">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="form-label">Note</label>
                        <input name="note" class="form-control" value="{{ $lead->note }}" />
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
                    <div class="col-md-6 p-2">
                        <label for="form-label">Source Type<span class="text-danger"> *</span></label>
                        <select name="source_type" id="source_type" class="form-control">
                            <option value="">Choose One</option>
                            <option {{ $lead->source_type == 'account' ? 'selected' : '' }} value="account">
                                Vendor
                            </option>
                            <option {{ $lead->source_type == 'contact' ? 'selected' : '' }} value="contact">
                                Contact
                            </option>

                            <option {{ $lead->source_type == 'FnF' ? 'selected' : '' }} value="FnF">Family /
                                Friend
                            </option>
                            <option {{ $lead->source_type == 'walk_in' ? 'selected' : '' }} value="walk_in">Walk-in
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6 p-2" id="contact_id">
                        <label for="form-label"> Contact*</label>
                        <select name="contact" id="contactField" class="form-control">
                            @foreach ($contacts as $contact)
                            <option {{ (is_object($lead->source) && $lead->source->id == $contact->id) || (is_string($lead->source) && $lead->source == $contact->id) ? 'selected' : '' }} value="{{ $contact->id }}">
                                {{ $contact->fname . ' ' . $contact->lname }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2" id="account_id">
                        <label for="form-label"> Vendor<span class="text-danger"> *</span></label>
                        <select name="account" id="AccountField" class="form-control">
                            @foreach ($vendors as $vendor)
                            <option {{ isset($lead->source) && is_object($lead->source) && $lead->source->id == $vendor->id ? 'selected' : '' }} value="{{ $vendor->id }}">
                                {{ $vendor->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2" id="source">
                        <label for="form-label">Family / Friend<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" id="sourceField" name="source">
                    </div>
                </div>
            </div>
            <div class="row d-none">
                <div class="col-md-6 p-2">
                    <label for="form-label">Follow-Up Date</label>
                    <input type="date" value="{{ $lead->follow_up_date }}" class="form-control" name="follow_up_date">
                </div>
                <div class="col-md-6 p-2">
                    <label for="form-label">Follow-Up Time</label>
                    <input type="time" value="{{ $lead->follow_up_time }}" class="form-control" name="follow_up_time">
                </div>
                <div class="col-md-12 p-2">
                    <label for="form-label">Follow-Up Note</label>
                    <textarea name="follow_up_note" class="form-control" rows="3">{{ $lead->follow_up_note }}</textarea>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex pl-0 pb-1 pl-2">
                <h5>Lead Assignee</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="form-label">Assign To {{ $lead->vendor_id }}</label>
                        <select name="assign_to" class="form-control">
                            @foreach ($assignees as $assignee)
                            <option {{ $lead->vendor_id == $assignee->name ? 'selected' : '' }} value="{{ $assignee->id }}">{{ $assignee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-2">
                <button class="btn btn-primary submit-btn">Save</button>
                <a class="btn btn-secondary" href="{{ route('lead.list') }}">Cancel</a>
            </div>
        </div>
</div>
</form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>

function showOtherInput() {

        var caseTypeSelect = document.getElementById('case_type_id');
        var otherInput = document.getElementById('other_input');

        if (caseTypeSelect.value === 'other') {
            otherInput.style.display = 'block';
        } else {
            otherInput.style.display = 'none';
        }
    }

 $(document).ready(function () {

    function handleSourceVisibility(val) {
        $('#contact_id, #account_id, #FnF, #source').hide();
        $('#sourceField').val("");

        if (val === "FnF") {
            $('#FnF, #source').show();
            $('#sourceField').val(val === "{{ $lead->source_type }}" ? "{{ $lead->source }}" : '');
        } else if (val === "contact") {
            $('#contact_id').show();
        } else if (val === "account") {
            $('#account_id').show();
        }
    }

    handleSourceVisibility($('#source_type').val());

    $('#source_type').on('change', function (e) {
        e.preventDefault();
        let val = $(this).val();
        handleSourceVisibility(val);
    });

    $(document).on('change','#lead_sub_status',function(){
        var current_val = $(this).val();
        if($(this).val() == 'closed'){
                $('#closing_reason_div').removeClass('d-none');
        }else{
            $('#closing_reason_div').addClass('d-none');
        }
    });

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
    });

    $(document).on('submit', '#leadUpdateForm', function (e) {
        e.preventDefault();
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
        $('.contact-button').attr('disabled', true);
        $.ajax({
            'url': "{{ route('update.lead', $lead->id) }}",
            'method': "POST",
            'data': new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function (data) {
                swal.fire('success', 'Lead has been Updated successfully', 'success');
                window.location.href = "{{ route('lead.list') }}";
            },
            error: function (xhr) {
                erroralert(xhr);
            }
        })
    });
});
</script>
@endsection

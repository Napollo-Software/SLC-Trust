@extends('nav')
@section('title', 'Medcaind | SLC Trust')
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

    <div class="container-xl px-4 mt-4">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Physician</b></span> / Medicaid </h5>
        <!-- Account page navigation-->
        <form method="post" id="MedicaidStoreForm" action="{{ route('store.lead') }}">
            @csrf
            <div class="card mb-3">
                <div class='card-header'>Physician Information</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <label for="form-label">Physician Name*</label>
                            <input type="text" class="form-control" id="physician_name" name="physician_name">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Referral Name*</label>
                            <select name="referral_name" class="form-control">
                                <option value="">Select Account</option>
                                @foreach ($referral_name as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name . ' ' . $item->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Name Of Practice*</label>
                            <input type="text" class="form-control" id="name_of_practice" name="name_of_practice">
                        </div>

                        <div class="col-md-6 p-2">
                            <label for="form-label">Phone*</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">EXT No</label>
                            <input type="number" class="form-control" id="ext" name="ext">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Fax No</label>
                            <input type="number" class="form-control" id="fax" name="fax">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">NPI Number</label>
                            <input type="number" class="form-control" id="npi" name="npi">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class='card-header'>

                    Medicaid / Medicare Information

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <label for="form-label">Medicaid Number</label>
                            <input type="number" class="form-control" id="medicaid_first_name" name="medicaid_first_name">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Codes</label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Does client currently have active medicaid?</label>
                            <input type="text" class="form-control" id="active" name="active">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Medicaid Plan</label>
                            <input type="text" class="form-control" id="plan" name="plan">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Medicare Number</label>
                            <input type="number" class="form-control" id="medicare_number" name="medicare_number">
                        </div>
                        <div class="col-md-6 p-2">
                            <label for="form-label">Medicare Type</label>
                            <input type="text" class="form-control" id="medicare_type" name="medicare_type">
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-primary submit-btn">Save</button>
                            <button class="btn btn-secondary m-2 clear-form">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contact').hide()
            $('#source').hide()
            $("#checkBox").on('change', function(e) {
                if ($(this).prop('checked')) {
                    let name = $('#physician_name').val();
                    let code = $('#code').val();
                    let phone = $('#phone').val();
                    let email = $('#email').val();
                    $('#medicaid_first_name').val(fname)
                    $('#patient_phone').val(phone)
                    $('#patient_email').val(email)
                } else {
                    $('#patient_first_name').val("")
                    $('#patient_last_name').val("")

                }
            })
            $('#source_type').on('change', function(e) {
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
        $(document).on('submit', '#MedicaidStoreForm', function(e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.contact-button').attr('disabled', true);
            $.ajax({
                'url': "{{ route('store.medicaid') }}",
                'method': "POST",
                'data': new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    swal.fire('success', 'Medcaid & Physician has been created successfully', 'success');
                    window.location.href = "{{ route('medicaid.list') }}";
                },
                error: function(xhr) {
                    erroralert(xhr);
                }
            })
        })
    </script>
@endsection

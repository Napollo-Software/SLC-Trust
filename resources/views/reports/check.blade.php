@extends('nav')
@section('title', 'Dashboard | Senior Life Care Trusts')
@section('wrapper')
<style>
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .is-invalid {
        border-color: #dc3545;
    }
    .select2-container--default .select2-selection--single.is-invalid {
        border-color: #dc3545;
    }
</style>
<div>
    <h5 class="d-flex justify-content-start pt-3 pb-1">
        <b></b>
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Create Check</b></div>
    </h5>
    <div class="d-flex justify-content-between no-print">
        <div id="content">
            <form method="post" id="check-form" action="{{ route('submit.forms') }}">
                @csrf
                <div class="card">
                    <div class="card-header pb-0 pl-0">
                        <h5 class="card-title pl-2">Check Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="check-number">Check Number</label>
                                <input type="number" required id="check-number" class="form-control check-number-details" name="number[]" placeholder="Check number" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="check-date">Check Date</label>
                                <input type="date" id="check-date" class="form-control check-date-details" name="date[]" value="<?php echo date('Y-m-d'); ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="user-account">User Account</label>
                                <div class="form-group">
                                    <select required id="user-account" name="user[]" class="form-control select-2" style="width: 100%">
                                        <option value="">Select User Account</option>
                                        @foreach ($users->sortBy('name') as $user)
                                        <option value="{{ $user->name . ' ' . $user->last_name }}">
                                            {{ $user->name . ' ' . $user->last_name }}
                                            <b>{{ "($" . $user->balance . ')' }}</b>
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback mt-3"></div>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-number">Amount in Number</label>
                                <input type="number" required id="amount-in-number" class="form-control amount-in-number-details" name="amount_in_number[]" onKeyPress="if(this.value.length==9) return false;" placeholder="Amount in number" min="0">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label required for="amount-in-word">Amount in Word</label>
                                <input type="text" id="amount-in-word" class="form-control amount-in-word-details" name="amount_in_word[]" placeholder="Amount in word">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="memo">Memo</label>
                                <textarea id="memo" class="form-control memo-details" name="memo[]" placeholder="Memo"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="account-number">Account Number</label>
                                <input id="account-number" class="form-control account-number" name="accountNumber[]" placeholder="Account number">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <br>
                        <hr>
                    </div>
                    <div class="card-footer py-3">
                        <button class="btn btn-primary" id="but_add" type="button" onclick="add_more()">
                            <i class="bx bx-plus pb-1"></i>Add more
                        </button>
                        <button class="btn btn-secondary" type="submit">
                            <i class="bx bx-printer"></i>Print
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="accounts" style="display:none">
    <option value="">Select Account</option>
    @foreach ($users as $user)
    <option value="{{ $user->name . ' ' . $user->last_name }}">{{ $user->name . ' ' . $user->last_name . "($" . $user->balance . ')' }}</option>
    @endforeach
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/jszip.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.1.223/js/kendo.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script>
    $(document).ready(function() {
        // Initialize Select2 on the initial select element
        $('#user-account').select2();
    });

    function validateFormData($cardBody) {
        let errors = {};
        let $checkNumber = $cardBody.find('.check-number-details');
        let $checkDate = $cardBody.find('.check-date-details');
        let $user = $cardBody.find('.select-2[name="user[]"]');
        let $amountInNumber = $cardBody.find('.amount-in-number-details');
        let $amountInWord = $cardBody.find('.amount-in-word-details');
        let $memoDetails = $cardBody.find('.memo-details');
        let $accountNumber = $cardBody.find('.account-number');

        if (!$checkNumber.val() || isNaN($checkNumber.val()) || $checkNumber.val() <= 0) {
            errors.checkNumber = "Check Number is required and must be a positive number.";
        }

        if (!$checkDate.val()) {
            errors.checkDate = "Check Date is required.";
        }

        if (!$user.val()) {
            errors.user = "User Account is required.";
        }

        if (!$amountInNumber.val() || isNaN($amountInNumber.val()) || $amountInNumber.val() <= 0) {
            errors.amountInNumber = "Amount in Number is required and must be a positive number.";
        }

        if (!$amountInWord.val()) {
            errors.amountInWord = "Amount in Word is required.";
        } else if ($amountInWord.val().length > 65) {
            errors.amountInWord = "Amount in Word must not exceed 65 characters.";
        } else if (/^\d+$/.test($amountInWord.val())) {
            errors.amountInWord = "Amount in Word field must be in words.";
        }

        if ($memoDetails.val() && $memoDetails.val().length > 65) {
            errors.memo = "Memo details max character allowed is 65.";
        }
        if ($accountNumber.val() && $accountNumber.val().length > 65) {
            errors.accountNumber = "Account number max character allowed is 65.";
        }

        return errors;
    }

    function clearErrors($cardBody) {
        $cardBody.find('.invalid-feedback').text('');
        $cardBody.find('.form-control, .select-2').removeClass('is-invalid');
        $cardBody.find('.select2-selection--single').removeClass('is-invalid');
    }

    function displayErrors($cardBody, errors) {
        if (errors.checkNumber) {
            $cardBody.find('.check-number-details').addClass('is-invalid');
            $cardBody.find('.check-number-details').next('.invalid-feedback').text(errors.checkNumber);
        }
        if (errors.checkDate) {
            $cardBody.find('.check-date-details').addClass('is-invalid');
            $cardBody.find('.check-date-details').next('.invalid-feedback').text(errors.checkDate);
        }
        if (errors.user) {
            $cardBody.find('.select-2[name="user[]"]').addClass('is-invalid');
            $cardBody.find('.select-2[name="user[]"]').closest('.form-group').find('.select2-selection--single').addClass('is-invalid');
            $cardBody.find('.select-2[name="user[]"]').parent().find('.invalid-feedback').text(errors.user);
        }
        if (errors.amountInNumber) {
            $cardBody.find('.amount-in-number-details').addClass('is-invalid');
            $cardBody.find('.amount-in-number-details').next('.invalid-feedback').text(errors.amountInNumber);
        }
        if (errors.amountInWord) {
            $cardBody.find('.amount-in-word-details').addClass('is-invalid');
            $cardBody.find('.amount-in-word-details').next('.invalid-feedback').text(errors.amountInWord);
        }
        if (errors.memo) {
            $cardBody.find('.memo-details').addClass('is-invalid');
            $cardBody.find('.memo-details').next('.invalid-feedback').text(errors.memo);
        }
        if (errors.accountNumber) {
            $cardBody.find('.account-number').addClass('is-invalid');
            $cardBody.find('.account-number').next('.invalid-feedback').text(errors.accountNumber);
        }
    }

    function collectFormData() {
        let formDataArray = [];
        $('.card-body').each(function() {
            let formData = {
                checkNumber: $(this).find('.check-number-details').val(),
                checkDate: $(this).find('.check-date-details').val(),
                user: $(this).find('.select-2[name="user[]"]').val(),
                amountInNumber: $(this).find('.amount-in-number-details').val(),
                amountInWord: $(this).find('.amount-in-word-details').val(),
                memo: $(this).find('.memo-details').val()
                accountNumber: $(this).find('.account-number').val()
            };
            formDataArray.push(formData);
        });
        return formDataArray;
    }

    function sendFormData() {
        let formDataArray = collectFormData();
        let allValid = true;

        $('.card-body').each(function() {
            clearErrors($(this));
        });

        $('.card-body').each(function(index) {
            let errors = validateFormData($(this));
            if (Object.keys(errors).length > 0) {
                allValid = false;
                displayErrors($(this), errors);
            }
        });

        if (!allValid) {
            return;
        }

        $("#check-form").submit();
    }

    function add_more() {
        $('.card-body').each(function() {
            clearErrors($(this));
        });

        let allValid = true;
        $('.card-body').each(function(index) {
            let errors = validateFormData($(this));
            if (Object.keys(errors).length > 0) {
                allValid = false;
                displayErrors($(this), errors);
            }
        });

        if (!allValid) {
            return;
        }

        let newModalBody = $('.card-body:first').clone(true);
        let checkNumberFields = $('.card-body').find('.check-number-details');
        let maxCheckNumber = 0;

        checkNumberFields.each(function() {
            let checkNumber = parseInt($(this).val());
            if (!isNaN(checkNumber) && checkNumber > maxCheckNumber) {
                maxCheckNumber = checkNumber;
            }
        });

        let modalBodyCount = $('.card-body').length + 1;
        let newCheckNumber = maxCheckNumber + 1;
        let uniqueIdPrefix = 'field-' + Date.now() + '-' + Math.floor(Math.random() * 1000); // Unique prefix for all fields

        // Update IDs and clear values in the cloned section
        newModalBody.find('.check-number-details').attr('id', `check-number-${uniqueIdPrefix}`).val(newCheckNumber);
        newModalBody.find('.check-date-details').attr('id', `check-date-${uniqueIdPrefix}`).val('<?php echo date('Y-m-d'); ?>');
        newModalBody.find('.amount-in-number-details').attr('id', `amount-in-number-${uniqueIdPrefix}`).val('');
        newModalBody.find('.amount-in-word-details').attr('id', `amount-in-word-${uniqueIdPrefix}`).val('');
        newModalBody.find('.memo-details').attr('id', `memo-${uniqueIdPrefix}`).val('');
        newModalBody.find('.account-number').attr('id', `account-number-${uniqueIdPrefix}`).val('');
        newModalBody.find('.invalid-feedback').text('');

        // Remove the cloned select element and create a new one
        newModalBody.find('.select-2').parent().empty(); // Clear the form-group content
        let newSelect = $('<select>', {
            id: `user-account-${uniqueIdPrefix}`,
            name: 'user[]', // Keep name consistent for form submission
            class: 'form-control select-2',
            style: 'width: 100%'
        });
        newSelect.html($('#accounts').html()); // Populate with options from #accounts
        newSelect.val(''); // Ensure no default selection

        // Append new select to the form-group
        newModalBody.find('.form-group').append(newSelect);
        newModalBody.find('.form-group').append('<div class="invalid-feedback mt-3"></div>');

        // Initialize Select2 on the new select
        newModalBody.find(`#user-account-${uniqueIdPrefix}`).select2();

        // Add remove button
        let removeButton = $('<button/>', {
            text: 'X',
            type: 'button',
            class: 'btn btn-danger',
            style: 'float: right',
            click: function() {
                $(this).closest('.card-body').remove();
            }
        });
        newModalBody.prepend(removeButton);

        // Insert the new card-body
        newModalBody.insertAfter(".card-body:last");
    }

    $('.btn-secondary').on('click', function(e) {
        e.preventDefault();
        sendFormData();
    });
</script>

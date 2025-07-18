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
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Create Check</b></div>
    </h5>
    <div class="d-flex justify-content-between no-print">
        <div id="content" class="pb-5">
            <form method="post" id="check-form" action="{{ route('submit.forms') }}">
                @csrf
                <div class="card">
                    <div class="card-header pb-0 pl-0">
                        <h5 class="card-title pl-2">Check Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 p-2">
                                <label for="check-number">Number</label>
                                <input type="number" required id="check-number" class="form-control check-number-details" name="number[]" placeholder="Check number" min="1" max="9999999">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="check-date">Check Date</label>
                                <input type="date" required id="check-date" class="form-control check-date-details" name="date[]" value="<?php echo date('Y-m-d'); ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="user-account">User Account</label>
                                <div class="form-group">
                                    <select required id="user-account" name="user[]" class="form-control select-2" style="width: 100%">
                                        <option value="">Select User Account</option>
                                        @foreach ($users->sortBy('name') as $user)
                                        <option value="{{ $user->name . ' ' . $user->last_name }}">
                                            {{ $user->name . ' ' . $user->last_name }} ({{ "$" . number_format($user->balance, 2) }})
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback mt-3"></div>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-number">Amount in Number</label>
                                <input type="number" required id="amount-in-number" class="form-control amount-in-number-details" name="amount_in_number[]" step="0.01" min="0.01" max="10000000" placeholder="Amount in number">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-word">Amount in Word</label>
                                <input type="text" required id="amount-in-word" class="form-control amount-in-word-details" name="amount_in_word[]" placeholder="Amount in word">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="memo">Memo</label>
                                <textarea id="memo" class="form-control memo-details" name="memo[]" placeholder="Memo"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="routing-number">Routing Number</label>
                                <input type="text" required id="routing-number" class="form-control routing-number" name="routingNumber[]" placeholder="9-digit routing number">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="account-number">Account Number</label>
                                <input type="text" required id="account-number" class="form-control account-number" name="accountNumber[]" placeholder="Account number">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="bank-check-number">Bank Check Number</label>
                                <input type="text" required id="bank-check-number" class="form-control bank-check-number" name="bankCheckNumber[]" placeholder="6-digit check number">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="bank-name">Bank Name</label>
                                <input type="text" id="bank-name" class="form-control bank-name" name="bankName[]" placeholder="Bank name">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="signature">Signature</label>
                                <input type="text" id="signature" class="form-control signature" name="signature[]" placeholder="Signature">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-footer py-3">
                        <button class="btn btn-primary" id="but_add" type="button" onclick="add_more()">
                            <i class="bx bx-plus pb-1"></i>Add more
                        </button>
                        <button class="btn btn-secondary" type="button" onclick="sendFormData()">
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
    <option value="{{ $user->name . ' ' . $user->last_name }}">{{ $user->name . ' ' . $user->last_name }} ({{ "$" . number_format($user->balance, 2) }})</option>
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
        // Initialize Select2 for all existing select elements
        $('.select-2').select2();

        // Prevent form submission on Enter key
        $('#check-form').on('keypress', function(e) {
            if (e.which === 13) {
                e.preventDefault();
            }
        });
    });

    function validateFormData($cardBody) {
        let errors = {};
        let $checkNumber = $cardBody.find('.check-number-details');
        let $checkDate = $cardBody.find('.check-date-details');
        let $user = $cardBody.find('.select-2[name="user[]"]');
        let $amountInNumber = $cardBody.find('.amount-in-number-details');
        let $amountInWord = $cardBody.find('.amount-in-word-details');
        let $memoDetails = $cardBody.find('.memo-details');
        let $routingNumber = $cardBody.find('.routing-number');
        let $accountNumber = $cardBody.find('.account-number');
        let $bankCheckNumber = $cardBody.find('.bank-check-number');
        let $bankName = $cardBody.find('.bank-name');
        let $signature = $cardBody.find('.signature');

        // Check Number validation
        if (!$checkNumber.val() || isNaN($checkNumber.val()) || parseInt($checkNumber.val()) <= 0) {
            errors.checkNumber = "Number is required and must be a positive number.";
        } else if (parseInt($checkNumber.val()) > 9999999) {
            errors.checkNumber = "Number must not exceed 7 digits.";
        } else {
            // Check for duplicate numbers
            let checkNumber = parseInt($checkNumber.val());
            let isDuplicate = false;
            $('.check-number-details').not($checkNumber).each(function() {
                if (parseInt($(this).val()) === checkNumber) {
                    isDuplicate = true;
                }
            });
            if (isDuplicate) {
                errors.checkNumber = "Number must be unique.";
            }
        }

        // Check Date validation
        if (!$checkDate.val()) {
            errors.checkDate = "Check Date is required.";
        } else {
            let today = new Date().setHours(0, 0, 0, 0);
            let selectedDate = new Date($checkDate.val()).setHours(0, 0, 0, 0);
            if (selectedDate > today) {
                errors.checkDate = "Check Date cannot be in the future.";
            }
        }

        // User Account validation
        if (!$user.val()) {
            errors.user = "User Account is required.";
        }

        // Amount in Number validation
        if (!$amountInNumber.val() || isNaN($amountInNumber.val()) || parseFloat($amountInNumber.val()) <= 0) {
            errors.amountInNumber = "Amount in Number is required and must be a positive number.";
        } else if (parseFloat($amountInNumber.val()) > 10000000) {
            errors.amountInNumber = "Amount in Number must not exceed 10,000,000.";
        }

        // Amount in Word validation
        if (!$amountInWord.val()) {
            errors.amountInWord = "Amount in Word is required.";
        } else if ($amountInWord.val().length > 65) {
            errors.amountInWord = "Amount in Word must not exceed 65 characters.";
        } else if (/^\d+$/.test($amountInWord.val())) {
            errors.amountInWord = "Amount in Word must be in words, not numbers.";
        }

        // Memo validation
        if ($memoDetails.val() && $memoDetails.val().length > 65) {
            errors.memo = "Memo must not exceed 65 characters.";
        }

        // Routing Number validation
        if (!$routingNumber.val()) {
            errors.routingNumber = "Routing Number is required.";
        } else if (!/^\d{9}$/.test($routingNumber.val())) {
            errors.routingNumber = "Routing Number must be exactly 9 digits.";
        }

        // Account Number validation
        if (!$accountNumber.val()) {
            errors.accountNumber = "Account Number is required.";
        } else if (!/^\d{1,17}$/.test($accountNumber.val())) {
            errors.accountNumber = "Account Number must be 1 to 17 digits.";
        }

        // Bank Check Number validation
        if (!$bankCheckNumber.val()) {
            errors.bankCheckNumber = "Bank Check Number is required.";
        } else if (!/^\d{6}$/.test($bankCheckNumber.val())) {
            errors.bankCheckNumber = "Bank Check Number must be exactly 6 digits.";
        }

        // Bank Name validation
        if ($bankName.val() && $bankName.val().length > 50) {
            errors.bankName = "Bank Name must not exceed 50 characters.";
        }

        // Signature validation
        if ($signature.val() && $signature.val().length > 50) {
            errors.signature = "Signature must not exceed 50 characters.";
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
        if (errors.routingNumber) {
            $cardBody.find('.routing-number').addClass('is-invalid');
            $cardBody.find('.routing-number').next('.invalid-feedback').text(errors.routingNumber);
        }
        if (errors.accountNumber) {
            $cardBody.find('.account-number').addClass('is-invalid');
            $cardBody.find('.account-number').next('.invalid-feedback').text(errors.accountNumber);
        }
        if (errors.bankCheckNumber) {
            $cardBody.find('.bank-check-number').addClass('is-invalid');
            $cardBody.find('.bank-check-number').next('.invalid-feedback').text(errors.bankCheckNumber);
        }
        if (errors.bankName) {
            $carBody.find('.bank-name').addClass('is-invalid');
            $cardBody.find('.bank-name').next('.invalid-feedback').text(errors.bankName);
        }
        if (errors.signature) {
            $cardBody.find('.signature').addClass('is-invalid');
            $cardBody.find('.signature').next('.invalid-feedback').text(errors.signature);
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
                memo: $(this).find('.memo-details').val(),
                routingNumber: $(this).find('.routing-number').val(),
                accountNumber: $(this).find('.account-number').val(),
                bankCheckNumber: $(this).find('.bank-check-number').val(),
                bankName: $(this).find('.bank-name').val(),
                signature: $(this).find('.signature').val()
            };
            formDataArray.push(formData);
        });
        return formDataArray;
    }

    function sendFormData() {
        let formDataArray = collectFormData();
        let allValid = true;

        // Clear all previous errors
        $('.card-body').each(function() {
            clearErrors($(this));
        });

        // Validate each card body
        $('.card-body').each(function() {
            let errors = validateFormData($(this));
            if (Object.keys(errors).length > 0) {
                allValid = false;
                displayErrors($(this), errors);
            }
        });

        if (allValid) {
            $("#check-form").submit();
        } else {
            // Scroll to the first error
            let firstError = $('.is-invalid:first');
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }
        }
    }

    function add_more() {
        // Validate all existing card bodies
        let allValid = true;
        $('.card-body').each(function() {
            clearErrors($(this));
            let errors = validateFormData($(FuzzyLogic));
            if (Object.keys(errors).length > 0) {
                allValid = false;
                displayErrors($(this), errors);
            }
        });

        if (!allValid) {
            // Scroll to the first error
            let firstError = $('.is-invalid:first');
            if (firstError.length) {
                $('html, body').animate({
                    scrollTop: firstError.offset().top - 100
                }, 500);
            }
            return;
        }

        // Clone the first card body
        let newModalBody = $('.card-body:first').clone(true);
        let checkNumberFields = $('.card-body').find('.check-number-details');
        let maxCheckNumber = 0;

        // Find the maximum check number
        checkNumberFields.each(function() {
            let checkNumber = parseInt($(this).val());
            if (!isNaN(checkNumber) && checkNumber > maxCheckNumber) {
                maxCheckNumber = checkNumber;
            }
        });

        let newCheckNumber = maxCheckNumber + 1;
        let uniqueIdPrefix = 'field-' + Date.now() + '-' + Math.floor(Math.random() * 1000);

        // Update input IDs and clear values
        newModalBody.find('.check-number-details').attr('id', `check-number-${uniqueIdPrefix}`).val(newCheckNumber);
        newModalBody.find('.check-date-details').attr('id', `check-date-${uniqueIdPrefix}`).val('<?php echo date('Y-m-d'); ?>');
        newModalBody.find('.amount-in-number-details').attr('id', `amount-in-number-${uniqueIdPrefix}`).val('');
        newModalBody.find('.amount-in-word-details').attr('id', `amount-in-word-${uniqueIdPrefix}`).val('');
        newModalBody.find('.memo-details').attr('id', `memo-${uniqueIdPrefix}`).val('');
        newModalBody.find('.routing-number').attr('id', `routing-number-${uniqueIdPrefix}`).val('');
        newModalBody.find('.account-number').attr('id', `account-number-${uniqueIdPrefix}`).val('');
        newModalBody.find('.bank-check-number').attr('id', `bank-check-number-${uniqueIdPrefix}`).val('');
        newModalBody.find('.bank-name').attr('id', `bank-name-${uniqueIdPrefix}`).val('');
        newModalBody.find('.signature').attr('id', `signature-${uniqueIdPrefix}`).val('');
        newModalBody.find('.invalid-feedback').text('');

        // Replace select element
        newModalBody.find('.select-2').parent().empty();
        let newSelect = $('<select>', {
            id: `user-account-${uniqueIdPrefix}`,
            name: 'user[]',
            class: 'form-control select-2',
            style: 'width: 100%'
        });
        newSelect.html($('#accounts').html());
        newSelect.val('');

        newModalBody.find('.form-group').append(newSelect);
        newModalBody.find('.form-group').append('<div class="invalid-feedback mt-3"></div>');

        // Initialize Select2 for the new select element
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
        newModalBody.append('<hr>');

        // Insert the new card body
        newModalBody.insertAfter(".card-body:last");

        // Scroll to the new card body
        $('html, body').animate({
            scrollTop: newModalBody.offset().top - 100
        }, 500);
    }
</script>

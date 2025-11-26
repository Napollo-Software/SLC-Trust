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
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Create Check</b>
        </div>
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
                                <label for="number">Check Number <span class="text-danger">*</span></label>
                                <input type="number" required id="number" class="form-control number-details"
                                    name="number[]" placeholder="Number" min="1" max="9999999">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="check-date">Check Date <span class="text-danger">*</span></label>
                                <input type="date" required id="check-date" class="form-control check-date-details"
                                    name="date[]" value="<?php echo date('Y-m-d'); ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="user-account">Payee</label>
                                <div class="form-group">
                                    <select required id="user-account" name="user[]" class="form-control select-2"
                                        style="width: 100%">
                                        <option value="">Select Payee</option>
                                        @foreach ($users->sortBy('name') as $user)
                                        <option value="{{ $user->name . ' ' . $user->last_name }}">
                                            {{ $user->name . ' ' . $user->last_name }}
                                            ({{ "$" . number_format($user->balance, 2) }})
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback mt-3"></div>
                                </div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-number">Amount in Numbers <span
                                        class="text-danger">*</span></label>
                               <input type="text" required id="amount-in-number"
    class="form-control amount-in-number-details"
    name="amount_in_number[]" placeholder="Amount in numbers">

                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="amount-in-word">Amount in Words <span class="text-danger">*</span></label>
                                <input type="text" required id="amount-in-word"
                                    class="form-control amount-in-word-details" name="amount_in_word[]"
                                    placeholder="Amount in words" readonly>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="memo">Memo</label>
                                <textarea id="memo" class="form-control memo-details" name="memo[]"
                                    placeholder="Memo"></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="routing-number">Routing Number <span class="text-danger">*</span></label>
                                <input type="text" required id="routing-number" class="form-control routing-number"
                                    name="routingNumber[]" placeholder="9-digit routing number" value="021406667">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="account-number">Account Number <span class="text-danger">*</span></label>
                                <input type="text" required id="account-number" class="form-control account-number"
                                    name="accountNumber[]" placeholder="Account number" value="5000381649">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="address-line1">Customer Address Line 1 <span
                                        class="text-danger">*</span></label>
                                <input type="text" required id="address-line1" class="form-control address-line1"
                                    name="addressLine1[]" placeholder="Customer address line 1">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="address-line2">Customer Address Line 2</label>
                                <input type="text" required id="address-line2" class="form-control address-line2"
                                    name="addressLine2[]" placeholder="Customer address line 2">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="address-line3">Customer Address Line 3</label>
                                <input type="text" required id="address-line3" class="form-control address-line3"
                                    name="addressLine3[]" placeholder="Customer address line 3">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="bank-name">Bank Name <span class="text-danger">*</span></label>
                                <input type="text" id="bank-name" class="form-control bank-name" name="bankName[]"
                                    placeholder="Bank name" value="Dime">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="col-md-6 p-2">
                                <label for="signature">Signature <span class="text-danger"></span></label>
                                <input type="text" id="signature" class="form-control signature" name="signature[]"
                                    placeholder="Signature">
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
    <option value="{{ $user->name . ' ' . $user->last_name }}">{{ $user->name . ' ' . $user->last_name }}
        ({{ "$" . number_format($user->balance, 2) }})</option>
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
    function sanitizeAmount(input) {
    // Keep only digits and decimal point
    input = input.replace(/[^0-9.]/g, "");

    // Allow only one decimal point
    let firstDot = input.indexOf(".");
    if (firstDot !== -1) {
        // Remove all additional dots
        input =
            input.substring(0, firstDot + 1) +
            input.substring(firstDot + 1).replace(/\./g, "");
    }

    // If decimals > 2 → keep only first 2 (NO ROUNDING, strict)
    let parts = input.split(".");
    if (parts.length === 2 && parts[1].length > 2) {
        parts[1] = parts[1].substring(0, 2);
        input = parts[0] + "." + parts[1];
    }

    return input;
}

$(document).on("input", ".amount-in-number-details", function () {
    let cleanValue = sanitizeAmount($(this).val());
    $(this).val(cleanValue);

    let wordField = $(this).closest(".card-body").find(".amount-in-word-details");
    wordField.val(numberToWords(cleanValue));
});

function numberToWords(amount) {
    amount = parseFloat(amount);   // Convert FIRST

    if (isNaN(amount) || amount <= 0 || amount > 999999999999) return "";

    const ones = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
    const teens = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
    const tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
    const scale = ["", "Thousand", "Million", "Billion"];

    let numStr = amount.toFixed(2);
    let parts = numStr.split(".");
    let intPart = parseInt(parts[0]);
    let decimalPart = parseInt(parts[1]);
    let originalInt = intPart;

    function convertHundreds(num) {
        let str = "";
        if (num >= 100) {
            str += ones[Math.floor(num / 100)] + " Hundred ";
            num %= 100;
        }
        if (num >= 10 && num <= 19) {
            str += teens[num - 10] + " ";
        } else if (num >= 20) {
            str += tens[Math.floor(num / 10)] + " ";
            if (num % 10 > 0) str += ones[num % 10] + " ";
        } else if (num > 0) {
            str += ones[num] + " ";
        }
        return str.trim();
    }

    let words = "";
    let i = 0;

    while (intPart > 0) {
        let chunk = intPart % 1000;
        if (chunk > 0) {
            words = convertHundreds(chunk) + " " + scale[i] + " " + words;
        }
        intPart = Math.floor(intPart / 1000);
        i++;
    }

    words = words.trim();

    // Handle cents
    if (decimalPart > 0) {
        let centWords = convertHundreds(decimalPart) + " Cent" + (decimalPart > 1 ? "s" : "");

        if (originalInt > 0) {
            words += " and " + centWords + " Only";
        } else {
            words = centWords + " Only";
        }
    } else {
        words += " Only";
    }

    return words.trim();
}



$(document).on('input', '.amount-in-number-details', function() {
    let amount = $(this).val();
    let wordField = $(this).closest('.card-body').find('.amount-in-word-details');
    wordField.val(numberToWords(amount));
});

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
    let $number = $cardBody.find('.number-details');
    let $checkDate = $cardBody.find('.check-date-details');
    let $user = $cardBody.find('.select-2[name="user[]"]');
    let $amountInNumber = $cardBody.find('.amount-in-number-details');
    let $amountInWord = $cardBody.find('.amount-in-word-details');
    let $memoDetails = $cardBody.find('.memo-details');
    let $routingNumber = $cardBody.find('.routing-number');
    let $accountNumber = $cardBody.find('.account-number');
    let $addressLine1 = $cardBody.find('.address-line1');
    let $addressLine2 = $cardBody.find('.address-line2');
    let $addressLine3 = $cardBody.find('.address-line3');
    let $bankName = $cardBody.find('.bank-name');
    let $signature = $cardBody.find('.signature');

    // Check Number validation
    if (!$number.val() || isNaN($number.val()) || parseInt($number.val()) <= 0) {
        errors.number = "This field is required and must be a positive number.";
    } else if ($number.val().length > 9) {
        errors.number = "Number must not exceed 9 characters.";
    } else {
        // Check for duplicate numbers
        let number = parseInt($number.val());
        let isDuplicate = false;
        $('.number-details').not($number).each(function() {
            if (parseInt($(this).val()) === number) {
                isDuplicate = true;
            }
        });
        if (isDuplicate) {
            errors.number = "Number must be unique.";
        }
    }

    // Check Date validation
    if (!$checkDate.val()) {
        errors.checkDate = "Check Date is required.";
    }

    // User Account validation
    if (!$user.val()) {
        errors.user = "User Account is required.";
    }

    // Amount in Number validation
    if (!$amountInNumber.val() || isNaN($amountInNumber.val()) || parseFloat($amountInNumber.val()) <= 0) {
        errors.amountInNumber = "This field is required and must be a positive number.";
    } else if (parseFloat($amountInNumber.val()) > 10000000) {
        errors.amountInNumber = "This field must not exceed 10,000,000.";
    }

    // Amount in Word validation
    if (!$amountInWord.val()) {
        errors.amountInWord = "This field is required.";
    } else if ($amountInWord.val().length > 65) {
        errors.amountInWord = "This field must not exceed 65 characters.";
    } else if (/^\d+$/.test($amountInWord.val())) {
        errors.amountInWord = "This field must be in words, not numbers.";
    }

    // Memo validation
    if ($memoDetails.val() && $memoDetails.val().length > 65) {
        errors.memo = "Memo must not exceed 65 characters.";
    }

    if (!$routingNumber.val()) {
        errors.routingNumber = "Routing Number is required.";
    } else if (!/^\d{9}$/.test($routingNumber.val())) {
        errors.routingNumber = "Routing Number must be exactly 9 digits.";
    }

    if (!$accountNumber.val()) {
        errors.accountNumber = "This field is required.";
    } else if (!/^\d{1,17}$/.test($accountNumber.val())) {
        errors.accountNumber = "This field must be 1 to 17 digits.";
    }

    if ($addressLine1.val() && $addressLine1.val().length > 50) {
        errors.addressLine1 = "This field must not exceed 50 characters.";
    }
    if ($addressLine2.val() && $addressLine2.val().length > 50) {
        errors.addressLine2 = "This field must not exceed 50 characters.";
    }
    if ($addressLine3.val() && $addressLine3.val().length > 50) {
        errors.addressLine3 = "This field must not exceed 50 characters.";
    }
    if (!$addressLine1.val()) {
        errors.addressLine1 = "This field is required.";
    }
    if (!$bankName.val()) {
        errors.bankName = "This field is required";
    }
    if ($bankName.val() && $bankName.val().length > 50) {
        errors.bankName = "Bank Name must not exceed 50 characters.";
    }
    // if (!$signature.val()) {
    //     errors.signature = "This field is required.";
    // }
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
    if (errors.number) {
        $cardBody.find('.number-details').addClass('is-invalid');
        $cardBody.find('.number-details').next('.invalid-feedback').text(errors.number);
    }
    if (errors.checkDate) {
        $cardBody.find('.check-date-details').addClass('is-invalid');
        $cardBody.find('.check-date-details').next('.invalid-feedback').text(errors.checkDate);
    }
    if (errors.user) {
        $cardBody.find('.select-2[name="user[]"]').addClass('is-invalid');
        $cardBody.find('.select-2[name="user[]"]').closest('.form-group').find('.select2-selection--single').addClass(
            'is-invalid');
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
    if (errors.addressLine1) {
        $cardBody.find('.address-line1').addClass('is-invalid');
        $cardBody.find('.address-line1').next('.invalid-feedback').text(errors.accountNumber);
    }
    if (errors.addressLine2) {
        $cardBody.find('.address-line2').addClass('is-invalid');
        $cardBody.find('.address-line2').next('.invalid-feedback').text(errors.accountNumber);
    }
    if (errors.addressLine3) {
        $cardBody.find('.address-line3').addClass('is-invalid');
        $cardBody.find('.address-line3').next('.invalid-feedback').text(errors.accountNumber);
    }
    if (errors.bankName) {
        $cardBody.find('.bank-name').addClass('is-invalid');
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
            number: $(this).find('.number-details').val(),
            checkDate: $(this).find('.check-date-details').val(),
            user: $(this).find('.select-2[name="user[]"]').val(),
            amountInNumber: $(this).find('.amount-in-number-details').val(),
            amountInWord: $(this).find('.amount-in-word-details').val(),
            memo: $(this).find('.memo-details').val(),
            routingNumber: $(this).find('.routing-number').val(),
            accountNumber: $(this).find('.account-number').val(),
            bankName: $(this).find('.bank-name').val(),
            addressLine1: $(this).find('.address-line1').val(),
            addressLine2: $(this).find('.address-line2').val(),
            addressLine3: $(this).find('.address-line3').val(),
            signature: $(this).find('.signature').val()
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
        let firstError = $('.is-invalid:first');
        if (firstError.length) {
            $('html, body').animate({
                scrollTop: firstError.offset().top - 100
            }, 500);
        }
    }
}

function add_more() {
    let allValid = true;
    $('.card-body').each(function() {
        clearErrors($(this));
        let errors = validateFormData($(this));
        if (Object.keys(errors).length > 0) {
            allValid = false;
            displayErrors($(this), errors);
        }
    });

    if (!allValid) {
        console.log('Validation failed');
        let firstError = $('.is-invalid:first');
        if (firstError.length) {
            $('html, body').animate({
                scrollTop: firstError.offset().top - 100
            }, 500);
        }
        return;
    }

    let newModalBody = $('.card-body:first').clone(true);
    let numberFields = $('.card-body').find('.number-details');
    let maxNumber = 0;

    numberFields.each(function() {
        let number = parseInt($(this).val());
        if (!isNaN(number) && number > maxNumber) {
            maxNumber = number;
        }
    });

    let newNumber = maxNumber + 1;
    let uniqueIdPrefix = 'field-' + Date.now() + '-' + Math.floor(Math.random() * 1000);

    newModalBody.find('.number-details').attr('id', `number-${uniqueIdPrefix}`).val(newNumber);
    newModalBody.find('.check-date-details').attr('id', `check-date-${uniqueIdPrefix}`).val(
        '<?php echo date('Y-m-d'); ?>');
    newModalBody.find('.amount-in-number-details').attr('id', `amount-in-number-${uniqueIdPrefix}`).val('');
    newModalBody.find('.amount-in-word-details').attr('id', `amount-in-word-${uniqueIdPrefix}`).val('');
    newModalBody.find('.memo-details').attr('id', `memo-${uniqueIdPrefix}`).val('');
    newModalBody.find('.routing-number').attr('id', `routing-number-${uniqueIdPrefix}`).val('');
    newModalBody.find('.account-number').attr('id', `account-number-${uniqueIdPrefix}`).val('');
    newModalBody.find('.bank-name').attr('id', `bank-name-${uniqueIdPrefix}`).val('');
    newModalBody.find('.address-line1').attr('id', `address-line1-${uniqueIdPrefix}`).val('');
    newModalBody.find('.address-line2').attr('id', `address-line2-${uniqueIdPrefix}`).val('');
    newModalBody.find('.address-line3').attr('id', `address-line3-${uniqueIdPrefix}`).val('');
    newModalBody.find('.signature').attr('id', `signature-${uniqueIdPrefix}`).val('');
    newModalBody.find('.invalid-feedback').text('');

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

    newModalBody.find(`#user-account-${uniqueIdPrefix}`).select2();

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

    newModalBody.insertAfter(".card-body:last");

    $('html, body').animate({
        scrollTop: newModalBody.offset().top - 100
    }, 500);
    console.log('New card body added');
}
</script>
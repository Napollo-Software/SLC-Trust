@extends("nav")
@section('title', 'Manage Payment | Senior Life Care Trusts')
@section("wrapper")
<style>
    #hidden_div,
    #hidden_div,
    #hidden_div2 {
        display: none;
    }

</style>
<div>
    <h5 class="d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/all_users')}}" class="text-muted fw-light pointer"><b>All Users</b></a> / <b>Manage Payment</b> </div>
    </h5>
    <form id="depositForm" action="{{route('add_user_balance', $user->id )}}" method="POST">
        @csrf
        <div class="row gap-y-2 d-flex">
            <div class="col-lg-4">
                <div class="card">
                    <h5 class="card-header py-3">Select Actions</h5>
                    <div class="card-body">
                        <div class="d-flex gap-3 flex-wrap flex-column">
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input toggle-field p-2" name="add_balance" type="checkbox" id="toggleBalance" data-target=".balance-section" checked>
                                <label class="form-check-label ps-1 pt-1" for="toggleBalance">Add Balance</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input toggle-field p-2" name="registration_fee" type="checkbox" id="toggleRegistrationFee" data-target=".registration-fee-section">
                                <label class="form-check-label ps-1 pt-1" for="toggleRegistrationFee">Charge one-time Registration Fee</label>
                            </div>
                            <div class="form-check d-flex align-items-center">
                                <input class="form-check-input toggle-field p-2" name="maintenance_fee_check" type="checkbox" id="toggleMaintenanceFee" data-target=".maintenance-fee-section">
                                <label class="form-check-label ps-1 pt-1" for="toggleMaintenanceFee">Charge Maintenance Fee</label>
                            </div>
                            <div class="form-check d-flex align-items-center d-none" id="creditCardOption">
                                <input class="form-check-input toggle-field p-2" name="send_amount_to_credit_card" type="checkbox" id="sendToCreditCard" />
                                <label class="form-check-label ps-1 pt-1" for="sendToCreditCard">Send Remaining Amount to Credit Card</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <h5 class="card-header py-3">Payment Form</h5>
                    <div class="card-body">
                        <div class="row flex-wrap">
                            <div class="col-lg-8 px-0">
                                <div class="col-lg-12 mb-3 balance-section">
                                    <label for="balance" class="form-label">Add Balance</label>
                                    <input type="number" class="form-control" placeholder="$" name="balance" step="any" min="0" />
                                </div>
                                <div class="col-lg-12 mb-3 maintenance-fee-section d-none">
                                    <label for="maintenance_fee_type" class="form-label">Deduct maintenance fee in?</label>
                                    <select name="maintenance_fee_type" class="form-control form-select" id="maintenance_fee_type">
                                        <option value="percentage">Percentage (%)</option>
                                        <option value="fixed">Fixed Amount</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3 maintenance-fee-section d-none">
                                    <label for="maintenance_fee" class="form-label">Maintenance Fee</label>
                                    <input type="number" class="form-control" placeholder="Enter maintenance fee" name="maintenance_fee" id="maintenance_fee" step="any" min="0" />
                                </div>
                                <div class="col-lg-12 mb-3 registration-fee-section d-none">
                                    <label for="registration_fee_amount" class="form-label">Registration Fee Amount</label>
                                    <input class="form-control" name="registration_fee_amount" placeholder="Enter amount" type="number" value="300" min="0" step="any" />
                                </div>
                                <div class="col-lg-12 mb-3 required-with-balance">
                                    <label for="payment_type" class="form-label">Payment Type</label>
                                    <select class="form-control form-select" name="payment_type" onchange="showDiv2(this)" required>
                                        <option value="">Select Type</option>
                                        <option value="ACH">ACH</option>
                                        <option value="Card">Card</option>
                                        <option value="Check Payment">Check Payment</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 mb-3" id="hidden_div">
                                    <label for="exampleFormControlInput1" class="form-label">Transaction No.#</label>
                                    <input type="text" class="form-control mb-3 trans-no" placeholder="Transaction No." name="trans_no" required />
                                </div>
                                <div class="col-lg-12 mb-3" id="hidden_div2">
                                    <label for="exampleFormControlInput1" class="form-label">Check No.#</label>
                                    <input type="text" class="form-control mb-3 check-no" placeholder="Check No." name="check_no" />
                                </div>
                                <div class="col-lg-12 mb-3" id="hidden_div3">
                                    <label for="exampleFormControlInput1" class="form-label">Card No.#</label>
                                    <input type="text" class="form-control mb-3 card-no" placeholder="Card No" name="card_no" />
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Date of Transaction</label>
                                    <input value="{{ date('Y-m-d') }}" type="date" class="form-control" placeholder="Date of Transaction" name="date_of_trans" required />
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <button class="btn btn-primary add-balance">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    function showDiv2(element) {
        const value = element.value;

        $('.trans-no').attr('required', value === 'ACH');
        $('.check-no').attr('required', value === 'Check Payment');
        $('.card-no').attr('required', value === 'Card');

        $('#hidden_div').toggle(value === 'ACH');
        $('#hidden_div2').toggle(value === 'Check Payment');
        $('#hidden_div3').toggle(value === 'Card');
    }

    $(document).ready(function() {

        const maintenanceFeeType = $('#maintenance_fee_type');
        const maintenanceFee = $('#maintenance_fee');
        const addBalanceCheckbox = $('#toggleBalance');
        const maintenanceFeeCheckbox = $('#toggleMaintenanceFee');

        function updateMaintenanceFeeOptions() {
            if (maintenanceFeeCheckbox.is(':checked')) {
                if (addBalanceCheckbox.is(':checked')) {

                    maintenanceFeeType.prop('disabled', false);
                    maintenanceFeeType.val('percentage');
                    updateMaintenanceFee();
                } else {

                    maintenanceFeeType.val('fixed');
                    maintenanceFeeType.prop('disabled', true);
                    updateMaintenanceFee();
                }
            } else {

                maintenanceFeeType.prop('disabled', true);
                maintenanceFeeType.val('');
            }
        }

        updateMaintenanceFeeOptions();


        function updateMaintenanceFee() {
            const maintenanceFeeType = $('#maintenance_fee_type');
            const maintenanceFee = $('#maintenance_fee');
            const selectedValue = maintenanceFeeType.val();

            if (selectedValue === 'percentage') {
                maintenanceFee.val(12); 
            } else if (selectedValue === 'fixed') {
                maintenanceFee.val(""); 
            }
        }
        updateMaintenanceFee();

        maintenanceFeeType.on('change', updateMaintenanceFee);

        maintenanceFeeCheckbox.on('change', updateMaintenanceFeeOptions);
        addBalanceCheckbox.on('change', updateMaintenanceFeeOptions);

        $('.toggle-field').on('change', function() {
            const target = $($(this).data('target'));
            if ($(this).is(':checked')) {
                target.removeClass('d-none');
            } else {
                target.addClass('d-none');
            }
        });

        const $addBalanceCheckbox = $('#toggleBalance');
        const $creditCardOption = $('#creditCardOption');

        function toggleCreditCardOption() {
            if ($addBalanceCheckbox.is(':checked')) {
                $creditCardOption.removeClass('d-none');
            } else {
                $creditCardOption.addClass('d-none');
            }
        }

        toggleCreditCardOption();

        $addBalanceCheckbox.on('change', toggleCreditCardOption);

        $(document).on('change', '#registration_fee', function() {
            const selectedValue = $(this).val();
            if (selectedValue == "1") {
                $('.registration-div').removeClass('d-none');
                $('.registration_fee_amount').prop('required', true);
            } else {
                $('.registration-div').addClass('d-none');
                $('.registration_fee_amount').prop('required', false);
            }
        });

        $(document).on('change', 'select[name="payment_type"]', function() {
            const paymentType = $(this).val();
            if (paymentType === 'ACH') {
                $('input[name="trans_no"]').prop('required', true).closest('.form-group').show();
                $('input[name="check_no"], input[name="card_no"]').prop('required', false).closest('.form-group').hide();
            } else if (paymentType === 'Check Payment') {
                $('input[name="check_no"]').prop('required', true).closest('.form-group').show();
                $('input[name="trans_no"], input[name="card_no"]').prop('required', false).closest('.form-group').hide();
            } else if (paymentType === 'Card') {
                $('input[name="card_no"]').prop('required', true).closest('.form-group').show();
                $('input[name="trans_no"], input[name="check_no"]').prop('required', false).closest('.form-group').hide();
            }
        });
    });

    $(document).ready(function() {
        $(document).on('submit', '#depositForm', function(e) {
            e.preventDefault();

            const isAnyCheckboxChecked = $('#toggleBalance').is(':checked') ||
                $('#toggleRegistrationFee').is(':checked') ||
                $('#toggleMaintenanceFee').is(':checked');

            if (!isAnyCheckboxChecked) {
                swal.fire('Error', 'You must select at least one action option.', 'error');
                return;
            }

            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            const $submitButton = $('.add-balance');
            $submitButton.text('Submitting...').prop('disabled', true);
            $.ajax({
                type: "POST"
                , url: "{{route('add_user_balance', $user->id )}}"
                , data: new FormData(this)
                , dataType: 'JSON'
                , processData: false
                , contentType: false
                , cache: false
                , success: function(data) {
                    if (data.success) {
                        swal.fire(data.header, data.message, "success").then(() => {
                            location.reload();
                        });
                    } else {
                        swal.fire(data.header, data.message, "error");

                    }
                }
                , error: function(xhr) {
                    erroralert(xhr);
                }
                , complete: () => {
                    $submitButton.text('Submit').prop('disabled', false);
                }
            })
        });
    });


    $(document).ready(function() {

        const toggleBalance1 = $('#toggleBalance');

        toggleBalance1.change(function() {
            if (!toggleBalance1.is(':checked')) {
                $('select[name="payment_type"]').val('').prop('required', false).parent().addClass('d-none');
                $('input[name="trans_no"]').val('').prop('required', false).parent().addClass('d-none');
                $('input[name="card_no"]').val('').prop('required', false).parent().addClass('d-none');
                $('input[name="check_no"]').val('').prop('required', false).parent().addClass('d-none');
                $('input[name="date_of_trans"]').val('').prop('required', false).parent().addClass('d-none');
            } else {
                $('select[name="payment_type"]').prop('required', true).parent().removeClass('d-none');
                $('input[name="trans_no"]').prop('required', true).parent().removeClass('d-none');
                $('input[name="card_no"]').prop('required', true).parent().removeClass('d-none');
                $('input[name="check_no"]').prop('required', true).parent().removeClass('d-none');
                $('input[name="date_of_trans"]').prop('required', true).parent().removeClass('d-none');
            }
        });
    });

</script>
@endsection

@extends("nav")
@section('title', 'Add Balance | Senior Life Care Trusts')
@section("wrapper")
 <style>
    .stick {
        position: sticky !important;
        top: 0; 
    }
 </style>
<div>
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/all_users')}}" class="text-muted fw-light pointer"><b>All Users</b></a> / <b>Add Balance</b> </div>
    </h5>
    <div class="row gap-y-2">
        <div class="col-lg-4" >
            <div class="card  " >
                <h5 class="card-header py-3">Select Actions</h5>
                <div class="card-body">
               
                 <div class="d-flex gap-3 flex-wrap flex-column  ">
                    <div class="form-check d-flex align-items-center ">
                        <input class="form-check-input toggle-field p-2 " type="checkbox" id="toggleBalance" data-target=".balance-section">
                        <label class="form-check-label ps-1 pt-1" for="toggleBalance" >Add Balance</label>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input toggle-field p-2" type="checkbox" id="toggleRegistrationFee" data-target=".registration-fee-section">
                        <label class="form-check-label ps-1 pt-1" for="toggleRegistrationFee">Charge Registration Fee</label>
                    </div>
                    <div class="form-check  d-flex align-items-center">
                        <input class="form-check-input toggle-field p-2" type="checkbox" id="toggleMaintenanceFee" data-target=".maintenance-fee-section">
                        <label class="form-check-label ps-1 pt-1" for="toggleMaintenanceFee">Include Maintenance Fee</label>
                    </div>
                    <div class="form-check  d-flex align-items-center">
                        
                        <input class="form-check-input toggle-field p-2" type="checkbox"  >
                        <label class="form-check-label ps-1 pt-1"  >Send amount to Credit Card</label>
                    </div>
                    
                </div> 
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <h5 class="card-header py-3"> Customer Deposit Form </h5>
                <div class="card-body">
                    @error('insufficient')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-fail alert-dismissible" role="alert">
                        {{Session::get('fail')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form id="formAuthentication" class=" " action="{{route('add_user_balance', $user['id'] )}}" method="POST">
                        @csrf
                        <div class="row flex-wrap"> 
                            <div class="col-lg-8 px-0">
                                <div class="col-lg-12 mb-3 balance-section d-none ">
                                    <label for="balance" class="form-label">Add Balance</label>
                                    <input type="number" class="form-control" placeholder="$" name="balance" step="any" />
                                    @error('balance')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-3 maintenance-fee-section d-none">
                                    <label for="maintenance_fee" class="form-label">Maintenance Fee (in percentage)</label>
                                    <input type="number" class="form-control" placeholder="%" value="12" name="maintenance_fee" step="any" />
                                    @error('maintenance_fee')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-3 registration-fee-section d-none">
                                    <label for="registration_fee" class="form-label">Registration Fee Amount ($)</label>
                                    <input class="form-control" value="300" name="registration_fee_amount" type="text">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label for="payment_type" class="form-label">Payment Type</label>
                                    <select class="form-control form-select" name="payment_type" required>
                                        <option value="">Select Type</option>
                                        <option value="ACH">ACH</option>
                                        <option value="Card">Card</option>
                                        <option value="Check Payment">Check Payment</option>
                                    </select>
                                    @error('payment_type')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label for="date_of_trans" class="form-label">Date of Transaction</label>
                                    <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="date_of_trans" required />
                                    @error('date_of_trans')
                                    <span class="text-danger"> {{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end  ">
                                <button class="btn btn-primary add-balance">Submit</button>
                            </div>
                        </div>
                    </form>

                    <script>
                        // JavaScript to toggle visibility of fields
                        document.querySelectorAll('.toggle-field').forEach(function(checkbox) {
                            checkbox.addEventListener('change', function() {
                                const target = document.querySelector(this.dataset.target);
                                if (this.checked) {
                                    target.classList.remove('d-none'); // Show the section
                                } else {
                                    target.classList.add('d-none'); // Hide the section
                                }
                            });
                        });

                    </script>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
    function toggleBalanceInputs(checkbox) {
        const balanceInput = document.querySelector('input[name="balance"]');
        const maintenanceFeeInput = document.querySelector('input[name="maintenance_fee"]');
        const registrationFeeAmountInput = document.querySelector('input[name="registration_fee_amount"]');

        $(document).on('change', '#registration_fee', function() {
            var selectedValue = $(this).val();
            if (selectedValue == "1") {
                $('.registration-div').removeClass('d-none');
                $('.registration_fee_amount').prop('required', true);
            } else {
                $('.registration-div').addClass('d-none');
                $('.registration_fee_amount').prop('required', false);
            }
        });


        function showDiv2(divId, element) {
            if (element.value == 'ACH') {
                $('.trans-no').attr('required', true);
                $('.check-no').attr('required', false);
                $('.card-no').attr('required', false);
                document.getElementById("hidden_div").style.display = element.value == 'ACH' ? 'block' : 'none';
                document.getElementById("hidden_div2").style.display = element.value == 'Check Payment' ? 'block' : 'none';
                document.getElementById("hidden_div3").style.display = element.value == 'Card' ? 'block' : 'none';
            }
            if (element.value == 'Check Payment') {
                $('.trans-no').attr('required', false);
                $('.check-no').attr('required', true);
                $('.card-no').attr('required', false);
                document.getElementById("hidden_div").style.display = element.value == 'ACH' ? 'block' : 'none';
                document.getElementById("hidden_div2").style.display = element.value == 'Check Payment' ? 'block' : 'none';
                document.getElementById("hidden_div3").style.display = element.value == 'Card' ? 'block' : 'none';
            }
            if (element.value == 'Card') {
                $('.trans-no').attr('required', false);
                $('.check-no').attr('required', false);
                $('.card-no').attr('required', true);
                document.getElementById("hidden_div").style.display = element.value == 'ACH' ? 'block' : 'none';
                document.getElementById("hidden_div2").style.display = element.value == 'Check Payment' ? 'block' : 'none';
                document.getElementById("hidden_div3").style.display = element.value == 'Card' ? 'block' : 'none';
            }
        }

</script>
@endsection

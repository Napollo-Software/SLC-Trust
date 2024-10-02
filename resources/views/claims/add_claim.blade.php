@extends('nav')
@section('title', 'Add Bill | SLC Trust')
@section('wrapper')
    <?php
    use App\Models\User;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    ?>
    <div class="">
        <h5 class=" d-flex justify-content-between pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Bill</b> </div>
        </h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <h5 class="card-header"><b>Add Bill</b></h5>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="">
                                {{-- action="{{ action('App\Http\Controllers\claimsController@store') }} " --}}
                                <form id="add_claim" method="post" enctype="multipart/form-data">
                                    @csrf

                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category <span class="text-danger">*</span></label>
                                <select id="defaultSelect" class="form-control" name="claim_category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        @if ($category->category_staus == 'Published')
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('claim_category')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">Bill Amount <span class="text-danger">*</span></label>
                                <input type="number" name="claim_amount" class="form-control" placeholder="$"
                                    step="any" value="{{ old('claim_amount') }}" maxlength="100000" />
                                <span class="text-danger">
                                    @error('claim_amount')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            @if ($role == 'User')
                            <div class="col-lg-3">
                                <input type="hidden" name="claim_user" value="{{ Session::get('loginId') }}">
                            @else
                            <div class="col-lg-3">
                            @endif

                            <label for="exampleFormControlInput1" class="form-label">Bill Attachment (jpg,png,pdf) <span class="text-danger">*</span></label>
                            <input class="form-control" name="claim_bill_attachment" type="file" id="formFileMultiple" accept=".png,.jpg,.pdf">
                            <span class="text-danger">
                                @error('claim_bill_attachment')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        @if ($role != 'Moderator')
                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">Submission Date <span class="text-danger">*</span></label>
                                <input type="text" name="submission_date" class="form-control mb-3"
                                    value="<?php echo date('m-d-Y'); ?>" placeholder="06/16/2022" readonly />
                            </div>
                        @else
                            <input type="hidden" name="payment_method" value="No">
                        @endif
                        <div class="col-lg-6 recurring-bill d-none">
                            <label for="exampleFormControlInput1" class="form-label">Due Date <span class="text-danger">*</span></label>
                            <input type="date" name="expense_date" class="form-control mb-3" min="2021-01-01"
                                max="2030-12-31" />
                            <span class="text-danger">
                                @error('expense_date')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        {{-- <div class="col-lg-6 submission-date">
                                <label for="exampleFormControlInput1" class="form-label">Payment Method</label>
                                <select id="defaultSelect" class="form-control" name="payment_method">
                                    <option value="">Select payment type</option>
                                    <option value="ACH" >ACH</option>
                                    <option value="Card" >Card</option>
                                    <option value="Cheque Payment" >Cheque Payment</option>

                                </select>
                                <span class="text-danger">@error('payment_method'){{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-6 ">
                                <label for="exampleFormControlInput1" class="form-label">Payment Number</label>
                                <input type="number" name="card_number" placeholder="Payment number" class="form-control"   >

                            </div> --}}
                        @if ($role != 'Admin')
                            <input type="hidden" value="Panding" name="claim_status">
                        @endif
                        @if ($role != 'User')
                            <div class="col-lg-6 pt-2">
                                <label for="exampleFormControlInput1" class="form-label">Bill Status </label>
                                <select id="defaultSelect" class="form-select" name="claim_status">
                                    <option name="Pending">Pending</option>
                                    <option name="Approved">Approved</option>
                                </select>
                                <span class="text-danger">
                                    @error('claim_status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-6 pt-2">
                                <label for="exampleFormControlInput1" class="form-label">Customer <span class="text-danger">*</span></label>
                                <select class="form-control select-2" name="claim_user">
                                    <option value="">Select Customer</option>
                                    @foreach ($users as $user)
                                        @if ($user->role == 'User' && $user->account_status == 'Approved')
                                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('claim_user')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        @endif
                        <div class="col-lg-6 pt-3 pb-2">
                            <label class="form-label">Payee Name </label>
                            <select name="payee_name" class="form-control select-2">
                                <option value="">Select Payee</option>
                                @foreach ($payees as $payee)
                                    <option value="{{ $payee->id }}">{{ $payee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6 pt-3 pb-2">
                            <label for="" class="form-label">Account Number</label>
                            <input type="text" name="account_number" class="form-control" maxlength="40">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <label for="exampleFormControlInput1" class="form-label">Bill Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="claim_description" rows="3" max="270"></textarea>
                            {{--  <span class="text-danger">@error('claim_description'){{$message}} @enderror</span>  --}}
                        </div>
                        <div class="col-lg-6 pt-3">
                            <label for="exampleFormControlInput1" class="form-label">Recurring Bill</label>
                            <input class="manual-check-ctrl" name="recurring_bill" type="checkbox"
                                value="{{ 1 }}" id="recurring_bill">
                        </div>
                        <div class="col-lg-6 pt-2 recurring">
                                <label for="exampleFormControlInput1" class="form-label">Billing Cycle*</label>
                                <select class="form-control select-2" name="recurring_day">
                                    <option value="">Select</option>
                                    @for ($i = 1; $i <= 28; $i++)
                                        <option value="{{ $i }}" >{{ $i }}{{ in_array($i % 100, [11, 12, 13]) ? 'th' : ($i % 10 == 1 ? 'st' : ($i % 10 == 2 ? 'nd' : ($i % 10 == 3 ? 'rd' : 'th'))) }} of every Month</option>
                                    @endfor
                                </select>
                                    <span class="text-danger">@error('recurring_day'){{$message}} @enderror</span>
                            </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <button class="btn btn-primary claim-submit"><i class="bx bx-save pb-1"></i>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
<script>
$(document).on('submit', '#add_claim', function(e) {
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback.is-invalid').remove();
    // $('.claim-submit').attr('disabled', true);
    $('.claim-submit').text('Submitting...');
    $.ajax({
        type: "POST",
        url: "/claims",
        data: new FormData(this),
        dataType: 'JSON',
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
            console.log(data.message);
            swal.fire(data.header, data.message, data.type);
            $('.claim-submit').text('Submit');
            if (data.type == 'success') {
                $('#add_claim').trigger('reset');
                $('.select-2').val(null).trigger('change');
            }
            $('.claim-submit').attr('disabled', false);
        },
        error: function(xhr) {
            erroralert(xhr);
            $('.claim-submit').attr('disabled', false);
            $('.claim-submit').text('Submit');
        }
    })
});
$(document).ready(function(){
    $('.recurring').toggleClass('d-none', !$('#recurring_bill').prop('checked'));
    $(document).on('click', '#recurring_bill', function() {
         $('.recurring').toggleClass('d-none', !$(this).is(':checked'));
    })
});

</script>
@endsection

@extends('nav')
@section('title', 'Adjustment | SLC Trust')
@section('wrapper')
    <style>
        /* .nav-item {
            margin-top: -15px;
        } */
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

    <div class="">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Adjustment</h5>
        <!-- Account page navigation-->
        <form method="post" id="save-adjustment">
            @csrf
            <div class="card">
                <div class='card-header pb-1'><h5>Add Adjustment</h5></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <label for="form-label">Adjustment Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="debit">Debit</option>
                                <option value="credit">Credit</option>
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Select User</label>
                            <select name="user" class="form-control select-2">
                                <option value="">Select Account</option>
                                @foreach ($users as $k => $item)
                                    @if ($item->account_status == 'Approved')
                                        <option value="{{ $item->id }}">{{ $item->name . ' ' . $item->last_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Amount</label>
                            <input type="number" class="form-control" name="amount" step="0.01" min="1">
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
                        <div class="col-md-12 p-2">
                            <label for="form-label">Reason</label>
                            <textarea name="details" class="form-control" rows="3" maxlength="300"></textarea>
                        </div>
                        <div class="col-md-5"><button class="btn btn-primary submit-btn"><i class="bx bx-save pb-1"></i>Save</button><a
                                href="{{ url('/main') }}" class="btn btn-secondary m-2 clear-form text-white"><i class="bx bx-trash pb-1"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).on('submit', '#save-adjustment', function(e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $('.submit-btn').attr('disabled', true);
            $.ajax({
                type: "POST",
                url: "{{ route('adjustment.store') }}",
                data: new FormData(this),
                dataType: "JSON",
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                    if (data.type == 0) {
                        swal.fire('Insufficient balance', data.message, 'warning');
                    }
                    if (data.type == 1) {
                        $('#save-adjustment').trigger('reset');
                        $('.select-2').val(null).trigger('change');
                        swal.fire('Success', data.message, 'success');
                    }
                    $('.submit-btn').attr('disabled', false);
                },
                error: function(xhr) {
                    $('.submit-btn').attr('disabled', false);
                    erroralert(xhr);
                }

            })
        })

        $(document).on('click', '.clear-form', function() {
            $('#save-adjustment').trigger('reset');
        })
    </script>
@endsection

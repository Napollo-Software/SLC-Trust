@extends('myprint')

@section('title', 'Print Bill Details | Senior Life Care Trusts')
@section('content')
   <?php
    use App\Models\User;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    ?>
    <style>
        @media print {
        #printPageButton {
          display: none;
        }
      }
      </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card">
                <h5 class="card-header"><b>Bill Details</b></h5>
                <div class="card-body">
                    <a id="printPageButton" class="btn btn-primary print-btn" style="color: #fff !important;" onclick="window.print()">Print Bills<i class='bx bx-printer'></i></a>
                    <!--<div class="dropdown download-btn">-->
                    <!--  <a href="{{ route('export') }}" style="margin-right: 15px;" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    Excel-->
                    <!--  </a>-->
                    <!--  <a href="{{ route('pdfdownload') }}" style="margin-right: 15px;" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    Pdf-->
                    <!--  </a>-->
                    <!--  <a href="{{ route('csv') }}" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                    <!--    Csv-->
                    <!--  </a>-->
                    <!--</div>-->
                  <div class="table-responsive text-nowrap">
               <div class="row mb-3">
                            <div class="">
                                <form action="{{ action('App\Http\Controllers\claimsController@update', $claim->id) }} "
                                      method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')


                                    <span class="text-danger">@error('claim_title'){{$message}} @enderror</span>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Category</label>
                                <select id="defaultSelect" class="form-select" name="claim_category" disabled>
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->category_name}}" @if ($claim->claim_category == $category->category_name) selected @endif>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('claim_category'){{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">Bill Amount</label>
                                <input
                                readonly
                                        type="number"
                                        name="claim_amount"
                                        class="form-control"
                                        placeholder="$"
                                        value="{{ $claim->claim_amount }}"
                                />
                                <span class="text-danger">@error('claim_amount'){{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">Bill Attachment(jpg,png,pdf)</label>
                                <input disabled class="form-control" name="claim_bill_attachment" type="file"
                                       id="formFileMultiple" value="{{ $claim->claim_bill_attachment }}">
                                <a href="{{ url('img/'.$claim->claim_bill_attachment) }}" target="_blank">{{ $claim->claim_bill_attachment }}</a>
                                <span class="text-danger">@error('claim_bill_attachment'){{$message}} @enderror</span>
                            </div>

                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">Payment Method</label>
                                <select id="defaultSelect" class="form-select" name="payment_method" disabled>
                                    <option value="ACH" @if ($claim->payment_method == 'ACH') selected @endif>ACH</option>
                                    <option value="Check to Mail" @if ($claim->payment_method == 'Check to Mail') selected @endif>Check to Mail</option>
                                    {{-- <option value=""></option> --}}
                                    {{-- <option value="Cash" @if ($claim->payment_method == 'Cash') selected @endif>Cash
                                    </option>
                                    <option value="Credit / Debit Card"
                                            @if ($claim->payment_method == 'Credit / Debit Card') selected @endif>Credit
                                        / Debit Card
                                    </option>
                                    <option value="Online" @if ($claim->payment_method == 'Online') selected @endif >
                                        Online
                                    </option> --}}
                                </select>
                                <span class="text-danger">@error('payment_method'){{$message}} @enderror</span>
                            </div>
                             <div class="row mb-3">
                               <div class="col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                <input
                                        type="date"
                                        name="expense_date"
                                        value="{{ $claim->expense_date }}"
                                        class="form-control" readonly
                                        @if ($role == "User") readonly @endif
                                />
                                <span class="text-danger">@error('expense_date'){{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Submission Date</label>
                                <input
                                        type="text"
                                        name="submission_date"
                                        class="form-control"
                                        value="{{date('m/d/Y', strtotime($claim->submission_date)) }}"
                                        placeholder="06/10/2022"
                                        readonly
                                />
                            </div>
                        </div>
                            <div class="col-lg-6 mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Bill Status</label>
                                <select id="fnivel" class="form-select mb-3" name="claim_status" disabled
                                        @if ($role == "User") disabled @endif onchange="showDiv('hidden_div', this)">
                                         <option value=""></option>
                                    <option value="Approved" @if ($claim->claim_status == 'Approved') selected @endif>
                                        Approved
                                    </option>
                                    <option value="Processed" @if ($claim->claim_status == 'Processed') selected @endif>
                                        Processed
                                    </option>
                                    <option value="Pending" @if ($claim->claim_status == 'Pending') selected @endif>
                                        Pending
                                    </option>
                                    <option value="Refused" @if ($claim->claim_status == 'Refused') selected @endif>
                                        Refused
                                    </option>
                                </select>
                                <span class="text-danger">@error('claim_status'){{$message}} @enderror</span>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Customer</label>
                                <select id="defaultSelect" class="form-select" name="claim_user" disabled>
                                    <option>Select User</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" {{ ($user->id==$claim->claim_user) ? 'selected' : ' ' }}>{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 mb-3" id="{{$claim->refusal_reason ? '': 'hidden_div'}}">
                                <label for="exampleFormControlInput1" class="form-label">Reason of Refusal</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="refusal_reason" readonly
                                          rows="3"
                                          @if ($role == "User") disabled @endif>{{ $claim->refusal_reason }}</textarea>
                            </div>
                            <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="exampleFormControlInput1" class="form-label">Bill Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="claim_description" readonly
                                          rows="3">{{ $claim->claim_description }}</textarea>
                                <span class="text-danger">@error('claim_description'){{$message}} @enderror</span>
                            </div>
                        </div>
                            <div class="col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Recurring Bill</label>
                                <input class="manual-check-ctrl" {{ $claim->recurring_bill==1 ? 'checked' : ' ' }}  value="{{ 1 }}" name="recurring_bill" type="checkbox" disabled
                                       id="">
                            </div>
                        </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>

@endsection

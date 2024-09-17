@extends("nav")
@section('title', 'Reports | Monthly')
@section("wrapper")
@php
use App\Models\User;
use App\Models\Claim;
 $all_users = User::where('role','!=','Admin')->where('role','!=','Moderator')->get();
 $role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
 $name = App\Models\User::where('id', '=', Session::get('loginId'))->value('name');
 $last_name = App\Models\User::where('id', '=', Session::get('loginId'))->value('last_name');
 $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
 $search = $searchrequest['search'] ?? "";
@endphp
<style>
.two-value {
  border: 2px solid;
  border-color: #559e99 #559e99;
}
{{--  button {
  all: unset;
  cursor: pointer;
}  --}}

button:focus {
  outline: orange 5px auto;
}

.custom-row {
  justify-content: space-between;
}

.custom-row > .mb-4 {
  width: 20% !important;
}
.custom-row2 {
}

.custom-row2 > .mb-4 {
  width:25% !important;
}

.dataTables_paginate  a:hover:not(.current) {background-color: #ddd;}
a, a > span {
  position: relative;
  color: inherit;
  text-decoration: none;
  line-height: 24px;
}
a:before, a:after, a > span:before, a > span:after {
  content: '';
  position: absolute;
  transition: transform .5s ease;
}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 8px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: n;
    white-space: nowrap;

    display: block;
    width: 100%;
    padding: 0.4375rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.select-2 {
    display: block;
    width: 100%;
    padding: 0.4375rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 0px solid #aaa;
    border-radius: 4px;
}
.form-control1{
    width: 24%;
}
.shadow-none{
    width: 100%;
}
/* .month-date{
    position: absolute;
    margin-top: 39px;
    margin-left: 223px;
}   */
</style>
<div class="modal fade no-print" id="filter-record" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="customerdpositLabel">ADD DETAILS <br> <small style="font-size: 12px">(You can filter with customer name and month)</small></h5>
          <button type="button" class="close btn-dark close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('monthly.filter')}}" method="post">
        @csrf
        <div class="modal-body">
         <div class="row">
            <div class="col-md-6 p-2">
              <label class="form-label">Customers</label>
              <select name="user" class="form-control " required>
                <option value="" >Select Customer</option>
                @foreach ($users as $user)
                   <option value="{{$user->id}}" {{ $user_id == $user->id ? 'selected' : '' }}>{{$user->name.' '.$user->last_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-6 p-2">
                 <label class="form-label">Month</label>
                 <input class="@error('from') is-invalid @enderror form-control start" type="month" name="from" value="{{$start_date}}" required>
                 <span class="text-danger month-date">@error('from'){{$message}} @enderror</span>
            </div>

         </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary preview">Filter</button></form>
          <a href="/monthly-statement" class="btn btn-primary text-white" >Clear Filter</a>
        </div>
    </form>
      </div>
    </div>
  </div>
          @if($role!="User")
         <div class="">
            <div class="d-flex justify-content-between">
                <div class="col-md-4">
                  <h4 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Reports / Monthly Report</b></span></h5>
                </div>
                {{--  <button type="button" class="btn btn-success m-2" data-toggle="modal" data-target="#filter-record">
                  Filter  <i class='menu-icon tf-icons bx bx-filter '></i>
                </button>  --}}
              </div>
                {{--  <div class="row">
                  <div class="col-md-3">
                    <h5 class="fw-bold pt-2"><span class="text-muted fw-light"><b>Reports / Monthly Report</b></span></h5>
                  </div>
                  <form action="{{ route('monthly.filter')}}" method="post">
                    @csrf
                  <div class="col-md-12 d-flex justify-content-center align-items-baseline">
                    <select name="user" class="form-control select-2 m-1" required >
                      <option value="null" >Select Customer</option>
                      @foreach ($users as $user)
                         <option value="{{$user->id}}" {{ $user_id == $user->id ? 'selected' : '' }}>{{$user->name.' '.$user->last_name}}</option>
                      @endforeach
                    </select>
                    <span class="text-danger">@error('user'){{$message}} @enderror</span>
                    <input class="@error('from') is-invalid @enderror form-control m-1" type="month" name="from" value="{{$start_date}}" required>
                    <span class="text-danger month-date">@error('from'){{$message}} @enderror</span>
                    <input class="form-control m-1 btn btn-success" name="submit" type="submit" value="Filter" >
                  </div>
                </form>
            </div>  --}}
            <div class="card mb-2">
              <form action="{{ route('monthly.filter')}}" method="post">
                @csrf
                <div class="modal-body p-2">
                 <div class="row">
                    <div class="col-md-6 p-3">
                      <h5 class="form-label">Customers</h5>
                      <select name="user" class="form-control select-2" required>
                        <option value="" >Select Customer</option>
                        @foreach ($users as $user)
                           <option value="{{$user->id}}" {{ $user_id == $user->id ? 'selected' : '' }}>{{$user->name.' '.$user->last_name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-6 p-3">
                         <h5 class="form-label">Month</h5>
                         <input class="@error('from') is-invalid @enderror form-control start" type="month" name="from" value="{{$start_date}}" required>
                         <span class="text-danger month-date">@error('from'){{$message}} @enderror</span>
                    </div>

                 </div>
                </div>
                <div class="modal-footer pr-3">
                  <button type="submit" class="btn btn-primary preview">Filter</button></form>
                  <a href="/monthly-statement" class="btn btn-secondary text-white" >Clear Filter</a>
                </div>
            </form>
            </div>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="d-flex align-items-center p-3">
                    <div>
                      <h5 class="mb-1">Monthly Mass Report</h5>
                      <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>This Month Transaction</p>
                    </div>
                    <div class="dropdown ms-auto">
                      <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><form action="{{ route('transection.monthly.export') }}" method="post">
                          @csrf
                          <input type="hidden" name="from" value="{{ $start_date}}" >
                          <input type="hidden" name="user" value="{{ $user_id}}">
                        <button type="submit" class="btn btn-primary import-file dropdown-item export-transaction p-2">
                          Export Excel <i class='bx bx-download pb-1'></i>
                        </button>
                          </form>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li>  <form action="{{ route('transection.monthly.pdf') }}" method="post" target="_blank">
                          @csrf
                          <input type="hidden" name="from" value="{{ $start_date}}">
                          <input type="hidden" name="user" value="{{ $user_id}}">
                            <button  class="btn btn-primary print-btn dropdown-item export-transaction p-2 pb-0" type="submit">Export PDF <i class='bx bx-printer pb-1'></i></button>
                          </form>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body overflow-auto pt-0">
                      <table class="table align-middle mb-0 table-hover dataTable" >
                        <thead class="table-light">
                          <tr style="white-space: nowrap">
                            <th style="width:200px">Customer Name</th>
                            <th style="width:150px">Transactions IDs</th>
                            <th style="width:300px">Date</th>
                            <th style="width:300px">Bills</th>
                            <th style="width:300px">Deposits</th>
                            <th style="width:120px">Transaction Adjustment</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($transactions as $transaction)
                              <tr>
                                @php
                                    $user = App\Models\User::find($transaction->user_id);
                                @endphp
                                <td> {{$user->name.' '.$user->last_name  }}</td>
                                <td>{{$transaction->reference_id}}</td>
                                <td>{{$transaction->created_at->format('M d-Y h:i')}}</td>
                                <td class="text-center">
                                  @if ($transaction->claim_id)
                                     {{$transaction->description}}
                                  @else
                                   --
                                  @endif
                                </td>
                                <td class="text-center">
                                  @if (in_array($transaction->type, [\App\Models\Transaction::Deposit,\App\Models\Transaction::MaintenanceFee,\App\Models\Transaction::RenewalFee,\App\Models\Transaction::EnrollmentFee]))
                                    {{$transaction->description}}
                                  @else
                                    --
                                  @endif
                                </td>
                                <td class="text-center">
                                  @if ($transaction->type == \App\Models\Transaction::Adjustment)
                                   {{$transaction->description}}
                                   @else
                                      --
                                  @endif
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).on('click','.export-transaction',function(e){
        var start ="{{ $start_date}}";
        var end = "{{ $start_date}}";
        if(start == "" || end == ""){
          e.preventDefault();
          swal.fire('warning!','Please filter transactions first in order to export.','warning');
        }
      })
$(document).ready(function() {
  $('.dataTable').DataTable( {
    aLengthMenu: [
        [25, 50, 100, -1],
        [25, 50, 100, "All"]
    ],
     "order": false // "0" means First column and "desc" is order type;
        } );
  } );
</script>

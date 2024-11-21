@extends("nav")
@section('title', 'All Bills Senior Life Care Trusts')
@section("wrapper")
<style>
  .paginate_button  {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.dataTables_paginate   a.current {
  background-color: #559e99;
  color: white;
  border: 1px solid #559e99;
}

.dataTables_paginate  a:hover:not(.current) {background-color: #ddd;}

</style>
<?php
use App\Models\User;
$role = User::where('id', '=', Session::get('loginId'))->value('role');
?>


          <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Bills</h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <h5 class="card-header"><b>@if ($role == 'Admin' || $role == 'Moderator') All @endif @if ($role == 'User') My @endif Bills</b></h5>
                 <!-- <form action="" method="get">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="filter">
                        <label>Search:</label>
                          <input type="search" name="search" class="input-control" placeholder="Search your claims here" value="{{ $search }}">
                      </div>
                    </div>
                    <div class="col-lg-1">
                      <div class="filter pull-left">
                        <button class="btn btn-primary">Search</button>
                      </form>
                    </div>
                    <div class="col-lg-5">
                      <form action="{{ action('App\Http\Controllers\claimsController@create') }}">
                        <button class="btn btn-primary btn-ctrl">Add Claim</button>
                      </form>
                    </div>
                  </div>
                -->
                  <div class="row">
                    <div class="col-lg-12">
                        @if($role != 'Moderator')
                      <form action="{{ action('App\Http\Controllers\claimsController@create') }}">
                        <button class="btn btn-primary btn-ctrl">Add Bill</button>
                      </form>
                      @endif
                      <a  class="btn btn-primary print-btn"href="{{ route('printpage') }}" target="blank">Print Bills<i class='bx bx-printer'></i></a>
                      <div class="dropdown download-btn">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Download Bills
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" target="blank" href="{{ route('printpage') }}">PDF Format</a>
                          <a class="dropdown-item" target="blank"  href="{{ route('printpage') }}">Excel/CSV Format</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body overflow-auto">
                  @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif
                    @include('alerts.messages')
                    <div class="table-responsive text-nowrap">
                    <table class="table table-bordered dataTable">
              <thead>
                <tr>
                  <th>BID#</th>
                  <th>Bill title</th>
                  <th>User</th>
                  <th>Submission Date</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Available Balance</th>
                  <th>Amount</th>
                  <th>Attachment</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($claims as $claim)
                <tr>
                  <td>{{ $claim['id'] }}</td>
                  <td><small><a href="claims/{{ $claim['id'] }}">Bill Request - {{ $claim['id'] }}</a></small></td>
                  <td>
                    @foreach($all_users as $user)
                      @if($claim->claim_user==$user->id)
                        {{$user->name }} {{$user->last_name }}
                      @endif
                    @endforeach
                  </td>
                  <td>{{ date('M/d/Y', strtotime($claim['submission_date'])) }}</td>
                  <td>{{ $claim['claim_category'] }}</td>
                  <td>
                    <span class="badge
                      @if ($claim->claim_status == 'Approved') bg-label-success
                      @elseif ($claim->claim_status == 'Processed') bg-label-primary
                      @elseif ($claim->claim_status == 'Pending') bg-label-info
                      @elseif ($claim->claim_status == 'Refused') bg-label-danger
                      @endif
                    me-1">
                    {{ $claim['claim_status'] }}
                    </span>
                  </td>
                  <td>
                    @foreach($all_users as $user)
                      @if($claim->claim_user == $user->id)
                        ${{ $user->user_balance }}
                      @endif
                    @endforeach
                  </td>
                  <td>${{ $claim['claim_amount'] }}</td>
                  <td>
                    <div class="card" style="width: 100px; ">
                      <div class="card-body" style="padding: 0.5rem 0.5rem;">
                        <a href="img/{{ $claim->claim_bill_attachment }}"><img src="img/{{ $claim->claim_bill_attachment }}" alt="" class="img-thumbnail"></a>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="dropdown">
                      <button
                        type="button"
                        class="btn p-0 dropdown-toggle hide-arrow"
                        data-bs-toggle="dropdown"
                      >
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                      </button>
                      <div class="dropdown-menu">
                        @if ($role == 'Admin' || $role == 'Moderator')
                          <a class="dropdown-item" href="claims/{{ $claim['id'] }}/edit">
                            <i class="bx bx-edit-alt me-1"></i> Edit
                          </a>
                        @endif
                        @if($role != 'Moderator')
                          <form action="{{ action('App\Http\Controllers\claimsController@destroy', $claim['id']) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="dropdown-item">
                              <i class="bx bx-trash me-1"></i> Delete
                            </button>
                          </form>
                        @endif
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

                        {{ $claims->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
$(document).ready(function($) {
  $('#dataTable').DataTable( {
    aLengthMenu: [
        [25, 50, 100, -1],
        [25, 50, 100, "All"]
    ],
     "order": false // "0" means First column and "desc" is order type;
        } );
  } );
</script>

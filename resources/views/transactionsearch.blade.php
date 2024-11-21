@extends("nav")
@section('title', 'Search Results | Senior Life Care Trusts')
@section("wrapper")
@php

 $search = $searchrequest['search'] ?? "";
@endphp
          <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Search</h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <!--<h5 class="card-header"><b>Search Results for "{{ $search }}"</b></h5>-->
                  <form action="" method="get">
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
                      </div>
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
                      <!-- <form action="{{ action('App\Http\Controllers\claimsController@create') }}">
                        <button class="btn btn-primary btn-ctrl">Add Claim</button>
                      </form>  -->
                    </div>
                  </div>
                  <div class="card-body">
                  @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif
                    @include('alerts.messages')
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                               <th>TID#</th>
                                <th>Transaction Details</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Amount</th>
                                <th>Admin/Managed By</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                       @foreach ($transaction as $data)
                          <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{$data->description}} </td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->bill_status }}</td>
                            <td>${{ $data->amount }}</td>
                            <td>
                              {{ $data->admin_user_name }}
                            </td>
                            <td>
                                 @if($data->bill_id)
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn p-0 dropdown-toggle hide-arrow"
                                  data-bs-toggle="dropdown"
                                >
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>

                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="{{route("claims.show", $data->bill_id ?? '#')}}"
                                    ><i class='bx bxs-show'></i> View</a>

                                </div>
                              </div>
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
        </div>

@endsection

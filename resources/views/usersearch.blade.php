@extends("nav")
@section('title', 'Search Results | Intrustpit')
@section("wrapper")
          <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Search</h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <h5 class="card-header"><b>Search Results for "{{ $search }}"</b></h5>
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
                                <th>UID#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Account Status</th>
                                <th>Balance</th>
                                <th>Avatar</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($user as $u)
                              <tr>
                                <td>{{ $u['id'] }}</td>
                                <td><a href="{{route('show_user', $u['id'] )}}">{{ $u['name'] }} {{ $u['last_name'] }}</a></td>
                                <td>{{ $u['email'] }}</td>
                                <td>{{ $u['role'] }}</td>
                                <th>
                                  <span class="badge
                                  @if ($u->account_status == 'Approved') bg-label-success @endif
                                  @if ($u->account_status == 'Not Approved') bg-label-danger @endif
                                  me-1">
                                  @if ($u->account_status == 'Approved') {{ $u['account_status'] }} @endif
                                   @if ($u->account_status == 'Not Approved') {{ $u['account_status'] }} @endif
                                   </span>
                                </th>
                                <td>${{ $u['user_balance'] }}</td>
                                <td>
                                  <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li
                                      data-bs-toggle="tooltip"
                                      data-popup="tooltip-custom"
                                      data-bs-placement="top"
                                      class="avatar avatar-xs pull-up"
                                      title="{{ $u['name'] }}"
                                    >
                                      <img src="{{ $u['avatar'] }}" alt="Avatar" class="rounded-circle" />
                                    </li>
                                  </ul>
                                </td>
                                <td>
                                  <div class="dropdown">
                                    <button
                                      type="button"
                                      class="btn p-0 dropdown-toggle hide-arrow"
                                      data-bs-toggle="dropdown"
                                    >
                                      <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{route('show_user', $u['id'] )}}"
                                        ><i class='bx bxs-show'></i> View</a
                                      >
                                      <a class="dropdown-item" href="{{route('show_user', $u['id'] )}}"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                      >
                                      <a class="dropdown-item" href="{{route('view_user', $u['id'] )}}"
                                        ><i class="bx bx-dollar-circle me-1"></i> Add Balance</a
                                      >
                                    </div>
                                  </div>
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

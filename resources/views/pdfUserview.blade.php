<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Latest Bills</title>
<meta charset="utf-8" />
<meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
/>

<title>@yield('title')</title>

<meta name="description" content="" />

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ url('/assets/img/favicon/favicon.png') }}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet"
/>

<!-- Icons. Uncomment required icon fonts -->
<link rel="stylesheet" href="{{ url('/assets/vendor/fonts/boxicons.css') }}" />

<!-- Core CSS -->
<link rel="stylesheet" href="{{ url('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{ url('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{ url('/assets/css/demo.css') }}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

<link rel="stylesheet" href="{{ url('/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>


</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card">
                <h5 class="card-header"><b>Latest Bills</b></h5>
                <div class="card-body">

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

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $u)
                        <tr>
                          <td>{{ $u['id'] }}</td>
                          <td>{{ $u['name'] }} {{ $u['last_name'] }}</td>
                          <td>{{ $u['email'] }}</td>
                          <td>{{ $u['role'] }}</td>
                          <td>{{ $u['account_status'] }}</td>
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

                        </tr>
                        @endforeach
                        {{-- @foreach ($data as $claim)
                        <tr>
                            <tr><td>{{ $claim->id }}</td>
                                <td>Bill Request - {{$claim->id}}</td>
                                <td>{{ App\Models\User::where('id',$claim->claim_user)->pluck('name')->first()}}</td>
                                <td>{{ $claim->submission_date }}</td>
                                <td>{{ $claim->claim_category }}</td>
                                <td>{{ $claim->claim_status }}</td>
                                <td>${{ $claim->claim_amount }}</td>
                        </tr>
                        @endforeach --}}
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>

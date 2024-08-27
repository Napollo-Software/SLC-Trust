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
                <h5 class="card-header"><b>Transactions</b></h5>
                <div class="card-body">

                   <div class="table-responsive text-nowrap">
                        
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>TID#</th>
                            <th>Date & Time</th>
                            <th>Transaction Details</th>
                            <th>Debit/Credit</th>
                            <th>User</th>
                            <th> Current Balance</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($data as $item)
                          <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{$item('m-d-Y h:i:s', strtotime($item->created_at)) }}</td>
                             @if($item->bill_id)
                            <td><a  href="{{route("claims.show", $item->bill_id ?? '#')}}"> {{$item->description}} ({{$data->name}}&nbsp;{{$data->user_id}})</a></td>
                            @else
                            <td>{{$data->description}}</td>
                             @endif
                             <td>
                                 <span class="badge
                              @if ($data->statusamount == 'credit') bg-label-success @endif
                              @if ($data->statusamount == 'debit') bg-label-danger @endif
                                
                              me-1">
                              @if ($data->statusamount == 'credit') +${{ $data->deduction }} @endif
                               @if ($data->statusamount == 'debit') -${{ $data->deduction }} @endif
                             
                               </span>
                                 
                                  </td>
                            <td>{{  $name }}&nbsp;{{$last_name}}</td>
                          
                           <td>${{ $data->cbalance }}</td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                        
                    </table>
                        <div class="">
                      
                         </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>

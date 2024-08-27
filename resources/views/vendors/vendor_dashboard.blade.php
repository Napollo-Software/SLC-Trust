@extends('nav')
@section('title', 'View Account | Intrustpit')
@section('wrapper')
<style>
    .product-list {
        height: 100% !important;
    }
</style>
    <div class="col-md-12">
        <div class="">
            <h5 class="fw-bold mb-2">Account Dashboard</h5>
        </div>
        <div class="">
            <div class="row"> 
                <div class="col">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Pool Balance</p>
                                    <h5 class="mb-0">{{ $referrals->pluck('customer')->sum('user_balance') }}</h5>
                                </div>
                                <div class="ms-auto">	<i class='bx bx-wallet font-30'></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="w-chart5"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Contacts</p>
                                    <h5 class="mb-0">{{$vendor->contacts->count()}}</h5>
                                </div>
                                <div class="ms-auto">	<i class='bx bx-user font-30'></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="w-chart6"></div>
                    </div>
                </div>			
                <div class="col">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Leads</p>
                                    <h5 class="mb-0">{{ $vendor->leads->count() +  $vendor->contacts->pluck('leads')->flatten()->count() }}</h5>
                                </div>
                                <div class="ms-auto"><i class="bx bx-user-pin font-30"></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="w-chart7"></div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Referrals</p>
                                    <h5 class="mb-0">{{$vendor->referrals->count() +   $vendor->contacts->pluck('referrals')->flatten()->count() }}</h5>
                                </div>
                                <div class="ms-auto">	<i class="bx bx-user-circle font-30"></i>
                                </div>
                            </div>
                        </div>
                        <div class="" id="w-chart8"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">Transaction History</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>in last 30 days revenue</p>
                                </div>
                                <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                </div>
                            </div>
                            <div class="table-responsive mt-2">
                                <div class="table-responsive mt-0">
                                    <table class="table align-middle mb-0 table-hover dataTable" id="">
                                        <thead  class="table-light">
                                            <tr>
                                                <th style="width:15%">Date & Time</th>
                                                <th style="width:20%">Account</th>
                                                <th style="width:50%">Transaction Details</th>
                                                <th style="width:15%"> Amount</th>
                                                <th style="width:15%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($referrals as $k => $item)
                                             @if ($item->customer != null)
                                                 @foreach ($item->customer->trasactions() as $data)
                                                 <tr>
                                                    <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                                    <td>
                                                        <?php
                                                        $user = App\Models\User::find($data->chart_of_account);
                                                        $customer = App\Models\User::find($data->user_id);
                                                        ?> {{ $item->customer->full_name() }}</td>
    
                                                    @if ($data->bill_id)
                                                        <td style="width:50%"><a href="{{ route('claims.show', $data->bill_id ?? '#') }}">
                                                                {{ $data->description }} </a></td>
                                                    @else
                                                        <td  style="width:50%"> <a href="{{ url('show_user/' . $data->user_id) }}" class="text-black"
                                                                title="This link will redirect you to customer's profile.">{{ $data->description }}
                                                            </a></td>
                                                    @endif
                                                    <td style="text-align:left !important;">
                                                        @if ($data->statusamount == 'credit')
                                                            +
                                                        @endif
                                                        @if ($data->statusamount == 'debit')
                                                            -
                                                        @endif
                                                        ${{ number_format((float) $data->deduction, 2, '.', ',') }}
                                                    </td>
                                                    <td>
                                                        @if ($data->status == 1)
                                                            <div class="badge rounded-pill bg-primary w-100">
                                                                Processed
                                                            </div>
                                                        @else
                                                            <div class="badge rounded-pill bg-warning w-100">
                                                                Failed
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                     @endforeach
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">Customers</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Latest 8 customers</p>
                                </div>
                                <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                </div>
                            </div>
                        </div>
                        <div class="product-list p-3 mb-3">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($referrals as $k => $item)
                            @if ($item->customer != null && $k < 8)
                            @php
                                $i++;
                            @endphp
                             <div class="row border mx-0 mb-3 py-2 radius-10 cursor-pointer">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="product-img">
                                            <img src="{{ file_exists(public_path('/user/' . $item->customer->avatar)) ? asset('/user/' . $item->customer->avatar) : url('/user/images93561655300919_avatar.png') }}" class="user-img" alt="user avatar">
                                        </div>
                                        <div class="ms-2">
                                            <p class="mb-0">Customer</p>
                                            <h6 class="mb-1">{{ $item->customer->full_name() }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="d-flex align-items-center">
                                    <div class="col-sm">
                                        <p class="mb-0">Balance</p>
                                        <h6 class="mb-1">$ {{ $item->customer->user_balance }}</h6>
                                    </div>
                                    <div class="col-sm">
                                        <p class="mb-0">Transactions</p>
                                        <h6 class="mb-1">$ {{ $item->customer->trasactions()->count() }}</h6>
                                    </div>
                                 </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
@section('script')
<script>
       $(document).ready(function() {
        $('.dataTable').DataTable({
            aLengthMenu: [
                [10, 50, 100, -1],
                [10, 50, 100, "All"]
            ],
            "order": false // "0" means First column and "desc" is order type; 
        });
    });
</script>
@endsection

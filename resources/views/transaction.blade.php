@extends('nav')
@section('title', 'Dashboard | Intrustpit')
@section('wrapper')
    @php
        use App\Models\User;
        use App\Models\Claim;
        $all_users = User::where('role', '!=', 'Admin')
            ->where('role', '!=', 'Moderator')
            ->get();
        $role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
        $name = App\Models\User::where('id', '=', Session::get('loginId'))->value('name');
        $last_name = App\Models\User::where('id', '=', Session::get('loginId'))->value('last_name');
        $sum_processed_amount = DB::table('claims')
            ->where('claim_status', 'processed')
            ->sum('claim_amount');
        $search = $searchrequest['search'] ?? '';
        $login_user = App\Models\User::find(Session::get('loginId'));
        $accounts = App\Models\User::where('role', 'Vendor')->count();
        $contacts = App\Models\contacts::count();
        $leads = App\Models\Lead::count();
        $referrals = App\Models\Referral::get();
        use App\Models\Referral;
        use Carbon\Carbon;
        $totalCases = [];
        $completedCases = [];
        $pendingCases = [];
        $months = [];
        // Get the current date
        $endDate = Carbon::now();

        // Loop through the last 6 months
        for ($i = 1; $i <= 6; $i++) {
            // Calculate the start date for the current iteration
            $startDate = $endDate->copy()->subMonth();
            $months[] = $startDate->format('F');
            // Fetch a single referral for the current month
            $referralForMonth = Referral::whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate)
                ->get();
            // dd($referralForMonth,$startDate,$endDate );
            // Count cases for each category
            $totalCases[] = $referralForMonth ? $referralForMonth->count() : 0;
            $completedCases[] = $referralForMonth ? $referralForMonth->where('status', 'Approved')->count() : 0;
            $pendingCases[] = $referralForMonth ? $referralForMonth->where('status', 'Pending')->count() : 0;

            // Move to the previous month for the next iteration
            $endDate = $startDate;
        }
        $totalCasesJson = json_encode($totalCases);
        $completedCasesJson = json_encode($completedCases);
        $pendingCasesJson = json_encode($pendingCases);
        $monthsJson = json_encode($months);
        // dd($months);
        // Continue with the rest of your code...
    @endphp

    <head>

    </head>
    <style>
        /* .apexcharts-toolbar{
                display: none;
            }
            .search-nav {
                padding-bottom: 1%;
            }

            .stats-margin {
                margin-left: 60%;
            }

            .two-value {
                border: 2px solid;
                border-color: #2ecfde #2ecfde;
            }

            button {
                all: unset;
                cursor: pointer;
            }

            button:focus {
                outline: orange 5px auto;
            }
            .dataTables_filter{
                display: none
            } */
        @media screen and (max-width: 425px) {
            .custome-top-padding {
                padding-top: 15px !important;
            }

            .custom-flex {
                flex-direction: column !important;
            }

            .fc-header-toolbar {
                font-size: 10px !important;
            }
        }
    </style>
    <div class="modal fade no-print" id="filter-record" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerdpositLabel">Add Details <br> <small style="font-size: 12px">(You
                            can filter with Start , End date)</small></h5>
                    <button type="button" class="close btn-secondary rounded-circle text-center" data-dismiss="modal"
                        style="width:25px;height:25px" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/main') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 p-3">
                                <label class="form-label">Start Date</label>
                                <input class="form-control p-2 text-center" type="date" name="from"
                                    value="{{ $from }}" required>
                            </div>
                            <div class="col-md-6 p-3">
                                <label class="form-label">End Date</label>
                                <input class="form-control text-center p-2" type="date" value="{{ $to }}"
                                    name="to" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name='submit' class="btn btn-secondary preview">Filter</button>
                </form>
                <a href="{{ url('/main') }}" class="btn btn-primary text-white">Clear Filter</a>
            </div>
            </form>
        </div>
    </div>
    </div>
    @if ($role != 'User')
        <div class="">
            <div class="col-md-12">
                <div style="display:flex">
                    <div>
                        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span></h5>
                    </div>
                    <div style="margin-left:auto" class="d-none">
                        <button type="button" class="btn btn-primary p-2 mb-3" data-toggle="modal"
                            data-target="#filter-record">
                            Filter Transactions<i class='menu-icon tf-icons bx bx-filter '></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="eventDetails"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                @if ($login_user->hasPermissionTo('Back Office'))
                    <div class="col">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Pool Fund</p>
                                        <h5 class="mb-0">
                                            ${{ number_format((float) User::where('role', 'User')->sum('user_balance'), 2, '.', ',') }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto"> <i class='bx bx-cart font-30'></i>
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
                                        <p class="mb-0">Bill Payments</p>
                                        <h5 class="mb-0">
                                            ${{ number_format((float) Claim::sum('claim_amount'), 2, '.', ',') }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-wallet font-30"></i>
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
                                        <p class="mb-0">Maintenance Fee</p>
                                        <h5 class="mb-0">
                                            ${{ number_format((float) $platform_income->where('statusamount', 'credit')->where('sum_of_credit', '1')->sum('deduction'),2,'.',',') }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-intersect font-30"></i>
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
                                        <p class="mb-0">Enrollment Fee</p>
                                        <h5 class="mb-0">
                                            ${{ number_format((float) $registration_free->sum('deduction'),2,'.',',') }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-minus-front font-30"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="w-chart8"></div>
                        </div>
                    </div>
                @endif
                @if ($login_user->hasPermissionTo('Front Office'))
                    <div class="col">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Accounts</p>
                                        <h5 class="mb-0">{{ $accounts }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-collection font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 46%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Contacts</p>
                                        <h5 class="mb-0">{{ $contacts }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-user-pin font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Leads</p>
                                        <h5 class="mb-0">{{ $leads }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-user-circle font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 68%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Referrals</p>
                                        <h5 class="mb-0">{{ $referrals->count() }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-user-check font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @php
                $balance = User::where('role', 'User')->sum('user_balance');
            @endphp
        </div>
        @if ($login_user->hasPermissionTo('Front Office'))
            <div class="row row-cols-1 row-cols-xl-2">
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-1">
                                        Referral Report</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>in last 30 days
                                    </p>
                                </div>
                                <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-sm-3 mt-4">
                                <div class="col">
                                    <div>
                                        <p class="mb-0 text-secondary">Total Cases</p>
                                        <h4 class="my-1">{{ $referrals->count() }}</h4>
                                        <p class="mb-0 font-13 text-success"><i
                                                class='bx bxs-up-arrow align-middle'></i>10 Since last month</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <p class="mb-0 text-secondary">Pending Cases</p>
                                        <h4 class="my-1">{{ $referrals->where('status', 'Pending')->count() }}</h4>
                                        <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>5
                                            Since last month</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <p class="mb-0 text-secondary">Completed Cases</p>
                                        <h4 class="my-1">{{ $referrals->where('status', 'Approved')->count() }}</h4>
                                        <p class="mb-0 font-13 text-danger"><i
                                                class='bx bxs-up-arrow align-middle'></i>1 Since last month</p>
                                    </div>
                                </div>
                            </div>
                            <div id="chart4"></div>
                        </div>
                    </div>
                </div>
                <div class="col d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div id="calendar22" class="col-md-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($login_user->hasPermissionTo('Back Office'))
            <div class="row">
                <div class="col-xl-12 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-1">
                                <div>
                                    <h5 class="mb-1">Transaction Details</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Latest 500
                                        entries</p>
                                </div>
                                <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                                </div>
                            </div>
                            <h4 style="text-align: center"><span class="bg bg-primary text-white p-2 rounded">Total
                                    Balance:${{ number_format((float) $balance -$platform_income->where('statusamount', 'credit')->where('sum_of_credit', '1')->where('status', 0)->sum('deduction') +$registration_free->sum('deduction'),2,'.',',') }}</span>
                                </h5>
                                <div style="display: flex;justify-content:center;" class="custom-flex pt-2">
                                    <h6 style="margin-right:5%">Pool Amount

                                        :${{ number_format((float) ($balance +$registration_free->sum('deduction') +$platform_income->where('statusamount', 'credit')->where('sum_of_credit', '1')->sum('deduction')) -($platform_income->where('statusamount', 'credit')->where('sum_of_credit', '1')->sum('deduction') +$registration_free->where('statusamount', 'credit')->where('sum_of_credit', '1')->sum('deduction')),2,'.',',') }}
                                    </h6>
                                    <h6 style="margin-right:10px">Revenue
                                        :${{ number_format((float) $platform_income->where('statusamount', 'credit')->where('sum_of_credit', '1')->sum('deduction') + $registration_free->sum('deduction'),2,'.',',') }}
                                    </h6>
                                </div>
                                <hr>
                                <div>
                                    <form action="{{ url('/main') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label class="form-label">Select Customer</label><br>
                                                <select name="customer" class="form-control select-2" required>
                                                    <option value="">Select</option>
                                                    <option value="all"
                                                        @if ($customer == 'all') selected @endif>All</option>
                                                    @foreach ($customers as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if ($item->id == $customer) selected @endif>
                                                            {{ $item->name }} {{ $item->last_name }}
                                                            ({{ $item->user_balance }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3 custome-top-padding">
                                                <label class="form-label">Start Date</label>
                                                <input class="form-control text-center" type="date" id="startDate"
                                                    name="from" value="{{ $from }}" onchange="validateDate()"
                                                    required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">End Date</label>
                                                <input class="form-control text-center " type="date" id="endDate"
                                                    value="{{ $to }}" name="to" onchange="validateDate()"
                                                    required>
                                            </div>
                                            <div class="col-md-3 pt-4">
                                                <button type="submit" name='submit' class="btn btn-primary preview"
                                                    style="margin-top:2px"><i
                                                        class="bx bx-search pb-1"></i>Search</button>
                                                <a href="{{ url('/main') }}" class="btn btn-secondary text-white"
                                                    style="margin-top:2px"><i class="bx bx-trash pb-1"></i>Clear</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <hr>
                                <div class="table-responsive mt-2">
                                    <table class="table align-middle mb-0 table-hover dataTable" id="">
                                        <thead class="table-light">
                                            <tr>
                                                {{-- <th style="width:10px">TID#</th> --}}
                                                <th style="width:10%">Date & Time</th>
                                                <th style="width:10%">Account</th>
                                                <th style="width:50%">Transaction Details</th>
                                                <th style="width:15%"> Amount</th>
                                                <th style="width:15%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                                // $transaction= [];
                                            @endphp
                                            @foreach ($transaction as $k => $data)
                                                <tr>
                                                    {{-- <td>{{ $i++ }}</td> --}}
                                                    <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                                    <td>
                                                        <?php
                                                        $user = App\Models\User::find($data->chart_of_account);
                                                        $customer = App\Models\User::find($data->user_id);
                                                        ?> Intrustpit</td>

                                                    @if ($data->bill_id)
                                                        <td style="width:50%"><a
                                                                href="{{ route('claims.show', $data->bill_id ?? '#') }}">
                                                                {{ $data->description }} </a></td>
                                                    @else
                                                        <td style="width:50%"> <a
                                                                href="{{ url('show_user/' . $data->user_id) }}"
                                                                class="text-black"
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
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- ROW-2 -->
        </div>
    @endif
    @if ($role == 'User')
        <div class="">
            <div class="col-md-12">
                <div style="display:flex">
                    <div>
                        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span></h5>
                    </div>
                    {{-- <div style="margin-left:1%"><form action="{{route('transaction.data')}}"><input class="form-control p-2" type="text" id="search" value="{{ $search }}" name="search" placeholder="Search transaction.." > </form></div> --}}
                    {{-- <div style="margin-left:auto">
                        <form action="/main" type="post">
                            @csrf<input class="form-control p-2" type="date" name="from"
                                value="{{ $from }}" required>
                    </div>
                    <div class="pt-2 p-2"> to </div>
                    <div style="margin-right:1%"><input class="form-control p-2" type="date"
                            value="{{ $to }}" name="to" required></div>
                    <div style="margin-right:1%"><input class="form-control p-2 btn btn-success" name="submit"
                            type="submit" value="Filter"></div>
                    </form>
                </div> --}}
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Current Balance</p>
                                        <h5 class="mb-0">${{ number_format((float) $adminamount, 2, '.', ',') }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class='bx bx-cart font-30'></i>
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
                                        <p class="mb-0">Pending Bills</p>
                                        <h5 class="mb-0">
                                            ${{ number_format((float) Claim::where('claim_user', Session::get('loginId'))->where('claim_status', 'pending')->sum('claim_amount'),2,'.',',') }}
                                        </h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-wallet font-30"></i>
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
                                        <p class="mb-0">Paid Bills</p>
                                        @php
                                            $bill_amount = Claim::where('claim_user', Session::get('loginId'))->get();
                                            $bill_badge = $bill_amount->where('claim_status', 'Approved')->count() + $bill_amount->where('claim_status', 'Partially approved')->count();
                                            $bill_amount = $bill_amount->where('claim_status', 'Approved')->sum('claim_amount') + $bill_amount->where('claim_status', 'Partially approved')->sum('partial_amount');
                                        @endphp
                                        <h5 class="mb-0">${{ number_format((float) $bill_amount, 2, '.', ',') }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-intersect font-30"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="w-chart7"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="card p-3">
                            <div class="d-flex align-items-center mb-1">
                                <div>
                                    <h5 class="mb-1">Transaction Details</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>All transactions
                                    </p>
                                </div>
                                <div class="font-22 ms-auto"> <a class="btn btn-primary print-btn"
                                        href="{{ route('transactionprintuserpage') }}" target="blank">Export<i
                                            class='bx bx-printer'></i></a>
                                </div>
                            </div>

                            <div class="card-body overflow-auto p-0">
                                <div class="table-responsive text-nowrap">
                                    <table class="table align-middle mb-0 table-hover dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width:10%">Date & Time</th>
                                                <th style="width:40%">Transaction Details</th>
                                                <th style="width:15%">Amount</th>
                                                <th style="width:15%">Balance</th>
                                                <th style="width:15%">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $credit = $transaction->where('statusamount', 'credit')->sum('deduction');
                                            $debit = $transaction->where('statusamount', 'debit')->sum('deduction');
                                            ?>
                                            @php
                                                $i = 1;
                                                $balance = 0;
                                            @endphp
                                            @foreach ($transaction as $k => $data)
                                                <tr>
                                                    {{-- <td>{{ $i++ }}</td> --}}
                                                    <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                                    @if ($data->bill_id)
                                                        <td><a href="{{ route('claims.show', $data->bill_id ?? '#') }}">
                                                                {{ $data->description }} </a></td>
                                                    @else
                                                        <td>{{ $data->description }} </td>
                                                        {{-- ({{$data->name}} {{$data->last_name}}&nbsp;{{$data->user_id}}) --}}
                                                    @endif
                                                    <td>
                                                        @if ($data->statusamount == 'credit')
                                                            + ${{ number_format((float) $data->deduction, 2, '.', ',') }}
                                                            @php
                                                                $balance = $balance + $data->deduction;
                                                            @endphp
                                                        @endif
                                                        @if ($data->statusamount == 'debit')
                                                            - ${{ number_format((float) $data->deduction, 2, '.', ',') }}
                                                            @php
                                                                $balance = $balance - $data->deduction;
                                                            @endphp
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center !important;">
                                                        ${{ number_format((float) $balance, 2, '.', ',') }}</td>
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

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
@section('script')
    <script>
        $(function() {
            "use strict";
            var e = {
                series: [{
                    name: "Revenue",
                    data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
                }],
                chart: {
                    type: "line",
                    height: 65,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    dropShadow: {
                        enabled: !0,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: .12,
                        color: "#17a00e"
                    },
                    sparkline: {
                        enabled: !0
                    }
                },
                markers: {
                    size: 0,
                    colors: ["#17a00e"],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: {
                        size: 7
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 3,
                    curve: "smooth"
                },
                colors: ["#17a00e"],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ]
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: !1
                    },
                    x: {
                        show: !1
                    },
                    y: {
                        title: {
                            formatter: function(e) {
                                return ""
                            }
                        }
                    },
                    marker: {
                        show: !1
                    }
                }
            };
            new ApexCharts(document.querySelector("#chart1"), e).render();
            e = {
                series: [{
                    name: "Pending Cases",
                    data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
                }],
                chart: {
                    type: "line",
                    height: 65,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    dropShadow: {
                        enabled: !0,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: .12,
                        color: "#ffc107"
                    },
                    sparkline: {
                        enabled: !0
                    }
                },
                markers: {
                    size: 0,
                    colors: ["#ffc107"],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: {
                        size: 7
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 3,
                    curve: "smooth"
                },
                colors: ["#ffc107"],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ]
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: !1
                    },
                    x: {
                        show: !1
                    },
                    y: {
                        title: {
                            formatter: function(e) {
                                return ""
                            }
                        }
                    },
                    marker: {
                        show: !1
                    }
                }
            };
            new ApexCharts(document.querySelector("#chart2"), e).render();
            e = {
                series: [{
                    name: "Store Visitores",
                    data: [240, 160, 671, 414, 555, 257, 901, 613, 727, 414, 555, 257]
                }],
                chart: {
                    type: "line",
                    height: 65,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    dropShadow: {
                        enabled: !0,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: .12,
                        color: "#f41127"
                    },
                    sparkline: {
                        enabled: !0
                    }
                },
                markers: {
                    size: 0,
                    colors: ["#f41127"],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: {
                        size: 7
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 3,
                    curve: "smooth"
                },
                colors: ["#f41127"],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ]
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: !1
                    },
                    x: {
                        show: !1
                    },
                    y: {
                        title: {
                            formatter: function(e) {
                                return ""
                            }
                        }
                    },
                    marker: {
                        show: !1
                    }
                }
            };
            new ApexCharts(document.querySelector("#chart3"), e).render();
            e = {
                series: [{
                    name: "Total Cases",
                    data: {{ $totalCasesJson }}
                }, {
                    name: "Completed Cases",
                    data: {{ $completedCasesJson }}
                }, {
                    name: "Pending Cases",
                    data: {{ $pendingCasesJson }}
                }],
                chart: {
                    foreColor: "#9ba7b2",
                    type: "bar",
                    height: 300,
                    toolbar: {
                        show: !1
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: !1,
                        columnWidth: "55%",
                        endingShape: "rounded"
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 2,
                    colors: ["transparent"]
                },
                colors: ["#0dcaf0", "#2ecfde", "#e5e7e8"],
                xaxis: {
                    categories: [<?php foreach ($months as $m) {
                        echo '"' . $m . '",';
                    } ?>]
                },
                grid: {
                    show: true,
                    borderColor: 'rgba(0, 0, 0, 0.15)',
                    strokeDashArray: 4,
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(e) {
                            return "" + e + ""
                        }
                    }
                }
            };
            new ApexCharts(document.querySelector("#chart4"), e).render();
            e = {
                series: [{
                    name: "Case",
                    data: [240, 160, 671, 414, 555, 257, 901, 613]
                }],
                chart: {
                    type: "area",
                    height: 45,
                    toolbar: {
                        show: !1
                    },
                    zoom: {
                        enabled: !1
                    },
                    dropShadow: {
                        enabled: !1,
                        top: 3,
                        left: 14,
                        blur: 4,
                        opacity: .12,
                        color: "#2ecfde"
                    },
                    sparkline: {
                        enabled: !0
                    }
                },
                markers: {
                    size: 0,
                    colors: ["#2ecfde"],
                    strokeColors: "#fff",
                    strokeWidth: 2,
                    hover: {
                        size: 7
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                stroke: {
                    show: !0,
                    width: 2,
                    curve: "smooth"
                },
                colors: ["#2ecfde"],
                xaxis: {
                    categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                        "Dec"
                    ]
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: !1
                    },
                    x: {
                        show: !1
                    },
                    y: {
                        title: {
                            formatter: function(e) {
                                return ""
                            }
                        }
                    },
                    marker: {
                        show: !1
                    }
                }
            };

            new ApexCharts(document.querySelector("#chart21"), e).render()

            $(document).ready(function() {
                $('#Transaction-History').DataTable({
                    lengthMenu: [
                        [6, 10, 20, -1],
                        [6, 10, 20, 'Todos']
                    ]
                });
            });




            new PerfectScrollbar('.product-list');
            new PerfectScrollbar('.customers-list');







        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar22');
            var followupEvents = @json($followup);

            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    right: 'dayGridMonth prev next'
                },
                initialView: 'dayGridMonth',
                navLinks: true, // can click day/week names to navigate views
                businessHours: true, // display business hours
                editable: true,
                selectable: true,
                selectMirror: true,
                droppable: true, // this allows things to be dropped onto the calendar
                // ... (other options)
                // themeSystem: 'bootstrap', // Use the Bootstrap theme
                themeColor: '#2ecfde', // Set the primary color to #2ecfde
                dayMaxEvents: true, // allow "more" link when too many events
                // events: events,
                events: followupEvents.map(function(event) {
                    return {
                        title: event.note + ' - ' + event.date,
                        start: event.date,
                    };
                }),
                dayRender: function(info) {
                    var cellDate = info.date;
                    var eventsForDate = followupEvents.filter(function(event) {
                        return event.date === cellDate.toISOString().substr(0, 10);
                    });

                    var eventDetails = eventsForDate.map(function(event) {
                        return '<h5>' + event.note + '</h5>';
                    }).join('');

                    info.el.innerHTML = eventDetails;
                    info.el.addEventListener('click', function() {
                        $('#eventModal').modal('show');
                    });
                }

            });
            calendar.render();
        });
    </script>

    <script>
        function validateDate() {
            var startDate = new Date(document.getElementById("startDate").value);
            var endDate = new Date(document.getElementById("endDate").value);

            if (startDate > endDate) {
                swal.fire("Warning!", "Start date must not be greater than end date", "warning");
                document.getElementById("startDate").value = "";
                document.getElementById("endDate").value = "";
            }
        }
    </script>


    <script>
        $(document).ready(function() {
            $('.dataTable').DataTable({
                aLengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "order": false // "0" means First column and "desc" is order type;
            });
        });
    </script>
@endsection

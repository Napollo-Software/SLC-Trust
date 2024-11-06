@extends('nav')
@section('title', 'Dashboard | SLC Trusts')
@section('wrapper')
@php
use Carbon\Carbon;
use App\Models\User;
use App\Models\Claim;
use App\Models\Referral;
use App\Models\Transaction;

$login_user = User::find(Session::get('loginId'));
$role = $login_user->role;

        if($role == 'Admin'){
            $followup = \App\Models\Followup::with(['employee' => function($query){
                $query->select('id', 'name', 'last_name');
            }])->where('type', 'followup')->get();
        } else {
            $followup = \App\Models\Followup::with(['employee' => function($query){
                $query->select('id', 'name', 'last_name');
            }])->where('type', 'followup')
            ->where('to', Session::get('loginId'))
            ->get();
        }

        @endphp

        <head>
            <style>
                .fc-daygrid-event-harness {
                    max-width: 240px !important;
                }

                .fc-event-title.fc-sticky {
                    text-overflow: ellipsis !important;
                    overflow: hidden !important;
                    white-space: nowrap !important;
                    width: 100% !important;
                }

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
        </head>
        <div class="modal fade no-print" id="filter-record" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customerdpositLabel">Add Details <br> <small style="font-size: 12px">(You
                                can filter with Start , End date)</small></h5>
                        <button type="button" class="close btn-secondary rounded-circle text-center" data-dismiss="modal" style="width:25px;height:25px" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('/main') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 p-3">
                                    <label class="form-label">Start Date</label>
                                    <input class="form-control p-2 text-center" type="date" name="from" value="{{ $from }}" required>
                                </div>
                                <div class="col-md-6 p-3">
                                    <label class="form-label">End Date</label>
                                    <input class="form-control text-center p-2" type="date" value="{{ $to }}" name="to" required>
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
            <h5 class=" d-flex justify-content-start pt-3 pb-2">
                <b></b>
                <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Overview</b> </div>
            </h5>
            <div class="col-md-12">
                <div style="display:flex">
                    <div style="margin-left:auto" class="d-none">
                        <button type="button" class="btn btn-primary p-2 mb-3" data-toggle="modal" data-target="#filter-record">
                            Filter Transactions<i class='menu-icon tf-icons bx bx-filter '></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal" id="eventModal" tabindex="-1" role="dialog" style="z-index:999999;" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel" style="font-weight: 600 !important;">Event Details</h5>
                            <button type="button" id="closeModalIcon" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body pt-4">
                            <div id="eventDetails" style="max-height: 240px !important;overflow: auto !important;"></div>
                        </div>
                        <div class="modal-footer border-top-0">
                            <button type="button" id="closeModalButton" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @if ($login_user->hasPermissionTo('Business Statistics'))
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                @if ($login_user->hasPermissionTo('Back Office'))
                <div class="col">
                    <div class="card radius-10 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0">Pool Fund</p>
                                    <h5 class="mb-0">
                                        ${{ number_format((float) $pool_fund, 2, '.', ',') }}
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
                                        ${{ number_format((float) $bill_payments, 2, '.', ',') }}</h5>
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
                                        ${{ number_format((float) $maintenance_fee,2,'.',',') }}
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
                                        ${{ number_format((float) $enrollment_fee,2,'.',',') }}
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
                    <a href="{{ url("vendors") }}">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Vendors</p>
                                        <h5 class="mb-0">{{ $total_accounts }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-collection font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 46%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('/contact/list') }}">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Contacts</p>
                                        <h5 class="mb-0">{{ $total_contacts }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-user-pin font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 72%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('referral') }}">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Referrals</p>
                                        <h5 class="mb-0">{{ $total_referrals }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-user-check font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 66%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('follow-up/list') }}">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Manage Follow Ups</p>
                                        <h5 class="mb-0">{{ $followup->count() }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class="bx bx-book font-30"></i>
                                    </div>
                                </div>
                                <div class="progress radius-10 mt-4" style="height:4.5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 68%"></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
            @endif
            @php
            $balance = User::where('role', 'User')->sum('user_balance');
            @endphp
        </div>

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
                        @if ($login_user->hasPermissionTo('Business Statistics'))
                        <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                            <h6 class="d-flex border  border-primary rounded p-2 m-0">Pool Amount: ${{ number_format((float) $pool_amount,2,'.',',') }}
                            </h6>
                            <h6 class="d-flex border  border-primary rounded p-2 m-0">Revenue: ${{ number_format((float) $total_revenue,2,'.',',') }}
                            </h6>
                            <h6 class="d-flex border  border-primary rounded p-2 m-0"> Total
                                Balance: ${{ number_format((float) $pool_amount+$total_revenue,2,'.',',') }}
                            </h6>
                        </div>
                        <hr>
                        @endif
                        <div>
                            <form action="{{ url('/main') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label">Select Customer</label><br>
                                        <div>
                                            <select name="customer" class="form-control select-2" required>
                                                <option value="">Select</option>
                                                <option value="all" @if ($customer=='all' ) selected @endif>All</option>
                                                @foreach ($customers as $item)
                                                <option value="{{ $item->id }}" @if ($item->id == $customer) selected @endif>
                                                    {{ $item->name }} {{ $item->last_name }}
                                                    ({{ $item->balance ?? 0 }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 custome-top-padding">
                                        <label class="form-label">Start Date</label>
                                        <input class="form-control text-center" type="date" id="startDate" name="from" value="{{ $from }}" onchange="validateDate()" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">End Date</label>
                                        <input class="form-control text-center " type="date" id="endDate" value="{{ $to }}" name="to" onblur="validateDate()" required>
                                    </div>
                                    <div class="col-md-3 pt-4">
                                        <button type="submit" name='submit' class="btn btn-primary preview" style="margin-top:2px"><i class="bx bx-search pb-1"></i>Search</button>
                                        <a href="{{ url('/main') }}" class="btn btn-secondary text-white" style="margin-top:2px"><i class="bx bx-trash pb-1"></i>Clear</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0 table-hover dataTable" id="">
                                <thead class="table-light">
                                    <tr>
                                        <th>TID#</>
                                        <th>Date & Time</th>
                                        <th>Account Name</th>
                                        <th>Transaction Details</th>
                                        <th>Type</th>
                                        <th class="text-center">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $k => $data)
                                    <tr>
                                        <td>{{ $data->reference_id }}</td>
                                        <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                        <td>
                                            @if ($data->user_id == \Company::Account_id && in_array($data->type, [Transaction::MaintenanceFee, Transaction::EnrollmentFee, Transaction::RenewalFee]))
                                            {{ \Company::Account_name_income }}
                                            @elseif ($data->user_id == \Company::Account_id)
                                            {{ \Company::Account_name }}
                                            @else
                                            {{ $data->user->full_name() }}
                                            @endif
                                        </td>

                                        @if ($data->bill_id)
                                        <td style="width:50%"><a href="{{ route('claims.show', $data->bill_id ?? '#') }}">
                                                {{ $data->description }} </a></td>
                                        @else
                                        <td style="width:50%"> <a href="{{ url('show_user/' . $data->user_id) }}" class="text-black" title="This link will redirect you to customer's profile.">{{ $data->description }}
                                            </a></td>
                                        @endif
                                        <td style="text-align:left !important;">
                                            <span class="badge {{ $data->credit > 0 ? 'badge-success' : 'badge-danger' }}">
                                                @if ($data->credit > 0 )
                                                Credit
                                                @elseif ($data->debit > 0 )
                                                Debit
                                                @endif
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if ($data->credit > 0 )
                                            ${{ number_format((float) $data->credit, 2, '.', ',') }}
                                            @elseif ($data->debit > 0 )
                                            ${{ number_format((float) $data->debit, 2, '.', ',') }}
                                            @else
                                            $0.00
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
        @if ($login_user->hasPermissionTo('Front Office'))
        <div class="row row-cols-1 row-cols-xl-2">
            <div class="col d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div id="calendar22" class="col-md-12"></div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        </div>
        @endif
        @if ($role == 'User')
        <div class="">
            <div class="col-md-12">
                <div style="display:flex">
                    <div>
                        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card radius-10 overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0">Current Balance</p>
                                        <h5 class="mb-0">${{ number_format((float) $user_balance, 2, '.', ',') }}</h5>
                                    </div>
                                    <div class="ms-auto"> <i class='bx bx-cart font-30'></i>
                                    </div>
                                </div>
                            </div>
                            <div class="" id="w-chart5"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                                <div class="font-22 ms-auto"> <a class="btn btn-primary print-btn" href="{{ route('transactionprintuserpage') }}" target="blank">Export<i class='bx bx-printer'></i></a>
                                </div>
                            </div>

                            <div class="card-body overflow-auto p-0">
                                <div class="table-responsive text-nowrap">
                                    <table class="table align-middle mb-0 table-hover dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Date & Time</th>
                                                <th>Transaction Details</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $credit = $transactions->sum('credit');
                                            $debit = $transactions->sum('debit');
                                            ?>
                                            @php
                                            $balance = 0;
                                            @endphp
                                            @foreach ($transactions as $k => $data)
                                            <tr>
                                                <td>{{ $data->reference_id }}</td>
                                                <td>{{ date('m/d/Y H:i A', strtotime($data->created_at)) }}</td>
                                                @if ($data->bill_id)
                                                <td>
                                                    <a href="{{ route('claims.show', $data->bill_id ?? '#') }}">
                                                        {{ $data->description }}
                                                    </a>
                                                </td>
                                                @else
                                                <td>{{ $data->description }}
                                                </td>
                                                @endif
                                                <td>
                                                    <span class="badge {{ $data->credit > 0 ? 'badge-success' : 'badge-danger' }}">
                                                        @if ($data->credit > 0)
                                                        Credit
                                                        @endif
                                                        @if ($data->debit > 0)
                                                        Debit
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($data->credit > 0)
                                                    ${{ number_format((float) $data->credit, 2, '.', ',') }}
                                                    @php
                                                    $balance = $balance + $data->credit;
                                                    @endphp
                                                    @endif
                                                    @if ($data->debit > 0)
                                                    ${{ number_format((float) $data->debit, 2, '.', ',') }}
                                                    @php
                                                    $balance = $balance - $data->debit;
                                                    @endphp
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

    $(document).ready(function(){
        $('.dataTable').DataTable({
                aLengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "order": false
            });
        });

        document.getElementById('closeModalButton').addEventListener('click', function() {
            $('#eventModal').modal('hide');
        });

        document.getElementById('closeModalIcon').addEventListener('click', function() {
            $('#eventModal').modal('hide');
        });

        function convertTo12Hour(time) {
            const [hours, minutes] = time.split(':').map(Number);
            const ampm = hours >= 12 ? 'PM' : 'AM';
            const hours12 = hours % 12 || 12;
            return `${hours12}:${String(minutes).padStart(2, '0')} ${ampm}`;
        }

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar22');
        var followupEvents = @json($followup);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                right: 'dayGridMonth prev next'
            },
            initialView: 'dayGridMonth',
            navLinks: true,
            businessHours: true,
            editable: true,
            selectable: true,
            selectMirror: true,
            droppable: true,
            themeColor: '#559e99',
            dayMaxEvents: true,
            events: followupEvents.map(function(event) {
                return {
                    id: event.id,
                    start: event.date,
                    extendedProps: {
                        note: event.note,
                        completed: event.completed,
                        date: event.date,
                        user: event.employee
                    }
                };
            }),
            eventContent: function(info) {
                const id = info.event.id;
                const note = info.event.extendedProps.note;
                const date = info.event.extendedProps.date;
                const completed = info.event.extendedProps.completed;

                const content = document.createElement('div');
                content.id = `calender_follow_up_${id}`;
                content.innerHTML = completed > 0
                    ? `<s>${note.length > 10 ? note.substring(0, 10) + '...' : note}</s>`
                    : `${note.length > 10 ? note.substring(0, 10) + '...' : note}`;

                return { domNodes: [content] };
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault();

                var clickedDate = new Date(info.event.start);
                const year = clickedDate.getFullYear();
                const month = String(clickedDate.getMonth() + 1).padStart(2, '0');
                const day = String(clickedDate.getDate()).padStart(2, '0');
                const formattedDate = `${year}-${month}-${day}`;

                var eventsForDate = followupEvents.filter(function(event) {
                    return event.date === formattedDate;
                });

                var content = '<h5 class="pb-2">' + clickedDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit'
                }) + '</h5>';

                var eventDetails = eventsForDate.map(function(event) {
                    const checked = event.completed ? 'checked' : '';
                    const strikeThrough = event.completed ? 'style="text-decoration: line-through;"' : '';
                    const userName = `${event.employee.name || ''} ${event.employee.last_name || ''}`.trim();

                    return `<li class="border-bottom d-flex justify-content-between py-2 pt-3 text-7 m-0" style="font-size: 13px !important; list-style:none;">
                                <div class="d-flex justify-content-start align-items-start gap-1">
                                    <input type="checkbox" class="mt-1 toggle-completed" data-id="${event.id}" ${checked}>
                                    <p ${strikeThrough}>${userName}: "${event.note}"</p>
                                </div>
                                <span class="float-end">${convertTo12Hour(event.time)}</span>
                            </li>`;
                }).join('');

                $('#eventDetails').html(content + eventDetails);
                $('#eventModal').modal('show');

                $('.toggle-completed').on('change', function() {
                    const followupId = $(this).data('id');
                    const isCompleted = $(this).is(':checked');

                    toggleCompleted(followupId, isCompleted, $(this).next('span'));
                });
            }
        });
        calendar.render();

        function toggleCompleted(followupId, isCompleted, noteElement) {
            $.ajax({
                url: '/follow-up/toggle-completed',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: followupId,
                    completed: isCompleted
                },
                success: function(response) {
                    if (response.success) {
                        // Update the UI inside the modal
                        if (isCompleted) {
                            noteElement.css('text-decoration', 'line-through');
                        } else {
                            noteElement.css('text-decoration', 'none');
                        }

                        // Find and update the event in FullCalendar
                        const event = calendar.getEventById(followupId);
                        if (event) {
                            // Update the completed status in followupEvents array
                            const updatedEvent = followupEvents.find(e => e.id === followupId);
                            if (updatedEvent) {
                                updatedEvent.completed = isCompleted;
                            }

                            // Update the content directly in the calendar using the assigned ID
                            const calendarElement = document.getElementById(`calender_follow_up_${followupId}`);
                            if (calendarElement) {
                                calendarElement.innerHTML = isCompleted
                                    ? `<s>${event.extendedProps.note} - ${event.extendedProps.date}</s>`
                                    : `${event.extendedProps.note} - ${event.extendedProps.date}`;
                            }

                            // Update the event properties in the calendar to reflect the change
                            event.setExtendedProp('completed', isCompleted);
                        }
                    } else {
                        alert('An error occurred while updating the follow-up status.');
                    }
                },
                error: function(xhr) {
                    alert('An error occurred while updating the follow-up status.');
                }
            });
        }

        });
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
@endsection

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
      data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <link rel="canonical" href="http://127.0.0.1:8000/"/>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>@yield('title')</title>
    <meta name="description" content=""/>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <link rel="icon" type="image/x-icon" href="{{ url('/assets/img/favicon/favicon.png') }}"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/fonts/boxicons.css') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/theme-default.css') }}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ url('/assets/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>

    <link rel="stylesheet" href="{{ url('/assets/vendor/libs/apex-charts/apex-charts.css') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <!-- SweetAlert2 -->

    <!-- Page CSS -->

    <!-- Helpers -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="{{ url('/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ url('/assets/js/config.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

</head>
<style>
    /* Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background-color: #ebebeb;
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgb(224, 223, 223);
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

    .dataTables_length {
        margin-bottom: 10px !important;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 0px solid #aaa;
        border-radius: 4px;
    }

    .select2-selection__arrow {
        margin-top: 5px;
    }

    .loader {
        display: flex;
        justify-content: center; /* Horizontal centering */
        align-items: center; /* Vertical centering */
        height: 100vh; /* Optional: Makes it full-height */
    }
    .loader-content {
        text-align: center; /* Optional: Center content horizontally */
    }

</style>

<body class="">
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <?php

        use App\Models\User;

        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        $billing_method = User::where('id', '=', Session::get('loginId'))->value('billing_method');
        $id = User::where('id', '=', Session::get('loginId'))->first();
        $notifcation = App\Models\Notifcation::where('user_id', $id->id)->get();
        $user = User::find(Session::get('loginId'));

        $image = User::where('id', '=', Session::get('loginId'))->value('avatar');
        $name = User::where('id', '=', Session::get('loginId'))->value('name');
        $search = $searchrequest['search'] ?? '';
        //
        ?>

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme no-print">
            <div class="app-brand demo" style="height:120px">
                <a href="{{ url('/dashboard') }}">
                    <img src="{{ url('/assets/img/slc_trust.png') }}" style="width:120px">
                </a>


                <a href="javascript:void(0);"
                   class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->

                @if ($user->hasPermissionTo('Dashboard View'))
                    <li class="menu-item {{ Route::currentRouteName()==='bill_reports' ? 'active' : '' }}">
                        <a href="{{ url('/dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                @endif

                @if ($user->hasPermissionTo('Archive View'))
                <li
                class="menu-item {{in_array(Route::currentRouteName(),['archive','archived.bills']) ? 'open active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-archive"></i>
                    <div data-i18n="Layouts">Archive
                    </div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{  Route::currentRouteName() ==='archive'? 'open active' : '' }}">
                        <a href="{{ route('archive') }}" class="menu-link">
                            <div data-i18n="Without menu">Transactions</div>
                        </a>
                    </li>
                    <li class="menu-item {{  Route::currentRouteName() ==='archived.bills'? 'open active' : '' }}">
                        <a href="{{ route('archived.bills') }}" class="menu-link">
                            <div data-i18n="Without menu">Bills</div>
                        </a>
                    </li>
                </ul>
            </li>
                @endif
                @if ($billing_method == 'manual')
                    <!-- Transactions -->

                    <li
                        class="menu-item {{in_array(Route::currentRouteName(),['claims.index','claims.create','recurring.bills','trace.recurring']) ? 'open active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Bills
                            </div>
                        </a>

                        <ul class="menu-sub">
                            @if ($user->hasPermissionTo('Bill Add'))
                                <li class="menu-item {{ Route::currentRouteName()==='claims.create' ? 'active' : '' }}">
                                    <a href="{{ url('/claims/create') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Add Bill</div>
                                    </a>
                                </li>
                            @endif
                            @if ($user->hasPermissionTo('Bill View'))
                                <li class="menu-item {{ Route::currentRouteName()==='claims.index' ? 'active' : '' }}">
                                    <a href="{{ url('/claims') }}" class="menu-link">
                                        <div data-i18n="Without menu">
                                            @if ($user->hasRole('admin') || $user->hasRole('moderator'))
                                                All
                                            @elseif($user->hasRole('user'))
                                                My
                                            @endif Bills
                                            @if (App\Models\Claim::where('claim_status', 'Pending')->count() >= 0 &&
                                                    $user->hasPermissionTo('Bill View') &&
                                                    $role == 'Admin')
                                                <span
                                                    class="badge bg-label-info me-1">{{ App\Models\Claim::count() }}</span>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                                <li
                                    class="menu-item {{ request()->is('developer/preview-file') ? 'active' : '' }}">
                                    <a href="{{ url('developer/preview-file') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Update Bill Status</div>
                                    </a>
                                </li>
                            @endif
                            @if ($user->hasPermissionTo('Recurring View'))
                                <li class="menu-item {{ Route::currentRouteName()==='recurring.bills'? 'active' : '' }}">
                                    <a href="{{ url('claim/recurring') }}" class="menu-link">
                                        <div data-i18n="Without navbar">View Recurring Bills</div>
                                    </a>
                                </li>
                                <li class="menu-item {{Route::currentRouteName()==='trace.recurring' ? 'active' : '' }}">
                                    <a href="{{ url('trace/recurring') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Trace Recurring Bills</div>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- Reports -->
                @if ($user->hasPermissionTo('Adjustments Create'))
                    <li class="menu-item {{ Route::currentRouteName() === 'adjustment'? 'active' : '' }}">
                        <a href="{{ route('adjustment') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-copy"></i>
                            <div data-i18n="Analytics">Adjustments</div>
                        </a>
                    </li>
                @endif
                @if ($user->hasPermissionTo('Vendor View'))
                    <li class="menu-item {{in_array(Route::currentRouteName(),['vendors.list','add.vendors','view.vendors','edit.vendors'])? 'active' : '' }}">
                        <a href="{{ url('/vendors') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div data-i18n="Layouts">Vendors</div>
                        </a>
                    </li>
                @endif


                <li class="menu-item {{Route::currentRouteName()==='contact.list' ? 'active' : '' }}">
                    <a href="{{ route('contact.list') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                        <div data-i18n="Layouts">Contacts</div>
                    </a>
                </li>
                <li class="menu-item {{in_array(Route::currentRouteName(),['lead.list','add.lead','edit.lead','view.lead'])? 'active' : ''  }}">
                    <a href="{{ route('lead.list') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-street-view"></i>
                        <div data-i18n="Layouts">Leads</div>
                    </a>
                </li>
                <li class="menu-item {{ in_array(Route::currentRouteName(),['referral.list','create.referral','edit.referral','view.referral','emergency.referral']) ? 'active' : '' }}">
                    <a href="{{ route('referral.list') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-shekel"></i>
                        <div data-i18n="Layouts">Referrals</div>
                    </a>
                </li>
                <li class="menu-item {{ in_array(Route::currentRouteName(),['reports.index','reports.add',])  ? 'active' : '' }}">
                    <a href="{{ route('reports.index') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bxs-report"></i>
                        <div data-i18n="Layouts">Reports</div>
                    </a>
                </li>
                 @if ($user->hasPermissionTo('User View') || $user->hasPermissionTo('User Add'))
                    <!-- Users -->
                    <li
                        class="menu-item {{in_array(Route::currentRouteName(),['add_user','users.all','preview.deposit']) ? 'open active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Layouts">Users
                                @if (App\Models\User::count() >= 0)
                                    <span class="badge bg-label-info me-1">
                                            {{ App\Models\User::whereDoesntHave('roles', function ($query) {$query->where('name', 'vendor');})->count() }}
                                        </span>
                                @endif
                            </div>
                        </a>
                        <ul class="menu-sub">
                            @if ($user->hasPermissionTo('User Add'))
                                <li class="menu-item {{ Route::currentRouteName()==='add_user' ? 'active' : '' }}">
                                    <a href="{{ url('/add_user') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Add Users</div>
                                    </a>
                                </li>
                            @endif
                            @if ($user->hasPermissionTo('User View'))
                                <li class="menu-item {{ Route::currentRouteName()==='users.all' ? 'active' : '' }}">
                                    <a href="{{ url('/all_users') }}" class="menu-link">
                                        <div data-i18n="Without menu">
                                            All Users
                                            @if (App\Models\User::count() >= 0)
                                                <span class="badge bg-label-info me-1">
                                                        {{ App\Models\User::whereDoesntHave('roles', function ($query) {$query->where('name', 'vendor');})->count() }}
                                                    </span>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endif
                            <li class="menu-item {{ Route::currentRouteName()==='preview.deposit' ? 'active' : '' }}">
                                <a href="{{ route('preview.deposit') }}" class="menu-link">
                                    <div data-i18n="Without navbar">Deposit</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li
                    class="menu-item {{in_array(Route::currentRouteName(),['profile.setting','medicaid.list','document.list','roles.list','category.index','types.list','payee.list','follow_up.list','dropbox','log.list']) ? 'open active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-cog"></i>
                        <div data-i18n="Layouts">Settings</div>
                    </a>
                    <ul class="menu-sub">
                        @if ($user->hasPermissionTo('Profile Setting'))
                            <li class="menu-item {{  Route::currentRouteName() ==='profile.setting' ? 'active' : '' }}">
                                <a href="{{ url('/profile_setting') }}" class="menu-link">
                                    <div data-i18n="Without menu">Profile Settings</div>
                                </a>
                            </li>
                        @endif
                        <li class="menu-item {{  Route::currentRouteName() ==='medicaid.list' ? 'active' : '' }}">
                            <a href="{{ route('medicaid.list') }}" class="menu-link">
                                <div data-i18n="Without menu">Medicaid / Physician</div>
                            </a>
                        </li>

                        <li class="menu-item {{ Route::currentRouteName() ==='document.list' ? 'active' : '' }}">
                            <a href="{{ route('document.list') }}" class="menu-link">
                                <div data-i18n="Without menu"> E-Sign & Document</div>
                            </a>
                        </li>
                        @if ($user->hasPermissionTo('Role View'))
                            <li class="menu-item {{Route::currentRouteName() ==='roles.list' ? 'active' : '' }}">
                                <a href="{{ url('/roles') }}" class="menu-link">
                                    <div data-i18n="Without menu">Roles & Permissions</div>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasPermissionTo('Manage Categories'))
                            <li class="menu-item {{  Route::currentRouteName() ==='category.index'? 'active' : '' }}">
                                <a href="{{ url('category') }}" class="menu-link">
                                    <div data-i18n="Without menu">Manage Categories</div>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasPermissionTo('Type View'))
                            <li class="menu-item {{  Route::currentRouteName() ==='types.list'? 'active' : '' }}">
                                <a href="{{ url('/types') }}" class="menu-link">
                                    <div data-i18n="Without menu">Manage Types</div>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasPermissionTo('Payee View'))
                            <li class="menu-item {{ Route::currentRouteName() ==='payee.list' ? 'active' : '' }}">
                                <a href="{{ route('payee.list') }}" class="menu-link">
                                    <div data-i18n="Without menu">Payee List</div>
                                </a>
                            </li>
                        @endif
                        <li class="menu-item {{ Route::currentRouteName() ==='follow_up.list' ? 'active' : '' }}">
                            <a href="{{ route('follow_up.list') }}" class="menu-link">
                                <div data-i18n="Without menu">Follow up</div>
                            </a>
                        </li>
                        @if ($user->hasPermissionTo('Dropbox'))
                            <li class="menu-item {{ Route::currentRouteName() ==='dropbox' ? 'active' : '' }}">
                                <a href="{{ route('dropbox') }}" class="menu-link">
                                    <div data-i18n="Without menu">Dropbox</div>
                                </a>
                            </li>
                        @endif
                        @if ($user->hasRole('admin'))
                            <li class="menu-item {{ Route::currentRouteName() ==='log.list' ? 'active' : '' }}">
                                <a href="{{ url('log-list') }}" class="menu-link">
                                    <div data-i18n="Without menu">Logs</div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                @if ($user->hasPermissionTo('Notification View'))
                    <li class="menu-item  {{ request()->is('notifications') ? 'active' : '' }}">
                        <a href="{{ url('/notifications') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-notification"></i>
                            <div data-i18n="Layouts">Notifications
                                @if (App\Models\Notifcation::where('status', 0)->where('user_id', $id->id)->count() > 0)
                                    <span
                                        class="badge bg-label-info me-1">{{ App\Models\Notifcation::where('status', '0')->where('user_id', $id->id)->count() }}</span>
                                @endif

                            </div>
                        </a>
                    </li>
                @endif
                <!-- Recycle Bin -->
                @if ($user->hasRole('admin'))
                    <li class="menu-item  {{  Route::currentRouteName() ==='check' ? 'open active' : '' }}">
                        <a href="/check" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div data-i18n="Without menu">Create checks</div>
                        </a>
                    </li>
                @endif
                @if ($user->hasRole('admin'))

                    <li class="menu-item {{ in_array(Route::currentRouteName(), ['transaction.report', 'monthly.statement', 'bank.reconciliation', 'check']) ? 'open active' : '' }}">

                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chart"></i>
                            <div data-i18n="Layouts">Finance</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ Route::currentRouteName() === 'bank.reconciliation' ? 'open active' : '' }}">
                                <a href="/bank-reconciliation" class="menu-link">
                                    <div data-i18n="Without menu">Bank reconciliation</div>
                                </a>
                            </li>

                            <li class="menu-item {{ Route::currentRouteName() === 'monthly.statement' ? 'open active' : '' }}">
                                <a href="/monthly-statement" class="menu-link">
                                    <div data-i18n="Without menu">Monthly statement</div>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteName() === 'transaction.report' ? 'open active' : '' }}">
                                <a href="/transaction-report" class="menu-link">
                                    <div data-i18n="Without menu">Transactions</div>
                                </a>
                            </li>
                            <li class="menu-item {{  Route::currentRouteName() === 'check' ? 'open active' : '' }}">
                                <a href="/check" class="menu-link">
                                    <div data-i18n="Without menu">Create checks</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ($user->hasPermissionTo('Recycle Bin View'))
                    <li class="menu-item {{  Route::currentRouteName() ==='recycle.bills' ? 'open active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-trash"></i>
                            <div data-i18n="Layouts">Recycle Bin</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{  Route::currentRouteName() ==='recycle.bills'? 'open active' : '' }}">
                                <a href="/recycle-bin/bills" class="menu-link">
                                    <div data-i18n="Without menu">Bills</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if ($user->hasRole('user'))
                    <li class="menu-item {{ request()->is('/monthly-mass-statement') ? 'open active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chart"></i>
                            <div data-i18n="Layouts">create-new-report.blade.php s</div>
                        </a>
                        <ul class="menu-sub">
                            <li
                                class="menu-item {{ request()->is('/monthly-mass-statement') ? 'open active' : '' }}">
                                <a href="/monthly-mass-statement/{{ $id->id }}" class="menu-link"
                                   target="_blank">
                                    <div data-i18n="Without menu">Monthly Statement</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!-- Logout -->
                <li class="menu-item">
                    <a href="{{ url('/logout') }}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-log-in-circle"></i>
                        <div data-i18n="Analytics">Logout</div>
                    </a>
                </li>
            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme no-print"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center " id="navbar-collapse">
                    <!-- Search -->
                    @if ($user->hasRole('admin') || $user->hasRole('moderator'))
                        <form action="{{ route('claim.search.user') }}">
                            <div
                                class="navbar-nav custom-nav-margin align-items-center search-nav pt-3 search-bar ">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <input type="search" name="search"
                                           class="form-control border-0 shadow-none" placeholder="Search bills here"
                                           aria-label="Search..." value="{{ $search }}"/>
                                </div>
                            </div>
                        </form>
                    @endif
                    @if ($user->hasRole('user'))
                        <form action="{{ route('claim.search.user') }}">
                            <div class="navbar-nav align-items-center search-nav pt-3 ">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="bx bx-search fs-4 lh-0"></i>
                                    <input type="search" name="search"
                                           class="form-control border-0 shadow-none"
                                           placeholder="Search your bills here" aria-label="Search..."
                                           value="{{ $search }}"/>
                                </div>
                            </div>
                        </form>
                    @endif
                    <!-- /Search -->

                    <ul class="navbar-nav flex-row align-items-center ms-auto ">
                        {{-- <img src="{{url('assets/img/bell-trans.gif')}}" class="cursor-pointer" width="40px" data-bs-toggle="dropdown" style="margin-top:10px" onclick="window.location.href='/notifications'"><span  class="badge bg-label-info me-1 rounded" style="margin-left:-20px;margin-top:-20px;font-size:10px">{{App\Models\Notifcation::where('status','0')->where('user_id',$id->id)->count()}} </span> --}}
                        <!-- User -->

                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                               data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ $image }}" alt class="w-px-40 h-auto rounded-circle"/>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ $image }}" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{ $name }}</span>
                                                <small class="text-muted">{{ $role }}</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/profile_setting') }}">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('notifications') }}">
                                        <i class="bx bx-bell me-2 position-relative">
                                            @foreach ($notifcation as $notify)
                                                @if ($notify->status == 0)
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                        </span>
                                                @endif
                                            @endforeach
                                        </i>
                                        <span class="align-middle">Notifications</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                    </ul>

                </div>
            </nav>

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">

                @yield('wrapper')
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme no-print">
                    <div
                        class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            <a href="#" target="_blank" class="footer-link fw-bolder">{{ config('app.professional_name') }}</a> ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            | All Rights Reserved
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<script>
    $(document).ready(function () {
        if (window.location.href.indexOf("claim") > -1 || window.location.href.indexOf(
            "developer/preview-file") > -1 || window.location.href.indexOf('user-search-bill?search=') > -1 || window.location.href.indexOf('trace/recurring') > -1) {
            $('.search-bar').removeClass('');
        } else {
            $('.search-bar').addClass('');
        }

    });
</script>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script type="text/javascript">
    function showDiv(divId, element) {
        document.getElementById(divId).style.display = element.value == 'Refused' ? 'block' : 'none';
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        var phoneInputs = document.getElementsByClassName('phone');

        for (var i = 0; i < phoneInputs.length; i++) {
            phoneInputs[i].addEventListener('input', function (e) {
                var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
            });
        }
        $('.select-2').select2();
    });

</script>
<script>
    let canada = [
        'Alberta',
        'British Columbia',
        'Manitoba',
        'New Brunswick',
        'Newfoundland and Labrador',
        'Northwest Territories',
        'Nova Scotia',
        'Nunavut',
        'Ontario',
        'Prince Edward Island',
        'Quebec',
        'Saskatchewan',
        'Yukon',
    ];
    let americanStates = [
        'Alabama',
        'Alaska',
        'Arizona',
        'Arkansas',
        'California',
        'Colorado',
        'Connecticut',
        'Delaware',
        'Florida',
        'Georgia',
        'Hawaii',
        'Idaho',
        'Illinois',
        'Indiana',
        'Iowa',
        'Kansas',
        'Kentucky',
        'Louisiana',
        'Maine',
        'Maryland',
        'Massachusetts',
        'Michigan',
        'Minnesota',
        'Mississippi',
        'Missouri',
        'Montana',
        'Nebraska',
        'Nevada',
        'New Hampshire',
        'New Jersey',
        'New Mexico',
        'New York',
        'North Carolina',
        'North Dakota',
        'Ohio',
        'Oklahoma',
        'Oregon',
        'Pennsylvania',
        'Rhode Island',
        'South Carolina',
        'South Dakota',
        'Tennessee',
        'Texas',
        'Utah',
        'Vermont',
        'Virginia',
        'Washington',
        'West Virginia',
        'Wisconsin',
        'Wyoming',
    ];

    function getCountry(event) {
        let country;
        if (event.value == 'canada') {
            country = '';
            canada.forEach(element => {
                country += '<option value="' + element + '">' + element + '</option>';
            });
            $('#SelectState').html(country);
        } else {
            country = '';
            americanStates.forEach(element => {
                country += '<option value="' + element + '">' + element + '</option>';
            });
            $('#SelectState').html(country);
        }
    }


    $(document).ready(function () {
        $('.SectionBody').removeClass('');
        $('#loader').addClass('');
    });

    // Add an event listener to the window that triggers the function
    // window.addEventListener('load', removeDisplayNone);
    window.addEventListener("load", function () {
        var loader = document.getElementById("loader");
        if (loader) {
            loader.style.display = "block";

            // Hide the loader after a certain duration (e.g., 1 second)
            setTimeout(function () {
                loader.style.display = "none";
            }, 1000); // 1000 milliseconds = 1 second
        }
    });
    //print function
    function printDivContent() {
        var divElementContents = document.getElementById("printContent").innerHTML;
        var windows = window.open('', '', 'height=600, width=1000');
        windows.document.write('<html>');
        windows.document.write('<body > <h1>Div\'s Content Are Printed Below<br>');
        windows.document.write(divElementContents);
        windows.document.write('</body></html>');
        windows.document.close();
        windows.print();
    }

    //select function
    $(document).ready(function () {
        $("select").change(function () {
            $(this).find("option:selected").each(function () {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".box").hide();
                }
            });
        }).change();

    });

    function erroralert(xhr) {

        if (xhr.status == 419) {
            window.location.href = '/';

        }
        if (typeof xhr.responseJSON.errors === 'object') {
            var error = '';
            $.each(xhr.responseJSON.errors, function (key, item) {
                error += item + '\n';
                if ($(document).find('[name="' + key + '"]').length > 0) {
                    var element = $(document).find('[name="' + key + '"]');
                    if (element.hasClass('form-control')) {
                        element.addClass('is-invalid').after('<span class="invalid-feedback is-invalid">' +
                            item + '</span>');
                    } else {
                    }
                } else {
                }
            });
        } else {
        }
    }

</script>


<script src="{{ url('/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ url('/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ url('/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ url('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ url('/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ url('/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ url('/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ url('/assets/js/dashboards-analytics.js') }}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
@include('sweetalert::alert')

<!-- FULL CALENDAR JS -->
<script src='{{ asset('assets/plugins/fullcalendar/moment.min.js') }}'></script>
<script src='{{ asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}'></script>
<script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/new_theme/images/favicon-32x32.png" type="image/png')}}" />
	<!--plugins-->
	@yield("style")
    <link href="{{ asset('assets/new_theme/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{ asset('assets/new_theme/plugins/simplebar/css/simplebar.css" rel="stylesheet')}}" />
	<link href="{{ asset('assets/new_theme/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/new_theme/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/new_theme/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/new_theme/css/bootstrap-extended.css" rel="stylesheet')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- loader-->
	<link href="{{ asset('assets/new_theme/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('assets/new_theme/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/new_theme/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/new_theme/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/new_theme/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/new_theme/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/new_theme/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/new_theme/css/header-colors.css')}}" />
    <title>{{ config('app.professional_name') }} - Dashboard</title>
    <style>
        .fw-bold{
            display: none !important;
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
    .select2-selection__arrow {
        margin-top: 5px;
    }

    </style>
</head>
<body>
    @php
        $user = App\Models\User::find(Session::get('loginId'));
    @endphp
	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
		@include("layouts.header")
		<!--end header -->
		<!--navigation-->
		@include("layouts.nav")
		<!--end navigation-->
		<!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
		       @yield("wrapper")
            </div>
        </div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Senior Life Care © {{ date('Y') }}</p>
		</footer>
	</div>
	<!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr/>
            <h6 class="mb-0">Theme Styles</h6>
            <hr/>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr/>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
            </div>
            <hr/>
            <h6 class="mb-0">Header Colors</h6>
            <hr/>
            <div class="header-colors-indigators">
                <div class="row row-cols-auto g-3">
                    <div class="col">
                        <div class="indigator headercolor1" id="headercolor1"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor2" id="headercolor2"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor3" id="headercolor3"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor4" id="headercolor4"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor5" id="headercolor5"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor6" id="headercolor6"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor7" id="headercolor7"></div>
                    </div>
                    <div class="col">
                        <div class="indigator headercolor8" id="headercolor8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/new_theme/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/new_theme/js/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets/new_theme/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
	<script src="{{ asset('assets/new_theme/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{ asset('assets/new_theme/js/app.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            var phoneInputs = document.getElementsByClassName('phone');
            for (var i = 0; i < phoneInputs.length; i++) {
                phoneInputs[i].addEventListener('input', function (e) {
                    var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                    e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
                });
            }
            $('.select-2').select2();
        });
        let canada = [
            'Alberta',
            'British Columbia',
            'Manitoba',
            'New Brunswick',
            'Newfoundland and Labrador',
            'Northwest Territories',
            'Nova Scotia',
            'Nunavut',
            'Ontario',
            'Prince Edward Island',
            'Quebec',
            'Saskatchewan',
            'Yukon',
        ];
        let americanStates = [
            'Alabama',
            'Alaska',
            'Arizona',
            'Arkansas',
            'California',
            'Colorado',
            'Connecticut',
            'Delaware',
            'Florida',
            'Georgia',
            'Hawaii',
            'Idaho',
            'Illinois',
            'Indiana',
            'Iowa',
            'Kansas',
            'Kentucky',
            'Louisiana',
            'Maine',
            'Maryland',
            'Massachusetts',
            'Michigan',
            'Minnesota',
            'Mississippi',
            'Missouri',
            'Montana',
            'Nebraska',
            'Nevada',
            'New Hampshire',
            'New Jersey',
            'New Mexico',
            'New York',
            'North Carolina',
            'North Dakota',
            'Ohio',
            'Oklahoma',
            'Oregon',
            'Pennsylvania',
            'Rhode Island',
            'South Carolina',
            'South Dakota',
            'Tennessee',
            'Texas',
            'Utah',
            'Vermont',
            'Virginia',
            'Washington',
            'West Virginia',
            'Wisconsin',
            'Wyoming',
        ];

        function getCountry(event) {
            let country;
            if (event.value == 'canada') {
                country = '';
                canada.forEach(element => {
                    country += '<option value="' + element + '">' + element + '</option>';
                });
                $('#SelectState').html(country);
            } else {
                country = '';
                americanStates.forEach(element => {
                    country += '<option value="' + element + '">' + element + '</option>';
                });
                $('#SelectState').html(country);
            }
        }
        // Add an event listener to the window that triggers the function
        // window.addEventListener('load', removeDisplayNone);
        window.addEventListener("load", function () {
            var loader = document.getElementById("loader");
            if (loader) {
                loader.style.display = "block";

                // Hide the loader after a certain duration (e.g., 1 second)
                setTimeout(function () {
                    loader.style.display = "none";
                }, 1000); // 1000 milliseconds = 1 second
            }
        });
        //print function
        function printDivContent() {
            var divElementContents = document.getElementById("printContent").innerHTML;
            var windows = window.open('', '', 'height=600, width=1000');
            windows.document.write('<html>');
            windows.document.write('<body > <h1>Div\'s Content Are Printed Below<br>');
            windows.document.write(divElementContents);
            windows.document.write('</body></html>');
            windows.document.close();
            windows.print();
        }

        //select function
        $(document).ready(function () {
            $("select").change(function () {
                $(this).find("option:selected").each(function () {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();

        });

        function erroralert(xhr) {

            if (xhr.status == 419) {
                window.location.href = '/';

            }
            if (typeof xhr.responseJSON.errors === 'object') {
                var error = '';
                $.each(xhr.responseJSON.errors, function (key, item) {
                    error += item + '\n';
                    if ($(document).find('[name="' + key + '"]').length > 0) {
                        var element = $(document).find('[name="' + key + '"]');
                        if (element.hasClass('form-control')) {
                            element.addClass('is-invalid').after('<span class="invalid-feedback is-invalid">' +
                                item + '</span>');
                        } else {
                        }
                    } else {
                    }
                });
            } else {
            }
        }
</script>
@include('sweetalert::alert')
	@yield("script")
    {{-- @include("layouts.theme-control") --}}
</body>

</html>


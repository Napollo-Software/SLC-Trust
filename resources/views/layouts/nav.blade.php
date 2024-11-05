<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
@php
    $user = App\Models\User::find(Session::get('loginId'));
@endphp
<style>
   .dropdown-toggle {
        padding-right: 7px !important;
        padding-left: 7px !important;
    }

    .dropy-icon {
        display: none !important;
    }

    body {
        background-color: #F0F1F7 !important;
        font-family: Poppins !important;
        color:black !important;
    }

    .pointer{
        cursor: pointer;
    }
    .btn-primary:hover {
        background-color: #6bb0aa !important;
        border-color: #5da298 !important;
    }
    th{
        font-weight:normal !important;
        white-space: nowrap !important;
    }
    td{
        font-size:14px !important;
    }
    h4{
        font-size: 1.01rem !important;
    }
    h5{
        font-weight:normal !important;
        font-size: 1.01rem !important;
    }
    .search-bar-padding{
        height:40px !important;
    }

    button.btn-primary {
        background-color: #559e99 !important;
        outline: none !important;
        box-shadow: none !important;
    }

    .dropdown-toggle {
        font-size: 14px;
        font-weight: 400;
    }
</style>
<div class="primary-menu">
    <nav class="navbar navbar-expand-lg align-items-center">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header border-bottom">
                <div class="d-flex align-items-center">
                    <div class="">
                        <img src="{{ asset('assets/new_theme/images/intrustpit-new-Logo.png') }}" class="logo-text" alt="logo icon" style="width: 200px;">
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav align-items-center flex-grow-1 nav-alignment">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-home-alt"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Dashboard</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Front Office') && $user->role != 'Admin' && $user->role != 'Employee')
                            <li class="active"><a class="dropdown-item {{ Route::currentRouteName()==='bill_reports' ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="bx bx-credit-card-front"></i>Lead Admin</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('Back Office') && $user->role != 'Admin' && $user->role != 'Vendor' && $user->role != 'Employee')
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='bill_reports' ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="bx bx-shield-alt-2"></i>Billing
                                    Admin</a></li>
                            @endif
                            @if ($user->role == 'Admin')
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='bill_reports' ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="bx bx-shield-alt-2"></i>Super
                                    Admin</a></li>
                            @endif
                            @if ($user->role == 'Employee')
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='bill_reports' ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="bx bx-shield-alt-2"></i>
                                    Dashboard</a></li>
                            @endif
                            @if ($user->role == 'Vendor')
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='vendor.dashboard' ? 'active' : '' }}" href="{{ route('vendor.dashboard') }}"><i class="bx bx-shield-alt-2"></i>Vendor
                                    Dashboard</a></li>
                            @endif
                        </ul>
                    </li>
                    @if ($user->hasPermissionTo('Front Office'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-collection"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Vendors</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Add Account'))
                            <li>
                                <a class="dropdown-item {{in_array(Route::currentRouteName(),['add.vendors'])? 'active' : '' }}" href="{{ route('add.vendors') }}"><i class="bx bx-user-check"></i>Add
                                    Vendor</a></li>
                            @endif
                            @if ($user->hasPermissionTo('View Account'))
                            <li>
                                <a class="dropdown-item {{in_array(Route::currentRouteName(),['vendors.list','view.vendors','edit.vendors'])? 'active' : '' }}" href="{{ route('vendors.list') }}"><i class="bx bx-user-pin"></i>Vendors</a></li>
                            @if ($user->hasPermissionTo('View Contact'))
                            <li>
                                <a class="dropdown-item {{Route::currentRouteName()==='contact.list' ? 'active' : '' }}" href="{{ route('contact.list') }}"><i class="bx bx-user-check"></i>Contacts</a></li>
                            @endif
                            @endif
                        </ul>
                    </li>
                    @endif
                    {{-- @if ($user->hasPermissionTo('Front Office'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-left-indent"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Leads</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Add Lead'))
                            <li>
                                <a class="dropdown-item {{in_array(Route::currentRouteName(),['add.lead'])? 'active' : ''  }}" href="{{ route('add.lead') }}"><i class="bx bx-user-check"></i>Add Lead</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('View Lead'))
                            <li>
                                <a class="dropdown-item {{in_array(Route::currentRouteName(),['lead.list','edit.lead','view.lead'])? 'active' : ''  }}" href="{{ route('lead.list') }}"><i class="bx bx-user-pin"></i>All Leads</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif --}}
                    @if ($user->hasPermissionTo('Front Office'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-building"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Referrals</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Add Referral'))
                            <li>
                                <a class="dropdown-item {{ in_array(Route::currentRouteName(),['create.referral'])  ? 'active' : '' }}" href="{{ route('create.referral') }}"><i class="bx bx-user-check"></i>Add
                                    Referral</a></li>
                            @endif
                            @if ($user->hasPermissionTo('View Referral'))
                            <li>
                                <a class="dropdown-item {{ in_array(Route::currentRouteName(),['referral.list','edit.referral','view.referral'])  ? 'active' : '' }}" href="{{ route('referral.list') }}"><i class="bx bx-user-pin"></i>All
                                    Referrals</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($user->hasPermissionTo('Back Office') && ( $user->hasPermissionTo('Add User') || $user->hasPermissionTo('View Users') || $user->hasPermissionTo('Deposit')))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Users</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Add User'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='add_user' ? 'active' : '' }}" href="{{ route('add_user') }}"><i class="bx bx-user-check"></i>Add User</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('View Users'))
                            <li>
                                <a class="dropdown-item {{ in_array(Route::currentRouteName() ,['users.all','view_user','show_user','edit_user']) ? 'active' : '' }}" href="{{ route('users.all') }}"><i class="bx bx-user-circle"></i>All
                                    Users</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($user->hasPermissionTo('Archives'))
                    <li class="nav-item dropdown d-none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-cube"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Archives</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{  Route::currentRouteName() ==='archive'? 'open active' : '' }}" href="{{ route('archive') }}"><i class="bx bx-book-content"></i>Transactions</a>
                            </li>
                            <li>
                                <a class="dropdown-item {{  Route::currentRouteName() ==='archived.bills'? 'open active' : '' }}" href="{{ route('archived.bills') }}"><i class="bx bx-book"></i>Bills</a></li>
                        </ul>
                    </li>
                    @endif
                    @if ($user->hasPermissionTo('Back Office') && $user->role != 'Vendor')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-message-square-edit"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Bills</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Add Bill'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='claims.create' ? 'active' : '' }}" href="{{ route('claims.create') }}"><i class="bx bx-message-square-dots"></i>Add
                                    Bill</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('View Bills'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='claims.index' ? 'active' : '' }}" href="{{ route('claims.index') }}"><i class="bx bx-book-content"></i>All
                                    Bills</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('Recurring Bills'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName()==='recurring.bills'? 'active' : '' }}""
                                        href=" {{ route('recurring.bills') }}"><i class="bx bx-file-blank"></i>Recurring
                                    Bills</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('Recycle'))
                            <li>
                                <a class="dropdown-item {{  Route::currentRouteName() ==='recycle.bills' ? 'open active' : '' }}" href="{{ route('recycle.bills') }}"><i class="bx bx-trash"></i>Recycle
                                    Bin</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($user->hasPermissionTo('Back Office') && $user->role != 'Vendor')
                    <li class="nav-item dropdown">
                        @if($user->role != 'User')
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-bar-chart-square"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Finance</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        @endif
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Adjustments'))
                            <li class="nav-item dropend">
                                <a class="dropdown-item {{ Route::currentRouteName() === 'adjustment'? 'active' : '' }}" href="{{ route('adjustment') }}"><i class="bx bx-receipt"></i>Adjustment</a>
                            </li>
                            @endif
                            {{-- @if ($user->hasPermissionTo('Create Check'))
                            <li class="nav-item dropend">
                                <a class="dropdown-item  {{  Route::currentRouteName() ==='check' ? 'open active' : '' }}" href="{{ route('check') }}"><i class="bx bx-book-bookmark"></i>Create Check</a>
                            </li>
                            @endif --}}
                            @if ($user->hasPermissionTo('Bank Reconciliation'))
                            {{-- <li class="nav-item dropend">
                                <a class="dropdown-item  {{  in_array(Route::currentRouteName() ,['bank.reconciliation','bank.reconciliation.filter']) ? 'open active' : ''  }}" href="{{ route('bank.reconciliation') }}"><i class="bx bx-arch"></i>Bank
                                    Reconciliation</a>
                            </li> --}}
                            @endif
                            @if ($user->hasPermissionTo('Monthly Statement'))
                            {{-- <li class="nav-item dropend">
                                <a class="dropdown-item  {{ in_array(Route::currentRouteName() ,['monthly.statement','monthly.filter']) ? 'open active' : '' }}" href="{{ route('monthly.statement') }}"><i class="bx bx-book-bookmark"></i>Monthly
                                    Statement</a>
                            </li> --}}
                            @endif
                            @if ($user->hasPermissionTo('Transactions'))
                            <li class="nav-item dropend">
                                <a class="dropdown-item  {{ in_array(Route::currentRouteName() ,['transaction.report','customer.filter']) ? 'open active' : '' }}" href="{{ route('transaction.report') }}"><i class="bx bx-card"></i>Transactions</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    @if ($user->role == 'Vendor')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-user"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Customers</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->role == 'Vendor')
                            <li class="nav-item dropend">
                                <a class="dropdown-item {{ Route::currentRouteName() === 'all-customers'? 'active' : '' }}" href="{{ route('vendor.all_customers') }}"><i class="bx bx-group"></i>All Customers</a>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <li class="nav-item dropdown d-none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-trash"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Recycle Bin</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{  Route::currentRouteName() ==='recycle.bills' ? 'open active' : '' }}" href="{{ route('recycle.bills') }}"><i class="bx bx-book"></i>Bills</a></li>
                        </ul>
                    </li>
                    @if ($user->hasPermissionTo('Front Office'))
                    <li class="nav-item dropdown d-none">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-grid"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Report</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Add Report'))
                            <li>
                                <a class="dropdown-item {{in_array(Route::currentRouteName(),['reports.add_report'])? 'active' : ''  }}" href="{{ route('reports.add_report') }}"><i class="bx bx-edit"></i>Add Report</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('View Report'))
                            <li>
                                <a class="dropdown-item {{in_array(Route::currentRouteName(),['reports.index'])? 'active' : ''  }}" href="{{ route('reports.index') }}"><i class="bx bx-spreadsheet"></i>All
                                    Reports</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                            <div class="parent-icon"><i class="bx bx-cog"></i>
                            </div>
                            <div class="menu-title d-flex align-items-center">Settings</div>
                            <div class="ms-auto dropy-icon"><i class="bx bx-chevron-down"></i></div>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($user->hasPermissionTo('Profile Setting'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='profile.setting' ? 'active' : '' }}" href="{{ route('profile.setting') }}"><i class="bx bx-user-pin"></i>Profile
                                    Setting</a></li>
                            @endif
                            @if ($user->hasPermissionTo('Roles&Permissions'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='roles.list' ? 'active' : '' }}" href="{{ route('roles.list') }}"><i class="bx bx-abacus"></i>Manage Roles</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('Manage Types'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='types.list'? 'active' : '' }}" href="{{ route('types.list') }}"><i class="bx bx-book-content"></i>Manage
                                    Types</a></li>
                            @endif
                            @if ($user->hasPermissionTo('Manage Categories'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='category.index'? 'active' : '' }}" href="{{ route('category.index') }}"><i class="bx bx-area"></i>Categories</a>
                            </li>
                            @endif

                            @if ($user->hasPermissionTo('Payee List'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='payee.list' ? 'active' : '' }}" href="{{ route('payee.list') }}"><i class="bx bx-book"></i>Payee List</a></li>
                            @endif
                            @if ($user->hasPermissionTo('Drop Box'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='dropbox' ? 'active' : '' }}" href="{{ route('dropbox') }}"><i class="bx bx-border-bottom"></i>Drop Box</a>
                            </li>
                            @endif
                            @if ($user->hasPermissionTo('Follow ups'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='follow_up.list' ? 'active' : '' }}" href="{{ route('follow_up.list') }}"><i class="bx bx-book-content"></i>Notes</a>
                            </li>
{{--                                    <li>--}}
{{--                                        <a class="dropdown-item {{ Route::currentRouteName() ==='follow_up.index' ? 'active' : '' }}" href="{{ route('follow_up.index') }}"><i class="bx bx-book-content"></i>Follow Up</a>--}}
{{--                                    </li>--}}
                            @endif
                            @if ($user->hasPermissionTo('Logs'))
                            <li>
                                <a class="dropdown-item {{ Route::currentRouteName() ==='log.list' ? 'active' : '' }}" href="{{ route('log.list') }}"><i class="bx bx-book-reader"></i>Logs</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

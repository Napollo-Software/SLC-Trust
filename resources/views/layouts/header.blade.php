<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="topbar-logo-header d-none d-lg-flex">
                <div class="">
                    <img src="{{ asset('assets/new_theme/images/slc_trust.png')}}" class="logo-text" alt="logo icon" style="width: 120px;">
                </div>
            </div>
            <div class="mobile-toggle-menu d-block d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"><i class="bx bx-menu"></i></div>
            <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                <form action="{{ route('claim.search.user') }}" class="mt-3">
                <input type="search" name="search"
                class="form-control search-bar-padding"
                placeholder="Search your bills here" aria-label="Search..."
                value=""/>
                </form>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class="bx bx-search"></i>
                        </a>
                    </li>
                    {{-- <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret dropdown-padding" href="avascript:;"><img src="{{ asset('assets/new_theme/images/02.png')}}" width="22" alt="">
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class="bx bx-moon"></i>
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret dropdown-padding position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">{{ $notifications->where('status', 0)->count() }}</span>
                            <i class="bx bx-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    <p class="msg-header-badge">{{ $notifications->count() }}</p>
                                </div>
                            </a>
                            <div class="header-notifications-list ps">
                                @if ($notifications->count() == 0)
                                <a class="dropdown-item" href="javascript:;">
                                    Notifications are not found!
                                </a>
                                @endif
                                @foreach ($notifications as $item)
                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{ $item->user_details->avatar }}" class="msg-avatar" alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">{{ $item->title }}<span class="msg-time float-end">{{ us_date_format($item->created_at) }}</span></h6>
                                            <p class="msg-info">
                                                @php
                                                $itemDescription = $item->description;
                                                $lineBreakAfter = 8;
                                                $words = explode(' ', $itemDescription);

                                                for ($i = 0, $count = count($words); $i < $count; $i++) { echo $words[$i] . ' ' . ($i % $lineBreakAfter===($lineBreakAfter - 1) ? '<br>' : '' ); } @endphp </div>
                                        </div>
                                </a>
                                @endforeach
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </div>
                            <a href="{{ route('notifications') }}">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Notifications</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    @if ($user->hasPermissionTo('Front Office'))
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret dropdown-padding position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
                            <i class='bx bx-comment'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">

                                <div class="msg-header">
                                    <p class="msg-header-title">Messages</p>
                                    <p class="msg-header-clear ms-auto">Marks all as read</p>
                                </div>
                            </a>
                            <div class="header-message-list">
                            @foreach ($messages as $message )

                                <a class="dropdown-item" href="javascript:;">
                                    <div class="d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{ url('/user/images93561655300919_avatar.png')}}" class="msg-avatar" alt="user avatar">
                                        </div>

                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">{{ $message->messageToName->first_name }} <span class="msg-time float-end">
                                            {{ $message->created_at->format('H:i:A') }}
                                            </span></h6>
                                            <p class="msg-info">{{ $message->message }}</p>
                                        </div>
                                    </div>

                                </a>
                            @endforeach

                            </div>
                            <a href="{{ route('sms.index') }}">
                                <div class="text-center msg-footer">View All Messages</div>
                            </a>
                        </div>
                    </li>
                    @endif
                    @if ($user->hasPermissionTo('Follow ups'))
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret dropdown-padding position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">{{ $followup->count() }}</span>
                            <i class="bx bx-archive"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Follow ups</p>
                                    <p class="msg-header-badge">{{ $followup->count() ?? 6 }}</p>
                                </div>
                            </a>
                            <div class="header-message-list ps">
                                @if ($followup->count() == 0)
                                <a class="dropdown-item overflow-auto" href="javascript:;">
                                    Follow ups are not found!
                                </a>
                                @endif
                                @foreach ($followup as $key => $item)
                                @if ($key < 6) @php $daysDiff=\Carbon\Carbon::parse($item->created_at)->diffInDays();
                                    @endphp
                                    <a class="dropdown-item overflow-auto" href="javascript:;">
                                        <div class="d-flex align-items-center gap-0">
                                            <div class="position-relative">
                                                <div class="notify bg-light-primary text-primary">
                                                    <i class="bx bx-check-square"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="cart-product-title mb-0 pl-0">{{ $item->note }}</h6>
                                                <p class="cart-product-price mb-0">{{ date('m-d-Y',strtotime($item->date)) }}</p>
                                            </div>
                                            <div class="">
                                                <p class="cart-price mb-0">{{ $daysDiff }} D</p>
                                            </div>
                                            {{-- <div class="cart-product-cancel"><i class="bx bx-x"></i>
                                        </div> --}}
                                        </div>
                                    </a>
                                    @endif
                                    @endforeach
                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                    </div>
                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                    </div>
                            </div>
                            <a href="{{ route('follow_up.list') }}">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">Follow up List</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret dropdown-padding" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{url($user->avatar)}}" class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="user-name mb-0">{{ $user->full_name() }}</p>
                        <p class="designattion mb-0">{{ $user->role == "Front office" ? "Lead Admin" : ($user->role == "Back office" ? "Billing Admin" : $user->role) }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('profile.setting') }}"><i class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    @if ($user->hasPermissionTo('Roles&Permissions'))
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('roles.list') }}"><i class="bx bx-cog fs-5"></i><span>Permissions</span></a>
                    </li>
                    @endif
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('bill_reports') }}"><i class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>
                    {{-- <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-dollar-circle fs-5"></i><span>Earnings</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i class="bx bx-download fs-5"></i><span>Downloads</span></a>
                    </li> --}}
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

@extends('nav')
@section('title', 'View Account | SLC Trusts')
@section('wrapper')
    <style>
        .product-list {
            height: 100% !important;
        }
    </style>
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Customers</b> </div>
        </h5>
        <div class="card">
            <div class="d-flex align-items-center p-3">
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">	<i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                    </a>

                </div>
            </div>
            <div class="card-body" style="margin-top:-15px ">
                <div class="table-responsive overflow-auto pb-2 ">
                    <table class="table align-middle mb-0 table-hover dataTable">
                        <thead class="table-light">
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
                        @foreach ($converted_to_customers as $k => $u)
                            <tr>
                                <td>{{ $u->id }}</td>
                                <td>
                                    @if ($UserRole == 'Admin')
                                        <a href="{{ route('show_user', $u['id']) }}">{{ $u['name'] }}
                                            {{ $u['last_name'] }}</a>
                                </td>
                                @else
                                    {{ $u['name'] }} {{ $u['last_name'] }}
                                @endif
                                <td>{{ $u['email'] }}</td>
                                <td>{{ $u['role'] }}</td>
                                <th>
                            <span
                                class="badge
                    @if ($u->account_status == 'Pending') bg-success @endif
                    @if ($u->account_status == 'Approved') bg-primary @endif
                    @if ($u->account_status == 'Not Approved') bg-danger @endif
                    me-1  @if ($u->account_status == 'Disable') bg-danger @endif
                    me-1">

                                @if ($u->account_status == 'Pending')
                                    {{ $u['account_status'] }}
                                @endif
                                @if ($u->account_status == 'Approved')
                                    {{ $u['account_status'] }}
                                @endif
                                @if ($u->account_status == 'Not Approved')
                                    {{ $u['account_status'] }}
                                @endif
                                @if ($u->account_status == 'Disable')
                                    {{ $u['account_status'] }}
                                @endif
                            </span>
                                </th>
                                <td>
                                    @if ($u['role'] == 'User')
                                        ${{ number_format((float) $u['user_balance'], 2, '.', ',') }}
                                </td>
                                @else
                                    N/A
                                @endif
                                <td class="text-center">
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                            data-bs-placement="top" class="avatar avatar-xs pull-up"
                                            title="{{ $u['name'] }}">
                                            <img src="{{ url('user/images93561655300919_avatar.png') }}"
                                                 alt="Avatar" class="rounded-circle" style="width: 25px" />
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="bx bx-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
{{--                                            @if ($role != 'Moderator')--}}
{{--                                                <a class="dropdown-item pb-2" href="{{ route('show_user', $u['id']) }}"><i--}}
{{--                                                        class='bx bxs-show'></i> View</a>--}}
{{--                                                --}}{{-- @if ($users->hasPermissionTo('User Edit')) --}}
{{--                                                <a class="dropdown-item pb-2"--}}
{{--                                                   href="{{ route('edit_user', $u['id']) }}"><i--}}
{{--                                                        class="bx bx-edit-alt me-1"></i> Edit</a>--}}
{{--                                                --}}{{-- @endif --}}
{{--                                            @endif--}}
{{--                                            @if ($users->hasPermissionTo('Deposit') && $u->role == 'User')--}}
{{--                                                <a class="dropdown-item" href="{{ route('view_user', $u['id']) }}"><i--}}
{{--                                                        class="bx bx-dollar-circle me-1"></i> Add Balance</a>--}}
{{--                                            @endif--}}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{ $user->links() }} --}}
            </div>
        </div>

        </div>
    </div>
@endsection

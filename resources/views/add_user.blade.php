@extends('nav')
@section('title', 'Add User | Intrustpit')
@section('wrapper')
    <div class="">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Add User</h5>
        <div class="row">
            <div class="col-xl-4">
                <form id="formAuthentication" class="mb-3" action="{{ route('store_user') }}" method="post">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    <div class="card mt-2 mb-xl-0">
                        <div class="card-header">
                            <div class="d-flex">
                                <h5 class="col-md-11 m-1">Designation</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row-cols-lg-12">
                                <label for="exampleFormControlInput1" class="form-label">User Role</label>
                                <select id="defaultSelect" class="form-select" name="role" required multiple>
                                    <option value="">--</option>
                                    @foreach ($roles as $role)
                                        {{-- @if ($role->name == 'admin' || $role->name == 'moderator' || $role->name == 'user') --}}
                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                        {{-- @endif --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            
            <div class="col-md-8 mt-2">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="display: flex">
                            <h4>User Details</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">First Name</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control"   placeholder="First Name" name="name" maxLength="30"
                                    required value="{{ old('name', request()->input('name'))}}" />
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Name</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control" pattern="[a-zA-Z\s]+" placeholder="Last Name" name="last_name" maxLength="40"
                                    required value="{{ old('last_name', request()->input('last_name'))}}" />
                                <span class="text-danger">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="Email" class="form-control"  maxLength="60" placeholder="User Email" name="email"
                                    required value="{{ old('email', request()->input('email'))}}"  />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr class="billing_method d-none">
                        <div class="row billing_method d-none">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Billing Method</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select class="form-control form-select mb-3" id="" name="billing_method">
                                    <option value="manual">Manual Billing</option>
                                    <option value="prepaid">Prepaid Credit Card</option>
                                </select>
                                <input type="hidden" name="account_status" value="Approved">
                                <span class="text-danger">
                                    @error('billing_method')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary update-bill-button">Add User <i
                                        class="bx bx-save"></i></button>
                                <a href="{{ url('/vendors') }}" class="btn btn-secondary">Close <i
                                        class="bx bx-window-close"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="row d-none">
        <div class="col-lg-12 mb-12">
            <div class="card">
                <h5 class="card-header"><b>Add User</b></h5>
                <form id="formAuthentication" class="mb-3" action="{{ route('store_user') }}" method="post">
                    @csrf
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="name"
                                    required />
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-3">
                                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                    required />
                                <span class="text-danger">
                                    @error('last_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="Email" class="form-control" placeholder="User Email" name="email"
                                    required />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">User Role</label>
                                <select id="" class="form-select" name="role" required multiple>
                                    <option value="">--</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6" id="billing_method">
                                <label for="username" class="form-label">Billing Method</label>
                                <select class="form-control form-select mb-3" id="" name="billing_method">
                                    <option value="manual">Manual Billing</option>
                                    <option value="prepaid">Prepaid Credit Card</option>
                                </select>
                                <span class="text-danger">
                                    @error('billing_method')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <input type="hidden" name="account_status" value="Approved">
                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <button class="btn btn-primary add-user" type="submit">Add User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    $(document).on('submit', 'form', function() {
        $('.add-user').attr('disabled', true);
    })
    $(document).on('click', '#defaultSelect', function() {
        var check = $('#defaultSelect').val();
        if (check == 'user') {
            $('.billing_method').removeClass('d-none');
        } else {
            $('.billing_method').addClass('d-none');
        }
    });
</script>

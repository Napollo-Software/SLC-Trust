@extends('nav')
@section('title', 'Edit User Senior Life Care Trusts')
@section('wrapper')
    @php
        $role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
    @endphp
    <style>
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
        }

        .search-nav {
            padding-bottom: 6%;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>
    <div class="container-xl px-4 mt-4">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>type</b></span> / Show User #{{ $type->id }}
        </h5>
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0 " style="width:95%;">
                    <div class="card-header">
                        <div class="d-flex">
                            <h6 class="col-md-11 pt-2">
                                Contact Information
                            </h6>
                        </div>
                    </div>
                    <div class="card-body text-center">

                        <div class="card-body mt-3" style="padding: 0.5rem 0.5rem;margin-left:auto;margin-right:auto; ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $type->email }}
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    @if ($type->phone_number != '+1')
                                        {{ $type->phone_number }}
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="display: flex">
                            <h4>Profile Details</h4>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $type->name  }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Category</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $type->category }}

                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                <button id="back-btn" class="btn btn-info">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
      document.getElementById('back-btn').addEventListener('click', function() {
          window.history.back();
      });
  </script>

@endsection

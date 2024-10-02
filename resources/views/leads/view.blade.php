@extends("nav")
@section('title', 'Lead | SLC Trust')
@section("wrapper")
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


        }

        .form-control, .dataTable-input {
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
    <div class="">
        <h5 class=" d-flex justify-content-between pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <a href="{{url('/leads')}}" class="text-muted fw-light pointer"><b>All Leads</b></a> / <b>View Lead</b> </div>
        </h5>
        <!-- Account page navigation-->
        <div class="row">
            <div class="col-md-4">
                <div class="">
                <div class="card">
                    <div class="card-header d-flex p-2 ">
                        <h4>Lead Information</h4>
                      </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Lead Full Name</h6>
                                </div>
                                <div class="col-sm-8 text-left">
                                    {{$lead->contact_first_name.' '.$lead->contact_last_name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Lead Email</h6>
                                </div>
                                <div class="col-sm-8 text-left">
                                    {{$lead->contact_email}}
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Lead Phone</h6>
                                </div>
                                <div class="col-sm-8 text-left">
                                    @if($lead->contact_phone != '+1')
                                        {{$lead->contact_phone}}
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Relationship with Patient</h6>
                                </div>
                                <div class="col-sm-8 text-left">
                                    {{$lead->relation_to_patient}}

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex p-2 ">
                        <h4>Patient Information</h4>
                      </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Patient Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$lead->patient_first_name}} {{$lead->patient_last_name}}

                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Patietn Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if($lead->patient_phone != '+1')
                                        {{$lead->patient_phone}}
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Patient Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$lead->patient_email}}
                                </div>
                            </div
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex p-2 ">
                    <h4>Other Information</h4>
                  </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Sub Status</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$lead->sub_status}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Vendo ID</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$lead->vendor_id}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Case Type</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $lead->type_id ? $lead->type_id->name:$lead->case_type }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Source Type</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$lead->source_type}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Note</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$lead->note}}
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-12">
                                <button id='back-btn' class="btn btn-primary">Close</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        document.getElementById('back-btn').addEventListener('click', function () {
            window.history.back();
        });
    </script>
@endsection

@extends('nav')
@section('title', 'View Account Senior Life Care Trusts')
@section('wrapper')

    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <a href="{{url('/vendors')}}" class="text-muted fw-light pointer"><b>Vendors</b></a> / <b>View Vendor</b> </div>
        </h5>
        <div class="row">
            <div class="col-xl-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="display: flex; padding-bottom: 3%">
                                <h4>Vendor Information</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $vendor->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $vendor->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Type</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    {{ $vendor->vendor_types ? $vendor->vendor_types->name : $vendor->vendor_type_name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div style="display: flex; padding-bottom: 3%">
                                <h4>Related Contacts</h4>
                            </div>
                        </div>
                        <table class="  table " >
                            <thead>
                            <tr      >
                                <th ><h6 class="mb-0" style="text-transform: capitalize">Full Name</h6></th>
                                <th ><h6 class="mb-0" style="text-transform: capitalize">Email</h6></th>
                            </tr>

                            </thead>
                            @php
                            $contacts = $vendor->contacts;
                            @endphp
                            <tbody>
                            @if (count($contacts) == 0)
                                <tr>
                                    <td colspan="2" class="text-center">No contact added yet.</td>
                                </tr>
                            @else
                                @foreach($contacts as $contact)
                                    <tr>
                                        <td style="width: 100%;max-width: 200px;overflow: auto;">{{ $contact->fname }} {{ $contact->lname }}</td>
                                        <td style="width: 100%;max-width: 200px;overflow: auto;">{{ $contact->email }}</td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div style="display: flex; padding-bottom: 3%">
                            <h4>Other Information</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->phone }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Website</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->website }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Country</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->country }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">State</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->state }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->city }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Zip Code</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->zipcode }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Address 1</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->address }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Address 2</h6>
                            </div>
                            <div class="col-sm-8 text-secondary">
                                {{ $vendor->address_2 }}
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-4">
                            <div class="col-sm-12">

                                <a href="{{ url('/vendors') }}" class="btn btn-secondary">Close <i
                                        class="bx bx-window-close"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

            @endsection
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


            <script>
                $(document).ready(function () {
                    document.getElementById('phone').addEventListener('input', function (e) {
                        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
                        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
                    });
                })
            </script>

@extends('myprint')
@section('title', 'Deleted Bills | Senior Life Care Trusts')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-12">
              <div class="card">
                <h5 class="card-header"><b>Deleted Bills</b></h5>
                <div class="card-body">
                    <a  class="btn btn-primary print-btn" style="color: #fff !important;" onclick="window.print()">Print Bills<i class='bx bx-printer'></i></a>
                    <div class="dropdown download-btn">
                      <a href="{{ route('deletebillexport') }}" style="margin-right: 15px;" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Excel
                      </a>
                      {{-- <a href="{{ route('deletepdfbill') }}" style="margin-right: 15px;" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pdf
                      </a> --}}
                      <a href="{{ route('deletebillcsv') }}" class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Csv
                      </a>
                    </div>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>CID#</th>
                          <th>Bill tittle</th>
                          <th>User</th>
                          <th>Submission Date</th>
                          <th>Category</th>
                          <th>Status</th>
                          <th>Amount</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($claims as $claim)
                        <tr>
                            <tr><td>{{ $claim->id }}</td>
                                <td>Bill Request - {{$claim->id}}</td>
                                <td>{{ App\Models\User::where('id',$claim->claim_user)->pluck('name')->first()}}</td>
                                <td>{{ $claim->submission_date ? date('m/d/Y', strtotime($claim->submission_date)) : '' }}</td>
                                <td>{{ $claim->claim_category }}</td>
                                <td>{{ $claim->claim_status }}</td>
                                <td>${{ $claim->claim_amount}}</td>
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

@endsection

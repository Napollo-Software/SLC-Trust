@extends('myprint')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / All Users</h5>
    <div class="row">
      <div class="col-lg-12 mb-12">
        <div class="card">
          <h5 class="card-header"><b>All Users</b></h5>
              <a  class="btn btn-primary print-btn" href="{{ route('printuserpage') }}" target="blank">Print List<i class='bx bx-printer'></i></a>
              {{-- <div class="dropdown download-btn">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Download Users List
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">PDF Format</a>
                  <a class="dropdown-item" href="#">Excel/CSV Format</a>
                </div>
              </div>                    --}}
          <div class="row">
            <div class="col-lg-2">
              <div class="filter">
                <a class="btn btn-primary" href="add_user">Add New User</a>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="search-user">
                <input class="form-control" type="text" id="search" name="search" placeholder="Search User..">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              <table class="table table-bordered">
                <thead>
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

                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

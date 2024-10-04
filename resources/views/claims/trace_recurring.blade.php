@extends("nav")
@section('title', 'Trace Recurring | SLC Trusts')
@section("wrapper")
<style>

.custom-row {
  justify-content: space-between;
}

.custom-row > .mb-4 {
  width: 20% !important;
}
.custom-nav-margin{
            margin-top:-15px;
        }
.dataTables_info{
    display: none;
}
.dataTables_paginate{
    display: none;
}
.hidden{
  display: none !important;
}
.dataTables_wrapper {
  margin-bottom: 10px !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
$(document).on('click','.recurring-action',function(e){
    e.preventDefault();
    var id = $(this).attr('data-id');
    Swal.fire({
            title: 'Warning!',
            text: "Are you sure ,You want to remove bill#"+id+" from recurring",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'info',
            confirmButtonText: 'Yes, remove it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{ url('claim/remove-from-recurring') }}',
                    type:'post',
                    data: {id: id},
                    success: function (){
					              // $('.recurring-action').attr('disabled',true);
                        swal.fire('success','Bill # '+id+' has been removed from recurring!','success');
                        $('.row-'+id).addClass('d-none');
                        // window.location.reload();
                    },
                    error: function (){

                    }
                })
            }
        })
    })
    $(document).on('click','.duplicate-bill',function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
      swal.fire({
        title: "Need Approval!",
        text: "Are you sure, you want to duplicate Bill # "+id+".",
        icon:"info",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: 'info',
        confirmButtonText: 'Yes, duplicate it!'
      }).then((result)=>{
        if(result.isConfirmed){
          $.ajax({
            url: "{{ route('duplicate.bill') }}",
            type: "post",
            data: { _token:"{{ csrf_token() }}", 'id': id },
            success:function(data){
              if(data.success == true){
                swal.fire('Success',data.message, 'success');
              }
              if(data.success == false){
                swal.fire('Error',data.message, 'error');
              }
            },
            error:function(xhr){
              erroralert(xhr);
            }
          })
        }
      })
    })
$(document).ready(function() {
  $('.dataTable').DataTable({
                aLengthMenu: [
                    [-1, 50, 100, -1],
                    ["All", 50, 100, "All"]
                ],
              "order": false // "0" means First column and "desc" is order type;
        });
  } );
</script>
<?php
use App\Models\Claim;
use App\Models\User;
use Carbon\Carbon;
$role = User::where('id', '=', Session::get('loginId'))->value('role');
$billing_method = User::where('id', '=', Session::get('loginId'))->value('billing_method');
$current_user_name = User::where('id', '=', Session::get('loginId'))->value('name');
$current_user_balance = User::where('id', '=', Session::get('loginId'))->value('user_balance');
$all_users = User::where('role','User')->get();
$users = User::find(Session::get('loginId'));
?>
@if($billing_method =='manual')
@if ($role == 'Admin' || $role == 'Moderator')
<style>
    .text-nowrap {
    white-space: nowrap !important;
    margin-top: 26px;
}
</style>
          <div class="">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b>/ Trace Recurring bills</span></h5>
            <div class="row">
                @foreach ($claimsPaginated as $date => $claimsGroup)
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body" style="padding:1rem">
                            <div class="card-title d-flex align-items-start justify-content-between mb-0">
                                <div>
                                    <span class="fw-semibold d-block mb-1">Date</span>
                                    <h5 class="card-title mb-2">
                                        <small>{{ $date }}</small>
                                    </h5>
                                    <small class="fw-semibold">Bills </small><span class="badge bg-primary me-1">{{ $claimsGroup->count() }}</span>
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <img src="http://127.0.0.1:8000/assets/img/icons/unicons/pending.png" alt="chart success" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card">
                        <div class="card-body" style="padding:1rem">
                            <div class="card-title d-flex align-items-start justify-content-between mb-0">
                                <div>
                                    <span class="fw-semibold d-block mb-1">Traced From</span>
                                    <h5 class="card-title mb-2">
                                        <small>02-21-2023</small>
                                    </h5>
                                    <small class="fw-semibold">Bills </small><span class="badge bg-primary me-1">1</span>
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <img src="http://127.0.0.1:8000/assets/img/icons/unicons/paid.png" alt="chart success" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: -20px">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="card-body overflow-auto p-3">
                      <div class="dropdown download-btn">
                        {{-- <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Download Bills
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" target="blank" href="{{ route('printpage') }}">PDF Format</a>
                          <a class="dropdown-item" target="blank" href="{{ route('printpage') }}">Excel/CSV Format</a>
                        </div> --}}
                      </div>
                    <div class="table-responsive text-nowrap overflow-auto pb-2">
                      <table class="table align-middle mb-0 table-hover dataTable" >
                        <thead class="table-light">
                          <tr>
                            <th>title</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Amount</th>
                            {{-- <th>Attachment</th> --}}
                            {{-- <th>Recurring</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($claimsGroup as $claim)
                          <tr>
                            <td style="width: 120px"><a href={{url("claims/".$claim['id'])}}>Bill#{{ str_pad($claim['id'],2,"0",STR_PAD_LEFT) }}</a></td>
                            <td style="width: 150px">
                              @foreach($all_users as $user)
                              @if($claim->claim_user==$user->id)
                              {{$user->name }} {{$user->last_name }}
                              @endif
                              @endforeach
                            </td>
                            <td>{{ date('m/d/Y h:i A',strtotime($claim['created_at'])) }}</td>
                            <td><?php $name=App\Models\Category::find($claim['claim_category'])?>{{ $name->category_name  }}</td>
                            <td>
                              <span class="badge
                              @if ($claim->claim_status == 'Approved') bg-success @endif
                              @if ($claim->claim_status == 'Partially approved') bg-primary @endif
                              @if ($claim->claim_status == 'Pending') bg-info @endif
                              @if ($claim->claim_status == 'Refused') bg-danger @endif
                              me-1">
                              @if ($claim->claim_status == 'Approved') {{ $claim['claim_status'] }} @endif
                              @if ($claim->claim_status == 'Partially approved') {{ $claim['claim_status'] }} @endif
                               @if ($claim->claim_status == 'Pending') {{ $claim['claim_status'] }} @endif
                               @if ($claim->claim_status == 'Refused') {{ $claim['claim_status'] }} @endif
                               </span>
                            </td>
                            <td>${{ number_format((float)$claim['claim_amount'], 2, '.', ',') }}</td>
                            {{-- <td>
                              <?php $document_type=pathinfo($claim->claim_bill_attachment);?>
                              <div class="card" style="width: 100px; ">
                                <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                  <a href="{{url("img/".$claim->claim_bill_attachment)}}" target="_blank">
                                    @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                     <img src={{url("img/pdf_icon.png")}} alt="" class="img-thumbnail">
                                    @else
                                    <img src="{{url("img/".$claim->claim_bill_attachment)}}" alt=""   class="img-thumbnail"> </a>
                                    @endif
                                  </div>
                                </div>
                            </td> --}}
                            {{-- <td class="text-center">
                                @if($users->hasPermissionTo('Recurring Edit') || $users->hasPermissionTo('Recurring Remove'))
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn p-0 dropdown-toggle hide-arrow"
                                  data-bs-toggle="dropdown"
                                >
                                  <i class="menu-icon tf-icons bx bx-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item duplicate-bill" data-id="{{ $claim['id'] }}"><i class="bx bx-duplicate"></i> Duplicate</a>
                                    @if($users->hasPermissionTo('Recurring Edit'))
                                      <a class="dropdown-item" href="<?= url('edit-recurring-bill/'.$claim['id'])?>">
                                        <i class="bx bx-edit "></i> Edit
                                      </a>
                                    @endif
                                      <form action="{{url('claim/remove-from-recurring')}}" id="recurring_form" method="post">
                                      @csrf
                                      <input type="hidden" name="id" id="recurring_id" value="{{$claim['id']}}">
                                      @if($users->hasPermissionTo('Recurring Remove'))
                                      <button class="dropdown-item recurring-action" data-id="{{$claim['id']}}">
                                        <i class="bx bx-trash "></i> Remove
                                      </button>
                                      @endif
                                      </form>
                                </div>
                              </div>
                                @endif
                            </td> --}}
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      @endforeach
                     {{ $claimsPaginated->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif
          @endif
@endsection

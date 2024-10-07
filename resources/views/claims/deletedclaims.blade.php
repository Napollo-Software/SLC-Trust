@extends("nav")
@section('title', 'Deleted Bills | SLC Trusts')
@section("wrapper")
<?php
use App\Models\User;
$role = User::where('id', '=', Session::get('loginId'))->value('role');
?>


          <div class="">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Recycle Bin</b></span> / Bills</h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="d-flex align-items-center p-3" style="margin-bottom:-20px">
                    <div>
                      <h5 class="mb-1">Delete Bills</h5>
                      <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>All deleted Bills</p>
                    </div>
                  </div>
                 <div class="row pt-1">
                    <div class="col-lg-12">

                      {{-- <a  class="btn btn-primary print-btn"href="{{ route('alluser.print') }}" target="blank">Export<i class='bx bx-printer'></i></a> --}}
                      {{-- <div class="dropdown download-btn">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Download Bills
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" target="blank" href="{{ route('alluser.print') }}">PDF Format</a>
                          <a class="dropdown-item" target="blank"  href="{{ route('alluser.print') }}">Excel/CSV Format</a>
                        </div>
                      </div> --}}
                    </div>
                  </div>


                  <div class="card-body">
                  @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                  @endif
                  @if(Session::has('fail'))
                  <div class="alert alert-danger">{{Session::get('fail')}}</div>
                  @endif
                    @include('alerts.messages')
                    <div class="table-responsive text-nowrap overflow-auto pb-2">
                      <table class="table align-middle mb-0 table-hover dataTable">
                        <thead class="table-light">
                          <tr>
                            <th>CID#</th>
                            <th>Bill tittle</th>
                            <th>User</th>
                            <th>Submission Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($claims as $claim)
                          <tr>
                            <td>Bill# {{ $claim['id'] }}</td>
                            <td>Bill Request - {{ $claim['id'] }}</td>
                            <td>
                             {{$claim->user_details->full_name() }}
                            </td>
                            <td>{{ date('m/d/Y',strtotime($claim['created_at'])) }}</td>
                            <td>{{ $claim->category_details->category_name }}</td>
                            <td>
                              <span
                                  class="badge
                                  @if ($claim->claim_status == 'Approved') bg-success @endif
                                  @if ($claim->claim_status == 'Partially approved') bg-primary @endif
                                  @if ($claim->claim_status == 'Pending') bg-info @endif
                                  @if ($claim->claim_status == 'Refused') bg-danger @endif
                                  me-1">
                                  @if ($claim->claim_status == 'Approved')
                                      {{ $claim['claim_status'] }}
                                  @endif
                                  @if ($claim->claim_status == 'Partially approved')
                                      {{ $claim['claim_status'] }}
                                  @endif
                                  @if ($claim->claim_status == 'Pending')
                                      {{ $claim['claim_status'] }}
                                  @endif
                                  @if ($claim->claim_status == 'Refused')
                                      {{ $claim['claim_status'] }}
                                  @endif
                              </span>
                          </td>
                            <td>${{ $claim['claim_amount'] }}</td>
                            <td class="text-center">
                              <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                          data-bs-toggle="dropdown">
                                      <i class="menu-icon tf-icons bx bx-cog"></i>
                                  </button>
                                  <div class="dropdown-menu">
                                      <button class="dropdown-item restore_bill" id="{{$claim['id']}}"><i class='bx bx-history me-1'></i>Restore</button>
                                  </div>
                              </div>
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                        {{-- {{ $claims->links() }} --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
$(document).ready(function() {
  $(document).on('click','.restore_bill',function(e){
    e.preventDefault();
    var id =  $(this).attr('id');
    swal.fire({
      title:"warning",
      text: "Are you sure you want to restore bill # "+id,
      icon:"warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: 'info',
      confirmButtonText: 'Yes, Restore it!'
    }).then((result)=>{
      if(result.isConfirmed){
        $.ajax({
          url : "{{ route('restore.bill') }}",
          type : "post",
          data : { id:id, _token : "{{ csrf_token() }}"},
          success:function(data){
            swal.fire('success','Bill # '+id+" has been restored successfully",'success');
            window.location.reload();
          },
          error:function(xhr){
            erroralert(xhr);
          }
        })
      }
    })
  })
  $('.dataTable').DataTable( {
            "order": [[ 0, "asc" ]] // "0" means First column and "desc" is order type;
        } );
  } );
</script>

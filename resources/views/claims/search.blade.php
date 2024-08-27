@extends("nav")
@section('title', 'Bills | Intrustpit')
@section("wrapper")
<style>
  

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
$(document).ready(function() {
  $('.dataTable').DataTable( {
            "order": [[ 0, "desc" ]] // "0" means First column and "desc" is order type;
        } );
  } );
</script>
<?php
use App\Models\Claim;
use App\Models\User;
use Carbon\Carbon;
use App\Models\PayeeModel;
$role = User::where('id', '=', Session::get('loginId'))->value('role');
$all_users = User::where('role','User')->get();
$billing_method = User::where('id', '=', Session::get('loginId'))->value('billing_method');
$current_user_name = User::where('id', '=', Session::get('loginId'))->value('name');
$current_user_balance = User::where('id', '=', Session::get('loginId'))->value('user_balance');

?>
@if($billing_method =='manual')
@if ($role == 'Admin' || $role == 'Moderator')
<style>
    .text-nowrap {
    white-space: nowrap !important;
    margin-top: 26px;
}
</style>

<div class="modal fade" id="update-bill-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
        <button type="button" class="close btn-secondary close-btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('update.bills.status')}}" method="POST" enctype="multipart/form-data">
          @csrf 
      <div class="modal-body">
       <input type="file" name="import_file" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
      </div>
  </form>
    </div>
  </div>
</div>
          <div class="">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b>/ Bills</span></h5>
            @if(Request::url() != url('/claims') && $role == "Moderator" || $role=="Admin")
           
            @endif
            <div class="row ">
              <div class="col-lg-12 mb-12">
                <div class="card d-flex" >
                  <div class="d-flex align-items-center p-2">
                    <div>
                        <h5 class="mb-1">Search Results against:{{ $search }}</h5>
                        <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall entries</p>
                    </div>
                    <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                    </div>
                </div>
                  <div class="card-body" style="margin-top: -20px" >
                    <div class="table-responsive text-nowrap overflow-auto pb-2 mt-2"  >
                      <table class="table align-middle mb-0 table-hover dataTable" >
                        <thead class="table-light">
                          <tr>
                            <th>title</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Payee</th>
                            <th>Account</th>
                            <th>Balance</th>
                            <th>Amount</th>
                            <th>Attachment</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($claims as $claim)
                          <tr>
                            <td style="width: 120px"><a href="claims/{{ $claim['id'] }}">Bill#{{ str_pad($claim['id'],2,"0",STR_PAD_LEFT) }}</a></td>
                            <td>
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
                              @if ($claim->claim_status == 'Approved') bg-label-success @endif
                              @if ($claim->claim_status == 'Partially approved') bg-label-primary @endif
                              @if ($claim->claim_status == 'Pending') bg-label-info @endif
                              @if ($claim->claim_status == 'Refused') bg-label-danger @endif
                              me-1">
                              @if ($claim->claim_status == 'Approved') {{ $claim['claim_status'] }} @endif
                              @if ($claim->claim_status == 'Partially approved') {{ $claim['claim_status'] }} @endif
                               @if ($claim->claim_status == 'Pending') {{ $claim['claim_status'] }} @endif
                               @if ($claim->claim_status == 'Refused') {{ $claim['claim_status'] }} @endif
                               </span>
                            </td>
                            <td>
                              @php
                                  $payee = PayeeModel::find($claim->payee_name);
                                  if($payee){
                                    $payee = $payee->name;
                                  }
                              @endphp
                              {{$payee}}
                            </td>
                            <td>{{$claim->account_number}}</td>
                            <td>
                                @foreach($all_users as $user)
                                @if($claim->claim_user==$user->id)
                                ${{$user->user_balance }}
                                @endif
                                @endforeach
                              </td>
                            <td>${{ number_format((float)$claim['claim_amount'], 2, '.', ',') }}</td>
                            <td>
                              <?php $document_type=pathinfo($claim->claim_bill_attachment);?>
                              <div class="card" style="width: 100px; ">
                                <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                  <a href="img/{{$claim->claim_bill_attachment}}" target="_blank">
                                    @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                     <img src="img/pdf_icon.png" alt="" class="img-thumbnail">
                                    @else
                                    <img src="img/{{$claim->claim_bill_attachment}}" alt=""   class="img-thumbnail"> </a>
                                    @endif
                                  </div>
                                </div>
                            </td>
                            <td >
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn p-0 dropdown-toggle hide-arrow"
                                  data-bs-toggle="dropdown"
                                >
                                  <i class="menu-icon tf-icons bx bx-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="claims/{{ $claim['id']}}"
                                    ><i class="bx bx-menu me-1"></i>Status</a
                                  > 
                                  @if($role == 'Admin')
                                  <a class="dropdown-item" href="edit-bill/{{ $claim['id']}}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                  >
                                  @endif
                                  @if($role == 'Admin')
                                  <form action="{{ action('App\Http\Controllers\claimsController@destroy', $claim['id']) }} " method="post">
                                  @csrf
                                  @method('delete')
                                  <button class="dropdown-item">
                                    <i class="bx bx-trash me-1"></i> Delete
                                  </button>
                                  </form>
                                  @endif
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
          @endif
          @if ($role == 'User')
          <div class="container-xxl flex-grow-1 container-p-y">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b> / All Bills</span></h5>
            <div class="row custom-row">
              <div class="col-lg-2 mb-4">
                <div class="card">
                    <div class="card-body" style="padding:1rem">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src=<?= url('assets/img/icons/unicons/balance.png')?>
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <!--<div class="dropdown">-->
                            <!--  <button-->
                            <!--    class="btn p-0"-->
                            <!--    type="button"-->
                            <!--    id="cardOpt3"-->
                            <!--    data-bs-toggle="dropdown"-->
                            <!--    aria-haspopup="true"-->
                            <!--    aria-expanded="false"-->
                            <!--  >-->
                            <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                            <!--  </button>-->
                            <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">-->
                            <!--    <a class="dropdown-item" href="#">View details</a>-->
                            <!--  </div>-->
                            <!--</div>-->
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Balance</span>
                        <h5 class="card-title mb-2"><small>${{ number_format((float)$current_user_balance, 2, '.', ',') }}</small></h5>
                        <small class="fw-semibold">Entries </small><span class="badge bg-label-success me-1">{{$claims->count(); }}</span>
                    </div>
                </div>
              </div>

              {{-- <div class="col-lg-2 mb-4">
                <div class="card">
                    <a class="" href="">
                    <div class="card-body" style="padding:1rem">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src=<?= url('assets/img/icons/unicons/paid.png')?>
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <!--<div class="dropdown">-->
                            <!--  <button-->
                            <!--    class="btn p-0"-->
                            <!--    type="button"-->
                            <!--    id="cardOpt3"-->
                            <!--    data-bs-toggle="dropdown"-->
                            <!--    aria-haspopup="true"-->
                            <!--    aria-expanded="false"-->
                            <!--  >-->
                            <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                            <!--  </button>-->
                            <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">-->
                            <!--    <a class="dropdown-item" href="{{ url('/user-search-bill?search=processed') }}">View details</a>-->
                            <!--  </div>-->
                            <!--</div>-->
                        </div>
                        <span class="fw-semibold d-block mb-1">Total Bills</span>
                        <h5 class="card-title mb-2">{{ $claims->count(); }}</h5>
                        <small class="fw-semibold">Bills </small><span class="badge bg-label-primary me-1">{{ $claims->count(); }}</span>
                    </div></a>
                </div>
              </div> --}}

              <div class="col-lg-2 mb-4">
                <div class="card">
                    <div class="card-body" style="padding:1rem">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src=<?= url('assets/img/icons/unicons/pending.png')?>
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <!--<div class="dropdown">-->
                            <!--  <button-->
                            <!--    class="btn p-0"-->
                            <!--    type="button"-->
                            <!--    id="cardOpt3"-->
                            <!--    data-bs-toggle="dropdown"-->
                            <!--    aria-haspopup="true"-->
                            <!--    aria-expanded="false"-->
                            <!--  >-->
                            <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                            <!--  </button>-->
                            <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">-->
                            <!--    <a class="dropdown-item" href="{{ url('/user-search-bill?search=Pending') }}">View details</a>-->
                            <!--  </div>-->
                            <!--</div>-->
                        </div>
                        <span class="fw-semibold d-block mb-1">Pending Bills</span>
                        <h5 class="card-title mb-2"><small>${{ number_format((float)$claims->where('claim_status','Pending')->sum('claim_amount'), 2, '.', ','); }}</small></h5>
                        <small class="fw-semibold">Bills </small><span class="badge bg-label-info me-1">{{ $claims->where('claim_status','Pending')->count(); }}</span>
                    </div>
                </div>
              </div>

              <div class="col-lg-2 mb-4">
                <div class="card">
                    <div class="card-body" style="padding:1rem">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src=<?= url('assets/img/icons/unicons/approved.png')?>
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <!--<div class="dropdown">-->
                            <!--  <button-->
                            <!--    class="btn p-0"-->
                            <!--    type="button"-->
                            <!--    id="cardOpt3"-->
                            <!--    data-bs-toggle="dropdown"-->
                            <!--    aria-haspopup="true"-->
                            <!--    aria-expanded="false"-->
                            <!--  >-->
                            <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                            <!--  </button>-->
                            <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">-->
                            <!--    <a class="dropdown-item" href="{{ url('user-search-bill?search=Approved') }}">View details</a>-->
                            <!--  </div>-->
                            <!--</div>-->
                        </div>
                        <span class="fw-semibold d-block mb-1">Approved Bills </span>
                        <h5 class="card-title mb-2"><small>${{ number_format((float)$claims->where('claim_status','Approved')->sum('claim_amount') + $claims->where('claim_status','Partially approved')->sum('partial_amount'), 2, '.', ','); }}</small></h5>
                        <small class="fw-semibold">Bills </small><span class="badge bg-label-success me-1">{{ $claims->where('claim_status','Approved')->count()+$claims->where('claim_status','Partially approved')->count(); }}</span>
                    </div>
                </div>
              </div>

              <div class="col-lg-2 mb-4">
                <div class="card">
                    <div class="card-body" style="padding:1rem">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src=<?= url('assets/img/icons/unicons/refused.png')?>
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <!--<div class="dropdown">-->
                            <!--  <button-->
                            <!--    class="btn p-0"-->
                            <!--    type="button"-->
                            <!--    id="cardOpt3"-->
                            <!--    data-bs-toggle="dropdown"-->
                            <!--    aria-haspopup="true"-->
                            <!--    aria-expanded="false"-->
                            <!--  >-->
                            <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                            <!--  </button>-->
                            <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">-->
                            <!--    <a class="dropdown-item" href="{{ url('user-search-bill?search=Refused') }}">View details</a>-->
                            <!--  </div>-->
                            <!--</div>-->
                        </div>
                        <span class="fw-semibold d-block mb-1">Denied Bills</span>
                        <h5 class="card-title mb-2"><small>${{ number_format((float)$claims->where('claim_status','Refused')->sum('claim_amount'), 2, '.', ','); }}</small></h5>
                        <small class="fw-semibold">Bills </small><span class="badge bg-label-danger me-1">{{ $claims->where('claim_status','Refused')->count() }}</span>
                    </div>
                </div> 
              </div>

              <div class="col-lg-2 mb-4">
                <div class="card">
                    <div class="card-body" style="padding:1rem">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src=<?= url('assets/img/icons/unicons/transaction.png')?>
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <!--<div class="dropdown">-->
                            <!--  <button-->
                            <!--    class="btn p-0"-->
                            <!--    type="button"-->
                            <!--    id="cardOpt3"-->
                            <!--    data-bs-toggle="dropdown"-->
                            <!--    aria-haspopup="true"-->
                            <!--    aria-expanded="false"-->
                            <!--  >-->
                            <!--    <i class="bx bx-dots-vertical-rounded"></i>-->
                            <!--  </button>-->
                            <!--  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">-->
                            <!--    <a class="dropdown-item" href="{{ url('/claims') }}">View details</a>-->
                            <!--  </div>-->
                            <!--</div>-->
                        </div>
                        <span class="fw-semibold d-block mb-1">Bills Amount</span>
                        <h5 class="card-title mb-2"><small>${{ number_format((float)$claims->sum('claim_amount'), 2, '.', ','); }}</small></h5>
                        <small class="fw-semibold">Bills </small><span class="badge bg-label-success me-1">{{ $claims->count(); }}</span>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card ">
                  <h5 class="card-header"><b>Latest Bills</b></h5>
                  <div class="card-body">
                      <a  class="btn btn-primary print-btn btn-lg" href="/claims/create">Add Your Bills</a>
                    <div class="table-responsive text-nowrap overflow-auto pb-2 " style="margin-top:20px;">
                      <table class="table table-bordered dataTable " >
                        <thead>
                          <tr>
                            <th>tittle</th>
                            <th> Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Attachment</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($claims as $claim)
                          <tr>
                            <td style="width: 120px"><a href="claims/{{ $claim['id'] }}">Bill#{{ str_pad($claim['id'],2,"0",STR_PAD_LEFT) }}</a></td>
                            <td>{{  date('m/d/Y h:i A',strtotime($claim['created_at'])) }}</td>
                            <td><?php $name=App\Models\Category::find($claim['claim_category'])?>{{ $name->category_name }}</td>
                            <td>
                              <span class="badge
                              @if ($claim->claim_status == 'Approved') bg-label-success @endif
                              @if ($claim->claim_status == 'Partially approved') bg-label-primary @endif
                              @if ($claim->claim_status == 'Pending') bg-label-info @endif
                              @if ($claim->claim_status == 'Refused') bg-label-danger @endif
                              me-1">
                              @if ($claim->claim_status == 'Approved') {{ $claim['claim_status'] }} @endif
                              @if ($claim->claim_status == 'Partially approved') {{ $claim['claim_status'] }} @endif
                               @if ($claim->claim_status == 'Pending') {{ $claim['claim_status'] }} @endif
                               @if ($claim->claim_status == 'Refused') {{ $claim['claim_status'] }} @endif
                               </span>
                            </td>
                            <td>${{  number_format((float)$claim['claim_amount'], 2, '.', ',') }}</td>
                            <td>
                              <?php $document_type=pathinfo($claim->claim_bill_attachment);?>
                              <div class="card" style="width: 100px; ">
                                <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                  <a href="img/{{$claim->claim_bill_attachment}}" target="_blank">
                                    @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                     <img src="img/pdf_icon.png" alt="" class="img-thumbnail">
                                    @else
                                    <img src="img/{{$claim->claim_bill_attachment}}" alt=""   class="img-thumbnail"> </a>
                                    @endif
                                  </div>
                                </div>
                            </td>
                            <td>
                              <div class="dropdown">
                                <button
                                  type="button"
                                  class="btn p-0 dropdown-toggle hide-arrow"
                                  data-bs-toggle="dropdown"
                                >
                                  <i class="menu-icon tf-icons bx bx-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                 <a class="dropdown-item" href="{{url('claims/'.$claim['id'])}}"><i class="menu-icon tf-icons bx bx-copy-alt"></i>view</a>
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
          @endif
@else
<div class="container-xxl flex-grow-1 container-p-y">
    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span></h5>
    <div class="row">

            <div class="dropdown ">
                <button class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Apply for prepaid Card
                </button>

              </div>

    </div>
</div>

@endif
@endsection

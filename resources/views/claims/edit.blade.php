@extends("nav")
@section('title', 'Bill Status | SLC Trusts')
@section("wrapper")
<?php
    use App\Models\User;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    ?>
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/claims')}}" class="text-muted fw-light pointer"><b>All Bills</b></a> / <b>View Bill</b> </div>
        </h5>
        <div class="row">
            <div class="col-xl-3" >
            <form action="{{ action('App\Http\Controllers\claimsController@update', $claim->id) }} "
                method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">
                    <div class="d-flex">
                     <h5 class="col-md-11">Attachment</h5>
                     <a href="{{url('img/'.$claim->claim_bill_attachment)}}" download>
                      <i class="menu-icon tf-icons bx bx-download"></i>
                     </a>
                    </div>
                    </div>
                    <div class="card-body">
                        <!-- Profile picture image-->
                        <div class="card" >
                            <div class="card-body" style="padding: 0.5rem 0.5rem;margin-left:auto;margin-right:auto; " >
                                <?php $document_type=pathinfo($claim->claim_bill_attachment);?>
                                <a href="{{url('img/'.$claim->claim_bill_attachment)}}" target="_blank">
                                  @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                     <img src={{ url('img/pdf_icon.png')}} alt="" class="img-thumbnail" width="150px">
                                    @else
                                    <img src="{{url('img/'.$claim->claim_bill_attachment)}}" alt=""   class="img-thumbnail"> </a>
                                    @endif
                                  </a>
                              </div>
                            </div>
                        <!-- Profile picture help block-->
                        @if ($claim->recurred != "0")
                        <div class="col-lg-12 pt-3 text-center">
                       <b for="exampleFormControlInput1" >Bill Reference :  <a href="{{url('claims/'.$claim->recurred)}}"  style="color: #559e99"><strong><i class=" tf-icons bx bx-copy-alt"></i>Bill#{{$claim->recurred}}</strong></b></a>
                        </div>
                        @endif
                        @if ($claim->recurred == "0")
                        <div class="col-lg-12 pt-3 pb-2">
                          <b for="exampleFormControlInput1" class="form-label pt-2">Recurring Bill</b>
                          <input class="manual-check-ctrl" {{ $claim->recurring_bill==1 ? 'checked' : ' ' }}  value="{{ 1 }}" name="recurring_bill" type="checkbox"
                          @if ($claim->claim_status != 'Pending') disabled @endif  id="recurring_bill">
                      </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                  <div class="card-body">
                    @error('partial_amount')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      {{$message}}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                    @error('refusal_reason')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      {{$message}}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                    @error('recurring_day')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      {{$message}}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @enderror
                    <div style="display: flex">
                        <h4>Bill Info</h4>
                    <div class="col-lg-3 " style="margin-right: 1%;margin-left:auto">
                      @if ($role != "User")
                        <select id="bill_status" class="form-select  text-white @if ($claim->claim_status == 'Approved' || $claim->claim_status == 'Partially approved') bg-success @endif @if ($claim->claim_status == 'Pending')bg-primary  @endif @if ($claim->claim_status == 'Refused') bg-danger @endif" name="claim_status"
                                >
                            <option value="Pending" class="bg-light  text-black" @if ($claim->claim_status == 'Pending') class="bg-light" selected @endif disabled>
                                Pending
                            </option>
                            <option value="Approved" class="bg-light  text-black" @if ($claim->claim_status == 'Approved')  selected @endif>
                            Approved
                            </option>
                            <option value="Partial" class="bg-light  text-black" @if ($claim->claim_status == 'Partially approved') selected @endif>
                                Partially approved
                            </option>
                            <option value="Refused" class="bg-light  text-black" @if ($claim->claim_status == 'Refused') class="bg-light" selected @endif>
                                Refused
                            </option>
                        </select>
                        <span class="text-danger">@error('claim_status'){{$message}} @enderror</span>
                        @endif
                      </select>
                    </div>
                    @if ($role == "User")
                    <span class="bg @if ($claim->claim_status == "Approved" || $claim->claim_status == "Partially approved") bg-success @endif  @if ($claim->claim_status == "Refused") bg-danger @endif @if ($claim->claim_status == "Pending") bg-primary @endif text-white p-2 rounded" style="margin-right: 1%;margin-left:auto" >{{$claim->claim_status}}</span>
                    @endif
                </div>
                <hr>
                <div class="row refusal_div {{$claim->refusal_reason!=null ? '' : 'd-none'}} ">
                  <div class="col-sm-3 ">
                    <h6 class="mb-0"> <b>Reason of Refusal</b> </h6>
                  </div>
                  <div class="col-sm-9 text-secondary ">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="refusal_reason"
                                          rows="3"
                                          @if ($claim->claim_status == 'Approved' || $claim->claim_status=='Refused') readonly @endif  @if ($role == "User") readonly @endif>{{ $claim->refusal_reason }}</textarea>
                  </div>
                </div>
                <hr class="refusal_div {{$claim->refusal_reason!=null ? '' : 'd-none'}} ">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Bill # </h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        00{{$claim->id}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Customer</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        @foreach($users as $user)
                       @if ($user->id==$claim->claim_user)
                       {{$user->name.' '.$user->last_name}}
                       @endif
                        @endforeach
                        <input type="hidden" name="claim_user" value="{{$claim->claim_user}}">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0 pt-2">Amount</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        ${{number_format($claim->claim_amount,'2','.',',')}}
                        <input type="hidden" name="claim_amount" value="{{$claim->claim_amount}}" id="">
                      </div>
                    </div>
                    <hr>
                    <div class="row partial_div {{$claim->partial_amount!=null ? '' : 'd-none'}} ">
                      <div class="col-sm-3">
                        <h6 class="mb-0"><b>Partial Amount</b></h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <input  class="form-control" name="partial_amount" type="number" value="{{$claim->partial_amount}}"
                                @if ($claim->claim_status != 'Pending') disabled @endif    id="" >
                      </div>
                    </div>
                    <hr class="partial_div {{$claim->partial_amount!=null ? '' : 'd-none'}} ">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Submission Date</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{$claim->created_at->format('m/d/Y h:i A')}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Select category</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <select id="defaultSelect" class="form-select" name="claim_category"  @if ($role=="User") disabled @endif @if ($claim->claim_status != 'Pending') disabled @endif >
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @if ($claim->claim_category == $category->id) selected @endif>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">@error('claim_category'){{$message}} @enderror</span>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Due Date</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <input
                        type="date"
                        name="expense_date"
                        value="{{$claim->expense_date}}"
                        class="form-control"
                        @if ($role == "User") readonly @endif
                        @if ($claim->claim_status != 'Pending') disabled @endif
                         />
                         <span class="text-danger">@error('expense_date'){{$message}} @enderror</span>
                      </div>
                    </div>
                    <hr>
                    <div class="row recurring {{$claim->recurring_bill==1 ? '' : 'd-none'}}" >
                        <div class="col-sm-3">
                          <h6 class="mb-0">Recurring Day</h6>
                        </div>
                        <div class="col-sm-4 text-secondary">
                          <select class="form-control form-select" id="state" name="recurring_day" @if ($claim->claim_status != 'Pending') disabled @endif  >
                            <option value="1" @if ($claim->recurring_day == '1') selected @endif>1st of every Month </option>
                            <option value="3" @if ($claim->recurring_day == '3') selected @endif>3rd of every Month </option>
                            <option value="7" @if ($claim->recurring_day == '7') selected @endif>7th of every Month </option>
                            <option value="14" @if ($claim->recurring_day == '14') selected @endif>14th of every Month </option>
                            <option value="21" @if ($claim->recurring_day == '21') selected @endif>21st of every Month </option>
                            <option value="28" @if ($claim->recurring_day == '28') selected @endif>28th of every Month </option>
                          </select>
                        </div>
                      </div>
                      <hr class="recurring {{$claim->recurring_bill==1 ? '' : 'd-none'}}">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Bill Description</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="claim_description"
                            @if ($claim->claim_status != 'Pending') disabled @endif     rows="3"
                                      @if ($role == "User") readonly @endif>{{ $claim->claim_description }}</textarea>
                            <span class="text-danger">@error('claim_description'){{$message}} @enderror</span>
                        </div>
                      </div>
                    <div class="row pt-4" >
                      <div class="col-sm-12" >
                        @if ($role != "User")
                        <button class="btn btn-success @if ($claim->claim_status == 'Approved' || $claim->claim_status == 'Refused' || $claim->claim_status == 'Partially approved') d-none @endif">Update <i class="bx bx-edit"></i></button>
                        @endif
                        <a href="{{ url('/claims') }}" class="btn btn-info">Close <i class="bx bx-window-close"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
    </form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).on('click','#recurring_bill',function(){
    if($(this).is(':checked')){
       // if($('#bill_status').val()!='Partial'){
            $('.recurring').removeClass('d-none');
        // }else{
        //     swal.fire("warning!","Recurring bill cannot proceed with partially approved","warning");
        //     $(this).prop('checked',false);
        // }
    }else{
        $('.recurring').addClass('d-none');
    }
   })
   $(document).on('change','#bill_status',function(){
    var current_val = $(this).val();
    if($(this).val() == "Refused"){
        $('.refusal_div').removeClass('d-none');
    }else{
        $('.refusal_div').addClass('d-none');
    }
    if($(this).val() == 'Partial'){
        // if($('#recurring_bill').is(':checked')){
        //     swal.fire("warning!","Please remove bill from recurring to proceed with partially approved","warning");
        //     $(`#bill_Status option[value='Pending']`).prop('selected', true);
        // }else{
            $('.partial_div').removeClass('d-none');
       // }
    }else{
        $('.partial_div').addClass('d-none');
    }
   })
</script>

@extends("nav")
@section('title', 'Edit Bill | SLC Trust')
@section("wrapper")
<?php
    use App\Models\User;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    ?>
    <div class="">
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Edit Bill #{{ $claim->id}}
        </h5>
        <div class="row">
            <div class="col-xl-3" >
            <form id="update_bill" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$claim->id}}">
                <div class="card mt-2 mb-xl-0">
                    <div class="card-header">
                    <div class="d-flex">
                     <h5 class="col-md-11">Attachment</h5>
                     <a href="{{url('img/'.$claim->claim_bill_attachment)}}" download>
                      <i class="menu-icon tf-icons bx bx-download"></i>
                     </a>
                    </div>
                    </div>
                    <div class="card-body">
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
                            <input class="form-control mt-3" name="claim_bill_attachment" type="file"
                                       id="formFileMultiple">
                        @if ($claim->recurred != "0")
                        <div class="col-lg-12 pt-3 text-center">
                       <b for="exampleFormControlInput1" >Bill Reference :  <a href="{{url('claims/'.$claim->recurred)}}"  style="color: #559e99"><strong><i class=" tf-icons bx bx-copy-alt"></i>Bill#{{$claim->recurred}}</strong></b></a>
                        </div>
                        @endif
                        @if ($claim->recurred == "0")
                        <div class="col-lg-12 pt-3 pb-1">
                          <b for="exampleFormControlInput1" class="form-label pt-2">Recurring Bill</b>
                          <input class="manual-check-ctrl" {{ $claim->recurring_bill==1 ? 'checked' : ' ' }}  value="{{ 1 }}" name="recurring_bill" type="checkbox" 
                           id="recurring_bill">
                      </div>
                      <div class="col-lg-12 pt-2 pb-2 recurring">
                        <label for="exampleFormControlInput1" class="form-label">Billing Cycle*</label>
                        <select class="form-control select-2" name="recurring_day">
                          <option value="">Select</option>
                          @for ($i = 1; $i <= 28; $i++)
                              <option value="{{ $i }}" @if ($claim->recurring_day == $i) selected @endif>{{ $i }}{{ in_array($i % 100, [11, 12, 13]) ? 'th' : ($i % 10 == 1 ? 'st' : ($i % 10 == 2 ? 'nd' : ($i % 10 == 3 ? 'rd' : 'th'))) }} of every Month</option>
                          @endfor
                       </select>                      
                          <span class="text-danger">@error('recurring_day'){{$message}} @enderror</span>
                        </div>
                        @endif
                    </div>
                </div>               
            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                  <div class="card-body">
                    <div style="display: flex"> 
                        <h4>Edit Bill Information</h4>
                </div>
                <hr>
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
                      <div class="col-sm-4 text-secondary">
                        @foreach($users as $user)
                             @if($user->id==$claim->claim_user)
                            {{$user->name.' '.$user->last_name}}
                             @endif
                           @endforeach
                        <input type="hidden" name="claim_user" value="{{$claim->claim_user}}">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Amount</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <input type="text" name="claim_amount" class="form-control @if($claim->claim_status == "Approved") is-invalid border-0 @endif" value="{{$claim->claim_amount}}" @if($claim->claim_status == "Approved") readonly @endif>
                        @if($claim->claim_status == "Approved")<span class="invalid-feedback">You cannot edit the amount of approved bill.</span>@endif
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Payee Name</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <select name="payee_name" class="form-control select-2">
                          <option value="">Select Payee</option>
                          @foreach ($payees as $payee)
                              <option value="{{$payee->id}}" @if ($claim->payee_name == $payee->id) selected @endif>{{$payee->name}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Account Number</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <input type="text" name="account_number" class="form-control" value="{{$claim->account_number}}">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Submission Date</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <input type="date" name="claim_date" class="form-control"  value="<?php echo date('Y-m-d', strtotime($claim->created_at)); ?>" readonly>
                        {{-- {{$claim->created_at->format('m/d/Y h:i A')}} --}}
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Select category</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <select id="defaultSelect" class="form-select" name="claim_category"  @if ($role=="User") readonly @endif @if ($claim->claim_status != 'Pending') readonly @endif >
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
                          <h6 class="mb-0">Bill Description</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="claim_description" rows="3">{{ $claim->claim_description }}</textarea>
                            <span class="text-danger">@error('claim_description'){{$message}} @enderror</span>
                        </div>
                      </div>
                    <div class="row pt-4" >
                      <div class="col-sm-12" >
                        @if ($role != "User")
                        <button class="btn btn-primary update-bill-button "><i class="bx bx-edit"></i>Update </button>
                        @endif
                        <a href="{{ url('/claims') }}" class="btn btn-secondary"><i class="bx bx-window-close"></i>Close </a>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
    </form>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // $('.recurring').addClass('d-none', $('#recurring_bill').prop('checked'));
    $(document).on('click', '#recurring_bill', function() {
         $('.recurring').toggleClass('d-none', !$(this).is(':checked'));
    })
});
$(document).on('submit','#update_bill',function(e){
  e.preventDefault();
  var id = $('#id').val();
  $('.form-control').removeClass('is-invalid');
  $('.invalid-feedback.is-invalid').remove();
  $('.update-bill-button').attr('disabled',true);
  $.ajax({
    type : "POST",
    url  : "{{route('store.edit.bill')}}",
    data : new FormData(this),
    dataType : "JSON",
    contentType : false,
    processData : false,
    cache : false,
    success:function(data){ 
          console.log(data.message);
          swal.fire(data.header,data.message,data.type);
          $('.claim-submit').text('Submit');
          $('.update-bill-button').attr('disabled',false);
          if(data.type == 'success'){
                window.location.reload();
            }
      },
      error:function(xhr){
          erroralert(xhr);
          $('.claim-submit').attr('disabled',false);
          $('.update-bill-button').attr('disabled',false);
          $('.claim-submit').text('Submit');
      }
  })
})
</script>
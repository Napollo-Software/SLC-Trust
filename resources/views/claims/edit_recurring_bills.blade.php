@extends("nav")
@section('title', ' Recurring Bill Senior Life Care Trusts')
@section("wrapper")
<style>
.scrollable-container {
    max-height: 38vh;
    overflow-y: scroll;
}
</style>
<?php
    use App\Models\User;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    ?>
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/claim/recurring')}}" class="text-muted fw-light pointer"><b>All Recurring Bills</b></a> / <b>View Bill</b> </div>
        </h5>
        </h5>
        <div class="row">
            <div class="col-xl-3" >
            <form id="update_bill" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$claim->id}}">
                <div class="card mb-xl-0">
                    <div class="card-header pb-0">
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
                            {{-- <input class="form-control mt-3" name="claim_bill_attachment" type="file"
                                       id="formFileMultiple"> --}}
                        @if ($claim->recurred != "0")
                        <div class="col-lg-12 pt-3 text-center">
                       <b for="exampleFormControlInput1" >Bill Reference :  <a href="{{url('claims/'.$claim->recurred)}}"  style="color: #559e99"><strong><i class=" tf-icons bx bx-copy-alt"></i>Bill#{{$claim->recurred}}</strong></b></a>
                        </div>
                        @endif
                        @if ($claim->recurred == "0")
                        <div class="col-lg-12 pt-0 pb-2">
                          <b for="exampleFormControlInput1" class="form-label pt-2">Recurring Bill</b>
                          <input class="manual-check-ctrl" {{ $claim->recurring_bill==1 ? 'checked' : ' ' }}  value="{{ 1 }}" name="recurring_bill" type="checkbox"
                           id="recurring_bill" disabled>
                           <div class="col-lg-12 p-0 recurring">
                            <label for="exampleFormControlInput1" class="form-label">Billing Cycle*</label>
                            <select class="form-control select-2" name="recurring_day">
                              <option value="">Select</option>
                              @for ($i = 1; $i <= 28; $i++)
                                  <option value="{{ $i }}" @if ($claim->recurring_day == $i) selected @endif>{{ $i }}{{ in_array($i % 100, [11, 12, 13]) ? 'th' : ($i % 10 == 1 ? 'st' : ($i % 10 == 2 ? 'nd' : ($i % 10 == 3 ? 'rd' : 'th'))) }} of every Month</option>
                              @endfor
                           </select>
                              <span class="text-danger">@error('recurring_day'){{$message}} @enderror</span>
                            </div>
                      </div>
                        @endif
                    </div>
                </div>
                <div class="card mt-2">
                  <div class="card-header pb-0">
                    <h5 class="col-md-11">Recurring Bills</h5>
                  </div>
                  <div class="card-body scrollable-container">
                    <div class="table-responsive">
                      <table class="table align-middle mb-0 table-hover">
                        <thead class="table-light">
                          <tr>
                            <th>Bill ID</th>
                            <th>Created at</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($claim->secondary_bills() as $item)
                          <tr class="">
                            <td><a href="/claims/{{ $item['id'] }}">Bill#{{ $item->id }}</a></td>
                            <td>{{ $item->created_at->format('m-d-Y h:i A') }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                  </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-3">
                  <div class="card-header d-flex justify-content-between pb-0">
                  <h5>Bill Information</h5>
                  <a class="btn btn-primary mb-1 text-white" data-toggle="modal" data-target="#generate_recurring_bill"><i class="bx bx-analyse pb-1"></i>Generate Manually</a>
                  </div>
                  <div class="card-body">
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
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Amount</h6>
                      </div>
                      <div class="col-sm-4 text-secondary">
                        <input type="text" name="claim_amount" class="form-control" value="{{$claim->claim_amount}}">
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
                        <input type="date" class="form-control" name="created_at" value="{{$claim->created_at->format('Y-m-d')}}" readonly>
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
                        <button class="btn btn-primary update-bill-button"><i class="bx bx-edit pb-1"></i>Update </button>
                        <a href="{{ url('/claims') }}" class="btn btn-secondary"><i class="bx bx-window-close pb-1"></i>Close </a>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
    </form>
    <div class="modal fade" id="generate_recurring_bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="generate_recurring_from">
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Recurring Date</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="id" value="{{ $claim->id }}">
           <input type="date" class="form-control" name="date">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="bx bx-save pb-1"></i>Create Bill</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="bx bx-window-close pb-1"></i>Close</button>
          </div>
          </form>
        </div>
      </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).on('submit','#generate_recurring_from',function(e){
  e.preventDefault();
  $('.form-control').removeClass('is-invalid');
  $('.invalid-feedback.is-invalid').remove();
  $.ajax({
      url: "{{ route('duplicate.bill') }}",
      type: "post",
      data: new FormData(this),
      dataType: 'JSON',
      processData: false,
        contentType: false,
        cache: false,
      success:function(data){
        if(data.success == true){
          swal.fire('Success',data.message, 'success');
          $('.close').trigger('click');
          window.location.reload();
        }
        if(data.success == false){
          swal.fire('Error',data.message, 'error');
        }
      },
      error:function(xhr){
        erroralert(xhr);
      }
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
    url  : "{{route('store_edited_recurring_bill')}}",
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

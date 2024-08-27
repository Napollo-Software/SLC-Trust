@extends("nav")
@section('title', 'Add Balance | SLC Trust') 
@section("wrapper")
<style type="text/css">
#hidden_div {
    display: none;
} 
#hidden_div2 {
    display: none;
} 
.search-nav{
  padding-bottom: 5%;
}
</style>          
          <div class="">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Customer Deposit / {{$user['name']}}</h5>
            <div class="row">
              <div class="col-lg-12 mb-10">
                <div class="card">
                  <h5 class="card-header"><b>Customer Deposit Form</b></h5>
                  <form id="formAuthentication" class="mb-3" action="{{route('add_user_balance', $user['id'] )}}" method="get">
                    @method('post')                     
                    @csrf
                    <div class="card-body">
                      @error('insufficient')
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        {{$message}}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>                         
                      @enderror
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{Session::get('success')}}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-fail alert-dismissible" role="alert">
                        {{Session::get('fail')}}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                    @endif                       
                      <div class="row mb-3">
                      <div class="row mb-3">
                        <div class="col-lg-6 mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Add Balance</label>
                          <input
                            type="number"
                            class="form-control"
                            placeholder="$"
                            name="balance"
                            step="any"
                            required
                          />
                        @error('balance')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror                         
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Maintenance Fee</label>
                          <input
                            type="number"
                            class="form-control"
                            placeholder="$"
                            name="maintenance_fee"
                            step="any"
                            required
                          />
                        @error('balance')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror                         
                        </div>
                        
                        
                        <div class="col-lg-6 pt-2 ">
                          <label for="exampleFormControlInput1" class="form-label">Charge one-time Registration Fee </label>
                          <input class="manual-check-ctrl" name="registration_fee" type="checkbox" value="1"
                            @if ($user['registration_fee']=='1') disabled @endif     id="">
                      </div> 
                      <div class="col-lg-6 pt-2 pb-2 d-none registration-div">
                        <label for="exampleFormControlInput1" class="form-label">Registration Fee Amount</label>
                        <input class="form-control registration_fee_amount" name="registration_fee_amount" type="text" >
                       </div> 
                       <div class="col-lg-6 pb-2">
                        <label for="exampleFormControlInput1" class="form-label">Payment Type</label>
                        <select class="form-control form-select" name="payment_type" onchange="showDiv2('hidden_div', this)" required>
                         <option value="">Select Type</option>
                          <option value="ACH">ACH</option>
                          <option value="Card">Card</option>
                          <option value="Cheque Payment">Cheque Payment</option>
                        </select>  
                        @error('payment_type')
                        <span class="text-danger"> {{$message}} </span>
                        @enderror                   
                      </div>
                          <div class="col-lg-6">
                            <label for="exampleFormControlInput1" class="form-label">Date of Transaction</label>
                            <input
                              type="date"
                              class="form-control"
                              placeholder="Date of Transaction"
                              name="date_of_trans"
                              required
                            /> 
                            @error('date_of_trans')
                          <span class="text-danger"> {{$message}} </span>
                          @enderror 
                          </div>
                          <div class="col-lg-6" id="hidden_div">
                            <label for="exampleFormControlInput1" class="form-label">Transaction No.#</label>
                            <input
                              type="text"
                              class="form-control mb-3 trans-no"
                              placeholder="Transaction No."
                              name="trans_no"
                              required
                            /> 
                          </div> 
                          <div class="col-lg-6" id="hidden_div2">
                            <label for="exampleFormControlInput1" class="form-label">Cheque No.#</label>
                            <input
                              type="text"
                              class="form-control mb-3 cheque-no"
                              placeholder="Cheque No."
                              name="cheque_no"
                            /> 
                          </div>   
                          <div class="col-lg-6" id="hidden_div3">
                            <label for="exampleFormControlInput1" class="form-label">Card No.#</label>
                            <input
                              type="text"
                              class="form-control mb-3 card-no"
                              placeholder="Card No"
                              name="card_no"
                            /> 
                          </div>                                                                                                                       
                      </div>
                        <div class="row">
                                                    
                        </div>                                                                                       
                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <button class="btn btn-primary add-balance">Add Balance</button>
                        </div>
                      </div>                                            
                    </div>
                  </form>                    
                </div>              
              </div>
            </div>
          </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript">
$(document).on('submit','form',function(){
  // $('.add-balance').attr('disabled',true);
})
$(document).on('click','.manual-check-ctrl',function(){
  if($('.manual-check-ctrl').is(':checked')){
    $('.registration-div').removeClass('d-none');
    $('.registration_fee_amount').prop('required',true);
  }else{
    $('.registration-div').addClass('d-none');
    $('.registration_fee_amount').prop('required',false);
  }
})
function showDiv2(divId, element)
{
  if(element.value == 'ACH'){
    $('.trans-no').attr('required',true);
    $('.cheque-no').attr('required',false);
    $('.card-no').attr('required',false);
    document.getElementById("hidden_div").style.display = element.value == 'ACH' ? 'block' : 'none';
    document.getElementById("hidden_div2").style.display = element.value == 'Cheque Payment' ? 'block' : 'none';
    document.getElementById("hidden_div3").style.display = element.value == 'Card' ? 'block' : 'none';
  }
  if(element.value == 'Cheque Payment'){
    $('.trans-no').attr('required',false);
    $('.cheque-no').attr('required',true);
    $('.card-no').attr('required',false);
    document.getElementById("hidden_div").style.display = element.value == 'ACH' ? 'block' : 'none';
    document.getElementById("hidden_div2").style.display = element.value == 'Cheque Payment' ? 'block' : 'none';
    document.getElementById("hidden_div3").style.display = element.value == 'Card' ? 'block' : 'none';
  }
  if(element.value == 'Card'){
    $('.trans-no').attr('required',false);
    $('.cheque-no').attr('required',false);
    $('.card-no').attr('required',true);
    document.getElementById("hidden_div").style.display = element.value == 'ACH' ? 'block' : 'none';
    document.getElementById("hidden_div2").style.display = element.value == 'Cheque Payment' ? 'block' : 'none';
    document.getElementById("hidden_div3").style.display = element.value == 'Card' ? 'block' : 'none';
  }
}
</script>          
@endsection 
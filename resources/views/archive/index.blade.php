@extends("nav")
@section('title', 'Archive | Senior Life Care Trusts')
@section("wrapper")
          <div class="">
            <div class="">
              <div class="col-md-12">
                <div  style="display:flex">
                  <div> <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Archive Transactions</b></span></h5></div>
                </div>
              </div>
          <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
              <div class="card radius-10">
                  <div class="card-body">
                      <div class="d-flex align-items-center">
                          <div>
                              <p class="mb-0 text-secondary">Enrollment and Fees (9036)</p>
                              <h4 class="my-1">${{number_format("52399.93",'2','.',',')}}</h4>
                              <p class="mb-0 font-13 text-success"><i class="bx bxs-up-arrow align-middle"></i>8016</p>
                          </div>
                          <div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-book-bookmark"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card radius-10">
                  <div class="card-body">
                      <div class="d-flex align-items-center">
                          <div>
                              <p class="mb-0 text-secondary">Trusted Surplus (4460)</p>
                              <h4 class="my-1">${{number_format("475836.63",'2','.',',')}}</h4>
                              <p class="mb-0 font-13 text-success"><i class='bx bxs-up-arrow align-middle'></i>23,954</p>
                          </div>
                          <div class="widgets-icons bg-light-info text-info ms-auto"><i class='bx bxs-book'></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card radius-10">
                  <div class="card-body">
                      <div class="d-flex align-items-center">
                          <div>
                              <p class="mb-0 text-secondary">Deposits</p>
                              <h4 class="my-1">${{number_format($stats->sum('deposit'),2,'.',',')}}</h4>
                              <p class="mb-0 font-13 text-danger"><i class='bx bxs-up-arrow align-middle'></i>{{$stats->where('deposit','!=',null)->count()}}</p>
                          </div>
                          <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bxs-book-content'></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col">
              <div class="card radius-10">
                  <div class="card-body">
                      <div class="d-flex align-items-center">
                          <div>
                              <p class="mb-0 text-secondary">Payments</p>
                              <h4 class="my-1">${{number_format($stats->sum('payment'),2,'.',',')}}</h4>
                              <p class="mb-0 font-13 text-danger"><i class='bx bxs-up-arrow align-middle'></i>{{$stats->where('deposit','!=',null)->count()}}</p>
                          </div>
                          <div class="widgets-icons bg-light-warning text-warning ms-auto"><i class='bx bx-line-chart-down'></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
				</div>
                <div class="card radius-10">
                  <div class="d-flex align-items-center p-3">
                    <div>
                      <h5 class="mb-1">Archive Transaction</h5>
                      <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>All Archive Transactions</p>
                    </div>
                  </div>
                    <div class="card-body pt-0">
                      <div class="table-responsive text-nowrap overflow-auto pb-2 " >
                        <table class="table align-middle mb-0 table-hover dataTable " >
                          <thead class="table-light">
                            <tr style="white-space: nowrap">
                              {{-- <th style="width: 10%">Transaction ID</th> --}}
                              <th style="width: 10%">Date & Time</th>
                              <th style="width: 10%">Matter</th>
                              <th style="width: 20%">Payee</th>
                              <th style="width: 20%">Description</th>
                              <th>Account</th>
                              <th>Split Account</th>
                              <th style="width: 10%">Deposit</th>
                              <th style="width: 10%">Payment</th>
                              <th style="width: 10%">Balance</th>
                            </tr>
                          </thead>
                          <tbody class="archive-body">
                            @foreach ($data as $item)
                           <tr>
                            {{-- <td>TID#{{substr("000$item->id",1)}}</td> --}}
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->matter}}</td>
                            <td>{{$item->payee}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->account}}</td>
                            <td>{{$item->split_account}}</td>
                            <td>${{number_format($item->deposit,'2','.',',')}}</td>
                            <td>${{number_format($item->payment,'2','.',',')}}</td>
                            <td>${{number_format($item->balance,'2','.',',')}}</td>
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
        </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script>
  $(document).on('submit','#search',function(e){
    e.preventDefault();
    var search_text = $('.search-text').val();
    $.ajax({
      type : "POST",
      url  : "{{route('archive')}}",
      data : new FormData(this),
      dataType:'JSON',
      processData: false,
      contentType: false,
      cache: false,
      success:function(data){
        var html;
        console.log(data);
        for(i = 0 ; i < data.length ; i++ ){
          if(data[i].account==null){
            var account='';
          }else{
            var account=data[i].account;
          }
          if(data[i].split_account==null){
            var split_account='';
          }else{
            var split_account=data[i].split_account;
          }
          if(data[i].payment==null){
            var payment='0.00';
          }else{
            var payment=data[i].payment;
          }
          if(data[i].deposit==null){
            var deposit='0.00';
          }else{
            var deposit=data[i].deposit;
          }
          html += "<tr><td>"+data[i].created_at+"</td><td>"+data[i].matter+"</td><td>"+data[i].payee+"</td><td>"+data[i].description+"</td><td>"+account+"</td><td>"+split_account+"</td><td>$"+deposit+"</td><td>$"+payment+"</td><td>$"+data[i].balance+"</td></tr>";
        }

        var dataTable = $('.dataTable').DataTable();
        dataTable.clear().draw();
        // $.each(data, function(index, value) {
        //              console.log(value.created_at);
        //              html += "<tr><td>"+value.created_at+"</td><td>"+value.matter+"</td><td>"+value.payee+"</td><td>"+value.description+"</td><td>"+value.account+"</td><td>"+value.split_account+"</td><td>"+value.deposit+"</td><td>"+value.paymet+"</td><td>"+value.balance+"</td></tr>";

        //       });
              $('.archive-body').html(html);
      },
      error:function(xhr){

      }
  })
  })
</script>
<script>
$(document).ready(function() {
  $('.dataTable').DataTable( {
    aLengthMenu: [
        [25, 50, 100, 250],
        [25, 50, 100, 250]
    ],
    //  "order": false // "0" means First column and "desc" is order type;
        } );
  } );
</script>

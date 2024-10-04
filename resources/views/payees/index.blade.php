@extends("nav")
@section('title', 'Payee | SLC Trusts')
@section("wrapper")
    <?php
        $user = \App\Models\User::find(Session::get('loginId'))
    ?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Payee</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="payee_form">
            @csrf
        <div class="modal-body">
        <div class="row">
         <div class="col-md-6 p-2">
            <label for="form-label">Name*</label>
            <input type="text" name="name" class="form-control" placeholder="Type name here" required>
         </div>
         <div class="col-md-6 p-2">
            <label for="form-label">Address 1*</label>
            <input type="text" name="address1" class="form-control" placeholder="Type address 1 name here" required>
         </div>
         <div class="col-md-6 p-2">
            <label for="form-label">Address 2</label>
            <input type="text" name="address2" class="form-control" placeholder="Type address 2 name here" >
         </div>
         <div class="col-md-6 p-2">
            <label for="form-label">City *</label>
            <input type="text" name="city" class="form-control" placeholder="Type city name here" required>
         </div>
         <div class="col-md-6 p-2">
            <label for="form-label">State</label>
            <input type="text" name="state" class="form-control" placeholder="Type state name here" required>
         </div>
         <div class="col-md-6 p-2">
            <label for="form-label">Zipcode</label>
            <input type="text" name="zip_code" class="form-control" placeholder="Type zip code here" >
         </div>
        </div>
    </div>
        <div class="modal-footer ">
          <button type="submit" class="btn btn-primary mb-3">Submit</button>
          <button type="button" class="btn btn-secondary mb-3" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Manage Payee</b> </div>
    </h5>
<div class="row">
    <div class="col-lg-12 mb-12">
      <div class="card ">
        <div class="d-flex align-items-center p-3 mb-0">
          <div>
              <h5 class="mb-1">Payee List</h5>
              <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Manage Payees</p>
          </div>
          <div class=" ms-auto">
            <a data-toggle="modal" class="btn btn-primary print-btn pb-1 pt-1" href="#exampleModal">Add Payee</a>
          </div>
      </div>
        <div class="card-body p-3" style="margin-top: -15px">
            <div class="" >
            <table class="table align-middle mb-0 table-hover dataTable" id="dataTable" >
              <thead class="table-light">
                <tr>
                  <th><strong>Name</strong></th>
                  <th><strong>Address 1</strong></th>
                  <th><strong>Address 2</strong></th>
                  <th><strong>City </strong></th>
                  <th><strong>State</strong></th>
                  <th><strong>Zip Code</strong></th>
                  {{-- <th><strong>Actions </strong></th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach ($payees as $payee)
                    <tr>
                        <td>{{$payee->name}}</td>
                        <td>{{$payee->address1}}</td>
                        <td>{{$payee->address2}}</td>
                        <td>{{$payee->city}}</td>
                        <td>{{$payee->state}}</td>
                        <td>{{$payee->zip_code}}</td>
                        {{-- <td><button class="btn btn-primary"><i class="bx bx-trash"></i></button></td> --}}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>

    $(document).on('submit','#payee_form',function(e){
      e.preventDefault();
      $.ajax({
        'url' : "{{route('store.payee')}}",
        'method': "POST",
        'data': new FormData(this),
        processData: false,
        contentType : false,
        cache : false,
        success : function(data){
          $("#exampleModal").removeClass("in");
          $("#exampleModal").hide();
          swal.fire('success','Payee has been created successfully','success');
          window.location.reload();
        }
      })
    })
    $(document).ready(function() {
      $('.dataTable').DataTable( {
        aLengthMenu: [
            [25, 50, 100, -1],
            [25, 50, 100, "All"]
        ],
        "order": false
         // "0" means First column and "desc" is order type;
            } );
      } );
    </script>
@endsection

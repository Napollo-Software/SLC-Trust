@extends("nav")
@section('title', 'Dropbox | SLC Trust')
@section("wrapper")
<style>
   /* .paginate_button  {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.dataTables_paginate   a.current {
  background-color: #2ecfde;
  color: white;
  border: 1px solid #2ecfde;
} */

</style>
<div class="modal fade no-print" id="customerdposit" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title mt-1" id="customerdpositLabel">Dropbox</h5>
          <button type="button" class="close btn-secondary rounded" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('upload.bills')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
                <label class="form-label ">Upload Bill <br><small>(You can either Upload 1 or multiple bills)</small> </label>
                <input type="file" class="form-control" name="file[]"  multiple required accept="application/pdf,image/jpeg,image/png">
            </div>
         </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary preview" >Upload</button>
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
         <div class="">
                <div class="d-flex justify-content-between no-print">
                    <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dropbox</b></span></h5>

                </div>
                <div class="card ">
                <div class="card-body overflow-auto" >
                    <div class="d-flex align-items-center mb-2">
                        <div>
                            <h5 class="mb-1">Drop Box</h5>
                            <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar pb-2'></i>Overall follow-ups</p>
                        </div>

                        <div class="font-22 ms-auto">
                            <button class="btn btn-primary import-file-user-data TypeAddBtn print-btn px-2 py-1 "  data-toggle="modal" data-target="#customerdposit">
                                <i class='menu-icon pb-1 tf-icons bx bx-file  pt-1 px-0 mx-0' ></i>
                                Upload bills
                            </button>
                        </div>

                    </div>
                  <table class="table table-bordered dataTable" >
                    <thead>
                      <tr>
                        <th style="width:40%">Bill ID</th>
                        <th>Bill Details</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($dropbox as $item)
                            <tr>
                              <td>Bill # {{substr("000{$item->id}",1)}}</td>
                              <td>
                                <?php $document_type=pathinfo($item->file);?>
                                <div class="card col-md-2">
                                  <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                    <a href="dropbox/{{$item->file}}" target="_blank">
                                      @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                       <img src="img/pdf_icon.png" alt="" class="img-thumbnail">
                                      @else
                                      <img src="dropbox/{{$item->file}}" alt=""   class="img-thumbnail">
                                      @endif
                                    </a>
                                  </div>
                                  <div class="card-footer p-2">
                                    <a href="dropbox/{{$item->file}}" download><i class="bx bx-download text-primary"><small> Download</small></i></a>
                                  </div>
                                </div>
                             </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
$(document).ready(function() {
  $('.dataTable').DataTable( {
    aLengthMenu: [
        [25, 50, 100, -1],
        [25, 50, 100, "All"]
    ],
     "order": false // "0" means First column and "desc" is order type;
        } );
  } );
</script>

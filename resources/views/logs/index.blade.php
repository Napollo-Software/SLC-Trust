@extends('nav')
@section('title', 'Logs List | SLC Trust')
<style>
.word-wrap {
  width: 400px;
}
</style>
@section('wrapper')
    <div class="">
        <h5 class=" d-flex justify-content-between pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Manage Logs</b> </div>
        </h5>
        <div class="row ">
            <div class="col-lg-12 mb-12">
                <div class="card d-flex">
                    <div class="d-flex align-items-center p-2 mb-0 ml-2">
                        <div>
                            <h5 class="mb-1">Log Details</h5>
                            <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall Logs</p>
                        </div>
                        <div class="ms-auto">
                        </div>
                    </div>
                    <div class="card-body pt-1">
                        <div class="">
                            <table class="table align-middle mb-0 table-hover dataTable">
                                <thead>
                                    <tr class="table-light">
                                        <th>Date&Time</th>
                                        <th>Created by</th>
                                        <th>Created against</th>
                                        <th>Event Type</th>
                                        <th style="width:40%">Event Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->created_at->format('m-d-Y h:i A') }}</td>
                                        <td>
                                            {{ isset($item->action_performed_by) ? $item->action_performed_by->name . ' ' . $item->action_performed_by->last_name : 'N/A' }}
                                        </td>

                                        <td>
                                            {{ isset($item->action_performed_against) ? $item->action_performed_against->name . ' ' . $item->action_performed_against->last_name : 'N/A' }}
                                        </td>
                                        <td>{{ $item->type }}</td>
                                        <td><p class="word-wrap">{{ $item->description }}</p></td>
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

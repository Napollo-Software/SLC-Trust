@extends('nav')
@section('title', 'Recurring bills | Intrustpit')
@section('wrapper')
    <style>
        /* .custom-row {
            justify-content: space-between;
        }

        .custom-row>.mb-4 {
            width: 20% !important;
        }

        .custom-nav-margin {
            margin-top: -15px;
        } */
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        $(document).on('click', '.recurring-action', function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            Swal.fire({
                title: 'Warning!',
                text: "Are you sure ,You want to remove bill#" + id + " from recurring",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'info',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ url('claim/remove-from-recurring') }}',
                        type: 'post',
                        data: {
                            id: id
                        },
                        success: function() {
                            // $('.recurring-action').attr('disabled',true);
                            swal.fire('success', 'Bill # ' + id +
                                ' has been removed from recurring!', 'success');
                            $('.row-' + id).addClass('d-none');
                            // window.location.reload();
                        },
                        error: function() {

                        }
                    })
                }
            })
        })
        $(document).on('click', '.duplicate-bill', function(e) {
            e.preventDefault();
            $('.bill-id').val($(this).attr('data-id'));
            $('.bill-id-text').text($(this).attr('data-id'));

        })
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
          $(this).trigger('reset');
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
        $(document).ready(function() {
            $('.dataTable').DataTable({
                aLengthMenu: [
                    [25, 50, 100, -1],
                    [25, 50, 100, "All"]
                ],
                "order": false // "0" means First column and "desc" is order type;
            });
        });
    </script>
    <?php
    use App\Models\Claim;
    use App\Models\User;
    use Carbon\Carbon;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    $billing_method = User::where('id', '=', Session::get('loginId'))->value('billing_method');
    $current_user_name = User::where('id', '=', Session::get('loginId'))->value('name');
    $current_user_balance = User::where('id', '=', Session::get('loginId'))->value('user_balance');
    $all_users = User::where('role', 'User')->get();
    $users = User::find(Session::get('loginId'));
    ?>
    @if ($billing_method == 'manual')
        @if ($role != 'User')
            <style>
                .text-nowrap {
                    white-space: nowrap !important;
                    margin-top: 26px;
                }
            </style>
            <div class="modal fade" id="generate_recurring_bill" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="generate_recurring_from">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select Recurring Date of Bill# <span class="bill-id-text"></span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" class="bill-id">
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><i class="bx bx-save pb-1"></i>Create
                                    Bill</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                        class="bx bx-window-close pb-1"></i>Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="">
                <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b>/ Recurring bills</span></h5>
                <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="card">
                            <div class="d-flex align-items-center p-3">
                                <div>
                                    <h5 class="mb-1">Recurring Bills</h5>
                                    <p class="mb-0 font-13 text-secondary"><i class="bx bxs-calendar"></i>All Recurring
                                        Bills</p>
                                </div>
                            </div>
                            <div class="card-body p-3" style="margin-top: -45px">
                                <div class="dropdown download-btn">
                                    {{-- <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Download Bills
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" target="blank" href="{{ route('printpage') }}">PDF Format</a>
                          <a class="dropdown-item" target="blank" href="{{ route('printpage') }}">Excel/CSV Format</a>
                        </div> --}}
                                </div> 
                                <div class="table-responsive text-nowrap overflow-auto pb-2">
                                    <table class="table align-middle mb-0 table-hover dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th>title</th>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                                {{-- <th>Attachment</th> --}}
                                                <th>Recurring</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($claims as $claim)
                                                <tr class="row-{{ $claim['id'] }}">
                                                    <td style="width: 120px"><a
                                                            href={{ url('edit-recurring-bill/' . $claim['id']) }}>Bill#{{ str_pad($claim['id'], 2, '0', STR_PAD_LEFT) }}</a>
                                                    </td>
                                                    <td style="width: 150px">
                                                        {{ $claim->user_details->full_name() }}
                                                    </td>
                                                    <td>{{ date('m/d/Y h:i A', strtotime($claim['created_at'])) }}</td>
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
                                                    <td>${{ number_format((float) $claim['claim_amount'], 2, '.', ',') }}
                                                    </td>
                                                    {{-- <td>
                              <?php $document_type = pathinfo($claim->claim_bill_attachment); ?>
                              <div class="card" style="width: 100px; ">
                                <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                  <a href="{{url("img/".$claim->claim_bill_attachment)}}" target="_blank">
                                    @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                     <img src={{url("img/pdf_icon.png")}} alt="" class="img-thumbnail">
                                    @else
                                    <img src="{{url("img/".$claim->claim_bill_attachment)}}" alt=""   class="img-thumbnail"> </a>
                                    @endif
                                  </div>
                                </div>
                            </td> --}}
                                                    <td class="text-center">
                                                        {{-- @if ($users->hasPermissionTo('Recurring Edit') || $users->hasPermissionTo('Recurring Remove')) --}}
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="menu-icon tf-icons bx bx-cog"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a href="#" data-toggle="modal" class="dropdown-item duplicate-bill" data-target="#generate_recurring_bill" data-id="{{ $claim['id'] }}"><i
                                                                            class="bx bx-duplicate"></i> Duplicate</a>
                                                                    {{-- @if ($users->hasPermissionTo('Recurring Edit')) --}}
                                                                        <a class="dropdown-item"
                                                                            href="<?= url('edit-recurring-bill/' . $claim['id']) ?>">
                                                                            <i class="bx bx-edit "></i> Edit
                                                                        </a>
                                                                    {{-- @endif --}}
                                                                    <form action="{{ url('claim/remove-from-recurring') }}"
                                                                        id="recurring_form" method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                            id="recurring_id" value="{{ $claim['id'] }}">
                                                                        {{-- @if ($users->hasPermissionTo('Recurring Remove')) --}}
                                                                            <button class="dropdown-item recurring-action"
                                                                                data-id="{{ $claim['id'] }}">
                                                                                <i class="bx bx-trash "></i> Remove
                                                                            </button>
                                                                        {{-- @endif --}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        {{-- @endif --}}
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
                <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b> / Search</span></h5>
                <div class="row">
                    <div class="col-lg-12 mb-12">
                        <div class="card ">
                            <h5 class="card-header"><b>Search Results</b></h5>
                            <div class="card-body overflow-auto">
                                <div class="table-responsive text-nowrap" style="margin-top:20px;">
                                    <table class="table table-bordered dataTable">
                                        <thead>
                                            <tr>
                                                <th> tittle</th>
                                                <th> Date</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                                <th>User</th>
                                                <th>Attachment</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($claims as $claim)
                                                <tr>
                                                    <td style="width: 120px"><a
                                                            href="claims/{{ $claim['id'] }}">Bill#{{ str_pad($claim['id'], 2, '0', STR_PAD_LEFT) }}</a>
                                                    </td>
                                                    <td>{{ date('m/d/Y h:i A', strtotime($claim['created_at'])) }}</td>
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
                                                    <td>${{ number_format((float) $claim['claim_amount'], 2, '.', ',') }}
                                                    </td>
                                                    <td>
                                                        {{ $claim->user_details->name }}
                                                    </td>
                                                    <td>
                                                        <?php $document_type = pathinfo($claim->claim_bill_attachment); ?>
                                                        <div class="card" style="width: 100px; ">
                                                            <div class="card-body" style="padding: 0.5rem 0.5rem;">
                                                                <a href="img/{{ $claim->claim_bill_attachment }}"
                                                                    target="_blank">
                                                                    @if (isset($document_type['extension']) && $document_type['extension'] === 'pdf')
                                                                        <img src="img/pdf_icon.png" alt=""
                                                                            class="img-thumbnail">
                                                                    @else
                                                                        <img src="img/{{ $claim->claim_bill_attachment }}"
                                                                            alt="" class="img-thumbnail">
                                                                </a>
                                            @endif
                                </div>
                            </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="menu-icon tf-icons bx bx-cog"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('claims/' . $claim['id']) }}"><i
                                                class="menu-icon tf-icons bx bx-copy-alt"></i>view</a>
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
                <button class="btn btn-primary " type="button" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Apply for prepaid Card
                </button>

            </div>

        </div>
    </div>

    @endif
@endsection

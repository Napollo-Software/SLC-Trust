@extends('nav')
@section('title', 'Archived Bills Senior Life Care Trusts')
@section('wrapper')
    <?php
    use App\Models\Claim;
    use App\Models\User;
    use Carbon\Carbon;
    use App\Models\PayeeModel;
    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    $billing_method = User::where('id', '=', Session::get('loginId'))->value('billing_method');
    $current_user_name = User::where('id', '=', Session::get('loginId'))->value('name');
    $current_user_balance = User::where('id', '=', Session::get('loginId'))->value('user_balance');
    $users = User::where('role', 'User')->get();
    ?>
<style>
.text-nowrap {
    white-space: nowrap !important;
    margin-top: 26px;
}
/* .modal-title {
    position: absolute;
    top: 18px;
} */
        </style>
        <div class="">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Archive</b></span> / Bills</h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card radius-10">
                  <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-1">Archive Bills List</h5>
                            <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall entries</p>
                        </div>
                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                    </div>
       <div class="table-responsive text-nowrap overflow-auto pb-2 mt-2">
        <table class="table align-middle mb-0 table-hover dataTable">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Account</th>
                    <th>Amount</th>
                    <th>Attachment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody >
                @php
                    // $claim_details = [];
                @endphp
                @foreach ($archived as $claim)
                    <tr class="row-{{ $claim['id'] }}" style="white-space: nowrap">
                        <td style="width: 120px">Bill#{{ str_pad($claim['id'], 2, '0', STR_PAD_LEFT) }}</td>
                        <td>
                           {{$claim->user_details->full_name()}}
                        </td>
                        <td>{{ date('m/d/Y h:i A', strtotime($claim['created_at'])) }}</td>
                        <td><?php $name = App\Models\Category::find($claim['claim_category']); ?>{{ $name->category_name }}</td>
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
                        <td>{{ $claim->account_number }}</td>
                        <td>${{ number_format((float) $claim['claim_amount'], 2, '.', ',') }}</td>
                        <td>
                            <?php $document_type = pathinfo($claim->claim_bill_attachment); ?>
                            <div class="" style="width: 115px; ">
                                <div class="" style="padding: 0.5rem 0.5rem;">
                                    <a href="img/{{ $claim->claim_bill_attachment }}"
                                        target="_blank">
                                        Attachment<i class="bx bx-file"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="menu-icon tf-icons bx bx-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a type="button" class="dropdown-item view-log-link" data-target="#viewLog"  data-toggle="modal" data-attr="{{ $claim->log_details->description }}" data-action_performed_by="{{ $claim->log_details->action_performed_by->full_name() }}" data-created_at="{{ $claim->log_details->created_at->format('m-d-Y h:i A') }}">
                                        <i class="bx bx-book me-1"></i> View log
                                    </a>
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
</div>
<div class="modal fade no-print" id="viewLog" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header pt-2">
                <h5 class="modal-title" id="customerdpositLabel">Log Details
                </h5>
                <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-4">
                    <!-- Display the attr value here -->
                    <div class="attr-value"></div>
                </div>
                {{-- <div class="p-2">
                    <button type="button" class="btn btn-secondary pl-0" data-dismiss="modal">Close</button>
                </div> --}}
            </div>
            <div class="modal-footer">

                <div class="col-12 d-flex justify-content-between">
                    <p>
                        <b>Action Performed By : </b><span class="action-performed-by"></span>
                    </p>
                    <p>
                     <b>On:</b> <span class="created-at"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.view-log-link').click(function () {
                    var attrValue = $(this).data('attr');
                    var action_performed_by = $(this).data('action_performed_by');
                    var created_at = $(this).data('created_at');
                    $('.attr-value').text(attrValue);
                    $('.action-performed-by').text(action_performed_by);
                    $('.created-at').text(created_at);
                });
            });
        </script>
         <script>
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


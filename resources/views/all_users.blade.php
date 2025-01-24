@extends('nav')
@section('title', 'All Users | Senior Life Care Trusts')
@section('wrapper')
<head>
    <style>
        .scrol-card {
            overflow: scroll;
            padding: 5% 0;
        }

        .export-file2 {
            right: 266px
        }

    </style>
</head>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> --}}
@php

use App\Models\User;

$role = User::where('id', Session::get('loginId'))->value('role');
$users = User::find(Session::get('loginId'));

@endphp
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import User</h5>
                <button type="button" class="close btn-secondary close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('import.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="import_file" class="form-control" required accept="application/xlsx">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="customerdposit" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerdpositLabel"> Customer Deposits</h5>
                <button type="button" class="close btn-secondary close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('customer.deposit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="import_file" id="excelfile" onchange="ExportToTable()" class="form-control" required accept="application/xlsx">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <table class="table table-bordered dataTable" id="exceltable">
                <thead>
                    <tr>
                        <th>Reason</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Maintenance Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Users</b> </div>
    </h5>
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="card">
                <div class="d-flex align-items-center p-3 mb-1">
                    <div>
                        <h5 class="mb-1">Manage Users</h5>
                        <p class="mb-0 font-13 text-secondary "><i class='bx bxs-calendar'></i>Overall Users</p>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('add_user') }}" class="btn btn-primary print-btn pb-1 pt-1 " style="color: white;">
                            <i class="bx bx-save pb-1"></i>Add User </a>
                    </div>
                    <!--div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"> <i
                                    class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('csvuser') }}" class="btn btn-primary dropdown-item mb-1"
                                       download>
                                        Deposit Template <i class='bx bx-download'></i>
                                    </a>

                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <button type="button" class="btn btn-primary dropdown-item mb-1" data-toggle="modal"
                                            data-target="#customerdposit">
                                        Deposit <i class='bx bx-upload'></i>
                                    </button>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="btn btn-primary mb-1 dropdown-item" href="{{ route('printuserpage') }}"
                                       target="blank">Export<i
                                            class='bx bx-printer'></i></a>
                                </li>
                            </ul>
                        </div-->
                </div>
                <div class="card-body ">
                    <div class="table-responsive overflow-auto pb-2 " style="margin-top:-15px ">
                        <table class="table align-middle mb-0 table-hover dataTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Actions</th>
                                    <th>Account No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Account Status</th>
                                    <th>Balance</th>
                                    <th>Billing Cycle</th>
                                    <th>Surplus Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $k => $u)
                                    <tr>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                    <i class="bx bx-cog"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if ($role != 'Moderator')
                                                        <a class="dropdown-item pb-2"
                                                           href="{{ route('show_user', $u['id']) }}"><i
                                                                class='bx bxs-show'></i> View</a>
                                                        {{-- @if ($users->hasPermissionTo('User Edit')) --}}
                                                        <a class="dropdown-item pb-2"
                                                           href="{{ route('edit_user', $u['id']) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        {{-- @endif --}}
                                                    @endif
                                                    @if ($users->hasPermissionTo('Deposit') && $u->role == 'User')
                                                        <a class="dropdown-item"
                                                           href="{{ route('view_user', $u['id']) }}"><i
                                                                class="bx bx-dollar-circle me-1"></i> Add Balance</a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('approval-letter', $u['id']) }}"><i
                                                                class="bx bxs-download me-1"></i>Approval Letter</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <!--td>{{ $u->id }}</td-->
                                        <td>
                                            @if ($role == 'Admin')
                                                <a href="{{ route('show_user', $u['id']) }}">{{ $u['name'] }}
                                                    {{ $u['last_name'] }}</a>
                                        </td>
                                        @else
                                            {{ $u['name'] }} {{ $u['last_name'] }}
                                        @endif
                                        <td>{{ $u['email'] }}</td>
                                        <td>{{ $u['role'] }}</td>
                                        <th>
                            <span
                                            class="badge
                                @if ($u->account_status == 'Pending') bg-primary @endif
                                @if ($u->account_status == 'Approved') bg-success @endif
                                @if ($u->account_status == 'Not Approved' || $u->account_status == 'Suspended') bg-danger @endif
                                me-1  @if ($u->account_status == 'Disable') bg-danger @endif
                                me-1">

                                            @if ($u->account_status == 'Suspended')
                                            {{ $u['account_status'] }}
                                            @endif
                                            @if ($u->account_status == 'Pending')
                                            {{ $u['account_status'] }}
                                            @endif
                                            @if ($u->account_status == 'Approved')
                                            {{ $u['account_status'] }}
                                            @endif
                                            @if ($u->account_status == 'Not Approved')
                                            {{ $u['account_status'] }}
                                            @endif
                                            @if ($u->account_status == 'Disable')
                                            {{ $u['account_status'] }}
                                            @endif
                                        </span>
                                    </th>
                                    <td>
                                        @if ($u['role'] == 'User')
                                        ${{ number_format((float) userBalance($u['id']), 2, '.', ',') }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($u['role'] == 'User' && $u['billing_cycle'] != '')
                                        {{ $u['billing_cycle'] }} of every month
                                        @elseif($u['role'] == 'User' && $u['billing_cycle'] == '')
                                        1 of every month
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($u['role'] == 'User')
                                        ${{ number_format((float) $u['surplus_amount'], 2, '.', ',') }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endsection
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                <script type="text/javascript"
                        src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
                <script>
                    $(document).ready(function () {
                        $('.dataTable').DataTable({
                            aLengthMenu: [
                                [25, 50, 100, -1],
                                [25, 50, 100, "All"]
                            ]
                        });
                    });
                </script>
                <script src="./Upload.js"></script>
                <script src="./text.js"></script>
                <script>
                    document.getElementById("demo").onclick = function () {
                        myFunction()
                    };

                    function myFunction() {
                        var code = $('.html-container').html();

                        y = '<html><body>' + code + '</body></html>';
                        $('.html-viewer').text(y).focus().select();
                    }

                    function BindTable(jsondata, tableid) {
                        var columns = BindTableHeader(
                            jsondata,
                            tableid
                        );
                        for (var i = 0; i < jsondata.length; i++) {
                            var row$ = $("<tr/>");
                            for (var colIndex = 0; colIndex < columns.length; colIndex++) {
                                var cellValue = jsondata[i][columns[colIndex]];
                                if (cellValue == null) cellValue = "";
                                row$.append($("<td/>").html(cellValue));
                            }
                            $(tableid).append(row$);
                        }
                    }

                    function BindTableHeader(jsondata, tableid) {
                        var columnSet = [];
                        var headerTr$ = $("<tr/>");
                        for (var i = 0; i < jsondata.length; i++) {
                            var rowHash = jsondata[i];
                            for (var key in rowHash) {
                                if (rowHash.hasOwnProperty(key)) {
                                    if ($.inArray(key, columnSet) == -1) {
                                        columnSet.push(key);
                                        headerTr$.append($("<th/>").html(key));
                                    }
                                }
                            }
                        }
                        $(tableid).append(headerTr$);
                        return columnSet;
                    }

                    function ExportToTable() {
                        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;

                        if (regex.test($("#excelfile").val().toLowerCase())) {
                            var xlsxflag = false;
                            if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                                xlsxflag = true;
                            }

                            if (typeof FileReader != "undefined") {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var data = e.target.result;

                                    if (xlsxflag) {
                                        var workbook = XLSX.read(data, {
                                            type: "binary"
                                        });
                                    } else {
                                        var workbook = XLS.read(data, {
                                            type: "binary"
                                        });
                                    }

                                    var sheet_name_list = workbook.SheetNames;
                                    if (sheet_name_list.length !== 1) {
                                        swal.fire('warning', 'Please upload an Excel file with exactly one sheet.', 'warning')
                                        return;
                                    }
                                    var cnt =
                                        0;
                                    sheet_name_list.forEach(function (y) {

                                        if (xlsxflag) {
                                            var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);
                                        } else {
                                            var exceljson = XLS.utils.sheet_to_row_object_array(
                                                workbook.Sheets[y]
                                            );
                                        }
                                        if (exceljson.length > 0 && cnt == 0) {
                                            BindTable(exceljson, "#exceltable");
                                            cnt++;
                                        }
                                    });
                                    $("#exceltable").show();
                                };

                                if (xlsxflag) {
                                    reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                                } else {
                                    reader.readAsBinaryString($("#excelfile")[0].files[0]);
                                }
                            } else {
                                swal.fire('warning', 'Sorry! Your browser does not support HTML5!', 'warning');
                            }
                        } else {
                            swal.fire('warning', 'Please upload a valid file!', 'warning');
                        }
                    }

                    function BindTable(jsonData, tableId) {
                        $(tableId + " tbody").empty();
                        var success = 0;
                        var failed = 0;
                        var color = 'danger';
                        var reason = "Good to go!";
                        jsonData.forEach(function (row) {
                            var user_balance = parseFloat(row[
                                'User Balance ($)']);
                            var paid_amount = parseFloat(row[
                                'Paid Amount ($)'])
                            var bill_amount = parseFloat(row[
                                'Bill Amount ($)']);
                            var status = row['Status (You can either Approved ,Partially Approve or Reject bills )'];

                            row['Payee'] = row['Payee'] || '';
                            row['Account'] = row['Account'] || '';
                            row['Paid Amount ($)'] = row['Paid Amount ($)'] || '';
                            row['Payment method (ACH,Card,Check Payment)'] = row['Payment method (ACH,Card,Check Payment)'] ||
                                '';
                            row['Payment Number'] = row['Payment Number'] || '';

                            var rowHTML = '<tr style="background-color: ';
                            if (paid_amount > user_balance && status !== 'Pending') {
                                var reason = "Insufficient Balance!";
                                color = 'danger';
                                failed++;
                            } else if (paid_amount <= 0 && status != 'Pending') {
                                var reason = "Invalid paid amount!";
                                color = 'danger';
                                failed++;
                            } else if (paid_amount != bill_amount && status == 'Approved') {
                                var reason = "Invalid paid amount!";
                                color = 'danger';
                                failed++;
                            } else if (row['Paid Amount ($)'] != '' && status == 'Pending') {
                                var reason = "Change Bill Status!";
                                color = 'danger';
                                failed++;
                            } else if (row['Paid Amount ($)'] == '' && status != 'Pending' && status != 'Reject') {
                                reason = "Paid Amount is null!";
                                color = 'danger';
                                failed++;
                            } else if (paid_amount >= bill_amount && status == "Partially Approve") {
                                reason = "Incorrect Status!";
                                color = 'danger';
                                failed++;
                            } else if (status != 'Pending' && status != 'Approved' && status != 'Partially Approve' && status !=
                                'Reject') {
                                reason = "Check status spell!";
                                color = 'danger';
                                failed++;
                            } else if (status == 'Pending') {
                                rowHTML += '';
                                reason = "Pending!";
                            } else if (status == 'Reject') {
                                reason = "Bill Rejected!";
                                color = 'warning';
                            } else {
                                rowHTML += 'lavender';
                                reason = "Good to go!";
                                color = 'primary'
                                success++;
                            }

                            rowHTML += ';">';
                            rowHTML += '<td><span class="badge bg-' + color + '">' + reason + '</span></td>';
                            rowHTML += '<td>' + row['Client Name'] + '</td>';
                            rowHTML += '<td>' + row['Amount'] + '</td>';
                            rowHTML += '<td>' + row['Maintenance fee'] + '</td>';
                            rowHTML += '</tr>';

                            $(tableId + " tbody").append(rowHTML);

                        });
                        var numRows = $(tableId + " tbody tr").length;
                        $('.success-row').text(success);
                        $('.failed-row').text(failed);
                        if (failed <= 0) {
                            $('.upload-btn').attr('disabled', false).text('Upload!');
                        } else {
                            $('.upload-btn').attr('disabled', true).text('Please Resolve the errors first!');
                        }
                        console.log("Number of rows in the table: " + numRows);
                    }
                </script>

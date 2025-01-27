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
    <?php

    use App\Models\User;

    $role = User::where('id', '=', Session::get('loginId'))->value('role');
    $users = User::find(Session::get('loginId'));

    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
    <div class="modal fade" id="customerdposit" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel"
         aria-hidden="true">
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
                        <input type="file" name="import_file" id="excelfile" onchange="ExportToTable()"
                               class="form-control" required accept="application/xlsx">
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
                    <div class="card-body " >
                        <div class="table-responsive overflow-auto pb-2 " style="margin-top:-15px ">
                            <table class="table align-middle mb-0 table-hover dataTable">
                                <thead class="table-light">
                                <tr>
                                    <th>Actions</th>
                                    <!--th>UID#</th-->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Account Status</th>
                                    <th>Balance</th>
                                    <th>Billing Cycle</th>
                                    <th>Surplus Amount</th>
                                    <!--th>Avatar</th-->
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
                                                        @if ( $u->account_status == 'Approved')    
                                                        <a class="dropdown-item"
                                                           href="{{ route('view_user', $u['id']) }}"><i
                                                                class="bx bx-dollar-circle me-1"></i> Manage Payment</a>
                                                        @endif
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

                                        <!--td class="text-center">
                                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                    title="{{ $u['name'] }}">
                                                    <img src="{{ url('user/images93561655300919_avatar.png') }}"
                                                         alt="Avatar" class="rounded-circle" style="width: 25px"/>
                                                </li>
                                            </ul>
                                        </td-->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- {{ $user->links() }} --}}
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
                            ],
                            //  "order": false // "0" means First column and "desc" is order type;
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
                        /*Function used to convert the JSON array to Html Table*/

                        var columns = BindTableHeader(
                            jsondata,
                            tableid
                        ); /*Gets all the column headings of Excel*/
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
                        /*Function used to get all column names from JSON and bind the html table header*/

                        var columnSet = [];
                        var headerTr$ = $("<tr/>");
                        for (var i = 0; i < jsondata.length; i++) {
                            var rowHash = jsondata[i];
                            for (var key in rowHash) {
                                if (rowHash.hasOwnProperty(key)) {
                                    if ($.inArray(key, columnSet) == -1) {
                                        /*Adding each unique column names to a variable array*/

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
                        /*Checks whether the file is a valid excel file*/

                        if (regex.test($("#excelfile").val().toLowerCase())) {
                            var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/
                            if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                                xlsxflag = true;
                            }
                            /*Checks whether the browser supports HTML5*/

                            if (typeof FileReader != "undefined") {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    var data = e.target.result;
                                    /*Converts the excel data in to object*/

                                    if (xlsxflag) {
                                        var workbook = XLSX.read(data, {
                                            type: "binary"
                                        });
                                    } else {
                                        var workbook = XLS.read(data, {
                                            type: "binary"
                                        });
                                    }
                                    /*Gets all the sheetnames of excel into a variable*/

                                    var sheet_name_list = workbook.SheetNames;
                                    if (sheet_name_list.length !== 1) {
                                        swal.fire('warning', 'Please upload an Excel file with exactly one sheet.', 'warning')
                                        return;
                                    }
                                    var cnt =
                                        0; /*This is used for restricting the script to consider only the first sheet of excel*/
                                    sheet_name_list.forEach(function (y) {
                                        /*Iterate through all sheets*/
                                        /*Convert the cell value to Json*/

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
                                    /*If the excel file is .xlsx extension, then create an Array Buffer from excel*/
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
                        // Clear the table first
                        $(tableId + " tbody").empty();
                        var success = 0;
                        var failed = 0;
                        var color = 'danger';
                        var reason = "Good to go!";
                        // Iterate through each row in jsonData
                        jsonData.forEach(function (row) {
                            // Assuming Column A and Column B are the columns to check
                            var user_balance = parseFloat(row[
                                'User Balance ($)']); // Replace 'User Balance ($)' with the actual header/title of Column A
                            var paid_amount = parseFloat(row[
                                'Paid Amount ($)']); // Replace 'Paid Amount ($)' with the actual header/title of Column B
                            var bill_amount = parseFloat(row[
                                'Bill Amount ($)']); // Replace 'Paid Amount ($)' with the actual header/title of Column B
                            var status = row['Status (You can either Approved ,Partially Approve or Reject bills )'];

                            // Replace 'undefined' values with an empty string
                            row['Payee'] = row['Payee'] || '';
                            row['Account'] = row['Account'] || '';
                            row['Paid Amount ($)'] = row['Paid Amount ($)'] || '';
                            row['Payment method (ACH,Card,Check Payment)'] = row['Payment method (ACH,Card,Check Payment)'] ||
                                '';
                            row['Payment Number'] = row['Payment Number'] || '';

                            // Create the row dynamically based on the conditions and apply row color
                            var rowHTML = '<tr style="background-color: ';
                            if (paid_amount > user_balance && status !== 'Pending') {
                                // rowHTML += 'orange';
                                var reason = "Insufficient Balance!";
                                color = 'danger';
                                failed++;
                            } else if (paid_amount <= 0 && status != 'Pending') {
                                // rowHTML += 'orange';
                                var reason = "Invalid paid amount!";
                                color = 'danger';
                                failed++;
                            } else if (paid_amount != bill_amount && status == 'Approved') {
                                // rowHTML += 'orange';
                                var reason = "Invalid paid amount!";
                                color = 'danger';
                                failed++;
                            } else if (row['Paid Amount ($)'] != '' && status == 'Pending') {
                                // rowHTML += 'orange';
                                var reason = "Change Bill Status!";
                                color = 'danger';
                                failed++;
                            } else if (row['Paid Amount ($)'] == '' && status != 'Pending' && status != 'Reject') {
                                // rowHTML += 'orange';
                                reason = "Paid Amount is null!";
                                color = 'danger';
                                failed++;
                            } else if (paid_amount >= bill_amount && status == "Partially Approve") {
                                // rowHTML += 'orange';
                                reason = "Incorrect Status!";
                                color = 'danger';
                                failed++;
                            } else if (status != 'Pending' && status != 'Approved' && status != 'Partially Approve' && status !=
                                'Reject') {
                                // rowHTML += 'orange';
                                reason = "Check status spell!";
                                color = 'danger';
                                failed++;
                            } else if (status == 'Pending') {
                                rowHTML += '';
                                reason = "Pending!";
                            } else if (status == 'Reject') {
                                reason = "Bill Rejected!";
                                color = 'warning';
                                // rowHTML += 'orange';
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

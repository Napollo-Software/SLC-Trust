@extends('nav')
@section('title', 'Update Bill Status | Senior Life Care Trusts')
@section('wrapper')
<style>
    #content {
        margin: 40px auto;
        text-align: center;
        width: 600px;
    }

    #content h1 {
        text-transform: uppercase;
        font-weight: 700;
        margin: 0 0 40px 0;
        font-size: 25px;
        line-height: 30px;
    }

    .circle {
        width: 20px;
        height: 20px;
        line-height: 200px;
        border-radius: 50%;
        /* the magic */
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        text-align: center;
        color: white;
        font-size: 16px;
        text-transform: uppercase;
        font-weight: 700;
        margin: 0 auto 40px;
    }

    .blue {
        background-color: #3498db;
    }

    .green {
        background-color: #16a085;
    }

    .red {
        background-color: #e74c3c;
    }

    .feedback {
        font-size: 14px;
        color: #b1b1b1;
    }

    .scrollable-container {
        max-height: 90vh;
        overflow-y: scroll;
    }

    .dropzone {
        margin: 14px;
        height: 100px;
        border: 1px dashed #999;
        border-radius: 3px;
        text-align: center;

    }

    .upload-icon {
        margin: 25px 2px 2px 2px;
    }

    .upload-input {
        position: relative;
        top: -62px;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    .swal2-cancel {
        background-color: red !important;
    }

</style>
<div class="pb-3">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div><a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Update Bills Status</b></div>
    </h5>
    <div class="card mb-0">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
                <h5 class="mb-0"><span class=" ">Update Pending Bills</h5>
                <a class="btn btn-primary custom-float " href="{{ route('export.pending.bills') }}" style="background-color: #6BB0AA"><i class='bx bx-export pb-1'></i>Export
                </a>
                </h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row upload-file">
                <div class="col-lg-12">
                    <div class="card mb-0">
                        <div class="dropzone ">
                            <img src="{{ url('/upload.svg') }}" class="upload-icon" />
                            <br>
                            <b>Upload/Drag file here</b>
                            <form id="upload_file" enctype="multipart/form-data">
                                <input type="file" id="excelfile" onchange="ExportToTable()" class="upload-input pt-2" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row upload-result d-none gy-3">
                <div class="col-lg-6 ">
                    <div class="card  mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between  ">
                                <div>
                                    <h3 class=" mb-2">
                                        Success
                                    </h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="fw-semibold mb-0">Rows </h6><span class="badge bg-primary success-row me-1">N/A</span>
                                    </div>
                                </div>
                                <div class="avatar flex-shrink-0 ">
                                    <img src="{{ url('/assets/img/icons/unicons/approved.png') }}" alt="chart success" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between ">
                                <div>
                                    <h3 class=" mb-2">
                                        Failed
                                    </h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="fw-semibold mb-0">Rows </h6><span class="badge bg-danger failed-row me-11">N/A</span>
                                    </div>
                                    <input type="hidden" class="failed-rows">
                                </div>
                                <div class="avatar flex-shrink-0 ">
                                    <img src="{{ url('/assets/img/icons/unicons/pending.png') }}" alt="chart success" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="card mt-3 mb-5">
        <div class="card-header d-flex justify-content-Between align-items-center flex-wrap gap-2 mb-0 pb-2">
            <h5 class="mb-0">File Details</h5>
            <div class="d-flex  gap-2 ">
                <button class="btn btn-primary upload-btn" disabled> Upload</i></button>
                <button id="clear_form" class="btn btn-secondary"><i class="bx bx-trash"></i>Clear</button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <div class="table-responsive overflow-auto text-nowrap  pb-2 scrollable-container">
                <table class="table align-middle mb-0 table-hover dataTable" id="exceltable">
                    <thead class="table-light">
                        <tr>
                            <th>Rejection_Reason</th>
                            <th>Bill_Id</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Payee</th>
                            <th>Account</th>
                            <th>Status</th>
                            <th>Bill_Amount($)</th>
                            <th>User_Balance($)</th>
                            <th>Paid_Amount($)</th>
                            <th>Payment_Method</th>
                            <th>Payment_Number</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).on('click', '#clear_form', function(e) {
        $('.upload-file').removeClass('d-none');
        $('.upload-result').addClass('d-none');
        $('#upload_file')[0].reset();
        $('#exceltable tbody').empty();
        $('.upload-btn').attr('disabled', true);
        $('.success-row').text('N/A');
        $('.failed-row').text('N/A');
    })
    $(document).on('click', '.upload-btn', function() {
        $('.upload-btn').attr('disabled', true).text('Uploading...');
        var fileInput = document.getElementById('excelfile');
        var formData = new FormData();
        formData.append('import_file', fileInput.files[0]);
        var failed_row = $('.failed-rows').val();
        if (failed_row > 0) {
            var message = "Are you sure you want to proceed?, The rows with errors will be ignored";
        } else {
            var message = "Are you sure you want to proceed?";
        }
        swal.fire({
            title: 'Warning'
            , text: message
            , icon: 'warning'
            , showCancelButton: true
            , cancelButtonColor: 'info'
            , confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST'
                    , url: "{{ route('update.bills.status') }}"
                    , data: formData
                    , processData: false
                    , contentType: false
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(data) {
                        $('.upload-btn').text('Upload');
                        swal.fire('success', 'Bills status updated successfully'
                            , 'success');
                        window.location.reload();
                    }
                    , error: function(xhr) {
                        erroralert(xhr);
                    }
                });
            } else {
                $('.upload-btn').attr('disabled', false).text('Upload');
            }
        })

    });

</script>
<script src="./Upload.js"></script>
<script src="./text.js"></script>
<script>
    document.getElementById("demo").onclick = function() {
        myFunction()
    };

    function myFunction() {
        var code = $('.html-container').html();

        y = '<html><body>' + code + '</body></html>';
        $('.html-viewer').text(y).focus().select();
    }

    function BindTable(jsondata, tableid) {

        var columns = BindTableHeader(
            jsondata
            , tableid
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
        var regex = /(.xlsx|.xls)$/;

        if (regex.test($("#excelfile").val().toLowerCase())) {
            var xlsxflag = false;
            if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {
                xlsxflag = true;
            }

            if (typeof FileReader != "undefined") {
                var reader = new FileReader();
                reader.onload = function(e) {
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
                        $('#upload_file')[0].reset();
                        return;
                    }
                    var cnt =
                        0;
                    sheet_name_list.forEach(function(y) {

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
                    $('.upload-file').addClass('d-none');
                    $('.upload-result').removeClass('d-none');
                    $("#exceltable").show();
                };

                if (xlsxflag) {
                    reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                } else {
                    reader.readAsBinaryString($("#excelfile")[0].files[0]);
                }
            } else {
                $('.upload-file').removeClass('d-none');
                $('.upload-result').addClass('d-none');
                swal.fire('warning', 'Sorry, Your browser does not support HTML5', 'warning');
            }
        } else {
            $('.upload-file').removeClass('d-none');
            $('.upload-result').addClass('d-none');
            swal.fire('warning', 'Please upload a valid file', 'warning');
            $('#upload_file')[0].reset();
        }
    }

    function BindTable(jsonData, tableId) {
        $(tableId + " tbody").empty();
        var success = 0;
        var failed = 0;
        var color = 'danger';
        var reason = "Ready";
        var encounteredRows = {};
        jsonData.forEach(function(row) {
            var user_balance = row['User Balance ($)'] === "N/A" || row['User Balance ($)'] == 0 ?
                0 :
                parseFloat(row['User Balance ($)']) || 0;
            var paid_amount = parseFloat(row[
                'Paid Amount ($)']);
            var bill_amount = parseFloat(row[
                'Bill Amount ($)']);
            var status = row['Status (You can either Approved ,Partially Approve or Reject bills )'];
            row['Payee'] = row['Payee'] || '';
            row['Account'] = row['Account'] || '';
            row['Paid Amount ($)'] = row['Paid Amount ($)'] || '';
            row['Payment method (ACH,Card,Check Payment)'] = row['Payment method (ACH,Card,Check Payment)'] || '';
            row['Payment Number'] = row['Payment Number'] || '';
            var uniqueKey = row['Bill Id'];
            var rowHTML = '<tr style="background-color: ';
            if (paid_amount <= 0 && (status !== 'Pending' && status !== 'Reject')) {
                var reason = "Invalid paid amount";
                color = 'danger';
                failed++;
            } else if (paid_amount != bill_amount && status == 'Approved') {
                var reason = "Invalid paid amount";
                color = 'danger';
                failed++;
            } else if (row['Paid Amount ($)'] != '' && status == 'Pending') {
                var reason = "Change Bill Status";
                color = 'danger';
                failed++;
            } else if (row['Paid Amount ($)'] == '' && status != 'Pending' && status != 'Reject') {
                reason = "Paid Amount is null";
                color = 'danger';
                failed++;
            } else if (paid_amount == bill_amount && status == "Partially Approve") {
                reason = "Incorrect Status";
                color = 'danger';
                failed++;
            } else if (paid_amount > bill_amount && status == "Partially Approve") {
                reason = "Invalid paid amount";
                color = 'danger';
                failed++;
            } else if (status != 'Pending' && status != 'Approved' && status != 'Partially Approve' && status !=
                'Reject') {
                reason = "Check status spell";
                color = 'danger';
                failed++;
            } else if (status == 'Pending') {
                rowHTML += '';
                reason = "Pending";
            } else if (status == 'Reject') {
                reason = "Bill Rejected";
                color = 'warning';
            } else if (encounteredRows[uniqueKey]) {
                console.log(row['Bill Id']);
                color = 'danger';
                reason = "Duplicate Bill";
                failed++;
            } else if (typeof row['Bill Id'] === "undefined") {
                color = 'danger';
                reason = "Bill Id must not be null";
                failed++;
            } else {
                rowHTML += 'lavender';
                reason = "Ready";
                color = 'primary'
                success++;
            }

            encounteredRows[uniqueKey] = true;

            rowHTML += ';">';
            rowHTML += '<td class="text-nowrap"><span class="badge bg-' + color + '">' + reason + '</span></td>';
            rowHTML += '<td class="text-nowrap">Bill#' + row['Bill Id'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['User'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Date'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Category'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Payee'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Account'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + status + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Bill Amount ($)'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + user_balance + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Paid Amount ($)'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Payment method (ACH,Card,Check Payment)'] + '</td>';
            rowHTML += '<td class="text-nowrap">' + row['Payment Number'] + '</td>';
            rowHTML += '</tr>';

            $(tableId + " tbody").append(rowHTML);

        });
        var numRows = $(tableId + " tbody tr").length;
        $('.success-row').text(success);
        $('.failed-row').text(failed);
        $('.failed-rows').val(failed);
        $('.upload-btn').attr('disabled', false);
        console.log("Number of rows in the table: " + numRows);
    }

</script>

@extends('nav')
@section('title', 'Deposit | SLC Trust')
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
  border-radius: 50%; /* the magic */
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
    width: 97%;
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
</style>
    <!-- partial:index.partial.html -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
    <div class="">
        <div class="d-flex justify-content-between">
            <h5 class=" mb-4"><span class="text-muted fw-light">Export deposit template</h5>
            <a class="btn btn-primary custom-float mb-3" href="{{ route('csvuser') }}">Export
                <i class='bx bx-export pb-1'></i>
            </a>
            </h5>
        </div>
        <div class="row upload-file">
            <div class="col-lg-12">
                <div class="card">
                    <div class="dropzone m-3">
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
        <div class="row upload-result d-none">
            <div class="col-lg-6 mb-1">
                <div class="card ">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-1">
                            <div>
                                <h5 class="card-title  mb-2">
                                    Success
                                </h5>
                                <small class="fw-semibold">Rows </small><span class="badge bg-primary success-row"
                                    me-1">N/A</span>
                            </div>
                            <div class="avatar flex-shrink-0 ">
                                <img src="{{ url('/assets/img/icons/unicons/approved.png') }}" alt="chart success"
                                    class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between mb-1">
                            <div>
                                <h5 class="card-title mb-2">
                                    Failed
                                </h5>
                                <small class="fw-semibold">Rows </small><span
                                    class="badge bg-danger failed-row me-1">N/A</span>
                                <input type="hidden" class="failed-rows">
                            </div>
                            <div class="avatar flex-shrink-0 ">
                                <img src="{{ url('/assets/img/icons/unicons/pending.png') }}" alt="chart success"
                                    class="rounded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="">
                <div class="card">
                    <h5 class="card-header d-flex justify-content-Between mb-0 pb-2">
                        <b>File Details</b>
                        <span><button class="btn btn-primary upload-btn" disabled> Upload <i class="bx bx-chart pb-1"></i></button>
                        <button id="clear_form" class="btn btn-primary">Clear</button></span>
                    </h5>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap overflow-auto pb-2 scrollable-container">
                        <table class="table table-bordered dataTable " id="exceltable">
                            <thead>
                                <tr>
                                    <th>Reason</th>
                                    <th>Customer ID</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Maintenance Fee</th>
                                    <th>Customer Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- partial -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).on('click', '#clear_form', function(e){
        $('.upload-file').removeClass('d-none');
        $('.upload-result').addClass('d-none');
        $('.upload-btn').attr('disabled', false).text('Upload!');
        $('#upload_file')[0].reset();
        $('#exceltable tbody').empty();
        $('.upload-btn').attr('disabled',true);
        $('.success-row').text('N/A');
        $('.failed-row').text('N/A');
    })
    $(document).on('click', '.upload-btn', function () {
        $('.upload-btn').attr('disabled',true).text('Uploading...');
        var fileInput = document.getElementById('excelfile');
        var formData = new FormData();
        formData.append('import_file', fileInput.files[0]);
        var failed_row = $('.failed-rows').val();
        if(failed_row>0){
            var message = "Are you sure ,You want to proceed, The rows with errors will be ignored";
        }else{
            var message = "Are you sure ,You want to proceed";
        }
        swal.fire({
            title: 'Warning!',
            text: message,
            icon: 'warning',
            
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'info',
            confirmButtonText: 'Yes, proceed!'
        }).then((result)=>{
            if(result.isConfirmed){
            $.ajax({
            type: 'POST',
            url: "{{ route('customer.deposit') }}",
            data: formData, // Directly pass formData without enclosing it in another object
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                $('.upload-btn').text('Upload');
                swal.fire('success','Bills status updated successfully','success');
                window.location.reload();
            },
            error: function (xhr) {
                erroralert(xhr);
            }
               });
            }else{
                $('.upload-btn').attr('disabled',false).text('Upload!');
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
                reader.onload = function(e) {
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
                        swal.fire('warning','Please upload an Excel file with exactly one sheet.','warning')
                        $('#upload_file')[0].reset();
                        return;
                    }
                    var cnt =
                        0; /*This is used for restricting the script to consider only the first sheet of excel*/
                    sheet_name_list.forEach(function(y) {
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
                    $('.upload-file').addClass('d-none');
                    $('.upload-result').removeClass('d-none');
                    $("#exceltable").show();
                };

                if (xlsxflag) {
                    /*If the excel file is .xlsx extension, then create an Array Buffer from excel*/
                    reader.readAsArrayBuffer($("#excelfile")[0].files[0]);
                } else {
                    reader.readAsBinaryString($("#excelfile")[0].files[0]);
                }
            } else {
                $('.upload-file').removeClass('d-none');
                $('.upload-result').addClass('d-none');
                swal.fire('warning','Sorry! Your browser does not support HTML5!','warning');
            }
        } else {
            $('.upload-file').removeClass('d-none');
            $('.upload-result').addClass('d-none');
            swal.fire('warning','Please upload a valid file!','warning');
            $('#upload_file')[0].reset();
        }
    }

    function BindTable(jsonData, tableId) {
        // Clear the table first
        $(tableId + " tbody").empty();
        var success = 0;
        var failed = 0;
        var color = 'danger';
        var reason = "Good to go!";
        var encounteredRows = {};
        // Iterate through each row in jsonData
        jsonData.forEach(function(row) {
            // Assuming Column A and Column B are the columns to check
            var amount = parseFloat(row[
                'Amount']); // Replace 'User Balance ($)' with the actual header/title of Column A
            var maintenance_fee = parseFloat(row[
                'Maintenance fee']); // Replace 'Paid Amount ($)' with the actual header/title of Column B
            var balance = parseFloat(row[
            'Client Balance' ]);
            var uniqueKey = row['Id'];
            var rowHTML = '<tr style="background-color: ';
            if ( amount < 0) {
                // rowHTML += 'orange';
                var reason = "Invalid Amount!";
                color = 'danger';
                failed++;
            } else if (maintenance_fee < 0 ) {
                // rowHTML += 'orange';
                var reason = "Invalid Maintenance Fee!";
                color = 'danger';
                failed++;
            } else if (maintenance_fee == 0 && amount == 0) {
                // rowHTML += 'orange';
                var reason = "Pending";
                color = 'danger';
            }
            else if (balance+amount < maintenance_fee) {
                // rowHTML += 'orange';
                var reason = "Insufficient Customer Balance!";
                color = 'danger';
                failed++;
            } else if (encounteredRows[uniqueKey]) {
                console.log(row['Id']);
                color = 'danger';
                reason = "Duplicate"; // Set the duplicate error message
                failed++;
            }else if ( typeof  row['Id'] === "undefined") {
                color = 'danger';
                reason = "User Id must not be null"; // Set the duplicate error message
                failed++;
            }else{
                rowHTML +='lavender';
                reason = "Good to go!";
                color = 'primary'
                success++;
            }
            var currentDate = new Date();
            var dateValue = row['Date (mm/dd/yyyy)'];
            if (!dateValue || isNaN(currentDate)) {
             dateValue = (currentDate.getMonth() + 1) + '/' + currentDate.getDate() + '/' + currentDate.getFullYear();
            }
            encounteredRows[uniqueKey] = true;
            rowHTML += ';">';
            rowHTML += '<td><span class="badge bg-'+color+'">' + reason + '</span></td>';
            rowHTML += '<td>ID#' + row['Id'] + '</td>';
            rowHTML += '<td>' + dateValue + '</td>';
            rowHTML += '<td>' + row['Client Name'] + '</td>';
            rowHTML += '<td>' + row['Amount'] + '</td>';
            rowHTML += '<td>' + row['Maintenance fee'] + '</td>';
            rowHTML += '<td>' + row['Client Balance'] + '</td>';
            rowHTML += '</tr>';
            $(tableId + " tbody").append(rowHTML);
        });
        var numRows = $(tableId + " tbody tr").length;
        $('.success-row').text(success);
        $('.failed-row').text(failed);
        $('.failed-rows').val(failed);
        $('.upload-btn').attr('disabled', false);
        if(failed<=0){
            $('.upload-btn').attr('disabled', false).text('Upload!');
        }else{
            $('.upload-btn').attr('disabled', true).text('Please Resolve the errors first!');
        }
        console.log("Number of rows in the table: " + numRows);
    }
</script>

@extends("nav")
@section('title', 'Manage Payment | Senior Life Care Trusts')
@section("wrapper")
<style>
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

<div>
    <h5 class="d-flex justify-content-start pt-3 pb-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/all_users')}}" class="text-muted fw-light pointer"><b>All Users</b></a> / <b>Manage Payment</b> </div>
    </h5>

    <!-- Bulk Upload Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Bulk Upload Transactions (Balance, Maintenance Fee, Enrollment Fee)</h5>
        </div>
        <div class="card-body">
            <div class="row upload-file">
                <div class="col-lg-12">
                    <div class="dropzone">
                        <img src="{{ url('/upload.svg') }}" class="upload-icon" />
                        <br>
                        <b>Upload/Drag Excel file here</b>
                        <form id="upload_file" enctype="multipart/form-data">
                            <input type="file" id="excelfile" onchange="ExportToTable()" class="upload-input pt-2" />
                        </form>
                    </div>
                </div>
            </div>

             <div class="row upload-result d-none gy-3">
                <div class="col-lg-4">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <h3 class="mb-2">Ready</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="fw-semibold mb-0">Rows </h6><span class="badge bg-success ready-row me-1">N/A</span>
                                    </div>
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ url('/assets/img/icons/unicons/approved.png') }}" alt="ready" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <h3 class="mb-2">Error</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="fw-semibold mb-0">Rows </h6><span class="badge bg-danger error-row me-1">N/A</span>
                                    </div>
                                    <input type="hidden" class="error-rows">
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ url('/assets/img/icons/unicons/pending.png') }}" alt="error" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <h3 class="mb-2">Pending</h3>
                                    <div class="d-flex align-items-center gap-2">
                                        <h6 class="fw-semibold mb-0">Rows </h6><span class="badge bg-warning pending-row me-1">N/A</span>
                                    </div>
                                </div>
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ url('/assets/img/icons/unicons/pending.png') }}" alt="pending" class="rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="card mt-3 mb-5">
        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 mb-0 pb-2">
            <h5 class="mb-0">File Details</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('bulk.transaction.template.download') }}" class="btn btn-info" id="downloadTemplateBtn">Download Template</a>
                <button class="btn btn-primary upload-btn" disabled>Upload</button>
                <button id="clear_form" class="btn btn-secondary"><i class="bx bx-trash"></i>Clear</button>
            </div>
        </div>
        <div class="card-body overflow-auto">
            <div class="table-responsive overflow-auto text-nowrap pb-2 scrollable-container">
                <table class="table align-middle mb-0 table-hover dataTable" id="exceltable">
                    <thead class="table-light">
                        <tr>
                            <th>Status</th>
                            <th>User Account</th>
                            <th>Name</th>
                            <th>Current Balance</th>
                            <th>Enrollment Fee Already Done</th>
                            <th>Add Balance</th>
                            <th>Payment Type</th>
                            <th>Transaction No, Card Number, Check No</th>
                            <th>Registration Fee Amount</th>
                            <th>Deduct Maintenance Type</th>
                            <th>Maintenance Fee Value</th>
                            <th>Date of Transaction</th>
                            <th>Send Remaining to Credit Card</th>
                            <th>Error Message</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    /**
     * Normalize Excel column names to snake_case (matching backend expectations)
     * Converts "User Account" -> "user_account", "Payment Type" -> "payment_type", etc.
     */
    function normalizeColumnNames(jsonData) {
        if (!jsonData || jsonData.length === 0) {
            return jsonData;
        }

        console.log('=== NORMALIZING COLUMN NAMES ===');
        console.log('Original first row keys:', Object.keys(jsonData[0] || {}));
        console.log('Original first row sample:', jsonData[0]);

        // Column name mapping: Excel headers -> backend expected names
        var columnMap = {
            'User Account': 'user_account',
            'user account': 'user_account',
            'UserAccount': 'user_account',
            'Name': 'name',
            'name': 'name',
            'Current Balance': 'current_balance',
            'current balance': 'current_balance',
            'CurrentBalance': 'current_balance',
            'Enrollment Fee Already Done': 'enrollment_fee_already_done',
            'enrollment fee already done': 'enrollment_fee_already_done',
            'EnrollmentFeeAlreadyDone': 'enrollment_fee_already_done',
            'Enrollment to One Time Registration Fee': 'enrollment_fee_already_done',
            'enrollment to one time registration fee': 'enrollment_fee_already_done',
            'EnrollmentToOneTimeRegistrationFee': 'enrollment_fee_already_done',
            'Add Balance': 'add_balance',
            'add balance': 'add_balance',
            'AddBalance': 'add_balance',
            'Payment Type': 'payment_type',
            'payment type': 'payment_type',
            'PaymentType': 'payment_type',
            'Transaction No, Card Number, Check No': 'reference_number',
            'transaction no, card number, check no': 'reference_number',
            'TransactionNo, CardNumber, CheckNo': 'reference_number',
            // Keep old reference_number for backward compatibility
            'Reference Number': 'reference_number',
            'reference number': 'reference_number',
            'ReferenceNumber': 'reference_number',
            'Registration Fee Amount': 'registration_fee_amount',
            'registration fee amount': 'registration_fee_amount',
            'RegistrationFeeAmount': 'registration_fee_amount',
            'Deduct Maintenance Type': 'deduct_maintenance_type',
            'deduct maintenance type': 'deduct_maintenance_type',
            'DeductMaintenanceType': 'deduct_maintenance_type',
            'Maintenance Fee Value': 'maintenance_fee_value',
            'maintenance fee value': 'maintenance_fee_value',
            'MaintenanceFeeValue': 'maintenance_fee_value',
            'Date Of Transaction': 'date_of_transaction',
            'date of transaction': 'date_of_transaction',
            'DateOfTransaction': 'date_of_transaction',
            'Send Remaining Amount To Credit Card': 'send_remaining_amount_to_credit_card',
            'send remaining amount to credit card': 'send_remaining_amount_to_credit_card',
            'SendRemainingAmountToCreditCard': 'send_remaining_amount_to_credit_card'
        };

        // Normalize all rows
        var normalizedData = jsonData.map(function(row, index) {
            var normalizedRow = {};
            for (var key in row) {
                if (row.hasOwnProperty(key)) {
                    var normalizedKey;
                    var trimmedKey = String(key).trim(); // Trim whitespace from key

                    // Check if trimmed key exists in map
                    if (columnMap.hasOwnProperty(trimmedKey)) {
                        normalizedKey = columnMap[trimmedKey];
                    } else {
                        // Try case-insensitive match
                        var found = false;
                        for (var mapKey in columnMap) {
                            if (mapKey.toLowerCase() === trimmedKey.toLowerCase()) {
                                normalizedKey = columnMap[mapKey];
                                found = true;
                                break;
                            }
                        }
                        if (!found) {
                            // Auto-convert: lowercase, replace spaces/hyphens with underscores
                            normalizedKey = trimmedKey.toLowerCase().replace(/[\s\-]+/g, '_').replace(/[^a-z0-9_]/g, '');
                        }
                    }
                    normalizedRow[normalizedKey] = row[key];

                    // Log first row mapping for debugging
                    if (index === 0) {
                        console.log("Mapped: '" + key + "' (trimmed: '" + trimmedKey + "') -> '" + normalizedKey + "' = " + row[key]);
                    }
                }
            }
            return normalizedRow;
        });

        console.log('Normalized first row keys:', Object.keys(normalizedData[0] || {}));
        console.log('Normalized first row sample:', normalizedData[0]);
        console.log('=== NORMALIZATION COMPLETE ===');

        return normalizedData;
    }

    /**
     * Convert Excel date serial number or date string to MM/DD/YYYY format
     * @param {number|string} dateValue - Excel date serial number or date string
     * @returns {string} - Formatted date in MM/DD/YYYY format, or original value if conversion fails
     */
    function convertExcelDate(dateValue) {
        if (!dateValue || dateValue === '' || dateValue === null || dateValue === undefined) {
            return '';
        }

        // Check if it's an Excel date serial number (numeric)
        if (!isNaN(dateValue) && parseFloat(dateValue) > 0) {
            var excelSerial = parseFloat(dateValue);

            // Excel date serial number (days since January 1, 1900)
            // Excel incorrectly treats 1900 as a leap year, so we need to adjust
            // Excel epoch is December 30, 1899 (day 0)
            var excelEpoch = new Date(1899, 11, 30); // December 30, 1899
            var jsDate = new Date(excelEpoch.getTime() + (excelSerial - 1) * 86400000);

            // Check if date is valid
            if (!isNaN(jsDate.getTime()) && jsDate.getFullYear() >= 1900 && jsDate.getFullYear() <= 2100) {
                // Format as MM/DD/YYYY
                var month = String(jsDate.getMonth() + 1).padStart(2, '0');
                var day = String(jsDate.getDate()).padStart(2, '0');
                var year = jsDate.getFullYear();
                return month + '/' + day + '/' + year;
            }
        }

        // Try to parse as date string and format it
        try {
            var parsedDate = new Date(dateValue);
            if (!isNaN(parsedDate.getTime()) && parsedDate.getFullYear() >= 1900 && parsedDate.getFullYear() <= 2100) {
                var month = String(parsedDate.getMonth() + 1).padStart(2, '0');
                var day = String(parsedDate.getDate()).padStart(2, '0');
                var year = parsedDate.getFullYear();
                return month + '/' + day + '/' + year;
            }
        } catch (e) {
            // Keep original value if parsing fails
        }

        // Return original value if all conversions fail
        return dateValue;
    }

    /**
     * Convert scientific notation (e.g., "3.432423+19", "3.432423e+19") to full number string
     * @param {string|number} value - Value that might be in scientific notation
     * @returns {string} - Full number as string, or original value if not scientific notation
     */
    function convertScientificNotation(value) {
        if (!value || value === '' || value === null || value === undefined) {
            return '';
        }

        var str = String(value).trim();

        // Try to parse as number first - JavaScript can handle scientific notation
        if (!isNaN(str) && isFinite(str)) {
            var num = parseFloat(str);
            // Check if it's a very large number that might have been in scientific notation
            // If the string representation differs from the number, it was likely scientific notation
            if (Math.abs(num) >= 1e15) {
                // Very large number - convert to string without scientific notation
                // Use toFixed(0) to avoid decimal places for reference numbers
                return num.toFixed(0);
            }
            // Regular number, return as string
            return String(num);
        }

        // Check if it's in scientific notation format (contains 'e', 'E', or '+' followed by digits)
        // Pattern: number followed by e/E/+ and then digits (e.g., "3.432423+19", "3.432423e+19", "3.432423E+19")
        var scientificNotationPattern = /^([+-]?\d*\.?\d+)[eE]?\+?(\d+)$/;
        var match = str.match(scientificNotationPattern);

        if (match) {
            try {
                var base = parseFloat(match[1]);
                var exponent = parseInt(match[2]);
                // Convert to full number
                var fullNumber = base * Math.pow(10, exponent);
                // Return as string to preserve all digits (no scientific notation)
                return fullNumber.toFixed(0); // Use toFixed(0) to avoid decimal places for reference numbers
            } catch (e) {
                // If conversion fails, return original
                return str;
            }
        }

        // Not scientific notation, return as is
        return str;
    }

    $(document).on('click', '#clear_form', function(e) {
        $('.upload-file').removeClass('d-none');
        $('.upload-result').addClass('d-none');
        $('#upload_file')[0].reset();
        $('#exceltable tbody').empty();
        $('.upload-btn').attr('disabled', true);
        $('.ready-row').text('N/A');
        $('.error-row').text('N/A');
        $('.pending-row').text('N/A');
    })

    $(document).on('click', '.upload-btn', function() {
        var fileInput = document.getElementById('excelfile');
        if (!fileInput) {
            console.warn('File input element not found');
            return;
        }
        if (!fileInput || !fileInput.files[0]) {
            swal.fire('Error', 'Please select a file first', 'error');
            return;
        }

        var readyCount = parseInt($('.ready-row').text()) || 0;
        var errorCount = parseInt($('.error-rows').val()) || 0;
        var pendingCount = parseInt($('.pending-row').text()) || 0;

        if (readyCount === 0) {
            swal.fire('Error', 'No ready rows to process. Please fill in transaction data or fix errors before uploading.', 'error');
            return;
        }

        var confirmMessage = "Upload <strong>" + readyCount + "</strong> ready row(s)?";
        if (errorCount > 0 || pendingCount > 0) {
            confirmMessage += "<br><br>";
            if (errorCount > 0) {
                confirmMessage += "<strong>" + errorCount + "</strong> row(s) with errors will be skipped.<br>";
            }
            if (pendingCount > 0) {
                confirmMessage += "<strong>" + pendingCount + "</strong> pending row(s) will be skipped.";
            }
        }

        swal.fire({
            title: 'Confirm Upload',
            html: confirmMessage,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, Upload',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#28a745'
        }).then((result) => {
            if (result.isConfirmed) {
                $('.upload-btn').attr('disabled', true).text('Uploading...');
                var formData = new FormData();
                formData.append('import_file', fileInput.files[0]);

                $.ajax({
                    type: 'POST',
                    url: "{{ route('bulk.add.user.balance') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('.upload-btn').text('Upload').attr('disabled', false);
                        if(data.success) {
                             swal.fire('Success', data.message, 'success').then(() => {
                                window.location.reload();
                            });
                        } else {
                            swal.fire('Error', data.message, 'error');
                        }
                    },
                    error: function(xhr) {
                         $('.upload-btn').text('Upload').attr('disabled', false);
                         var errorMsg = 'Something went wrong';
                         if(xhr.responseJSON && xhr.responseJSON.message) {
                             errorMsg = xhr.responseJSON.message;
                         }
                        swal.fire('Error', errorMsg, 'error');
                    }
                });
            }
        });
    });

    function ExportToTable() {
        var regex = /(.xlsx|.xls)$/;
        if (regex.test($("#excelfile").val().toLowerCase())) {
            if (typeof FileReader != "undefined") {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var data = e.target.result;
                    var workbook = XLSX.read(data, {
                        type: 'binary'
                    });
                    var sheet_name_list = workbook.SheetNames;
                    var cnt = 0;
                    sheet_name_list.forEach(function(y) {
                        // Read with header row - this ensures first row is used as headers
                        var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y], {
                            defval: '', // Default value for empty cells
                            raw: false  // Convert numbers to strings for consistency
                        });

                        console.log('=== EXCEL FILE READ ===');
                        console.log('Sheet name:', y);
                        console.log('Total rows:', exceljson.length);
                        console.log('First row (before normalization):', exceljson[0]);
                        console.log('First row keys (before normalization):', Object.keys(exceljson[0] || {}));

                        if (exceljson.length > 0 && cnt == 0) {
                            // Normalize column names to snake_case (matching backend expectations)
                            exceljson = normalizeColumnNames(exceljson);

                            console.log('First row (after normalization):', exceljson[0]);
                            console.log('First row keys (after normalization):', Object.keys(exceljson[0] || {}));
                            console.log('user_account value:', exceljson[0]['user_account']);

                            // First show basic preview
                            BindTablePreview(exceljson, "#exceltable");
                            // Then validate with backend (including balance checks)
                            validateWithBackend(exceljson);
                            cnt++;
                        }
                    });
                    $('.upload-file').addClass('d-none');
                    $('.upload-result').removeClass('d-none');
                    $("#exceltable").show();
                };
                reader.readAsBinaryString($("#excelfile")[0].files[0]);
            } else {
                swal.fire('warning', 'Sorry, Your browser does not support HTML5', 'warning');
            }
        } else {
            swal.fire('warning', 'Please upload a valid file', 'warning');
            $('#upload_file')[0].reset();
        }
    }

    function validateWithBackend(jsonData) {
        // Show loading state
        $('#exceltable tbody tr').each(function() {
            $(this).find('td:last').html('<small class="text-info">Validating...</small>');
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('bulk.upload.validate') }}",
            data: {
                rows: jsonData,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Validation response:', response);
                if (response.success && response.results) {
                    console.log('Validation results:', response.results);
                    // Debug: Check if enrollment_fee_done is in results
                    response.results.forEach(function(result, idx) {
                        if (result.details && result.details.enrollment_fee_done !== undefined) {
                            console.log('Row', result.row_number, 'has enrollment_fee_done:', result.details.enrollment_fee_done);
                        } else {
                            console.warn('Row', result.row_number, 'MISSING enrollment_fee_done in details. Details:', result.details);
                        }
                    });
                    updateTableWithValidationResults(response.results);
                } else {
                    swal.fire('Error', response.message || 'Validation failed', 'error');
                }
            },
            error: function(xhr) {
                var errorMsg = 'Error validating file';
                if(xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                swal.fire('Error', errorMsg, 'error');
            }
        });
    }

    function updateTableWithValidationResults(validationResults) {
        var ready = 0;
        var error = 0;
        var pending = 0;

        // Create a map of row_number to validation result for easier lookup
        var validationMap = {};
        validationResults.forEach(function(result) {
            validationMap[result.row_number] = result;
        });

        console.log('=== UPDATING TABLE WITH VALIDATION RESULTS ===');
        console.log('Total validation results:', validationResults.length);
        console.log('Total table rows:', $('#exceltable tbody tr').length);
        console.log('Validation map:', validationMap);

        // Update each row in the table
        $('#exceltable tbody tr').each(function(index) {
            var rowNumber = index + 2; // Row number in Excel (accounting for header)
            var result = validationMap[rowNumber];

            var $row = $(this);
            var $cells = $row.find('td');

            if ($cells.length < 14) {
                console.warn('Row', rowNumber, 'has only', $cells.length, 'cells, expected 14. Skipping update.');
                return;
            }

            if (!result) {
                console.log('No validation result for row', rowNumber);
                return; // Skip if no validation result for this row
            }

            console.log('Processing table row index:', index, 'Excel row number:', rowNumber);
            console.log('Found result:', result);
            console.log('Row has', $cells.length, 'cells');
            console.log('Updating row', rowNumber, 'with user_account:', result.user_account, 'user_name:', result.user_name);

            // Update user account and name from validation results (backend has the correct data)
            if (result.user_account !== null && result.user_account !== undefined && result.user_account !== '') {
                var accountValue = String(result.user_account);
                $cells.eq(1).text(accountValue); // User Account column (index 1)
                console.log('Updated User Account column (index 1) to:', accountValue);
            }
            if (result.user_name && result.user_name !== '') {
                $cells.eq(2).text(result.user_name); // Name column (index 2)
                console.log('Updated Name column (index 2) to:', result.user_name);
            }

            // Update current balance from details if available
            if (result.details && result.details.current_balance) {
                var balanceStr = String(result.details.current_balance).replace(/,/g, '');
                var balance = parseFloat(balanceStr);
                if (!isNaN(balance)) {
                    var formattedBalance = '$' + balance.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                    $cells.eq(3).html('<strong class="info-column-cell">' + formattedBalance + '</strong>'); // Current Balance column (index 3)
                    console.log('Updated Current Balance to:', formattedBalance);
                }
            }

            // Update enrollment fee status from details - ALWAYS use backend value (source of truth from database)
            // Column D is read-only and should only show Yes/No based on whether user already has enrollment fee
            var enrollmentFeeStatus = 'N/A'; // Default fallback
            
            if (result.details && result.details.enrollment_fee_done !== undefined && result.details.enrollment_fee_done !== null) {
                enrollmentFeeStatus = String(result.details.enrollment_fee_done).trim();
                // Normalize to Yes/No format
                if (enrollmentFeeStatus.toLowerCase() === 'yes' || enrollmentFeeStatus === '1' || enrollmentFeeStatus === 'true') {
                    enrollmentFeeStatus = 'Yes';
                } else if (enrollmentFeeStatus.toLowerCase() === 'no' || enrollmentFeeStatus === '0' || enrollmentFeeStatus === 'false') {
                    enrollmentFeeStatus = 'No';
                } else {
                    // If value is not Yes/No, default to No
                    enrollmentFeeStatus = 'No';
                }
                console.log('Updated Enrollment Fee status to:', enrollmentFeeStatus, '(from database)');
            } else if (result.user_account) {
                // If user exists but enrollment_fee_done is not in details, this shouldn't happen
                // Backend should always return enrollment_fee_done for existing users
                console.warn('Enrollment fee status not found in validation result for user:', result.user_account, 'Result:', result);
                // Keep as N/A - backend should have provided this value
            }
            
            // Always update the cell, even if it's N/A (for users that don't exist)
            $cells.eq(4).text(enrollmentFeeStatus); // Enrollment Fee Already Done column (index 4)

            // Update transaction data columns from details
            if (result.details) {
                // Add Balance (column index 5)
                if (result.details.deposit_amount && result.details.deposit_amount !== '0.00' && result.details.deposit_amount !== 'N/A') {
                    var deposit = parseFloat(String(result.details.deposit_amount).replace(/,/g, ''));
                    if (!isNaN(deposit)) {
                        $cells.eq(5).text(deposit.toFixed(2));
                    }
                }

                // Payment Type (column index 6)
                if (result.details.payment_type && result.details.payment_type !== 'N/A') {
                    $cells.eq(6).text(result.details.payment_type);
                }

                // Reference Number (column index 7) - single column with comma-separated header
                if (result.details.reference_number && result.details.reference_number !== 'N/A') {
                    $cells.eq(7).text(result.details.reference_number);
                }

                // Registration Fee Amount (column index 8)
                if (result.details.registration_fee && result.details.registration_fee !== '0.00' && result.details.registration_fee !== 'N/A') {
                    var regFee = parseFloat(String(result.details.registration_fee).replace(/,/g, ''));
                    if (!isNaN(regFee)) {
                        $cells.eq(8).text(regFee.toFixed(2));
                    }
                }
            }

            if (result.status === 'Skipped') {
                $(this).find('td:first').html('<span class="badge bg-secondary">Skipped</span>');
                var errorHtml = '<small class="text-muted">';
                if (result.errors && result.errors.length > 0) {
                    result.errors.forEach(function(err, idx) {
                        if (idx > 0) errorHtml += '<br>';
                        errorHtml += err;
                    });
                } else {
                    errorHtml += 'Empty row';
                }
                errorHtml += '</small>';
                $(this).find('td:last').html(errorHtml);
                $(this).attr('data-valid', 'false');
            } else if (result.status === 'Ready') {
                $(this).find('td:first').html('<span class="badge bg-success">Ready</span>');
                $(this).find('td:last').html('<small class="text-success">No errors - Ready to process</small>');
                $(this).attr('data-valid', 'true');
                ready++;
            } else if (result.status === 'Pending') {
                $(this).find('td:first').html('<span class="badge bg-warning">Pending</span>');
                $(this).find('td:last').html('<small class="text-warning">No transaction data filled - Please fill in transaction details</small>');
                $(this).attr('data-valid', 'false');
                pending++;
            } else if (result.status === 'Error') {
                $(this).find('td:first').html('<span class="badge bg-danger">Error</span>');
                var errorHtml = '<small class="text-danger">';
                if (result.errors && result.errors.length > 0) {
                    result.errors.forEach(function(err, idx) {
                        if (idx > 0) errorHtml += '<br>';
                        errorHtml += err;
                    });
                } else {
                    errorHtml += 'Validation error';
                }
                errorHtml += '</small>';
                $(this).find('td:last').html(errorHtml);
                $(this).attr('data-valid', 'false');
                error++;
            }
        });

        // Update summary cards
        $('.ready-row').text(ready);
        $('.error-row').text(error);
        $('.error-rows').val(error);
        $('.pending-row').text(pending);

        // Enable upload button only if there are ready rows
        if(ready > 0) {
            $('.upload-btn').attr('disabled', false).removeClass('btn-secondary').addClass('btn-primary');
            var message = '<strong>' + ready + '</strong> row(s) are ready and will be processed.';
            if (error > 0 || pending > 0) {
                message += '<br><br>';
                if (error > 0) {
                    message += '<strong>' + error + '</strong> row(s) have errors and will be skipped.<br>';
                }
                if (pending > 0) {
                    message += '<strong>' + pending + '</strong> row(s) are pending (no transaction data) and will be skipped.';
                }
            }
            swal.fire({
                title: 'Validation Complete',
                html: message,
                icon: 'info',
                confirmButtonText: 'OK'
            });
        } else {
            $('.upload-btn').attr('disabled', true).removeClass('btn-primary').addClass('btn-secondary');
            var message = 'No ready rows to process. ';
            if (pending > 0) {
                message += '<strong>' + pending + '</strong> row(s) are pending (please fill in transaction data). ';
            }
            if (error > 0) {
                message += '<strong>' + error + '</strong> row(s) have errors (please fix errors).';
            }
            swal.fire({
                title: 'No Ready Rows',
                html: message,
                icon: 'warning',
                confirmButtonText: 'OK'
            });
        }
    }

    function BindTablePreview(jsonData, tableId) {
        $(tableId + " tbody").empty();
        var success = 0;
        var failed = 0;

        console.log('=== BIND TABLE PREVIEW ===');
        console.log('Total rows to preview:', jsonData.length);
        if (jsonData.length > 0) {
            console.log('First row in preview:', jsonData[0]);
            console.log('First row keys:', Object.keys(jsonData[0]));
        }

        jsonData.forEach(function(row, index) {
            var rowNumber = index + 2; // Account for header row + 1-based index
            var color = 'info';
            var status = "Validating...";
            var errorMessage = "";
            var isValid = false; // Start as false, will be updated by validation

            // Debug first few rows
            if (index < 3) {
                console.log('=== PREVIEW ROW ' + index + ' ===');
                console.log('Row keys:', Object.keys(row));
                console.log('Row full data:', row);
                console.log('user_account (normalized):', row['user_account']);
                console.log('user_account (original):', row['User Account']);
                console.log('name (normalized):', row['name']);
                console.log('name (original):', row['Name']);
            }

            // Get values from row - handle both string and number types
            // Try multiple possible key names (normalized and original)
            var userAccount = row['user_account'] || row['User Account'] || row['user account'] || '';
            if (userAccount !== null && userAccount !== undefined && userAccount !== '') {
                userAccount = String(userAccount).trim();
            } else {
                userAccount = '';
            }

            var name = row['name'] || row['Name'] || '';
            if (name !== null && name !== undefined) {
                name = String(name).trim();
            } else {
                name = '';
            }

            // Get informational columns - try normalized and original keys
            var currentBalance = row['current_balance'] || row['Current Balance'] || row['current balance'] || '';
            if (currentBalance !== '' && currentBalance !== null && currentBalance !== undefined) {
                // Format as currency if it's a number
                if (!isNaN(parseFloat(currentBalance))) {
                    currentBalance = '$' + parseFloat(currentBalance).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                }
            } else {
                currentBalance = 'N/A';
            }

            // Column D: Enrollment Fee Already Done - This is read-only and should only show Yes/No from database
            // Read from Excel file initially (will be overwritten by backend validation)
            var enrollmentFeeDone = row['enrollment_fee_already_done'] || 
                                    row['Enrollment Fee Already Done'] || 
                                    row['enrollment fee already done'] ||
                                    row['Enrollment to One Time Registration Fee'] ||
                                    row['enrollment to one time registration fee'] || '';
            if (enrollmentFeeDone !== null && enrollmentFeeDone !== undefined) {
                enrollmentFeeDone = String(enrollmentFeeDone).trim();
                // Normalize to Yes/No format - only accept Yes/No values
                if (enrollmentFeeDone.toLowerCase() === 'yes' || enrollmentFeeDone === '1' || enrollmentFeeDone === 'true') {
                    enrollmentFeeDone = 'Yes';
                } else if (enrollmentFeeDone.toLowerCase() === 'no' || enrollmentFeeDone === '0' || enrollmentFeeDone === 'false') {
                    enrollmentFeeDone = 'No';
                } else {
                    // If value is not Yes/No, set to empty (will be updated by backend)
                    enrollmentFeeDone = '';
                }
            }
            if (enrollmentFeeDone === '') {
                enrollmentFeeDone = 'N/A'; // Will be updated by backend validation
            }

            // Get transaction data - try normalized and original keys
            var addBalance = parseFloat(row['add_balance'] || row['Add Balance'] || row['add balance'] || 0) || 0;
            var paymentType = (row['payment_type'] || row['Payment Type'] || row['payment type'] || '').toString().toLowerCase().trim();

            // Get reference number - handle comma-separated header "Transaction No, Card Number, Check No"
            // Try multiple possible key formats
            var referenceNumber = row['reference_number'] ||
                                  row['Transaction No, Card Number, Check No'] ||
                                  row['transaction no, card number, check no'] ||
                                  row['transaction_no_card_number_check_no'] ||
                                  row['Reference Number'] ||
                                  row['reference number'] || '';

            if (referenceNumber !== null && referenceNumber !== undefined) {
                referenceNumber = String(referenceNumber).trim();
                // Convert scientific notation to full number (e.g., "3.432423+19" -> "34324230000000000000")
                referenceNumber = convertScientificNotation(referenceNumber);
            } else {
                referenceNumber = '';
            }
            var registrationFeeAmount = parseFloat(row['registration_fee_amount'] || row['Registration Fee Amount'] || row['registration fee amount'] || 0) || 0;
            var deductMaintenanceType = (row['deduct_maintenance_type'] || row['Deduct Maintenance Type'] || row['deduct maintenance type'] || '').toString().toLowerCase().trim();
            var maintenanceFeeValue = parseFloat(row['maintenance_fee_value'] || row['Maintenance Fee Value'] || row['maintenance fee value'] || 0) || 0;

            // Convert Excel date number to readable format (MM/DD/YYYY)
            var dateOfTransaction = row['date_of_transaction'] || row['Date Of Transaction'] || row['date of transaction'] || '';
            dateOfTransaction = convertExcelDate(dateOfTransaction);

            var sendRemaining = (row['send_remaining_amount_to_credit_card'] || row['Send Remaining Amount To Credit Card'] || row['send remaining amount to credit card'] || '').toString().toLowerCase().trim();

            // Skip completely empty rows (no user_account)
            // But show them in preview so user can see what's happening
            if (!userAccount || userAccount === '' || userAccount === 'N/A') {
                // Check if this row has ANY data at all
                var hasAnyData = false;
                for (var key in row) {
                    if (row.hasOwnProperty(key) && row[key] !== null && row[key] !== undefined && String(row[key]).trim() !== '') {
                        hasAnyData = true;
                        break;
                    }
                }

                if (!hasAnyData) {
                    // Completely empty row - skip it
                    console.log('Skipping completely empty row:', index);
                    return;
                }

                // Row has some data but no user_account - show as error
                status = "Error";
                color = 'danger';
                errorMessage = "User Account is required";
                isValid = false;
                failed++;
            }

            // Basic client-side validation (backend will do full validation including balance checks)
            // Only flag obvious errors here, backend will handle business logic
            if (isNaN(parseInt(userAccount)) || parseInt(userAccount) <= 0) {
                status = "Error";
                color = 'danger';
                errorMessage = "User Account must be a valid number";
                isValid = false;
                failed++;
            }
            // Validate add_balance is numeric if provided
            else if (row['add_balance'] !== null && row['add_balance'] !== undefined && row['add_balance'] !== '' && isNaN(addBalance)) {
                status = "Error";
                color = 'danger';
                errorMessage = "Add Balance must be a valid number";
                isValid = false;
                failed++;
            }
            // Validate add_balance is not negative
            else if (addBalance < 0) {
                status = "Error";
                color = 'danger';
                errorMessage = "Add Balance cannot be negative";
                isValid = false;
                failed++;
            }
            // If add_balance > 0, validate required fields
            else if (addBalance > 0) {
                if (!paymentType || paymentType === '') {
                    status = "Error";
                    color = 'danger';
                    errorMessage = "Payment Type is required when Add Balance > 0";
                    isValid = false;
                    failed++;
                } else if (!['ach', 'card', 'check'].includes(paymentType)) {
                    status = "Error";
                    color = 'danger';
                    errorMessage = "Payment Type must be 'ach', 'card', or 'check'";
                    isValid = false;
                    failed++;
                } else if (!referenceNumber || referenceNumber === '') {
                    var refName = paymentType === 'ach' ? 'Transaction No.' : (paymentType === 'check' ? 'Check No.' : 'Card No.');
                    status = "Error";
                    color = 'danger';
                    errorMessage = refName + " is required for " + paymentType;
                    isValid = false;
                    failed++;
                } else if (!dateOfTransaction || dateOfTransaction === '') {
                    status = "Error";
                    color = 'danger';
                    errorMessage = "Date of Transaction is required when Add Balance > 0";
                    isValid = false;
                    failed++;
                } else {
                    // Basic validations passed, but backend will do full validation including balance checks
                    // Keep as "Validating..." until backend validation completes
                    status = "Validating...";
                    color = 'info';
                    errorMessage = "";
                    isValid = false; // Will be updated by backend validation
                }
            }
            // Validate maintenance fee fields
            else if (deductMaintenanceType && deductMaintenanceType !== '' && !['percentage', 'fixed'].includes(deductMaintenanceType)) {
                status = "Error";
                color = 'danger';
                errorMessage = "Deduct Maintenance Type must be 'percentage' or 'fixed'";
                isValid = false;
                failed++;
            } else if (deductMaintenanceType && deductMaintenanceType !== '' && maintenanceFeeValue <= 0) {
                status = "Error";
                color = 'danger';
                errorMessage = "Maintenance Fee Value is required when Deduct Maintenance Type is specified";
                isValid = false;
                failed++;
            } else if (maintenanceFeeValue > 0 && (!deductMaintenanceType || deductMaintenanceType === '')) {
                status = "Error";
                color = 'danger';
                errorMessage = "Deduct Maintenance Type is required when Maintenance Fee Value > 0";
                isValid = false;
                failed++;
            } else if (maintenanceFeeValue < 0) {
                status = "Error";
                color = 'danger';
                errorMessage = "Maintenance Fee Value cannot be negative";
                isValid = false;
                failed++;
            }
            // Validate registration fee
            else if (registrationFeeAmount < 0) {
                status = "Error";
                color = 'danger';
                errorMessage = "Registration Fee Amount cannot be negative";
                isValid = false;
                failed++;
            }
            // Validate send_remaining_amount_to_credit_card
            else if (sendRemaining && sendRemaining !== '' && !['yes', 'no'].includes(sendRemaining)) {
                status = "Error";
                color = 'danger';
                errorMessage = "Send Remaining Amount must be 'Yes' or 'No'";
                isValid = false;
                failed++;
            } else if (sendRemaining === 'yes' && addBalance <= 0) {
                status = "Error";
                color = 'danger';
                errorMessage = "'Send Remaining Amount to Credit Card' can only be used when Add Balance > 0";
                isValid = false;
                failed++;
            }
            // All basic validations passed - backend will do full validation including balance checks
            else {
                status = "Validating...";
                color = 'info';
                errorMessage = "";
                isValid = false; // Will be updated by backend validation
            }

            // Store validation status in data attribute for backend processing
            var rowHTML = '<tr style="background-color: lavender;" data-valid="' + isValid + '" data-row-index="' + index + '">';
            rowHTML += '<td class="text-nowrap"><span class="badge bg-' + color + '">' + status + '</span></td>';
            rowHTML += '<td class="text-nowrap">' + userAccount + '</td>';
            rowHTML += '<td class="text-nowrap">' + name + '</td>';
            rowHTML += '<td class="text-nowrap"><strong>' + currentBalance + '</strong></td>';
            rowHTML += '<td class="text-nowrap">' + enrollmentFeeDone + '</td>';
            rowHTML += '<td class="text-nowrap">' + addBalance + '</td>';
            rowHTML += '<td class="text-nowrap">' + paymentType + '</td>';
            rowHTML += '<td class="text-nowrap">' + referenceNumber + '</td>'; // Transaction No, Card Number, Check No
            rowHTML += '<td class="text-nowrap">' + registrationFeeAmount + '</td>';
            rowHTML += '<td class="text-nowrap">' + deductMaintenanceType + '</td>';
            rowHTML += '<td class="text-nowrap">' + maintenanceFeeValue + '</td>';
            rowHTML += '<td class="text-nowrap">' + dateOfTransaction + '</td>';
            rowHTML += '<td class="text-nowrap">' + (sendRemaining || 'No') + '</td>';
            // Show error message or loading state (will be updated by backend validation)
            var errorDisplay = errorMessage || '<small class="text-info">Validating...</small>';
            rowHTML += '<td class="text-nowrap ' + (isValid ? (errorMessage ? 'text-danger' : 'text-info') : 'text-danger') + '">' + errorDisplay + '</td>';
            rowHTML += '</tr>';

            $(tableId + " tbody").append(rowHTML);
        });

        // Initial counts (will be updated by backend validation)
        $('.ready-row').text('Validating...');
        $('.error-row').text('Validating...');
        $('.pending-row').text('Validating...');
        $('.upload-btn').attr('disabled', true);
    }

    // Error handler for PerfectScrollbar and other initialization errors
    window.addEventListener('error', function(e) {
        // Suppress PerfectScrollbar errors if element doesn't exist
        if (e.message && e.message.includes('PerfectScrollbar')) {
            console.warn('PerfectScrollbar initialization skipped:', e.message);
            e.preventDefault();
            return true;
        }
        // Suppress style property errors on null elements
        if (e.message && e.message.includes("Cannot read properties of null") && e.message.includes("style")) {
            console.warn('Style property access on null element:', e.message);
            e.preventDefault();
            return true;
        }
    }, true);
</script>
@endsection

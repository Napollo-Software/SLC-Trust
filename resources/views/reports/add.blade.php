@extends('nav')
@section('title', 'Add Report Senior Life Care Trusts')
@section('wrapper')
<style>
    .data-table {
        overflow: auto;
        max-height: 100%;
    }

    .card-container {
        display: flex;
        height: calc(100vh - 100px);
        /* Adjust as needed */
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        flex-grow: 0;
        flex-shrink: 0;
    }

    .card .card-header {
        font-weight: 500;
    }

    .card-header:first-child {
        border-radius: 0.35rem 0.35rem 0 0;
    }

    .card-header {
        margin-bottom: 0;
        background-color: rgba(33, 40, 50, 0.03);
        border-bottom: 1px solid rgba(33, 40, 50, 0.125);
    }
</style>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Add Report</b> </div>
    </h5>
    <form method="post">
        @csrf
        <div class="row card-container" style="height:125%">
            <div class="col-md-3 align-self-start ">
                <div class="card scrollable-container">
                    <h5 class="card-header pb-2 pt-2">Overview</h5>
                    <div class="card-body ">
                        <div class="col-md-12 p-2">
                            <label for="report_title" class="form-label">Select Object*</label>
                            <select class="form-select" id="object" name="object">
                                <option value="" disabled selected>Select an Object</option>
                                <option value="referral">Referral</option>
                                <option value="lead">Lead</option>
                                <option value="account">Account</option>
                                <option value="contact">Contact</option>
                            </select>
                            @error('report_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 p-3 ">
                            <label for="">Fields*</label>
                            <button style="float: right; " type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#fieldsModal">
                                Fields
                            </button>
                        </div>
                        <div class="modal fade" id="fieldsModal" tabindex="-1" aria-labelledby="fieldsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="fieldsModalLabel">Select Fields</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12 p-2">
                                            <label for="form-label">Fields*</label>
                                            <br>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="account">
                                                    <label class="form-check-label" for="account">Account</label>
                                                    <div id="accountSubnode"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="referral">
                                                    <label class="form-check-label" for="referral">Referral</label>
                                                    <div id="referralSubnode"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="lead">
                                                    <label class="form-check-label" for="lead">Lead</label>
                                                    <div id="leadSubnode"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="contacts">
                                                    <label class="form-check-label" for="contacts">Contacts</label>
                                                    <div id="contactsSubnode"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 px-2">
                            <label for="form-label">Report Title*</label>
                            <input type="text" class="form-control" id="report_title" name="report_title">
                            @error('report_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 p-2">
                            <label for="form-label">Report Description*</label>
                            <input type="text" class="form-control" id="report_description" name="report_description">
                            @error('report_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 px-2 pb-1">
                            <label for="form-label">Category*</label>
                            <select class="form-control" id="category" name="category">
                                <option value="" selected disabled>--Select Category</option>
                                <option value="referral">Referral</option>
                                <option value="lead">Lead</option>
                                <option value="account">Account</option>
                                <option value="contact">Contact</option>
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 px-2">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control date" id="start_date" name="start_date" value="{{ old('start_date') }}">
                            @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 p-2">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control date" id="end_date" name="end_date" value="{{ old('end_date') }}">
                        </div>
                        <div class="row p-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="typeView" id="detailsRadio" value="details" checked>
                                    <label class="form-check-label" for="detailsRadio">Details</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="typeView" id="summaryRadio" value="summary">
                                    <label class="form-check-label" for="summaryRadio">Summary</label>
                                </div>
                            </div>
                        </div>
                        <button name="generate" class="btn btn-primary pb-1 pt-1 ml-2" onclick="event.preventDefault(); sendSelectedColumn(checkedReferral, checkedLead, checkedAccount, checkedContacts)">Generate</button>
                        <button class="btn btn-secondary pb-1 pt-1 ml-2" onclick="clearInputFields()">Clear</button>

                        <!-- <button name="generate" class="btn btn-primary" onclick="event.preventDefault(); sendSelectedColumn(checkedReferral, checkedLead, checkedAccount, checkedContacts)">Generate</button> -->
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-primary" style="color: white" id="btnExport">Export to Excel</a>
                                {{-- <button class="btn btn-secondary m-2 clear-form">Cancel</button> --}}
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card " id="tables_card">
                    <div class="card-header d-flex justify-content-between pt-2 pb-0">
                        <h5>Details</h5>
                        <div class="mb-1">
                            <span id="saveButtonDiv"></span>
                            <span id="excelButtonDiv"></span>
                        </div>
                    </div>
                    <div class="card-body table-container" style="height: 680px">
                        <div class="data-table">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
    var referralColumnMappings = {
        'id': 'ID',
        'first_name': 'First Name',
        'last_name': 'Last Name',
        'case_type': 'Case Type',
        'age': 'Age',
        'status': 'Status',
        'email_status': 'Email Status',
        'phone_number': 'Phone Number',
        'gender': 'Gender',
        'date_of_birth': 'Date of Birth',
        'email': 'Email',
        'country': 'Country',
        'city': 'City',
        'state': 'State',
        'address': 'Address',
        'zip_code': 'Zip Code',
        'apt_suite': 'Apt Suite',
        'patient_ssn': 'Patient SSN',
        'medicaid_number': 'Medicaid Number',
        'medicaid_plan': 'Medicaid Plan',
        'medicare_number': 'Medicare Number',
        'source_type': 'Source Type',
        'admission_date': 'Admission Date',
        'trustEsign': 'TrustEsign',
        'trustDocument': 'TrustDocument',
        'trustFinance': 'TrustFinance',
        'trustCheckList': 'TrustCheckList',
        'created_by': 'Created By',
        'intake': 'Intake',
        'marketer': 'Marketer',
        'created_at': 'Created At',
        'updated_at': 'Updated At'
    };
    var leadColumnMappings = {
        'id': 'ID',
        'case_type_id': 'Case Type ID',
        'language': 'Language',
        'contact_first_name': 'Contact First Name',
        'contact_last_name': 'Contact Last Name',
        'contact_phone': 'Contact Phone',
        'contact_email': 'Contact Email',
        'relation_to_patient': 'Relation to Patient',
        'patient_first_name': 'Patient First Name',
        'patient_last_name': 'Patient Last Name',
        'patient_phone': 'Patient Phone',
        'patient_email': 'Patient Email',
        'interested_in': 'Interested In',
        'sub_status': 'Sub Status',
        'vendor_id': 'Vendor ID',
        'converted_to_referral': 'Converted to Referral',
        'case_type': 'Case Type',
        'note': 'Note',
        'source_type': 'Source Type',
        'source_id': 'Source ID',
        'source': 'Source',
        'created_at': 'Created At',
        'updated_at': 'Updated At'
    };
    var contactsColumnMappings = {
        'id': 'ID',
        'fname': 'First Name',
        'lname': 'Last Name',
        'name_of_practice': 'Name of Practice',
        'account': 'Account',
        'phone': 'Phone',
        'email': 'Email',
        'fax': 'Fax',
        'ext_number': 'Ext Number',
        'country': 'Country',
        'state': 'State',
        'city': 'City',
        'zip_code': 'Zip Code',
        'address': 'Address',
        'designation': 'Designation',
        'vendor_id': 'Vendor ID',
        'created_by': 'Created by',
        'updated_at': 'Updated Date',
        'created_at': 'Created Date',
    };
    var accountColumnMappings = {
        'id': 'ID',
        'name': 'Name',
        'address_2': 'Address 2',
        'website': 'Website',
        'country': 'Country',
        'address': 'Address',
        'state': 'State',
        'city': 'City',
        'zipcode': 'Zip Code',
        'email': 'Email',
        'vendor_type': 'Account Type',
        'vendor_type_name': 'Account Type Name',
        'created_by': 'Created By',
        'created_at': 'Created Date',
        'updated_at': 'Updated Date',
        'phone': 'Phone Number',
    };

    function clearInputFields() {
        $('input[type="text"]').val('');
        $('input[type="checkbox"]').prop('checked', false);
    }


    var checkedReferral = [];
    var checkedLead = [];
    var checkedAccount = [];
    var checkedContacts = [];
    var tableArrays = {};

    $(document).ready(function() {
        $('#referral').on('change', function() {
            referralColumns();
        });
        $('#account').on('change', function() {
            accountColumns();
        });
        $('#contacts').on('change', function() {
            contactColumns();
        });
        $('#lead').on('change', function() {
            leadColumns();
        });
        var checkedCheckboxes = [];

        function accountColumns() {
            var selectedColumns = {};
            $('input[type="checkbox"]').each(function() {
                selectedColumns[this.id] = this.checked ? 1 : 0;
                if (this.checked) {
                    checkedCheckboxes.push(this.value);
                }
                $(this).change(function() {
                    if (this.checked) {
                        checkedCheckboxes.push($(this).next().text().trim());
                    } else {
                        var label = $(this).next().text().trim();
                        var index = checkedCheckboxes.indexOf(label);
                        if (index !== -1) {
                            checkedCheckboxes.splice(index, 1);
                        }
                    }
                });
            });
            $.ajax({
                url: '/get-table-columns',
                method: 'GET',
                data: selectedColumns,
                success: function(response) {
                    var detailsSection = $('#tables_card .data-table');
                    var accountSection = $('#accountSubnode');


                    detailsSection.empty();
                    accountSection.empty();


                    function handleTableCheckboxes(tableName, columnMappings, checkedArray) {
                        var columnsToDisplay = response[tableName].filter(column => columnMappings[column] !== undefined);
                        if (columnsToDisplay.length > 0) {

                            columnsToDisplay.forEach(column => {
                                if (tableName == 'account') {
                                    var checkboxHTML = '<label><input class="' + tableName + 'ColumnChecks" type="checkbox" name="columns" value="' + column + '"> ' + columnMappings[column] + '</label><br>';
                                    accountSection.append(checkboxHTML);
                                }
                            });

                            var selectAllHTML = '<label><input type="checkbox" id="select-all-' + tableName + '"> Select All</label><br>';
                            $('#' + tableName + 'Subnode').prepend(selectAllHTML);
                            $('#select-all-' + tableName).change(function() {
                                var isChecked = $(this).is(':checked');
                                $('.' + tableName + 'ColumnChecks').prop('checked', isChecked);
                                if (isChecked) {
                                    columnsToDisplay.forEach(column => {
                                        var value = column;
                                        if (!checkedArray.includes(value)) {
                                            checkedArray.push(value);
                                        }
                                    });
                                } else {
                                    columnsToDisplay.forEach(column => {
                                        var value = $(this).val();
                                        var index = checkedArray.indexOf(value);
                                        if (index !== -1) {
                                            checkedArray.splice(index, 1);
                                        }
                                    });
                                }
                            });
                            $('.' + tableName + 'ColumnChecks').change(function() {
                                var value = $(this).val();
                                if ($(this).is(':checked')) {
                                    if (!checkedArray.includes(value)) {
                                        checkedArray.push(value);
                                    }
                                } else {
                                    var index = checkedArray.indexOf(value);
                                    if (index !== -1) {
                                        checkedArray.splice(index, 1);
                                    }
                                }
                            });
                        }
                    }

                    var tableArrays = {};

                    for (var tableName in response) {


                        var columnMappings;

                        if (!tableArrays[tableName]) {
                            tableArrays[tableName] = [];
                        }

                        if (tableName === 'account') {
                            columnMappings = accountColumnMappings;
                            handleTableCheckboxes(tableName, columnMappings, tableArrays['account']);
                        }
                    }

                    checkedAccount = tableArrays.account;
                },
            });
        }

        function contactColumns() {
            var selectedColumns = {};
            $('input[type="checkbox"]').each(function() {
                selectedColumns[this.id] = this.checked ? 1 : 0;
                if (this.checked) {
                    checkedCheckboxes.push(this.value);
                }
                $(this).change(function() {
                    if (this.checked) {
                        checkedCheckboxes.push($(this).next().text().trim());
                    } else {
                        var label = $(this).next().text().trim();
                        var index = checkedCheckboxes.indexOf(label);
                        if (index !== -1) {
                            checkedCheckboxes.splice(index, 1);
                        }
                    }
                });
            });
            $.ajax({
                url: '/get-table-columns',
                method: 'GET',
                data: selectedColumns,
                success: function(response) {
                    var detailsSection = $('#tables_card .data-table');
                    var contactSection = $('#contactsSubnode');

                    detailsSection.empty();
                    contactSection.empty();

                    function handleTableCheckboxes(tableName, columnMappings, checkedArray) {
                        var columnsToDisplay = response[tableName].filter(column => columnMappings[column] !== undefined);
                        if (columnsToDisplay.length > 0) {

                            columnsToDisplay.forEach(column => {
                                if (tableName == 'contacts') {
                                    var checkboxHTML = '<label><input class="' + tableName + 'ColumnChecks" type="checkbox" name="columns" value="' + column + '"> ' + columnMappings[column] + '</label><br>';
                                    contactSection.append(checkboxHTML);
                                }
                            });

                            var selectAllHTML = '<label><input type="checkbox" id="select-all-' + tableName + '"> Select All</label><br>';
                            $('#' + tableName + 'Subnode').prepend(selectAllHTML);
                            $('#select-all-' + tableName).change(function() {
                                var isChecked = $(this).is(':checked');
                                $('.' + tableName + 'ColumnChecks').prop('checked', isChecked);
                                if (isChecked) {
                                    columnsToDisplay.forEach(column => {
                                        var value = column;
                                        if (!checkedArray.includes(value)) {
                                            checkedArray.push(value);
                                        }
                                    });
                                } else {
                                    columnsToDisplay.forEach(column => {
                                        var value = $(this).val();
                                        var index = checkedArray.indexOf(value);
                                        if (index !== -1) {
                                            checkedArray.splice(index, 1);
                                        }
                                    });
                                }
                            });
                            $('.' + tableName + 'ColumnChecks').change(function() {
                                var value = $(this).val();
                                if ($(this).is(':checked')) {
                                    if (!checkedArray.includes(value)) {
                                        checkedArray.push(value);
                                    }
                                } else {
                                    var index = checkedArray.indexOf(value);
                                    if (index !== -1) {
                                        checkedArray.splice(index, 1);
                                    }
                                }
                            });
                        }
                    }

                    var tableArrays = {};

                    for (var tableName in response) {


                        var columnMappings;

                        if (!tableArrays[tableName]) {
                            tableArrays[tableName] = [];
                        }

                        if (tableName === 'contacts') {
                            columnMappings = contactsColumnMappings;
                            handleTableCheckboxes(tableName, columnMappings, tableArrays['contacts']);
                        }
                    }

                    checkedContacts = tableArrays.contacts;
                },
            });
        }

        function referralColumns() {
            var selectedColumns = {};
            $('input[type="checkbox"]').each(function() {
                selectedColumns[this.id] = this.checked ? 1 : 0;
                if (this.checked) {
                    checkedCheckboxes.push(this.value);
                }
                $(this).change(function() {
                    if (this.checked) {
                        checkedCheckboxes.push($(this).next().text().trim());
                    } else {
                        var label = $(this).next().text().trim();
                        var index = checkedCheckboxes.indexOf(label);
                        if (index !== -1) {
                            checkedCheckboxes.splice(index, 1);
                        }
                    }
                });
            });
            $.ajax({
                url: '/get-table-columns',
                method: 'GET',
                data: selectedColumns,
                success: function(response) {
                    var detailsSection = $('#tables_card .data-table');
                    var referralSection = $('#referralSubnode');
                    detailsSection.empty();
                    referralSection.empty();

                    function handleTableCheckboxes(tableName, columnMappings, checkedArray) {
                        var columnsToDisplay = response[tableName].filter(column => columnMappings[column] !== undefined);
                        if (columnsToDisplay.length > 0) {

                            columnsToDisplay.forEach(column => {
                                if (tableName == 'referral') {
                                    var checkboxHTML = '<label><input class="' + tableName + 'ColumnChecks" type="checkbox" name="columns" value="' + column + '"> ' + columnMappings[column] + '</label><br>';
                                    referralSection.append(checkboxHTML);
                                }
                            });

                            var selectAllHTML = '<label><input type="checkbox" id="select-all-' + tableName + '"> Select All</label><br>';
                            $('#' + tableName + 'Subnode').prepend(selectAllHTML);
                            $('#select-all-' + tableName).change(function() {
                                var isChecked = $(this).is(':checked');
                                $('.' + tableName + 'ColumnChecks').prop('checked', isChecked);
                                if (isChecked) {
                                    columnsToDisplay.forEach(column => {
                                        var value = column;
                                        if (!checkedArray.includes(value)) {
                                            checkedArray.push(value);
                                        }
                                    });
                                } else {
                                    columnsToDisplay.forEach(column => {
                                        var value = $(this).val();
                                        var index = checkedArray.indexOf(value);
                                        if (index !== -1) {
                                            checkedArray.splice(index, 1);
                                        }
                                    });
                                }
                            });
                            $('.' + tableName + 'ColumnChecks').change(function() {
                                var value = $(this).val();
                                if ($(this).is(':checked')) {
                                    if (!checkedArray.includes(value)) {
                                        checkedArray.push(value);
                                    }
                                } else {
                                    var index = checkedArray.indexOf(value);
                                    if (index !== -1) {
                                        checkedArray.splice(index, 1);
                                    }
                                }
                            });
                        }
                    }

                    var tableArrays = {};

                    for (var tableName in response) {



                        var columnMappings;

                        if (!tableArrays[tableName]) {
                            tableArrays[tableName] = [];
                        }

                        if (tableName === 'referral') {
                            columnMappings = referralColumnMappings;
                            handleTableCheckboxes(tableName, columnMappings, tableArrays['referral']);
                        }
                    }
                    checkedReferral = tableArrays.referral;

                },
            });
        }


        // Lead
        function leadColumns() {
            var selectedColumns = {};
            $('input[type="checkbox"]').each(function() {
                selectedColumns[this.id] = this.checked ? 1 : 0;
                if (this.checked) {
                    checkedCheckboxes.push(this.value);
                }
                $(this).change(function() {
                    if (this.checked) {
                        checkedCheckboxes.push($(this).next().text().trim());
                    } else {
                        var label = $(this).next().text().trim();
                        var index = checkedCheckboxes.indexOf(label);
                        if (index !== -1) {
                            checkedCheckboxes.splice(index, 1);
                        }
                    }
                });
            });
            $.ajax({
                url: '/get-table-columns',
                method: 'GET',
                data: selectedColumns,
                success: function(response) {
                    var detailsSection = $('#tables_card .data-table');
                    var leadSection = $('#leadSubnode');
                    detailsSection.empty();
                    leadSection.empty();

                    function handleTableCheckboxes(tableName, columnMappings, checkedArray) {
                        var columnsToDisplay = response[tableName].filter(column => columnMappings[column] !== undefined);
                        if (columnsToDisplay.length > 0) {

                            columnsToDisplay.forEach(column => {
                                if (tableName == 'lead') {
                                    var checkboxHTML = '<label><input class="' + tableName + 'ColumnChecks" type="checkbox" name="columns" value="' + column + '"> ' + columnMappings[column] + '</label><br>';
                                    leadSection.append(checkboxHTML);
                                }
                            });
                            var selectAllHTML = '<label><input type="checkbox" id="select-all-' + tableName + '"> Select All</label><br>';
                            $('#' + tableName + 'Subnode').prepend(selectAllHTML);
                            $('#select-all-' + tableName).change(function() {
                                var isChecked = $(this).is(':checked');
                                $('.' + tableName + 'ColumnChecks').prop('checked', isChecked);
                                if (isChecked) {
                                    columnsToDisplay.forEach(column => {
                                        var value = column;
                                        if (!checkedArray.includes(value)) {
                                            checkedArray.push(value);
                                        }
                                    });
                                } else {
                                    columnsToDisplay.forEach(column => {
                                        var value = $(this).val();
                                        var index = checkedArray.indexOf(value);
                                        if (index !== -1) {
                                            checkedArray.splice(index, 1);
                                        }
                                    });
                                }
                            });
                            $('.' + tableName + 'ColumnChecks').change(function() {
                                var value = $(this).val();
                                if ($(this).is(':checked')) {
                                    if (!checkedArray.includes(value)) {
                                        checkedArray.push(value);
                                    }
                                } else {
                                    var index = checkedArray.indexOf(value);
                                    if (index !== -1) {
                                        checkedArray.splice(index, 1);
                                    }
                                }
                            });
                        }
                    }
                    var tableArrays = {};
                    for (var tableName in response) {
                        var columnMappings;
                        if (!tableArrays[tableName]) {
                            tableArrays[tableName] = [];
                        }
                        if (tableName === 'lead') {
                            columnMappings = leadColumnMappings;
                            handleTableCheckboxes(tableName, columnMappings, tableArrays['lead']);
                        }
                    }

                    checkedLead = tableArrays.lead;
                },
            });
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>

<script>
    var reportArray;

    function sendSelectedColumn(checkedReferral, checkedLead, checkedAccount, checkedContacts) {
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
        var start_date = document.getElementById('start_date').value;
        var end_date = document.getElementById('end_date').value;
        var summaryRadio = document.getElementById('summaryRadio').value;
        var detailsRadio = document.getElementById('detailsRadio').value;
        var object = document.getElementById('object').value;
        var category = document.getElementById('category').value;
        var report_title = document.getElementById('report_title').value;
        var report_description = document.getElementById('report_description').value;
        $(this).siblings(".invalid-feedback").hide();
        $.ajax({
            type: 'GET',
            url: '/get-submited-columns',
            data: {
                checkedReferral: checkedReferral,
                checkedLead: checkedLead,
                checkedAccount: checkedAccount,
                checkedContacts: checkedContacts,
                detailsRadio: detailsRadio,
                summaryRadio: summaryRadio,
                category: category,
                object: object,
                start_date: start_date,
                end_date: end_date,
                report_title: report_title,
                report_description: report_description
            },
            success: function(data) {
                var detailsSection = $('#tables_card .data-table');
                detailsSection.empty();
                var combinedTableHTML = '<div style="display: flex;">'; // Flex container

                if (Array.isArray(data.referral)) {
                    combinedTableHTML += `<div>${generateTableHTML(data.referral, referralColumnMappings)}</div>`;
                }

                if (Array.isArray(data.lead)) {
                    combinedTableHTML += `<div>${generateTableHTML(data.lead, leadColumnMappings)}</div>`;
                }

                if (Array.isArray(data.contact)) {
                    combinedTableHTML += `<div>${generateTableHTML(data.contact, contactsColumnMappings)}</div>`;
                }

                if (Array.isArray(data.account)) {
                    combinedTableHTML += `<div>${generateTableHTML(data.account, accountColumnMappings)}</div>`;
                }
                reportArray = data.reportArray;

                combinedTableHTML += '</div>';
                detailsSection.append(combinedTableHTML);
                var saveButtonSection = $('#saveButtonDiv');
                var excelButtonSection = $('#excelButtonDiv');
                var generateButton = `<button id="btnExport" class="btn btn-primary pb-1 pt-1" onclick="event.preventDefault();exportReportToExcel()" style="margin:10px;">Export Report</button>`;
                var saveButton = `<button id="btnSave" class="btn btn-secondary pb-1 pt-1" onclick="event.preventDefault();saveReportToDatabase(reportArray)" style="margin:10px;">Save</button>`;
                if ($('#btnExport').length === 0) {
                    excelButtonSection.append(generateButton);
                }
                if ($('#btnSave').length === 0) {
                    saveButtonSection.append(saveButton);
                }
            },
            error: function(xhr) {
                erroralert(xhr);
            }
        });

        function generateTableHTML(dataArray, columnMappings) {
            var tableHTML = '<table style="border-collapse:collapse; white-space: nowrap; border: 1px solid #ddd;">';

            tableHTML += '<tr>';
            Object.keys(dataArray[0]).forEach(column => {
                var displayName = columnMappings[column] || column;
                tableHTML += `<th style="border-collapse: collapse; white-space: nowrap; border: 1px solid #ddd;">${displayName}</th>`;
            });
            tableHTML += '</tr>';
            dataArray.forEach(element => {
                if (Object.values(element).some(value => value !== null && value !== undefined)) {
                    tableHTML += '<tr>';
                    Object.keys(element).forEach(column => {
                        var value = element[column];
                        if (is_object(value)) {
                            tableHTML += `<td style="border-collapse: collapse; white-space: nowrap; border: 1px solid #ddd;">${value.name}</td>`;
                        } else {
                            tableHTML += `<td style="border-collapse: collapse; white-space: nowrap; border: 1px solid #ddd;">${value || 'N/A'}</td>`;
                        }
                    });
                    tableHTML += '</tr>';
                }
            });

            tableHTML += '</table>';
            return tableHTML;
        }

        function is_object(variable) {
            return variable !== null && typeof variable === 'object';
        }
    }


    function saveReportToDatabase(reportArray) {
        var summaryRadio = document.getElementById('summaryRadio').value;
        var detailsRadio = document.getElementById('detailsRadio').value;
        var object = document.getElementById('object').value;
        var category = document.getElementById('category').value;
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;
        var report_title = document.getElementById('report_title').value;
        var report_description = document.getElementById('report_description').value;

        $.ajax({
            type: 'POST',
            url: "{{route('reports.save')}}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                reportArray: JSON.stringify(reportArray),
                report_title: report_title,
                report_description: report_description,
                startDate: startDate,
                endDate: endDate,
                detailsRadio: detailsRadio,
                summaryRadio: summaryRadio,
                category: category,
                object: object,
            },
            success: function(response) {
                swal.fire({
                    title: "Success!",
                    text: "Report Saved Successfully",
                    icon: "success",
                    confirmButtonText: "Ok",
                });

            },
            error: function(error) {
                console.error('Error while saving the report:', error);
            }
        });
    }


    function exportReportToExcel() {
        let table = document.getElementsByTagName("body");
        const timestamp = new Date().getTime();
        TableToExcel.convert(table[0], {
            name: `export_${timestamp}.xlsx`,
            sheet: {
                name: 'Sheet 1'
            },
        });
    }

    function usDateFormat(date) {
        var options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit'
        };
        return new Intl.DateTimeFormat('en-US', options).format(date);
    }
</script>

<!-- <script>
        $(document).ready(function() {
            function updateData() {
                let selectedTables = [];
                $('.form-check-input:checked').each(function() {
                    selectedTables.push($(this).attr('id'));
                });

                let startDate = $('#start_date').val();
                let endDate = $('#end_date').val();
                $.ajax({
                    url: "{{ route('get.data') }}",
                    method: "GET",
                    data: {
                        selectedTables: selectedTables,
                        start_date: startDate,
                        end_date: endDate,
                    },
                    success: function(data) {
                        $('.data-table').empty();

                        function generateTable(tableData, columns) {
                            let table = '<div class="table-container"><table class="table">';
                            table += '<thead><tr>';
                            columns.forEach(function(column) {
                                table += '<th>' + column + '</th>';
                            });
                            table += '</tr></thead><tbody>';

                            tableData.forEach(function(row) {
                                table += '<tr>';
                                columns.forEach(function(column) {
                                    table += '<td>' + (row[column] || 'N/A') + '</td>';
                                });
                                table += '</tr>';
                            });

                            table += '</tbody></table></div>';
                            return table;
                        }


                        if (data.accounts) {
                            const accountColumns = ['name', 'last_name', 'full_ssn', 'marital_status', 'email', 'gender'];
                            const accountsTable = generateTable(data.accounts, accountColumns);
                            $('.data-table').append(accountsTable);
                        }
                        if (data.referrals) {
                            const referralColumns = ['first_name', 'last_name', 'status', 'email', 'phone_number', 'date_of_birth'];
                            const referralsTable = generateTable(data.referrals, referralColumns);
                            $('.data-table').append(referralsTable);
                        }
                        if (data.leads) {
                            const leadColumns = ['contact_first_name', 'contact_last_name', 'contact_email', 'patient_first_name', 'patient_last_name', 'patient_phone'];
                            const leadsTable = generateTable(data.leads, leadColumns);
                            $('.data-table').append(leadsTable);
                        }
                        if (data.contacts) {
                            const contactColumns = ['fname', 'lname', 'email', 'ext_number', 'fax', 'phone'];
                            const contactsTable = generateTable(data.contacts, contactColumns);
                            $('.data-table').append(contactsTable);
                        }
                    },
                    error: function(xhr) {
                        // Handle error
                    }
                });


            }
            $('.form-check-input').on('change', updateData);
            $('.date').on('change', updateData);
        });
        $(document).ready(function(){
            $("#btnExport").click(function() {
                let length = 16;
                let uniqueId =parseInt(Math.ceil(Math.random() * Date.now()).toPrecision(length).toString().replace(".", ""))
                let table = document.getElementsByClassName("data-table");
                TableToExcel.convert(table[0], {
                    name:uniqueId+ '.xlsx',
                    sheet: {
                        name: 'Sheet 1' // sheetName
                    }
                });
                window.location.href = "{{ route('reports.index') }}";

            });
        });
    </script> -->
@endsection

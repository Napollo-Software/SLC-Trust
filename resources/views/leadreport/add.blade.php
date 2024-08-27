@extends('nav')
@section('title', 'Add Report | SLC Trust')
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
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }
    </style>

    <div class="container-xl px-4 mt-4   "  >
        <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Add Report</h5>
        <form method="post">
            @csrf
            <div class="row card-container">
                <div class="col-md-4 align-self-start ">
                    <div class="card ">
                        <div class='card-header'>Add Report</div>
                        <div class="card-body ">
                            <div class="col-md-12  p-2">
                                <label for="form-label">Report Name*</label>
                                <input type="text" class="form-control" id="report_name" name="report_name">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Description</label>
                                <textarea type="text" class="form-control" id="contact_phone" name="contact_phone"></textarea>
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Object*</label>
                                <select name="relationship" class="form-select">
                                    <option value="">Choose One</option>
                                    <option value="Lead">Lead</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Account">Account</option>
                                    <option value="Contact">Contact</option>
                                </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">Category*</label>
                                <select name="relationship" class="form-select">
                                    <option value="">Choose One</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Account">Account</option>
                                </select>
                            </div>
                            <div class="col-md-12 p-2">
                                <h6 >Type*</h6>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="optionType" id="Summary"
                                           value="Summary" checked>
                                    <label class="form-check-label" for="Summary">
                                        Summary
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="optionType" id="Details"
                                           value="Details">
                                    <label class="form-check-label" for="Details">
                                        Details
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="account">
                                            <label class="form-check-label" for="account">Account</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="referral">
                                            <label class="form-check-label" for="referral">Referral</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="lead">
                                            <label class="form-check-label" for="lead">Lead</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="contacts">
                                            <label class="form-check-label" for="contacts">Contacts</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <h6 class=" col-md-12 pt-2 px-2">Filters</h6>

                            <div class="col-md-12 px-2">
                                <label for="form-label">Start Date</label>
                                <input type="date" class="form-control date" id="start_date" name="start_date">
                            </div>
                            <div class="col-md-12 p-2">
                                <label for="form-label">End Date</label>
                                <input type="date" class="form-control date" id="end_date" name="end_date">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                    <button class="btn btn-secondary m-2 clear-form">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="height: 189%">
                    <div class="card" style="height: 50%" id="tables_card">
                        <div class='card-header'>
                            Details
                        </div>
                        <div class="card-body" style="height: 50%">
                            <div class="data-table">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
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
                        if (data.accounts) {
                            let accountsTable = '<div class="table-container"><table class="table">';
                            accountsTable +=
                                '<thead><tr><th>First Name</th><th>Last Name</th><th>SSN Number</th><th>Marital</th><th>Emails</th><th>Gender</th></tr></thead>';
                            accountsTable += '<tbody>';
                            data.accounts.forEach(function(account) {
                                accountsTable += '<tr><td>' + account.name +
                                    '</td><td>' + account.last_name + '</td><td>' +
                                    account.full_ssn + '</td><td>' + account.marital_status +
                                    '</td><td>' + account.email +
                                    '</td><td>' + account.gender + '</td></tr>';
                            });
                            accountsTable += '</tbody></table></div>';
                            $('.data-table').append(accountsTable);
                        }
                        if (data.referrals) {
                            let referralsTable = '<div class="table-container"><table class="table">';
                            referralsTable +=
                                '<thead><tr><th>Referral Name</th><th>Last Name</th><th>Status</th><th>Email</th><th>Phone</th><th>Date of birth</th></tr></thead>';
                            referralsTable += '<tbody>';
                            data.referrals.forEach(function(referral) {
                                referralsTable += '<tr><td>' + referral.first_name +
                                    '</td><td>' + referral.last_name + '</td><td>' +
                                    referral.status + '</td><td>' + referral.email +
                                    '</td><td>' + referral.phone_number + '</td><td>' + referral
                                    .date_of_birth + '</td></tr>';
                            });
                            referralsTable += '</tbody></table></div>';
                            $('.data-table').append(referralsTable);
                        }
                        if (data.leads) {
                            let leadsTable = '<div class="table-container"><table class="table">';
                            leadsTable +=
                                '<thead><tr><th>First Name</th><th>Last name</th><th>Email</th><th>Patient First Name</th><th>Patient Last Name</th><th>Phone</th></tr></thead>';
                            leadsTable += '<tbody>';
                            data.leads.forEach(function(lead) {
                                leadsTable += '<tr><td>' + lead.contact_first_name +
                                    '</td><td>' + lead.contact_last_name + '</td><td>' +
                                    lead.contact_email + '</td><td>' + lead.patient_first_name +
                                    '</td><td>' + lead.patient_last_name + '</td><td>' + lead
                                    .patient_phone + '</td></tr>';
                            });
                            leadsTable += '</tbody></table></div>';
                            $('.data-table').append(leadsTable);
                        }
                        if (data.contacts) {
                            let contactsTable = '<div class="table-container"><table class="table">';
                            contactsTable +=
                                '<thead><tr><th>First Name</th><th>Last Name</th><th>Email</th><th>EXT Number</th><th>Fax</th><th>Phone</th></tr></thead>';
                            contactsTable += '<tbody>';
                            data.contacts.forEach(function(contact) {
                                contactsTable += '<tr><td>' + contact.fname +
                                    '</td><td>' + contact.lname + '</td><td>' +
                                    contact.email + '</td><td>' + contact.ext_number +
                                    '</td><td>' + contact.fax + '</td><td>' + contact.phone +
                                    '</td></tr>';
                            });
                            contactsTable += '</tbody></table></div>';
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
    </script>
@endsection

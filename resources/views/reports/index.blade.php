@extends('nav')
@section('title', 'Referral | Senior Life Care Trusts')
@section('wrapper')
<style>
     td{
                vertical-align: middle !important;
            }
</style>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>All Reports</b> </div>
    </h5>
    <div class="row">
        <div class="col-lg-12 mb-12">
            <div class="">
                <div class="d-flex align-items-center justify-content-between p-3 mb-0">
                    <div>
                        <h5 class="mb-1 ">Report Overview</h5>
                        <p class="mb-0 font-13 text-secondary"><i class='bx bx-grid'></i>{{ count($reports) }} Reports
                        </p>
                    </div>
                    <div>
                        {{-- <a href="{{ route('reports.add_report') }}"
                        class="btn btn-primary import-file-user-data print-btn pb-1 pt-1">
                        Add Report
                        </a> --}}
                    </div>
                </div>
                <div class="row justify-content-start m-1 ">
                    <div class="col-md-2">
                        <div class="card shadow-none p-2 ">
                            <h5> Object </h5>
                            <div class="card-body pt-0">
                                <label class="form-check-label" for="referral">
                                    <input class="form-check-input" type="checkbox" id="checkreferral">
                                    Referral
                                </label> <br>
                                <label class="form-check-label" for="Lead">
                                    <input class="form-check-input" type="checkbox" id="checklead">
                                    Lead
                                </label> <br>
                                <label class="form-check-label" for="contact">
                                    <input class="form-check-input" type="checkbox" id="checkcontact">
                                    Contact
                                </label> <br><label class="form-check-label" for="account">
                                    <input class="form-check-input" type="checkbox" id="checkaccount">
                                    Account
                                </label>
                            </div>
                        </div>
                        <div class="card shadow-none p-2" >
                            <h5> Category </h5>
                            <div class="card-body pt-0">
                                <label class="form-check-label" for="categoryReferral">
                                    <input class="form-check-input" type="checkbox" id="categoryReferral" onclick="categoryFilter()">
                                    Referral
                                </label>
                                <br>
                                <label class="form-check-label" for="uncategorized">
                                    <input class="form-check-input" type="checkbox" id="uncategorized" onclick="categoryFilter()">
                                    Uncategorized
                                </label>
                                <br>
                                <label class="form-check-label" for="categoryacount">
                                    <input class="form-check-input" type="checkbox" id="categoryacount" onclick="categoryFilter()">
                                    Account
                                </label>
                            </div>
                        </div>
                        <div class="card shadow-none p-2 ">
                            <h5>Type </h5>
                            <div class="card-body pt-">
                                <label class="form-check-label" for="referral">
                                    <input class="form-check-input" type="checkbox" id="summarycheck">
                                    Summary
                                </label> <br>
                                <label class="form-check-label" for="Lead">
                                    <input class="form-check-input" type="checkbox" id="checkdetails">
                                    Details
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-10 shadow-none p-3" style="height: 450px;">
                        <div class="table-responsive text-nowrap overflow-auto " id="reportTableContainer">
                            <table class="table align-middle mb-0 table-hover dataTable">
                                <thead class="table-light">
                                    <tr style="white-space:nowrap">
                                        <th style="width: 20%">Title</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                        <th>Object</th>
                                        <th>Created At</th>
                                        <th>Updated_by</th>
                                        <th style="text-align:center">Actions</th>
                                        <th>Duplicate Report</th>
                                    </tr>
                                </thead>
                                <tbody class="archive-body">
                                    @foreach ($reports as $report)
                                    <tr>
                                        <td>
                                            <a href="{{ route('view.report', $report['id']) }}">{{ $report['title'] }}</a>
                                        </td>
                                        <td>{{ $report['description'] }}</td>
                                        <td>{{ $report->user->name }}</td>
                                        <td>{{ $report->type}}</td>
                                        <td>{{ $report->category}}</td>
                                        <td>{{ $report->object}}</td>
                                        <td>{{ $report['created_at']->format('H:i:A') }}</td>
                                        <td>{{ $report->updatedBy->name ?? "N/A" }}</td>
                                        <td class="row-{{ $report['id'] }}">
                                            <a class="btn secondary" href="{{ route('view.report', $report['id']) }}"><i class='bx bxs-show'></i>View</a>
                                        </td>
                                        <td style="text-align:center">
                                            <i class="submitBtn bx bx-copy-alt" data-report-id="{{ $report['id'] }}" role="button" tabindex="0" style="font-size: 24px;"></i>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="noResultsMessage" style="display: none;">
                                <h4 style="text-align: center;">No results found.</h4>
                            </div>
                        </div>
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
        $('.dataTable').DataTable({
            aLengthMenu: [
                [25, 50, 100, 250],
                [25, 50, 100, 250]
            ],
        });
    });

    $(document).on("click", ".submitBtn", function(e) {
        e.preventDefault();

        var reportId = $(this).data("report-id");
        Swal.fire({
            title: 'Confirm Duplication',
            text: 'Are you sure you want to duplicate this report?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'secondary',
            confirmButtonText: 'Yes, clone it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('reports.duplicate', ['report' => ':reportId']) }}".replace(
                        ':reportId', reportId),
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        console.log(data);
                        var createdAtDate = new Date(data.created_at);
                        var formattedTime = createdAtDate.toLocaleTimeString('en-US', {
                            hour: 'numeric',
                            minute: 'numeric',
                            hour12: true
                        });

                        var newRow = "<tr><td>" + data.title +
                            "</td><td>" + data.description + "</td><td>" + data.created_by +
                            "</td><td>" + data.type + "</td><td>" + data.category + "</td><td>" + data.object +
                            "</td><td>" + formattedTime + "</td><td>" + (data.updated_by ? data.updated_by : "N/A") +
                            "</td><td class='row-" + data.id +
                            "'><a class='btn secondary' href='" + data.view_url +
                            "'><i class='bx bxs-show'></i>View</a></td><td style='text-align:center;'><i class='custom-hover submitBtn' data-report-id='" +
                            data.id +
                            "' type='submit' style='font-size: 24px;'><i class='bx bx-copy-alt'></i></i></td></tr>";


                        $(".dataTable tbody").append(newRow);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#summarycheck, #checkdetails, #checkreferral, #checklead, #checkcontact, #checkaccount').change(function() {
            filterTable();
        });
        filterTable();
    });

    function filterTable() {

        var summaryChecked = $('#summarycheck').prop('checked');
        var detailsChecked = $('#checkdetails').prop('checked');

        var referralChecked = $('#checkreferral').prop('checked');
        var leadChecked = $('#checklead').prop('checked');
        var contactChecked = $('#checkcontact').prop('checked');
        var accountChecked = $('#checkaccount').prop('checked');

        var categoryReferral = $('#categoryReferral').prop('checked');
        var uncategorized = $('#uncategorized').prop('checked');
        var categoryacount = $('#categoryacount').prop('checked');

        $('#reportTableContainer tbody tr').each(function() {
            var type = $.trim($(this).find('td:eq(3)').text());
            var category = $.trim($(this).find('td:eq(4)').text());
            var object = $.trim($(this).find('td:eq(5)').text());

            console.log(category.toLowerCase().includes('referral'));

            $(this).css('display', 'none');

            if ((summaryChecked && type.toLowerCase().includes('summary')) ||
                (detailsChecked && type.toLowerCase().includes('details')) ||
                (referralChecked && object.toLowerCase().includes('referral')) ||
                (leadChecked && object.toLowerCase().includes('lead')) ||
                (contactChecked && object.toLowerCase().includes('contact')) ||
                (accountChecked && object.toLowerCase().includes('account')) ||
                (categoryReferral && category.toLowerCase().includes('referral')) ||
                (uncategorized && category.toLowerCase().includes('uncategorized')) ||
                (categoryacount && category.toLowerCase().includes('account'))) {
                $(this).show();

            } else {
                $(this).hide();
            }
        });
        if (!summaryChecked && !detailsChecked && !referralChecked && !leadChecked && !contactChecked && !accountChecked) {
            $('#reportTableContainer tbody tr').show();
        }
    }

    function categoryFilter() {
        var categoryReferral = $('#categoryReferral').prop('checked');
        var uncategorized = $('#uncategorized').prop('checked');
        var categoryacount = $('#categoryacount').prop('checked');

        $('#reportTableContainer tbody tr').each(function() {
            var type = $.trim($(this).find('td:eq(3)').text());
            var category = $.trim($(this).find('td:eq(4)').text());
            var object = $.trim($(this).find('td:eq(5)').text());
            console.log(category.toLowerCase().includes('referral'));
            if (
                (categoryReferral && category.toLowerCase().includes('referral')) ||
                (uncategorized && category.toLowerCase().includes('uncategorized')) ||
                (categoryacount && category.toLowerCase().includes('account'))) {
                $(this).show();

            } else {
                $(this).hide();
            }
        });
        if (!categoryReferral && !uncategorized && !categoryacount) {
            $('#reportTableContainer tbody tr').show();
        }
    }
</script>

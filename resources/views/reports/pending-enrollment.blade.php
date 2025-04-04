@extends('nav')
@section('title', 'Referral | Senior Life Care Trusts')
@section('wrapper')

<style>
    .sticky_box  {
        position: sticky;
        top: 125px;
    }
</style>
<div class="">
    <h5 class=" d-flex justify-content-start pt-3 pb-2">
        <b></b>
       <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Pending Enrollment Reports</b> </div>
    </h5>
    <div class="row justify-content-start  g-3">
        <div class="col-lg-3 " >
           <div class="sticky_box">                
                <!-- Surplus/Maintenance Section -->
                <div class="card mb-3">
                    <div class="card-header ">
                    <h5 class="mb-0 text-black py-2">Surplus Amount</h5>
                    </div>
                    
                    <div class="card-body ">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="status_done" name="status" value="done" 
                                @if (old('status') == "done") checked @endif>
                            <label class="form-check-label ms-2" for="status_done">Received</label>
                        </div>
                
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" id="status_pending" name="status" value="pending" 
                                @if (old('status') == "pending") checked @endif>
                            <label class="form-check-label ms-2" for="status_pending">Pending</label>
                        </div>
                    </div>
                </div>
            </div>
                                        
            </div>
        <div class="col-lg-9 ">
            <div class="card " style=" ">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between ">
                        <div class="">
                            <h5 class="mb-0 text-black d-flex align-items-center gap-1">
                                <!-- <i class='bx bx-grid'></i> -->
                                <div>
                                    Report Overview
                                </div>
                            </h5>
                            <!-- <p class="mb-0 font-13 text-secondary"><i class='bx bx-grid'></i> Reports
                            </p> -->
                        </div>
                        <div>
                            <a href="" id="exportBtn"
                            class="btn btn-primary import-file-user-data print-btn pb-1 pt-1">
                            <div class="d-flex align-items-center">
                            <i class='bx bxs-file-export' ></i> Export
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap overflow-auto p-3" id="reportTableContainer">
                    <div id="userTableContainer">
                        @include('partials.user_list')
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
 $(document).ready(function () {
    let dataTable;

    function initDataTable() {
        if ($.fn.DataTable.isDataTable("#userTable")) {
            dataTable.destroy();
            $('#userTable').remove(); 
        }
    }

    function fetchUsers(selectedBillingCycles) {
        let status = $('input[name="status"]:checked').val();

        $('#loader').show();

        $.ajax({
            url: "{{ route('reports.pending.enrollment.filter') }}",
            method: "GET",
            data: {
                billing_cycle: selectedBillingCycles,
                status: status
            },
            success: function (response) {
                $('#loader').hide();

                if (response.html && response.html.trim().length > 0) {
                    $('#userTableContainer').html(response.html); // Insert full table

                    setTimeout(() => {
                        $('#userTable').DataTable({
                            paging: true,
                            searching: true,
                            ordering: true,
                            info: true
                        });
                    }, 50);
                } else {
                    $('#userTableContainer').html('<p class="text-center text-muted">No users found.</p>');
                }
            },
            error: function () {
                $('#loader').hide();
                $('#userTableContainer').html('<p class="text-center text-danger">Error fetching data.</p>');
            }
        });
    }

    $('.billing_cycle, input[name="status"]').on('change', function () {
        var selectedBillingCycles = [];

        $('.billing_cycle:checked').each(function () {
            selectedBillingCycles.push($(this).val());
        });

        fetchUsers(selectedBillingCycles);
    });
});
$(document).on('click', '#exportBtn', function (e) {
    e.preventDefault(); // Stop form submission

    var selectedBillingCycles = [];
    $('.billing_cycle:checked').each(function () {
        selectedBillingCycles.push($(this).val());
    });

    var status = $('input[name="status"]:checked').val(); // Assuming radio buttons or checkboxes

    // Check if at least one filter is applied
    if (selectedBillingCycles.length === 0 && !status) {
        alert("Please select at least one filter before exporting.");
        return;
    }

    $.ajax({
        url: "{{ route('reports.pending.enrollment.export') }}",
        type: "GET",
        data: {
            billing_cycle: selectedBillingCycles,
            status: status
        },
        xhrFields: {
            responseType: 'blob' // Handle file download
        },
        success: function (response, status, xhr) {
            if (xhr.status === 204) { // No Content (No filters selected)
                alert("No data available for the selected filters.");
                return;
            }

            var blob = new Blob([response], { type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" });
            var link = document.createElement("a");
            link.href = window.URL.createObjectURL(blob);
            link.download = "PendingEnrollments_" + new Date().toISOString().slice(0, 19).replace(/[:T]/g, "_") + ".xlsx";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        },
        error: function (xhr) {
            alert("Something went wrong! Please try again.");
        }
    });
});

</script> 
{{-- 

<script>
    $(document).ready(function () {
        let dataTable;
    
        function initDataTable() {
            if ($.fn.DataTable.isDataTable("#userTable")) {
                // dataTable.destroy(); // Destroy existing instance
                // $('#userTableBody').empty(); // Clear tbody only
            }
    
            if ($("#userTableBody tr").length > 0 && $("#userTableBody td").length > 0) {
                dataTable = $("#userTable").DataTable({
                    paging: true,
                    searching: true,
                    ordering: true,
                    info: true
                });
            }
        }
    
        function fetchUsers(selectedBillingCycles) {
            let status = $('input[name="status"]:checked').val();
    
            $('#loader').show();
            $('#userTableBody').html(""); // Clear previous data
    
            $.ajax({
                url: "{{ route('reports.pending.enrollment.filter') }}",
                method: "GET",
                data: {
                    billing_cycle: selectedBillingCycles,
                    status: status
                },
                success: function (response) {
                    $('#loader').hide();
    
                    // Debugging: Log response
                    console.log("AJAX Response:", response.html);
    
                    // Ensure response contains valid HTML before inserting
                    if (response.html && response.html.trim().length > 0) {
                        $('#userTableBody').html(response.html);
    
                        // Check if table structure matches
                        let firstRowCells = $("#userTableBody tr:first-child td").length;
                        let headerCells = $("#userTable thead tr th").length;
    
                        console.log("Header Cells:", headerCells, "First Row Cells:", firstRowCells);
    
                        if (firstRowCells === headerCells) {
                            initDataTable();
                        } else {
                            console.error("DataTable Error: Column count mismatch!");
                        }
                    } else {
                        $('#userTableBody').html('<tr><td colspan="6" class="text-center text-muted">No users found.</td></tr>');
                    }
                },
                error: function () {
                    $('#loader').hide();
                    $('#userTableBody').html('<tr><td colspan="6" class="text-center text-danger">Error fetching data.</td></tr>');
                }
            });
        }
    
        $('.billing_cycle, input[name="status"]').on('change', function () {
            var selectedBillingCycles = [];
    
            $('.billing_cycle:checked').each(function () {
                selectedBillingCycles.push($(this).val());
            });
    
            fetchUsers(selectedBillingCycles);
        });
    });
    </script>
      --}}
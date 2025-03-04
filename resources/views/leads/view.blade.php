@extends("nav")
@section('title', 'Lead | Senior Life Care Trusts')
@section("wrapper")
@php
$role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
@endphp
<style>
    body {
        margin-top: 20px;
        background-color: #f2f6fc;
        color: #69707a;
    }

    .search-nav {
        padding-bottom: 6%;
    }

    .img-account-profile {
        height: 10rem;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .card {
        box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
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


    }

    .form-control,
    .dataTable-input {
        display: block;
        width: 100%;
        padding: 0.875rem 1.125rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1;
        color: #69707a;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #c5ccd6;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.35rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .nav-borders .nav-link.active {
        color: #0061f2;
        border-bottom-color: #0061f2;
    }

    .nav-borders .nav-link {
        color: #69707a;
        border-bottom-width: 0.125rem;
        border-bottom-style: solid;
        border-bottom-color: transparent;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        padding-left: 0;
        padding-right: 0;
        margin-left: 1rem;
        margin-right: 1rem;
    }

</style>
<div class="">
   
    <div class="d-flex align-items-center justify-content-between pt-lg-3 pb-3 flex-wrap gap-2 ">
        <h5 class="  mb-0">
             <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <a href="{{url('/leads')}}" class="text-muted fw-light pointer"><b>All Leads</b></a> / <b>View Lead</b> </div>
        </h5>
        <div class="font-22 ">
            <button class="btn btn-primary import-file-user-data NoteAddBtn print-btn px-2 py-1 ">
                <i class='bx bx-save pb-2 pt-1 px-0 mx-0'></i>
                Add Note
            </button>
        </div>
    </div>
    <!-- Account page navigation-->
    <div class="row d-flex align-items-stretch gap-2 gap-md-0">
        <div class="col-lg-5">
            <div class="card ">
                <div class="card-header d-flex p-2 ">
                    <h4 class="mb-0 py-2">Lead Information</h4>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-md-0">Lead Full Name</h6>
                        </div>
                        <div class="col-md-6 text-left text-secondary">
                            {{$lead->contact_first_name.' '.$lead->contact_last_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-md-0">Lead Email</h6>
                        </div>
                        <div class="col-md-6 text-left text-secondary">
                            {{$lead->contact_email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-md-0">Lead Phone</h6>
                        </div>
                        <div class="col-md-6 text-left text-secondary">
                            @if($lead->contact_phone != '+1')
                            {{$lead->contact_phone}}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-md-0">Relationship with Patient</h6>
                        </div>
                        <div class="col-md-6 text-left text-secondary">
                            {{$lead->relation_to_patient}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card  ">
                <div class="card-header d-flex  p-2 ">
                    <h4 class="mb-0 py-2">Patient Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Patient Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->patient_first_name}} {{$lead->patient_last_name}}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0 text-nowrap">Patietn Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            @if($lead->patient_phone != '+1')
                            {{$lead->patient_phone}}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Patient Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->patient_email}}
                        </div>
                    </div </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header d-flex p-2 ">
                    <h4 class="mb-0 py-2">Other Information</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Sub Status</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->sub_status}}
                        </div>
                    </div>
                    <hr>
                    @if($lead->sub_status == 'closed')
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Closing Reason</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->closing_reason}}
                        </div>
                    </div>
                    <hr>
                    @endif
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Vendo ID</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->vendor_id}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Case Type</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $lead->type_id ? $lead->type_id->name:$lead->case_type }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class=mb-md-0">Source Type</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->source_type}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-md-0">Note</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{$lead->note}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button id='back-btn' class="btn btn-primary">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNoteModalHeader">Add Note</h5>
                <button type="button" class="close close-btn closeContactModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add_note_form" method="post">
                @csrf
                <input type="hidden" name="note_id" id="note_id" value="">
                <input type="hidden" name="from"  >
                <input type="hidden" name="to"  >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 p-2">
                            <label for="form-label">Note <span class="text-danger">*</span></label>
                            <textarea name="note" id="note_text" rows="5" maxlength="255" placeholder="Type note here" class="form-control address" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary note-button mb-3">Save</button>
                    <button type="button" class="btn btn-secondary mb-3 closeContactModal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        document.getElementById('back-btn').addEventListener('click', function() {
            window.history.back();
        });
        $('.NoteAddBtn').on('click', function (e) {
        e.preventDefault()
        showAddNoteModal()
    })
        function showAddNoteModal() {
            $('#addNoteModal').modal('show')
        }
        function hideAddContactModal() {
        $('#addNoteModal').modal('hide')
        $('#followupModal').modal('hide')
    }
        $('.closeContactModal').on('click', function (e) {
            e.preventDefault()
            hideAddContactModal()
        })
    </script>
    @endsection

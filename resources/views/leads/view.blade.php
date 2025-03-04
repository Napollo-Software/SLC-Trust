@extends("nav")
@section('title', 'Lead | Senior Life Care Trusts')
@section("wrapper")
    @php
        $user = App\Models\User::find(Session::get('loginId'));
        $role = $user->role;
        function randomColor()
        {
            $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
            $randomIndex = array_rand($colors);
            return $colors[$randomIndex];
        }
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

        .nav-item1 {
            padding: 8px 4px;
            font-size: 16px;
            min-width: 2rem;
            -webkit-transition: .3s color;
            transition: .3s color;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer;
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -webkit-box-align: center;
            align-items: center;
        }

        .nav1.nav-column .nav-link.active {
            color: #fff !important;
            background-color: #559E99;
            padding: 8px;
            font-size: 16px;
            min-width: 100%;
            border-radius: 4px;
        }

        .nav-item1 a {
            display: flex;
            align-items: center;
        }

        .menu-icon {
            font-size: 18px;
        }
    </style>
    <div class="">
        <div class="d-flex align-items-center justify-content-between pt-lg-3 pb-3 flex-wrap gap-2 ">
            <h5 class="mb-0">
                <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <a
                        href="{{url('/leads')}}" class="text-muted fw-light pointer"><b>All Leads</b></a> / <b>View Lead</b>
                </div>
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
            <div class="col-md-3">
                <div class="card mb-4 ">
                    <div class="card-body p-2">
                        <div class="border-bottom  ">
                            <h4 class=" ">Select</h4>
                        </div>
                        <ul class="nav1 nav-column pb-0 flex-column br-7 px-0">
                            <li class="nav-item1 mt-0  ">
                                <a class="nav-link thumb active" onclick="showTab('lead-info')">
                                    <i class="menu-icon mr-2 tf-icons bx bx-layout "></i>
                                    Lead Information
                                </a>
                            </li>
                            <li class="nav-item1 tasks-tab">
                                <a class="nav-link  thumb" onclick="showTab('tasks-card')">
                                    <i class="menu-icon mr-2 tf-icons bx bx-task "></i>
                                    Notes
                                </a>
                            </li>
                            <li class="nav-item1 follows-tab">
                                <a class="nav-link  thumb" onclick="showTab('follows-card')">
                                    <i class="menu-icon mr-2 tf-icons bx bx-book "></i>
                                    Follow up
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9  ">
                <div class="lead-info">
                    <div class="d-lg-flex gap-3">
                        <div class="card w-100" id="alwaysShow">
                            <div class="card-header d-flex p-2 ">
                                <h4 class="mb-0 py-2">Lead Information</h4>
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-md-0">Lead Full Name</h6>
                                    </div>
                                    <div class="col-md-6 text-left text-secondary">
                                        {{$lead->contact_first_name . ' ' . $lead->contact_last_name}}
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
                        <div class="card w-100">
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
                    <div class="w-100">
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
                                        {{ $lead->type_id ? $lead->type_id->name : $lead->case_type }}
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

                <div class="card tasks-card d-none">
                    <div class="border-bottom d-flex align-items-center justify-content-between p-2 mt-2">
                        <h4 class="px-3">Notes</h4>
                        {{-- @if ($user->hasPermissionTo('Add Contact')) --}}
                        <div>
                            <a class="btn btn-primary NoteAddBtn print-btn pb-1 pt-1 " style="color: white;">
                                <i class="bx bx-save pb-1"></i>Add Note</a>
                        </div>
                        {{-- @endif --}}
                    </div>
                    <div class="card-body p-3">
                        <ul class="task-list" id="notes-list">
                            @foreach ($lead->get_followup as $item)
                                <li id="note-{{$item->id}}">
                                    <div class="row-container d-flex justify-content-between">
                                        <div><i class="task-icon bg-{{ randomColor() }}"></i>
                                            <h6 class="text-break">{{ $item->note }}</h6>
                                            <p class="text-muted fs-12">
                                                {{ \Carbon\Carbon::parse($item->date)->format('m/d/Y') }}
                                                {{ \Carbon\Carbon::parse($item->time)->format('h:i A') }}
                                            </p>
                                        </div>
                                        <!--div>
                                                                            <button class="NoteEditBtn btn pb-1 pt-1" data-data='@json($item)' title="Click to edit note">
                                                                                <i class="bx bx-edit pb-1"></i>
                                                                            </button>
                                                                        </div-->
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="card follows-card d-none">
                    <div class="border-bottom d-flex align-items-center justify-content-between p-2 mt-2">
                        <h4 class="px-3">Follow ups</h4>
                        {{-- @if ($user->hasPermissionTo('Add Contact')) --}}
                        <div>
                            <a class="btn btn-primary FollowupAddBtn pb-1 pt-1 " style="color: white;">
                                <i class="bx bx-save pb-1"></i>Add Follow up</a>
                        </div>
                        {{-- @endif --}}
                    </div>
                    <div class="card-body p-3">
                        <ul class="task-list" id="followups-list">
                            @foreach ($lead->get_followup as $item)
                                <li id="followup-{{$item->id}}">
                                    <div class="row-container d-flex justify-content-between">
                                        <div><i class="task-icon bg-{{ randomColor() }}"></i>
                                            <h6 class="text-break">{{ $item->note }}</h6>
                                            <p class="text-muted fs-12">
                                                Date & Time: {{ \Carbon\Carbon::parse($item->date)->format('m/d/Y') }}
                                                {{ \Carbon\Carbon::parse($item->time)->format('h:i A') }}
                                            </p>
                                        </div>
                                        <!--div>
                                                                            <button class="NoteEditBtn btn pb-1 pt-1" data-data='@json($item)' title="Click to edit note">
                                                                                <i class="bx bx-edit pb-1"></i>
                                                                            </button>
                                                                        </div-->
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog " role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addNoteModalHeader">Add Note</h5>
                        <button type="button" class="close close-btn closeContactModal" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="add_note_form" method="post">
                        @csrf
                        <input type="hidden" name="note_id" id="note_id" value="">
                        <input type="hidden" name="from" value="{{ $user->id }}">
                        <input type="hidden" name="to" value="{{ $lead->id }}">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <label for="form-label">Note <span class="text-danger">*</span></label>
                                    <textarea name="note" id="note_text" rows="5" maxlength="255"
                                        placeholder="Type note here" class="form-control address" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary note-button mb-3">Save</button>
                            <button type="button" class="btn btn-secondary mb-3 closeContactModal"
                                data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        document.getElementById('back-btn').addEventListener('click', function () {
            window.history.back();
        });
        function randomColor() {
            const colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
            const randomIndex = Math.floor(Math.random() * colors.length);
            return colors[randomIndex];
        }
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

        function showTab(tabName) {

            if (tabName == 'patient-card') {
                $("#second-tab").show();
            }
            else {
                $("#second-tab").hide();
            }

            $("#alwaysShow").removeClass('d-none');
            $(".lead-info").addClass('d-none');
            $(".tasks-card").addClass('d-none');
            $(".follows-card").addClass('d-none');
            $("." + tabName).removeClass('d-none');
        }

        $(document).ready(function () {

            $(document).on('submit', '#add_note_form', function (e) {
                e.preventDefault();
                $('.form-control').removeClass('is-invalid');
                $('.invalid-feedback.is-invalid').remove();
                $('.note-button').attr('disabled', true);

                $.ajax({
                    url: "{{ route('note.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {
                        hideAddContactModal();
                        $('.note-button').attr('disabled', false);
                        $("#addNoteModal").removeClass("in").hide();
                        $("#followupModal").removeClass("in").hide();
                        $("#add_note_form").trigger("reset");
                        swal.fire('Success', data.message, 'success');

                        let noteDateTime1 = new Date(`${data.note.date}T${data.note.time}`);

                        let formattedDate1 = noteDateTime1.toLocaleDateString('en-US', {
                            month: '2-digit',
                            day: '2-digit',
                            year: 'numeric'
                        });

                        let notes_list = $("#notes-list");
                        let note_id = data.note.id;

                        let existing_note = $(`#note-${note_id}`);

                        let noteTime = new Date(`1970-01-01T${data.note.time}`);

                        let formattedTime = noteTime.toLocaleTimeString('en-US', {
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true
                        });

                        if (existing_note.length > 0) {

                            existing_note.html(`
                            <div class="row-container d-flex justify-content-between">
                                <div>
                                    <i class="task-icon bg-${randomColor()}"></i>
                                    <h6>${data.note.note}</h6>
                                    <p class="text-muted fs-12">${formattedDate1} ${formattedTime}</p>
                                </div>
                                <div>
                                    <button
                                        class="NoteEditBtn1 btn pb-1 pt-1"
                                        data-data='${JSON.stringify(data.note)}'
                                        title="Click to edit note">
                                    </button>
                                </div>
                            </div>
                        `);
                        } else {
                            notes_list.prepend(`
                            <li id="note-${note_id}">
                                <div class="row-container d-flex justify-content-between">
                                    <div>
                                        <i class="task-icon bg-${randomColor()}"></i>
                                        <h6>${data.note.note}</h6>
                                        <p class="text-muted fs-12">${formattedDate1} ${formattedTime}</p>
                                    </div>
                                    <div>
                                        <button
                                            class="NoteEditBtn1 btn pb-1 pt-1"
                                            data-data='${JSON.stringify(data.note)}'
                                            title="Click to edit note">
                                        </button>
                                    </div>
                                </div>
                            </li>
                        `);
                        }
                    },
                    error: function (xhr) {
                        $('.note-button').attr('disabled', false);
                        erroralert(xhr);
                    }
                });
            });
        });
    </script>
@endsection
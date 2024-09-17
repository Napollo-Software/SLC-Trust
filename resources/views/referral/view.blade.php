@extends('nav')
@section('title', 'View Referrals | SLC Trust')
@section('wrapper')

<!-- BOOTSTRAP CSS -->
<!-- STYLE CSS -->
<link href="{{ url('/assets/custom/style.css') }}" rel="stylesheet" />
<!--- FONT-ICONS CSS -->
@php
$role = App\Models\User::where('id', '=', Session::get('loginId'))->value('role');
function randomColor()
{
$colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
$randomIndex = array_rand($colors);
return $colors[$randomIndex];
}
@endphp
<style>
    .custom-hover:hover {
        color: #559e99 !important;
    }


    .fancy-plus-button {
        background-color: #559e99;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        /* Slightly smaller font size */
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        /* Less rounded corners for a horizontal rectangle */
        transition: transform 0.3s, background-color 0.3s;
        /* Smooth transition */

    }

    .dataTable {
        white-space: nowrap;

    }

    .fancy-plus-button:hover,
    .fancy-plus-button:focus {
        background-color: #16b6d3;
        /* Bright turquoise on hover/focus */
        transform: scale(1.05);
        /* Slightly increase size on hover/focus for feedback */
    }

    .fancy-plus-button::before {
        content: '+';
        /* Add the plus sign */
        color: white;
        /* White color for the plus sign */

    }

    .primary-menu .navbar .navbar-nav a.nav-link:hover {
        color: #32393f !important;
        background-color: #f5f6f7 !important;
    }

    /* .search-bar-padding{
            width: 94% !important;
            padding:7px !important;
            font-size: 1rem !important;
        } */
</style>
<div class="">

    <!-- CONTENT -->

    <!-- PAGE-HEADER -->
    <div class="page-header m-0 fw-bold">
        <div>
            <h1 class="page-title">Referral ID:{{ $referral->id }}
            </h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Referrals</li>
                {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">File Manager</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">View Referral</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW -->

    <div class="row p-2">
        <div class="col-lg-4 col-xl-2">
            <div class="card mb-4">
                {{-- <div class="card-header border-bottom">
                        <a class="btn btn-outline-primary btn-block py-2" href="http://localhost/Noa/file-manager-1">Add
                            Referral</a>
                    </div> --}}
                <div class="card-body p-2">
                    <h4>Referral ID:{{ $referral->id }}</h4>
                    <ul class="nav1 nav-column flex-column br-7 p-3">
                        <li class="nav-item1 mt-0 services-tab">
                            <a class="nav-link thumb active" onclick="showTab('services-card')">
                                <i class="menu-icon tf-icons bx bx-layout "></i>
                                Services
                            </a>
                        </li>
                        <li class="nav-item1 patient-tab">
                            <a class="nav-link thumb" onclick="showTab('patient-card')">
                                <i class="menu-icon tf-icons bx bx-user "></i>
                                Patient
                            </a>
                        </li>
                        <li class="nav-item1 tasks-tab">
                            <a class="nav-link thumb" onclick="showTab('tasks-card')">
                                <i class="menu-icon tf-icons bx bx-task "></i>
                                Follow Up
                            </a>
                        </li>
                        {{-- <li class="nav-item1 sms-tab">
                            <a class="nav-link thumb" onclick="showTab('sms-card')">
                                <i class="menu-icon tf-icons bx bx-message "></i>
                                SMS
                            </a>
                        </li> --}}
                        <li class="nav-item1 esign-tab">
                            <a class="nav-link thumb" onclick="showTab('esign-card')">
                                <i class="menu-icon tf-icons bx bx-file "></i>
                                E-Sign / Document
                            </a>
                        </li>
                        <li class="nav-item1 attachment-tab">
                            <a class="nav-link thumb" onclick="showTab('attachment-card')">
                                <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                                Attachment
                            </a>
                        </li>
                        <li class="nav-item1 medicaid-tab">
                            <a class="nav-link thumb" onclick="showTab('medicaid-card')">
                                <i class="menu-icon tf-icons bx bx-shekel"></i>
                                Medicaid / Medicare
                            </a>
                        </li>
                        <li class="nav-item1 submission-tab d-none">
                            <a class="nav-link thumb" onclick="showTab('submission-card')">
                                <i class="menu-icon tf-icons bx bx-alarm"></i>
                                Submission Info
                            </a>
                        </li>
                        <li class="nav-item1 physician-tab">
                            <a class="nav-link thumb" onclick="showTab('physician-card')">
                                <i class="menu-icon tf-icons bx bx-briefcase"></i>
                                Physician
                            </a>
                        </li>
                        <li class="nav-item1 related-records-tab d-none">
                            <a class="nav-link thumb" onclick="showTab('records-card')">
                                <i class="menu-icon tf-icons bx bx-food-menu"></i>
                                Related Records
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="card">
                @if ($referral->get_followup->isNotEmpty())
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 style="margin-top: 10px;">Follow Up</h5>
                        </div>
                        <div class="col-3 text-end">
                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal">
                                <i class='bx bx-edit-alt me-1'></i> Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body upgrade-storage bg-primary-transparent" style="padding: 15px;">
                    <div class="row">
                        <div class="col-md-12">
                            <p id="followup-note">{{ $referral->get_followup->first()->note }}</p>
                        </div>
                        <div class="col-md-7">
                            <h6>Date</h6>
                            <p>{{ $referral->get_followup->first()->date }}</p>
                        </div>
                        <div class="col-md-5">
                            <h6>Time</h6>
                            <p>{{ $referral->get_followup->first()->time }}</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>


        <div class="col-xl-8 col-lg-8 ">
            <div class="card " id="alwaysShow">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-9 ">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                    <img src="{{ url('user/images93561655300919_avatar.png') }}" alt="img" class="m-0 p-1 rounded hrem-6">
                                </div>
                                <div class="ms-4">
                                    <h4 class="m-0">{{ $referral->full_name() }}</h4>
                                    <p class="text-muted m-1">{{ $referral->email }}</p>
                                    <a href="#" class="btn btn-primary btn-sm custom-hover p-2">
                                        {{ $referral->created_at }}</a>
                                    <a href="#" class="btn btn-primary btn-sm custom-hover p-2">
                                        {{ $referral->status }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class=" p-2">
                                <h4>Progress</h4>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $totalTrust }}%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div>
                                    <h4 class="total-trust" style="float: right">{{ $totalTrust }}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top services-card" id="serviceController">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#esignCard" data-bs-toggle="tab" class="active">E-sign</a>
                                    </li>
                                    <li><a href="#documentCard" data-bs-toggle="tab" class="">Documents</a>
                                    </li>
                                    <li><a href="#checkList" data-bs-toggle="tab" class="">Checklist</a></li>
                                    <li><a href="#financeCard" data-bs-toggle="tab" class="">Finance</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content p-0">
                <div class="tab-pane show" id="profileMain">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="p-5">
                                <h3 class="card-title">Biodata</h3>
                                <p class="text-dark-light">Hi I'm Teri Dactyl,has been the industry's standard dummy
                                    text ever since the 1500s, when an unknown printer took a galley of type. Donec
                                    pede
                                    justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus
                                    ut,
                                    imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                                    Integer tincidunt.Cras dapibus asdkj. Vivamus elementum semper nisi. Aenean
                                    vulputate
                                    eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac,
                                    enim.</p>
                                <div>
                                    <div>
                                        <h5 class="text-dark text-14 mb-0">Lead designer / Developer</h5>
                                        <a href="javascript:void(0)" class="text-primary">websitenamename.com</a>
                                        <p class="mb-2 mt-3"><b>2010-2015</b></p>
                                        <p class="text-muted text-14">Lorem Ipsum is simply dummy text of the
                                            printing
                                            and typesetting industry. Lorem Ipsum has been the industry's standard
                                            dummy
                                            text ever since the 1500s, when an unknown printer took a galley of type
                                            and
                                            scrambled it to make a type specimen book.</p>
                                    </div>

                                    <div>
                                        <h5 class="text-dark text-14 mb-0">Senior Graphic Designer</h5>
                                        <a href="javascript:void(0)" class="text-primary">samplewebsite.com</a>
                                        <p class="mb-2 mt-3"><b>2007-2009</b></p>
                                        <p class="text-muted text-14 mb-0">Lorem Ipsum is simply dummy text of the
                                            printing and typesetting industry. Lorem Ipsum has been the industry's
                                            standard dummy text ever since the 1500s, when an unknown printer took a
                                            galley of type and scrambled it to make a type specimen book.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="table-responsive p-5">
                                <h3 class="card-title">Personal Info</h3>
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Full Name :</strong> Elena Gilbert</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Location :</strong> USA</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Languages :</strong> English, German, Spanish</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0 border-top-0">
                                        <tr>
                                            <td><strong>Website :</strong> websitename.com</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email :</strong> elenagilbert@websitename.com</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Phone :</strong> +125 254 3562</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Statistics</h3>
                                <div class="profile-cover__info ms-4 ms-auto p-0">
                                    <ul class="nav p-0 border-bottom-0 mb-0">
                                        <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center my-1">
                                            <span class="border-0 mb-0 pb-0 fs-21">113</span>
                                            Projects
                                        </li>
                                        <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center mx-2 my-1">
                                            <span class="border-0 mb-0 pb-0 fs-21">245</span>
                                            Followers
                                        </li>
                                        <li class="border p-2 br-5 bg-light-lightest wpx-100 hpx-70 text-center my-1">
                                            <span class="border-0 mb-0 pb-0 fs-21">128</span>
                                            Following
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Contact</h3>
                                <div class="d-sm-flex">
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-primary-transparent text-primary"><i class="fe fe-phone fs-21"></i></div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Mobile</span>
                                                    <p class="mb-0"> +245 354 654 </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-success-transparent text-success"><i class="fe fe-slack fs-21"></i></div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Slack</span>
                                                    <p class="mb-0"> @spruko.w </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"><i class="fe fe-map-pin fs-21"></i></div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Current Address</span>
                                                    <p class="mb-0"> San Francisco, CA </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top"></div>
                            <div class="p-5">
                                <h3 class="card-title">Social</h3>
                                <div class="d-md-flex">
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-primary-transparent text-primary"><i class="fe fe-github fs-21"></i></div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Github</span>
                                                    <p class="mb-0"><a href="javascript:void(0)" class="text-default">github.com/spruko</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-success-transparent text-success"><i class="fe fe-twitter fs-21"></i></div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Twitter</span>
                                                    <p class="mb-0"><a href="javascript:void(0)" class="text-default">twitter.com/spruko.me</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="main-profile-contact-list">
                                            <div class="media mx-2">
                                                <div class="media-icon bg-info-transparent text-info"><i class="fe fe-linkedin fs-21"></i></div>
                                                <div class="media-body ms-2">
                                                    <span class="text-muted">Linkedin</span>
                                                    <p class="mb-0"><a href="javascript:void(0)" class="text-default">linkedin.com/in/spruko</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="documentCard">
                    <div class="card services-card">
                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div style="padding-left: 15px">
                                            <input class="trustDocument" type="checkbox" name="document" {{ $referral->trustDocument ? 'checked' : '' }}>
                                            <label>Mark As Read</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Received Documents {{ $recievedDocumentCount }}</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Pending Documents {{ $pendingDocumentCount }}</h5>
                                    </div>
                                </div>

                                <div>
                                    <div class="overflow-auto" style="padding: 10px">
                                        <table class="table table-bordered dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Approved By</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($referralDocuments as $item)
                                                <tr>
                                                    <td>
                                                        {{ $item->name() }}
                                                        <input id="document_id" type="hidden" class="{{ $item->name }}" value="{{ $item->id }}" name="document_id">
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn {{ $item->name }}
                                                                    @if ($item->status == 'Approved') btn-primary custom-hover {{ 'changeStatus' . $item->id }} @endif
                                                                    @if ($item->status == 'pending') btn-warning {{ 'changeStatus' . $item->id }} @endif
                                                                    @if ($item->status == 'Rejected') btn-danger {{ 'changeStatus' . $item->id }} @endif
                                                                    @if ($item->status == 'Doc Sent') btn-secondary {{ 'changeStatus' . $item->id }} @endif
                                                                    @if ($item->status == 'Recieved') btn-info {{ 'changeStatus' . $item->id }} @endif
                                                                   dropdown-toggle" type="button" id="statusDropdown{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{ $item->status }}
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="statusDropdown{{ $item->id }}">
                                                                <a class="dropdown-item status-option" href="#" data-value="pending" data-id="{{ $item->id }}">Pending</a>
                                                                <a class="dropdown-item status-option" href="#" data-value="Doc Sent" data-id="{{ $item->id }}">Doc
                                                                    Sent</a>
                                                                <a class="dropdown-item status-option" href="#" data-value="Approved" data-id="{{ $item->id }}">Approved</a>
                                                                <a class="dropdown-item status-option" href="#" data-value="Rejected" data-id="{{ $item->id }}">Rejected</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td id="approved-by-{{ $item->id }}" class="changeStatusText{{ $item->id }}">
                                                        @if ($item->approved_by === null || $item->status !== 'Approved')
                                                        N/A
                                                        @else
                                                        {{ $item->approvedBy->name }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="menu-icon tf-icons bx bx-cog"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                @if ($item->uploaded_url == null)
                                                                <button type="button" data-id="{{ $item['id'] }}" data-referral="{{ $item['referral_id'] }}" class="dropdown-item uploadBtn document-{{ $item->id }}" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                                                    <i class='menu-icon pb-1 tf-icons bx bx-upload'></i>
                                                                    Upload Signed
                                                                </button>
                                                                @else
                                                                <button type="button" data-id="{{ $item['id'] }}" data-referral="{{ $item['referral_id'] }}" data-filename="{{ $item['uploaded_url'] }}" class="dropdown-item uploadBtn previewBtn">
                                                                    <i class="fe fe-eye me-2"></i>
                                                                    Preview Upload
                                                                </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                    </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-pane" id="checkList">
                <div class="card services-card pt-3">

                    <form id="referralUpdateForm">
                        @csrf
                        <input type="hidden" name="referral_id" id="referral_id" value="{{ $referral->id }}">
                        <div class="row" style="display: flex; justify-content: space-around; padding: 20px; padding-left:20px">
                            <div style="padding-left: 10px">
                                <input class="trustCheckList" type="checkbox" name="checkList" {{ $referral->trustCheckList ? 'checked' : '' }}>
                                <label>Mark As Complete</label>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ $checks->disability == 1 ? 'checked' : '' }} name="document_checkboxes1">
                                        </td>
                                        <td>DOH -5139 Disability FILLABLE Questionnaire</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ $checks->doh == 1 ? 'checked' : '' }} name="document_checkboxes2">
                                        </td>
                                        <td>DOH</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ $checks->hipaa_state == 1 ? 'checked' : '' }} name="document_checkboxes3">
                                        </td>
                                        <td>DOH 5173-Hipaa State</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ $checks->joinder == 1 ? 'checked' : '' }} name="document_checkboxes5">
                                        </td>
                                        <td>Joinder Agreement</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ $checks->hipaa == 1 ? 'checked' : '' }} name="document_checkboxes4">
                                        </td>
                                        <td>DOH-960 Hipaa</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" {{ $checks->map == 1 ? 'checked' : '' }} name="document_checkboxes6">
                                        </td>
                                        <td>MAP-751e - Authorization to Release Medical Information</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary m-2 custom-hover" style="text-align: center; float: right;">
                                Save <i class="bx bx-save custom-hover" style="color: white; margin-bottom: 5px;"></i>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="tab-pane" id="financeCard">
                <div class="card services-card">
                    <div style="margin:20px">
                        <form>
                            <!-- <div class="row">
                                <div style="padding-left: 15px">
                                    <input class="trustFinance" type="checkbox" name="finance" {{ $referral->trustFinance ? 'checked' : '' }}>
                                    <label>Mark As Complete</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="enrollmentDate" class="form-label">Enrollment Date</label>
                                    <input type="date" class="form-control" id="enrollmentDate" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="enrollmentFee" class="form-label">Enrollment Fee</label>
                                    <input type="text" class="form-control" id="enrollmentFee" maxlength="6" placeholder="$250.00">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="surplusAmount" class="form-label">Surplus Amount</label>
                                    <input type="text" class="form-control" id="surplusAmount" maxlength="6" placeholder="$250.00">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="monthlyMaintenanceFee" class="form-label">Monthly Maintenance
                                        Fee</label>
                                    <input type="text" class="form-control" id="monthlyMaintenanceFee" maxlength="6" placeholder="$250.00">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fundsAvailable" class="form-label">Funds Available for Bill
                                        Payments</label>
                                    <input type="text" class="form-control" id="fundsAvailable" maxlength="6" placeholder="$250.00">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="enrollmentFeeStatus" class="form-label">Enrollment Fee
                                        Status</label>
                                    <input type="text" class="form-control" id="enrollmentFeeStatus" placeholder="Paid">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="debitDate" class="form-label">Debit Date</label>
                                    <input type="date" class="form-control" id="debitDate">
                                </div>
                            </div> -->
                            <h2>Bank Info</h2>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="accountType" class="form-label">Account Type</label>
                                    <input type="text" class="form-control" id="accountType" value="Checking">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bankName" class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" id="bankName" placeholder="Nationale Bank">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="routingABA" class="form-label">Routing ABA</label>
                                    <input type="text" class="form-control" id="routingABA" value="xxxxxxx">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="accountNumber" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="accountNumber" value="0321 xxxxxx">
                                </div>
                            </div>
                            <button class="btn btn-primary" id="submitBtn" type="submit" style="float: right; margin-bottom:10px">Create Account <i class="bx bx-save" style="color: white; "></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="tab-pane" id="friends">
                <div class="row row-sm">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/1.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Lisbon Taylor</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body  user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/11.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">jordan Ramsay</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body  user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/12.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Corey Richard</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body  user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/5.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Lana Del Rey</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i>
                                            Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/7.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Mariana Gold</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body  user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i> </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/13.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Travis Bickle</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body  user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/8.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">Emilie Benett</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card custom-card border">
                            <div class="card-body  user-lock text-center">
                                <div class="dropdown text-end">
                                    <a href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical text-muted"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow"><a class="dropdown-item" href="#"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="#"><i class="fe fe-edit-2 me-2"></i>
                                            Edit</a> <a class="dropdown-item" href="#"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="#"><i class="fe fe-trash-2 me-2"></i> Delete</a></div>
                                </div>
                                <a href="#">
                                    <img alt="avatar" class="avatar avatar-xl rounded" src="http://localhost/Noa/assets/images/faces/4.jpg">
                                    <h4 class="fs-16 mb-0 mt-3 text-dark fw-semibold">James Thomas</h4>
                                    <span class="text-muted">Web designer</span>
                                </a>
                                <div class="footer-container-main border-0 my-2">
                                    <div class="footer p-0 icons-bg border-0">
                                        <div class="social">
                                            <ul class="text-center">
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Facebook" aria-label="Facebook"><i class="fa fa-facebook"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Twitter" aria-label="Twitter"><i class="fa fa-twitter"></i></a>
                                                </li>
                                                <li>
                                                    <a class="social-icon" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Linkedin" aria-label="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane active services-card" id="esignCard">
                <form id="emailForm">
                    @csrf
                    <input type="hidden" value="{{ $referral->id }} " name="referral_id">
                    <div class="card">
                        <div class="card-body col-md-12">
                            <div class="overflow-auto">
                                <div>
                                    <input class="trustEsign" type="checkbox" name="esign" {{ $referral->trustEsign ? 'checked' : '' }}>
                                    <label>Mark As Complete</label>
                                </div>
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Select</th>
                                            <th>Document Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($actualDocuments as $actualDocument)
                                        <tr>
                                            <td style="text-align: center;">
                                                <input name="selected_documents[{{ $actualDocument->name }}]" class="document-list" value="{{ $actualDocument->name }}" type="checkbox">
                                            </td>
                                            <td>
                                                {{ $actualDocument->name() }}
                                            </td>
                                        </tr>

                                        @endforeach
                                        <tr>
                                            <td style="text-align: center;">
                                                <a class="fancy-plus-button">

                                                </a>
                                            </td>
                                            <td>
                                                Select Documents to upload
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary email-btn custom-hover disabled" id="submitBtn" type="submit" style="float: right; margin-bottom:10px">Send Email <i class="bx bx-message"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card patient-card d-none" id="patientCard">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading">
                            <div class="tabs-menu1">
                                <ul class="nav">
                                    <li><a href="#referral_detail" data-bs-toggle="tab" class="active">Account</a>
                                    </li>
                                    <li><a href="#emergency_detail" data-bs-toggle="tab" class="">Emergency Details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="col-md-12  tab-pane active" id="referral_detail">
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="userName" class="form-label">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <p> {{ $referral->first_name }} {{ $referral->last_name }} </p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="eMail" class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <p> {{ $referral->email }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="108">
                            <div class="row" data-select2-id="107">
                                <div class="col-md-3">
                                    <label for="language" class="form-label">Phone</label>
                                </div>
                                <div class="col-md-9" data-select2-id="106">
                                    <p> {{ $referral->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Gender</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->gender }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Date of birth</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->date_of_birth }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Patient SSN</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->patient_ssn }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Patient Address</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->address }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Patient Age</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->age }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Country</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->country }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">City</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->city }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">State</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->state }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Address</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->address }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">ZIP Code</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->zip_code }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group " data-select2-id="10">
                            <div class="row" data-select2-id="9">
                                <div class="col-md-3">
                                    <label for="timeZone" class="form-label">Source Type</label>
                                </div>
                                <div class="col-md-9" data-select2-id="8">
                                    <p> {{ $referral->source_type }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input type="checkbox">
                        <label>Mark As Main Contact</label>
                    </div>
                    <div class="col-md-12 tab-pane" id="emergency_detail">
                        <form id="EmergencyForm">
                            @csrf
                            <input type="hidden" name="id" value="{{ $referral->emergency_details->id }}">
                            <div class="form-group">
                                <div class="row row-sm">
                                    <div class="col-md-3">
                                        <label for="emergencyUserName" class="form-label hiddenFields">First
                                            Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="emergencyUserName" name="emergency_first_name" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_first_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="row row-sm">
                                    <div class="col-md-3">
                                        <label for="emergencyUserName" class="form-label">Last Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="emergencyUserName" name="emergency_last_name" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_last_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="row row-sm">
                                    <div class="col-md-3">
                                        <label for="eMail" class="form-label">Relationship</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="eMail" name="emegency_relationship" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_relationship }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="108">
                                <div class="row" data-select2-id="107">
                                    <div class="col-md-3">
                                        <label for="language" class="form-label hiddenFields">Phone</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="106">
                                        <input type="tel" id="language" name="emergency_phone" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_phone_number }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label hiddenFields">Email</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="email" id="timeZone" name="emergency_email" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">EXT Number</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="number" id="timeZone" name="emergency_ext" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_ext_number }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">State</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" id="timeZone" name="emergency_state" class="form-control" value="{{ $referral->emergency_details->emergency_state }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Zip Code</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="number" id="timeZone" name="emergency_zip" class="form-control " value="{{ $referral->emergency_details->emergency_zip_code }}" readonly>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">City</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" id="timeZone" name="emergency_city" class="form-control" value="{{ $referral->emergency_details->emergency_city }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Address</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" id="timeZone" name="address_of_emergency" class="form-control" value="{{ $referral->emergency_details->emergency_address }}" readonly>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label class="form-label">APT/Suite</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" name="emergency_apt" class="form-control hiddenFields" value="{{ $referral->emergency_details->emergency_apt_suite }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <button type="button" style="float: right" class="btn btn-primary custom-hover editButton">Edit
                            </button>
                            <button type="submit" style="float: right; display: none;" class="btn btn-primary custom-hover submitButton">Submit
                            </button>
                            <button type="button" style="margin-right:5px; float: right; display: none;" class="btn btn-secondary custom-hover cancelButton">Cancel
                            </button>

                        </form>
                    </div>


                </div>
            </div>
        </div>
        <div class="tab-content p-0">
            <div class="tab-pane show" id="profileMain">
                <div class="card">
                    <div class="card-body p-0">
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="documentCard">
                <div class="card">
                    <div class="card-body border-0">
                        <div class="row mb-4">
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="username" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="username" value="Elena Gilbert">
                                </div>
                            </div>

                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="First Name" value="Elena">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">last Name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Last Name" value="Gilbert">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="nickname" class="form-label">Nick Name</label>
                                    <input type="text" class="form-control" id="nickname" placeholder="Nick Name" value="Noa">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" placeholder="Designation" value="Web Designer">
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 text-17">Contact Info</p>
                        <div class="form-group">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="email" placeholder="Email" value="info@noa.in">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="website" class="form-label">Website</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="website" placeholder="Website" value="@spruko.w">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="phoneNumber" class="form-label">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="phoneNumber" placeholder="phone number" value="+145 541 773">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="address" class="form-label">Address</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="address" name="example-textarea-input" rows="2" placeholder="Address">San Francisco, CA</textarea>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 text-17">Social Info</p>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="twitter" placeholder="twitter" value="twitter.com/spruko.me">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="facebook" placeholder="facebook" value="https://www.facebook.com/Noa">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="googlePlus" class="form-label">Google+</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="googlePlus" placeholder="google" value="spruko.com">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="linkedin" class="form-label">Linkedin</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="linkedin" placeholder="linkedin" value="linkedin.com/in/spruko">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="github" class="form-label">Github</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="github" placeholder="github" value="github.com/sprukos">
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 text-17">About Yourself</p>
                        <div class="form-group ">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label for="biographicalInfo" class="form-label">Biographical
                                        Info</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="example-textarea-input" id="biographicalInfo" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
                                </div>
                            </div>
                        </div>
                        <p class="mb-4 text-17">Email Preferences</p>
                        <div class="form-group mb-0">
                            <div class="row row-sm">
                                <div class="col-md-3">
                                    <label class="form-label">Verified User</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-controls-stacked">
                                        <label class="ckbox"><input type="checkbox" checked=""><span>
                                                Accept to receive post or page notification
                                                emails</span></label>
                                        <label class="ckbox"><input type="checkbox" checked=""><span>
                                                Accept to receive email sent to multiple
                                                recipients</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="checkList">
                <div class="row row-sm">
                    <div class="col-12">
                        <div class="card border">
                            <div class="card-header border-bottom d-block p-4">
                                <div class="media overflow-visible">
                                    <div class="media-user me-2">
                                        <div class="main-img-user"><img alt="" class="rounded-circle avatar-md" src="http://localhost/Noa/assets/images/faces/6.jpg">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 ms-2">Mintrona Pechon Pechon</h6><span class="text-primary ms-2">just now</span>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown show main-contact-star">
                                            <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fe fe-more-vertical  tx-18"></i></a>
                                            <div class="dropdown-menu shadow">
                                                <a class="dropdown-item" href="#">Edit Post</a>
                                                <a class="dropdown-item" href="#">Delete Post</a>
                                                <a class="dropdown-item" href="#">Personal Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable.</p>
                                <div class="row row-sm">
                                    <div class="col">
                                        <img alt="img" class="h-200 mb-2 mt-2 me-4 br-5" src="http://localhost/Noa/assets/images/media/checkList1.jpg">
                                        <img alt="img" class="h-200 br-5" src="http://localhost/Noa/assets/images/media/checkList2.jpg">
                                    </div>
                                </div>
                                <div class="media mt-4 profile-footer align-items-center">
                                    <div class="avatar-list avatar-list-stacked me-4">
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/8.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/8.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/7.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/7.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/9.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/9.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/14.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/14.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/11.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/11.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius bg-primary">+8</span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 text-bold text-dark-light">28 people like your photo</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border">
                            <div class="card-header border-bottom d-block p-4">
                                <div class="media overflow-visible">
                                    <div class="media-user me-2">
                                        <div class="main-img-user"><img alt="" class="rounded-circle avatar-md" src="http://localhost/Noa/assets/images/faces/6.jpg">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 ms-2">Mintrona Pechon Pechon</h6><span class="text-primary ms-2">just now</span>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown show main-contact-star">
                                            <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fe fe-more-vertical  tx-18"></i></a>
                                            <div class="dropdown-menu shadow">
                                                <a class="dropdown-item" href="#">Edit Post</a>
                                                <a class="dropdown-item" href="#">Delete Post</a>
                                                <a class="dropdown-item" href="#">Personal Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable.</p>
                                <div class="row row-sm">
                                    <div class="col">
                                        <img alt="img" class="h-200 mb-2 mt-2 me-4 br-5" src="http://localhost/Noa/assets/images/media/checkList3.jpg">
                                        <img alt="img" class="h-200 br-5" src="http://localhost/Noa/assets/images/media/checkList4.jpg">
                                    </div>
                                </div>
                                <div class="media mt-4 profile-footer align-items-center">
                                    <div class="avatar-list avatar-list-stacked me-4">
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/8.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/8.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/7.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/7.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/9.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/9.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/14.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/14.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/11.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/11.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius bg-primary">+8</span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 text-bold text-dark-light">28 people like your photo</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card border">
                            <div class="card-header border-bottom d-block p-4">
                                <div class="media overflow-visible">
                                    <div class="media-user me-2">
                                        <div class="main-img-user"><img alt="" class="rounded-circle avatar-md" src="http://localhost/Noa/assets/images/faces/6.jpg">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 ms-2">Mintrona Pechon Pechon</h6><span class="text-primary ms-2">just now</span>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown show main-contact-star">
                                            <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fe fe-more-vertical  tx-18"></i></a>
                                            <div class="dropdown-menu shadow">
                                                <a class="dropdown-item" href="#">Edit Post</a>
                                                <a class="dropdown-item" href="#">Delete Post</a>
                                                <a class="dropdown-item" href="#">Personal Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable.</p>
                                <div class="row row-sm">
                                    <div class="col">
                                        <img alt="img" class="h-200 mb-2 mt-2 me-4 br-5" src="http://localhost/Noa/assets/images/media/checkList5.jpg">
                                        <img alt="img" class="h-200 br-5" src="http://localhost/Noa/assets/images/media/checkList6.jpg">
                                    </div>
                                </div>
                                <div class="media mt-4 profile-footer align-items-center">
                                    <div class="avatar-list avatar-list-stacked me-4">
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/8.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/8.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/7.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/7.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/9.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/9.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/14.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/14.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/11.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/11.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius bg-primary">+8</span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 text-bold text-dark-light">28 people like your photo</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header border-bottom d-block p-4">
                                <div class="media overflow-visible">
                                    <div class="media-user me-2">
                                        <div class="main-img-user"><img alt="" class="rounded-circle avatar-md" src="http://localhost/Noa/assets/images/faces/6.jpg">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 ms-2">Mintrona Pechon Pechon</h6><span class="text-primary ms-2">just now</span>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="dropdown show main-contact-star">
                                            <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fe fe-more-vertical  tx-18"></i></a>
                                            <div class="dropdown-menu shadow">
                                                <a class="dropdown-item" href="#">Edit Post</a>
                                                <a class="dropdown-item" href="#">Delete Post</a>
                                                <a class="dropdown-item" href="#">Personal Settings</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable.</p>
                                <div class="row row-sm">
                                    <div class="col">
                                        <img alt="img" class="h-200 mb-2 mt-2 me-4 br-5" src="http://localhost/Noa/assets/images/media/checkList7.jpg">
                                        <img alt="img" class="h-200 br-5" src="http://localhost/Noa/assets/images/media/checkList9.jpg">
                                    </div>
                                </div>
                                <div class="media mt-4 profile-footer align-items-center">
                                    <div class="avatar-list avatar-list-stacked me-4">
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/8.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/8.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/7.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/7.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/9.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/9.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/14.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/14.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius cover-image" data-bs-image-src="http://localhost/Noa/assets/images/users/11.jpg" style="background: url(&quot;http://localhost/Noa/assets/images/users/11.jpg&quot;) center center;"></span>
                                        <span class="avatar avatar-md rounded-circle bradius bg-primary">+8</span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mb-0 text-bold text-dark-light">28 people like your photo</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="financeCard">
                <div class="row  mb-5 img-financeCard" id="lightfinanceCard" lg-uid="lg0">
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/8.jpg" data-src="http://localhost/Noa/assets/images/media/8.jpg" lg-event-uid="&amp;1">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/8.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/10.jpg" data-src="http://localhost/Noa/assets/images/media/10.jpg" lg-event-uid="&amp;2">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/10.jpg" alt="banner image "></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/11.jpg" data-src="http://localhost/Noa/assets/images/media/11.jpg" lg-event-uid="&amp;3">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/11.jpg" alt="banner image "></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/12.jpg" data-src="http://localhost/Noa/assets/images/media/12.jpg" lg-event-uid="&amp;4">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/12.jpg" alt="banner image "></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/13.jpg" data-src="http://localhost/Noa/assets/images/media/13.jpg" lg-event-uid="&amp;5">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/13.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/14.jpg" data-src="http://localhost/Noa/assets/images/media/14.jpg" lg-event-uid="&amp;6">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/14.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/15.jpg" data-src="http://localhost/Noa/assets/images/media/15.jpg" lg-event-uid="&amp;7">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/15.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/16.jpg" data-src="http://localhost/Noa/assets/images/media/16.jpg" lg-event-uid="&amp;8">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/16.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/17.jpg" data-src="http://localhost/Noa/assets/images/media/17.jpg" lg-event-uid="&amp;9">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/17.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/18.jpg" data-src="http://localhost/Noa/assets/images/media/18.jpg" lg-event-uid="&amp;10">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/18.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/19.jpg" data-src="http://localhost/Noa/assets/images/media/19.jpg" lg-event-uid="&amp;11">
                        <a href="#"><img class="img-fluid wp-100 mb-2 br-5" src="http://localhost/Noa/assets/images/media/19.jpg" alt="banner image"></a>
                    </div>
                    <div class="col-lg-3 col-md-6" data-responsive="http://localhost/Noa/assets/images/media/20.jpg" data-src="http://localhost/Noa/assets/images/media/20.jpg" lg-event-uid="&amp;12">
                        <a href="#"><img class="img-fluid wp-100 br-5" src="http://localhost/Noa/assets/images/media/20.jpg" alt="banner image"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card tasks-card d-none">
            <div class="border-bottom p-2 mt-2">
                <h3 class="">Follow Ups</h3>
            </div>
            <div class="card-body p-3">
                @foreach ($referral->get_followup as $item)
                <ul class="task-list">
                    <li>
                        <div class="row-container">
                            <i class="task-icon bg-{{ randomColor() }}"></i>
                            <h6>{{ $item->note }}</h6>
                            <p class="text-muted fs-12">{{ $item->date }}</p>

                    </li>
                </ul>
                @endforeach
            </div>
        </div>
        <div class="card sms-card d-none pb-3">
            <div class="main-content-app pt-0" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <h1 style="padding: 50px">Coming Soon</h1>
            </div>
        </div>

        <div class="card esign-card d-none">
            <form id="emailForm">
                @csrf
                <input type="hidden" value="{{ $referral->id }} " name="referral_id">
                <div class="card-body col-md-12">
                    <div class="overflow-auto">
                        <table class="table align-middle mb-0 table-hover dataTable ">
                            <thead>
                                <tr>
                                    <th style="width: 5px;">CheckBox</th>
                                    <th>Document Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($actualDocuments as $actualDocument)
                                <tr>
                                    <td style="width: 5px; text-align:center">
                                        <input name="selected_documents[{{ $actualDocument->name }}]" class="document-list" value="{{ $actualDocument->name }}" type="checkbox">
                                    </td>
                                    <td>
                                        {{ $actualDocument->name() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button class="btn btn-primary email-btn custom-hover disabled" id="submitBtn" type="submit" style="float: right; margin-bottom:10px">Send Email
                            <i class="bx bx-message"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card attachment-card d-none">
            <div class="border-bottom p-2 mt-2">
                <h3 class="">Attachments</h3>
            </div>
            <div class="row p-2">
                @if (count($referral->get_uploaded_documents) > 0)
                @foreach ($referral->get_uploaded_documents->where('uploaded_url', '!=', '') as $item)
                <div class="col-xl-3 col-md-4 col-sm-6">
                    <div class=" m-3 ">
                        <div class="d-flex align-items-center px-3 pt-3">
                            <label class="custom-control custom-checkbox">
                                {{-- <input type="checkbox" class="custom-control-input"
                                                name="example-checkbox2" value="option2">
                                            <span class="custom-control-label"></span> --}}
                            </label>
                            {{-- <div class="float-end ms-auto">
                                            <a href="#" class="option-dots" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="fe fe-more-vertical"></i></a>
                                            <div class="dropdown-menu dropdown-menu-start folder-options"
                                                style="">
                                                <a class="dropdown-item" href="#"><i
                                                        class="fe fe-edit me-2"></i> Edit</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fe fe-share me-2"></i> Share</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fe fe-download me-2"></i> Download</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fe fe-info me-3"></i> Info</a>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fe fe-trash me-2"></i> Delete</a>
                                            </div>
                                        </div> --}}
                        </div>
                        <div class="card-body pt-0 text-center">
                            <div class="file-manger-icon">
                                <a href="{{ url('storage/' . $item->uploaded_url) }}">
                                    <img src="{{ url('/img/pdf_icon.png') }}" alt="img" class="br-7">
                                </a>
                            </div>
                            <h6 class="mb-1 font-weight-semibold pt-1">{{ $item->name() }}</h6>
                            <span class="text-muted fs-11 mt-0">{{ $item->status }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-center"> No Data Found </p>
                @endif

            </div>
        </div>
        <div class="row medicaid-card">
            <div class="">
                <div class="card medicaid-card d-none ">
                    <h4 style="padding-top: 20px; padding-left: 30px">Medicaid Details</h4>
                    <div class="card-body" style="padding-top:10px ">
                        <div class="row align-items-center">
                            <form id="MedicaidForm">
                                @csrf
                                <input type="hidden" name="inputId" value="{{ $referral->referral_medcaid->id }}">
                                <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-3">
                                                <label for="medicaidNumber" class="form-label">Medicaid
                                                    Number</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="medicaidNumber" name="medicaidNumber" class="form-control" value="{{ $referral->referral_medcaid->medicaid_number }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-md-3">
                                                <label for="type" class="form-label">Type</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="type" name="type" class="form-control" value="{{ $referral->referral_medcaid->type }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <hr>
                                            <div class="col-md-3">
                                                <label for="medicaidPlan" class="form-label">Medicaid Plan</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="medicaidPlan" name="medicaidPlan" class="form-control" value="{{ $referral->referral_medcaid->medicaid_plan }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" data-select2-id="108">
                                        <div class="row" data-select2-id="107">
                                            <hr>
                                            <div class="col-md-3">
                                                <label for="phone_number" class="form-label">Medicare</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $referral->referral_medcaid->phone_number }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" data-select2-id="10">
                                        <div class="row" data-select2-id="9">
                                            <hr>
                                            <div class="col-md-3">
                                                <label for="activeMedicaid" class="form-label">Active
                                                    Medicaid</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="activeMedicaid" name="activeMedicaid" class="form-control" value="{{ $referral->referral_medcaid->active_medicaid }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" data-select2-id="10">
                                        <div class="row" data-select2-id="9">
                                            <hr>
                                            <div class="col-md-3">
                                                <label for="code" class="form-label">Code</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="code" name="code" class="form-control" value="{{ $referral->referral_medcaid->code }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" style="float: right" class="btn btn-primary custom-hover editButton">Edit
                                    </button>
                                    <button type="submit" style="float: right; display: none;" class="btn btn-primary custom-hover submitButton">Submit
                                    </button>
                                    <button type="button" style="margin-right:5px; float: right; display: none;" class="btn btn-secondary custom-hover cancelButton">Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card submission-card d-none">
            <div class="main-content-app pt-0" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <h1 style="padding: 50px">Coming Soon</h1>
            </div>
        </div>
        <div class="card physician-card d-none">
            <div class="card-body" style="padding-top:10px ">
                <div class="row align-items-center">
                    <form id="PhysicianForm">
                        @csrf
                        <input type="hidden" id="userId" name="userId" class="form-control" value="{{ $referral->referral_phy->id }}">
                        <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                        <div class="col-md-12">
                            <h4 style="padding-top: 10px; padding-bottom: 10px">Physician Detail</h4>
                            <div class="form-group">
                                <div class="row row-sm">
                                    <div class="col-md-3">
                                        <label for="userName" class="form-label">User Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="userName" name="userName" class="form-control" value="{{ $referral->referral_phy->physician_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row row-sm">
                                    <hr>
                                    <div class="col-md-3">
                                        <label for="practiceName" class="form-label">Practice Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" id="practiceName" name="practiceName" class="form-control" value="{{ $referral->referral_phy->practice_name }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="108">
                                <div class="row" data-select2-id="107">
                                    <hr>
                                    <div class="col-md-3">
                                        <label for="phone" class="form-label">Phone</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="106">
                                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $referral->referral_phy->phone }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <hr>
                                    <div class="col-md-3">
                                        <label for="extNumber" class="form-label">EXT Number</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" id="extNumber" name="extNumber" class="form-control" value="{{ $referral->referral_phy->ext }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <hr>
                                    <div class="col-md-3">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="email" id="email" name="email" class="form-control" value="{{ $referral->referral_phy->email }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <hr>
                                    <div class="col-md-3">
                                        <label for="address" class="form-label">Address</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" id="address" name="address" class="form-control" value="{{ $referral->referral_phy->physician_address }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <hr>
                                    <div class="col-md-3">
                                        <label for="fax" class="form-label">Fax</label>
                                    </div>
                                    <div class="col-md-9" data-select2-id="8">
                                        <input type="text" id="fax" name="fax" class="form-control" value="{{ $referral->referral_phy->fax }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <button type="button" style="float: right" class="btn btn-primary custom-hover editButton">Edit
                            </button>
                            <button type="submit" style="float: right; display: none;" class="btn btn-primary custom-hover submitButton">Submit
                            </button>
                            <button type="button" style="margin-right:5px; float: right; display: none;" class="btn btn-secondary custom-hover cancelButton">Cancel
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="card records-card d-none">
            <div class="card-header border-bottom d-block">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="mb-1">Related Records Card</h4>
                        <div class="d-sm-flex d-block">
                            <div class="text-muted pe-2 project-date">11 Jan 21</div>
                            <div class="text-muted ms-3 project-status">In Progress</div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-star active stars-main ms-4" id="star"></i>
                            <div class="ms-3">
                                <a href="#" class="text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                <div class="dropdown-menu dropdown-menu-start">
                                    <a class="dropdown-item" href="#"><i class="fe fe-edit me-2"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fe fe-share me-2"></i>
                                        Share</a>
                                    <a class="dropdown-item" href="#"><i class="fe fe-download me-2"></i>
                                        Clone</a>
                                    <a class="dropdown-item" href="#"><i class="fe fe-info me-2"></i>
                                        Report Issue</a>
                                    <a class="dropdown-item" href="#"><i class="fe fe-trash me-2"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="mb-2">Project Details:</h5>
                <p class="line-height-5 m-0 text-muted">Eirmod voluptua no at at sit dolor voluptua nonumy. Et
                    Et
                    ut rebum est aliquyam dolor clita. Amet ipsum et dolor ipsum. Dolor clita rebum. aliquyam
                    gubergren est gubergren. Sit stet sit ipsum est sea clita sed gubergren. Sea duo dolores
                    elitr
                    et ipsum sadipscing et dolores, sanctus et vero sea diam duo no, amet.</p>
                <ul class="mt-2">
                    <li class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn list-indicator" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M14.8534546,11.6465454l-4.5-4.5c-0.1937256-0.1871948-0.5009155-0.1871948-0.6947021,0C9.460144,7.3383789,9.4546509,7.6549072,9.6464844,7.8535156L13.7930298,12l-4.1465454,4.1464844c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546C9.5,16.776062,9.723877,16.999939,10,17c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l4.5-4.5c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221C15.0487671,12.1581421,15.0487061,11.8416748,14.8534546,11.6465454z">
                            </path>
                        </svg>
                        Ea eos nonumy diam duo elitr. Takimata vero sit eirmod sit. Sea diam vero ipsum.
                    </li>
                    <li class="text-muted mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn list-indicator" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M14.8534546,11.6465454l-4.5-4.5c-0.1937256-0.1871948-0.5009155-0.1871948-0.6947021,0C9.460144,7.3383789,9.4546509,7.6549072,9.6464844,7.8535156L13.7930298,12l-4.1465454,4.1464844c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546C9.5,16.776062,9.723877,16.999939,10,17c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l4.5-4.5c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221C15.0487671,12.1581421,15.0487061,11.8416748,14.8534546,11.6465454z">
                            </path>
                        </svg>
                        Accusam ipsum labore dolor amet ea, accusam dolore dolor dolore.
                    </li>
                    <li class="text-muted mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn list-indicator" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M14.8534546,11.6465454l-4.5-4.5c-0.1937256-0.1871948-0.5009155-0.1871948-0.6947021,0C9.460144,7.3383789,9.4546509,7.6549072,9.6464844,7.8535156L13.7930298,12l-4.1465454,4.1464844c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546C9.5,16.776062,9.723877,16.999939,10,17c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l4.5-4.5c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221C15.0487671,12.1581421,15.0487061,11.8416748,14.8534546,11.6465454z">
                            </path>
                        </svg>
                        Nonumy gubergren gubergren lorem dolore nonumy lorem kasd, labore sit eirmod sed.
                    </li>
                    <li class="text-muted mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-inner-icn list-indicator" enable-background="new 0 0 24 24" viewBox="0 0 24 24">
                            <path d="M14.8534546,11.6465454l-4.5-4.5c-0.1937256-0.1871948-0.5009155-0.1871948-0.6947021,0C9.460144,7.3383789,9.4546509,7.6549072,9.6464844,7.8535156L13.7930298,12l-4.1465454,4.1464844c-0.09375,0.09375-0.1464233,0.2208862-0.1464233,0.3534546C9.5,16.776062,9.723877,16.999939,10,17c0.1326294,0.0001221,0.2598267-0.0525513,0.3534546-0.1464844l4.5-4.5c0.000061-0.000061,0.0001221-0.000061,0.0001831-0.0001221C15.0487671,12.1581421,15.0487061,11.8416748,14.8534546,11.6465454z">
                            </path>
                        </svg>
                        Ipsum elitr no sed takimata dolore.
                    </li>
                </ul>
                <div class="d-flex justify-content-end">
                    <span class="d-f-ai-c" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="View Count">
                        <i class="fe fe-eye text-16 me-1"></i>
                        15K
                    </span>
                    <span class="d-f-ai-c ms-4" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="Comments">
                        <i class="fe fe-message-circle text-16 me-1"></i>
                        5.3K
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                <h6>Created Date</h6>
                {{ $referral->created_at }}
                <hr>
                <h6>Updated Date</h6>
                {{ $referral->updated_at }}
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6>Intake Coordinator</h6>
                {{ $referral->intake }}
                <hr>
                <h6>Referral Marketer</h6>
                {{ $referral->marketer }}
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6>Admission Date</h6>
                {{ \Carbon\Carbon::parse($referral->admission_date)->format('M d, Y ') }}
                <hr>
                <h6>Admitted</h6>
                @if ($referral->status == 'Admitted')
                <h6>Yes</h6>
                @else
                <h6>No</h6>
                @endif
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload PDF</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadFile" action="{{ route('upload.document') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="getDocId" name="getDocId">
                    <input type="hidden" id="getRefId" name="getRefId">
                    <div class="mb-3">
                        <label for="pdfFile" class="form-label">Select a PDF file:</label>
                        <input type="file" class="form-control" name="pdf_file" id="pdfFile" accept=".pdf">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="uploadMoredocument" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="fileDocumenentMultiple" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                    <h4 class="modal-title" id="exampleModalLabel">Upload Documents (Multiple Allowed)</h4>

                </div>
                <div class="modal-body">
                    <!-- Your file input field for multiple document uploads -->

                    <input type="file" name="uploadedfile[]" multiple class="form-control">
                    <div id="errorMessagesfor"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark closemodalmultiple">Cancel</button>
                    <button type="submit" class="btn btn-primary custom-hover">Upload & Send Email</button>

                </div>
            </form>
        </div>
    </div>
</div>



{{--
<div class="modal fade" id="modalFollowup" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
   <div class="modal-content">
       <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Upload PDF</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal"
                   aria-label="Close"></button>
       </div>
       <div class="modal-body">
           <form id="uploadForm" action="{{ route('upload.document') }}" method="POST"
enctype="multipart/form-data">
@csrf

<input type="hidden" id="getDocId" name="getDocId">
<input type="hidden" id="getRefId" name="getRefId">
<div class="mb-3">
    <label for="pdfFile" class="form-label">Select a PDF file:</label>
    <input type="file" class="form-control" name="pdf_file" id="pdfFile" accept=".pdf">
</div>
<button type="button" id="uploadButton" class="btn btn-primary">Upload</button>
</form>
</div>
</div>
</div>
</div> --}}


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content sty bg-transparent  " style="border: none; box-shadow: none">
            <div class="card">
                @if ($referral->get_followup->isNotEmpty())
                <div class="card-body">
                    <form id="editFollowup">
                        @csrf
                        <div class="modal-body">
                            <h4>Edit Followup</h4>
                            <div class="row">
                                <input type="hidden" name="from" class="form-control" id="from" value="{{ $referral->get_followup->first()->from }}">
                                <div class="form-group">
                                    <label for="from">From:</label>
                                    <input type="text" name="fromdisable" class="form-control" id="from" value="{{ $fromFollowup->name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" value="{{ $referral->first_name }} {{ $referral->last_name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" name="date" class="form-control remove-readonly" value="{{ $referral->get_followup->first()->date }}">
                                </div>
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <input type="time" name="time" class="form-control remove-readonly" value="{{ $referral->get_followup->first()->time }}">
                                </div>
                                <div class="form-group">
                                    <label for="note">Note:</label>
                                    <input type="note" name="note" id="note" class="form-control remove-readonly" value="{{ $referral->get_followup->first()->note }}">
                                </div>
                                <input type="hidden" name="from" class="form-control remove-readonly" value="{{ $referral->get_followup->first()->from }}">
                                <input type="hidden" name="id" class="form-control remove-readonly" value="{{ $referral->get_followup->first()->id }}">
                                <input type="hidden" name="to" class="form-control" value="{{ $referral->get_followup->first()->to }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary custom-hover">Submit</button>
                        <button type="button" class="btn btn-secondary closeeditType" data-dismiss="modal">Close
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


<script src="{{ url('/assets/custom/jquery.min.js') }}"></script>
<script src="{{ url('/assets/custom/custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script>
    function showTab(tabName) {
        $("#alwaysShow").removeClass('d-none');
        $(".services-card").addClass('d-none');
        $(".patient-card").addClass('d-none');
        $(".tasks-card").addClass('d-none');
        $(".physician-card").addClass('d-none');
        $(".sms-card").addClass('d-none');
        $(".esign-card").addClass('d-none');
        $(".attachment-card").addClass('d-none');
        $(".medicaid-card").addClass('d-none');
        $(".submission-card").addClass('d-none');
        $(".records-card").addClass('d-none');
        $("." + tabName).removeClass('d-none');
    }
</script>
<script>
    $(document).on('submit', '#referralUpdateForm', function(e) {
        e.preventDefault();
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
        $('.contact-button').attr('disabled', true);
        $.ajax({
            'url': "{{ route('update.checkList') }}",
            'method': "POST",
            'data': new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                swal.fire('success', 'Checklist has been Updated successfully', 'success').then(
                    window.location.reload);
            },
            error: function(xhr) {
                erroralert(xhr);
            }
        })
    })
</script>


<script>
    $('#MedicaidForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('update-medicaid') }}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                $("hiddenFields").prop("readonly", true);
                $(".editButton").show();
                $(".submitButton").hide();
                $(".cancelButton").hide();
                swal.fire('Success', 'Medicaid has been updated successfully', 'success');
            },
            error: function(response) {
                erroralert(response);
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
        // Function to open the modal
        $(document).on('click', '.fancy-plus-button', function() {
            $('#uploadMoredocument').modal('show');
        });

        // Handle the form submission
        $('#fileDocumenentMultiple').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);

            $.ajax({
                url: "{{ route('upload.multiple.documents') }}",
                type: 'POST',
                data: formdata,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    swal.fire('Success', response.message, 'success');
                    $('#uploadMoredocument').modal('hide');
                    $('#fileDocumenentMultiple')[0].reset();
                },
                error: function(response) {
                    if (response.status === 422) {
                        swal.fire('Failed', 'Only PDF Files Allowed.', 'error');

                    } else if (response.status === 404) {
                        swal.fire('Failed', 'Please Choose at least One File.', 'error');
                    } else {

                        swal.fire('Failed', 'Unexpected Error', 'error');
                        $('#uploadMoredocument').modal('hide');
                    }

                }
            });
        });

        // Function to close the modal when clicking the "Cancel" button
        $('.closemodalmultiple').on('click', function() {
            $('#fileDocumenentMultiple')[0].reset();
            $('#uploadMoredocument').modal('hide');

        });
    });
</script>
<script>
    $('#uploadFile').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('upload.document') }}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                var docId = response.docId;
                var $button = "<a href='" + response.url +
                    "' class='btn '><i class='fe fe-eye me-2'></i> Preview Upload</a>";
                $(".document-" + docId).html($button);
                $(".document-" + docId).html($button);
                $("#uploadModal").modal("hide");
                $("#uploadModal").find("input").val("");
                console.log(response.id);
                $('.changeStatus' + response.id).removeClass('bg-dark');
                $('.changeStatus' + response.id).removeClass('bg-warning');
                $('.changeStatus' + response.id).removeClass('bg-danger');
                $('.changeStatus' + response.id).removeClass('bg-success');
                $('.changeStatus' + response.id).addClass('bg-info');
                $('.changeStatus' + response.id).text('Received');

                swal.fire('Success', 'Document added successfully', 'success');
            },
            error: function(response) {
                erroralert(response);
            }
        })
    });
</script>
<script>
    $('#editFollowup').on('submit', function(e) {
        var note = $('#note').val();
        e.preventDefault()
        $.ajax({
            url: "{{ route('follow_up.update') }}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                $('#followup-note').text(note);
                swal.fire('Success', 'Followup has been updated successfully', 'success');
                $('#editModal').click();
            },
            error: function(response) {
                swal.fire('Failed', 'Something went wrong', 'error');
                erroralert(response);
            }
        });
    });

    $('#EmergencyForm').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: "{{ route('edit.emergency') }}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                swal.fire('Success', 'Emergency Details has been updated successfully', 'success');
            },
            error: function(response) {
                swal.fire('Failed', 'Something went wrong', 'error');
                erroralert(response);
            }
        });
    });


    $('#PhysicianForm').on('submit', function(e) {
        e.preventDefault()
        $.ajax({
            url: "{{ route('update-physician') }}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                $("hiddenFields").prop("readonly", true);
                $(".editButton").show();
                $(".submitButton").hide();
                $(".cancelButton").hide();
                swal.fire('Success', 'Physician has been updated successfully', 'success');
            },
            error: function(response) {
                erroralert(response);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("hiddenFields").prop("readonly", true);
        $(".editButton").click(function() {
            $("input").prop("readonly", false);
            $(".editButton").hide();
            $(".submitButton").show();
            $(".cancelButton").show();
        });
        $(".cancelButton").click(function() {
            $("hiddenFields").prop("readonly", true);
            $(".editButton").show();
            $(".submitButton").hide();
            $(".cancelButton").hide();
        });
    });
</script>
<script>
    document.getElementById('back-btn').addEventListener('click', function() {
        window.history.back();
    });
    $(document).on('change', '.hidden-file-input', function() {
        const fileInput = $(this);
        const file = fileInput[0].files[0];
        const itemId = fileInput.closest('.dropdown-item').data('id');
        const formData = new FormData();
        formData.append('file', file);
        $.ajax({
            url: `/referral/upload-document/${itemId}`,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                Swal.fire({
                    title: 'Status Updated',
                    text: 'The status has been successfully updated.',
                    icon: 'success',
                });
            },
            error: function(error) {
                Swal.fire({
                    title: 'Failed To Update',
                    text: 'Something went wrong.',
                    icon: 'warning',
                });
                console.error(error);
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var documentIdInput = document.getElementById('document_id');
        var getDocIdInput = document.getElementById('getDocId');
        documentIdInput.addEventListener('input', function() {
            getDocIdInput.value = documentIdInput.value;
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.uploadBtn', function() {
            $('#getDocId').val($(this).attr('data-id'));
            $('#getRefId').val($(this).attr('data-referral'));
            $(this).find('.hidden-file-input').click();
        });
    });
    const listItems = document.querySelectorAll('.card li');
    listItems.forEach(function(item) {
        item.addEventListener('click', function() {
            var selectedItem = item.textContent;
            if (selectedItem === "Referral") {
                var referral = document.getElementById('referralCard');
                var contact = document.getElementById('contactCard');
                referral.style.display = 'block';
                contact.style.display = 'none';
                referralCard.parentNode.insertBefore(referralCard, contactCard, emergencyCard);
            }

            if (selectedItem === "Document") {
                var emergency = document.getElementById('emergencyCard');
                var referral = document.getElementById('referralCard');
                var contact = document.getElementById('contactCard');
                referral.style.display = 'none';
                contact.style.display = 'block';
                emergency.style.display = 'none';
                contactCard.parentNode.insertBefore(contactCard, referralCard, emergencyCard);
            }

            if (selectedItem === "Emergency Details") {
                var emergency = document.getElementById('emergencyCard');
                var referral = document.getElementById('referralCard');
                var contact = document.getElementById('contactCard');
                referral.style.display = 'none';
                contact.style.display = 'none';
                emergency.style.display = 'block';
                contactCard.parentNode.insertBefore(emergencyCard, contactCard, referralCard);
            }
        });
    });

    $('.document-list').on('click', function() {
        if (this.checked) {
            $('.email-btn').removeClass('disabled');
        } else {
            $('.email-btn').addClass('disabled');
        }
    });

    $(document).ready(function() {
        var trustEsignbox = $('.trustEsign');
        var trustDocumentbox = $('.trustDocument');
        var trustFinancebox = $('.trustFinance');
        var trustCheckListbox = $('.trustCheckList');
        var referralIdInput = $('#referral_id');
        var csrfToken = $('#csrf_token').val();
        var checkboxes = trustEsignbox.add(trustDocumentbox).add(trustFinancebox).add(trustCheckListbox);
        checkboxes.on('change', function() {
            console.log("Change detected");
            var isCheckedEsign = trustEsignbox.prop('checked');
            var isCheckedDocument = trustDocumentbox.prop('checked');
            var isCheckedFinance = trustFinancebox.prop('checked');
            var isCheckedCheckList = trustCheckListbox.prop('checked');
            var referralId = referralIdInput.val();
            var csrfToken = '{{ csrf_token() }}';
            $.ajax({
                type: 'POST',
                url: "{{ route('referral.trust') }}",
                data: {
                    esign: isCheckedEsign,
                    document: isCheckedDocument,
                    checklist: isCheckedCheckList,
                    finance: isCheckedFinance,
                    referral_id: referralId
                },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    var totalTrust = response.trust;

                    // Update the progress bar and displayed percentage
                    var progressBar = $('.progress-bar');
                    progressBar.css('width', totalTrust + '%');
                    progressBar.attr('aria-valuenow', totalTrust);
                    $('.total-trust').text(totalTrust + '%');

                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });


    $(document).on('submit', '#emailForm', function(e) {
        e.preventDefault();
        var i;
        $('.email-btn').addClass('disabled');
        $.ajax({
            url: "{{ route('document.referralEmail') }}",
            type: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                swal.fire('success', response.success, 'success');
                $('#emailForm').trigger('reset');

                console.log(response.filtered_documents['name']);
                const documentObject = response.filtered_documents;
                const keys = Object.keys(documentObject);
                for (let i = 0; i < keys.length; i++) {
                    const fileName = keys[i];
                    console.log(fileName);
                    $('button.' + fileName).text('Doc Sent');
                }
                // swal.fire('success', response.success, 'success');
            },
            error: function(error) {
                $('.email-btn').addClass('disabled');
            }
        });
    });
    $(document).ready(function() {
        $("#uploadButton").click(function() {
            var formData = new FormData($("#uploadForm")[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('upload.document') }}",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var docId = response.docId;
                    var $button = "<a href='" + response.url +
                        "' class='btn '><i class='fe fe-eye me-2'></i> Preview Upload</a>";
                    $(".document-" + docId).html($button);
                    $(".document-" + docId).html($button);
                    $("#uploadModal").modal("hide");
                    $("#uploadModal").find("input").val("");
                    Swal.fire({
                        title: 'File Uploaded',
                        text: response.success,
                        icon: 'success',
                    });
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    $("#uploadModal").modal("hide");
                    $("#uploadModal").find("input").val("");
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while uploading the file.',
                        icon: 'error'
                    });
                }
            });
        });
    });


    $(document).ready(function() {
        $('.status-option').on('click', function() {
            var selectedStatus = $(this).data('value');
            var statusReplaceId = $(this).data('id');
            var dropdownButton = $(this).closest('.dropdown').find('.dropdown-toggle');
            var itemId = dropdownButton.attr('id').replace('statusDropdown', '');
            Swal.fire({
                title: 'Confirm Status Change',
                text: 'Are you sure you want to change the status?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '/referral/referralDocument/' + itemId,
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: selectedStatus
                        },
                        success: function(response) {
                            dropdownButton.text(selectedStatus);
                            dropdownButton.removeClass(
                                'btn-success btn-warning btn-danger'
                            );
                            dropdownButton.removeClass(
                                'btn-success itemIdbtn-warning btn-danger btn-secondary btn-info'
                            );
                            if (selectedStatus === 'Approved') {
                                $('.changeStatusText' + statusReplaceId).text(
                                    response.approver)

                            } else {
                                $('.changeStatusText' + statusReplaceId).text('N/A')
                            }
                            if (selectedStatus === 'Approved') {
                                dropdownButton.addClass('btn-success');
                            } else if (selectedStatus === 'pending') {
                                dropdownButton.addClass('btn-warning');
                            } else if (selectedStatus === 'Rejected') {
                                dropdownButton.addClass('btn-danger');
                            } else if (selectedStatus === 'Doc Sent') {
                                dropdownButton.addClass('btn-secondary');
                            } else if (selectedStatus === 'Recieved') {
                                dropdownButton.addClass('btn-info');
                            }

                            console.log(selectedStatus);
                            Swal.fire({
                                title: 'Status Updated',
                                text: 'The status has been successfully updated.',
                                icon: 'success',
                            })
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while updating the status.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    });
    $(document).ready(function() {
        // Remove the readonly attribute from the input element by its ID
        $(".remove-readonly").removeAttr("readonly");

        $(".previewBtn").click(function() {
            var filename = $(this).data("filename");
            if (filename) {
                window.open(filename, "_blank");
            } else {
                console.log("File URL not available.");
            }
        });
    });
</script>
@endsection

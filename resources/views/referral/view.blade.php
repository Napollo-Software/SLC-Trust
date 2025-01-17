@extends('nav')
@section('title', 'View Referrals | Senior Life Care Trusts')
@section('wrapper')
<link href="{{ url('/assets/custom/style.css') }}" rel="stylesheet" />
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
    .btn-primary {
        color: white !important;
        background-color: #559e99 !important;
        border-color: #4a8f8b !important;
    }

    .btn-primary:hover {
        color: white !important;
        background-color: #6bb0aa !important;
        border-color: #5da298 !important;
    }

    .btn-check:checked+.btn-primary,
    .btn-check:active+.btn-primary,
    .btn-primary:active,
    .btn-primary.active,
    .show>.btn-primary.dropdown-toggle {
        color: white !important;
        background-color: #467f7b !important;
        border-color: #3e726f !important;
    }

    .fancy-plus-button {
        background-color: #559e99;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        transition: transform 0.3s, background-color 0.3s;
    }

    .dataTable {
        white-space: nowrap;
    }

    .fancy-plus-button:hover,
    .fancy-plus-button:focus {
        background-color: #559e99;
        transform: scale(1.05);
    }

    .fancy-plus-button::before {
        content: '+';
        color: white;

    }

    .primary-menu .navbar .navbar-nav a.nav-link:hover {
        color: #32393f !important;
        background-color: #f5f6f7 !important;
    }

</style>
<div class="">

    <!-- CONTENT -->

    <!-- PAGE-HEADER -->
    <h5 class=" d-flex justify-content-start pt-5 pb-2 px-2">
        <b></b>
        <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <a href="{{url('/referral')}}" class="text-muted fw-light pointer"><b>All Referral</b></a> / <b>View Referral</b> </div>
    </h5>
    <!-- PAGE-HEADER END -->

    <!-- ROW -->

    <div class="row p-2" style="margin-bottom:100px !important;">
        <div class="col-lg-4 col-xl-2">
            <div class="card mb-4">
                <div class="card-body p-2">
                    <div class="border-bottom mt-3  ">
                        <h4 class=" ">Referral ID: {{ $referral->id }}</h4>
                    </div>
                    <ul class="nav1 nav-column pb-0 flex-column br-7 px-0">
                        <li class="nav-item1 mt-0 services-tab">
                            <a class="nav-link  thumb active" onclick="showTab('services-card')">
                                <i class="menu-icon mr-2 tf-icons bx bx-layout "></i>
                                Services
                            </a>
                        </li>
                        <li class="nav-item1 patient-tab">
                            <a class="nav-link  thumb" onclick="showTab('patient-card')">
                                <i class="menu-icon mr-2 tf-icons bx bx-user "></i>
                                Patient
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
                                Followups
                            </a>
                        </li>
                        <li class="nav-item1 attachment-tab">
                            <a class="nav-link  thumb" onclick="showTab('attachment-card')">
                                <i class="menu-icon mr-2 tf-icons bx bx-spreadsheet"></i>
                                Attachment
                            </a>
                        </li>
                        <li class="nav-item1 medicaid-tab">
                            <a class="nav-link  thumb" onclick="showTab('medicaid-card')">
                                <i class="menu-icon mr-2 tf-icons bx bx-shekel"></i>
                                Medicaid / Medicare
                            </a>
                        </li>
                        <li class="nav-item1 submission-tab d-none">
                            <a class="nav-link  thumb" onclick="showTab('submission-card')">
                                <i class="menu-icon mr-2 tf-icons bx bx-alarm"></i>
                                Submission Info
                            </a>
                        </li>
                        <li class="nav-item1 physician-tab ">
                            <a class="nav-link  thumb" onclick="showTab('physician-card')">
                                <i class="menu-icon mr-2 tf-icons bx bx-briefcase"></i>
                                Physician
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 ">
            <div class="card" id="alwaysShow">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-9 ">
                            <div class="d-flex flex-wrap align-items-center">
                                <div class="profile-img-main rounded">
                                    <img src="{{ url('user/images93561655300919_avatar.png') }}" alt="img" class="m-0 p-1 rounded hpx-65">
                                </div>
                                <div class="ms-4">
                                    <h4 class="m-0">{{ $referral->full_name() }}</h4>
                                    <p class="text-muted mt-1 mb-0">{{ $referral->email }}</p>
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
                                    <h4 class="total-trust mt-1" style="float: right">{{ $totalTrust }}%</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top services-card" id="serviceController">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading d-flex justify-content-between align-items-center flex-md-row flex-column px-md-3">
                            <div class="tabs-menu1 order-md-1 order-2 ">
                                <ul class="nav py-0 px-0">
                                    <div>
                                        <li>
                                            <a href="#esignCard" data-bs-toggle="tab" class="active pb-3 px-0 mx-2  mb-sm-0 mb-3">E-sign</a>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <a href="#documentCard" data-bs-toggle="tab" class="pb-3 px-0 mx-2  mb-sm-0 mb-3">Documents</a>
                                        </li>
                                    </div>
                                    <div>
                                        <li class="mb-0">
                                            <a href="#financeCard" data-bs-toggle="tab" class="pb-3 px-0 mx-2  mb-sm-0 mb-3 ">Finance</a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                            <div class="order-md-2 order-1 pt-md-0 pt-3 pl-3 status-field mx-2" style=" ">
                                <span class="fw-bold">Status: </span>{{ $referral->status }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top patient-card" id="second-tab" style="display:none">
                    <div class="wideget-user-tab">
                        <div class="tab-menu-heading d-flex justify-content-between align-items-center flex-md-row flex-column px-md-3">
                            <div class="tabs-menu1 order-md-1 order-2 ">
                                <ul class="nav py-0 px-0">
                                    <div>
                                        <li>
                                            <a href="#referral_detail" data-bs-toggle="tab" class="active pb-3 px-0 mx-2  mb-sm-0 mb-3">Account</a>
                                        </li>
                                    </div>
                                    <div>
                                        <li>
                                            <a href="#emergency_detail" data-bs-toggle="tab" class="pb-3 px-0 mx-2  mb-sm-0 mb-3">Emergency Details</a>
                                        </li>
                                    </div>
                                </ul>
                            </div>
                            <div class="order-md-2 order-1 pt-md-0 pt-3 pl-3 status-field mx-2">
                                <span class="fw-bold">Status: </span>{{ $referral->status }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content p-0">
                <div class="tab-pane" id="documentCard">
                    <div class="card services-card">
                        <div class="row">
                            <div class="col-md-12 mt-3 ">
                                <div class="row  px-3">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center gap-2 ">
                                            <input class="trustDocument m-0" type="checkbox" name="document" {{ $referral->trustDocument ? 'checked' : '' }}>
                                            <label class="m-0">Mark As Read</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 gap-3 d-flex justify-content-end">
                                        <h5 class="m-0">Received Documents: {{ $recievedDocumentCount }}</h5>
                                        <h5 class="m-0">Pending Documents: {{ $pendingDocumentCount }}</h5>
                                    </div>
                                </div>
                                <div>
                                    <div class="overflow-auto px-3 py-1">
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
                                                                        @if ($item->status == 'Sent') btn-secondary {{ 'changeStatus' . $item->id }} @endif
                                                                        @if ($item->status == 'Recieved' || $item->status == 'Received') btn-info {{ 'changeStatus' . $item->id }} @endif
                                                                    dropdown-toggle" type="button" id="statusDropdown{{ $item->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{ $item->status == 'Recieved' ? "Received" : $item->status }}
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
                                                                <button type="button" data-id="{{ $item['id'] }}" data-referral="{{ $item['referral_id'] }}" data-filename="{{ url('/storage/'.$item['uploaded_url']) }}" class="dropdown-item uploadBtn previewBtn">
                                                                    <i class="fe fe-eye me-2"></i>
                                                                    Preview file
                                                                </button>
                                                                @endif
                                                            </div>
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
                <div class="tab-pane" id="financeCard">
                    <div class="card services-card">
                        <div style="margin:20px">
                            <form id="bank-info-form" method="post">
                                @csrf
                                <div class="d-flex align-items-center">
                                    <input class="trustFinance" type="checkbox" name="finance" {{ $referral->trustFinance ? 'checked' : '' }}>
                                    <label class="m-0">Mark As Complete</label>
                                </div>
                                <hr>
                                <p>Bank Info</p>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="account_type" class="form-label">Account Type</label>
                                        <input type="text" class="form-control" value="{{ $referral->bankAccount->account_type }}" name="account_type" id="account_type" placeholder="Account type">
                                        <input type="hidden" class="form-control" name="id" value="{{ $referral->id }}" placeholder="Account type">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bank_ame" class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" value="{{ $referral->bankAccount->bank_name }}" name="bank_name" id="bank_ame" placeholder="Bank name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="routing_aba" class="form-label">Routing ABA</label>
                                        <input type="text" class="form-control" value="{{ $referral->bankAccount->routing_aba }}" name="routing_aba" id="routing_aba" placeholder="Routing aba">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" value="{{ $referral->bankAccount->account_number }}" class="form-control" name="account_number" id="account_number" placeholder="Account number">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="billing_cycle" class="form-label">Billing Cycle</label>
                                        <select class="form-control p-2" id="billing_cycle" name="billing_cycle" required>
                                            <option {{ $referral->bankAccount->billing_cycle == "1" ? 'selected' : '' }} value="1">1st of every Month </option>
                                            <option {{ $referral->bankAccount->billing_cycle == "3" ? 'selected' : '' }} value="3">3rd of every Month </option>
                                            <option {{ $referral->bankAccount->billing_cycle == "7" ? 'selected' : '' }} value="7">7th of every Month </option>
                                            <option {{ $referral->bankAccount->billing_cycle == "14" ? 'selected' : '' }} value="14">14th of every Month </option>
                                            <option {{ $referral->bankAccount->billing_cycle == "21" ? 'selected' : '' }} value="21">21st of every Month </option>
                                            <option {{ $referral->bankAccount->billing_cycle == "28" ? 'selected' : '' }} value="28">28th of every Month </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="surplus_amount" class="form-label">Surplus Amount</label>
                                        <input type="number" value="{{ $referral->bankAccount->surplus_amount }}" class="form-control" name="surplus_amount" id="surplus_amount" placeholder="Surplus amount">
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-2 fs-6" type="submit" style="float: right; margin-bottom:10px">Save <i class="bx bx-save"></i></button>
                                <button class="btn btn-primary mr-2 mt-2 fs-6 convert-btn @if($referral->convert_to_customer!=null)  disabled @else ts @endif" id="submitBtn" data-id="{{ $referral->id }}" type="submit" style="float: right; margin-bottom:10px">@if(!$referral->convert_to_customer)Convert to Customer @else Converted to Customer @endif<i class="bx bx-file"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active services-card" id="esignCard">
                    <form id="emailForm">
                        @csrf
                        <input type="hidden" value="{{ $referral->id }} " name="referral_id">
                        <div class="card">
                            <div class="card-body col-md-12 pt-3 pb-5">
                                <div class="overflow-auto">
                                    <div class="d-flex align-items-center mb-3">
                                        <input class="trustEsign" type="checkbox" name="esign" {{ $referral->trustEsign ? 'checked' : '' }}>
                                        <label class="mb-0">Mark As Complete</label>
                                    </div>
                                    <table class="table table-bordered align-middle">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width:10px">Select</th>
                                                <th>Document Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($actualDocuments as $actualDocument)
                                            <tr>
                                                <td class="border-top text-center align-middle" style="border-left: none !important; border-right: none !important; border-bottom: none !important; vertical-align: middle;">
                                                    <div class="align-self-center">
                                                        <input name="selected_documents[{{ $actualDocument->name }}]" class="document-list m-0 mt-2" value="{{ $actualDocument->name }}" type="checkbox">
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    {{ $actualDocument->name() }}
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td style="text-align: center;">
                                                    <a style="border-radius:50%;" class="fancy-plus-button m-0">
                                                    </a>
                                                </td>
                                                <td>
                                                    Select Documents to upload
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary email-btn custom-hover disabled fs-6" id="submitBtn" type="submit" style="float: right; margin-bottom:10px">Send Email <i class="bx bx-message"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card patient-card d-none" id="patientCard">
                <div class="border-bottom d-flex align-items-center justify-content-between p-2 mt-2">
                    <h4 class="px-3">Patient</h4>
                </div>
                <div class="card-body px-0">
                    <div class="tab-content">
                        <div class="col-md-12 px-0 tab-pane active" id="referral_detail">
                            <div class="form-group px-3">
                                <div class="row row-sm">
                                    <div class="col-md-3 align-middle">
                                        <label for="userName" class="form-label">User Name</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center ">
                                        <p class="m-0"> {{ $referral->first_name }} {{ $referral->last_name }} </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 ">
                                <div class="row row-sm">
                                    <div class="col-md-3">
                                        <label for="eMail" class="form-label">Email</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center  d-flex align-items-center ">
                                        <p class="m-0"> {{ $referral->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="108">
                                <div class="row" data-select2-id="107">
                                    <div class="col-md-3">
                                        <label for="language" class="form-label">Phone</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="106">
                                        <p class="m-0"> {{ $referral->phone_number }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Gender</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->gender }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Date of birth</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->date_of_birth }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Patient SSN</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->patient_ssn }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Patient Address</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Patient Age</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->age }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label class="form-label">Patient Language</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->patient_language }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Country</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->country }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">City</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->city }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">State</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->state }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Address</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">ZIP Code</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->zip_code }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group px-3 " data-select2-id="10">
                                <div class="row" data-select2-id="9">
                                    <div class="col-md-3">
                                        <label for="timeZone" class="form-label">Source Type</label>
                                    </div>
                                    <div class="col-md-9 d-flex align-items-center " data-select2-id="8">
                                        <p class="m-0"> {{ $referral->source_type }}</p>
                                    </div>
                                </div>
                            </div>
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
                                <button type="button" style="float: right" class="btn btn-primary custom-hover editButton fs-6">Edit
                                </button>
                                <button type="submit" style="float: right; display: none;" class="btn btn-primary custom-hover submitButton fs-6">Submit
                                </button>
                                <button type="button" style="margin-right:5px; float: right; display: none;" class="btn btn-secondary custom-hover cancelButton fs-6">Cancel
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card tasks-card d-none">
                <div class="border-bottom d-flex align-items-center justify-content-between p-2 mt-2">
                    <h4 class="px-3">Notes</h4>
                    @if ($user->hasPermissionTo('Add Contact'))
                    <div>
                        <a class="btn btn-primary NoteAddBtn print-btn pb-1 pt-1 " style="color: white;">
                            <i class="bx bx-save pb-1"></i>Add Note</a></div>
                    @endif
                </div>
                <div class="card-body p-3">
                    <ul class="task-list" id="notes-list">
                        @foreach ($referral->get_followup as $item)
                        <li id="note-{{$item->id}}">
                            <div class="row-container d-flex justify-content-between">
                                <div><i class="task-icon bg-{{ randomColor() }}"></i>
                                    <h6 class="text-break">{{ $item->note }}</h6>
                                    <p class="text-muted fs-12">
                                        {{ \Carbon\Carbon::parse($item->date)->format('m/d/Y') }} {{ \Carbon\Carbon::parse($item->time)->format('h:i A') }}</p>
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
                    <h4 class="px-3">Followups</h4>
                    @if ($user->hasPermissionTo('Add Contact'))
                    <div>
                        <a class="btn btn-primary FollowupAddBtn pb-1 pt-1 " style="color: white;">
                            <i class="bx bx-save pb-1"></i>Add Followup</a></div>
                    @endif
                </div>
                <div class="card-body p-3">
                    <ul class="task-list" id="followups-list">
                        @foreach ($referral->followups as $item)
                        <li id="followup-{{$item->id}}">
                            <div class="row-container d-flex justify-content-between">
                                <div><i class="task-icon bg-{{ randomColor() }}"></i>
                                    <h6 class="text-break">{{ $item->note }}</h6>
                                    <p class="text-muted fs-12">
                                        Date & Time: {{ \Carbon\Carbon::parse($item->date)->format('m/d/Y') }} {{ \Carbon\Carbon::parse($item->time)->format('h:i A') }}</p>
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

            <div class="card esign-card d-none">
                <form id="emailForm">
                    @csrf
                    <input type="hidden" value="{{ $referral->id }} " name="referral_id">
                    <div class="card-body col-md-12 p-0">
                        <div class="overflow-auto">
                            <table class="table table-bordered align-middle ">
                                <thead>
                                    <tr>
                                        <th style="width: 5px;">CheckBox</th>
                                        <th>Document Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actualDocuments as $actualDocument)
                                    <tr>
                                        <td class="border-top text-center align-middle" style="border-left: none !important; border-right: none !important; border-bottom: none !important; vertical-align: middle;">
                                            <div class="align-self-center">
                                                <input name="selected_documents[{{ $actualDocument->name }}]" class="document-list m-0 mt-2" value="{{ $actualDocument->name }}" type="checkbox">
                                            </div>
                                        </td>
                                        <td>
                                            {{ $actualDocument->name() }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button class="btn btn-primary email-btn custom-hover disabled mx-3 mb-3 fs-6" id="submitBtn" type="submit" style="float: right; ">Send Email
                                <i class="bx bx-message"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card attachment-card d-none">
                <div class="border-bottom p-2 mt-2">
                    <h4 class="px-3">Attachments</h4>
                </div>
                <div class="row p-2">
                    @if (count($referral->get_uploaded_documents) > 0)
                    @foreach ($referral->get_uploaded_documents->where('uploaded_url', '!=', '') as $item)
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class=" m-3">
                            <div class="card-body pt-0 text-center">
                                <div class="file-manger-icon">
                                    <a target="_blank" href="{{ url('storage/'.$item->uploaded_url) }}">
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
                <div class="card medicaid-card d-none ">
                    <h4 class="px-3 py-3 border-bottom " style=" ">Medicaid Details</h4>
                    <div class="card-body px-0" style="padding-top:10px ">
                        <div class="row align-items-center">
                            <form id="MedicaidForm">
                                @csrf
                                <input type="hidden" name="inputId" value="{{ $referral->referral_medcaid->id }}">
                                <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                                <div class="col-md-12 px-0">
                                    <div class="form-group px-3">
                                        <div class="row row-sm">
                                            <div class="col-md-3">
                                                <label for="medicaidNumber" class="form-label">Medicaid
                                                    Number</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input placeholder="e.g., AB12345C" pattern="[A-Za-z]{2}\d{5}[A-Za-z]" title="Format: Two letters, five digits, one letter (e.g., AB12345C)" type="text" id="medicaidNumber" name="medicaidNumber" class="form-control" value="{{ $referral->referral_medcaid->medicaid_number }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group px-3">
                                        <div class="row row-sm">
                                            <div class="col-md-3">
                                                <label for="type" class="form-label">Type</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" id="type" name="type" class="form-control" value="{{ $referral->referral_medcaid->type }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group px-3" data-select2-id="108">
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
                                    <div class="form-group px-3" data-select2-id="10">
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
                                    <div class="form-group px-3" data-select2-id="10">
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
                                    <button type="button" style="float: right" class="btn btn-primary custom-hover editButton fs-6 mx-3">Edit
                                    </button>
                                    <button type="submit" style="float: right; display: none;" class="btn btn-primary custom-hover submitButton fs-6 mx-3">Submit
                                    </button>
                                    <button type="button" style="margin-right:5px; float: right; display: none;" class="btn btn-secondary fs-6 custom-hover cancelButton mx-3">Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card physician-card d-none">
                <div class="card-body px-0" style="padding-top:10px ">
                    <div class="row align-items-center">
                        <form id="PhysicianForm">
                            @csrf
                            <input type="hidden" id="userId" name="userId" class="form-control" value="{{ $referral->referral_phy->id }}">
                            <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                            <div class="col-md-12 px-0">
                                <h4 class="pb-3 px-3 border-bottom">Physician Detail</h4>
                                <div class="form-group my-3 my-3 px-3">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label for="userName" class="form-label">User Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" id="userName" name="userName" class="form-control" value="{{ $referral->referral_phy->physician_name }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group my-3 px-3">
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
                                <div class="form-group my-3 px-3" data-select2-id="108">
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
                                <div class="form-group my-3 px-3" data-select2-id="10">
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
                                <div class="form-group my-3 px-3" data-select2-id="10">
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
                                <div class="form-group my-3 px-3" data-select2-id="10">
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
                                <div class="form-group my-3 px-3" data-select2-id="10">
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
                                <button type="button" style="float: right" class="btn btn-primary custom-hover editButton mx-3 fs-6">Edit
                                </button>
                                <button type="submit" style="float: right; display: none;" class="btn btn-primary custom-hover submitButton mx-3 fs-6">Submit
                                </button>
                                <button type="button" style="margin-right:5px; float: right; display: none;" class="btn btn-secondary custom-hover cancelButton mx-3 fs-6">Cancel
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="fw-bold mb-1">Created Date</h6>
                    {{ $referral->created_at }}
                    <hr>
                    <h6 class="fw-bold mb-1">Updated Date</h6>
                    {{ $referral->updated_at }}
                    <hr>
                    <h6 class="fw-bold mb-1 ">Intake Coordinator</h6>
                    {{ $referral->intake }}
                    <hr>
                    <h6 class="fw-bold mb-1">Admitted</h6>
                    @if ($referral->status == 'Admitted')
                    <h6 class=" ">Yes</h6>
                    @else
                    <h6 class=" ">No</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNoteModalLabel">Upload PDF</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
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

<div id="uploadMoredocument" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="uploadMoredocumentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="fileDocumenentMultiple" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <input type="hidden" name="referral_id" value="{{ $referral->id }}">
                    <h4 class="modal-title" id="addNoteModalLabel">Upload Documents (Multiple Allowed)</h4>
                </div>
                <div class="modal-body">
                    <input type="file" name="uploadedfile[]" multiple class="form-control">
                    <div id="errorMessagesfor"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark closemodalmultiple">Cancel</button>
                    <button type="submit" id="upload_send_email" class="btn btn-primary custom-hover">Upload & Send Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="followupModal" tabindex="-1" aria-labelledby="followupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFollowModalHeader">Add Followup</h5>
                <button type="button" class="close close-btn closeContactModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="followupForm">
                @csrf
                <input type="hidden" name="type" id="type" value="followup">
                <input type="hidden" name="referral" id="referral" value="{{ $referral->id }}">
                <input type="hidden" name="from" value="{{ $user->id }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="date">Follow Up Date *</label>
                            <input type="date" name="date" id="follow-up-date" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="time">Follow Up Time *</label>
                            <input type="time" name="time" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="time">Assignee *</label>
                            <select id="defaultSelect" class="form-control" name="to">
                                <option value="">Choose One</option>
                                @foreach ($assignee as $item)
                                <option value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note">Description *</label>
                        <textarea type="note" name="note" id="note" required rows="4" class="form-control"></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary followup-button custom-hover">Submit</button>
                        <button type="button" class="btn btn-secondary closeContactModal" data-dismiss="modal">Close</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="addNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
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
                <input type="hidden" name="from" value="{{ $user->id }}">
                <input type="hidden" name="to" value="{{ $referral->id }}">
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



<script src="{{ url('/assets/custom/jquery.min.js') }}"></script>
<script src="{{ url('/assets/custom/custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>

        $(document).ready(function() {
            const createToday = new Date().toISOString().split('T')[0];
            document.getElementById('follow-up-date').setAttribute('min', createToday);
        });

        $('.convert-btn').on('click', function (e) {
        e.preventDefault();

        var button = $(this);
        var id = button.attr('data-id');

        $('.convert-btn').attr('disabled', true);
        button.text('Converting to customer...');

        Swal.fire({
            title: 'Need Approval!',
            text: "Are you sure you want to convert this account to a customer account?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: 'secondary',
            confirmButtonText: 'Yes, convert it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('convert.to.referral') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function (data) {
                        Swal.fire('Success!', data.success, 'success');
                        button.text('Converted to Customer');
                        button.attr('disabled', true);
                        window.location.href = "/show_user/" + data.user.id;
                    },
                    error: function (xhr) {

                        button.text('Convert to Customer');
                        $('.convert-btn').attr('disabled', false);
                        erroralert(xhr);
                    }
                });
            } else {
                button.text('Convert to Customer');
                $('.convert-btn').attr('disabled', false);
            }
        });
    });

    function showTab(tabName) {

        if(tabName == 'patient-card')
        {
            $("#second-tab").show();
        }
        else {
            $("#second-tab").hide();
        }

        $("#alwaysShow").removeClass('d-none');
        $(".services-card").addClass('d-none');
        $(".patient-card").addClass('d-none');
        $(".tasks-card").addClass('d-none');
        $(".follows-card").addClass('d-none');
        $(".physician-card").addClass('d-none');
        $(".sms-card").addClass('d-none');
        $(".esign-card").addClass('d-none');
        $(".attachment-card").addClass('d-none');
        $(".medicaid-card").addClass('d-none');
        $(".submission-card").addClass('d-none');
        $("." + tabName).removeClass('d-none');
    }

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

    $('#bank-info-form').on('submit', function(e) {

        e.preventDefault();
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();

        $.ajax({
            url: "{{ route('update-bank-info') }}",
            type: 'POST',
            data: new FormData(this),
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(response) {
                swal.fire('Success', 'Bank info saved successfully', 'success');
            },
            error: function(response) {
                erroralert(response);
            }
        })
    });

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
                var $button = "<a id='latest-upload' href='" + response.url +
                    "' class='btn' target='_blank'><i class='fe fe-eye me-2'></i> Preview file</a>";
                $(".document-" + docId).replaceWith($button);
                $("#uploadModal").modal("hide");
                $("#uploadModal").find("input").val("");
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
                $('#followupModal').click();
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

    $(document).on('click', '.document-list', function() {
        if ($('.document-list:checked').length > 0) {
            $('.email-btn').removeClass('disabled');
        } else {
            $('.email-btn').addClass('disabled');
        }
    });

    $(document).ready(function() {

        $('#designation').change(function() {
            var selectedValue = $(this).val();
            var otherInputDiv = $('.other-input');

            if (selectedValue === 'other') {
                otherInputDiv.show();
            } else {
                otherInputDiv.hide();
            }
        });

        $(document).on('click', '.fancy-plus-button', function() {
            $('#uploadMoredocument').modal('show');
        });

        $(document).on('submit', "#fileDocumenentMultiple",function(e) {
            e.preventDefault();
            let formdata = new FormData(this);

            $("#upload_send_email").attr('disabled', true).text('Processing...');

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
                    $("#upload_send_email").attr('disabled', false).text('Upload & Send Email');
                },
                error: function(response) {
                   $("#upload_send_email").attr('disabled', false).text('Upload & Send Email');
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

        $('.closemodalmultiple').on('click', function() {
            $('#fileDocumenentMultiple')[0].reset();
            $('#uploadMoredocument').modal('hide');
        });

        $(".hiddenFields").prop("readonly", true);

        $(document).on("click", ".editButton", function() {

            $("input").prop("readonly", false);
            $(".editButton").hide();
            $(".submitButton").show();
            $(".cancelButton").show();
        });

        $(document).on("click", ".cancelButton", function() {

            $(".hiddenFields").prop("readonly", true);

            $("input").prop("readonly", true);
            $(".editButton").show();
            $(".submitButton").hide();
            $(".cancelButton").hide();
        });

        $(document).on('click', '.uploadBtn', function() {
            $('#getDocId').val($(this).attr('data-id'));
            $('#getRefId').val($(this).attr('data-referral'));
            $(this).find('.hidden-file-input').click();
        });

        var trustEsignbox = $('.trustEsign');
        var trustDocumentbox = $('.trustDocument');
        var trustFinancebox = $('.trustFinance');
        var trustCheckListbox = $('.trustCheckList');
        var referralIdInput = '{{ $referral->id }}';
        var csrfToken = $('#csrf_token').val();
        var checkboxes = trustEsignbox.add(trustDocumentbox).add(trustFinancebox).add(trustCheckListbox);
        checkboxes.on('change', function() {

            var isCheckedEsign = trustEsignbox.prop('checked');
            var isCheckedDocument = trustDocumentbox.prop('checked');
            var isCheckedFinance = trustFinancebox.prop('checked');
            var isCheckedCheckList = trustCheckListbox.prop('checked');
            var referralId = referralIdInput;
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
                    $('button.' + fileName).text('Doc Sent');
                }
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

        $(".remove-readonly").removeAttr("readonly");

        $(".previewBtn").click(function() {
            var filename = $(this).data("filename");
            if (filename) {
                window.open(filename, "_blank");
            } else {
                console.log("File URL not available.");
            }
        });

        $('#addNoteModal').on('hidden.bs.modal', function () {

            $('#note_id').val('');
            $('#note_text').val('');
            $('#note_date').val('');
            $('#note_time').val('');
            $('#addNoteModalHeader').text('Add Note');
        });

    });

    function showAddNoteModal() {
        $('#addNoteModal').modal('show')
    }

     function hideAddContactModal() {
        $('#addNoteModal').modal('hide')
        $('#followupModal').modal('hide')
    }

    function showFollowupModal() {
        $('#followupModal').modal('show')
    }

    function hideFollowupModal() {
        $('#followupModal').modal('hide')
    }

    $('.closeContactModal').on('click', function (e) {
        e.preventDefault()
        hideAddContactModal()
    })
    $('.NoteAddBtn').on('click', function (e) {
        e.preventDefault()
        showAddNoteModal()
    })
    $('.FollowupAddBtn').on('click', function (e) {
        e.preventDefault()
        showFollowupModal()
    })

    $(document).on('click', '.NoteEditBtn', function (e) {
        e.preventDefault();

        const item = $(this).data('data');

        $('#note_id').val(item.id);
        $('#note_text').val(item.note);

        $('#addNoteModalHeader').text('Edit Note');

        $('#addNoteModal').modal('show');
    });


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

    function randomColor() {
        const colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info'];
        const randomIndex = Math.floor(Math.random() * colors.length);
        return colors[randomIndex];
    }


    $(document).on('submit', '#followupForm', function (e) {
    e.preventDefault();
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback.is-invalid').remove();
    $('.followup-button').attr('disabled', true);

    $.ajax({
        url: '{{ route('follow_up.store') }}',
        method: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
            hideAddContactModal();
            $('.followup-button').attr('disabled', false);
            $('#followupModal').removeClass('in').hide();
            $('#followupForm').trigger('reset');
            swal.fire('Success', data.message, 'success');

            let followupDateTime = new Date(`${data.followup.date}T${data.followup.time}`);

            let formattedDate = followupDateTime.toLocaleDateString('en-US', {
                month: '2-digit',
                day: '2-digit',
                year: 'numeric'
            });

            let followups_list = $('#followups-list');
            let followup_id = data.followup.id;

            let existing_followup = $(`#followup-${followup_id}`);

            let followupTime = new Date(`1970-01-01T${data.followup.time}`);

            let formattedTime = followupTime.toLocaleTimeString('en-US', {
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            });

            if (existing_followup.length > 0) {
                existing_followup.html(`
                    <div class="row-container d-flex justify-content-between">
                        <div>
                            <i class="task-icon bg-${randomColor()}"></i>
                            <h6>${data.followup.note}</h6>
                            <p class="text-muted fs-12">${formattedDate} ${formattedTime}</p>
                        </div>
                        <div>
                            <button
                                class="NoteEditBtn1 btn pb-1 pt-1"
                                data-data='${JSON.stringify(data.followup)}'
                                title="Click to edit followup">
                            </button>
                        </div>
                    </div>
                `);
            } else {
                followups_list.prepend(`
                    <li id="followup-${followup_id}">
                        <div class="row-container d-flex justify-content-between">
                            <div>
                                <i class="task-icon bg-${randomColor()}"></i>
                                <h6>${data.followup.note}</h6>
                                <p class="text-muted fs-12">${formattedDate} ${formattedTime}</p>
                            </div>
                            <div>
                                <button
                                    class="NoteEditBtn1 btn pb-1 pt-1"
                                    data-data='${JSON.stringify(data.followup)}'
                                    title="Click to edit followup">
                                </button>
                            </div>
                        </div>
                    </li>
                `);
            }
        },
        error: function (xhr) {
            $('.followup-button').attr('disabled', false);
            erroralert(xhr);
        }
    });
});

</script>

@endsection

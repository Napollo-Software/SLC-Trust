@extends('nav')
@section('title', 'Edit Vendor | SLC Trust')
@section('wrapper')
    @php
        $canada = [ 'Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador', 'Northwest Territories', 'Nova Scotia', 'Nunavut', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Yukon'];
        $americanStates = [ 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
    @endphp
    <div class="">
        <h5 class=" d-flex justify-content-between pt-2 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Edit Vendor</b> </div>
        </h5>
        <div class="row">
            <div class="col-xl-4">
                <form class="mb-3" action="{{ route('update.vendors', $vendor->id) }}" method="post">
                    @csrf
                    <div class="card  mb-xl-0">
                        <div class="card-header pl-0 pb-0">
                            <div class="d-flex">
                                <h4 class="col-md-11">Vendor Information</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row-cols-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Name" name="name"
                                    value="{{ $vendor->name }}" />
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="row-cols-lg-6">
                                <label for="exampleFormControlInput1" class="form-label mt-3">Email<span
                                        class="text-danger">*</span></label>
                                <input type="Email" class="form-control" placeholder="Email" name="email"
                                    value="{{ $vendor->email }}" />
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="cols-lg-6">
                                <label for="exampleFormControlInput1" class="form-label mt-3">Type<span
                                        class="text-danger">*</span></label>
                                <div class="d-flex" style="padding-bottom:3%">
                                    <select id="defaultSelect" class="form-select select-2" name="type"
                                        onchange="showOtherInput(this)">
                                        <option value="{{ $vendor->vendor_types->name ?? $vendor->vendor_type_name }}">
                                            {{ $vendor->vendor_types->name ?? $vendor->vendor_type_name }}
                                        </option>
                                        <option value="other">Other</option>
                                        @foreach ($types as $type)
                                            <option @if (old('type') == $type['name']) {{ 'selected' }} @endif
                                                value="{{ $type['name'] }}">{{ $type['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <div class=" text-secondary" id="otherInputDiv" style="display: none;">
                                    <label for="otherType" class="form-label">Other Type<span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="otherType" name="other_type" value="{{ old('other_type') }}"
                                           class="form-control">
                                    <span id="otherTypeErrorMessage" class="text-danger" style="display: none;">Other Type
                                        is required.</span>
                                </div>

                                <span class="text-danger">
                                    @error('other_type')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header pl-2 pb-0">
                        <h4>Other Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control phone" placeholder="(___) ___-___" name="phone"
                                    value="{{ $vendor->phone }}" id="phone" />
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Website</h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="url" class="form-control" placeholder="Website" name="website"
                                    value="{{ $vendor->website }}" />
                                <span class="text-danger">
                                    @error('website')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Country<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select id="defaultSelect" class="form-select select-2" onchange="getCountry(this)" name="country">
                                    <option @if ($vendor->country == 'United States of America') {{ 'selected' }} @endif
                                        value="United States of America">United States of America</option>
                                    <option @if ($vendor->country == 'canada') {{ 'selected' }} @endif value="canada">
                                        Canada</option>
                                </select>
                                <span class="text-danger">
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">State / Province<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select id="SelectState" class="form-select select-2" name="state">
                                    <option value="{{ $vendor->state }}">{{ $vendor->state }}</option>

                                    @if ($vendor->country == 'canada')
                                        @foreach ($canada as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    @else
                                        @foreach ($americanStates as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach

                                    @endif
                                </select>
                                <span class="text-danger">
                                    @error('state')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">City<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control" placeholder="City" name="city"
                                    value="{{ $vendor->city }}" />
                                <span class="text-danger">
                                    @error('city')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Zip Code<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control" placeholder="Zip Code" name="zipcode"
                                    maxlength="6" value="{{ $vendor->zipcode }}" />
                                <span class="text-danger">
                                    @error('zipcode')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address 1<span class="text-danger">*</span></h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" class="form-control" placeholder="Address" name="address1">{{ $vendor->address }}</textarea>
                                <span class="text-danger">
                                    @error('address1')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address 2</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" class="form-control" placeholder="Address" name="address2">{{ $vendor->address_2 }}</textarea>
                                <span class="text-danger">
                                    @error('address2')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary update-bill-button"> <i class="bx bx-save pb-1"></i>Update</button>
                                <a href="{{ url('/vendors') }}" class="btn btn-secondary"><i class="bx bx-window-close pb-1"></i>Close</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>


    @endsection
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        function showOtherInput(selectElement) {
            var otherInputDiv = document.getElementById('otherInputDiv');
            var otherTypeInput = document.getElementById('otherType');
            var otherTypeErrorMessage = document.getElementById('otherTypeErrorMessage');

            if (selectElement.value === 'other') {
                otherInputDiv.style.display = 'block';
                otherTypeInput.required = true;
            } else {
                otherInputDiv.style.display = 'none';
                otherTypeInput.required = false;
                otherTypeErrorMessage.style.display = 'none';
            }
        }
    </script>

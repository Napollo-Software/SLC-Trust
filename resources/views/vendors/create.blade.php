@extends('nav')
@section('title', 'Add Vendor | Senior Life Care Trusts')
@section('wrapper')
    @include('types.create')
    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Add Vendor</b> </div>
        </h5>
        <div class="row">

            <div class="col-xl-4">
                <form class="mb-3" action="{{ route('store.vendors') }}" method="post">
                    @csrf
                    <div class="card  mb-xl-0">
                        <div class="card-body">
                            <div style="display: flex; padding-bottom: 3%">
                                <h4>Vendor Information</h4>
                            </div>
                            <div class="row-cols-lg-6">
                                <label for="exampleFormControlInput1" class="form-label">Name<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Name" name="name"
                                       value="{{ old('name') }}" required/>
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
                                       value="{{ old('email') }}" required/>
                                <span class="text-danger">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Removed cols-lg-6 to standardize column sizes -->
                                    <label for="exampleFormControlInput1" class="form-label mt-3">Type</label>
                                    <div class="d-flex">
                                        <select id="defaultSelect" class="form-select select-2" name="type"
                                                onchange="showOtherInput(this)" >
                                            <option value="">Choose One</option>
                                            <option value="other" @if (old('type') == 'other') selected @endif>Other
                                            </option>
                                            @foreach ($types as $type)
                                                <option @if (old('type') == $type['name']) selected
                                                        @endif value="{{ $type['name'] }}">{{ $type['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('type')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-secondary mt-3" id="otherInputDiv"
                                         @if (old('type') != 'other') style="display: none;" @endif>
                                        <label for="otherType" class="form-label">Other Type <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="otherType" name="other_type"
                                               value="{{ old('other_type') }}" class="form-control">
                                        <span id="otherTypeErrorMessage" class="text-danger" style="display: none;">Other Type is required.</span>
                                    </div>
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
                    <div class="card-body">
                        <div style="display: flex; padding-bottom: 3%">
                            <h4>Other Information</h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0">Phone</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control phone" placeholder="(___) ___-___" name="phone"
                                       value="{{ old('phone') }}" id="phone" />
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
                                <label class="mb-0">Website</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="url" class="form-control" placeholder="Website" name="website"
                                       value="{{ old('website') }}" />
                                <span class="text-danger">
                                    @error('website')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3 ">
                                <label class="mb-0">Country</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <div class="form-group">
                                    <select id="defaultSelect" onchange="getCountry(this)" class="form-select select-2"
                                            name="country" >
                                        <option value="" disabled selected hidden>--Select an option</option>
                                        <option @if (old('country') == 'United States of America')
                                                    {{ 'selected' }}
                                                @endif
                                                value="United States of America">United States of America
                                        </option>
                                        <option @if (old('country') == 'canada')
                                                    {{ 'selected' }}
                                                @endif value="canada">Canada
                                        </option>
                                    </select>
                                </div>

                                <div class="mt-2">
                                    <span class="text-danger">
                                        @error('country')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="mb-0">State / Province</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <select id="SelectState" class="form-select select-2" name="state">
                                    <option disabled selected hidden>--Select State</option>

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
                                <label class="mb-0">City</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control" placeholder="User City" name="city"
                                       value="{{ old('city') }}" />
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
                                <label class="mb-0">Zip Code</label>
                            </div>
                            <div class="col-sm-4 text-secondary">
                                <input type="text" class="form-control" placeholder="Zip Code" maxlength="6"
                                       name="zipcode" value="{{ old('zipcode') }}" />
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
                                <label class="mb-0">Address 1</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" class="form-control" placeholder="Address" 
                                          name="address1">{{ old('address1') }}</textarea>
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
                                <label class="mb-0">Address 2</label>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <textarea type="text" class="form-control" placeholder="Address"
                                          name="address2">{{ old('address2') }}</textarea>
                                <span class="text-danger">
                                    @error('address2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="row pt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary update-bill-button" style="color: white;">
                                    <i class="bx bx-save pb-1"></i>Add Vendor
                                </button>
                                <a href="{{ url('/vendors') }}" class="btn btn-secondary"><i
                                        class="bx bx-window-close pb-1"></i>Close </a>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>


    function showOtherInput(selectElement) {
        var otherInputDiv = document.getElementById('otherInputDiv');
        if (selectElement.value === 'other') {
            otherInputDiv.style.display = 'block';
            $("#otherType").attr('required',true);
        } else {
            otherInputDiv.style.display = 'none';
            $("#otherType").attr('required',false);
        }
    }
</script>

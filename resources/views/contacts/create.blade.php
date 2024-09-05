<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                <button type="button" class="close close-btn closeContactModal" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="contact_form">
                @csrf
                <div class="modal-body" style="margin-top:-15px">
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <label for="form-label">First Name*</label>
                            <input type="text" name="fname" maxlength="20" class="form-control"
                                placeholder="Type first name here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Last Name*</label>
                            <input type="text" name="lname" maxlength="20" class="form-control"
                                placeholder="Type last name here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Email*</label>
                            <input type="text" name="email" maxlength="40" class="form-control"
                                placeholder="Type email here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Name of Practice</label>
                            <input type="text" maxlength="40"name="name_of_practice" class="form-control"
                                placeholder="Type name of practice here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Account Name*</label>
                            <select name="account" class="form-control" required>
                                <option value="">Select Account</option>
                                @foreach ($accounts as $item)
                                    <option value="{{ $item->id }}">{{ $item->name . ' ' . $item->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                        <label for="form-label">Designation*</label>
                        <select name="designation" class="form-control " id="designation" required>
                            <option value="">Select Designation</option>
                            <option value="other">Other</option>
                            @foreach ($designation as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                        </select>
                    </div>
                        <div class="col-sm-12 text-secondary other-input" style="display: none;">
                            <label for="otherType">Other Designation:</label>
                            <input type="text" id="otherType" name="other_type" value="{{ old('other_type') }}"
                                class="form-control">
                        </div>
                        <span class="text-danger">
                            @error('other_type')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="col-md-4 p-2">
                            <label for="form-label">Fax*</label>
                            <input type="number" name="fax" maxlength="40"class="form-control"
                                placeholder="Type fax here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Ext No</label>
                            <input type="text" name="ext_no" maxlength="40"class="form-control"
                                placeholder="Type ext no here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Phone*</label>
                            <input type="text" class="form-control phone" placeholder="(___) ___-___" name="phone"
                                    id="phone"required />
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Country*</label>
                            <select name="country" class="form-control" onchange="getCountry(this)" required>
                                <option value="" disabled selected hidden>--Select an option</option>
                                <option @if (old('country') == 'United States of America') {{ 'selected' }} @endif
                                    value="United States of America">United States of America</option>
                                <option @if (old('country') == 'canada') {{ 'selected' }} @endif value="canada">Canada</option>
                            </select>
                            <span class="text-danger">
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">State*</label>
                            <select id="SelectState" class="form-select" name="state">
                                <option disabled selected hidden>--Select State</option>

                            </select>
                            <span class="text-danger">
                                @error('state')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">City*</label>
                            <input type="text" name="city"maxlength="20" class="form-control"
                                placeholder="Type city name here" required>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Zipcode*</label>
                            <input type="text" name="zipcode"maxlength="15" class="form-control"
                                placeholder="Type zip code here" required>
                        </div>
                        <div class="col-md-8 p-2">
                            <label for="form-label">Address</label>
                            <textarea type="text" name="address" maxlength="40"placeholder="Type Address here" class="form-control address" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary contact-button mb-3">Submit</button>
                    <button type="button" class="btn btn-secondary mb-3 closeContactModal"
                        data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
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
    });


    $(document).on('submit', '#contact_form', function(e) {
        e.preventDefault();
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
        $('.contact-button').attr('disabled', true);
        $.ajax({
            'url': "{{ route('contact.store') }}",
            'method': "POST",
            'data': new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                hideAddContactModal();
                $('.contact-button').attr('disabled', false);
                $("#exampleModal").removeClass("in");
                $("#exampleModal").hide();
                swal.fire('success', 'Contact has been created successfully', 'success');
                window.location.reload();
            },
            error: function(xhr) {
                $('.contact-button').attr('disabled', false);
                erroralert(xhr);
            }
        })
    })
</script>

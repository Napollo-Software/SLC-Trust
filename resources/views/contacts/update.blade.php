<div class="modal fade" id="editContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Contact</h5>
                <button type="button" class="close close-btn closeContactModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_contact_form">
                @csrf
                <div class="modal-body" style="margin-top:-15px">
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <label for="form-label">First Name*</label>
                            <input type="text" name="fname" class="form-control fname" placeholder="Type first name here">
                            <input type="hidden" name="id" class="contact-id">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Last Name*</label>
                            <input type="text" name="lname" class="form-control lname" placeholder="Type last name here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Email*</label>
                            <input type="text" name="email" class="form-control email" placeholder="Type email here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Name of Practice</label>
                            <input type="text" name="name_of_practice" class="form-control name_of_practice" placeholder="Type name of practice here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Account Name*</label>
                            <select name="account" class="form-control account">
                                <option value="">Select Account</option>
                                @foreach ($accounts as $item)
                                <option value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Designation*</label>
                            <select name="designation" class="form-control designation" id="designation">
                                <option value="">Select Designation</option>
                                @foreach ($designation as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-12 text-secondary other-input" style="display: none;">
                            <label for="otherType">Other Designation:</label>
                            <input type="text" id="otherType" name="other_type" value="{{ old('other_type') }}" class="form-control">
                        </div>

                        <div class="col-md-4 p-2">
                            <label for="form-label">Fax*</label>
                            <input type="text" name="fax" class="form-control fax" placeholder="Type fax here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Ext No</label>
                            <input type="text" name="ext_no" class="form-control ext_number" placeholder="Type ext no here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Phone*</label>
                            <input type="text" class="form-control phone" placeholder="(___) ___-___" name="phone" value="{{ old('phone') }}" id="phone" />
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Country*</label>
                            <select name="country" class="form-control country">
                                <option value="United States of America">United States of America</option>
                                <option value="canada">Canada</option>
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">State*</label>
                            <select name="state" class="form-control state">
                                @foreach (App\Models\City::select('state')->distinct()->get() as $state)
                                <option @if (old('state')==$state->state) {{ 'selected' }} @endif
                                    value="{{ $state->state }}">{{ $state->state }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">City*</label>
                            <input type="text" name="city" class="form-control city" placeholder="Type city name here">
                        </div>
                        <div class="col-md-4 p-2">
                            <label for="form-label">Zipcode*</label>
                            <input type="text" name="zipcode" class="form-control zip_code" placeholder="Type zip code here">
                        </div>
                        <div class="col-md-8 p-2">
                            <label for="form-label">Address</label>
                            <textarea type="text" name="address" placeholder="Type Address here" class="form-control address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-primary contact-button mb-3">Submit</button>
                    <button type="button" class="btn btn-secondary mb-3 closeContactModal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    function toggleOtherInput(selectElement) {
        var otherInputDiv = document.getElementById('otherInputDiv');
        var otherTypeInput = document.getElementById('otherType');

        if (selectElement.value === 'other') {
            otherInputDiv.style.display = 'block';
            otherTypeInput.required = true;
        } else {
            otherInputDiv.style.display = ''; // Set display property to default (visible)
            otherTypeInput.required = false;
        }
    }

    $(document).on('submit', '#edit_contact_form', function(e) {
        e.preventDefault();
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback.is-invalid').remove();
        $('.contact-button').attr('disabled', true);
        $.ajax({
            'url': "{{ route('contact.update') }}",
            'method': "POST",
            'data': new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            success: function(data) {
                hideEditContactModal();
                $('.contact-button').attr('disabled', false);
                $("#exampleModal").removeClass("in");
                $("#exampleModal").hide();
                swal.fire('success', 'Contact has been updated successfully', 'success');
                window.location.reload();
            },
            error: function(xhr) {
                $('.contact-button').attr('disabled', false);
                erroralert(xhr);
            }
        })
    })
</script>
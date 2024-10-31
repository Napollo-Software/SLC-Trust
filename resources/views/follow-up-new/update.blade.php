<style>
    .custom-margin {
        margin-top: -30px;
    }
</style>
<div class="modal fade" id="editType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="exampleModalLabel">Update Follow Up</h5>
                <button type="button" class="close close-btn closeeditType" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateFollowupForm">
                @csrf
                <input type="hidden" name="id" value="" id="edit_id">
                <div class="modal-body">
                    <div class="row mb-3">
{{--                        <div class="col-md-6">--}}
                            <label for="exampleFormControlInput1" class="form-label">From</label>
                            <input type="hidden" class="form-control" placeholder="Name"
                                   value="{{ $from->name . ' ' . $from->last_name }}" disabled />
                            <input type="hidden" name="from" value="{{ $from->id }}">
                            <input type="hidden" name="type" value="followup">
                            <span id="nameError" class="text-danger"></span>
{{--                        </div>--}}
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Assignee</label>
                            <select id="edit_to" class="form-control" name="to">
                                <option value="">Choose One</option>
                                @foreach ($to as $item)
                                    <option value="{{ $item->id }}">{{ $item->full_name() }}</option>
                                @endforeach
                            </select>
                            <span id="categoryError" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Referrals</label>
                            <select id="edit_referral" class="form-control" name="referral">
                                <option value="">Choose One</option>

                                @foreach ($referrals as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} {{ $item->last_name }}</option>
                                @endforeach
                            </select>
                            <span id="categoryError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Follow Up Date</label>
                            <input type="date" id="edit_date" class="form-control" name="date" />
                            <span id="nameError" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Follow Up Time</label>
                            <input type="time" id="edit_time"class="form-control" name="time" />
                            <span id="categoryError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Follow Up Note</label>
                            <textarea name="note" id="edit_note" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary closeeditType" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function hideeditTypeModal() {
            $('#editType').modal('hide')
        }

        function showEditTypeModal() {
            $('#editType').modal('show')
        }
        $('.closeeditType').on('click', function(e) {
            e.preventDefault()
            hideeditTypeModal()
        })
        $('.TypeEditBtn').on('click', function(e) {
            e.preventDefault()
            var previousId=$(this).attr('data-id');
            var previousDate=$(this).attr('data-date');
            var previousTime=$(this).attr('data-time');
            var previousNote=$(this).attr('data-note');
            var previousTo=$(this).attr('data-to');
            var previousReferral=$(this).attr('data-referral');

            $('#edit_note').val(previousNote);
            $('#edit_date').val(previousDate);
            $('#edit_time').val(previousTime);
            $('#edit_to').val(previousTo);
            $('#edit_referral').val(previousReferral);
            $('#edit_id').val(previousId);


            showEditTypeModal()
        })
        $('#updateFollowupForm').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                url: '{{ route('follow_up.update') }}',
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $("#updateFollowupForm").removeClass("in");
                    hideeditTypeModal();
                    swal.fire('Success', 'Follow up has been updated successfully', 'success')
                        .then(function() {
                            location.reload();
                        });
                },
                error: function(response) {
                    erroralert(response);
                }

            })
        })
    })
</script>

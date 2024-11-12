<style>
    .custom-margin {
        margin-top: -30px;
    }
</style>
<div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Follow Up</h5>
                <button type="button" class="close close-btn closeAddType" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addFollowupForm" action="{{ route('follow_up.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
{{--                        <div class="col-md-6">--}}
{{--                            <label for="exampleFormControlInput1" class="form-label">From</label>--}}
                            <input type="hidden"  class="form-control"
                                   value="{{ $from->name . ' ' . $from->last_name }}" disabled />
                            <input type="hidden" name="from" value="{{ $from->id }}">
                            <input type="hidden" name="type" value="followup">
                            <span id="nameError" class="text-danger"></span>
{{--                        </div>--}}
                        <div class="col-md-6">
                            @php $current_user_role = App\Models\User::find(Session::get('loginId'))->role; @endphp
                            <label for="assigneeInput" class="form-label">Assignee*</label>

                            @if ($current_user_role == 'Employee')
                                <!-- Display a readonly input if the user is an Employee -->
                                <input type="text" id="assigneeInput" class="form-control" value="{{ $to->firstWhere('id', Session::get('loginId'))->name }} {{ $to->firstWhere('id', Session::get('loginId'))->last_name }}" readonly>
                                <!-- Hidden input to keep the selected value for form submission -->
                                <input type="hidden" name="to" value="{{ Session::get('loginId') }}">
                            @else
                                <!-- Display the select dropdown if the user is not an Employee -->
                                <select id="defaultSelect" class="form-control" name="to" required>
                                    <option value="">Choose One</option>
                                    @foreach ($to as $item)
                                        <option
                                            value="{{ $item->id }}"
                                            {{ $item->id == old('to') ? 'selected' : '' }}
                                        >
                                            {{ $item->name }} {{ $item->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                            <span id="categoryError" class="text-danger"></span>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Referrals</label>
                            <select id="defaultSelect" class="form-control" name="referral">
                                <option value="">Choose One</option>

                                @foreach ($referrals as $item)
                                    <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                                @endforeach
                            </select>
                            <span id="categoryError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Follow Up Date*</label>
                            <input type="date" class="form-control" name="date" required />
                            <span id="nameError" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1" class="form-label">Follow Up Time*</label>
                            <input type="time" class="form-control" name="time" required />
                            <span id="categoryError" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1" class="form-label">Description*</label>
                            <textarea name="note" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary closeAddType" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        function hideAddTypeModal() {
            $('#addType').modal('hide')
        }
        function showAddTypeModal() {
            $('#addType').modal('show')
        }
        $('.closeAddType').on('click', function(e) {
            e.preventDefault()
            hideAddTypeModal()
        })
        $('.TypeAddBtn').on('click', function(e) {
            e.preventDefault()
            showAddTypeModal()
        })
        $('#addFollowupForm').on('submit', function(e) {
            e.preventDefault();
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $.ajax({
                url: '{{ route('follow_up.store') }}',
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                    $("#addFollowupForm").removeClass("in");
                    hideAddTypeModal();
                    swal.fire('Success', 'Follow up has been created successfully', 'success')
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

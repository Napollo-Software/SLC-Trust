<div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Type</h5>
                <button type="button" class="close closeAddType" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addTypeForm" method="POST"> 
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" maxlength="50"
                            required />

                        <span id="nameError" class="text-danger"></span>
                    </div>

                    <div class="row mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Select Category</label>
                        <select id="defaultSelect" class="form-select" name="category" required>
                            <option value="">Choose One</option>
                            <option value="Organization">Organization</option>
                            <option value="Designation">Designation</option>
                            <option value="Case Type">Case Type</option>
                        </select>
                        <span id="categoryError" class="text-danger"></span>
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
        $('#addTypeForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                url: '/types/add', // Replace with your server endpoint
                type: 'post',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    hideAddTypeModal();
                    swal.fire('success', 'Type has been created successfully', 'success');
                    window.location.reload();

                    var table = $('.dataTable').DataTable();
                    table.row.add([
                        response.detail.id,
                        `<a href="${route('view.type', response.detail.id)}">${response.detail.name}</a>`,
                        response.category,
                        '<div class="dropdown"><!-- Your dropdown menu content --></div>'
                    ]).draw(false);

                },
                error: function(response) {
                    erroralert(response);
                }
            });
        });

    })
</script>

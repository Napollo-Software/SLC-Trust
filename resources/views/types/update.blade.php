<div class="modal fade" id="updateType" tabindex="-1" role="dialog" aria-labelledby="customerdpositLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerdpositLabel"> Update Type</h5>
                <button type="button" class="close updateTypeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateTypeForm" method="POST">
                @csrf
                <div class="modal-body m-2">
                    <div class="row mb-3">
                        <input type="hidden" name="id" class="id" value="">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Name"
                            id="nameFromDB"
                            name="name"
                        />
                        <span id="updateNameError" class="text-danger"></span>
                    </div>

                    <div class="row mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Categories</label>
                        <select id="categoryFromDB" class="form-select form-control" name="category">
                            <option value="">Choose One</option>
                            <option value="Organization">Organization</option>
                            <option value="Designation">Designation</option>
                            <option value="Case Type">Case Type</option>
                        </select>
                        <span id="updateCategoryError" class="text-danger"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary submitUpdateBtn">Submit</button>
                    <button type="button" class="btn btn-secondary updateTypeModal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function (){
        function showUpdateTypeModal(){
            $('#updateType').modal('show')
        }
        function hideUpdateTypeModal(){
            $('#updateType').modal('hide')
        }
        $('.updateTypeModal').on('click', function (e){
            e.preventDefault()
            hideUpdateTypeModal()
        })
        $('.editBtn').on('click',function (e){
            e.preventDefault()
            showUpdateTypeModal()
            var id = $(this).attr('id')
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback.is-invalid').remove();
            $.ajax({
                url:'/types/edit/'+id,
                type:'get',
                success: function (response){
                    $('#nameFromDB').val(JSON.parse(response).name)
                    $('#categoryFromDB').val(JSON.parse(response).category)
                    $('.id').val(JSON.parse(response).id)
                },
                error: function (response){
                    console.log(response)
                }

            })
        })
        $('#updateTypeForm').on('submit', function (e){
            e.preventDefault()
            var formData = $(this).serialize()
            $.ajax({
                url:'/types/update',
                type:'post',
                data:formData,
                dataType: 'json',
                success: function (response){
                    $("#updateType").removeClass("in");
                    hideUpdateTypeModal()
                    swal.fire('success','Type has been Updated successfully','success');
                    location.reload()
                },
                error: function (response){
                    erroralert(response);
                }

            })
        })
    })
</script>

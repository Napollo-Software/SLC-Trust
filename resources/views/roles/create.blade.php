@extends('nav')
@section('title', 'Add Role | SLC Trust')
@section('wrapper')
<style>
    hr{
        width: 98% !important;
    }
</style>
    <div class="">
        <h5 class=" d-flex justify-content-between pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/roles')}}" class="text-muted fw-light pointer"><b>Manage Roles</b></a> / <b>Add Role</b> </div>
        </h5>
        <div class="row">
            <div class="col-lg-4 mt-2">
                <div class="card">
                    <h5 class="card-header pb-1"><b>Add Role</b></h5>
                    <div class="card-body pt-1">
                        <div class="row mb-3">
                            <div class="col-lg-12 mb-6">
                                <form action="{{ route('roles.create') }}" method="post">
                                    @csrf
                                    @method('post')
                                    <label for="exampleFormControlInput1" class="form-label">Role Name</label>
                                    <input type="text" name="role_name" value="{{ old('role_name') }}" class="form-control" placeholder="Role Name" />
                                    <small class="mt-2">(Rule name must be unique)</small>
                                    <span class="text-danger">
                                        @error('role_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-2">
                <div class="card">
                    <h5 class="card-header pb-1"><b>Permissions</b></h5>
                    <span class="text-danger @error('permissions') m-2 @enderror">
                        @error('permissions')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="card-body pt-1">
                        <div class="row">
                        @foreach ($categories as $k=>$category)
                            <div class="col-lg-12 mb-6">
                                <label style="font-size: 15px;" for=""
                                    class="form-label">{{ $category->category }}</label>
                            </div>
                            @foreach ($permissions as $permission)
                                @if ($permission->category == $category->category)
                                    <div class="@if($k == '1') col-lg-4 @else col-lg-3 @endif mb-2">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                            class="checkBox" id="{{ $permission->id }}" />
                                        <label class="form-check-label" for="{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                            <hr>
                        @endforeach
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary ">Submit</button>
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
            $(document).ready(function (){
                $(".checkBox").on('change',function(e) {
                    //     e.preventDefault()
                    var permission_name = $(this).attr('id')
                    let checkedUserEdit = $('#'+permission_name).prop('checked') && permission_name == 3
                    let checkedBalanceAdd = $('#'+permission_name).prop('checked') && permission_name == 4
                    if (checkedUserEdit || checkedBalanceAdd){
                        $('#1').prop("checked", true);
                    }
                    let checkPayeeAdd = $('#'+permission_name).prop('checked') && permission_name == 8
                    if(checkPayeeAdd){
                        $('#7').prop("checked", true);
                    }
                    let checkedRecurringEdit = $('#'+permission_name).prop('checked') && permission_name == 12
                    let checkedRecurringRemove = $('#'+permission_name).prop('checked') && permission_name == 13
                    if (checkedRecurringEdit || checkedRecurringRemove){
                        $('#11').prop("checked", true);
                    }
                    let checkedRoleADd = $('#'+permission_name).prop('checked') && permission_name == 21
                    let checkedRoleEdit = $('#'+permission_name).prop('checked') && permission_name == 22
                    let checkedRoleDelete = $('#'+permission_name).prop('checked') && permission_name == 23
                    if (checkedRoleADd || checkedRoleEdit || checkedRoleDelete){
                        $('#20').prop("checked", true);
                    }
                });
            })
        </script>

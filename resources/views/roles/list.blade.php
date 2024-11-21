@extends('nav')
@section('title', 'Manage Roles | Senior Life Care Trusts')
@section('wrapper')
    <?php
    $user = \App\Models\User::find(Session::get('loginId'));
    ?>
    <style>
        .word-wrap {
            width: 400px;
        }

        .delete {
            margin-bottom: -15px !important;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            Swal.fire({
                title: 'Warning!',
                text: "Are you sure ,You want to delete it",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: 'info',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#delete_role_form' + id).submit();
                }
            })
        });
    </script>

    <div class="">
        <h5 class=" d-flex justify-content-start pt-3 pb-2">
            <b></b>
           <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> / <b>Manage Roles</b> </div>
        </h5>
        <div class="row">
            <div class="col-lg-12 mb-12">
                <div class="card">
                    <div class="d-flex align-items-center p-3">
                        <div>
                            <h5 class="mb-1">Manage Roles</h5>
                            <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall permissions</p>
                        </div>
                        <div class="font-22 ms-auto">
                            {{-- @if($user->hasPermissionTo('Role Create')) --}}
                            <a href="{{ route('createView.role') }}" class="m-3">
                                <button class="btn btn-primary pb-1 pt-1"><i class='bx bx-save pb-1'></i>Add Role </button>
                            </a>
                        {{-- @endif --}}
                        </div>
                    </div>
                    <div class="card-body mt-0" >
                        <div class="table-responsive text-nowrap overflow-auto pb-2" style="margin-top: -20px">
                            <table class="table align-middle mb-0 table-hover dataTable">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 100px">Role Name</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $c)
                                        <tr>
                                            {{-- @if($user->hasPermissionTo('Role Edit')) --}}
                                            <td class="text-left">
                                                <a href="{{ url('/roles/edit/' . $c['id']) }}">
                                                        {{ ucfirst($c['name']) }}
                                                </a>
                                            </td>
                                            {{-- @else
                                                <td>
                                                    {{ ucfirst($c['name']) }}
                                                </td>
                                            @endif --}}

                                            <td>
                                                @foreach ($c->permissions as $k => $p)
                                                    <span class="badge bg-info m-1 rounded">{{ $p->name }}</span>
                                                    {{-- @if ($k != 0 && $k % 4 == 0)
                                                        <br>
                                                    @endif --}}
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                {{-- @if($user->hasPermissionTo('Role Edit') || $user->hasPermissionTo('Role Delete')) --}}
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        {{-- @if($user->hasPermissionTo('Role Edit')) --}}
                                                        <a href="{{ url('/roles/edit/' . $c['id']) }}">
                                                            <button class="dropdown-item mb-2">
                                                                <i class='bx bxs-show'></i> Edit
                                                            </button>
                                                        </a>
                                                        {{-- @endif  --}}
                                                            {{-- @if($user->hasPermissionTo('Role Delete')) --}}
                                                        <form id="{{ 'delete_role_form' . $c['id'] }}"
                                                            action="{{ route('delete.role') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id" id="id"
                                                                value="{{ $c['id'] }}">
                                                            <button type="submit" id="{{ $c['id'] }}"
                                                                class="dropdown-item delete">
                                                                <i class="bx bx-trash-alt"></i> Delete
                                                            </button>
                                                        </form>
                                                            {{-- @endif --}}
                                                    </div>
                                                </div>
                                                {{-- @endif --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{--                            {{ $category->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.dataTable').DataTable({
            aLengthMenu: [
                [25, 50, 100, -1],
                [25, 50, 100, "All"]
            ],
            "order": false // "0" means First column and "desc" is order type;
        });
    });
</script>

@extends("nav")
@section('title', 'Manage Categories | Intrustpit') 
@section("wrapper") 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
  $(document).on('click','#delete_category',function(e){
    e.preventDefault();
        let id = $(this).data('id');
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
                $('#delete_category_form').submit();
            }
        })
    });

</script>         
          <div class="">
            <h5 class="fw-bold mb-4"><span class="text-muted fw-light"><b>Dashboard</b></span> / Manage Categories</h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <div class="d-flex align-items-center pl-2">
                    <div>
                        <h5 class="mb-1">Manage Categories</h5>
                        <p class="mb-0 font-13 text-secondary"><i class='bx bxs-calendar'></i>Overall Categories</p>
                    </div>
                    <div class="ms-auto"> <form action="{{ action('App\Http\Controllers\categoryController@create') }}">
                      <button class="btn btn-primary pb-1 pt-1 m-3">Add Category</button>
                    </form> 
                    </div>
                </div>
                  <div class="card-body" style="margin-top: -15px;">
                    <div class="table-responsive text-nowrap overflow-auto pb-2">
                      <table class="table align-middle mb-0 table-hover dataTable">
                        <thead class="table-light">
                          <tr>
                            <th>CID#</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($category as $c)
                          <tr>
                            <td>{{ $c['id'] }}</td>
                            <td>
                                {{-- <form action="{{ action('App\Http\Controllers\categoryController@show', $c->id) }} " method="get">  
                                @csrf                                                                
                                  <button class="btn btn-primary">  --}}
                                     {{ $c['category_name'] }}
                                  </button>
                                </form>                              
                            </td>
                            <td>
                              <span class="badge 
                              @if ($c['category_staus']  == 'Published') bg-primary @endif 
                              @if ($c['category_staus']  == 'Archived') bg-danger @endif 
                              me-1">
                              @if ($c['category_staus']  == 'Published') {{ $c['category_staus'] }} @endif
                              @if ($c['category_staus']  == 'Archived') {{ $c['category_staus'] }} @endif
                               </span>                              
                            </td>
                            <td class="text-center">
                              <div class="dropdown mb-0">
                                <button
                                  type="button"
                                  class="btn p-0 dropdown-toggle hide-arrow"
                                  data-bs-toggle="dropdown"
                                >
                                  <i class="bx bx-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                <form action="{{ action('App\Http\Controllers\categoryController@edit', $c->id) }} " method="get">  
                                @csrf                                                                
                                  <button class="dropdown-item mb-0"> 
                                    <i class='bx bxs-show'></i> Edit
                                  </button>
                                </form>                                    
                                {{-- <form id="delete_category_form" action="{{route('delete.category')}}" method="post">  
                                @csrf      
                                <input type="hidden" name="id" value="{{$c->id}}">                                                          
                                  <button type="button" id="delete_category" class="dropdown-item"> 
                                    <i class="bx bx-trash-alt me-1"></i> Delete
                                  </button>
                                </form> --}}
                                </div>
                              </div>
                            </td>
                          </tr> 
                          @endforeach                                                                                                      
                        </tbody>
                      </table>
                      {{-- {{ $category->links() }}  --}}
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

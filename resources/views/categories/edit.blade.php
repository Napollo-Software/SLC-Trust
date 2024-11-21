@extends("nav")
@section('title', 'Add Category Senior Life Care Trusts')
@section("wrapper")
          <div class="">
            <h5 class=" d-flex justify-content-start pt-3 pb-2">
                <b></b>
               <div> <a href="{{url('/main')}}" class="text-muted fw-light pointer"><b>Dashboard</b></a> /<a href="{{url('/category')}}" class="text-muted fw-light pointer"><b>Categories</b></a> / <b>Edit Category</b> </div>
            </h5>
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card">
                  <h5 class="card-header"><b>Edit Category #{{ $category->id}}</b></h5>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-lg-6 mb-3">
                        <form action="{{ action('App\Http\Controllers\categoryController@update', $category->id) }} " method="post">
                        @csrf
                        @method('put')
                        <label for="exampleFormControlInput1" class="form-label">Category Name</label>
                        <input
                          type="text"
                          name="category_name"
                          class="form-control"
                          placeholder="Category Name"
                          value = "{{ $category ->category_name }}"
                        />
                        <span class="text-danger">@error('category_name'){{$message}} @enderror</span>
                        </div>
                        <div class="col-lg-6 mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Category Status</label>
                          <select id="defaultSelect" class="form-select" name="category_status">
                            <option @if ($category->category_staus == 'Published') selected @endif>Published</option>
                            <option @if ($category->category_staus == 'Archived') selected @endif>Archived</option>
                          </select>
                        <span class="text-danger">@error('category_status'){{$message}} @enderror</span>
                        </div>

                      <div class="row mb-3">
                        <div class="col-lg-3">
                          <button class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

@endsection

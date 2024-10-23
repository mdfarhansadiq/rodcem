@extends('layouts.company')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Subcategory Category List</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#create">
                        <i class="ti-plus"></i>Add New
                    </button>
                </div>
                @push('all_models')
                <form class="forms-sample" action="{{route('company.category.store')}}" method="post">
                 @csrf
                    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-10 mx-auto grid-margin stretch-card">
                                    <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase"></h4>                                           
                                        <div class="form-group">
                                          <label for="category_id">Select category <span class="text-danger">*</span></label>
                                          <select id="category_id" name="category_id" class="form-control" required>
                                            @foreach(product_categories() as $item)
                                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                          </select>
                                          @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                        </div>
                                        <div class="form-group">
                                          <label for="category_id">Sub Category <span class="text-danger">*</span></label>
                                          <input type="text" name="sub_category" class="form-control" placeholder="Enter Subcategory" required>
                                          @error('sub_category')
                                            <small class="text-danger">{{ $message }}</small>
                                          @enderror
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                @endpush
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Product Categories <span class="badge bg-primary"></span></p>
                  <div class="table-responsive text-center">
                    <table class="table table-hover">
                      <thead>
                        <tr>  
                          <th>SL</th>
                          <th>Category</th>                                           
                          <th>Subcategory</th>                                           
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $row )                            
                            <tr>
                              <td>{{$loop->index+1}}</td>
                                <td>
                                    {{$row->category->name}}
                                </td>
                                <td>
                                    {{$row->sub_category}}
                                </td>
                                <td>
                                    {{-- edit --}}
                                    <span class="badge bg-primary p-2"  data-toggle="modal" data-target="#edit_{{$row->id}}">Edit</span>
                                    @push('all_models')
                                    <form class="forms-sample" action="{{route('company.category.update',$row->id)}}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                        <div class="modal fade" id="edit_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-10 mx-auto grid-margin stretch-card">
                                                        <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title text-uppercase"></h4>                                           
                                                            <div class="form-group">
                                                              <label for="category_id">Select category <span class="text-danger">*</span></label>
                                                              <select id="category_id" name="category_id" class="form-control" required>
                                                                @foreach(product_categories() as $item)
                                                                  <option value="{{ $item->id }}" {{$item->id == $row->category_id ? 'selected' : ''}}>{{ $item->name }}</option>
                                                                @endforeach
                                                              </select>
                                                              @error('category_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                              @enderror
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="category_id">Sub Category <span class="text-danger">*</span></label>
                                                              <input type="text" name="sub_category" class="form-control" value="{{$row->sub_category}}" required>
                                                              @error('sub_category')
                                                                <small class="text-danger">{{ $message }}</small>
                                                              @enderror
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endpush
                                    {{-- delete  --}}
                                    <span class="badge bg-danger p-2" data-toggle="modal" data-target="#delete_{{$row->id}}">Delete</span>
                                    @push('all_models')
                                    <form action="{{route('company.category.destroy',$row->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <div class="modal fade" id="delete_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                              </div>
                                              <div class="modal-body text-center">
                                                  <h2 class="text-danger">Are You Sure?</h2>
                                                  <p>Your Won't able to retrive this.</p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                  <button type="submit" class="btn btn-danger">Submit</button>
                                              </div>
                                              </div>
                                          </div>
                                        </div>
                                    </form>
                                    @endpush
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
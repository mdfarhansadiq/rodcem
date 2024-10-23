@extends('layouts.company')
@section('custom_css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
@endsection
@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Product create</h4>
                </div>
                <div>
                    <a href="{{ route('company.product.index') }}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-share-alt"></i> Go back
                    </a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 m-auto grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('company.product.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="unit_id">Select unit <span class="text-danger">*</span></label>
                        <select id="unit_id" name="unit_id" class="form-control" required>
                          @foreach($units as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                          @endforeach
                        </select>
                        @error('unit_id')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="category">Select Category <span class="text-danger">*</span></label>
                        <select id="category" name="category" class="form-control" required>
                          @foreach(product_categories() as $item)
                            <option value="{{ $item->id }}">{{ $item->name}}</option>
                          @endforeach
                        </select>
                        @error('category')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Product Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}" required>
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Price <span class="text-danger">*</span></label>
                        <input type="number" id="price" name="price" placeholder="Enter Price" class="form-control" value="{{old('price')}}" required>
                        @error('price')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Short Description <span class="text-danger">*</span></label>
                        <input id="short_description" type="hidden" name="short_description" value="{{old('short_description')}}">
                        <trix-editor input="short_description" ></trix-editor>
                        @error('short_description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Long Description <span class="text-danger"></span></label>
                        <input id="x" type="hidden" name="description" value="{{old('description')}}">
                        <trix-editor input="x"></trix-editor>
                        @error('description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="image">Product Thumnail <span class="text-danger">*(Recommended Image Dimension 192 X 161 PX)</span></label>
                        <input type="file" id="image" class="form-control" name="image" accept="image/*">
                        @error('image')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="details_image">Details Image <span class="text-danger">*(Recommended Image Dimension 750 X 750 PX)</span></label>
                        <input type="file" id="details_image" class="form-control" name="details_image" accept="image/*">
                        @error('details_image')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label></label>
                        <input type="submit" class="btn btn-success" value="Create">
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
@section('custom_js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection

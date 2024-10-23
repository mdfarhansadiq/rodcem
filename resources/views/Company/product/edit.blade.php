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
                  <h4 class="font-weight-bold mb-0 text-uppercase">Product Update</h4>
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
                    <form action="{{ route('company.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PATCH')
                      <div class="form-group">
                        <label for="unit_id">Select unit <span class="text-danger">*</span></label>
                        <select id="unit_id" name="unit_id" class="form-control">
                          @foreach($units as $item)
                            <option value="{{ $item->id }}" @if($item->id == $product->unit_id) selected @endif>{{ $item->name }}
                            </option>
                          @endforeach
                        </select>
                        @error('unit_id')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="category">Select Category <span class="text-danger">*</span></label>
                        <select id="category" name="category" class="form-control">
                          @foreach(product_categories() as $item)
                            <option value="{{ $item->id }}" @if($item->id == $product->category) selected @endif>{{ $item->name }}</option>
                          @endforeach
                        </select>
                        @error('category')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" placeholder="Ex: Kilogram">
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Price <span class="text-danger">*</span></label>
                        <input type="number" disabled id="price" name="price" placeholder="Enter Price" class="form-control" value="{{$product->price}}" required>
                        @error('price')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Short Description <span class="text-danger">*</span></label>
                        <input id="short_description" type="hidden" name="short_description" value="{!! $product->short_description!!}">
                        <trix-editor input="short_description" ></trix-editor>
                        @error('short_description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Long Description</label>
                        <input id="x" type="hidden" name="description" value="{!! $product->description!!}">
                        <trix-editor input="x"></trix-editor>
                        @error('description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                     <div class="form-group">
                           <img height="100" class="mt-3" width="100" src="{{ asset('company/products/' . $product->image) }}" alt="Product photo">
                     </div>
                      <div class="form-group">
                        <label for="image">Product Thumnail <span class="text-danger">*(Recommended Image Dimension 192 X 161 PX)</span></label>
                        <input type="file" id="image" class="form-control" name="image" accept="image/*">
                        @error('image')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                        <div class="form-group">
                            <img height="100" class="mt-3" width="100" src="{{ asset('company/products/details/' . $product->details_image) }}" alt="Product details photo">
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
                        <input type="submit" class="btn  btn-success" value="Update">
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

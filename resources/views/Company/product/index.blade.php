@extends('layouts.company')

@section('content')
 <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-uppercase">Product list</h4>
            </div>
            <div>
                <a href="{{ route('company.product.create') }}" class="btn btn-primary btn-icon-text btn-rounded">
                  <i class="ti-pluse"></i> Add Product
                </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
              <div class="table-responsive text-">
                <table class="table table-hover text-center align-middle">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Unit</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                    <tr>
                      <td>
                        <img src="{{ asset('company/products/' . $item->image) }}" alt="Product photo">
                      </td>
                      <td>{{ $item->name ?? '' }}</td>
                      <td>{{ $item->unit->name  ?? ''}}</td>
                      <td>{{ $item->porduct_category->name ?? ''}}</td>
                      <td>{{ $item->price ?? ''}}</td>
                      <td>
                        <form action="{{route('company.product.destroy',$item->id)}}" method="post">
                          {{-- <a class="btn btn-primary" href="{{ route('company.product.show', $item->id) }}">View</a> --}}
                        <a class="btn btn-info" href="{{ route('company.product.edit', $item->id) }}">Edit</a>
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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
@endsection

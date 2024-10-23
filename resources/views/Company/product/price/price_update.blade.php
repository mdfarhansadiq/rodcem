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
                  <h4 class="font-weight-bold mb-0 text-uppercase">Product Price Update</h4>
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
                          @foreach($products as $item)
                          <tr>
                            <td>
                              <img src="{{ asset('company/products/' . $item->image) }}" alt="Product photo">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->unit->name }}</td>
                            <td>{{ $item->porduct_category->name ?? ''}}</td>
                            <form action="{{route('company.product.price.update',$item->slug)}}" method="post">
                             @csrf
                              <td>
                                <input type="number" name="price" value="{{$item->price}}">
                              </td>
                              <td>
                                @if(price_update_time() == true)
                                  <button type="submit" class="btn btn-danger">Update</button>
                                @else
                                  <a data-toggle="modal" data-target="#price_update_{{$item->id}}" class="btn btn-danger text-white">Update</a>
                                  @push('all_models')
                                    <div class="modal fade" id="price_update_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title text-warning" id="exampleModalLongTitle">Warning!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p class="text-danger">
                                                Product Price Update Befole {{order_time_setting()->start}} Or After {{order_time_setting()->end}}
                                            </p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  @endpush
                                @endif
                              </td>
                            </form>
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
@section('custom_js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endsection

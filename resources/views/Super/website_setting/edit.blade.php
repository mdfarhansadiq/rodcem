@extends('layouts.super')

@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Website setting edit</h4>
                </div>
                <div>
                    <a href="{{ route('super.websitesetting.index') }}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i> Go back
                    </a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 m-auto grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('super.websitesetting.update', $data->id) }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method("PATCH")
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" value="{{ $data->name }}" disabled />
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      @if($data->type == 'image')
                        <div class="form-group">
                          <label for="value">Photo</label>
                          <input type="file" id="value" name="value" accept="image/*">
                          <img height="100" width="100" src="{{ asset('super_admin/website_setting/' . $data->value) }}" alt="Website setting photo">
                          @error('value')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      @else
                        <div class="form-group">
                          <label for="value">Value</label>
                          <input name="value" class="form-control" value="{{ $data->value }}" />
                          @error('value')
                            <small class="text-danger">{{ $message }}</small>
                          @enderror
                        </div>
                      @endif
                      <div class="form-group">
                        <label></label>
                        <input type="submit" class="btn btn-sm btn-success" value="Update">
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
          </div>
        </footer>
        <!-- partial -->
@endsection

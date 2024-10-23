@extends('layouts.super')

@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">About us create</h4>
                </div>
                <div>
                    <a href="{{ route('super.aboutus.index') }}" class="btn btn-primary btn-icon-text btn-rounded">
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
                    <form action="{{ route('super.aboutus.store') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                        @error('description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="image">Photo</label>
                        <input type="file" id="image" name="image" accept="image/*">
                        @error('image')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label></label>
                        <input type="submit" class="btn btn-sm btn-success" value="Create">
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

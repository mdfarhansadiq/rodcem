@extends('layouts.super')
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
                  <h4 class="font-weight-bold mb-0 text-uppercase">Headline Update</h4>
                </div>
                <div>
                    {{-- <a href="{{ route('news.index') }}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-share-alt"></i> Go back
                    </a> --}}
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 m-auto grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('super.headline.store') }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputUsername1">Headline <span class="text-danger"></span></label>
                        <input id="x" type="hidden" name="content" value="{!!headline()->content ?? ''!!}">
                        <trix-editor input="x"></trix-editor>
                        @error('content')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                      <div class="form-group">
                        <label></label>
                        <input type="submit" class="btn btn-success" value="Update">
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

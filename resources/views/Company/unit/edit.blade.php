@extends('layouts.company')

@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">Unit edit</h4>
                </div>
                <div>
                  <a href="{{ route('company.unit.index') }}" class="btn btn-primary btn-icon-text btn-rounded">
                    <i class="ti-share-alt"></i> Go back
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 m-auto grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <form action="{{ route('company.unit.update', $data->id) }}" method="post">
                      @csrf
                      @method("PATCH")
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $data->name }}" class="form-control" placeholder="Ex: Kilogram">
                        @error('name')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                      {{-- <div class="form-group">
                        <label for="symbol">Symble</label>
                        <input type="text" id="symbol" name="symbol" value="{{ $data->symbol }}" class="form-control" placeholder="Ex: KG">
                        @error('symbol')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div> --}}
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

@extends('layouts.company')

@section('content')
 <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-uppercase">Unit list</h4>
            </div>
            <div>
                <a href="{{ route('company.unit.create') }}" class="btn btn-primary btn-icon-text btn-rounded">
                  <i class="ti-plus"></i> Add unit
                </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <p class="card-title mb-0">Order List</p>
              <div class="table-responsive">
                  <table class="table table-hover text-center">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Name</th>
                        {{-- <th>Symbol</th> --}}
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        {{-- <td>{{$item->symbol}}</td> --}}
                        <td>
                          <a class="btn btn-info" href="{{ route('company.unit.edit', $item->id) }}">Edit</a>
                          <button class="btn btn-danger" onclick="destroy('{{ route('company.unit.destroy', $item->id) }}')">
                            Delete
                          </button>
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
</div>
@endsection

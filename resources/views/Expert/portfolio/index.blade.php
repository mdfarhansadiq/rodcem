@extends('layouts.expert')

@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Portfolio list</h4>
                </div>
                <div>
                    <a href="{{ route('expert.portfolio.create') }}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i> Add portfolio
                    </a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($data as $item)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                      <img src="{{ asset('expert/portfolios/' . $item->image) }}" alt="Category photo">
                                    </td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                      <a class="btn btn-sm btn-info" href="{{ route('expert.portfolio.edit', $item->id) }}">Edit</a>
                                      <button class="btn btn-sm btn-danger" onclick="destroy('{{ route('expert.portfolio.destroy', $item->id) }}')">
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

@extends('layouts.super')

@section('content')
 <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Website setting list</h4>
                </div>
                <div>
                    <a href="{{ route('super.websitesetting.create') }}" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i> Add website setting
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
                                    <th>Name</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($data as $item)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($item->name) }}</td>
                                    <td>
                                      @if($item->type === 'image')
                                        <img src="{{ asset('super_admin/website_setting/' . $item->value) }}" alt="Website setting photo">
                                      @elseif($item->type === 'link')
                                        <a href="{{ $item->value }}" target="_blank" rel="noopener noreferrer">Open</a>
                                      @else
                                        {{ $item->value }}
                                      @endif
                                    </td>
                                    <td>
                                      <a class="btn btn-sm btn-info" href="{{ route('super.websitesetting.edit', $item->id) }}">Edit</a>
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
@endsection

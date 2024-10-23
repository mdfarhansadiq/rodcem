@extends('layouts.super')

@section('content')
 <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <h4 class="font-weight-bold mb-0 text-uppercase">News list</h4>
            </div>
            <div>
                <a href="{{ route('news.create') }}" class="btn btn-primary btn-icon-text btn-rounded">
                  <i class="ti-pluse"></i> Add New
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
                      <th>Title</th>
                      <th>Category</th>
                      <th>Author</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($news as $item)
                    <tr>
                      <td>
                        <img src="{{ asset('news/'.$item->image) }}" alt="Product photo">
                      </td>
                      <td>{{ $item->title}}</td>
                      <td>{{ $item->category->name}}</td>
                      <td>{{ $item->writer->name}}</td>
                      <td>
                        <form action="{{route('news.destroy',$item->id)}}" method="post">
                            <a class="btn btn-info" href="{{ route('news.edit', $item->id) }}">Edit</a>
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

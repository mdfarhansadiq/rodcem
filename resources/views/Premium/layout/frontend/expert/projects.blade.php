@extends('Premium.layout.frontend.expert.expert')
@section('title')
    {{config('app.name')}} |  {{auth('expert')->user()->name}} | Projects
@endsection
@section('projects')
    active
@endsection
@section('user-content')
<div class="dashboard-right-sidebar">
    <div class="dashboard-home">
        <div class="title d-flex justify-content-between">
            <div>
                <h2>All Projects</h2>
                <span class="title-leaf">
                    <svg class="icon-width bg-gray">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                    </svg>
                </span>
            </div>
            <div>
                <button type="submit" data-bs-toggle="modal" data-bs-target="#add_project" class="btn theme-bg-color btn-sm text-light">Add new</button>
                @push('all_models')
                    <form action="{{route('expert.projects.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="modal fade theme-modal" id="add_project" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Add Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-4">
                                            <div class="col-xxl-4">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="text" name="title" class="form-control" placeholder="title" value="{{old('title')}}" required>
                                                    <label for="title">Title</label>
                                                </div>
                                            </div>
                                            <div class="col-xxl-4">
                                                <div class="form-floating theme-form-floating">
                                                    <textarea name="description" class="form-control" placeholder="Descripiton"  rows="10" required>{{old('description')}}</textarea>
                                                    <label for="about">Descripiton</label>
                                                    @error('about') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="col-xxl-4">
                                                <div class="form-floating theme-form-floating">
                                                    <input type="file" name="image" class="form-control" required>
                                                    <label for="email">Profile Photo <span class="text-danger "> (Recommended Size 192 X 161 PX)</span></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn theme-bg-color text-light">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endpush
            </div>
        </div>

        <div class="table-responsive">
            <table class="table order-table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($experts as $item )
                        <tr>
                            <td class="product-image">
                                <img width="30" src="{{asset('expert/portfolio/'.$item->image)}}" alt="">
                            </td>
                            <td>
                                <h6 style="-webkit-line-clamp: 1">{{$item->title}}</h6>
                            </td>
                            <td>
                                <label class="danger"><a href="{{route('expert.projects.destroy',$item->id)}}">Delete</a></label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@endsection

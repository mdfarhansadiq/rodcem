@extends('layouts.super')

@section('content')
<div class="main-panel">
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="font-weight-bold mb-0 text-uppercase">Agent Subscription Setting</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded" data-toggle="modal" data-target="#subscription_create">
                        <i class="ti-plus"></i>Add New
                    </button>
                </div>
                @push('all_models')
                <form class="forms-sample" action="{{route('super.subscription.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                    <div class="modal fade" id="subscription_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Create New Subscription</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-10 mx-auto grid-margin stretch-card">
                                    <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-uppercase"></h4>
                                        <div class="form-group">
                                        </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Subscription Type</label>
                                                <select name="subscription_type" class="form-control" required>
                                                    @foreach (subscription_type() as $subscription )
                                                        <option value="{{$subscription->id}}">{{$subscription->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('subscription_type')<div class="text-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Subscription Duration</label>
                                                <input type="number" class="form-control"  name="duration" value="1" required>
                                                @error('duration')<div class="text-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect3">Suffix</label>
                                                <select class="form-control form-control-sm" name="suffix" required>
                                                    <option value="month">Month</option>
                                                    <option value="year">Year</option>
                                                </select>
                                                @error('suffix')<div class="text-danger">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Subscripion Fee</label>
                                                <input type="number" class="form-control"  name="subscription_fee" required>
                                                @error('subscription_fee')<div class="text-danger">{{$message}}</div> @enderror
                                            </div>
                                            {{-- <button type="submit" class="btn btn-primary mr-2">Submit</button>                                        --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                @endpush
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Agents Subscription List</p>
                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Duration</th>
                            <th>Fee</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscriptions as $subscription )
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$subscription->subscriptionType->name}}</td>
                                <td>{{$subscription->duration}} <span class="text-capitalize">{{$subscription->suffix}}</span></td>
                                <td>{{$subscription->subscription_fee}}</td>
                                <td>
                                    {{-- <a><span class="badge bg-info p-2">View</span></a> --}}
                                    {{-- Edit Subscription  --}}
                                    <span class="badge bg-primary p-2" data-toggle="modal" data-target="#edit_{{$subscription->id}}">Edit</span>
                                    @push('all_models')
                                    <form class="forms-sample" action="{{route('super.subscription.update',$subscription->id)}}" method="post">
                                     @csrf
                                        <div class="modal fade" id="edit_{{$subscription->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Subscription</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-10 mx-auto grid-margin stretch-card">
                                                        <div class="card">
                                                        <div class="card-body">
                                                            <h4 class="card-title text-uppercase"></h4>
                                                            <div class="form-group">
                                                            </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Subscription Type</label>
                                                                    <select name="subscription_type" class="form-control" required>
                                                                        @foreach (subscription_type() as $item )
                                                                            <option value="{{$item->id}}" {{$item->id == $subscription->subscription_type ? 'selected' : ''}}>{{$item->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('subscription_type')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Subscription Duration</label>
                                                                    <input type="number" class="form-control"  name="duration" value="{{$subscription->duration}}" required>
                                                                    @error('duration')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect3">Suffix</label>
                                                                    <select class="form-control form-control-sm" name="suffix" required>
                                                                        <option value="month" {{$subscription->suffix == 'month' ? 'selected' : ''}}>Month</option>
                                                                        <option value="year" {{$subscription->suffix == 'year' ? 'selected' : ''}}>Year</option>
                                                                    </select>
                                                                    @error('suffix')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputUsername1">Subscripion Fee</label>
                                                                    <input type="number" class="form-control"  name="subscription_fee" value="{{$subscription->subscription_fee}}" required>
                                                                    @error('subscription_fee')<div class="text-danger">{{$message}}</div> @enderror
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endpush
                                    {{-- Delete subscription  --}}
                                    <span class="badge bg-danger p-2" data-toggle="modal" data-target="#delete_{{$subscription->id}}">Delete</span>
                                    @push('all_models')
                                    <div class="modal fade" id="delete_{{$subscription->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          </div>
                                          <div class="modal-body text-center">
                                            <h2 class="text-danger">Are You Sure?</h2>
                                            <p>Your Won't able to retrive this.</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                            <a href="{{route('super.subscription.delete',$subscription->id)}}" class="btn btn-danger">Submit</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    @endpush
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
@section('custom_js')

@endsection

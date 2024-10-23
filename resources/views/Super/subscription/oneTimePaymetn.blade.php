@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">One Time Payment Setting</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">One Time Payment</h4>
                    <form action="{{route('one.time.paymnet.setting.update')}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputUsername1">Subscription Duration in Month<span class="text-danger"></span></label>
                        <input type="number" class="form-control"  value="{{$item->subscription_duration ?? ''}}"  name="subscription_duration" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Amount<span class="text-danger"></span></label>
                        <input type="number" class="form-control"  value="{{$item->amount ?? ''}}"  name="amount" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Status<span class="text-danger"></span></label>
                        <select name="status" class="form-control" id="">
                            <option value="1" {{$item && $item->status == 1 ? 'selected' : ''}}>Active</option>
                            <option value="0" {{$item && $item->status == 0 ? 'selected' : ''}}>Deactive</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                 </div>
                </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection


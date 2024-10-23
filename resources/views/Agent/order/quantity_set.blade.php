@extends('layouts.agent')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">RoyalUI Dashboard</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div>
              </div>
            </div>
          </div>

          <div class="row">            
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Set products quantities</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tbody>
                        <form action="{{ url('/agent/order/set-products-quantities') }}" method="post">
                          @csrf
                          @foreach($data as $item)
                          <tr>
                            <th>{{ $item->product->name }} ({{ $item->product->unit->symbol }})</th>
                            <td>
                              <input type="number" name="{{ $item->id }}" value="{{ $item->quantity }}" step="0.001" min="0.001" class="form-control" placeholder="Enter quantity">
                            </td>
                          </tr>
                          @endforeach
                          <tr>
                            <th></th>
                            <td>
                              <button type="submit" class="btn btn-sm btn-success">Save</button>
                            </td>
                          </tr>
                        </form>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href="https://www.bootstrapdash.com/" target="_blank"> Bootstrap dashboard </a> templates</span>
          </div>
        </footer>
        <!-- partial -->
@endsection
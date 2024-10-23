@extends('layouts.company')

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
                  <p class="card-title mb-0">proposal Details</p>

                  <!-- Button trigger modal -->
                  <button type="button"  class="btn btn-success text-white my-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Make Proposal
                  </button>



                  <div>
                    <h6 class="my-3">proposal Name: {{$proposal->title}}</h6>
                    <h6 class="my-1">proposal Description:</h6>
                    <p class="my-1">{{$proposal->des}}</p>

                    <h6 class="my-1">proposal Note:</h6>
                    <p class="my-1">{{$proposal->note}}</p>
                    <h6 class="my-4">proposal Status: {{$proposal->status}}</h6>
                    <h6 class="my-3">proposal Agent Name: </h6>
                    <h6 class="my-3">proposal Image</h6>
                    <h6 class="my-3"> <img src="{{asset('/storage/proposal/' . $proposal->image) }}" style="width:400px; bproposal-radius:4%;" alt="image"/></h6>

                  </div>



                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Proposal Response</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{route('proposals.update', $proposal->id)}}" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                  <div class="form-group mb-2">
                    <label for="salary">Select</label>
                    <select  name="status" class="form-control">
                      
                      <option value="1">Accept</option>
                      <option value="2">Cancel</option>
                      
                    </select>
                  </div>

                  <div class="form-group mb-2">
                    <label for="name">Image</label>
                    <input type="file" class="form-control" name="image" >
                  </div>

                  <div class="form-group mb-2">
                    <label for="about">Price</label>
                    <textarea  class="form-control" name="price" rows="3" placeholder="Product Description"></textarea>
                  </div>

                  <div class="form-group mb-2">
                    <label for="about">Proposal Note</label>
                    <textarea  class="form-control" name="note" rows="2" placeholder="Proposal Note"> {{$proposal->note}}</textarea>
                  </div>

                  <button type="submit" class="btn btn-success text-white">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button"  class="btn btn-secondary text-white" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary text-white">Understood</button>
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
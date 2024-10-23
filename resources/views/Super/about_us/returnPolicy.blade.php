@extends('layouts.super')
@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 text-uppercase">Return</h4>
                    </div>
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-10 mx-auto grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-uppercase">Return</h4>
                    <form action="{{route('super.privacy.refund.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea name="return" id="editor" >{!!policys()->return ?? ''!!}</textarea>
                        </div>
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
@section('custom_js')
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
              .create( document.querySelector( '#editor' ),{
                ckfinder: {
                    uploadUrl: '{{route('image.upload').'?_token='.csrf_token()}}',
        }
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection

@extends('layouts.super')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0 text-uppercase">All Contact</h4>
                </div>
                <div>
                    {{-- <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button> --}}
                </div>
              </div>
            </div>
          </div>
         

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Contact List</p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>SL</th>
                          <th>Name</th>
                          <th>E-mail</th>
                          <th>Phone Number</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                          <td>{{$loop->index+1}}</td>
                          <td>{{$contact->name}}</td>
                          <td>
                            <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                          </td>
                          <td>
                            <a href="tel:{{$contact->phone_number}}">{{$contact->phone_number}}</a>
                          </td>
                          <td>                            
                            @if($contact->status == 0)
                                <div class="badge rounded-pill unread_{{$contact->id}} bg-danger">unread</div>
                            @elseif($contact->status == 1)
                                <div class="badge rounded-pill bg-primary">read</div>
                            @else
                                <div class="badge rounded-pill bg-success">Replied</div>
                            @endif
                          </td>
                          <td>

                             <a class="badge bg-primary rounded-pill view_message" data-id="{{$contact->id}}" data-toggle="modal" data-target="#contact_message_{{$contact->id}}">view</a>                                                                                                    
                              @push('all_models')
                                  <div class="modal fade" id="contact_message_{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered 	modal-lg" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Seen Message</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          </div>
                                          <div class="modal-body">
                                              {{$contact->message}}
                                          </div>
                                          <div class="modal-footer">
                                          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                      </div>
                                  </div>
                              @endpush

                              <div class="badge bg-success rounded-pill" data-toggle="modal" data-target="#reply_{{$contact->id}}">repley</div>
                              @push('all_models')
                              <form action="{{route('super.contact.reply',$contact->id)}}" method="post">
                                @csrf
                                <div class="modal fade" id="reply_{{$contact->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered 	modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Reply Message</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">                                            
                                            <h6>Message</h6>
                                            <p>{{$contact->message}}</p>
                                            <h6>Reply</h6>
                                            <div class="form-group">
                                              <label for="exampleTextarea1">Write Your Reply</label>
                                              <textarea name="reply_message" class="form-control" id="exampleTextarea1" placeholder="Wrire Here..." rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                              </form>
                              @endpush
                              <a href="{{route('super.contact.delete',$contact->id)}}" class="badge bg-danger rounded-pill">Delete</a>
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
        <!-- content-wrapper ends -->
@endsection
@section('custom_js')
    <script>
        $(function(){
            $('.view_message').click(function(){
                var contact_id =  $(this).attr('data-id');

                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                  $.ajax({
                    type  : 'get',
                    url   : '{{route("super.contact.status")}}',
                    data  : {'id' : contact_id},
                    success:function(response){
                        $('.unread_'+response.id).removeClass('bg-danger').addClass('bg-primary').text('read');
                    }
                });

            });
        });
    </script>
@endsection
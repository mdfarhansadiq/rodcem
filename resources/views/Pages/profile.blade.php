@extends('layouts.front')
@section('page_title')
    Profile
@endsection
@section('content')
<div class="page-wrapper">

  <!-- Banner Start -->
  <div class="page-banner" style="background-image:url({{ asset('Frontend/') }}uploads/team-member-banner-2.jpg);">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner-text">
            <h1>Team Member: Rakib Abdullah</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner End -->


  <!-- Team Member Start -->
  <section class="team-member-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="team-member-single">
            <div class="thumb">
              <img src="{{ asset('Frontend/uploads/team-member-2.jpg') }}" alt="Rakib Abdullah">
            </div>
            <div class="text">
              <h2>Brent Grundy</h2>
              <h3>Founder</h3>
              <p>
                Master in Business Administration </p>
              <button class="btn btn-success my-2">Accept</button>
            </div>

            <div class="social">
              <div class="title">
                Social Media Activities
              </div>
              <ul>
                <li><a href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>

                <li><a href="http://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></li>

                <li><a href="http://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></li>




              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-8">

          <!-- Team Member Detail Tab Start -->
          <div class="team-member-detail-tab">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab" aria-expanded="true">About</a></li>
              <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">Contact</a></li>
            </ul>

            <!-- Tab Content Start -->
            <div class="tab-content">
              <div class="tab-pane fade active in" id="tab1">
                <div class="row">
                  <div class="col-md-12">
                    <div class="content">
                      <p>Lorem ipsum dolor sit amet, habeo albucius cum ei, sit ex sint viderer conceptam. Qui an error
                        animal qualisque, id ius choro nusquam consectetuer, mel hinc nonumes inciderint in. Eam an
                        dolorem partiendo, no his maiestatis expetendis. Ex nominavi eloquentiam cum, at vix tota dicam,
                        has eu dicunt molestie interpretaris. Per choro clita possit ei, sed an posse ridens, duo mazim
                        admodum eu. In nam explicari iracundia.</p>

                      <p>Has te consul ignota vocent. Quod brute disputationi ei vim, his invidunt omittantur te. Mucius
                        aperiri concludaturque sed ut. Ius te quot latine vulputate. Ne his malis nonumy utroque.</p>

                      <p>Sonet malorum invidunt nec cu, nibh possim ad duo. Eros populo euripidis ne pro, his eu
                        probatus splendide scriptorem. Idque mazim ad vix, novum antiopam sea ut, et vim dicam urbanitas
                        adversarium. Civibus temporibus disputationi id mei.</p>

                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="tab2">
                <div class="row">
                  <div class="col-md-12">
                    <div class="content">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="contact">
                            <div class="icon"><i class="fa fa-map-o"></i></div>
                            <div class="text">
                              <h4>Address</h4>
                              <p>
                                588 Philadelphia Avenue
                                Salt Lake City, UT 84116 </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="contact">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <div class="text">
                              <h4>Phone</h4>
                              <p>
                                111-222-3333 </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="contact">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <div class="text">
                              <h4>Email</h4>
                              <p>
                                doctor@yourwebsite.com </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="contact">
                            <div class="icon"><i class="fa fa-globe"></i></div>
                            <div class="text">
                              <h4>Website</h4>
                              <p>
                                http://www.abc.com </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="contact">
                            <div class="icon"><i class="fa fa-file"></i></div>
                            <div class="text ">
                              <a href="#" class="btn btn-success btn-sm " style="margin-top: 10px; width: 95px;"><input
                                  type="file"></a>


                              <a type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                data-target="#exampleModalCenter" style="margin-top: 10px;">Details</a>

                            </div>
                          </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                  <h2>Input your project details</h2>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group">
                                  <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
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
            <!-- Tab Content End -->
          </div>
          <!-- Team Member Detail Tab End -->

        </div>
      </div>
    </div>
  </section>
  <!-- Team Member End -->


</div>
@endsection

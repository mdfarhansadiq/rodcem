@extends('Premium.layout.frontend.user.user')
@section('title')
    {{config('app.name')}} |  {{auth()->user()->name}} | Location
@endsection
@section('location')
    active
@endsection
@section('user-content')
@section('custom_css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('premium/assets/select2/select2.css')}}">
@endsection
<div class="dashboard-right-sidebar">
    <div class="dashboard-home">
        <div class="title">
            <h2>Your Location</h2>
            <span class="title-leaf">
                <svg class="icon-width bg-gray">
                    <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                </svg>
            </span>
        </div>
        @php

        @endphp
        <form action="{{route('user.location.update')}}" method="post">
            @csrf
            <div class="row g-4">
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <select class="form-select" name="division" id="divsision" aria-label="Floating label select example">
                            <option selected="">Choose Your Division</option>
                            @foreach (division() as $item )
                                @if (user_location(auth()->id()))
                                    <option value="{{$item->id}}" {{($item->id == user_location(auth()->id())->division_id) ? 'selected' : ''}}>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">Division</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <select name="district" class="form-select" id="district" aria-label="Floating label select example">
                            <option selected="">Choose Your District</option>
                                @foreach (district() as $item )
                                    @if (user_location(auth()->id()))
                                        <option value="{{$item->id}}" {{($item->id == user_location(auth()->id())->district_id) ? 'selected' : ''}}>{{$item->name}}</option>
                                    @else
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                     @endif
                                @endforeach
                        </select>
                        <label for="floatingSelect">District</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <select name="upazila" class="form-select" id="upazila" aria-label="Floating label select example">
                            <option selected="">Choose Your Upazila</option>
                            @foreach (upazila() as $item ).
                                @if (user_location(auth()->id()))
                                    <option value="{{$item->id}}" {{($item->id == user_location(auth()->id())->upazila_id) ? 'selected' : ''}}>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">Upazila</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <div class="form-floating theme-form-floating">
                        <select class="form-select" name="union" id="union" aria-label="Floating label select example">
                            <option selected="">Choose Your Union</option>
                            @foreach (union() as $item )
                                @if (user_location(auth()->id()))
                                    <option value="{{$item->id}}" {{($item->id == user_location(auth()->id())->union_id) ? 'selected' : ''}}>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="floatingSelect">Union</label>
                    </div>
                </div>
                <div class="col-xxl-4">
                    <button type="submit" class="btn theme-bg-color text-light">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('custom_js')
    <script>
        $(function(){
            // All Divisions
            $('#divsision').change(function(){
                var division_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.district')}}",
                    data   : {'division_id' : division_id},
                    success:function(response){
                      $('#district').html(response.html);
                      $('#upazila').html(response.district_upazilas);
                      $('#union').html(response.upazilas_union);
                    },
                });
            });

            // All upazilas
            $('#district').change(function(){
                var district_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.upazila')}}",
                    data   : {'district_id' : district_id},
                    success:function(response){
                      $('#upazila').html(response.html);
                    },
                });
            });

              // All unions
                $('#upazila').change(function(){
                var upazila_id = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type   : 'get',
                    url    : "{{route('all.union')}}",
                    data   : {'upazila_id' : upazila_id},
                    success:function(response){
                      $('#union').html(response.html);
                    },
                });
            });
        });
    </script>
@endsection

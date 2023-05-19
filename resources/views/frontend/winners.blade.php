@extends('frontend.master')
@section('content')
   
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <h2 class="text-center">Our Winner's</h2>
                <div class="card">
                    <div class="card-body">
                        @foreach($status as $statuswinnern)
                            <div class="col-4 pull-left myproducts">
                                @foreach($checkproduct as $statuswinner)
                                    <img src="{{ url('upload/'.$statuswinner->photo) }}" alt="image" style="height:250px;">
                                    &nbsp;<h5 class="name" style="margin-top: 11px;">{{ $statuswinner['name'] }}</h5>
                                @endforeach
                                <h4> Happy Customer -- {{ $statuswinnern['first_name'] }} {{ $statuswinnern['last_name'] }} </h4>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- three_box section -->
    <div class="three_box">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gift_box">
                <i><img src="{{ asset('frontend/images/icon_mony.png')}}"></i>
                <span>Make Money From Money</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gift_box">
                <i><img src="{{ asset('frontend/images/icon_gift.png')}}"></i>
                <span>Special Gift</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gift_box">
                <i><img src="{{ asset('frontend/images/icon_car.png')}}"></i>
                <span>Small Investment - Big Rewards</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end three_box section -->

@endsection
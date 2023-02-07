@extends('frontend.master')
@section('content')
   
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <h2 class="text-center">Our Products</h2>
                <div class="card">
                    <div class="card-body">
                        @foreach($products as $product)
                            <div class="col-4 pull-left myproducts">
                                <img src="{{ url('upload/'.$product->photo) }}" alt="image" style="height:250px;">
                                <h4> {{ $product->name }} </h4>
                                <a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-sm btn-outline--base">Place Bid</a>
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
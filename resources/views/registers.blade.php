@extends('frontend.master')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Phone no.') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="contact" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="aadhar_card" class="col-md-4 col-form-label text-md-end">{{ __('Pan Card') }}</label>

                            <div class="col-md-6">
                                <input id="aadhar_card" type="aadhar_card" class="form-control @error('pan_card') is-invalid @enderror" name="pan_card" value="{{ old('pan_card') }}" required autocomplete="pan_card">

                                @error('pan_card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="aadhar_card" class="col-md-4 col-form-label text-md-end">{{ __('Aadhar No.') }}</label>

                            <div class="col-md-6">
                                <input id="aadhar_card" type="aadhar_card" class="form-control @error('aadhar_card') is-invalid @enderror" name="aadhar_card" value="{{ old('aadhar_card') }}" required autocomplete="aadhar_card">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Suponser ID') }}</label>

                            <div class="col-md-6">
                                <input id="suponser_id" type="text" class="form-control @error('suponser_id') is-invalid @enderror" name="suponser_id" value="@if(!empty($data)){{$data}}@endif" autocomplete="suponser_id" autofocus>

                                @error('suponser_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <input id="password" value="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="default_password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
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

@extends('admin.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-top: 20px;">
                <div class="card-body">
                    <h4 class="card-title">
                            <h4 style="font-size: 20px; font-weight: 400;">Change Password</h4>
                            <hr>
                        </h4>
                    <form method="POST" action="{{ route('profile.change.password') }}">
                        @csrf
                        @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                    @endif
                     @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-md-12">Existing Password</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                        placeholder="">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-md-12">New Password</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                        placeholder="">
                                <input type="hidden" name="default_password" value="" class="form-control @error('password') is-invalid @enderror" required
                                        placeholder="">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password" class="col-md-12">Confirm New Password</label>
                                <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" id="formSubmit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
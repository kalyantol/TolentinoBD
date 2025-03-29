@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Password') }}</div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif



                    <form action="{{ route('change.password.page') }}" method="post">
                        @csrf

                        <div>
                        <label>{{ __('Old Password') }}</label><br>   
                        <input class="form-control @error('current_password') is-invalid @enderror" type="password" name="current_password" placeholder="Current Password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div>
                        <label>{{ __('New Password') }}</label><br>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="New Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div>
                        <label>{{ __('Confirm Password') }}</label><br>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>



                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

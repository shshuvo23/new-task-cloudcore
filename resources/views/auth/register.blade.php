
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="" style="width:28rem; margin:0 auto">
                <div class="card border rounded-lg">
                    <div class="card-header py-3 text-center bg-secondary text-white">
                        <h4 class="m-0">{{ __('Create Your Account') }}</h4>
                    </div>
                    <div class="card-body p-3">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <div class="input-group">
                                    
                                    <input id="name" type="text" class="form-control shadow-none @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="input-group"> 
                                    <input id="email" type="email" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <div class="input-group"> 
                                    <input id="password" type="password" class="form-control shadow-none @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <div class="input-group"> 
                                    <input id="password-confirm" type="password" class="form-control shadow-none" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
 


 
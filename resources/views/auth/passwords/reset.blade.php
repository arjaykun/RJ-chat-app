@extends('auth.auth_layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw">

    <form method="POST" action="{{ route('password.reset') }}" class="border bg-white rounded px-4 py-2 my-container text-secondary shadow"> 
        @csrf

        <div class="d-flex justify-content-between align-items-center">
            <h4 class="font-weight-bold text-primary pt-4 pb-3">
               <a href="/">RJ Chat APP</a>
            </h4>  
        </div>
        
        <div class="py-2">
            <h4 class="font-weight-bold">Reset Your Password</h4>
            <p>
               Enter your new password.
            </p>
        </div>

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">

            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="form-control rounded" name="password_confirmation" required autocomplete="new-password">

        </div>

     
        <button type="submit" class="btn btn-secondary btn-block rounded">
            {{ __('Reset Password') }}
        </button>

        <div class="py-3"></div>
           
    </form>
             
</div>
@endsection

@extends('auth.auth_layout')

@section('content')
 
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw">

    <form method="POST" action="{{ route('login') }}" class="border bg-white rounded px-4 py-2 my-container text-secondary shadow"> 
        @csrf
        
        <h4 class="font-weight-bold text-primary pt-4 pb-3">
           <a href="/">RJ Chat APP</a>
        </h4>
        
        <div class="py-2">
            <h4 class="font-weight-bold">Welcome Chatter!</h4>
            <p>
                Enter your credentials to login.
            </p>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>

            <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
       
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                <label class="custom-control-label" for="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember Me
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-secondary btn-block rounded">
          Login
        </button>

        <hr>

         <a href="" class="btn btn-primary btn-block rounded">
          <i class="fab fa-facebook"> </i> 
          Login w/ Facebook
        </a>

         <a href="/login/google" class="btn btn-warning btn-block rounded">
          <i class="fab fa-google"> </i> 
          Login w/ Google
        </a>

        <div class="d-flex justify-content-between pt-4 pb-1">
            <a class="text-primary" href="{{ route('register') }}" >
                Create An Account
            </a>
             <a class="text-primary" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        </div>

       
    </form>

</div>


@endsection

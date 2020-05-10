@extends('auth.auth_layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw">

    <form method="POST" action="{{ route('register') }}" class="border bg-white rounded px-4 py-2 my-container text-secondary shadow"> 
        @csrf
        
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="font-weight-bold text-primary pt-4 pb-3">
               <a href="/">RJ Chat APP</a>
            </h4>
            <a href="/login" class="text-primary font-weight-bold">
                <u>Back to login</u>
            </a>            
        </div>
        
        <div class="py-2">
            <h4 class="font-weight-bold">Create an account with us!</h4>
            <p>
               Enter your details to start chatting.
            </p>
        </div>

        <div class="form-group">
            <label for="name">Name</label>

          
            <input id="name" type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" >E-mail</label>

            <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
       
            <input id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>

            <input id="password-confirm" type="password" class="form-control rounded" name="password_confirmation" required autocomplete="new-password">

        </div>

      
        <button type="submit" class="btn btn-secondary btn-block rounded">
            {{ __('Register') }}
        </button>

        <div class="py-3"></div>
           
    </form>
            
</div>
@endsection

@extends('auth.auth_layout')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; width: 100vw">

    <form method="POST" action="{{ route('password.email') }}" class="border bg-white rounded px-4 py-2 my-container text-secondary shadow"> 
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
            <h4 class="font-weight-bold">Forgot Your Password</h4>
            <p>
                Request a change password link that will be sent to your e-mail.
            </p>
        </div>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="form-group">
            <label for="email">E-mail Address</label>

            <input id="email" type="email" class="form-control rounded @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-secondary btn-block rounded">
            Submit Request
        </button>

        <div class="py-3"></div>
        
    </form>
               
</div>
@endsection

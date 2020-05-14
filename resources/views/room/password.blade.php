@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">

    <form method="POST" action="{{ route('rooms.confirm', ['room' => $room->id]) }}" class="border bg-white rounded px-4 py-2 my-container text-secondary shadow" style="width: 430px"> 
        @csrf

        <div class="d-flex justify-content-between align-items-center">
            <h5 class="font-weight-bold text-primary pt-4 pb-3">
               {{ $room->name }}
            </h5>
            <a href="/home" class="text-primary font-weight-bold">
                <u>Rooms</u>
            </a>            
        </div>

         <div class="py-2">
            <h4 class="font-weight-bold">Confirm Room Password</h4>
            <p>
            	Enter correct password to proceed!
            </p>
        </div>
    

        <div class="form-group">
            <label for="password">Password</label>

            <input id="password" type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Room password">

         
            @if(session('wrong_password'))
                <span class="text-danger font-weight-bold">
                    <small>{{ session('wrong_password') }}</small>
                </span>
            @endif
                
        </div>

        <button type="submit" class="btn btn-primary btn-block rounded">
            Proceed
        </button>

        <div class="py-3"></div>
        
    </form>
               
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">

    <form method="POST" action="{{ route('rooms.store') }}" class="border bg-white rounded px-4 py-2 my-container text-secondary shadow" style="width: 430px"> 
        @csrf

        <div class="d-flex justify-content-between align-items-center">
            <h4 class="font-weight-bold text-primary pt-4 pb-3">
               <a href="/">RJ Chat APP</a>
            </h4>
            <a href="/home" class="text-primary font-weight-bold">
                <u>Rooms</u>
            </a>            
        </div>

         <div class="py-2">
            <h4 class="font-weight-bold">Add New Room</h4>
            <p>
            	Create a place for your friends to chat in and have fun.
            </p>
        </div>

        <div class="form-group">
            <label for="name">Room Name</label>

            <input id="name" type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus placeholder="Room name">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <input id="password" type="text" class="form-control rounded @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Room password">

            <i><small>Leave password blank to make room public ( w/o password ).</small></i>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-block rounded">
            Add
        </button>

        <div class="py-3"></div>
        
    </form>
               
</div>
@endsection

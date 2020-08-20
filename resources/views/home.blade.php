@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">

    <div class="border bg-white rounded px-4 py-2 my-container text-secondary shadow" style="width: 430px"> 

        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <h4 class="font-weight-bold text-primary pt-4 pb-3">
               <a href="/">Chat Rooms</a>
            </h4>

            <a href="{{ route('rooms.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"> </i> Add New Room</a>   
        </div>

        <div class="py-1">
            <form method="get">
                  {{-- @csrf --}}
                <div class="form-group">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search room here..." aria-label="Search room here..." aria-describedby="search room" name="search">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                      </div>
                    </div>
                </div>
      
            </form>
        </div>

        <ul class="list-group">
            @forelse ($rooms as $room)                
                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center flex-wrap">
                    <span>
                        {{ $room->name }} 
                        <small class="text-light badge badge-pill badge-dark">( {{ $room->messages_count }} msgs. ) </small>
                    </span>
                    <a href="{{ route('rooms.show', ['room' => $room->id]) }}" class="btn btn-sm btn-primary rounded-circle px-2"><i class="fas fa-angle-right"></i></a>
                </li>
                @empty
                <h5 class="text-center bg-secondary py-5 text-white rounded">No Room found</h5>
            @endforelse
        </ul>

        <hr>

        <h5 class="text-center">
            Chat at your own risk! >:D
        </h5>

        <hr>
        
    <div> 
               
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                    <h5 class="text-light font-weight-bold">Rooms</h5>
                    <button class="btn btn-success btn-sm">Add New Room</button>
                </div>

                <div class="card-body">
                    
                    <ul class="list-group">
                        @forelse ($rooms as $room)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>{{ $room->name }} ( {{ $room->id }} ) </div>
                                <a href="{{ route('rooms.show', ['room' => $room]) }}" class="btn btn-primary btn-sm rounded">
                                    Join
                                </a>
                            </li>
                        @empty
                            <div class="alert alert-warning">No Room Available</div>
                        @endforelse
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

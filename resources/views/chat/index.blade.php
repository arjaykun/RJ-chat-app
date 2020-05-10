@extends('layouts.app')


@section('content')
	<chat-box :user="{{ auth()->user() }}" :room="{{ $room }}"></chat-box>
@endsection
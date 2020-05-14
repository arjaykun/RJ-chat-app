<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{

	 public function __construct() {
	 	
	 	$this->middleware('auth');

	 }
   public function index() {

      $search = request()->query('search');

      if($search) {
         $rooms = Room::where('name', 'like', "%{$search}%")
                        ->withCount('messages')
                        ->get();
      } else {
         $rooms = Room::withCount('messages')->get();
      }

   	return view('home', ['rooms' => $rooms]);
   }

   public function create() {
      return view('room.create');
   }

   public function store(Request $request) {
   	$data = $request->validate([
         'name' => 'required|max:30',
         'password' => 'nullable|min:3'
      ]);

      $room = Room::create($data);

      return redirect()->route('rooms.show', ['room' => $room->id]);
   }

   public function show(Request $request, Room $room) {
      $request->session()->forget("room_password_{$room->id}");
   	return view('chat.index', ['room' => $room]);
   }

   public function password(Room $room) {
      if($room->password)
         return view('room.password', ['room' => $room]);

      return redirect('/home');
   }

   public function confirm(Request $request, Room $room) {
      if($room->password === $request->password) {
         $request->session()->put("room_password_{$room->id}", 1);

         return redirect()->route('rooms.show', ['room' => $room->id]);
      } 

      $request->session()->flash('wrong_password', 'You have entered wrong password.');

      return back();
   }
}

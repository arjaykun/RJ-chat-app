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
         'name' => 'required|min:30',
         'password' => 'nullable|min:3'
      ]);

      $room = Room::create($data);

      return redirect()->route('rooms.show', ['room' => $room->id]);
   }

   public function show(Room $room) {

   	return view('chat.index', ['room' => $room]);
   }
}

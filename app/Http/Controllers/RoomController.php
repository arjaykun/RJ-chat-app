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
   	$rooms = Room::all();

   	return view('home', ['rooms' => $rooms]);
   }

   public function create() {

   }

   public function store() {
   	
   }

   public function show(Room $room) {

   	return view('chat.index', ['room' => $room]);
   }
}

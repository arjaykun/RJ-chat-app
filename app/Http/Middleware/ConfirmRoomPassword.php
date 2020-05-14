<?php

namespace App\Http\Middleware;

use Closure;

class ConfirmRoomPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $room = $request->room;
        if($room->password) {
            if(!$request->session()->has("room_password_{$room->id}"))
                return redirect()->route('rooms.password', ['room' => $room->id]);
        }
        return $next($request);
    }
}

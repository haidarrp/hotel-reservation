<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //

    public function index(){
        return view('pages/rooms/rooms',[
            "title" => "Rooms",
            'active' => 'rooms',
            "rooms" => Room::all()
        ]);
    }

    public function create(){
        return view('pages/rooms/createroom',[
            "title" => "Create Room",
            'active' => 'rooms'
        ]);
    }

    public function edit($room_number){
        $room = Room::where('room_number', $room_number)->firstOrFail();
        return view('pages/rooms/updateroom',[
            "title" => "Update Room",
            'active' => 'rooms',
            'room' => $room
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'room_number' => 'required|unique:rooms|max:4',
            'price' => 'required',
            'type' => 'required',
            'room_area' => 'required|max:2',
            'floor' => 'required|max:3'
        ]);

        Room::create($validatedData);

        $request->session()->flash('success', 'Add Room Successfull!');

        return redirect('/rooms/create');
    }

    public function delete(Request $request){
        $validatedData = $request->validate([
            'room_number' => 'required'
        ]);

        $room = Room::where('room_number', $validatedData['room_number'])->delete();
        
        $request->session()->flash('success', 'Delete Room Successfully');
        
        return redirect('/rooms');
    }

    public function update(Request $request, $room_number){
        $validatedData = $request->validate([
            'room_number' => 'required|max:4',
            'price' => 'required',
            'type' => 'required',
            'room_area' => 'required|max:2',
            'floor' => 'required|max:3'
        ]);

        $updatedRoom = Room::where('room_number', $room_number)
            ->update($validatedData);

        $request->session()->flash('success', 'Add Room Successfull!');

        return redirect('/rooms/update/'.$validatedData['room_number']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ballroom;
use Illuminate\Http\Request;

class BallroomController extends Controller
{
    //
    public function index(){
        return view('pages/ballrooms/ballroom',[
            "title" => "Ballroom",
            'active' => 'ballrooms',
            "ballrooms" => Ballroom::all()
        ]);
    }
    public function create(){
        return view('pages/rooms/createballroom',[
            "title" => "Create Ballroom",
            'active' => 'ballrooms'
        ]);
    }

}

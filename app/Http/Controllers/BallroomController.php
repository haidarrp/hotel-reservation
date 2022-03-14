<?php

namespace App\Http\Controllers;

use App\Models\Ballroom;
use Illuminate\Http\Request;

class BallroomController extends Controller
{
    //
    public function index(){
        return view('pages/ballroom',[
            "title" => "Ballroom",
            'active' => 'ballrooms',
            "ballrooms" => Ballroom::all()
        ]);
    }
}

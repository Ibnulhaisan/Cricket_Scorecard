<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function team(){
        return view('team');
    }


    public function teamInformation(Request $request){

        $team = new Team();
        $team->team_name=$request->input('team_name');
        $team->captain_name=$request->input('captain_name');
        $team->coach_name=$request->input('coach_name');
        $team->save();

    }
    public function back(){
        return view('dashboard');
    }
}

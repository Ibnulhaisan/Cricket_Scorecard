<?php

namespace App\Http\Controllers;

use App\Models\CricketMatch;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function matchId(){
        $team = Team::all();
        $teamx = Team::all();

        return view('match',['team'=>$team,'teamx'=>$teamx]);

    }
    public function matchInformation(Request $request){
        $match = new CricketMatch();
        $match->name=$request->input('name');
        $match->total_overs=$request->input('total_overs');
        $match->team_x_id=$request->input('team_x_id');
        $match->team_y_id=$request->input('team_y_id');
        $match->venue=$request->input('venue');
        $match->save();
        return "save";
    }


}

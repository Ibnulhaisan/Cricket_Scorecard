<?php

namespace App\Http\Controllers;

use App\Models\CricketMatch;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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
        return view('matchdatatable');
    }

    public function back(){
        return view('dashboard');
    }

    public function showlive($id)
    {
        $players = CricketMatch::with(['team_x.team_players', 'team_y.team_players'])->findOrFail($id);

        return view('showplayer', compact('players'));
    }


    public function matchdatatable(Request $request)
    {
        if ($request->ajax()) {
            $u = CricketMatch::query();

            return DataTables::of($u)
                ->addColumn('action', function ($admin) {
                    return '<a class="btn btn-danger">Delete</a>';
                })
                ->rawColumns(["action"])
                ->make(true);

        }
        return view('datatable');
    }


}

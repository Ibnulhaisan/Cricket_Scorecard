<?php

namespace App\Http\Controllers;

use App\Models\CricketMatch;
use App\Models\CricketScore;
use App\Models\Player;
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
        $request->validate([
            'name' => 'required',
            'total_overs' => 'required',
            'team_x_id' => 'required',
            'team_y_id' => 'required',
            'venue' => 'required',
        ]);
        $match = new CricketMatch();
        $match->name = $request->input('name');
        $match->total_overs=$request->input('total_overs');
        $match->team_x_id=$request->input('team_x_id');
        $match->team_y_id=$request->input('team_y_id');
        $match->venue=$request->input('venue');
        $match->save();
        return redirect()->route('matchdatatable');
    }
    public function back(){
        return view('dashboard');
    }
    public function showliveMatch($matchId)
    {
        $score = CricketScore::where('match_id', $matchId)->get();
        $runsByBatsman = $score->groupBy('batsman_id')->map(function ($group) {
            $batsman = Player::find($group[0]->batsman_id);
            $batsmanName = $batsman ? $batsman->player_name : 'Unknown Batsman';
            $totalRuns = $group->sum('run')+$group->sum('extra');
            $totalExtra = $group->sum('extra');
            $totalWicket = $group->sum('wicket');
            $totalBall = $group->sum('ball');

            $over = (int)($totalBall / 6);
            $ballInOver = $totalBall % 6;
            if ($totalRuns !== null) {
                $totalBall++;
                $ballInOver++;
                if ($ballInOver === 6) {
                    $over++;
                    $ballInOver = 0;
                }
            }
            return [
                'name' => $batsmanName,
                'runs' => $totalRuns,
                'extra' =>$totalExtra,
                'wicket' =>$totalWicket,
                'ball' =>$totalBall,
                'over' =>$over,
                'ballInOver' =>$ballInOver,
            ];
        });
        $runsByBowler = $score->groupBy('bowler_id')->map(function ($group) {
            $bowler = Player::find($group[0]->bowler_id);
            $bowlerName = $bowler ? $bowler->player_name : 'Unknown bowler';
            $totalRuns = $group->sum('run')+$group->sum('extra');
            $totalExtra = $group->sum('extra');
            $totalWicket = $group->sum('wicket');
            $totalBall = $group->sum('ball')+$group->sum('wicket');
            return [
                'name' => $bowlerName,
                'runs' => $totalRuns,
                'extra' =>$totalExtra,
                'wicket' =>$totalWicket,
                'ball' =>$totalBall,
            ];

        });


        $players = CricketMatch::with(['team_x.team_players', 'team_y.team_players'])->find($matchId);
        return view('showplayer',
            [
                'players' => $players,
                'matchId' => $matchId,
                'runsByBowler' => $runsByBowler,
                'runsByBatsman' => $runsByBatsman,
                'score' => $score
            ]);
    }
    public function matchdatatable(Request $request)
    {
        if ($request->ajax()) {
            $matches = CricketMatch::with('team_x', 'team_y')->get();
            return DataTables::of($matches)
                ->addColumn('team_x_name', function ($match) {
                    return $match->team_x->team_name;
                })
                ->addColumn('team_y_name', function ($match) {
                    return $match->team_y->team_name;
                })
                ->addColumn('actions',function ($row){
                   return "<a href=' ". route('live.match',$row->id)."' class='btn btn-sm btn-success px-2 mr-2'>Scoreboard</a>";
                })
                ->rawColumns(["actions"])
                ->make(true);
        }
        return view('matchdatatable');
    }



}

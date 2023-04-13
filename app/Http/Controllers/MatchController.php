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
        $match = new CricketMatch();
        $match->name = $request->input('name');
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

    public function showliveMatch($matchId)
    {

        $score = CricketScore::where('match_id', $matchId)->get();
        $runsByBatsman = $score->groupBy('batsman_id')->map(function ($group) {
            $batsman = Player::find($group[0]->batsman_id);
            $batsmanName = $batsman ? $batsman->player_name : 'Unknown Batsman';
            $totalRuns = $group->sum('run');
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
            $totalRuns = $group->sum('run');
            $totalExtra = $group->sum('extra');
            $totalWicket = $group->sum('wicket');
            $totalBall = $group->sum('ball');
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

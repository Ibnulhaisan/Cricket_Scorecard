<?php

namespace App\Http\Controllers;

use App\Models\CricketScore;
use Illuminate\Http\Request;

class ScoreController extends Controller
{

//    public function scoreinformation(Request $request)
//    {
//
//        $score = new CricketScore();
//        $score->runs = $request->input('button1');
////        $score->wickets = $request->input('button2');
////        $score->no_ball = $request->input('button3');
////        $score->wide_ball = $request->input('button4');
////        $score->extra_runs = $request->input('button5');
//
//        $score->save();
//        return "save";
//    }

    public function updateScore(Request $request)
    {

        $matchId = $request->matchId;
        $bowlerId = $request->bowler_id[0];
        $batsmanId = $request->batsman_id[0];
        $battingTeamId = $request->battingTeam_id;
        $bowlingTeamId = $request->bowlingTeam_id;
        $run = $request->run ? :null;
        $extra = $request->extra ? : null;
        $wicket = $request->wicket ?: null;
        $ball = 1 ;

        $score = new CricketScore();
        $score->match_id = $matchId;
        $score->bowlingTeam_id = $bowlingTeamId;
        $score->battingTeam_id = $battingTeamId;
        $score->bowler_id = $bowlerId;
        $score->batsman_id = $batsmanId;
        $score->run = $run;
        $score->extra = $extra;
        $score->wicket = $wicket;

        if ($run !== null) {
            $score->ball = $ball;
        } else {
            $score->ball = null;
        }


        $score->save();


        $message = '';
        if ($run !== null) {
            $message = 'Run added';
        } elseif ($extra !== null) {
            $message = 'Extra added';
        } elseif ($wicket !== null) {
            $message = 'Wicket added';
        } elseif ($ball !== null) {
            $message = 'Ball added';
        }

//        $oversMessage = $over . '.' . $ballInOver;
//        $message .= ', current overs: ' . $oversMessage;

        return redirect()->route('live.match', ['matchId' => $request->matchId])->withMessage($message);


//        return redirect('showplayer', ['id'=> $request->matchId]);
    }


}

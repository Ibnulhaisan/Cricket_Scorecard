<?php

namespace App\Http\Controllers;

use App\Models\CricketScore;
use Illuminate\Http\Request;

class ScoreController extends Controller
{

    public function updateScore(Request $request)
    {
            $request->validate([
            'batsman_id' => 'required|array|min:1',
            'batsman_id.*' => 'required|integer|exists:players,id',
            'bowler_id' => 'required|array|min:1',
            'bowler_id.*' => 'required|integer|exists:players,id',
        ]);

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

        $wicket = CricketScore::where('match_id', $matchId)->sum('wicket');
        $outPlayers = CricketScore::where('match_id', $matchId)->where('wicket', '!=', null)->pluck('batsman_id')->toArray();
        if ($wicket !== null && in_array($batsmanId, $outPlayers)) {
            $message = 'The player is already out';
            return redirect()->route('live.match', ['matchId' => $matchId])->withMessage($message);
        }

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
        $maxWickets = 10;
        $totalWickets = CricketScore::where('match_id', $matchId)->where('battingTeam_id', $battingTeamId)->where('wicket', '!=', null)->count();
        if ($totalWickets >= $maxWickets) {
            $message = 'Innings over';
        }
        return redirect()->route('live.match', ['matchId' => $request->matchId])->withMessage($message);
    }


}

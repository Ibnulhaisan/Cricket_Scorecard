<?php

namespace App\Http\Controllers;


use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class PlayerController extends Controller
{
     public function teamId(){
         $team =  Team::all();
         return view('player', ['team' => $team]);
     }
     public function playerinformation(Request $request){
         $request->validate([
            'player_name' => 'required',
            'birth_place' => 'required',
            'birth_day' => 'required',
            'player_role' => 'required',
            'batting_style' => 'required',
            'bolling_style' => 'required',
            'team_id' => 'required',
        ]);
         $player = new Player();
         $player->player_name = $request->input('player_name');
         $player->birth_place = $request->input('birth_place');
         $player->birth_day = $request->input('birth_day');
         $player->player_role = $request->input('player_role');
         $player->batting_style = $request->input('batting_style');
         $player->bolling_style = $request->input('bolling_style');
         $player->team_id = $request->input('team_id');
         $player->save();
         return view('datatable');
     }

    public function playerdata(Request $request)
    {
        if ($request->ajax()) {
            $u = Player::query();

            return DataTables::of($u)
                ->make(true);
        }
        return view('datatable');
    }

}


//if ($request->ajax()) {
//    $players = Player::with('player_team')->get();
//    return DataTables::of($players)
//        ->addColumn('team_name', function ($player) {
//            return $player->player_team->team_name;
//        })
//        ->make(true);
//}
//return view('datatable');

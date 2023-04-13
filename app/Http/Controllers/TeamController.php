<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use voku\helper\ASCII;
use Yajra\DataTables\Facades\DataTables;

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
        return view('teamdatatable');

    }
    public function back(){
        return view('dashboard');
    }

    public function teamdatatable(Request $request)
    {
        if ($request->ajax()) {
            $u = Team::query();

            return DataTables::of($u)
                ->addColumn('action', function ($admin) {
                    return '<a class="btn btn-danger">Delete</a>';
                })
                ->rawColumns(["action"])
                ->make(true);

        }
        return view('teamdatatable');
    }

}

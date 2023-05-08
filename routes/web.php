<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('showdata',[\App\Http\Controllers\PlayerController::class,'playerdata'])->name('playerdata')->middleware('auth');
//player ar route
Route::get('showplayerinfo',[\App\Http\Controllers\PlayerController::class,'teamId'])->name('playerForm.show')->middleware('auth');
Route::post('infosave',[\App\Http\Controllers\PlayerController::class,'playerinformation'])->name('player.store')->middleware('auth');

//Team ar route
Route::get('infoshow',[\App\Http\Controllers\TeamController::class,'team'])->name('teamForm.show')->middleware('auth');
Route::post('teamsave',[\App\Http\Controllers\TeamController::class,'teamInformation'])->name('team.store')->middleware('auth');
Route::get('goback',[\App\Http\Controllers\TeamController::class,'back'])->name('back')->middleware('auth');
Route::get('teamData',[\App\Http\Controllers\TeamController::class,'teamdatatable'])->name('teamdatatable')->middleware('auth');
//Dashboard ar logout ar route

Route::get('dashboard',[\App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');

Route::get('logout',[\App\Http\Controllers\DashboardController::class,'logout'])->name('logout');

//match ar sob route
Route::get('match',[\App\Http\Controllers\MatchController::class,'matchId'])->name('match')->middleware('auth');
Route::post('matchsave',[\App\Http\Controllers\MatchController::class,'matchInformation'])->name('match.store')->middleware('auth');
Route::get('matchdatatable',[\App\Http\Controllers\MatchController::class,'matchdatatable'])->name('matchdatatable')->middleware('auth');
//Route::get('getMatchData', [\App\Http\Controllers\MatchController::class,'getMatchData'])->name('getMatchData');
Route::get('goback',[\App\Http\Controllers\MatchController::class,'back'])->name('back')->middleware('auth');
Route::get('showlive/{matchId}',[\App\Http\Controllers\MatchController::class,'showliveMatch'])->name('live.match')->middleware('auth');

//score ar route
Route::post('scoreshow',[\App\Http\Controllers\ScoreController::class,'scoreinformation'])->name('handle-input');
//Route::get('updateScore',[\App\Http\Controllers\ScoreController::class,'updateScore'])->name('updateScore',['id'=>$matchId]);
Route::post('updateScore/{matchId}', [\App\Http\Controllers\ScoreController::class, 'updateScore'])->name('updateScore');

Route::delete('playerdata/delete/{id}', 'PlayerController@deletePlayer')->name('deletePlayer');

Route::get('app', function () {
    return view('app');
});
//Route::get('showpublic', function () {
//    return view('showpublic');
//});

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
Route::get('showdata',[\App\Http\Controllers\PlayerController::class,'ajax'])->name('ajax');
//player ar route
Route::get('showplayerinfo',[\App\Http\Controllers\PlayerController::class,'teamId'])->name('playerForm.show');
Route::post('infosave',[\App\Http\Controllers\PlayerController::class,'playerinformation'])->name('player.store');

//Team ar route
Route::get('infoshow',[\App\Http\Controllers\TeamController::class,'team'])->name('teamForm.show');
Route::post('teamsave',[\App\Http\Controllers\TeamController::class,'teamInformation'])->name('team.store');
Route::get('goback',[\App\Http\Controllers\TeamController::class,'back'])->name('back');
Route::get('teamData',[\App\Http\Controllers\TeamController::class,'teamdatatable'])->name('teamdatatable');
//Dashboard ar logout ar route

Route::get('dashboard',[\App\Http\Controllers\DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');


Route::get('logout',[\App\Http\Controllers\DashboardController::class,'logout'])->name('logout');



//match ar sob route
Route::get('match',[\App\Http\Controllers\MatchController::class,'matchId'])->name('match');
Route::post('matchsave',[\App\Http\Controllers\MatchController::class,'matchInformation'])->name('match.store');
Route::get('matchdatatable',[\App\Http\Controllers\MatchController::class,'matchdatatable'])->name('matchdatatable');
Route::get('goback',[\App\Http\Controllers\MatchController::class,'back'])->name('back');
Route::get('showlive/{matchId}',[\App\Http\Controllers\MatchController::class,'showliveMatch'])->name('live.match');

//score ar route
Route::post('scoreshow',[\App\Http\Controllers\ScoreController::class,'scoreinformation'])->name('handle-input');
//Route::get('updateScore',[\App\Http\Controllers\ScoreController::class,'updateScore'])->name('updateScore',['id'=>$matchId]);
Route::post('updateScore/{matchId}', [\App\Http\Controllers\ScoreController::class, 'updateScore'])->name('updateScore');


Route::get('app', function () {
    return view('app');
});

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['team_name','captain_name','coach_name'];

    public function team_players(){

        return $this->hasMany('App\Model\Player','team_id','id');
    }
}

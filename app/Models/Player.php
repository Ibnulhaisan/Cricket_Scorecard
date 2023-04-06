<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['player_name','birth_place','birth_day','player_role','batting_style','bolling_style','team_id'];

    public function player_team(){

        return $this->hasOne('App\Model\Team','id','team_id');
    }

}

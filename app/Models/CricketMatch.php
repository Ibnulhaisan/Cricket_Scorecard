<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CricketMatch extends Model
{
    use HasFactory;
    protected $fillable = ['name','total_overs','team_x_id','team_y_id','venue'];

    public function team_x(){
        return $this->belongsTo(Team::class,'team_x_id','id');
}

public function team_y(){
        return $this->belongsTo(Team::class,'team_y_id','id');
}

}

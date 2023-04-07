<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CricketMatch extends Model
{
    use HasFactory;
    protected $fillable = ['name','total_overs','team_x_id','team_y_id','venue'];


}

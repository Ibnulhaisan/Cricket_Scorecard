<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form class="container py-5" action="{{route('updateScore', ['matchId' => $matchId])}}" method="POST">
    @csrf
    @if(session('message'))
        <div class="alert alert-success w-100">{{session('message')}}</div>
    @endif
    <input type="number" name="matchId" value="{{$matchId}}" hidden>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <input class="me-2" hidden type="number" name="battingTeam_id" value="{{$players->team_x->id}}">
                    <h6 class="fw-bold my-3 text-primary"> {{$players->team_x->team_name}} batting player</h6>
                    @foreach($players->team_x->team_players as $index => $player)
                        <div class="d-flex">
                            <span>{{$index + 1}}</span>
                            <input class="mx-2" name="batsman_id[]" type="checkbox" value="{{$player->id}}">
                            <h6>{{$player->player_name}}</h6>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <input class="me-2" hidden type="number" name="bowlingTeam_id" value="{{$players->team_y->id}}">
                    <h6 class="fw-bold my-3 text-primary"> {{$players->team_y->team_name}} batting player</h6>
                    @foreach($players->team_y->team_players as $index => $player)
                        <div class="d-flex">
                            <span>{{$index + 1}}</span>
                            <input class="mx-2" name="bowler_id[]" type="checkbox" value="{{$player->id}}">
                            <h6>{{$player->player_name}}</h6>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <table style="margin-top:100px;">
                    <tr>
                        <td>
                            <span class="label">Runs:</span>
                            <button class="btn btn-primary" type="submit" name="run" value="1">1</button>
                            <button class="btn btn-primary" type="submit" name="run" value="2">2</button>
                            <button class="btn btn-primary" type="submit" name="run" value="3">3</button>
                            <button class="btn btn-primary" type="submit" name="run" value="4">4</button>
                            <button class="btn btn-primary" type="submit" name="run" value="5">5</button>
                            <button class="btn btn-primary" type="submit" name="run" value="6">6</button>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="margin-top:0px;">
                    <tr>
                        <td>
                            <span class="label">Wickets:</span>
                            <button class="btn btn-primary" type="submit" name="wicket" value="1">1</button>
                        </td>
                    </tr>
                </table>
            </div>

            <div>
                <table style="margin-top:0px;">
                    <tr>
                        <td>
                            <span class="label"> Extra :</span>
                            <button class="btn btn-primary" type="submit" name="extra" value="1">1</button>
                            <button class="btn btn-primary" type="submit" name="extra" value="2">2</button>
                            <button class="btn btn-primary" type="submit" name="extra" value="3">3</button>
                            <button class="btn btn-primary" type="submit" name="extra" value="4">4</button>
                            <button class="btn btn-primary" type="submit" name="extra" value="5">5</button>
                            <button class="btn btn-primary" type="submit" name="extra" value="6">6</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-4">
            <h4>score</h4>
            <div class="col-md-12">
                @foreach ($score as $s)
                    <span class="col-md-2">{{$s->run}} </span>
                @endforeach
            </div>
        </div>



        <div class="col-md-4">
            @foreach($runsByBatsman as  $player)
                <h6>{{'BAN'}}, ({{$score->sum('run')}}{{ -$runsByBowler->sum('wicket') }})(Over: {{$player['over']}}.{{$player['ballInOver']}}) </h6><br>@break
            @endforeach

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Batsman</th>
                    <th>Run</th>
                    <th>Ball</th>
                </tr>
                </thead>
                <tbody>
                @foreach($runsByBatsman as  $player)
                    <tr>
                        <td>{{$player['name']}} </td>
                        <td> {{$player['runs']}}</td>
                        <td>  {{$player['ball']}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            @foreach($runsByBatsman as  $player)
                <h6>{{'BAN'}}, ({{$score->sum('run')}}{{ -$runsByBowler->sum('wicket') }})(Over: {{$player['over']}}.{{$player['ballInOver']}}) </h6><br>@break
            @endforeach

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Bowler</th>
                    <th>Run</th>
                    <th>Ball</th>
                </tr>
                </thead>
                <tbody>
                @foreach($runsByBowler as $player)
                    <tr>
                        <td>{{$player['name']}} </td>
                        <td> {{$player['runs']}}</td>
                        <td> {{$player['ball']}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>



        {{--        <div class="col-md-4">--}}
        {{--            <h4>Bowling summary</h4>--}}
        {{--            @foreach($runsByBowler as $player)--}}
        {{--                <h6>{{$player['name']}}, run: {{$player['runs']}} (Ball: {{$player['ball']}})</h6>--}}
        {{--            @endforeach--}}
        {{--        </div>--}}

        <div class="row my-5">
            <div class="col-md-4">
                <h4>score</h4>
                <div class="col-md-12">
                    @foreach ($score as $s)
                        <span class="col-md-2">{{$s->extra}}</span>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Extra</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($runsByBatsman as  $player)
                        <tr>
                            <td>{{$score->sum('extra')}}</td>@break
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <h4>score</h4>
            <div class="col-md-12">
                @foreach ($score as $s)
                    <span class="col-md-2">{{$s->wicket}}</span>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            @foreach($runsByBatsman as $player)
                <h6>wicket: <span style="color:{{$player['wicket'] == 1 ? 'red' : 'green'}};">{{$player['wicket'] == 1 ? 'out' : 'not out'}}</span>, ({{$player['name']}})</h6>
            @endforeach
        </div>


        <table>

        </table>


    </div>

</form>
</body>
</html>

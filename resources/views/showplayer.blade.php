<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<style>


</style>

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
                            <span class="label"> Extra Runs:</span>
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
                <h6>{{'Bangladesh'}}, (run: {{$score->sum('run')}}{{ -$runsByBowler->sum('wicket') }})(Over: {{$player['over']}}.{{$player['ballInOver']}}) </h6>
                @break
            @endforeach
                <h4>Batting summary</h4>
                @foreach($runsByBatsman as  $player)
                    <h6>{{$player['name']}}, (run: {{$player['runs']}}{{ -$runsByBowler->sum('wicket') }})(Ball: {{$player['ball']}}) (Over: {{$player['over']}}.{{$player['ballInOver']}})</h6>
                @endforeach
        </div>

        <div class="col-md-4">
            <h4>Bowling summary</h4>
            @foreach($runsByBowler as $player)
                <h6>{{$player['name']}}, run: {{$player['runs']}} (Ball: {{$player['ball']}})</h6>
            @endforeach
        </div>

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
                @foreach($runsByBatsman as  $player)
                    <h6>extra: {{$player['extra']}}</h6>
                @endforeach
            </div>
            <div class="col-md-4">
                @foreach($runsByBowler as $player)
                    <h6>extra: {{$player['extra']}}</h6>
                @endforeach
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
                <h6>wicket: <span style="color:{{$player['wicket'] == 1 ? 'red' : 'black'}};">{{$player['wicket'] == 1 ? 'out' : 'not out'}}</span>, ({{$player['name']}})</h6>
            @endforeach
        </div>

        <div class="col-md-4">
                @foreach($runsByBowler as $player)
                    <h6> wicket: {{$player['wicket']}}</h6>
                @endforeach
            </div>

{{--        <div class="col-md-4">--}}
{{--            <h4>score</h4>--}}
{{--            <div class="col-md-12">--}}
{{--                @foreach ($score as $s)--}}
{{--                    <span class="col-md-2">{{$s->ball}}</span>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--            @foreach($runsByBatsman as  $player)--}}
{{--                <h6> Balls: {{$player['ball']}}</h6>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <div class="col-md-4">--}}
{{--            @foreach($runsByBowler as $player)--}}
{{--                <h6> Balls: {{$player['ball']}}</h6>--}}
{{--            @endforeach--}}
{{--        </div>--}}



    </div>

    {{--<div class="form-container" style="display: flex; align-items: center; justify-content: center; height: 80vh; padding: 20px;">--}}
    {{--    <a href="{{ route('dashboard') }}" class="btn btn-success px-3" style="position: absolute; left: 20px; top: 20px; padding: 10px 20px; border-radius: 5px; color: white; background-color: #28a745; border: none; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25); text-decoration: none; font-weight: bold;">Back</a>--}}
    {{--    <a href="{{ route('teamForm.show') }}" class="btn btn-success px-3" style="position: absolute; left: 95px; top: 20px; padding: 10px 20px; border-radius: 5px; color: white; background-color: #28a745; border: none; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25); text-decoration: none; font-weight: bold;">Add Team</a>--}}
    {{--    <a href="{{ route('ajax') }}" class="btn btn-success px-3" style="position: absolute; left: 205px; top: 20px; padding: 10px 20px; border-radius: 5px; color: white; background-color: #28a745; border: none; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25); text-decoration: none; font-weight: bold;">Player Info</a>--}}
    {{--    <a href="{{ route('match') }}" class="btn btn-success px-3" style="position: absolute; left: 320px; top: 20px; padding: 10px 20px; border-radius: 5px; color: white; background-color: #28a745; border: none; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25); text-decoration: none; font-weight: bold;">Match</a>--}}



    {{--        {{count($players->team_x->team_players)}}--}}
    {{--        @php--}}
    {{--            $team_x_players = $players->team_x->team_players;--}}
    {{--            $team_y_players = $players->team_y->team_players;--}}
    {{--            $max_players = max(count($team_x_players), count($team_y_players));--}}
    {{--        @endphp--}}
    {{--        @for ($i = 0; $i < $max_players; $i++)--}}
    {{--            <tr class="table-light">--}}
    {{--                <td>--}}
    {{--                    @if (isset($team_x_players[$i]))--}}
    {{--                        <div class="form-check">--}}
    {{--                            <input type="checkbox" class="form-check-input" name="team_x[]" value="{{ $team_x_players[$i]->player_name }}" id="team_x_player_{{ $i }}">--}}
    {{--                            <label class="form-check-label" for="team_x_player_{{ $i }}">{{ $i+1 }} {{ $team_x_players[$i]->player_name }}</label>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </td>--}}
    {{--                <td>--}}
    {{--                    @if (isset($team_y_players[$i]))--}}
    {{--                        <div class="form-check">--}}
    {{--                            <input type="checkbox" class="form-check-input" name="team_y[]" value="{{ $team_y_players[$i]->player_name }}" id="team_y_player_{{ $i }}">--}}
    {{--                            <label class="form-check-label" for="team_y_player_{{ $i }}">{{ $i+1 }} {{ $team_y_players[$i]->player_name }}</label>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </td>--}}
    {{--            </tr>--}}
    {{--        @endfor--}}


    {{--</div>--}}
</form>
</body>
</html>

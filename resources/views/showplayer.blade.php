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

<style>
    table {
        border-collapse: collapse;
    }
    th, td {
        padding: 10px;
        border: 1px solid white;
    }
    th {
        background-color: olivedrab;
        font-weight: bold;
    }
    .player-number {
        text-align: center;
        width: 20px;
    }
    .player-checkbox {
        text-align: center;
        width: 20px;
    }
</style>

<div class="form-container" style="display: flex;align-items: center;justify-content: center;height: 80vh;padding: 20px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
    <table class="table table-bordered table-hover shadow">
        <thead class="thead-dark">
        <tr>
            <th>Team X</th>
            <th>Team Y</th>
        </tr>
        </thead>
        <tbody>
        @php
            $team_x_players = $players->team_x->team_players;
            $team_y_players = $players->team_y->team_players;
            $max_players = max(count($team_x_players), count($team_y_players));
        @endphp
        @for ($i = 0; $i < $max_players; $i++)
            <tr class="table-light">
                <td>
                    @if (isset($team_x_players[$i]))
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="team_x[]" value="{{ $team_x_players[$i]->player_name }}" id="team_x_player_{{ $i }}">
                            <label class="form-check-label" for="team_x_player_{{ $i }}">{{ $i+1 }} {{ $team_x_players[$i]->player_name }}</label>
                        </div>
                    @endif
                </td>
                <td>
                    @if (isset($team_y_players[$i]))
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="team_y[]" value="{{ $team_y_players[$i]->player_name }}" id="team_y_player_{{ $i }}">
                            <label class="form-check-label" for="team_y_player_{{ $i }}">{{ $i+1 }} {{ $team_y_players[$i]->player_name }}</label>
                        </div>
                    @endif
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
</div>


</body>
</html>

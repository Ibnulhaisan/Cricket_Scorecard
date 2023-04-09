<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-4">Match Information</h3>
                <form method="POST" action="{{ route('match.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="total_overs">Total Over:</label>
                        <input type="number" name="total_overs" id="total_overs" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="x_team_name">X Team Name:</label>

                        <select name="team_x_id" class="form-select">
                            @foreach($team as $team)
                                <option value="{{$team->id}}">
                                    {{$team->team_name}}
                                </option>
                            @endforeach

                        </select>

                        <label for="y_team_name">Y Team Name:</label>

                        <select name="team_y_id" class="form-select">
                            @foreach($teamx as $teamx)
                                <option value="{{$teamx->id}}">
                                    {{$teamx->team_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text" name="venue" id="venue" class="form-control" >
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button><br>
                    </div><br>
                    <div class="text-center">
                        <a href="{{route('back')}}" class="btn btn-danger px-3">GoBack</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
</html>

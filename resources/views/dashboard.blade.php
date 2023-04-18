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

@include('app')
<div class="container my-5">
    <div class="d-flex justify-content-start align-items-center mb-4">
        <a href="{{route('teamdatatable')}}" class="btn btn-success px-5 py-4">Teams</a>
        <a href="{{route('playerdata')}}" class="btn btn-success px-5 py-4 mx-4">Players</a>
        <a href="{{route('match')}}" class="btn btn-success px-5 py-4">Matches</a>
    </div>
    @csrf
</div>


</body>
</html>

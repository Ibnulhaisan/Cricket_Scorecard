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

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Dashboard</h1>
        <form action="{{ route('player.store') }}">
            <button class="btn btn-secondary position-absolute top-10 start-15 mb-2 ml-2" style="box-shadow: 0px 0px 10px #888888;padding: 10px; width: 150px; position: absolute;top: 70px;left: 15px;">
                Player
            </button>
        </form>

        <form action="{{ route('team.store') }}">
            <button class="btn btn-secondary position-absolute top-10 start-15 mb-2 ml-2" style="box-shadow: 0px 0px 10px #888888; padding: 10px;width: 150px;position: absolute;top: 70px;left: 180px;">
                Team
            </button>
        </form>
    </div>
    @csrf
</div>


</body>
</html>

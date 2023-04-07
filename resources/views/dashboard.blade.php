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
        <a href="{{route('logout')}}" class="btn btn-primary px-3">Logout</a>
        <a href="{{route('teamForm.show')}}" class="btn btn-primary px-3">Add Team</a>
        <a href="{{route('ajax')}}" class="btn btn-primary px-3">Player Info</a>
    </div>
    @csrf
</div>
{{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--   onclick="event.preventDefault();--}}
{{--   document.getElementById('logout-form').submit();">--}}
{{--    {{ __('Logout') }}--}}
{{--</a>--}}

</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>data table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

    <style>
        th,td{
            font-size: 14px;
        }
    </style>
</head>
<body>
@include('app')
<div class="container my-3">
    <a class="btn btn-primary " href="{{route('match')}}">create match</a>
    <h4 class="mb-4 text-center">All match</h4>
    <table id="dataTable" style="width:100%" >
        <thead style="background-color: cornflowerblue">
        <tr >
            <th>Id</th>
            <th>Name</th>
            <th>Total overs</th>
            <th>Team X</th>
            <th>Team Y</th>
            <th>Venue</th>
            <th>Actions</th>

        </tr>
        </thead>
    </table>
</div>
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
<script>


    $(document).ready(function () {
        $('#dataTable').DataTable({


            ajax: '{{ route('matchdatatable') }}',
            scrollY: '65vh',
            processing: true,
            serverSide:true,
            columns: [
                { data: 'id' },
                {data: 'name', name: 'name'},
                {data: 'total_overs', name: 'total_overs'},
                {data: 'team_x_name', name: 'team_x_name'},
                {data: 'team_y_name', name: 'team_y_name'},
                {data: 'venue', name: 'venue'},
                {data: 'actions', name: 'actions'},



            ],
        });
    });


</script>

</body>
</html>


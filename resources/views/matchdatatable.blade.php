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
{{--<div class="float-right">--}}
{{--    <a href="{{ route('playerForm.show') }}" class="btn btn-warning px-3 text-center">Add</a>--}}
{{--</div>--}}
<div class="container my-5">
    <table id="dataTable" style="width:100%" >
        <thead style="background-color: cornflowerblue">
        <tr >
            <th>Id</th>
            <th>Name</th>
            <th>total_overs</th>
            <th>team_x_id</th>
            <th>team_y_id</th>
            <th>venue</th>
            <th>Action</th>

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
                { data: 'name'},
                { data: 'total_overs' },
                { data: 'team_x_id' },
                { data: 'team_y_id' },
                { data: 'venue' },
                { data: 'action' },


            ],
        });
    });


</script>

</body>
</html>


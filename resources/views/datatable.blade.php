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
<div class="float-right">
    <a href="{{ route('playerForm.show') }}" class="btn btn-warning px-3 text-center">Add</a>
</div>
<div class="container my-5">
    <table id="dataTable" style="width:100%" >
        <thead style="background-color: cornflowerblue">
        <tr >
            <th>Id</th>
            <th>player_name</th>
            <th>birth_place</th>
            <th>birth_day</th>
            <th>player_role</th>
            <th>bolling_style</th>
            <th>batting_style</th>
            <th>team_id</th>
            <th>Action</th>

        </tr>
        </thead>
    </table>
</div>
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
<script>


    $(document).ready(function () {
        $('#dataTable').DataTable({


            ajax: '{{ route('ajax') }}',
            scrollY: '65vh',
            processing: true,
            serverSide:true,
            columns: [
                { data: 'id' },
                { data: 'player_name'},
                { data: 'birth_place' },
                { data: 'birth_day' },
                { data: 'player_role' },
                { data: 'batting_style' },
                { data: 'bolling_style'  },
                { data: 'team_id' },
                { data: 'action' },


            ],
        });
    });


</script>

</body>
</html>


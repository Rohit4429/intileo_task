<!DOCTYPE html>
<html>
<head>
    <title>PDF Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>State</th>
                <th>District</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($data as $row)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $row->state->description }}</td>
                <td>{{ $row->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>

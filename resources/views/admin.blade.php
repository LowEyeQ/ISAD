<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
 <h1>admin</h1>
</body>
<table class="table table-striped table-bordered" style="max-width: 800px; margin: 0 auto;">
    < <thead class="table-dark">
        <tr>
            <th>User ID</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Google Map</th>
            <th>Created At</th>
            <th>รูปตอนเกิดเหตุ</th>
            <th>ชื่อ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($emergencyCalls as $call)
            <tr>
                <td>{{ $call->user_id }}</td>
                <td>{{ $call->latitude }}</td>
                <td>{{ $call->longitude }}</td>
                <td>
                    @if ($call->latitude && $call->longitude)
                    <a href="https://www.google.com/maps?q={{ $call->latitude }},{{ $call->longitude }}" target="_blank">Open in Google Maps</a>
                @endif
                </td>
                <td>{{ $call->created_at }}</td>
                <td>
                    @if ($call->additional_image)
                        <img src="{{ asset($call->additional_image) }}" alt="Additional Image" width="100">
                    @else
                        ไม่มีรูป
                    @endif
                </td>
                <td>{{ $call->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Lokasi</th>
        </thead>
        @foreach ($data as $catatanperjalanan)    
        <tbody>
            <td>{{$catatanperjalanan->tanggal}}</td>
            <td>{{$catatanperjalanan->lokasi}}</td>
            <td>{{$catatanperjalanan->jam}}</td>
        </tbody>
        @endforeach
    </table>
</body>
</html>
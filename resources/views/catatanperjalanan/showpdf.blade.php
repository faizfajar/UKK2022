<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cetak PDF</title>
  </head>
  <body>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Suhu</th>
            </tr>
        </thead>
        @forelse ($catatan as $value)
        <tbody>
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value->tanggal}}</td>
                <td>{{$value->jam}}</td>
                <td>{{$value->lokasi}}</td>
                <td>{{$value->suhu}}</td>
            </tr>
        </tbody>
        @empty

        @endforelse
    </table>

  </body>
</html>

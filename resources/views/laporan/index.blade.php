<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Semua nya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <a href="{{ URL::previous() }}" class="btn btn-outline-danger m-3">Go Back</a>
    <div class="textnya mt-5 text-center mb-3">
        <h1>Laporan Masyarakat</h1>
        <p >Jalan 145 Anam-ro, Seongbuk-gu, Seoul, Korea Selatan</p>
    </div>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th class="fw-bold text-center">No</th>
              <th class="fw-bold text-center">Pengaduan</th>
              <th class="fw-bold text-center">Id Petugas</th>
              <th class="fw-bold text-center">Nama Petugas</th>
              <th class="fw-bold text-center">Tanggapan</th>
              <th class="fw-bold text-center">Foto</th>
              <th class="fw-bold text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          @php
           $no = 1;
          @endphp
          @foreach ($tanggapan as $idx)
          <tr>
            <td class="fw-semibold text-center fs-6">{{$no++}}</td>
            <td class="text-center fs-6">{{$idx->pengaduan->isilaporan}}</td>
            <td class="text-center fs-6">{{$idx->user->id_petugas}}</td>
            <td class="text-center fs-6">{{$idx->user->nama_petugas}}</td>
            <td class="text-center fs-6">{{$idx->tanggapan}}</td>
            <td class="text-center fs-6"><img src="{{ asset('img/'.$idx->pengaduan->foto) }}" width="100px"/></td>
            <td class="text-center fs-6">{{$idx->pengaduan->status}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
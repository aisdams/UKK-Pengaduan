<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <div class="text-center">
        <h1 style="font-size: 30px;font-weight: bold">Pengaduan Masyarakat</h1>
        <h1>Jl Korea Raja Tayo</h1>
    </div>
    <hr>
    <div class="grid grid-cols-2" style="display:flex">
       <div class="text-1">
        Id Petugas : {{$tanggapan ->user->id_petugas}}
       </div>
       <div class="text-2">
        Tanggal : {{$tanggapan ->tgl_tanggapan}}
       </div>
    </div>

    <div>
        NIK Pengaduan Masyarakat : {{$tanggapan ->pengaduan->nik}}
    </div>
    <div class="div">
        <h1 class="text-center" style="margin-top: 4rem;font-weight: bold;margin-bottom: 2rem">Isi Laporan</h1>
        Laporan :<p>{{$tanggapan ->pengaduan->isilaporan}}</p>
        Tanggapan Petugas :<p>{{$tanggapan ->tanggapan}}</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <title>Detail {{ $Fid->pemilik }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">

     <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}">
  </head>
 <body>
    <!-- Page Header-->
<header class="bg-primary shadow p-3 mb-4 bg-body rounded ">
  <div class="container-fluid ">
    <h2 class="mb-0 p-1">Detail {{ $Fid->pemilik }}</h2>
  </div>
</header>
 <!-- Breadcrumb-->
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb ms-4">
      <li class="breadcrumb-item"><a href="/pendataanNopol">Pendataan Nopol</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Pendataan Nomor Polisi Luar</li>
    </ol>
    {{-- <hr class="border border-dark border-2 opacity-75">   --}}
  </nav>
</div>

{{-- <div class="container-fluid d-flex justify-content-end">
  <button href="" type="button" class="btn btn-warning btn-lg border-0 m-2 text-white">
      <i class="bi bi-pencil"></i> Edit
    </button>
</div> --}}

{{-- image --}}
<hr class="border border-warning border-2 opacity-50">
  <div class="container-fluid py-2 border">
    <div class="row align-items-center">
      <div class="col-5">
        <div class="container py-4 px-5">
        @if($Fid->gambar)
        <img src="{{ asset('storage/' .$Fid->gambar)}}" class="img-fluid shadow p-3 mb-5 bg-body rounded " alt="" width="500">
        @else
        <img src="{{ asset('/img/photos/paul-morris-116514-unsplash.jpg')}}" class="img-fluid shadow p-3 mb-5 bg-body rounded " alt="" width="500">
        @endif
        </div>
    </div>

    <div class="col-7">
        <div class="container">
          <div class="row g-6 ">
            <div class="col-4 p-2">
              <label for="NoPolisi" class="form-label fw-bold fw-bold">No Polisi</label>
              <input class="form-control" readonly id="NoPolisi" value="{{ $Fid->no_polisi }}">
            </div>
            <div class="col-4 p-2">
              <label for="WarnaPlat" class="form-label fw-bold">Warna Plat</label>
              <input class="form-control" readonly id="WarnaPlat" value="{{ $Fid->KodePlat->warna_plat }}">
            </div>
            <div class="col-4 p-2">
              <label for="SamsatAsal" class="form-label fw-bold">Samsat Asal</label>
              <input class="form-control" readonly id="SamsatAsal" value="{{ $Fid->samsat_asal }}">
            </div>
            <div class="col-4 p-2">
              <label for="AsalKen" class="form-label fw-bold">Asal Kendaraan</label>
              <input class="form-control" readonly id="AsalKen" value="{{ $Fid->asal_kendaraan }}">
            </div>
            <div class="col-4 p-2">
              <label for="AlamatStnk" class="form-label fw-bold">Alamat Sesuai Stnk</label>
              <input class="form-control" readonly id="AlamatStnk" value="{{ $Fid->alamat_sesuai_stnk }}">
            </div>
            <div class="col-4 p-2">
              <label for="Pemilik" class="form-label fw-bold">Pemilik</label>
              <input class="form-control" readonly id="Pemilik" value="{{ $Fid->pemilik }}">
            </div>
            <div class="col-4 p-2">
              <label for="IdUserPen" class="form-label fw-bold">Id User Pendataan</label>
              <input class="form-control" readonly id="IdUserPen" value="{{ $Fid->id_user_pendataan }}">
            </div>
            <div class="col-4 p-2">
              <label for="NamaUser" class="form-label fw-bold">Nama User</label>
              <input class="form-control" readonly id="NamaUser" value="{{ $Fid->nama_user }}">
            </div>
            <div class="col-4 p-2">
              <label for="TglData" class="form-label fw-bold">Tanggal Pendataaan</label>
              <input class="form-control" readonly id="TglData" value="{{ $Fid->tgl_pendataan }}">
            </div>
            <div class="col-4 p-2">
              <label for="Latitude" class="form-label fw-bold">Latitude</label>
              <input class="form-control" readonly id="Latitude" value="{{ $Fid->latitude }}">
            </div>
            <div class="col-4 p-2">
              <label for="Longitude" class="form-label fw-bold">Longitude</label>
              <input class="form-control" readonly id="Longitude" value="{{ $Fid->longitude }}">
            </div>
            <div class="col-4 p-2">
              <label for="Status" class="form-label {{ ($Fid->status === "Belum Balik Nama" ? 'badge bg-danger' : 'badge bg-success') }} fw-bold">Status</label>
              <input class="form-control {{ ($Fid->status === "Belum Balik Nama" ? 'is-invalid text-danger' : 'is-valid text-success') }}" readonly id="Status" value="{{ $Fid->status }}">
            </div>
            <div class="col-4 p-2">
              <label for="CreatedAt" class="form-label fw-bold">Created At</label>
              <input class="form-control" readonly id="CreatedAt" value="{{ $Fid->created_at }}">
            </div>
            <div class="col-4 p-2">
              <label for="UpdatedAt" class="form-label fw-bold">Updated At</label>
              <input class="form-control" readonly id="UpdatedAt" value="{{ $Fid->updated_at }}">
            </div>

          </div>
          
      </div>

    </div>
    {{-- <div class="col-6 bg-dark">test</div> --}}
    
    </div>


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
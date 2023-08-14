@extends('layouts.main')
@section('content')
 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
  <div class="container-fluid px-0">
    <h2 class="mb-0 p-1">{{ $tittle }}</h2>
  </div>
</header>
 <!-- Breadcrumb-->
 <div class="bg-white">
   <div class="container-fluid">
     <nav aria-label="breadcrumb">
       <ol class="breadcrumb mb-0 py-3">
         <li class="breadcrumb-item"><a class="fw-light" href="/dashboard">Home</a></li>
         <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
       </ol>
     </nav>
   </div>
 </div>

<div class="container shadow-sm p-3 mb-5 bg-body rounded mt-2 py-2">
    <div class="container-fluid p-2">
        <form action="/cetakData" method="get">
            @csrf
            <div class="row justify-content-md-center g-3 d-flex">
                <div class="col-auto">
                    <label for="tglAwal" class="form-label">Tanggal Awal</label>
                    <input type="date" name="tgl_awal" class="form-control" id="tglAwal" value="{{ request('tgl_awal') }}">
                </div>
                <div class="col-auto">
                    <label for="TanggalAkhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="tgl_akhir" class="form-control" id="TanggalAkhir" value="{{ request('tgl_akhir') }}">
                </div>
                 <div class="col-auto align-self-center mt-5">
                    <button type="submit" class="btn btn-primary">Filter</button>
                 </div>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid mt-2">
  <div class="card-body">
    <table class="table row-bordered" style="width: 100%" id="tablePrint">
      <thead>
        <tr class="table-secondary">
          <th>No</th>
          <th>No Polisi</th>
          <th>Warna Plat</th>
          <th>Pemilik</th>
          <th>Tanggal Pendataan</th>
          <th>Latitude</th>
          <th>Longitude</th>
          <th>Nama Pegawai</th>
        </tr>
        <tbody>
          @foreach($Nopol as $npl)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $npl->no_polisi }}</td>
               <td>{{ $npl->kodePlat->warna_plat }}</td>
               <td>{{ $npl->pemilik }}</td>
               <td>{{ $npl->tgl_pendataan }}</td>
               <td>{{ $npl->latitude }}</td>
               <td>{{ $npl->longitude }}</td>
               <td>{{ $npl->nama_user }}</td>
              </tr>
            @endforeach
        </tbody>
      </thead>
    </table>
  </div>
</div>
  






@endsection
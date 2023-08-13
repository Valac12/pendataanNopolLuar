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

<div class="container mt-2 py-2">
    <div class="container-fluid p-2">
        <form action="/cetakData" method="post">
            @csrf
            <div class="row justify-content-md-center g-3">
                <div class="col-md-4">
                    <label for="tglAwal" class="form-label">Tanggal Awal</label>
                    <input type="date" name="tgl_awal" class="form-control" id="tglAwal">
                </div>
                <div class="col-md-4">
                    <label for="TanggalAkhir" class="form-label">Tanggal Akhir</label>
                    <input type="date" name="tgl_akhir" class="form-control" id="TanggalAkhir">
                </div>
            </div>

            <div class="p-2 m-2 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Cetak</button>
            </div>

        </form>
    </div>
</div>


@endsection
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

 
 @if(session()->has('successCreateNopol'))
 <div class="container px-3 py-2">
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('successCreateNopol') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
 
 @if(session()->has('successDelNopol'))
 <div class="container px-3 py-2">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('successDelNopol') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

{{-- notifikasi validasi --}}
@if ($errors->any())
<div class="container-fluid py-2">
  <div class="alert alert-danger alert-dismissible dafe show" role="alert">
    Input data gagal, cek form tambah data!   
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

 <div class="container-fluid w-100 sm">
  <div class="d-flex justify-content-end py-2">
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalNopol">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>No Polisi</th>
                <th>Warna Plat</th>
                <th>Pemilik</th>
                <th>Tanggal Pendataan</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Nama Pegawai</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
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
              <td class="d-flex justify-content-center">
                  <button class="badge bg-success border-0 m-1">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#eye-1"> </use>
                        </svg>
                  </button>
                  <button class="badge bg-warning border-0 m-1">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#edit-window-1"> </use>
                        </svg>
                  </button>
                  <form action="/pendataanNopol/{{ $npl->id }}" onclick="return confirm('ingin mengapus data?')" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                  <button class="badge bg-danger border-0 m-1">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#bin-1"> </use>
                        </svg>
                  </button>
                  </form>
                </td>
              </tr>
            @endforeach
            </table>
 </div>
 </div>
 
<!-- Modal Create -->
<div class="modal fade" id="modalNopol" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/pendataanNopol" method="post" class="was-validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row position-relative">
              <label for="NoPolis" class="col-sm-2 col-form-label">No Polisi</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" name="no_polisi" id="NoPolis" value ="{{ old('no_polisi') }}"  placeholder="B 3224 AP" autofocus required>
              @error('no_polisi')
              <div class="invalid-feedback ">
                {{ $message }}
              </div>
              @enderror
          </div>
          </div>
          <div class="mb-3 row position-relative">
            <label for="KodePlat" class="col-sm-2 col-form-label">Kode Plat</label>
            <div class="col-sm-10">
              <select class="form-select @error('kd_plat') is-invalid @enderror" name="kd_plat" aria-label="select example" required>
                <option value="">Open this select menu</option>
                @foreach($kodePlat as $kp)
                <option value="{{ $kp->kode_plat }}">{{ $kp->kode_plat }} --- {{ $kp->warna_plat }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="mb-3 row position-relative">
          <label for="SamsatAsal" class="col-sm-2 col-form-label">Samsat Asal</label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('samsat_asal') is-invalid @enderror" name="samsat_asal" id="SamsatAsal" value ="{{ old('samsat_asal') }}"  placeholder="jayapura" required>
            @error('samsat_asal')
            <div class="invalid-feedback ">
              {{ $message }}
            </div>
            @enderror
          </div>
          </div>
          <div class="mb-3 row postion-relative">
            <label for="AsalKendaraan" class="col-sm-2 col-form-label">Asal Kendaraan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('asal_kendaraan') is-invalid @enderror" name="asal_kendaraan" id="AsalKendaraan" value ="{{ old('asal_kendaraan') }}"  placeholder="jayapura" required>
            @error('asal_kendaraan')
            <div class="invalid-feedback ">
              {{ $message }}
            </div>
            @enderror
            </div>
        </div>
        <div class="mb-3 row position-relative">
          <label for="AlamatSesuaiStnk" class="col-sm-2 col-form-label">Alamat STNK</label>
          <div class="col-sm-10">
          <input type="text" class="form-control @error('alamat_sesuai_stnk') is-invalid @enderror" name="alamat_sesuai_stnk" id="AlamatSesuaiStnk" value ="{{ old('alamat_sesuai_stnk') }}"  placeholder="jayapura" required>
          @error('alamat_sesuai_stnk')
          <div class="invalid-feedback ">
            {{ $message }}
          </div>
          @enderror
          </div>
      </div>
      <div class="mb-3 row position-relative">
          <label for="pemilik" class="col-sm-2 col-form-label">Pemilik</label>
          <div class="col-sm-10">
          <input type="text" class="form-control @error('pemilik') is-invalid @enderror" name="pemilik" id="pemilik" value ="{{ old('pemilik') }}"  placeholder="santianoJoe" required>
          @error('pemilik')
          <div class="invalid-feedback ">
            {{ $message }}
          </div>
          @enderror
          </div>
      </div>
      <div class="mb-3 row">
        <label for="idUserPendataan" class="col-sm-2 col-form-label">Id User</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="id_user_pendataan" id="idUserPendataan" value="{{ auth()->user()->level }}" readonly>
        </div>
      </div>  
      <div class="mb-3 row">
        <label for="NamaUser" class="col-sm-2 col-form-label">Nama Pegawai</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="nama_user" id="NamaUser" value="{{ auth()->user()->nama }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="TglPendataan" class="col-sm-2 col-form-label">Tanggal Pendataan</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="tgl_pendataan" id="TglPendataan" value="{{ $dateNow }}" readonly>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Latitude" class="col-sm-2 col-form-label">Latitude</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="latitude" id="Latitude" value ="{{ old('latitude') }}"  placeholder="-6.193125" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Longitude" class="col-sm-2 col-form-label">Longitude</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="longitude" id="Longitude" value ="{{ old('longitude') }}"  placeholder=" 106.821810" required>
        </div>
    </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
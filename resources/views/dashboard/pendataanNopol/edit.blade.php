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

<div class="container-fluid">
    <form action="">
    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="NoPolis" class="col-sm-4 col-form-label">No Polisi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" name="no_polisi" id="NoPolis" value ="{{ old('no_polisi') }}"  placeholder="B 3224 AP" autofocus required>
                    @error('no_polisi')
                    <div class="invalid-feedback ">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label for="SamsatAsal" class="col-sm-4 col-form-label">Samsat Asal</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control @error('samsat_asal') is-invalid @enderror" name="samsat_asal" id="SamsatAsal" value ="{{ old('samsat_asal') }}"  placeholder="jayapura" required>
                    @error('samsat_asal')
                    <div class="invalid-feedback ">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="mb-3">
                <label for="AsalKendaraan" class="col-sm-6 col-form-label">Asal Kendaraan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('asal_kendaraan') is-invalid @enderror" name="asal_kendaraan" id="AsalKendaraan" value ="{{ old('asal_kendaraan') }}"  placeholder="jayapura" required>
                @error('asal_kendaraan')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>



    </div>
</form>
</div>

   
   {{-- <form action="/pendataanNopol" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
    @csrf
    <div class="mb-3 row">
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
  <div class="mb-3 row">
    <label for="KodePlat" class="col-sm-2 col-form-label">Kode Plat</label>
    <div class="col-sm-10">
      <select class="form-select @error('kd_plat') is-invalid @enderror" name="kd_plat" aria-label="select example" required>
        <option value="">Open this select menu</option>
        @foreach($kodePlat as $kp)
        <option value="{{ $kp->id }}">{{ $kp->kode_plat }} - {{ $kp->warna_plat }}</option>
        @endforeach
      </select>
    </div>
</div>
<div class="mb-3 row">
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
<div class="mb-3 row">
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
<div class="mb-3 row">
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
<label for="Gambar" class="col-sm-2 col-form-label">Gambar</label>
<div class="col-sm-10">
<img class="preview-gambar img-fluid my-2 col-sm-5">
<input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="Gambar" name="gambar" aria-label="file example" onchange="previewGambar()" required>
  @error('gambar')
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
</form> --}}


@endsection
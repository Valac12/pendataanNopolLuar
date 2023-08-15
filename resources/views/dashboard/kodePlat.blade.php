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

 {{-- alert berhasil ditambahkan --}}
 @if(session()->has('successCreateKp'))
<div class="container-fluid py-2">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('successCreateKp') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
@endif
{{-- alert berhasil dihapus --}}
 @if(session()->has('successDelKp'))
<div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelKp') }}
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
 
 <div class="container-fluid w-100">
  <div class="d-flex justify-content-end py-2">
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalPlat">+Tambah Data</button>
  </div>
  <div class="card-body py-2">
  <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Plat</th>
                <th>Warna Plat</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($kodePlat as $kp)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $kp->kode_plat }}</td>
                <td>{{ $kp->warna_plat }}</td>
                <td>{{ $kp->created_at }}</td>
                <td>{{ $kp->updated_at }}</td>
                <td>
                  <button class="badge bg-warning border-0" title="Edit Data" data-bs-toggle="modal" data-bs-target="#modalPlatEdit{{ $kp->id }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#edit-window-1"> </use>
                        </svg>
                    </button>
                    <form action="/kelolaKodePlat/{{ $kp->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                    <button class="badge bg-danger border-0" type="submit" onclick="return confirm('ingin menghapus data ?')">
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalPlat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaKodePlat" method="post" class="was validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row position-relative">
                <label for="KodePlat" class="col-sm-2 col-form-label">Kode Plat</label>
                <div class="col-sm-10">
                <input type="number" class="form-control @error('kode_plat') is-invalid @enderror" name="kode_plat" id="KodePlat" placeholder="001" autofocus required>
                @error('kode_plat')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row position-relative">
                <label for="WarnaPlat" class="col-sm-2 col-form-label">Warna Plat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('warna_plat') is-invalid @enderror" name="warna_plat" id="WarnaPlat" placeholder="hitam" required>
                @error('warna_plat')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
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

@foreach($kodePlat as $kp)
<!-- Modal Edit -->
<div class="modal fade" id="modalPlatEdit{{ $kp->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaKodePlat/{{ $kp->id }}" method="post" class="was validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row position-relative">
                <label for="KodePlat" class="col-sm-2 col-form-label">Kode Plat</label>
                <div class="col-sm-10">
                <input type="number" class="form-control @error('kode_plat') is-invalid @enderror" name="kode_plat" id="KodePlat" placeholder="001" value="{{ old('kode_plat',$kp->kode_plat) }}" autofocus required>
                @error('kode_plat')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row position-relative">
                <label for="WarnaPlat" class="col-sm-2 col-form-label">Warna Plat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('warna_plat') is-invalid @enderror" name="warna_plat" id="WarnaPlat" placeholder="hitam" value="{{ old('warna_plat', $kp->warna_plat) }}" required>
                @error('warna_plat')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
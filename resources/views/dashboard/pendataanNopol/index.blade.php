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

 @if(session()->has('successUpNopol'))
 <div class="container px-3 py-2">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('successUpNopol') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif
 
 @if(session()->has('successDelNopol'))
 <div class="container px-3 py-2">
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('successDelNopol') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif

{{-- notifikasi validasi --}}
@if ($errors->any())
<div class="container-fluid py-2">
  <div class="alert alert-danger alert-dismissible dafe show" role="alert">
    Input data gagal, cek form {{ $btn_add }}   
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
</div>
@endif



 <div class="container-fluid w-100 sm">
  <div class="d-flex justify-content-end py-2">
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalNopol">+{{ $btn_add }}</button>
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
                  <a class="badge bg-success border-0 m-1" href="/pendataanNopol/{{ $npl->id }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#eye-1"> </use>
                        </svg>
                  </a>
                  <a class="badge bg-warning border-0 m-1" href="/pendataanNopol/{{ $npl->id }}/edit">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#edit-window-1"> </use>
                        </svg>
                  </a>
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
        <form action="/pendataanNopol" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
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
                <option value="{{ $kp->id }}">{{ $kp->kode_plat }} - {{ $kp->warna_plat }}</option>
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
          
      <div class="mb-3 row position-relative">
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
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
{{-- @foreach($Nopol as $npl)
<div class="modal fade" id="modalEditNopol{{ $npl->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/pendataanNopol/{{ $npl->id }}" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
          @method('put')
            @csrf
            <div class="mb-3 row position-relative">
              <label for="NoPolis" class="col-sm-2 col-form-label">No Polisi</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" name="no_polisi" id="NoPolis" value ="{{ old('no_polisi', $npl->no_polisi) }}"  placeholder="B 3224 AP" autofocus required>
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
                <option value="{{ old('kd_plat', $npl->kd_plat) }}">{{ old('warna_plat', $npl->KodePlat->warna_plat) }}</option>
                @foreach($kodePlat as $kp)
                <option value="{{$kp->id }}">{{ $kp->kode_plat }} - {{ $kp->warna_plat }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="mb-3 row position-relative">
          <label for="SamsatAsal" class="col-sm-2 col-form-label">Samsat Asal</label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('samsat_asal') is-invalid @enderror" name="samsat_asal" id="SamsatAsal" value ="{{ old('samsat_asal', $npl->samsat_asal) }}"  placeholder="jayapura" required>
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
            <input type="text" class="form-control @error('asal_kendaraan') is-invalid @enderror" name="asal_kendaraan" id="AsalKendaraan" value ="{{ old('asal_kendaraan', $npl->asal_kendaraan) }}"  placeholder="jayapura" required>
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
          <input type="text" class="form-control @error('alamat_sesuai_stnk') is-invalid @enderror" name="alamat_sesuai_stnk" id="AlamatSesuaiStnk" value ="{{ old('alamat_sesuai_stnk', $npl->alamat_sesuai_stnk) }}"  placeholder="jayapura" required>
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
          <input type="text" class="form-control @error('pemilik') is-invalid @enderror" name="pemilik" id="pemilik" value ="{{ old('pemilik', $npl->pemilik) }}"  placeholder="santianoJoe" required>
          @error('pemilik')
          <div class="invalid-feedback ">
            {{ $message }}
          </div>
          @enderror
          </div>
      </div>

      <div class="mb-3 row position-relative">
        <label for="Gambar" class="col-sm-2 col-form-label">Gambar</label>
        <div class="col-sm-10">
        @if($npl->gambar)
        <img src="{{ asset('storage/' . $npl->gambar) }}" class="edit-preview img-fluid my-2 col-sm-5">
        @else
        <img class="edit-preview img-fluid my-2 col-sm-5">
        @endif
        <input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="EditGambar" name="gambar" aria-label="file example" onchange="previewEdit()" required>
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
        <input type="text" class="form-control" name="latitude" id="Latitude" value ="{{ old('latitude', $npl->latitude) }}"  placeholder="-6.193125" required>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="Longitude" class="col-sm-2 col-form-label">Longitude</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" name="longitude" id="Longitude" value ="{{ old('longitude', $npl->longitude) }}"  placeholder=" 106.821810" required>
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
@endforeach --}}

<!-- Modal Detail -->
@foreach($Nopol as $npl)
<div class="modal fade" id="modalDetailNopol{{ $npl->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-2" id="staticBackdropLabel">Detail Data Pendataan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table mt-2">
          <caption class="fw-bold">Detail {{ $npl->pemilik }}</caption>
          <thead class="table-dark">
            <tr>
              <th scope="col">Nomor Polisi</th>
              <th scope="col">Kode Plat</th>
              <th scope="col">Samsat Asal</th>
              <th scope="col">Asal Kendaraan</th>
              <th scope="col">Alamat STNK</th>
              <th scope="col">Pemilik</th>
              <th scope="col">Id User</th>
              <th scope="col">User Pendataan</th>
              <th scope="col">Tanggal Pendataaan</th>
              <th scope="col">Latitude</th>
              <th scope="col">Longitude</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{ $npl->no_polisi }}</th>
              <td>{{ $npl->KodePlat->warna_plat }}</td>
              <td>{{ $npl->samsat_asal }}</td>
              <td>{{ $npl->asal_kendaraan }}</td>
              <td>{{ $npl->alamat_sesuai_stnk }}</td>
              <td>{{ $npl->pemilik }}</td>
              <td>{{ $npl->id_user_pendataan }}</td>
              <td>{{ $npl->nama_user }}</td>
              <td>{{ $npl->tgl_pendataan }}</td>
              <td>{{ $npl->latitude }}</td>
              <td>{{ $npl->longitude }}</td>
              <td>{{ $npl->created_at }}</td>
              <td>{{ $npl->updated_at }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
  function previewGambar()
  {
    const Gambar = document.querySelector('#Gambar');
    const preview = document.querySelector('.preview-gambar');

    preview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(Gambar.files[0]);
    oFReader.onload = function(oFREvent) {
    preview.src = oFREvent.target.result;
    }
  }
  // function previewEdit(){
  //   const EditGambar = document.querySelector('#EditGambar');
  //   const EditPreview = document.querySelector('.edit-preview');

  //   EditPreview.style = 'block';

  //   const oFReader = new FileReader();
  //   oFReader.readAsDataURL(EditGambar.files[0]);
  //   oFReader.loadend = function(oFREvent) {
  //   EditPreview.src = oFREvent.target.result;
  //   }

  // }
</script>

{{-- <script>
  $('#modalEditNopol13').on('hidden.bs.modal', function() {
    if(!$('#modalEditNopol13').hasClass('no-reload')) {
      location.reload();
    }
  })
</script> --}}

@endsection
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
           <li class="breadcrumb-item"><a class="fw-light" href="/pendataanNopol">Pendataan Nomor Polisi</a></li>
           <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
         </ol>
       </nav>
     </div>
   </div>

<div class="container-fluid shadow  p-3 mb-5 bg-body-tertiary rounded ">
    <form action="/pendataanNopol/{{ $Ebi->id }}" method="post" enctype="multipart/form-data" class="was-validated needs-validation">
      @method('put')
      @csrf
    <div class="row align-items-end mx-2 my-2 g-2">
        <div class="col-3">
            <div class="mb-3">
                <label for="NoPolis" class="col-sm-4 col-form-label">No Polisi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control @error('no_polisi') is-invalid @enderror" name="no_polisi" id="NoPolis" value ="{{ old('no_polisi', $Ebi->no_polisi) }}"  placeholder="B 3224 AP" autofocus required>
                    @error('no_polisi')
                    <div class="invalid-feedback ">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="KodePlat" class="col-sm-4 col-form-label">Kode Plat</label>
                <div class="col-sm-10">
                  <select class="form-select @error('kd_plat') is-invalid @enderror" name="kd_plat" aria-label="select example" required>
                    <option value="{{ $Ebi->kd_plat }}">{{ $Ebi->KodePlat->warna_plat }}</option>
                    @foreach($kodePlat as $kp)
                    <option value="{{ $kp->id }}">{{ $kp->kode_plat }} - {{ $kp->warna_plat }}</option>
                    @endforeach
                  </select>
                @error('asal_kendaraan')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="SamsatAsal" class="col-sm-6 col-form-label">Samsat Asal</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control @error('samsat_asal') is-invalid @enderror" name="samsat_asal" id="SamsatAsal" value ="{{ old('samsat_asal', $Ebi->samsat_asal) }}"  placeholder="jayapura" required>
                    @error('samsat_asal')
                    <div class="invalid-feedback ">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="AsalKendaraan" class="col-sm-6 col-form-label">Asal Kendaraan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('asal_kendaraan') is-invalid @enderror" name="asal_kendaraan" id="AsalKendaraan" value ="{{ old('asal_kendaraan',$Ebi->asal_kendaraan) }}"  placeholder="jayapura" required>
                @error('asal_kendaraan')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-3">
                <label for="AlamatSesuaiStnk" class="col-sm-6 col-form-label">Alamat STNK</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('alamat_sesuai_stnk') is-invalid @enderror" name="alamat_sesuai_stnk" id="AlamatSesuaiStnk" value ="{{ old('alamat_sesuai_stnk', $Ebi->alamat_sesuai_stnk) }}"  placeholder="jayapura" required>
                @error('alamat_sesuai_stnk')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

         <div class="col-3">
            <div class="mb-3">
                <label for="TipeKendaraan" class="col-sm-4 col-form-label">Tipe Kendaraan</label>
                <div class="col-sm-10">
                  <select class="form-select @error('tipe_kendaraan') is-invalid @enderror" name="tipe_kendaraan" aria-label="select example" required>
                    <option value="{{ $Ebi->tipe_kendaraan }}">{{ $Ebi->tipe_kendaraan }}</option>
                    <option value="Mobil">Mobil</option>
                    <option value="Motor">Motor</option>
                    <option value="Truck">Truck</option>
                    <option value="Bus">Bus</option>
                  </select>
                @error('asal_kendaraan')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="pemilik" class="col-sm-4 col-form-label">Pemilik</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('pemilik') is-invalid @enderror" name="pemilik" id="pemilik" value ="{{ old('pemilik', $Ebi->pemilik) }}"  placeholder="santianoJoe" required>
                @error('pemilik')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <div class="mb-3">
                <label for="no_telp" class="col-sm-4 col-form-label">No Telp</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" value ="{{ old('no_telp', $Ebi->no_telp) }}"  placeholder="santianoJoe" required>
                @error('no_telp')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

          <div class="col-3 ">
            <div class="mb-3">
               <label for="Gambar" class="col-sm-6 col-form-label">Gambar</label>
                <div class="col-sm-11">
                @if($Ebi->gambar)
                <img class="edit-preview img-fluid my-2 col-sm-5" src="{{ asset('storage/' . $Ebi->gambar) }}">
                @else
                <img class="edit-preview img-fluid my-2 col-sm-5">
                @endif
                <input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="EditGambar" name="gambar" aria-label="file example" onchange="previewEdit()">
                @error('gambar')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <div class="mb-3">
               <label for="Latitude" class="col-sm-2 col-form-label">Latitude</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="latitude" id="Latitude" value ="{{ old('latitude', $Ebi->latitude) }}"  placeholder="-6.193125" required>
                @error('latitude')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>
        
        <div class="col-3">
            <div class="mb-3">
               <label for="Longitude" class="col-sm-2 col-form-label">Longitude</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="longitude" id="Longitude" value ="{{ old('longitude', $Ebi->longitude) }}"  placeholder=" 106.821810" required>
                @error('longitude')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="NamaUser" class="col-sm-6 col-form-label">Nama Pegawai</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_user" id="NamaUser" value="{{ $Ebi->nama_user }}" readonly>
                @error('nama_user')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="mb-3">
                <label for="TglPendataan" class="col-sm-8 col-form-label">Tanggal Pendataan</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="tgl_pendataan" id="TglPendataan" value="{{ $Ebi->tgl_pendataan }}" readonly>
                @error('tgl_pendataan')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
        </div>

        
      </div>
      <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin data akan diubah?')">Edit</button>
  </form>
</div>

<script>
  // function previewGambar()
  // {
  //   const Gambar = document.querySelector('#Gambar');
  //   const GambarPreview = document.querySelector('.preview-gambar-edit');

  //   preview.style.display = 'block';

  //   const oFReader = new FileReader();
  //   oFReader.readAsDataURL(Gambar.files[0]);
  //   oFReader.onload = function(oFREvent) {
  //   preview.src = oFREvent.target.result;
  //   }
  // }
  function previewEdit(){
    const EditGambar = document.querySelector('#EditGambar');
    const EditPreview = document.querySelector('.edit-preview');

    EditPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(EditGambar.files[0]);
    oFReader.onload = function(oFREvent) {
    EditPreview.src = oFREvent.target.result;
    }

  }
</script>

@endsection
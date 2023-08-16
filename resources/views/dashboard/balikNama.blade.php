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

 <div class="container shadow-sm p-3 mb-4 bg-body rounded py-2">
    <div class="container-fluid p-2">
      @foreach($idNoPolisi as $inp)
        <form action="/dashboard/balik-nama/{{ $inp->id }}" method="post">
        @endforeach
          @method('put')
            @csrf

            @if(session()->has('successBalikNama'))
            <div class="container-fluid py-2">
              <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('successBalikNama') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>
            @endif

            <div class="row justify-content-md-center g-3 d-flex">
                <div class="col-auto">
                    <label for="Status" class="form-label">Nomor Polisi</label>
                    <select class="form-select" id="SelectNopol" name="no_polisi" aria-label="Default select example" required>
                      @foreach($noPolisi as $np)
                      @if(old('no_polisi') === $np->no_polisi)
                        <option value="{{ $np->no_polisi }}" selected>{{ $np->no_polisi }}</option>
                      @else
                        <option value="{{ $np->no_polisi }}">{{ $np->no_polisi }}</option>
                      @endif
                        @endforeach
                      </select>
                </div>
                <div class="col-auto">
                    <label for="Status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" id="SelectStatus" name="status" aria-label="Default select example" required>
                        <option value="">Choose Status</option>
                        <option value="Sudah Balik Nama">Sudah Balik Nama</option>
                        <option value="Belum Balik Nama">Belum Balik Nama</option>
                      </select>
                       @error('status')
                        <div class="invalid-feedback ">
                          {{ $message }}
                        </div>
                        @enderror
                </div>
                 <div class="col-auto align-self-center mt-4">
                    <button type="submit" class="btn btn-primary">Balik Nama</button>
                 </div>
            </div>
        </form>
    </div>
</div>

<div class="container-fluid bg-dakr mt-2">
  <div class="card-body">
    <table class="table row-bordered" style="width: 100%" id="tablePrint">
      <thead>
        <tr class="table-secondary">
          <th>No</th>
          <th>No Polisi</th>
          <th>Pemilik</th>
          <th>Nama Pegawai</th>
          <th class="text-center">Tanggal Pendataan</th>
          <th>Status</th>
        </tr>
        <tbody>
          @foreach($balikNama as $bn)
            <tr>
               <td>{{ $loop->iteration }}</td>
               <td>{{ $bn->no_polisi }}</td>
               <td>{{ $bn->pemilik }}</td>
               <td>{{ $bn->nama_user }}</td>
               <td class="text-center">{{ $bn->tgl_pendataan }}</td>
               <td>{{ $bn->status }}</td>
              </tr>
            @endforeach
        </tbody>
      </thead>
    </table>
  </div>
</div>



@endsection
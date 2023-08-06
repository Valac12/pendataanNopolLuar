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
     <div class="d-flex justify-content-end px-4 py-2">
        <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalPlat">+</button>
    </div>
 </div>

<div class="container px-3 py-2">
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>
 
 <div class="container">
  <div class="card-body px-3 py-2">
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
                  <button class="badge bg-warning border-0">
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
            @endforeach
            </tr>
 </div>
 </div>

<!-- Modal -->
<div class="modal fade" id="modalPlat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaKodePlat" method="post">
            @csrf
            <div class="mb-3 row">
                <label for="KodePlat" class="col-sm-2 col-form-label">Kode Plat</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name="kode_plat" id="KodePlat" placeholder="001" autofocus required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="WarnaPlat" class="col-sm-2 col-form-label">Warna Plat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="warna_plat" id="WarnaPlat" placeholder="hitam" required>
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
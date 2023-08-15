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
           <li class="breadcrumb-item"><a class="fw-light" href="/kelolaUsers">Kelola User</a></li>
           <li class="breadcrumb-item active fw-light" aria-current="page">{{ $tittle }}</li>
         </ol>
       </nav>
     </div>
   </div>

   
   <div class="container-xl px-4">
   <hr class="mt-0">
    <div class="row py-4 justify-content-center">
        <div class="col-xl-9 ">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header py-2">
                    <div class="row">

                       {{-- validasi notifikasi error --}}
                      @if ($errors->any())
                      <div class="container-fluid py-2">
                        <div class="alert alert-danger alert-dismissible dafe show" role="alert">
                          Input data gagal, cek form edit data!   
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                      @endif

                      {{-- Validasi berhasil update --}}
                      @if(session()->has('successUpUser'))
                      <div class="container px-3 py-2">
                       <div class="alert alert-warning alert-dismissible fade show" role="alert">
                       {{ session('successUpUser') }}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                     </div>
                     @endif

                      {{-- alert password tidak sesuai --}}
                      @if(session()->has('faillUpUser'))
                      <div class="container-fluid py-2">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('faillUpUser') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      </div>
                      @endif

                        <div class="col py-2">
                            Account Details
                        </div>
                        <div class="col text-end">
                            <button class="btn btn-warning border-0 m-1 text-white" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalEditAdmin{{ $userId->id }}">
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                                    <use xlink:href="#edit-window-1"> </use>
                                </svg>
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <!-- Form Group Nama-->
                        <div class="mb-3">
                            <label class="small mb-1" for="Nama">Nama</label>
                            <input class="form-control" id="Nama" type="text" value="{{ $userId->nama }}" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Username-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Username">Username</label>
                                <input class="form-control" id="Username" type="text" value="{{ $userId->username }}" readonly>
                            </div>
                            <!-- Form Group Password-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Password">Password</label>
                                <input class="form-control" id="Password" type="pass" value="{{ $userId->password }}" readonly>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Leve-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="Level">Level</label>
                                <input class="form-control" id="Level" type="text" value="{{ $userId->level }}" readonly>
                            </div>
                            <!-- Form Group Nama Level-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="NamaLevel">Nama Level</label>
                                <input class="form-control" id="NamaLevel" type="text" value="{{ $userId->nama_level }}" readonly>
                            </div>
                        </div>
                        <!-- Form Group Online_Offline-->
                        <div class="mb-3">
                            <label class="small mb-1" for="OnlineOffline">Online Offline</label>
                            <input class="form-control" id="OnlineOffline" type="text" value="{{ $userId->online_offline }}" readonly>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Tanggal Login-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="TanggalLogin">Tanggal Login</label>
                                <input class="form-control" placeholder="Null" id="TanggalLogin" type="text" value="{{ $userId->tgl_login }}" readonly>
                            </div>
                            <!-- Form Group Tanggal Logout-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="TanggalLogout">Tanggal Logout</label>
                                <input class="form-control" placeholder="Null" id="TanggalLogout" type="text" value="{{$userId->tgl_logout }}" readonly>
                            </div>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group Created At -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="CreatedAt">Created At</label>
                                <input class="form-control" id="CreatedAt" type="text" value="{{$userId->created_at }}" readonly>
                            </div>
                            <!-- Form Group Tanggal Updated At -->
                            <div class="col-md-6">
                                <label class="small mb-1" for="UpdatedAt">Updated At</label>
                                <input class="form-control" id="UpdatedAt" type="text" value="{{ $userId->updated_at }}" readonly   >
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div class="modal fade" id="modalEditAdmin{{ $userId->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaUsers/{{ $userId->id }}" method="post" class="was-validated needs-validation" novalidate>
          @method('put')
            @csrf
            <div class="mb-3 row postition-relative">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" placeholder="Joe bid" value ="{{ old('nama', $userId->nama) }}" autofocus required>
                @error('nama')
                <div class="invalid-feedback ">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
                <label for="Username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="Username" value ="{{ old('username', $userId->username) }}" placeholder="joebidz" required>
                @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row position-relative">
                <label for="Password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="Password" placeholder="****" required>
                <span class="badge text-bg-warning">Konfirmasi Password</span>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <div class="mb-3 row postition-relative">
              <label for="Level" class="col-sm-2 col-form-label">Level</label>
              <div class="col-sm-10">
                <select class="form-select @error('level') is-invalid @enderror" name="level" id="level" aria-label="select example" required>
                  <option value="{{ old('level', $userId->level) }}">{{ old('level', $userId->level) }}</option>
                  <option value="">2</option>
                </select>
                @error('level')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-3 row postition-relative">
              <label for="NamaLevel" class="col-sm-2 col-form-label">Nama Level</label>
              <div class="col-sm-10">
              <input type="text" class="form-control @error('nama_level') is-invalid @enderror" value="{{ old('nama_level', $userId->nama_level) }}" name="nama_level" id="NamaLevel" placeholder="Administrator | User" required readonly>
              @error('nama_level')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              </div>
          </div>
            <div class="mb-3 row postition-relative">
                <label for="OnlineOffline" class="col-sm-2 col-form-label">Online Offline</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="online_offline" id="OnlineOffline" value="Offline" readonly>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Edit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
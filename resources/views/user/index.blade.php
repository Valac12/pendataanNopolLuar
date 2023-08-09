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

 {{-- alert data berhasil ditambahkan --}}
 @if(session()->has('successCreateUser'))
 <div class="container-fluid py-2">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{ session('successCreateUser') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert data berhasil dihapus --}}
 @if(session()->has('successDelUser'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successDelUser') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
  {{-- alert data berhasil diupdate --}}
 @if(session()->has('successUpUser'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('successUpUser') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
  @endif
 @if(session()->has('faillUpUser'))
 <div class="container-fluid py-2">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('faillUpUser') }}
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

  

 <div class="container-fluid w-100 ">
  <div class="d-flex justify-content-end py-2">
    <button class="btn btn-primary btn-md border-3" type="button" title="Tambah Data" data-bs-toggle="modal" data-bs-target="#modalUser">+ Tambah Data</button>
  </div>
  <div class="card-body py-2">
    
  <table id="example" class="row-border" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Level</th>
                <th>Online/Offline</th>
                <th>Tgl Login</th>
                <th>Tgl Logout</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($user as $ua)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ua->nama }}</td>
                <td>{{ $ua->nama_level }}</td>
                <td>{{ $ua->online_offline }}</td>
                <td>{{ $ua->tgl_login }}</td>
                <td>{{ $ua->tgl_logout }}</td>
                <td>{{ $ua->created_at }}</td>
                <td>
                  <button class="badge bg-warning border-0 m-1" title="Edit Data" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $ua->id }}">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#edit-window-1"> </use>
                        </svg>
                    </button>
                    <form action="/kelolaUsers/{{ $ua->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                    <button class="badge bg-danger border-0 m-1" type="submit" onclick="return confirm('ingin menghapus data ?')">
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
<div class="modal fade" id="modalUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaUsers" method="post" class="was-validated needs-validation" novalidate>
            @csrf
            <div class="mb-3 row postition-relative">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" placeholder="Joe bid" value ="{{ old('nama') }}" autofocus required>
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
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="Username" value ="{{ old('username') }}" placeholder="joebidz" required>
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
                  <option value="">Choose Level</option>
                  <option value="2">2</option>
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
              <input type="text" class="form-control @error('nama_level') is-invalid @enderror" name="nama_level" id="NamaLevel" placeholder="Administrator | User" required readonly>
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
                <input type="hidden" class="form-control" name="tgl_login" id="TglLogin" value="" readonly>
                <input type="hidden" class="form-control" name="tgl_logout" id="TglLogout" value="" readonly>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- End Of Modal Create --}}

<!-- Modal Edit -->
@foreach($user as $ua)
<div class="modal fade" id="modalEdit{{ $ua->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data {{ $tittle }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/kelolaUsers/{{ $ua->id }}" method="post" class="was-validated needs-validation" novalidate>
          @method('put')
            @csrf
            <div class="mb-3 row postition-relative">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="Nama" placeholder="Joe bid" value ="{{ old('nama', $ua->nama) }}" autofocus required>
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
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="Username" value ="{{ old('username', $ua->username) }}" placeholder="joebidz" required>
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
                  <option value="{{ old('level', $ua->level) }}">{{ old('level', $ua->level) }}</option>
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
              <input type="text" class="form-control @error('nama_level') is-invalid @enderror" value="{{ old('nama_level', $ua->nama_level) }}" name="nama_level" id="NamaLevel" placeholder="Administrator | User" required readonly>
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
        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
{{-- End Of Modal Edit --}}
 <script>
  // const level = document.querySelector('#level');
  // const NamaLevel = document.querySelector('#NamaLevel');

  // level.addEventListener('change', function() {
  //   var value = level.value;
  //   switch(value){
  //     case '1' :
  //       NamaLevel.value = 'Administrator';
  //       break;
  //     case '2' :
  //       NamaLevel.value = 'User';
  //       break;
  //     default :
  //     NamaLevel.value = ''
  //   }
  // });
  const level = document.querySelector('#level');
  const NamaLevel = document.querySelector('#NamaLevel');

  level.addEventListener('change', function() {
    var value = level.value;
    if(value === '2') {
      NamaLevel.value = 'User';
    }else{
      NamaLevel.value = '';
    }
  });
 </script>

@endsection
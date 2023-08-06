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

 <div class="container">
  <div class="card-body px-3 py-2">
  <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Online/Offline</th>
                <th>Tgl Login</th>
                <th>Tgl Logout</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($userAdmin as $ua)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ua->nama }}</td>
                <td>{{ $ua->username }}</td>
                <td>{{ $ua->online_offline }}</td>
                <td>{{ $ua->tgl_login }}</td>
                <td>{{ $ua->tgl_logout }}</td>
                <td>{{ $ua->created_at }}</td>
                <td>
                  <button class="badge bg-warning border-0">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#edit-window-1"> </use>
                        </svg>
                    </button>
                    <button class="badge bg-danger border-0">
                        <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#bin-1"> </use>
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
 </div>
 </div>


@endsection
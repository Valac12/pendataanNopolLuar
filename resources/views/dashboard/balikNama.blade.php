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

 <div class="container shadow-sm p-3 mb-5 bg-body rounded py-2">
    <div class="container-fluid p-2">
        <form action="#" method="get">
            @csrf
            <div class="row justify-content-md-center g-3 d-flex">
                <div class="col-auto">
                    <label for="Status" class="form-label">Nomor Polisi</label>
                    <select class="form-select" id="SelectNopol" aria-label="Default select example" required>
                        <option value="">Choose..</option>
                        @foreach($noPolisi as $np)
                        <option value="{{ $np->no_polisi }}">{{ $np->no_polisi }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-auto">
                    <label for="Status" class="form-label">Status</label>
                    <select class="form-select" id="SelectNopol2" aria-label="Default select example" required>
                        <option value="">Choose..</option>
                        <option value="Sudah Balik Nama">Sudah Balik Nama</option>
                        <option value="Belum Balik Nama">Belum Balik Nama</option>
                      </select>
                </div>
                 <div class="col-auto align-self-center mt-5">
                    <button type="submit" class="btn btn-primary">Balik Nama</button>
                 </div>
            </div>
        </form>
    </div>
</div>



@endsection
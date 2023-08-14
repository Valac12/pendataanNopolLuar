<nav class="side-navbar z-index-40">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center py-4 px-3"><img class="avatar shadow-0 img-fluid rounded" src="{{ asset('img/user-profiles.png') }}" alt="...">
      <div class="ms-3 title">
        <h1 class="h4 mb-2">{{ auth()->user()->nama }}</h1>
        <p class="text-sm text-gray-500 fw-light mb-0 lh-1">{{ auth()->user()->nama_level }}</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus-->
    <span class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
    <ul class="list-unstyled py-4">
      <li class="sidebar-item {{ ($tittle === "Home" ? 'active' : '') }}"><a class="sidebar-link" href="/dashboard"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#real-estate-1"> </use>
          </svg>Home</a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="#exampledropdownDropdown" data-bs-toggle="collapse"> 
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#chart-1"> </use>
            </svg>Kelola Data </a>
          <ul class="collapse list-unstyled " id="exampledropdownDropdown">
            <li>
              <a class="sidebar-link" href="/kelolaUsers"><svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#user-1"></use>
              </svg> User </a>
            </li>
            <li>
              <a class="sidebar-link" href="/kelolaAdmin"><svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#user-details-1"></use>
              </svg> Admin </a>
            </li>
            <li>
              <a class="sidebar-link" href="/kelolaKodePlat"><svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#certificate-1"></use>
              </svg> Kode Plat </a>
            </li>
          </ul>
        </li>
      <li class="sidebar-item {{ ($tittle === "Pendataan Nomor Polisi Luar" ? 'active' : '') }}"><a class="sidebar-link" href="/pendataanNopol"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#survey-1"> </use>
          </svg>Pendataan NOPOL </a>
      </li>
      <li class="sidebar-item {{ ($tittle === "Cetak Data" ? 'active' : '') }}"><a class="sidebar-link" href="/cetakData"> 
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#document-1"> </use>
          </svg>Cetak Data </a></li>
    </ul>
  </nav>
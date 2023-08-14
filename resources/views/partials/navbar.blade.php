<header class="header z-index-50">
        <nav class="nav navbar py-3 px-0 shadow-sm text-white position-relative">
          <div class="container-fluid w-100">
            <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a class="navbar-brand d-none d-sm-inline-block" href="index.html">
                  <div class="brand-text d-none d-lg-inline-block"><img src="{{ asset('img/logo-papua.png') }}" class="avatar rounded shadow-0 img-fluid bg-dark" alt=""><span>Pendataan</span> <strong>NOPOL</strong></div>
                  <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div></a>
                <!-- Toggle Button-->
                <a class="menu-btn active" id="toggle-btn" href="#"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item">
                    <form action="/logout" method="post">
                    @csrf
                    <button type="submit" onclick="return confirm('Yakin ingin keluar ?')" class="btn btn-outline-secondary nav-link text-white d-none d-sm-inline">Logout
                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                      <use xlink:href="#security-1"> </use>
                    </svg></a>
                    </button>
                    </form>
                </li>      
              </ul>
            </div>
          </div>
        </nav>
      </header>
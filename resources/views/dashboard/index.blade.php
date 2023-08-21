@extends('layouts.main')
@section('content')
 <!-- Page Header-->
 <header class="bg-white shadow-sm px-4 py-3 z-index-20">
  <div class="container-fluid px-0">
    <h2 class="mb-0 p-1">Dashboard</h2>
  </div>
</header>
<!-- Dashboard Counts Section-->
<section class="pb-0">
  <div class="container-fluid">
    <div class="card mb-0">
      <div class="card-body">
        <div class="row gx-5 bg-white">
          <!-- Item -->
          <div class="col-xl-3 c  ol-sm-6 py-4 border-lg-end border-gray-200">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-violet">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#user-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Pegawai</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-violet" role="progressbar" style="width: {{ $pegawai }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{ $pegawai }}</strong></div>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-red">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#survey-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nomor Polisi<br> Luar</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-red" role="progressbar" style="width: {{ $nopol }}%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{ $nopol }}</strong></div>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-green">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#numbers-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nopol Sudah<br>Balik Nama</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-green" role="progressbar" style="width: {{ $nopolStatus1 }}%; height: 4px;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{ $nopolStatus1 }}</strong></div>
            </div>
          </div>
          <!-- Item -->
          <div class="col-xl-3 col-sm-6 py-4">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-orange">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                  <use xlink:href="#list-details-1"> </use>
                </svg>
              </div>
              <div class="mx-3">
                <h6 class="h4 fw-light text-gray-600 mb-3">Nopol Belum<br>Balik Nama</h6>
                <div class="progress" style="height: 4px">
                  <div class="progress-bar bg-orange" role="progressbar" style="width: {{ $nopolStatus2 }}%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="number"><strong class="text-lg">{{ $nopolStatus2 }}</strong></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- <!-- Dashboard Header Section    -->
<section class="pb-0">
  <div class="container-fluid">
    <div class="row align-items-stretch">
      <!-- Statistics -->
      <div class="col-lg-3 col-12">
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-red"><i class="fas fa-tasks"></i></div>
              <div class="ms-3"><strong class="text-lg d-block lh-1 mb-1">234</strong><small class="text-uppercase text-gray-500 small d-block lh-1">Applications</small></div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-green"><i class="far fa-calendar"></i></div>
              <div class="ms-3"><strong class="text-lg d-block lh-1 mb-1">152</strong><small class="text-uppercase text-gray-500 small d-block lh-1">Interviews</small></div>
            </div>
          </div>
        </div>
        <div class="card mb-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-orange"><i class="far fa-paper-plane"></i></div>
              <div class="ms-3"><strong class="text-lg d-block lh-1 mb-1">147</strong><small class="text-uppercase text-gray-500 small d-block lh-1">Forwards</small></div>
            </div>
          </div>
        </div>
      </div>
      <!-- Line Chart            -->
      <div class="col-lg-6 col-12">
        <div class="card mb-0 h-100">
          <div class="card-body">
            <canvas id="lineCahrt"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-12">
        <!-- Bar Chart   -->
        <div class="card">
          <div class="card-body"><strong class="h2 mb-0 d-block text-violet">95%</strong><small class="text-gray-500 small text-uppercase d-block mb-3">Current Server Uptime</small>
            <canvas id="barChartHome"></canvas>
          </div>
        </div>
        <!-- Numbers-->
        <div class="card mb-0">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <div class="icon flex-shrink-0 bg-green"><i class="fas fa-chart-area"></i></div>
              <div class="ms-3"><strong class="text-lg mb-0 d-block lh-1">99.9%</strong><small class="text-gray-500 small text-uppercase">Success Rate</small></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
@endsection
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $tittle }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
   <link rel="stylesheet" href="{{ asset('vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/logo.ico') }}">
    {{-- Bootstrap icons --}}
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    {{-- style for datatables --}}
    <style>
      div.dt-button-collection {
          width: 400px;
      }
      
      div.dt-button-collection button.dt-button {
          display: inline-block;
          width: 32%;
      }
      div.dt-button-collection button.buttons-colvis {
          display: inline-block;
          width: 49%;
      }
      div.dt-button-collection h3 {
          margin-top: 5px;
          margin-bottom: 5px;
          font-weight: 100;
          border-bottom: 1px solid rgba(150, 150, 150, 0.5);
          font-size: 1em;
          padding: 0 1em;
      }
      div.dt-button-collection h3.not-top-heading {
          margin-top: 10px;
      }
    </style>

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      @include('partials.navbar')
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        @include('partials.sidebar')
        <div class="content-inner w-100 bg-white sm">
            @yield('content')
            <!-- Page Footer-->
            @include('partials.footer')
          </div>
        </div>
      </div>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/just-validate/js/just-validate.min.js') }}"></script>
    <script src="{{ asset('vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('js/charts-home.js') }}"></script>
    {{-- DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
    
    <!-- Main File-->
    <script src="{{ asset('js/front.js') }}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite("{{ asset('icons-orion.svg') }}"); 
      
      
    </script>
    <script>
      // new DataTable('#example');
      $(document).ready(function() {
      var table = $('#example').DataTable( {
          lengthChange: false,
          responsive: true,
          // dom: 'Bfrtip',
          // buttons: [
          //   {
          //   extend: 'copy',
          //   text: 'Copy to clipboard'
          //   },
          //   {
          //     extend: 'print',
          //     filename: 'Report',
          //     title: 'Bappenda',
          //     messageTop: 'Badan Pendapatan Provinsi Jayapura'
          //   },
          //   'excel',
          //   'pdf',
          //   ]
          });
          table.buttons().container()
         .appendTo( '#example_wrapper .col-md-6:eq(0)' );  
    } );
    
    $(document).ready(function() {
      var tableCetak = $('#tablePrint').DataTable({
        lengthChange: false,
        responsive: true,
        dom: 'Bfrtip',
        // searching: false,
        buttons: [
        {
         text: 'Print',
         extend: 'print',
         filename: 'Report',
         title: 'Bappenda',
         messageTop: 'Badan Pendapatan Provinsi Jayapura',
         exportOptions: {
            columns: ':visible',
         },
        },
         {
          text: 'Table Control',
          extend: 'colvis',
          collectionLayout: 'two-column',
         }
        ],
        columnDefs: [ {
            targets: [-4,-5,-6,-7,-8],
            visible: false
        } 
        ],
      });
      table.buttons().container()
         .appendTo( '#example_wrapper .col-md-6:eq(0)' ); 
    });

    </script>

    {{-- Select 2 --}}
      <script>
        $(document).ready(function() {
          $('#SelectNopol').select2({
            theme: 'bootstrap-5',
            width: 'resolve'
          });
          $('#SelectStatus').select2({
            theme: 'bootstrap-5',
             width: 'resolve'
          });
      });
      </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>

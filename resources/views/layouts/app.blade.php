<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!-- Tell the browser to be responsive to screen width -->
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <link rel="shortcut icon" href="{{ asset('dist/img/logo_gs.png') }}" type ="image/x-icon">
 <title>Decoraciones GS</title>
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>$.widget.bridge('uibutton', $.ui.button)</script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
  <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      
    });
  });
</script>
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/store.gs.test" role="button">
        <i class="fas fa-store"></i> Ver Sitio Web
        </a>
    </li>
    <!-- Notificaciones -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i id="Bell" class="fas fa-bell"></i>
            @if(count(Auth::user()->unreadNotifications))
              <span class="badge badge-warning">
                {{ count(Auth::user()->unreadNotifications) }}
              </span>
            @endif
      </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    @forelse(Auth::user()->unreadNotifications as $notification)
      <a href="{{route('leerNotificaciones')}}" class="dropdown-item">
        <!--Notificaciones sin leer -->
        <i class="fas fa-shopping-basket mr-2"></i> El cliente <Strong> {{ $notification->data['cliente_nombre']  }} </Strong>
        <Strong> {{ $notification->data['cliente_apellido']  }} </Strong> con <br>código de cliente #:
        <Strong> {{ $notification->data['codigo_cliente']  }} </Strong> <br>ha realizado un nuevo pedido <br>
        pendiente de confirmación con <br>código #:
          <Strong> {{ $notification->data['pedido']  }} </Strong><br>
            <span class="mr-2 float-right text-muted text-sm">{{ $notification->created_at->diffForHumans()  }}</span>
            </a><br>
          <div class="dropdown-divider"></div>
    @empty
      <span class="ml-5 pull-right text-muted text-sm"><strong>No hay notificaciones nuevas</strong></span>
    @endforelse

          <a href="{{ route('markAsRead') }}" class="dropdown-item dropdown-footer">Marcar todas como leídas</a>
        </div>
    </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="dropdown" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesión
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{!!url ('/')!!}" class="brand-link">
      <i class="fas fa-store"></i>
      <span class="brand-text font-weight-light"> Decoraciones GS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/userMain.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('/')}}" class="d-block">
            @guest
            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
            @else
            {{ Auth::user()->name }}
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
            @endguest
        </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <form action="{{route('buscarPedido')}}" method="POST" >
        @csrf
      <div class="form-inline">
        <div class="input-group" >
          <input class="form-control form-control-sidebar" id="busqueda" name="busqueda" type="search" placeholder="Buscar Pedido" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
    </form>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">ADMINISTRACIÓN</li>
              <li class="nav-item has-treeview menu-close">
              <a href="{{route('leerNotificaciones')}}" class="nav-link">
                  <i class="fas fa-bell"></i>
                  <p>
                    Notificaciones
                    <i class="right fas fa-angle-double-down"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
              </li>
               <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link">
                  <i class="fas fa-shopping-cart"></i>
                  <p>
                    Tienda
                    <i class="right fas fa-angle-double-down"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{!!url('venta')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Ventas 
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{!!url('factura')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Facturas 
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                   <a href="{!!url('cliente')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                       Clientes
                      </p>
                    </a>
                 </li>
                </ul>
              </li>
              
              <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link">
                  <i class="fas fa-clipboard-list"></i>
                  <p>
                    Pedidos
                    <i class="right fas fa-angle-double-down"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{!!url('pedido-pendiente')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pedidos por Confirmar 
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{!!url('pedido-proceso')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Pedidos en Proceso
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                   <a href="{!!url('pedido-enviado')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                       Pedidos Enviados
                      </p>
                    </a>
                 </li>
                 <li class="nav-item">
                  <a href="{!!url('pedido-entregado')!!}" class="nav-link active">
                     <i class="far fa-circle nav-icon"></i>
                     <p>
                      Pedidos Entregados
                     </p>
                   </a>
                </li>
                <li class="nav-item">
                  <a href="{!!url('pedido-cancelado')!!}" class="nav-link active">
                     <i class="far fa-circle nav-icon"></i>
                     <p>
                      Pedidos Cancelados
                     </p>
                   </a>
                </li>
                </ul>
              </li>
              <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link">
                <i class="fas fa-boxes"></i>
                  <p>
                    Inventario
                    <i class="right fas fa-angle-double-down"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{!!url('combo')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Combos 
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{!!url('producto')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Productos 
                      </p>
                    </a>
                  </li>
          </ul>
        </li>  
        <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link">
                <i class="fas fa-photo-video"></i>
                  <p>
                    Media
                    <i class="right fas fa-angle-double-down"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">      
                  <li class="nav-item">
                    <a href="{!!url('publicidad')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Publicidad 
                      </p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link">
                  <i class="fas fa-bullhorn"></i>
                  <p>
                    Descuentos
                    <i class="right fas fa-angle-double-down"></i>
                    <span class="badge badge-info right"></span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{!!url('descuento')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Tipos de Descuentos
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{!!url('itemDescuento')!!}" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        En Ítems
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
        <li class="nav-header">REPORTES</li>     
        <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="fas fa-file-pdf"></i>
              <p>
                Reportes PDF
                <i class="right fas fa-angle-double-down"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{!!url('reporte-pdf-pedido')!!}" class="nav-link active">
                  <i class="far fa-circle"></i>
                  <p>Pedidos</p>
                </a>
              </li>      
              <li class="nav-item">
                <a href="{!!url('reporte-pdf-venta')!!}" class="nav-link active">
                  <i class="far fa-circle"></i>
                  <p>Ventas</p>
                </a>
              </li>
              
            </ul>
            <li class="nav-item has-treeview menu-close">
              <a href="#" class="nav-link">
                <i class="fas fa-file-excel"></i>
                <p>
                  Reportes Excel
                  <i class="right fas fa-angle-double-down"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{!!url('reporte-excel-venta')!!}" class="nav-link active">
                    <i class="far fa-circle"></i>
                    <p>Ventas </p>
                  </a>
                </li>
              </ul>

            <li class="nav-header">CONFIGURACIÓN</li> 
            <li class="nav-item has-treeview">
              <a href="{!! url('empresa/create')!!}" class="nav-link">
                <i class="fas fa-address-card"></i>
                <p>
                  Empresa
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{!! url('cuenta')!!}" class="nav-link">
                <i class="fas fa-piggy-bank"></i>
                <p>
                  Cuentas Bancarias
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{!! url('ciudad')!!}" class="nav-link">
                <i class="far fa-building"></i>
                <p>
                  Ciudades de Entrega
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="{!! url('folio')!!}" class="nav-link">
                <i class="fas fa-file-invoice"></i>
                <p>
                 Facturación
                </p>
              </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <section class="header">
          @yield('header') <!-- /.content -->
       </section>
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
     @if(session()->has('message'))
            <div class="alert {{session('alert') ?? 'alert-info'}}">
                {{ session('message') }}
            </div>
     @endif
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        @yield('content') <!-- /.content -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021</a>.</strong>
    Todos los derechos de Autor Reservados
    <div class="float-right d-none d-sm-inline-block">
      <b>Versión</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
</div>
<!-- ./Necesario para notificaciones -->
    @yield('scripts')
</body>
</html>

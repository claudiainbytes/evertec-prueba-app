@extends('layouts.admin-app')
@section('content')
 <!-- Page Wrapper -->
 <div id="wrapper">

 @yield('content', View::make('admin.dashboard.sidebar', ['data' => $data] )) 

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    @yield('content', View::make('admin.dashboard.top-bar', ['data' => $data] )) 

    <!-- Begin Page Content -->
    <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-2 text-gray-800">Órdenes de compra</h1>
     <!--a href="{{ url('/admin/dashboard/usuarios/xls') }}" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Descargar Leads</a-->
          <p class="mb-4"></p>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Compras registradas</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">País</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Acción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">País</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Acción</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($data->records as $k => $v)
                    <tr>
                        <th scope="row">{{ $v->id }}</th>
                        <td>{{ $v->nombres }}</td>
                        <td>{{ $v->apellidos }}</td>
                        <td>{{ $v->email }}</td>
                        <td>{{ $v->pais }}</td>
                        <td>{{ $v->created_at }}</td>
                        <td>Ver Perfil</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div class="row">
                <div class="col-12 mb-3">
                  <div class="d-flex justify-content-center">
                    
                  </div>  
                </div>
              </div>

            </div>
          </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  @yield('content', View::make('admin.dashboard.footer', ['data' => $data] )) 

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
@yield('content', View::make('admin.dashboard.logout-modal', ['data' => $data] )) 
@endsection

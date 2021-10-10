<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bienvenido a {{ env('APP_TITLE')}}</h1>
</div>
<!-- Content Row -->
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
  <a href="{{ url('/admin/dashboard/orders') }}">  
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Módulo</div>
          <div class="h5 mb-0 font-weight-bold text-primary">Órdenes de compra</div>
        </div>
        <div class="col-auto">
          <i class="fas fa-folder fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
  </a>
</div>
</div>
<!-- Content Row -->
<div class="row">
  <div class="col-lg-12 mb-4">
    <!-- Approach -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Acerca de</h6>
      </div>
      <div class="card-body">
        <p>Plataforma de administración para {{ env('APP_TITLE') }}.</p>
        <p class="mb-0"></p>
      </div>
    </div>
  </div>
</div>
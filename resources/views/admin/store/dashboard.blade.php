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

    @yield('content', View::make('admin.dashboard.main-content', ['data' => $data] ))


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
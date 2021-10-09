@extends('layouts.admin-app')
@section('content')
<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <!--div class="col-lg-6 d-none d-lg-block bg-login-image"></div-->
                        <div class="col-lg-12">
                                <div class="p-5">
                                        <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4">BIENVENIDO</h1>
                                        </div>
                                        <form action="{{ url('/admin/login/validar') }}" method="post" class="user inicio-sesion needs-validation" novalidate>
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                        <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="E-mail" value="{{ old('email') }}" id="email" placeholder="E-mail" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                                        <div class="valid-feedback">Válido.</div>
                                                        <div class="invalid-feedback">Por favor completa este campo.</div>
                                                </div>     
                                                <div class="form-group">
                                                        <input type="password" class="form-control form-control-user" id="contrasena" id="exampleInputPassword" placeholder="Contraseña" placeholder="Contraseña" name="password" required pattern=".{6,}">
                                                        <div class="valid-feedback">Válido.</div>
                                                        <div class="invalid-feedback">Por favor completa este campo.</div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                                                <!--a href="{{ url('/admin/login/forgot') }}"  class="btn btn-primary btn-user btn-block">¿Olvidaste la contraseña?</a-->
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                        <a class="small" href="{{ url('/') }}">Ir al home</a>
                                </div>
                        </div>
                        </div>
                        </div>
                </div>
                </div>
        </div>
</div>              
@endsection
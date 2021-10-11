@extends('layouts.store-app')
@section('content')
<main id="main">
<section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Conferencia</h2>
          <p>{{ env('PRODUCT_NAME') }}</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lugar:</h4>
                <p>Autopista Norte 127</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Fecha</h4>
                <p>Octubre 20, 2021 4:00 p.m.</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Precio:</h4>
                <p>$150.000</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31811.102904708467!2d-74.04852431574707!3d4.702495310105131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ab4e84539b5%3A0x7acdf43fcf15b420!2sMcDonald&#39;s%20Calle%20125!5e0!3m2!1ses!2sco!4v1633841447829!5m2!1ses!2sco" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="" method="post" role="form" class="php-email-form">
                {{ csrf_field() }}
                <div class="form-group mt-3">
                  <h4>Estado de la compra</h4>
                  <h4><strong>{{ $data->estado_compra }}</strong></h4>
                  <hr>
                  <p>Detalle de la compra:</p>
                  <ul>
                  <li><strong>Nombres: </strong> {{ $data->order->customer_name }}</li>
                  <li><strong>Email: </strong> {{ $data->order->customer_email }}</li>
                  <li><strong>Mobile: </strong>{{ $data->order->customer_mobile }}</li>
                  <li><strong>Producto: </strong>{{ env('PRODUCT_NAME') }}</li>
                  <li><strong>Precio: </strong>@money(env('PRODUCT_PRICE'))</li>
                  </ul>
                </div>
              @switch($data->estado_compra)
                @case("Rechazada")
                  <div class="text-center"><a href="{{ url('/') }}">Ir al inicio</a></div>
                  @break
                @case("Pendiente")
                  <div class="text-center"><a href="{{ $data->order->processURL }}">Continue con el pago</a></div>
                  @break
                @case("Pagada")
                  <div class="text-center"><a href="{{ url('/') }}">Finalizar</a></div>
                  @break
              @endswitch
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

@endsection
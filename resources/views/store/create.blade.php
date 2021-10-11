@extends('layouts.store-app')
@section('content')
             
<main id="main">

<!-- ======= Contact Us Section ======= -->
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
            <form action="{{ url('/orders/checkout') }}" method="post" role="form" class="php-email-form">
                {{ csrf_field() }}
                <div class="form-group mt-3">
                  <label for="name">Nombre</label>
                  <input type="text" name="customer_name" class="form-control" id="name" placeholder="Nombre" required>
                </div>
                <div class="form-group mt-3">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="customer_email" id="email" placeholder="Email" required>
                </div>
                <div class="form-group mt-3">
                  <label for="name">Teléfono</label>
                  <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Teléfono" required>
                </div>
                <input type="hidden" name="product_name" value="{{ env('PRODUCT_NAME') }}">
                <input type="hidden" name="product_price" value="{{ env('PRODUCT_PRICE') }}">
                <div class="my-3">
                  <div class="loading">Cargando...</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Continuemos a proceder el pago...</div>
                </div>
              <div class="text-center"><button type="submit">Pagar</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

    </main><!-- End #main -->

@endsection
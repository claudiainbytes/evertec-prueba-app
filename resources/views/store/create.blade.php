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
          @yield('content', View::make('store.product-detail', ['data' => $data] ))
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
                  <input type="number" name="customer_mobile" class="form-control" id="mobile" placeholder="Teléfono" required>
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
    </section>
    </main>
@endsection
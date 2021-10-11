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
            <form action="{{ url('/orders/confirm') }}" method="post" role="form" class="php-email-form">
                {{ csrf_field() }}
                <div class="form-group mt-3">
                  <h4>Detalles de la compra</h4>
                  <ul>
                  <li><strong>Nombres: </strong> {{ $data->customer_name }}</li>
                  <li><strong>Email: </strong> {{ $data->customer_email }}</li>
                  <li><strong>Mobile: </strong>{{ $data->customer_mobile }}</li>
                  <li><strong>Producto: </strong>{{ env('PRODUCT_NAME') }}</li>
                  <li><strong>Precio: </strong>@money(env('PRODUCT_PRICE'))</li>
                  </ul>
                </div>
                <input type="hidden" name="customer_name" value="{{ $data->customer_name }}">
                <input type="hidden" name="customer_email" value="{{ $data->customer_email }}">
                <input type="hidden" name="customer_mobile" value="{{ $data->customer_mobile }}">
                <input type="hidden" name="product_name" value="{{ env('PRODUCT_NAME') }}">
                <input type="hidden" name="product_price" value="{{ env('PRODUCT_PRICE') }}">
                <div class="my-3">
                  <div class="loading">Cargando...</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Continuemos a proceder el pago...</div>
                </div>
              <div class="text-center"><button type="submit">Confirmar pago</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
    </main>
@endsection
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
            <form action="" method="post" role="form" class="php-email-form">
                {{ csrf_field() }}
                <div class="row">
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
                </div>  
              @switch($data->estado_compra)
                @case("Rechazada")
                  <div class="row">
                    <div class="form-group mt-3">
                      <div class="text-center"><a href="{{ url('/') }}">Ir al inicio</a></div>
                    </div>
                  </div>
                  @break
                @case("Pendiente")
                  <div class="row">
                    <div class="form-group col-md-6">
                      <div class="text-center text-md-end"><a href="{{ $data->order->processURL }}">Continue con el pago</a></div>
                    </div>
                    <div class="form-group col-md-6 mt-3 mt-md-0">
                      <div class="text-center text-md-start"><a href="{{ url('/') }}">Finalizar</a></div>
                    </div>
                  </div>
                  @break
                @case("Pagada")
                  <div class="row">
                    <div class="form-group mt-3">
                      <div class="text-center"><a href="{{ url('/') }}">Finalizar</a></div>
                    </div>
                  </div>
                  @break
              @endswitch
            </form>
          </div>
        </div>
      </div>
    </section>
    </main>
@endsection
@extends('layouts.main')
@section('title', 'home')
@section('container')
<div class="row">
  <div class="col-md-12">
    <h1>Tooko</h1>
    <p>Penuhi kebutuhan belanjamu, dengan harga yang murah, aman, dan cepat dari berbagai toko di Indonesia.</p>
  </div>
</div>

<div class="col-md-12">
  <div class="row">
    @foreach ($products as $product)
      <div class="col-md-3 mb-3">
        <div class="card shadow" style="width: 18rem;">
          <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['image'] }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['description'] }}</p>
            <div class="row">
              <div class="col-3">
                <a href="{{ route('product', $product['id']) }}" class="btn btn-primary">Detail</a>
              </div>
              <div class="col-6">
                <form action="{{ route('add-cart') }}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $product['id'] }}">
                  <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                  <input type="hidden" name="product_name" value="{{ $product['name'] }}">
                  <input type="hidden" name="price" value="{{ $product['price'] }}">
                  <button type="submit" class="btn btn-warning">+ Keranjang</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

    
@endsection
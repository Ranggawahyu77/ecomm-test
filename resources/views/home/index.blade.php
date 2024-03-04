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
        <div class="card" style="width: 18rem;">
          <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['image'] }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product['name'] }}</h5>
            <p class="card-text">{{ $product['description'] }}</p>
            <a href="#" class="btn btn-primary">Detail</a>
            <a href="#" class="btn btn-warning">+ Keranjang</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

    
@endsection
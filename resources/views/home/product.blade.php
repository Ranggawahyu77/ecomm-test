@extends('layouts.main')
@section('title', $product['name'])
@section('container')
  <div class="row">
    <div class="col-md-12 mt-3">
      <a href="{{ route('home') }}" class="btn btn-primary mb-3">Kembali</a>
      <div class="row">
        <div class="col-md-4">
          <img src="{{ $product['image'] }}" class="img-fluid shadow-sm rounded border border-secondary-subtle" alt="{{ $product['image'] }}">
        </div>
        <div class="col-md-8">
          <h1>{{ $product['name'] }}</h1>
          <p>{{ $product['description'] }}</p>
          <p>Rp.{{ number_format($product['price'],0,".",".") }}</p>
          <div class="row">
            <div class="col-md-2">
              <form action="{{ route('checkout-proces', $product['id']) }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <input type="hidden" name="product_name" value="{{ $product['name'] }}">
                <input type="hidden" name="price" value="{{ $product['price'] }}">
                <button type="submit" class="btn btn-primary">Beli Sekarang</button>
              </form>
            </div>    
            <div class="col-md-4">
              <form action="{{ route('add-cart') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <input type="hidden" name="product_name" value="{{ $product['name'] }}">
                <input type="hidden" name="price" value="{{ $product['price'] }}">
                <button type="submit" class="btn btn-warning">Masukkan Keranjang</button>
              </form>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
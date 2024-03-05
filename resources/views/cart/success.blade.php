@extends('layouts.main')
@section('title', 'Success')
@section('container')

  <div class="d-flex justify-content-center">
    <div class="card">
      <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
        <h1 class="text-success">Pembayaran berhasil</h1>
        <p class="text-success">Terimakasih telah belanja ditempat kami😊</p>
        <a href="{{ route('cart') }}" class="btn btn-success">Lihat Transaksi</a>
      </div>
    </div>
  </div>
  
@endsection
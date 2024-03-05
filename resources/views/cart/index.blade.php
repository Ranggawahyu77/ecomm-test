@extends('layouts.main')
@section('title', 'Keranjang')
@section('container')

  <a href="{{ route('home') }}" class="btn btn-primary my-3">Kembali</a>

  {{-- table --}}
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Tanggal</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>


    <tbody>
      @forelse ($carts as $cart)
        <tr>
          <td>{{ $cart->product_name }}</td>

          <td>Rp{{ number_format($cart->price,0,".",".") }}</td>

          <td>
            @if ($cart->status == 'pending')
              <span class="badge bg-warning text-dark">{{ $cart->status }}</span>
            @elseif ($cart->status == 'success')
              <span class="badge bg-success">{{ $cart->status }}</span>
            @else
              <span class="badge bg-danger">{{ $cart->status }}</span>
            @endif
          </td>

          <td>{{ $cart->created_at }}</td>
          <td>
            @if ($cart->status == 'pending')
              <form action="{{ route('checkout-proces', $cart->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Check Out</button>
              </form>
            @endif
          </td>

          <td>
            <form method="POST" action="{{ route('remove-cart', $cart->id) }}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
            </form>
          </td>
        </tr>
        
      @empty
        <tr>
          <td colspan="4" class="text-center">Tidak ada transaksi</td>
        </tr>
      @endforelse
      
    </tbody>
  </table>
@endsection
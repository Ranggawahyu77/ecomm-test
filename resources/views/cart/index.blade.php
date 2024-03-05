@extends('layouts.main')
@section('title', 'Keranjang')
@section('container')
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Produk</th>
        <th scope="col">Harga</th>
        <th scope="col">Status</th>
        <th scope="col">Tanggal</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($carts as $cart)
        <tr>
          <td>{{ $cart->product_name }}</td>
          <td>{{ $cart->price }}</td>
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
          <td class="row">
            @if ($cart->status == 'pending')
              <form action="#" method="POST" class="col-3">
                @csrf
                <input type="hidden" name="id" value="{{ $cart->id }}">
                <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                <input type="hidden" name="price" value="{{ $cart->price }}">
                <button type="submit" class="btn btn-success">Bayar</button>
              </form>
            @endif
            <form method="POST" action="{{ route('remove-cart', $cart->id) }}" class="col-3">
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
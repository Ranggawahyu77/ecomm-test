@extends('layouts.main')
@section('title', 'Checkout')
@section('container')

  <div class="d-flex justify-content-center">
    <div class="card">
      <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
        Anda akan melakukan pembelian produk <strong>{{ $cart->product_name }}</strong> dengan harga
        <strong>Rp{{ number_format($cart->price,0,".",".") }}</strong>
        <button type="button" class="btn btn-primary mt-3" id="pay-button">
            Bayar Sekarang
        </button>
      </div>
    </div>
  </div>

@endsection

@section('scripts')

  {{-- script pembayaran midtrans --}}
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
      // SnapToken acquired from previous step
      snap.pay('{{ $cart->snap_token }}', {
        // Optional
        onSuccess: function(result){
          /* You may add your own js here, this is just example */ 
          window.location.href = '{{ route('checkout-succes', $cart->id) }}'
        },
        // Optional
        onPending: function(result){
          /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        // Optional
        onError: function(result){
          /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>

@endsection
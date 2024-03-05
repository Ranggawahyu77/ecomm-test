<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  // tampilan keranjang
  public function index()
  {
    $carts = Cart::where('user_id', Auth::user()->id)->get();

    return view('cart.index', compact('carts'));
  }


  // menambahkan item ke keranjang
  public function addCart(Request $request)
  {
    $cart = new Cart();

    $cart->user_id = Auth::user()->id;
    $cart->product_id = $request->product_id;
    $cart->product_name = $request->product_name;
    $cart->price = $request->price;

    $cart->save();
    return redirect('/dashboard');
  }


  // hapus item di keranjang
  public function destroy($id)
  {
    $cart = Cart::find($id);
    $cart->delete();
    return redirect('/cart');
  }


  // proses check out
  public function proces(int $id, Request $request)
  {
    $cart = Cart::where('id', $id)->first();

    if (!$cart) {
      $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->product_id = $request->product_id;
      $cart->product_name = $request->product_name;
      $cart->price = $request->price;

      $cart->save();
    }

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.serverKey');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = array(
      'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $cart->price,
      ),
      'customer_details' => array(
        'first_name' => Auth::user()->name,
        'email' => Auth::user()->email,
      ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    $cart->snap_token = $snapToken;
    $cart->save();

    return redirect()->route('checkout', $cart->id);
  }


  // halaman menunggu pembayaran
  public function checkout(Cart $cart, $id)
  {
    $cart = Cart::find($id);
    return view('cart.checkout', compact('cart'));
  }


  // pembayaran sukses
  public function success(Cart $cart, $id)
  {
    $cart = Cart::where('id', $id)->first();

    $cart->status = 'success';
    $cart->save();

    return view('cart.success', compact('cart'));
  }
}

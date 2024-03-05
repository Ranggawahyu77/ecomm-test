<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function index()
  {
    $carts = Cart::where('user_id', Auth::user()->id)->get();

    // $products = config('products');
    // $product = collect($products)->firstWhere('id', $carts->product_id);

    return view('cart.index', compact('carts'));
  }

  public function proces(Request $request)
  {
    $cart = new Cart();
    $cart->user_id = Auth::user()->id;
    $cart->product_id = $request->product_id;
    $cart->product_name = $request->product_name;
    $cart->price = $request->price;

    $cart->save();
    return redirect('/dashboard');
  }

  public function destroy($id)
  {
    $cart = Cart::find($id);
    $cart->delete();
    return redirect('/cart');
  }
}

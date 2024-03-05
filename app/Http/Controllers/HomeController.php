<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $products = config('products');
    return view('home.index', compact('products'));
  }

  public function show(int $id, Cart $cart)
  {
    $products = config('products');

    $product = collect($products)->firstWhere('id', $id);

    if (!$product) {
      return abort(404);
    }

    return view('home.product', compact('product', 'cart'));
  }
}

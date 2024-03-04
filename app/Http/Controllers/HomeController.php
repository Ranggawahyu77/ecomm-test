<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $products = config('products');
    return view('home.index', compact('products'));
  }

  public function show($id)
  {
    $products = config('products');

    $product = collect($products)->firstWhere('id', $id);

    return view('product', compact('product'));
  }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->orderBy('name')->take(5)->get();
        return view('welcome', compact('products'));
    }

    public function products()
    {
        $products = Product::latest()->orderBy('name')->take(5)->get();
        return view('products', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function showProduct(Product $product)
    {
        return view('show-product', compact('product'));
    }
}

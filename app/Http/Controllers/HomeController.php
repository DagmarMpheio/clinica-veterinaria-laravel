<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->orderBy('name')->take(5)->get();
        return view('welcome',compact('products'));
    }

    public function products()
    {
        $products = Product::latest()->orderBy('name')->take(5)->get();
        return view('products',compact('products'));
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('name')->simplePaginate(5);
        $productsCount = Product::count();

        return view('backend.products.index', compact('products', 'productsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();

        return view('backend.products.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $product = Product::create($data);

        //return dd($request->role);
        return redirect('/backend/products')->with("message", "Novo produto inserido com sucesso!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect('/backend/products')->with("message", "Produto actualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //apagar o produto
        $product->delete();


        return redirect("/backend/products")->with("message", "Usuário foi excluído com succeso!");
    }
}

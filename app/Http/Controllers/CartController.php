<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{    
    /** Logica relacionada ao carrinho de compras */

    //listar produtos no carrinho
    public function productCart()
    {
        return view('cart');
    }

    //add produto no carrinho
    public function addProductToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('cart', $cart);
        return redirect('/shopping-cart')->with('success', 'O produto foi adicionado no carrinho!');
    }

    //actualizar carrinho
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'O produto adicionado no carrinho.');
        }
    }

    //remover produto do carrinho
    public function deleteProductFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'O produto removido com sucesso.');
        }
    }
}

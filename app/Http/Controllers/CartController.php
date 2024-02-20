<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'O produto adicionado no carrinho.');
        }
    }

    //remover produto do carrinho
    public function deleteProductFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'O produto removido com sucesso.');
        }
    }

    // Checkout
    public function checkout(Request $request)
    {
        // Pegar o id do usuario autenticado
        $userId = Auth::id();
        // Obter os dados do carrinho
        $cart = session()->get('cart', []);

        // Calcular o total com base nos produtos no carrinho
        $total = 0;

        // Decrementar o estoque e obter o total das compras
        foreach ($cart as $productId => $productData) {
            // Calcular o total
            $total += $productData['quantity'] * $productData['price'];

            // Actualiza o estoque do produto
            $product = Product::findOrFail($productId);
            $newStock = $product->stock - $productData['quantity'];

            echo "newStock: $newStock";

            // Verifica rse o estoque é suficiente
            if ($newStock < 0) {
                // Se o estoque for insuficiente, redireciona de volta ao carrinho com uma mensagem de erro
                return redirect('/shopping-cart')->with('error-message', 'Estoque insuficiente para o produto: ' . $product->name);
            }

            // Actualizar o estoque
            $product->stock = $newStock;
            $product->save();
        }

        // Salvar os pedidos na bd, incluindo o total
        $order = new Order();
        $order->user_id = $userId;
        $order->payment_method = $request->input('payment_method');
        $order->total = $total;
        $order->save();

        // Anexar produtos ao pedido
        foreach ($cart as $productId => $productData) {
            $order->products()->attach($productId, ['quantity' => $productData['quantity']]);
        }

        // Limpar o carrinho depois da compra
        session()->forget('cart');

        return redirect('/')->with('success', 'Compra realizada com sucesso!');
    }

    // Exibir o formulário de checkout
    public function showCheckoutForm()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $product) {
            $total += $product['quantity'] * $product['price'];
        }

        return view('checkout', compact('cart', 'total'));
    }
}

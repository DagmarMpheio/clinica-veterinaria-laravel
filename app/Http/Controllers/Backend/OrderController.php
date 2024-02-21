<?php

namespace App\Http\Controllers\Backend;

use App\Mail\AlertOrderEmail;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $orders = Order::orderBy('created_at')->simplePaginate(5);
            $ordersCount = Order::count();
        } else {
            $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at')->simplePaginate(5);
            $ordersCount = Order::where('user_id', auth()->user()->id)->count();
        }

        return view('backend.orders.index', compact('orders', 'ordersCount'));
    }

    public function generatePDF(Order $order)
    {
        // Converter a data de criação para segundos
        $timestamp = $order->created_at->timestamp;

        // Criar o nome do arquivo com base no timestamp
        $fileName = 'Pedido ' . $timestamp . '.pdf';
        $pdf = PDF::loadView('backend.orders.pdf-report', ['order' => $order]);

        // Retornar o PDF para ser visualizado no navegador
        return $pdf->download($fileName);

        //return $pdf->download($order->order_number. '.pdf');
        //return $pdf->stream('pdf-report.pdf');
    }

    //Aprovar pedido
    public function approveOrder(Order $order)
    {
        // Implemente a lógica de aprovação aqui
        $order->status = 'Aprovado';
        $order->save();

        //Enviar email com os dados do pedido
        Mail::to(Auth::user()->email)->send(new AlertOrderEmail($order));

        return redirect('/list-orders')->with('success', 'Pedido aprovado com sucesso.');
    }

    //rejeitar pedido
    public function rejectOrder(Order $order)
    {
        // Implemente a lógica de rejeição aqui
        $order->status = 'Rejeitado';
        $order->save();

        //Enviar email com os dados do pedido
        Mail::to(Auth::user()->email)->send(new AlertOrderEmail($order));

        return redirect('/list-orders')->with('success', 'Pedido rejeitado com sucesso.');
    }
}

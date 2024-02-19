<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class OrderController extends AdminController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at')->simplePaginate(5);
        $ordersCount = Order::count();

        return view('backend.orders.index', compact('orders', 'ordersCount'));
    }

    public function generatePDF(Order $order)
    {
        $pdf = PDF::loadView('backend.orders.pdf-report', ['order' => $order]);

        //return $pdf->download($order->order_number. '.pdf');
        
        // Retorna o PDF para ser visualizado no navegador
        return $pdf->stream('pdf-report.pdf');

        //return $pdf->download('pdf-report.pdf');
    }
}

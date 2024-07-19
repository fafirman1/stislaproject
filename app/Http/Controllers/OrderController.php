<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    // index
    public function index(Request $request)
    {
        $query = Order::with('kasir')->orderBy('created_at', 'desc');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('transaction_time', [$request->start_date, $request->end_date]);
        }

        $orders = $query->paginate(200);
        return view('pages.orders.index', compact('orders'));
    }

    // view
    public function show($id)
    {
        $order = Order::with('kasir')->findOrFail($id);
        // get order items by order id
        $orderItems = OrderItem::with('product')->where('order_id', $id)->get();
        return view('pages.orders.view', compact('order', 'orderItems'));
    }

    // Method untuk mencetak PDF
    public function printPDF(Request $request)
    {
        $query = Order::with('kasir')->orderBy('created_at', 'desc');

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('transaction_time', [$request->start_date, $request->end_date]);
        }

        $orders = $query->get();

        // Render the view to HTML
        $html = View::make('pages.orders.print_pdf', compact('orders'))->render();

        // Create a new Dompdf instance
        $pdf = new Dompdf();

        // Load HTML into Dompdf
        $pdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render PDF (optional)
        $pdf->render();

        // Stream the PDF to the browser
        return $pdf->stream('laporan_penjualan.pdf');
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['customer', 'order_detail', 'payment'])->orderByDesc('id')->get();

        return view('orders.index', compact('orders'));
    }

    public function create(): View
    {
        $order = new Order();
        $customers = Customer::all();
        $order_details = OrderDetail::all();
        $payments = Payment::all();
        
        return view('orders.create', compact('order', 'customers', 'order_details', 'payments'));
    }

    public function store(OrderRequest $request)
    {
        Order::create($request->validated());
        
        return redirect()->route('orders.index')->with('success', 'Pedido creado correctamente.');
    }

    public function show(Order $order): View
    {
        $order->load('customer', 'order_detail', 'payment');
        
        return view('orders.show', compact('order'));
    }

    public function edit(string $id): View
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();
        $order_details = OrderDetail::all();
        $payments = Payment::all();
        
        return view('orders.edit', compact('order', 'customers', 'order_details', 'payments'));
    }

    public function update(OrderRequest $request, string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());
        
        return redirect()->route('orders.index')->with('success', 'Pedido actualizado correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $order = Order::findOrFail($id);
        $order->delete();
        
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado correctamente.');
    }
}

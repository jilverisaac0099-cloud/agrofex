<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailRequest;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderDetails = OrderDetail::with(['order', 'product', 'customer'])->orderByDesc('id')->paginate(10);
        return view('order_details.index', compact('orderDetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('order_details.create', compact('orders', 'products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderDetailRequest $request): RedirectResponse
    {
        OrderDetail::create($request->validated());
        return redirect()->route('order_details.index')->with('success', 'Detalle de pedido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Corregido: Nombramiento de variable y carga de relaciones correcta
        $orderDetail = OrderDetail::with(['order', 'product', 'customer'])->findOrFail($id);
        return view('order_details.show', compact('orderDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Corregido: $orderDetail en formato camelCase para coincidir con la vista
        $orderDetail = OrderDetail::findOrFail($id);
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('order_details.edit', compact('orderDetail', 'orders', 'products', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderDetailRequest $request, string $id)
    {
        // Corregido: El typo de "OrdenDetailRequest" a "OrderDetailRequest"
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->update($request->validated());
        return redirect()->route('order_details.index')->with('success', 'Detalle de pedido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->delete();
        return redirect()->route('order_details.index')->with('success', 'Detalle de pedido eliminado correctamente.');
    }
}

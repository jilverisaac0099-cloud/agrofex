<?php

namespace App\Http\Controllers;

use Illuminate\Http\OrderDetailRequest;
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
        $order_details = OrderDetail::with('order,product,customer')->paginate(10);
        return view('order_details.index', compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orderdetail = new OrderDetail();
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('orderdetails.create', compact('orderdetail', 'orders', 'products', 'customers'));
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
    public function show(OrderDetail $orderdetail)
    {
        $orderdetail->load('order,product,customer');
        return view(' order_details.show', compact('order_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order_detail = OrderDetail::findOrFail($id);
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        return view('order_details.edit', compact('order_detail', 'orders', 'products', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdenDetailRequest $request, string $id)
    {
        $order_detail = OrderDetail::findOrFail($id);
        $order_detail->update($request->validated());
        return redirect()->route('order_details.index')->with('success', 'Detalle de pedido actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order_detail = OrderDetail::findOrFail($id);
        $order_detail->delete();
        return redirect()->route('order_details.index')->with('success', 'Detalle de pedido eliminado correctamente.');
    }
}

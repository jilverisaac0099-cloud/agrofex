<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer', 'order_detail', 'payment')->paginate(10);

        return view('orders.index', compact('orders', ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create():   View
    {
        $order = new Order();
        $customers = Customer::all();
        $order_details = orderdetail::all();
        $payments = Payment::all();
        return view('orders.create', compact('order', 'customers','order_details','payments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        Order::create( $request->validated());
        return redirect()->route('orders.index')->with('success', 'pedido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): View
    {
        $order->load('customer,order_detail,payment');
        return view('Order.show', compact('order', 'customer','orderdetail','payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $order = Order::findOrFail($id);
        $customers = Customer::all();
        $order_details = OrderDetail::all();
        $payments = payment::all();
        return view('order.edit', compact('order' , 'customers', 'order_details', 'payments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $id): RedirectResponse
    {

        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'pedido actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {

        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'pedido de envío eliminada correctamente.');

    }
}

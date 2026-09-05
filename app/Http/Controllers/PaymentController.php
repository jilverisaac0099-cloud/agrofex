<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use App\Http\Requests\PaymentRequest;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('order')->orderByDesc('id')->paginate(10);
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $orders = Order::all();
        return view('payments.create', compact('orders'));
    }
public function store(PaymentRequest $request): RedirectResponse
{
    Payment::create($request->validated());

    return redirect()->to('payments')->with('success', 'Pago registrado correctamente.');
}

    public function show(string $id)
    {
        $payment = Payment::with('order')->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit(string $id)
    {
        $payment = Payment::findOrFail($id);
        $orders = Order::all();
        return view('payments.edit', compact('payment', 'orders'));
    }

    public function update(PaymentRequest $request, string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);
        $payment->update($request->validated());
        return redirect()->route('payments.index')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy(string $id): RedirectResponse
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pago eliminado correctamente.');
    }
}
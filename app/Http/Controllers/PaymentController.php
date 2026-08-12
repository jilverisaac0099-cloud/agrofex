<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use Illuminate\Http\PaymentRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $payments = Payment::with('order')->paginate(10);

    return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment = new Payment();
        $orders = Order::all();
        return view('payments.create', compact('payment', 'orders'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
    
        Payment::create($request->validated());
        return redirect()->route('payments.index')->with('success', 'pago creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment): View
    {
        $payment->load('order');
        return view('payments.show', compact('payment'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
        $payment = Payment::findOrFail($id);
        $orders = Order::all();
        return view('payments.edit', compact('payment', 'orders'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id): RedirectResponse
    {
        
        $payment = Payment::findOrFail($id);
        $payment->update($request->validated());
        return redirect()->route('payments.index')->with('success', 'pago actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success', 'Pago eliminado correctamente.');
 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use App\Http\Request\CustomerRequest;



class CustomerController extends Controller
{
        public function index()
    {
        $customers = Customer::orderByDesc('id')->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        return view('customers.create', compact('customer'));
    }
    public function store(CustomerRequest $request)
    {
        Customer::create($request->validated());
        return redirect()->route('customers.index')->with('success', 'Customer creada exitosamente.');
    }
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return redirect()->route('customers.index')->with('success', 'Cliente creado exitosamente.');
    }


    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Cliente eliminado del sistema.');
    }
}

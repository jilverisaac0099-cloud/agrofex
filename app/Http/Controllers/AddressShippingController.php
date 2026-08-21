<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressShipping;
use App\Http\Requests\AddressShippingRequest;
use App\Models\Customer;
use App\Models\Producer;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AddressShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{

    $address_shippings = AddressShipping::with('customer','producer')->paginate(10);

    return view('address_shippings.index', compact('address_shippings'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $address_shipping = new AddressShipping();
        $customers = Customer::all();
        $producers = Producer::all();
        return view('address_shippings.create', compact('address_shipping', 'customers', 'producers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressShippingRequest $request): RedirectResponse
    {
        AddressShipping::create($request->validated());
        return redirect()->route('address_shippings.index')->with('success', 'Dirección de envío creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AddressShipping $address_shipping): View
    {
        $address_shipping->load('customer,producer');
        return view('address_shippings.show', compact('address_shipping'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $address_shipping = AddressShipping::findOrFail($id);
        $customers = Customer::all();
        $producers = Producer::all();
        return view('address_shippings.edit', compact('address_shipping', 'customers', 'producers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressShippingRequest $request, string $id): RedirectResponse
    {
        $address_shipping = AddressShipping::findOrFail($id);
        $address_shipping->update($request->validated());
        return redirect()->route('address_shippings.index')->with('success', 'Dirección de envío actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $address_shipping = AddressShipping::findOrFail($id);
        $address_shipping->delete();
        return redirect()->route('address_shippings.index')->with('success', 'Dirección de envío eliminada correctamente.');
    }
}

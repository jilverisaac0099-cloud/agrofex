<?php

namespace App\Http\Controllers;
use App\Models\producer;
use App\Http\Request\ProducerRequest;


class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producers = Producer::orderByDesc('id')->get();
        return view('producers.index', compact('producers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $producer = new Producer();
        return view('producers.create', compact('producer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProducerRequest $request)
    {
        Producer::create($request->validated());
        return redirect()->route('producers.index')->with('success', 'Productor creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producer = Producer::findOrFail($id);
        return view('producers.show', compact('producer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producer = Producer::findOrFail($id);
        return view('producers.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request , Producer $producer)
    {
        $producer->update($request->validated());
        return redirect()->route('producers.index')->with('success', 'Productor actualizado exitosamente.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producer = Producer::findOrFail($id);
        $producer->delete();
        return redirect()->route('producers.index')->with('success', 'Productor eliminado del sistema.');
    }
}

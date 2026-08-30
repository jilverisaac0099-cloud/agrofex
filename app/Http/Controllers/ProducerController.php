<?php

namespace App\Http\Controllers;
use App\Models\Producer;
use App\Http\Requests\ProducerRequest;


class ProducerController extends Controller
{
    public function index()
    {
       $producers = Producer::all(); 
    return view('producers.index', compact('producers'));
    }

    public function create()
    {
        $producer = new Producer();
        return view('producers.create', compact('producer'));
    }

    public function store(ProducerRequest $request)
    {
        Producer::create($request->validated());
        return redirect()->route('producers.index')->with('success', 'Productor creado exitosamente.');
    }


    public function show(string $id)
    {
        $producer = Producer::findOrFail($id);
        return view('producers.show', compact('producer'));
    }


    public function edit(string $id)
    {
        $producer = Producer::findOrFail($id);
        return view('producers.edit', compact('producer'));
    }

    public function update(ProducerRequest $request , Producer $producer)
    {
        $producer->update($request->validated());
        return redirect()->route('producers.index')->with('success', 'Productor actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $producer = Producer::findOrFail($id);
        $producer->delete();
        return redirect()->route('producers.index')->with('success', 'Productor eliminado del sistema.');
    }
}

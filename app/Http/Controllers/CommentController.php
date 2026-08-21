<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Producer;
use App\Models\Product;
use App\Models\Customer;

use Illuminate\Http\CommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderByDesc('id')->get();
        return view('comments.index', compact('comments','product','customer','producer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comments = new Comment();
        $products = product::all();
        $producers = Producer::all();
        $customers = customer::all();

        return view('comments.create', compact('comments','producers','products','customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
    Comment::create($request->validated());
    return redirect()->route('comments.index')->with('success', 'comentario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        $comment->load('customer,producer,product');
        return view( 'Comments.show', compact('comment','customer','producer','product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
$comments = Comment::findOrFail($id);
$customers = Customer::all();
$producers = Producer::all();
$products = Product::all();
return view('Comment.edit', compact( 'comments', 'customers','producers','products' ));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->validated());
        return redirect()->route('Comments.index')->with('success', 'comentario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('Comments.index')->with('success', 'comentario eliminado correctamente.');
    }
}

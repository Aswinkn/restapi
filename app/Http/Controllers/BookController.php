<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'genre' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     */
    // Show a single book
    public function show($id)
    {
        $book = Book::find($id);
        if ($book) {
            return response()->json($book, 200);
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    // Update a book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->update($request->all());
            return response()->json($book, 200);
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // Delete a book
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return response()->json(['message' => 'Book deleted'], 200);
        } else {
            return response()->json(['message' => 'Book not found'], 404);
        }
    }
}

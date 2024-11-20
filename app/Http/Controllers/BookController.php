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
        $books = Book::all();
    
        if ($books->isEmpty()) {
            return response()->json(['success' => false,'message' => 'No books found.',], 404);
        }
    
        return response()->json(['success' => true,'data' => $books,], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer',
            'genre' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        try {
            $book = Book::create($validated);
    
            return response()->json(['success' => true,'message' => 'Book added successfully!','data' => $book,], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => 'Failed to add book.','error' => $e->getMessage(),], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    // Show a single book
    public function show($id)
    {
        $book = Book::find($id);
    
        if (!$book) {
            return response()->json(['success' => false,'message' => 'Book not found.',], 404);
        }
    
        return response()->json(['success' => true,'data' => $book,], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    // Update a book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
    
        if (!$book) {
            return response()->json(['success' => false,'message' => 'Book not found.',], 404);
        }
    
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'published_year' => 'nullable|integer',
            'genre' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        try {
            $book->update($validated);
    
            return response()->json(['success' => true,'message' => 'Book updated successfully!','data' => $book,], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => 'Failed to update book.','error' => $e->getMessage(),], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // Delete a book
    public function destroy($id)
    {
        $book = Book::find($id);
    
        if (!$book) {
            return response()->json(['success' => false,'message' => 'Book not found.',], 404);
        }
    
        try {
            $book->delete();
    
            return response()->json(['success' => true,'message' => 'Book deleted successfully!',], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false,'message' => 'Failed to delete book.','error' => $e->getMessage(),], 500);
        }
    }
}

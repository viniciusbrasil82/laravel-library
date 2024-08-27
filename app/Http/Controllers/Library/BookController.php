<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer'
        ]);
        $bean = Book::create($data);

        return response()->json(['data' => $bean], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Book $bean)
    {
        return response()->json(['data' => $bean->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $bean)
    {
        $bean = Book::find($id);

        // Check if the record exists
        if (!$bean) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $data = $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer',
        ]);
        $bean->update($data);

        return response()->json(['data' => $bean], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bean = Book::find($id);

        // Check if the record exists
        if (!$bean) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    
        // Delete the record
        $bean->delete();
    
        // Return a success response
        return response()->json(['message' => 'Record deleted successfully'], 200);
    
    }
}

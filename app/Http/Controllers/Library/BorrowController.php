<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Http\Requests\StoreBorrowRequest;
use App\Http\Requests\UpdateBorrowRequest;
use App\Models\Borrow;

class BorrowController extends Controller
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
            'start_at' => 'required|string',
            'end_at' => 'required|string',
            'book_id' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $user = User::findOrFail($data['user_id']);
        $book = Book::findOrFail($data['book_id']);

        $bean = Borrow::create($data);
        
        $text = "\n".'Inicio.:'. $bean->start_at. ' / Fim.:'. $bean->end_at;
        $text.= "\n".'Cliente.:'. $user->name. ' / Título.:'. $book->title;
        //Notification::send($users, new InvoicePaid($invoice));
        Notification::send($user, $text);

        return response()->json(['data' => $bean], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Borrow $bean)
    {
        return response()->json(['data' => $bean->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Borrow $bean)
    {
        $bean = Borrow::find($id);

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
        $bean = Borrow::find($id);

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

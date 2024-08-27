<?php

namespace App\Http\Controllers\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Library\Author;


class AuthorController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data'=>RestAPI::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)//(StoreAuthorRequest $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birth' => 'required|date',
            'rip' => 'notrequired|date',
        ]);
        $bean = Author::create($data);

        return response()->json(['data' => $bean], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Author $bean)//(Author $author)
    {
        return response()->json(['data' => $bean->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Author $bean)//(Author $author)
    {
        return response()->json(['data' => $bean->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)//(UpdateAuthorRequest $request, Author $author)
    {
        $bean = Author::find($id);

        // Check if the record exists
        if (!$bean) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $data = $request->validate([
            'name' => 'required|string',
            'birth' => 'required|date',
            'rip' => 'null|date',
        ]);
        $bean->update($data);

        return response()->json(['data' => $bean], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)//(Author $author)
    {
        $bean = Author::find($id);

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

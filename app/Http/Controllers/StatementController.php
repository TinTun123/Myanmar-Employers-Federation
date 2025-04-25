<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatementRequest;
use App\Http\Requests\UpdateStatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StatementController extends Controller
{
    //
    public function index()
    {

        return StatementResource::collection(Statement::latest()->paginate(10));
    }

    public function store(StoreStatementRequest $request)
    {
        $validated = $request->validated();

        $statement = Statement::create($validated);

        // Process images
        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->storeAs("public/statements/{$statement->id}", $image->getClientOriginalName());
                $imageUrls[] = Storage::url($path); // This gives a public URL like /storage/...
            }
        }

        // Update the statement with image URLs
        $statement->images = $imageUrls;
        $statement->save();

        return new StatementResource($statement);
    }

    public function show(Statement $statement)
    {
        return new StatementResource($statement);
    }

    public function update(UpdateStatementRequest $request, Statement $statement)
    {
        $validated = $request->validated();

        // Update core fields
        $statement->update([
            'title' => $validated['title'] ?? $statement->title,
            'committee' => $validated['committee'] ?? $statement->committee,
            'statementNo' => $validated['statementNo'] ?? $statement->statementNo,
            'body' => $validated['body'] ?? $statement->body,
            'date' => $validated['date'] ?? $statement->date,
        ]);

        // Handle existing image URLs
        $newImageUrls = [];

        // Check if 'images' field is present and contains uploaded files
        if ($request->hasFile('images')) {
            // Remove existing folder and files
            $folderPath = "public/statements/{$statement->id}";
            Storage::deleteDirectory($folderPath);

            // Store new files
            foreach ($request->file('images') as $image) {
                $path = $image->storeAs($folderPath, $image->getClientOriginalName());
                $newImageUrls[] = Storage::url($path); // Public URL
            }

            // Update the statement's image paths
            $statement->images = $newImageUrls;
            $statement->save();
        }

        return new StatementResource($statement);
    }

    public function destroy(Statement $statement)
    {
        $statement->delete();

        return response()->json(['message' => 'Statement deleted successfully.']);
    }
}

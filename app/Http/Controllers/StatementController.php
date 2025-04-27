<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatementRequest;
use App\Http\Requests\UpdateStatementRequest;
use App\Http\Resources\StatementResource;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            'statement_no' => $validated['statement_no'] ?? $statement->statementNo,
            'body' => $validated['body'] ?? $statement->body,
            'date' => $validated['date'] ?? $statement->date,
        ]);

        $existingImages = $statement->images ?? []; // Current images in DB
        $incomingImages = $validated['imagesURL'] ?? []; // Images kept by admin
        $folderPath = "public/statements/{$statement->id}";

        // Clean up: delete any image that was removed by admin
        foreach ($existingImages as $imagePath) {
            $imagetransformed = url($imagePath);
            Log::info("ImagePath: $imagetransformed");
            Log::info("incomingImages: ", $incomingImages);
            if (!in_array($imagetransformed, $incomingImages)) {
                // Convert the URL to the storage path
                $relativePath = str_replace('/storage/', 'public/', parse_url($imagePath, PHP_URL_PATH));
                Storage::delete($relativePath);
            }
        }

        $newImageUrls = $incomingImages;

        // Upload new images if any
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {
                $path = $image->storeAs($folderPath, $image->getClientOriginalName());
                $newImageUrls[] = Storage::url($path);
            }
        }

        // Save the merged list (existing + new)
        $statement->images = $newImageUrls;
        $statement->save();

        return new StatementResource($statement);
    }

    public function destroy(Statement $statement)
    {
        $statement->delete();

        return response()->json(['message' => 'Statement deleted successfully.'], 200);
    }
}

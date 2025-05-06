<?php

namespace App\Http\Controllers;

use App\Http\Resources\DynamicContentResource;
use App\Models\DynamicContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DynamicContentController extends Controller
{
    //
    public function index()
    {
        $dynamicContents = DynamicContent::paginate(10); // Paginate with 10 items per page
        return DynamicContentResource::collection($dynamicContents);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            'text' => 'required|string',
        ]);

        $dynamicContent = DynamicContent::create([
            'text' => $request->text,
        ]);

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->storeAs(
                "public/dynamicboard/{$dynamicContent->id}",
                $request->file('image')->getClientOriginalName()
            );

            // Update the DynamicContent record with the public URL
            $dynamicContent->update([
                'image' => str_replace('public', 'storage', $filePath),
            ]);
        }

        return new DynamicContentResource($dynamicContent);
    }

    public function show(DynamicContent $dynamicContent)
    {
        return new DynamicContentResource($dynamicContent);
    }

    public function update(Request $request, DynamicContent $dynamicContent)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            'text' => 'required|string',
        ]);

        $folderPath = "public/dynamicboard/{$dynamicContent->id}";
        if (Storage::exists($folderPath)) {
            // Remove the folder and its contents
            Storage::deleteDirectory($folderPath);
        }

        $filePath = $request->file('image')->storeAs(
            $folderPath,
            $request->file('image')->getClientOriginalName()
        );

        // Update the database with the new image URL and text
        $dynamicContent->update([
            'image' => str_replace('public', 'storage', $filePath),
            'text' => $request->text,
        ]);

        return new DynamicContentResource($dynamicContent);
    }

    public function destroy(DynamicContent $dynamicContent)
    {
        // Define the folder path
        $folderPath = "public/dynamicboard/{$dynamicContent->id}";

        // Check if the folder exists and delete it
        if (Storage::exists($folderPath)) {
            Storage::deleteDirectory($folderPath);
        }

        // Delete the dynamic content record from the database
        $dynamicContent->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}

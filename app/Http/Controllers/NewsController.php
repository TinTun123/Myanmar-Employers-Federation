<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve paginated news records
        $news = News::with('comments')->latest()->paginate(10);

        // Return the paginated news as a resource collection
        return NewsResource::collection($news);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        //
        $data = $request->validated();

        $news = News::create($data);

        if ($request->hasFile('imgFile')) {
            $image = $request->file('imgFile');
            $path = $image->storeAs("public/news/{$news->id}", $image->getClientOriginalName());
            $news->update(['image' => "storage/news/{$news->id}/" . $image->getClientOriginalName()]);
        }

        return new NewsResource($news);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
        $validated = $request->validated();

        if ($validated['title'] !== $news->title) {
            $slug = Str::slug($validated['title']) . '-' . Str::random(5);
            $validated['slug'] = $slug;
        }

        if ($request->hasFile('imgFile')) {
            // Delete old image file if it exists
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
            }

            $image = $request->file('imgFile');
            $path = $image->storeAs("public/news/{$news->id}", $image->getClientOriginalName());
            $validated['image'] = "storage/news/{$news->id}/" . $image->getClientOriginalName();
        }

        $news->update($validated);
        return new NewsResource($news);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image));
        }

        $news->delete();

        return response()->json(['message' => 'News deleted successfully'], 200);
    }

    public function like(Request $request, News $news)
    {
        // Increment the likes field
        $news->increment('likes');

        return response()->json(['message' => 'News liked successfully'], 200);
    }
}

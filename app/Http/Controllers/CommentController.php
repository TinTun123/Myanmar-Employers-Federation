<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    //
    public function index($type, $id)
    {
        $model = $this->getModelClass($type)::findOrFail($id);

        return response()->json($model->comments()->latest()->get());
    }

    // Store a new comment
    public function store(Request $request, $type, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string|max:3000',
        ]);

        $model = $this->getModelClass($type)::findOrFail($id);

        $comment = $model->comments()->create([
            'name' => $request->name,
            'body' => $request->comment,
        ]);

        return new CommentResource($comment);
        // return response()->json($comment, 201);
    }

    // Helper method to get model class based on type
    protected function getModelClass($type)
    {
        $map = [
            'news' => \App\Models\News::class,
            'statements' => \App\Models\Statement::class,
        ];

        $type = Str::lower($type);

        if (!isset($map[$type])) {
            abort(404, 'Commentable type not supported');
        }

        return $map[$type];
    }
}

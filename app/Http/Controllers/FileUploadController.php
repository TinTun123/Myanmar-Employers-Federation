<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function uploadChunk(Request $request)
    {
        $request->validate([
            'file' => 'required|file',
            'file_id' => 'required|string',
            'chunk_index' => 'required|integer',
            'total_chunks' => 'required|integer',
            'file_name' => 'required|string',
        ]);

        $file = $request->file('file');
        $fileId = $request->input('file_id');
        $chunkIndex = $request->input('chunk_index');
        $fileName = $request->input('file_name');

        $chunkDir = storage_path("app/public/upload/chunks/{$fileId}");
        if (!File::exists($chunkDir)) {
            File::makeDirectory($chunkDir, 0755, true);
        }

        $file->storeAs("public/upload/chunks/{$fileId}", "chunk_{$chunkIndex}");

        return response()->json([
            'message' => 'Chunk uploaded successfully',
            'chunk_index' => $chunkIndex,
        ]);
    }

    public function mergeChunks(Request $request)
    {
        $request->validate([
            'file_id' => 'required|string',
            'file_name' => 'required|string',
        ]);

        $fileId = $request->input('file_id');
        $fileName = $request->input('file_name');

        $chunkDir = storage_path("app/public/upload/chunks/{$fileId}");
        $tempDir = storage_path("app/public/upload/temp");
        $tempPath = "{$tempDir}/{$fileId}__{$fileName}";

        if (!File::exists($tempDir)) {
            File::makeDirectory($tempDir, 0755, true);
        }

        $chunks = collect(File::files($chunkDir))
            ->sortBy(fn($file) => (int) substr($file->getFilename(), 6));

        $finalFile = fopen($tempPath, 'ab');

        foreach ($chunks as $chunk) {
            $chunkStream = fopen($chunk->getPathname(), 'rb');
            stream_copy_to_stream($chunkStream, $finalFile);
            fclose($chunkStream);
            unlink($chunk->getPathname());
        }

        fclose($finalFile);
        File::deleteDirectory($chunkDir);

        return response()->json([
            'message' => 'Chunks merged successfully',
            'chunk_ref' => "chunkref_{$fileId}__{$fileName}",
            'original_file_name' => $fileName,
        ]);
    }
}

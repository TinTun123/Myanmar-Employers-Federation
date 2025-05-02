<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class SecureDownloadController extends Controller
{
    //

    public function downloadFolder($responseId, Request $request)
    {
        $folderPath = "public/upload/answers/{$responseId}";
        $files = Storage::files($folderPath);

        if (empty($files)) {
            abort(404, 'No files found in this folder.');
        }

        // Create a temporary ZIP file
        $zipFileName = "response_{$responseId}_files.zip";
        $zipPath = storage_path("app/temp/{$zipFileName}");

        if (!file_exists(dirname($zipPath))) {
            mkdir(dirname($zipPath), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
            foreach ($files as $file) {
                $relativeName = basename($file);
                $zip->addFile(storage_path('app/' . $file), $relativeName);
            }
            $zip->close();
        } else {
            abort(500, 'Could not create ZIP file.');
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}

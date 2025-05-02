<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Answer;
use App\Models\Form_version;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Illuminate\Support\Str;


class AnswerController extends Controller
{
    //

    public function store(StoreResponseRequest $request)
    {
        // 1. Create the Response record
        $response = \App\Models\Response::create([
            'form_id' => $request->survey_id,
            'form_version_id' => $request->form_version_id,
            'case_id' => $this->generateCaseId($request), // or generate however you want
        ]);

        // 2. Loop over answers
        foreach ($request->input('answers') as $questionId => $answerData) {
            $questionType = $answerData['type'];

            $answerAttributes = [
                'response_id' => $response->id,
                'question_id' => $questionId,
            ];

            switch ($questionType) {
                case \App\Models\FormQuestion::TYPE_TEXT:
                case \App\Models\FormQuestion::TYPE_TEXTAREA:
                case \App\Models\FormQuestion::TYPE_RADIO:
                case \App\Models\FormQuestion::TYPE_SELECT:
                    $answerAttributes['answer_text'] = $answerData['content'];
                    break;

                case \App\Models\FormQuestion::TYPE_CHECKBOX:
                    $answerAttributes['answer_array'] = json_encode($answerData['content']);
                    break;

                case \App\Models\FormQuestion::TYPE_FILE:
                    $uploadedFiles = $request->file("answers.$questionId.content");
                    $content = $request->input("answers.$questionId.content");

                    if (!is_null($uploadedFiles) && collect($uploadedFiles)->every(fn($file) => $file instanceof UploadedFile)) {
                        // Handle multiple file uploads (Small files sizes)
                        $filePaths = [];
                        foreach ($uploadedFiles as $uploadedFile) {
                            $path = $uploadedFile->storeAs("public/upload/answers/{$response->id}", $uploadedFile->getClientOriginalName());

                            $filePaths[] = Storage::url($path);
                        }

                        $answerAttributes['answer_array'] = $filePaths;
                        break;
                    } else {
                        // Move the uploaded merged file in temp folder to the final destination and set file path to $answerAtribute[/'answer_array]
                        // Handle chunked uploads (already merged into temp folder)
                        $fileRefs = is_array($content) ? $content : [$content];
                        $filePaths = [];

                        foreach ($fileRefs as $ref) {
                            if (Str::startsWith($ref, 'chunkref_')) {
                                $parts = explode('__', substr($ref, 9));
                                $fileId = $parts[0] ?? null;
                                $fileName = $parts[1] ?? null;

                                if ($fileId && $fileName) {
                                    $tempPath = storage_path("app/public/upload/temp/{$fileId}__{$fileName}");
                                    $finalDir = storage_path("app/public/upload/answers/{$response->id}");

                                    if (!File::exists($finalDir)) {
                                        File::makeDirectory($finalDir, 0755, true);
                                    }

                                    $finalPath = "{$finalDir}/{$fileName}";

                                    // Move file
                                    if (File::exists($tempPath)) {
                                        File::move($tempPath, $finalPath);
                                        $filePaths[] = Storage::url("upload/answers/{$response->id}/{$fileName}");
                                    }
                                }
                            }
                        }

                        if (!empty($filePaths)) {
                            $answerAttributes['answer_array'] = $filePaths;
                        }

                        break;
                    }
                default:
                    // you can skip unsupported types or throw error
                    continue 2; // skip this iteration
            }

            // 3. Create Answer record
            Answer::create($answerAttributes);
        }

        return response()->json([
            'message' => 'Response stored successfully.',
            'response_id' => $response->id,
            'form_version_id' => $request->form_version_id,
            'case_id' => $response->case_id,
        ], 201);
    }

    public function downloadSheet(Request $request, Form_version $formVersion)
    {

        // Ensure the exports directory exists
        Storage::makeDirectory('exports');

        // Fetch the form version with its questions and responses (already resolved by type-hinting)
        $formVersion->load('questions', 'responses.answers.question');

        // Create a temporary file for the Excel sheet
        $filePath = 'exports/form_responses_' . $formVersion->id . '.xlsx';
        $tempFile = Storage::path($filePath);

        // Create the Excel writer
        $writer = SimpleExcelWriter::create($tempFile);

        // Add headers (questions as column headers)
        $headers = $formVersion->questions->pluck('question_text')->toArray();
        $writer->addHeader($headers);

        // Add rows (responses with answers)
        foreach ($formVersion->responses as $response) {
            $row = [];
            foreach ($formVersion->questions as $question) {
                $answer = $response->answers->firstWhere('question_id', $question->id);
                $row[] = $answer ? $this->formatAnswerSheet($answer) : 'N/A';
                Log::info('Answer:', ['answer' => $row]);
            }
            $writer->addRow($row);
        }

        // Close the writer
        $writer->close();

        // Return the file as a download
        return response()->download($tempFile)->deleteFileAfterSend(true);
    }

    public function showResponses($form_version_id)
    {

        request()->validate([
            'form_version_id' => 'exists:form_versions,id',
        ], [
            'form_version_id.exists' => 'The selected form version does not exist.', // Custom message
        ]);

        $formVersion = \App\Models\Form_version::with('form', 'questions', 'responses')->findOrFail($form_version_id);

        // Prepare the response data
        $data = [
            'form_version_id' => $formVersion->id,
            'title' => $formVersion->form->title,
            'description' => $formVersion->form->description,
            'total_question' => $formVersion->questions->count(),
            'version' => $formVersion->version,
            'versions' => $formVersion->form->formVersions->map(function ($formVersion) {
                return [
                    'id' => $formVersion->id,
                    'version' => $formVersion->version,
                ];
            })->toArray(),
            'responses' => ResponseResource::collection($formVersion->responses),
        ];


        return response()->json($data, 200);
    }

    public function getAnswers(Request $request, $response_id)
    {

        // Ensure the user is authenticated
        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }


        // Validate the response_id
        $response = \App\Models\Response::with(['answers.question'])->findOrFail($response_id);

        // Prepare the questions and answers
        $questions = $response->answers->map(function ($answer) {
            return [
                'question' => $answer->question->question_text ?? 'Unknown Question',
                'answer' => $this->formatAnswer($answer),
                'question_type' => $answer->question->type,
            ];
        });

        // Return the data
        return response()->json([
            'questions' => $questions,
        ], 200);
    }

    protected function deleteVersion(Form_version $formVersion)
    {

        // Check if the form has only one version
        $form = $formVersion->form; // Get the associated form
        $versionCount = $form->formVersions()->count(); // Count the number of versions

        if ($versionCount <= 1) {
            // If there's only one version, return a "cannot delete" message
            return response()->json(['message' => 'Cannot delete the only version of the form.'], 400);
        }

        // Delete the form version
        $formVersion->delete();

        // Get the latest remaining version of the form
        $latestVersion = $form->latestFormVersion;

        // Prepare the response data
        $data = [
            'form_version_id' => $latestVersion->id,
            'title' => $latestVersion->form->title,
            'description' => $latestVersion->form->description,
            'total_question' => $latestVersion->questions->count(),
            'version' => $latestVersion->version,
            'versions' => $latestVersion->form->formVersions->map(function ($formVersion) {
                return [
                    'id' => $formVersion->id,
                    'version' => $formVersion->version,
                ];
            })->toArray(),
            'responses' => ResponseResource::collection($latestVersion->responses),
        ];


        return response()->json($data, 200);


        // Optionally, you can also delete related responses if needed
        // $formVersion->responses()->delete();

        return response()->json(['message' => 'Form version deleted successfully.'], 200);
    }

    protected function generateCaseId(StoreResponseRequest $request)
    {
        $answers = $request->input('answers');
        $prefixedShortForm = null;

        foreach ($answers as $questionId => $answerData) {
            if (isset($answerData['is_prefixed']) && $answerData['is_prefixed'] == 1) {
                // Get the related FormQuestion model
                $question = \App\Models\FormQuestion::find($questionId);

                if (!$question) {
                    continue;
                }

                // Decode its `data` JSON
                $questionData = json_decode($question->data, true);
                if (!isset($questionData['options'])) {
                    continue;
                }

                // Find the selected option by matching content (id)
                $answer_text = $answerData['content']; // this should be the option.id
                $matchedOption = collect($questionData['options'])->firstWhere('text', $answer_text);

                if ($matchedOption && isset($matchedOption['short_form'])) {
                    $prefixedShortForm = $matchedOption['short_form'];
                    break;
                }
            }
        }

        if (!$prefixedShortForm) {
            return response()->json(['message' => 'Could not extract prefixed short_form from selected answer.'], 400);
        }

        // Count existing responses with this prefix
        $count = \App\Models\Response::where('case_id', 'like', $prefixedShortForm . '-%')->count();

        // Generate case ID with 6-digit padding
        $newNumber = $count + 1;
        $caseId = sprintf('%s-%06d', $prefixedShortForm, $newNumber);

        return $caseId;
    }


    /**
     * Format the answer based on its type.
     *
     * @param \App\Models\Answer $answer
     * @return string|array
     */
    protected function formatAnswer($answer)
    {
        if ($answer->answer_text) {
            return $answer->answer_text; // Text-based answer
        }

        if (is_string($answer->answer_array)) {
            // Decode JSON if it's a string
            $decodedArray = json_decode($answer->answer_array, true);
            if (is_array($decodedArray)) {
                $answer->answer_array = $decodedArray; // Update the answer array
            }
        }

        if ($answer->answer_array) {
            // Check if the array contains storage paths
            if ($this->isStoragePathArray($answer->answer_array)) {
                // Convert storage paths to public URLs
                return array_map(function ($path) {
                    return asset($path); // Convert to public URL
                }, $answer->answer_array);
            }

            // Combine array elements into a single string separated by '/'
            return implode(' / ', $answer->answer_array);
        }

        return 'No answer provided'; // Fallback for empty answers
    }

    protected function formatAnswerSheet($answer)
    {
        if ($answer->answer_text) {
            return $answer->answer_text; // Text-based answer
        }

        if (is_string($answer->answer_array)) {
            // Decode JSON if it's a string
            $decodedArray = json_decode($answer->answer_array, true);
            if (is_array($decodedArray)) {
                $answer->answer_array = $decodedArray; // Update the answer array
            }
        }

        if ($answer->answer_array) {
            // Check if the array contains storage paths
            if ($this->isStoragePathArray($answer->answer_array)) {
                // Assume all files are under a single folder: "storage/upload/answers/{responseId}/"
                $responseId = $answer->response_id ?? null;

                if ($responseId) {
                    $signedFolderUrl = URL::temporarySignedRoute(
                        'secure.download.folder',
                        now()->addMinutes(60),
                        ['responseId' => $responseId]
                    );

                    // Return Excel hyperlink formula for folder download
                    return '=HYPERLINK("' . $signedFolderUrl . '", "Download all files")';
                }

                return 'Files available, but no response ID';
            }

            // Combine array elements into a single string separated by '/'
            return implode(' / ', $answer->answer_array);
        }

        return 'No answer provided'; // Fallback for empty answers
    }


    /**
     * Determine if the array contains storage paths.
     *
     * @param array $array
     * @return bool
     */
    protected function isStoragePathArray(array $array)
    {
        return collect($array)->every(function ($item) {
            return str_starts_with($item, '/storage/');
        });
    }
}

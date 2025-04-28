<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResponseRequest;
use App\Models\Answer;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

                    if (is_array($uploadedFiles)) {
                        $filePaths = [];
                        foreach ($uploadedFiles as $uploadedFile) {
                            $path = $uploadedFile->storeAs("public/upload/answers/{$response->id}", $uploadedFile->getClientOriginalName());

                            $filePaths[] = Storage::url($path);
                        }
                        $answerAttributes['answer_array'] = $filePaths; // store all file paths in array
                    } else {
                        // fallback: shouldn't happen because validation already checks
                        $answerAttributes['answer_array'] = json_encode([]);
                    }
                    break;

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
        ], 201);
    }

    protected function generateCaseId(StoreResponseRequest $request)
    {
        $prefixedAnswer = collect($request->input('answers'))
            ->firstWhere('is_prefixed', 1);

        if (!$prefixedAnswer) {
            return response()->json(['message' => 'Prefixed answer not found.'], 400);
        }

        // 2. Get the prefix content
        $prefix = $prefixedAnswer['content'];

        // 3. Count existing responses with this prefix
        $count = \App\Models\Response::where('case_id', 'like', $prefix . '-(%')->count();

        // 4. Generate new case_id
        $newNumber = $count + 1;
        $caseId = sprintf('%s-(%04d)', $prefix, $newNumber);

        return $caseId;
    }
}

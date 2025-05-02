<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use App\Models\FormQuestion;
use Illuminate\Support\Facades\Log;

class StoreResponseRequest extends FormRequest
{
    protected $formQuestions;

    public function authorize(): bool
    {
        return true; // You can add authorization if needed
    }

    public function rules(): array
    {
        return [
            'survey_id' => ['required', 'exists:forms,id'],
            'version' => ['required', 'integer'],
            'form_version_id' => ['required', 'exists:form_versions,id'],
            'answers' => ['required', 'array'],
            'answers.*.type' => ['required', 'string'],
            'answers.*.content' => ['required'],
            'answers.*.is_prefixed' => ['nullable', 'boolean'],

        ];
    }

    /**
     * After basic validation, perform **custom** validation
     */
    protected function passedValidation()
    {
        // Fetch valid questions only ONCE
        $this->formQuestions = FormQuestion::where('form_version_id', $this->form_version_id)
            ->get()
            ->keyBy('id');

        // Now validate submitted answers properly
        foreach ($this->input('answers') as $questionId => $answerData) {

            // 1. Check question exists
            if (!isset($this->formQuestions[$questionId])) {
                throw ValidationException::withMessages([
                    "answers.$questionId" => 'Invalid question ID submitted.',
                ]);
            }

            $question = $this->formQuestions[$questionId];

            // 2. Check type matches
            if ($answerData['type'] !== $question->type) {
                throw ValidationException::withMessages([
                    "answers.$questionId.type" => 'Answer type does not match the question type.',
                ]);
            }

            // 3. Validate content by type
            switch ($question->type) {
                case FormQuestion::TYPE_TEXT:
                case FormQuestion::TYPE_TEXTAREA:
                case FormQuestion::TYPE_RADIO:
                case FormQuestion::TYPE_SELECT:
                    if (!is_string($answerData['content'])) {
                        throw ValidationException::withMessages([
                            "answers.$questionId.content" => 'Answer must be a string.',
                        ]);
                    }
                    break;

                case FormQuestion::TYPE_CHECKBOX:
                    if (!is_array($answerData['content'])) {
                        throw ValidationException::withMessages([
                            "answers.$questionId.content" => 'Answer must be an array.',
                        ]);
                    }
                    break;

                case FormQuestion::TYPE_FILE:
                    // Fetch uploaded files or input strings
                    $uploadedFiles = $this->file("answers.$questionId.content");
                    $content = $this->input("answers.$questionId.content");

                    if (!is_null($uploadedFiles)) {
                        if (!is_array($uploadedFiles) && empty($uploadedFiles)) {
                            throw ValidationException::withMessages([
                                "answers.$questionId.content" => 'Files must be uploaded as an array or not content.',
                            ]);
                        }

                        foreach ($uploadedFiles as $file) {
                            if (!($file instanceof \Illuminate\Http\UploadedFile)) {
                                throw ValidationException::withMessages([
                                    "answers.$questionId.content" => 'Each file must be a valid uploaded file.',
                                ]);
                            }
                        }

                        $answerData['content'] = $uploadedFiles;
                        break;
                    } else {

                        if (!is_array($content) && empty($content)) {
                            throw ValidationException::withMessages([
                                "answers.$questionId.content" => 'URLs must be uploaded as an array or empty array.',
                            ]);
                        }

                        // Validate each element in the array
                        foreach ($content as $item) {
                            if (!($item instanceof \Illuminate\Http\UploadedFile) && !is_string($item)) {
                                throw ValidationException::withMessages([
                                    "answers.$questionId.content" => 'Each answer must be either a valid file or a URL string.',
                                ]);
                            }

                            if (is_string($item) && !preg_match('/^(\/storage\/upload\/answers\/.+|chunkref_[a-zA-Z0-9\-]+_.+)$/', $item)) {
                                throw ValidationException::withMessages([
                                    "answers.$questionId.content" => 'Invalid format for file reference.',
                                ]);
                            }
                        }

                        $answerData['content'] = $uploadedFiles;
                        break;
                    }

                default:
                    throw ValidationException::withMessages([
                        "answers.$questionId.type" => 'Unsupported question type.',
                    ]);
            }

            // 4. Check required fields are not empty
            if ($question->is_required) {
                $content = $answerData['content'];
                if ((is_string($content) && trim($content) === '') || (is_array($content) && count($content) === 0)) {
                    throw ValidationException::withMessages([
                        "answers.$questionId.content" => 'This field is required.',
                    ]);
                }
            }
        }
    }
}

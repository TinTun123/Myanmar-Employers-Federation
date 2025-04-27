<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Http\Resources\FormResource;
use App\Models\Form;
use App\Models\FormQuestion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    //
    public function index()
    {
        $forms = Form::with('latestFormVersion')->paginate(10);
        return FormResource::collection($forms);
    }
    public function show($id)
    {
        $form = Form::with('latestFormVersion')->findOrFail($id); // Eager load only the latest version
        return new FormResource($form); // Wrap the $form in FormResource
    }


    public function store(StoreFormRequest $request)
    {

        $validated = $request->validated();

        $form = Form::create($validated);

        $formVersion = $form->formVersions()->create([
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $questions = json_decode($validated['questions'], true);

        foreach ($questions as $question) {
            $this->createQuestion($question, $formVersion);
        }

        if (isset($validated['id_prefix_question'])) {
            $id_prefixQuestion = json_decode($validated['id_prefix_question'], true);
            $idPrefixQuestion = $this->createIDPrefixQuestion($id_prefixQuestion, $formVersion);
            $formVersion->questions()->save($idPrefixQuestion);
        }

        unset($validated['questions']);

        return new FormResource($form);
    }

    public function update(StoreFormRequest $request, Form $form)
    {
        $validated = $request->validated();

        // Update the form fields
        $form->update($validated);

        // Get the latest form version
        $latestFormVersion = $form->latestFormVersion;

        // Decode the incoming questions
        $incomingQuestions = isset($validated['questions']) ? json_decode($validated['questions'], true) : [];

        // Check if there are differences in questions
        $existingQuestions = $latestFormVersion ? $latestFormVersion->questions->toArray() : [];
        $questionsAreDifferent = $this->areQuestionsDifferent($existingQuestions, $incomingQuestions);

        if ($questionsAreDifferent) {

            Log::info('latestFormVersion', [$latestFormVersion]);

            // Create a new form version
            $newFormVersion = $form->formVersions()->create([
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Add new questions to the new form version
            foreach ($incomingQuestions as $question) {
                $this->createQuestion($question, $newFormVersion);
            }

            // Handle ID prefix question
            if (isset($validated['id_prefix_question'])) {
                $id_prefixQuestion = json_decode($validated['id_prefix_question'], true);
                $idPrefixQuestion = $this->createIDPrefixQuestion($id_prefixQuestion, $newFormVersion);
                $newFormVersion->questions()->save($idPrefixQuestion);
            }
        }

        return new FormResource($form);
    }

    public function destroy(Form $form)
    {
        $form->delete(); // Delete the form (cascade deletes associated versions if set up in the database)

        return response()->json([
            'message' => 'Form deleted successfully',
        ], 200);
    }

    private function createQuestion($question, $formVersion)
    {


        $validator = Validator::make($question, [
            'question_text' => 'required|string',
            'type' => ['required', Rule::in([
                FormQuestion::TYPE_TEXT,
                FormQuestion::TYPE_RADIO,
                FormQuestion::TYPE_CHECKBOX,
                FormQuestion::TYPE_SELECT,
                FormQuestion::TYPE_TEXTAREA,
                FormQuestion::TYPE_FILE,
            ])],
            'is_required' => 'boolean',
            'is_prefixed' => 'boolean',
            'data' => 'nullable|array',
            'description' => 'nullable|string',
        ]);


        $validated = $validator->validated();
        if (is_array($validated['data'])) {
            $validated['data'] = json_encode($validated['data']);
        }

        return $formVersion->questions()->create($validated);
    }

    private function createIDPrefixQuestion($question, $formVersion)
    {


        $validator = Validator::make($question, [
            'question_text' => 'required|string',
            'type' => ['required', Rule::in([
                FormQuestion::TYPE_RADIO,
            ])],
            'data' => 'required|array',
            'description' => 'nullable|string'
        ]);

        $validated = $validator->validated();
        if (is_array($validated['data'])) {
            $validated['data'] = json_encode($validated['data']);
        }
        return $formVersion->questions()->create(
            array_merge($validated, [
                'is_required' => true,
                'is_prefixed' => true,
            ])
        );
    }

    private function areQuestionsDifferent(array $existingQuestions, array $incomingQuestions): bool
    {
        // Normalize the data for comparison
        $normalize = function ($questions) {
            return array_map(function ($question) {
                return [
                    'question_text' => $question['question_text'] ?? '',
                    'type' => $question['type'] ?? '',
                    'is_required' => $question['is_required'] ?? false,
                    'is_prefixed' => $question['is_prefixed'] ?? false,
                    'data' => isset($question['data']) ? json_encode($question['data']) : null,
                    'description' => $question['description'] ?? '',
                ];
            }, $questions);
        };

        $normalizedExisting = $normalize($existingQuestions);
        $normalizedIncoming = $normalize($incomingQuestions);

        // Compare the two arrays
        return $normalizedExisting !== $normalizedIncoming;
    }
}

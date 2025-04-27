<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('form_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_version_id')->constrained()->onDelete('cascade');
            $table->text('question_text');
            $table->enum('type', [
                'text',
                'radio',
                'select',
                'checkbox',
                'textarea',
            ]);
            $table->boolean('is_required')->default(false);
            $table->json('data')->nullable(); // options, validations, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_questions');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->foreignId('form_version_id')->constrained()->onDelete('cascade');
            $table->string('case_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};

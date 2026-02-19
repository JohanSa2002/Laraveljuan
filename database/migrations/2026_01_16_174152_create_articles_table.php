<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('students'); // Contributing student names
            $table->integer('year');
            $table->string('career');
            $table->string('pdf_path');
            $table->enum('status', ['aprobado', 'revisión', 'rechazado'])->default('revisión');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Uploader (student)
            $table->foreignId('advisor_id')->nullable()->constrained('users')->onDelete('set null'); // Assigned evaluator
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graduation_projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('advisor');
            $table->string('career');
            $table->integer('year');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('file_path');
            $table->string('keywords')->nullable();
            $table->date('defense_date')->nullable();
            $table->text('admin_comments')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graduation_projects');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('taskId');
            $table->unsignedBigInteger('attachmentFileId');
            $table->foreign('attachmentFileId')->references('attachmentFileId')->on('attachment_files');
            $table->string('title');
            $table->text('description');
            $table->string('user');
            $table->boolean('completed');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

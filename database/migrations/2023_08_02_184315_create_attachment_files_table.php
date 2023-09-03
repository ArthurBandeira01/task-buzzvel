<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attachment_files', function (Blueprint $table) {
            $table->id('attachmentFileId');
            $table->string('attachmentFile');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachment_files');
    }
};

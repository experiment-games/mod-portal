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
        Schema::create('mod_versions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mod_id')->constrained()->cascadeOnDelete();
            $table->string('version');
            $table->longText('release_notes')->nullable();
            $table->string('file_path')->nullable(); // If stored on-site
            $table->string('external_link')->nullable(); // If stored off-site
            $table->string('hash'); // Hash to verify file integrity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mod_versions');
    }
};

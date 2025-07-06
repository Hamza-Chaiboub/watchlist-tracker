<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('watch_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('content_id')->constrained('contents')->cascadeOnDelete();
            $table->foreignId('status_id')->constrained('statuses');
            $table->decimal('rating', 3, 1)->nullable();
            $table->unique(['user_id', 'content_id'], 'user_content_unique');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE watch_lists ADD CONSTRAINT chk_rating CHECK (rating IS NULL OR (rating >= 0 AND rating <= 10))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_lists');
    }
};

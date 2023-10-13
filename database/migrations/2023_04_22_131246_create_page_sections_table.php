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
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Page::class)
                ->constrained()
                ->cascadeOnDelete();

            $table->string('heading')->nullable()->fulltext();
            $table->string('type')->fulltext();
            $table->json('extra');

            $table->unique(['page_id', 'heading'], 'u_page_title');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_sections');
    }
};

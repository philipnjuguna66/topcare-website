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
        Schema::table('projects', function (Blueprint $table) {


            $table->mediumText('location')->fulltext();
            $table->string('purpose')->fulltext();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {


            $table->dropColumn('location')->fulltext();
            $table->dropColumn('purpose')->fulltext();

        });
    }
};

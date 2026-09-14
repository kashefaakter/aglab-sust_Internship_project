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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('authors')->nullable();
            $table->string('journal')->nullable();
            $table->year('year')->nullable();
            $table->string('publication_type')->nullable();
            $table->string('status')->default('Published');

            $table->text('citation')->nullable();
            $table->string('doi')->nullable();

            $table->longText('abstract')->nullable();

            $table->string('publication_url')->nullable();
            $table->string('pdf_file')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};

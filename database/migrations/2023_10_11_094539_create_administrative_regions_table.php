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
        Schema::create('administrative_regions', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->string('code_name_en')->nullable();

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrative_regions');
    }
};

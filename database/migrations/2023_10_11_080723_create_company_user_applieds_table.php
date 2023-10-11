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
        Schema::create('company_user_applieds', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('post_recruitment_id');
            $table->integer('status_applied')->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_user_applieds');
    }
};

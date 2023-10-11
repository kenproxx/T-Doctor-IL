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
        Schema::create('my_cvs', function (Blueprint $table) {
            $table->id();

            $table->string('name')->comment('Tên ứng viên');
            $table->string('job_title')->comment('Tên công việc');
            $table->string('position')->comment('Chức vụ');
            $table->string('year_of_experience')->comment('Số năm kinh nghiệm');
            $table->string('email');
            $table->string('phone_number');
            $table->string('date_of_birth');
            $table->string('nation')->comment('Mã quốc gia');
            $table->string('sex')->comment('Giới tính');
            $table->string('status_marital')->comment('Trạng thái hôn nhân');
            $table->string('status_cv')->comment('Trạng thái CV');

            $table->string('province_id')->nullable();
            $table->string('district_id')->nullable();
            $table->string('commune_id')->nullable();
            $table->string('detail_address')->nullable();

            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('education_id')->nullable();
            $table->unsignedInteger('skill_id')->nullable();
            $table->unsignedInteger('certificate_id')->nullable();

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
        Schema::dropIfExists('my_cvs');
    }
};

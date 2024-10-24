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
        Schema::create('use_cases', function (Blueprint $table) {
            $table->id('id_usecase');
            $table->string('uid_case')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->string('case_name')->nullable();
            $table->text('case_desc')->nullable();
            $table->string('case_actor')->nullable();
            $table->text('case_for_solution')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id_project')->on('projects')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('use_cases');
    }
};

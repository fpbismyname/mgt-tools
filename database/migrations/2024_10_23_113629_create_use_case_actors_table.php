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
        Schema::create('use_case_actors', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('project_id');
            $table->string('actor_name')->nullable();

            $table->foreign('project_id')->references('id_project')->on('projects')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('use_case_actors');
    }
};

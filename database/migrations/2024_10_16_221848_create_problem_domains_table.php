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
        Schema::create('problem_domains', function (Blueprint $table) {
            $table->id("id_problem");
            $table->text("uid_problem")->nullable();
            $table->text("problem_name");
            $table->unsignedBigInteger("project_id");
            $table->timestamps();
            $table->foreign('project_id')->references('id_project')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problem_domains');
    }
};

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
        Schema::create('solution_domains', function (Blueprint $table) {
            $table->id("id_solution");
            $table->unsignedBigInteger("project_id");
            $table->string("solution_desc");
            $table->string("type_solution");
            $table->string("potential_of_solution")->nullable()->default("Incomplete");
            $table->string("solution_revision")->nullable();
            $table->unsignedBigInteger("solution_need")->nullable();
            $table->string("solution_clasification")->nullable();
            $table->string("solution_feasibility")->nullable();
            $table->string("solution_risk")->nullable();
            $table->string("solution_priority")->nullable();
            $table->string("eliminated_solution_rank")->nullable();
            $table->timestamps();

            $table->foreign('solution_need')->references('id_problem')->on('problem_domains')->onDelete('set null');
            $table->foreign('project_id')->references('id_project')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solution_domains');
    }
};

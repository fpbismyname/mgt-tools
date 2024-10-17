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
            $table->string("potential_of_solution");
            $table->string("solution_revision");
            $table->unsignedBigInteger("solution_need")->nullable();
            $table->string("solution_clasification");
            $table->string("solution_feasibility");
            $table->string("solution_risk");
            $table->string("solution_priority");
            $table->string("eliminated_solution_rank");
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

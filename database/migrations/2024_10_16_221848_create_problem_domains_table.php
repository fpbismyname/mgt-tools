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
        Schema::create('problem_domain', function (Blueprint $table) {
            $table->id("id_problem");
            $table->string("problem_name");
            $table->unsignedBigInteger("id_project");
            $table->timestamps();
            $table->foreign('id_problem')->references('id_project')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problem_domain');
    }
};

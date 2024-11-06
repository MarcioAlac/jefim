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
        Schema::create('cases', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('person_case_id')->nullable();
            $table->unsignedBigInteger('company_case_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('urgency')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('person_case_id')->references('id')->on('case_person_details')->onDelete('set null');
            $table->foreign('company_case_id')->references('id')->on('case_company_details')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
};

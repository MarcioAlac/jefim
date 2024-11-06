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
        Schema::create('case_company_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('company');
            $table->string('cnpj');
            $table->longText('textEvent');
            $table->string('name');
            $table->string('adressCompany')->nulllable();
            $table->string('topic');
            $table->string('email');
            $table->string('tel')->nulllable();
            $table->string('filesPath')->nulllable();
            $table->date('date')->nulllable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_company_details');
    }
};

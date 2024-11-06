
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
        Schema::create('case_person_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->string('topic');
            $table->string('Defendant');
            $table->string('rg')->default('Informação nao inserida');
            $table->string('cpf');
            $table->string('adress')->nulllable();
            $table->date('date')->nulllable();
            $table->string('filesPath')->nulllable();
            $table->string('name');
            $table->string('tel')->nulllable();
            $table->string('email');
            $table->longText('textEvent');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_person_details');
    }
};

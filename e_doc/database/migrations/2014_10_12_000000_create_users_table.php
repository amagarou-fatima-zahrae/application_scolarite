<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiant', function (Blueprint $table) {
            $table->id();
            $table->string('code_apogee', 45);
            $table->string('email_etudiant', 45);
            $table->string('nom', 45);
            $table->string('prenom', 45);
            $table->string('niveau', 45);
            $table->string('annee_naissance', 45);
            $table->string('adresse', 45);
            $table->string('filiere', 45);
            $table->string('cne', 45);
            $table->rememberToken();
           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiant');
    }
};

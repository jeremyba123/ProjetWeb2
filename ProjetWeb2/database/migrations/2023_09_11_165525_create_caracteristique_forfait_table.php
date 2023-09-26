<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiqueForfaitTable extends Migration
{
    /**
     * Exécute les migrations : crée la table 'caracteristique_forfait'.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristique_forfait', function (Blueprint $table) {
            $table->id();
            $table->foreignId('caracteristique_id')->constrained()->cascadeOnDelete();
            $table->foreignId('forfait_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Revertit les migrations : supprime la table 'caracteristique_forfait'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristique_forfait');
    }
}

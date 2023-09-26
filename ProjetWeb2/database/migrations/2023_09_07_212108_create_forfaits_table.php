<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForfaitsTable extends Migration
{
    /**
     * Exécute les opérations nécessaires pour créer la table "forfaits".
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forfaits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->decimal('prix', 10, 2);
            $table->integer('jour');
            $table->timestamps();
        });
    }

    /**
     * Revertit les opérations effectuées dans la méthode "up" pour supprimer la table "forfaits".
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forfaits');
    }
}


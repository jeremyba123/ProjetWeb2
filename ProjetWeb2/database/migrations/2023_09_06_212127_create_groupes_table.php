<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesTable extends Migration
{
    /**
     * Exécute la migration pour créer la table "groupes".
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('ville');
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Revertit la migration en supprimant la table "groupes".
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupes');
    }
}

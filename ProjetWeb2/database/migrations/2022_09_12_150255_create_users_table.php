<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Exécute la migration pour créer la table des utilisateurs.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('account_type', ['client', 'employee', 'admin']);
            $table->timestamps();
            $table->string('remember_token')->nullable()->default(null);
;
        });
    }

    /**
     * Revertit la migration en supprimant la table des utilisateurs.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

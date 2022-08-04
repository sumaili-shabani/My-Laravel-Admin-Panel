<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 250);
            $table->string('email', 250)->nullable();
            $table->string('telephone1', 250)->nullable();
            $table->string('telephone2', 250)->nullable();
            $table->string('adresse', 450)->nullable();
            $table->string('facebook', 250)->nullable();
            $table->string('twitter', 250)->nullable();
            $table->string('linkedin', 250)->nullable();
            $table->string('whatsapp', 450)->nullable();
            $table->string('image', 250)->nullable();
            $table->text("mission")->nullable();
            $table->text("objectif")->nullable();
            $table->text("description")->nullable();
            $table->string("tug")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}

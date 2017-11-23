<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArgumentConceptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('argument_concept', function (Blueprint $table) {
            $table->integer('argument_id')->unsigned();
            $table->integer('concept_id')->unsigned();
        });
	    Schema::table('argument_concept', function (Blueprint $table) {
		    $table->foreign('argument_id')->references('id')->on('arguments')->onDelete('cascade');
		    $table->foreign('concept_id')->references('id')->on('concepts')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('argument_concept');
    }
}

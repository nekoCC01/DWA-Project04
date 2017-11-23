<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConceptQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concept_quote', function (Blueprint $table) {
	        $table->integer('concept_id')->unsigned();
	        $table->integer('quote_id')->unsigned();
        });
	    Schema::table('concept_quote', function (Blueprint $table) {
		    $table->foreign('concept_id')->references('id')->on('concepts')->onDelete('cascade');
		    $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concept_quote');
    }
}

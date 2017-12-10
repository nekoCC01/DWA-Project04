<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArgumentQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('argument_quote', function (Blueprint $table) {
            $table->integer('argument_id')->unsigned();
            $table->integer('quote_id')->unsigned();
        });
        Schema::table('argument_quote', function (Blueprint $table) {
            $table->foreign('argument_id')->references('id')->on('arguments')->onDelete('cascade');
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
        Schema::dropIfExists('argument_quote');
    }
}

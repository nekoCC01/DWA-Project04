<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefinitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definitions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('definition');
	        $table->integer('philosopher_id')->unsigned();
	        $table->integer('work_id')->unsigned()->nullable();
        });

	    Schema::table('definitions', function(Blueprint $table){
		    $table->foreign('philosopher_id')->references('id')->on('philosophers');
		    $table->foreign('work_id')->references('id')->on('works');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('definitions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArgumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arguments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('assumption');
            $table->text('conclusion');
            $table->integer('philosopher_id')->unsigned()->nullable();
            $table->integer('work_id')->unsigned()->nullable();
        });

        Schema::table('arguments', function (Blueprint $table) {
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
        Schema::dropIfExists('arguments');
    }
}

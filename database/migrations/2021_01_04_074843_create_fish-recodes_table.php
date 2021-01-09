<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishRecodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('recodes')) {
            Schema::create('recodes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('user');
                $table->date('date');
                $table->string('place');
                $table->string('weather');
                $table->string('tide');
                $table->string('temperature');
                $table->string('fish');
                $table->integer('length');
                $table->text('comment');
                $table->timestamps();
            });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('recodes');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImgPathToRecodeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recodes', function (Blueprint $table) {
            $table->string("file_name");
            $table->string("file_path");
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recodes', function (Blueprint $table) {
            $table->dropColumn("file_name");
            $table->dropColumn("file_path");
        });
    }
}
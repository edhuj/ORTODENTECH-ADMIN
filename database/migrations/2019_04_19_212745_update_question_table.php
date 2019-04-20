<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('questions', function (Blueprint $table) {
        $table->string('filename')->nullable();
        $table->string('mime')->nullable();
        $table->string('original_filename')->nullable();
        $table->string('statement')->change();
        $table->string('option1')->change();
        $table->string('option2')->change();
        $table->string('option3')->change();
        $table->string('option4')->change();
        $table->integer('answer')->change();
        $table->string('category');
        $table->string('topic')->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

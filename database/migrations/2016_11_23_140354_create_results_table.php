<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_254_user_user_id_result')->references('id')->on('users');
            $table->string('correct')->nullable();
            $table->datetime('date')->nullable();
            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id', 'fk_257_question_question_id_result')->references('id')->on('questions');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}

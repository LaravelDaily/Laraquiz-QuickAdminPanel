<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id', 'fk_257_question_question_id_questions_option')->references('id')->on('questions');
            $table->string('option')->nullable();
            $table->tinyInteger('correct')->nullable()->default(0);
            
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
        Schema::dropIfExists('questions_options');
    }
}

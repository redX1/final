<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionDiffusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question__diffusions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emission_diffusion_id')->unsigned()->index();
            $table->integer('question_id')->unsigned()->index();
            $table->date('day');
            $table->time('begin_at');
            $table->time('end_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question__diffusions');
    }
}

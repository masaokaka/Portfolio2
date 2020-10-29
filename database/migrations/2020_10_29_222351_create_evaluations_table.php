<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nonverbal');
            $table->integer('initiative');
            $table->integer('communication');
            $table->integer('aspiration');
            $table->string('comment',500);
            $table->string('feedback',500);
            $table->integer('user_id');
            $table->integer('admin_id');
            $table->string('interview');
            $table->date('date');
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
        Schema::dropIfExists('evaluations');
    }
}

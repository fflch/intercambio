<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_disciplinas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('original_name');
            $table->string('path');
            $table->unsignedBigInteger('disciplina_id')->nullable();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_disciplinas');
    }
}

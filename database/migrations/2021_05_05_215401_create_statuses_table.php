<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('reason')->nullable();
            $table->morphs('model');
            $table->timestamps();

            # usuário que está mudando o status
            #$table->unsignedBigInteger('user_id')->nullable();
            #$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->foreignId('user_id')->nullable()->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_songs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('song_name')->unique();
            $table->integer('singer_id')->nullable();
            $table->integer('album_id')->nullable();
            $table->string('duration')->nullable();
            $table->integer('release_year')->nullable();
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
        Schema::dropIfExists('all_songs');
    }
}

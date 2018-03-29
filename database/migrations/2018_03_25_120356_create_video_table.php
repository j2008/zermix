<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title')->nullable();
          $table->integer('post_id')->nullable();
          $table->string('page')->nullable();
          $table->boolean('active')->default(true);
          $table->string('url');
          $table->string('video_cover')->nullable();
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
        //
    }
}

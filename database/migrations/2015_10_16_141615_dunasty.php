<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dunasty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Dunasty2222',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('news_id');
            $table->string('author_name');
            $table->string('author_url');
            $table->string('author_key');
            $table->string('ip');
            $table->string('message');
            $table->string('mail');
            $table->integer('create_time');
            $table->integer('parent_id');
        });
        echo "up";
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        echo "back";
    }
}

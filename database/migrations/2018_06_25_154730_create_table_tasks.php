<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('content');
            $table->timestamps();
            
            $table->integer('user_id')->unsigned()->index();
            //unsigned:負の数は許可しない
            //index:検索速度を早める
            
            //外部キー制約
            $table->foreign('user_id')->references('id')->on('users');
            //usersテーブルのidに格納されている値だけが、user_idに格納することができるようにする。
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}

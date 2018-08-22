<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * 参赛作品数据表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->integer('ranking')->nullable();  //排名
            $table->integer('votes_count')->default(0);   //票数
            $table->string('link')->nullable();
            $table->string('address')->nullable();
            $table->string('school')->nullable();
            $table->string('class')->nullable();
            $table->string('profession')->nullable(); 
            $table->string('real_name');
            $table->string('tel');
            $table->text('img')->comment('图片')->null();
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
        Schema::dropIfExists('posts');
    }
}

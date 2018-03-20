<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');	               
            $table->integer('post_id');
            $table->integer('owner_user_id');
            $table->integer('target_user_id');
            $table->integer('dislike');
            $table->integer('like');
            $table->integer('parent_id');
            $table->integer('parent_type');
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
        Schema::dropIfExists('comments');
    }
}

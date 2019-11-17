<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('bookName');
            $table->text('description');
            $table->tinyInteger('publish')->default(1);
            $table->integer('price');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

          //  foreignkey
            $table->foreign('author_id')
                ->references('id')
                ->on('author_names')
                ->onDelete('cascade');
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

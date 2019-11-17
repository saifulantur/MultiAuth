<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('book_name');
            $table->string('pdf_file');
            $table->tinyInteger('isActive')->default(1);
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('pdf_lists');
    }
}

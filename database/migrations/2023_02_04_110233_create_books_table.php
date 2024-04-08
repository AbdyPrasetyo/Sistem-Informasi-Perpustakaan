<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('book_id');
            $table->char('book_code')->unique();
            $table->bigInteger('isbn')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('book_location');
            $table->string('book_category');
            $table->string('author');
            $table->string('publisher');
            $table->year('year');
            $table->bigInteger('amount');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('books');
    }
}

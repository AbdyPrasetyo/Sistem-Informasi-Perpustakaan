<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('book_id')->on('books')->onUpdate('cascade')->onDelete('cascade');
            $table->date('created');
            $table->date('deadline');
            $table->date('return_date')->nullable();
            $table->string('late')->nullable();
            $table->string('charge')->nullable();
            $table->enum('status', ['PINJAM', 'KEMBALI','HILANG','LUNAS'])->nullable();
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
        Schema::dropIfExists('transactions');
    }
}

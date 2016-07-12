<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('author');
            $table->string('publisher');
            $table->string('edition');
            $table->string('stock');
            $table->string('instock');
            $table->timestamps();
        });

        Schema::create('book_user', function (Blueprint $table) {
            $table->integer('book_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->date('return_date');

            $table->foreign('book_id')
                  ->references('id')
                  ->on('books');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');

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
        Schema::drop('book_user');
        Schema::drop('books');
    }
}

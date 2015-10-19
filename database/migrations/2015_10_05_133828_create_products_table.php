<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            #criando Chave Estrangeira para relacionamento
            $table->integer('category_id')->unsigned();
            #criando o relacionamento de category_id com a tabela categories
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('name');
            $table->text('description');
            $table->decimal('price');
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
        Schema::drop('products');
    }
}

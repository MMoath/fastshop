<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->require();
            $table->text('description')->nullable();
            $table->string('thumbnail')->require();

            $table->integer('categories_id')->unsigned()->nullable();
            $table->foreign('categories_id')->references('id')->on('categories');

            $table->bigInteger('quantity')->require();
            $table->bigInteger('unit_price')->require();
            $table->bigInteger('selling_price')->require();

            $table->text('notes')->nullable();
            $table->enum('status', ['0','1', '2', '3', '4'])->require()->default("0");
            // $table->tinyInteger('status')
            /*
            *  Explanation of product statuses
                    '0'=> "Stock",
                    '1' => "Displayed",
                    '2'=> "Discounts",
                    '3' => "Finished", 
                    '4' => "Consists"
            */
            $table->integer('created_by')->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();

            // $table->integer('price');
            // $table->string('img');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

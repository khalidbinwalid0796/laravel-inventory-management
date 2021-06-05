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
            $table->biginteger('supplier_id')->unsigned();
            $table->biginteger('unit_id')->unsigned();
            $table->biginteger('category_id')->unsigned();
            $table->string('name');
            $table->double('quantity')->default(0);
            $table->tinyInteger('status')->default(1); 
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->foreign('supplier_id','unit_id','category_id')
            ->references('id')->on('suppliers','units','categories')
            ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}

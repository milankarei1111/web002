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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->char('unit', 4);
            $table->float('price', 8, 2);
            $table->string('specification');
            $table->biginteger('inventory');
            $table->biginteger('safety_stock');
            $table->string('image_path');
            $table->string('remark')->nullable();
            $table->softDeletes(); // 軟刪除
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

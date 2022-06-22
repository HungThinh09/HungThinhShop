<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProduct extends Migration
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
            $table->string('productName',255)->require()->unique();
            $table->string('productSlug',255)->require()->unique();
            $table->longText('description')->nullable();
            $table->tinyInteger('user_id')->nullable();
            $table->float('price')->default(0);
            $table->string('image')->nullable();
            $table->string('imageList')->nullable();
            $table->string('tag')->nullable();
            $table->tinyInteger('sale')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('active')->default(1)->comment('1 còn hàng, 2 hết hàng ');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_product');
    }
}

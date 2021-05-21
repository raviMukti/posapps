<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id')->autoIncrement();
            $table->string('item_name', 150)->nullable(false);
            $table->text('description')->nullable();
            $table->string('sku', 50)->nullable()->unique();
            $table->string('barcode', 50)->nullable();
            $table->double('price');
            $table->text('item_image')->nullable();
            $table->boolean('publish')->nullable(false)->default(false);
            $table->boolean('active')->nullable(false)->default(true);
            $table->timestamps();
        });

        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->foreign('category_id')->references('category_id')->on('categories')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('updated_by')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}

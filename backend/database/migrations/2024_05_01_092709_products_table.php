<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tworzenie tabeli `availability`
        Schema::create('availability', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->date('updateDate');
        });
        // Tworzenie tabeli `brands`
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brandName', 150);
        });

        // Tworzenie tabeli `categories`
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
        });

        // Tworzenie tabeli `vehicleType`
        Schema::create('vehicleType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
        });
        // Tworzenie tabeli `products`
        Schema::create('products', function(Blueprint $table){
            $table->increments('id');
            $table->string('name', 150);
            $table->string('producer', 150);
            $table->string('partNumber', 150);
            $table->decimal('priceBrutto', 10, 2);
            $table->decimal('priceNetto', 10, 2);
            $table->string('description', 250);
            $table->string('description2', 250);
            $table->string('description3', 250); 
            $table->unsignedInteger('availability_id');
            $table->unsignedInteger('brands_id');
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('vehicleType_id');

            $table->foreign('availability_id')->references('id')->on('availability')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('vehicleType_id')->references('id')->on('vehicleType')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        // Tworzenie tabeli `suppliers`
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameSupplier', 150);
            $table->string('contact', 150);
        });

        // Tworzenie tabeli `products_has_suppliers`
        Schema::create('products_has_suppliers', function (Blueprint $table) {
            $table->unsignedInteger('products_id');
            $table->unsignedInteger('suppliers_id');
            $table->primary(['products_id', 'suppliers_id']);

            $table->foreign('products_id')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('suppliers_id')->references('id')->on('suppliers')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products_has_suppliers');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('products');
        Schema::dropIfExists('vehicleType');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('availability');
    }
};

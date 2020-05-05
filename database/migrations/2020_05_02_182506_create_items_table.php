<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items', function (Blueprint $table) {
          $table->id();
          $table->enum('category',['pet', 'phone', 'jewellery'])->default('pet');
          $table->DateTime('found_time');
          $table->string('found_user', 30);
          $table->string('found_place', 256);
          $table->string('colour', 20)->nullable();
          $table->string('description', 256)->nullable();
          $table->string('image', 256)->nullable();
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
        Schema::dropIfExists('items');
    }
}

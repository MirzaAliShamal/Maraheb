<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resturant_manager_id')->constrained()->onDelete('cascade');
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->string('logo');
            $table->string('name');
            $table->string('address');
            $table->string('trade_license');
            $table->integer('no_of_dept');
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
        Schema::dropIfExists('resturants');
    }
};

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
        Schema::create('resturant_departments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resturant_id')->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->constrained()->onDelete('cascade');
            $table->float('rate')->default(0);
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
        Schema::dropIfExists('resturant_departments');
    }
};

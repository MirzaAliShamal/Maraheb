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
        Schema::table('recruiters', function (Blueprint $table) {
            $table->string('resturant_logo')->nullable()->after('zip_code');
            $table->string('resturant_name')->nullable()->after('resturant_logo');
            $table->string('resturant_address')->nullable()->after('resturant_name');
            $table->string('resturant_trade_license')->nullable()->after('resturant_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recruiters', function (Blueprint $table) {
            //
        });
    }
};

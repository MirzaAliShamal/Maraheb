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
        Schema::table('resturant_managers', function (Blueprint $table) {
            $table->dropColumn('resturant_logo');
            $table->dropColumn('resturant_name');
            $table->dropColumn('resturant_address');
            $table->dropColumn('resturant_trade_license');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resturant_managers', function (Blueprint $table) {
            //
        });
    }
};

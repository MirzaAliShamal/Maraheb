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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('topLevelDomain')->nullable();
            $table->text('alpha2Code')->nullable();
            $table->text('alpha3Code')->nullable();
            $table->text('callingCodes')->nullable();
            $table->text('capital')->nullable();
            $table->text('altSpellings')->nullable();
            $table->text('subregion')->nullable();
            $table->text('region')->nullable();
            $table->text('population')->nullable();
            $table->text('latlng')->nullable();
            $table->text('demonym')->nullable();
            $table->text('area')->nullable();
            $table->text('timezones')->nullable();
            $table->text('borders')->nullable();
            $table->text('nativeName')->nullable();
            $table->text('numericCode')->nullable();
            $table->text('flags')->nullable();
            $table->text('currencies')->nullable();
            $table->text('languages')->nullable();
            $table->text('translations')->nullable();
            $table->text('flag')->nullable();
            $table->text('regionalBlocs')->nullable();
            $table->text('cioc')->nullable();
            $table->text('independent')->nullable();
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
        Schema::dropIfExists('countries');
    }
};

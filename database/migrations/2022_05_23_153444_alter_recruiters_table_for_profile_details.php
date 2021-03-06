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
            $table->string('age')->nullable()->after('password');
            $table->string('dob')->nullable()->after('age');
            $table->string('gender')->nullable()->after('dob');
            $table->string('address')->nullable()->after('gender');
            $table->string('country')->nullable()->after('address');
            $table->string('city')->nullable()->after('country');
            $table->string('zip_code')->nullable()->after('city');
            $table->enum('profile_status', ['pending', 'submitted', 'approved', 'rejected'])->default('pending')->after('cv');
            $table->boolean('visibility_status')->default(1)->after('profile_status');
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

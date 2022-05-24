<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Admin::count() == 0) {
            Admin::create([
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@maraheb.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}

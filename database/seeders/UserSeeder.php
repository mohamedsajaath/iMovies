<?php

namespace Database\Seeders;

use App\Models\ShippingDetails;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "sajaath",
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin@123'),

        ]);
    }
}

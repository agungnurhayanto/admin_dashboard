<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'administrator',
            'email' => 'agung.nex.edp@gmail.com',
            'email_verified_at' => now(),
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}

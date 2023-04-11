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
            'user_level' => 'admin',
            'user_status' => '1',
            'password' => Hash::make('admin123'),
        ]);
        $user = User::create([
            'name' => 'agung',
            'email' => 'agung.nex8.edp@gmail.com',
            'email_verified_at' => now(),
            'username' => 'agung',
            'user_level' => 'penulis',
            'user_status' => '2',
            'password' => Hash::make('admin123'),
        ]);
    }
}

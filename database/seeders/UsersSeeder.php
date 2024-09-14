<?php

namespace Database\Seeders;

// use App\Models\User;
use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Angger Shalahuddin',
            'username' => 'anggershalahuddin123@gmail.com',
            'no_telp' => '089622194950',
            'password' => Hash::make('1234'),
            'role' => '1'
        ]);

        User::create([
            'nama' => 'Ahmad Alwi',
            'username' => 'alwi@gmail.com',
            'no_telp' => '087870644440',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'nama' => 'Aldi Fathurrahman',
            'no_telp' => '0851234567822',
            'username' => 'aldi@gmail.scom',
            'password' => Hash::make('1234'),
        ]);

        User::create([
            'nama' => 'Dimas Riki',
            'no_telp' => '089622185960',
            'username' => 'dimas@gmail.com',
            'password' => Hash::make('1234'),
        ]);
    }
}

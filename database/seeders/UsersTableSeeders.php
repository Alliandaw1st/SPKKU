<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name'=>'User',
        //     'email'=>'user@gmail.com',
        //     'password'=>Hash::make('user')
        // ]);
        User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'is_admin' => 1,
            'password'=>Hash::make('admin')
        ]);
    }
}

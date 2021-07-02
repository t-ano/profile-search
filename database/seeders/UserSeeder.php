<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;

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
            'role' => 1,
            'name' => '管理者',
            'email' => 'admin@ne.jp',
            'password' => Hash::make('admin123')
        ]);
        DB::table('users')->insert([
            'role' => 2,
            'name' => '利用者A',
            'email' => 'user@ne.jp',
            'password' => Hash::make('user1234')
        ]);
    }
}

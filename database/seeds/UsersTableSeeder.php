<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => '一護',
            'mail' => 'Atlas01@com',
            'password' => 'atlas01'],
            ['username' => '二那',
            'mail' => 'Atlas02@com',
            'password' => 'atlas02'],
            ['username' => '三葉',
            'mail' => 'Atlas03@com',
            'password' => 'atlas03']
        ]);
    }
}

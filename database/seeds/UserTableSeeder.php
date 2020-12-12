<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Anton',
                'email' => 'anton123@gmail.com',
                'password' => bcrypt('jakarta123'),
                'user_role' => 'member',
            ),
            array(
                'name' => 'Daryono',
                'email' => 'daryono998@gmail.com',
                'password' => bcrypt('daryono0099'),
                'user_role' => 'admin',
            ),
        ));
    }
}

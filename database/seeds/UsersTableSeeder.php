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


        $user = [
            'name' => 'pedro',
            'email' => 'pe@pe.com',
            'password' => bcrypt('123456')

        ];

        $admin = [
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'job_title' => 'administrador',
            'password' => bcrypt('123456')

        ];

        DB::table('users')->insert($user);
        DB::table('admins')->insert($admin);
    }
}

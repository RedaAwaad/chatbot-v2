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
        DB::table('users')->insert([
            'email' => 'admin@wakeb.com',
            'first_name' => 'Tarek',
            'last_name' => 'Mesalam',
            'full_name' => 'Tarek Mesalam',
            'age' => '25',
            'sex' => 'male',
            'is_admin' => true,
            'password' => bcrypt('132'),
        ]);

        DB::table('settings')->insert([
            'website_name' => 'Wakeb',
            'dashboard_url' => 'http://wwww.wakeb.tech',
            'user_id' => '1',
        ]);
    }
}

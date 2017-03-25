<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'name' => 'Egisberto Vicente da Silva',
            'email' => 'egisberto@gmail.com',
            'password' => bcrypt('q1w2e3r4'),
            'profile_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Josias Silva',
            'email' => 'josias.glamour@gmail.com',
            'password' => bcrypt('josias_glamour'),
            'profile_id' => 2,
            'company_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

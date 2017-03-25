<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
            'name' => 'Óticas Glamour',
            'cnpj' => '07310504000157',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_method')->insert([
            'name' => 'Dinheiro',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('payment_method')->insert([
            'name' => 'Cartão Crédito',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('payment_method')->insert([
            'name' => 'Cartão Débito',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('payment_method')->insert([
            'name' => 'Cheque',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('payment_method')->insert([
            'name' => 'Promissória',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
            'id' => 1,
            'name' => 'Admnistrador - Master',
            'description' => 'Perfil destinado aos usuários nível master - Desenvolvedores e donos do sistema.'
        ]);

        DB::table('profile')->insert([
            'id' => 2,
            'name' => 'Dono Empresa',
            'description' => 'Perfil exclusivo para o criado e dono da empresa que está fazendo uso do sistema.'
        ]);

        DB::table('profile')->insert([
            'id' => 3,
            'name' => 'Gerente Empresa',
            'description' => 'Perfil destinado ao gerente da loja.'
        ]);

        DB::table('profile')->insert([
            'id' => 4,
            'name' => 'Atendente',
            'description' => 'Perfil mais simples destinado à abertura de OS e atendimento simples ao cliente.'
        ]);
    }
}
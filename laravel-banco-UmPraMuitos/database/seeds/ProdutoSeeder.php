<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('produtos')->insert([
            'nome' => 'Camiseta Polo',
            'preco' => 100,
            'estoque' => 4,
            'categoria_id' => 1]);
        DB::table('produtos')->insert([
            'nome' => 'Calca',
            'preco' => 120,
            'estoque' => 1,
            'categoria_id' => 1]);
        DB::table('produtos')->insert([
            'nome' => 'Camisa manga longa',
            'preco' => 34,
            'estoque' => 2,
            'categoria_id' => 1]);
        DB::table('produtos')->insert([
            'nome' => 'PC Gammer',
            'preco' => 56,
            'estoque' => 4,
            'categoria_id' => 2]);
        DB::table('produtos')->insert([
            'nome' => 'Impressora',
            'preco' => 37,
            'estoque' => 6,
            'categoria_id' => 6]);
        DB::table('produtos')->insert([
            'nome' => 'Mouse',
            'preco' => 37,
            'estoque' => 5,
            'categoria_id' => 2]);
        DB::table('produtos')->insert([
            'nome' => 'Perfume',
            'preco' => 55,
            'estoque' => 7,
            'categoria_id' => 3]);
        DB::table('produtos')->insert([
            'nome' => 'Cama de Casal',
            'preco' => 55,
            'estoque' => 7,
            'categoria_id' => 4]);
        DB::table('produtos')->insert([
            'nome' => 'Moveis',
            'preco' => 55,
            'estoque' => 7,
            'categoria_id' => 4]);


    }
}

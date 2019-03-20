<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome'=>'Bernardo Silva','cargo'=>'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome'=>'Carlos Bernardo','cargo'=>'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome'=>'Bernardo Carlos','cargo'=>'Programador Pleno']);
    }
}

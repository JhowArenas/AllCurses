<?php

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedor = Desenvolvedor::with('projetos')->get();

    foreach ($desenvolvedor as $d) {
        echo "<p> Nome do Desenvolvedor: " . $d->nome . "</p>";
        echo "<p> Cargo: " . $d->cargo . "</p>";

        if (count($d->projetos) > 0) {
            echo "Projetos:  <br>";
            echo "<ul>";
            foreach ($d->projetos as $p) {
                echo "<li>";
                echo "Nome: " . $p->nome . " | ";
                echo "Horas: " . $p->estimativa_horas . " | ";
                echo "Horas trabalhadas: " . $p->pivot->horas_semanais;
                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

    return $desenvolvedor->toJson();
});

Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach ($projetos as $p) {
        echo "<p> Nome do Projeto: " . $p->nome . "</p>";
        echo "<p> Estimativa: " . $p->estimativa_horas . "</p>";

        if (count($p->desenvolvedores) > 0) {
            echo "Desenvolvedores:  <br>";
            echo "<ul>";
            foreach ($p->desenvolvedores as $d) {
                echo "<li>";
                echo "Nome: " . $d->nome . " | ";
                echo "Horas: " . $d->estimativa_horas . " | ";
                echo "Horas trabalhadas: " . $d->pivot->horas_semanais;
                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }


    //return $projetos->toJson();
});

Route::get('/alocar', function (){
   $proj = Projeto::find(4);

   if(isset($proj)){
       //$proj->desenvolvedores()->attach(1,['horas_semanais'=> 50]);
       $proj->desenvolvedores()->attach([
          1 => ['horas_semanais'=>10],
          2 => ['horas_semanais'=>20],
          3 => ['horas_semanais'=>30],
       ]);
   }
});

Route::get('/desalocar', function (){
   $proj = Projeto::find(4);

   if(isset($proj)){
       //$proj->desenvolvedores()->attach(1,['horas_semanais'=> 50]);
       $proj->desenvolvedores()->detach([1,2,3]);
   }
});


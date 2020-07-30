<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Produto;
use App\Categoria;

Route::get('/categoria', function () {
    $cat = Categoria::all();
    if(count($cat) === 0 )
        echo "<h4> Voce nao possui nenhuma categoria cadastrada </h4>";
    else{
        foreach ($cat as $c){
            echo "<p>" . $c -> id. " - " .$c -> nome. "</p>";
        }
    }
});

Route::get('/produto', function () {
    $prod = Produto::all();
    if(count($prod) === 0 )
        echo "<h4> Voce nao possui nenhum produto cadastrado </h4>";
    else{
        echo "<table>";
        echo "<thead> <tr><td>Nome</td><td>Estoque</td><td>Preco</td><td>Categoria</td></tr></thead>";
        foreach ($prod as $p){
            echo "<tr>";
            echo "<td>" . $p->nome. "</td>";
            echo "<td>" . $p->estoque. "</td>";
            echo "<td>" . $p->preco. "</td>";
            echo "<td>" . $p->categoria->nome. "</td>"; //chama as categorias atraves do comando dado no Produtos.php
            echo "</tr>";
        }
        echo "</table>";
    }
});

Route::get('/categoriasProdutos', function () {
    $cat = Categoria::all();
    if(count($cat) === 0 )
        echo "<h4> Voce nao possui nenhuma categoria cadastrada </h4>";
    else{
        foreach ($cat as $c){
            echo "<p>" . $c -> id. " - " .$c -> nome. "</p>";
            $produtos = $c->produtos; //chama categoria "filha" produtos na model Categorias

            if(count($produtos)>0){
                echo"<ul>";
                foreach ($produtos as $p){
                    echo "<li>". $p->nome. "</li>";
                }

                echo"</ul>";
            }
        }
    }
});

Route::get('/categoriasProdutos/json', function () { //gera arquivo json
  $cats = Categoria::with('produtos')->get();
  return $cats->toJson();

});

Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $p = new Produto();
    $p -> nome = "Meu novo produto";
    $p -> estoque = 10;
    $p -> preco = 100;
    $p -> categoria()->associate($cat);
    $p -> save();
    return $p -> toJson();
});

Route::get('/removerproduto', function () { //remove associassao feita entre produto e categoria
    $p = Produto::find(10);
    if(isset($p)){
        $p -> categoria()->dissociate();
        $p -> save();
        return $p -> toJson();
    }
    return '';

});

Route::get('/adicionarproduto/{$catid}', function ($catid) {
    $cat = Categoria::with('produto')->find($catid);
    $p = new Produto();
    $p -> nome = "Meu novo produto adcionado";
    $p -> estoque = 30;
    $p -> preco = 400;

    if(isset($cat)){
        $cat -> produtos() -> save($p);
    }
    return $cat ->toJson();
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MeuControlador;


Route::middleware(['meuMiddleware'])->group(function () {
    Route::get('/rota1', [MeuControlador::class, 'metodo1']);
    Route::get('/rota2', [MeuControlador::class, 'metodo2']);
});


Route::get('/minha-rota', [MeuControlador::class, 'meuMetodo'])->middleware('meuMiddleware');



Route::match(['get','post'], '/' ,[ProdutoController::class, 'index'])->name('home');
Route::match(['get','post'], '/categoria' ,[ProdutoController::class, 'categoria'])
            ->name('categoria');

Route::match(['get','post'], '/{idcategoria}/categoria' ,[ProdutoController::class, 'categoria'])
            ->name('categoria_por_id');

Route::match(['get','post'], '/cadastrar' ,[ClienteController::class, 'cadastrar'])
            ->name('cadastrar');

Route::match(['get','post'], '/cliente/cadastrar' ,[ClienteController::class, 'cadastrarCliente'])
->name('cadastrar_cliente');

Route::match(['get','post'], '/logar' ,[UsuarioController::class, 'logar'])
->name('logar');

Route::get('/sair' ,[UsuarioController::class, 'sair'])
->name('sair');

Route::match(['get','post'], '/{idproduto}/carrinho/adicionar' ,[ProdutoController::class, 'adicionarCarrinho'])
            ->name('adicionar_carrinho');

Route::match(['get','post'], '/carrinho' ,[ProdutoController::class, 'verCarrinho'])
            ->name('ver_carrinho');


Route::match(['get','post'], '/{indice}/excluircarrinho' ,[ProdutoController::class, 'excluirCarrinho'])
    ->name('carrinho_excluir');

Route::post('/carrinho/finalizar' ,[ProdutoController::class, 'finalizar'])
    ->name('carrinho_finalizar');

Route::match(['get','post'],'/compras/historico' ,[ProdutoController::class, 'historico'])
    ->name('compra_historico');

Route::post('/compras/detalhes', [ProdutoController::class, 'detalhes'])
    ->name('compra_detalhes');


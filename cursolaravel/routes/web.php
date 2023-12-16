<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::resource('produtos', ProdutoController::class);












































/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [ProdutoController::class, 'index'])->name('produto.index');

// Route::get('/produto/{id?}', [ProdutoController::class, 'show'])->name('produto.show');


//ESTUDANDO ROTAS:

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::any('/any', function() {
//     return "Permite todo tipo de acesso HTTP (put, delete, get, post..)";
// });

// Route::match(['get', 'post'], '/match', function() {
//     return "Permite apenas acessos definidos";
// });

// Route::get('/produto/{id}/{cat?}', function($id, $cat = "indefinida") {
//     return "O ID do produto é: " . $id . "<br> A categoria é: " . $cat;
// });

// Route::redirect('/sobre', '/empresa');

// Route::view('/empresa', 'site/empresa');

// Route::get('/news', function() {
//     return view('news');
// })->name('noticias'); 

// Route::get('/novidades', function () {
//     return redirect()->route('noticias');
// });

// Route::get('/', function () {
//     return redirect()->route('admin.dashboard');
// });

//GRUPO DE ROTAS UTILIZANDO ::PREFIX:

// Route::prefix('admin')->group(function() {
//     Route::get('dashboard', function(){
//         return('dashboard');
//     });
//     Route::get('users', function(){
//         return('users');
//     });
//     Route::get('clientes', function(){
//         return('clientes');
//     });
// });

//GRUPO DE ROTAS UTILIZANDO ::NAME

// Route::name('admin.')->group(function() {
//     Route::get('admin/dashboard', function(){
//         return('dashboard');
//     })->name('dashboard');

//     Route::get('admin/users', function(){
//         return('users');
//     })->name('users');

//     Route::get('admin/clientes', function(){
//         return('clientes');
//     })->name('clientes');

// });

//GRUPO DE ROTAS UTILIZANDO PREFIX E NAME ("AS"):

// Route::group([
//     'prefix' => 'admin',
//     'as' => 'admin.' //'as' é a chave que representa name. 
// ], function() {

//     Route::get('dashboard', function(){
//         return('dashboard');
//     })->name('dashboard');

//     Route::get('users', function(){
//         return('users');
//     })->name('users');

//     Route::get('clientes', function(){
//         return('clientes');
//     })->name('clientes');

// });
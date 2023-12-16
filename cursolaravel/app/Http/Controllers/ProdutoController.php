<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nome = "Misael";
        $idade = 20;
        $frutas = [];
        $html = "<h1>Eu  sou um HTML</h1>";
        return view('site.home', compact('nome', 'idade', 'html', 'frutas'));






       //$produtos = Produto::all(); //O model Produto representa a tabela "produtos"  criada em nosso banco de dados. O all() mapeia automaticamente uma tabela do banco de dados para uma classe.
       //return dd($produtos); //Debugando $produtos. Esse debug exibe para nós as informações contidas dentro dessa tabela.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

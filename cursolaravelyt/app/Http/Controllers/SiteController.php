<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Produto;
use App\Models\Categoria;

class SiteController extends Controller
{
    public function index()
    {
        // $produtos = Produto::all(); //O model Produto representa a tabela "produtos"  criada em nosso banco de dados. O all() mapeia automaticamente uma tabela do banco de dados para uma classe.
        //return dd($produtos); //Debugando $produtos. Esse debug exibe para nós as informações contidas dentro dessa tabela.

        $produtos = Produto::paginate(3); //Determinamos que vamos exibir 3 produtos por página.
        return view('site.home', compact('produtos'));
    
    }

    public function details($slug) {
        $produto = Produto::where('slug', $slug)->first();

        // Gate::authorize('ver-produto', $produto);
        // $this->authorize('verProduto', $produto);

        //Se o usuário desejar visualzar um produto cadastrado por ele, isso será possível.
        if(Gate::allows('ver-produto', $produto)) {
            return view('site.details', compact('produto')); 
        } 

        //Se o usuário desejar visualizar um produto que não foi cadastrado por ele, haverá um redirecionamento para o index.
        if(Gate::denies('ver-produto', $produto)) {
            return redirect(route('site.index'));
        } 

         // if(auth()->user()->can('verProduto', $produto)) {
        //     return view('site.details', compact('produto'));
        // }

        // if(auth()->user()->cannot('verProduto', $produto)) {
        //     return view('site.details', compact('produto'));
        // }

        
    }

    public function categoria($id) {
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id_categoria', $id)->paginate(3);

        return view('site.categoria', compact('produtos', 'categoria'));
    }

}

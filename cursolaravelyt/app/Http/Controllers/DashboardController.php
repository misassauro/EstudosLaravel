<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Produto;

use DB;

class DashboardController extends Controller
{

    //EXEMPLO DE MIDDLEWARE (INTERMEDIÁRIO/FILTRO) APLICADO DIRETAMENTE NO CONSTRUTOR DA CLASSE:
    // public function __construct() {
    //     $this->middleware('auth')->only('index');
    // }

    //APLICANDO MIDDLEWARE PARA TODOS OS MÉTODOS, EXCETO...
    // public function __construct() {
    //     $this->middleware('auth')->except('index');
    // }
    public function index() {
        $usuarios = User::all()->count();

        //Gráfico 01 - Usuários

        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        // dd($usersData);

        //Preparar arrays:

        foreach($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //Formatar para Chart.js:
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        //Gráfico 02 - Categorias:

        $catData = Categoria::with('produtos')->get();

        //Preparar array:

        foreach($catData as $cat) {
            $catNome[] = "'". $cat->nome . "'";
            $catTotal[] = $cat->produtos->count();
        }

        //Formatar para Chart.js:

        $catLabel = implode(',', $catNome);
        $catTotal = implode(',', $catTotal);

        return view('admin.dashboard', compact('usuarios', 'userLabel', 'userAno', 'userTotal', 'catLabel', 'catTotal'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $consulta = Produto::query();
        // Aplica o filtro por nome somente se foi preenchido.
        if ($request->filled('nome')) {
            $consulta->where(
                'nome',
                'like',
                '%' . $request->input('nome') . '%'
            );
        }
        // Aplica o preço máximo somente se foi preenchido.
        if ($request->filled('preco_maximo')) {
            $consulta->where(
                'preco',
                '<=',
                $request->input('preco_maximo')
            );
        }
        // "1" filtra ativos; "0" filtra inativos; vazio mostra todos.
        if ($request->input('ativo') === '1') {
            $consulta->where('ativo', true);
        } elseif ($request->input('ativo') === '0') {
            $consulta->where('ativo', false);
        }
        $produtos = $consulta
            ->orderBy('nome', 'asc')
            ->get();
        return view('produtos.index', [
            'produtos' => $produtos,
        ]);
    }
}

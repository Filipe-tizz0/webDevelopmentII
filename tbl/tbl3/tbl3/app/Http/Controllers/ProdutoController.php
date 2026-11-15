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
        if ($request->filled('preco_minimo')) {
            $consulta->where(
                'preco',
                '>=',
                $request->input('preco_minimo')
            );
        }
        if ($request->filled('Nome_exato')) {
            $consulta->where(
                'nome',
                '=',
                $request->input('Nome_exato')
            );
        }
        // "1" filtra ativos; "0" filtra inativos; vazio mostra todos.
        if ($request->input('ativo') === '1') {
            $consulta->where('ativo', true);
        } elseif ($request->input('ativo') === '0') {
            $consulta->where('ativo', false);
        }

        switch ($request->input('order_by')) {
            case 'Nome':
                $consulta->orderBy('nome', 'asc');
                break;
            case 'Preco':
                $consulta->orderBy('preco', 'desc');
                break;
            default:
                $consulta->orderBy('id', 'asc');
                break;
        }
        $produtos = $consulta
            ->orderBy('nome', 'asc')
            ->get();
        return view('Produtos.index', [
            'produtos' => $produtos,
        ]);
    }
}

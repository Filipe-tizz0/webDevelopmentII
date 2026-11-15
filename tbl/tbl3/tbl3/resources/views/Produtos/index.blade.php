<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 0 16px;
            color: #222;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: end;
            background: #f2f4f6;
            padding: 16px;
            border-radius: 6px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select,
        button {
            padding: 8px;
            font: inherit;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 9px;
            text-align: left;
        }

        th {
            background: #e9edf1;
        }
    </style>
</head>

<body>
    <h1>Consulta de produtos</h1>
    <form action="{{ route('produtos.index') }}" method="GET">
        <div>
            <label for="nome">Nome do produto</label>
            <input type="text" id="nome" name="nome"
                value="{{ request('nome') }}" placeholder="Ex.: teclado">
        </div>
        <div>
            <label for="preco_maximo">Preço máximo</label>
            <input type="number" id="preco_maximo" name="preco_maximo"
                min="0" step="0.01" value="{{ request('preco_maximo') }}"
                placeholder="Ex.: 200">
        </div>
        <div>
            <label for="preco_minimo">Preço mínimo</label>
            <input type="number" id="preco_minimo" name="preco_minimo"
                min="0" step="0.01" value="{{ request('preco_minimo') }}"
                placeholder="Ex.: 200">
        </div>
        <div>
            <label for="prod_id">Id</label>
            <input type="number" id="prod_id" name="prod_id"
                min="0" step="0.01" value="{{ request('prod_id') }}"
                placeholder="Ex.: 15">
        </div>
        <div>
            <label for="Nome_exato">Nome exato</label>
            <input type="text" id="Nome_exato" name="Nome_exato"
                min="0" step="0.01" value="{{ request('Nome_exato') }}"
                placeholder="Ex.: teclado">
        </div>
        <div>
            <label for="ativo">Status</label>
            <select id="ativo" name="ativo">
                <option value="">Todos</option>
                <option value="1" {{ request('ativo') === '1' ? 'selected' : ''
}}>Ativos</option>
                <option value="0" {{ request('ativo') === '0' ? 'selected' : ''
}}>Inativos</option>
            </select>
        </div>
        <div>
            <label for="order_by">Ordernação</label>
            <select id="order_by" name="order_by" onchange="this.form.submit()">
                <option value="">---</option>
                <option value="Nome" {{ request('order_by') === 'Nome' ? 'selected' : ''
}}>Nome</option>
                <option value="Preco" {{ request('order_by') === 'Preco' ? 'selected' : ''
}}>Preco</option>
            </select>
        </div>
        <button type="submit">Filtrar</button>
        <a href="{{ route('produtos.index') }}">Limpar filtros</a>
    </form>
    <p>Quantidade encontrada: {{ $produtos->count() }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->ativo ? 'Ativo' : 'Inativo' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Nenhum produto encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Categorias</h1>
        @can('admin', App\Models\User::class)
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Adicionar Nova Categoria</a>
        @elsecan('librarian', App\Models\User::class)
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Adicionar Nova Categoria</a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">Ver</a>
                            @can('admin', App\Models\User::class)
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                            </form>
                            @elsecan('librarian', App\Models\User::class)
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

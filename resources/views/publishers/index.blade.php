@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Editoras</h1>
        @can('admin', App\Models\User::class)
        <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Adicionar Nova Editora</a>
        @elsecan('librarian', App\Models\User::class)
        <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Adicionar Nova Editora</a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publishers as $publisher)
                    <tr>
                        <td>{{ $publisher->name }}</td>
                        <td>{{ $publisher->address }}</td>
                        <td>
                            <a href="{{ route('publishers.show', $publisher->id) }}" class="btn btn-info">Ver</a>
                            @can('admin', App\Models\User::class)
                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta editora?')">Excluir</button>
                            </form>
                            @elsecan('librarian', App\Models\User::class)

                            <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta editora?')">Excluir</button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Livros</h1>
        @can('admin', App\Models\User::class)
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>
        @elsecan('librarian', App\Models\User::class)
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Adicionar Novo Livro</a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Categorias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->publisher->name }}</td>
                        <td>
                            @foreach ($book->categories as $category)
                                <span class="badge bg-secondary">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <!-- Mostrar o ícone "Ver" para todos -->
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Ver</a>

                            <!-- Mostrar os ícones "Editar" e "Excluir" apenas para admin e librarian -->
                            @can('admin', App\Models\User::class)
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                                </form>
                            @elsecan('librarian', App\Models\User::class)
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

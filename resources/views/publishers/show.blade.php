@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $publisher->name }}</h1>
        <p><strong>Endereço:</strong> {{ $publisher->address }}</p>
        <h3>Livros Publicados:</h3>
        <ul>
            @foreach ($publisher->books as $book)
                <li>{{ $book->title }}</li>
            @endforeach
        </ul>
        <a href="{{ route('publishers.index') }}" class="btn btn-primary">Voltar à Lista</a>
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
    </div>
@endsection

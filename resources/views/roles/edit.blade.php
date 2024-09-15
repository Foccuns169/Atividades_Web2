@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Regra</h1>
        <form action="{{ route('roles.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ old('role', $user->role) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

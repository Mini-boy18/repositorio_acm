@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Conteúdos Cadastrados</h1>
    <a href="{{ route('admin.conteudos.create') }}" class="btn btn-primary mb-3">Novo Conteúdo</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Área</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conteudos as $conteudo)
                <tr>
                    <td>{{ $conteudo->titulo }}</td>
                    <td>{{ $conteudo->area->nome }}</td>
                    <td>
                        <form action="{{ route('admin.conteudos.destroy', $conteudo->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
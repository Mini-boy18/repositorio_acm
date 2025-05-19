@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Painel Administrativo</h1>
        <div>
            <a href="{{ route('home') }}" class="btn btn-primary me-2">
                Ver Site Público
            </a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Sair</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Gerenciar Conteúdos</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($conteudos as $conteudo)
                    <tr>
                        <td>{{ $conteudo->titulo }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Editar</a>
                            <form action="#" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
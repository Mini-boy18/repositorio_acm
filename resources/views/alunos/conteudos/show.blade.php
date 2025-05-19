@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ $conteudo->titulo }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Área:</strong> {{ $conteudo->area->nome }}</p>
            <p><strong>Descrição:</strong> {{ $conteudo->descricao }}</p>
            
            <div class="mt-4">
                <a href="{{ asset($conteudo->file_path) }}" class="btn btn-primary" target="_blank">Ver PDF</a>
                <a href="{{ asset($conteudo->file_path) }}" download class="btn btn-success">Download</a>
            </div>
        </div>
    </div>
@endsection
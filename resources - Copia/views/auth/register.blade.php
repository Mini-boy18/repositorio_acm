@extends('layouts.auth')

@section('title', 'Registro')

@section('content')
<div class="card auth-card">
    <div class="card-header auth-header py-3">
        <h4 class="mb-0 text-center"><i class="bi bi-person-plus"></i> Criar Nova Conta</h4>
    </div>
    <div class="card-body p-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Completo</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Endereço de Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email') }}" required autocomplete="email">
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" 
                           name="password" required autocomplete="new-password">
                </div>
                <div class="form-text">Mínimo de 8 caracteres</div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="password_confirmation" 
                           name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary py-2">
                    <i class="bi bi-person-check"></i> Registrar
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer auth-footer text-center py-3">
        <p class="mb-0">Já tem uma conta? <a href="{{ route('login') }}" class="text-primary">Faça login</a></p>
    </div>
</div>
@endsection
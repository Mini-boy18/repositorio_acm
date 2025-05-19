@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="card auth-card">
    <div class="card-header auth-header py-3">
        <h4 class="mb-0 text-center"><i class="bi bi-shield-lock"></i> Acesso Restrito</h4>
    </div>
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Endereço de Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control" id="password" 
                           name="password" required autocomplete="current-password">
                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Manter conectado</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary py-2">
                    <i class="bi bi-box-arrow-in-right"></i> Entrar
                </button>
            </div>
        </form>
    </div>
    <div class="card-footer auth-footer text-center py-3">
        <p class="mb-0">Não tem uma conta? <a href="{{ route('register') }}" class="text-primary">Registre-se</a></p>
    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers\Aluno;

use App\Http\Controllers\Controller;

class ConteudoController extends Controller
{
    public function index()
    {
        $conteudos = Conteudo::with('area')->latest()->get();
        return view('aluno.conteudos.index', compact('conteudos'));
    }

    public function show(Conteudo $conteudo)
    {
        return view('aluno.conteudos.show', compact('conteudo'));
    }
}
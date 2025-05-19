<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conteudo;


class ConteudoController extends Controller
{
    public function index()
    {
        $conteudos = Conteudo::with('area')->latest()->get();
        return view('admin.conteudos.index', compact('conteudos'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('admin.conteudos.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'area_id' => 'required|exists:areas,id',
            'file' => 'required|file|mimes:pdf|max:2048'
        ]);

        $path = $request->file('file')->store('public/conteudos');
        
        Conteudo::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'area_id' => $request->area_id,
            'file_path' => str_replace('public/', 'storage/', $path)
        ]);

        return redirect()->route('admin.conteudos.index');
    }

    public function destroy(Conteudo $conteudo)
    {
        \Storage::delete(str_replace('storage/', 'public/', $conteudo->file_path));
        $conteudo->delete();
        return back()->with('success', 'Conteúdo removido!');
    }
}
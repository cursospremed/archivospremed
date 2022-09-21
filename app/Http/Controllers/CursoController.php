<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = DB::table('cursos')->get();
        
        return view('curso.index',compact('cursos'));
    }
    public function create()
    {
        $curso = new Curso();
        return view('curso.create',compact('curso'));
    }
    public function store(CursoRequest $request)
    {
        Curso::create($request->all());
        return redirect()->route('curso.index')
            ->with('success', 'Curso creado satisfactoriamente.');
    }
}

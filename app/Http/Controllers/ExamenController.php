<?php

namespace App\Http\Controllers;

use App\Imports\ExamenImport;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\CountValidator\Exact;

class ExamenController extends Controller
{
    public function index()
    {
        $examenes = Examen::with('campo')
        ->simplePaginate(25);
        
        return view('examen.index',compact('examenes'));
    }
    public function create()
    {
        $examen = new Examen();
        return view('examen.create',compact('examen'));
    }
    public function store(Request $request)
    {
        Examen::create($request->all());
        return redirect()->route('examen.index')
            ->with('success', 'Examen creado satisfactoriamente.');
    }
    public function import()
    {
        return view('examen.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new ExamenImport, $file);
        return redirect()->route('examen.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

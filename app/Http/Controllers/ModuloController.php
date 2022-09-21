<?php

namespace App\Http\Controllers;

use App\Imports\ModuloImport;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::with('curso')->Simplepaginate(10);
        
        return view('modulo.index',compact('modulos'));
    }
    public function create()
    {
        $modulo = new Modulo();
        return view('modulo.create',compact('modulo'));
    }
    public function store(Request $request)
    {
        Modulo::create($request->all());
        return redirect()->route('modulo.index')
            ->with('success', 'Modulo creado satisfactoriamente.');
    }
    public function import()
    {
        return view('modulo.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new ModuloImport, $file);
        return redirect()->route('modulo.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

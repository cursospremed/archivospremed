<?php

namespace App\Http\Controllers;

use App\Imports\CampoImport;
use App\Models\Campo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CampoController extends Controller
{
    public function index()
    {
        $campos = Campo::with('modulo')->simplePaginate(25);
        
        return view('campo.index',compact('campos'));
    }
    public function create()
    {
        $campo = new Campo();
        return view('campo.create',compact('campo'));
    }
    public function store(Request $request)
    {
        Campo::create($request->all());
        return redirect()->route('campo.index')
            ->with('success', 'Campo creado satisfactoriamente.');
    }
    public function import()
    {
        return view('campo.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new CampoImport, $file);
        return redirect()->route('campo.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

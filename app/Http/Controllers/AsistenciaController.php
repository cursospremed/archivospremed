<?php

namespace App\Http\Controllers;

use App\Imports\AsistenciaImport;
use App\Models\Asistencia;
use App\Models\WpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Reader\Csv;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencias = Asistencia::with('alumnos')->get();
        
        return view('asistencia.index',compact('asistencias'));
    }

    public function import()
    {
        return view('asistencia.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new AsistenciaImport, $file);
        return redirect()->route('asistencia.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

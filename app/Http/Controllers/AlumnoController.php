<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoEditRequest;
use App\Imports\AlumnoImport;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = DB::table('alumnos')
        //->orderByDesc('ID')
        ->Simplepaginate(30);
        return view('alumno.index',compact('alumnos'));
    }

    public function show($id)
    {
        $alumno = Alumno::find($id);
        return view('alumno.show',compact('alumno'));
    }

    public function edit($id)
    {
        $alumno = Alumno::find($id);
        $cursos = Curso::all();
        return view('alumno.edit',compact('alumno','cursos'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        
        $alum = Alumno::where('ID',$alumno->ID)->first();
        
        $stu = $alum->ID;
        
        $alumnos = Alumno::find($stu);;
        $alumnos->save();
        foreach($request->cursos as $cur)
        {
            $curs = Curso::where('ID',$cur)->first();
            $course = $curs->ID;
            DB::table('alumno_curso')->insert([
                'alumno_id' => $stu,
                'curso_id' => $course,
            ]);
        }
        
        
        return redirect()->route('alumno.index')
            ->with('success', 'Alumno actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        Alumno::find($id)->delete();
        return redirect()->route('alumno.index')
            ->with('success', 'Alumno eliminado satisfactoriamente');
    }
    public function import()
    {
        return view('alumno.import-excel');
    }

    public function saveimport(Request $request)
    {
        $file = $request->file('import');
        Excel::import(new AlumnoImport, $file);
        return redirect()->route('alumno.index')
            ->with('success', 'Datos importados satisfactoriamente.');
    }
}

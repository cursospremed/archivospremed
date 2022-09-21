<?php

namespace App\Http\Controllers;

use App\Exports\WpusersExport;
use App\Http\Requests\WpuserEditRequest;
use App\Models\Curso;
use App\Models\WpUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class WpUserController extends Controller
{
    public function index()
    {
        $wpusers = DB::table('wp_users')->orderByDesc('ID')->Simplepaginate(10);
        return view('wpuser.index',compact('wpusers'));
    }

    public function create()
    {
        $wpuser = new WpUser();
        return view('wpuser.create',compact('wpuser'));
    }

    public function store(Request $request)
    {
        WpUser::create($request->all());
        return redirect()->route('wpuser.index')
            ->with('success', 'Alumno creado satisfactoriamente.');
    }
#expotacion
    public function export()
    {
        return Excel::download(new WpusersExport, 'user.xlsx');
    }

    /*public function exportable(Request $request)
    {
        //return $request->payroll_id;
        ini_set('memory_limit','-1');
        set_time_limit('30000');
        return (new WpusersExport($request->payroll_id))->download('nomina.xlsx');
        //return Excel::download(new PaydetailsExport($request->payroll_id),'nomina.xlsx');
        /*redirect()->route('payroll.index')
            ->with('success', 'Nomina Exportada satisfactoriamente.');
    }*/
#exportacion
}
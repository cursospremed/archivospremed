<?php

namespace App\Imports;

use App\Models\Asistencia;
use App\Models\WpUser;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AsistenciaImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    private $usuario_nombre;
    private $usuario_correo;
    private $tiempo_indice;
    
    public function __construct()
    {
        //$this->sat = Satperception::pluck('id','clave'); para buscar llave foranea
        $this->usuario_nombre = WpUser::pluck('ID','display_name');
        //DB::table('wp_users')->get(); //Buscar por nombre
        //$this->usuario_corrreo = WpUser::select('ID','user_email')->get();
        $this->usuario_correo = WpUser::pluck('ID','user_email');
        //DB::table('wp_users')->get(); //Buscar por correo
        //$this->sihae = Sihae::select('id','clave')->get(); conexion de muchos a muchos
    }

    public function model(array $row)
    {
            if(($row['nombre'] == 'Premed') or ($row['correo'] == 'cursospremed@gmail.com'))
            {
                $this->tiempo_indice = $row['duracion'];
                return new Asistencia([
                    'user_id' =>  1,
                    'fecha' => Carbon::now('America/Mexico_City')->format('Y-m-d'),
                    'tiempo' => $row['duracion'],
                    'asistencia' => 1,
                    'falta' => 0,
                ]);
            }else
            {
                $nombre = $this->usuario_nombre[$row['nombre']];
                $correo = $this->usuario_correo[$row['correo']];
                if($correo != null)
                {
                    if($nombre != null)
                    {
                        $porcentaje = $this->tiempo_indice*0.90;
                        $asistencia = $row['duracion'];
                        if($asistencia >= $porcentaje)
                        {
                            return new Asistencia([
                                'user_id' =>  $this->usuario_nombre[$row['nombre']],
                                'fecha' => Carbon::now('America/Mexico_City')->format('Y-m-d'),
                                'tiempo' => $row['duracion'],
                                'asistencia' => 1,
                                'falta' => 0,
                            ]);
                        }else{
                            return new Asistencia([
                                'user_id' =>  $this->usuario_nombre[$row['nombre']],
                                'fecha' => Carbon::now('America/Mexico_City')->format('Y-m-d'),
                                'tiempo' => $row['duracion'],
                                'asistencia' => 0,
                                'falta' => 1,
                            ]);
                        }
                    }
                    
                }else
                {
                    $porcentaje = $this->tiempo_indice*0.90;
                        $asistencia = $row['duracion'];
                        if($asistencia >= $porcentaje)
                        {
                            return new Asistencia([
                                'user_id' =>  $this->usuario_correo[$row['correo']],
                                'fecha' => Carbon::now('America/Mexico_City')->format('Y-m-d'),
                                'tiempo' => $row['duracion'],
                                'asistencia' => 1,
                                'falta' => 0,
                            ]);
                        }else{
                            return new Asistencia([
                                'user_id' =>  $this->usuario_correo[$row['correo']],
                                'fecha' => Carbon::now('America/Mexico_City')->format('Y-m-d'),
                                'tiempo' => $row['duracion'],
                                'asistencia' => 0,
                                'falta' => 1,
                            ]);
                        }
                }
            }
    }

    public function rules(): array
    {
        return [
            '*.correo' => [
                'required',
            ],
            '*.duracion' => [
                'nullable'
            ],
            '*.nombre' => [
                'nullable'
            ],
        ];
    }
}

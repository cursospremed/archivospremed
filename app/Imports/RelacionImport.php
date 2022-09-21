<?php

namespace App\Imports;

use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RelacionImport implements ToCollection
{
    private $curso;
    private $alumno;
    
    public function __construct()
    {
        $this->curso = Curso::pluck('ID','nombre');
        $this->alumno = Alumno::pluck('ID','nombre');
    }

    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            $deduction = Deduction::create([
                    'clave' => $row['clave'],
                    'nombre' => $row['nombre'],
                    'satdeduction_id' => $this->sat[$row['sat']] ?? null,
                ]);
            $sihaea = $this->sihae->where('clave',$row['sihae'])->first();
            if($row['sihae'] == null)
            {
                continue;
            }elseif($row['sihae'] != null)
            {
                $deduction->sihaes()->attach([
                    'sihae_id' => $sihaea->id
                ]);
            }
            
        }
    }
}

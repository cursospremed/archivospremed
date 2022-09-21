<?php

namespace App\Imports;

use App\Models\Curso;
use App\Models\Modulo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ModuloImport implements ToModel,WithHeadingRow,WithValidation
{
    private $cursos;
    
    public function __construct()
    {
        $this->cursos = Curso::pluck('ID','nombre');
    }

    public function model(array $row)
    {
        return new Modulo([
            'nombre' => $row['nombre'],
            'curso_id' => $this->cursos[$row['curso']],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.curso' => 'required'
        ];
    }
}

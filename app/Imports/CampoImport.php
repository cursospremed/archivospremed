<?php

namespace App\Imports;

use App\Models\Campo;
use App\Models\Modulo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithReadFilter;
use Maatwebsite\Excel\Concerns\WithValidation;

class CampoImport implements ToModel,WithHeadingRow,WithValidation
{
    private $modulos;
    
    public function __construct()
    {
        $this->modulos = Modulo::pluck('ID','nombre');
    }

    public function model(array $row)
    {
        return new Campo([
            'nombre' => $row['nombre'],
            'modulo_id' => $this->modulos[$row['modulo']],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.modulo' => 'required'
        ];
    }
}

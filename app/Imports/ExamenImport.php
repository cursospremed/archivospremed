<?php

namespace App\Imports;

use App\Models\Campo;
use App\Models\Examen;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExamenImport implements ToModel,WithHeadingRow,WithValidation,WithBatchInserts,WithChunkReading
{
    private $campos;
    
    public function __construct()
    {
        $this->campos = Campo::pluck('ID','nombre');
    }
    public function model(array $row)
    {
        return new Examen([
            'nombre' => $row['nombre'],
            'campo_id' => $this->campos[$row['campo']],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.campo' => 'required'
        ];
    }
    public function batchSize(): int
    {
        return 50;
    }
    
    public function chunkSize(): int
    {
        return 50;
    }
}

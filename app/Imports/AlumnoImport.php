<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AlumnoImport implements ToModel, WithHeadingRow,WithValidation,WithBatchInserts,WithChunkReading
{
    public function model(array $row)
    {
        return new Alumno([
            'ID' => $row['id'],
            'nombre' => $row['nombre'],
            'wp_user_id' => $row['matricula'],
        ]);
    }
    public function rules(): array
    {
        return [
            '*.matricula' => 'required'
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

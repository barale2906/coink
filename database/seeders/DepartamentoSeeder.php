<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 0;

        if(($handle = fopen(public_path() . '/csv/departamentos.csv', 'r')) !== false) {

                while(($data = fgetcsv($handle, 26000, ';')) !== false) {

                    try {
                            Departamento::create([
                                'nombre'    =>$data[0],
                                'pais_id'   =>$data[1]
                            ]);
                    }catch(Exception $exception){
                        Log::info('Line: ' . $row . ' departamentos with error: '.$data[0]."--" . $exception->getMessage().' codigo: '.$exception->getLine());
                    }
                    $row++;
                }
        }

        fclose($handle);
    }
}

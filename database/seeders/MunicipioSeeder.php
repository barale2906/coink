<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 0;

        if(($handle = fopen(public_path() . '/csv/municipios.csv', 'r')) !== false) {

                while(($data = fgetcsv($handle, 26000, ';')) !== false) {

                    try {
                            Municipio::create([
                                'nombre'    =>$data[0],
                                'departamento_id'   =>$data[1]
                            ]);
                    }catch(Exception $exception){
                        Log::info('Line: ' . $row . ' municipios with error: '.$data[0]."--" . $exception->getMessage().' codigo: '.$exception->getLine());
                    }
                    $row++;
                }
        }

        fclose($handle);
    }
}

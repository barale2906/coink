<?php

namespace Database\Seeders;

use App\Models\Pais;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 0;

        if(($handle = fopen(public_path() . '/csv/paises.csv', 'r')) !== false) {

                while(($data = fgetcsv($handle, 26000, ';')) !== false) {

                    try {
                            Pais::create([
                                'nombre'    =>$data[0]
                            ]);
                    }catch(Exception $exception){
                        Log::info('Line: ' . $row . ' Paises with error: '.$data[0]."--" . $exception->getMessage().' codigo: '.$exception->getLine());
                    }
                    $row++;
                }
        }

        fclose($handle);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 0;

        if(($handle = fopen(public_path() . '/csv/usuarios.csv', 'r')) !== false) {

                while(($data = fgetcsv($handle, 26000, ';')) !== false) {

                    try {
                            Usuario::create([
                                'nombre'            =>$data[0],
                                'telefono'          =>$data[1],
                                'direccion'         =>$data[2],
                                'pais_id'           =>$data[3],
                                'departamento_id'   =>$data[4],
                                'municipio_id'      =>$data[5],
                            ]);
                    }catch(Exception $exception){
                        Log::info('Line: ' . $row . ' usuarios with error: '.$data[0]."--" . $exception->getMessage().' codigo: '.$exception->getLine());
                    }
                    $row++;
                }
        }

        fclose($handle);
    }
}

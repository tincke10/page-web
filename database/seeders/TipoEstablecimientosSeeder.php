<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoEstablecimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipopres = array();
        $i = 0;

        $i++;
        $tipopres[$i][0]= 1;
        $tipopres[$i][1]= 'CLINICA';
        $i++;
        $tipopres[$i][0]= 2;
        $tipopres[$i][1]= 'SANATORIO';
        $i++;
        $tipopres[$i][0]= 3;
        $tipopres[$i][1]= 'CÍRCULO MÉDICO';
        $i++;  
        $tipopres[$i][0]= 4;
        $tipopres[$i][1]= 'CENTRO MÉDICO'; 
        $i++;
        $tipopres[$i][0]= 5;
        $tipopres[$i][1]= 'CONSULTORIO PRIVADO'; 

        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){

            DB::table('tipo_establecimientos')->insert([
                'id' => $tipopres[$i][0],
                'nombre' => $tipopres[$i][1]
            ]);

        }
    }
}

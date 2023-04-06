<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPrestacionesSeeder extends Seeder
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
        $tipopres[$i][1]= 'GENERAL';
        $tipopres[$i][2]= 'general';
        $i++;
        $tipopres[$i][0]= 2;
        $tipopres[$i][1]= 'CRONICIDAD';
        $tipopres[$i][2]= 'cronicidad';
        $i++;
        $tipopres[$i][0]= 3;
        $tipopres[$i][1]= 'ANTICONCEPTIVOS';
        $tipopres[$i][2]= 'anticonceptivos';
        $i++;  
        $tipopres[$i][0]= 4;
        $tipopres[$i][1]= 'ODONTOLÓGICO';
        $tipopres[$i][2]= 'odontologico';
        $i++;  
        $tipopres[$i][0]= 5;
        $tipopres[$i][1]= 'ONCOLÓGICO'; 
        $tipopres[$i][2]= 'oncologico';

        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){

            DB::table('tipo_prestaciones')->insert([
                'id' => $tipopres[$i][0],
                'nombre' => $tipopres[$i][1],
                'slug' => $tipopres[$i][2]
            ]);

        }
    }
}

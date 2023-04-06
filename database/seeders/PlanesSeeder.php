<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanesSeeder extends Seeder
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
        $tipopres[$i][1]= 'Plan Médico Obligatorio';
        $tipopres[$i][2]= 'pmoostamma'; 
        $tipopres[$i][3]= 1;
        $i++;
        $tipopres[$i][0]= 2;
        $tipopres[$i][1]= 'Plan Clásico';
        $tipopres[$i][2]= 'planclasicoostamma';
        $tipopres[$i][3]= 1;
        $i++;
        $tipopres[$i][0]= 3;
        $tipopres[$i][1]= 'Plan Superior';
        $tipopres[$i][2]= 'plansuperiorostamma';
        $tipopres[$i][3]= 1;
        $i++;  
        $tipopres[$i][0]= 4;
        $tipopres[$i][1]= 'Plan Clásico';
        $tipopres[$i][2]= 'planclasicomaradona';
        $tipopres[$i][3]= 2;
        $i++;  
        $tipopres[$i][0]= 5;
        $tipopres[$i][1]= 'Plan Superior'; 
        $tipopres[$i][2]= 'plansuperiorMaradona';
        $tipopres[$i][3]= 2;

        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){

            DB::table('planes')->insert([
                'id' => $tipopres[$i][0],
                'nombre' => $tipopres[$i][1],
                'slug' => $tipopres[$i][2],
                'entidad_id' => $tipopres[$i][3]
            ]);

        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadesSeeder extends Seeder
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
        $tipopres[$i][1]= 'OSTAMMA';
        $tipopres[$i][2]= 'ostamma';  
        $i++;
        $tipopres[$i][0]= 2;
        $tipopres[$i][1]= 'Maradona Salud';
        $tipopres[$i][2]= 'maradona'; 
        
         
        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){ 
            DB::table('entidades')->insert([
                'id' => $tipopres[$i][0],
                'nombre' => $tipopres[$i][1],
                'slug' => $tipopres[$i][2]
            ]);

        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoPrestadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provincia = array();
        $i = 0;

        $i++;
        $provincia[$i][0]= 1;
        $provincia[$i][1]= 'GENERAL';
        $provincia[$i][2]= 'general';
        $i++;
        $provincia[$i][0]= 2;
        $provincia[$i][1]= 'CRONICIDAD';
        $provincia[$i][2]= 'cronicidad';
        $i++;
        $provincia[$i][0]= 3;
        $provincia[$i][1]= 'ANTICONCEPTIVOS';
        $provincia[$i][2]= 'anticonceptivos';
        $i++;  
        $provincia[$i][0]= 4;
        $provincia[$i][1]= 'ODONTOLÓGICO';
        $provincia[$i][2]= 'odontologico';
        $i++;  
        $provincia[$i][0]= 5;
        $provincia[$i][1]= 'ONCOLÓGICO'; 
        $provincia[$i][2]= 'oncologico';

        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){

            DB::table('tipo_prestadores')->insert([
                'id' => $provincia[$i][0],
                'nombre' => $provincia[$i][1],
                'slug' => $provincia[$i][2]
            ]);

        }
    }
}

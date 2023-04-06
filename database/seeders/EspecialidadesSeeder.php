<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $espe = array();
        $i = 0;

        $i++;
        $espe[$i][0]= 1;
        $espe[$i][1]= 'ODONTOLOGÍA';
        $espe[$i][2]= 'odontologia';
        $i++;
        $espe[$i][0]= 2;
        $espe[$i][1]= 'PSICOLOGÍA';
        $espe[$i][2]= 'psicologia';
        $i++;
        $espe[$i][0]= 3;
        $espe[$i][1]= 'ONCOLOGÍA';
        $espe[$i][2]= 'oncologia';
        $i++;  
        $espe[$i][0]= 4;
        $espe[$i][1]= 'PEDIATRÍA';
        $espe[$i][2]= 'pediatria';
        $i++;  
        $espe[$i][0]= 5;
        $espe[$i][1]= 'TRAUMATOLOGÍA'; 
        $espe[$i][2]= 'traumatologia';

        $cantidad=$i;

        for($i=1;$i<=$cantidad;$i++){

            DB::table('especialidades')->insert([
                'id' => $espe[$i][0],
                'nombre' => $espe[$i][1],
                'slug' => $espe[$i][2]
            ]);

        }
    }
}

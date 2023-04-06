<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(EntidadesSeeder::class);
         $this->call(PlanesSeeder::class);
         $this->call(TipoPrestacionesSeeder::class);
         $this->call(TipoEstablecimientosSeeder::class);
         $this->call(EspecialidadesSeeder::class);
         $this->call(ProvinciaSeeder::class);
         $this->call(LocalidadSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}

<?php

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
        // La creación de datos de roles debe ejecutarse primero
        $this->call(RoleTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(UserTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(CatSistemasTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(CatTipoPersonaTableSeeder::class);
        // Los usuarios necesitarán los roles previamente generados
        $this->call(CatEmpleadosTableSeeder::class);

       
    }
}



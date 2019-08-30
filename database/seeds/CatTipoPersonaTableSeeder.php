<?php

use Illuminate\Database\Seeder;

class CatTipoPersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipospersona = array(
			array( // row #0
				'id' => 1,
                'modelo' => 'Administrador',
                'nombre' => 'ADMINISTRADOR',
				'inactivo' => 1,
			),
			array( // row #1
				'id' => 2,
                'modelo' => '\App\Model\Rhumanos\Empleado',
                'nombre' => 'EMPLEADO',
				'inactivo' => 1,
			),
		);

		\DB::table('cat_tipos_persona')->insert($tipospersona);
    }
}

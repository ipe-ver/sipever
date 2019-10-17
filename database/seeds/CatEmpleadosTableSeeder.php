<?php

use Illuminate\Database\Seeder;
use App\Model\Rhumanos\Empleado;


class CatEmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $empleados = array(
			array( // row #0
                'id' => 1,
                'no_personal' => 2867,
                'fecha_ingreso' => '2018/12/07',
                'apellido_paterno' => 'CASTILLO',
                'apellido_materno' => 'BARVO',
                'nombre' => 'SERGIO ARGENIS',
				'estatus' => 1,
            ),
            array( // row #0
                'id' => 2,
                'no_personal' => 2851,
                'fecha_ingreso' => '2018/12/01',
                'apellido_paterno' => 'GUTIERREZ',
                'apellido_materno' => 'RENDON',
                'nombre' => 'ERICK SAMUEL',
				'estatus' => 1,
            ),
			
		);

		\DB::table('rch_empleados')->insert($empleados);

    }
}




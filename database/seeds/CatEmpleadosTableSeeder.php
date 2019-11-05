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
			array( // row #1
                'id' => 1,
                'no_personal' => 2867,
                'fecha_ingreso' => '2018/12/07',
                'apellido_paterno' => 'CASTILLO',
                'apellido_materno' => 'BRAVO',
                'nombre' => 'SERGIO ARGENIS',
				'estatus' => 1,
            ),
            array( // row #2
                'id' => 2,
                'no_personal' => 2851,
                'fecha_ingreso' => '2018/12/01',
                'apellido_paterno' => 'GUTIERREZ',
                'apellido_materno' => 'RENDON',
                'nombre' => 'ERICK SAMUEL',
				'estatus' => 1,
            ),
            array( // row #3
                'id' => 3,
                'no_personal' => 2891,
                'fecha_ingreso' => '2019/06/03',
                'apellido_paterno' => 'LUNA',
                'apellido_materno' => 'RICO',
                'nombre' => 'KARLA YESSICA',
				'estatus' => 1,
            ),
            array( // row #4
                'id' => 4,
                'no_personal' => 2824,
                'fecha_ingreso' => '2018/08/09',
                'apellido_paterno' => 'BARRADAS',
                'apellido_materno' => 'MERINOS',
                'nombre' => 'ANGEL LUIS',
				'estatus' => 1,
            ),
            array( // row #5
                'id' => 5,
                'no_personal' => 2307,
                'fecha_ingreso' => '1999/08/03',
                'apellido_paterno' => 'BALBOA',
                'apellido_materno' => 'PEREDO',
                'nombre' => 'ANTONIO',
				'estatus' => 1,
            ),
            array( // row #5
                'id' => 6,
                'no_personal' => 1499,
                'fecha_ingreso' => '1993/05/01',
                'apellido_paterno' => 'LOPEZ',
                'apellido_materno' => 'GARCIA',
                'nombre' => 'VERONICA',
				'estatus' => 1,
            ),
            array( // row #5
                'id' => 7,
                'no_personal' => 692,
                'fecha_ingreso' => '1990/08/21',
                'apellido_paterno' => 'MESA',
                'apellido_materno' => 'CASTRO',
                'nombre' => 'GUSTAVO',
				'estatus' => 1,
            ),
            array( // row #5
                'id' => 8,
                'no_personal' => 2411,
                'fecha_ingreso' => '2007/10/16',
                'apellido_paterno' => 'VELAZQUEZ',
                'apellido_materno' => 'GARCIA',
                'nombre' => 'RITA BEATRIZ',
				'estatus' => 1,
            ),
			
		);

		\DB::table('rch_empleados')->insert($empleados);

    }
}




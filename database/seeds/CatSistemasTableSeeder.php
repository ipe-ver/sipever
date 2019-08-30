<?php

use Illuminate\Database\Seeder;
//use App\Model\Admin\Sistema;

class CatSistemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sistemas = array(
			array( // row #0
				'id' => 1,
				'nombre' => 'ACTIVO FIJO',
				'estatus' => 1,
			),
			array( // row #1
				'id' => 2,
				'nombre' => 'ACTIVOS',
				'estatus' => 1,
			),
			array( // row #2
				'id' => 3,
				'nombre' => 'ALMACÉN',
				'estatus' => 1,
            ),
            array( // row #3
				'id' => 4,
				'nombre' => 'ASUNTOS JURÍDICOS',
				'estatus' => 1,
			),
			array( // row #4
				'id' => 5,
				'nombre' => 'AUXILIARES 91',
				'estatus' => 1,
			),
			array( // row #5
				'id' => 6,
				'nombre' => 'CASAS',
				'estatus' => 1,
			),
			array( // row #6
				'id' => 7,
				'nombre' => 'COMPRAS',
				'estatus' => 1,
			),
			array( // row #7
				'id' => 8,
				'nombre' => 'CONTABILIDAD',
				'estatus' => 1,
			),
			array( // row #8
				'id' => 9,
				'nombre' => 'CONTROL DE ADEUDOS',
				'estatus' => 1,
			),
			array( // row #9
				'id' => 10,
				'nombre' => 'CONTROL PRESUPUESTAL',
				'estatus' => 1,
			),
			array( // row #10
				'id' => 11,
				'nombre' => 'EGRESOS',
				'estatus' => 1,
			),
			array( // row #11
				'id' => 12,
				'nombre' => 'NÓMINA IPE',
				'estatus' => 1,
			),
			array( // row #12
				'id' => 13,
				'nombre' => 'PENSIONADOS',
				'estatus' => 1,
			),
			array( // row #13
				'id' => 14,
				'nombre' => 'PRÉSTAMOS A CORTO PLAZO',
				'estatus' => 1,
			),
			array( // row #14
				'id' => 15,
				'nombre' => 'SOPORTE TÉCNICO (RESGUARDOS)',
				'estatus' => 1,
			),
		);

		\DB::table('cat_sistemas')->insert($sistemas);
    }
}

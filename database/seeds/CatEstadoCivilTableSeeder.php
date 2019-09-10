<?php

use Illuminate\Database\Seeder;
use App\Model\Catalogos\EstadoCivil;

class CatEstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = array(
			['nombre' => 'NO ESPECIFICADO'],
			['nombre' => 'SOLTERO'],
			['nombre' => 'CASADO'],			
			['nombre' => 'DIVORCIADO'],
			['nombre' => 'UNION LIBRE'],
			['nombre' => 'VIUDO']
		);

		foreach ($estados as $estado) {
			EstadoCivil::create($estado);
		}
    }
}


